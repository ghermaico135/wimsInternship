<?php
/*<!-- =======================================================
Project Name: INTERNSHIP MANAGEMENT  SYSTEM 
Website URL: 
Author: 
======================================================= -->
 */
session_start(); 
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('VIntern_ad/');
}


if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['username']);
	$email = trim($_POST['email']);
	$upass = trim($_POST['password']);
	$phone = '';
	$repassword = trim($_POST['repassword']);
	$code = md5(uniqid(rand()));
	
	if($upass != $repassword){
		$error[] = "Passwords do not match.";
	}else{
	
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
		if($reg_user->register($uname,$email,$upass,$code, $phone))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to VIntern :-Internship Management System!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='http://localhost/VIntern/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks,";
						
			$subject = "Confirm Account Registration";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
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
					<strong>Error !</strong><br/>  No internet connection, your Account Sign Up could not Complete.
			  </div>
			  ";

			 //echo $msg;
		}	
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
<!DOCTYPE html >
<html lang="en">
<head>  
    <title>SIGNUP| WEB-BASED INTERNSHIP MANAGEMENT SYSTEM</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

  <!--Bootstrap CSS code here -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  
  <!-- Fav and touch icons --> 
    <link rel="shortcut icon" href="VIntern_ad/images/wims_logo.png">
     
   <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet">

    <style type="text/css">
		body {
		  width: 85%;
		  height: 100%;
		  margin: auto;  
		  border: 1px solid red;
		  box-sizing: border-box;
		  background-image: url("VIntern_ad/images/wims_bg.jpg"); /* The image used */  
		  background-position: center; /* Center the image */
		  background-repeat: no-repeat; /* Do not repeat the image */
		  background-size: cover; /* Resize the background image to cover the entire container */
		}
			.foot{
		    background-color: #025e8f;
		    border: 1px solid;
		    padding: 0px;
		    width: 98%;
		    height: 65px;
		    left: 0px;
		    bottom: 0px;
		  }
		  .foot hr{
		  	margin-left: auto;
		  	margin-right: auto;
		  }

		  .foot h3{ 
		    color: #ffffff; 
		    padding: 2px;

		  }

		  .l{
		   float: left;
		    color: #ffffff;
		    margin-left: 25px;
		    padding: 0px;
		    font-size: 12px;
		  }

		  .r{
		   float: right;
		    color: #ffffff;
		    margin-right: 25px;
		    padding: 0px;
		    font-size: 12px;
		  }
		  .clear{
		    clear: both;
		  }
	</style>

   <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
  <link type="text/css" rel="stylesheet" href="css/style.css" />

</head>

<body>
    <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid" style="background-color: #025e8f;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><b style="color: #ffffff; font-size: 2.05em;">VIntern | INTERNSHIP MANAGEMENT SYSTEM</b></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar1">
     <ul class="nav navbar-nav navbar-right" style="margin: 0px; padding: 0px;">
           <li>
           	 <span style="float: right; margin: 0px; padding: 2px;color: #ffffff;">
           	 			<img src="VIntern_ad/images/logo.png" style="width: 115px; height: 40px;"> 
           	 			<small>
           	 				Faculty of Science and Technology
           	 			</small>
           	 </span>
           </li>						
			</ul>
    </div>
  </div>
</nav> 
      <div class="container">
	<div class="row">
		<div class="col-md-4 col-lg-offset-4 well">

				<span style="color: red;"><?php if(isset($msg)) echo $msg;  ?></span>
			<form role="form"  method="post" class="form-horizontal form-label-left">
			            <fieldset style="height: 450px;">
					<center >
						 					 
					<h4 style="color: #025e8f; font-weight: bolder;">CREATE ACCOUNT</h4>
					<?php 
					
					if(!empty($error)){
						echo '<div style="color:red"> Passwords donot match </div>';
					}
					?>
					<hr width="250px;">

					<div class="form-group">
                      <div class="input-group input-group-md">
                        <label style="float: left;" for="USER NAME">NAME</label><br>

                        <input type="text" name="username" class="form-control" required="required" placeholder="Full Names" data-toggle="tooltip" data-placement="right" title="Enter Your Name...!"  style="width: 250px">
                       </div>
                     </div>                      

                     <div class="form-group">
                         <div class="input-group input-group-md">
                        <label style="float: left;" for="Email">EMAIL</label><br>

                        <input type="email" name="email" class="form-control" required="required" placeholder="Email" style="width: 250px">
                       </div>
                     </div>

                     <div class="form-group">
                        <div class="input-group input-group-md">
                        <label style="float: left;" for="Password">PASSWORD</label>

                        <input type="password" name="password" class="form-control" required="required" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                        </div>
                     </div>
                    
                   <div class="form-group">
                        <div class="input-group input-group-md">
                        <label style="float: left;" for="Password">C- PASSWORD</label><br>

                        <input type="password" name="repassword" class="form-control" required="required" placeholder="Confirm Password" style="width: 250px">
                        </div>
                     </div> 
                          <center>
					<div class="form-group">
						<input type="submit" name="btn-signup" value="SIGN UP" class="btn btn-danger" />
					</div> </center>

					<hr width="250px;" style="margin: 2px; padding: 2px;">
					<span>Aleady have an account? &nbsp;&nbsp;<a href="login.php">Login</a></span>				
										
				</fieldset>
      </form>

    </div>
     <div class="clear"></div>	
   <div class="foot">
        <h3>
        <span class="l">
           Micheal
        </span>
       <span class="r">
          &copy; VIntern <?php echo date('Y'); ?>
       </span>
          </h3>
        <div class="clear"></div>
   </div>
  </div>
  <!-- // footer contents -->            
            

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>