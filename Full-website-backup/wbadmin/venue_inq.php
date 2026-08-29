<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Banquet and Destination Venue Inquiry";
if($_REQUEST['aID']=='updstatus') {
  include('../popup.php');

  if(isset($_POST['uID']) && $_POST['uID']=='editStatus') {  
      if(!empty($_POST['islno'])) {
        //echo "UPDATE general_inq SET status='".$_POST['status']."' WHERE slno='".$_POST['islno']."' <br>";
        db_query("UPDATE general_inq SET status='".$_POST['status']."' WHERE slno='".$_POST['islno']."' ");
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
    $inv_qry = db_query("SELECT * FROM general_inq WHERE slno='".$_REQUEST['slno']."' ");
    $sqlArr = db_fetch_array($inv_qry);  
    //$_POST['status'] = $sqlArr['status']; 
    ?>
    <div class="container-fluid  mt-3"><!-- Close in Footer END -->     
    <div class="text-center mb-3"><h4><b>Update Status of Venue</b></h4></div>      
    
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
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Banquet and Destination Venue Inquiry</h3>
      </div>
      <div class="col-sm-6 text-right">
        <?php
        foreach ($inq_status_arr as $key => $value) {
            if($_REQUEST['status']=="$key") {
                ?>
                <a href="<?php echo ADMIN_SITE_URL ?>/venue_inq.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;color:#e11f26;"><b><?php echo $value;?></b></span></a>&nbsp;&nbsp;
                <?php
            }
            else {
                ?>
                <a href="<?php echo ADMIN_SITE_URL ?>/venue_inq.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;"><?php echo $value;?></span></a>&nbsp;&nbsp;
                <?php
            }
        }
        ?>
        <!-- <a href="<?php echo ADMIN_SITE_URL ?>/addedit_user.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New User</span></a> -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="col-md-12 table-responsive overflow-x1">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th>Option</th> 
    <th>Contact Name</th>          
    <th>Mobile Phone / Email</th>       
    <th>Location</th>    
    <th>Query Details</th>
    <th>Received Date</th>    
    </tr>

    <?php
    $general_inquiry_qry = db_query("SELECT * FROM general_inq WHERE query_for='Banquet and Destination Venue' && status='".$_REQUEST['status']."' ");

    if(db_num_rows($general_inquiry_qry)>0) {
      while($ordArr = db_fetch_assoc($general_inquiry_qry)) {
        ?>
        <tr>
          <td class="nowrap_space">
          <a href="javascript:multiple_openwin('<?php echo ADMIN_SITE_URL ?>/partners_inq.php?aID=updstatus&slno=<?php echo $ordArr['slno']?>','700','400','props');" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a>
          </td>

          <td class="nowrap_space"><?php echo $ordArr['contact_name']?><br>
          <span class="text-danger"><?php echo $inq_status_arr[$ordArr['status']]; ?></span>          
          </td>
          
          <td class="nowrap_space"><?php echo $ordArr['mobile_phone']?><br><?php echo $ordArr['email']?></td>          
          <td class="nowrap_space"><?php echo $ordArr['address']?>, <?php echo $ordArr['city']?>, <?php echo $state_name_arr[$ordArr['state']]?>
          </td>

          <td class="nowrap_space">
          No. of People :<?php echo $ordArr['no_of_people']?><br>          
          Your Budget :<?php echo $ordArr['mbudget']?><br>          
                         
          </td>          
          <td class="nowrap_space"><?php echo $ordArr['recv_date_time']?><br>
           IP Address: <?php echo $ordArr['ipaddress']?>
          </td>
        </tr>  
        <?php
      }
    }
    else {
       ?>
       <tr><td colspan="8" class="text-danger text-center">Sorry! No Record Found.</td></tr>
       <?php
    }
    ?>
  </table>
</div>     
<?php
include("footer.php");
?>
</body>
</html>
