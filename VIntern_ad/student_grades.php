<?php
  /*<!-- =======================================================
  Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
  Website URL: 
  Author:
  ======================================================= -->
  */    
  $userId = $_GET['id'];
 $myuser = "SELECT * from intern_grade WHERE student_id=".$userId;
  $res = $dbConn->query($myuser);
  $c=0;
  $f=0;
  $s=0;
  $cqns = $dbConn->query("SELECT * FROM intern_assess WHERE created_by=3")->num_rows;
  $fqns = $dbConn->query("SELECT * FROM intern_assess WHERE created_by=5")->num_rows;
  $sqns = $dbConn->query("SELECT * FROM intern_assess WHERE created_by=4")->num_rows;
  while($rown=mysqli_fetch_array($res)){
      if ($rown['by_']==3) {
        $c+=$rown['marks'];
      }else if($rown['by_']==4){
        $s+= $rown['marks'];
      }else if($rown['by_']==5){
        $f+=$rown['marks'];
      }
  };
  try {
    $f= $f*25/($fqns*10);    
  } catch (DivisionByZeroError $e) {
    $f=0;
  }
  try {
    $c= $c*25/($cqns*10);    
  } catch (DivisionByZeroError $e) {
    $c=0;
  }
  try {
    $s= $s*25/($sqns*10);    
  } catch (DivisionByZeroError $e) {
    $s=0;
  }
  
 
    $std_user_id = "SELECT *  FROM tbl_user WHERE user_id='$userId'";
      $resooo = $dbConn->query($std_user_id);
      while ($rowq = mysqli_fetch_array($resooo)) {
        $stdname = $rowq['name'];
      }
  ?>
<div class="page-title">
  <div class="title_left">
   
    <h4 style="color: orange;">GRADING DETAILS FOR : &nbsp;&nbsp;<?php echo $stdname; ?></h4>
  </div>

  <p style="color: orange"> <?php echo $timeComponent; ?></p>
</div>
<div class="clearfix"></div>
<div class="row">
  <!-- details -->
  <div class="col-md-10 col-sm-10 col-xs-12">
    <div class="x_panel">
      <div class="x_title no-padding">
        <h4>Student Internship Grades</h4>
      </div>
      <div class="x_content">
        <p class="row"><b class="col-sm-3">Student Name</b>:&nbsp;&nbsp;&nbsp;<span style="font-size: 1.1em;"><?php echo $stdname; ?></span></p>
        <p class="row"><b class="col-sm-3">Coordinator grades</b>:&nbsp;&nbsp;&nbsp;<span style="font-size: 1.1em;"><?php echo $c; ?></span></p>
        <p class="row"><b class="col-sm-3">Field Supervisor grades</b>:&nbsp;&nbsp;&nbsp;<span style="font-size: 1.1em;"><?php echo $f; ?></span></p>
        <p class="row"><b class="col-sm-3">University Supervisor Grades</b>:&nbsp;&nbsp;&nbsp;<span style="font-size: 1.1em;"><?php echo $s; ?></span></p>
        <p class="row"><b class="col-sm-3">Total Grades</b>:&nbsp;&nbsp;&nbsp;<span style="font-size: 1.1em;"><?php echo $c+$f+$s; ?></span></p>
        <br>
        <hr>
        <div style="float: left;">
          <a href="<?php _link(); ?>student_grade_list" class="btn btn-small btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Back</a>                    
        </div>
      </div>
    </div>
  </div>
  <!-- end details -->
</div>
