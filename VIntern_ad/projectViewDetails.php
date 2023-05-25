<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
$projectId = $_GET['projectId'];

$my_date = date('Y');
$projectViewDetails = dbFetchAssoc(dbQuery("SELECT * FROM `tbl_project`, tbl_user,tbl_staff WHERE year(end_date) != '$my_date' AND tbl_staff.user_id = tbl_user.user_id AND tbl_project.supervised_by = tbl_staff.staff_id AND `project_id`='$projectId'"));
?>

<!-- details -->
<div class="page-title">
    <div class="title_left">
      <h4>Details For: <span style="font-weight: bold;color: red; font-size: 20px;"><?php echo $projectViewDetails['project_name']; ?></span></h4>
      <hr />
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
            <td>Project's Name</td>
            <td><?php echo $projectViewDetails['project_name']; ?></td>
        </tr>

        <tr>
            <td>Project Description:</td>
            <td><?php echo $projectViewDetails['project_description']; ?></td>
        </tr>

         <tr>
            <td>Supervised By</td>
            <td><?php echo $projectViewDetails['name']; ?></td>
        </tr>

        <tr>
            <td>Year Of submission</td>
            <td><?php echo $projectViewDetails['created_at']; ?></td>
        </tr>

         
       
               
    </table>

   <center>
           <a href="#" onClick="print($('table').eq(0), $('.title_left').html());" class="btn btn-success" aria-hidden="false"> <i class="glyphicon glyphicon-print"></i> &nbsp;Print</a>&nbsp;&nbsp; 

            <a href="<?php _link();?>previousProject" class="btn btn-large btn-primary"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Previous-Project </a>
   </center> 

        </div>
    </div>
    <!-- end details -->


</div>
</div>
