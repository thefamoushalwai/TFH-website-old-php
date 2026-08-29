<?php
include("checklogin.php");
include("../includes/inc.php");
$metatitle = "Add / Edit Home Banner";
include("header.php");

$slno = isset($_GET['slno']) ? $_GET['slno'] : '';
$heading = '';
$short_text = '';
$position = '';
$status = '';
$homepage_img = '';

if ($slno != '') {
    $res = mysqli_query($con, "SELECT * FROM homepage_banner WHERE slno = '$slno'");
    if ($row = mysqli_fetch_assoc($res)) {
        $heading = $row['heading'];
        $short_text = $row['short_text'];
        $position = $row['position'];
        $status = $row['status'];
        $homepage_img = $row['homepage_img'];
         $button_name = $row['button_name'];   
        $button_link = $row['button_link']; 
    }
}

if (isset($_POST['submit'])) {
    $heading = $_POST['heading'];
    $short_text = $_POST['short_text'];
    $position = $_POST['position'];
    $status = $_POST['status'];
    $updatedby = 'Admin';
    $rdate = date("Y-m-d H:i:s");
 $button_name = $_POST['button_name'];    
    $button_link = $_POST['button_link'];  
    $filename = $homepage_img;
   if (!empty($_FILES['homepage_img']['name'])) {
    $filename = time() . '_' . $_FILES['homepage_img']['name'];
    move_uploaded_file($_FILES['homepage_img']['tmp_name'], "../frontEnd/hpbanner/" . $filename);
}


    if ($slno == '') {
        $query = "INSERT INTO homepage_banner (heading, short_text, homepage_img, updatedby, status, position, rdate, button_name, button_link) 
                  VALUES ('$heading', '$short_text', '$filename', '$updatedby', '$status', '$position', '$rdate', '$button_name', '$button_link')";
    } else {
        $query = "UPDATE homepage_banner 
                  SET heading='$heading', short_text='$short_text', homepage_img='$filename', updatedby='$updatedby', status='$status', position='$position', rdate='$rdate', 
                  button_name='$button_name', button_link='$button_link' 
                  WHERE slno='$slno'";
    }

    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Data saved successfully!'); window.location.href='manage_top_homebanner.php';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Add / Edit Home Banner</h6>
      </div>
      <div class="col-sm-6 text-right">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL; ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="manage_top_homebanner.php">Manage Home Banners</a></li>
          <li class="breadcrumb-item active">Add / Edit Banner</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Heading</label>
            <input type="text" name="heading" class="form-control" value="<?php echo $heading; ?>" required>
          </div>
          <div class="form-group">
            <label>Short Text</label>
            <textarea name="short_text" class="form-control" rows="3" required><?php echo $short_text; ?></textarea>
          </div>
          <div class="form-group">
            <label>Banner Image</label>
            <input type="file" name="homepage_img" class="form-control">
            <?php if ($homepage_img != '') { ?>
            <img src="<?php echo SITE_URL; ?>/frontEnd/hpbanner/<?php echo $homepage_img; ?>" width="150" class="mt-2">


            <?php } ?>
          </div>
          <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" class="form-control" value="<?php echo $position; ?>">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
              <option value="1" <?php if ($status == '1') echo 'selected'; ?>>Active</option>
              <option value="0" <?php if ($status == '0') echo 'selected'; ?>>Inactive</option>
            </select>
          </div>
          
           <div class="form-group">
            <label>Button Name</label>
            <input type="text" name="button_name" class="form-control" value="<?php echo $button_name; ?>">
          </div>

          <div class="form-group">
            <label>Button Link</label>
            <input type="text" name="button_link" class="form-control" value="<?php echo $button_link; ?>">
          </div>
          
          <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include("footer.php"); ?>
