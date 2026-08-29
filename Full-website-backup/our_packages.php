<?php
include('includes/inc.php');
$metatitle='Our Packages - The Famous Halwai';
$metaDesc='';
$metaKeywords='';
include('inner_header.php');

?>

<div class="page__banner" style="background-image: url('<?php echo SITE_URL;?>/frontEnd/images/hbanner/our_services.jpg');height: 250px; margin-top: 94px;"></div> 

<!-- <section class="section_lr mb-5"> -->
<section class="contact-info-section">
	<div class="container-fluid">
	<h1 class="h1title section_lr">Our Packages</h1>		

	<div class="row justify-content-center">
		<div class="col-md-3 col-12 block membership_sl">
			<div class="col-12 t-box">
				<div class="area"><a href="<?php echo SITE_URL;?>/?qtype=Silver"><img src="<?php echo SITE_URL;?>/frontEnd/images/membership/silver.png" alt="">
				<h5>Silver Package</h5></a>

				<div class="text-center packprice">Veg Package: @499 (INR)<br>
				Non-Veg Package: @599 (INR)</div>

				<div class="text-center"><a href="<?php echo SITE_URL;?>/our-menu.php?qtype=Silver"><button class="submit_link_btn mt-2">Book Now</button></a></div>
				</div>
			</div>
		</div>

		<div class="col-md-1 col-12"></div>

		<div class="col-md-3 col-12 block membership_gl membershipDiv">
			<div class="col-12 t-box membership_gl">
				<div class="area"><a href="<?php echo SITE_URL;?>/?qtype=Gold"><img src="<?php echo SITE_URL;?>/frontEnd/images/membership/gold.png" alt=""><h5>Gold Package</h5></a>

				<div class="text-center packprice">Veg Package: @799 (INR)<br>
				Non-Veg Package: @899 (INR)</div>

				<div class="text-center"><a href="<?php echo SITE_URL;?>/our-menu.php?qtype=Gold"><button class="submit_link_btn mt-2">Book Now</button></a></div>
				</div>
			</div>
		</div>

		<div class="col-md-1 col-12"></div>

		<div class="col-md-3 col-12 block membership_pl membershipDiv">
			<div class="col-12 t-box">
				<div class="area"><a href="<?php echo SITE_URL;?>/?qtype=Platinum"><img src="<?php echo SITE_URL;?>/frontEnd/images/membership/platinum.png" alt=""><h5>Platinum Package</h5></a>

				<div class="text-center packprice">Veg Package: @1299 (INR)<br>
				Non-Veg Package: @1499 (INR)</div>

				<div class="text-center"><a href="<?php echo SITE_URL;?>/our-menu.php?qtype=Platinum"><button class="submit_link_btn mt-2">Book Now</button></a></div>

				</div>
			</div>
		</div>
	</div>
	</div>
</section>

<?php
include('inner_footer.php');
?>