<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
    $dept_id = $_POST['dept_id'];
    $dept_code = $_POST['dept_code'];	
    //$task_upload = $_POST['task_upload'];	
    $dept_name = $_POST['dept_name'];
    $dept_description = $_POST['dept_description'];


/*$chk = $_POST['chk'];*/
$chkcount = count($dept_id);

for($i=0; $i<$chkcount; $i++)
{     
	echo $did = $dept_id[$i];
	$dcode = $dept_code[$i];
	$dname = $dept_name[$i];
	echo $ddescription = $dept_description[$i];      
	
	dbQuery("UPDATE `tbl_dept` SET `dept_code`='$dcode',`dept_name`='$dname', dept_description = '$ddescription' WHERE dept_id=". $did);

}


header("Location: index.php?page=dept_list");

?>





