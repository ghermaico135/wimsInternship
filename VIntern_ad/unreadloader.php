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
require_once 'library/config.php';
require_once 'library/functions.php';

$user_home = new USER();
$chat_to = user_id();
$chat_id = @$_POST['chat_id'];
				
$chat_to = user_id();
$sql = "SELECT count(*) as unread FROM tbl_chat WHERE chat_to = '$chat_to' AND chat_status = 0";
$selectz = dbQuery($sql);
$rowz = dbFetchAssoc($selectz);
//$total_unread = dbNumRows($selectz);
extract($rowz);
if(!empty($unread)){
	echo '<span class="pull-right" style="background-color:red;color:white; padding:5px 10px;border-radius:50px;">'.$unread.'</span>';
}
	

ob_flush();
?>