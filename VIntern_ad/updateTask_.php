<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
    $task_id = $_POST['task_id'];	
    //$task_upload = $_POST['task_upload'];	
    $task_status = $_POST['task_status'];


/*$chk = $_POST['chk'];*/
$chkcount = count($task_id);

for($i=0; $i<$chkcount; $i++)
{     
	include "Image1.php";
	if(1){
	$image = new Image();
	$image->upload("task_upload", "uploads");						

	if($image->isError()){
	echo $image_link = @$image->imageLink();
	}else{
	$error[] = $image->errorMessage();
	}
	}
      
	
	dbQuery("UPDATE `tbl_task` SET `task_upload`='$image_link',`task_status`='$task_status[$i]' WHERE task_id=". $task_id[$i]);

}


header("Location: index.php?page=tasks");

?>





