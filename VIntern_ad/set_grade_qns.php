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

  if (isset($_POST['qn-btn'])) {
    $qn = $_POST['qn'];
    $user = $_POST['user'];
    $qry = "INSERT INTO `intern_assess`(`id`, `question`, `created_by`, `type`) VALUES (Null,'$qn','$user','1')";
    $res = $dbConn->query($qry);
    if ($res) {
      echo "Assessment successfully Added";
      header("location: index.php?page=set_grade_qns");
    }
  }
  
  ?>
<script>
   function showOrHideDiv() {
      var v = document.getElementById("btn-ss");
      var m = document.getElementById("btn-ff");
      if (m.style.display === "none") {
         m.style.display = "block";
         v.style.display = "none";
      } else {
         m.style.display = "none";
         v.style.display === "block"
      }
   }
   function showDiv() {
      var v = document.getElementById("btn-ss");
      var m = document.getElementById("btn-ff");
      if (v.style.display === "none") {
         v.style.display = "block";
         m.style.display = "none";

         
      } else {
         v.style.display = "none";
         m.style.display = "block";
         
      }
   }
</script>
<!--Page starts from Here-->
<div class="page-title">
  <div class="title_left">
    <h4 style="color: #025e8f;">SET COMMENTS</h4>
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
                <li class="">
                  <a href="#" class="glyphicon glyphicon-plus" aria-hidden="false">&nbsp;Set Comments</a>
                </li>
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
                  <section class="content">
                    <div class="container-fluid">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card card-outline card-success">
                              <div >
                                <div class="card-body ui-sortable">
                                  <?php 
                                  $qry = $dbConn->query("SELECT I.*, t.ut_name FROM intern_assess I join tbl_usertype t on t.ut_id=I.created_by");
                                  while ($row=mysqli_fetch_array($qry)) {
                                    
                                  ?>
                                  <div class="callout callout-info ui-sortable-handle">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <span class="dropleft float-right">
                                          <a class="fa fa-ellipsis-v text-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                          <div class="dropdown-menu" style="">
                                            
                                            
  <a href="index.php?page=qn_delete&id=<?php echo $row['id'] ?>" class="dropdown-item delete_question text-dark" >
   Delete</a>
                                          </div>
                                        </span>
                                      </div>
                                    </div>
                                    <h5 style="text-align: center;"><?php echo $row['question']; ?></h5>
                                    <p>(<?php echo $row['ut_name']; ?>)</p>
                                  </div>
                                <?php } ?>
                                </div>
                                <div class="row">        </div>
                              </div>
                              <div id="Qn-div">
                              </div>
                              <div id="btn-ff" style="display: none;">
                                <form method="POST">
                                <div class="col-md-8 border-right">
                                  <div class="form-group">
                                    <label class="control-label">Assess</label>
                                    <input type="text" class="form-control form-control-sm" name="qn" value="" required>    
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="control-label">User Type</label>
                                    <select name="user" class="form-control" required="required">
                                      <option value="">Select User Type </option>
                                      <option value="3">Coordinator</option>
                                      <option value="4">University Supervisor</option>
                                      <option value="5">Company Field Supervisor</option>
                                      
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-12 text-right justify-content-center d-flex">
                                  <button type="submit" class="btn btn-primary mr-2"name="qn-btn" >Save</button>
                                  <button class="btn btn-secondary" type="button" onclick="showDiv()">Cancel</button>
                                </div>
                              </form>
                              </div>
                              
                              <button onclick="showOrHideDiv()" type="button" name="newbtn" id="btn-ss" class="btn btn-primary">Add New</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--/. container-fluid -->
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>