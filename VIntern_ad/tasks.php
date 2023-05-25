<?php
  if (isset($_POST['save-field'])) {
    
    $std = $_POST['student_id'];
    $comm = $_POST['comment'];
    $activity = $_POST['activity_id'];
    
    $qry= $dbConn->query("UPDATE `tbl_field_activities` SET `fasses_status`='1',`f_assess_comment`='$comm' WHERE student_id=$std and activity_id=$activity");
    if ($qry) {
      echo "done";
    }
    
  }
  if (isset($_POST['save-acad'])) {
    
    $std = $_POST['student_id'];
    $comm = $_POST['comment'];
    $activity = $_POST['activity_id'];
    
    $qry= $dbConn->query("UPDATE `tbl_field_activities` SET `univ_assess_status`='1',`a_assess_comment`='$comm' WHERE student_id=$std and activity_id=$activity");
    if ($qry) {
      echo "done";
    }
    
  }
   $user = new User();
  ?>
<!--Page starts from Here-->
<div class="page-title">
  <div class="title_left">
    <h4 style="color: #025e8f;">FIELD ACTIVITIES CENTER</h4>
  </div>
  <span style="color: #025e8f;"><?php echo $timeComponent; ?></span>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <!-- navbar for The Register, Modify, Filter, Print and Search Functions of the Tasks Section -->
        <nav style="background-color: #025e8f;">
          <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-3">
              <ul class="nav navbar-nav navbar-right">
                <?php if($_SESSION['user_type_name'] == 2){ ?>
                <!-- <?php if($hide_task){ ?> -->
                <!--  <li class="">
                  <a href="#" onClick="edit_records(event, '<?php _link();?>doTask');" class="glyphicon glyphicon-upload" aria-hidden="false">&nbsp;Submit-Task</a>
                  </li>  -->         
                <!--       <?php }else{ ?> -->
                <li class="">
                  <a class="glyphicon glyphicon-upload" aria-hidden="false">&nbsp;Submit-Task</a>
                </li>
                <!--    <?php } ?> -->
                <?php } ?>
                <?php if($_SESSION['user_type_name'] == 2){ ?>  
                <li class="">
                  <a href="<?php _link(); ?>fieldActivityAdd" class="glyphicon glyphicon-plus" aria-hidden="false">&nbsp;New</a>
                </li>
                <li class="">
                  <a href="#" onClick="edit_records(event, '<?php _link();?>taskStatus');" class="glyphicon glyphicon-pencil" aria-hidden="false">&nbsp;Check-Status</a>
                </li>
                <li class="">
                  <a href="#" onClick="delete_records(event, '<?php _link();?>activityDelete');" class="glyphicon glyphicon-trash" aria-hidden="false">&nbsp;Delete</a>
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
                if ($_SESSION['user_type_name']==5) {
                  $std = $_GET['id'];
                  $resActivity =  dbQuery("SELECT t.*, s.* FROM tbl_field_activities t JOIN tbl_session s on t.session_id = s.session_id where t.student_id=$std");
                }
                elseif ($_SESSION['user_type_name']==2){
                  $uid = $_SESSION['user_id'];
                
                  $resActivity =  dbQuery("SELECT t.*, s.*, u.* FROM tbl_field_activities t JOIN tbl_session s on t.session_id = s.session_id join tbl_student u on u.student_id=t.student_id where u.user_id=$uid");
                
                }elseif ($_SESSION['user_type_name']==4) {
                  $std = $_GET['id'];
                  $resActivity =  dbQuery("SELECT t.*, s.* FROM tbl_field_activities t JOIN tbl_session s on t.session_id = s.session_id where t.student_id=$std");
                }
                  
                  
                  $count = dbNumRows($resActivity);
                  while($row=mysqli_fetch_array($resActivity)){               
                
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
        <?php }?>
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
<script>
  function showform() {
    console.log("show form");
        var v = document.getElementById("frm-save");
        var m = document.getElementById("comm");
  
        // console.log(m);
        if (v.style.display === "none") {
           v.style.display = "block";
           m.style.display = "none";      
     }
   }
     
    
</script>