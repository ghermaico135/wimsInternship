<style type="text/css">
  .row {
  margin-right: -15px;
  margin-left: -15px;
  } 
  .content {
  min-height: 250px;
  padding: 15px;
  margin-right: auto;
  margin-left: auto;
  padding-left: 15px;
  padding-right: 15px;
  }
  article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
  display: block;
  }
  @media (min-width: 992px)
  .col-md-3 {
  width: 25%;
  }
  @media (min-width: 992px)
  .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {
  float: left;
  }
  @media (min-width: 768px)
  .col-sm-6 {
  width: 50%;
  }
  @media (min-width: 768px)
  .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
  float: left;
  }
  .fa {
    padding-top: 10px!important;
  }

  .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
  float: left;
  }
  .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
  }
  .info-box {
  display: block;
  min-height: 90px;
  background: #fff;
  width: 100%;
  box-shadow: 0 1px 1px rgb(0 0 0 / 10%);
  border-radius: 2px;
  margin-bottom: 15px;
  }
  .bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
  background-color: #00154f !important;
  }
  .bg-red, .bg-yellow, .bg-aqua, .bg-blue, .bg-light-blue, .bg-green, .bg-navy, .bg-teal, .bg-olive, .bg-lime, .bg-orange, .bg-fuchsia, .bg-purple, .bg-maroon, .bg-black, .bg-red-active, .bg-yellow-active, .bg-aqua-active, .bg-blue-active, .bg-light-blue-active, .bg-green-active, .bg-navy-active, .bg-teal-active, .bg-olive-active, .bg-lime-active, .bg-orange-active, .bg-fuchsia-active, .bg-purple-active, .bg-maroon-active, .bg-black-active, .callout.callout-danger, .callout.callout-warning, .callout.callout-info, .callout.callout-success, .alert-success, .alert-danger, .alert-error, .alert-warning, .alert-info, .label-danger, .label-info, .label-warning, .label-primary, .label-success, .modal-primary .modal-body, .modal-primary .modal-header, .modal-primary .modal-footer, .modal-warning .modal-body, .modal-warning .modal-header, .modal-warning .modal-footer, .modal-info .modal-body, .modal-info .modal-header, .modal-info .modal-footer, .modal-success .modal-body, .modal-success .modal-header, .modal-success .modal-footer, .modal-danger .modal-body, .modal-danger .modal-header, .modal-danger .modal-footer {
  color: #fff !important;
  }
  .info-box-icon {
  border-top-left-radius: 2px;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 2px;
  display: block;
  float: left;
  height: 90px;
  width: 90px;
  text-align: center;
  font-size: 45px;
  line-height: 90px;
  background: rgba(0, 0, 0, 0.2);
  }
  .info-box-content {
  padding: 5px 10px;
  margin-left: 90px;
  }
  .info-box-text {
  text-transform: uppercase;
  }
  .progress-description, .info-box-text {
  display: block;
  font-size: 14px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  }
  .info-box-number {
  display: block;
  font-weight: bold;
  font-size: 18px;
  }
  .visible-lg-block, .visible-lg-inline, .visible-lg-inline-block, .visible-md-block, .visible-md-inline, .visible-md-inline-block, .visible-sm-block, .visible-sm-inline, .visible-sm-inline-block, .visible-xs-block, .visible-xs-inline, .visible-xs-inline-block {
  display: none!important;
  }
</style>
<?php
  if (isset($_POST['pass-btn'])) {
    extract($_POST);
    $email = $_SESSION['email'];
    
    if ($pass != $cpass) {
      
      echo "the two passwords don't Match";
    }else{
      $pass=md5($pass);
      $result = $dbConn->query("UPDATE tbl_user set password='$pass' where user_id = {$_SESSION['user_id']}");
      if ($_SESSION['user_type_name']==8) {
        $result2 = $dbConn->query("UPDATE tbl_user set user_type=4 where user_id = {$_SESSION['user_id']}");
      }elseif ($_SESSION['user_type_name']==9){
      $result2 = $dbConn->query("UPDATE tbl_user set user_type=5 where user_id = {$_SESSION['user_id']}");
      }
      if ($result && $result2) {
        echo "Successfully updated the password";
        if ($_SESSION['user_type_name']==8) {
          $_SESSION['user_type_name']=4;
        }elseif ($_SESSION['user_type_name']==9) {
          $_SESSION['user_type_name']=5;
        }
        
        $dbConn->query("INSERT INTO `tbl_mail` (`mail_id`, `mail_address`) VALUES (NULL, '$email')");
        header("Refresh:1");
      }else{
        die(mysqli_error($dbConn));
      }
  
  
    }
   
  }
  ?>
