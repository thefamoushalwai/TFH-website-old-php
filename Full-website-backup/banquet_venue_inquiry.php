<?php
include('includes/inc.php');
//For Captch Start
session_start();
$captcha_val = 'ABCDEFGHJKLMNOPQRSTUVWXYZ123456789abcdefghijkmnpqrstuvwxyz';
$captcha_val = substr(str_shuffle($captcha_val), 0, 5);
$_SESSION['CAPTCHKEY'] = $captcha_val;
//For Captch END

$metatitle='Book Banquet Halls & Venues | The Famous Halwai';	
$metaDesc='Find and book verified banquet halls and wedding venues through The Famous Halwai. We help you plan events end-to-end.';
$metaKeywords='halwai  for wedding in dehradun,halwai for wedding in rishikesh,halwai for wedding in faridabad';	
include('inner_header.php');

if($_POST['pID']=='AddPostForm') {

  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
      $ip_address = $_SERVER['REMOTE_ADDR'];
  }

  if(!empty($_POST['mobile_phone'])) {

    $_POST['email'] = trim($_POST['email']);
    $_POST['mobile_phone'] = trim($_POST['mobile_phone']);

    //echo "INSERT INTO general_inq SET query_for='Banquet and Destination Venue', contact_name = '".db_real_escape($_POST['contact_name'])."', email = '".$_POST['email']."', mobile_phone = '".$_POST['mobile_phone']."', state = '".$_POST['state']."', city = '".db_real_escape($_POST['city'])."', address = '".db_real_escape($_POST['address'])."', ipaddress='".$ip_address."', recv_date_time='".date("Y-m-d g:i:s")."', mem_add_from='Banquet and Destination Venue', no_of_people='".$_POST['no_of_people']."', mbudget='".$_POST['mbudget']."'<br><br>";

    db_query("INSERT INTO general_inq SET query_for='Banquet and Destination Venue', contact_name = '".db_real_escape($_POST['contact_name'])."', email = '".$_POST['email']."', mobile_phone = '".$_POST['mobile_phone']."', state = '".$_POST['state']."', city = '".db_real_escape($_POST['city'])."', address = '".db_real_escape($_POST['address'])."', ipaddress='".$ip_address."', recv_date_time='".date("Y-m-d g:i:s")."', mem_add_from='3', no_of_people='".$_POST['no_of_people']."', mbudget='".$_POST['mbudget']."' ");
    ?>
    <script type="text/javascript">
    window.location.href='<?php echo SITE_URL;?>/banquet_venue_inquiry.php?success_msg=Y';
    </script>
    <?php
  }
}

?>
<div class="page__banner" style="background-image: url('<?php echo SITE_URL;?>/frontEnd/images/hbanner/our_services.jpg');height: 200px;">	
</div>

