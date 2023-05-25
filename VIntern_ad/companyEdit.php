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
        <h4 style="color: #025e8f;">MODIFY THE PROVIDED COMPANY DETAILS</h4>
    </div>
    
     <span style="color: #025e8f;"><?php echo $timeComponent; ?></span>

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
        window.location.href='<?php _link(); ?>company';
        </script>
        <?php
    }

    $chk = $_POST['chk'];
    $chkcount = count($chk);
    
?>
    
    <form method="post" action="<?php _link(); ?>updateCompany" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>

    <?php
for($i=0; $i<$chkcount; $i++)
{
    $id = $chk[$i];         
    $res=$dbConn->query("SELECT * FROM `tbl_company` WHERE `company_id` = ".$id);
    while($row = $res->fetch_array()) {
      ?>

       <tr>
                <td> 

                <div class="form-group">
                    
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="hidden" name="company_id" value="<?php echo $row['company_id'];?>"  class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="company_name">Company Code <span class="required">:</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="company_code[]" value="<?php echo $row['company_code'];?>"  class="form-control col-md-7 col-xs-12" required="required" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="company_name">Place of Placement <span class="required">:</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="company_name[]" value="<?php echo $row['company_name'];?>"  class="form-control col-md-7 col-xs-12" required="required" >
                    </div>
                </div>

              <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Physical Address">Physical Address <span class="required">:</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="physical_address[]" value="<?php echo $row['address'];?>" required="required" class="form-control col-md-7 col-xs-12" rols="10">
                    </div>
                </div>
                        
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Email Address">Email Address <span class="required">:</span>
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                         <input type="text" name="email_address[]" value="<?php echo $row['email'];?>" required="required" class="form-control col-md-7 col-xs-12" rols="10">
                    </div>
                 
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Telephone">Telephone<span class="required">:</span>
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="tel" name="phone[]" value="<?php echo $row['phone'];?>" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>

                <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Company Direction">Company Direction <span class="required">:</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <textarea name="direction[]" class="form-control col-md-7 col-xs-12" required="required"><?php echo $row['direction_detail'];?></textarea>
                            </div>
                 </div>

                 <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Company Operating Time">Operating Hours | From <span class="required">:</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="time" name="fromTime[]" value="<?php echo $row['fromTime'];?>" class="form-control col-md-7 col-xs-12" required="required">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="Company Operating Time">To Time  <span class="required">:</span>
                            </label>

                             <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="time" name="toTime[]" value="<?php echo $row['toTime'];?>" class="form-control col-md-7 col-xs-12" required="required">
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
    <a href="<?php _link(); ?>company" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp;Company Details </a></center>
               </div>
        </div> 
       
    </td>
    </tr>
                   </table>
                </form>
        </div>
    </div>
</div>