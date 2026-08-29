<?php
include('includes/inc.php');
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE, chrome=1" />

<!-- SEO Meta Tags for Home Page -->
    <title>The Famous Halwai | Book Halwai & Catering Services</title>
    <meta name="description" content="Verified halwai, chefs & catering for weddings, poojas & parties. Book online with The Famous Halwai.">
    <meta name="keywords" content="the famous halwai, online halwai, halwai online, best halwai near me, online halwai near me, online chef service at home">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="The Famous Halwai | Book Halwai & Catering Services">
    <meta property="og:description" content="Verified halwai, chefs & catering for weddings, poojas & parties. Book online with The Famous Halwai.">
    <meta property="og:url" content="https://www.thefamoushalwai.com/">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:title" content="The Famous Halwai | Book Halwai & Catering Services">
    <meta name="twitter:description" content="Verified halwai, chefs & catering for weddings, poojas & parties. Book online with The Famous Halwai.">


<!-- End SEO Meta Tags for Home Page -->

<meta name="robots" content="index,follow,all"/>
<link rel="canonical" href="https://thefamoushalwai.com/"/>
<meta name="author" content="The Famous Halwai"/>
<meta name="copyright" content="Copyright © The Famous Halwai. All Rights Reserved." />
<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/css/swiper-bundle.min.css">
<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/css/style2.css">	
<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/css/responsive2.css">	
<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/inner/css/font-awesome.css" />
<link rel="icon" href="<?php echo SITE_URL;?>/static/images/tfh-32x32.png" sizes="32x32" />	
<script type="text/javascript">
    WebFontConfig = {
        google: { families: [ 'Poppins:300,400,500,600,700' ] }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>

<style type="text/css">
#fig-img {
    width: 21.25rem;
    height: 14.188rem;
}

#fig-img img {
    width: 100%;
    height: 100%;
}

/*.glob_lr {
    margin-top: -1.25rem;
}*/

.home_icons {
    background-image: linear-gradient(to right, rgb(253, 253, 251), rgb(253, 253, 251));
    z-index: 2;
    position: relative;
}

.features_bar {
    margin-top: -90px;
}

.features_bar img {
    width: 90px;
    height: 90px;
}


.grid-container {display: grid; grid-template-columns: auto auto auto;}
a.btn.btn-danger.v-btn {
    background: #07660d;
    b/*order-radius: 10px;*/
    line-height: 24px;
    font-size: 14px;
    border: none;
    color: #fff;
}

a.btn.btn-danger.v-btn:focus {
    box-shadow: none;
}

a.btn.btn-danger.v-btn:hover {
    text-decoration: none;
    background: #07660d;
    color: #fff;
}
.overlay {
    position: absolute;
    bottom: 0;
    left: 100%;
    right: 0;
    background-color: #fec907d1;
    overflow: hidden;
    width: 0;
    height: 100%;
    transition: .5s ease;
}

.overlay1 {
    position: absolute;
    bottom: 0;
    left: 0%;
    right: 0;
    background-color: #df0e0ed9;
    overflow: hidden;
    width: 0;
    height: 100%;
    transition: .5s ease;
}

.item:hover .overlay {
    width: 100%;
    left: 0;
    text-align: center;
}

.item:hover .overlay1 {
    width: 100%;
    left: 0;
    text-align: center
}

.item.gallery-pdg a {
    display: block;
    margin: 0;
    line-height: 0;
    padding: 15px;
    border-radius: 10px;
    /* height: 150px; */
}

.item.gallery-pdg {
    position: relative;
    overflow: hidden;
    margin-bottom: 0px;
    padding: 5px;
    border-radius: 10px;
}

.item:hover .overlay {
    width: 100%;
    left: 0;
    text-align: center;
}


