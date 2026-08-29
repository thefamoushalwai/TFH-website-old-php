<?php
include('includes/inc.php');
$page_flname = $_REQUEST['file_name'];
if(!empty($page_flname)) {

	$flname1 = str_replace(".php", "", $page_flname);
	
	$flname = strtolower($flname1);

	$prof_qry = db_query("SELECT * FROM prof_job_worker WHERE status='Y' && flname = '".$flname."' ");
	if(db_num_rows($prof_qry)>0) {
		$pagesArr = db_fetch_assoc($prof_qry);
		$metatitle 	  = $pagesArr['contact_name']." The Famouse Halwai"; 
		
		include('inner_header.php');			
		?>
		<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/css/profession.css">

         <!-- BANNER AREA -->
        <div class="bgImage"></div>
        <div class="banner-content">
            <!-- <div class="quick-links">
                <ul>
                    <li> <a href="#">Home</a> &nbsp;&nbsp;/ </li>
                    <li> <a href="#">Cooks & Chefs</a> &nbsp;&nbsp; / </li>
                    <li><a href="#">Pankaj </a></li>
                </ul>
            </div> -->

            <h2> <?php echo ucwords(strtolower($pagesArr['profession']));?> <?php echo ucwords(strtolower($pagesArr['contact_name']));?> <span> <i class="fa fa-check-circle"></i> Verified</span> </h2>
            <p><?php echo ucwords(strtolower($pagesArr['special_keyword']));?>
            </p>

            <div class="banner-footer">
                <div>
                    <div class="locat-area">
                        <i class="fa fa-map-marker"></i>
                        <span><?php echo $pagesArr['city']?></span>
                        <!-- <i class="fa fa-heart"></i><i class="fa fa-share-alt"></i> -->
                    </div>
                    <button class="banner-button"><i class="fa fa-volume-control-phone"></i><a href="tel:+918926262674">Call to Book</a></button>
                </div>

                <div class="banner-profile-img">
                    <img src="<?php echo SITE_URL;?>/frontEnd/professional/<?php echo $pagesArr['userimg']?>" alt="">
                </div>
            </div>
        </div>

        <!-- BANNER AREA END -->

		<!-- main content start -->

        <section class="section-one">           
                <div class="about-sec-links">
                <div><a href="#About">About</a></div>
                <div><a href="#Ratings">Ratings</a></div>
                <div><a href="#Reviews">Reviews</a></div>
                <div><a href="#PersonalInfo">Personal Information</a></div>
                <div><a href="#Experience">Work Experience</a></div>
                <!-- <div>Images</div> -->
                </div>

                <div class="about-sectionRows">
                <div class="about-sectionRows_container">
                <div class="about-cards">
                <h3><?php echo $pagesArr['experience']?>+</h3>
                <p>Years of Experience</p>
                </div>
                <div class="about-cards">
                <h3><?php echo $pagesArr['rating']?></h3>
                <p>Average Rating</p>
                </div>
                <div class="about-cards">
                <h3><?php echo $pagesArr['total_bookings']?>+</h3>
                <p>Bookings Completed</p>
                </div>
                <div class="about-cards">
                <h3>12</h3>
                <p>Followers</p>
                </div>
                </div>
                </div>

                

                <div class="about-us-div" id="About">
                    <h3>About</h3>
                    <p><?php echo $pagesArr['about_us']?></p>
                </div>

                <div class="our-awards">
                    <h3>Awards</h3>
                    <div class="awards-content">
                        <div>
                            <img src="<?php echo SITE_URL;?>/frontEnd/profession/images/cup.png" alt="">
                            <p>Tandoor Specialist</p>
                        </div>

                        <div>
                            <img src="<?php echo SITE_URL;?>/frontEnd/profession/images/cup.png" alt="">
                            <p>Punctual Person</p>
                        </div>
                        <div>
                            <img src="<?php echo SITE_URL;?>/frontEnd/profession/images/cup.png" alt="">
                            <p>Very Polite</p>
                        </div>
                        <div>
                            <img src="<?php echo SITE_URL;?>/frontEnd/profession/images/cup.png" alt="">
                            <p>Speedy Service</p>
                        </div>
                    </div>
                </div>

                <div class="our-ratings" id="Ratings">
                    <h3>Ratings <span> (based on <?php echo $pagesArr['rating']?> ratings)</span> </h3>
                    <div class="our-ratings-div">
                        <div class="rating_bar">

                            <div class="bar">
                                <h4>5</h4>
                                <i class="fa fa-star"></i>
                                <span class="span-one">204</span>
                            </div>
                        </div>
                        <div class="rating_bar">

                            <div class="bar">
                                <h4>4</h4>
                                <i class="fa fa-star"></i>
                                <span class="span-two"> 54</span>
                            </div>
                        </div>
                        <div class="rating_bar">

                            <div class="bar">
                                <h4>3</h4>
                                <i class="fa fa-star"></i>
                                <span class="span-three"> 15</span>
                            </div>
                        </div>
                        <div class="rating_bar">

                            <div class="bar">
                                <h4>2</h4>
                                <i class="fa fa-star"></i>
                                <span class="span-four"> 8</span>
                            </div>
                        </div>
                        <div class="rating_bar">

                            <div class="bar">
                                <h4>1</h4>
                                <i class="fa fa-star"></i>
                                <span class="span-five">12</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="our-personal-information" id="PersonalInfo">
                    <h3>Personal Information</h3>
                    <div class="personal-info-content">
                        <?php
                        $personalQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$pagesArr['slno']."' && work_type='1' ");
                        while($personalArr=db_fetch_assoc($personalQry)) {
                            ?>    
                            <div><i class="fa fa-check"></i>
                            <span><?php echo $personalArr['worker_title']?></span>
                            </div>
                            <?php
                        }
                        ?>                        
                    </div>
                </div>

                <div class="book-our-chef">
                    <h3> Book <?php echo ucwords(strtolower($pagesArr['profession']));?> <?php echo ucwords(strtolower($pagesArr['contact_name']));?> for</h3>
                    <div class="book-chef-container">
                        <div class="book-chef-content">
                            <div class="book-chef-cards">
                                <div class="chef_icons">
                                    <img src="<?php echo SITE_URL;?>/frontEnd/profession/images/icons/asset 3.png" alt="" width="100%" height="100%">
                                </div>
                                <p>Personal Chef</p>
                            </div>
                            <div class="book-chef-cards">
                                <div class="chef_icons">
                                    <img src="<?php echo SITE_URL;?>/frontEnd/profession/images/icons/asset 4.png" alt="" width="100%" height="100%">
                                </div>
                                <p>Catering</p>
                            </div>
                            <div class="book-chef-cards">
                                <div class="chef_icons">
                                    <img src="<?php echo SITE_URL;?>/frontEnd/profession/images/icons/asset 5.png" alt="" width="100%" height="100%">
                                </div>
                                <p>Full Time Chef</p>
                            </div>
                            <div class="book-chef-cards">
                                <div class="chef_icons">
                                    <img src="<?php echo SITE_URL;?>/frontEnd/profession/images/icons/asset 6.png" alt="" width="100%" height="100%">
                                </div>
                                <p>Vacation Chef</p>
                            </div>
                            <div class="book-chef-cards">
                                <div class="chef_icons">
                                    <img src="<?php echo SITE_URL;?>/frontEnd/profession/images/icons/asset 7.png" alt="" width="100%" height="100%">
                                </div>
                                <p>Daily Chef</p>
                            </div>
                            <div class="book-chef-cards">
                                <div class="chef_icons">
                                    <img src="<?php echo SITE_URL;?>/frontEnd/profession/images/icons/asset 8.png" alt="" width="100%" height="100%">
                                </div>
                                <p>Cooking Classes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="our-work-experience" id="Experience">
                    <h3>Work Experience</h3>
                    <div class="work-experience-container">
                        <?php
                        $expQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$pagesArr['slno']."' && work_type='2' ");
                        while($expArr=db_fetch_assoc($expQry)) {
                            ?>    
                            <div class="work-experience-content"><i class="fa fa-check"></i>
                            <span><?php echo $expArr['worker_title']?></span>
                            </div>
                            <?php
                        }
                        ?>                      

                    </div>
                </div>

            <div class="our-chef-knows">
                <h3><?php echo ucwords(strtolower($pagesArr['profession']));?> <?php echo ucwords(strtolower($pagesArr['contact_name']));?> has worked at</h3>
                <div id="ourChefcontainer">
                    <div id="chef-slider-container">
                        <span onclick="slideRight()" class="slide_btn"></span>
                        <div id="chefslider">  
                            <?php
                            $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$pagesArr['slno']."' && work_type='3' ");
                            while($recipeArr=db_fetch_assoc($recipeKitsQry)) {
                                ?>
                                <div class="chefSlide"><span><img
                                src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr['workproimg']?>"
                                alt="">
                                <h4 class="chefSlide-text"><?php echo $recipeArr['worker_title']?></h4>
                                </span></div>
                                <?php
                            }
                            ?>
                        </div>
                        <span onclick="slideLeft()" class="slide_btn"></span>
                    </div>
                </div>
            </div>

            <div class="our-chef-knows">
                <h3><?php echo ucwords(strtolower($pagesArr['profession']));?> <?php echo ucwords(strtolower($pagesArr['contact_name']));?> knows these Cuisines</h3>
                <div id="ourChefcontainer">
                    <div id="chef-slider-container">
                        <span onclick="slideRight()" class="slide_btn"></span>
                        <div id="chefslider">  
                            <?php
                            $recipeKitsQry1 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$pagesArr['slno']."' && work_type='4' ");
                            while($recipeArr1=db_fetch_assoc($recipeKitsQry1)) {
                                ?>
                                <div class="chefSlide"><span><img
                                src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr1['workproimg']?>"
                                alt="">
                                <h4 class="chefSlide-text"><?php echo $recipeArr1['worker_title']?></h4>
                                </span></div>
                                <?php
                            }
                            ?>
                        </div>
                        <span onclick="slideLeft()" class="slide_btn"></span>
                    </div>
                </div>
            </div>

            <div class="our-chef-knows">
                <h3>North Indian Dishes by <?php echo ucwords(strtolower($pagesArr['profession']));?> <?php echo ucwords(strtolower($pagesArr['contact_name']));?></h3>
                <div id="ourChefcontainer">
                    <div id="chef-slider-container">
                        <span onclick="slideRight()" class="slide_btn"></span>
                        <div id="chefslider">  
                            <?php
                            $recipeKitsQry1 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$pagesArr['slno']."' && work_type='5' ");
                            while($recipeArr1=db_fetch_assoc($recipeKitsQry1)) {
                                ?>
                                <div class="chefSlide"><span><img
                                src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr1['workproimg']?>"
                                alt="">
                                <h4 class="chefSlide-text"><?php echo $recipeArr1['worker_title']?></h4>
                                </span></div>
                                <?php
                            }
                            ?>
                        </div>
                        <span onclick="slideLeft()" class="slide_btn"></span>
                    </div>
                </div>
            </div>

            <div class="our-chef-knows">
                <h3>Starters Dishes by <?php echo ucwords(strtolower($pagesArr['profession']));?> <?php echo ucwords(strtolower($pagesArr['contact_name']));?></h3>
                <div id="ourChefcontainer">
                    <div id="chef-slider-container">
                        <span onclick="slideRight()" class="slide_btn"></span>
                        <div id="chefslider">  
                            <?php
                            $recipeKitsQry2 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$pagesArr['slno']."' && work_type='6' ");
                            while($recipeArr2=db_fetch_assoc($recipeKitsQry2)) {
                                ?>
                                <div class="chefSlide"><span><img
                                src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr2['workproimg']?>"
                                alt="">
                                <h4 class="chefSlide-text"><?php echo $recipeArr2['worker_title']?></h4>
                                </span></div>
                                <?php
                            }
                            ?>
                        </div>
                        <span onclick="slideLeft()" class="slide_btn"></span>
                    </div>
                </div>
            </div>

            <div class="our-chef-knows">
                <h3>Desserts Dishes by <?php echo ucwords(strtolower($pagesArr['profession']));?> <?php echo ucwords(strtolower($pagesArr['contact_name']));?></h3>
                <div id="ourChefcontainer">
                    <div id="chef-slider-container">
                        <span onclick="slideRight()" class="slide_btn"></span>
                        <div id="chefslider">  
                            <?php
                            $recipeKitsQry3 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$pagesArr['slno']."' && work_type='7' ");
                            while($recipeArr3=db_fetch_assoc($recipeKitsQry3)) {
                                ?>
                                <div class="chefSlide"><span><img
                                src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr3['workproimg']?>"
                                alt="">
                                <h4 class="chefSlide-text"><?php echo $recipeArr3['worker_title']?></h4>
                                </span></div>
                                <?php
                            }
                            ?>
                        </div>
                        <span onclick="slideLeft()" class="slide_btn"></span>
                    </div>
                </div>
            </div>

            <div class="our-chef-knows">
                <h3>Breakfast Dishes by <?php echo ucwords(strtolower($pagesArr['profession']));?> <?php echo ucwords(strtolower($pagesArr['contact_name']));?></h3>
                <div id="ourChefcontainer">
                    <div id="chef-slider-container">
                        <span onclick="slideRight()" class="slide_btn"></span>
                        <div id="chefslider">  
                            <?php
                            $recipeKitsQry4 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$pagesArr['slno']."' && work_type='8' ");
                            while($recipeArr4=db_fetch_assoc($recipeKitsQry4)) {
                                ?>
                                <div class="chefSlide"><span><img
                                src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr4['workproimg']?>"
                                alt="">
                                <h4 class="chefSlide-text"><?php echo $recipeArr4['worker_title']?></h4>
                                </span></div>
                                <?php
                            }
                            ?>
                        </div>
                        <span onclick="slideLeft()" class="slide_btn"></span>
                    </div>
                </div>
            </div>

            <div class="our-chef-knows">
                <h3>Chinese Dishes by <?php echo ucwords(strtolower($pagesArr['profession']));?> <?php echo ucwords(strtolower($pagesArr['contact_name']));?></h3>
                <div id="ourChefcontainer">
                    <div id="chef-slider-container">
                        <span onclick="slideRight()" class="slide_btn"></span>
                        <div id="chefslider">  
                            <?php
                            $recipeKitsQry5 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$pagesArr['slno']."' && work_type='9' ");
                            while($recipeArr5=db_fetch_assoc($recipeKitsQry5)) {
                                ?>
                                <div class="chefSlide"><span><img
                                src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr5['workproimg']?>"
                                alt="">
                                <h4 class="chefSlide-text"><?php echo $recipeArr5['worker_title']?></h4>
                                </span></div>
                                <?php
                            }
                            ?>
                        </div>
                        <span onclick="slideLeft()" class="slide_btn"></span>
                    </div>
                </div>
            </div>

            <div class="our-chef-knows">
                <h3>Barbecue Dishes by <?php echo ucwords(strtolower($pagesArr['profession']));?> <?php echo ucwords(strtolower($pagesArr['contact_name']));?></h3>
                <div id="ourChefcontainer">
                    <div id="chef-slider-container">
                        <span onclick="slideRight()" class="slide_btn"></span>
                        <div id="chefslider">  
                            <?php
                            $recipeKitsQry6 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$pagesArr['slno']."' && work_type='10' ");
                            while($recipeArr6=db_fetch_assoc($recipeKitsQry6)) {
                                ?>
                                <div class="chefSlide"><span><img
                                src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr6['workproimg']?>"
                                alt="">
                                <h4 class="chefSlide-text"><?php echo $recipeArr6['worker_title']?></h4>
                                </span></div>
                                <?php
                            }
                            ?>
                        </div>
                        <span onclick="slideLeft()" class="slide_btn"></span>
                    </div>
                </div>
            </div>

            <div class="our-chef-knows">
                <h3>South Indian Dishes by <?php echo ucwords(strtolower($pagesArr['profession']));?> <?php echo ucwords(strtolower($pagesArr['contact_name']));?></h3>
                <div id="ourChefcontainer">
                    <div id="chef-slider-container">
                        <span onclick="slideRight()" class="slide_btn"></span>
                        <div id="chefslider">  
                            <?php
                            $recipeKitsQry7 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$pagesArr['slno']."' && work_type='11' ");
                            while($recipeArr7=db_fetch_assoc($recipeKitsQry7)) {
                                ?>
                                <div class="chefSlide"><span><img
                                src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr7['workproimg']?>"
                                alt="">
                                <h4 class="chefSlide-text"><?php echo $recipeArr7['worker_title']?></h4>
                                </span></div>
                                <?php
                            }
                            ?>
                        </div>
                        <span onclick="slideLeft()" class="slide_btn"></span>
                    </div>
                </div>
            </div>

            <div class="our-chef-knows">
                <h3>Navratri Dishes by <?php echo ucwords(strtolower($pagesArr['profession']));?> <?php echo ucwords(strtolower($pagesArr['contact_name']));?></h3>
                <div id="ourChefcontainer">
                    <div id="chef-slider-container">
                        <span onclick="slideRight()" class="slide_btn"></span>
                        <div id="chefslider">  
                            <?php
                            $recipeKitsQry8 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$pagesArr['slno']."' && work_type='12' ");
                            while($recipeArr8=db_fetch_assoc($recipeKitsQry8)) {
                                ?>
                                <div class="chefSlide"><span><img
                                src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr8['workproimg']?>"
                                alt="">
                                <h4 class="chefSlide-text"><?php echo $recipeArr8['worker_title']?></h4>
                                </span></div>
                                <?php
                            }
                            ?>
                        </div>
                        <span onclick="slideLeft()" class="slide_btn"></span>
                    </div>
                </div>
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
	