<style>
  /*=====  ADMIN DASHBOARD STYLES   ===============*/
  .div-squarebox {
  padding:1px;
  border: 8px double #FFF5EE;
  -webkit-border-radius:120px;
  -moz-border-radius:120px;
  border-radius:120px;
  margin:10px;
  }
  .div-squarebox> a,.div-squarebox> a:hover {
  color:#808080;
  text-decoration:none;
  }
  #page-wrapper1 {
  padding: 15px 15px;
  min-height: 250px;
  background:#F3F3F3;
  }
  #page-inner1 {
  width:100%;
  margin:10px 20px 10px 0px;
  background-color:#fff!important;
  padding:10px;
  min-height:200px;
  }
  h4{
  font-weight: bold;
  font-size: 30px;
  transition: transform .25s; /*Animation*/
  }
</style>
<section class="content">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel" style="padding: 12px; background-color: #F0FFF0;">
        <div class="x_content">
          <div>
            <!-- /. ROW  -->
            You are welcome to The vIntern || INTERNSHIP MANAGEMENT SYSTEM &nbsp; <span style="font-size: 18px; color: red;"><?php echo $_SESSION['user_fullnames']; ?></span>
            <!-- /. PAGE INNER1  -->
            <hr style="margin: 4px; padding: 1px;" />
            <?php if ($_SESSION['user_type_name']==8 || $_SESSION['user_type_name']==9):?>
            <div class="card">
              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="col-md-6 border-right">
                      <b class="text-muted">Change Your current password</b>
                      <div class="form-group">
                        <label class="control-label">New password</label>
                        <input type="password" class="form-control form-control-sm" name="pass">   
                      </div>
                      <div class="form-group">
                        <label class="control-label">Confirm New password</label>
                        <input type="password" class="form-control form-control-sm" name="cpass" placeholder="retype password">   
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 text-right justify-content-center d-flex">
                    <button class="btn btn-primary mr-2" type="submit" name="pass-btn">Save</button>
                  </div>
                </form>
              </div>
            </div>
            <?php elseif ($_SESSION['user_type_name']==0):?>  
            <p style="color: navy; font-size: 18px;">Please complete your profile from the link below in order to proceed with your final year project system.</p>
            <a href="<?php _link(); ?>completeProfile&id=<?php echo $_SESSION['user_id']; ?>"><span style="font-size: 16px; color: orange; text-align: center;"> <img src="images/d_arrow.png" style="border-radius: 120px; width: 50px; height: 50px;"><br>
            Complete Your Profile</span></a>            
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php 
$cc=$dbConn->query("SELECT * FROM tbl_company")->num_rows;
$ff=$dbConn->query("SELECT * FROM tbl_field_supervisor")->num_rows;
$aa=$dbConn->query("SELECT * FROM tbl_academic_supervisor")->num_rows;
$ss=$dbConn->query("SELECT * FROM tbl_student")->num_rows;
$user_id = $_SESSION['user_id'];
$ssdd=$dbConn->query("SELECT * FROM tbl_field_activities")->num_rows;
$Q = $dbConn->query("SELECT * from tbl_student where user_id=$user_id");
if ($Q->num_rows>0) {
  # code...

while ($row=mysqli_fetch_array($Q)) {
  $uuid = $row['student_id'];
}
$ssdb=$dbConn->query("SELECT * FROM tbl_field_activities where univ_assess_status='1' and student_id=$uuid")->num_rows;
$ssdbc=$dbConn->query("SELECT * FROM tbl_field_activities where fasses_status='1' and student_id=$uuid")->num_rows;
$none=$dbConn->query("SELECT * FROM tbl_field_activities where fasses_status='1' and univ_assess_status='1' and student_id=$uuid")->num_rows;
}

