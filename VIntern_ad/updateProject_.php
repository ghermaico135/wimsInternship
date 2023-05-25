<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
    $project_id = $_POST['project_id'];	
    $status = $_POST['status'];
                      
/*$chk = $_POST['chk'];*/
$chkcount = count($project_id);

for($i=0; $i<$chkcount; $i++)
{     

	echo dbQuery("UPDATE `tbl_project` SET `status`='".$status[$i]."' WHERE project_id=". $project_id[$i]);
}


header("Location: index.php?page=projects");

?>





