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
        <h4>DEPARTMENT REGISTRATION FORM</h4>
    </div>

        <?php echo $timeComponent; ?>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <?php
                if (isset($_POST['Add_Dept'])) {

                    $dept_code = sqlEscape($_POST['dept_code']);
                    $dept_description = sqlEscape($_POST['dept_description']);         
                    $dept_name = sqlEscape($_POST['dept_name']);                   


                    $insertDept = dbQuery( "INSERT INTO `tbl_dept`(`dept_code`, `dept_description`, `dept_name`) VALUES ('$dept_code','$dept_description', '$dept_name')");


                    if($insertDept){
                        successMsg("Successfully Added A New Department ");
                       goToPage("dept_list");
                    }                                 
                }
    ?>

    <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>
                   
            <tr>
                <td>                     
                  
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Dept_code">Dept Code<span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" name="dept_code"  placeholder="Enter Department Code" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dept_name">Dept Name<span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" name="dept_name" class="form-control col-md-7 col-xs-12" required="required" placeholder="Enter the Dept Name" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dept_description">Dept Descriptioon <span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" name="dept_description" class="form-control col-md-7 col-xs-12" required="required" placeholder=" Dept Description Here">
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
                                <button class="btn btn-info" type="submit" name="Add_Dept"><i class="glyphicon glyphicon-plus"></i>Add Dept</button>
                            	<a href="<?php _link(); ?>dept_list" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; dept_list</a>
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
