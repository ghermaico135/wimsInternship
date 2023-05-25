<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
$projectId = $_GET['projectId'];

$projectDetails = dbFetchAssoc(dbQuery("SELECT * FROM `tbl_project`  WHERE `project_id`='$projectId'"));
?>

<!-- details -->
<div class="page-title">
    <div class="title_left">
      <h4>Project Details For: <span style="font-weight: bold;color: orange;"><?php echo $projectDetails['project_name']; ?></span></h4>
    </div>

    <span style="color: orange"><?php echo $timeComponent; ?></span>


</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

<?php

error_reporting(0);

if (isset($_POST['chk']) == "") {
    ?>
       
        <?php
}
$chk      = $_POST['chk'];
$chkcount = count($chk);

?>
   <table id="datatable" class='table table-details'>
        <tr>
            <td style="font-weight: bold;">Project Name</td>
            <td><?php echo $projectDetails['project_name']; ?></td>
        </tr>

        <tr>
            <td style="font-weight: bold;">Project Description:</td>
            <td><?php echo $projectDetails['project_description']; ?></td>
        </tr>

        <tr>
            <td style="font-weight: bold;">Start Date</td>
            <td><?php echo $projectDetails['start_date']; ?></td>
        </tr>

         <tr>
            <td style="font-weight: bold;">End Date</td>
            <td><?php echo $projectDetails['end_date']; ?></td>
        </tr>

        <tr>
            <td style="font-weight: bold;">Group Members</td>
            <td><?php 
			
			$userId = user_id();
			$group_id = $projectDetails['group_id'];
			$select = dbQuery("SELECT * FROM tbl_student, tbl_user WHERE tbl_student.group_id = '$group_id' and tbl_student.user_id = tbl_user.user_id ");
			while($row = dbFetchAssoc($select)){
				$x[] = ucwords(''.$row['name'].'');
			}
			echo implode(', ', $x);
			?></td>
        </tr>

         <tr>
            <td style="font-weight: bold;">Supervisor Name:</td>
            <td><?php echo ucwords(getUserName($projectDetails['supervised_by'])); ?></td>
        </tr> 

         <tr>
            <td style="font-weight: bold;">Date of Submission:</td>
            <td><?php echo $projectDetails['created_at']; ?></td>
        </tr>
       
        <tr>
            <td style="font-weight: bold;">Project Status:</td>
            <td><?php echo $projectDetails['status']; ?></td>
        </tr>
		<?php 
		
		$project_id = $_GET['projectId'];
		$select = dbQuery("SELECT panelist_id, project_grade FROM tbl_projectmarks WHERE project_id = '$project_id'");
		$total_panelist = dbNumRows($select);
		
		if(!empty($total_panelist)){
		?>
        <tr>
            <td>Panelists:</td>
            <td>
			<?php 
			//SELECT `mark_id`, `project_id`, `panelist_id`, `project_grade`, `project_comment` FROM `tbl_projectmarks` WHERE 1
			
			$total_panelist = dbNumRows($select);
			$panelist_name = array();
			$panelist_grade = array();
			$panelist_total = 0;
			while($rows = dbFetchAssoc($select)){
				$panelist_name[] = ucwords(getUserName($rows['panelist_id']));
				$panelist_grade[] = $rows['project_grade'];
				$panelist_total += $rows['project_grade'];
			}
			
			echo implode(', ', $panelist_name);
			
			?></td>
        </tr>
        <tr>
            <td>Project Grade Average:</td>
            <td><?php echo number_format($panelist_total/$total_panelist, 1)."%"; ?></td>
        </tr>
		<?php } ?>
    </table>

   <center>
           <a href="#" onClick="print($('table').eq(0), $('.title_left').html());" class="btn btn-success" aria-hidden="false"> <i class="glyphicon glyphicon-print"></i> &nbsp;Print</a>&nbsp;&nbsp; 

            <a href="<?php _link();?>projects" class="btn btn-large btn-primary"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Projects </a>
   </center> 

        </div>
    </div>
    <!-- end details -->


</div>
</div>
