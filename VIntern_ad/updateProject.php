<?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/

                    
        $project_id = $_POST['project_id'];	
        $status = $_POST['status'];             
        $project_description = $_POST['project_description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $supervised_by = $_POST['supervised_by'];
                    


/*$chk = $_POST['chk'];*/
$chkcount = count($project_id);

for($i=0; $i<$chkcount; $i++)
{     

	echo dbQuery("UPDATE `tbl_project` SET `start_date`='$start_date[$i]',`project_description`='$project_description[$i]',`end_date`='$end_date[$i]',`supervised_by`='$supervised_by[$i]' WHERE project_id=". $project_id[$i]);



}


header("Location: index.php?page=projects");

?>





