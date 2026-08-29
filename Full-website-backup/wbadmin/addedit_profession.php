<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Add | Edit Job Worker";
include("header.php");

?>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Add | Edit Job Worker</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_employee.php?status=Y">Manage Job Worker</a></li>
          <li class="breadcrumb-item active">Add | Edit Job Worker</span></a></li>
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

      if(empty($_POST['contact_name'])) {
          $errorMsg .= 'Please enter Page Title <br>';
      }             
      
      $pageurl = create_valid_flnm ($_POST['contact_name']);

      if(!empty($_POST['slno'])) {
        
          db_query("UPDATE prof_job_worker SET contact_name  = '".db_real_escape(trim($_POST['contact_name']))."', about_us = '".db_real_escape(trim($_POST['about_us']))."', email='".db_real_escape($_POST['email'])."', mobile_phone ='".db_real_escape($_POST['mobile_phone'])."', profession = '".db_real_escape($_POST['profession'])."', rating = '".db_real_escape($_POST['rating'])."', experience = '".db_real_escape($_POST['experience'])."', total_bookings = '".db_real_escape($_POST['total_bookings'])."', special_keyword = '".db_real_escape($_POST['special_keyword'])."', state = '".$_POST['state']."', city = '".db_real_escape($_POST['city'])."', address = '".db_real_escape($_POST['address'])."' WHERE slno='".$_POST['slno']."' "); 

          $successmsg = "Y";         
      }
      else {
        //echo "INSERT INTO prof_job_worker SET contact_name  = '".db_real_escape(trim($_POST['contact_name']))."', about_us = '".db_real_escape(trim($_POST['about_us']))."', status='".$_POST['status']."', email='".db_real_escape($_POST['email'])."', mobile_phone ='".db_real_escape($_POST['mobile_phone'])."', profession = '".db_real_escape($_POST['profession'])."', rating = '".db_real_escape($_POST['rating'])."', experience = '".db_real_escape($_POST['experience'])."', total_bookings = '".db_real_escape($_POST['total_bookings'])."', special_keyword = '".db_real_escape($_POST['special_keyword'])."', recv_date='".date("Y-m-d")."'<br><br>";

          db_query("INSERT INTO prof_job_worker SET contact_name  = '".db_real_escape(trim($_POST['contact_name']))."', about_us = '".db_real_escape(trim($_POST['about_us']))."', email='".db_real_escape($_POST['email'])."', mobile_phone ='".db_real_escape($_POST['mobile_phone'])."', profession = '".db_real_escape($_POST['profession'])."', rating = '".db_real_escape($_POST['rating'])."', experience = '".db_real_escape($_POST['experience'])."', total_bookings = '".db_real_escape($_POST['total_bookings'])."', special_keyword = '".db_real_escape($_POST['special_keyword'])."', state = '".$_POST['state']."', city = '".db_real_escape($_POST['city'])."', address = '".db_real_escape($_POST['address'])."', recv_date='".date("Y-m-d")."' ");

           $_POST['slno'] = db_insert_id();
          $successmsg = "Y";                 
      }

      if(!empty($successmsg)) {
        $flanurl = $pageurl."_".$_POST['slno'];
        //echo "UPDATE prof_job_worker SET flname='".$flanurl."' WHERE slno='".$_POST['slno']."' <br>";
        db_query ("UPDATE prof_job_worker SET flname='".$flanurl."' WHERE slno='".$_POST['slno']."' ");
        if(!empty($_FILES['menuImage']['name']) && !empty($_POST['slno'])) {
          $ext = pathinfo($_FILES['menuImage']['name'],PATHINFO_EXTENSION); 
          $image_name = $_POST['slno'].".".$ext;       
          $image_upload_path = BASEDIR."/frontEnd/professional/".$image_name;
          move_uploaded_file($_FILES['menuImage']['tmp_name'], $image_upload_path);
          db_query ("UPDATE prof_job_worker SET userimg='".$image_name."' WHERE slno='".$_POST['slno']."' ");
        }
        if (!empty($_FILES['document']['name'])) {
    $allowed_ext = ['pdf', 'doc', 'docx'];
    $ext = pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION);

    if (in_array(strtolower($ext), $allowed_ext)) {
        $doc_name = "doc_".$pslno.".".$ext; // Unique file name
        $doc_upload_path = BASEDIR."/frontEnd/documents/".$doc_name;
        
        if (move_uploaded_file($_FILES['document']['tmp_name'], $doc_upload_path)) {
            db_query("UPDATE prof_job_worker SET document='".$doc_name."' WHERE slno='".$pslno."'");
        }
    }
}

        
        ?>
        <script type="text/javascript">
        window.location.href = "<?php echo ADMIN_SITE_URL;?>/manage_employee.php?success=yes&status=Y";  
        </script>
        <?php
        exit;
      }
    }

    if(!empty($_REQUEST['slno'])) {
      $occasionsQry = db_query("SELECT * FROM prof_job_worker WHERE slno ='".$_REQUEST['slno']."'");

      if(db_num_rows($occasionsQry)>0) {
        $occaArr = db_fetch_assoc($occasionsQry);
        $_POST['contact_name'] = $occaArr['contact_name'];  
        $_POST['mobile_phone']        = $occaArr['mobile_phone'];
        $_POST['email'] = $occaArr['email'];  
        $_POST['profession']        = $occaArr['profession'];
        $_POST['rating'] = $occaArr['rating'];  
        $_POST['experience']        = $occaArr['experience'];   
        $_POST['total_bookings']        = $occaArr['total_bookings'];                
        $_POST['about_us']    = $occaArr['about_us'];                
        $_POST['special_keyword']    = $occaArr['special_keyword'];                

        $_POST['address']    = $occaArr['address'];                
        $_POST['city']    = $occaArr['city'];                
        $_POST['state']    = $occaArr['state'];                
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
            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Profession</label>
            <div class="col-sm-5">
              <select class="floating-select form-control profession inputfild" id="profession" name="profession">
              <option value="">-- Select One--</option>
              <option value="Halwai" <?php echo ($_POST['profession']=='Halwai')?('selected'):('')?>>Halwai</option>
              <option value="Chef" <?php echo ($_POST['profession']=='Chef')?('selected'):('')?>>Chef</option>
              <option value="Caterers" <?php echo ($_POST['profession']=='Caterers')?('selected'):('')?>>Caterers</option>
              <option value="House Wife" <?php echo ($_POST['profession']=='House Wife')?('selected'):('')?>>House Wife</option>
              <option value="Others" <?php echo ($_POST['profession']=='Others')?('selected'):('')?>>Others</option>
              </select>
            </div>
            </div>

            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label">* Name</label>
              <div class="col-sm-5">
              <input class="form-control" id="contact_name" required="" name="contact_name" type="text" value="<?php echo $_POST['contact_name']?>">
              </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Mobile Phone</label>
            <div class="col-sm-5"><input type="text" class="form-control" name="mobile_phone" value="<?php echo $_POST['mobile_phone']?>">
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Email Address</label>
            <div class="col-sm-5"><input type="text" class="form-control" name="email" value="<?php echo $_POST['email']?>">
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Rating</label>
            <div class="col-sm-5"><input type="text" class="form-control" name="rating" value="<?php echo $_POST['rating']?>">
              <!-- <select class="floating-select form-control rating inputfild" id="rating" name="rating">
              <option value="">-- Select One--</option>
              <?php
              for($i=1;$i<=5;$i++) {
                if($i==$_POST['rating']) {
                  ?>
                  <option value="<?php echo $i;?>" selected><?php echo $i;?></option>
                  <?php
                }
                else {
                  ?>
                  <option value="<?php echo $i;?>"><?php echo $i;?></option>
                  <?php
                }
              }
              ?>
              </select>  -->
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Experience</label>
            <div class="col-sm-5">
              <select class="floating-select form-control total_bookings inputfild" id="experience" name="experience">
              <option value="">-- Select One--</option>
              <?php
              for($i=1;$i<=30;$i++) {
                if($i==$_POST['experience']) {
                  ?>
                  <option value="<?php echo $i;?>" selected><?php echo $i;?></option>
                  <?php
                }
                else {
                  ?>
                  <option value="<?php echo $i;?>"><?php echo $i;?></option>
                  <?php
                }
              }
              ?>
              </select> 
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Total Bookings</label>
            <div class="col-sm-5">
              <select class="floating-select form-control total_bookings inputfild" id="total_bookings" name="total_bookings">
              <option value="">-- Select One--</option>
              <?php
              for($i=1;$i<=500;$i++) {
                if($i==$_POST['total_bookings']) {
                  ?>
                  <option value="<?php echo $i;?>" selected><?php echo $i;?></option>
                  <?php
                }
                else {
                  ?>
                  <option value="<?php echo $i;?>"><?php echo $i;?></option>
                  <?php
                }
              }
              ?>
              </select>
            </div>
            </div>

            <div class="row mb-3">
            <label for="title_en" class="col-sm-3 form-control-label">&nbsp; Upload Image</label>
            <div class="col-sm-5"><input class="form-control" type="file" id="menuImage" name="menuImage"> <small class="text-danger" style="font-size: 12px;">Note: (W:150px & H:150px) and JPEG,JPG,PNG only</small></div>
            <?php 
            if(!empty($occaArr['userimg'])) {
              ?>
              <div class="col-sm-2"><a href="<?php echo SITE_URL;?>/frontEnd/professional/<?php echo $occaArr['userimg']?>" target="_blank"><small style="font-size: 12px;">View Image</small></a></div>
              <?php
            }
            ?>
            </div> 
            
            <div class="row mb-3">
    <label for="document" class="col-sm-3 form-control-label">&nbsp; Upload Document</label>
    <div class="col-sm-5">
        <input class="form-control" type="file" id="document" name="document">
        <small class="text-danger" style="font-size: 12px;">Note: Only PDF, DOC, DOCX files are allowed.</small>
    </div>
    <?php 
    if (!empty($occaArr['document'])) { 
    ?>
        <div class="col-sm-2">
            <a href="<?php echo SITE_URL;?>/frontEnd/documents/<?php echo $occaArr['document']; ?>" target="_blank">
                <small style="font-size: 12px;">View Document</small>
            </a>
        </div>
    <?php
    }
    ?>
</div>

            
            
            
            
            

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Address</label>
            <div class="col-sm-5"><input type="text" class="form-control" name="address" value="<?php echo $_POST['address']?>">
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">City</label>
            <div class="col-sm-5"><input type="text" class="form-control" name="city" value="<?php echo $_POST['city']?>">
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">State</label>
            <div class="col-sm-5">
              <select class="floating-select form-control state inputfild" id="state" name="state">
              <option value="">-- Select State--</option>
              <?php                       
              foreach ($state_name_arr as $key => $value) {                        
                 if($key==$_POST['state']) {
                  ?>
                  <option value="<?php echo $key;?>" selected><?php echo $value;?></option>
                  <?php
                }
                else {
                  ?>
                  <option value="<?php echo $key;?>"><?php echo $value;?></option>
                  <?php
                }
              }
              ?>
              </select>
            </div>
            </div>
            

            <div class="row mb-3">
            <label for="meta_title" class="col-sm-3 form-control-label">Specialization</label>
            <div class="col-md-8">
            <textarea type="text" class="form-control" name="special_keyword"><?php echo $_POST['special_keyword']?></textarea>  
            </div>
            </div>

            <div class="row mb-3">
            <label for="short_desc" class="col-sm-3 form-control-label">About us Job Worker</label>
            <div class="col-md-8">
                <textarea type="text" class="form-control" name="about_us" rows="4"><?php echo $_POST['about_us']?></textarea>
                <script>CKEDITOR.replace('about_us');</script>   
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