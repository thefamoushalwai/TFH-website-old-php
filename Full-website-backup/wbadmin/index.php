<?php
include("checklogin.php");
include("../includes/inc.php");

include("header.php");

$workerQry = db_num_rows(db_query("SELECT * FROM prof_job_worker WHERE status='N' "));

$order_qry = db_num_rows(db_query("SELECT a1.* FROM order_members as a1, order_detail as b1 WHERE a1.slno=b1.order_members_slno && b1.qryType='1' && a1.status='Y' GROUP BY b1.order_members_slno order by a1.slno DESC")); 

$enqQry = db_num_rows(db_query("SELECT * FROM order_inquiry WHERE display_status='N' "));

$otherQry = db_num_rows(db_query("SELECT * FROM general_inq WHERE status='N' "));

?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard </h1>
      </div>
      <!-- <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item active">Text Text</li>
        </ol>        
      </div>
    </div> -->
  </div>
</section>

 <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner"><h3><?php echo $order_qry;?></h3><p>New Customized Plate</p></div>
            <div class="icon"> <i class="ion ion-person-add"></i></div>
            <a href="<?php echo ADMIN_SITE_URL;?>/customizedPlate.php" class="small-box-footer">More info </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">          
          <div class="small-box bg-success">
            <div class="inner"><h3><?php echo $enqQry;?></h3><p>New Enquiry</p></div>
            <div class="icon">
              <i class="ion ion-person-bars"></i>
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo ADMIN_SITE_URL;?>/enquiry.php?status=N" class="small-box-footer">More info </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">          
          <div class="small-box bg-warning">
            <div class="inner"><h3><?php echo $otherQry;?></h3><p>Other Enquiry</p></div>
            <div class="icon"><i class="ion ion-person-add"></i></div>
            <a href="<?php echo ADMIN_SITE_URL;?>/general_inquiry.php?status=N" class="small-box-footer" title="Tiffin Services, Contact us">More info</a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner"><h3><?php echo $workerQry;?></h3><p>Our Partners</p></div>
            <div class="icon"><i class="ion ion-person-add"></i></div>
            <a href="<?php echo ADMIN_SITE_URL;?>/manage_employee.php?status=N" class="small-box-footer">More info</a>
          </div>
        </div>
        <!-- ./col -->
      </div>
     
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
<div class="p-4">
<span class="text-danger">Terms of Upload Images on Website</span><br>
Home Page Banner Size: W:1360px H:418px (max 80KB)<br>
InnerPage Banner Size: W:1400px H:260px (max 60KB)<br>
Other Banner Size: W:1235px H:230px (max 60KB)<br>
Image Dimension : W:500px H:333px (max 35KB)<br>
Image Dimension : W:150px H:100px (max 10KB)<br>
Image Dimension : W:90px H:50px (max 5KB)<br>
</div>
<?php
include("footer.php");
?>
</body>
</html>