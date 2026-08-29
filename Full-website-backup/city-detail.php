<?php
include("includes/inc.php");

// City ID check
if (!isset($_GET['slno']) || empty($_GET['slno'])) {
    header("Location: index.php");
    exit;
}

$slno = intval($_GET['slno']);
$qry = db_query("SELECT * FROM services_city WHERE slno='$slno' AND status='Y'");
if (db_num_rows($qry) == 0) {
    echo "City not found.";
    exit;
}
$city = db_fetch_assoc($qry);

// SEO Meta
$meta_title = !empty($city['meta_title']) ? $city['meta_title'] : $city['city_name'];
$meta_keywords = $city['meta_keyword'];
$meta_description = $city['meta_description'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo htmlspecialchars($meta_title); ?></title>
<meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords); ?>">
<meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Main site CSS -->
<link href="<?php echo SITE_URL; ?>/frontEnd/css/style.css" rel="stylesheet">
<link href="<?php echo SITE_URL; ?>/frontEnd/css/responsive.css" rel="stylesheet">

<style>
/* Breadcrumb */
.breadcrumb {
    background: #f9f9f9;
    padding: 12px 0;
    font-size: 14px;
    margin-bottom: 20px;
}
.breadcrumb a {
    color: #777;
    text-decoration: none;
}
.breadcrumb span {
    color: #000;
}

/* Blog-style detail page */
.blog-detail-section {
    padding: 40px 0;
}
.blog-detail {
    max-width: 900px;
    margin: 0 auto;
}
.blog-title {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 20px;
}
.blog-image img {
    width: 100%;
    height: auto;
    border-radius: 6px;
    margin-bottom: 20px;
}
.short-description {
    font-size: 16px;
    color: #555;
    margin-bottom: 20px;
    line-height: 1.6;
    font-style: italic;
}
.blog-content {
    font-size: 16px;
    color: #333;
    line-height: 1.8;
}
.blog-content p {
    margin-bottom: 15px;
}

/* Responsive */
@media (max-width: 768px) {
    .blog-title {
        font-size: 22px;
    }
}
</style>
</head>
<body>

<?php include('inner_header.php');?>

<!-- Breadcrumb -->
<div class="breadcrumb">
    <div class="container">
        <a href="<?php echo SITE_URL; ?>">Home</a> /
        <span><?php echo htmlspecialchars($city['city_name']); ?></span>
    </div>
</div>

<!-- City Detail -->
<section class="blog-detail-section">
    <div class="container">
        <div class="blog-detail">
            <h1 class="blog-title"><?php echo htmlspecialchars($city['city_name']); ?></h1>

            <?php if (!empty($city['city_img'])) { ?>
                <div class="blog-image">
                    <img src="<?php echo SITE_URL; ?>/frontEnd/location/<?php echo $city['city_img']; ?>" alt="<?php echo htmlspecialchars($city['city_name']); ?>">
                </div>
            <?php } ?>

            <?php if (!empty($city['short_desc'])) { ?>
                <p class="short-description">
                    <?php echo nl2br(htmlspecialchars($city['short_desc'])); ?>
                </p>
            <?php } ?>

            <div class="blog-content">
                <?php echo $city['desc']; ?>
            </div>
        </div>
    </div>
</section>


		<?php
		include('inner_footer.php');
		?>

</body>
</html>
