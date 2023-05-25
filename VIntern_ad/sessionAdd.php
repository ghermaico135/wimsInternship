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
        <h4 style="color: #025e8f;">COMPANY TRAINING SESSIONS RECORDING</h4>
    </div>

       <span style="color: #025e8f;"><?php echo $timeComponent; ?></span>

</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <?php
                if (isset($_POST['addSession'])) {

                    $session = sqlEscape($_POST['session']);
                    $in = sqlEscape($_POST['timein']);         
                    $out = sqlEscape($_POST['timeout']);    
                    $student = sqlEscape($_POST['student_id']);

                    //creating the Company code
                    $sCode = @ dbQuery("SHOW TABLE STATUS LIKE  'tbl_session'");
                    $data = @dbFetchAssoc($sCode);
                    $next = $data['Auto_increment'];
                    $prefix = "VU-SES/";
                    $code = sprintf("%s%04s",$prefix,$next);
                    
                    $insertCompany = dbQuery( "INSERT INTO `tbl_session`(`session_code`, `session_name`, `time_in`, `time_out`, `student_id`) VALUES ('$code','$session','$in', '$out', '$student')");

					
                    if($insertCompany){
                        successMsg("Successfully Recorded the Training Session");
                       goToPage("session");
                    }                                 
                }
    ?>

    <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>
                   
            <tr>
                <td> 

                 <input type="hidden" name="student_id"  value="<?php echo userGroup();?>" class="form-control col-md-6 col-sm-6 col-xs-12" required="required">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Session Name">Place of Placement <span class="required">:</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="session"  placeholder="Enter Session Name " class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>
                        
                <br><br>

                 <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Company Operating Time">From Time <span class="required">:</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="time" name="timein" class="form-control col-md-7 col-xs-12" required="required">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Company Operating Time">To Time  <span class="required">:</span>
                            </label>

                             <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="time" name="timeout" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                 </div>

                
                                                  
   </td>      
</tr>
        
            <tr>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center>
                                <button class="btn btn-info" type="submit" name="addSession"><i class="glyphicon glyphicon-check"></i>&nbsp;&nbsp;Add Session</button>
                            	<a href="<?php _link(); ?>session" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Session Details</a>
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
