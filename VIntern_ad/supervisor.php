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
        <h4>SUPERVISORS LIST</h4>
    </div>
    <P style="color: orange;"><?php echo $timeComponent; ?></P>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                         <tr>
                            <th class="center">S/N</th>
                            <th>Names</th>
                            <th>Supervisor ID</th>
                            <th>Description</th>
                            <th>Department</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
						$user_id = user_id();
                      
						$get = dbQuery("SELECT dept_id FROM tbl_staff WHERE user_id=".$user_id);
						$row = dbFetchAssoc($get);
						
						
                        $result = dbQuery("SELECT tbl_user.name, tbl_staff.staff_description, tbl_staff.lecturer_id, tbl_dept.dept_name FROM `tbl_staff`,`tbl_user`,`tbl_dept` WHERE tbl_user.user_type=5 ");
                        $x = 0;
                        while ($row = dbFetchAssoc($result)) {
                            $x++;
                            ?>
                            <tr>
                                <td class="center"><?php echo $x; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['lecturer_id']; ?></td>
                                <td><?php echo $row['staff_description']; ?></td>
                                <td><?php echo $row['dept_name']; ?></td>
                                
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