?>
 <?php if ($_SESSION['user_type_name']==2):?>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-tasks"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Daily Tasks</span>
          
          <span class="info-box-number"><?php echo $ssdd; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-question"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Uncommented</span>
          <span class="info-box-number"><?php echo $ssdd-$none; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green pt-10"><i class="fa fa-th-list"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Academic Commented</span>
          <span class="info-box-number"><?php echo $ssdb; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-comments"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Field Commented</span>
          <span class="info-box-number"><?php echo $ssdbc; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
 <?php elseif ($_SESSION['user_type_name']==3): ?>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Students</span>
          
          <span class="info-box-number"><?php echo $ss; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Academic Supervisors</span>
          <span class="info-box-number"><?php echo $aa; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green pt-10"><i class="fa fa-building"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Companies</span>
          <span class="info-box-number"><?php echo $cc; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-sign-language"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Field Supervisors</span>
          <span class="info-box-number"><?php echo $ff; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
 <?php elseif ($_SESSION['user_type_name']==4): ?>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Students</span>
          
          <span class="info-box-number"><?php  
          $ss=$dbConn->query("SELECT * FROM tbl_student where academic_id=$user_id")->num_rows;
          echo $ss;


          ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <?php 
            $ssdd=$dbConn->query("SELECT * FROM tbl_field_activities");
            $qq=$dbConn->query("SELECT * FROM tbl_student where academic_id=$user_id");
            $scount = 0;
            $ccc = 0;
            while ($ee=mysqli_fetch_array($qq)) {
              while ($row = mysqli_fetch_array($ssdd)) {
               if ($row['student_id']==$ee['student_id']) {
                 $scount++;
               }
               if ($row['student_id']==$ee['student_id'] && $row['univ_assess_status']!='1') {
                 $ccc++;
               }

              }
            }
            

    ?>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Tasks to Access</span>
          <span class="info-box-number">
            <?php echo $ccc; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green pt-10"><i class="fa fa-building"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Student Companies</span>
          <span class="info-box-number"><?php echo '1'; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-sign-language"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Field Supervisors</span>
          <span class="info-box-number"><?php echo '1'; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
 <?php elseif ($_SESSION['user_type_name']==5): ?>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Students</span>
          
          <span class="info-box-number"><?php 
          $ss=$dbConn->query("SELECT * FROM tbl_student where field_sup=$user_id")->num_rows; 
          echo $ss;


          ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Daily Tasks</span>
          <span class="info-box-number"><?php 
           $ssdd=$dbConn->query("SELECT * FROM tbl_field_activities");
            $qq=$dbConn->query("SELECT * FROM tbl_student where field_sup=$user_id");
            $scount = 0;
            $ccc = 0;
            while ($ee=mysqli_fetch_array($qq)) {
              while ($row = mysqli_fetch_array($ssdd)) {
               if ($row['student_id']==$ee['student_id']) {
                 $scount++;
               }
               if ($row['student_id']==$ee['student_id'] && $row['fasses_status']=='1') {
                 $ccc++;
               }

              }
            }
            echo $scount;
          ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green pt-10"><i class="fa fa-building"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Assessed tasks</span>
          <span class="info-box-number"><?php echo $ccc; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-sign-language"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Unassessed Tasks</span>
          <span class="info-box-number"><?php echo $scount-$ccc; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
 <?php endif ?>
 <?php if ($_SESSION['user_type_name']==3):?>
