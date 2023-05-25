<?php
/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
 */
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in())
{
	$user_login->redirect('VIntern_ad/');
	
}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['user_email']);
	$password = trim($_POST['user_password']);
	
	if($user_login->login($email,$password))
	{
		$user_login->redirect('VIntern_ad/');
	}else{
		$user_login->redirect('login.php?msg=Wrong User Email or Password entered');
		$msg = "";
	}
}
@$msg = $_GET['msg'];
?>
<!DOCTYPE html >
<html lang="en">
<head>  
    <title>LOGIN | WEB-BASED INTERNSHIP MANAGEMENT SYSTEM</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

  <!--Bootstrap CSS code here -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <!-- <link href="assets/styles.css" rel="stylesheet" media="screen"> -->

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
        width: 99%;
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
    <?php 
    if(isset($_GET['inactive']))
    {
      ?>
            <div class='alert alert-error'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
      </div>
            <?php
    }
    ?>

  <div class="row">
    <div class="col-md-4 col-md-offset-4 well">
      <form role="form"  method="post" id="login_form">
                  <fieldset>
          <center >
            <?php
        if(isset($_GET['error']))
    {
      ?>
            <div class='alert alert-success'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Wrong Details!</strong> 
      </div>
            <?php
    }
    ?>
             <img src="VIntern_ad/images/user.png" style="border-radius: 100px; width: 80px; height: 80px;">
             <hr width="350px;">

          <h4 style="color: #025e8f; font-weight: bolder;">LOGIN</h4>

          <div class="form-group">
            <div class="input-group input-group-lg">
               <span class="input-group-addon"><img src="VIntern_ad/images/user.png" width="15px" height="15px"></span>
               <input type="email" name="user_email" placeholder="Email " required="required" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <div class="input-group input-group-lg">
               <span class="input-group-addon"><img src="VIntern_ad/images/password.jpeg" width="15px" height="15px"></span>
               <input type="password" name="user_password" placeholder="Password" required="required" class="form-control" />
             </div>
          </div>  

          <div class="checkbox">
                       <label style="float: left; margin-top: 5px; margin-bottom: 0px;">
                          <input type="checkbox" name="remember_me"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remember Me
                       </label>
                    </div>
                    <center style="color:orange;"> <?php echo $msg; ?> </center>
                          <center>                 
          <div class="form-group">
            <input type="submit" name="btn-login" value="Login" class="btn btn-success" />            
          </div> </center>
             <hr width="350px" style="margin: 0px; padding: 0px;">
                    <p><a href="fpass.php">Forgot Password</a></p>
          <span>No Account &nbsp;&nbsp;<a href="signup.php">Register</a></span>          
                    
        </fieldset>
      </form>


        <!-- <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span> -->
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