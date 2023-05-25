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
              <ul class="nav navbar-nav navbar-right">
                <?php if(!$user->isCompanyAdded() && ($_SESSION['user_type_name']!=3)){ ?>
                <li class="">
                  <a href="<?php _link(); ?>companyAdd" class="glyphicon glyphicon-plus" aria-hidden="false">&nbsp;New</a>
                </li>
                <?php } ?>
                <?php if($_SESSION['user_type_name'] == 5 && ($_SESSION['user_type_name']!=3)){ ?>
                <li class="">
                  <a href="#" onClick="edit_records(event, '<?php _link();?>checkProgress');" class="glyphicon glyphicon-ok-circle" aria-hidden="false">&nbsp;Check-Progress</a>
                </li>
                <?php } ?>
                <?php if($_SESSION['user_type_name']!=3){ ?>
                <li class="">
                  <a href="<?php _link(); ?>session" class="glyphicon glyphicon-eye-open" aria-hidden="false">&nbsp;Session</a>
                </li>
                <li class="">
                  <a href="#" onClick="edit_records(event, '<?php _link();?>companyEdit');" class="glyphicon glyphicon-pencil" aria-hidden="false">&nbsp;Edit</a>
                </li>
                <?php } ?>
                <?php if($_SESSION['user_type_name'] == 5){ ?>
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
                             
                              <form action="" id="manage-sort">
                                <div class="card-body ui-sortable">
                                  <div class="callout callout-info ui-sortable-handle">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <span class="dropleft float-right">
                                          <a class="fa fa-ellipsis-v text-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                          <div class="dropdown-menu" style="">
                                            <a class="dropdown-item edit_question text-dark" href="javascript:void(0)" data-id="30">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete_question text-dark" href="javascript:void(0)" data-id="30">Delete</a>
                                          </div>
                                        </span>
                                      </div>
                                    </div>
                                    <h5>bbbbb</h5>
                                    
                                  </div>
                                  <div class="callout callout-info ui-sortable-handle">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <span class="dropleft float-right">
                                          <a class="fa fa-ellipsis-v text-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                          <div class="dropdown-menu" style="">
                                            <a class="dropdown-item edit_question text-dark" href="javascript:void(0)" data-id="33">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete_question text-dark" href="javascript:void(0)" data-id="33">Delete</a>
                                          </div>
                                        </span>
                                      </div>
                                    </div>
                                    <h5>kjasjsajdjksad</h5>
                                    
                                  </div>
                                  <div class="callout callout-info ui-sortable-handle">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <span class="dropleft float-right">
                                          <a class="fa fa-ellipsis-v text-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                          <div class="dropdown-menu" style="">
                                            <a class="dropdown-item edit_question text-dark" href="javascript:void(0)" data-id="15">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete_question text-dark" href="javascript:void(0)" data-id="15">Delete</a>
                                          </div>
                                        </span>
                                      </div>
                                    </div>
                                    <h5>what is the best place in the world?</h5>
                                    
                                  </div>
                                  <div class="callout callout-info ui-sortable-handle">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <span class="dropleft float-right">
                                          <a class="fa fa-ellipsis-v text-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                          <div class="dropdown-menu" style="">
                                            <a class="dropdown-item edit_question text-dark" href="javascript:void(0)" data-id="10">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete_question text-dark" href="javascript:void(0)" data-id="10">Delete</a>
                                          </div>
                                        </span>
                                      </div>
                                    </div>
                                    <h5>When was the earth created?</h5>
                                    
                                  </div>
                                  <div class="callout callout-info ui-sortable-handle">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <span class="dropleft float-right">
                                          <a class="fa fa-ellipsis-v text-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                          <div class="dropdown-menu" style="">
                                            <a class="dropdown-item edit_question text-dark" href="javascript:void(0)" data-id="11">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete_question text-dark" href="javascript:void(0)" data-id="11">Delete</a>
                                          </div>
                                        </span>
                                      </div>
                                    </div>
                                    <h5>In which year was a bible created</h5>
                                    
                                  </div>
                                  <div class="callout callout-info ui-sortable-handle">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <span class="dropleft float-right">
                                          <a class="fa fa-ellipsis-v text-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                          <div class="dropdown-menu" style="">
                                            <a class="dropdown-item edit_question text-dark" href="javascript:void(0)" data-id="12">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete_question text-dark" href="javascript:void(0)" data-id="12">Delete</a>
                                          </div>
                                        </span>
                                      </div>
                                    </div>
                                    <h3>What is the best place on earth</h3>
                                    <h5>coordinator</h5>
                                    
                                  </div>
                                </div>
                              </form>
                              
        <button type="button" name="newbtn" id="new_question" class="btn btn-primary">Add New</button>
      
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
            <div class="modal fade" id="uni_modal" role='dialog'>
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"></h5>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
