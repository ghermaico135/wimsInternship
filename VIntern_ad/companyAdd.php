<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
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
        <h4 style="color: #025e8f;">INTERNSHIP PLACEMENT / COMPANY REGISTRATION</h4>
    </div>

       <span style="color: #025e8f;"><?php echo $timeComponent; ?></span>

</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <?php
                if (isset($_POST['addCompany'])) {

                    $company = sqlEscape($_POST['company_name']);
                    $address = sqlEscape($_POST['physical_address']);         
                    $mail = sqlEscape($_POST['email_address']);
                    $tel = sqlEscape($_POST['phone']);
                    $direction = sqlEscape($_POST['direction']);
                    $from = sqlEscape($_POST['fromTime']);
                    $to = sqlEscape($_POST['toTime']);          
                    $student = sqlEscape($_POST['student_id']);

                    //creating the Company code
                    $dCode = @ dbQuery("SHOW TABLE STATUS LIKE  'tbl_company'");
                    $data = @dbFetchAssoc($dCode);
                    $next = $data['Auto_increment'];
                    $prefix = "VU-CO/";
                    $code = sprintf("%s%04s",$prefix,$next);
                    
                    $insertCompany = dbQuery( "INSERT INTO `tbl_company`(`company_code`, `company_name`, `address`, `phone`, `email`, `direction_detail`, `fromTime`, `toTime`, `student_id`) VALUES ('$code','$company','$address', '$tel','$mail','$direction','$from','$to', '$student')");

					
                    if($insertCompany){
                        successMsg("Successfully Registered Your Place of Placement");
                       goToPage("company");
                    }                                 
                }
    ?>

    <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>
                   
            <tr>
                <td> 

                 <input type="hidden" name="student_id"  value="<?php echo userGroup();?>" class="form-control col-md-6 col-sm-6 col-xs-12" required="required">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Company Name">Place of Placement <span class="required">:</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="company_name"  placeholder="Company Name Here" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Physical Address">Physical Address <span class="required">:</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="physical_address" required="required" class="form-control col-md-7 col-xs-12" rols="10" placeholder="Official Location of the Company">
                    </div>
                </div>
                        
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Email Address">Email Address <span class="required">:</span>
                    </label>
					<div class="col-md-3 col-sm-3 col-xs-12">
                         <input type="text" name="email_address" required="required" class="form-control col-md-7 col-xs-12" rols="10" placeholder="Company's Email Address">
                    </div>
                 
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Telephone">Telephone<span class="required">:</span>
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="tel" name="phone" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>

                <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Company Direction">Company Direction <span class="required">:</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <textarea name="direction" class="form-control col-md-7 col-xs-12" required="required"></textarea>
                            </div>
                 </div>

                 <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Company Operating Time">Operating Hours | From <span class="required">:</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="time" name="fromTime" class="form-control col-md-7 col-xs-12" required="required">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Company Operating Time">To Time  <span class="required">:</span>
                            </label>

                             <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="time" name="toTime" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                 </div>

                
                                                  
   </td>      
</tr>
        
            <tr>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center>
                                <button class="btn btn-info" type="submit" name="addCompany"><i class="glyphicon glyphicon-plus-sign"></i>Record Company</button>
                            	<a href="<?php _link(); ?>company" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Company Details</a>
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