.text {
    color: #fff;    
    position: absolute;
    top: 61%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    white-space: nowrap;    
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.text h6 {
    font-size: 30px;
    background: #ffffff9c;
    width: 100%;
    display: inline-block;
    margin: 0;
    color: #000;
}

.texth6 {
    font-size: 16px;
    
    width: 100%;
    display: inline-block;
    margin: 0;
    color: #555;
    font-weight: 600;
}
.texth6_price {
    font-size: 12px;
   
    width: 100%;
    display: inline-block;
    margin-top: 0.3rem;
    color: #555;
}

.textlocation{font-size: 14px; color: #6c757d; font-weight: 600;}

.item.tz-gallery .lightbox img {
    width: 100%;
    border-radius: 0;
    position: relative;
}

.cuisines_name{font-weight: 600; font-size: 16px;margin-bottom: 10px;color: #555;}

.model_screenshot_close {position: absolute;top: -9px;right: -9px;background: #e11f26!important;opacity: 1;width: 25px;height: 25px;border-radius: 25px;display: flex;align-items: center;justify-content: center;color: #fff;text-shadow: 0 0 #000;z-index: 1 }
 .modal-open .modal {backdrop-filter: blur(12px)}
.model_screenshot_close:hover {color: #fff;outline: 0 }
.video_popup { max-width: 900px; width: 100%; margin: auto;margin-top: 2rem}
.video_popup iframe {width: 100%;height: 540px}

@media  screen and (max-width:572px){
	.video_popup iframe{height: 290px}
    .video_popup{padding: 1rem;  }
}
</style>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-M27V7582ST"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-M27V7582ST');
</script>

</head>

<body>

		
	<div class="mobiletab position-relative">  
	<div class="wrapper_mb d-lg-none d-block">
	<div class="menu">
	<figure class="d-flex mb-0 pl-3 py-2"> <a class="" href="<?php echo SITE_URL;?>"> <img src="<?php echo SITE_URL;?>/frontEnd/images/logo.png" alt="Logo" width="45"></a>
	</figure>

    <?php
    /*
    $cartVal='0';
    if(!empty($_SESSION["cart_item"])) {
        $cartVal = count($_SESSION["cart_item"]);            
        $link = SITE_URL."/view_menu_cart.php";
    }
    else {        
       $link = SITE_URL."/our-menu.php?qtype=CustomizedPlate";
    }
    ?>
    <div class="homePageCart text-right">
    <a href="<?php echo $link?>">    
    <span class="homePageCart-head"><img src="<?php echo SITE_URL;?>/frontEnd/images/foodcart.jpg" alt="" width="15%" height="15%"></span>
    <span class="homePageCart-item">(<?php echo $cartVal;?>) </span>    
    </a>
    </div>
    <?php*/
    
    ?>
        

	<div class="hamburger_menu ml-auto">
	<span class="hamburger_icon"></span>
	</div>

	<div class="dd_wrap">
	<ul><!--- Mobile Menu-->        
		<!-- <li>
		<a href="<?php echo SITE_URL;?>/pages/about-our-company.php" class="a_parent">
		<div class="wrap">             
		<span class="text">About Our Company</span>
		</div>
		</a>

		<div class="dd_menu">
		<span class="back_btn"><svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13.6648L2.36078 7.52473L7.87419 1.29396L6.6753 -5.79044e-08L6.22957e-07 7.56593L6.83811 15L8 13.6648Z" fill="#E11F25"/></svg>Back to main menu</span>

		<p class="h3">Our Services</p>  
		<ul class="sub_menu" id="accordion">
		<li><a href=""> Events Catering</a>   </li>
		<li><a href=""> Parties Catering</a>   </li>
		<li><a href=""> Wedding Catering</a>   </li>
		</ul>
		</div>
		</li> -->

		<li>
		

        <div class="mobileMenuItems">
            <p class="mobileMenuItemOne">
                <a href="<?php echo SITE_URL;?>/services/continental-food.php" class="a_parent"><span> Occasion</span></a>
                <a href="<?php echo SITE_URL;?>/services/continental-food.php"><i class="fa fa-angle-double-right"></i></a>
            </p>
            <p class="mobileMenuItemOne">
                <a href="<?php echo SITE_URL;?>/choose_services.php?q=othservices" class="a_parent">
                <span>Our Services</span>
                <a href="<?php echo SITE_URL;?>/choose_services.php?q=othservices"><i class="fa fa-angle-double-right"></i></a>
                </a>
            </p>
            <p class="mobileMenuItemOne">
                <a href="<?php echo SITE_URL;?>/our-menu.php?qtype=CustomizedPlate" class="a_parent"><span>Customized Plate</span></a>
                <a href="<?php echo SITE_URL;?>/our-menu.php?qtype=CustomizedPlate"><i class="fa fa-angle-double-right"></i>
                </a>
            </p>
            <p class="mobileMenuItemOne">
                <a href="<?php echo SITE_URL;?>/enquiry.php?q=halwaichef" class="a_parent">
                <span>Book Halwai & Chefs</span></a>
                <a href="<?php echo SITE_URL;?>/enquiry.php?q=halwaichef"><i class="fa fa-angle-double-right"></i>
                </a>
            </p>
            <p class="mobileMenuItemOne">
                <a href="<?php echo SITE_URL;?>/pages/our-partners.php" class="a_parent">
                <span>Register as Partner</span></a>
                <a href="<?php echo SITE_URL;?>/pages/our-partners.php"><i class="fa fa-angle-double-right"></i>
                </a>
            </p>
        </div>
        </li>

	</ul>
	
	</div>
       <!-- Language Dropdown
<div id="languageSwitcher">
  <select id="langDropdown" onchange="doGTranslate(this.value)">
    <option value="en|en" selected>English</option>
    <option value="en|hi">हिंदी</option>
  </select>
</div> -->

<style>
#languageSwitcher {
  display: inline-block;
  margin: 10px;
}



.skiptranslate iframe {
  display: none !important;
}



#langDropdown {
  background: transparent;
  color: #000;
  border: 2px solid #d9d9d9;   /* border color changed */
  padding: 8px 40px 8px 20px;  /* right side extra padding for arrow */
  border-radius: 50px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  outline: none;
  appearance: none;            /* hide default arrow */
  -webkit-appearance: none;
  -moz-appearance: none;
  position: relative;
}

/* Custom dropdown arrow */
#langDropdown::after {
  content: "▼";
  font-size: 12px;
  color: #000;
  position: absolute;
  right: 15px;
  top: 50%;
  transform: translateY(-50%);
  pointer-events: none;
}









.page__banner {
    margin-top: 51px !important;
}
/* Google Translate tooltip completely hide */
#goog-gt-tt,
.goog-tooltip,
.goog-tooltip:hover,
.goog-text-highlight {
    display: none !important;
    visibility: hidden !important;
}

/* Extra frames bhi hide karna */
.goog-te-banner-frame.skiptranslate,
.goog-te-menu-frame.skiptranslate {
    display: none !important;
}

#langDropdown option {
  color: #000;
}
</style>

<!-- Hidden Google Translate -->
<div id="google_translate_element" style="display:none;"></div>
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement(
      {pageLanguage: 'en', includedLanguages: 'en,hi'},
      'google_translate_element'
    );
  }
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
function doGTranslate(lang_pair) {
  var lang = lang_pair.split('|')[1];
  var interval = setInterval(function() {
    var select = document.querySelector('select.goog-te-combo');
    if (select) {
      select.value = lang;
      select.dispatchEvent(new Event('change'));
      clearInterval(interval);
    }
  }, 500);
}
</script>
	</div>
	</div>
	</div>

	<nav class="navbar navbar-expand-lg glob_lr top_navbar desktop_menu homePage_header">  
   

        <div class="collapse navbar-collapse navigation_bar container-fluid" id="navbarSupportedContent">
    	  <a href="<?php echo SITE_URL;?>/"><img src="<?php echo SITE_URL;?>/frontEnd/images/logo.png" class="img-fluid logo" alt="logo" width="65"></a>
            <ul class="navbar-nav ml-auto menu_bar">		

          <li class="nav-item dropdown">
            <a class=" dropdown-toggle services_menu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Occasion<span class="arrow"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
              $services_qry = db_query("SELECT * FROM occasions_tbl WHERE display_status='Y' ORDER BY position ASC ");
    	      while($serArr = db_fetch_assoc($services_qry)) {	
    	      	?>
    	      	<a class="dropdown-item" href="<?php echo SITE_URL;?>/services/<?php echo $serArr['page_url']?>.php"> <?php echo $serArr['occasions_title']?></a>
    	      	<?php
    	      }
              ?>	
            </div>
          </li>
          
          	<li class="nav-item dropdown">
                <a class=" dropdown-toggle services_menu" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Services<span class="arrow"></span></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <ul style="list-style: none;">
                        <li class="listOne">
                        <a class="dropdown-item" href="https://www.thefamoushalwai.com/services/.php">Cater 
                        	<i class="fa fa-angle-right down-arrow1"></i> </a>
                            <ul class="dropdownOne">
                            	<li><a href="<?php echo SITE_URL;?>/our_packages.php">Our Packages</a></li>
                                <li><a href="<?php echo SITE_URL;?>/enquiry.php?q=ckitchen">Cloud Kitchen</a></li>
                                <li><a href="<?php echo SITE_URL;?>/bhaji.php">Bhaji</a></li>
                                <li><a href="<?php echo SITE_URL;?>/banquet_venue_inquiry.php">Venue</a></li>
                            </ul>
                        </li>
                        <li class="listOne">
                            <a class="dropdown-item" href="https://www.thefamoushalwai.com/services/.php">Halwai
                                <i class="fa fa-angle-right down-arrow2"></i>
                            </a>
                            <ul class="dropdownOne">
                                <li><a href="<?php echo SITE_URL;?>/enquiry.php?q=halwaichef">Chef & Halwai</a></li>
                                <li><a href="<?php echo SITE_URL;?>/bhaji.php">Bhaji</a></li>
                                <li><a href="<?php echo SITE_URL;?>/banquet_venue_inquiry.php">Venue</a></li>
                            </ul>
                        </li>
                       
                        <li class="listOne">
                            <a class="dropdown-item" href="https://www.thefamoushalwai.com/services/.php">Mom's Magic <i class="fa fa-angle-right down-arrow3"></i>
                            </a>
                            <ul class="dropdownOne">
                                <li><a href="<?php echo SITE_URL;?>/chutney_services.php">Chutney Services</a></li>
                                <li><a href="<?php echo SITE_URL;?>/pickle_achhar.php">Pickle / Achhar</a></li>
                                <li><a href="<?php echo SITE_URL;?>/tiffin-services.php">Tiffin Services</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
          

    		<li>
    		<a  href="<?php echo SITE_URL;?>/our-menu.php?qtype=CustomizedPlate">Customized Plate</a>
    		</li>

    		<li>
    		<a  href="<?php echo SITE_URL;?>/enquiry.php?q=halwaichef">Book Halwai & Chefs</a>
    		</li>	

    		<li>
    		<a href="<?php echo SITE_URL;?>/pages/our-partners.php">Register as Partner</a>
    		</li>

            <?php
            /*$cartVal='0';
            if(!empty($_SESSION["cart_item"])) {
                $cartVal = count($_SESSION["cart_item"]);            
                $link = SITE_URL."/view_menu_cart.php";
            }
            else {        
               $link = SITE_URL."/our-menu.php?qtype=CustomizedPlate";
            }*/
            ?>
            <!-- <li>
            <a href="<?php echo $link?>">
            <div class="homePageCart">
            <span class="homePageCart-head"><img src="<?php echo SITE_URL;?>/frontEnd/images/foodcart.jpg" alt="" width="100%" height="100%"></span>
            <span class="homePageCart-item">(<?php echo $cartVal;?>) </span>
            </div>
            </a>
            </li> -->
            
          	<!-- <li><a href="tel:+91-8926262674" class="call_brn mmob-btn" id="zoom-effect-btn"><img src="<?php echo SITE_URL;?>/frontEnd/images/call-icon.png" alt="" class="img-fluid"> +91-8926262674</a></li> -->
            <li><a href="<?php echo SITE_URL;?>/enquiry.php?q=halwaichef" class="call_brn mmob-btn" id="zoom-effect-btn"> Book Now</a></li>
            </ul>     
        </div>
        <!--<div id="google_translate_element"></div>-->
        
       <!-- Language Dropdown 
