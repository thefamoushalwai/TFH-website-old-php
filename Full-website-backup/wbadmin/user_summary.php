<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Panel User";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>User Summary</h3>
      </div>
      <div class="col-sm-6 text-right">
       <!--  <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item active">User Summary</li>
        </ol> -->

        <?php
        foreach ($status_arr as $key => $value) {
            if($_REQUEST['status']=="$key") {
                ?>
                <a href="<?php echo SITE_URL ?>/user_summary.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;color:#e11f26;"><b><?php echo $value;?></b></span></a>&nbsp;&nbsp;
                <?php
            }
            else {
                ?>
                <a href="<?php echo SITE_URL ?>/user_summary.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;"><?php echo $value;?></span></a>&nbsp;&nbsp;
                <?php
            }
        }
        ?>
        <a href="<?php echo SITE_URL ?>/addedit_user.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New User</span></a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="col-md-12 table-responsive overflow-x">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th class="nowrap_space">Option</th> 
    <th class="nowrap_space">Contact Name</th>          
    <th class="nowrap_space">Mobile Phone</th>
    <th class="nowrap_space">Email Address</th>    
    <th class="nowrap_space">Username</th>
    <th class="nowrap_space">Password</th>
    <th class="nowrap_space">Designation</th> 
    <th class="nowrap_space">Created Date</th>    
    </tr>

    <?php
    $user_qry = db_query("SELECT * FROM admin_tbl WHERE status='".$_REQUEST['status']."' ");

    if(db_num_rows($user_qry)>0) {
      while($userArr = db_fetch_assoc($user_qry)) {
        ?>
        <tr>
          <td class="nowrap_space">
            <a title="Edit User Detail" href="<?php echo SITE_URL ?>/addedit_user.php?slno=<?php echo $userArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td class="nowrap_space"><?php echo $userArr['contact_name']?></td>
          <td class="nowrap_space"><?php echo $userArr['mobile_phone']?></td>
          <td class="nowrap_space"><?php echo $userArr['email_address']?></td>
          <td class="nowrap_space"><?php echo $userArr['username']?></td>
          <td class="nowrap_space"><?php echo $userArr['password']?></td>
          <td class="nowrap_space"><?php echo $userArr['designation']?></td>
          <td class="nowrap_space"><?php echo $userArr['created']?></td>
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
