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
                if (isset($_POST['Add_Task'])) {

                    $task_name = sqlEscape($_POST['task_name']);
                    $start_date = sqlEscape($_POST['start_date']);         
                    $end_date = sqlEscape($_POST['end_date']);
                    $task_description = sqlEscape($_POST['task_description']);
                    $staff_id = user_id();           
                    $task_status = sqlEscape($_POST['task_status']);
                    $group = sqlEscape($_POST['group']);
					
                    $insertTask = dbQuery( "INSERT INTO `tbl_task`( `task_name`, `task_description`, `staff_id`, `start_date`, `end_date`, `group_id`) VALUES('$task_name','$task_description','$staff_id', '$start_date','$end_date','$group')");


                    if($insertTask){
                        successMsg("Successfully Created A given Task to a given group");
                       goToPage("tasks");
                    }                                 
                }
    ?>

    <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>
                   
            <tr>
                <td> 

                 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Group">Group<span class="required">:</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
							
                               <select name="group" class="form-control col-md-7 col-xs-12" required="required">
                                    <?php
									$user_id = user_id();
									
                                    $queryGroup = dbQuery("SELECT * FROM tbl_project, tbl_group WHERE tbl_project.group_id = tbl_group.group_id AND tbl_project.supervised_by = '$user_id'");
                                    while ($row = dbFetchAssoc($queryGroup)) {
                                        echo '<option value="'. $row["group_id"] .'">'. $row["group_name"] .'</option>'; 
                                    }
                                    ?>
                                </select>
                            </div>
                 </div>


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Task_name">Task <span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" name="task_name"  placeholder="Task Name Here" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Task Description">Task Description <span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-9 col-xs-12">
                        <textarea name="task_description" required="required" class="form-control col-md-7 col-xs-12" rols="10" placeholder="Briefly Describe Your Task"></textarea>
                    </div>
                </div>
     
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date">Start Date<span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="date" name="start_date" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>
				
                <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="End Date">End Date <span class="required">:</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input type="date" name="end_date" class="form-control col-md-7 col-xs-12" required="required">
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
                                <button class="btn btn-info" type="submit" name="Add_Task"><i class="glyphicon glyphicon-plus"></i>Assign Tasks</button>
                            	<a href="<?php _link(); ?>tasks" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Tasks</a>
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
