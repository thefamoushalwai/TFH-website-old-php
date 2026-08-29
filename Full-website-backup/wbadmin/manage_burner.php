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
        <h3>User Summary - <span class="text-danger"><?php echo $user_status_arr[$_REQUEST['status']]?></span></h3>
      </div>
      <div class="col-sm-6 text-right">
       <!--  <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item active">User Summary</li>
        </ol> -->

        <?php
        foreach ($user_status_arr as $key => $value) {
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
    <th>Option</th> 
    <th>Contact Name</th>          
    <th>Mobile Phone</th>
    <th>Email Address</th>    
    <th>Username</th>
    <th>Password</th>
    <th>Designation</th> 
    <th>Created Date</th>    
    </tr>

    <?php
    $user_qry = db_query("SELECT * FROM admin_tbl WHERE status='".$_REQUEST['status']."' ");

    if(db_num_rows($user_qry)>0) {
      while($userArr = db_fetch_assoc($user_qry)) {
        ?>
        <tr>
          <td>
            <!-- <a title="View Structured Digital Database" href="<?php echo SITE_URL;?>/view_structured_digital_database.php?slno=<?php echo $userArr['slno'];?>" class="btn btn-outline-success"><i class="fa fa-eye nav-icon"></i></a>&nbsp;&nbsp; -->

            <a title="Edit User Detail" href="<?php echo SITE_URL ?>/addedit_user.php?slno=<?php echo $userArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td><?php echo $userArr['contact_name']?></td>
          <td><?php echo $userArr['mobile_phone']?></td>
          <td><?php echo $userArr['email_address']?></td>
          <td><?php echo $userArr['username']?></td>
          <td><?php echo $userArr['password']?></td>
          <td><?php echo $userArr['designation']?></td>
          <td><?php echo $userArr['created']?></td>
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
