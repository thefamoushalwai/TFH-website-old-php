<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Referral Code";

if (!empty($_REQUEST['slno']) && !empty($_REQUEST['status'])) { //Update Course display status

  db_query("UPDATE website_gallery set display_status = '".$_REQUEST['status']."' where slno='".$_REQUEST['slno']."' ");
  echo $_REQUEST['status'];
}
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage Referral Code</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>          
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/add_referral_code.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Generate Referral Code</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="section profile"> 
  <div class="col-md-12 col-sm-12 col-xs-12">   
  <?php
  if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
    ?>
    <div class="text-success text-center mt-3"><h3>Referral Code has Generated successfully.</h3></div><br>
    <?php
  }       
   
  $winfo_qry = db_query("SELECT * FROM generate_referralcode WHERE 1=1 order by partner_type ASC");        
  if(db_num_rows($winfo_qry)>0) {
    ?>
    <table id="datatable" class="table table-bordered mb-1">
    <tr class="tr-text-white">         
      <tr class="tr-text-white">
      <th class="text-center" width="3%">Slno</th>
      <th class="nowrap_space" width="20%">Referral Code</th>
      <th class="nowrap_space" width="20%">State</th>
      <th class="nowrap_space" width="20%">Partner for</th>
      <th class="nowrap_space" width="18%">Action</th>
      </tr>           
      <tbody>

      <?php
      $slno=1;
      while($carr = db_fetch_assoc($winfo_qry)) {
        ?>  
        <tr>

          <td class="text-center"><?php echo $slno;?></td>
          <td><?php echo $carr['referralcode'];?></td>

          <td><?php echo $state_name_arr[$carr['state']];?></td>
          <td><?php echo $partner_type_arr[$carr['partner_type']];?></td>
          <td>
          <a href="add_referral_code.php?slno=<?php echo $carr['slno']?>" alt="Edit" title="Edit "><button type="button" class="btn btn-primary btn-sm p-1" style="vertical-align:top;"> <i class="bi bi-pencil"></i> Edit</button></a>  
          <?php
          if($carr['display_status']=='Y') {
            ?>&nbsp;&nbsp;
            <a href="javascript:change_status('<?php echo $carr['slno']?>','N');" onclick="return confirm('Are you sure you want to shift this in Non-Approve Section');"><button type="button" class="btn btn-success btn-sm p-1" style="vertical-align:top;" id="default_active_<?php echo $arr['slno']?>"><i class="bi bi-check"></i> Approved</button> <span id="disp_active_<?php echo $arr['slno']?>"></span></a>
            <?php
          }
          else {
            ?>&nbsp;&nbsp;
            <a href="javascript:change_status('<?php echo $carr['slno'] ?>','Y');" onclick="return confirm('Are you sure you want to shift this in Approve Section');"><button type="button" class="btn btn-danger btn-sm p-1" style=";vertical-align:top;" id="default_in_active_<?php echo $arr['slno']?>"><i class="bi bi-close fa-fw"></i> Non-Approve</button> <span id="disp_in_active_<?php echo $arr['slno']?>"></span></a>
            <?php
          }
          ?>          
          </td>
          </tr>
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
      <div class="text-center text-danger" style="font-size:16px;">No Any Referral Code Added</div>
      <?php
    }
    ?>
  </div>       
</section>
<?php
include("footer.php");
?>
<script src="<?php echo SITE_URL;?>/static/js/jquery-ui.js"></script>
<script>
function change_status(sl, status) {
  $.ajax({
    url: "referral-code.php",
    type: 'get',
    dataType: 'html',
    data: {slno: sl, status:status},
    success: function(catg_status){
      console.log(catg_status);
      //alert('ssssssss');
      if(catg_status=='Y') { 
        $("#default_in_active_"+sl).hide();
        //$("#disp_in_active_"+sl).append('<span style="display:inline-block;"><i class="fa fa-check"> Active</i></span>');
        $("#disp_in_active_"+sl).show();
        $("#disp_in_active_"+sl).append('<button type="button" class="btn btn-success btn-sm p-1" style="vertical-align:top;display:inline-block;"><i class="fa fa-check fa-fw"></i> Approved</button>');
        $("#default_inactive_"+sl).hide();
        $("#display_inactive_"+sl).append('<p class="text-success">Approved</p>');
      }
      else { //Action on Active section
        $("#default_active_"+sl).hide();
        //$("#disp_active_"+sl).append('<span style="display:inline-block;"><i class="fa fa-close"> In-Active</i></span>');
        $("#disp_active_"+sl).show();
        $("#disp_active_"+sl).append('<button type="button" class="btn btn-danger btn-sm p-1" style="vertical-align:top;"><i class="fa fa-close fa-fw"></i> Non-Approve</button>');
        $("#default_active_txt"+sl).hide();
        $("#display_active_"+sl).append('<p class="text-danger">Non-Approve</p>');
      }
      setTimeout(function(){ location.reload(); }, 200);
    }
  });
}
</script>
</body>
</html>