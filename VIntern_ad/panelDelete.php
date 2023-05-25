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
                <h2>FYPMS | DROP THE SELECTED PANEL LIST</h2>

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
        alert('Check at least one Task ..... !!!');
        window.location.href = '<?php _link(); ?>panel_list';
        </script>
        <?php
    }
    else
    {
        for($i=0; $i<$chkcount; $i++)
        {
            
            $del = $chk[$i];
            $sql=dbQuery("DELETE FROM tbl_panel WHERE panel_id=".$del);

        }   
        
        if($sql)
        {
            ?>
            <script>
            alert('<?php echo $chkcount; ?> A given panel has been Deleted !!!');
            window.location.href='<?php _link(); ?>panel_list';
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
            alert('Encountered Error while Trying to Delete , TRY AGAIN');
            window.location.href='<?php _link(); ?>panel_list';
            </script>
            <?php
        }
        
    }

    
?>
          
            </div>
        </div>
    </div>
</div>