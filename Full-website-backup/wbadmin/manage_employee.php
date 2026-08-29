<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Job Workers";
if($_REQUEST['aID']=='updstatus') {
  include('../popup.php');

  if(isset($_POST['uID']) && $_POST['uID']=='editStatus') {  
      if(!empty($_POST['islno'])) {
        //echo "UPDATE general_inq SET status='".$_POST['status']."' WHERE slno='".$_POST['islno']."' <br>";
        db_query("UPDATE prof_job_worker SET status='".$_POST['status']."' WHERE slno='".$_POST['islno']."' ");
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
    $inv_qry = db_query("SELECT * FROM prof_job_worker WHERE slno='".$_REQUEST['slno']."' ");
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

include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage Job Workers - <span class="text-danger"><?php echo $inq_status_arr[$_REQUEST['status']]; ?></span></h6>
      </div>
      <div class="col-sm-6 text-right">
        <?php
        foreach ($inq_status_arr as $key => $value) {
          if($_REQUEST['status']=="$key") {
              ?>
              <a href="<?php echo ADMIN_SITE_URL ?>/manage_employee.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;color:#e11f26;"><b><?php echo $value;?></b></span></a>&nbsp;&nbsp;
              <?php
          }
          else {
              ?>
              <a href="<?php echo ADMIN_SITE_URL ?>/manage_employee.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;"><?php echo $value;?></span></a>&nbsp;&nbsp;
              <?php
          }
        }
        ?> 
        <a href="<?php echo ADMIN_SITE_URL ?>/addedit_profession.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New Job Worker</span></a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="section profile">
 
  <div class="col-md-12 col-sm-12 col-xs-12">
   
  <?php
  if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
    ?>
    <div class="text-success text-center mt-3"><h3>Job Worker detail has updated successfully.</h3></div><br>
    <?php
  }        
   
  $profjw_qry = db_query("SELECT * FROM prof_job_worker WHERE status='".$_REQUEST['status']."' order by slno DESC");        
  if(db_num_rows($profjw_qry)>0) {
    ?>
    <table id="datatable" class="table table-bordered mb-1">
    <tr class="tr-text-white">         
      <tr class="tr-text-white">
      <th class="text-center" width="5%">Slno</th>
      <th class="nowrap_space" width="10%">Image</th>  
        <th class="nowrap_space" width="10%">Document</th> 
      <th class="nowrap_space" width="20%">Contact Detail</th>
      <th class="nowrap_space" width="20%">Profession Detail</th>        
      <th class="nowrap_space" width="20%">Other Detail</th>
      </tr>           
      <tbody>

      <?php
      $slno=1;
      while($carr = db_fetch_assoc($profjw_qry)) {

        ?>  
        <tr class="ui-state-default" data-index="<?php echo $carr['slno']?>" data-position="<?php echo $carr['position']?>">

          <td class="text-center" style="white-space:nowrap;"><?php echo $slno;?> 
          <br><a href="<?php echo ADMIN_SITE_URL ?>/addedit_profession.php?slno=<?php echo $carr['slno']?>" alt="Edit" title="Edit Professional"> <i class="fa fa-pencil"></i> Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp; 

          <a href="javascript:multiple_openwin('<?php echo ADMIN_SITE_URL ?>/manage_employee.php?aID=updstatus&slno=<?php echo $carr['slno']?>','700','400','props');" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td>
          <?php
          if(!empty($carr['userimg'])) {
            ?>
            <img src="<?php echo SITE_URL;?>/frontEnd/professional/<?php echo $carr['userimg']?>" style="width:100px;height: 100px">
            <?php
          }
          ?>  
          </td>
          <td>
    <?php if (!empty($carr['document'])) { ?>
        <a href="<?php echo SITE_URL; ?>/frontEnd/documents/<?php echo $carr['document']; ?>" target="_blank">
            View Document
        </a>
    <?php } else { ?>
        No Document
    <?php } ?>
</td>


          <td>
          Name: <?php echo ucwords(strtolower($carr['contact_name']));?><br>
          Email: <?php echo $carr['email'];?><br>          
          Mobile No.: +91-<?php echo $carr['mobile_phone'];?><br>
          Address: <?php echo $carr['address'];?><br>
          City: <?php echo $carr['city'];?>, <?php echo $state_name_arr[$carr['state']];?>
          </td>
         
          <td>
          Profession: <b><?php echo $carr['profession']?></b><br>
          Experience: <?php echo $carr['experience']?> Years<br>
          Rating: <?php echo $carr['rating']?><br>
          Total Bookings: <?php echo $carr['total_bookings']?><br>
          </td>
        
          <td>          
          
          <?php
          if($ordArr['referralcode'])  {
            ?>
            <b>Referral Code:</b> <?php echo $ordArr['referralcode']?><br>
            <?php
          }
          ?> 
          Recvd Date: <?php echo date_display_daymonthyear($carr['recv_date']);?><br>  
          IP Address: <?php echo $carr['ipaddress']?><br>

          <a href="<?php echo ADMIN_SITE_URL ?>/worke_work_experience.php?slno=<?php echo $carr['slno']?>">Update Work Experience</a>
          <?php
          /*if($carr['status']=='Y') {
            ?>&nbsp;&nbsp;
            <a href="javascript:change_status('<?php echo $carr['slno']?>','N');" onclick="return confirm('Are you sure you want to shift this in Non-Approve Section');"><button type="button" class="btn btn-success btn-sm p-1" style="vertical-align:top;" id="default_active_<?php echo $arr['slno']?>"><i class="bi bi-check"></i> Approved</button> <span id="disp_active_<?php echo $arr['slno']?>"></span></a>
            <?php
          }
          else {
            ?>&nbsp;&nbsp;
            <a href="javascript:change_status('<?php echo $carr['slno'] ?>','Y');" onclick="return confirm('Are you sure you want to shift this in Approve Section');"><button type="button" class="btn btn-danger btn-sm p-1" style=";vertical-align:top;" id="default_in_active_<?php echo $arr['slno']?>"><i class="bi bi-close fa-fw"></i> Non-Approve</button> <span id="disp_in_active_<?php echo $arr['slno']?>"></span></a>
            <?php
          }*/
          ?>          
          </td>
          </tr>
          <tr><td colspan="5"><b>Specialization:</b> <?php echo $carr['special_keyword'] ?></td></tr>
          <?php
          $slno++;
        }
        ?>
        </tbody>
      </table>      
      <?php
    }
    else {
      ?>
      <div class="text-center text-danger" style="font-size:16px;">No Any Added Job Worker</div>
      <?php
    }
    ?>
  </div>       
</section>


<?php
include("footer.php");
?>
</body>
</html>