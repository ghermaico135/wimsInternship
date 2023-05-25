<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
    $field_id = $_POST['field_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone']; 
    $dept = $_POST['dept'];
    $company = $_POST['company'];


/*$chk = $_POST['chk'];*/
$chkcount = count($field_id);

for($i=0; $i<$chkcount; $i++)
{     
	echo $fid = $field_id[$i];
	$n = $name[$i];
	$e = $email[$i];
	$p = $phone[$i];
	$d = $dept[$i];	
	$c = $company[$i];

	dbQuery("UPDATE `tbl_field_supervisor` SET `supervisor_name`='$n',`supervisor_email`='$e',`supervisor_phone`='$p',`dept`='$d',`company_id`='$c' WHERE `field_id`=". $fid);

}


header("Location: index.php?page=feildSup");

?>





