<?php
  /*<!-- =======================================================
  Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
  Website URL: 
  Author:
  ======================================================= -->
  */
   $user = new User();
  ?>
<!--Page starts from Here-->
<div class="page-title">
  <div class="title_left">
    <h4 style="color: #025e8f;">All your student Daily activities</h4>
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
                <th>No</th>
                <th>Student Number</th>
                <th>Student Names</th>
                <th>Email</th>
                <th>Phone</th>                
                <th>Activities</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $email = $_SESSION['email'];
                  
                  $ff = $dbConn->query("SELECT student_id FROM `tbl_academic_supervisor` where email='$email'");
                  $ans = dbFetchAssoc($ff);

                  
                  if ($ans) {
                    $fans = $ans['student_id'];
                   $res_Sessions =  dbQuery("SELECT s.*, u.*, c.course_name as course_name FROM tbl_user u JOIN tbl_student s ON s.user_id=u.user_id JOIN tbl_course c ON c.course_id=s.course_id where student_id='$fans'  ");

                  }



              
                $count = dbNumRows($res_Sessions);
                $cnt = 0;
                while($row=mysqli_fetch_array($res_Sessions)){  
                $cnt ++;
                ?>
              <tr>                
                <td style="text-align: center;"><?php echo $cnt; ?></td>
                <td style="text-align: center;"><?php echo $row['student_number']; ?></td>
                <td style="text-align: center;"><?php echo $row['name']; ?></td>
                <td style="text-align: center;"><?php echo $row['email']; ?></td>
                <td style="text-align: center;"><?php echo $row['telephone']; ?></td>
                <td style="text-align: center;">
                  <a href="<?php _link(); ?>dailyActivities&id=<?php echo $row['student_id']; ?>" class="btn btn-primary btn-xs">View Student Activities</a>
                </td>
              <?php    
                }
                ?>       
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>