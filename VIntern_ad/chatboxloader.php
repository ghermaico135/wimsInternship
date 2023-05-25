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
$user_id = user_id();
				  $chat_id = @$_POST['chat_id'];
				  if(!empty($chat_id)){
					  
					$chat_from = $chat_id;
					$chat_to = user_id();
					$sql = "UPDATE tbl_chat SET chat_status = 1 WHERE chat_from = '$chat_from'  AND chat_to = '$chat_to' AND chat_status = 0";
					$select = dbQuery($sql);
					
					  
				  $select = dbQuery("SELECT * FROM tbl_chat WHERE ((chat_from = '$chat_id' AND chat_to = '$user_id') or (chat_from = '$user_id' AND chat_to = '$chat_id')) ORDER BY chat_time ASC");
					
					while(@$row = dbFetchAssoc($select)){	
					extract($row);
						if($chat_to == $user_id){
				  ?>
				  <div style="display:block;clear:both;">
					  <div class="" style="padding:5px;border:1px solid #bbb;display:inline-block;border-radius:10px;background-color:#efefef;margin:5px;float:left;">
						<div>
						<?php echo $chat_message; 
						if(!empty($chat_attachment)){
						echo '<br/>';
						echo '<a href="'.$chat_attachment.'"  target="_blank">';
						@$end = @end(explode('.', @$chat_attachment));
						if(strtolower($end) == "png" || strtolower($end) == "jpg" || strtolower($end) == "jpeg" || strtolower($end) == "gif"){
							echo '<img src="'.$chat_attachment.'" alt="" style="max-width:95%;"/>';
						}else{
						echo '<span style="color:blue; text-decoration:underline;">'.str_replace("uploads/", "", $chat_attachment).'</span>';
						}
						
						echo '</a>';
						}
						?>
						</div>
						<div style="font-size:10px;color:#ccc;"><?php echo date('Y-m-d h:i:s a', $chat_time); ?>
						</div>
						
					  </div>
				  </div>
				<?php } else {?>
				  <div style="display:block;clear:both;">
					  <div class="" style="padding:5px;border:1px solid #9df7b1;display:inline-block;border-radius:10px;background-color:#F0FFF0;margin:5px;float:right;">
						<?php echo $chat_message; 
						if(!empty($chat_attachment)){
						echo '<br/>';
						echo '<a href="'.$chat_attachment.'"  target="_blank">';
						@$end = end(explode('.', @$chat_attachment));
						if(strtolower($end) == "png" || strtolower($end) == "jpg" || strtolower($end) == "jpeg" || strtolower($end) == "gif"){
							echo '<img src="'.$chat_attachment.'" alt="" style="max-width:95%;"/>';
						}else{
						echo '<span style="color:blue; text-decoration:underline;">'.str_replace("uploads/", "", $chat_attachment).'</span>';
						}
						echo '</a>';
						}
						?>
						<div style="font-size:10px;color:#ccc;"><?php echo date('Y-m-d h:i:s a', $chat_time); ?>
						<?php 
						if(!empty($chat_status)){
							echo '<br/><div style="float:right;color:green;">Read</div>'; 
						}else{
							echo '<br/><div style="float:right;color:red;">UnRead</div>';
						}
						?>
						</div>
					  </div>
				  </div>
				  
					<?php } }
				  
				} else {
					
					warningMsg( 'Select Person to Chat with on the Left side');
				}

ob_flush();
?>