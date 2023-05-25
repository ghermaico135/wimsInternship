<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
    $project_id = $_POST['project_id'];	
    $project_comment = $_POST['project_comment'];
    $project_grade = $_POST['project_grade'];
                      
                      
/*$chk = $_POST['chk'];*/
$chkcount = count($project_id);

for($i=0; $i<$chkcount; $i++)
{     
	$pro_id = $project_id[$i];
	$user_id = user_id();
	$grade = $project_grade[$i];
	$comment = $project_comment[$i];
	echo dbQuery("INSERT INTO `tbl_projectmarks`(`mark_id`, `project_id`, `panelist_id`, `project_grade`, `project_comment`) VALUES (NULL,'$pro_id','$user_id','$grade','$comment')");
}


header("Location: index.php?page=projects");

?>





