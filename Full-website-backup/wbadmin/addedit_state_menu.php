<?php
include("checklogin.php");
include("../includes/inc.php");
$metatitle ="Add | Edit Blog";
include("header.php");
?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Add | Edit Menu</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/view_state_menu.php">View Traditional State Menu</a></li>
          <li class="breadcrumb-item active">Add | Edit Menu</span></a></li>
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

      $pageurl = create_valid_flnm ($_POST['menu_name']);

      if(!empty($_POST['slno'])) {

        $check_qry = db_query("SELECT * FROM menu_item_tbl WHERE menu_name  = '".db_real_escape(trim($_POST['menu_name']))."' && state_slno='".$_POST['state_slno']."' && slno!='".$_POST['slno']."' ");

        if(db_num_rows($check_qry)==0) {
          db_query("UPDATE menu_item_tbl SET state_slno='".$_POST['state_slno']."', menu_name = '".db_real_escape(trim($_POST['menu_name']))."', menu_rate='".$_POST['menu_rate']."', veg_type='".$_POST['veg_type']."', display_status='".$_POST['display_status']."' WHERE slno='".$_POST['slno']."' ");
          $slno = $_POST['slno'];
          $successMsg = "Y";
        }
        else {
          $errorMsg = "Menu Name Already Exist";
        }
      }
      else {
        $check_qry = db_query("SELECT * FROM menu_item_tbl WHERE menu_name  = '".db_real_escape(trim($_POST['menu_name']))."' && state_slno='".$_POST['state_slno']."' ");

        if(db_num_rows($check_qry)==0) {

          db_query("INSERT INTO menu_item_tbl SET event_cuisine_slno='9', state_slno='".$_POST['state_slno']."', menu_name = '".db_real_escape(trim($_POST['menu_name']))."', menu_rate='".$_POST['menu_rate']."', veg_type='".$_POST['veg_type']."', display_status='".$_POST['display_status']."', recv_date='".date("Y-m-d h:i:s")."' ");

          $slno = db_insert_id();
          
          $successMsg = "Y";
        }
        else {
          $errorMsg = "Menu Name Already Exist";
        }
      }
      if($successMsg == "Y") {

         $flanurl = $pageurl."-".$slno;
         db_query ("UPDATE menu_item_tbl SET flname='".$flanurl."' WHERE slno ='".$slno."' ");
        
        if(!empty($_FILES['menuIcon']['name']) && !empty($slno)) {
          $ext = pathinfo($_FILES['menuIcon']['name'],PATHINFO_EXTENSION);
          $iconImg = $slno.".".$ext; 
          $himage_upload_path = BASEDIR."/frontEnd/menuimg/".$iconImg;
          //echo $image_name."--".$image_upload_path."@@<br>";          
          move_uploaded_file($_FILES['menuIcon']['tmp_name'], $himage_upload_path);

          //echo "UPDATE menu_item_tbl SET menu_img='".$iconImg."' WHERE slno ='".$slno."' <br>";
          db_query("UPDATE menu_item_tbl SET menu_img='".$iconImg."' WHERE slno ='".$slno."' ");
        }
        ?>
        <script type="text/javascript">
         window.location.href = "<?php echo ADMIN_SITE_URL;?>/view_state_menu.php?success=yes&menuID=<?php echo $_POST['state_slno'];?>"; 
        </script>
        <?php
        exit;
        }
    }

    if(!empty($_REQUEST['slno'])) {
      $req_qry = db_query("SELECT * FROM menu_item_tbl WHERE slno ='".$_REQUEST['slno']."'");

      if(db_num_rows($req_qry)>0) {
        $reqArr = db_fetch_assoc($req_qry);

        $_POST['state_slno']   = $reqArr['state_slno'];  
        $_POST['menu_name']          = $reqArr['menu_name'];                        
        $_POST['menu_rate']          = $reqArr['menu_rate'];          
        $_POST['display_status']     = $reqArr['display_status'];
        $_POST['veg_type']           = $reqArr['veg_type'];
        
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
              <label for="title_en" class="col-sm-3 form-control-label">* State Name</label>
              <div class="col-sm-6"> 
                <select name="state_slno" class="form-control" id="state_slno" required="">
                  <option value="">-- Select One--</option>
                  <?php
                   $state_qry = db_query("SELECT * FROM traditional_state WHERE status='Y' ");
                   while($stateArr = db_fetch_assoc($state_qry)) {
                    ?>
                    <option value="<?php echo $stateArr['slno']?>" <?php echo ($stateArr['slno']==$_POST['state_slno'])?('selected'):('');?>><?php echo $stateArr['state_name']?></option>
                    <?php 
                  }
                  ?>      
                </select>
              </div>     
            </div> 

            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label">* Menu Name</label>
              <div class="col-sm-5">
              <input class="form-control" id="menu_name" name="menu_name" type="text" value="<?php echo $_POST['menu_name']?>"  required="">
              </div>
            </div>

            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label"> Menu Image</label>
              <div class="col-sm-5">
              <input name="menuIcon" type="file" class="form-control">
              <?php 
              if(!empty($reqArr['menu_img'])) {
                ?>
                <a href="<?php echo SITE_URL;?>/frontEnd/menuimg/<?php echo $reqArr['menu_img']?>" target="_blank"><small>View Image</small></a>
                <?php
              }
              ?>
              </div>
              <div class="col-sm-4 mt-2">Size:(W:150px H:100px (max 10KB)) </div>
            </div>

             <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label">* Price in (INR) </label>
              <div class="col-sm-5">
              <input name="menu_rate" id="menu_rate" type="text" class="form-control" value="<?php echo $_POST['menu_rate']?>" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="title_en" class="col-sm-3 form-control-label">* Veg Type</label>
              <div class="col-sm-5"> 
                <select name="veg_type" class="form-control" id="veg_type">
                  <option value="N" <?php echo ($_POST['veg_type']==="N")?('selected'):('');?>>Vegetarian</option>                  
                  <option value="Y" <?php echo ($_POST['veg_type']==="Y")?('selected'):('');?>>Non-Vegetarian</option>
                </select>
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