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
        <h4 style="color: orange;">Users</h4>
    </div>
    <p style="color: orange;"><?php echo $timeComponent; ?>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <?php
                if (isset($_GET['delete'])) {
                    $delete = dbQuery("DELETE FROM `tbl_user` WHERE `user_id`='{$_GET['delete']}'");
                    if ($delete) {
                        successMsg("Successfully deleted");
                        goToPage("listUsers");
                    } else {
                        warningMsg("This user Can not be deleted.");
                        goToPage("listUsers");
                    }
                }
                ?>
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                         <tr>
                            <th class="center">#</th>
                            <th>Full Names</th>
                            <th>Emails</th>
                            <th>Telephone</th>
                            <th>User Status</th>
                            <th>Admin Options</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $result = dbQuery("SELECT * FROM `tbl_user`");
                        $x = 0;
                        while ($row = dbFetchAssoc($result)) {
                            $x++;
                            ?>
                            <tr>
                                <td class="center"><?php echo $x; ?></td>
                                <td><?php echo $row['name']; ?></td>                          
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['telephone']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td class="center">
                                    <a href="<?php _link(); ?>updateUser&&id=<?php echo $row['user_id']; ?>" class="btn btn-primary btn-xs">Details</a>
                                    <a href="<?php _link(); ?>listUsers&&delete=<?php echo $row['user_id']; ?>" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>