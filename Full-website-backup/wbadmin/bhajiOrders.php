<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Customized Plate Orders";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h5>Bhaji Orders</h5>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- <li class="breadcrumb-item">User Summary</li> -->
          <li class="breadcrumb-item active">Bhaji Orders</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="section profile"> 
  <div class="col-md-12 col-sm-12 col-xs-12">   
  <?php
  $order_qry = db_query("SELECT a1.* FROM order_members as a1, order_detail as b1 WHERE a1.slno=b1.order_members_slno && b1.qryType='2' GROUP BY b1.order_members_slno order by a1.slno DESC");        
  if(db_num_rows($order_qry)>0) {
    ?>
    <table id="datatable" class="table table-bordered mb-1">
    <tr class="tr-text-white">         
      <tr class="tr-text-white">
      <th class="text-center" width="5%">Slno</th>      
      <th class="nowrap_space" width="30%">Contact Detail</th>
      <th class="nowrap_space" width="25%">Others Detail</th>      
      <th class="nowrap_space" width="12%">Total Order Amount</th>      
      <th class="nowrap_space" width="12%">Action</th>
      </tr>           
      <tbody>

      <?php
      $slno=1;
      while($carr = db_fetch_assoc($order_qry)) {

        $ereqArr = db_fetch_assoc(db_query("SELECT * FROM occasions_tbl WHERE slno='".$carr['occasions_slno']."' "));

        $orderArr = db_fetch_assoc(db_query("SELECT SUM(menu_rate) as totAmount FROM order_detail WHERE order_members_slno='".$carr['slno']."' "));

        ?>  
        <tr class="ui-state-default" data-index="<?php echo $carr['slno']?>" data-position="<?php echo $carr['position']?>">

          <td class="text-center"><?php echo $slno;?></td>
          <td>
          Name: <?php echo ucwords(strtolower($carr['yname']));?><br>
          Email: <?php echo $carr['email'];?><br>          
          Mobile No.: +91-<?php echo $carr['mobile_no'];?> <br>          
          Address: <?php echo $carr['address'];?><br>           
          City: <?php echo $carr['city'];?> <br>          
          Pincode.: <?php echo $carr['pincode'];?>          
          </td>
         
          <td>
          Location: <?php echo $carr['slocation']?><br>
          No of People: <?php echo $carr['noof_people']?><br>
          Event Date: <span class="text-danger"><?php echo date_display_daymonthyear($carr['event_date'])?></span>
          </td>

          <td>Rs. <?php echo $orderArr['totAmount']?></td>
                  
          <td>
          <a title="Order Detail" href="<?php echo SITE_URL ?>/quotepdf/<?php echo $carr['pdf_flname']?>" target="_blank"><img src="<?php echo SITE_URL;?>/frontEnd/images/pdf_icon.png" alt="Download Quote in PDF" width="20"></a>
          <?php
          if($carr['status']=='Y') {
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
          <p class="mt-2">IP: <?php echo $carr['ip_address']?></p>                 
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