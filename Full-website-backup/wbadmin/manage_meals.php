<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Meals";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage Meals</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- <li class="breadcrumb-item">User Summary</li> -->
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addedit_meals.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
  ?>
  <div class="text-success text-center mt-3"><h3>Meals detail has updated successfully.</h3></div><br>
  <?php
}
?>
<div class="col-md-12 table-responsive overflow-x">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th>Option</th> 
    <th>Meals Title</th>              
    <th>Short Description</th>    
    <th>Display Status</th>    
    <th>Created Date</th>    
    </tr>
    <?php
    $event_meals_qry = db_query("SELECT * FROM event_meals WHERE 1=1 ");

    if(db_num_rows($event_meals_qry)>0) {
      while($mealsArr = db_fetch_assoc($event_meals_qry)) {
        ?>
        <tr>
          <td><a title="Edit Meals Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_meals.php?slno=<?php echo $mealsArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td><?php echo $mealsArr['meal_title']?></td>
          <td><?php echo $mealsArr['short_desc']?></td>
          <td><?php echo $status_arr[$mealsArr['display_status']]?></td>          
          <td><a title="Add Menu Detail" href="<?php echo ADMIN_SITE_URL ?>/view_meals_schedule.php?menuID=<?php echo $mealsArr['slno'];?>"><i class="fa fa-eye"></i> View Schedule</a></td>
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