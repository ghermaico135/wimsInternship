<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
    	$academic_id = $_POST['academic_id'];
     	$fname = $_POST['fname'];
	    $lname = $_POST['lname'];
	    $email = $_POST['email'];
	    $phone = $_POST['phone'];
	    $dept =  $_POST['dept'];
	    $faculty = $_POST['faculty'];
	    $college = $_POST['college'];


/*$chk = $_POST['chk'];*/
$chkcount = count($academic_id);

for($i=0; $i<$chkcount; $i++)
{     
	echo $aid = $academic_id[$i];
	$fn = $fname[$i];
	$ln = $lname[$i];
	$e = $email[$i];
	$p = $phone[$i];
	$d = $dept[$i];	
	$f = $faculty[$i];
	$c = $college[$i];

	dbQuery("UPDATE `tbl_academic_supervisor` SET `academic_fname`='$fn',`academic_lname`='$ln',`email`='$e',`phone`='$p',`department`='$d',`faculty`='$f',`college`='$c' WHERE `academic_id`=". $aid);

}


header("Location: index.php?page=academicSup");

?>





