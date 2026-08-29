<?php

include("checklogin.php");
include("../includes/inc.php");
$metatitle = "Add / Edit Website Page";
include("header.php");

// Default values
$page_title = "";

$page_desc = "";
$meta_title = "";
$meta_keyword = "";
$meta_desc = "";
$page_url = "";
$status = "Y";
$position = "";
$innder_header_img = "";

if (isset($_GET['slno'])) {
    $slno = $_GET['slno'];
    $editQuery = mysqli_query($con, "SELECT * FROM website_information WHERE slno='$slno'");
    if (mysqli_num_rows($editQuery) > 0) {
        $row = mysqli_fetch_assoc($editQuery);
        $page_title = $row['page_title'];
       
        $page_desc = $row['page_desc'];
        $meta_title = $row['meta_title'];
        $meta_keyword = $row['meta_keyword'];
        $meta_desc = $row['meta_desc'];
        $page_url = $row['page_url'];
        $status = $row['status'];
        $position = $row['position'];
        $innder_header_img = $row['innder_header_img'];
    }
}

if (isset($_POST['submit'])) {
    $page_title = $_POST['page_title'];
   
    $page_desc = mysqli_real_escape_string($con, $_POST['page_desc']);
    $meta_title = $_POST['meta_title'];
    $meta_keyword = $_POST['meta_keyword'];
    $meta_desc = $_POST['meta_desc'];
    $page_url = $_POST['page_url'];
    $status = $_POST['status'];
    $position = $_POST['position'];
    $upd_date = date("Y-m-d");

    // File Upload
    if (!empty($_FILES['innder_header_img']['name'])) {
        $innder_header_img = time() . '_' . $_FILES['innder_header_img']['name'];
        move_uploaded_file($_FILES['innder_header_img']['tmp_name'], "../uploads/headers/" . $innder_header_img);
    }

    if (!empty($_POST['slno'])) {
        $slno = $_POST['slno'];
        $query = "UPDATE website_information 
                  SET page_title='$page_title',  page_desc='$page_desc', 
                      meta_title='$meta_title', meta_keyword='$meta_keyword', meta_desc='$meta_desc', 
                      page_url='$page_url', innder_header_img='$innder_header_img', 
                      status='$status', position='$position', upd_date='$upd_date'
                  WHERE slno='$slno'";
    } else {
        $query = "INSERT INTO website_information 
                    (page_title, page_type, page_desc, meta_title, meta_keyword, meta_desc, page_url, innder_header_img, status, position, upd_date) 
                  VALUES 
                    ('$page_title',  '$page_desc', '$meta_title', '$meta_keyword', '$meta_desc', '$page_url', '$innder_header_img', '$status', '$position', '$upd_date')";
    }

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Data Inserted / Updated Successfully'); window.location.href='website_pages.php';</script>";
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
        <h6><?php echo isset($_GET['slno']) ? 'Edit Website Page' : 'Add Website Page'; ?></h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/website_pages.php">Manage Website Pages</a></li>
          <li class="breadcrumb-item active">Add/Edit Website Page</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<style>.cke_notification_warning { display: none!important; }</style>

<section class="content mt-4">
  <div class="container-fluid">
    <form method="post" enctype="multipart/form-data">
      <input type="hidden" name="slno" value="<?php echo isset($slno) ? $slno : ''; ?>">
      <div class="card p-3">
        
        <div class="form-group">
          <label>Page Title</label>
          <input type="text" name="page_title" class="form-control" value="<?php echo $page_title; ?>" required>
        </div>


        <div class="form-group">
          <label>Page Description</label>
          <textarea name="page_desc" id="page_desc" class="form-control" rows="5"><?php echo $page_desc; ?></textarea>
        </div>
        <script>CKEDITOR.replace('page_desc');</script>

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
          <textarea name="meta_desc" class="form-control"><?php echo $meta_desc; ?></textarea>
        </div>

        <div class="form-group">
          <label>Page URL</label>
          <input type="text" name="page_url" class="form-control" value="<?php echo $page_url; ?>">
        </div>

        <div class="form-group">
          <label>Header Image</label>
          <?php if ($innder_header_img != '') { echo '<img src="../uploads/headers/'.$innder_header_img.'" width="100">'; } ?>
          <input type="file" name="innder_header_img" class="form-control">
        </div>

        <div class="form-group">
          <label>Status</label>
          <select name="status" class="form-control">
            <option value="Y" <?php echo ($status == 'Y') ? 'selected' : ''; ?>>Active</option>
            <option value="N" <?php echo ($status == 'N') ? 'selected' : ''; ?>>Inactive</option>
          </select>
        </div>

        <div class="form-group">
          <label>Position</label>
          <input type="number" name="position" class="form-control" value="<?php echo $position; ?>">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Save Page</button>
      </div>
    </form>
  </div>
</section>

<?php include("footer.php"); ?>
