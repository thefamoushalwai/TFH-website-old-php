<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Cuisine";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage Cuisine</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- <li class="breadcrumb-item">User Summary</li> -->
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addedit_cuisine.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New Cuisine</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
  ?>
  <div class="text-success text-center mt-3"><h3>Cuisine detail has updated successfully.</h3></div><br>
  <?php
}
?>
<div class="text-right pr-5 mb-2"><a title="Add Menu Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_menu.php"><span class="btn-dark" style="border-radius: 3px;padding: 5px;"><i class="fa fa-edit"></i> Add Menu Item</a></span></div>

<div class="col-md-12 table-responsive1 overflow-x1">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th>Option</th> 
    <th>Cuisine Title</th>
    <th>No of Menu</th>              
    <th>Short Description</th>    
    <th>Display Status</th>    
    <th>Created Date</th>    
    </tr>
    <?php
    $cuisine_qry = db_query("SELECT * FROM event_cuisine WHERE 1=1 ");

    if(db_num_rows($cuisine_qry)>0) {
      while($cuisineArr = db_fetch_assoc($cuisine_qry)) {

        $menu_item_qry = db_query("SELECT * FROM menu_item_tbl WHERE event_cuisine_slno='".$cuisineArr['slno']."' ");
        ?>
        <tr>
          <td><a title="Edit Meals Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_cuisine.php?slno=<?php echo $cuisineArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td><?php echo $cuisineArr['cuisine_title']?></td>
          <td><a title="View Menu Detail" href="<?php echo ADMIN_SITE_URL ?>/view_menu.php?menuID=<?php echo $cuisineArr['slno'];?>"><?php echo db_num_rows($menu_item_qry)?></a></td>
          <td><?php echo $cuisineArr['short_desc']?></td>
          <td><?php echo $status_arr[$cuisineArr['display_status']]?></td>          
          <td>
            <?php
            if($cuisineArr['slno']==9) {
               ?>
              <a title="Add Menu Detail" href="<?php echo ADMIN_SITE_URL ?>/view_state.php"><i class="fa fa-eye"></i> View Traditional State</a>
              <?php
            }
            else {
              ?>
              <a title="Add Menu Detail" href="<?php echo ADMIN_SITE_URL ?>/view_menu.php?menuID=<?php echo $cuisineArr['slno'];?>"><i class="fa fa-eye"></i> View Menu Item</a>
              <?php
            }
            ?>
          </td>
        </tr>  
        <?php
      }
      ?>
      <!-- <tr>
      <td></td>
      <td>Traditional State Food</td>
      <td><a title="View State Detail" href="<?php echo ADMIN_SITE_URL ?>/view_state.php"><?php echo db_num_rows($menu_item_qry)?></a></td>
      <td>We provide Traditional State Food.</td>
      <td>&nbsp;</td>          
      <td><a title="Add Menu Detail" href="<?php echo ADMIN_SITE_URL ?>/view_state.php"><i class="fa fa-eye"></i> View Traditional State</a></td>
      </tr>  --> 
      <?php
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