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

if(!$user_home->is_logged_in())
{
    $user_home->redirect('../index.php');
}

$als = $_POST['als'];
$f = '';

$stmt = $user_home->runQuery("SELECT lecturer_id FROM tbl_staff WHERE userType=:als");
$stmt->execute(array(":als"=>$als));

$number = 1;
$f = 1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
	extract($row);
	if(1){
		$f = @end(explode('0', $lecturer_id))+1;

	}
}

if($als == 1)
	$prefix = "UNIV/";
elseif($als == 2)
	$prefix = "FIELD/";
elseif($als == 3)
	$prefix = "CORD/";
elseif($als == 4)
	$prefix = "LE";

echo $number = $prefix.'S-VU/'.str_pad($f, 4, "0", STR_PAD_LEFT);

ob_flush();
?>