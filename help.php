<?php
/*
<!-- ============================================
Project Name: INTERNSHIP MANAGEMENT  SYSTEM 
Website URL: 
Author: 
============================================= -->
 */
require_once 'VIntern_ad/library/config.php';
require_once 'VIntern_ad/library/functions.php';

if (isset($_SESSION['user_id'])) {
	  $url = '/VIntern/VIntern_ad/';
		header("Location: $url");
	    exit;
}
$errorMessage = '&nbsp;';

if (isset($_POST['login'])) {
    $result = doLogin();
    if ($result != '') {
        $errorMessage = $result;
    }
}
?>
<!DOCTYPE html >
<html lang="en">
<head>  
    <title>WEB-BASED INTERNSHIP MANAGEMENT SYSTEM</title>
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

   <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
	<link type="text/css" rel="stylesheet" href="css/style.css" />

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
				<b style="color: #ffffff;; font-size: 2.05em;">VIntern | INTERNSHIP MANAGEMENT  SYSTEM
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
				<li>
					<a href="index.php" style=" color: #00c6ff;">HOME</a>
				</li>			
			</ul>
		</div>
	</div>
</nav>


<div class="container-fluid text-center">
  <div class="row content">
    <div id="main">
				<!-- section of the index indeicating the SELF PORT HELP SECTION  -->

		<div id="help_container">
            <center> <h3 style="color: orange; font-weight: bold;">Your Self Support Section</h3></center><hr>
            
            <ul pull-left>
               <li><b style="font-size: 18px; color: blue;">Account Sign Up</b></li>
                <P class="mrtpbt">On creating An account, All Member's <span style="font-weight: bold; color: red; font-style: italic;">Email</span> must be your current and active email address <i>Because you have to activate before you log on</i>, &nbsp;&nbsp; <span style="font-weight: bold; color: red; font-style: italic;">For Academic Supervisor,</span> You should use the university email addresses Say, <span style="font-weight: bold; color: navy; font-style: italic;">yourname@vu.ac.ug</span>, <span style="font-weight: bold; color: red; font-style: italic;"><br/>Password: </span>This should be the password to use everytime you opt to login.</P>
               <li><b style="font-size: 18px; color: blue;">Signing In</b></li>
                <P class="mrtpbt">To Sign in, All members should use their <i>activated emails</i> and <i>Password</i> used on signup <span style="font-weight: bold; color: green; font-style: italic;"><hr style="margin: 0px; padding: 0px; width: 260px;"></b> </P>

                 <li><b style="font-size: 18px; color: blue;">For Further Help, Contact Your Internship Cordinator<span style="font-weight: bold; color: red; font-style: italic;">"Research and Internship office"</b></li>
            </ul> 
			       <img src="VIntern_ad/images/design.png">   
        </div>
				<!--    end of first column   -->		        
    </div> 
         
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