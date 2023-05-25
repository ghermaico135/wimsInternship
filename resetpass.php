<?php

/*<!-- =======================================================
Project Name: INTERNSHIP MANAGEMENT  SYSTEM 
Website URL: 
Author: 
======================================================= -->
 */
require_once 'class.user.php'; 
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
	$user->redirect('index.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];
	
	$stmt = $user->runQuery("SELECT * FROM tbl_user WHERE user_id=:uid AND activation_token=:token");
	$stmt->execute(array(":uid"=>$id,":token"=>$code));
	$rows = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() == 1)
	{
		if(isset($_POST['btn-reset-pass']))
		{
			$password = $_POST['password'];
			$cpassword = $_POST['confirm_password'];
			
			if($cpassword!==$password)
			{
				$msg = "<div class='alert alert-block'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!</strong>  Password Doesn't match. 
						</div>";
			}
			else
			{
				$password = md5($cpassword);
				$stmt = $user->runQuery("UPDATE tbl_user SET password=:upass WHERE user_id=:uid");
				$stmt->execute(array(":upass"=>$password,":uid"=>$rows['user_id']));
				
				$msg = "<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						Your Password Changed.Next Time when you login Please the Newly changed Password
						</div>";
				header("refresh:5;login.php");
			}
		}	
	}
	else
	{
		$msg = "<div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
				No Account Found, Try again
				</div>";
				
	}
	
	
}

?>
<!DOCTYPE html >
<html lang="en">
<head>  
    <title>PASSWORD RESET |FINAL YEAR PROJECT SYSTEM</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

  <!--Bootstrap CSS code here -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <!-- <link href="assets/styles.css" rel="stylesheet" media="screen"> -->

  <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="VIntern_ad/images/_logo.png">
     
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
    margin-top: 25px;
    background-color: #025e8f;
    border: 1px solid;
    padding: 0px;
    width: 98%;
    height: 65px;
    left: 0px;
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
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <b style="color: #ffffff;; font-size: 2.05em;">VIntern | INTERNSHIP MANAGEMENT SYSTEM
                </b>
            </a>
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
     	<div class="col-md-4 col-md-offset-4 well">
          <form role="form"  method="post" id="login_form">
             <fieldset>
    <center>

    	<div class='alert alert-success'>
			<strong>Hello !</strong>  <span style="color: red;"><?php echo $rows['name'] ?> </span>you are here to reset your forgetton password.
		</div>

		<h4 style="color: orange;"> PASSWORD RESET</h4>
			 <hr width="300px">

        <?php
        if(isset($msg))
		{
			echo $msg;
		}
		?>

		
		<div class="form-group">
            <div class="input-group input-group-lg">
               <span class="input-group-addon"><img src="VIntern_ad/images/password.jpeg" width="15px" height="15px"></span>
               <input type="password" name="password" placeholder="Enter New Password " required="required" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <div class="input-group input-group-lg">
               <span class="input-group-addon"><img src="VIntern_ad/images/password.jpeg" width="15px" height="15px"></span>
               <input type="password" name="confirm_password" placeholder="Confirm New Password" required="required" class="form-control" />
             </div>
          </div>       
             <hr width="300px"> 

        <div class="form-group">
            <input type="submit" name="btn-reset-pass" value="Reset Your Password" class="btn btn-large btn-primary" />
          </div>
     </center>
        <hr width="290px" style="margin: 10px; padding: 10px;">
                    <p ><a href="index.php">Go Home</a></p>
        </fieldset>        
      </form>
    </div>
    <br>
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
            

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>