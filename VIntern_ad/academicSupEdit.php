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
        <h4 style="color: orange">UPDATE UNIVERSITY ACADEMIC SUPERVISOR</h4>
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
        window.location.href='<?php _link(); ?>academicSup';
        </script>
        <?php
    }
 
    $chk = $_POST['chk'];
    $chkcount = count($chk);
    
?>
    
    <form method="post" action="<?php _link(); ?>academicSupUpdate" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>

    <?php
for($i=0; $i<$chkcount; $i++)
{
    $id = $chk[$i];         
    $res=$dbConn->query("SELECT * FROM `tbl_academic_supervisor`");
    while($row = $res->fetch_array()) {
      ?>

        <tr>
            <td>
                <div class="form-group">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <input type="hidden" name="academic_id[]"  class="form-control col-md-7 col-xs-12" value="<?php echo $row['academic_id'];?>" >
                </div>
            </div> 


            <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Field Supervisor">Last Name <span class="required">:</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="lname[]" value="<?php echo $row['academic_lname'];?>" class="form-control col-md-7 col-xs-12" required="required">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="First Name">First Name <span class="required">:</span>
                            </label>

                             <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="fname[]" value="<?php echo $row['academic_fname'];?>" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                 </div>
                         
                <br> 

                <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Email">Email <span class="required">:</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="email" name="email[]" value="<?php echo $row['email'];?>" class="form-control col-md-7 col-xs-12"  required="required">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Telephone">Telephone  <span class="required">:</span>
                            </label>

                             <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="tel" name="phone[]" value="<?php echo $row['phone'];?>" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                 </div>
                 <br>
                 
                 <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Department">Department <span class="required">:</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="dept[]" value="<?php echo $row['department'];?>" class="form-control col-md-7 col-xs-12" required="required">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="College">College  <span class="required">:</span>
                            </label>

                             <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="college[]" value="<?php echo $row['college'];?>" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                 </div>
                 <br>

                 <div class="form-group">                            

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Faculty">Faculty  <span class="required">:</span>
                            </label>

                             <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" name="faculty[]" value="<?php echo $row['faculty'];?>" class="form-control col-md-7 col-xs-12" required="required">
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
               <center>
                    <button class="btn btn-info" type="submit" name="savemul"><i class="glyphicon glyphicon-ok-sign"></i>&nbsp; Update Academic Supervisor</button>&nbsp;&nbsp;
                    <a href="<?php _link(); ?>academicSup" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Academic Supervisor Details </a>
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