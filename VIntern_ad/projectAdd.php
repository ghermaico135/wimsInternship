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
        <h4 style="color: orange">NEW PROJECT REGISTRATION</h4>
    </div>

       <span style="color: orange"><?php echo $timeComponent; ?></span>

</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <?php
                if (isset($_POST['Add_Project'])) {

                    $project_name = sqlEscape($_POST['project_name']);
                    $start_date = sqlEscape($_POST['start_date']);         
                    $end_date = sqlEscape($_POST['end_date']);
                    $project_description = sqlEscape($_POST['project_description']);
                    $supervised_by = sqlEscape($_POST['supervised_by']);           
                    $group_id = sqlEscape($_POST['group_id']);
                    
                    $insertProject = dbQuery( "INSERT INTO `tbl_project`(`project_name`, `project_description`, `start_date`, `end_date`, `supervised_by`, `group_id`) VALUES('$project_name','$project_description', '$start_date','$end_date','$supervised_by','$group_id')");

					
                    if($insertProject){
                        successMsg("Successfully Submitted Your Project");
                       goToPage("projects");
                    }                                 
                }
    ?>

    <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>
                   
            <tr>
                <td> 

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="poject_name">project <span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" name="project_name"  placeholder="Project Name Here" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Project Description">Project Description <span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-9 col-xs-12">
                        <textarea name="project_description" required="required" class="form-control col-md-7 col-xs-12" rols="10" placeholder="Describe Ypur Pproject here"></textarea>
                    </div>
                </div>
                        
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="supervised_by">Supervisor <span class="required">:</span>
                    </label>
					<div class="col-md-7 col-sm-7 col-xs-12">
                            <select name="supervised_by" class="form-control col-md-7 col-xs-12" required="required">
                                    <?php
                                    $queryCourse = dbQuery("SELECT user_id, name FROM tbl_user WHERE tbl_user.user_type = '5'");
                                    while ($row = dbFetchAssoc($queryCourse)) {
                                        echo '<option value="'. $row["user_id"] .'">'. $row["name"] .'</option>'; 
                                    }
                                    ?>
                                </select>
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

                 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Group">Group<span class="required">:</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
							<?php 
							
							//echo "SELECT tbl_group.group_id, group_name FROM tbl_group, tbl_student WHERE tbl_student.group_id = tbl_group.group_id AND tbl_student.user_id = $user_id";
							
							?>
                               <select name="group_id" class="form-control col-md-7 col-xs-12" readonly="readonly">
                                    <?php
									$user_id = user_id();
                                    $queryCourse = dbQuery("SELECT tbl_group.group_id, group_name FROM tbl_group, tbl_student WHERE tbl_student.group_id = tbl_group.group_id AND tbl_student.user_id = $user_id");
                                    while ($row = dbFetchAssoc($queryCourse)) {
                                        echo '<option value="'. $row["group_id"] .'">'. $row["group_name"] .'</option>'; 
                                    }
                                    ?>
                                </select>
								
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
                                <button class="btn btn-info" type="submit" name="Add_Project"><i class="glyphicon glyphicon-plus"></i>Add Project</button>
                            	<a href="<?php _link(); ?>projects" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Projects</a>
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
