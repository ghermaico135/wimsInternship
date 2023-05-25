<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
?>
<div class="page-title">
    <div class="title_left">
        <h4>ADMIN | USER REGISTATION</h4>
    </div>
    <?php echo $timeComponent; ?>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <?php
                if (isset($_POST['register'])) {

                    $username = sqlEscape($_POST['username']);
                    $fullnames = sqlEscape($_POST['fullnames']);
                    $email = sqlEscape($_POST['email']);
                    $type = sqlEscape($_POST['type']);
                    $password = sqlEscape($_POST['password']);
                    $rePassword = sqlEscape($_POST['re-password']);
                    
                    $existTime = dbNumRows(dbQuery("SELECT * FROM `tbl_user` WHERE `username`='$username' AND `user_email`='$email' AND `user_type`= '$type'"));
                    if($existTime>0){
                        warningMsg("User Already registered");
                    }else if($password != $rePassword){
                        warningMsg("Passwords do not match");
                    }else{
                        $pass = sha1($password);
                        $insertUser = dbQuery("INSERT INTO `tbl_user`(`username`, `fullnames`, `user_email`, `user_password`, `user_type`) "
                                . "VALUES ('$username','$fullnames','$email','$pass','$type')");
                        if($insertUser){
                            successMsg("User Successfully Registered");
                            goToPage("listUsers");
                        }
                    }
                    
                }
                ?>
                <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" name="username" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Names <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="fullnames" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">:</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <input type="email" name="email" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">User type<span class="required">:</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <select name="type" class="form-control col-md-7 col-xs-12" required="required">
                                    <?php
                                    $queryUserType = dbQuery("SELECT ut_id, ut_name FROM tbl_usertype");
                                    while ($row = dbFetchAssoc($queryUserType)) {
                                        echo '<option value="'. $row["ut_id"] .'">'. $row["ut_name"] .'</option>';
                                    }
                                    ?>
                                </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <input type="password" name="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Re-Password <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <input type="password" name="re-password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" name="register"class="btn btn-success">Register</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