<label>Students without Academic supervisors</label>
<table id="datatable" class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>S/N</th>
      <th>Name</th>
      <th>Student_No</th>
      <th>Email</th>
      <?php if ($_SESSION['user_type_name']==3):?>
      <th>Academic Supervisor</th>
      <th>Field Supervisor</th>
      <?php else: ?>
      <th>Phone number</th>
      <?php endif ?>
    </tr>
  </thead>
  <tbody>
    <?php
      if ($_SESSION['user_type_name']==5) {
        $email = $_SESSION['email'];
          
          $ff = $dbConn->query("SELECT student_id FROM `tbl_field_supervisor` where supervisor_email='$email'");
          $ans = dbFetchAssoc($ff);
          $fans = $ans['student_id'];
      
        $res_Student =  dbQuery("SELECT s.*, u.*, c.course_name as course_name FROM tbl_user u JOIN tbl_student s ON s.user_id=u.user_id JOIN tbl_course c ON c.course_id=s.course_id where student_id='$fans'");
      }elseif ($_SESSION['user_type_name']==4) {
        $email = $_SESSION['email'];
          
          $ff = $dbConn->query("SELECT student_id FROM `tbl_academic_supervisor` where email='$email'");
          $ans = dbFetchAssoc($ff);
      
          
          if ($ans) {
            $fans = $ans['student_id'];
           $res_Student =  dbQuery("SELECT s.*, u.*, c.course_name as course_name FROM tbl_user u JOIN tbl_student s ON s.user_id=u.user_id JOIN tbl_course c ON c.course_id=s.course_id where student_id='$fans'  ");
      
      }}
      else{
        $res_Student =  dbQuery("SELECT s.*, u.*, c.course_name as course_name FROM tbl_user u JOIN tbl_student s ON s.user_id=u.user_id JOIN tbl_course c ON c.course_id=s.course_id  ");
      }
      
        
        $count = dbNumRows($res_Student);
        while($row=mysqli_fetch_array($res_Student)){
      
      ?>
   <?php if (hasAcademic($row['student_id'])!=false) {
   }else{?>
    <tr >
      <td onClick="viewDetails(event, 'index.php?page=studentDetails&studentId=<?php echo $row['student_id']; ?>')" style = "cursor: pointer;"><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['student_id']; ?>" /></td>
      <td style="text-align: center;cursor: pointer;" onClick="viewDetails(event, 'index.php?page=studentDetails&studentId=<?php echo $row['student_id']; ?>')"><?php echo $row['name']; ?></td>
      <td style="text-align: center;cursor: pointer;" onClick="viewDetails(event, 'index.php?page=studentDetails&studentId=<?php echo $row['student_id']; ?>')" style = ""><?php echo $row['student_number']; ?></td>
      <td style="text-align: center;"><?php echo $row['email']; ?></td>
      <?php if ($_SESSION['user_type_name']==3) {
        ?>              
      <?php if (hasAcademic($row['student_id'])!=false):?>
      <td style="text-align: center;"><?php echo hasAcademic($row['student_id']); ?></td>
      <?php else:?>
      <td class="center" >
        <a href="<?php _link(); ?>assignAcad&id=<?php echo $row['student_id']; ?>&type=2" class="btn btn-primary btn-xs">Assign Academic Supervisor</a>
      </td>
      <?php endif ?>
      <?php if (hasField($row['student_id'])!=false):?>
      <td style="text-align: center;"><?php echo hasField($row['student_id']); ?></td>
      <?php else:?>
      <td style="text-align: center;">
        <a href="#" class="btn btn-danger btn-xs">Unassigned
      </td>
      <?php endif ?>
    </tr>

    <?php }else{
      ?>
    <td style="text-align: center;">
      <?php echo $row['telephone']; ?>
    </td>
    <?php
      } ?>           
    <?php } ?>
    <?php } ?>
