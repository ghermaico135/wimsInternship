<?php
/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
		<title>VInterns || INTERNSHIP MANAGEMENT SYSTEM</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description"> 
    		 <!-- Fav and touch icons --> 
    <link rel="shortcut icon" href="images/wims_logo.png">
        <!-- Font Awesome -->
        <link href="library/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="library/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="library/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="library/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="library/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="library/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="library/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="library/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="library/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <!-- Select2 -->
        <link href="library/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
        <!-- bootstrap-progressbar -->

        <!-- select -->
        <link rel="stylesheet" href="css/bootstrap-select.min.css"/>

        
        <link href='assets/css/fullcalendar.css' rel='stylesheet' />
        <link href='assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
        <!-- jQuery UI -->
        <link href="library/vendors/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="css/custom.min.css" rel="stylesheet"> 
        <link href="css/sweetalert.css" />

        <!-- jQuery -->
        <script src="library/vendors/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI -->
        <script src="library/vendors/jquery-ui-1.12.1/jquery-ui.min.js"></script>
        <!-- Bootstrap -->
        <script src="library/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="library/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="library/vendors/nprogress/nprogress.js"></script>
        <!-- Datatables -->
        <script src="library/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="library/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="library/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="library/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="library/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="library/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="library/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="library/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="library/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="library/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="library/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="library/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="library/vendors/jszip/dist/jszip.min.js"></script>
        <script src="library/vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="library/vendors/pdfmake/build/vfs_fonts.js"></script>

        <!-- iCheck -->
        <script src="library/vendors/iCheck/icheck.min.js"></script>
        <script src="library/vendors/bootbox.min.js" type="text/javascript"></script>
       
        <!-- TABLE EXPORT -->
        <script lang="javascript" src="library/vendors/xlsx/xlsx.core.min.js"></script>
        <script lang="javascript" src="library/vendors/Table_Export/src/v1/v1.2/js/FileSaver.js/FileSaver.js"></script>
        <script lang="javascript" src="library/vendors/Table_Export/src/stable/js/tableexport.js"></script>
        
        
        <!-- Select2 -->
        <script src="library/vendors/select2/dist/js/select2.full.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        
        <!-- date selector -->
        <script src="library/vendors/DATEJS/build/production/date.min.js"></script>
        <script src="library/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        
        <!-- Custom JavaScript for Calender -->
        <script src="js/js-script.js" type="text/javascript"></script>
        <script src='assets/js/moment.min.js'></script>
        <script src='assets/js/jquery-ui.min.js'></script>
        <script src='assets/js/fullcalendar.min.js'></script>
        <script src="js/column-filter.js" type="text/javascript"></script>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="#" class="site_title">
                                <i class="fa fa-home"></i>
                                <span style="color: #ffffff; font-size: 1em;">
                                    <?php echo _system('name'); ?></span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
								<?php
								$user_id = $_SESSION['user_id'];
								$select = dbQuery("SELECT avatar FROM tbl_user WHERE user_id = '$user_id'");
								$row = dbFetchAssoc($select);
								
								if(!empty($row['avatar'])){
									echo '<img src="'.$row['avatar'].'" alt="..." class="img-circle profile_img">';
								}else{
									echo '<img src="images/user.png" alt="..." class="img-circle profile_img">';
								}
								?>
                                
                            </div>
                            <div class="profile_info">
                                <!-- <span>Welcome,</span> -->
                                <h2><?php echo @$_SESSION['user_fullnames']; ?></h2>
                                <span><a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 10px;"></a> Online</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- /menu profile quick info -->
                        <br />
                        <!-- sidebar menu -->
                        <?php require_once 'sidebar_menu.php'; ?>
                        <!-- /sidebar menu -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu" style="background-color: #025e8f; color: #ffffff;" >
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <ul class="nav navbar-nav navbar-right nav-top">

                                <li>
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Logged In As &nbsp;&nbsp;<?php echo getUserType(@$_SESSION['user_type_name']); ?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermen pull-right">
									
                                        <?php 	if(!isProfileComplete()){?>
										<li><a href="<?php _link(); ?>completeProfile&id=<?php echo $_SESSION['user_id']; ?>"> Complete Your Profile</a></li>
										<?php } ?>
										
										<?php if($_SESSION['user_type_name']==2){ ?>
                                        <!-- <li><a href="<?php _link(); ?>userGroup&&id=<?php echo $_SESSION['user_id']; ?>"> View Your Group</a></li> -->
										<?php } ?>
                                        <li><a href="<?php _link(); ?>updateUser_&&id=<?php echo $_SESSION['user_id']; ?>">View-Profile</a></li>
                                        
                                        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    </ul>
                                </li>
								<?php if(isProfileComplete() && $_SESSION['user_type_name'] == 2){ ?>
                                <li style="font-weight: bold;font-size: 16px;color: #ffffff;"><a href="<?php _link(); ?>reportFormat"><i class="fa fa-eye"></i>&nbsp;Report Format</a>
                                </li>
                                <?php } ?>                           
                            </ul>
                        </nav>
						
                    </div>
                </div>
                <!-- /top navigation -->

                 <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <?php require_once $content; ?>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer style="background-color: silver;">
                    <div class="pull-right">
                        <?php _system('copyright'); ?> <?php echo date("Y"); ?> All rights Reserved<a href="mailto:bazigu.alex@gmail.com">. Developed by <?php _system('developer'); ?></a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- Custom Theme Scripts -->
        <script src="js/custom.js"></script>
        <script src="js/sweetalert.min.js"></script>
    </body>
</html>



