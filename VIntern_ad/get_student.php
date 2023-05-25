<?php
session_start();
require_once 'library/config.php';
require_once 'library/functions.php';
// Code for Subjects




if(!empty($_POST["classid1"])) 
{



 $cid1=intval($_POST['classid1']);

 $qry = "SELECT * FROM intern_grade WHERE student_id={$_POST['classid1']} AND user_id={$_SESSION['user_id']}";
 $res = $dbConn->query($qry);

 if($res->num_rows > 0){
 
  ?>
  	<div class="col-sm-10">
        <div id="reslt">
          <p>
          <span style="color:red"> Result Already Declare .</span><script>$('#submit').prop('disabled',true);</script></p>
        </div>
      </div>
  <?php
 }
 else{

      $query = $dbConn->query("SELECT * FROM intern_assess where created_by=".$_SESSION['user_type_name']);
                            
      while ($row = $query->fetch_assoc()){                    
    ?>
    <div class="form-group">
      <label for="date" class="col-sm-2 control-label"><?php echo $row['question'] ?></label>
      <div class="col-sm-6">
        <div>
          <input type="number" name="answer[<?php echo $row['id'] ?>]" class="form-control" required="" value="<?php ?>"placeholder="Enter marks out of 10" min="0" max="10" autocomplete="off">
        </div>
      </div>
  	</div>


    

  <?php } ?>

  <div class="form-group" id="d-btn">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Declare Result</button>
      </div>
    </div>
   <?php

}
}


?>
