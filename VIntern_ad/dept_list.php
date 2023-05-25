﻿<?php

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
        <h4>FYPMS|DEPARTMENT RECORDS CENTER</h4>
    </div>
    <P style="color: orange;"><?php echo $timeComponent; ?></P>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_panel">
            <div class="x_title">
    
    <!-- navbar for The Register, Modify, Filter, Print and Search Functions of the Students Section -->
   <nav style="background-color: orange;">
      <div class="container">
           <!-- Collect the nav links, forms, and other content for toggling -->
      
        <div class="collapse navbar-collapse" id="navbar-collapse-3">
          <ul class="nav navbar-nav navbar-right">
           <?php if($_SESSION['user_type_name']==10){ ?>                    
          <li class="">
                <a href="<?php _link(); ?>deptAdd" class="glyphicon glyphicon-plus" aria-hidden="false">&nbsp;New</a>
          </li>  

          <li class="">
              <a href="#" onClick="edit_records(event, '<?php _link();?>deptEdit');" class="glyphicon glyphicon-pencil" aria-hidden="false">&nbsp;Edit</a>
          </li>

          <li class="">
               <a href="#" onClick="delete_records(event, '<?php _link();?>deptDelete');" class="glyphicon glyphicon-trash" aria-hidden="false">&nbsp;Delete</a>
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
                <form method="post" name="frm" >

                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Dept Code</th>
                            <th>Dept Name</th>
                            <th>Description</th>

                        </tr>
                    </thead>                      
            <tbody>

                 <?php
                 $resDept =  dbQuery("SELECT *FROM `tbl_dept`");
                 $count = dbNumRows($resDept);

                         if($count > 0)
                                         {
                               while($row=dbFetchAssoc($resDept))
                                                {
                                                     ?>
          <tr>
       
            <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['dept_id']; ?>" /></td>
            <td style="text-align: center;"><?php echo $row['dept_code']; ?></td>
            <td style="text-align: center;"><?php echo $row['dept_name']; ?></td>
            <td style="text-align: center;"><?php echo $row['dept_description']; ?></td>
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
