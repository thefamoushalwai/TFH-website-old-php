<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Partners";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage Partners</h6>
      </div>
      <div class="col-sm-6 text-right">
        <?php
        foreach ($status_arr as $key => $value) {
            if($_REQUEST['status']=="$key") {
                ?>
                <a href="<?php echo ADMIN_SITE_URL ?>/manage_partners.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;color:#e11f26;"><b><?php echo $value;?></b></span></a>&nbsp;&nbsp;
                <?php
            }
            else {
                ?>
                <a href="<?php echo ADMIN_SITE_URL ?>/manage_partners.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;"><?php echo $value;?></span></a>&nbsp;&nbsp;
                <?php
            }
        }
        ?>
        <!-- <a href="<?php echo ADMIN_SITE_URL ?>/addedit_testimonials.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New</span></a> -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
  ?>
  <div class="text-success text-center mt-3"><h3>Partners detail has updated successfully.</h3></div><br>
  <?php
}
?>
 
<div class="col-md-12 table-responsive overflow-x">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th>Option</th> 
    <th>Partner Name</th>              
    <th>Mobile No.</th> 
    <th>Email Address</th>
    <th>State</th>        
    <th>Display Status</th>    
    <th>Created Date</th>    
    </tr>
    <?php
    $reqqry = db_query("SELECT * FROM event_requirement WHERE 1=1 ");

    if(db_num_rows($reqqry)>0) {
      while($reqArr = db_fetch_assoc($reqqry)) {
        ?>
        <tr>
          <td><a title="Edit Requirement Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_partner.php?slno=<?php echo $reqArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td><?php echo $reqArr['pname']?></td>
          <td><?php echo $reqArr['mobile_no']?></td>
          <td><?php echo $reqArr['email']?></td>
          <td><?php echo $reqArr['state']?></td>
          <td><?php echo $status_arr[$reqArr['display_status']]?></td>          
          <td><?php echo $reqArr['recv_date']?></td>
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
