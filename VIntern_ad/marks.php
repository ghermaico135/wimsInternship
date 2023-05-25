<?php
  /*<!-- =======================================================
  Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
  Website URL: 
  Author:
  ======================================================= -->
  */
   $user = new User();
  if(isset($_POST['submit']))
  {
  $student_id=$_POST['student_id']; 
  $answer = $_POST['answer'];
  $tt = $dbConn->query("SELECT * FROM intern_grade where by_='{$_SESSION["user_type_name"]}' and id =".$student_id)->fetch_array();
  if($tt){
    $already = true;
  }else{
    $already = false;
    foreach ($answer as $k => $v) {
      $nqry = $dbConn->query("INSERT INTO `intern_grade` (`id`, `student_id`, `intern_assess`, `marks`, `by_`, `user_id`) VALUES (NULL, '$student_id', '$k', '$v', '{$_SESSION["user_type_name"]}', '{$_SESSION["user_id"]}')");
  
  
    }
    if (isset($nqry)) {
      echo "Done";
    }
  }
  
    
  
  
  }
  
  ?>
<script>
  function getStudent(val) {
      $.ajax({
          type: "POST",
          url: "get_student.php",
          data:'classid1='+val,
          success: function(data){
              $("#grading").html(data);
              
          }
          });
  }       
</script>
<!--Page starts from Here-->
<div class="page-title">
  <div class="title_left">
    <h4 style="color: #025e8f;">STUDENT GRADING</h4>
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
              <ul class="nav navbar-nav">
                <div class="nav navbar-nav">

                
                <li >             
                  <a href="#"  class="" aria-hidden="false">&nbsp;Assign Student to marks</a>            
                </li>
              </div>
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <?php 
                    if ($_SESSION['user_type_name']==3):
                    ?>
                  <form class="form-horizontal" method="post">
                    <div class="form-group">
                      <label for="date" class="col-sm-2 control-label ">Student</label>
                      <div class="col-sm-10">
                        <?php 
                          $qry = "SELECT * FROM tbl_user WHERE user_type=2";
                          $res = $dbConn->query($qry);
                          ?>
                        <select name="student_id" class="form-control stid" id="studentid" required="required" onChange="getStudent(this.value);">
                          <option value="">Select Student </option>
                          <?php 
                            while($row=mysqli_fetch_array($res)){
                            ?>
                          <option value="<?php echo $row['user_id']?>"><?php echo $row['name']; ?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="">
                      <p for="date" class="col-sm-2 control-label ">Coordinator Grading</p>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-10">
                        <div id="reslt">
                        </div>
                      </div>
                    </div>
                    <div id="grading">
                    </div>
                    <div class="form-group" id="grading">
                    </div>
                  </form>
                  <?php elseif($_SESSION['user_type_name']==4): ?>
                  <form class="form-horizontal" method="post">
                    <div class="form-group">
                      <label for="date" class="col-sm-2 control-label ">Student</label>
                      <div class="col-sm-10">
                        <?php 
                          $email = $_SESSION['email'];
                          
                          $sup = "SELECT *  FROM tbl_academic_supervisor WHERE email='$email'";
                          
                          $res = $dbConn->query($sup);
                          while($row=mysqli_fetch_array($res)){
                            $std = $row['student_id'];
                          }

                          $std_user_id = "SELECT user_id  FROM tbl_student WHERE student_id='$std'";
                            $res = $dbConn->query($std_user_id);
                           
                          while($rown=mysqli_fetch_array($res)){
                             $user = $rown['user_id'];
                          };
                          
                          $std_user_id = "SELECT *  FROM tbl_user WHERE user_id='$user'";
                            $resooo = $dbConn->query($std_user_id);        
                          ?>
                        <select name="student_id" class="form-control stid" id="studentid" required="required" onChange="getStudent(this.value);">
                          <option value="">Select Student </option>
                          <?php 
                            while($row=mysqli_fetch_array($resooo)){
                            ?>
                          <option value="<?php echo $row['user_id']?>"><?php echo $row['name']; ?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="">
                      <p for="date" class="col-sm-2 control-label ">University Supervisor Grading</p>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-10">
                        <div id="reslt">
                        </div>
                      </div>
                    </div>
                    <div id="grading">
                    </div>
                    <div class="form-group" id="grading">
                    </div>
                  </form>
                  <?php elseif($_SESSION['user_type_name']==5): 
                    ?>
                  <form class="form-horizontal" method="post">
                    <div class="form-group">
                      <label for="date" class="col-sm-2 control-label ">Student</label>
                      <div class="col-sm-10">
                        <?php 
                          $user_email = "SELECT *  FROM tbl_user WHERE user_id=".$_SESSION['userSession'];
                          $r = $dbConn->query($user_email);
                          while($row=mysqli_fetch_array($r)){
                            $email = $row['email'];
                          }
                          
                          $sup = "SELECT *  FROM tbl_field_supervisor WHERE supervisor_email='$email'";
                          
                          $res = $dbConn->query($sup);
                          while($row=mysqli_fetch_array($res)){
                            $std = $row['student_id'];
                          }
                          $std_user_id = "SELECT user_id  FROM tbl_student WHERE student_id='$std'";
                            $res = $dbConn->query($std_user_id);
                           
                          while($rown=mysqli_fetch_array($res)){
                             $user = $rown['user_id'];
                          };
                          
                          $std_user_id = "SELECT *  FROM tbl_user WHERE user_id='$user'";
                            $resooo = $dbConn->query($std_user_id);        
                          ?>
                        <select name="student_id" class="form-control stid" id="studentid" required="required" onChange="getStudent(this.value);">
                          <option value="">Select Student </option>
                          <?php 
                            while($row=mysqli_fetch_array($resooo)){
                            ?>          
                          <option value="<?php echo $row['user_id']?>"><?php echo $row['name']; ?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="">
                      <p for="date" class="col-sm-2 control-label ">Field Supervisor Grading</p>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-10">
                        <div id="reslt">
                        </div>
                      </div>
                    </div>
                    <div id="grading">
                    </div>
                    <div class="form-group" id="grading">
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