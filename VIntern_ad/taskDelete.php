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
                <h2>DELETE THE SELECTED TASK</h2>

                <div class="clearfix"></div>
            </div>

            <div class="x_content">
			
			    <?php
    
    error_reporting(0);
        
    $chk = $_POST['chk'];
    $chkcount = count($chk);
    
    if(!isset($chk))
    {
        ?>
        <script>
        alert('At least one checkbox Must be Selected !!!');
        window.location.href = '<?php _link(); ?>tasks';
        </script>
        <?php
    }
    else
    {
        for($i=0; $i<$chkcount; $i++)
        {
            
            $del = $chk[$i];
            $sql=dbQuery("DELETE FROM tbl_task WHERE task_id=".$del);

        }   
        
        if($sql)
        {
            ?>
            <script>
            alert('<?php echo $chkcount; ?> Task Records Was Deleted !!!');
            window.location.href='<?php _link(); ?>tasks';
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
            alert('Error while Deleting , TRY AGAIN');
            window.location.href='<?php _link(); ?>tasks';
            </script>
            <?php
        }
        
    }

    
?>

          
            </div>
        </div>
    </div>
</div>