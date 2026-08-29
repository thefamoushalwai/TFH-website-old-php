<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Add | Edit Gallery Image";
include("header.php");
?>  

<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Add | Edit Gallery Image</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li> 
           <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_gallery.php">Manage Gallery</a></li>         
          <li class="breadcrumb-item active">Add | Edit Gallery Image</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="section profile">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">     
        <?php
       
        
        if(isset($_POST['aID']) && $_POST['aID']=='addeditInfo') {

            $_REQUEST['slno'] = $_POST['mslno'];
            
            $extension_allow = array('jpeg','jpg','png');

            $errorMsg ='';

            if(empty($_POST['mslno'])) { 
                if(empty($_FILES['gImage']['name'])) {               
                    $errorMsg .='Please Upload Gallery Image';
                }
            }

            if(!empty($_FILES['gImage']['name'])) {
                $ext = strtolower(pathinfo($_FILES['gImage']['name'],PATHINFO_EXTENSION));
                if(!in_array($ext, $extension_allow)) {
                    $errorMsg .='Only Upload JPEG, JPG, PNG Format in Gallery Image<br>';
                }
            }   

            if(empty($errorMsg)) {

                $successMsg = "N";

                $pageurl = create_valid_flnm ($_POST['page_title']);

                if(empty($_POST['mslno'])) { 
                   
                    db_query("INSERT INTO website_gallery SET image_title = '".db_real_escape($_POST['image_title'])."', status ='".$_POST['status']."', upd_date='".date("Y-m-d")."' "); 

                    $_POST['mslno'] = db_insert_id($GLOBALS['con']);  

                    $successMsg = "Y";                    
                }
                else {
                    //echo "UPDATE website_gallery SET image_title = '".db_real_escape($_POST['image_title'])."', status ='".$_POST['status']."', upd_date='".date("Y-m-d")."' WHERE slno = '".$_POST['mslno']."'<br><br>";

                    db_query("UPDATE website_gallery SET image_title = '".db_real_escape($_POST['image_title'])."', status ='".$_POST['status']."', upd_date='".date("Y-m-d")."' WHERE slno = '".$_POST['mslno']."' "); 

                    $successMsg = "Y";                   
                }

                if($successMsg=='Y' && !empty($_POST['mslno'])) {

                    if(!empty($_FILES['gImage']['name'])) {             
                            
                      //$ephoto = $_FILES['empPhoto']['name'];  

                      $ext = pathinfo($_FILES['gImage']['name'],PATHINFO_EXTENSION);

                      $iheader = $_POST['mslno'].".".$ext; 

                      $himage_upload_path = BASEDIR."/frontEnd/gallery/".$iheader;

                      //echo $image_name."--".$image_upload_path."@@<br>";
                      
                      move_uploaded_file($_FILES['gImage']['tmp_name'], $himage_upload_path);
                                             
                      //echo "UPDATE website_gallery SET gimage='".$iheader."' WHERE slno ='".$_POST['mslno']."' <br>";                        
                      db_query("UPDATE website_gallery SET gimage='".$iheader."' WHERE slno ='".$_POST['mslno']."' ");
                    }
                    ?>
                    <script type="text/javascript">
                    window.location.href ="<?php echo ADMIN_SITE_URL;?>/manage_gallery.php?success=yes";
                    </script>
                    <?php
                    exit;
                }
            }
        }

    	if(isset($_REQUEST['slno']) && !empty($_REQUEST['slno'])) {

            $webinfo_qry = db_query("SELECT * FROM website_gallery WHERE slno='".$_REQUEST['slno']."' ");
            $arr =  db_fetch_assoc($webinfo_qry);   
            
            $_POST['image_title']     = $arr['image_title'];           
            $_POST['status'] 		 = $arr['status'];        
        }    

         if (isset($errorMsg) && !empty($errorMsg)) {
            ?> 
            <div class="text-left red"><b><?php echo $errorMsg;?></b></div><br>
            <?php   
        }
        ?>
	
    	<form name="tfrm" class="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">        

        <div class="row mb-3">
        <label for="page_title" class="col-sm-3 form-control-label">Image Title</label>
        <div class="col-sm-5"><input type="text" class="form-control" name="image_title" value="<?php echo $_POST['image_title']?>">
        </div>
        </div>
    
        <div class="row mb-3">
        <label for="page_url" class="col-sm-3 form-control-label">Gallery Image (max 15KB)</label>
        <div class="col-sm-4"><input type="file" class="form-control" name="gImage">
            <small class="text-danger" style="font-size: 12px;">(W:200px & H:200px) and JPEG,JPG,PNG only (max 15KB)</small>
        </div>
        </div>        
             
        <div class="row mb-3">
        <label class="col-sm-3 form-control-label">Status *</label>
        <div class="col-md-2">
        <select class="form-control" name="status" required>
        <option value="">-- Select One --</option>
        <option value="Y" <?php echo ($_POST['status']=='Y')?('selected'):('')?>>Approve</option>
        <option value="N" <?php echo ($_POST['status']=='N')?('selected'):('')?>>Non Approve</option>
        </select>
        </div>
        </div>
         

        <div class="form-group row pt-3">
        <label for="like_benefit" class="col-md-4 col-form-label">&nbsp;</label>
        <div class="col-sm-5">
        <input type="hidden" name="aID" value="addeditInfo">
        <input type="hidden" name="mslno" value="<?php echo $_REQUEST['slno'];?>">
        <input type="submit" name="submit" class="btn btn-info bg-info text-white p-1" value="SUBMIT">
        </form>
        </div>
    </div>
</div>
</div>	
<?php
include('footer.php');
?>
