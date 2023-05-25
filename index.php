<?php
/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author: 
======================================================= -->
 */
require_once 'VIntern_ad/library/config.php';
require_once 'VIntern_ad/library/functions.php';
 
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
			<a class="navbar-brand" href="index.php"><b style="color: #ffffff;; font-size: 2.05em;">VIntern | INTERNSHIP MANAGEMENT SYSTEM</b></a>
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
          <li><a href="help.php" style=" color: blue;">Help?</a></li>		
			</ul>
		</div>
	</div>
</nav>


<div class="container-fluid text-center">
  <div class="row content">

    <div id="main-home">
    	<div id="index_container">
                            		   
		   		   
                        <div class="fgrow">
               <center> <p>System Users should Sign Up from here ...! <b>Register</b></p>&nbsp;&nbsp;
      <p><button class="btn btn-success" type="button" onclick=window.parent.location.href='signup.php' target='_parent' data-toggle="tooltip" data-placement="right" title="Sign Up Now to Get Access to the Portal!">Sign Up</button> </p>
      
	            </center>  
				<center><hr width="100%"></center>
				
				
				<center> <p>A Registered Member Already .... <b> login</b></p>&nbsp;&nbsp;
      <p>
	  
	  
	  <button class="btn btn-danger" type="button" onclick=window.parent.location.href='login.php' target='_parent' data-toggle="tooltip" data-placement="right" title="Sign In to Access the Portal...!">Sign in</button> </p>
      
	            </center> 
				<center><hr width="100%"></center>
	             <img src="VIntern_ad/images/design.png">  				
			 </div>
		</div> 

<!-- end of second column-->				
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