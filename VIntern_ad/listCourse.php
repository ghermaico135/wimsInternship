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
        <h4>COURSE SECTION OF THE PROJECT</h4>
    </div>
    <P style="color: orange;"><?php echo $timeComponent; ?></P>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                

 <!-- navbar for The Register, Modify, Filter, Print and Search Functions of the Project Tasks Section -->
   <nav style="background-color: orange;">
      <div class="container">
           <!-- Collect the nav links, forms, and other content for toggling -->
      
        <div class="collapse navbar-collapse" id="navbar-collapse-3">
          <ul class="nav navbar-nav navbar-right"> 
        
        <?php if($_SESSION['user_type_name']==10){ ?>                
          <li class="">
                <a href="<?php _link(); ?>addCourse" class="glyphicon glyphicon-plus" aria-hidden="false">-Course</a>
          </li>  

          
        <?php } ?>  
         <li >             
               <a href="#" onClick="print($('table').eq(0), $('.title_left').html());" class="glyphicon glyphicon-print" aria-hidden="false">&nbsp;Print</a>            
         </li>           
        </ul>
         
            </div><!-- /.navbar-collapse --> 
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    
<!--/Ending the Nav tool bar -->

        </div>
            <div class="x_content">
              
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                         <tr>
                            <th class="center">S/N</th>
                            <th>Course Name</th>
                            <th>Course Year</th>  
                            <th>Coordinator Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $resultCourse = dbQuery("SELECT * FROM `tbl_course` ");
                        $x = 0;
                        while ($row = dbFetchAssoc($resultCourse)) {
                            $x++;
                            ?>
                            <tr>
                                <td class="center"><?php echo $x; ?></td>
                                <td><?php echo $row['course_name']; ?></td>
                                <td><?php echo $row['course_year']; ?></td>
                                
                                <td><?php echo getStaffName($row['staff_id']); ?></td>
                               
                                <td class="center">
                                    <a href="<?php _link(); ?>updateCourse&&id=<?php echo $row['course_id']; ?>" class="btn btn-primary btn-xs">Details</a>
                                    <a href="<?php _link(); ?>listCourse&&delete=<?php echo $row['course_id']; ?>" class="btn btn-danger btn-xs">Delete</a>
                                </td>              
                            </tr>
                            <?php
                        }

                        $delete = @$_GET['delete'];
                        if(!empty(@$delete)){
                          echo "DELETE FROM tbl_dept WHERE dept_id = '$delete';";
                          $delete = dbQuery("DELETE FROM tbl_course WHERE course_id = '$delete';");
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>