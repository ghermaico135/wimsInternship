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
        <h4 style="color: orange">PREVIOUS PROJECT'S CENTER</h4>
    </div>
    <span style="color: orange"><?php echo $timeComponent; ?></span>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_panel">
            <div class="x_title">

            </div>
            <div class="x_content">            
                <form method="post" name="frm" >

                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Project Name</th>
                            <th>Project Description</th>
                            <th>Supervised By</th>
                            <th>Year Of Submission</th>

                        </tr>
                    </thead>                      
            <tbody>

                 <?php
                 $my_date = date('Y');
                 $resProject =  dbQuery("SELECT * FROM `tbl_project`, tbl_user,tbl_staff WHERE year(end_date) != '$my_date' AND tbl_staff.user_id = tbl_user.user_id AND tbl_project.supervised_by = tbl_staff.staff_id");
                 $count = dbNumRows($resProject);

                         if($count > 0)
                                         {
                               while($row=dbFetchAssoc($resProject))
                                                {
                                                     ?>
          <tr onClick="viewDetails(event, 'index.php?page=previousProjectDetails&projectId=<?php echo $row['project_id']; ?>')">
       
            <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['project_id']; ?>" /></td>
            <td style="text-align: center;"><?php echo $row['project_name']; ?></td>
            <td style="text-align: center;"><?php echo $row['project_description']; ?></td>  
            <td style="text-align: center;"><?php echo $row['name'];?></td>
            <td style="text-align: center;"><?php echo $row['created_at'];?></td>
            

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