<div id="languageSwitcher">
  <select id="langDropdown" onchange="doGTranslate(this.value)">
    <option value="en|en" selected>English</option>
    <option value="en|hi">हिंदी</option>
  </select>
</div>-->

<style>
#languageSwitcher {
  display: inline-block;
  margin: 10px;
}

#langDropdown {
  background: transparent;
  color: #000;
  border: 2px solid #d9d9d9;   /* border color changed */
  padding: 8px 40px 8px 20px;  /* right side extra padding for arrow */
  border-radius: 50px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  outline: none;
  appearance: none;            /* hide default arrow */
  -webkit-appearance: none;
  -moz-appearance: none;
  position: relative;
}

#langDropdown option:checked {
  background-color: #f44336;  /* Red */
  color: #fff;                /* White text */
}
#langDropdown option:hover {
  background-color: #f44336;  /* Red */
  color: #fff;
}


/* Custom dropdown arrow */
#langDropdown::after {
  content: "▼";
  font-size: 12px;
  color: #000;
  position: absolute;
  right: 15px;
  top: 50%;
  transform: translateY(-50%);
  pointer-events: none;
}


.skiptranslate iframe {
  display: none !important;
}




.page__banner {
    margin-top: 51px !important;
}
/* Google Translate tooltip completely hide */
#goog-gt-tt,
.goog-tooltip,
.goog-tooltip:hover,
.goog-text-highlight {
    display: none !important;
    visibility: hidden !important;
}

/* Extra frames bhi hide karna */
.goog-te-banner-frame.skiptranslate,
.goog-te-menu-frame.skiptranslate {
    display: none !important;
}

#langDropdown option {
  color: #000;
}
</style>

