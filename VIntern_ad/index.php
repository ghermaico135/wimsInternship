<?php
ob_start();

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/ 

session_start(); 
require_once '../class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
    $user_home->redirect('../index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_user WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);





require_once 'library/config.php';
require_once 'library/functions.php';

checkUser();

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';

switch ($page) {

/*<!--contents on the addUse/ listUser/ updateUser section-->*/
    case 'addUser':
        $content = 'addUser.php';	
        $pageTitle = 'Add User';
        break;
    
    case 'listUsers':	
        $content = 'listUsers.php';
        $pageTitle = 'List of Users';
        break;
    
    case 'updateUser':
        $content = 'updateUser.php';
        $pageTitle = 'Update Your User';
        break;

    case 'assignAcad':
        $content = 'assignAcad.php';
        $pageTitle = 'Assign Academic Supervisor';
        break;
    case 'set_grade_qns':
        $content = 'set_grade_qns.php';
        $pageTitle = 'Set Grading questions';
        break;
    
    case 'updateUser_':
        $content = 'updateUser_.php';
        $pageTitle = 'Update Your User';
        break;

    case 'student_grade_list':
        $content = 'student_grade_list.php';
        $pageTitle = 'All students grades';
        break;

    case 'grade':
        $content = 'marks.php';
        $pageTitle = 'record student marks';
        break;
    case 'field_students':
        $content = 'stdfield.php';
        $pageTitle = 'Field Supervisor students';
        break;
    case 'academic_students':
        $content = 'stdacad.php';
        $pageTitle = 'Academic Supervisor students';
        break;

    case 'student_grades':
        $content = 'student_grades.php';
        $pageTitle = 'View Student Grades';
        break;

    case 'comments':
        $content = 'comments.php';
        $pageTitle = 'comment on student';
        break;

     case 'completeProfile':
        $content = 'completeProfile.php';
        $pageTitle = 'Complete Your User Profile';
        break;
	 case 'userGroup':
        $content = 'userGroup.php';
        $pageTitle = 'Complete Your User Profile';
        break;
	
	 case 'addGroup_':
        $content = 'addGroup_.php';
        $pageTitle = 'Add Group For Profile Completion';
        break;
		
	 case 'logout':
		$user_id = user_id();
        $update = $user_home->runQuery("UPDATE tbl_user SET user_status = 'Offline' WHERE user_id = '$user_id'");
		$update->execute();
		$content = 'logout.php';
        break;

    case 'viewPanel':
        $content = 'panel.php';
        $pageTitle = 'Panel-List For The Given Course';
        break;

    case 'deptEdit':
        $content = 'deptEdit.php';
        $pageTitle = 'Edit Department';
        break;

/*<!--Eending ....contents on the addUser/ listUser/ updateUser/completeProfile section-->*/

/*<!--contents on the addCourse/ listCourse/ updateCourse section-->*/
    case 'addCourse':
        $content = 'addCourse.php';   
        $pageTitle = 'Adding Course Section';
        break;
    
    case 'listCourse':   
        $content = 'listCourse.php';
        $pageTitle = 'View Course List';
        break;
    
    case 'updateCourse':
        $content = 'updateCourse.php';
        $pageTitle = 'Updating Course Details';
        break;
/*<!--Eending ....contents on the addCourse/ listCourse/ updateCourse section-->*/

/*<!--contents on the chatbox-->*/		
    case 'chatbox':
        $content = 'chatbox.php';
        $pageTitle = 'Updating Course Details';
        break;
/*<!--Eending ....contents on the addCourse/ listCourse/ updateCourse section-->*/

/*<!--contents on the addStudent/ listStudent/ updateStudent, editStudent section-->*/
    case 'company':
        $content = 'company.php';   
        $pageTitle = 'Company Records Section';
        break;
    
    case 'companyAdd':   
        $content = 'companyAdd.php';
        $pageTitle = 'Company Records Section';
        break;

    case 'companyEdit':   
        $content = 'companyEdit.php';
        $pageTitle = 'Edit Company Records Section';
        break;

    case 'updateCompany':   
        $content = 'updateCompany.php';
        $pageTitle = 'Update Company Records Section';
        break;

    case 'companyDelete':   
        $content = 'companyDelete.php';
        $pageTitle = 'Delete Company Records Section';
        break;
    case 'qn_delete':   
        $content = 'qn_delete.php';
        $pageTitle = 'Delete assessment';
        break;

/* End Contents of the Company*/

/*<!--contents on the Training Sessions Section-->*/
    case 'session':
        $content = 'session.php';   
        $pageTitle = 'Training Sessions Section';
        break;

    case 'sessionAdd':
        $content = 'sessionAdd.php';   
        $pageTitle = 'Recording Training Sessions Section';
        break;

    case 'sessionDelete':
        $content = 'sessionDelete.php';   
        $pageTitle = 'Delete the Selected Training Sessions';
        break;

    case 'sessionEdit':
        $content = 'sessionEdit.php';   
        $pageTitle = 'Modify the Selected Training Sessions';
        break;

    case 'sessionUpdate':
        $content = 'sessionUpdate.php';   
        $pageTitle = 'Update the Selected Training Sessions';
        break;

/*<!--contents on the Training Field Supervisor Section-->*/
    case 'fieldSup':
        $content = 'fieldSup.php';   
        $pageTitle = 'Company Field Supervisor Section';
        break;

    case 'fieldSupAdd':
        $content = 'fieldSupAdd.php';   
        $pageTitle = 'Recording Company Field Supervisor Section';
        break;

    case 'fieldSupDelete':
        $content = 'fieldSupDelete.php';   
        $pageTitle = 'Delete the Selected Company Field Supervisor';
        break;

    case 'fieldSupEdit':
        $content = 'fieldSupEdit.php';   
        $pageTitle = 'Modify the Selected Company Field Supervisor';
        break;

    case 'fieldSupUpdate':
        $content = 'fieldSupUpdate.php';   
        $pageTitle = 'Update the Selected Company Field Supervisor';
        break;

/* End of the Field Supervisor COntents */


/*<!--contents on the University Academic Supervisor Section-->*/
    case 'academicSup':
        $content = 'academicSup.php';   
        $pageTitle = 'University Academic Supervisor Section';
        break;

    case 'academicSupAdd':
        $content = 'academicSupAdd.php';   
        $pageTitle = 'Recording University Academic Supervisor Section';
        break;

    case 'academicSupDelete':
        $content = 'academicSupDelete.php';   
        $pageTitle = 'Delete the Selected University Academic Supervisor';
        break;

    case 'academicSupEdit':
        $content = 'academicSupEdit.php';   
        $pageTitle = 'Modify the Selected University Academic Supervisor';
        break;

    case 'academicSupUpdate':
        $content = 'academicSupUpdate.php';   
        $pageTitle = 'Update the Selected University Academic Supervisor';
        break;

/* End of the University Academic Supervisor COntents */

/*<!--contents on the addDailyTask/ listDailyTask/ updateDailyTask, editDailyTask section-->*/
    case 'dailyActivities':
        $content = 'tasks.php';   
        $pageTitle = 'Field Activities Section';
        break;
    
    case 'fieldActivityAdd':   
        $content = 'fieldActivityAdd.php';
        $pageTitle = 'Field Activities Section';
        break;

    case 'activtyEdit':   
        $content = 'activityEdit.php';
        $pageTitle = 'Modify the Selected Internship Activity Section';
        break;

    case 'activityDelete':   
        $content = 'activityDelete.php';
        $pageTitle = 'Delete Selected Internship Activity';
        break;

    case 'taskDetails':   
        $content = 'taskDetails.php';
        $pageTitle = 'Project Tasks Section';
        break;

    case 'taskProgress':   
        $content = 'taskProgress.php';
        $pageTitle = 'Project Tasks Section';
        break; 

    case 'doTask':   
        $content = 'doTask.php';
        $pageTitle = 'Project Tasks Section';
        break;    

    case 'updateTask_':
        $content = 'updateTask_.php';
        $pageTitle = 'Project Tasks Section';
        break;

    case 'taskStatus':   
        $content = 'taskStatus.php';
        $pageTitle = 'Project Tasks Section';
        break;    

    case 'updateTaskStatus':
        $content = 'updateTaskStatus.php';
        $pageTitle = 'Project Tasks Section';
        break;

    case 'updateTask':
        $content = 'updateTask.php';
        $pageTitle = 'Project Tasks Section';
        break;
/*<!--Eending ....contents on the addDailyTask/ listDailyTask/ updateDailyTask, editDailyTask section-->*/ 



/*<!--contents on the addStudent/ listStudent/ updateStudent, editStudent section-->*/
    case 'student':
        $content = 'student.php';   
        $pageTitle = 'Students Records Section';
        break;
    
    case 'studentAdd':   
        $content = 'studentAdd.php';
        $pageTitle = 'Students Records Section';
        break;

    case 'editStudent':   
        $content = 'editStudent.php';
        $pageTitle = 'Students Records Section';
        break;

    case 'studentDelete':   
        $content = 'studentDelete.php';
        $pageTitle = 'Students Records Section';
        break;
    case 'studentDetails':   
        $content = 'studentDetails.php';
        $pageTitle = 'Students Records Section';
        break;

    case 'viewProject':   
        $content = 'viewProject.php';
        $pageTitle = 'Students Records Section';
        break;    

    case 'updateStudent':
        $content = 'updateStudent.php';
        $pageTitle = 'Students Records Section';
        break;
/*<!--Eending ....contents on the addStudent/ listStudent/ updateStudent, editStudent section-->*/ 

/*<!--contents on the addProjectt/ listProject/ updateProject, editProject  section-->*/
    case 'projects':
        $content = 'project.php';   
        $pageTitle = 'Projects Section';
        break;
    
    case 'projectAdd':   
        $content = 'projectAdd.php';
        $pageTitle = 'Projects Section';
        break;

    case 'projectDetails':   
        $content = 'projectDetails.php';
        $pageTitle = 'Projects Section';
        break;

    case 'projectEdit':   
        $content = 'projectEdit.php';
        $pageTitle = 'Projects Section';
        break;

    case 'checkProgress':   
        $content = 'checkProgress.php';
        $pageTitle = 'Projects Section';
        break; 

    case 'projectDelete':   
        $content = 'projectDelete.php';
        $pageTitle = 'Projects Section';
        break;      

    case 'updateProject':
        $content = 'updateProject.php';
        $pageTitle = 'Projects Section';
        break;

    case 'updateProject_':
        $content = 'updateProject_.php';
        $pageTitle = 'Projects Section';
        break;

    case 'previousProject':
        $content = 'projectView.php';
        $pageTitle = 'Projects Section';
        break;

    case 'previousProjectDetails':
        $content = 'projectViewDetails.php';
        $pageTitle = 'Projects Section';
        break;


/*<!--Eending ....contents on the addProjectt/ listProject/ updateProject, editProject section-->*/ 

/*<!--contents on the addTask/ listTask/ updateTask, editTask section-->*/
    case 'tasks':
        $content = 'tasks.php';   
        $pageTitle = 'Project Tasks Section';
        break;
    
    case 'addTask':   
        $content = 'addTask.php';
        $pageTitle = 'Project Tasks Section';
        break;

    case 'taskEdit':   
        $content = 'taskEdit.php';
        $pageTitle = 'Project Tasks Section';
        break;

    case 'deleteTask':   
        $content = 'deleteTask.php';
        $pageTitle = 'Project Tasks Section';
        break;

    case 'taskDetails':   
        $content = 'taskDetails.php';
        $pageTitle = 'Project Tasks Section';
        break;

    case 'taskProgress':   
        $content = 'taskProgress.php';
        $pageTitle = 'Project Tasks Section';
        break; 

    case 'doTask':   
        $content = 'doTask.php';
        $pageTitle = 'Project Tasks Section';
        break;    

    case 'updateTask_':
        $content = 'updateTask_.php';
        $pageTitle = 'Project Tasks Section';
        break;

    case 'taskStatus':   
        $content = 'taskStatus.php';
        $pageTitle = 'Project Tasks Section';
        break;    

    case 'updateTaskStatus':
        $content = 'updateTaskStatus.php';
        $pageTitle = 'Project Tasks Section';
        break;

    case 'updateTask':
        $content = 'updateTask.php';
        $pageTitle = 'Project Tasks Section';
        break;
/*<!--Eending ....contents on the addTask/ listTask/ updateTask, editTask section-->*/ 



/*<!--contents on the addDept/ listDept/ updateDept, editDept section-->*/
    case 'dept_list':
        $content = 'dept_list.php';   
        $pageTitle = 'View College Departments';
        break;
    
    case 'deptAdd':   
        $content = 'deptAdd.php';
        $pageTitle = 'Add College Departments';
        break;

    case 'editDept':   
        $content = 'editDept.php';
        $pageTitle = 'Edit Departments Details';
        break;

    case 'deptDelete':   
        $content = 'deptDelete.php';
        $pageTitle = 'Edit Departments Details';
        break;
    
    case 'updateDept':
        $content = 'updateDept.php';
        $pageTitle = 'Updating Course Details';
        break;
/*<!--Eending ....contents on the addCourse/ listCourse/ updateCourse section-->*/ 

/*<!--contents on the addDept/ listPanelis/ updateDept, editDept section-->*/
    case 'panel_list':
        $content = 'panel_list.php';   
        $pageTitle = 'View Panelist Assigned to the Groups';
        break;
    
    case 'addPanel':   
        $content = 'addPanel.php';
        $pageTitle = 'Assign Panel to A given Group';
        break;

    case 'editPanel':   
        $content = 'editPanel.php';
        $pageTitle = 'Edit The Assigned Panel of Group';
        break;
    case 'panelDelete':   
        $content = 'panelDelete.php';
        $pageTitle = 'Edit The Assigned Panel of Group';
        break;
    
    case 'updatePanel':
        $content = 'updatePanel.php';
        $pageTitle = 'Updating Panel-List Details';
        break;

    case 'projectGrade':
        $content = 'projectGrade.php';
        $pageTitle = 'Assign Marks For THe Selected Project';
        break;
    case 'gradeProject':
        $content = 'gradeProject.php';
        $pageTitle = 'Assign Marks For THe Selected Project';
        break;
/*<!--Eending ....contents on the addPanel-list/ EditPanelist/ listPanelist/ updatePanelist section-->*/

/*<!--contents on the addGroup/ EditGroup/ listGroup/ updateGroup section-->*/
    case 'group':
        $content = 'group.php';   
        $pageTitle = 'Project Groups';
        break;
    
    case 'addGroup':   
        $content = 'addGroup.php';
        $pageTitle = 'Project Groups';
        break;

    case 'editGroup':   
        $content = 'editGroup.php';
        $pageTitle = 'Project Groups';
        break;

    case 'groupDelete':   
        $content = 'groupDelete.php';
        $pageTitle = 'Project Groups';
        break;
    
    case 'updateGroup':
        $content = 'updateGroup.php';
        $pageTitle = 'Project Groups';
        break;
/*<!--Eending ....contents on the addGroup/ EditGroup/ listGroup/ updateGroup section-->*/


/*<!--the Mailing List/ Edit Mailing List/ Delete Mailing List/ update Mailing List section-->*/
    case 'mailing_list':
        $content = 'mailing_list.php';   
        $pageTitle = 'Administrator Mail List';
        break;
    
    case 'addMail':   
        $content = 'addMail.php';
        $pageTitle = 'Administrator Mail List';
        break;

    case 'editMail':   
        $content = 'editMail.php';
        $pageTitle = 'Administrator Mail List';
        break;

    case 'mailDelete':   
        $content = 'mailDelete.php';
        $pageTitle = 'Administrator Mail List';
        break;
    
    case 'updateMail':
        $content = 'updateMail.php';
        $pageTitle = 'Administrator Mail List';
        break;
/*<!--Eending ....contents on the Mailing List/ Edit Mailing List/ Delete Mailing List/ update Mailing List section-->*/





/*<!--contents on the Initial section-->*/
    
    case 'dashboard':
        $content = 'dashboard.php';
        $pageTitle = 'PROJECT MANAGEMENT SYSTEM';
        break;  

 /*<!--contents on the Updates section -->*/

  case 'updates':
        $content = 'updates.php';
        $pageTitle = 'PROJECT MANAGEMENT SYSTEM';
        break; 

/*<!--contents on the Supervisor section -->*/

  case 'supervisor':
        $content = 'supervisor.php';
        $pageTitle = 'PROJECT MANAGEMENT SYSTEM';
        break; 

/*<!--contents on the Coordinator section -->*/

  case 'coordinator':
        $content = 'coordinator.php';
        $pageTitle = 'PROJECT MANAGEMENT SYSTEM';
        break;  
 

/*<!--contents on the admin dashboard section as a default-->*/

    default :
        $content = 'dashboard.php';
        $pageTitle = 'PROJECT MANAGEMENT SYSTEM';
}

$scripts = array();

require_once 'theme.php';

ob_flush();
?>