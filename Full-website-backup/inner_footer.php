<!--BOOK NOW BUTTON START -->
<!-- <button class="book-btn book-btnInner"><a class="text-white" href="<?php echo SITE_URL;?>/enquiry.php">Book Now</a></button> -->
<!-- BOOK NOW BUTTON END -->
<?php 
$contactinfoArr = db_fetch_assoc(db_query("SELECT * FROM site_contactus WHERE 1=1")); 
?>
<footer class="footer glob_lr">
	<div class="whatsapp d-flex"><!--  d-lg-none-->
	<a data-action="open" data-phone="918926262675" data-message="Hello! I am Business Manager" href="https://api.whatsapp.com/send?phone=918926262675&amp;text=Hello! I am looking a Halwai & Chefs?" target="_blank"><img src="<?php echo SITE_URL;?>/frontEnd/images/whatsapp.gif"></a>
	</div>	

	<div class="container-fluid py-3">
		<a class="d-inline-block" href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>/frontEnd/images/logo.png" class="img-fluid footer_logo" alt="" width="70"></a>
		
		<!-- <div class="row mt-5 border-bottom pb-4"> -->
		<div class="row mt-3 border-bottom">	
			<div class="col-lg-3 col-md-6">
				<h5>About Company</h5>
				<ul class="footer_item">
				<li><a href="<?php echo SITE_URL;?>/pages/about-our-company.php">About us</a></li>
				<li> <a href="<?php echo SITE_URL;?>/contact-us.php"> Contact Us</a> </li>
				<li> <a href="<?php echo SITE_URL;?>/gallery-catering-events.php">Photo Gallery</a> </li>
				<?php
				$general_page_qry = db_query("SELECT * FROM website_information WHERE status='Y' && page_type='N' and slno NOT IN ('1','8')  && page_url!='' ");
				if(db_num_rows($general_page_qry)>0) {
					while($pagesArr = db_fetch_assoc($general_page_qry)) {				
					?>
					<li><a href="<?php echo SITE_URL;?>/pages/<?php echo $pagesArr['page_url'];?>.php"><?php echo $pagesArr['page_title'];?></a></li>					
					<?php
					}
				}
				?>
				</ul>
			
			</div>

						
			<div class="col-lg-3 col-md-6">
				<h5>For Customers</h5>
				<ul class="footer_item">						
				<li> <a href="<?php echo SITE_URL;?>/choose_services.php?q=othservices"> Our Services</a> </li>	
				<li> <a href="<?php echo SITE_URL;?>/blog/"> Our Blog</a> </li>
				<li> <a href="<?php echo SITE_URL;?>/our_packages.php"> Our Packages</a> </li>
				<li><a href="<?php echo SITE_URL;?>/testimonials.php">Testimonials</a></li>
				<li><a href="<?php echo SITE_URL;?>/enquiry.php?q=halwaichef">Book Halwai & Chefs</a></li>				
				</ul>
			
			</div>
			
			<div class="col-lg-3 col-md-6">
				<h5>For partners</h5>
				<ul class="footer_item">
			
				<li><a href="<?php echo SITE_URL;?>/pages/our-partners.php">Register as a Partner</a></li>
					 
				</ul>			
			</div>

			<div class="col-lg-3 col-md-6">
				<h5>Connect with us</h5>
				<p>
				<div class="footerContactUs">
                <div><i class="fa fa-map-marker mr-1"></i></div>
                <div>
                <?php
                if(!empty($contactinfoArr['office_address'])) {
                    echo $contactinfoArr['office_address'];
                }
                ?>	
                </div>
            	</div>
                    					
				<i class="fa fa-envelope mr-1"></i> <a href="mailto:<?php echo $contactinfoArr['email']?>" style="color:#181617"><?php echo $contactinfoArr['email']?></a><br>
				<i class="fa fa-phone mr-1"></i> <a href="tel:<?php echo $contactinfoArr['mobile_no']?>" style="color:#181617"><?php echo $contactinfoArr['mobile_no']?></a><br>
				<i class="fa fa-phone mr-1"></i> <a href="tel:<?php echo $contactinfoArr['mobile_no2']?>" style="color:#181617"><?php echo $contactinfoArr['mobile_no2']?></a>
				</p>

				<p><b>Follow us</b></p>
				<ul class="social_media">
					<li><a href="<?php echo $contactinfoArr['twitter']?>"><img src="<?php echo SITE_URL;?>/frontEnd/images/Twitter.png" alt=""></a></li>
					<li><a href="<?php echo $contactinfoArr['fb_link']?>"><img src="<?php echo SITE_URL;?>/frontEnd/images/Facebook.png" alt=""></a></li>
					<li><a href="<?php echo $contactinfoArr['instagram']?>"><img src="<?php echo SITE_URL;?>/frontEnd/images/Insta.png" alt=""></a></li>
					<li><a href="<?php echo $contactinfoArr['linkedin_link']?>"><img src="<?php echo SITE_URL;?>/frontEnd/images/Linkedin.png" alt=""></a></li>
					 <!--https://www.youtube.com/channel/UCNgtRI43BqWt3M2LM25gStQ
						https://in.pinterest.com/thefamoushalwai/
						https://www.tumblr.com/blog/thefamoushalwai
					 -->					 
				</ul>
				<!-- <p class="mt-5"><a href=""><img src="<?php echo SITE_URL;?>/frontEnd/images/appstor.png" alt=""></a></p>
				<p><a href=""><img src="<?php echo SITE_URL;?>/frontEnd/images/playstore.png" alt=""></a></p> -->			
			</div>
		</div>
		
	</div>
</footer>

<div class="light-dark foot-para">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left text-md-start mb-3 mb-md-0">
                © 2024-25 The Famous Halwai. All rights reserved.
            </div>
            <!--<div class="col-md-6 text-right text-md-end">-->
            <!--    Designed & Developed By: <a href="https://www.webibm.com/" target="_blank" class="text-white">India Business Mart Info Vision Pvt. Ltd.</a>-->
            <!--</div>-->
        </div>
    </div>
</div>



<!--footer--end-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<!--owlcarousel-->
<script src="<?php echo SITE_URL;?>/frontEnd/inner/js/bootstrap.js"></script>
<!--owlcarousel-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<!--owlcarousel-->
<!-- <script src="slick/js/slick.js"></script> -->
<!--owlcarousel-->
 <script src="<?php echo SITE_URL;?>/frontEnd/inner/js/halwai.js"></script> 

 <script type="text/javascript">
window.addEventListener('scroll', function () {
    let navbar = document.getElementById('menu-item')
    if (window.pageYOffset >= 291) {
        navbar.classList.add('menusticky');

    } else {
        navbar.classList.remove('menusticky');
    }
});	
</script>