</table>
<?php elseif ($_SESSION['user_type_name']==4): ?>

  <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Task Date</th>
                <th>Task</th>
                <th>Description</th>
                <th>Session</th>
                <?php if ($_SESSION['user_type_name']==2):?>
                <th>Field Supervisor Comment</th>
                <th>Academic Supervisor comment</th>
                <?php elseif ($_SESSION['user_type_name']==4):?>
                <th>Comment</th>
                <?php elseif ($_SESSION['user_type_name']==5): ?>
                <th>Comment</th>
                <?php else: ?>
                <th>Comment</th>
                <?php endif ?>
              </tr>
            </thead>
            <tbody>
              <?php
               
                  $students = $dbConn->query("SELECT * FROM tbl_student where academic_id=$user_id");
                  
                
                  while ($ee=mysqli_fetch_array($students)) {
                  $std = $ee['student_id'];
                  $resActivity =  dbQuery("SELECT t.*, s.* FROM tbl_field_activities t JOIN tbl_session s on t.session_id = s.session_id where t.student_id=$std");
                  
                  $count = dbNumRows($resActivity);
                  while($row=mysqli_fetch_array($resActivity)){ 
                  if ($ee['student_id']==$row['student_id'] && $row['univ_assess_status']!='1') {
                                           
                
                 ?>
              <tr>
                <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['activity_id']; ?>" /></td>
                <td style="text-align: center;"><?php echo $row['activity_date']; ?></td>
                <td onClick="viewDetails(event, 'index.php?page=taskDetails&taskId=<?php echo $row['activity_id']; ?>&std=<?php echo $row['student_id']; ?>')" style="text-align: center;"><?php echo $row['activity_name']; ?></td>
                <td style="text-align: center;"><?php echo $row['brief_details']; ?></td>
                <td style="text-align: center;"><?php echo $row['session_name']; ?></td>
                <?php if ($_SESSION['user_type_name']==5) {
                  ?>
                <?php 
                  if ($row['f_assess_comment']==''):
                  ?>
                <td style="text-align: center;" >
                  <div id="comm" onclick="showform()" style="display: block">
                    <a  href="#"  class="btn btn-primary btn-xs">Add Comment</a>
                  </div>
                  <div id="frm-save" style="display: none">
                    <form method="POST" >
                    <input type="text" name="student_id" value="<?php echo $row['student_id'] ?>" hidden>
                    <input type="" name="activity_id" value="<?php echo $row['activity_id'] ?>" hidden>
                    <input type="text" name="comment">
                    <button type="submit" name="save-field" class="btn btn-primary mt-10">save</button>
                    </form>
                  </div>
                </td>
                  <?php else: ?>
                <td style="text-align: center;">
                <?php echo $row['f_assess_comment']; ?>
                </td>
                <?php endif ?>
        <?php }elseif($_SESSION['user_type_name']==4){ ?>
              <?php 
                  if ($row['univ_assess_status']==''||$row['univ_assess_status']==0):
                  ?>
                <td style="text-align: center;" >
                  <div id="comm" onclick="showform()" style="display: block">
                    <a  href="#"  class="btn btn-primary btn-xs">Add Comment</a>
                  </div>
                  <div id="frm-save" style="display: none">
                    <form method="POST" >
                    <input type="text" name="student_id" value="<?php echo $row['student_id'] ?>" hidden>
                    <input type="" name="activity_id" value="<?php echo $row['activity_id'] ?>" hidden>
                    <input type="text" name="comment">
                    <button type="submit" name="save-acad" class="btn btn-primary mt-10">save</button>
                    </form>
                  </div>
                </td>
                  <?php else: ?>
                <td style="text-align: center;">
                <?php echo $row['a_assess_comment']; ?>
                </td>
                <?php endif ?>

        <?php }elseif($_SESSION['user_type_name']==2)
          {?>
        <td style="text-align: center;">
        <?php if ($row['fasses_status']==''||$row['fasses_status']=='0') {
          ?>
        <a  href="#"  class="btn btn-primary btn-xs">Not yet Assessed</a>
        <?php }else{?>
        <a  href="#"  class="btn btn-success btn-xs"> assessed</a>
        <?php }?>
        </td>
        <td style="text-align: center;">
        <?php if ($row['univ_assess_status']==''||$row['univ_assess_status']=='0') {
          ?>
        <a  href="#"  class="btn btn-primary btn-xs">Not yet Assessed</a>
        <?php }else{?>
        <a  href="#"  class="btn btn-success btn-xs">Assessed</a>
        <?php }?>
        </td>
        <?php } } }?>
        </tr>
        <?php }?>
        </table>

<?php endif ?>
</section>