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
        <h4>ASSIGNED TASKS</h4>
    </div>

        <?php echo $timeComponent; ?>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <?php
                if (isset($_POST['addActivity'])) {

                    $session = sqlEscape($_POST['session']);
                    $activity = sqlEscape($_POST['activity']);         
                    $detail = sqlEscape($_POST['activity_detail']);
                    $adate = sqlEscape($_POST['activity_date']);
                    $student = sqlEscape($_POST['student_id']);
					
                    $insertActivity = dbQuery( "INSERT INTO `tbl_field_activities`( `activity_name`, `brief_details`, `activity_date`, `session_id`, `student_id`) VALUES('$activity','$detail','$adate', '$session','$student')");


                    if($insertActivity){
                        successMsg("You have Successfully recorded an Internship Activity");
                       goToPage("dailyActivities");
                    }                                 
                }
    ?>

    <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>
                   
            <tr>
                <td> 

                <input type="hidden" name="student_id"  value="<?php echo userGroup();?>" class="form-control col-md-6 col-sm-6 col-xs-12" required="required">

                 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Session">Session<span class="required">:</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
							
                               <select name="session" class="form-control col-md-7 col-xs-12" required="required">
                                    <?php
									$user_id = $_SESSION['user_id'];
                                    $qry = dbQuery("SELECT * from tbl_student where user_id=$user_id");
                                    while ($rrr = mysqli_fetch_array($qry)) {
                                        $std = $rrr['student_id'];
                                    }
                                   
									
                                    $queryGroup = dbQuery("SELECT s.*, t.* FROM tbl_session s join tbl_student t on s.student_id=s.student_id where s.student_id=$std");
                                    while ($row = dbFetchAssoc($queryGroup)) {
                                        echo '<option value="'. $row["session_id"] .'">'. $row["session_name"] .'</option>'; 
                                    }
                                    ?>
                                </select>
                            </div>
                 </div>


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Activity Name">Activity Name <span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" name="activity"  placeholder="Enter Activity Name Here" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Activity Description">Activity Description <span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-9 col-xs-12">
                        <textarea name="activity_detail" required="required" class="form-control col-md-7 col-xs-12" rows="5" placeholder="Briefly Describe Your Activity Performed"></textarea>
                    </div>
                </div>
     
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Activity Date">Activity Date<span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="date" name="activity_date" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div> 
                
               <br>
                                                  
   </td>      
</tr>
        
            <tr>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center>
                                <button class="btn btn-info" type="submit" name="addActivity"><i class="glyphicon glyphicon-plus"></i>Record Daily Activities</button>
                            	<a href="<?php _link(); ?>dailyActivities" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Daily Activities</a>
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
