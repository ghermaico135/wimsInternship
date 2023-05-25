<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
$studentId = $_GET['studentId'];

$studentDetails = dbFetchAssoc(dbQuery("SELECT * FROM `tbl_student`, tbl_user, tbl_course WHERE tbl_student.user_id = tbl_user.user_id AND tbl_course.course_id = tbl_student.course_id AND `student_id`='$studentId'"));
?>

<!-- details -->
<div class="page-title">
    <div class="title_left">
      <h4>STUDENT RECORDS For: <span style="font-weight: bold;color: green;"><?php echo $studentDetails['name']; ?></span></h4>
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
            <td>Student Number:</td>
            <td><?php echo $studentDetails['student_number']; ?></td>
        </tr>

        <tr>
            <td>E-mail Address</td>
            <td><?php echo $studentDetails['email']; ?></td>
        </tr>

        <tr>
            <td>Registered Course</td>
            <td><?php echo $studentDetails['course_name']; ?></td>
        </tr>

                  
        
        
       
        <tr>
            <td>Date Of Registration:</td>
            <td><?php echo $studentDetails['created_at']; ?></td>
        </tr>        
               
    </table>

   <center>
           <a href="#" onClick="print($('table').eq(0), $('.title_left').html());" class="btn btn-info" aria-hidden="false"> <i class="glyphicon glyphicon-print"></i> &nbsp;Print</a>&nbsp;&nbsp; 

            <a href="<?php _link();?>student" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Student </a>
   </center> 

        </div>
    </div>
    <!-- end details -->


</div>
</div>
