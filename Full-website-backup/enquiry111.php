<?php
//https://www.thefamoushalwai.com/enquiry.php?step=2&et=4&pdt=05-Jan-Friday&breakfast=&lunch=&evening=&enquiryType=&dinner=Dinner~8%20PM%20onwards&cusine=North%20Indian&slocation=Haridwar&yname=sdasdf&email=sadfas@dsdfgs.in&mobileno=sadfasdf&gas_burners=2
if(empty($_SERVER['HTTP_REFERER'])) {
	?> 
	<script type="text/javascript">
    window.location.href = "https://www.thefamoushalwai.com/enquiry.php";  
    </script>  
    <?php    
    exit;
}
include('includes/inc.php');
$metatitle='Enquiry Now - The Famous Halwai';
$metaDesc='';
$metaKeywords='';
include('inner_header.php');
function days_in_month($month, $year){
    // calculate number of days in a month
    return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
}

if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') { 
  ?>
  <div class="text-center mt-5" style="height: 200px;">
    <div style="font-size: 30px;font-weight: 600;color:#bb731b">Thank You!</div>
    <h3 class="text-success">Your order Details has submitted successfully.</h3>
    <h5>Our Representative will call you soon.</h5>    
  </div>
  <?php
  include('inner_footer.php');
  exit;
}
?>
<style type="text/css">
.form-step1 label{text-transform: uppercase; font-size: 14px;}
.form-step1 .form-group { margin-bottom: 1.5rem;}
.form-step2 .form-group { margin-bottom: 1.9rem;}
ul.meals {  list-style: none;   padding:0 20px;}
ul.meals li{ display: inline;}
ul.meals li label { display: inline-block; background-color: rgb(255 39 45);border: 2px solid rgba(139, 139, 139, .3); color: #ffffff;  border-radius:2px; white-space: nowrap;  margin: 3px 0px;
  -webkit-touch-callout: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none;
    user-select: none; -webkit-tap-highlight-color: transparent; transition: all .2s;}

ul.meals li label { padding: 8px 12px; cursor: pointer;}

ul.meals li label::before { display: inline-block; font-style: normal; font-variant: normal;
    text-rendering: auto; -webkit-font-smoothing: antialiased;  font-family: "Font Awesome 5 Free";
    font-weight: 900;  font-size: 12px;  padding: 2px 6px 2px 2px;  content: "\f067";
    transition: transform .3s ease-in-out;display:none;}

ul.meals li input[type="checkbox"]:checked + label::before { content: "\f00c";
    transform: rotate(-360deg);   transition: transform .3s ease-in-out;}

