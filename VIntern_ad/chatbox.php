<?php

/*<!-- =======================================================
Project Name: AUTOMATED PAYROLL SYSTEM INTEGRATED WITH IMAGE CAPTURE AND GPS TRACKING SYSTEM
Website URL:  
Author:
======================================================= -->
*/
?>
<script type="text/javascript">
	var i = 1;
	$(document).ready(function() {
	 checknotif(<?php echo @$_GET['chat_id']; ?>);
	 setInterval(function(){ checknotif(<?php echo @$_GET['chat_id']; ?>); }, 1000);
	});
	
	function checknotif(chat_id){
		//alert("Hello world");
		var pid = document.getElementById("scrollPart");
		
		
		
		var request;
		if (window.XMLHttpRequest){//for Chrome, Firefox, IE7+, Opera, Safari
			request = new XMLHttpRequest();
		}
		else{//for IE5, IE6
			request = new ActiveXObject("Microsoft.XMLHTTP");
		}	
		request.open("POST", "chatboxloader.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	

		request.onreadystatechange = function() {
			if(request.readyState == 4 && request.status == 200) {
				//4 = The connection is complete, the data was sent or retrieved.
				//200 = The file has been retrieved and you are free to do something with it
				
				document.getElementById("scrollPart").scrollTop = document.getElementById("scrollPart").scrollHeight;
				pid.innerHTML = request.responseText;
			}
		}

		request.send("chat_id="+chat_id);
		
	}
</script>
<?php
/*<!-- =======================================================
Project Name: FINAL YEAR PROJECT SYSTEM 
Website URL: 
Author: 
Group: GROUP 4
======================================================= -->
 */
 include "Image1.php";
?>
<style>
/*=======ADMIN DASHBOARD STYLES  ===========*/
.div-squarebox {
    padding:1px;
    border: 8px double #FFF5EE;
    -webkit-border-radius:120px;
   -moz-border-radius:120px;
    border-radius:120px;
    margin:10px;

}

.div-squarebox> a,.div-squarebox> a:hover {
    color:#808080;
     text-decoration:none;
}
#page-wrapper1 {
    padding: 15px 15px;
    min-height: 250px;
    background:#F3F3F3;

}
#page-inner1 {
    width:100%;
    margin:10px 20px 10px 0px;
    background-color:#fff!important;
    padding:10px;
    min-height:200px;
}
h4{
  font-weight: bold;
  font-size: 30px;
  transition: transform .25s; /*Animation*/
}

