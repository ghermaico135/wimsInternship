<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
?>
<!--Page starts from Here-->

<div class="page-title">
    <div class="title_left">
        <h4>PROJECT GROUPS CENTER</h4>
    </div>
    <?php echo $timeComponent; ?>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_panel">
            <div class="x_title">
    
    <!-- navbar for The Register, Modify, Filter, Print and Search Functions of the Project Groups Section -->
   <nav style="background-color: orange;">
      <div class="container">
           <!-- Collect the nav links, forms, and other content for toggling -->
      
        <div class="collapse navbar-collapse" id="navbar-collapse-3">
          <ul class="nav navbar-nav navbar-right">

          <!-- <li class="">
                <a href="<?php _link(); ?>addPanel" class="glyphicon glyphicon-plus" aria-hidden="false">&nbsp;Assign-Panel</a>
          </li> --> 
                               
          <li class="">
                <a href="<?php _link(); ?>addGroup" class="glyphicon glyphicon-plus" aria-hidden="false">&nbsp;New-Group</a>
          </li>  
 
          <!-- <li class="">
              <a href="#" onClick="edit_records(event, '<?php _link();?>groupEdit');" class="glyphicon glyphicon-pencil" aria-hidden="false">&nbsp;Edit</a>
          </li>

          <li class="">
               <a href="#" onClick="delete_records(event, '<?php _link();?>groupDelete');" class="glyphicon glyphicon-trash" aria-hidden="false">&nbsp;Delete</a>
         </li> -->

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
                <form method="post" name="frm" >

                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Group Name</th>
                            <th>Course</th>
                            <th>Date Created</th>

                        </tr>
                    </thead>                      
            <tbody>

                 <?php
                 $resGroup =  dbQuery("SELECT * FROM `tbl_group`, tbl_course WHERE tbl_course.course_id = tbl_group.course_id");
                 $count = dbNumRows($resGroup);

                         if($count > 0)
                                         {
                               while($row=dbFetchAssoc($resGroup))
                                                {
                                                     ?>
          <tr>
       
            <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['group_id']; ?>" /></td>
            <td style="text-align: center;"><?php echo $row['group_name']; ?></td>
            <td style="text-align: center;"><?php echo $row['course_name']; ?></td>
            <td style="text-align: center;"><?php echo $row['created_at']; ?></td>
        </tr>
            <?php    }     }      else   { ?>
      
        <?php     } ?>  <?php    if($count > 0) {}  ?>

</table>
</form>

            </div>
     </div>
</div>


            </div>
        </div>
    </div>
</div>
