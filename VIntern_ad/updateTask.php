<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/

                    
        $task_id = $_POST['task_id'];	
        $task_name = $_POST['task_name'];             
        $task_description = $_POST['task_description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $supervised_by = $_POST['supervised_by'];
        $group_id = $_POST['group_id'];
                    


/*$chk = $_POST['chk'];*/
$chkcount = count($task_id);

for($i=0; $i<$chkcount; $i++)
{     

	echo dbQuery("UPDATE `tbl_task` SET `start_date`='$start_date[$i]',`task_description`='$task_description[$i]',`end_date`='$end_date[$i]',`supervised_by`='$supervised_by[$i]',`group_id`='$group_id[$i]' WHERE task_id=". $task_id[$i]);



}


header("Location: index.php?page=tasks");

?>





