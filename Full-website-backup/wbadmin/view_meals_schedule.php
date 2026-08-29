<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="View Schedule";
include("header.php");

$mealsArr=db_fetch_assoc(db_query("SELECT * FROM event_meals WHERE slno ='".$_REQUEST['menuID']."'"));

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>View <span class="text-danger"><?php echo $mealsArr['meal_title']?></span> Schedule</h6>
      </div>
      <div class="col-sm-6 text-right pr-3">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_meals.php">Manage Meals</a></li>
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addedit_schedule.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add Schedule</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
  ?>
  <div class="text-success text-center mt-3"><h3>Schedule Detail has updated successfully.</h3></div><br>
  <?php
}
?>

<div class="col-md-12 table-responsive overflow-x">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th>Option</th> 
    <th>Schedule Time</th>
    <th>Display Status</th>        
    </tr>
    <?php
    $schedule_qry = db_query("SELECT * FROM event_meals_schedule WHERE event_meals_slno='".$_REQUEST['menuID']."' ");

    if(db_num_rows($schedule_qry)>0) {
      $slno=1;
      while($menuArr = db_fetch_assoc($schedule_qry)) {
        ?>
        <tr>
          <td><?php echo $slno;?>&nbsp;&nbsp; <a title="Edit schedule Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_schedule.php?slno=<?php echo $menuArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td><?php echo $menuArr['schedule_time']?> <?php echo $menuArr['schedule_time_slot']?> onwards</td>          
          <td><?php echo $status_arr[$menuArr['display_status']]?></td>          
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


