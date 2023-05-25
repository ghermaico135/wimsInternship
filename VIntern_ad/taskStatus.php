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
        <h4 style="color: orange">UPDATE TASK STATUS</h4>
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
        window.location.href='<?php _link(); ?>tasks';
        </script>
        <?php
    }
 
    $chk = $_POST['chk'];
    $chkcount = count($chk);
    
?>
    
    <form method="post" action="<?php _link(); ?>updateTaskStatus" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>

    <?php
for($i=0; $i<$chkcount; $i++)
{
    $id = $chk[$i];         
    $res=$dbConn->query("SELECT * FROM tbl_task WHERE task_id=".$id);
    while($row = $res->fetch_array()) {
      ?>

        <tr>
            <td>
                <div class="form-group">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <input type="hidden" name="task_id[]"  class="form-control col-md-7 col-xs-12" value="<?php echo $row['task_id'];?>" >
                </div>
            </div>  

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Task Name">Task <span class="required">:</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-7">
                        <input type="text" name="task_name[]" value="<?php echo $row['task_name']?>"  class="form-control col-sm-7 col-xs-12" required="required" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">  
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Task Progress">Task Progress <span class="required">:</span>
                    </label>                  
                    <div class="col-md-6 col-sm-6 col-xs-7">
                        <select name="task_status[]" class="form-control col-sm-6 col-xs-12">
                            <option value="Submitted With Error Check well your work">Submitted With Error Check well your work</option>
                             <option value="Finished Completely">Finished Completely</option>
                        </select>
                    </div>
                </div>
                <br><br>
                

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
   
   <center><button class="btn btn-info" type="submit" name="savemul"><i class="glyphicon glyphicon-pencil"></i>&nbsp; Submit</button>&nbsp;&nbsp;
    <a href="<?php _link(); ?>tasks" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Tasks </a></center>
               </div>
        </div> 
       
    </td>
    </tr>
                   </table>
                </form>
        </div>
    </div>
</div>