<!-- Hidden Google Translate -->
<div id="google_translate_element" style="display:none;"></div>
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement(
      {pageLanguage: 'en', includedLanguages: 'en,hi'},
      'google_translate_element'
    );
  }
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
function doGTranslate(lang_pair) {
  var lang = lang_pair.split('|')[1];
  var interval = setInterval(function() {
    var select = document.querySelector('select.goog-te-combo');
    if (select) {
      select.value = lang;
      select.dispatchEvent(new Event('change'));
      clearInterval(interval);
    }
  }, 500);
}
</script>

        

    </nav>

	<!-- <div class="text-right"><a href="" style="margin-left: 20px;"><i class="fa fa-cart-plus"></i>(0)Cart</a></div> -->

	<header class="hero_banner_sec homeHero_banner">
	
	 <div class="swiper banner_slider">
          
   <div class="swiper-wrapper">
       
    <?php
    // Get images from DB in order of position
    $bannerImages = [];
    $banner_qry = db_query("SELECT * FROM homepage_banner WHERE status = 'Y' ORDER BY position ASC LIMIT 4");
    while($bannerArr = db_fetch_assoc($banner_qry)) {
        $bannerImages[] = $bannerArr['homepage_img'];
       $heading[] = $bannerArr['heading'];
       $shortText[] = $bannerArr['short_text'];
       $buttonName[] = $bannerArr['button_name'];   
        $buttonLink[] = $bannerArr['button_link'];
    }
    ?>

    <div class="swiper-slide slide glob_lr" style="background: url('<?php echo SITE_URL;?>/frontEnd/hpbanner/<?php echo $bannerImages[0]; ?>'); background-size: 100%; background-position: top right;">
        <div class="container-fluid">
            <div class="top_rating">
                <div class="d-flex rating align-items-center"><img src="<?php echo SITE_URL;?>/frontEnd/images/g-rating.png" alt="google"><span>Rating 4.5</span></div>
                <div class="d-flex rating align-items-center mt-2"><img src="<?php echo SITE_URL;?>/frontEnd/images/star.png" alt="google"><span>1440 Reviews</span></div>		  
            </div>
           <h1><?php echo  $heading[0]; ?></h1>
             <h2> <?php echo  $shortText[0]; ?> </h2>
            <p class="mt-5">
               <a class="booknow_btn" href="<?php echo $buttonLink[0]; ?>">
              <?php echo $buttonName[0]; ?> 
              <img src="<?php echo SITE_URL; ?>/frontEnd/images/arrow.png">
            </a>

            </p>		
        </div>
    </div>

    <div class="swiper-slide slide glob_lr" style="background: url('<?php echo SITE_URL;?>/frontEnd/hpbanner/<?php echo $bannerImages[1]; ?>'); background-size: 100%; background-position: top right;">
        <div class="container-fluid">
            <div class="top_rating">
                <div class="d-flex rating align-items-center"><img src="<?php echo SITE_URL;?>/frontEnd/images/g-rating.png" alt="google"><span>Rating 4.9</span></div>
                <div class="d-flex rating align-items-center mt-2"><img src="<?php echo SITE_URL;?>/frontEnd/images/star.png" alt="google"><span>1012 Reviews</span></div>
            </div>
            <h1><?php echo  $heading[1]; ?></h1>
    <h2> <?php echo  $shortText[1]; ?> </h2>
            <p class="mt-5">
                <a class="booknow_btn" href="<?php echo $buttonLink[1]; ?>">
                  <?php echo $buttonName[1]; ?>
                  <img src="<?php echo SITE_URL; ?>/frontEnd/images/arrow.png">
                </a>
            </p>
        </div>
    </div>

    <div class="swiper-slide slide glob_lr" style="background: url('<?php echo SITE_URL;?>/frontEnd/hpbanner/<?php echo $bannerImages[2]; ?>'); background-size: 100%; background-position: top right;">
        <div class="container-fluid">
            <div class="top_rating">
                <div class="d-flex rating align-items-center"><img src="<?php echo SITE_URL;?>/frontEnd/images/g-rating.png" alt="google"><span>Rating 4.9</span></div>
                <div class="d-flex rating align-items-center mt-2"><img src="<?php echo SITE_URL;?>/frontEnd/images/star.png" alt="google"><span>1012 Reviews</span></div>
            </div>
            <h1><?php echo  $heading[2]; ?></h1>
    <h2> <?php echo  $shortText[2]; ?> </h2>
            <p class="mt-5">
                    <a class="booknow_btn" href="<?php echo $buttonLink[2]; ?>">
                    <?php echo $buttonName[2]; ?>
                    <img src="<?php echo SITE_URL; ?>/frontEnd/images/arrow.png">
                    </a>
            </p>
        </div>
    </div>

    <div class="swiper-slide slide glob_lr" style="background: url('<?php echo SITE_URL;?>/frontEnd/hpbanner/<?php echo $bannerImages[3]; ?>'); background-size: 100%; background-position: top right;">
        <div class="container-fluid">
            <div class="top_rating">
                <div class="d-flex rating align-items-center"><img src="<?php echo SITE_URL;?>/frontEnd/images/g-rating.png" alt="google"><span>Rating 4.9</span></div>
                <div class="d-flex rating align-items-center mt-2"><img src="<?php echo SITE_URL;?>/frontEnd/images/star.png" alt="google"><span>1012 Reviews</span></div>
            </div>
            <h1><?php echo  $heading[3]; ?></h1>
            <h2> <?php echo  $shortText[3]; ?> </h2>
            <p class="mt-5">
                    <a class="booknow_btn" href="<?php echo $buttonLink[3]; ?>">
                    <?php echo $buttonName[3]; ?>
                    <img src="<?php echo SITE_URL; ?>/frontEnd/images/arrow.png">
                    </a>
            </p>
        </div>
    </div>
</div>
<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>

</div>
  
  


  
</header>

	
	<!--<ul class="features_bar mb-5  bg-light">		-->
	<!--	<li><a href="#UpcomingEvents"><img class="img-fluid" src="<?php echo SITE_URL;?>/frontEnd/pcategory/Event-Icon.png" alt="Upcoming Events" width="119" height="119"> <span>Upcoming Events</span></a></li>-->
	<!--	<li><a href="#Occasion"><img class="img-fluid" src="<?php echo SITE_URL;?>/frontEnd/pcategory/Occasion-Icon.png" alt="Occasion" width="119" height="119"> <span>Occasion</span></a></li>-->

	<!--	<li><a href="<?php echo SITE_URL;?>/our-menu.php"><img class="img-fluid" src="<?php echo SITE_URL;?>/frontEnd/pcategory/Menu-Icon.png" alt="Mom's Magic" width="119" height="119"> <span>Our Menu</span></a></li>-->

	<!--	<li><a href="#Cuisines"><img class="img-fluid" src="<?php echo SITE_URL;?>/frontEnd/pcategory/4.png" alt="Other Services" width="119" height="119"> <span>Cuisines</span></a></li>		-->
	<!--</ul>-->
	<br>
		
	<section class="glob_lr service_sec bg-light22" id="UpcomingEvents">
		<div class="">
	        <div class="text-head text-center">
	           <h2 class="glob_h">Hire us for  <span class="red-text">upcoming Events</span></h2>
	            <p class="glob_sh">We Ensure a seamless & joyful experience for you and your guests.<br>
			Chefs & servers ready to make your event unforgettable!</p>
	        </div>
	        <div class="container">
	            <div class="row">
	                <div class="grid-container tz-gallery">
	                	<?php			    		
			    		$event_qry = db_query("SELECT * FROM event_requirement WHERE display_status='Y' ORDER BY position ASC ");
				       	while($eventArr = db_fetch_assoc($event_qry)) {
				    		?>	                	
		                    <div class="best_services item gallery-pdg mb-3 occasionBox">
							<a href="<?php echo SITE_URL;?>/choose_services.php?q=othservices" class="occasionContent">
							<figure id="fig-img">	
							<img src="<?php echo SITE_URL;?>/frontEnd/event/<?php echo $eventArr['event_img']?>" class="img-fluid" alt="gallery" />
							</figure>
							<h6 class="texth6 text-center"><?php echo $eventArr['event_title']?></h6>
							</a>
		                    </div>
		                    <?php
		                }
		                ?>
	                </div>
	            </div>
	            <!-- <div class="col-md-12 text-center pt-4 pb-3">
	                <a href="<?php echo SITE_URL;?>/our-menu.php" class="btn btn-danger v-btn">Full View Menu </a>
	            </div> -->
	        </div>
	    </div>
	</section>


	
	<section class="text-center bg-light" id="Occasion">
		<div class="pt-5 pb-5">
	        <div class="text-head text-center">
	            <h2 class="glob_h">We provide you the best caterers on <span class="red-text">any Occasion</span></h2>
	            <p class="glob_sh">With The Famous Halwai you will find the best Professionals in the<br> area, whatever your need for any occasions.</p>
	        </div>
	        <div class="container">
	            <div class="row">
	                <div class="grid-container tz-gallery">
	                	<?php
			    		$ereq_qry = db_query("SELECT * FROM occasions_tbl WHERE display_status='Y' ORDER BY position ASC ");
				       	while($ereqArr = db_fetch_assoc($ereq_qry)) {
				    		?>	                	
		                    <div class="best_services item gallery-pdg mb-3 occasionBox">
		                    	<a href="<?php echo SITE_URL;?>/services/<?php echo $ereqArr['page_url']?>.php" class="occasionContent">
								<figure id="fig-img">	                    		
								<img src="<?php echo SITE_URL;?>/frontEnd/occasions/<?php echo $ereqArr['occasions_img']?>" class="img-fluid" alt="gallery" />
								</figure>
								<h6 class="texth6"><?php echo $ereqArr['occasions_title']?></h6>
								<h6 class="texth6_price">Starting: @<?php echo $ereqArr['starting_price']?> (INR)</h6>
								</a>		                            
		                    </div>		                    
		                    <?php
		                }
		                ?>	                   
	                </div>
	            </div>
	            <!-- <div class="col-md-12 text-center pt-4 pb-3">
	                <a href="<?php echo SITE_URL;?>/our-menu.php" class="btn btn-danger v-btn">Full View Menu </a>
	            </div> -->
	        </div>
	    </div>
	</section>
    <!--<section class="glob_lr">-->
    <!--    <div class="add_banner d-flex justify-content-center">			-->
    <!--        <img src="<?php echo SITE_URL;?>/frontEnd/images/Ad Banner.png" class="img-fluid" alt="">-->
    <!--    </div>-->
    <!--</section>	-->
	
