<?php
include("checklogin.php");
include("../includes/inc.php");
$metatitle ="View Menu Item";
include("header.php");

$stateArr = db_fetch_assoc(db_query("SELECT * FROM traditional_state WHERE slno ='".$_REQUEST['menuID']."'"));

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>View <span class="text-danger"><?php echo $stateArr['state_name']?></span> Traditional Menu Items</h6>
      </div>
      <div class="col-sm-6 text-right pr-3">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/view_state.php">Manage Traditional State Food</a></li>
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addedit_state_menu.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add Menu Item</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
  ?>
  <div class="text-success text-center mt-3"><h3>Menu Item Detail has updated successfully.</h3></div><br>
  <?php
}
?>

<div class="col-md-12 table-responsive overflow-x1">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th>Option</th> 
    <th>Menu Name</th>              
    <th>Price (INR)</th>
    <th>Veg Type</th>    
    <th>Display Status</th>        
    </tr>
    <?php
    $menu_item_qry = db_query("SELECT * FROM menu_item_tbl WHERE state_slno='".$_REQUEST['menuID']."' ");

    if(db_num_rows($menu_item_qry)>0) {
      $slno=1;
      while($menuArr = db_fetch_assoc($menu_item_qry)) {
        ?>
        <tr>
          <td><?php echo $slno;?>&nbsp;&nbsp; <a title="Edit Menu Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_state_menu.php?slno=<?php echo $menuArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td><?php echo $menuArr['menu_name']?></td>
          <td><?php echo $menuArr['menu_rate']?></td>

          <td>
          <?php
          if($menuArr['veg_type']=='Y') {
            ?>
            <span class="text-danger">Non-Vegetarian</span>
            <?php
          }
          else {
            ?>
            <span class="text-success">Vegetarian</span>
            <?php
          }
          ?>            
          </td>
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


