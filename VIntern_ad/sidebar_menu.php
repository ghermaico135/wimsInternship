<?php
  /*<!-- =======================================================
  Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
  Website URL: 
  Author:
  ======================================================= -->
  */ 
  ?>
<script type="text/javascript">
  var i = 1;
  $(document).ready(function() {
   checknotifx();
   setInterval(function(){ checknotifx(); }, 100);
  });
  
  function checknotifx(){
    //alert("Hello world");
    var pidx = document.getElementById("unread");   
    
    var request;
    if (window.XMLHttpRequest){//for Chrome, Firefox, IE7+, Opera, Safari
      request = new XMLHttpRequest();
    }
    else{//for IE5, IE6
      request = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    request.open("POST", "unreadloader.php", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
  
    request.onreadystatechange = function() {
      if(request.readyState == 4 && request.status == 200) {
        //4 = The connection is complete, the data was sent or retrieved.
        //200 = The file has been retrieved and you are free to do something with it
        
        pidx.innerHTML = request.responseText;
      }
    }
  
    request.send();
    
  }
</script>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">

<?php if ($_SESSION['user_type_name']==7 || $_SESSION['user_type_name']==10):?>
  <li>
    <a href="<?php _link(); ?>dashboard"><i class="fa fa-home green"></i>&nbsp;Dashboard</a>
  </li>

<?php else: ?>
      <li>
        <a href="<?php _link(); ?>dashboard"><i class="fa fa-home green"></i>&nbsp;Dashboard</a>
      </li>
      <!--Dashboard section -->

<?php if ($_SESSION['user_type_name']==2):?><!-- 
student -->
<li>
  <a href="<?php _link(); ?>company"><i class="fa fa-bars red"></i>&nbsp;Company Details</a>
</li>
<li class="">
  <a href="<?php _link(); ?>updates"><i class="fa fa-external-link green"></i>&nbsp;Notifications<span class="right badge"><?php echo @dbNumRows($queryTask); ?></span></a>
</li>
<li class="">
  <a href="<?php _link(); ?>dailyActivities"><i class="fa fa-tasks"></i>&nbsp;Daily Activities</a>
</li>
<li>
  <a href="<?php _link(); ?>fieldSup"><i class="fa fa-users red"></i>&nbsp;Field Supervisor</a>
</li>
<li>
  <a href="<?php _link(); ?>academicSup"><i class="fa fa-user-plus blue"></i>&nbsp;Academic Supervisor</a>
</li>
<?php elseif ($_SESSION['user_type_name']==3):?><!-- coordinator -->
<li>
  <a href="<?php _link(); ?>student"><i class="fa fa-male blue"></i>&nbsp;Student</a>
</li>
<li>
  <a href="<?php _link(); ?>company"><i class="fa fa-bars red"></i>&nbsp;Company Details</a>
</li>
<li class="">
  <a><i class="fa fa-book blue"></i>&nbsp;Grade Students<span class="fa fa-chevron-down"></span></a> 
  <!-- Users Setting Section  -->
  <ul class="nav child_menu">
    <!-- Department List Contents-->
    <li>
      <a href="<?php _link(); ?>set_grade_qns"><i class="fa fa-pencil blue"></i>&nbsp;Set Grading Questions</a>
    </li>    
    
    <li>
      <a href="<?php _link(); ?>grade"><i class="fa fa-magic red"></i>&nbsp;Set Grades</a>
    </li>
  
    <!-- Course Details --> 
    <li>
      <a href="<?php _link(); ?>student_grade_list"><i class="fa fa-list-alt green"></i>&nbsp;Preview Grades</a>
    </li>      
    
  </ul>
</li>
<li>
  <a href="<?php _link(); ?>fieldSup"><i class="fa fa-users red"></i>&nbsp;Field Supervisor</a>
</li>
<li>
  <a href="<?php _link(); ?>academicSup"><i class="fa fa-user-plus blue"></i>&nbsp;Academic Supervisor</a>
</li>
<hr>
<li class="">
  <a><i class="fa fa-cogs silver"></i>&nbsp;Setting<span class="fa fa-chevron-down"></span></a> 
  <!-- Users Setting Section  -->
  <ul class="nav child_menu">
    <!-- Department List Contents-->    
    <li>
      <a href="<?php _link(); ?>dept_list"><i class="fa fa-list-ul blue"></i>&nbsp;Dept List</a>
    </li>
    <!-- Mailing List Contents-->    
    
    <li>
      <a href="<?php _link(); ?>mailing_list"><i class="fa fa-sliders red"></i>&nbsp;Mailing List</a>
    </li>
  
    <!-- Course Details --> 
    <li>
      <a href="<?php _link(); ?>listCourse"><i class="fa fa-list-alt green"></i>&nbsp;Course List</a>
    </li>
    
    <!-- Coordinators Section -->
    <li>
      <a href="<?php _link(); ?>coordinator"><i class="fa fa-user blue"></i>&nbsp;Coordinators</a>
    </li>
    
    <li>
      <a href="<?php _link(); ?>supervisor"><i class="fa fa-user green"></i>&nbsp;Supervisor List</a>
    </li>
    
  </ul>
</li>
<?php elseif ($_SESSION['user_type_name']==4):?><!-- supervisor -->
<li>
  <a href="<?php _link(); ?>student"><i class="fa fa-male blue"></i>&nbsp;Student</a>
</li>
<li>
  <a href="<?php _link(); ?>company"><i class="fa fa-bars red"></i>&nbsp;Company Details</a>
</li>
<li>
  <a href="<?php _link(); ?>academic_students"><i class="fa fa-tasks"></i>&nbsp;Students Daily Activities</a>
</li>
<li class="">
  <a><i class="fa fa-book blue"></i>&nbsp;Grade Students<span class="fa fa-chevron-down"></span></a> 
  <!-- Users Setting Section  -->
  <ul class="nav child_menu">
    <!-- Department List Contents-->
       
    
    <li>
      <a href="<?php _link(); ?>grade"><i class="fa fa-sliders red"></i>&nbsp;Set Grades</a>
    </li>
  
    <!-- Course Details --> 
    <li>
      <a href="<?php _link(); ?>student_grade_list"><i class="fa fa-list-alt green"></i>&nbsp;Preview Grades</a>
    </li>      
    
  </ul>
</li>
<li>
  <a href="<?php _link(); ?>fieldSup"><i class="fa fa-users red"></i>&nbsp;Field Supervisor</a>
</li>


<?php elseif ($_SESSION['user_type_name']==5):?><!-- field -->
<li>
  <a href="<?php _link(); ?>company"><i class="fa fa-bars red"></i>&nbsp;Company Details</a>
</li>
<li>
  <a href="<?php _link(); ?>student"><i class="fa fa-male blue"></i>&nbsp;Student</a>
</li>
<li>
  <a href="<?php _link(); ?>field_students"><i class="fa fa-tasks"></i>&nbsp;Daily Activities</a>
</li>
<li class="">
  <a><i class="fa fa-book blue"></i>&nbsp;Grade Students<span class="fa fa-chevron-down"></span></a> 
  <!-- Users Setting Section  -->
  <ul class="nav child_menu">
    <!-- Department List Contents-->
    
    <li>
      <a href="<?php _link(); ?>grade"><i class="fa fa-sliders red"></i>&nbsp;Set Grades</a>
    </li>
  
        
    
  </ul>
</li>

<?php endif ?>
<?php endif ?>
<li>
  <a href="index.php?logout"><i class="fa fa-tv"></i>&nbsp;Logout</a>
</li>
    </ul>
  </div>
</div>