<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
$taskId = $_GET['taskId'];
$std = $_GET['std'];

$taskDetails = dbFetchAssoc(dbQuery("SELECT * FROM `tbl_task`  WHERE `task_id`='$taskId'"));

$std = $dbConn->query("SELECT u.name, s.user_id FROM tbl_user u JOIN tbl_student s ON u.user_id=s.user_id WHERE s.student_id=".$std);
while ($rown = mysqli_fetch_array($std)) {
$stdname = $rown['name'];
}
?>

<!-- details -->
<div class="page-title">
    <div class="title_left">
      <h4>TASK DETAILS FOR: <span style="font-weight: bold;color: orange;"><?php echo $stdname; ?></span></h4>
    </div>

     <?php echo $timeComponent; ?>

</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

<?php

error_reporting(0);


?>
   <table id="datatable" class='table table-details'>
        <tr>
            <td>Task</td>
            <td><?php echo $taskDetails['task_name']; ?></td>
        </tr>

        <tr>
            <td>Task Description:</td>
            <td><?php echo $taskDetails['task_description']; ?></td>
        </tr>

        <tr>
            <td>Assignment Date:</td>
            <td><?php echo $taskDetails['created_at']; ?></td>
        </tr>

         <tr>
            <td>Assigned By:</td>
            <td><?php echo getUserName($taskDetails['staff_id']); ?></td>
        </tr>

        <tr>
            <td>Progress Status:</td>
            <td><?php echo $taskDetails['task_status']; ?></td>
        </tr>

         <tr>
            <td>start date:</td>
            <td><?php echo $taskDetails['start_date']; ?></td>
        </tr>       

         <tr>
            <td>Date of Submission:</td>
            <td><?php echo $taskDetails['updated_at']; ?></td>
        </tr>
       
        <tr>
            <td>End Date:</td>
            <td><?php echo $taskDetails['end_date']; ?></td>
        </tr>

        <tr>
            <td>Assignment Submitted:</td>
            <td><a href="<?php echo $taskDetails['task_upload']; ?>" target="_blank"><?php echo end(explode('/',$taskDetails['task_upload'])); ?> &nbsp; <a class="btn btn-danger btn-sm" href="<?php echo $taskDetails['task_upload']; ?>" target="_blank">Download Assignment</a></td>
        </tr>               
               
    </table>

   <center>
           <a href="#" onClick="print($('table').eq(0), $('.title_left').html());" class="btn btn-success" aria-hidden="false"> <i class="glyphicon glyphicon-print"></i> &nbsp;Print</a>&nbsp;&nbsp; 

            <a href="<?php _link();?>tasks" class="btn btn-large btn-primary"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Tasks </a>
   </center> 

        </div>
    </div>
    <!-- end details -->


</div>
</div>