<section class="glob_lr professionals_sec">
	<div class="container-fluid py-5 text-center">
		<h2 class="glob_h">We are <span class="red-text"> Top Rated</span> Professionals</h2>
		<p class="glob_sh">Well Trained, Verified & Checked Background</p>
		
		<div class="row mt-5">
		<?php
		$profjw_qry = db_query("SELECT * FROM prof_job_worker WHERE status='Y' order by rand() ASC LIMIt 0, 4");
			if(db_num_rows($profjw_qry)>0) {
				while($parr = db_fetch_assoc($profjw_qry)) {
				?> 
				<div class="col-lg-3 col-md-6">
				<div class="professionals_Wrapper">
				<a href="<?php echo SITE_URL;?>/professionals/<?php echo $parr['flname']?>.php">		
				<img src="<?php echo SITE_URL;?>/frontEnd/professional/<?php echo $parr['userimg']?>" 
				class="img-fluid" alt="" style="height:188px">
				</a>
					<!-- <h4 class="p_title">Pankaj Gairola</h4> -->
					<p class="p_dis  pt-2"><?php echo $parr['profession']?></p>
					
					<?php
					if($parr['rating']==5) {
						?>
						<img src="<?php echo SITE_URL;?>/frontEnd/images/sicon/rating_5.jpg" alt="" class="img-fluid">
						<?php	
					}
					else if($parr['rating']>4 && $parr['rating']<5) {
						?>
						<img src="<?php echo SITE_URL;?>/frontEnd/images/sicon/rating_4_5.jpg" alt="" class="img-fluid">
						<?php	
					}
					else if($parr['rating']==4) {
						?>
						<img src="<?php echo SITE_URL;?>/frontEnd/images/sicon/rating_4.jpg" alt="" class="img-fluid">
						<?php	
					}
					?>

					<span class="d-block pt-3">Rating: <?php echo $parr['rating']?></span>
				</div>				
				</div>
				<?php
			}
		}
		?>
		</div>
        
        <div class="col-md-12 text-center pt-4 pb-3">
        <a href="<?php echo SITE_URL;?>/top-rated-professionals.php" class="btn btn-danger v-btn">View All</a>
        </div>
	</div>
</section>

	<!--<section class="glob_lr discount_sec bg-light">-->
	<!--	<div class="container-fluid py-5 text-center">-->
	<!--		<h2 class="glob_h">Enjoy festive season with great <span class="red-text"> Discount Offers</span></h2>-->
	<!--		<p class="glob_sh">Upto 50% off on all our services.</p>-->
			
	<!--		<div class="row mt-5">-->
			 
	<!--		<div class="col-lg-3 col-md-6">-->
	<!--			<div class="discount_col_Wrapper">-->
	<!--			<img src="<?php echo SITE_URL;?>/frontEnd/images/discount1.png" class="img-fluid" alt="">-->
	<!--				<div class="overlay">-->
	<!--					<h4>40% Discount</h4>-->
	<!--					<span>on Cook Services</span>-->
	<!--					<p><a class="book_btn" href="">Book Now <img src="<?php echo SITE_URL;?>/frontEnd/images/arrow-c.png"></a></p>-->
	<!--				</div>-->
				
	<!--			</div>-->
				
	<!--			</div>-->
			
	<!--			<div class="col-lg-3 col-md-6">-->
	<!--			<div class="discount_col_Wrapper">-->
	<!--			<img src="<?php echo SITE_URL;?>/frontEnd/images/discount1.png" class="img-fluid" alt="">-->
	<!--				<div class="overlay">-->
	<!--					<h4>40% Discount</h4>-->
	<!--					<span>on Cook Services</span>-->
	<!--					<p><a class="book_btn" href="">Book Now <img src="<?php echo SITE_URL;?>/frontEnd/images/arrow-c.png"></a></p>-->
	<!--				</div>-->
				
	<!--			</div>-->
				
	<!--			</div>-->
	<!--			<div class="col-lg-3 col-md-6">-->
	<!--			<div class="discount_col_Wrapper">-->
	<!--			<img src="<?php echo SITE_URL;?>/frontEnd/images/discount2.png" class="img-fluid" alt="">-->
	<!--				<div class="overlay">-->
	<!--					<h4>35% Discount</h4>-->
	<!--					<span>on Waiter Services</span>-->
	<!--					<p><a class="book_btn" href="">Book Now <img src="<?php echo SITE_URL;?>/frontEnd/images/arrow-c.png"></a></p>-->
	<!--				</div>-->
				
	<!--			</div>-->
				
	<!--			</div>-->
	<!--			<div class="col-lg-3 col-md-6">-->
	<!--			<div class="discount_col_Wrapper">-->
	<!--			<img src="<?php echo SITE_URL;?>/frontEnd/images/discount4.png" class="img-fluid" alt="">-->
	<!--				<div class="overlay">-->
	<!--					<h4>30% Discount</h4>-->
	<!--					<span>on Bar Tender Services</span>-->
	<!--					<p><a class="book_btn" href="">Book Now <img src="<?php echo SITE_URL;?>/frontEnd/images/arrow-c.png"></a></p>-->
	<!--				</div>-->
				
	<!--			</div>				-->
	<!--			</div>	-->
	<!--		</div>		-->
	<!--	</div>	 -->
	
	<!--</section>-->


	<section class="text-center bg-light22"  id="Cuisines">
		<div class="pt-5 pb-5">
	        <div class="text-head text-center">
	            <h2 class="text-center">Worldwide Cuisines</h2>
	            <p>Select from 15+ menu and cuisines</p>
	        </div>
	        <div class="container">
	            <div class="row">
	                <div class="grid-container tz-gallery">
	                	<?php
			    		$cuisine_qry = db_query("SELECT * FROM event_cuisine WHERE display_status='Y' && slno!='9' ");
				       	while($cuisineArr = db_fetch_assoc($cuisine_qry)) {
				    		?>	                	
		                    <div class="best_services item gallery-pdg mb-3 occasionBox">		                    	
		                    	<a href="<?php echo SITE_URL;?>/our-menu.php"  class="occasionContent">
								<figure id="fig-img">	                    		
								<img src="<?php echo SITE_URL;?>/frontEnd/cuisine/<?php echo $cuisineArr['cuisine_img']?>" class="img-fluid" alt="gallery" />
								</figure>
								<h6 class="texth6"><?php echo $cuisineArr['cuisine_title']?></h6>
								<!-- <h6 class="texth6_price">Start: @799 (INR)</h6>  -->
								</a>		                            
		                    </div>		                    
		                    <?php
		                }
		                ?>	                   
	                </div>
	            </div>
	             <div class="col-md-12 text-center pt-4 pb-3">
	                <a href="<?php echo SITE_URL;?>/our-menu.php" class="btn btn-danger v-btn">Check Our Full Menu </a>
	            </div>
	        </div>
	    </div>
	</section>
			
