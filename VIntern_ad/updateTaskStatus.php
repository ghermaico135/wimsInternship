<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
    $task_id = $_POST['task_id'];		
    $task_status = $_POST['task_status'];


/*$chk = $_POST['chk'];*/
$chkcount = count($task_id);

for($i=0; $i<$chkcount; $i++)
{     
	
      
	
	dbQuery("UPDATE `tbl_task` SET `task_status`='$task_status[$i]' WHERE task_id=". $task_id[$i]);

}


header("Location: index.php?page=tasks");

?>





