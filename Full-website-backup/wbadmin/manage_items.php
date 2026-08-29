<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Item";
include("header.php");

if($_REQUEST['category']==1) {
  $category_title = 'Bhaji';
}
else if($_REQUEST['category']==2) {
  $category_title = 'Pickle / Achhar';
}
else {
  $category_title = 'Chutney';
}
?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage <span class="text-danger"><?php echo $category_title?></span> Items</h6>
      </div>
      <div class="col-sm-6 text-right pr-3">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_cuisine.php">Manage Item</a></li> -->
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addedit_items.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New Item</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
  ?>
  <div class="text-success text-center"><h3>Item Detail has updated successfully.</h3></div>
  <?php
}

if($_REQUEST['category']==1) {
  ?>
  <div class="text-right mb-3 pr-3 mt-3">
  <a href="<?php echo ADMIN_SITE_URL;?>/manage_items.php?category=1"><span class="btn-default text-white bg-success" style="border-radius: 3px;padding: 5px;font-size: 15px;">Bhaji</span></a>&nbsp;&nbsp;&nbsp;&nbsp;

  <a href="<?php echo ADMIN_SITE_URL;?>/manage_items.php?category=2"><span class="btn-default text-white" style="border-radius: 3px;padding: 5px;background-color:#094478;font-size: 15px;">Pickle / Achhar</span></a>&nbsp;&nbsp;&nbsp;&nbsp;

   <a href="<?php echo ADMIN_SITE_URL;?>/manage_items.php?category=3"><span class="btn-default text-white" style="border-radius: 3px;padding: 5px;background-color:#094478;font-size: 15px;">Chutney</span></a>
  </div>
  <?php  
}
else if($_REQUEST['category']==2) {
  ?>
  <div class="text-right mb-3 pr-3 mt-3">
  <a href="<?php echo ADMIN_SITE_URL;?>/manage_items.php?category=1"><span class="btn-default text-white" style="border-radius: 3px;padding: 5px;font-size: 15px;background-color:#094478;">Bhaji</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
    
  <a href="<?php echo ADMIN_SITE_URL;?>/manage_items.php?category=2"><span class="btn-default text-white bg-success" style="border-radius: 3px;padding: 5px;font-size: 15px;">Pickle / Achhar</span></a>&nbsp;&nbsp;&nbsp;&nbsp;

  <a href="<?php echo ADMIN_SITE_URL;?>/manage_items.php?category=3"><span class="btn-default text-white" style="border-radius: 3px;padding: 5px;background-color:#094478;font-size: 15px;">Chutney</span></a>
  </div> 
  <?php  
}
else {
  ?>
  <div class="text-right mb-3 pr-3 mt-3">
  <a href="<?php echo ADMIN_SITE_URL;?>/manage_items.php?category=1"><span class="btn-default text-white" style="border-radius: 3px;padding: 5px;font-size: 15px;background-color:#094478;">Bhaji</span></a>&nbsp;&nbsp;&nbsp;&nbsp;

  <a href="<?php echo ADMIN_SITE_URL;?>/manage_items.php?category=2"><span class="btn-default text-white" style="border-radius: 3px;padding: 5px;background-color:#094478;font-size: 15px;">Pickle / Achhar</span></a>&nbsp;&nbsp;&nbsp;&nbsp;

  <a href="<?php echo ADMIN_SITE_URL;?>/manage_items.php?category=3"><span class="btn-default bg-success text-white" style="border-radius: 3px;padding: 5px;font-size: 15px;">Chutney</span></a>
  </div>    
  <?php 
}
?>
<div class="col-md-12 table-responsive overflow-x">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th>Option</th> 
    <th>Items Name</th>              
    <th>Image</th>              
    <th>Price (INR)</th>    
    <th>Display Status</th>        
    </tr>
    <?php
    $menu_item_qry = db_query("SELECT * FROM product_item_tbl WHERE category ='".$_REQUEST['category']."' ");

    if(db_num_rows($menu_item_qry)>0) {
      $slno=1;
      while($menuArr = db_fetch_assoc($menu_item_qry)) {
        ?>
        <tr>
          <td><?php echo $slno;?>&nbsp;&nbsp; <a title="Edit Menu Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_items.php?slno=<?php echo $menuArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td><?php echo $menuArr['menu_name']?></td>
          <td>
            <?php 
              if(!empty($menuArr['menu_img'])) {
                ?>
                <img src="<?php echo SITE_URL;?>/frontEnd/items/<?php echo $menuArr['menu_img']?>" style="width: 100px;height: 50px;">
                <?php
              }
              ?>
            </td>
          <td><?php echo $menuArr['menu_rate']?></td>
          <td><?php 
          if($menuArr['display_status']=='Y') {
            ?>
            <span class="text-success"><?php echo $status_arr[$menuArr['display_status']]; ?> 
            <?php
          }
          else {
            ?>
            <span class="text-danger"><?php echo $status_arr[$menuArr['display_status']]; ?> 
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