<section class="my-5 section_lr">
<div class="container-fluid">

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
        <h1 class="serv_head">Banquet and Destination Venue for Enquiry</h1>
	    <div class="join d-flex">

	    <form name="postReqForm" id="postReqForm" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" onsubmit="return validate_contact_form();">
	      <div class="regst-left">
	        <p class="">We are providing best Banquet and Destination Venue Services near in your location. Please fillup below form.</p>
	        <?php
	        if(isset($_REQUEST['success_msg']) && $_REQUEST['success_msg']=='Y') {
	          ?>
	          <div class="text-center mt-3 text-success"><h2>Thank you for interesting a Banquet and Destination Venue.<br>Our Representative will call you soon.</h2></div>
	          <?php
	        }
	        else {	        
	        	?>
	            <div class="form-steps-content mt-5">	              
	                <!-- <form action="" class=""> -->
	              <div class="row">                

	              	<div class="form-group col-md-6">
	                <label for="yname">No. of People <span class="text-danger">*</span></label>
	                <select name="no_of_people" class="form-control inputfild no_of_people" id="no_of_people">
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

	              	<div class="form-group col-md-6">
	                <label for="country">Select State <span class="text-danger">*</span></label>
	                <select class="floating-select form-control state inputfild" id="state" name="state">
	                <option value="">-- Select State--</option>
	                <?php                       
	                foreach ($state_name_arr as $key => $value) {                        
	                    ?>
	                    <option value="<?php echo $key;?>"><?php echo $value;?></option>
	                    <?php
	                }
	                ?>
	                </select>                        
	                </div>

	                <div class="form-group col-md-6">
	                <label for="city">Enter City <span class="text-danger">*</span></label>
	                <input type="text" class="form-control city inputfild" id="city" placeholder="Enter City Name" name="city">
	                <span id="city-info" class="error-info reg_error_msg"></span>
	                </div>

	                <div class="form-group col-md-6">
	                <label for="yname">Enter Location (as require)<span class="text-danger">*</span></label>
	                <input type="text" class="form-control address inputfild" id="address" placeholder="Enter Location as require" name="address">
	                <span id="yname-info" class="error-info reg_error_msg"></span>
	                </div>

	                <div class="form-group col-md-6">
	                <label for="mobile">Contact Name <span class="text-danger">*</span></label>
	                <input type="text" class="form-control contact_name inputfild bgfff" id="contact_name" placeholder="Enter Contact Name" name="contact_name">
	                </div>

	                <div class="form-group col-md-6">
	                <label for="mobile">Mobile Number <span class="text-danger">*</span></label>
	                <input type="number" class="form-control mobile_phone inputfild bgfff" id="mobile_phone" placeholder="Enter Mobile Number" name="mobile_phone" onkeypress="return isNumberKey(event);">
	                <span id="phone-info" class="error-info reg_error_msg"></span>    
	                </div>

	                <div class="form-group col-md-6">
	                <label for="mobile">Email Address <span class="text-danger">*</span></label>
	                <input type="text" class="form-control email inputfild bgfff" id="email" placeholder="Enter Email Address" name="email">
	                </div>

	                <div class="form-group col-md-6">
	                <label for="mobile">Your Budget (in INR) <span class="text-danger">*</span></label>
	                <input type="text" class="form-control mbudget inputfild bgfff" id="mbudget" placeholder="Enter Your Budget (in INR)" name="mbudget">
	                </div>

					<div class="col-md-8 pt-2">          
	                  <div class="row"> 
	                  <div class="col-md-5 pt-2">  
	                    Verification Code 
	                  </div>             
	                  <div class="captcha_box">
	                    <div class="calc_captcha"> <span><i><?php echo $_SESSION['CAPTCHKEY']?></i></span> </div>
	                    <div class="captch_input">
	                      <input type="text" name="inputCaptcha" class="inputCaptcha inputfild form-control" autocomplete="off">
	                      <input type="hidden" name="hiddenCaptcha" class="hiddenCaptcha" value="<?php echo $_SESSION['CAPTCHKEY']; ?>" />
	                      <span class="error-info captcha-error" style="color:red;font-size:13px;"></span>
	                    </div>
	                  </div>
	                </div>        
	                </div>
	              
	            </div>
	            
	            <div class="text-center mt-3">
	            <input type="hidden" name="pID" value="AddPostForm">
	            <input type="submit" class="submit_link_btn" name="submit" value="SUBMIT">     
	            </div>
	            <?php
	        }
	        ?>
	         
	      </div>
	    </form>
	    </div>
	</div>
