<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/    
$courseId = $_GET['id'];
$courseDetails = dbFetchArray(dbQuery("SELECT * FROM `tbl_course` WHERE `course_id`='$courseId'"));
?>
<div class="page-title">
    <nav class=nav class="navbar navbar-default">
        <div class="container">   
            <div class="collapse navbar-collapse" id="navbar-collapse-3">
                <ul class="nav navbar-nav navbar-right">    
                      <li style="color: green;font-weight: bold;"> <a href="<?php _link(); ?>listCourse" aria-hidden="false"><i class="glyphicon glyphicon-fast-backward"></i> &nbsp;Courses</a></li> 
                </ul>          
            </div><!-- /.navbar-collapse --> 
        </div><!-- /.container -->
    </nav><!-- /.navbar -->
    <div class="title_left">
        <h4>DETAILS FOR: <span style="color: green;"><?php echo $courseDetails[1]; ?></span></h4>
    </div>
    
     <?php echo $timeComponent; ?>

</div>

<div class="clearfix"></div>

<div class="row">

    <!-- details -->
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title no-padding">
                <h4>FYPMS | COURSE SECTION</h4>
            </div>
            <div class="x_content">
                <p class="row"><b class="col-sm-3">Course Name</b>:&nbsp;&nbsp;&nbsp;<span style="font-size: 1.1em;"><?php echo $courseDetails[1]; ?></span></p>
                <p class="row"><b class="col-sm-3">Course Year</b>:&nbsp;&nbsp;&nbsp;<span><?php echo $courseDetails[2]; ?></span></p>
                <p class="row"><b class="col-sm-3">Coordinator</b>:&nbsp;&nbsp;&nbsp;<span><?php echo getStaffName($courseDetails[3]); ?></span></p>
                
            </div>
        </div>
    </div>
    <!-- end details -->

    <!-- update -->

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title no-padding">
                <h4> UPDATE COURSES DETAILS</h4>
            </div>
            <div class="x_content">
                <?php
                if (isset($_POST['update'])) {

                    $course_name = $_POST['course_name'];
                    $course_year = $_POST['course_year'];
                    $staff_id = $_POST['staff_id'];
                    $dept = $_POST['dept'];
                    
                    $update = dbQuery("UPDATE `tbl_course` SET `course_name`='$course_name',`course_year`='$course_year',`staff_id`='$staff_id',`dept_id`='$dept' WHERE `course_id`='$courseId'");
                    if($update){
                        header("location:index.php?page=updateCourse&&id=".$courseId);
                    }
                }
                ?>

                <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Course Name">Course Name <span class="required">:</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="course_name" value="<?php echo $courseDetails[1]; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Course Year">Course Year <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="number" name="course_year" value="<?php echo $courseDetails[2]?>" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Coordinator">Coordinator <span class="required">:</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="staff_id" class="form-control col-md-7 col-xs-12" required="required">
                                <?php
                                $queryStaff = dbQuery("SELECT tbl_staff.staff_id, tbl_user.name FROM tbl_staff, tbl_user WHERE tbl_staff.user_id = tbl_user.user_id and tbl_staff.userType = 1");
                                while ($row = dbFetchAssoc($queryStaff)) {
                                    if($courseDetails[3] == $row["staff_id"]){
                                        echo '<option selected="selected" value="'. $row["staff_id"] .'">'. $row["name"] .'</option>';
                                    }else{
                                        echo '<option value="'. $row["staff_id"] .'">'. $row["name"] .'</option>';
                                    } 
                                }
                                ?>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Department">Department <span class="required">:</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                             
                            <select name="dept" class="form-control col-md-7 col-xs-12">
                                <?php
                                $queryDept = dbQuery("SELECT dept_id, dept_name FROM tbl_dept");
                                while ($row = dbFetchAssoc($queryDept)) {
                                    if($courseDetails[4] == $row["dept_id"]){
                                        echo '<option selected="selected" value="'. $row["dept_id"] .'">'. $row["dept_name"] .'</option>';
                                    }else{
                                        echo '<option value="'. $row["dept_id"] .'">'. $row["dept_name"] .'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" name="update"class="btn btn-success">Update Course</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- end update -->
</div>
