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
        <h4>GROUP REGISTRATION FORM</h4>
    </div>

        <?php echo $timeComponent; ?>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <?php
                if (isset($_POST['Add_Group'])) {

                    $group_name = sqlEscape($_POST['group_name']);
                    $course_id = sqlEscape($_POST['course_id']);         
                    $created_at = sqlEscape($_POST['created_at']);                   


                    $insertCourse = dbQuery( "INSERT INTO `tbl_group`(`group_name`, `course_id`, `created_at`) VALUES ('$group_name','$course_id', '$created_at')");


                    if($insertCourse){
                        successMsg("Successfully Registered Added New Group ");
                       goToPage("completeProfile&id=".user_id());
                    }                                 
                }
    ?>

    <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>
                   
            <tr>
                <td>                     
                  
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Group_Name">Group<span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" name="group_name"  placeholder="Enter Group Name" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Course">Course<span class="required">:</span>
                    </label>
					
                    <div class="col-md-5 col-sm-5 col-xs-12">
						<select name="course_id" class="form-control" >
							<?php
							$queryCourse = dbQuery("SELECT course_id, course_name FROM tbl_course");
							while ($row = dbFetchAssoc($queryCourse)) {
								echo '<option value="'. $row["course_id"] .'">'. $row["course_name"] .'</option>';
							}
							?>
						</select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Date Created">Date <span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="Date" name="created_at" class="form-control col-md-7 col-xs-12" required="required" placeholder=" Date Created At">
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
                                <button class="btn btn-info" type="submit" name="Add_Group"><i class="glyphicon glyphicon-plus"></i>Add Group</button>
                            	<a href="<?php _link(); ?>group" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Group</a>
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
