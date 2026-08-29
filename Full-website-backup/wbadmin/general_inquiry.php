<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="General Inquiry";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>General Inquiry</h3>
      </div>
      <div class="col-sm-6 text-right">
        <?php
        foreach ($inq_status_arr as $key => $value) {
            if($_REQUEST['status']=="$key") {
                ?>
                <a href="<?php echo ADMIN_SITE_URL ?>/general_inquiry.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;color:#e11f26;"><b><?php echo $value;?></b></span></a>&nbsp;&nbsp;
                <?php
            }
            else {
                ?>
                <a href="<?php echo ADMIN_SITE_URL ?>/general_inquiry.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;"><?php echo $value;?></span></a>&nbsp;&nbsp;
                <?php
            }
        }
        ?>
        <!-- <a href="<?php echo ADMIN_SITE_URL ?>/addedit_user.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New User</span></a> -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="col-md-12 table-responsive overflow-x">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th>Option</th> 
    <th style="width:15%">Contact Name</th>          
    <th style="width:15%">Mobile Phone / Email</th>       
    <th style="width:15%">Address</th>    
    <th style="width:35%">Query Details</th>
    <th style="width:12%">Received Date</th>    
    </tr>

    <?php
    $general_inquiry_qry = db_query("SELECT * FROM general_inq WHERE query_for='Contact Us' && status='".$_REQUEST['status']."' ");

    if(db_num_rows($general_inquiry_qry)>0) {
      while($ordArr = db_fetch_assoc($general_inquiry_qry)) {
        ?>
        <tr>
          <td class="nowrap_space">            
          <a title="Edit Detail" href="<?php echo ADMIN_SITE_URL ?>/edit_npartner_general_inquiry.php?slno=<?php echo $ordArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a>
          </td>

          <td class="nowrap_space"><?php echo $ordArr['contact_name']?><br>
          <span class="text-danger"><?php echo $inq_status_arr[$ordArr['status']]; ?></span>
          </td>

          <td class="nowrap_space"><?php echo $ordArr['mobile_phone']?><br><?php echo $ordArr['email']?></td>          
          <td class="nowrap_space"><?php echo $ordArr['address']?>, <?php echo $ordArr['city']?>, <?php echo $state_name_arr[$ordArr['state']]?>
          </td>

          <td><span class="text-danger"><?php echo $ordArr['query_for']?></span><br>          
          <?php 
          if(!empty($ordArr['call_phone_time'])) {
            echo "<b>Call Time:</b> ".$ordArr['call_phone_time'];
          }          
          if(!empty($ordArr['your_query'])) {
            echo "<br>".substr($ordArr['your_query'],0, 100);
          }
          ?>                      
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