<section class="step_sec glob_lr">
	<div class="container-fluid py-5">
		<div class="step_container border">
		<h2 class="glob_h ">We are Just 3 Steps away</h2>
			<p class="glob_sh red-text">Book any of our services in just 3 simple steps!</p>
			
			<div class="row pt-5 pb-lg-5">
			<div class="col-md-3 setps">
				<img src="<?php echo SITE_URL;?>/frontEnd/images/step1.png" class="img-fluid" alt="">
				<h4>Choose the Service</h4>
				<p>Choose what you need for your event.</p>
				
				</div>
				
			     <div class="col-md-3 setps mx-lg-5">
				<img src="<?php echo SITE_URL;?>/frontEnd/images/step2.png" class="img-fluid" alt="">
				<h4>Share your Needs</h4>
				<p>Let us know your preferences & needs</p>
				
				</div>
				
				
				<div class="col-md-3 setps">
				<img src="<?php echo SITE_URL;?>/frontEnd/images/step3.png" class="img-fluid" alt="">
				<h4>And its Done!</h4>
				<p>Sit back & relax! Our team will take care of the rest.</p>
				
				</div>
				
				<div class="call_alert_wrapper">
					
					<div class="call_top">
					<div class="call_text">Or Just <span>Call us</span></div>
						<img src="<?php echo SITE_URL;?>/frontEnd/images/3dcall.png" class="img-fluid call_3d" alt=""/>
					</div>
					<span class="bg_icon">@</span>
					
					<a class="bottom_call d-flex" href="tel:+91-8926262674">
						<span class="call_text">+91-8926262674</span>
						<span class="call_icon"><img src="<?php echo SITE_URL;?>/frontEnd/images/call-icon.png" class="img-fluid" width="16"></span>
					</a>				
				</div>
			
			</div>
		
		</div>
		
		</div>
	
</section>
	



