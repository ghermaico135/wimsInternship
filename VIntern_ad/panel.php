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
        <h4>YOUR PANEL LIST</h4>
    </div>
    <?php echo $timeComponent; ?>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_panel">
            <div class="x_title">
    

    
<!--/Ending the Nav tool bar -->

            </div>
            <div class="x_content">            
                <form method="post" name="frm" >

                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Panelist Name</th>

                        </tr>
                    </thead>                      
            <tbody>

                 <?php
                 $resPanel =  dbQuery("SELECT *FROM `tbl_user` WHERE user_type = '3'");
                 $count = dbNumRows($resPanel);

                         if($count > 0)
                                         {
                               while($row=dbFetchAssoc($resPanel))
                                                {
                                                     ?>
          <tr>
       
            <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['panel_id']; ?>" /></td>
            <td style="text-align: center;"><?php echo $row['name']; ?></td>
            
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