</div>
</section>	
<?php
include('inner_footer.php');
?>
<script>
function validate_contact_form() { 
  
   var valid = true;      
    $(".inputfild").css('background-color','');
    $(".no_of_people").css('border-color','');
    $(".contact_name").css('border-color','');
    $(".address").css('border-color','');
    $(".mobile_phone").css('border-color','');
    $(".email").css('border-color','');
    $(".state").css('border-color','');
    $(".city").css('border-color','');    
    $(".mbudget").css('border-color','');

    //$(".your_query").css('border-color','');
    $(".inputCaptcha").css('border-color','');

    $(".error-info").html('');

    if(!$(".no_of_people").val()) {
        $(".no_of_people").css('background-color','#f4e0e0');          
        $(".no_of_people").css('border-color','#ee4e4e');
        $(".no_of_people").css('border','1px solid #e11f26');
        valid = false;
    }

    if(!$(".contact_name").val()) {
        $(".contact_name").css('background-color','#f4e0e0');          
        $(".contact_name").css('border-color','#ee4e4e');
        $(".contact_name").css('border','1px solid #e11f26');
        valid = false;
    }
    if(!$(".address").val()) {
        $(".address").css('background-color','#f4e0e0');          
        $(".address").css('border-color','#ee4e4e');
        $(".address").css('border','1px solid #e11f26');
        valid = false;
    }
    if(!$(".mobile_phone").val()) {
        $(".mobile_phone").css('background-color','#f4e0e0');          
        $(".mobile_phone").css('border-color','#ee4e4e');
        $(".mobile_phone").css('border','1px solid #e11f26');
        valid = false;
    }
    if($(".mobile_phone").val() && ($(".mobile_phone").val().length>10 || $(".mobile_phone").val().length<10)) {
        $(".mobile_phone").css('background-color','#f4e0e0');
        $(".mobile_phone_error").html('Enter Valid Mobile Phone no.'); 
        $(".mobile_phone").css('border-color','#ee4e4e');                 
        valid = false;
    }

    if(!$(".email").val()) {
        $(".email").css('background-color','#f4e0e0');          
        $(".email").css('border-color','#ee4e4e');
        $(".email").css('border','1px solid #e11f26');
        valid = false;
    }
    else if(!$(".email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        $(".email").css('background-color','#f4e0e0');
        $(".email-error").html("Please enter valid email address");
        $(".email").css('border-color','#ee4e4e');
        valid = false;
    }

    if(!$(".state").val()) {
        $(".state").css('background-color','#f4e0e0');          
        $(".state").css('border-color','#ee4e4e');
        $(".state").css('border','1px solid #e11f26');
        valid = false;
    }

    /*if(!$(".company_name").val()) {
        $(".company_name").css('background-color','#f4e0e0');          
        $(".company_name").css('border-color','#ee4e4e');
        $(".company_name").css('border','1px solid #e11f26');
        valid = false;
    }
    if(!$(".country").val()) {
        $(".country").css('background-color','#f4e0e0');          
        $(".country").css('border-color','#ee4e4e');
        $(".country").css('border','1px solid #e11f26');
        valid = false;
    }*/
    if(!$(".city").val()) {
        $(".city").css('background-color','#f4e0e0');          
        $(".city").css('border-color','#ee4e4e');
        $(".city").css('border','1px solid #e11f26');
        valid = false;
    }

    /*if(!$(".call_phone_time").val()) {
        $(".call_phone_time").css('background-color','#f4e0e0');          
        $(".call_phone_time").css('border-color','#ee4e4e');
        $(".call_phone_time").css('border','1px solid #e11f26');
        valid = false;
    }*/

    /*if(!$(".query_for").val()) {
        $(".query_for").css('background-color','#f4e0e0');          
        $(".query_for").css('border-color','#ee4e4e');
        $(".query_for").css('border','1px solid #e11f26');
        valid = false;
    }*/
    /*if(!$(".your_query").val()) {
        $(".your_query").css('background-color','#f4e0e0');          
        $(".your_query").css('border-color','#ee4e4e');
        $(".your_query").css('border','1px solid #e11f26');
        valid = false;
    }*/
    if(!$(".mbudget").val()) {
        $(".mbudget").css('background-color','#f4e0e0');          
        $(".mbudget").css('border-color','#ee4e4e');
        $(".mbudget").css('border','1px solid #e11f26');
        valid = false;
    }
    if(!$(".inputCaptcha").val()) {
        $(".inputCaptcha").css('background-color','#f4e0e0');          
        $(".inputCaptcha").css('border-color','#ee4e4e');
        $(".inputCaptcha").css('border','1px solid #e11f26');
        valid = false;
    }
    else if($(".inputCaptcha").val()!=$(".hiddenCaptcha").val()) {
        $(".inputCaptcha").css('background-color','#f4e0e0');          
        $(".inputCaptcha").css('border-color','#ee4e4e');
        $(".captcha-error").html("Verification Code does not match");
        $(".inputCaptcha").css('border','1px solid #e11f26');
        valid = false;
    }

    return valid;
}
</script>