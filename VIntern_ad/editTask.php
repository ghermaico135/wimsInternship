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
        <h4>MODIFY THE SELECTED PROJECT RECORDS</h4>
    </div>
    
     <?php echo $timeComponent; ?>
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
        window.location.href='<?php _link(); ?>students';
        </script>
        <?php
    }

    $chk = $_POST['chk'];
    $chkcount = count($chk);
    
?>
    
    <form method="post" action="<?php _link(); ?>updateStudents" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            
        <table class='table table-bordered'>

    <?php
for($i=0; $i<$chkcount; $i++)
{
    $id = $chk[$i];         
    $res=$dbConn->query("SELECT * FROM tbl_student WHERE student_id=".$id);
    while($row = $res->fetch_array()) {
      ?>

        <tr>
                <td>                     
                   <fieldset class="scheduler-border">
                      <legend class="scheduler-border">STUDENT DETAILS</legend>
                
                <div class="form-group">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="hidden" name="student_id[]"  class="form-control col-md-7 col-xs-12" value="<?php echo $row['student_id'];?>" >
                        </div>
                </div>  

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_name">Name <span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" name="student_name[]"  value="<?php echo $row['student_name'];?>"  class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">DOB <span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="date" name="dob[]" value="<?php echo $row['dob'];?>"  class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Gender">Gender <span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="radio" name="gender[]" value="Male">&nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gender[]" value="Female">&nbsp;&nbsp;Female
                    </div>
                </div> 

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Marital Status <span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="radio" name="marital_status[]" value="Single">&nbsp;Single &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="marital_status[]" value="Married">&nbsp;Married &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="marital_status[]" value="Other">&nbsp;Other
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Education_Level">Education Level <span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                            <select name="education[]" class="form-control col-md-7 col-xs-12" required="required">
                                <option value="None">--Select--</option>
                                <option value="O-Level">O-Level</option>
                                <option value="A-Level">A-Level</option>
                                <option value="Diploma Level">Diploma Level</option>
                                <option value="Bachelors Degree">Bachelors Degree</option>
                                <option value="PG Degree">PG Degree</option>
                                <option value="Masters Degree">Masters Degree</option>
                            </select>
                    </div>
                </div>

                <!-- script written to set default value of Education selection -->
                <script type="text/javascript">
                    $("select[name='education[]']").eq("<?php echo $i; ?>").val("<?php echo $row['education']; ?>");
                </script>


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="application fee">App'n Fees <span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="number" name="reg_fee[]" value="<?php echo $row['reg_fee'];?>"  class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>

                
    </fieldset>
</td> 

<td>
    <fieldset class="scheduler-border">
       <legend class="scheduler-border">STUDENT ADRESS DETAILS</legend>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Student's Country">Country<span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" name="country[]" value="<?php echo $row['country'];?>"  class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                </div>

                <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Student's District">District <span class="required">:</span>
                            </label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <input type="text" name="district[]" value="<?php echo $row['district'];?>"  class="form-control col-md-7 col-xs-12">
                            </div>
                 </div>

                 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Student's Sector">Sector <span class="required">:</span>
                            </label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <input type="text" name="sector[]" value="<?php echo $row['sector'];?>"  class="form-control col-md-7 col-xs-12">
                            </div>
                 </div>

                <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Student's E-Mail">E-Mail <span class="required">:</span>
                            </label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <input type="text" name="student_email[]" value="<?php echo $row['student_email'];?>"  class="form-control col-md-7 col-xs-12">
                            </div>
                 </div>

                <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Student's Contact">Tel <span class="required">:</span>
                            </label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <input type="text" name="student_phone[]" value="<?php echo $row['student_phone'];?>"  class="form-control col-md-7 col-xs-12">
                            </div>
                 </div>

                <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Home_District">Reg Date <span class="required">:</span>
                            </label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <input type="text" name="reg_date[]" value="<?php echo $row['reg_date'];?>"  class="form-control col-md-7 col-xs-12">
                            </div>
                 </div> 
                                     
       </fieldset>               
   </td>      
</tr>
         <tr>
            <td colspan="2">
                <fieldset class="scheduler-border">
       <legend class="scheduler-border">COURSE | STATUS SELECTION SECTION</legend>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_status">Student Status <span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                            <select name="student_status[]" class="form-control col-md-7 col-xs-12" required="required">
                                <option value="Ongoing">Ongoing</option>
                                <option value="Finished">Finished</option>
                            </select>
                    </div>
                </div>

                <!-- script written to set default value of Education selection -->
                <script type="text/javascript">
                    $("select[name='student_status[]']").eq("<?php echo $i; ?>").val("<?php echo $row['student_status']; ?>");
                </script>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Student Class">Course <span class="required">:</span>
                    </label>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                         <select name="course_name" class="form-control col-md-7 col-xs-12" required="required">
                                    <?php
                                    $queryCourse = dbQuery("SELECT course_id, course_name FROM tbl_course");
                                    while ($row = dbFetchAssoc($queryCourse)) {
                                        echo '<option value="'. $row["course_id"] .'">'. $row["course_name"] .'</option>';
                                    }
                                    ?>
                    </div>
                </div>
                          
        </fieldset>                     
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
   
   <center><button class="btn btn-info" type="submit" name="savemul"><i class="glyphicon glyphicon-pencil"></i>&nbsp; Update_Records</button>&nbsp;&nbsp;
    <a href="<?php _link(); ?>students" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Student Section </a></center>
               </div>
        </div> 
       
    </td>
    </tr>
                   </table>
                </form>
        </div>
    </div>
</div>