<section class="glob_lr testimonial_sec">
	<div class="container-fluid py-5">
	<h2 class="glob_h text-center">More than <span class="red-text">10,000 Happy Customers</span></h2>
	<h3 class="glob_h text-center">Testimonials</h3>
	<p class="glob_sh text-center">With 99% Sucess Rate</p>
	<!--<ul class="nav testtmonial_nav mt-4">-->
	<!--<li> <a   data-toggle="tab" href="#testimonials"  class="active show"> Testimonials</a> </li>-->
	<!--<li> <a data-toggle="tab" href="#videoStory">Video Story</a></li>-->
	<!--</ul>-->
	<div class="tab-content pt-4 testimonial_col">

		<!-- <div id="testimonials" class="tab-pane fade active show">
			<div class="row">
			<div class="col-md-3 mt-lg-5">
			<img src="<?php echo SITE_URL;?>/frontEnd/images/quote.png" class="img-fluid left_quote">
			<p class="test_title">I literally, Love the Famous Halwai services that will leave your taste buds delighted and your heart satisfied.</p>
			</div>
			<div class="col-md-9 pl-3">
			<div class=" testimonial_tab f600" role="tablist">
			</div>

			<div class="swiper testimonial_swiper px-3">
			<div class="swiper-wrapper">
			<?php
			$testimonials_qry = db_query("SELECT * FROM site_testimonials WHERE display_status='Y' ");
			while($testimonialsArr = db_fetch_assoc($testimonials_qry)) {
			?>
			<div class="swiper-slide testimonial_wrapper ">
			<figure ><img src="<?php echo SITE_URL;?>/frontEnd/images/ch1.png" class="img-fluid" alt=""></figure>
			<img src="<?php echo SITE_URL;?>/frontEnd/images/aqute.png" class="img-fluid my-2">
			<p ><?php echo $testimonialsArr['review_text']?></p>
			<p class="pt-4"><strong><?php echo $testimonialsArr['reviewer_name']?></strong></p>
			</div>
			<?php
			}
			?>                 
			</div>
			<div class="swiper-pagination"></div>
			<div class="swiper-button-next"><img src="<?php echo SITE_URL;?>/frontEnd/images/pre-arrow.png"></div>
			<div class="swiper-button-prev"><img src="<?php echo SITE_URL;?>/frontEnd/images/pre-arrow.png"></div>
			</div>

			</div>
			</div>
		</div> -->

		
		<div id="testimonials" class="tab-pane fade active show">
			<div class="row">
				<div class="col-md-3 mt-lg-5">
				<div style="text-align: center;font-weight: 600;font-size: 25px;">4.9</div>
				
				<div class="mb-2 text-center"><img src="<?php echo SITE_URL;?>/frontEnd/images/sicon/rating_5.jpg"></div>		

				<p class="glob_sh mt-2 text-center">Google Overall Rating<br>
				The Famous Halwai -Caters,Chef, event planer, Halwai,cloud kitchen, ETC</p>
				<p class="test_title mt-2 text-center">155 Reviews</p>
				</div>

    			<div class="col-md-9 pl-3">				
        			<div class=" testimonial_tab f600" role="tablist"></div>	

                    <div class="swiper testimonial_swiper px-3">
                    <div class="swiper-wrapper">

                    <!-- <div class="taggbox" style="width:100%;height:100%" data-widget-id="150198" data-tags="false" ></div><script src="https://widget.taggbox.com/embed-lite.min.js" type="text/javascript"></script> -->

                    <div class="taggbox"  style="width:100%;height:100%" data-widget-id="151618" data-tags="false" ></div><script src="https://widget.taggbox.com/embed-lite.min.js" type="text/javascript"></script>

                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"><img src="<?php echo SITE_URL;?>/frontEnd/images/pre-arrow.png"></div>
                    <div class="swiper-button-prev"><img src="<?php echo SITE_URL;?>/frontEnd/images/pre-arrow.png"></div>
                    </div>    				
    			</div>
			</div>
		</div>
		
			
		<div id="videoStory" class="tab-pane fade ">
			<div class="row">
			<div class="col-md-3 mt-lg-5">
			<img src="<?php echo SITE_URL;?>/frontEnd/images/quote.png" class="img-fluid left_quote">
			<p class="test_title">I literally, Love the Famous Halwai services that will leave your taste buds delighted and your heart satisfied</p>
			</div>
			<div class="col-md-9 pl-3">
			<div class=" testimonial_tab f600" role="tablist">
			</div>
			<div class="swiper testimonial_swiper px-3">
			<div class="swiper-wrapper">
			<div class="swiper-slide testimonial_wrapper ">

			<a data-toggle="modal" data-target="#videoModal"> <img src="<?php echo SITE_URL;?>/frontEnd/images/video1.jpg" class="img-fluid rounded" alt=""></a>
			<p class="pt-4"><strong>John Paul</strong></p>
			</div>
			<div class="swiper-slide testimonial_wrapper ">

			<a data-toggle="modal" data-target="#videoModal"> <img src="<?php echo SITE_URL;?>/frontEnd/images/video2.jpg" class="img-fluid rounded" alt=""></a>
			<p class="pt-4"><strong>John Paul</strong></p>
			</div>
			<div class="swiper-slide testimonial_wrapper ">

			<a data-toggle="modal" data-target="#videoModal"> <img src="<?php echo SITE_URL;?>/frontEnd/images/video3.jpg" class="img-fluid rounded" alt=""></a>
			<p class="pt-4"><strong>John Paul</strong></p>
			</div>
			<div class="swiper-slide testimonial_wrapper ">

			<a data-toggle="modal" data-target="#videoModal"> <img src="<?php echo SITE_URL;?>/frontEnd/images/video1.jpg" class="img-fluid rounded" alt=""></a>
			<p class="pt-4"><strong>John Paul</strong></p>
			</div> 

			</div>
			<div class="swiper-pagination"></div>
			<div class="swiper-button-next"><img src="<?php echo SITE_URL;?>/frontEnd/images/pre-arrow.png"></div>
			<div class="swiper-button-prev"><img src="<?php echo SITE_URL;?>/frontEnd/images/pre-arrow.png"></div>
			</div>
			</div>
			</div>
		</div>			
	</div>
	</div>
</section>	

<!-- SERVING LOCATIONS START -->
<div class="serving-locations">
    <h3>We are Serving In</h3>
    <p>15+ Cities and counting</p>
    <div class="servingLocation-container">
        <?php
        $city_qry = db_query("SELECT * FROM services_city WHERE status='Y'");
        while($cityArr = db_fetch_assoc($city_qry)) {
            // Detail page link
            $cityLink = SITE_URL . "/city-detail.php?slno=" . $cityArr['slno'];
            ?> 
            <div class="location-div">
                <div class="image-div">
                    <a href="<?php echo $cityLink; ?>">
                        <?php if(!empty($cityArr['city_img'])) { ?>
                            <img src="<?php echo SITE_URL;?>/frontEnd/location/<?php echo $cityArr['city_img']; ?>" alt="<?php echo htmlspecialchars($cityArr['city_name']); ?>">
                        <?php } else { ?>
                            <img src="<?php echo SITE_URL;?>/frontEnd/images/NoImage.jpg" alt="No Image">
                        <?php } ?>
                    </a>
                </div>
                <p>
                    <a class="textlocation" href="<?php echo $cityLink; ?>">
                        <?php echo htmlspecialchars($cityArr['city_name']); ?>
                    </a>
                </p>
            </div>                                       
            <?php
        }
        ?>            
    </div>
</div>
<!-- SERVING LOCATIONS END -->


	
<section class="partner_sec glob_lr">
	<div class="container-fluid py-5">
	<div class="row justify-content-between align-items-center">
	<div class="col-md-6">
		<h2 class="glob_h">Register as a Partner</h2>
		<p>We work together to achieve success and foster mutual growth. Your journey to personal and professional development starts here. Let's grow together!</p>
		<div class="d-flex align-items-center partnersbtn">
			<a class="r_partners" href="<?php echo SITE_URL;?>/partner-register.php">Register <img src="<?php echo SITE_URL;?>/frontEnd/images/arrow.png" alt="" width="10"></a>
			<span class="px-3">Or Call</span>
			<a href="tel:+91-8926262674" class="call_brn"><img src="<?php echo SITE_URL;?>/frontEnd/images/call-icon-2.png" alt="" class="img-fluid"> +91 8926262674</a>		
		</div>
		</div>
		<div class="col-md-4"><img src="<?php echo SITE_URL;?>/frontEnd/images/partner.png" class="img-fluid" alt=""></div>		
		</div>
	
	</div>	
</section>
	

 	

<section class="glob_lr g_bg">
	<div class="container-fluid py-5 text-center">
	<h2 class="banner_glob_h mb-0">With The Famous Halwai you will find the best Professionals<br>
	in the area, whatever your need for your home.</h2>
	</div>
</section>
	
<section class="verify_sec glob_lr bg-white">
	<div class="container-fluid py-5">
	<div class="row">
	<div class="col-md-4 text-center">
	<img src="<?php echo SITE_URL;?>/frontEnd/images/check.png" class="img-fluid">
	<h4>Verified professionals</h4>
	<p>Service from trusted & verified partner<br> 
	with professional skills & experience.</p>
	</div>
	<div class="col-md-4 text-center">
	<img src="<?php echo SITE_URL;?>/frontEnd/images/check.png" class="img-fluid">
	<h4>Matched to your Needs</h4>
	<p>Avail service specific options<br>
	according to your needs.</p>
	</div>
	<div class="col-md-4 text-center">
	<img src="<?php echo SITE_URL;?>/frontEnd/images/check.png" class="img-fluid">
	<h4>Customer support</h4>
	<p>Support for every query<br>
	at every step.</p>
	</div>
	</div>
	</div>
