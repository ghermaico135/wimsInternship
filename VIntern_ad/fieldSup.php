-<?php
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
    <h4 style="color: #025e8f;">COMPANY TRAINING FIELD SUPERVISOR DETAILS</h4>
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
                <?php if($_SESSION['user_type_name']==2){ ?>
                <?php if(!$user->isfieldSupAdded() && ($_SESSION['user_type_name']==2)){ ?>
                <li class="">
                  <a href="<?php _link(); ?>fieldSupAdd" class="glyphicon glyphicon-plus" aria-hidden="false">&nbsp;New</a>
                </li>
                <?php } ?>
                
                <li class="">
                  <a href="#" onClick="delete_records(event, '<?php _link();?>fieldSupDelete');" class="glyphicon glyphicon-trash" aria-hidden="false">&nbsp;Delete</a>
                </li>
                <?php } ?>
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
                <th>Field Code</th>
                <th>Names</th>
                <th>Email</th>
                <th>Phone</th>
                <td>Company</td>
                <th>Department</th>
                <th>Student</th>
              </tr>
            </thead>
            <tbody>
              <?php

              if ($_SESSION["user_type_name"]==2) {
                $ss = $dbConn->query("SELECT student_id from tbl_student where user_id=".$_SESSION['user_id']);
              $ans = dbFetchAssoc($ss);
              $fans = $ans['student_id'];
              }

              

              if ($_SESSION["user_type_name"]==2) {
                $res_Sessions =  dbQuery("SELECT `tbl_field_supervisor`.*, tbl_company.* FROM `tbl_field_supervisor` INNER JOIN tbl_company ON tbl_company.company_id = tbl_field_supervisor.company_id where tbl_field_supervisor.student_id='$fans'");
              }elseif ($_SESSION["user_type_name"]==4) {
                $email = $_SESSION['email'];
                  
                $ff = $dbConn->query("SELECT student_id FROM `tbl_academic_supervisor` where email='$email'");
                $ans = dbFetchAssoc($ff);
                $fans = $ans['student_id'];
                

                $res_Sessions =  dbQuery("SELECT `tbl_field_supervisor`.*, tbl_company.* FROM `tbl_field_supervisor` INNER JOIN tbl_company ON tbl_company.company_id = tbl_field_supervisor.company_id  where tbl_field_supervisor.student_id='$fans'");


              }

              else{
                $res_Sessions =  dbQuery("SELECT `tbl_field_supervisor`.*, tbl_company.* FROM `tbl_field_supervisor` INNER JOIN tbl_company ON tbl_company.company_id = tbl_field_supervisor.company_id ");
              }

                
                $count = dbNumRows($res_Sessions);
                while($row=mysqli_fetch_array($res_Sessions)){        
                ?>
              <tr>
                
                <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['field_id']; ?>" /></td>
                <td style="text-align: center;"><?php echo $row['fSup_code']; ?></td>
                <td style="text-align: center;"><?php echo $row['supervisor_name']; ?></td>
                <td style="text-align: center;"><?php echo $row['supervisor_email']; ?></td>
                <td style="text-align: center;"><?php echo $row['supervisor_phone']; ?></td>
                <td style="text-align: center;"><?php echo $row['company_name']; ?></td>
                <td style="text-align: center;"><?php echo $row['dept']; ?></td>
                <?php 

                $qry = $dbConn->query("SELECT * FROM tbl_student WHERE student_id=".$row['student_id']);

                while($row=mysqli_fetch_array($qry)){
                  $user_id = $row['user_id'];
                }
                $qry2 = $dbConn->query("SELECT * FROM tbl_user WHERE user_id=".$user_id);
                while($row2=mysqli_fetch_array($qry2)){
                  $std = $row2['name'];
                }



                ?>
                <td style="text-align: center;"><?php echo $std; ?></td>
              </tr>

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