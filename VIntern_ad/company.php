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
    <h4 style="color: #025e8f;">INTERNSHIP PLACEMENT / COMPANY DETAILS</h4>
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
                <?php if(!$user->isCompanyAdded() && ($_SESSION['user_type_name']==2)){ ?>
                <li class="">
                  <a href="<?php _link(); ?>companyAdd" class="glyphicon glyphicon-plus" aria-hidden="false">&nbsp;New</a>
                </li>
                <?php } ?>
                
                <?php if($_SESSION['user_type_name']==2){ ?>
                <li class="">
                  <a href="<?php _link(); ?>session" class="glyphicon glyphicon-eye-open" aria-hidden="false">&nbsp;Session</a>
                </li>
                <li class="">
                  <a href="#" onClick="edit_records(event, '<?php _link();?>companyEdit');" class="glyphicon glyphicon-pencil" aria-hidden="false">&nbsp;Edit</a>
                </li>
                <?php } ?>
                <?php if($_SESSION['user_type_name'] == 2){ ?>
                <li class="">
                  <a href="#" onClick="delete_records(event, '<?php _link();?>companyDelete');" class="glyphicon glyphicon-trash" aria-hidden="false">&nbsp;Delete</a>
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
                <th>Company Name</th>
                <th>Physical Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Direction Details</th>
                <th>From Time</th>
                <th>To Time</th>
                <th>Date Created</th>
                <th>Student</th>
              </tr>
            </thead>
            <tbody>
              <?php
                
                

                if ($_SESSION['user_type_name']==2) {
                $field = $dbConn->query("SELECT student_id from tbl_student where user_id=".$_SESSION['user_id']);
                $ans = dbFetchAssoc($field);
                $fans = $ans['student_id'];
                  $resCompany =  dbQuery("SELECT * FROM `tbl_company` where student_id='$fans' ");
                  $count = dbNumRows($resCompany);
                }elseif($_SESSION['user_type_name']==5){
                  $email = $_SESSION['email'];
                  
                  $ff = $dbConn->query("SELECT student_id FROM `tbl_field_supervisor` where supervisor_email='$email'");
                  $ans = dbFetchAssoc($ff);
                  $fans = $ans['student_id'];

                  $resCompany =  dbQuery("SELECT * FROM `tbl_company` where student_id='$fans' ");

                }elseif($_SESSION['user_type_name']==4){
                  $email = $_SESSION['email'];
                  
                  $ff = $dbConn->query("SELECT student_id FROM `tbl_academic_supervisor` where email='$email'");
                  $ans = dbFetchAssoc($ff);
                  $fans = $ans['student_id'];

                  $resCompany =  dbQuery("SELECT * FROM `tbl_company` where student_id='$fans' ");

                }

                else{
                  $resCompany =  dbQuery("SELECT * FROM `tbl_company` ");
                  $count = dbNumRows($resCompany);
                }

                while ($row = mysqli_fetch_array($resCompany)) {                
                ?>
              <tr>
                
                <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['company_id']; ?>" /></td>
                <td style="text-align: center;"><?php echo $row['company_name']; ?></td>
                <td style="text-align: center;"><?php echo $row['address']; ?></td>
                <td style="text-align: center;"><?php echo $row['email']; ?></td>
                <td style="text-align: center;"><?php echo $row['phone']; ?></td>
                <td style="text-align: center;"><?php echo $row['direction_detail']; ?></td>
                <td style="text-align: center;"><?php echo $row['fromTime'];?></td>
                <td style="text-align: center;"><?php echo $row['toTime']; ?></td>
                <td style="text-align: center;"><?php echo $row['date_added']; ?></td>
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
            <?php }?>
              
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>