<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
?>
<style type="text/css">   

fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }
</style>

<div class="page-title">
    <div class="title_left">
        <h4 style="color: orange">MODIFY THE SELECTED PROJECT</h4>
    </div>
    
     <span style="color: orange"><?php echo $timeComponent; ?></span>

</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
    
         <?php
    // print_r($_POST);
    error_reporting(0);

    if(isset($_POST['chk'])=="")
    {
        ?>
        <script>
        alert('At least one checkbox must be selected');
        window.location.href='<?php _link(); ?>projects';
        </script>
        <?php
    }

    $chk = $_POST['chk'];
    $chkcount = count($chk);
    
?>
    
    <form method="post" action="<?php _link(); ?>updateProjects" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>

    <?php
for($i=0; $i<$chkcount; $i++)
{
    $id = $chk[$i];         
    $res=$dbConn->query("SELECT * FROM tbl_project WHERE project_id=".$id);
    while($row = $res->fetch_array()) {
      ?>

       <tr>
                <td> 

                <div class="form-group">
                    
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="hidden" name="project_id" value="<?php echo $row['project_id'];?>"  class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="poject_name">project <span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" name="project_name[]" value="<?php echo $row['project_name'];?>"  class="form-control col-md-7 col-xs-12" required="required" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Project Description">Project Description <span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-9 col-xs-12">
                        <textarea name="project_description[]" value="<?php echo $row['project_description'];?>" required="required" class="form-control col-md-7 col-xs-12" rols="10"></textarea>
                    </div>
                </div>
                        
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="supervised_by">Supervisor <span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                            <select name="supervised_by[]" value="<?php echo $row['supervised_by'];?>" class="form-control col-md-7 col-xs-12" required="required">
                                    <?php
                                    $querySupervisor = dbQuery("SELECT user_id, name FROM tbl_user WHERE tbl_user.user_type = '5'");
                                    while ($row = dbFetchAssoc($querySupervisor)) {
                                        echo '<option value="'. $row["user_id"] .'">'. $row["name"] .'</option>'; 
                                    }
                                    ?>
                                </select>
                        </div>
                </div>
     
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date">Start Date<span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="date" name="start_date[]" value="<?php echo $row['start_date'];?>" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>

                <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="End Date">End Date <span class="required">:</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <input type="date" name="end_date[]" value="<?php echo $row['end_date'];?>" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                 </div>

                 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Group">Group<span class="required">:</span>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                            <?php 
                            
                            //echo "SELECT tbl_group.group_id, group_name FROM tbl_group, tbl_student WHERE tbl_student.group_id = tbl_group.group_id AND tbl_student.user_id = $user_id";
                            
                            ?>
                               <select name="group_id[]" value="<?php echo $row['group_id'];?>" class="form-control col-md-7 col-xs-12" required="required">
                                    <?php
                                    $user_id = user_id();
                                    $queryCourse = dbQuery("SELECT tbl_group.group_id, group_name FROM tbl_group, tbl_student WHERE tbl_student.group_id = tbl_group.group_id AND tbl_student.user_id = $user_id");
                                    while ($row = dbFetchAssoc($queryCourse)) {
                                        echo '<option value="'. $row["group_id"] .'">'. $row["group_name"] .'</option>'; 
                                    }
                                    ?>
                                </select>
                                
                            </div>
                 </div>
               <br>
                                                  
   </td>      
</tr>       
        
        <?php   
    }           
}
?>


         <tr>
    <td colspan="2">
        <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
   
   <center><button class="btn btn-info" type="submit" name="savemul"><i class="glyphicon glyphicon-new-window"></i>&nbsp; Update</button>&nbsp;&nbsp;
    <a href="<?php _link(); ?>projects" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp;Projects </a></center>
               </div>
        </div> 
       
    </td>
    </tr>
                   </table>
                </form>
        </div>
    </div>
</div>