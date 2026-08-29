<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Add | Edit Service Category";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Add | Edit Service Category</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_service_category.php">Manage Service Category</a></li>
          <li class="breadcrumb-item active">Add | Edit Service Category</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
if($_POST['uID']=='addeditProdCatg') {

  $_REQUEST['cid'] = $_POST['pslno'];
  $_REQUEST['refID'] = $_POST['refID'];  

  $errorMsg='';

  if(empty($_POST['product_catg'])) {
    $errorMsg ='<li>Please enter Menu Name</li>';
  }   

  if(empty($_POST['meta_title'])) {
    $errorMsg .='<li>Please enter Menu Meta Title</li>';
  }
  if(empty($_POST['is_category'])) {
    $errorMsg .='<li>Please select Is Category</li>';
  }
  if(empty($errorMsg)) {      

    $filename = str_replace(".php","",$_POST['product_catg']);
    $get_filename = create_valid_flnm($filename);

    $_POST['product_catg'] = ucwords(strtolower($_POST['product_catg']));
  
    if(empty($_POST['pslno'])) {    

      $prod_qry = db_query("SELECT * FROM product_category WHERE filename='".$get_filename."' ");

      if(db_num_rows($prod_qry)==0) { 
      
        //echo "INSERT INTO product_category set product_catg='".addslashes($_POST['product_catg'])."', filename='".$get_filename."', meta_title='".addslashes($_POST['meta_title'])."', meta_desc='".addslashes($_POST['meta_desc'])."', status='".$_POST['status']."', is_category='".$_POST['is_category']."', ref_id='".$_REQUEST['refID']."', rdate='".date("Y-m-d")."' <br><br>";

        db_query("INSERT INTO product_category set product_catg='".addslashes($_POST['product_catg'])."', filename='".$get_filename."', meta_title='".addslashes($_POST['meta_title'])."', meta_desc='".addslashes($_POST['meta_desc'])."', status='".$_POST['status']."', is_category='".$_POST['is_category']."', ref_id='".$_REQUEST['refID']."', rdate='".date("Y-m-d")."' ");

        $_POST['pslno'] = db_insert_id($GLOBALS['con']);

        $successmsg = "Category has added successfully.";
      }
      else {
        $errorMsg = 'Category URL already exist.';
      }
    }
    else {

      $chk_flname_qry = db_query("SELECT * FROM product_category WHERE cid!='".$_POST['pslno']."' && filename ='".$get_filename."' ");

      if(db_num_rows($chk_flname_qry)==0) { 

        //echo "UPDATE product_category set product_catg='".addslashes($_POST['product_catg'])."', filename='".$get_filename."', meta_title='".addslashes($_POST['meta_title'])."', meta_desc='".addslashes($_POST['meta_desc'])."', status='".$_POST['status']."', is_category='".$_POST['is_category']."', upd_date='".date("Y-m-d")."' WHERE cid='".$_POST['pslno']."' <br>";

        db_query("UPDATE product_category set product_catg='".addslashes($_POST['product_catg'])."', filename='".$get_filename."', meta_title='".addslashes($_POST['meta_title'])."', meta_desc='".addslashes($_POST['meta_desc'])."', status='".$_POST['status']."', is_category='".$_POST['is_category']."', upd_date='".date("Y-m-d")."' WHERE cid='".$_POST['pslno']."' ");

        $successmsg = "Category has updated successfully.";
      }
      else {
        $errorMsg = 'Category URL already exist.';
      }
    }    

    if(!empty($successmsg)) {

      if(!empty($_FILES['menuImage']['name']) && !empty($_POST['pslno'])) {

        $ext = pathinfo($_FILES['menuImage']['name'],PATHINFO_EXTENSION);     

        $image_name = $_POST['pslno'].".".$ext;       

        $image_upload_path = BASEDIR."/frontEnd/pcategory/".$image_name;

        move_uploaded_file($_FILES['menuImage']['tmp_name'], $image_upload_path);

        //echo "UPDATE product_category SET catg_img='".$image_name."' WHERE slno='".$banslno."' <br><br>";

        db_query ("UPDATE product_category SET catg_img='".$image_name."' WHERE cid='".$_POST['pslno']."' ");
      } 

      ?>
      <script type="text/javascript">
      window.location.href = "<?php echo ADMIN_SITE_URL;?>/manage_service_category.php?success=yes";  
      </script>
      <?php
      exit;
    }
  }
}

$prod_catg_qry = db_query("select * from product_category WHERE cid='".$_REQUEST['cid']."' ");

