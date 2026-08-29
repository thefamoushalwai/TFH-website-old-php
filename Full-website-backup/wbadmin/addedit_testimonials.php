<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Add | Edit Testimonials";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Add | Edit Testimonials</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_testimonials.php?status=Y">Manage Testimonials</a></li>
          <li class="breadcrumb-item active">Add | Edit Testimonials</span></a></li>
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
        
        db_query("UPDATE site_testimonials SET review_type='".$_POST['review_type']."', reviewer_email='".$_POST['reviewer_email']."', reviewer_name  = '".db_real_escape(trim($_POST['reviewer_name']))."', review_text = '".db_real_escape(trim($_POST['review_text']))."', video_url='".$_POST['video_url']."', display_status='".$_POST['display_status']."' WHERE slno='".$_POST['slno']."' ");

        ?>
        <script type="text/javascript">
        window.location.href = "<?php echo ADMIN_SITE_URL;?>/manage_testimonials.php?status=<?php echo $_POST['display_status'];?>&success=yes";  
        </script>
        <?php
        exit;            
      }
      else {
        db_query("INSERT IGNORE INTO site_testimonials SET review_type='".$_POST['review_type']."', reviewer_email='".$_POST['reviewer_email']."', reviewer_name  = '".db_real_escape(trim($_POST['reviewer_name']))."', review_text = '".db_real_escape(trim($_POST['review_text']))."', video_url='".$_POST['video_url']."', display_status='".$_POST['display_status']."', recv_date_time='".date("Y-m-d h:i:s")."' ");

        ?>
        <script type="text/javascript">
        window.location.href = "<?php echo ADMIN_SITE_URL;?>/manage_testimonials.php?status=<?php echo $_POST['display_status'];?>&success=yes";  
        </script>
        <?php
        exit;
      }
    }

    if(!empty($_REQUEST['slno'])) {
      $stestimonials_qry = db_query("SELECT * FROM site_testimonials WHERE slno ='".$_REQUEST['slno']."'");

      if(db_num_rows($stestimonials_qry)>0) {
        $testiArr = db_fetch_assoc($stestimonials_qry);

        $_POST['review_type']   = $testiArr['review_type'];  
        $_POST['reviewer_name'] = $testiArr['reviewer_name'];                
        $_POST['reviewer_email']= $testiArr['reviewer_email']; 
        $_POST['review_text']   = $testiArr['review_text'];  
        $_POST['video_url']     = $testiArr['video_url'];                
        $_POST['display_status']= $testiArr['display_status'];        
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
              <label for="title_en" class="col-sm-3 form-control-label">* Review Type</label>
              <div class="col-sm-3"> 
                <select name="review_type" class="form-control" id="review_type">
                  <option value="">-- Select One--</option>                  
                  <option value="1" <?php echo ($_POST['review_type']==="1")?('selected'):('');?>>Without Video</option>
                  <option value="2" <?php echo ($_POST['review_type']==="2")?('selected'):('');?>>With Video</option>                    
                </select>
              </div>     
            </div> 

            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label">* Reviewer Name</label>
              <div class="col-sm-6">
              <input class="form-control" id="reviewer_name" required="" name="reviewer_name" type="text" value="<?php echo $_POST['reviewer_name']?>">
              </div>
            </div>

            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label"> Email Address</label>
              <div class="col-sm-6">
              <input class="form-control" id="reviewer_email" required="" name="reviewer_email" type="text" value="<?php echo $_POST['reviewer_email']?>">
              </div>
            </div>

            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label"> Video URL</label>
              <div class="col-sm-6">
              <textarea type="text" class="form-control" name="video_url" style="height:50px;"><?php echo $_POST['video_url']?></textarea>  
              </div>
            </div>

            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label">&nbsp;</label>
              <div class="col-sm-4 text-center">OR</div>
            </div>

            <div class="form-group row">
            <label for="meta_title" class="col-sm-3 form-control-label">Testimonials</label>
            <div class="col-sm-8">
            <textarea type="text" class="form-control" name="review_text" style="height:100px;"><?php echo $_POST['review_text']?></textarea>  
            </div>
            </div>  

            <div class="form-group row">
              <label for="title_en" class="col-sm-3 form-control-label">* Display Status</label>
              <div class="col-sm-3"> 
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