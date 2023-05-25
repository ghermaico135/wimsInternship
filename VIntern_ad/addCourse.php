<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
?>
<div class="page-title">
    <div class="title_left">
        <h4>FYPMS|ADD NEW COURSE</h4>
    </div>
    <?php echo $timeComponent; ?>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <?php
                if (isset($_POST['registerCourse'])) {

                    $course_name = sqlEscape($_POST['course_name']);
                    $dept = sqlEscape($_POST['dept']);
                    $course_year = sqlEscape($_POST['course_year']);
                    $staff_id = sqlEscape($_POST['staff_id']);
                    
                    $existTime = dbNumRows(dbQuery("SELECT * FROM `tbl_course` WHERE `course_name`='$course_name' AND `course_year`='$course_year'"));
                    if($existTime>0){
                        warningMsg("Course Already registered");
                    }else{
                        $insertCourse = dbQuery("INSERT INTO `tbl_course`(`course_name`, `staff_id`, `course_year`, `dept_id`) "
                                . "VALUES ('$course_name','$staff_id','$course_year','$dept')");
                        if($insertCourse){
                            successMsg("Course Successfully Added");
                            goToPage("listCourse");
                        }
                    }

                }
                   
                ?>
                <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_name">Course Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="course_name" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Staff_id">Coordinator <span class="required">:</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="staff_id" class="form-control col-md-7 col-xs-12" required="required">
                                    <?php
                                    $queryStaff = dbQuery("SELECT tbl_staff.staff_id, tbl_user.name FROM tbl_staff, tbl_user WHERE tbl_staff.user_id = tbl_user.user_id and tbl_staff.userType = 1");
                                    while ($row = dbFetchAssoc($queryStaff)) {
                                        echo '<option value="'. $row["staff_id"] .'">'. $row["name"] .'</option>'; 
                                    }
                                    ?>
                                </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course year <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="year" name="course_year" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Department">Department <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                        
                        <select name="dept" class="form-control col-md-7 col-xs-12">
                            <?php
                            $queryDept = dbQuery("SELECT dept_id, dept_name FROM tbl_dept");
                            while ($row = dbFetchAssoc($queryDept)) {
                                echo '<option value="'. $row["dept_id"] .'">'. $row["dept_name"] .'</option>';
                            }
                            ?>
                        </select>
                        </div>
                      </div>
                    
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" name="registerCourse"class="btn btn-success">Add Course</button>
                            <a href="<?php _link(); ?>listCourse" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Course</a>
                        </div>
                    </div>



                </form>

            </div>
        </div>
    </div>
</div>
