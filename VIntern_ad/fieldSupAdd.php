<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/ 
require_once 'registerSup.php';

?>
<style type="text/css">   

fieldset.scheduler-border {
    border: 1px groove #ddd !important;/*
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;*/
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }
</style>


<div class="page-title">
    <div class="title_left">
        <h4 style="color: #025e8f;">COMPANY TRAINING FIELD SUPERVISOR RECORDING</h4>
    </div>

       <span style="color: #025e8f;"><?php echo $timeComponent; ?></span>

</div>
 
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <?php
                if (isset($_POST['addFieldSup'])) {

                    $name = sqlEscape($_POST['name']);
                    $email = sqlEscape($_POST['email']);
                    $phone = sqlEscape($_POST['phone']); 
                    $fpass = "12345";
                    $dept = sqlEscape($_POST['dept']);
                    $company = sqlEscape($_POST['company']);                    
                    $student = sqlEscape($_POST['student']); 
                    $pwd = md5($fpass);

                    /* Field Supervisor Code */
                    $fCode = @ dbQuery("SHOW TABLE STATUS LIKE 'tbl_field_supervisor'");
                    $data = @dbFetchAssoc($fCode);
                    $next = $data['Auto_increment'];
                    $prefix = "VU-C.FS/";                    
                    $code = sprintf("%s%04s",$prefix,$next);

                    $chkFieldExists = dbNumRows(dbQuery("SELECT * FROM `tbl_field_supervisor` WHERE `supervisor_email`='$email'"));
                    if($chkFieldExists>0){
                        warningMsg($name. "&nbsp;&nbsp; Entered Supervisor Already Already registered");
                    } 
                    
                    $recordSup = dbQuery("INSERT INTO `tbl_field_supervisor`(`fSup_code`, `supervisor_name`, `supervisor_email`, `supervisor_phone`, `password`, `dept`, `company_id`, `student_id`) VALUES ('$code','$name','$email', '$phone', '$pwd', '$dept','$company', '$student')");				
                    

                    if($recordSup){
                        $sessid = $_SESSION['user_id'];
                        saveSup($email,$name,$_SESSION);
                        $supType = $dbConn->query("UPDATE tbl_user set user_type=9 where email = '$email' ");
                        $new = $dbConn->query("SELECT u.name,t.* from tbl_user u join tbl_student t on t.user_id=u.user_id where t.user_id=$sessid");

                        while ($row=mysqli_fetch_array($new)) {                      
                            $std = $row['student_id'];
                        }
                        $new2 = $dbConn->query("SELECT f.*, u.* from tbl_field_supervisor f join tbl_user u on f.supervisor_email=u.email where email='$email'");
                        while ($row=mysqli_fetch_array($new2)){
                            $field = $row['user_id'];
                        }                  





                        $qry = $dbConn->query("UPDATE `tbl_student` SET `field_sup`='$field' WHERE student_id=$std");
                        if ($supType && $qry) {
                            echo "successfull";
                        }else{
                           die(mysqli_error($dbConn)); 
                        }
                        successMsg("Your Company Field Supervisor has been Successfully Recorded");
                       // goToPage("fieldSup");
                    }                                 
                }
    ?>

    <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>
                   
            <tr>
                <td> 

                 <input type="hidden" name="student"  value="<?php echo userGroup();?>" class="form-control col-md-6 col-sm-6 col-xs-12" required="required">

                 <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Field Supervisor">Field Supervisor <span class="required">:</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="name" class="form-control col-md-7 col-xs-12" required="required">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Supervisor Email">Supervisor Email  <span class="required">:</span>
                            </label>

                             <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="email" name="email" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                 </div>
                         
                <br> 

                 <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Supervisor Phone">Telephone <span class="required">:</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="tel" name="phone" class="form-control col-md-7 col-xs-12" required="required">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Company Department">Department  <span class="required">:</span>
                            </label>

                             <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="dept" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                 </div>
                 <br>
                 <div class="form-group">                            

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Company Name">Company  <span class="required">:</span>
                            </label>

                             <div class="col-md-8 col-sm-8 col-xs-12">
                                <select name="company" class="form-control col-md-7 col-xs-12" required="required">
                                    <?php                                    
                                    $qCompany = dbQuery("SELECT * FROM `tbl_company`");
                                    while ($row = dbFetchAssoc($qCompany)) {
                                        echo '<option value="'. $row["company_id"] .'">'. $row["company_name"] .'</option>'; 
                                    }
                                    ?>
                                </select>
                            </div>
                 </div>

                
                                                  
   </td>      
</tr>
        
            <tr>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center>
                                <button class="btn btn-info" type="submit" name="addFieldSup"><i class="glyphicon glyphicon-check"></i>&nbsp;&nbsp;Add Field Supervisor</button>
                            	<a href="<?php _link(); ?>fieldSup" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Field Supervisor Details</a>
                        	</center>
                        </div>
                    </div>               
                </td>
            </tr>
        </table>
    </form>
				 </div>
            </div>
        </div>
    </div>
