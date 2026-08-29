<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Testimonials";
include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage Testimonials</h6>
      </div>
      <div class="col-sm-6 text-right">
        <?php
        foreach ($status_arr as $key => $value) {
            if($_REQUEST['status']=="$key") {
                ?>
                <a href="<?php echo ADMIN_SITE_URL ?>/manage_testimonials.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;color:#e11f26;"><b><?php echo $value;?></b></span></a>&nbsp;&nbsp;
                <?php
            }
            else {
                ?>
                <a href="<?php echo ADMIN_SITE_URL ?>/manage_testimonials.php?status=<?php echo $key;?>"><span class="btn-default" style="border-radius: 3px;background-color:#d9e7de;color:#181617;padding: 5px;"><?php echo $value;?></span></a>&nbsp;&nbsp;
                <?php
            }
        }
        ?>
        <a href="<?php echo ADMIN_SITE_URL ?>/addedit_testimonials.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New</span></a>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
  ?>
  <div class="text-success text-center mt-3"><h3>Testimonials detail has updated successfully.</h3></div><br>
  <?php
}
?>
<div class="col-md-12 table-responsive overflow-x">
  <table class="table table-bordered mb-1">
    <tr class="tr-text-white">
    <th>Option</th> 
    <th>Review Type</th>          
    <th>Reviewer Name</th>
    <th>Email Address</th>    
    <th>Testimonials</th>
    <th>Display Status</th>    
    <th>Created Date</th>    
    </tr>

    <?php
    $testimonials_qry = db_query("SELECT * FROM site_testimonials WHERE display_status='".$_REQUEST['status']."' ");

    if(db_num_rows($testimonials_qry)>0) {
      while($testimonialsArr = db_fetch_assoc($testimonials_qry)) {
        ?>
        <tr>
          <td><a title="Edit User Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_testimonials.php?slno=<?php echo $testimonialsArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a></td>

          <td>
            <?php 
            if($testimonialsArr['review_type']==1) {
              echo "Without Video";
            }
            else {
              echo "With Video";
            }
            ?>              
          </td>
          <td><?php echo $testimonialsArr['reviewer_name']?></td>
          <td><?php echo $testimonialsArr['reviewer_email']?></td>
          <td>
          <?php echo $testimonialsArr['review_text']?>
          <?php
          if($testimonialsArr['video_url']) {
            ?>
            <p><a href="<?php echo $testimonialsArr['video_url'];?>" target="_blank"><?php echo $testimonialsArr['video_url']?></a></p>
            <?php
          }
          ?>
          </td>
          <td><?php echo $status_arr[$testimonialsArr['display_status']]?></td>          
          <td><?php echo $testimonialsArr['recv_date_time']?></td>
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
