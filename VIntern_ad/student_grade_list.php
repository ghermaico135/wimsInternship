<?php
  /*<!-- =======================================================
  Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
  Website URL: 
  Author:
  ======================================================= -->
  */
  ?>
<!--Page starts from Here-->
<div class="page-title">
  <div class="title_left">
    <h4 style="color: orange;">STUDENT GRADE RECORDS</h4>
  </div>
  <p style="color: orange;"><?php echo $timeComponent; ?></p>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <!-- navbar for The Register, Modify, Filter, Print and Search Functions of the Students Section -->
        <nav style="background-color: orange;">
          <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-3">
              <ul class="nav navbar-nav navbar-right">
                <li >             
                  <a href="#" onClick="print($('table').eq(0), $('.title_left').html());" class="glyphicon glyphicon-print" aria-hidden="false">&nbsp;Print</a>            
                </li>
              </ul>
            </div>
            <!-- /.navbar-collapse --> 
          </div>
          <!-- /.container -->
        </nav>
        <!-- /.navbar -->
        <!--/Ending the Nav tool bar -->
      </div>
      <div class="x_content">
        <form method="post" name="frm" >
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Name</th>                
                <th>Student_No</th>                       
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if ($_SESSION['user_type_name']==4) {
                  $email = $_SESSION['email'];
                  
                  $ff = $dbConn->query("SELECT student_id FROM `tbl_academic_supervisor` where email='$email'");
                  $ans = dbFetchAssoc($ff);
                  $fans = $ans['student_id'];

                 $res_Student =  dbQuery("SELECT s.*, u.*, c.course_name as course_name FROM tbl_user u JOIN tbl_student s ON s.user_id=u.user_id JOIN tbl_course c ON c.course_id=s.course_id where student_id='$fans'");
                }else{
                  $res_Student =  dbQuery("SELECT s.*, u.*, c.course_name as course_name FROM tbl_user u JOIN tbl_student s ON s.user_id=u.user_id JOIN tbl_course c ON c.course_id=s.course_id  ");
                }

                
                $count = dbNumRows($res_Student);
                while($row=mysqli_fetch_array($res_Student)){

              ?>
              <tr onClick="viewDetails(event, 'index.php?page=studentDetails&studentId=<?php echo $row['student_id']; ?>')">
                <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['student_id']; ?>" /></td>
                <td style="text-align: center;"><?php echo $row['name']; ?></td>                
                <td style="text-align: center;"><?php echo $row['student_number']; ?></td>
                
                
                <td class="center">
                                    <a href="<?php _link(); ?>student_grades&id=<?php echo $row['user_id']; ?>" class="btn btn-primary btn-xs">View Grades</a>                  
                                </td>
              </tr>
              <?php } ?>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>