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
	
	$statusY = "Y";
	$statusN = "N";
	
	$stmt = $user->runQuery("SELECT user_id,status FROM tbl_user WHERE user_id=:uID AND activation_token=:code LIMIT 1");
	$stmt->execute(array(":uID"=>$id,":code"=>$code));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() > 0)
	{
		if($row['status']==$statusN)
		{
			$stmt = $user->runQuery("UPDATE tbl_user SET status=:status WHERE user_id=:uID");
			$stmt->bindparam(":status",$statusY);
			$stmt->bindparam(":uID",$id);
			$stmt->execute();	
			
			$msg = "
		           <div class='alert alert-success'>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>Congratulations.... !</strong>  Your Account is Now Activated : <a href='login.php'>Login here</a>
			       </div>
			       ";	
		}
		else
		{
			$msg = "
		           <div class='alert alert-error'>
				   <button class='close' data-dismiss='alert'>&times;</button>
					  <strong>sorry !</strong>  Your Account is already Activated : <a href='login.php'>Login here</a>
			       </div>
			       ";
		}
	}
	else
	{
		$msg = "
		       <div class='alert alert-error'>
			   <button class='close' data-dismiss='alert'>&times;</button>
			   <strong>sorry !</strong>  No Account Found : <a href='signup.php'>Signup here</a>
			   </div>
			   ";
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
		    margin-top: 265px;
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
      <a class="navbar-brand" href="index.php"><b style="color: #ffffff; font-size: 2.05em;">VIntern | WEB-BASED INTERNSHIP MANAGEMENT SYSTEM</b></a>
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
					<?php if(isset($msg)) { echo $msg; } ?>		

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