</section>

<!-- BOOK NOW BUTTON START -->
<!-- <button class="book-btn book-btnInner"><a class="text-white" href="<?php echo SITE_URL;?>/enquiry.php">Book Now</a></button> -->
<!-- BOOK NOW BUTTON END -->
<?php 
$contactinfoArr = db_fetch_assoc(db_query("SELECT * FROM site_contactus WHERE 1=1")); 
?>	
<footer class="glob_lr footer">
	<div class="whatsapp d-flex"><!--  d-lg-none-->
	<a data-action="open" data-phone="918926262675" data-message="Hello! I am Business Manager" href="https://api.whatsapp.com/send?phone=918926262675&amp;text=Hello! I am looking a Halwai & Chefs?" target="_blank"><img src="<?php echo SITE_URL;?>/frontEnd/images/whatsapp.gif"></a>
	</div>	


	<div class="container-fluid py-3">
		<a class="d-inline-block" href=""><img src="<?php echo SITE_URL;?>/frontEnd/images/logo.png" class="img-fluid footer_logo" alt="" width="70"></a>
		
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
				</ul>
			
			</div>
			
			<div class="col-lg-3 col-md-6">
				<h5>For partners</h5>
				<ul class="footer_item">
			<!---	<li><a href="<?php echo SITE_URL;?>/pages/our-partners.php">Register as a Professional</a></li> -->
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
<style>

.hero_banner_sec .swiper-slide {
    height: 70vh; /* or fixed like 700px */
    position: relative;
}

    
    .swiper-button-next,
.swiper-button-prev {
    color: #000;
    font-size: 20px;
    width: 30px;
    height: 30px;
   
    border-radius: 50%; /* round arrows */
    display: flex;
    align-items: center;
    justify-content: center;
}


.skiptranslate iframe {
  display: none !important;
}

</style>
	
<script src="<?php echo SITE_URL;?>/frontEnd/js/jquery.min.js"></script>
<script src="<?php echo SITE_URL;?>/frontEnd/js/popper.min.js"></script>
<script src="<?php echo SITE_URL;?>/frontEnd/js/bootstrap.min.js"></script>
<script src="<?php echo SITE_URL;?>/frontEnd/js/swiper-bundle.min.js"></script>
<script src="<?php echo SITE_URL;?>/frontEnd/js/marquee.min.js"></script>
	
<script>
$(document).ready(function() {
  var isContentVisible = false;
    $('#toggleBtn').on('click', function(event) {
 	event.preventDefault();
     $('.loadmore_content').slideToggle();
      isContentVisible = !isContentVisible;
      var buttonText = isContentVisible ? 'Show Less' : 'Show More';
    $(this).text(buttonText);
  });
});
</script>
	
	
<script>

 $(document).ready(function() {
       
	  $('.left_move').marquee({
	    duration: 10000, // Duration of the marquee animation (milliseconds)
	    gap: 16, // Gap between repetitions (pixels)
	    duplicated: true, // Set to true to create an endless loop
	    startVisible: true, // Set to true to begin with content visible
	     direction: 'left',
	  }); 
	       
	       
	  $('.right_move').marquee({
	    duration: 10000, // Duration of the marquee animation (milliseconds)
	    gap:16, // Gap between repetitions (pixels)
	    duplicated: true, // Set to true to create an endless loop
	    startVisible: true, // Set to true to begin with content visible
	     direction: 'right',
	  });
	       
	       
	       
	});
</script>
	<script>
	
	 var swiper = new Swiper(".banner_slider", {
		 loop:true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
		    autoplay: {
    delay: 5000,
  },
    });
		
  var swiper = new Swiper(".testimonial_swiper", {
    slidesPerView: 3,
    spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
	  navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
	  breakpoints: {
       280: {
      slidesPerView: 1,
      spaceBetween: 20
    },
		  
		  
    768: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 20
    }
  },

  });
		
		
    var swiper = new Swiper(".event_swiper", {
      slidesPerView: 4,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: ".event_pagination",
        clickable: true,
      },
		navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
		breakpoints: {
       280: {
      slidesPerView: 1,
      spaceBetween: 20
    },
		  
		  
    768: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 20
    }
  },
    });	
		
	</script>
	
	
	<script>
	    
	   var swiper = new Swiper('.banner_slider', {
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});
 
	    
	    
	</script>
	
<!---------Mobile Menu Script------------->
 <script>
const humburger_menu = document.querySelector(".hamburger_menu");
const humburger_icon = document.querySelector(".hamburger_icon");
const humburger_body = document.querySelector("body");
const ddWrap = document.querySelector(".dd_wrap");
const a_preant = document.querySelectorAll(".a_parent");
const search_btn = document.querySelector(".search");
const searchwrape = document.querySelector(".searchwrape");

//const backBtn = document.querySelector(".back")
humburger_menu.addEventListener("click", function(){
  ddWrap.classList.toggle("active");
  humburger_icon.classList.toggle("show");
  humburger_body.classList.toggle("overflow-hidden");
  searchwrape.classList.remove("active")
})

a_preant.forEach(function(aitem){
  aitem.addEventListener("click", function(){   
    a_preant.forEach(function(aitem){
      aitem.classList.remove("active")
    })
    aitem.classList.toggle("active")
    const cbox = document.querySelectorAll(".back_btn");
    for (let i = 0; i < cbox.length; i++) {
    cbox[i].addEventListener("click", function() {
    //cbox[i].style.color = "white"
    aitem.classList.remove("active")
    });
    }
  })
});

const a_child = document.querySelectorAll(".a_child");
a_child.forEach(function(bitem){
  bitem.addEventListener("click", function(){
  a_child.forEach(function(bitem){
  bitem.classList.remove("active")
  })
  bitem.classList.toggle("active")
  })
}) 

search_btn.addEventListener("click", function(){
  searchwrape.classList.toggle("active");
    ddWrap.classList.remove("active");
     
})
</script> 
<!-------------Emd-------------------->

<!--<script type="text/javascript">-->
<!--function googleTranslateElementInit() {-->
<!--  new google.translate.TranslateElement(-->
<!--    {pageLanguage: 'en', includedLanguages: 'en,hi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE},-->
<!--    'google_translate_element'-->
<!--  );-->
<!--}-->
<!--</script>-->

<!--<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->

</body>
</html>