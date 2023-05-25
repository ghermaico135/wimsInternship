<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/  
$userId = $_GET['id'];
$userDetails = dbFetchAssoc(dbQuery("SELECT * FROM `tbl_student`, tbl_course, tbl_group, tbl_user WHERE tbl_user.`user_id`='$userId' and tbl_course.course_id = tbl_student.course_id and tbl_group.group_id = tbl_student.group_id and tbl_student.user_id = tbl_user.user_id"));

$group_id = $userDetails['group_id'];
?>
<div class="page-title">
    <div class="title_left">
        <h4><?php echo $userDetails['name']; ?></h4>
    </div>
    
     <?php echo $timeComponent; ?>

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
                <p class="row"><b class="col-sm-3">Group</b>:&nbsp;&nbsp;&nbsp;<span style="font-size: 1.1em;"><?php echo $userDetails['group_name']; ?></span></p>
                <p class="row"><b class="col-sm-3">Course</b>:&nbsp;&nbsp;&nbsp;<span><?php echo $userDetails['course_name']; ?></span></p>
				<hr/>
				<?php 
				$select = dbQuery("SELECT * FROM tbl_student, tbl_user WHERE tbl_student.group_id = '$group_id' and tbl_student.user_id = tbl_user.user_id ");
					
					$total_rows = dbNumRows($select);
				?>
				<h4>Group Members:(<?php echo $total_rows; ?>)</h4>
                
				<table class="table table-striped" border="1">
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Reg Number</th>
						<th>Student Number</th>
					</tr>
					<?php
					
					$i=1;
					while($row = dbFetchAssoc($select)){
						echo '<tr>';
						echo '<td>'.($i++).'</td>';
						echo '<td>'.$row['name'].'</td>';
						echo '<td>'.$row['registration_number'].'</td>';
						echo '<td>'.$row['student_number'].'</td>';
						echo '</tr>';
					}
					
					?>
				</table>
                <br>
          <p style="color: orange; font-size: 22px;">PANELIST FOR <?php echo $userDetails['course_name'];?></p>


                <table class="table table-striped table-bordered">
				<thead>
				    <tr>
				        <th width="20px">S/N</th>
				        <th>Panelist Name</th>

				    </tr>
				</thead>                      
				<tbody>

	             <?php
	             $no=1;

	             $resPanel =  dbQuery("SELECT * FROM tbl_staff, tbl_user, tbl_group, tbl_course WHERE group_id = '$group_id' AND tbl_course.course_id = tbl_group.course_id AND tbl_course.dept_id = tbl_staff.dept_id AND tbl_staff.userType = 3 AND tbl_user.user_id = tbl_staff.user_id");
	             $count = dbNumRows($resPanel);

	                     if($count > 0)
	                                     {
	                           while($row=dbFetchAssoc($resPanel))
	                                            {
	                                                 ?>
				          <tr>
				       
				            <td><?php echo $no++; ?></td>
				            <td style="text-align: left; width="50%" "><?php echo $row['name']; ?></td>
				            
				        </tr>
				            <?php    }     }      else   { ?>
				      
				        <?php     } ?>  <?php    if($count > 0) {}  ?>

				</table>
                <br/>
                <hr>

                 <div style="float: left;">
                    <a href="<?php _link(); ?>dashboard" class="btn btn-small btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Dashboard</a>                    
                </div>
            </div>
        </div>
    </div>

    <!-- end details -->

    
</div>
