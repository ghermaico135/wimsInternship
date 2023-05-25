<?php
  /*<!-- =======================================================
  Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
  Website URL: 
  Author:
  ======================================================= -->
  */

  
  $type = $_GET['type'];
  if ($type==5) {
  $acad = $_GET['id'];
  
  $resAcademics =  dbQuery("SELECT * FROM `tbl_academic_supervisor` WHERE `academic_id`=$acad");
  while($row=mysqli_fetch_array($resAcademics)){
    $names = $row['academic_lname']. '&nbsp;&nbsp;'.$row['academic_fname'];}
                                  
  }elseif ($type==2) {

    $std = $_GET['id'];
    $qry = dbQuery("SELECT u.name as name, s.student_id from tbl_user u join tbl_student s on s.user_id=u.user_id where s.student_id=$std");
    while ($row=mysqli_fetch_array($qry)) {
      $names = $row['name'];
    }
  }              
   $user = new User();
  if(isset($_POST['acad-submit']))
  {

  $student_id=$_POST['student_id']; 
  $qry = $dbConn->query("UPDATE `tbl_academic_supervisor` SET `student_id`='$student_id' WHERE `academic_id`='$acad'");
  $qry2 = $dbConn->query("UPDATE `tbl_student` SET `academic_id`='$acad' WHERE student_id=$student_id");
  if ($qry && $qry2) {
    header("location: index.php?page=academicSup");
  }
}

  if(isset($_POST['std-acad-submit']))
  {
    echo "hherr";
  $student_id=$std;
  $acad = $_POST['academic_id'];
  $qry = $dbConn->query("UPDATE `tbl_academic_supervisor` SET `student_id`='$student_id' WHERE `academic_id`='$acad'");
  $qry2 = $dbConn->query("UPDATE `tbl_student` SET `academic_id`='$acad' WHERE student_id=$student_id");
  if ($qry) {
    header("location: index.php?page=student");
  }
  
    
  }

    


  
  
  ?>

  
<!--Page starts from Here-->
<div class="page-title">
  <div class="title_left">
    <h4 style="color: #025e8f;">ASSIGN ACADEMIC SUPERVISOR</h4>
  </div>
  <span style="color: #025e8f;"><?php echo $timeComponent; ?></span>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <!-- navbar for The Register, Modify, Filter, Print and Search Functions of the Company Section -->
        <nav style="background-color: #025e8f;">
          <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-3">
              <div class="nav navbar-nav">

                <?php if ($type==5):?>
                <li >             
                  <a href="#"  class="" aria-hidden="false">&nbsp;Assign Student to <?php echo $names; ?></a>            
                </li>
                <?php else:?>
                <li >             
                  <a href="#"  class="" aria-hidden="false">&nbsp;Assign Academic supervisor to  <?php echo $names; ?></a>            
                </li>
              <?php endif ?>
              </div>
            </div>
            <!-- /.navbar-collapse --> 
          </div>
          <!-- /.container -->
        </nav>
        <!-- /.navbar -->
        <!--/Ending the Nav tool bar -->
      </div>
      <div class="x_content">

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
<?php if ($type == 5):?>
                <form class="form-horizontal" method="post">  

    <div class="form-group">
      
      <label for="date" class="col-sm-2 control-label ">Student</label>
      <div class="col-sm-10">
        <?php 
          $qry = "SELECT *, u.* FROM tbl_student s JOIN tbl_user u on u.user_id= s.user_id WHERE student_id NOT IN (SELECT student_id FROM tbl_academic_supervisor)";
          $res = $dbConn->query($qry);

        ?>
        <select name="student_id" class="form-control stid" id="studentid" required="required" onChange="getStudent(this.value);">

          <option value="">Select Student </option>
          <?php 
          while($row=mysqli_fetch_array($res)){
          ?>
          
          <option value="<?php echo $row['student_id']?>"><?php echo $row['name']; ?></option>
          <?php }?>
        </select>
      </div>
    </div>    
    <div class="form-group">
      <div class="col-sm-10">
        <div id="reslt">
        </div>
      </div>
    </div>
    <div class="form-group" id="d-btn">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="acad-submit" id="submit" class="btn btn-primary">Assign</button>
    </div>
  </div>
  </form>
  <?php elseif ($type=2):?>

    <form class="form-horizontal" method="post">  

    <div class="form-group">
      
      <label for="date" class="col-sm-2 control-label ">Academic supervisors</label>
      <div class="col-sm-10">
        <?php 
          $qry = "SELECT * from tbl_academic_supervisor";
          $res = $dbConn->query($qry);
        ?>
        <select name="academic_id" class="form-control stid" id="studentid" required="required">

          <option value="">Select Academic Supervisor </option>
          <?php 
          while($row=mysqli_fetch_array($res)){
          ?>
          
          <option value="<?php echo $row['academic_id']?>"><?php echo $row['academic_fname'].'  '.$row['academic_lname']; ?></option>
          <?php }?>
        </select>
      </div>
    </div>    
    <div class="form-group">
      <div class="col-sm-10">
        <div id="reslt">
        </div>
      </div>
    </div>
    <div class="form-group" id="d-btn">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="std-acad-submit" id="submit" class="btn btn-primary">Assign</button>
    </div>
  </div>
  </form>
  <?php endif ?>

  
                </div>
              </div>
            </div>
            <!-- /.col-md-12 -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>