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
        <h4 style="color: #025e8f;">COMPANY TRAINING SESSIONS DETAILS</h4>
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

          <li class="">
                <a href="<?php _link(); ?>sessionAdd" class="glyphicon glyphicon-plus" aria-hidden="false">&nbsp;New</a>
          </li> 
          <li class="">
              <a href="#" onClick="edit_records(event, '<?php _link();?>sessionEdit');" class="glyphicon glyphicon-ok-circle" aria-hidden="false">&nbsp;Edit</a>
          </li>         
          
          <li class="">
               <a href="#" onClick="delete_records(event, '<?php _link();?>sessionDelete');" class="glyphicon glyphicon-trash" aria-hidden="false">&nbsp;Delete</a>
         </li>
			<?php } ?>
         <li >             
               <a href="#" onClick="print($('table').eq(0), $('.title_left').html());" class="glyphicon glyphicon-print" aria-hidden="false">&nbsp;Print</a>            
         </li>           
        </ul>
         
            </div><!-- /.navbar-collapse --> 
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    
<!--/Ending the Nav tool bar -->

            </div>
            <div class="x_content">            
                <form method="post" name="frm" >

                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Session Code</th>
                            <th>Session Name</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Date Created</th>
                            <th>Student</th>

                        </tr>
                    </thead>                      
            <tbody>
 
                 <?php

                 $std = $dbConn->query("SELECT student_id FROM tbl_student WHERE user_id={$_SESSION['user_id']}");
                 while ($row=mysqli_fetch_array($std)) {
                   $student_id = $row['student_id'];
                 }
                 
                 if ($_SESSION['user_type_name']==2) {
                   $res_Sessions =  dbQuery(" SELECT * FROM `tbl_session` WHERE student_id=".$student_id);
                 }else{
                  $res_Sessions =  dbQuery(" SELECT * FROM `tbl_session` ");
                 }
                 
                 $count = dbNumRows($res_Sessions);
                 while ($row=mysqli_fetch_array($res_Sessions)) {
                   
              ?>
          <tr>

       
            <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['session_id']; ?>" /></td>
            <td style="text-align: center;"><?php echo $row['session_code']; ?></td>
            <td style="text-align: center;"><?php echo $row['session_name']; ?></td>
            <td style="text-align: center;"><?php echo $row['time_in']; ?></td>
            <td style="text-align: center;"><?php echo $row['time_out']; ?></td>
            <td style="text-align: center;"><?php echo $row['date_recorded']; ?></td>
            <?php

              $std = $dbConn->query("SELECT u.name, s.user_id FROM tbl_user u JOIN tbl_student s ON u.user_id=s.user_id WHERE s.student_id=".$row['student_id']);
              while ($rown = mysqli_fetch_array($std)) {
                $stdname = $rown['name'];
              }

              ?>      
            <td style="text-align: center;"><?php echo $stdname; ?></td>
      

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
