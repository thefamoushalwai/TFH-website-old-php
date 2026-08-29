<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Add | Edit Occasion";
include("header.php");

//db_query("ALTER TABLE `occasions_tbl` ADD `starting_price` INT(5) NOT NULL AFTER `occasions_title`");
?>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Add | Edit Occasion</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_occasion.php">Manage Occasion</a></li>
          <li class="breadcrumb-item active">Add | Edit Occasion</span></a></li>
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

      $successmsg=''; $errorMsg='';

      if(empty($_POST['page_title'])) {
          $errorMsg .= 'Please enter Page Title <br>';
      }        
      if(empty($_POST['meta_title'])) {
          $errorMsg .= 'Please enter meta title <br>';
      }
      if(empty($_POST['page_desc'])) {
          $errorMsg .= 'Please Enter Page Description <br>';
      }
      if(empty($_POST['status'])) {
          $errorMsg .= 'Please select status <br>';
      }

      $pageurl = create_valid_flnm ($_POST['occasions_title']);

      if(!empty($_POST['slno'])) {

        $check_qry = db_query("SELECT * FROM occasions_tbl WHERE occasions_title  = '".db_real_escape(trim($_POST['occasions_title']))."' && slno!='".$_POST['slno']."' ");

        if(db_num_rows($check_qry)==0) {
          db_query("UPDATE occasions_tbl SET occasions_title  = '".db_real_escape(trim($_POST['occasions_title']))."', short_desc = '".db_real_escape(trim($_POST['short_desc']))."', display_status='".$_POST['display_status']."', page_url = '".$pageurl."', meta_title='".db_real_escape($_POST['meta_title'])."', meta_keyword ='".db_real_escape($_POST['meta_keyword'])."', meta_desc = '".db_real_escape($_POST['meta_desc'])."', starting_price='".$_POST['starting_price']."' WHERE slno='".$_POST['slno']."' "); 

          $successmsg = "Occasion Detail has updated successfully.";         
        }
        else {
          $errorMsg = "Occasion Title Already Exist";
        }
      }
      else {
        $check_qry = db_query("SELECT * FROM occasions_tbl WHERE occasions_title  = '".db_real_escape(trim($_POST['occasions_title']))."' ");

        if(db_num_rows($check_qry)==0) {

          db_query("INSERT INTO occasions_tbl SET occasions_title  = '".db_real_escape(trim($_POST['occasions_title']))."', short_desc = '".db_real_escape(trim($_POST['short_desc']))."', display_status='".$_POST['display_status']."', page_url = '".$pageurl."', meta_title='".db_real_escape($_POST['meta_title'])."', meta_keyword ='".db_real_escape($_POST['meta_keyword'])."', meta_desc = '".db_real_escape($_POST['meta_desc'])."', recv_date='".date("Y-m-d")."', starting_price='".$_POST['starting_price']."' ");

           $_POST['slno'] = db_insert_id($GLOBALS['con']);

          $successmsg = "Occasion Detail has updated successfully."; 
        }
        else {
          $errorMsg = "Occasion Title Already Exist";
        }
      }

      if(!empty($successmsg)) {

        if(!empty($_FILES['menuImage']['name']) && !empty($_POST['slno'])) {

          $ext = pathinfo($_FILES['menuImage']['name'],PATHINFO_EXTENSION);     

          $image_name = $_POST['slno'].".".$ext;       

          $image_upload_path = BASEDIR."/frontEnd/occasions/".$image_name;

          move_uploaded_file($_FILES['menuImage']['tmp_name'], $image_upload_path);

          //echo "UPDATE occasions_tbl SET occasions_img='".$image_name."' WHERE slno='".$_POST['slno']."' <br><br>";

          db_query ("UPDATE occasions_tbl SET occasions_img='".$image_name."' WHERE slno='".$_POST['slno']."' ");
        }

         if(!empty($_FILES['innerHeader']['name'])) { 

          $ext = pathinfo($_FILES['innerHeader']['name'],PATHINFO_EXTENSION);

          $iheader = $pageurl."-".$_POST['mslno'].".".$ext; 

          $himage_upload_path = BASEDIR."/frontEnd/innderheader/".$iheader;

          //echo $image_name."--".$image_upload_path."@@<br>";
          
          move_uploaded_file($_FILES['innerHeader']['tmp_name'], $himage_upload_path);
                                 
          //echo "UPDATE occasions_tbl SET innder_header_img='".$iheader."' WHERE slno='".$_POST['slno']."' <br>";                        
          db_query("UPDATE occasions_tbl SET innder_header_img='".$iheader."' WHERE slno='".$_POST['slno']."' ");
        }

        ?>
        <script type="text/javascript">
        window.location.href = "<?php echo ADMIN_SITE_URL;?>/manage_occasion.php?success=yes";  
        </script>
        <?php
        exit;
      }
    }

    if(!empty($_REQUEST['slno'])) {
      $occasionsQry = db_query("SELECT * FROM occasions_tbl WHERE slno ='".$_REQUEST['slno']."'");

      if(db_num_rows($occasionsQry)>0) {
        $occaArr = db_fetch_assoc($occasionsQry);

        $_POST['occasions_title'] = $occaArr['occasions_title'];  
        $_POST['short_desc']        = $occaArr['short_desc'];                

        $_POST['page_url'] = $occaArr['page_url'];  
        $_POST['meta_title']        = $occaArr['meta_title'];                
        $_POST['meta_keyword']    = $occaArr['meta_keyword']; 
        $_POST['meta_desc']    = $occaArr['meta_desc'];        
        
        $_POST['display_status']    = $occaArr['display_status'];
        $_POST['starting_price']    = $occaArr['starting_price'];
                
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
              <label for="title_en" class="col-sm-3 form-control-label">* Occasion Title</label>
              <div class="col-sm-6">
              <input class="form-control" id="occasions_title" required="" name="occasions_title" type="text" value="<?php echo $_POST['occasions_title']?>">
              </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Starting Price </label>
            <div class="col-sm-5"><input type="number" class="form-control" name="starting_price" value="<?php echo $_POST['starting_price']?>">
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Page URL </label>
            <div class="col-sm-5"><input type="text" class="form-control" name="page_url" value="<?php echo $_POST['page_url']?>" readonly>
            </div>
            </div>

            <div class="row mb-3">
            <label for="title_en" class="col-sm-3 form-control-label">&nbsp; Occasion Image (max 35KB)</label>
            <div class="col-sm-5"><input class="form-control" type="file" id="menuImage" name="menuImage"> <small class="text-danger" style="font-size: 12px;">Note: (W:500px & H:333px) and JPEG,JPG,PNG only (max 35KB)</small></div>
            <?php 
            if(!empty($occaArr['occasions_img'])) {
              ?>
              <div class="col-sm-2"><a href="<?php echo SITE_URL;?>/frontEnd/occasions/<?php echo $occaArr['occasions_img']?>" target="_blank"><small style="font-size: 12px;">View Image</small></a></div>
              <?php
            }
            ?>
            </div> 

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Inner Header (max 60KB)</label>
            <div class="col-sm-4"><input type="file" class="form-control" name="innerHeader"><small class="text-danger">Note: (W:1235px & H:230px) and JPEG,JPG,PNG only (max 60KB)</small>
            </div>
            </div> 

            <div class="row mb-3">
            <label for="meta_title" class="col-sm-3 form-control-label">Meta Title *</label>
            <div class="col-md-8">
            <textarea type="text" class="form-control" name="meta_title" required><?php echo $_POST['meta_title']?></textarea>  
            </div>
            </div>


            <div class="row mb-3">
            <label for="meta_keyword" class="col-sm-3 form-control-label">Meta Keyword</label>
            <div class="col-md-8">
            <textarea type="text" class="form-control" name="meta_keyword"><?php echo $_POST['meta_keyword']?></textarea> 
            </div>
            </div>

            <div class="row mb-3">
            <label for="meta_desc" class="col-sm-3 form-control-label">Meta Desc</label>
            <div class="col-md-8">
              <textarea type="text" class="form-control" name="meta_desc" rows="4"><?php echo $_POST['meta_desc']?></textarea>
            </div>
            </div>

            <div class="row mb-3">
            <label for="short_desc" class="col-sm-3 form-control-label">Page Description *</label>
            <div class="col-md-8">
                <textarea type="text" class="form-control" name="short_desc" rows="4" required><?php echo $_POST['short_desc']?></textarea>
                <script>CKEDITOR.replace('short_desc');</script>   
            </div>
            </div>

            

            <div class="form-group row">
              <label for="title_en" class="col-sm-3 form-control-label">* Display Status</label>
              <div class="col-sm-5 mt-2">
              <input id="display_status" name="display_status" type="radio" value="Y" <?php echo ($_POST['display_status']=='Y')?('checked'):('')?> required>&nbsp; Enabled &nbsp;&nbsp;
              <input id="display_status" name="display_status" type="radio" value="N" <?php echo ($_POST['display_status']=='N')?('checked'):('')?> required>&nbsp; Disabled
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