<?php
/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
 */
session_start();
require_once 'class.user.php';
$user = new USER(); 

if($user->is_logged_in()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-submit']))
{
	$email = $_POST['txtemail'];
	
	$stmt = $user->runQuery("SELECT user_id FROM tbl_user WHERE email=:email LIMIT 1");
	$stmt->execute(array(":email"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['user_id']);
		$code = md5(uniqid(rand())); ////Try this  "bin2hex(random_bytes(16));"
		
		$stmt = $user->runQuery("UPDATE tbl_user SET activation_token=:token WHERE email=:email");
		$stmt->execute(array(":token"=>$code,"email"=>$email));
		
		$message= "
				   Hello , $email
				   <br /><br />
				   We got requested to reset your password, if you did this then just click the following link to reset your password, if didn't just ignore this email,
				   <br /><br />
				   Click Following Link To Reset Your Password 
				   <br /><br />
				   <a href='http://localhost/vIntern/resetpass.php?id=$id&code=$code'>click here to reset your password</a>
				   <br /><br />
				   thank you :)
				   ";
		$subject = "Password Reset";
		
		$user->send_mail($email,$message,$subject);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>
					We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  The email you provided was not found. 
			    </div>";
	}
}
?>

<!DOCTYPE html >
<html lang="en">
<head>  
    <title>FORGOT PASSWORD | WEB-BASED INTERNSHIP MANAGEMENT SYSTEM</title>
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
    width: 100%;
    height: 65px;
    left: 0px;
    bottom: 0px;
    right: 0px;
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
     	<div class="col-md-4 col-md-offset-4 well">
          <form role="form"  method="post" id="login_form">
             <fieldset>
    <center>
             	<?php
			if(isset($msg))
			{
				echo $msg;
			}
			else
			{
				?>
              	<div class='alert alert-info'>
				Please enter your email address.<br> You will receive a link to create a new password via email!
				</div>  
                <?php
			}
			?>

			 <h4 style="color: orange;">FORGOT PASSWORD</h4>
			 <hr width="300px">

		  <div class="form-group">
            <div class="input-group input-group-lg">
               <span class="input-group-addon"><img src="VIntern_ad/images/user.png" width="15px" height="15px"></span>
               <input type="email" name="txtemail" placeholder="Enter Email " required="required" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <input type="submit" name="btn-submit" value="Generate New Password" class="btn btn-primary" />
          </div>
     </center>
        <hr width="290px" style="margin: 10px; padding: 10px;">
                    <p ><a href="index.php">HOME</a></p>
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
                    

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>