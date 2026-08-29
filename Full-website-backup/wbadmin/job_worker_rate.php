<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Job Worker Rate";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Job Worker  <span class="text-danger">Rate</span></h6>
      </div>
      <div class="col-sm-6 text-right pr-3">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_cuisine.php">Manage Item</a></li> -->
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addedit_jwrate.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New Job Worker Rate</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
  ?>
  <div class="text-success text-center"><h3>Location Detail has updated successfully.</h3></div>
  <?php
}
?>
<div class="col-md-12 table-responsive overflow-x11">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th>Option</th> 
    <th>Job Worker Title</th>              
    <th>Rate (in Rs.)</th>              
    <th>Display Status</th>        
    </tr>
    <?php
    $jwrate_qry = db_query("SELECT * FROM job_worker_rate WHERE 1=1 ");

    if(db_num_rows($jwrate_qry)>0) {
      $slno=1;
      while($jwrateArr = db_fetch_assoc($jwrate_qry)) {
        ?>
        <tr>
          <td><?php echo $slno;?>&nbsp;&nbsp; <a href="<?php echo ADMIN_SITE_URL ?>/addedit_jwrate.php?slno=<?php echo $jwrateArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td><?php echo $jwrateArr['jobworker']?></td>

          <td><?php echo $jwrateArr['rate']?></td>
                 
          <td><?php 
          if($jwrateArr['status']=='Y') {
            ?>
            <span class="text-success"><?php echo $status_arr[$jwrateArr['status']]; ?> 
            <?php
          }
          else {
            ?>
            <span class="text-danger"><?php echo $status_arr[$jwrateArr['status']]; ?> 
            <?php
          }
          ?></td>          
        </tr>  
        <?php
        $slno++;
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