if(db_num_rows($prod_catg_qry)>0){

  $arr = db_fetch_assoc($prod_catg_qry);  

  $_POST['product_catg'] = $arr['product_catg'];  

  $_POST['filename'] = $arr['filename'];

  $_POST['short_desc'] = $arr['short_desc'];

  $_POST['meta_title'] = $arr['meta_title'];  

  $_POST['meta_desc'] = $arr['meta_desc'];    

  $_POST['is_category'] = $arr['is_category'];    

  $_POST['status'] = $arr['status'];  
}
?>
<section class="section profile">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="card"> 
        <div class="card-body profile-card pt-4">
          <?php
          if (isset($errorMsg) && !empty($errorMsg)) {
            ?> 
            <div class="text-left red"><b><?php echo $errorMsg;?></b></div><br>
            <?php   
          }
          ?> 
          <form name="infoFrm" method="POST" action="" enctype="multipart/form-data">
            <div class="row mb-3">
            <label for="title_en" class="col-sm-3 form-control-label">* Category Name</label>
            <div class="col-sm-5"><input placeholder="Menu Name" class="form-control" required="" name="product_catg" type="text" value="<?php echo $_POST['product_catg']?>"></div>
            </div>

            <div class="row mb-3">
            <label for="title_en" class="col-sm-3 form-control-label">&nbsp;Filename</label>
            <div class="col-sm-5"><input placeholder="Menu File Name" class="form-control" required="" name="filename" type="text" value="<?php echo $_POST['filename']?>" readonly></div>
            </div>


            <div class="row mb-3">
            <label for="title_en" class="col-sm-3 form-control-label">* Category Meta Title</label>
            <div class="col-sm-8"><input placeholder="Menu Meta Title" class="form-control" required="" name="meta_title" type="text" value="<?php echo $_POST['meta_title']?>"></div>
            </div>    

            <div class="mb-2 row">
              <label for="meta_desc" class="col-md-3 form-control-label">&nbsp;Meta Desc</label>
              <div class="col-md-8">
                <textarea type="text" class="form-control" name="meta_desc" rows="4"><?php echo $_POST['meta_desc']?></textarea>
              </div>
            </div>

            <div class="row mb-3">
            <label for="title_en" class="col-sm-3 form-control-label">&nbsp; Category Image</label>
            <div class="col-sm-5"><input class="form-control" type="file" id="menuImage" name="menuImage"> <small class="text-danger">Spec: (W:120px & H:120px) and JPEG,JPG,PNG only</small></div>
            <?php 
            if(!empty($arr['catg_img'])) {
              ?>
              <div class="col-sm-2"><a href="<?php echo SITE_URL;?>/frontEnd/pcategory/<?php echo $arr['catg_img']?>" target="_blank"><small>View Image</small></a></div>
              <?php
            }
            ?>
            </div>


            <div class="mb-2 row">
              <label for="top_menu" class="col-md-3 form-control-label">* Is Category</label>
              <div class="col-md-3">
                <select class="form-control" name="is_category" required="">
                <option value="">-- Select One --</option>   
                <option value="Y" <?php echo ($_POST['is_category']=='Y')?('selected'):('')?>>Yes</option>
                <option value="N" <?php echo ($_POST['is_category']=='N')?('selected'):('')?>>NO</option>
                </select>
              </div>
            </div>  


            <div class="row mb-3">
            <label for="title_en" class="col-sm-3 form-control-label">&nbsp;Publish Status</label>

            <div class="col-sm-8 mt-2">
            <input id="status" name="status" type="radio" value="Y" <?php echo ($_POST['status']=='Y')?('checked'):('')?> required>&nbsp; Enabled &nbsp;&nbsp;
            <input id="status" name="status" type="radio" value="N" <?php echo ($_POST['status']=='N')?('checked'):('')?> required>&nbsp; Disabled
            </div>     
            </div>

            <br>

            <div class="row mb-3">
            <label for="title_en" class="col-sm-3 form-control-label">&nbsp;</label>
            <div class="col-sm-8"> 
            <?php
            if(!empty($_REQUEST['cid'])) {
              ?>
              <input name="pslno" type="hidden" value="<?php echo $_REQUEST['cid'];?>">
              <?php
            }
            ?> 
            <input name="refID" type="hidden" value="<?php echo $_REQUEST['refID'];?>"> 
            <input name="uID" type="hidden" value="addeditProdCatg">
            <button type="submit" class="btn btn-info bg-info text-white p-1"><i class="fa fa-save"></i> SUBMIT</button>  
            </div>
            </div>
            </form>
        </div>  
      </div>
    </div> 
  </div>
  </section>  

<?php
include("footer.php");
?>
</body>
</html>