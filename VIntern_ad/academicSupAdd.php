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
        <h4 style="color: #025e8f;">UNIVERSITY ACADEMIC SUPERVISOR RECORDING</h4>
    </div>

       <span style="color: #025e8f;"><?php echo $timeComponent; ?></span>

</div>
 
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <?php
                if (isset($_POST['addAcademicSup'])) {

                    $fname = sqlEscape($_POST['fname']);
                    $lname = sqlEscape($_POST['lname']);
                    $email = sqlEscape($_POST['email']);
                    $phone = sqlEscape($_POST['phone']);
                    $dept = sqlEscape($_POST['dept']);
                    $faculty = sqlEscape($_POST['faculty']);
                     $names = $fname.' '.$lname;
                    $college = sqlEscape($_POST['college']);
                    $apass = "12345";                
                    $student = sqlEscape($_POST['student']); 
                    $pwd = md5($apass);

                    /* Field Supervisor Code */
                    $fCode = @ dbQuery("SHOW TABLE STATUS LIKE 'tbl_academic_supervisor'");
                    $data = @dbFetchAssoc($fCode);
                    $next = $data['Auto_increment'];
                    $prefix = "VU-AS/";                    
                    $acode = sprintf("%s%04s",$prefix,$next);

                    $chkFieldExists = dbNumRows(dbQuery("SELECT * FROM `tbl_academic_supervisor` WHERE `email`='$email'"));
                    if($chkFieldExists>0){
                        warningMsg($name. "&nbsp;&nbsp; Entered Supervisor Already registered");
                    } 
                    
                    $recordSup = dbQuery("INSERT INTO `tbl_academic_supervisor`(`acode`, `academic_fname`, `academic_lname`, `email`, `phone`, `department`, `faculty`, `college`, `password`, `student_id`) VALUES  ('$acode','$fname','$lname','$email', '$phone','$dept', '$faculty','$college','$pwd', '$student')");

					if($recordSup){
                        echo "added now in tbl user";
                        saveAcademicSup($email,$names,$_SESSION);
                        $supType = $dbConn->query("UPDATE tbl_user set user_type=8 where email = '$email' ");
                        if ($supType) {
                            echo "successfull";
                        }else{
                           die(mysqli_error($dbConn)); 
                        }
                        successMsg("Academic Supervisor has been Successfully Recorded");
                        header('location: index.php?page=academicSup');
                    }                                                     
                }
    ?>

    <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>
                   
            <tr>
                <td> 

                 <input type="hidden" name="student"  value="<?php echo 0;?>" class="form-control col-md-6 col-sm-6 col-xs-12" required="required">

                 <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Last Name">Last Name <span class="required">:</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="lname" class="form-control col-md-7 col-xs-12" placeholder="Last Name" required="required">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="First Name">First Name  <span class="required">:</span>
                            </label>

                             <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="fname" class="form-control col-md-7 col-xs-12" placeholder="First Name" required="required">
                            </div>
                 </div>
                         
                <br> 

                 <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Email">Email <span class="required">:</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="email" name="email" class="form-control col-md-7 col-xs-12" placeholder="names@yourdomain.com" required="required">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Telephone">Telephone  <span class="required">:</span>
                            </label>

                             <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="tel" name="phone" class="form-control col-md-7 col-xs-12" placeholder="+25677000000" required="required">
                            </div>
                 </div>
                 <br>

                  <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Department">Department <span class="required">:</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="dept" class="form-control col-md-7 col-xs-12" placeholder="Enter Department" required="required">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="College">College  <span class="required">:</span>
                            </label>

                             <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="college" class="form-control col-md-7 col-xs-12" placeholder="Enter College" required="required">
                            </div>
                 </div>
                 <br>

                 <div class="form-group">                            

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Company Name">Faculty  <span class="required">:</span>
                            </label>

                             <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" name="faculty" class="form-control col-md-7 col-xs-12" placeholder="Enter Faculty" required="required">
                            </div>
                 </div>

                
                                                  
   </td>      
</tr>
        
            <tr>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center>
                                <button class="btn btn-info" type="submit" name="addAcademicSup"><i class="glyphicon glyphicon-check"></i>&nbsp;&nbsp;Academic Supervisor</button>
                            	<a href="<?php _link(); ?>fieldSup" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Academic Supervisor Details</a>
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
