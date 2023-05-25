<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
    $mail_id = $_POST['mail_id'];
    $mail_address = $_POST['mail_address'];	

/*$chk = $_POST['chk'];*/
$chkcount = count($mail_id);

for($i=0; $i<$chkcount; $i++)
{     
	echo dbQuery("UPDATE `tbl_mail` SET `mail_address`='".$mail_address[$i]."' WHERE mail_id=". $mail_id[$i]);    
	

}


header("Location: index.php?page=mailing_list");

?>





