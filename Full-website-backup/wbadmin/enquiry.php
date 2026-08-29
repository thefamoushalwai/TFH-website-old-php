<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Halwai/Chef/Caterers Inquiry";
include("header.php");

$type_qry_arr = array('ckitchen'=>'Cloud Kitchen','caterers'=>'Caterers Services','halwaichef'=>'Halwai or Chef');
if($_REQUEST['aID']=='updstatus') {
  include('../popup.php');

  if(isset($_POST['uID']) && $_POST['uID']=='editStatus') {  
      if(!empty($_POST['islno'])) {
        //echo "UPDATE order_inquiry SET display_status='".$_POST['status']."' WHERE slno='".$_POST['islno']."' <br>";
        db_query("UPDATE order_inquiry SET display_status='".$_POST['status']."' WHERE slno='".$_POST['islno']."' ");
        ?>
        <div class="text-success text-center mt-4"><h5>Query Status has Updated Successfully.</h5></div><br>
        <?php
      }
      else {
        ?>
        <div class="text-danger text-center"><h5>Try to Wrong Way.</h5></div><br>
        <?php
      }      
      exit;
  }
  else {
    $inv_qry = db_query("SELECT * FROM order_inquiry WHERE slno='".$_REQUEST['slno']."' ");
    $sqlArr = db_fetch_array($inv_qry);  
    //$_POST['status'] = $sqlArr['status']; 
    ?>
    <div class="container-fluid  mt-3"><!-- Close in Footer END -->     
    <div class="text-center mb-3"><h4><b>Update Status of Partners</b></h4></div>      
    
      <form name="proposalFrm" id="proposalFrm" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" autocomplete="off">
      <div class="row">
        <div class="col-md-3"></div>  
        <div class="col-md-10"> 

          <div class="form-group row">
          <label for="title_en" class="col-sm-3 form-control-label text-right"> Select Status</label>
          <div class="col-sm-6">
          <select class="form-control" name="status" id="status">
          <option value="">-- Select One --</option>    
          <?php
          foreach ($inq_status_arr as $key => $value) {
            if($key!='N') {
              ?>
              <option value="<?php echo $key;?>" <?php echo ($sqlArr['status']=="$key")?('selected'):('')?>><?php echo $value;?></option>
              <?php
            }
          }
          ?>
          </select>   
          </div>
          </div>
                      
          <div class="form-group row">
          <label for="title_en" class="col-sm-3 form-control-label">&nbsp;</label>
          <div class="col-sm-8">              
          <input name="aID" type="hidden" value="updstatus">
          <input name="uID" type="hidden" value="editStatus">
          <input name="islno" type="hidden" value="<?php echo $_REQUEST['slno']?>">
          <button type="submit" id="SubmitProd" class="btn btn-info p-1">SUBMIT</button> 
          </div>
          </div>
        </div>  
      </div>
      </form> 
    </div>
    <?php
  }
  ?>
  <div class="text-center pr10 pt-5" style="font-size: 12px"><a href="javascript:window.close();">Close Window</a></div>
  <?php
  exit;
}
?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Halwai/Chef/Caterers Inquiry</h3>
      </div>
      <div class="col-sm-6 text-right">
        <?php
        foreach ($inq_status_arr as $key => $value) {
            if($_REQUEST['status']=="$key") {
                ?>
                <a href="<?php echo ADMIN_SITE_URL ?>/enquiry.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;color:#e11f26;"><b><?php echo $value;?></b></span></a>&nbsp;&nbsp;
                <?php
            }
            else {
                ?>
                <a href="<?php echo ADMIN_SITE_URL ?>/enquiry.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;"><?php echo $value;?></span></a>&nbsp;&nbsp;
                <?php
            }
        }
        ?>
        <!-- <a href="<?php echo ADMIN_SITE_URL ?>/addedit_user.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New User</span></a> -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<div class="col-md-12 table-responsive overflow-x11">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
      <th>Option</th> 
      <th style="width:15%">Contact Detail</th>          
      <th style="width:18%">Programe Detail</th>           
      <th style="width:35%">Inquiry Detail</th>        
      <th style="width:15%">Meal Detail</th>        
      <th style="width:12%">Received Date</th>    
    </tr>

    <?php
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 10; 
    $start = ($page - 1) * $perPage;

    $totalQuery = db_query("SELECT COUNT(*) as total FROM order_inquiry WHERE display_status='".$_REQUEST['status']."'");
    $totalRow = db_fetch_assoc($totalQuery);
    $total = $totalRow['total'];
    $totalPages = ceil($total / $perPage);

    $general_inquiry_qry = db_query("SELECT * FROM order_inquiry WHERE display_status='".$_REQUEST['status']."' ORDER BY slno DESC LIMIT $start, $perPage ");

    if(db_num_rows($general_inquiry_qry)>0) {
      while($ordArr = db_fetch_assoc($general_inquiry_qry)) {
        $ereqArr = db_fetch_assoc(db_query("SELECT * FROM occasions_tbl WHERE display_status='Y' "));
        ?>
        <tr>
          <td class="nowrap_space"><a href="javascript:multiple_openwin('<?php echo ADMIN_SITE_URL ?>/enquiry.php?aID=updstatus&slno=<?php echo $ordArr['slno']?>','700','400','props');" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>
          <td class="nowrap_space">
            Name: <?php echo $ordArr['contact_name']?><br>
            Mobile:<?php echo $ordArr['mobile_phone']?><br>
            Email:<?php echo $ordArr['email']?><br>
            <span class="text-danger">
            <?php 
            echo empty($ordArr['enquiryType']) ? "Other Services" : $type_qry_arr[$ordArr['enquiryType']];
            ?>              
            </span>
          </td>
          <td class="nowrap_space">
            No of People: <?php echo $ordArr['noof_people']?><br>
            Location: <?php echo $ordArr['slocation']?><br>
            Event: <b><?php echo $ereqArr['occasions_title']?></b><br>
            Event Date: <b><?php echo $ordArr['occasions_date']?></b><br>
            Gas Burners:<?php echo $ordArr['gas_burners']?>
          </td>          
          <td class="nowrap_space">
          <?php
          if(!empty($ordArr['main_cousrse'])) {
            echo "<b>MAIN COURSE:</b> ";            
            $starters_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno IN ('1','2','3') &&  slno IN (".$ordArr['main_cousrse'].") ");
            while($starterArr = db_fetch_assoc($starters_qry)) {
              echo $starterArr['menu_name'].", ";
            }
            echo "<br>";
          }
          ?>
          <?php
          if(!empty($ordArr['starters'])) {
            echo "<b>STARTERS:</b> ";            
            $starters_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno='8' &&  slno IN (".$ordArr['starters'].") ");
            while($starterArr = db_fetch_assoc($starters_qry)) {
              echo $starterArr['menu_name'].", ";
            }
            echo "<br>";
          }
          ?>
          <?php
          if(!empty($ordArr['bread_rice_raita'])) {
              
            echo "<b>BREADS, RICE AND RAITA:</b> ";            
            $starters_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno='9' &&  slno IN (".$ordArr['bread_rice_raita'].") ");
            while($starterArr = db_fetch_assoc($starters_qry)) {
              echo $starterArr['menu_name'].", ";
            }
            echo "<br>";
          }
          ?>
          <?php
          if(!empty($ordArr['dessert'])) {
            echo "<b>DESSERTS:</b> ";            
            $starters_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno='6' &&  slno IN (".$ordArr['dessert'].") ");
            while($starterArr = db_fetch_assoc($starters_qry)) {
              echo $starterArr['menu_name'].", ";
            }
            echo "<br>";
          }
          ?>
          <?php
          if(!empty($ordArr['soups_beverages'])) {
            echo "<b>SOUPS & BEVERAGES:</b> ";            
            $starters_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno='7' &&  slno IN (".$ordArr['soups_beverages'].") ");
            while($starterArr = db_fetch_assoc($starters_qry)) {
              echo $starterArr['menu_name'].", ";
            }
            echo "<br>";
          }
          ?>
          <?php
          if(!empty($ordArr['live_barbecue'])) {
            echo "<b>LIVE BARBECUE:</b> ";            
            $starters_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno='4' &&  slno IN (".$ordArr['live_barbecue'].") ");
            while($starterArr = db_fetch_assoc($starters_qry)) {
              echo $starterArr['menu_name'].", ";
            }
            echo "<br>";
          }

          ?>
          </td>
          <td class="nowrap_space">
          <?php           
          if(!empty($ordArr['breakfast_val'])) {
            echo "<b>Breakfast:</b> ".$ordArr['breakfast_val']."<br>"; 
          }
          if(!empty($ordArr['lunch_val'])) {
            echo "<b>Lunch:</b> ".$ordArr['lunch_val']."<br>"; 
          }
          if(!empty($ordArr['evening_snaks'])) {
            echo "<b>Evening Snaks:</b> ".$ordArr['evening_snaks']."<br>"; 
          }
          if(!empty($ordArr['dinner'])) {
            echo "<b>Dinner:</b> ".$ordArr['dinner']."<br>"; 
          }
          if(!empty($ordArr['jobworker_slno'])) {
            $grateArr = db_fetch_assoc(db_query("SELECT * FROM job_worker_rate WHERE slno = '".$ordArr['jobworker_slno']."' "));
            echo "<b>Job Worker: ".$grateArr['jobworker']."</b> | <b>No of Required: ".$ordArr['nohalwaichef']."</b> "; 
            echo $totaAmount = $ordArr['nohalwaichef']*$grateArr['rate'];            
          }
          ?>
          </td>
          <td class="nowrap_space">
            <?php echo $ordArr['created']?><br>  
            IP Address: <?php echo $ordArr['ipAddress']?>
          </td>          
        </tr>  
        <?php
      }
    } else {
       ?>
       <tr><td colspan="6" class="text-danger text-center">Sorry! No Record Found.</td></tr>
       <?php
    }
    ?>
  </table>

 <div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?status=<?php echo $_REQUEST['status']; ?>&page=<?php echo $page - 1; ?>">Prev</a>
    <?php endif; ?>

    <?php 
    // Always show first page
    if ($page > 3) { 
        echo '<a href="?status='.$_REQUEST['status'].'&page=1">1</a>';
        if ($page > 4) echo '<span>...</span>';
    }

    // Show range around current page
    for ($i = max(1, $page - 2); $i <= min($totalPages, $page + 2); $i++): ?>
        <a href="?status=<?php echo $_REQUEST['status']; ?>&page=<?php echo $i; ?>" class="<?php echo ($i == $page) ? 'active' : ''; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>

    <?php 
    // Always show last page
    if ($page < $totalPages - 2) { 
        if ($page < $totalPages - 3) echo '<span>...</span>';
        echo '<a href="?status='.$_REQUEST['status'].'&page='.$totalPages.'">'.$totalPages.'</a>';
    }
    ?>

    <?php if ($page < $totalPages): ?>
        <a href="?status=<?php echo $_REQUEST['status']; ?>&page=<?php echo $page + 1; ?>">Next</a>
    <?php endif; ?>
</div>

</div>

   
<?php
include("footer.php");
?>
<style>
.pagination {
  text-align: center;
  margin: 20px 0;
}
.pagination a {
  display: inline-block;
  padding: 8px 12px;
  margin: 0 4px;
  border: 1px solid #007bff;
  color: #007bff;
  text-decoration: none;
  border-radius: 5px;
}
.pagination a.active {
    background-color: #ff9800;
    color: white;
    border-radius: 4px;
    padding: 4px 8px;
}

</style>
</body>
</html>
