<?php
/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/      
        $company_id = $_POST['company_id'];	
        $company = $_POST['company_name'];
        $address = $_POST['physical_address'];         
        $mail = $_POST['email_address'];
        $tel = $_POST['phone'];
        $direction = $_POST['direction'];
        $from = $_POST['fromTime'];
        $to = $_POST['toTime'];  

/*$chk = $_POST['chk'];*/
$chkcount = count($company_id);

for($i=0; $i<$chkcount; $i++)
{     
 $compUdate = dbQuery(" UPDATE `tbl_company` SET `company_name`='$company[$i]',`address`='$address[$i]',`phone`='$tel[$i]',`email`='$mail[$i]',`direction_detail`='$direction[$i],'`fromTime`='$from[$i]',`toTime`='$to[$i]' WHERE company_id =". $company_id[$i]);

  echo $compUdate;

}

header("Location: index.php?page=company");

?>