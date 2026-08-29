<?php
include('includes/inc.php');
$page_flname = $_REQUEST['file_name'];
if(!empty($page_flname)) {

	$flname1 = str_replace(".php", "", $page_flname);
	
	$flname = strtolower($flname1);

	$menu_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && flname = '".$flname."' ");
	if(db_num_rows($menu_qry)>0) {
		$pagesArr = db_fetch_assoc($menu_qry);
        $cuisineArr = db_fetch_assoc(db_query("SELECT * FROM event_cuisine WHERE slno=".$pagesArr['event_cuisine_slno']." "));

        $recipeArr = db_fetch_assoc(db_query("SELECT * FROM recipe_menu_item WHERE menu_item_tbl_slno ='".$pagesArr['slno']."' "));



		$metatitle 	  = $pagesArr['menu_name']." The Famouse Halwai"; 
		
		include('inner_header.php');			
		?>
		<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/css/profession.css">

         <!-- BANNER AREA -->
        <div class="bgImage"></div>
        <div class="banner-content">
            <div class="quick-links">
                <ul>
                   <!--  <li> <a href="#">Home</a> &nbsp;&nbsp;/ </li> -->
                    <li> <a class="text-white" href="<?php echo SITE_URL;?>/our-menu.php">Our Menu</a> &nbsp;&nbsp; / </li>
                    <li class="text-white"><?php echo ucwords(strtolower($pagesArr['menu_name']));?></li>
                </ul>
            </div>
            <h2 class="text-left"> <?php echo ucwords(strtolower($pagesArr['menu_name']));?>
             <span> <?php
            if($pagesArr['veg_type']=='Y') {
                ?>
                <img src="<?php echo SITE_URL;?>/frontEnd/images/non_veg_icon.png" width="20px" alt="non veg icon"> Non-Veg
                <?php
            }
            else {
                ?>                                            
                <img src="<?php echo SITE_URL;?>/frontEnd/images/veg_icon.png" width="20px" alt="veg icon"> Veg
                <?php
            }
            ?></span> </h2>
           <!--  <p><?php echo ucwords(strtolower($cuisineArr['cuisine_title']));?> Dish</p> -->

            <div class="banner-footer">
                <div>
                    <div class="locat-area">                       
                    <span><?php echo ucwords(strtolower($cuisineArr['cuisine_title']));?> Dish</span>
                    </div>
                    <button class="banner-button"><a class="text-white" href="<?php echo SITE_URL;?>/enquiry.php?q=halwaichef">Book Now</a></button>
                </div>

                <div class="banner-profile-img">
                    <?php                                       
                    if(!empty($pagesArr['menu_img'])) {
                        ?>
                        <img src="<?php echo SITE_URL;?>/frontEnd/menuimg/<?php echo $pagesArr['menu_img'];?>" style=" border-radius: 4px;">
                        <?php
                    }
                    else {
                        ?>
                        <img src="<?php echo SITE_URL;?>/frontEnd/images/NoImage.jpg" alt="" class="card-image" style=" border-radius: 4px;width: 100px;height: 50px;">
                        <?php
                    }
                    ?>
                    <!-- <img src="<?php echo SITE_URL;?>/frontEnd/professional/<?php echo $pagesArr['userimg']?>" alt=""> -->
                </div>
            </div>
        </div>

        <!-- BANNER AREA END -->

		<!-- main content start -->

        <section class="section-one">
             <div class="about-section-inner">               
                <div class="about-sectionRows">
                <div class="about-sectionRows_container">
                <div class="about-cards">
                <h3><?php echo ($recipeArr['plate_serve'])?($recipeArr['plate_serve']):('1')?></h3>
                <p>Plate Serves 3</p>
                </div>
                <div class="about-cards">
                <h3><?php echo ($recipeArr['pieces_per_plate'])?($recipeArr['pieces_per_plate']):('3')?></h3>
                <p>Pieces per plate</p>
                </div>
                <div class="about-cards">
                <h3><?php echo ($recipeArr['preparation_time'])?($recipeArr['preparation_time']):('60')?></h3>
                <p>Mins Preparation Time</p>
                </div>
                <div class="about-cards">
                <h3><?php echo ($recipeArr['cooking_time'])?($recipeArr['cooking_time']):('50')?></h3>
                <p>Mins Cooking Time</p>
                </div>
                </div>
                </div>
                
                <?php
                if(!empty($recipeArr['about_us_recipe'])) {
                    ?>
                    <div class="about-us-div" id="About">
                    <h3>About Recipe</h3>
                    <p><?php echo $recipeArr['about_us_recipe']?></p>
                    </div>
                    <?php
                }                
                $recipeKitsQry = db_query("SELECT * FROM recipe_appliances_kits WHERE type_kits='1' && kits_name!='' && recipe_menu_item_slno = '".$recipeArr['slno']."' ");
                if(db_num_rows($recipeKitsQry)>0) {
                    ?>
                    <div class="recipe-section">
                    <h3>Recipe</h3>
                    <div class="recipes-req">
                    <?php
                    while($recArr=db_fetch_assoc($recipeKitsQry)) {

                        if(!empty($recArr['kits_img'])) {                        
                            ?>
                            <div class="recipe-div">
                            <div class="recipe-imageDiv">
                            <img src="<?php echo SITE_URL;?>/frontEnd/recipeimage/<?php echo $recArr['kits_img']?>" width="100%" height="100%" alt="">
                            </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="recipe-div"><p><?php echo $recArr['kits_name']?></p></div>
                        <?php
                    }
                    ?>
                    </div>
                    </div>
                    <?php
                }
                
                $appliancesQry = db_query("SELECT * FROM recipe_appliances_kits WHERE type_kits='2' && kits_name!='' && recipe_menu_item_slno = '".$recipeArr['slno']."' ");
                if(db_num_rows($appliancesQry)>0) {
                    ?>
                    <div class="appliances-section">
                    <h3>Appliances Required</h3>
                    <div class="appliances-req">
                        <?php
                        while($appliancesArr=db_fetch_assoc($appliancesQry)) {

                        if(!empty($appliancesArr['kits_img'])) {
                            ?>
                            <div class="appliances-div">
                                <div class="appliances-imageDiv">
                                    <img src="<?php echo SITE_URL;?>/frontEnd/appliances/<?php echo $appliancesArr['kits_img']?>" width="100%" height="100%" alt="">
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="appliances-div"><p><?php echo $appliancesArr['kits_name']?></p></div>
                        <?php
                    }
                    ?>
                    </div>
                    </div>
                    <?php                    
                }
                ?>
            </div>
        </section>        
	
		<?php
		include('inner_footer.php');
		?>
        <script type="text/javascript">
        var ourChefcontainer = document.getElementById('ourChefcontainer')
        var chefslider = document.getElementById('chefslider');
        var slides = document.getElementsByClassName('chefSlide').length;
        var buttons = document.getElementsByClassName('slide_btn');

        var currentPosition = 0;
        var currentMargin = 0;
        var slidesPerPage = 0;
        var slidesCount = slides - slidesPerPage;
        var containerWidth = ourChefcontainer.offsetWidth;
        var prevKeyActive = false;
        var nextKeyActive = true;

        window.addEventListener("resize", checkWidth);

        function checkWidth() {
            containerWidth = container.offsetWidth;
            setParams(containerWidth);
        }

        function setParams(w) {
            if (w < 551) {
                slidesPerPage = 1;
            } else {
                if (w < 901) {
                    slidesPerPage = 2;
                } else {
                    if (w < 1101) {
                        slidesPerPage = 3;
                    } else {
                        slidesPerPage = 4;
                    }
                }
            }
            slidesCount = slides - slidesPerPage;
            if (currentPosition > slidesCount) {
                currentPosition -= slidesPerPage;
            };
            currentMargin = - currentPosition * (100 / slidesPerPage);
            chefslider.style.marginLeft = currentMargin + '%';
            if (currentPosition > 0) {
                buttons[0].classList.remove('inactive');
            }
            if (currentPosition < slidesCount) {
                buttons[1].classList.remove('inactive');
            }
            if (currentPosition >= slidesCount) {
                buttons[1].classList.add('inactive');
            }
        }

        setParams();

        function slideRight() {
            if (currentPosition != 0) {
                chefslider.style.marginLeft = currentMargin + (100 / slidesPerPage) + '%';
                currentMargin += (100 / slidesPerPage);
                currentPosition--;
            };
            if (currentPosition === 0) {
                buttons[0].classList.add('inactive');
            }
            if (currentPosition < slidesCount) {
                buttons[1].classList.remove('inactive');
            }
        };

        function slideLeft() {
            if (currentPosition != slidesCount) {
                chefslider.style.marginLeft = currentMargin - (100 / slidesPerPage) + '%';
                currentMargin -= (100 / slidesPerPage);
                currentPosition++;
            };
            if (currentPosition == slidesCount) {
                buttons[1].classList.add('inactive');
            }
            if (currentPosition > 0) {
                buttons[0].classList.remove('inactive');
            }
        };    
        </script>
		</body>	
		</html>
		<?php
	}		
	else {
		header("Location:".SITE_URL);
		exit;
	}
}
else {
	header("Location:".SITE_URL);
	exit;
}
?>	
	