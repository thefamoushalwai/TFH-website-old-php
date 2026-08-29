<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Requirement";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage Requirement</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- <li class="breadcrumb-item">User Summary</li> -->
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addedit_requirement.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
  ?>
  <div class="text-success text-center mt-3"><h3>Requirement detail has updated successfully.</h3></div><br>
  <?php
}
?>
<div class="col-md-12 table-responsive overflow-x">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th>Option</th> 
    <th>Requirement Title</th>              
    <th>Short Description</th>    
    <th>Display Status</th>    
    <th>Created Date</th>    
    </tr>
    <?php
    $reqqry = db_query("SELECT * FROM event_requirement WHERE 1=1 ");

    if(db_num_rows($reqqry)>0) {
      while($reqArr = db_fetch_assoc($reqqry)) {
        ?>
        <tr>
          <td><a title="Edit Requirement Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_requirement.php?slno=<?php echo $reqArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td><?php echo $reqArr['requirement_title']?></td>
          <td><?php echo $reqArr['short_desc']?></td>
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