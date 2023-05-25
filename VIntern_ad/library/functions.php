<?php
/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author: 
======================================================= -->
 */

function checkUser() { 
    // if user is not loggedin, redirect to Index page
    if (!isset($_SESSION['user_id'])) {
        header('location: ../');
        exit;
    } 

    // logout user
    if (isset($_GET['logout'])) {
        doLogout();
    }
}
function hasAcademic($studet_id){
    $qry= "SELECT s.*, t.* from tbl_student s JOIN tbl_academic_supervisor t on s.academic_id=t.academic_id WHERE s.student_id=$studet_id;";
    $res = dbQuery($qry);
    if ($res->num_rows>0) {
        $result = mysqli_fetch_array($res);
        $acname = $result['academic_fname'].' '.$result['academic_lname'];
       return $acname;
    }else{
        return false;
    }

}
function hasField($studet_id){
    $qry= "SELECT * FROM tbl_field_supervisor WHERE student_id=$studet_id";
    $res = dbQuery($qry);
    if ($res->num_rows>0) {
        $result = mysqli_fetch_array($res);
        $acname = $result['supervisor_name'];
       return $acname;
    }else{
        return false;
    }

}
function getUserType($input){
	if($input == "1") # 1 is the user_type in tbl_user
		return "Lecturer";
    elseif($input == 2) # 2 is the user_type in tbl_user and the records are for a student
		return "Student";
	elseif($input == 3) # 3 is the user_type in tbl_user
		return "Cordinator";
	elseif($input == 4) # 4 is the user_type in tbl_user
		return "University Supervisor";
	elseif($input == 5) # 5 is the user_type in tbl_user
		return "Field Supervisor";
    elseif($input == 10) # 10 is the user_type in tbl_user
        return "Administrator";
	
	
}
function doLogin() {

    // if we find an error message, save it in a variable    
    
    $errorMessage = '';
    $user_email = sqlEscape($_POST['user_email']);
    $user_password = sqlEscape($_POST['user_password']);

    if ($user_email == '' || $user_password == '') {
        $errorMessage = 'Both UserEmail and Password are needed to Proceed';
    } else {

        $PassWord = sha1($user_password);
        $sql = "SELECT * FROM `tbl_user` WHERE `email`='$user_email' AND `password`='$PassWord'";
        
        $result = dbQuery($sql);

        if (dbNumRows($result) > 0) {
            
            $row = dbFetchAssoc($result);

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            // user last login
            
            header('location: /VIntern/VIntern_ad');
            
        } else {
            $errorMessage = 'The Username or Password Entered are Wrong';
        }
    }
    return $errorMessage;
}

function _link() {
    echo 'index.php?page=';
}

function doLogout() {
    if (isset($_SESSION['user_id'])) {
        session_destroy();
    }
    header('location:../index.php');
    exit();
}

// Select dropdown from database
function dropDowns($table, $placeHolder) {
    echo '<option value =""> Select ' . $placeHolder . ' </option>';
    $result = dbQuery("SELECT * FROM $table");
    while ($row = dbFetchArray($result)) {
        echo "<option value='$row[0]'> $row[1]</option>";
    }
}

// get name from another table
function getIdName($id, $table, $columnName, $columnId) {
    $row = dbFetchArray(dbQuery("SELECT $columnName, $columnId FROM $table WHERE $columnId=$id"));
    $name = $row[0];
    return $name;
}

// get name from another table
function getdept($id) {
    $row = dbFetchArray(dbQuery("SELECT dept_name FROM tbl_dept WHERE dept_id=$id"));
    $name = $row[0];
    return $name;
}

// get name from another table
function getUserIdFromStaff($id) {
    $row = dbFetchArray(dbQuery("SELECT user_id FROM tbl_staff WHERE staff_id=$id"));
    $name = $row[0];
    return $name;
}

function isMailThere($email){
    $x = dbQuery("SELECT * FROM tbl_mail WHERE mail_address='$email'");
    
    if(dbNumRows($x) >= 1){
        return true;
    }else{
        return false;
    }
}

function getUserDeptFromStaff($id) {
    $row = dbFetchArray(dbQuery("SELECT dept_id FROM tbl_staff WHERE user_id=$id"));
    $name = $row[0];
    return $name;
}

function successMsg($msg) {
    echo'<div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
        
        <strong>Success :</strong> ' . $msg . '
        </div>';
}

function errorMsg($msg) {
    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    
                    <strong>Error :</strong> ' . $msg . '
                  </div>';
}

function warningMsg($msg) {
    echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Warning :</strong> ' . $msg . '
                  </div>';
}

function _system($name) {
    $system_option = array(
        'name' => 'vIntern || WIMS',
        'org' => 'vIntern || FACULTY OF SCENCE AND TECHNOLOGY',
        'slogan' => 'Come prepared to learn, Leave prepared to succeed',
        'developer' => 'MIKE ',
        'copyright' => '&copy; INTERNSHIP MANAGEMENT SYSTEM'
    );
    echo $system_option[$name];
}


function chkExist($table, $column, $chkValue) {
    $number = dbNumRows(dbQuery("SELECT $column FROM $table WHERE $column ='$chkValue'"));
    return $number;
}

function redWord($msg) {
    echo "<div style='color:red;'>" . $msg . "</div>";
}

function greenWord($msg) {
    echo "<div style='color:green;'>" . $msg . "</div>";
}

function goToPage($page) {
    return header("refresh:1;url=index.php?page=" . $page);
}

function readMoreFormat($msg){
    $post = substr($msg, 0, 200);
    echo $post." ...";
}

function generateId($id) {
    return $id;
}
function user_id(){
	return @$_SESSION['user_id'];
}

