<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/    
$userId = $_GET['id'];
$userDetails = dbFetchArray(dbQuery("SELECT * FROM `tbl_user` WHERE `user_id`='$userId'"));
?>
<div class="page-title">
    <div class="title_left">
        <h4 style="color: orange;">DETAILS FOR : &nbsp;&nbsp;<?php echo $userDetails[2]; ?></h4>
    </div>
    
    <p style="color: orange"> <?php echo $timeComponent; ?></p>

</div>

<div class="clearfix"></div>

<div class="row">

    <!-- details -->
    <div class="col-md-10 col-sm-10 col-xs-12">
        <div class="x_panel">
            <div class="x_title no-padding">
                <h4>User Details</h4>
            </div>
            <div class="x_content">
                <p class="row"><b class="col-sm-3">Names</b>:&nbsp;&nbsp;&nbsp;<span style="font-size: 1.1em;"><?php echo $userDetails[1]; ?></span></p>
                <p class="row"><b class="col-sm-3">Email</b>:&nbsp;&nbsp;&nbsp;<span><?php echo $userDetails[2]; ?></span></p>
                 <p class="row"><b class="col-sm-3">Telephone Number</b>:&nbsp;&nbsp;&nbsp;<span><?php echo $userDetails[3]; ?></span></p>
                  <p class="row"><b class="col-sm-3">User Status</b>:&nbsp;&nbsp;&nbsp;<span><?php echo getUserType($userDetails[7]); ?></span></p>
                   <p class="row"><b class="col-sm-3">Account Created</b>:&nbsp;&nbsp;&nbsp;<span><?php echo $userDetails[10]; ?></span></p>
                <br>
                <hr>

                 <div style="float: left;">
                    <a href="<?php _link(); ?>listUsers" class="btn btn-small btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp;Users</a>                    
                </div>
            </div>
        </div>
    </div>

    <!-- end details -->

    
</div>
