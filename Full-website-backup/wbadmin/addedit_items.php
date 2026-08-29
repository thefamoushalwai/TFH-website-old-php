<?php
include("checklogin.php");
include("../includes/inc.php");
$metatitle ="Add | Edit Items";
include("header.php");
?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Add | Edit Items</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_items.php?category=1">Manage Items</a></li>
          <li class="breadcrumb-item active">Add | Edit Items</span></a></li>
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

      $errorMsg ='';

      $extension_allow = array('jpeg','jpg','png');
      if(empty($_POST['slno'])) { 
          if(empty($_FILES['itemsImage']['name'])) {               
              $errorMsg .='Please Upload Item Image';
          }
      }
      if(!empty($_FILES['itemsImage']['name'])) {
          $ext = strtolower(pathinfo($_FILES['itemsImage']['name'],PATHINFO_EXTENSION));
          if(!in_array($ext, $extension_allow)) {
              $errorMsg .='Only Upload JPEG, JPG, PNG Format in Item Image<br>';
          }
      }   

      $successMsg = "N";
      if(!empty($_POST['slno'])) {

        $check_qry = db_query("SELECT * FROM product_item_tbl WHERE menu_name  = '".db_real_escape(trim($_POST['menu_name']))."' && category='".$_POST['category']."' && slno!='".$_POST['slno']."' ");

        if(db_num_rows($check_qry)==0) {          
          db_query("UPDATE product_item_tbl SET category='".$_POST['category']."', menu_name = '".db_real_escape(trim($_POST['menu_name']))."', menu_rate='".$_POST['menu_rate']."', display_status='".$_POST['display_status']."' WHERE slno='".$_POST['slno']."' ");

          $slno = $_POST['slno'];

          $successMsg = "Y";          
        }
        else {
          $errorMsg .= "Item Name Already Exist";
        }
      }
      else {
        $check_qry = db_query("SELECT * FROM product_item_tbl WHERE menu_name  = '".db_real_escape(trim($_POST['menu_name']))."' && category='".$_POST['category']."' ");

        if(db_num_rows($check_qry)==0) {

          db_query("INSERT INTO product_item_tbl SET category='".$_POST['category']."', menu_name = '".db_real_escape(trim($_POST['menu_name']))."', menu_rate='".$_POST['menu_rate']."', display_status='".$_POST['display_status']."', recv_date='".date("Y-m-d h:i:s")."' ");

          $slno = db_insert_id(); 

          $successMsg = "Y";          
        }
        else {
          $errorMsg .= "Item Name Already Exist";
        }
      }

      if($successMsg == "Y") {

        if(!empty($_FILES['itemsImage']['name']) && !empty($slno)) {
          $ext = pathinfo($_FILES['itemsImage']['name'],PATHINFO_EXTENSION);
          $iconImg = $slno.".".$ext; 
          $himage_upload_path = BASEDIR."/frontEnd/items/".$iconImg;
          //echo $image_name."--".$image_upload_path."@@<br>";          
          move_uploaded_file($_FILES['itemsImage']['tmp_name'], $himage_upload_path);
          //echo "UPDATE menu_item_tbl SET items_img='".$iconImg."' WHERE slno ='".$_POST['slno']."' <br>";                        
          db_query("UPDATE product_item_tbl SET menu_img='".$iconImg."' WHERE slno ='".$slno."' ");
        }
      ?>
      <script type="text/javascript">
      window.location.href = "<?php echo ADMIN_SITE_URL;?>/manage_items.php?success=yes&category=<?php echo $_POST['category'];?>";  
      </script>
      <?php
      exit;
      }
    }

    if(!empty($_REQUEST['slno'])) {
      $req_qry = db_query("SELECT * FROM product_item_tbl WHERE slno ='".$_REQUEST['slno']."'");

      if(db_num_rows($req_qry)>0) {
        $reqArr = db_fetch_assoc($req_qry);
        $_POST['category'] = $reqArr['category'];  
        $_POST['menu_name']          = $reqArr['menu_name'];                        
        $_POST['menu_rate']          = $reqArr['menu_rate'];          
        $_POST['display_status']     = $reqArr['display_status'];
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
              <label for="title_en" class="col-sm-3 form-control-label">* Items Category</label>
              <div class="col-sm-6"> 
                <select name="category" class="form-control" id="category" required="">
                  <option value="">-- Select One--</option>
                   <option value="1" <?php echo ($_POST['category']==1)?('selected'):('');?>>Bhaji</option>
                   <option value="2" <?php echo ($_POST['category']==2)?('selected'):('');?>>Pickle / Achhar</option>
                   <option value="3" <?php echo ($_POST['category']==3)?('selected'):('');?>>Chutney</option>
                </select>
              </div>     
            </div> 

            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label">* Items Name</label>
              <div class="col-sm-5">
              <input class="form-control" id="menu_name" name="menu_name" type="text" value="<?php echo $_POST['menu_name']?>"  required="">
              </div>
            </div>

            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label"> Items Image</label>
              <div class="col-sm-5">
              <input name="itemsImage" type="file" class="form-control">
              <?php 
              if(!empty($reqArr['menu_img'])) {
                ?>
                <a href="<?php echo SITE_URL;?>/frontEnd/items/<?php echo $reqArr['menu_img']?>" target="_blank"><small>View Image</small></a>
                <?php
              }
              ?>
              </div>
              <div class="col-sm-4 mt-2">Size:(W:150px H:100px (max 10KB))</div>              
            </div>

             <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label">* Price in (INR) </label>
              <div class="col-sm-5">
              <input name="menu_rate" id="menu_rate" type="text" class="form-control" value="<?php echo $_POST['menu_rate']?>" required>
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