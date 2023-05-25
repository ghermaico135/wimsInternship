-<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
 $user = new User();
?>
<!--Page starts from Here-->

<div class="page-title">
    <div class="title_left">
        <h4 style="color: orange">PROJECT'S CENTER</h4>
    </div>
  <span style="color: orange"><?php echo $timeComponent; ?></span>

</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_panel">
            <div class="x_title">
    
    <!-- navbar for The Register, Modify, Filter, Print and Search Functions of the projects Section -->
   <nav style="background-color: orange;">
      <div class="container">
           <!-- Collect the nav links, forms, and other content for toggling -->
      
        <div class="collapse navbar-collapse" id="navbar-collapse-3">
          <ul class="nav navbar-nav navbar-right"> 
          <?php if($_SESSION['user_type_name']==3){?>
          <li class="">
                <a href="#" onClick="edit_records(event, '<?php _link();?>projectGrade');" class="glyphicon glyphicon-ok-circle" aria-hidden="false">&nbsp;Assign Marks</a>
          </li>  
          <?php } ?>
			
			<?php if(!$user->isProjectAdded() && ($_SESSION['user_type_name']!=3)){ ?>
          <li class="">
                <a href="<?php _link(); ?>projectAdd" class="glyphicon glyphicon-plus" aria-hidden="false">&nbsp;New</a>
          </li>  
			<?php } ?>
			<?php if($_SESSION['user_type_name'] == 5 && ($_SESSION['user_type_name']!=3)){ ?>
          <li class="">
              <a href="#" onClick="edit_records(event, '<?php _link();?>checkProgress');" class="glyphicon glyphicon-ok-circle" aria-hidden="false">&nbsp;Check-Progress</a>
          </li>
			<?php } ?>
      <?php if($_SESSION['user_type_name']!=3){ ?>
          <li class="">
              <a href="#" onClick="edit_records(event, '<?php _link();?>projectEdit');" class="glyphicon glyphicon-pencil" aria-hidden="false">&nbsp;Edit</a>
          </li>
      <?php } ?>
			<?php if($_SESSION['user_type_name'] == 5){ ?>
          <li class="">
               <a href="#" onClick="delete_records(event, '<?php _link();?>projectDelete');" class="glyphicon glyphicon-trash" aria-hidden="false">&nbsp;Delete</a>
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
                            <th>Project Name</th>
                            <th>Project Description</th>
                            <th>Start Date</th>     
                            <th>End Date</th>
                            <th>Group</th> 
                            <?php if($_SESSION['user_type_name']!=3){ ?>                           
                            <th>Supervisor</th>
                            <th>Date Created</th>
                            
                            <th>Progress</th>
                            <?php } ?>

                        </tr>
                    </thead>                      
            <tbody>
 
                 <?php
                 $resProject =  dbQuery("SELECT * FROM `tbl_project` ");
                 $count = dbNumRows($resProject);

                         if($count > 0)
                                         {
                               while($row=dbFetchAssoc($resProject))
                                            {
												$ii = $row['project_id'];
													
													if(userGroup()==$row['group_id']||isCordinator()||($_SESSION['user_type_name']==3 && !isGraded($ii))){

          if($_SESSION['user_type_name'] == 3){
            echo '<tr>';
          }else{                  
                                                     ?>
          <tr onClick="viewDetails(event, 'index.php?page=projectDetails&projectId=<?php echo $row['project_id']; ?>')">
          <?php } ?>
       
            <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['project_id']; ?>" /></td>
            <td style="text-align: center;"><?php echo $row['project_name']; ?></td>
            <td style="text-align: center;"><?php echo $row['project_description']; ?></td>
            <td style="text-align: center;"><?php echo $row['start_date']; ?></td>
            <td style="text-align: center;"><?php echo $row['end_date']; ?></td>
            <td style="text-align: center;"><?php echo getGroupName($row['group_id']); ?></td>
            <?php if($_SESSION['user_type_name']!=3){ ?>
            <td style="text-align: center;"><?php echo getUserName($row['supervised_by']);?></td>
            <td style="text-align: center;"><?php echo $row['created_at'];?></td>
            
            <td style="text-align: center;"><?php echo $row['status']; ?></td>
            <?php } ?>

        </tr>
            <?php    
													}
			
			
			}    


			}      else   { ?>
      
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
