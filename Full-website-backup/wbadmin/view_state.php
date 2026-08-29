<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Traditional State Food";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage Traditional State Food</h6>
      </div>
      <div class="col-sm-6 text-right pr-3">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- <li class="breadcrumb-item">User Summary</li> -->
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addedit_state.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add Traditional State</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
  ?>
  <div class="text-success text-center mt-3"><h3>Traditional State Food detail has updated successfully.</h3></div><br>
  <?php
}
?>
<div class="text-right pr-5 mb-2"><a title="Add Menu Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_state_menu.php"><span class="btn-dark" style="border-radius: 3px;padding: 5px;"><i class="fa fa-edit"></i> Add Menu Item</a></span></div>

<div class="col-md-12 table-responsive overflow-x1">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th>Option</th> 
    <th>State Name</th>
    <th>No of Menu</th>                  
    <th>Display Status</th>    
    <th>Created Date</th>    
    </tr>
    <?php
    $state_qry = db_query("SELECT * FROM traditional_state WHERE 1=1 ");

    if(db_num_rows($state_qry)>0) {
      while($stateArr = db_fetch_assoc($state_qry)) {

        $menu_item_qry = db_query("SELECT * FROM menu_item_tbl WHERE state_slno='".$stateArr['slno']."' ");
        ?>
        <tr>
          <td><a title="Edit state Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_state.php?slno=<?php echo $stateArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td><?php echo $stateArr['state_name']?></td>
          <td><a title="View Menu Detail" href="<?php echo ADMIN_SITE_URL ?>/view_state_menu.php?menuID=<?php echo $stateArr['slno'];?>"><?php echo db_num_rows($menu_item_qry)?></a></td>          
          <td><?php echo $status_arr[$stateArr['status']]?></td>          
          <td><a title="Add Menu Detail" href="<?php echo ADMIN_SITE_URL ?>/view_state_menu.php?menuID=<?php echo $stateArr['slno'];?>"><i class="fa fa-eye"></i> View Menu Item</a></td>
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