<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE, chrome=1" />

<title><?php echo $metatitle?></title>
<meta name="description" content="<?php echo $metaDesc?>" />
<meta name="keywords" content="<?php echo $metaKeywords?>" />



<meta name="robots" content="index,follow,all"/>
<link rel="canonical" href="<?php echo SITE_URL;?>/<?php echo $_SERVER['REQUEST_URI']?>"/>
<meta name="author" content="The Famous Halwai"/>
<meta name="copyright" content="Copyright © The Famous Halwai. All Rights Reserved." />
<!--jcostyle-->
<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/inner/css/halwai.css" />

<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/css/style2.css">
<!--jcostyle-->
<!--bootstrapcssstart-->
<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/inner/css/bootstrap.css" />
<!--bootstrapcssend-->
<!--fontawesomestart-->
<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/inner/css/font-awesome.css" />
<!--jcostyle-->
<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/inner/css/halwai-responsive.css" />

  <link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/inner/css/multiPick.css">

<!-- <link href="https://fonts.cdnfonts.com/css/trebuchet-ms-2" rel="stylesheet"> -->

<!--jcostyle-->
<!--fontawesomestart-->
<!-- <link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/inner/css/slider-anmation.css" /> -->
<!--owlcarousel-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="icon" href="<?php echo SITE_URL;?>/static/images/tfh-32x32.png" sizes="32x32" />
<!--owlcarousel-->
<!-- <link rel="stylesheet" href="slick/css/slick.css" />
<link rel="stylesheet" href="slick/css/slick-theme.css.css" /> -->
</head>
<body>
<div class="main">
<!--navbar-start-->
<div class="header_parent">
<header id="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="logo jco-d">
                    <a href="<?php echo SITE_URL;?>"> <img src="<?php echo SITE_URL;?>/frontEnd/images/logo.png" class="img-fluid logo" alt="logo" width="65" /></a>
                    <!-- <a href="<?php echo SITE_URL;?>/">
                        <img src="<?php echo SITE_URL;?>/frontEnd/images/logo2.png" class="img-fluid sticky-logo" alt="logo2" />
                    </a> -->
                </div>
            </div>
            <div class="col-md-10 col-12 d-flex justify-content-center align-items-center">
                <nav class="navbar navbar-expand-md nav-top navbar-light">
                    <!-- <a class="navbar-brand jco-m" href="#">
                        <img src="img/logo.png"class="img-fluid"alt="logo">
                        <img src="img/logo2.png"class="img-fluid d-none"alt="logo2">
                    </a> -->
                    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                    </button> -->

                    <div class="mobileHeader">
                    <figure class="d-flex  mb-0 pl-3 py-2" id="mobile-logo"> <a class="" href="<?php echo SITE_URL;?>/"> <img src="<?php echo SITE_URL;?>/frontEnd/images/logo.png" alt="Logo" width="45"></a>
                    </figure>
                
            <!-- Language Dropdown -->


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
</script>                      <!-- Custom Buttons -->

                
                    <?php
                    $currPage = basename($_SERVER['REQUEST_URI']);
                    if(stristr($currPage, 'our-menu.php') || $currPage=='view_menu_cart.php') {
                        $cartVal='0';
                        if(!empty($_SESSION["cart_item"])) {
                            $cartVal = count($_SESSION["cart_item"]);
                            
                            if($currPage=='our-menu.php') {
                                ?>
                                <a class="ViewCart">
                                <?php
                            }
                            else {
                                $link = SITE_URL."/view_menu_cart.php";  
                                ?>
                                <a href="<?php echo $link?>">
                                <?php
                            }
                            ?> 
                            <div class="homePageCart text-right  d-lg-none">
                            <span class="homePageCart-head"><img src="<?php echo SITE_URL;?>/frontEnd/images/foodcart.jpg" alt="" width="15%" height="15%"></span>
                            <span class="homePageCart-item">(<?php echo $cartVal;?>) </span>
                            </a>
                            </div>
                            </a>                            
                            <?php
                        }
                        else {
                            $link = SITE_URL."/our-menu.php?qtype=CustomizedPlate";
                            ?>
                            <div class="homePageCart text-right d-lg-none">
                            <a href="<?php echo $link?>">     
                            <span class="homePageCart-head"><img src="<?php echo SITE_URL;?>/frontEnd/images/foodcart.jpg" alt="" width="15%" height="15%"></span>
                            <span class="homePageCart-item">(<?php echo $cartVal;?>) </span>
                             </a>
                            </div>                            
                            <?php
                        }
                    }
                    ?>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span>
                    </button>
                </div>


                    <div class="collapse navbar-collapse" id="collapsibleNavbar">

                        <div class="mobileMenuItems">
                            <p class="mobileMenuItemOne">
                                <a href="<?php echo SITE_URL;?>/services/continental-food.php" class="a_parent"><span> Occasion</span></a>
                                <a href="<?php echo SITE_URL;?>/services/continental-food.php" class="a_parent"><i class="fa fa-angle-double-right"></i></a>
                            </p>
                            <p class="mobileMenuItemOne">
                                <a href="<?php echo SITE_URL;?>/choose_services.php?q=othservices" class="a_parent"><span>Our Services</span></a>
                                <a href="<?php echo SITE_URL;?>/choose_services.php?q=othservices"><i class="fa fa-angle-double-right"></i></a>
                            </p>
                            <p class="mobileMenuItemOne">
                                 <a href="<?php echo SITE_URL;?>/our-menu.php?qtype=CustomizedPlate" class="a_parent"><span>Customized Plate</span></a>
                                 <a href="<?php echo SITE_URL;?>/our-menu.php?qtype=CustomizedPlate" class="a_parent"><i class="fa fa-angle-double-right"></i></a>
                            </p>
                            <p class="mobileMenuItemOne">
                               <a href="<?php echo SITE_URL;?>/enquiry.php?q=halwaichef" class="a_parent"> <span>Book Halwai & Chefs</span></a>
                                <a href="<?php echo SITE_URL;?>/enquiry.php?q=halwaichef"><i class="fa fa-angle-double-right"></i></a>
                            </p>
                            <p class="mobileMenuItemOne">
                                <a href="<?php echo SITE_URL;?>/pages/our-partners.php" class="a_parent"><span>Register as Partner</span></a>
                                <a href="<?php echo SITE_URL;?>/pages/our-partners.php" class="a_parent"><i class="fa fa-angle-double-right"></i></a>
                            </p>
                        </div>

                        <ul class="navbar-nav nav-color header-Inner-content header_width">
                            
                           <!--  <div class="header-Inner-content"> -->
                            <?php
                            $services_qry = db_query("SELECT * FROM occasions_tbl WHERE display_status='Y' ORDER BY Rand(), position ASC LIMIT 0, 15 ");        
                            if(db_num_rows($services_qry)>0) {                                
                                ?>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Occasion</a>
                                <ul class="dropdown-menu">
                                    <?php
                                    while($serArr = db_fetch_assoc($services_qry)) {
                                        ?>
                                        <li><a class="dropdown-item" href="<?php echo SITE_URL;?>/services/<?php echo $serArr['page_url']?>.php"> <?php echo ucwords(strtolower($serArr['occasions_title']));?></a></li>
                                        <?php
                                    }
                                    ?>                                    
                                </ul>
                                </li>                           
                                <?php
                            }
                            ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle services_menu" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Our Services</a>
                                <div class="dropdown-menu dropdownMenu-items" aria-labelledby="navbarDropdown">
                                    <ul style="list-style: none;">
                                        <li class="listOne">
                                            <a class="dropdown-item dropdownTitle" href="#"><span>Cater</span>
                                                <i class="fa fa-angle-right down-arrow1 pr-3"></i> </a>
                                            <ul class="nestedDropdown">
                                                <li><a href="<?php echo SITE_URL;?>/our_packages.php">Our
                                                        Packages</a></li>
                                                <li><a href="<?php echo SITE_URL;?>/enquiry.php?q=ckitchen">Cloud Kitchen</a></li>
                                                <li><a href="<?php echo SITE_URL;?>/bhaji.php">Bhaji</a>
                                                </li>
                                                <li><a href="<?php echo SITE_URL;?>/banquet_venue_inquiry.php">Venue</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="listOne">
                                            <a class="dropdown-item dropdownTitle" href="#"><span>Halwai</span>
                                                <i class="fa fa-angle-right down-arrow2 pr-3"></i>
                                            </a>
                                            <ul class="nestedDropdown">
                                                <li><a href="<?php echo SITE_URL;?>/enquiry.php?q=halwaichef">Chef & Halwai</a></li>
                                                <li><a href="<?php echo SITE_URL;?>/bhaji.php">Bhaji</a>
                                                </li>
                                                <li><a href="<?php echo SITE_URL;?>/banquet_venue_inquiry.php">Venue</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="listOne">
                                            <a class="dropdown-item dropdownTitle" href="#"><span>Mom's Magic</span> <i class="fa fa-angle-right down-arrow3 pr-3"></i>
                                            </a>
                                            <ul class="nestedDropdown">
                                                <li><a href="<?php echo SITE_URL;?>/chutney_services.php">Chutney Services</a></li>
                                                <li><a href="<?php echo SITE_URL;?>/pickle_achhar.php">Pickle / Achhar</a></li>
                                                <li><a href="<?php echo SITE_URL;?>/tiffin-services.php">Tiffin Services</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                         

                            <li class="nav-item"><a class="nav-link" href="<?php echo SITE_URL;?>/our-menu.php?qtype=CustomizedPlate">Customized Plate</a></li>
                            
                            <li class="nav-item"><a class="nav-link" href="<?php echo SITE_URL;?>/enquiry.php?q=halwaichef">Book Halwai & Chefs</a></li> 

                            <!-- <li class="nav-item"><a class="nav-link" href="<?php echo SITE_URL;?>/testimonials.php">Testimonials</a></li> -->

                            <li class="nav-item"><a class="nav-link" href="<?php echo SITE_URL;?>/pages/our-partners.php">Register as Partner</a></li>

                            <?php
                            $currPage = basename($_SERVER['REQUEST_URI']);
                            if(stristr($currPage, 'our-menu.php') || $currPage=='view_menu_cart.php') {
                                $cartVal='0';
                                if(!empty($_SESSION["cart_item"])) {
                                    $cartVal = count($_SESSION["cart_item"]);
                                    ?>
                                    <li class="nav-item">
                                    <?php
                                    if($currPage=='our-menu.php') {
                                        ?>
                                        <a class="nav-link ViewCart">
                                        <?php
                                    }
                                    else {
                                        $link = SITE_URL."/view_menu_cart.php";  
                                        ?>
                                        <a href="<?php echo $link?>" class="nav-link">
                                        <?php
                                    }
                                    ?>                                    
                                    <div class="homePageCart">
                                    <span class="homePageCart-head"><img src="<?php echo SITE_URL;?>/frontEnd/images/foodcart.jpg" alt="" width="100%" height="100%"></span>
                                    <span class="homePageCart-item">(<?php echo $cartVal;?>) </span>
                                    </div>
                                    </a>
                                    </li>
                                    <?php
                                }
                                else {
                                    $link = SITE_URL."/our-menu.php?qtype=CustomizedPlate";
                                    ?>
                                    <li class="nav-item">
                                    <a href="<?php echo $link?>" class="nav-link ViewCart">
                                    <div class="homePageCart">
                                    <span class="homePageCart-head"><img src="<?php echo SITE_URL;?>/frontEnd/images/foodcart.jpg" alt="" width="100%" height="100%"></span>
                                    <span class="homePageCart-item">(<?php echo $cartVal;?>) </span>
                                    </div>
                                    </a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>

                            <!-- </div> -->
                        </ul>

                        <?php
                        if(!stristr($currPage, 'our-menu.php') && $currPage!='view_menu_cart.php') {
                            ?>
                            <div class="col-md-2 col-12 d-flex flex-row bookbtn" style=" align-items: center; justify-content: center; margin-top: 0px !important;">
                            <ul class="navbar-nav right-nav">
                            <li class="nav-item support_btn"><a href="<?php echo SITE_URL;?>/enquiry.php?q=halwaichef"><span class="ffmont position-relative">Book Now</span></a></li>
                            </ul>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                        
                 
         <!-- Language Dropdown -->


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
</script>      <!-- Custom Buttons -->

                </nav>
            </div>

            <!-- <div class="col-md-2 col-12 d-flex flex-row bookbtn">
                <ul class="navbar-nav right-nav">
                    <li class="nav-item support_btn"><a href="<?php echo SITE_URL;?>/enquiry.php"><span class="ffmont position-relative">Book Now</span></a></li>
                </ul>
            </div>  -->
        </div>
    </div>
    
    <style>.mobileHeader {
    display: none;
}
/* By default visible */
.desktopLang {
    display: block;
}

/* Mobile view (767px and below) me hide */
@media (max-width: 767px) {
    .desktopLang {
        display: none !important;
    }
}


</style>
</header>
</div>