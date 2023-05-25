 <?php

/*<!-- =======================================================
Project Name: WEB-BASED INTERNSHIP MANAGEMENT SYSTEM
Website URL: 
Author:
======================================================= -->
*/
 
 $user = new User();
?>



<!-- Page starts from Here -->

<div class="page-title">
    <div class="title_left">
        <h4 style="color: orange;">NOTIFICATIONS</h4>
    </div>
    <p style="color: orange;"><?php echo $timeComponent; ?></p>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="tabbable">
            <ul class="nav nav-tabs tab-bricky">
                <li class="active">
                    <a href="#task" data-toggle="tab">
                        New Task&nbsp;<span class="badge success"><?php echo dbNumRows($queryTask); ?></span>
                    </a>
                </li>

                <li>
                    <a href="#taskDeadline" data-toggle="tab">
                        Task Deadline&nbsp;<span class="badge success"><?php echo $to_Task_remind; ?> 
                    </a>
                </li>

                <li>
                    <a href="#projectDeadline" data-toggle="tab">
                        Supervision&nbsp;<span class="badge success"><?php echo $to_remind; ?>
                    </a>
                </li>
                
            </ul>
            <div class="tab-content">
                <div class="tab-pane in active" id="task">

    <div class="x_panel">        

        <div class="x_content">

          <form method="post" name="frm">
            <table class="datatable table table-condensed">
                <thead>
                    <tr>
                        <th>Message</th>
                        <th>Task</th>
                        <th>End date</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                 $group_id = userGroup();
                $count = dbNumRows($queryTask);
                $counter = 0;

                if ($count > 0) {
                    while ($row = dbFetchAssoc($queryTask)) {

                         if($row['group_id'] == $group_id || (getSupervisorId($row['group_id'])==user_id() && $_SESSION['user_type_name']==5 )|| $_SESSION['user_type_name']==4){


                        ?>
                        <tr>                           
                            <td><?php echo $row['message']; ?></td>
                            <td><?php echo $row['task_name']; ?></td>                     
                            <td><?php echo $row['end_date']; ?></td>
                        </tr>
                      <?php           }  }        } else {
                    ?>
                        
                        <?php
                }
                ?>
                    </tbody>
                </table>
            </form>
         </div>
    </div>
</div>  
          <!-- Task Deadline Reminder -->
           <div class="tab-pane" id="taskDeadline">
      <div class="x_panel">
        <div class="x_content">
          <form method="post" name="frm">
            <table class="datatable table table-condensed">
                <thead>
                    <tr>

                        <th>Message</th>
                        <th>Task</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                $count = dbNumRows($queryTaskDeadline);
                $counter = 0;

                $queryTaskDeadline = dbQuery("SELECT *, 'Your Task deadline is soon As per the End Date' AS message FROM `tbl_task`");

                if ($to_Task_remind > 0) {
                    while($row = dbFetchAssoc($queryTaskDeadline)){



                         if($row['group_id'] == $group_id || (getSupervisorId($row['group_id'])==user_id() && $_SESSION['user_type_name']==5 )|| $_SESSION['user_type_name']==4){


                        if(day_calculator_($row['end_date'] )){
                            ?>
                       
                        <tr>
                            <td><?php echo $row['message']; ?></td>
                            <td><?php echo $row['task_name']; ?></td>
                            <td><?php echo $row['end_date']; ?></td>
                        </tr>
                      <?php 
                    }
                  }
                }
                } 
                else {      ?>
                        
                        <?php   }    ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

  <!-- Project Deadline Reminder -->


     <div class="tab-pane" id="projectDeadline">
      <div class="x_panel">
        <div class="x_content">
          <form method="post" name="frm">
            <table class="datatable table table-condensed">
                <thead>
                    <tr>

                        <th>Message</th>
                        <th>Project</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>

                <?php              
                $count = dbNumRows($queryProjectDeadline);
                $counter = 0;

               $queryProjectDeadline = dbQuery("SELECT *, 'You Have Five Days to complete your Project' AS message FROM `tbl_project`");

                if ($to_remind > 0) {
                    while($row = dbFetchAssoc(queryProjectDeadline)){



                         if($row['group_id'] == $group_id || (getSupervisorId($row['group_id'])==user_id() && $_SESSION['user_type_name']==5 )|| $_SESSION['user_type_name']==4){


                        if(day_calculator($row['end_date'] )){
                            ?>                           
                   
                            <tr>
                                <td><?php echo $row['message']; ?></td>
                                <td><?php echo $row['prroject_name']; ?></td>
                                <td><?php echo $row['end_date']; ?></td>
                            </tr>
                          <?php
                           }
                        }
                    }
                } else {       ?>
                        
                        <?php  }       ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</div>