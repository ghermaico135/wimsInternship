<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
    $session_id = $_POST['session_id'];
    $session = $_POST['session'];	
    $in = $_POST['timein'];
    $out = $_POST['timeout'];


/*$chk = $_POST['chk'];*/
$chkcount = count($session_id);

for($i=0; $i<$chkcount; $i++)
{     
	echo $sid = $session_id[$i];
	$name = $session[$i];
	$tin = $in[$i];	
	$tout = $out[$i];

	dbQuery("UPDATE `tbl_session` SET `session_name`='$name',`time_in`='$tin',`time_out`='$tout' WHERE `session_id`=". $sid);

}


header("Location: index.php?page=session");

?>





