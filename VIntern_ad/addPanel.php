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
    border: 1px groove #ddd !important;/*
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;*/
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
        <h4>NEW PANEL LIST</h4>
    </div>

        <?php echo $timeComponent; ?>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <?php
                if (isset($_POST['Add_Panel'])) {

                    $panel_name = sqlEscape($_POST['panel_name']);
                    $groups = sqlEscape($_POST['groups']);         
                    $project = sqlEscape($_POST['project']);
                    $panel_members = sqlEscape($_POST['panel_members']);                   


                    $insertPanel = dbQuery( "INSERT INTO `tbl_panel`(`panel_name`, `groups`, `project`, `panel_members`) VALUES ('$panel_name','$groups', '$project', '$panel_members')");


                    if($insertPanel){
                        successMsg("Successfully Registered A Panel ");
                       goToPage("panel_list");
                    }                                 
                }
    ?>

    <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>
                   
            <tr>
                <td>                     
                  
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="panel_name">Panel Name<span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" name="panel_name"  placeholder="Enter Panel Name" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="project">Project Name<span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" name="project" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter the Project Name" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="groups">Project Group <span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" name="groups" class="form-control col-md-7 col-xs-12" required="required" placeholder="Project Group Here">
                    </div>
                </div>  

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="groups">Panel Members <span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" name="panel_members" class="form-control col-md-7 col-xs-12" required="required" placeholder="Panel Memberss">
                    </div>
                </div> 

                <br>
</td> 
      
</tr>        
            <tr>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center>                    
                            	<a href="<?php _link(); ?>panel_list" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; panel_list</a>
                                <button class="btn btn-info" type="submit" name="Add_Panel"><i class="glyphicon glyphicon-plus"></i>Add Panel</button>
                        	</center>
                        </div>
                    </div>               
                </td>
            </tr>
        </table>
    </form>
				 </div>
            </div>
        </div>
    </div>
