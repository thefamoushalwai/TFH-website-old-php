<?php
include("checklogin.php");
include("../includes/inc.php");
$metatitle ="Add | Edit Schedule";
include("header.php");
?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Add | Edit Schedule</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_meals.php">View Manage Meals</a></li>
          <li class="breadcrumb-item active">Add | Edit Schedule</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content-header mt-4">
  <div class="container-fluid"> 
    <?php
    if($_POST['pID']=='addeditForm') {

      $_REQUEST['slno'] = $_POST['slno'];

      if(!empty($_POST['slno'])) {

        $check_qry = db_query("SELECT * FROM event_meals_schedule WHERE schedule_time  = '".db_real_escape(trim($_POST['schedule_time']))."' && event_meals_slno='".$_POST['event_meals_slno']."' && schedule_time_slot='".$_POST['schedule_time_slot']."' && slno!='".$_POST['slno']."' ");

        if(db_num_rows($check_qry)==0) {
          db_query("UPDATE event_meals_schedule SET event_meals_slno='".$_POST['event_meals_slno']."', schedule_time = '".db_real_escape(trim($_POST['schedule_time']))."', schedule_time_slot='".$_POST['schedule_time_slot']."', display_status='".$_POST['display_status']."' WHERE slno='".$_POST['slno']."' ");

          ?>
          <script type="text/javascript">
          window.location.href = "<?php echo ADMIN_SITE_URL;?>/view_meals_schedule.php?success=yes&menuID=<?php echo $_POST['event_meals_slno'];?>";  
          </script>
          <?php
          exit;
        }
        else {
          $errorMsg = "Schedule Time Already Exist";
        }
      }
      else {
        $check_qry = db_query("SELECT * FROM event_meals_schedule WHERE schedule_time  = '".db_real_escape(trim($_POST['schedule_time']))."' && schedule_time_slot='".$_POST['schedule_time_slot']."' && event_meals_slno='".$_POST['event_meals_slno']."' ");

        if(db_num_rows($check_qry)==0) {

          db_query("INSERT INTO event_meals_schedule SET event_meals_slno='".$_POST['event_meals_slno']."', schedule_time = '".db_real_escape(trim($_POST['schedule_time']))."', schedule_time_slot='".$_POST['schedule_time_slot']."', display_status='".$_POST['display_status']."', recv_date='".date("Y-m-d h:i:s")."' ");
          
          ?>
          <script type="text/javascript">
          window.location.href = "<?php echo ADMIN_SITE_URL;?>/view_meals_schedule.php?success=yes&menuID=<?php echo $_POST['event_meals_slno'];?>";  
          </script>
          <?php
          exit;
        }
        else {
          $errorMsg = "Schedule Time Already Exist";
        }
      }
    }

    if(!empty($_REQUEST['slno'])) {
      $req_qry = db_query("SELECT * FROM event_meals_schedule WHERE slno ='".$_REQUEST['slno']."'");

      if(db_num_rows($req_qry)>0) {
        $reqArr = db_fetch_assoc($req_qry);

        $_POST['event_meals_slno'] = $reqArr['event_meals_slno'];  
        $_POST['schedule_time']    = $reqArr['schedule_time'];
        $_POST['schedule_time_slot']    = $reqArr['schedule_time_slot'];        
        $_POST['display_status']   = $reqArr['display_status'];
      }  
    }    
    ?>
    <form name="searchfrm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" data-parsley-validate autocomplete="off" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8 col-xs-12">
          <div class="x_panel">          
            <div class="x_content">
            <?php            
            if(!empty($errorMsg)) {  
              ?>
              <div class="text-danger text-center mt-3"><h3><?php echo $errorMsg;?></h3></div><br>
              <?php
            }
            ?> 
            <div class="form-group row">
              <label for="title_en" class="col-sm-3 form-control-label">* Meals Name</label>
              <div class="col-sm-5"> 
                <select name="event_meals_slno" class="form-control" id="event_meals_slno" required="">
                  <option value="">-- Select One--</option>
                  <?php
                   $meals_qry = db_query("SELECT * FROM event_meals WHERE display_status='Y' ");
                   while($mealsArr = db_fetch_assoc($meals_qry)) {
                    ?>
                    <option value="<?php echo $mealsArr['slno']?>" <?php echo ($mealsArr['slno']==$_POST['event_meals_slno'])?('selected'):('');?>><?php echo $mealsArr['meal_title']?></option>
                    <?php 
                  }
                  ?>      
                </select>
              </div>     
            </div> 

            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label">* Schedule Time</label>
              <div class="col-sm-5">
                <div class="row">
                  <div class="col-sm-6"> 
                  <select name="schedule_time" class="form-control" id="schedule_time" required="">
                    <option value="">-- Select One--</option>
                    <?php
                     for($tm=1;$tm<=12;$tm++) {
                      ?>
                      <option value="<?php echo $tm?>" <?php echo ($tm==$_POST['schedule_time'])?('selected'):('');?>><?php echo $tm?></option>
                      <?php 
                    }
                    ?>      
                  </select>
                  </div>
                  <div class="col-sm-6"> 
                  <select name="schedule_time_slot" class="form-control" id="schedule_time_slot" required="">
                    <option value="">-- Select One--</option>                    
                    <option value="AM" <?php echo ($_POST['schedule_time_slot']=='AM')?('selected'):('');?>>AM</option>
                    <option value="PM" <?php echo ($_POST['schedule_time_slot']=='PM')?('selected'):('');?>>PM</option>                    
                  </select>
                  </div>   
                </div>  
              </div>
            </div>
          

            <div class="form-group row">
              <label for="title_en" class="col-sm-3 form-control-label">* Display Status</label>
              <div class="col-sm-5"> 
                <select name="display_status" class="form-control" id="display_status">
                  <option value="">-- Select One--</option>
                  <?php
                  foreach ($status_arr as $key => $value) {
                    ?>
                    <option value="<?php echo $key?>" <?php echo ($_POST['display_status']==="$key")?('selected'):('');?>><?php echo $value?></option>
                    <?php 
                  }
                  ?>      
                </select>
              </div>     
            </div> 

            <div class="form-group row">
              <label for="title_en" class="col-sm-3 form-control-label">&nbsp;</label>
              <div class="col-sm-3"> 
              <input type="hidden" name="pID" value="addeditForm">
              <input type="hidden" name="slno" value="<?php echo $_REQUEST['slno']?>">
              <button type="submit" class="btn-info bg-info text-white"><i class="fa fa-save"></i> SUBMIT</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</form>
</div>
</section>


<?php
include("footer.php");
?>
</body>
</html>