</style>

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
		<div class="x_panel" style="padding: ; background-color: #fff;">
			<div style="max-height:400px; overflow:auto;">
			  <div class="x_content" style="width:95%">
				<div>
				  <!-- /. ROW  -->
				   <?php
				  
				  ?>
					
					<?php
					$user_id = $_SESSION['user_id'];
					$select1 = dbQuery("SELECT group_id FROM tbl_student WHERE user_id = '$user_id' ");
					$row = dbFetchAssoc($select1);
					$group_id = $row['group_id'];
										
					if($_SESSION['user_type_name'] == 5){
						
						$select = dbQuery("SELECT * FROM tbl_user  WHERE  (tbl_user.user_type !=0 AND tbl_user.user_type !=0 AND  tbl_user.user_type !=1 AND  tbl_user.user_type !=3  AND  tbl_user.user_type !=10 AND tbl_user.user_id != $user_id );");
						dbNumRows($select);				
						
					}elseif($_SESSION['user_type_name'] != 4){
						$gg = userGroup();
						$hh = getSupervisorId($gg);
						//echo "SELECT * FROM tbl_user WHERE tbl_user.user_type !=0 AND ((SELECT tbl_student.group_id FROM tbl_student WHERE tbl_student.group_id = '$group_id' AND tbl_student.user_id= tbl_user.user_id) OR tbl_user.user_type = 4 OR (tbl_user.user_type = 5 AND (SELECT supervised_by FROM tbl_project WHERE tbl_project.group_id = $gg)=$hh))) AND tbl_user.user_id != $user_id;";
						//echo "SELECT supervised_by FROM tbl_project WHERE tbl_project.group_id = $gg";
						$select = dbQuery("SELECT * FROM tbl_user WHERE tbl_user.user_type !=0 AND  tbl_user.user_type !=3  AND  tbl_user.user_type !=10 AND ((SELECT tbl_student.group_id FROM tbl_student WHERE tbl_student.group_id = '$group_id' AND tbl_student.user_id= tbl_user.user_id) OR tbl_user.user_type = 4 OR (tbl_user.user_type = 5 AND (SELECT supervised_by FROM tbl_project WHERE tbl_project.group_id = $gg)=$hh)) AND tbl_user.user_id != $user_id;");// AND 
						
						//)
						
					}else{
						$select = dbQuery("SELECT * FROM tbl_user  WHERE  tbl_user.user_type !=0 AND  tbl_user.user_type !=3  AND  tbl_user.user_type !=10 AND tbl_user.user_id != $user_id OR (tbl_user.user_type = 5);");
						dbNumRows($select);
					}
					$total_unread = 0;
					while(@$row = dbFetchAssoc($select)){
						$show = false;

						if($_SESSION['user_type_name'] == 2){
							$_SESSION['user_type_name'];
							$user_id = user_id();
							$user_id = $row['user_id'];
							$gg = 0;
							$u_id = 0;
							 $gg = userGroup();
							 $u_id = getSupervisorId($gg);
							$uu_id = $row['user_id'];
							
							//echo '==>>u'.userGroup();

							//echo "SELECT count(*) as isSupervisor FROM tbl_project WHERE tbl_project.group_id = '$g' AND tbl_project.supervised_by = '$u_id'";
							$sel = dbQuery("SELECT count(*) as isSupervisor FROM tbl_project WHERE tbl_project.group_id = '$gg' AND tbl_project.supervised_by = '$uu_id'");
							$ro = dbFetchAssoc($sel);
							extract($ro);
							
							
							if((getSupervisorGroup($uu_id) == userGroup() && $isSupervisor == 1) || isCordinatorById($uu_id) == 4 || userGroupByID($uu_id) == userGroup()){
								$show = true;
							}else{
								$show = false;
							}
						}elseif($_SESSION['user_type_name'] == 5){
							$u_id = user_id();
							$user_id = $row['user_id'];
							$g = userGroupByID($user_id);
							
							$sel = dbQuery("SELECT count(*) as isSupervisor FROM tbl_project WHERE tbl_project.group_id = '$g' AND tbl_project.supervised_by = '$u_id'");
							$ro = dbFetchAssoc($sel);
							extract($ro);
							
							
							if(userGroupByID($user_id) == userGroup()|| $isSupervisor == 1){
								$show = true;
							}else{
								$show = false;
							}
						}else{
							$show = true;
						}
						if($show)
						{
					?>
					
						<?php
						$chat_from = $row['user_id'];
							$chat_to = user_id();
							$sql = "SELECT count(*) as unread FROM tbl_chat WHERE chat_from = '$chat_from'  AND chat_to = '$chat_to' AND chat_status = 0";
							$selectz = dbQuery($sql);
							$rowz = dbFetchAssoc($selectz);
							//$total_unread = dbNumRows($selectz);
							extract($rowz);
							if(!empty($unread)){
								@$style= 'style="background-color:#fff0f7;"';
							}else{
								$style="";
							}
							echo '<a href="?page=chatbox&chat_id='.$row['user_id'].'">';
						?>
					<div class="row" <?php echo @$style; ?>>	
						<div class="col-md-6" >
							<?php
											
							if(!empty($row['avatar'])){
								echo '<img title="chat" src="'.$row['avatar'].'" alt="..." class="img-circle profile_img">';
							}else{
								echo '<img title="chat" src="images/user.png" alt="..." class="img-circle profile_img">';
							}
							
							?>
							<center><?php echo getUserType($row['user_type']); ?>
							
							<?php
							echo '<br/>'.getGroupName(userGroupByID($row['user_id']));
							?>
							</center>
						</div>
						<div class="col-md-6">
							<p style="margin-top:20px;"><?php echo ucwords($row['name']); ?><br/>
							Status:<?php echo isOnLine($row['user_id']);?><br/>
							 
							<?php
							$chat_from = $row['user_id'];
							$chat_to = user_id();
							$unread = 0;
							//echo "SELECT count(*) as unread FROM tbl_chat WHERE chat_from = '$chat_from'  AND chat_to = '$chat_to' AND chat_status = 0";
							$sql = "SELECT count(*) as unread FROM tbl_chat WHERE chat_from = '$chat_from'  AND chat_to = '$chat_to' AND chat_status = 0";
							$selectz = dbQuery($sql);
							$rowz = dbFetchAssoc($selectz);
							//$total_unread = dbNumRows($selectz);
							extract($rowz);
							if(!empty($unread)){
								echo 'Unread: '.$unread;
								$total_unread += $unread;
							}
							?>
							
							<br/>
							</p>
						</div>
						
					</div>
					<hr style="margin:0; padding:0;"/>
					<?php 
					echo '</a>';
					} 
					}
					?>
				  <!-- /. PAGE INNER1  -->
				</div>

			  </div>
			</div>
		</div>
		<?php 
		if(!empty($total_unread)){
			//redWord("Total Unread: <b>$total_unread</b>");
		}
		?>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="x_panel" style="padding: 12px; background-color:#fff;">
          <div class="x_content">
            <div>
              <!-- /. ROW  -->
              <h2><i class="fa fa-fx fa-envelope"> &nbsp; Messages with <?php echo ucwords(getUserName(@$_GET['chat_id'])); ?></i></h2>
              <!-- /. PAGE INNER1  -->
			  <div style="height:300px; overflow:auto;" id="scrollPart">
				  
			  </div>
			  <br/><hr/>
			  
			  
         
			  <?php 
			  if(isset($_POST['post1'])){
				  $message = $_POST['message'];
				  echo $file = @$_POST['file'];
				  $time = time();
				  
				  $user_id = user_id();
				  $chat_id = @$_GET['chat_id'];
				  $image_link = "";
				 if(1){
					 
					 $image = new Image();
					$image->upload("file", "uploads");						
					
					if($image->isError()){
						$image_link = $image->imageLink();
					}else{
						$error[] = $image->errorMessage();
					}
					
				}
				
				if(1){
				  //$image_link;
				  $sql = "INSERT INTO `tbl_chat` (`chat_id`, `chat_from`, `chat_to`, `chat_message`, `chat_time`, `chat_status`, `chat_attachment`) VALUES (NULL, '$user_id', '$chat_id', '$message', '$time', '0', '$image_link');";
				  
				  $addchat = dbQuery($sql);

					
                    if($addchat){
                        successMsg("Sent");
                       goToPage("chatbox&chat_id=$chat_id");
                    }else{
						$error[] = "DB error";
					}
				}else{
					errorMsg(implode("<BR/>", $error));
				}
				  
			  }
			  
			  ?>
			  <form action="" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
			  <div class="row">
				  <div class="col-md-9">
				  <textarea name="message" placeholder="Enter Message" class="form-control"></textarea>
				  <input type="file" name="file"/>
				  </div>
				  <div class="col-md-3">
				  <button class="form-control btn btn-success" name="post1"><i class="fa fa-fx fa-paper-plane"></i> Post</button>
				  </div>
			  </div>
			  
			  </form>
            </div>
			
          </div>
        </div>
    </div>
   <!--  <div class="col-md-3 col-sm-3 col-xs-3">
        <div class="x_panel" style="padding: 12px; background-color: #fff;">
          <div class="x_content">
            <div> -->
              <!-- /. ROW  -->
              <!-- <h2>Chat Box</h2> -->
              <!-- /. PAGE INNER1  -->
           <!--  </div>

          </div>
        </div>
    </div> -->
</div>