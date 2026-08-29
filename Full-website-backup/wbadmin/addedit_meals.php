<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Add | Edit Meals";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Add | Edit Meals</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_meals.php">Manage Meals</a></li>
          <li class="breadcrumb-item active">Add | Edit Meals</span></a></li>
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

        $check_qry = db_query("SELECT * FROM event_meals WHERE meal_title  = '".db_real_escape(trim($_POST['meal_title']))."' && slno!='".$_POST['slno']."' ");

        if(db_num_rows($check_qry)==0) {
          db_query("UPDATE event_meals SET meal_title  = '".db_real_escape(trim($_POST['meal_title']))."', short_desc = '".db_real_escape(trim($_POST['short_desc']))."', display_status='".$_POST['display_status']."' WHERE slno='".$_POST['slno']."' ");

          ?>
          <script type="text/javascript">
          window.location.href = "<?php echo ADMIN_SITE_URL;?>/manage_meals.php?success=yes";  
          </script>
          <?php
          exit;
        }
        else {
          $errorMsg = "Meals Title Already Exist";
        }
      }
      else {
        $check_qry = db_query("SELECT * FROM event_meals WHERE meal_title  = '".db_real_escape(trim($_POST['meal_title']))."' ");

        if(db_num_rows($check_qry)==0) {

          db_query("INSERT IGNORE INTO event_meals SET meal_title  = '".db_real_escape(trim($_POST['meal_title']))."', short_desc = '".db_real_escape(trim($_POST['short_desc']))."', display_status='".$_POST['display_status']."', recv_date='".date("Y-m-d")."' ");

          ?>
          <script type="text/javascript">
          window.location.href = "<?php echo ADMIN_SITE_URL;?>/manage_meals.php?success=yes";  
          </script>
          <?php
          exit;
        }
        else {
          $errorMsg = "Meals Title Already Exist";
        }
      }
    }

    if(!empty($_REQUEST['slno'])) {
      $req_qry = db_query("SELECT * FROM event_meals WHERE slno ='".$_REQUEST['slno']."'");

      if(db_num_rows($req_qry)>0) {
        $reqArr = db_fetch_assoc($req_qry);

        $_POST['meal_title'] = $reqArr['meal_title'];  
        $_POST['short_desc']        = $reqArr['short_desc'];                
        $_POST['display_status']    = $reqArr['display_status'];        
      }  
    }    
    ?>
    <form name="searchfrm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" data-parsley-validate autocomplete="off" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
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
              <label for="title_en" class="col-sm-3 form-control-label">* Meal Title</label>
              <div class="col-sm-6">
              <input class="form-control" id="meal_title" required="" name="meal_title" type="text" value="<?php echo $_POST['meal_title']?>">
              </div>
            </div>

            <div class="form-group row">
            <label for="meta_title" class="col-sm-3 form-control-label">Short Description</label>
            <div class="col-sm-8">
            <textarea type="text" class="form-control" name="short_desc" style="height:100px;"><?php echo $_POST['short_desc']?></textarea>  
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
              <div class="col-sm-5"> 
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