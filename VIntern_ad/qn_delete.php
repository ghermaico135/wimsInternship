<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>DELETE THE ASSESSMENT</h2>

                <div class="clearfix"></div>
            </div>

            <div class="x_content">
			
<?php
    
    error_reporting(0);
        
   
        
    $del = $_GET['id'];
    $sql=dbQuery("DELETE FROM `intern_assess` WHERE `id`=".$del);

        if($sql)
        {
            ?>
            <script>
            alert('<?php echo $chkcount; ?> The selected Project has been Deleted .... !!!');
            window.location.href='<?php _link(); ?>set_grade_qns';
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
            alert('Error while Deleting , TRY AGAIN');
            window.location.href='<?php _link(); ?>set_grade_qns';
            </script>
            <?php
        }
        
    

    
?>
          
            </div>
        </div>
    </div>
</div>