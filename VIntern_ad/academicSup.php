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
    <h4 style="color: #025e8f;">UNIVERSITY ACADEMIC SUPERVISOR DETAILS</h4>
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
                <?php if($_SESSION['user_type_name']==3){ ?>
                
                <li class="">
                  <a href="<?php _link(); ?>academicSupAdd" class="glyphicon glyphicon-plus" aria-hidden="false">&nbsp;New</a>
                </li>                
                <li class="">
                  <a href="#" onClick="edit_records(event, '<?php _link();?>academicSupEdit');" class="glyphicon glyphicon-edit" aria-hidden="false">&nbsp;Change</a>
                </li>
                <li class="">
                  <a href="#" onClick="delete_records(event, '<?php _link();?>academicSupDelete');" class="glyphicon glyphicon-trash" aria-hidden="false">&nbsp;Delete</a>
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
                <th>Academic Code</th>
                <th>Names</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Faculty</th>
                <th>College</th>
                <td>Department</td>
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
                $resAcademics =  dbQuery("SELECT * FROM `tbl_academic_supervisor` where student_id='$fans'");
              }else{
                $resAcademics =  dbQuery("SELECT * FROM `tbl_academic_supervisor`");
              }


                
                $count = dbNumRows($resAcademics);
                while($row=mysqli_fetch_array($resAcademics)){
                  $names = $row['academic_lname']. '&nbsp;&nbsp;'.$row['academic_fname'];
                                  
                ?>
              <tr>
                <?php $acdid = $row['academic_id']; ?>
                <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['academic_id']; ?>" /></td>
                <td style="text-align: center;"><?php echo $row['acode']; ?></td>
                <td style="text-align: center;"><?php echo $names; ?></td>
                <td style="text-align: center;"><?php echo $row['email']; ?></td>
                <td style="text-align: center;"><?php echo $row['phone']; ?></td>
                <td style="text-align: center;"><?php echo $row['faculty']; ?></td>
                <td style="text-align: center;"><?php echo $row['college']; ?></td>
                <td style="text-align: center;"><?php echo $row['department']; ?></td>
                <?php 

                $qry = $dbConn->query("SELECT * FROM tbl_student WHERE student_id=".$row['student_id']);

                if ($row['student_id']==0) {
                  $notSet = true;
                }else{
                  $notSet = false;
                }

                while($row=mysqli_fetch_array($qry)){
                  $user_id = $row['user_id'];
                }
                $qry2 = $dbConn->query("SELECT * FROM tbl_user WHERE user_id=".$user_id);
                while($row2=mysqli_fetch_array($qry2)){
                  $std = $row2['name'];
                }

                ?>
                <?php if ($notSet):?>
                  <td class="center">
                      <a href="<?php _link(); ?>assignAcad&id=<?php echo $acdid; ?>&type=5" class="btn btn-primary btn-xs">Assign Student</a>
                  </td>                
                <?php else: ?>
                  <td style="text-align: center;"><?php echo $std; ?></td>
                <?php endif ?>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>