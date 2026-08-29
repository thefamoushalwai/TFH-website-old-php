<?php
include("checklogin.php");
include("../includes/inc.php");
$metatitle ="Add | Edit Job Worker Rate ";
include("header.php");
?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Add | Edit Job Worker Rate</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/job_worker_rate.php">Job Worker Rate</a></li>
          <li class="breadcrumb-item active">Add | Edit Job Worker Rate</span></a></li>
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
      $successMsg = "N";
      if(!empty($_POST['slno'])) {       
        $check_qry = db_query("SELECT * FROM job_worker_rate WHERE jobworker  = '".db_real_escape(trim($_POST['jobworker']))."' && slno!='".$_POST['slno']."' ");

        if(db_num_rows($check_qry)==0) { 
          db_query("UPDATE job_worker_rate SET jobworker = '".db_real_escape(trim($_POST['jobworker']))."', rate='".$_POST['rate']."', status='".$_POST['status']."' WHERE slno='".$_POST['slno']."' ");

          $slno = $_POST['slno'];

          $successMsg = "Y";            
        }
        else {
          $errorMsg .= "Already Exist";
        }
      }
      else {
        $check_qry = db_query("SELECT * FROM job_worker_rate WHERE jobworker  = '".db_real_escape(trim($_POST['jobworker']))."' ");

        if(db_num_rows($check_qry)==0) {

          db_query("INSERT INTO job_worker_rate SET jobworker = '".db_real_escape(trim($_POST['jobworker']))."', rate='".$_POST['rate']."', status='".$_POST['status']."' ");

          $slno = db_insert_id(); 

          $successMsg = "Y";          
        }
        else {          
          $errorMsg .= "Already Exist";
        }
      }   

      if($successMsg == "Y") {        
        ?>
        <script type="text/javascript">
        window.location.href = "<?php echo ADMIN_SITE_URL;?>/job_worker_rate.php?success=yes";  
        </script>
        <?php
        exit;
      }
    }

    if(!empty($_REQUEST['slno'])) {
      $req_qry = db_query("SELECT * FROM job_worker_rate WHERE slno ='".$_REQUEST['slno']."'");

      if(db_num_rows($req_qry)>0) {
        $reqArr = db_fetch_assoc($req_qry);         
        $_POST['jobworker']= $reqArr['jobworker'];
        $_POST['rate']     = $reqArr['rate']; 
        $_POST['status']   = $reqArr['status'];
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
              <label for="title_en" class="col-sm-3 form-control-label">* Job Worker</label>
              <div class="col-sm-5">
              <select class="floating-select form-control jobworker inputfild" id="jobworker" name="jobworker">
              <option value="">-- Select One--</option>
              <option value="Halwai" <?php echo ($_POST['jobworker']=='Halwai')?('selected'):('')?>>Halwai</option>
              <option value="Chef" <?php echo ($_POST['jobworker']=='Chef')?('selected'):('')?>>Chef</option>
              
              <option value="Caterers" <?php echo ($_POST['jobworker']=='Caterers')?('selected'):('')?>>Caterers</option>
              <option value="House Wife" <?php echo ($_POST['jobworker']=='House Wife')?('selected'):('')?>>House Wife</option>
               <option value="Others" <?php echo ($_POST['jobworker']=='Others')?('selected'):('')?>>Others</option>             
              </select>  
              </div>
            </div>    

            <div class="form-group row"> 
            <label for="title_en" class="col-sm-3 form-control-label">* Rate</label>
            <div class="col-sm-5">
            <input class="form-control" id="rate" name="rate" type="text" value="<?php echo $_POST['rate']?>"  required="">
            </div>
            </div>

            
            <div class="form-group row">
              <label for="title_en" class="col-sm-3 form-control-label">* Display Status</label>
              <div class="col-sm-5"> 
                <select name="status" class="form-control" id="status">
                  <option value="">-- Select One--</option>
                  <?php
                  foreach ($status_arr as $key => $value) {
                    ?>
                    <option value="<?php echo $key?>" <?php echo ($_POST['status']==="$key")?('selected'):('');?>><?php echo $value?></option>
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