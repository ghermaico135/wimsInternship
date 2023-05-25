<link href="css/bootstrap-imageupload.css" rel="stylesheet">
<script src="js/bootstrap-imageupload.js"></script>
<style type="text/css">
  /*CSS Code goes Here*/
  .vatar .krajee-default.file-preview-frame,.vatar .krajee-default.file-preview-frame:hover {
  margin: 0;
  padding: 0;
  border: none;
  box-shadow: none;
  text-align: center;
  }
  .vatar {
  display: inline-block;
  }
  .vatar .file-input {
  display: table-cell;
  width: 213px;
  }
  .Required {
  color: red;
  font-family: monospace;
  font-weight: normal;
  }
</style>
<!-- /*CSS Code Ends Here*/ -->
<?php
  /*<!-- =======================================================
  Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
  Website URL: 
  Author:
  ======================================================= -->
  */
  
  $userId = $_GET['id']; 
  $userDetails = dbFetchArray(dbQuery("SELECT * FROM `tbl_user` WHERE `user_id`='$userId'"));
  ?>
<div class="page-title">
  <div class="title_left">
    <h4>Greetings...! <?php echo $userDetails[2]; ?></h4>
  </div>
  <?php echo $timeComponent; ?>
</div>
<div class="clearfix"></div>
<div class="row">
  <!-- update -->
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title no-padding">
        <h4>COMPLETE YOUR USER PROFILE</h4>
      </div>
      <div class="x_content">
        <?php
          if(isProfileComplete())
          //if(0)
          {
          	
          	successMsg('Account already completed.Please Login Again.');
          	goToPage("dashboard");
          }
          
          if (isset($_POST['update'])) {
          	require "Image.php";
          	
                          			
          	if(isset($_POST['userAccess'])){
          		$phone = sqlEscape($_POST['phone']);
          		if($_POST['userAccess']== "lecturer"){
          			
          			if(1){
          				$image = new Image();
          				$image->upload("avatar", "uploads");						
          				
          				if($image->isError()){
          					$image_link = @$image->imageLink();
          				}else{
          					$error[] = $image->errorMessage();
          				}
          			}
          			
          			
          			$usertype = sqlEscape($_POST['usertype']);
          			$dept = sqlEscape($_POST['dept']);
          			$lecture_id = sqlEscape($_POST['lecture_id']);
          			$description = sqlEscape($_POST['description']);
          			
          			if($usertype == 4) { #University Supervisor - inserted into tbl_staff
          				$utype = 4;//Inserted into tbl_user
          			}
          			elseif($usertype == 5) { #Field Supervisor - inserted into tbl_staff
          					$utype = 5; //inserted into tbl_user
          			}
          			elseif($usertype == 3){   #Coordinator - inserted into tbl_staff
          				$utype = 3;  //inserted into tbl_user
          			}
          			elseif($usertype == 0){   # - inserted into tbl_staff
          				$utype = 2;  //inserted into tbl_user
          			}
          			
          			
          			$insert = dbQuery("INSERT INTO `tbl_staff`(`staff_id`, `user_id`, `userType`, `dept_id`, `lecturer_id`, `staff_description`) VALUES (NULL,'$userId','$usertype','$dept','$lecture_id','$description'); ");
          
          			
          			//$utype = $usertype;
          			
          		}elseif($_POST['userAccess']== "student"){
          			$utype = '2';					
          			
          			
          			$course = sqlEscape($_POST['course']);
          			$student_number = sqlEscape($_POST['student_number']);
          			$year = sqlEscape($_POST['year']);
          			$avatar = sqlEscape($_POST['avatar']);
          			$error = array();
          		
          			
          			if(empty($error)){
          				if(1){
          					$image = new Image();
          					$image->upload("avatar", "uploads");						
          					
          					if($image->isError()){
          						$image_link = @$image->imageLink();
          					}else{
          						$error[] = $image->errorMessage();
          					}
          				}
          				
          				if(empty($error)){
          
          					$insert2 = dbQuery("INSERT INTO `tbl_student`(`user_id`, `student_number`, `course_id`, `year_id`, `academic_id`,`field_sup`) VALUES ('$userId','$student_number','$course','$year', '0','0')");
                    if ($insert2) {
                      $_SESSION['user_type_name']=2;
                    }
          				}
          			}
          			
          			goToPage("dashboard");
          			
          		}
          	}
                          
          	if(empty($error)){ 
          
          		$update = dbQuery("UPDATE `tbl_user` SET avatar = '$image_link', user_type = '$utype', telephone='$phone' WHERE `user_id`='$userId'");
          
          			$_SESSION['user_type_name'] = $utype; 
          
          		if($update){
          			#header("location:index.php?page=completeProfile&&id=".$userId);
          		}
          	}
                      }
                      ?>
        <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-4 text-center">
              <div class="vatar">
                <div class="file-loading">
                  <div class="imageupload panel panel-default">
                    <div class="panel-heading clearfix">
                      <h3 class="panel-title pull-left">Upload Profile Photo</h3>
                    </div>
                    <div class="file-tab panel-body">
                      <label class="btn btn-default btn-file">
                        <span>Browse</span>
                        <!-- The file is stored here. -->
                        <input type="file" name="avatar">
                      </label>
                      <button type="button" class="btn btn-default">Remove</button>
                    </div>
                  </div>
                  <!-- bootstrap-imageupload method buttons. -->
                  <button type="button" id="imageupload-disable" class="btn btn-danger">Disable</button>
                  <button type="button" id="imageupload-enable" class="btn btn-success">Enable</button>
                  <button type="button" id="imageupload-reset" class="btn btn-primary">Reset</button>                   
                </div>
              </div>
              <div class="vatar-hint"><small>Select file < 1500 KB</small></div>
            </div>
            <div class="col-sm-8">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="email">Email Address<span class="Required">*</span></label>
                    <input type="email" class="form-control" name="email" value="<?php echo $userDetails[2]; ?>" required="required" disabled="disabled">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="pwd">Names<span class="Required">*</span></label>
                    <input type="text" class="form-control" name="fullnames" value="<?php echo $userDetails[1]; ?>" required="required" disabled="disabled">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="phone" class="form-control" name="phone" required="required" placeholder="Telephone">
                  </div>
                </div>
                <input type="hidden" class="form-control" name="updated_at" required="required">
                <div class="col-sm-6">
                  <div class="form-group">
                    <?php if ($_SESSION['user_type_name']==4):?>
                      
                    <br>
                    <p>Supervisor Section</p>
                    <hr/>
                    <input type="hidden" value="lecturer" name="userAccess"/>
                    <section id="lecturer" style="" >
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="Lecturer ID">Lecturer ID</label>
                            <input type="text" class="form-control" name="lecture_id" id="lecture_id" >
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="Department">Department</label>
                            <select name="dept" class="form-control col-md-7 col-xs-12">
                            <?php
                              $queryDept = dbQuery("SELECT dept_id, dept_name FROM tbl_dept");
                              while ($row = dbFetchAssoc($queryDept)) {
                              	echo '<option value="'. $row["dept_id"] .'">'. $row["dept_name"] .'</option>';
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="Lecture Description">Lecture Description</label>
                            <input type="text" class="form-control" name="description">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="UserType">UserType</label>
                            <select name="usertype" id="xls" onchange="return idCreator();" class="form-control col-md-7 col-xs-12">
                              <option value=""></option>
                              <?php
                                $queryUserType = dbQuery("SELECT ut_id, ut_name FROM tbl_usertype WHERE ut_id != 4");
                                while ($row = dbFetchAssoc($queryUserType)) {
                                	echo '<option value="'. $row["ut_id"] .'">'. $row["ut_name"] .'</option>';
                                }
                                ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <script type="text/javascript">
                        function idCreator(){
                        
                        	var xls = document.getElementById("xls");						
                        var als = xls.options[xls.selectedIndex].value;
                        	var request;
                        if (window.XMLHttpRequest){//for Chrome, Firefox, IE7+, Opera, Safari
                        request = new XMLHttpRequest();
                        }
                        else{//for IE5, IE6
                        request = new ActiveXObject("Microsoft.XMLHTTP");
                        }	
                        request.open("POST", "idCreator.php", true);
                        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
                        
                        request.onreadystatechange = function() {
                        if(request.readyState == 4 && request.status == 200) {
                        //4 = The connection is complete, the data was sent or retrieved.
                        //200 = The file has been retrieved and you are free to do something with it
                        
                        document.getElementById("lecture_id").value = request.responseText;
                        
                        }
                        }
                        
                        request.send("als="+als);
                        }
                      </script>
                    </section>
                    <?php elseif ($_SESSION['user_type_name']==0):?>
                    <p>Student Section</p>
                    <hr/>
                    <input type="hidden" value="student" name="userAccess"/>
                    <section id="student" style="" >
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="lname">Student Number</label>
                            <input type="text" maxlength="25" class="form-control" pattern="^([A-Za-z]{2}-?[A-Za-z]{3}-?[0-9]{4}-?[0-9]{4})?([A-Za-z]{2}-?[A-Za-z]{4}-?[0-9]{4}-?[0-9]{5})?([A-Za-z]{2}-?[A-Za-z]{4}-?[0-9]{5}-?[0-9]{4})?([A-Za-z]{2}-?[A-Za-z]{3}-?[0-9]{4}-?[0-9]{5})?([A-Za-z]{2}-?[A-Za-z]{3}-?[0-9]{5}-?[0-9]{4})?([A-Za-z]{2}-?[A-Za-z]{4}-?[0-9]{4}-?[0-9]{4})?$" title="Enter Vailid StudetnNumber for Victoria University." name="student_number">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="Course">Course</label>
                            <select name="course" class="form-control col-md-7 col-xs-12" >
                              <option value="">Select Course</option>
                              <?php
                                $queryCourse = dbQuery("SELECT course_id, course_name FROM tbl_course");
                                while ($row = dbFetchAssoc($queryCourse)) {
                                	echo '<option value="'. $row["course_id"] .'">'. $row["course_name"] .'</option>';
                                }
                                ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="Student's Academic Year">Academic Year</label>
                            <select name="year" id="loadedYears" class="form-control" >
                              <option value="">Select Year</option>
                              <?php
                                $queryAcademicYear = dbQuery("SELECT `year_id`, `year_name` FROM `tbl_academic_year`");
                                while ($row = dbFetchAssoc($queryAcademicYear)) {
                                	echo '<option value="'. $row["year_id"] .'">'. $row["year_name"] .'</option>';
                                }
                                ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </section>
                    <?php endif ?>				
                  </div>
                </div>
              </div>
              <div class="form-group">
                <hr>
                <div class="text-right"> 
                  <button class="btn btn-primary" type="reset">Reset</button>
                  <button type="submit" name="update" class="btn btn-success">Complete Your Profile</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        </span>
      </div>
    </div>
  </div>
  <!-- end update --->
</div>
<!-- JS CODE -->
<script>
  var $imageupload = $('.imageupload');
            $imageupload.imageupload();
  
            $('#imageupload-disable').on('click', function() {
                $imageupload.imageupload('disable');
                $(this).blur();
            })
  
            $('#imageupload-enable').on('click', function() {
                $imageupload.imageupload('enable');
                $(this).blur();
            })
  
            $('#imageupload-reset').on('click', function() {
                $imageupload.imageupload('reset');
                $(this).blur();
            });
</script>