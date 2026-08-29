<?php
include('includes/inc.php');
$metatitle='Gallery - The Famous Halwai';
$metaDesc='';
$metaKeywords='';
include('inner_header.php');

?>
<div class="page__banner" style="background-image: url('<?php echo SITE_URL;?>/frontEnd/images/hbanner/gallery_header.jpg');height: 200px; margin-top: 94px;">	
</div>

<!-- <div class="page__banner section_lr mt-4">
<div class="container-fluid">
<div class="row">
<div class="col-xl-12">	
<h1 class="h1title">Our Gallery</h1>
</div>
</div>
</div>
</div> -->


<section class="section_lr mt-5">
<div class="container-fluid">
<h1 class="h1title">Photo Gallery</h1>	
	<p>We collected a few images from our catering events to help inspire the variety of quality prepared food we can bring to your event. The Famous Halwai delivers culinary and hospitality excellence to hundred of events each year.Check out some “delicious” photos from our Event Catering Gallery. We would love to assist you in planning your next catering event – and join the fun!</p>

	<?php
	$winfo_qry = db_query("SELECT * FROM website_gallery WHERE 1=1 order by position ASC");        
  	if(db_num_rows($winfo_qry)>0) {

  		$slno=1;
      	while($carr = db_fetch_assoc($winfo_qry)) {
      		if($slno==1) {
				?>
				<div class="row justify-content-center mt-5">
				<?php
			}
			?>	
			<div class="col-md-3 col-12 block">
				<div class="col-12 t-box">
					<div class="area"><img src="<?php echo SITE_URL;?>/frontEnd/gallery/<?php echo $carr['gimage']?>" width="150" height="150">
					</div>
				</div>
			</div>
			<?php
			if($slno==4) {
				?>
				</div>
				<?php
				$slno=0;
			}
			$slno++;
		}
	}
	?>	
</div>      
</section>
	
<br><br>

<?php

include('inner_footer.php');
?>