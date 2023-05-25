<?php
/*<!-- =======================================================
Project Name: INTERNSHIP MANAGEMENT  SYSTEM 
Website URL: 
Author: 
======================================================= -->
 */

require_once '../class.user.php';




function saveSup($email, $supname, $SESSION)
{
	$reg_user = new USER();
	$uname = $supname;
	$email = $email;
	$upass = '12345';
	$code = md5(uniqid(rand()));
	
	
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_user WHERE email=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Error</strong><br/>  Entered email already exists , Please Try Again
			  </div>
			  ";
	}
	else
	{

		if(internet()){
		if($reg_user->register($uname,$email,$upass,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to VIntern :-Internship Management System!<br/>
						 SESSION['user_fullnames'] has chosen you as the Field Supervisor for his/her Internship. Please  complete  registration, just click following link<br/>
						<br /><br />
						<a href='http://localhost/VIntern/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />

						email: $email
						<br /><br />
						password: 12345
						<br /><br />
						Thanks,";
						
			$subject = "Confirm Account Registration";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please contact them and ask them to click on the confirmation link in the email to activate their account. 
			  		</div>
					";

		}
		else
		{
			echo "sorry , Query could no execute...";
		}	
		}else{
			$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Error !</strong><br/>  No internet connection, the Account for your Field Supervisor could not Completed.
			  </div>
			  ";

			 //echo $msg;
		}	
	}
	
	
}

function saveAcademicSup($email, $supname, $SESSION)
{
	$reg_user = new USER();
	$uname = $supname;
	$email = $email;
	$upass = '12345';
	$code = md5(uniqid(rand()));
	
	
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_user WHERE email=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Error</strong><br/>  Entered email already exists , Please Try Again
			  </div>
			  ";
	}
	else
	{

		if(internet()){
		if($reg_user->register($uname,$email,$upass,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to VIntern :-Internship Management System!<br/>
						 SESSION['user_fullnames'] Added you as an Academic Supervisor for  Internship. Please  complete  registration, just click following link<br/>
						<br /><br />
						<a href='http://localhost/VIntern/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />

						email: $email
						<br /><br />
						password: 12345
						<br /><br />
						Thanks,";
						
			$subject = "Confirm Registration";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please contact them and ask them to click on the confirmation link in the email to activate their account. 
			  		</div>
					";

		}
		else
		{
			echo "sorry , Query could no execute...";
		}	
		}else{
			$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Error !</strong><br/>  No internet connection, the Account for your Field Supervisor could not Completed.
			  </div>
			  ";

			 //echo $msg;
		}	
	}
	
	
}

function internet(){
    $fs = @fsockopen("www.example.com", 80);
    if($fs){
        fclose($fs);
        return true;
    }else{
        return false;
    }
}

?>