function isProfileComplete(){
	$userId = $_SESSION['user_id'];
	$select = dbQuery("SELECT * FROM tbl_user WHERE user_type >= 1 and user_id = '$userId'");
	$row = dbFetchAssoc($select);
	if($rowcount = dbNumRows($select)){
		return true;
	}else{
		return false;
	}
}
function getYearName($id){
	
	$select = dbQuery("SELECT `year_name` FROM `tbl_academic_year` WHERE student_id = '$id'");
	$row = dbFetchAssoc($select);
	return $row['year_name'];
}
function userGroup(){
	$user_id = user_id();
	
	$select = dbQuery("SELECT student_id FROM tbl_user, tbl_student WHERE tbl_student.user_id = tbl_user.user_id AND tbl_user.user_id = '$user_id'");
	$row = dbFetchAssoc($select);
	return @$row['student_id'];
}
function userGroupByID($user_id){
	//$user_id = user_id();
	$select = dbQuery("SELECT student_id FROM tbl_user, tbl_student WHERE tbl_student.user_id = tbl_user.user_id AND tbl_user.user_id = '$user_id'");
	$row = dbFetchAssoc($select);
	return @$row['student_id'];
}

function stdtName(){
    $stdt = userGroup();
    
    $stdt = dbQuery("SELECT * FROM tbl_user, tbl_student WHERE tbl_student.user_id = tbl_user.user_id AND tbl_student.student_id = $stdt");

    $row = dbFetchAssoc($stdt);
    return @$row['name'];
}




function getUserName($id){ 
	
	$select = dbQuery("SELECT name FROM tbl_user WHERE user_id = '$id'");
	$row = dbFetchAssoc($select);
	return $row['name'];
}

function getStaffName($id){
    
    $selectStaff = dbQuery("SELECT tbl_user.name FROM tbl_user, tbl_staff WHERE tbl_staff.user_id = tbl_user.user_id");
    $row = dbFetchAssoc($selectStaff);
    return $row['name'];
}




function isCordinator(){
	if($_SESSION['user_type_name']==4){
		return true;
	}else{
		return false;
	}
}
function isOnline($id){
    $select = dbQuery("SELECT user_status FROM tbl_user WHERE user_id = '$id'");
    $row = dbFetchAssoc($select);
    return $row['user_status'];
}
function isCordinatorById($id){
    $select = dbQuery("SELECT user_type FROM tbl_user WHERE user_id = '$id'");
    $row = dbFetchAssoc($select);
    return $row['user_type'];
}
function getSupervisorId($student_id){
	$select = dbQuery("SELECT `field_id` FROM `tbl_field_activities` WHERE `student_id` = '$student_id'");
	$row = dbFetchAssoc($select);
	if(empty($row['field_id']))
        return 0;
    else
        return $row['field_id'];
}

function getFSupervisorId($student_id){
    $select = dbQuery("SELECT `field_id` FROM `tbl_field_activities` WHERE `student_id` = '$student_id'");
    $row = dbFetchAssoc($select);
    if(empty($row['field_id']))
        return 0;
    else
        return $row['field_id'];
}

function getASupervisorId($student_id){
    $select = dbQuery("SELECT `academic_id` FROM `tbl_field_activities` WHERE `student_id` = '$student_id'");
    $row = dbFetchAssoc($select);
    if(empty($row['academic_id']))
        return 0;
    else
        return $row['academic_id'];
}

function getSupervisorGroup($user_id){
    $select = dbQuery("SELECT student_id FROM tbl_project WHERE supervised_by = '$user_id'");
    $row = dbFetchAssoc($select);
    if(empty($row['student_id']))
        return 0;
    else
        return $row['student_id'];
}

function isGraded($project_id){
    $user_id = user_id();
    $select = dbQuery("SELECT * FROM tbl_projectmarks WHERE panelist_id = '$user_id' AND project_id = '$project_id'");
    $sel = dbFetchAssoc($select);
   if(dbNumRows($select)>=1){
        return true;
   }else{
        return false;
   }
}




/*New Task  Reminder / Notification section is here below*/
   $usergroup = userGroup();
   $queryTask = dbQuery("SELECT *, 'You have a new task from the Supervisor' AS message FROM `tbl_task` WHERE staff_id = '$usergroup'");   

 /*Function for calculating 5 days before project and task deadline */

   function day_calculator($end_date){
    $date_now = time();
    $project_end_date = strtotime($end_date);
    $trigger = 15*24*60*60; //converting 5days to seconds

    if($project_end_date-$trigger == $date_now){
        return true;
    }else{
        return false;
    }
}
    $usergroup = userGroup();
   $queryProjectDeadline = dbQuery( "SELECT end_date FROM tbl_project WHERE project_id = '$usergroup'");
     $to_remind = 0;
     while($remind = dbFetchAssoc($queryProjectDeadline)){
          if(day_calculator($remind['end_date'])){
              $to_remind++;
    }
}


/*Task Deadline Reminder*/

function day_calculator_($end_date){
    $date_now_ = time();
    $task_end_date = strtotime($end_date);
    $trigger_ = 5*24*60*60; //converting 5days to seconds

    if($task_end_date-$trigger_ <= $date_now_){
        return true;
    }else{
        return false;
    }
}

$usergroup = userGroup();
   $queryTaskDeadline = dbQuery( "SELECT end_date FROM tbl_task WHERE staff_id = '$usergroup'");
     $to_Task_remind = 0;
     while($remind_ = dbFetchAssoc($queryTaskDeadline)){
          if(day_calculator_($remind_['end_date'])){
              $to_Task_remind++;
    }
}
?> 