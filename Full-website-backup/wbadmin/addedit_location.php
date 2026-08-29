<?php
include("checklogin.php");
include("../includes/inc.php");
$metatitle ="Add | Edit Location";
include("header.php");

// Initialize variables
$slno = "";
$city_name = "";
$city_img = "";
$status = "Y";
$meta_title = "";
$meta_keyword = "";
$meta_description = "";
$short_desc = "";
$desc = "";

// If editing
if (isset($_GET['slno']) && $_GET['slno'] != "") {
    $slno = intval($_GET['slno']);
    $result = mysqli_query($con, "SELECT * FROM services_city WHERE slno='$slno'");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $city_name = $row['city_name'];
        $city_img = $row['city_img'];
        $status = $row['status'];
        $meta_title = $row['meta_title'];
        $meta_keyword = $row['meta_keyword'];
        $meta_description = $row['meta_description'];
        $short_desc = $row['short_desc'];
        $desc = $row['desc'];
    }
}

// Form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['pID'] == 'addeditForm') {

    $slno = $_POST['slno'];
    $city_name = $_POST['city_name'];
    $status = $_POST['status'];
    $meta_title = $_POST['meta_title'];
    $meta_keyword = $_POST['meta_keyword'];
    $meta_description = $_POST['meta_description'];
    $short_desc = $_POST['short_desc'];
    $desc = mysqli_real_escape_string($con, $_POST['desc']);

    if (empty($slno)) {
        // First insert without image
        mysqli_query($con, "INSERT INTO services_city 
            (city_name, status, meta_title, meta_keyword, meta_description, short_desc, `desc`)
            VALUES 
            ('$city_name', '$status', '$meta_title', '$meta_keyword', '$meta_description', '$short_desc', '$desc')");
        
        $new_id = mysqli_insert_id($con);

        // If image uploaded
        if(!empty($_FILES['itemsImage']['name'])) {
            $ext = pathinfo($_FILES['itemsImage']['name'], PATHINFO_EXTENSION);
            $iconImg = $new_id . "." . $ext; 
            $himage_upload_path = BASEDIR . "/frontEnd/location/" . $iconImg;
            move_uploaded_file($_FILES['itemsImage']['tmp_name'], $himage_upload_path);
            mysqli_query($con, "UPDATE services_city SET city_img='".$iconImg."' WHERE slno ='".$new_id."'");
        }

    } else {
        // Update existing
        mysqli_query($con, "UPDATE services_city SET
            city_name='$city_name',
            status='$status',
            meta_title='$meta_title',
            meta_keyword='$meta_keyword',
            meta_description='$meta_description',
            short_desc='$short_desc',
            `desc`='$desc'
            WHERE slno='$slno'");

        // If new image uploaded
        if(!empty($_FILES['itemsImage']['name'])) {
            $ext = pathinfo($_FILES['itemsImage']['name'], PATHINFO_EXTENSION);
            $iconImg = $slno . "." . $ext; 
            $himage_upload_path = BASEDIR . "/frontEnd/location/" . $iconImg;
            move_uploaded_file($_FILES['itemsImage']['tmp_name'], $himage_upload_path);
            mysqli_query($con, "UPDATE services_city SET city_img='".$iconImg."' WHERE slno ='".$slno."'");
        }
    }

    // Success popup + redirect
    echo "<script>
    alert('Location saved successfully!');
    window.location.href = 'manage_location.php';
    </script>";
    exit;
}
?>

<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Add | Edit Location</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href='<?php echo ADMIN_SITE_URL;?>'>Dashboard</a></li>
          <li class="breadcrumb-item"><a href='<?php echo ADMIN_SITE_URL ?>/manage_location.php'>Manage Location</a></li>
          <li class="breadcrumb-item active">Add | Edit Location</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content-header mt-4">
  <div class="container-fluid">
    <form method="post" enctype="multipart/form-data">
      <input type="hidden" name="pID" value="addeditForm">
      <input type="hidden" name="slno" value="<?php echo $slno; ?>">

      <!-- Location Name -->
      <div class="form-group">
        <label>Location Name *</label>
        <input type="text" name="city_name" value="<?php echo htmlspecialchars($city_name); ?>" class="form-control" required>
      </div>

      <!-- Image -->
      <div class="form-group">
        <label>Image</label>
        <input type="file" name="itemsImage" class="form-control">
        <?php if (!empty($city_img)) { ?>
          <img src="<?php echo SITE_URL.'/frontEnd/location/'.$city_img; ?>" width="100" style="margin-top:5px;">
        <?php } ?>
      </div>

      <!-- Display Status -->
      <div class="form-group">
        <label>Display Status *</label>
        <select name="status" class="form-control">
          <option value="Y" <?php if ($status == 'Y') echo 'selected'; ?>>Approved</option>
          <option value="N" <?php if ($status == 'N') echo 'selected'; ?>>Not Approved</option>
        </select>
      </div>

      <!-- Meta Title -->
      <div class="form-group">
        <label for="meta_title">Meta Title</label>
        <input type="text" name="meta_title" id="meta_title" value="<?php echo htmlspecialchars($meta_title); ?>" class="form-control">
      </div>

      <!-- Meta Keywords -->
      <div class="form-group">
        <label for="meta_keyword">Meta Keywords</label>
        <textarea name="meta_keyword" id="meta_keyword" class="form-control"><?php echo htmlspecialchars($meta_keyword); ?></textarea>
      </div>

      <!-- Meta Description -->
      <div class="form-group">
        <label for="meta_description">Meta Description</label>
        <textarea name="meta_description" id="meta_description" class="form-control"><?php echo htmlspecialchars($meta_description); ?></textarea>
      </div>

      <!-- Short Description -->
      <div class="form-group">
        <label for="short_desc">Short Description</label>
        <textarea name="short_desc" id="short_desc" class="form-control"><?php echo htmlspecialchars($short_desc); ?></textarea>
      </div>

      <!-- Full Description -->
      <div class="form-group">
        <label for="desc">Description</label>
        <textarea name="desc" id="desc" class="form-control editor"><?php echo htmlspecialchars($desc); ?></textarea>
      </div>

      <!-- Submit Button -->
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</section>

<!-- CKEditor Script -->

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>




<script>
  CKEDITOR.replace('desc');
</script>

<?php include("footer.php"); ?>
