<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Location";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage <span class="text-danger">Location</span></h6>
      </div>
      <div class="col-sm-6 text-right pr-3">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_cuisine.php">Manage Item</a></li> -->
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addedit_location.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New Location</span></a></li>
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
    <th>Location Name</th>              
    <th>Image</th>              
    <th>Display Status</th>        
    </tr>
    <?php
    $city_qry = db_query("SELECT * FROM services_city WHERE 1=1 ");

    if(db_num_rows($city_qry)>0) {
      $slno=1;
      while($cityArr = db_fetch_assoc($city_qry)) {
        ?>
        <tr>
          <td><?php echo $slno;?>&nbsp;&nbsp; <a title="Edit Menu Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_location.php?slno=<?php echo $cityArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td><?php echo $cityArr['city_name']?></td>
          <td>
            <?php 
              if(!empty($cityArr['city_img'])) {
                ?>
                <img src="<?php echo SITE_URL;?>/frontEnd/location/<?php echo $cityArr['city_img']?>" style="width: 100px;height: 50px;">
                <?php
              }
              ?>
            </td>          
          <td><?php 
          if($cityArr['status']=='Y') {
            ?>
            <span class="text-success"><?php echo $status_arr[$cityArr['status']]; ?> 
            <?php
          }
          else {
            ?>
            <span class="text-danger"><?php echo $status_arr[$cityArr['status']]; ?> 
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


