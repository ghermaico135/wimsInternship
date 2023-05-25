<?php
/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author: 
======================================================= -->
 */

require_once 'dbconfig.php';

class USER
{	

	private $conn;
	 
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}
	
	public function register($uname,$email,$upass,$code)
	{
		try
		{							
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO tbl_user(name,email,password,activation_token) VALUES(:user_name, :user_mail, :user_pass, :active_code)");
			$stmt->bindparam(":user_name",$uname);
			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_pass",$password);
			$stmt->bindparam(":active_code",$code);
			$stmt->execute();	
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	public function login($email,$password)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM tbl_user WHERE email=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				if($userRow['status']=="Y")
				{
					if($userRow['password']==md5($password))
					{
						$_SESSION['userSession'] = $userRow['user_id'];
						$user_id = $_SESSION['user_id'] = $userRow['user_id'];
						$_SESSION['user_fullnames'] = $userRow['name'];
						$_SESSION['email'] = $userRow['email'];
						
						$_SESSION['user_type_name'] = $userRow['user_type'];
						
						
						$update = $this->conn->prepare("UPDATE tbl_user SET user_status = 'Online' WHERE user_id = '$user_id'");
						$update->execute();
						
						return true;
					}
					else
					{
						//header("Location: index.php?error");
						return false;
						exit;
					}
				}
				else
				{
					header("Location: index.php?inactive");
					exit;
				}	
			}
			else
			{
				header("Location: index.php?error");
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	
	
	public function is_logged_in()
	{
		if(isset($_SESSION['userSession']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function logout()
	{
		$user_id = $_SESSION['user_id'];

		$update = $this->conn->prepare("UPDATE tbl_user SET user_status = 'Offline' WHERE user_id = '$user_id'");
		$update->execute();
		
		session_destroy();
		//$_SESSION['userSession'] = false;
		//$_SESSION['user_id'] = false;
	}
	
	// function send_mail($email,$message,$subject)
	// {						
	// 	require_once('mailer/class.phpmailer.php');
	// 	$mail = new PHPMailer();
	// 	$mail->IsSMTP(); 
	// 	$mail->SMTPDebug  = 1;                     
	// 	$mail->SMTPAuth   = true;                  
	// 	$mail->SMTPSecure = "tls";                 
	// 	$mail->Host       = "smtp.gmail.com";      
	// 	$mail->Port       = 587;             
	// 	$mail->AddAddress($email);
	// 	$mail->Username="fyrproj2022@gmail.com";  
	// 	$mail->Password="#FYP@2022#";            
	// 	$mail->SetFrom('fyrproj2022@gmail.com','VIntern Internship Management System');
	// 	$mail->AddReplyTo($email);
	// 	$mail->Subject    = $subject;
	// 	$mail->MsgHTML($message);
	// 	$mail->Send();
	// }

	function send_mail($email,$message,$subject)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 1;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "ssl";                 
		$mail->Host       = "mail5005.site4now.net";      
		$mail->Port       = 465;             
		$mail->AddAddress($email);
		$mail->Username="balex@icrmsug.com";  
		$mail->Password="Balex@22Mak";            
		$mail->SetFrom('balex@icrmsug.com','VIntern Internship Management System');
		$mail->AddReplyTo($email);
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}

	public function isCompanyAdded(){
		$user_id = $_SESSION['user_id'];
		
		//get student id , check if the student id already exists
		$stmt = $this->conn->prepare("SELECT student_id FROM tbl_student WHERE user_id = '$user_id'");
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() >= 1){
		@extract($row);
		
		$stmt = $this->conn->prepare("SELECT * FROM tbl_company WHERE student_id = '$student_id'");
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() >= 1){
			return true;
		}else{
			return false;
		}
		
		}
		
		return false;
		
	}

	public function isfieldSupAdded(){
		$user_id = $_SESSION['user_id'];
		
		//get student id , check if the student id already exists
		$stmt = $this->conn->prepare("SELECT student_id FROM tbl_student WHERE user_id = '$user_id'");
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() >= 1){
		@extract($row);
		
		$stmt = $this->conn->prepare("SELECT * FROM tbl_field_supervisor WHERE student_id = '$student_id'");
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() >= 1){
			return true;
		}else{
			return false;
		}
		
		}
		
		return false;
		
	}

	public function isacademicSupAdded(){
		$user_id = $_SESSION['user_id'];
		
		//get student id , check if the student id already exists
		$stmt = $this->conn->prepare("SELECT student_id FROM tbl_student WHERE user_id = '$user_id'");
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() >= 1){
		@extract($row);
		
		$stmt = $this->conn->prepare("SELECT * FROM tbl_academic_supervisor WHERE student_id = '$student_id'");
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() >= 1){
			return true;
		}else{
			return false;
		}
		
		}
		
		return false;
		
	}
}