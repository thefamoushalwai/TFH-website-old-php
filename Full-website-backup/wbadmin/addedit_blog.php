<?php
include("checklogin.php");
include("../includes/inc.php");
$metatitle = "Add / Edit Blog";
include("header.php");


$blog_title = "";
$posted_by = "";
$blog_short_desc = "";
$blog_desc = "";
$meta_title = "";
$meta_keyword = "";
$meta_desc = "";
$display_status = "Y";
$filename = "";
$image = "";

if (isset($_GET['slno'])) {
    $slno = $_GET['slno'];
    $editQuery = mysqli_query($con, "SELECT * FROM our_blogs WHERE slno='$slno'");
    if (mysqli_num_rows($editQuery) > 0) {
        $row = mysqli_fetch_assoc($editQuery);
        $blog_title = $row['blog_title'];
        $posted_by = $row['posted_by'];
        $blog_short_desc = $row['blog_short_desc'];
        $blog_desc = $row['blog_desc'];
        $meta_title = $row['meta_title'];
        $meta_keyword = $row['meta_keyword'];
        $meta_desc = $row['meta_desc'];
        $display_status = $row['display_status'];
        $filename = $row['filename'];
        $image = $row['image'];
         
    }
}

if (isset($_POST['submit'])) {
    $blog_title = $_POST['blog_title'];
    // $filename= $blog_title ? strtolower(preg_replace('/[^a-z0-9]+/', '-', $blog_title)) : '';
    $filename = $blog_title ? strtolower(preg_replace('/[^a-z0-9]+/i', '-', $blog_title)) : '';

    $posted_by = $_POST['posted_by'];
    $blog_short_desc = $_POST['blog_short_desc'];
   $blog_desc = mysqli_real_escape_string($con, $_POST['blog_desc']);
  $meta_title = $_POST['meta_title'];
    $meta_keyword = $_POST['meta_keyword'];
    $meta_desc = $_POST['meta_desc'];
    $display_status = $_POST['display_status'];
    $posted_date = date("Y-m-d H:i:s");
    $recv_date = date("Y-m-d H:i:s");

   if (!empty($_FILES['image']['name'])) {
    $image = time() . '_' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../frontEnd/blog/Images/" . $image);
}


    if (!empty($_POST['slno'])) {
        $slno = $_POST['slno'];
        $query = "UPDATE our_blogs SET blog_title='$blog_title', image='$image', posted_by='$posted_by', display_status='$display_status', blog_short_desc='$blog_short_desc', blog_desc='$blog_desc', meta_title='$meta_title', meta_keyword='$meta_keyword', meta_desc='$meta_desc' WHERE slno='$slno'";
    } else {
        $query = "INSERT INTO our_blogs (blog_title, image, posted_by, posted_date, display_status, blog_short_desc, blog_desc, meta_title, meta_keyword, meta_desc, recv_date) VALUES ('$blog_title', '$image', '$posted_by', '$posted_date', '$display_status', '$blog_short_desc', '$blog_desc', '$meta_title', '$meta_keyword', '$meta_desc', '$recv_date')";
    }

    $result = mysqli_query($con, $query);
    
    
    $lastInsertedId = mysqli_insert_id($con);
    
    if ($result) {
        $lastInsertedId = mysqli_insert_id($con);
        if ($lastInsertedId != 0){
          $filename = $filename.'_'.$lastInsertedId;
          $query = "UPDATE our_blogs SET filename='$filename' WHERE slno=' $lastInsertedId'";
           $result = mysqli_query($con, $query);
        }
        echo "<script>alert('Data Inserted / Updated Successfully'); window.location.href='manage_blog.php';</script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
        
    }
}
?>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6><?php echo isset($_GET['slno']) ? 'Edit Blog' : 'Add Blog'; ?></h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_blog.php">Manage Blogs</a></li>
          <li class="breadcrumb-item active">Add/Edit Blog</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<style>.cke_notification_warning {
    display: none!important;
    }
</style>

<section class="content mt-4">
  <div class="container-fluid">
    <form method="post" enctype="multipart/form-data">
      <input type="hidden" name="slno" value="<?php echo isset($slno) ? $slno : ''; ?>">
      <div class="card p-3">
        <div class="form-group">
          <label>Blog Title</label>
          <input type="text" name="blog_title" class="form-control" value="<?php echo $blog_title; ?>" required>
        </div>
        <div class="form-group">
          <label>Posted By</label>
          <input type="text" name="posted_by" class="form-control" value="<?php echo $posted_by; ?>" >
        </div>
       <div class="form-group">
    <label>Short Description</label>
    <textarea name="blog_short_desc" id="blog_short_desc" class="form-control"><?php echo $blog_short_desc; ?></textarea>
</div>

<script>
    CKEDITOR.replace('blog_short_desc');
</script>

        <div class="form-group">
    <label>Blog Description</label>
    <textarea name="blog_desc" id="blog_desc" class="form-control" rows="5" required><?php echo $blog_desc; ?></textarea>
</div>

<script>
    CKEDITOR.replace('blog_desc');
</script>

        <div class="form-group">
          <label>Image</label>
         <?php 
       
            if ($image != '') { 
                echo '<img src="../frontEnd/blog/Images/'.$image.'" width="100">'; 
            } 
            ?>

          <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
          <label>Meta Title</label>
          <input type="text" name="meta_title" class="form-control" value="<?php echo $meta_title; ?>">
        </div>
        <div class="form-group">
          <label>Meta Keyword</label>
          <input type="text" name="meta_keyword" class="form-control" value="<?php echo $meta_keyword; ?>">
        </div>
        <div class="form-group">
          <label>Meta Description</label>
          <textarea name="meta_desc" class="form-control"> <?php echo $meta_desc; ?></textarea>
        </div>
        <div class="form-group">
         <label>Display Status</label>
            <select name="display_status" class="form-control">
                <option value="Y" <?php echo ($display_status == 'Y') ? 'selected' : ''; ?>>Active</option>
                <option value="N" <?php echo ($display_status == 'N') ? 'selected' : ''; ?>>Inactive</option>
            </select>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Save Blog</button>
      </div>
    </form>
  </div>
</section>

<?php include("footer.php"); ?>