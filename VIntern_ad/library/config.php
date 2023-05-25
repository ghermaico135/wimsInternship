<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
 */	
	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPass = '';
	$dbName = 'wims_db'; 

	require_once 'database.php';
	// require_once 'functions.php';



	date_default_timezone_set("Africa/Nairobi");
	
	$timeComponent = '<nav class=nav class="navbar navbar-default">
      <div class="container">    <!-- Collect the nav links, forms, and other content for toggling -->
        <div>
            <ul class="nav navbar-nav navbar-right">
               <li><h5>Today:&nbsp;&nbsp;'. date("M d, Y") .'</h5></li>
            </ul>
        </div>
      </div><!-- /.container -->
    </nav><!-- /.navbar -->';
	
	$filterComponent = '<li class="column-filter">
      <a href="#" class="glyphicon glyphicon-filter dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">&nbsp;Filter</a>
      <ul class="dropdown-menu pull-right">
      </ul>
    </li>';

?>