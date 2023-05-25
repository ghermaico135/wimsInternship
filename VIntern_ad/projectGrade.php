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
        <h4 style="color: orange">PROJECT GRADING</h4>
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
    
    <form method="post" action="<?php _link(); ?>gradeProject" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
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
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <input type="hidden" name="project_id[]"  class="form-control col-md-7 col-xs-12" value="<?php echo $row['project_id'];?>" >
                </div>
            </div>  

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="poject_name">project <span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" name="project_name[]" value="<?php echo $row['project_name']?>"  class="form-control col-md-7 col-xs-12" required="required" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Project Grading">Project Marks <span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-9 col-xs-12">
                        <input type="number" max="100" min="0" name="project_grade[]"  class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>


                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Project Comment ">Your Comment <span class="required">:</span>
                    </label>
                    <div class="col-md-7 col-sm-9 col-xs-12">
                        <textarea name="project_comment[]" class="form-control col-md-7 col-xs-12"></textarea>
                    </div>
                </div>
                

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
   
   <center><button class="btn btn-info" type="submit" name="savemul"><i class="glyphicon glyphicon-pencil"></i>&nbsp; Grade This Project</button>&nbsp;&nbsp;
    <a href="<?php _link(); ?>projects" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Projects </a></center>
               </div>
        </div> 
       
    </td>
    </tr>
                   </table>
                </form>
        </div>
    </div>
</div>