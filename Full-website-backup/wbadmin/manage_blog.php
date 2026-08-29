<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Our Blog";
include("header.php");

?>

<?php
if(isset($_GET['deleteBlog']) && !empty($_GET['deleteBlog'])) {
    $blogId = $_GET['deleteBlog'];
    db_query("DELETE FROM our_blogs WHERE slno = '$blogId' ");
    echo "<script>alert('Blog deleted successfully!'); window.location.href='manage_blog.php';</script>";
    exit;
}
?>

<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage Our Blog</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- <li class="breadcrumb-item">User Summary</li> -->
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addedit_blog.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New Blog</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
  ?>
  <div class="text-success text-center mt-3"><h3>Blog detail has updated successfully.</h3></div><br>
  <?php
}

$dispages = 10;

if(isset($_GET['page']) && !empty($_GET['page'])){
  $currentPage = $_GET['page'];
}else{
  $currentPage = 1;
}

$offset = ($currentPage * $dispages) - $dispages;

$blog_count_qry = db_query("SELECT * FROM our_blogs WHERE 1=1 ");

$num = db_num_rows($blog_count_qry);

if($num>0) {  

  $link = "&st=".$_REQUEST['st']."&searchType=".$_REQUEST['searchType']."&searchKey=".$_REQUEST['searchKey']."&vt=".$_REQUEST['vt']; 
  $arr['page'] = $_REQUEST['page'];
  $arr['limit'] = $dispages;
  $arr['numrows'] = $num;
  $arr['link'] = $link; 
  ?>
  <br>
  <?php display_pagination($arr);?>
  
  <div class="col-md-12 table-responsive overflow-x">
  <table class="table table-bordered mb-1">
  <tr class="tr-text-white">
  <th width="5%">Option</th> 
  <th width="40%">Blog Title</th>                  
  <th  width="10%">Posted by / Author</th>
  <th  width="10%">Display Status</th>    
  <th  width="10%">Created Date</th>    
  </tr>
  <?php
  if($currentPage>1) {
    $slno = $offset+1;  
  }
  else {
    $slno=1;
  }


  $blog_qry = db_query("SELECT * FROM our_blogs WHERE 1=1 order by posted_date DESC LIMIT $offset, $dispages ");
  while($blogArr = db_fetch_assoc($blog_qry)) {
    ?>
   <tr>
  <td>
    <a title="Edit Blog Detail" href="<?php echo ADMIN_SITE_URL ?>/addedit_blog.php?slno=<?php echo $blogArr['slno'];?>" class="btn-outline-warning"><i class="fa fa-edit nav-icon"></i></a>
    
    <a href="javascript:void(0);" onclick="deleteBlog('<?php echo $blogArr['slno'];?>')" class="btn-outline-danger ml-2" title="Delete Blog"><i class="fa fa-trash nav-icon"></i></a>
  </td>

  <td>
    <?php echo $blogArr['blog_title']?><br>           
    <b>Posted Date:</b> <?php echo date_short_daymonthyear($blogArr['posted_date'])?>
  </td>

  <td><?php echo $blogArr['posted_by']?></td>
  <td><?php echo $status_arr[$blogArr['display_status']]?></td>          
  <td><?php echo $blogArr['recv_date']?></td>
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
<script>
function deleteBlog(slno) {
    if(confirm('Are you sure you want to delete this blog?')) {
        window.location.href = 'manage_blog.php?deleteBlog=' + slno;
    }
}
</script>


<?php
include("footer.php");
?>
</body>
</html>