ul.meals li input[type="checkbox"]:checked + label {border: 2px solid #d3c301;background-color: #ffec04;
    color: #000;    transition: all .2s;}

ul.meals li input[type="checkbox"] { display: absolute;}
ul.meals li input[type="checkbox"] { position: absolute; opacity: 0;}
ul.meals li input[type="checkbox"]:focus + label { border: 2px solid #e9a1ff;}

.fambx .form-control {  display: block; width: 100%; height: 50px!important; padding: 0.375rem 0.75rem;
    font-size: 16px; font-weight: 400; line-height: 17px; color: #495057;  background-color: #fff;
    background-clip: padding-box; border: 1px solid #ced4da;
    transition: border-color .15s ease-in-out , box-shadow .15s ease-in-out; border-radius: 5px!important;
    box-shadow: none;  margin: 0;box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px;}

.submit_link_btn { border-color: #ccc; background-image: linear-gradient(to right,#07660d 0%,#07660d 100%);
    color: #fff;  font-size: 16px;  font-weight: 700;  text-transform: uppercase;  line-height: inherit;
    letter-spacing: 1px;  /*text-align: center;*/  padding: 12px 26px;  border-radius: 10px;}

.enq-head {background: url("<?php echo SITE_URL;?>/frontEnd/images/hbanner/inquiry_header.jpg")no-repeat center center;background-size: cover;height: 200px;}
.view {margin-top: -56px;}.navbar {z-index: 1;}	
a.text_btn {border: 1px solid #181617;border-radius: 5px;font-size: 15px;
    text-decoration: none;padding: 7px 15px;}
.active{border: 1px solid #181617;border-radius: 5px;font-size: 15px;
    text-decoration: none;padding: 7px 15px;background-color: #fe3456;border-color: #fe3456;}
.selformItem{font-size: 14px;} 

@media (max-width: 575.98px) {
    .mealsDinnerDiv {
        width: 100vw;
        padding-inline: 7px !important;
    }

    .selectCuisines {
        width: 100vw;
        padding-inline: 26px !important;
    }


    .mealsDinnerDiv a {
        padding-block: 2px !important;
        padding-inline: 10px !important;
        font-size: .8rem !important;
        margin-inline: 3px;
    }
}   
</style>
 <div class="view enq-head mt-0">
    <!-- <div class="full-bg-img">
        <div class="mask rgba-black-strong flex-center">
            <div class="container">
                <div class="text-white text-center wow fadeInUp p-3">
                    <h1>Enquiry Now</h1>
                    <h5>When you scroll down it will disappear</h5>
                                     
                </div>
            </div>
        </div>
    </div> -->
</div>

<section class="section_lr">
<div class="container-fluid">
<h1 class="h1title">Enquiry Now</h1>	
	<div class="text-center" style="color:#bb731b"><strong>Please fill out your information below and Our Customer Representative will contact you shortly.</strong></div>
	<?php
	if($_REQUEST['part']=='Submit_Enuiry_Form') {
	  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
	  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
	  } else {
	    $ip_address = $_SERVER['REMOTE_ADDR'];
	  }	  
	  //echo "INSERT INTO order_inquiry SET slocation='".$_POST['slocation']."', occasions_slno='".$_POST['occasions_slno']."', email='".$_POST['email']."', noof_people='".$_POST['noof_people']."', mobile_phone='".$_POST['mobileno']."', occasions_date='".$_POST['occasions_date']."', contact_name='".$_POST['yname']."', starters='".$_POST['starters_val']."', main_cousrse='".$_POST['main_cousrse_val']."', dessert='".$_POST['dessert_slno_val']."', bread_rice_raita='".$_POST['brr_slno_val']."',  soups_beverages='".$_POST['soupb_slno_val']."', live_barbecue='".$_POST['barbecue_slno_val']."', breakfast_val='".$_POST['breakfast_val']."', lunch_val='".$_POST['lunch_val']."', evening_snaks='".$_POST['evening_snaks']."', dinner='".$_POST['dinner']."', enquiryType='".$_POST['enquiryType']."', cusine='".$_POST['cusine']."', gas_burners='".$_POST['gas_burners']."', ipAddress='".$ip_address."', created='".date("Y-m-d h:i:s")."' ";

	  db_query("INSERT INTO order_inquiry SET slocation='".$_POST['slocation']."', occasions_slno='".$_POST['occasions_slno']."', email='".$_POST['email']."', noof_people='".$_POST['noof_people']."', mobile_phone='".$_POST['mobileno']."', occasions_date='".$_POST['occasions_date']."', contact_name='".$_POST['yname']."', starters='".$_POST['starters_val']."', main_cousrse='".$_POST['main_cousrse_val']."', dessert='".$_POST['dessert_slno_val']."', bread_rice_raita='".$_POST['brr_slno_val']."',  soups_beverages='".$_POST['soupb_slno_val']."', live_barbecue='".$_POST['barbecue_slno_val']."', breakfast_val='".$_POST['breakfast_val']."', lunch_val='".$_POST['lunch_val']."', evening_snaks='".$_POST['evening_snaks']."', dinner='".$_POST['dinner']."', enquiryType='".$_POST['enquiryType']."', cusine='".$_POST['cusine']."', gas_burners='".$_POST['gas_burners']."', ipAddress='".$ip_address."', created='".date("Y-m-d h:i:s")."' ");
	  
	  ?>
	  <script type="text/javascript">
	  window.location.href = "<?php echo SITE_URL;?>/enquiry.php?success=yes";  
	  </script>
	  <?php
	  exit;
	}
	?>
	<form name="searchfrm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" data-parsley-validate autocomplete="off" enctype="multipart/form-data">

		<?php
		if(empty($_REQUEST['step'])) {
			?>
			<!-- <div class="form-step1"> -->
			<div class="form-step1 py-3">	
		    <div class="row">
		    	<div class="col-sm-1"></div>
		        <div class="col-sm-11 col-xs-12">
		          <div class="x_panel">          
		            <div class="x_content">
		            <?php            
		            if(!empty($errorMsg)) {  
		              ?>
		              <div class="text-danger text-center mt-3"><h3><?php echo $errorMsg;?></h3></div><br>
		              <?php
		            }
		            ?> 

		            <div class="form-group row">
		            <div class="col-sm-12"><label for="title_en" class="form-control-label"><span>*</span> Services Location</label></div>
		             <div class="col-sm-8"> 
		                <select name="slocation" class="form-control slocation" id="slocation" required="">
                        <option value="">-- Service Location * --</option>
                        <?php
                        foreach($service_location_arr as $val) {
                            if($_REQUEST['sl']=="$val") {
                                ?>
                                <option value="<?php echo $val?>" selected><?php echo $val?></option>
                                <?php
                            }
                            else {
                                ?>
                                <option value="<?php echo $val?>"><?php echo $val?></option>
                                <?php
                            }
                        }
                        ?>
                    	</select>
		              </div>     
		            </div>

		            <div class="form-group row">
		            <div class="col-sm-12"><label for="title_en" class="form-control-label"><span>*</span> Select Requirement</label></div>
		             <div class="col-sm-8"> 
		                <select name="req_slno" class="form-control req_slno" id="req_slno" required="">
		                  <option value="">-- Select One--</option>
		                  <?php
		                   $ereq_qry = db_query("SELECT * FROM occasions_tbl WHERE display_status='Y' ");
		                   while($ereqArr = db_fetch_assoc($ereq_qry)) {
		                    ?>
		                    <option value="<?php echo $ereqArr['slno']?>" <?php echo ($ereqArr['slno']==$_POST['req_slno'])?('selected'):('');?>><?php echo $ereqArr['occasions_title']?></option>
		                    <?php 
		                  }
		                  ?>      
		                </select>
		              </div>     
		            </div>

		            <div class="form-group row">
		            <div class="col-sm-12"> <label for="title_en" class="col-sm-3 form-control-label"><span>*</span>  Your Name</label></div>
		            <div class="col-sm-8"> 
                  	<input class="form-control ps-input yname" type="text" name="yname" id="yname" placeholder="Your Name" required="">
                  	</div>
                  	</div>

                  	<div class="form-group row">
		            <div class="col-sm-12"> <label for="title_en" class="col-sm-3 form-control-label"><span>*</span> Mobile Phone no.</label></div>
		            <div class="col-sm-8"> 
                  	<input class="form-control ps-input mobileno" type="text" name="mobileno" id="mobileno" placeholder="eg.98xxxxxx10" required=""><span id="mobileno-info" class="text-danger"></span>
                  	</div>
                  	</div>

                  	<div class="form-group row">
		            <div class="col-sm-12"> <label for="title_en" class="col-sm-3 form-control-label"><span>*</span> Email Address</label></div>
		            <div class="col-sm-8"> 
                  	<input class="form-control ps-input email" type="text" name="email" id="email" placeholder="Email Address" required=""><span id="email-info" class="text-danger"></span>
                  	</div>
                  	</div>

		            <div class="form-group row">
		             <div class="col-sm-12"> <label for="title_en" class="col-sm-3 form-control-label"><span>*</span>  Select Date</label></div>
		              <div class="col-sm-8"> 
		                <select name="programe_date" class="form-control programe_date" id="programe_date" required="">
		                  <option value="">-- Select One--</option>
		                  <?php	                   
						    //7 Dec Days
						    for ($pdt=1; $pdt <=12; $pdt++) {

							  	$view_month = date($pdt);  $view_year = date("Y");

						    	$daysinMOnth = days_in_month($view_month, $view_year); 

						    	for($i=1;$i<=$daysinMOnth;$i++) {

							    	$getDate = date("Y-m-d",mktime(0,0,0, $view_month, $i, $view_year));		    	
							    	$day_num = date('d', strtotime($getDate));
							    	$month_name = date('M', strtotime($getDate));
						        	$day_name = date('l', strtotime($getDate));

						        	$daysSelect = $day_num."-".$month_name."-".$day_name;

						        	$daysSelect_display = $day_num."&nbsp;&nbsp;".$month_name."&nbsp;&nbsp;".$day_name;
						        	//echo $att_date."--".$day_num."-- ".$month_name."-- ".$day_name."<br>";
						        	?>
				                    <option value="<?php echo $daysSelect?>"><?php echo $daysSelect_display?></option>
				                    <?php
							    }
						    }	                   
		                  ?>      
		                </select>
		              </div>     
		            </div>

		            <div class="form-group row">
		             <div class="col-sm-12"> <label for="title_en" class="col-sm-3 form-control-label mt-3"><span>*</span>  Select Meals</label></div>
		              <div class="col-sm-9 mealsDinnerDiv"> 	              	
		               <?php	                
	                   $meals_qry = db_query("SELECT * FROM event_meals WHERE display_status='Y' ");
	                   while($mealsArr = db_fetch_assoc($meals_qry)) {
	                    ?>
	                    <a class="text_btn meal_time" data-meal="<?php echo $mealsArr['slno']?>"><?php echo $mealsArr['meal_title']?></a>
	                    <?php 
	                  }
	                  ?> 
		              </div>     
		            </div>

		            <div class="display_time_cuisines"></div>

		            <?php
		            $cuisine_qry = db_query("SELECT * FROM event_cuisine WHERE slno NOT IN ('9','8')");

				    if(db_num_rows($cuisine_qry)>0) {      
						?>
						<div class="form-group row showCuisines" style="display: none">
						<div class="col-sm-12"><label for="title_en" class="form-control-label mt-3">Select Cuisines (you can choose multiple)</label></div>
						<div class="col-sm-12 mealsDinnerDiv selectCuisines"> 
						<?php		
						while($cuisineArr = db_fetch_assoc($cuisine_qry)) {
						?>
						<a class="text_btn Cuisines" data-Cuisines="<?php echo $cuisineArr['cuisine_title']?>"><?php echo $cuisineArr['cuisine_title']?></a>
						<?php 
						}
						?> 
						</div>     
						</div>
						<?php
					}
		            ?>
		            <div class="form-group row">
		            <div class="col-sm-12"><label for="title_en" class="form-control-label mt-3"><span>*</span> No. of Gas Burners (in your kitchen)</label></div>		            	
		             
		              <div class="col-sm-8"> 
		                <select name="gas_burners" class="form-control gas_burners" id="gas_burners" required="">
		                  <option value="">-- Select One--</option>
		                  <?php	                   
						    //7 Dec Days
						    for ($gasb=1; $gasb <=5; $gasb++) {
						    	?>
				                <option value="<?php echo $gasb?>"><?php echo $gasb?></option>
				                <?php							    
						    }	                   
		                  ?>      
		                </select>
		              </div>     
		            </div>

		        	</div>     
		    		</div>    
		    	</div>     
		    	<!-- <input type="hidden" class="SetValItemm" value=""> -->
		    </div>
		    <hr class="w-100">
			<div class="row">
	        <div class="col-sm-8 d-flex justify-content-center align-items-center flex-column">        
		    <input type="hidden" class="breakfast_val" value="">
		    <input type="hidden" class="lunch_val" value="">
		    <input type="hidden" class="evening_snaks" value="">
		    <input type="hidden" class="dinner" value="">
		    <input type="hidden" class="enquiryType" value="<?php echo $_REQUEST['q']?>">	        
	        <button type="button" class="submit_link_btn" onclick="proceesBtn_Step1();" style="width: 236px;">Process Now</button>
	        </div>
		    </div>
		    <?php
		}
		else {
			$ereqArr = db_fetch_assoc(db_query("SELECT * FROM occasions_tbl WHERE slno='".$_REQUEST['et']."' "));
			?>
			<div class="justify-content-center text-center mt-3 mb-4 selformItem"><strong>Your Location</strong>:<?php echo $_REQUEST['slocation']?>&nbsp;&nbsp;<strong>Your Occasion</strong>:<?php echo $ereqArr['occasions_title']?> &nbsp;&nbsp; <strong>Occasion Date</strong>:<?php echo $_REQUEST['pdt']?> <br>
			<strong>Meal & Time:</strong>
			<?php
			if(!empty($_REQUEST['breakfast'])) {
				echo $_REQUEST['breakfast'];
			}	
			if(!empty($_REQUEST['evening'])) {
				echo "&nbsp;&nbsp;".$_REQUEST['evening'];
			}	
			if(!empty($_REQUEST['lunch'])) {
				echo "&nbsp;&nbsp;".$_REQUEST['lunch'];
			}	
			if(!empty($_REQUEST['dinner'])) {
				echo "&nbsp;&nbsp;".$_REQUEST['dinner'];
			}	
			?>
			<br>
			<strong>Selected Cuisines:</strong><?php echo $_REQUEST['cusine']?>&nbsp;&nbsp;
			<strong>Gas Burners:</strong><?php echo $_REQUEST['gas_burners']?>
			</div> 
			

		    <!-- <h2 class="text-center">Step Form 2</h2> -->

		    <div class="row">		    	
		    <div class="col-sm-2"></div>
		    <div class="col-sm-10 col-xs-12">

			<div class="form-group row">
			<div class="col-sm-12"> <label for="title_en" class="form-control-label"><span>*</span> No. of People for Dinner(5+ years)</label></div>
			<div class="col-sm-10"> 
			<select name="noof_people" class="form-control noof_people" id="programe_date1">
			<option value="">-- Select One--</option>
			<?php
			for ($pcnt=1; $pcnt <=500; $pcnt++) { 
				?>
				<option value="<?php echo $pcnt?>"><?php echo $pcnt?> People</option>
				<?php 
			}
			?>
			</select>
			</div>     
			</div>

			<div class="form-group row">
			<div class="col-sm-12"> <label for="title_en" class="form-control-label"> Starters</label></div>
			<div class="col-sm-10"> 				
				<input type="hidden" id="starters_val" name="starters_val">	
			<select class="form-control starters" id="starters">
			<?php
               $starters_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno='8' ");
               while($starterArr = db_fetch_assoc($starters_qry)) {
               		if(!empty($starterArr['menu_img'])) {
						$imgUrl = SITE_URL."/frontEnd/menuimg/".$starterArr['menu_img'];
					}
					else {
						$imgUrl = SITE_URL."/frontEnd/images/NoImage.jpg";
					}
					?>
					<option data-img="<?php echo $imgUrl;?>" value="<?php echo $starterArr['slno']?>" <?php echo ($starterArr['slno']==$_POST['req_slno'])?('selected'):('');?>><?php echo $starterArr['menu_name']?></option>
					<?php 
              }
              ?>
			</select>
			</div>     
			</div>

            <div class="form-group row">
              <div class="col-sm-12"><label for="title_en" class="form-control-label">Main Course(optional)</label> </div>     
              <div class="col-sm-10"> <span style="font-size: 12px">As per selected Cuisines Menu</span>
              		<input type="hidden" id="main_cousrse_val" name="main_cousrse_val">				
				<select class="form-control main_cousrse" id="main_cousrse"  multiple>
	            <?php
	            if($_REQUEST['cusine']=='South Indian') {
	            	$condStr = " && event_cuisine_slno='1' ";
	            }
	            else if($_REQUEST['cusine']=='North Indian') {
	            	$condStr = " && event_cuisine_slno='2' ";	
	            }
	            else if($_REQUEST['cusine']=='Chinese') {
	            	$condStr = " && event_cuisine_slno='3' ";
	            }
	            else {
	            	$condStr = " && event_cuisine_slno IN ('1','2','3') ";
	            }

                $main_cousrse_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' ".$condStr." ");
                   while($mcourseArr = db_fetch_assoc($main_cousrse_qry)) {
                   		if(!empty($mcourseArr['menu_img'])) {
							$imgUrl = SITE_URL."/frontEnd/menuimg/".$mcourseArr['menu_img'];
						}
						else {
							$imgUrl = SITE_URL."/frontEnd/images/NoImage.jpg";
						}
						?>
						<option data-img="<?php echo $imgUrl;?>" value="<?php echo $mcourseArr['slno']?>" <?php echo ($mcourseArr['slno']==$_POST['main_cousrse'])?('selected'):('');?>><?php echo $mcourseArr['menu_name']?></option>
						<?php 
                  }
                  ?> 
				</select>
              </div>     
            </div>

            <div class="form-group row">
              <div class="col-sm-12"> <label for="title_en" class="form-control-label"> Breads, Rice and Raita</label></div>
              <div class="col-sm-10"> 
              	<input type="hidden" id="brr_slno_val" name="brr_slno_val">
			   <select class="form-control brr_slno" id="brr_slno" multiple>
			  <?php
               $brr_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno='9' ");
               while($brrArr = db_fetch_assoc($brr_qry)) {
               	if(!empty($brrArr['menu_img'])) {
					$imgUrl = SITE_URL."/frontEnd/menuimg/".$brrArr['menu_img'];
				}
				else {
					$imgUrl = SITE_URL."/frontEnd/images/NoImage.jpg";
				}
				?>
				<option data-img="<?php echo $imgUrl;?>" value="<?php echo $brrArr['slno']?>" <?php echo ($brrArr['slno']==$_POST['brr_slno'])?('selected'):('');?>><?php echo $brrArr['menu_name']?></option>
				<?php 
          		}
              ?> 

				</select>
              </div>     
            </div>

            <div class="form-group row">
              <div class="col-sm-12"> <label for="title_en" class="form-control-label"> Desserts</label></div> 
              <div class="col-sm-10"> 
              	<input type="hidden" id="dessert_slno_val" name="dessert_slno_val">
				<select class="form-control dessert_slno" id="dessert_slno" multiple>
				<?php
                   $desserts_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno='6' ");
                   while($dessertsArr = db_fetch_assoc($desserts_qry)) {

                   		if(!empty($dessertsArr['menu_img'])) {
							$imgUrl = SITE_URL."/frontEnd/menuimg/".$dessertsArr['menu_img'];
						}
						else {
							$imgUrl = SITE_URL."/frontEnd/images/NoImage.jpg";
						}


						?>
						<option data-img="<?php echo $imgUrl;?>" value="<?php echo $dessertsArr['slno']?>" <?php echo ($dessertsArr['slno']==$_POST['dessert_slno'])?('selected'):('');?>><?php echo $dessertsArr['menu_name']?></option>
						<?php 
                  }
                  ?>    

				</select>
              </div>     
            </div>

            <div class="form-group row">
            <div class="col-sm-12">   <label for="title_en" class="form-control-label"> Soups & Beverages</label></div> 
			<div class="col-sm-10">
			<input type="hidden" id="soupb_slno_val" name="soupb_slno_val"> 
			<select class="form-control soupb_slno" id="soupb_slno" multiple>
			<?php
			$soupb_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno='7' ");
			while($soupbArr = db_fetch_assoc($soupb_qry)) {

				if(!empty($soupbArr['menu_img'])) {
					$imgUrl = SITE_URL."/frontEnd/menuimg/".$soupbArr['menu_img'];
				}
				else {
					$imgUrl = SITE_URL."/frontEnd/images/NoImage.jpg";
				}

				?>
				<option data-img="<?php echo $imgUrl;?>" value="<?php echo $soupbArr['slno']?>" <?php echo ($soupbArr['slno']==$_POST['soupb_slno'])?('selected'):('');?>><?php echo $soupbArr['menu_name']?></option>
				<?php 
			}
			?> 

			</select>
			</div>     
            </div>

            <div class="form-group row">
            <div class="col-sm-12">   <label for="title_en" class="form-control-label"> Live Barbecue</label></div> 
			<div class="col-sm-10"> 
			<input type="hidden" id="barbecue_slno_val" name="barbecue_slno_val">	
			<select class="form-control soupb_slno" id="barbecue_slno" multiple>
			<?php
			$lBarbecue_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno='4' ");
			while($larbecueArr = db_fetch_assoc($lBarbecue_qry)) {

				if(!empty($larbecueArr['menu_img'])) {
					$imgUrl = SITE_URL."/frontEnd/menuimg/".$larbecueArr['menu_img'];
				}
				else {
					$imgUrl = SITE_URL."/frontEnd/images/NoImage.jpg";
				}

				?>
				<option data-img="<?php echo $imgUrl;?>" value="<?php echo $larbecueArr['slno']?>" <?php echo ($larbecueArr['slno']==$_POST['soupb_slno'])?('selected'):('');?>><?php echo $larbecueArr['menu_name']?></option>
				<?php 
			}
			?> 

			</select>
			</div>     
            </div>

			</div>     
			</div>  

			<hr class="w-100">
			<div class="row">
	        <div class="col-sm-12 d-flex justify-content-center align-items-center flex-column">        
		   	<input type="hidden" name="occasions_slno" value="<?php echo $_REQUEST['et']?>">	
	        <input type="hidden" name="occasions_date" value="<?php echo $_REQUEST['pdt']?>">
	        <input type="hidden" name="breakfast_val" value="<?php echo $_REQUEST['breakfast']?>">
		    <input type="hidden" name="lunch_val" value="<?php echo $_REQUEST['lunch']?>">
		    <input type="hidden" name="evening_snaks" value="<?php echo $_REQUEST['evening']?>">
		    <input type="hidden" name="dinner" value="<?php echo $_REQUEST['dinner']?>">
		    <input type="hidden" name="enquiryType" value="<?php echo $_REQUEST['enquiryType']?>">
		    <input type="hidden" name="email" value="<?php echo $_REQUEST['email']?>">
		    <input type="hidden" name="yname" value="<?php echo $_REQUEST['yname']?>">
		    <input type="hidden" name="mobileno" value="<?php echo $_REQUEST['mobileno']?>">
		    <input type="hidden" name="slocation" value="<?php echo $_REQUEST['slocation']?>">
		    <input type="hidden" name="cusine" value="<?php echo $_REQUEST['cusine']?>">
		    <input type="hidden" name="gas_burners" value="<?php echo $_REQUEST['gas_burners']?>">
	        <input type="hidden" name="part" value="Submit_Enuiry_Form">          
	        <button type="submit" class="submit_link_btn" onclick="proceesBtn_Step2();" style="width: 236px;">Submit Now</button>
	        </div>
		    </div>
	    	<?php
	    }
	    ?>
	</form>    
</div>      
</section>
	
<br><br>

<?php
include('inner_footer.php');
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">     
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script src="<?php echo SITE_URL;?>/frontEnd/inner/js/multiPick.js"></script>

<!-- <script>
$("#multiPick").multiPick({
    limit: 5,
    image: true,
    closeAfterSelect: false,
    search: true,
    placeholder: 'Select',
    slim: false
}); 

</script> -->

<script>
$('#starters').multiPick({
    limit: 5,
    image: true,
    closeAfterSelect: false,
    search: true,
    placeholder: 'Select',
    slim: false
});
$(document).ready(function() {	
  	var numArray = [];
	$('#starters .option-item').on('click', function() { 
	let values = $(this).attr('data-value');
	 numArray.push(values);
	 console.log(numArray.join(','));
	 $('#starters_val').val(numArray.join(','));
 	});

	/*$('#starters .item').on('click', function() {		
		var index = rvalues.indexOf($(this).attr('rdata-value'));
        if (index > -1) {
          rvalues.splice(index, 1);
        }

		$('#starters_val').val(rvalues);
	});*/
});     
</script>
<script>
$('#main_cousrse').multiPick({
    limit: 20,
    image: true,
    closeAfterSelect: false,
    search: true,
    placeholder: 'Select',
    slim: false
});   

$(document).ready(function() {	
  	var numArray = [];
	$('#main_cousrse .option-item').on('click', function() { 
		let values = $(this).attr('data-value');
		numArray.push(values);
		console.log(numArray.join(','));
		$('#main_cousrse_val').val(numArray.join(','));
 	});
});
</script>
<script>
$('#brr_slno').multiPick({
    limit: 5,
    image: true,
    closeAfterSelect: false,
    search: true,
    placeholder: 'Select',
    slim: false
}); 
$(document).ready(function() {	
  	var numArray = [];
	$('#brr_slno .option-item').on('click', function() { 
		let values = $(this).attr('data-value');
		numArray.push(values);
		console.log(numArray.join(','));
		$('#brr_slno_val').val(numArray.join(','));
 	});
}); 
</script>
<script>
$('#dessert_slno').multiPick({
    limit: 5,
    image: true,
    closeAfterSelect: false,
    search: true,
    placeholder: 'Select',
    slim: false
}); 
$(document).ready(function() {	
  	var numArray = [];
	$('#dessert_slno .option-item').on('click', function() { 
		let values = $(this).attr('data-value');
		numArray.push(values);
		console.log(numArray.join(','));
		$('#dessert_slno_val').val(numArray.join(','));
 	});
}); 
</script>
<script>
$('#soupb_slno').multiPick({
    limit: 5,
    image: true,
    closeAfterSelect: false,
    search: true,
    placeholder: 'Select',
    slim: false
});      
$(document).ready(function() {	
  	var numArray = [];
	$('#soupb_slno .option-item').on('click', function() { 
		let values = $(this).attr('data-value');
		numArray.push(values);
		console.log(numArray.join(','));
		$('#soupb_slno_val').val(numArray.join(','));
 	});
});    
</script>

<script>
$('#barbecue_slno').multiPick({
    limit: 5,
    image: true,
    closeAfterSelect: false,
    search: true,
    placeholder: 'Select',
    slim: false
}); 
$(document).ready(function() {	
  	var numArray = [];
	$('#barbecue_slno .option-item').on('click', function() { 
		let values = $(this).attr('data-value');
		numArray.push(values);
		console.log(numArray.join(','));
		$('#barbecue_slno_val').val(numArray.join(','));
 	});
});
</script>

<!-- <script>
  $(document).ready(function(){    
    $('#breakfast').change(function(){
      $('.startTime').toggle($(this).is(':checked'));
      $('.showCuisines').toggle($(this).is(':checked'));
    });

    // Handle checkbox change events for Checkbox 2
    $('#lunch').change(function(){
      $('.showCuisines').toggle($(this).is(':checked'));
	  $('.strlunchTime').toggle($(this).is(':checked'));
    });

    // Handle checkbox change events for Checkbox 3
    $('#eveningSnacks').change(function(){
      $('.showCuisines').toggle($(this).is(':checked'));
	  $('.strEveningTime').toggle($(this).is(':checked'));
    });

    // Handle checkbox change events for Checkbox 4
    $('#dinner').change(function(){
      $('.showCuisines').toggle($(this).is(':checked'));
	  $('.strDinnerTime').toggle($(this).is(':checked'));
    });
  });
</script> -->


<script>
var item = new Array();
var item_arr = new Array();	
var Cuisines_arr = new Array();	

$('.SubmitStep1').hide();

//Select Multiple Option START
$('.meal_time,.Cuisines').on('click',function(event) {
	event.preventDefault();
	var check = $(this).hasClass('active');
	if(check == true) {
  		$(this).removeClass('active');
	}
	else {
  		$(this).addClass('active');
	}
});
//Select Multiple Option END

//Display Time data on select Meals Basis START
$(document).ready(function() {	
  	$('.meal_time').on('click', function() { 
	  	var menuID=$(this).attr('data-meal');
	  	if ($.inArray(menuID, item) >= 0) {
	  		var index = item.indexOf(menuID);
			if (index > -1) {
			  item.splice(index, 1);
			}
		} 
		else {
			item.push(menuID);
		}
		if(item.length >0) {
			$('.display_time_cuisines').html('');
			jQuery.ajax({
				type:'POST',
				url:'ajaxjQuery.php',
				data:'menuID='+item+'&part=timeCuisines',
				dataType:'html',
				beforeSend: function(){
				  	$('.display_time_cuisines').html('Please Wait.....');
				},
			  	success: function(responseData) {
					$('.display_time_cuisines').html(responseData);
					$('.showCuisines').show();					
					$('.SubmitStep1').show();
		        }
			});
		}
		else {
		 $('.display_time_cuisines').html('');
		}
	});
	//Store Cusine Data for Show to Next Form
	$('.Cuisines').on('click', function() { 
  		var menuID=$(this).attr('data-Cuisines');
  		if ($.inArray(menuID, Cuisines_arr) >= 0) {
	  		var index = Cuisines_arr.indexOf(menuID);
			if (index > -1) {
			  Cuisines_arr.splice(index, 1);
			}
		} 
		else {
			Cuisines_arr.push(menuID);
		}
		//console.log(Cuisines_arr);
	}); 
}); 
//Display Time data on select Meals Basis END

function secheduleTime(thisVal,slno,mealname,time) {	
	$(thisVal).closest('.sechedule').find('a').removeClass('active');
	$(thisVal).addClass('active');
	//var eventtime ='';
	//console.log(slno+'###'+mealname+'==='+time);
	if(slno==1) {
		$('.breakfast_val').val(mealname+'~'+time);
	}
	if(slno==2) {
		$('.lunch_val').val(mealname+'~'+time);	
	}
	if(slno==3) {
		$('.evening_snaks').val(mealname+'~'+time);
	}
	if(slno==4) {
		$('.dinner').val(mealname+'~'+time);
	}
}

function proceesBtn_Step1() {		
	var eventType= $("#req_slno").val();
	var pdate= $("#programe_date").val();
	var breakfast= $(".breakfast_val").val();
	var lunch= $(".lunch_val").val();
	var evening= $(".evening_snaks").val();
	var dinner= $(".dinner").val();
	var enquiryType= $(".enquiryType").val();
	var slocation= $(".slocation").val();
	var yname= $(".yname").val();
	var email= $(".email").val();
	var mobileno= $(".mobileno").val();
	var gas_burners= $(".gas_burners").val();

	if(Cuisines_arr.length!='' && Cuisines_arr.length!='0' && eventType!='' && pdate!='' && mobileno.length!=10 && yname!='') {
		$('.form-step1').hide();
		$('.SubmitStep1').hide();
        window.location.href = "<?php echo SITE_URL;?>/enquiry.php?step=2&et="+eventType+"&pdt="+pdate+"&breakfast="+breakfast+"&lunch="+lunch+"&evening="+evening+"&enquiryType="+enquiryType+"&dinner="+dinner+"&cusine="+Cuisines_arr+"&slocation="+slocation+"&yname="+yname+"&email="+email+"&mobileno="+mobileno+"&gas_burners="+gas_burners;
    }
    else {
    	alert("Please select all required fields.");
    	return false;
    }
}
</script>
</body>
</html>
