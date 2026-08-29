<?php
include('includes/inc.php');
//For Captch Start
session_start();
$captcha_val = 'ABCDEFGHJKLMNOPQRSTUVWXYZ123456789abcdefghijkmnpqrstuvwxyz';
$captcha_val = substr(str_shuffle($captcha_val), 0, 5);
$_SESSION['CAPTCHKEY'] = $captcha_val;
//For Captch END

$contactinfo = db_fetch_assoc(db_query("SELECT * FROM site_contactus WHERE 1=1")); 
$metatitle= $contactinfo['meta_title'];
$metaDesc= $contactinfo['meta_keyword'];
$metaKeywords=$contactinfo['meta_desc'];
include('inner_header.php');

if($_POST['cid']=='contactus') {

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

     //echo "INSERT INTO general_inq SET contact_name = '".db_real_escape($_POST['contact_name'])."', email = '".$_POST['email']."', mobile_phone = '".$_POST['mobile_phone']."', city = '".db_real_escape($_POST['city'])."', call_phone_time = '".db_real_escape($_POST['call_phone_time'])."', your_query = '".db_real_escape($_POST['your_query'])."', ipaddress='".$ip_address."', recv_date_time='".date("Y-m-d g:i:s")."'<br><br>";

    db_query("INSERT INTO general_inq SET query_for='Contact Us', contact_name = '".db_real_escape($_POST['contact_name'])."', email = '".$_POST['email']."', mobile_phone = '".$_POST['mobile_phone']."', city = '".db_real_escape($_POST['city'])."', call_phone_time = '".db_real_escape($_POST['call_phone_time'])."', your_query = '".db_real_escape($_POST['your_query'])."', ipaddress='".$ip_address."', recv_date_time='".date("Y-m-d g:i:s")."', mem_add_from='1' ");
    ?>
    <script type="text/javascript">
    window.location.href='<?php echo SITE_URL;?>/contact-us.php?success_msg=Y';
    </script>
    <?php
  }
}


?>
<div class="page__banner" style="background-image: url('<?php echo SITE_URL;?>/frontEnd/images/hbanner/contactus.jpg');height: 200px; margin-top: 94px;">	
</div> 

<section class="bgf5f5f5 pt-5 contact-page cnct_form_sec">
  <div class="container">

    <div class="row"> 
      <!-- Welcome Text
      ============================================= -->
      <div class="col-md-5 pt-4">
              
            <div class="p-4 mb-4 bs-all bgfff"> 
            <h3>The Famous Halwai</h3>
            <p class="large"> 
              <?php
              if(!empty($contactinfo['office_address'])) {
                echo $contactinfo['office_address'];
              }
              ?>
            </div>           

            <div class="p-4 bs-all bgfff"> 
            <?php
            if(!empty($contactinfo['mobile_no'])) {
              ?>  
              <p class="fw6 mb-1">For any assistance call us at</p>            
              <p class="mb-3"><i class="fa fa-phone gray mr2px"></i> <a href="tel:<?php echo $contactinfo['mobile_no']?>" style="color:#181617;text-decoration: none"><?php echo $contactinfo['mobile_no']?></a></p>

              <p class="mb-3"><i class="fa fa-phone gray mr2px"></i> <a href="tel:<?php echo $contactinfo['mobile_no2']?>" style="color:#181617;text-decoration: none"> <?php echo $contactinfo['mobile_no2']?></p>
              <?php
            }
            if(!empty($contactinfo['email'])) {
              ?>
              <p class=""><i class="fa fa-envelope gray mr2px vam"></i> <a href="mailto:<?php echo $contactinfo['email']?>"> <?php echo $contactinfo['email']?></a></p>
              <?php
            }
            ?>
            </div> 
         </div> 
     
      <!-- Welcome Text End --> 
      
      <!-- Login Form
      ============================================= -->
      <div class="col-md-7 align-items-center">
        <div class="container my-4">
          <div class="contact-form">

            <?php
            if(!empty($_REQUEST['success_msg']) && $_REQUEST['success_msg']=='Y') {
              ?>
              <div class="text-center pt-3"><h3 class="text-success"><b>Your Query has recieved successfuly.<br><br> Our team will be contact soon.</b></h3></div>  
              <?php
            }
            else {
              ?>
              <h4 class="border-bottom pb-2">Please fill out your information below, will contact you shortly.</h4>
              <form name="contact_form" id="contact_form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" onSubmit="return validate_contact_form();">
              
                <div class="row">
                <div class="col-md-6"> 
                <input type="text" name="contact_name" class="form-control contact_name inputfild" placeholder="Your Name">
                </div>              
                
                
                <div class="col-md-6">            
                <input type="text" name="mobile_phone" class="form-control mobile_phone inputfild bgfff" placeholder="Mobile No" onkeypress="return isNumberKey(event);">
                <span class="error-info mobile-error" style="color:red;font-size:13px;"></span>
                </div>

                <div class="col-md-6 pt-2">           
                <input type="text" name="email" class="form-control email inputfild" placeholder="Email Address">
                <span class="error-info email-error" style="color:red;font-size:13px;"></span>
                </div>

                <div class="col-md-6  pt-2">          
                <input type="text" name="city" class="form-control city inputfild" placeholder="City">
                </div>

                <div class="col-md-6 pt-2">          
                <input type="text" name="call_phone_time" class="form-control call_phone_time" placeholder="Best Time To Call">           
                </div>   
                
                <div class="col-md-12 pt-2">           
                <textarea name="your_query" class="form-control your_query inputfild" style="height: 80px;" placeholder="Write your query"></textarea>
                </div>

                <div class="col-md-12 pt-2">          
                  <div class="row"> 
                  <div class="col-md-3 pt-2">  
                  	Verification Code 
                  </div>             
                  <div class="captcha_box">
                    <div class="calc_captcha"> <span><i><?php echo $_SESSION['CAPTCHKEY']?></i></span> </div>
                    <div class="captch_input">
                      <input type="text" name="inputCaptcha" class="inputCaptcha inputfild" autocomplete="off">
                      <input type="hidden" name="hiddenCaptcha" class="hiddenCaptcha" value="<?php echo $_SESSION['CAPTCHKEY']; ?>" />
                      <span class="error-info captcha-error" style="color:red;font-size:13px;"></span>
                    </div>
                  </div>
                </div>        
                </div>
                
                <div class="form-group col-md-12 text-center pt-2">
                <input type="hidden" value="contactus" name="cid" />
                <input type="submit" name="submit" class="submit_link_btn" value="Submit">           
                </div>
                </div> 
              </form>
              <?php
            }
            ?>            
            </div>
        </div>
      </div>
      <!-- Login Form End --> 
    </div>
  </div>
</section>

<section class="pb-5 pt-5">
  <div class="container-fluid">
      <div class="col-md-12 d-flex align-items-center">
        <div class="container my-4">

          <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3497.287591462928!2d77.15955917550585!3d28.770679975589584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sThe%20Famous%20Halwai%20B-191%2C%20KUSHAK%20NO%202%2C%20KADIPUR%20NEAR%20SANT%20SUJAN%20SINGH%20GURUDWARA%20DELHI%2C%20110036!5e0!3m2!1sen!2sin!4v1700988816413!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>         
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
    $(".contact_name").css('border-color','');
    //$(".company_name").css('border-color','');
    $(".mobile_phone").css('border-color','');
    $(".email").css('border-color','');
    //$(".country").css('border-color','');
    $(".city").css('border-color','');
    $(".call_phone_time").css('border-color','');
    //$(".query_for").css('border-color','');
    $(".your_query").css('border-color','');
    $(".inputCaptcha").css('border-color','');

    $(".error-info").html('');

    if(!$(".contact_name").val()) {
        $(".contact_name").css('background-color','#f4e0e0');          
        $(".contact_name").css('border-color','#ee4e4e');
        $(".contact_name").css('border','1px solid #e11f26');
        valid = false;
    }
   /* if(!$(".company_name").val()) {
        $(".company_name").css('background-color','#f4e0e0');          
        $(".company_name").css('border-color','#ee4e4e');
        $(".company_name").css('border','1px solid #e11f26');
        valid = false;
    }*/
    if(!$(".mobile_phone").val()) {
        $(".mobile_phone").css('background-color','#f4e0e0');          
        $(".mobile_phone").css('border-color','#ee4e4e');
        $(".mobile_phone").css('border','1px solid #e11f26');
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

    if(!$(".call_phone_time").val()) {
        $(".call_phone_time").css('background-color','#f4e0e0');          
        $(".call_phone_time").css('border-color','#ee4e4e');
        $(".call_phone_time").css('border','1px solid #e11f26');
        valid = false;
    }

    /*if(!$(".query_for").val()) {
        $(".query_for").css('background-color','#f4e0e0');          
        $(".query_for").css('border-color','#ee4e4e');
        $(".query_for").css('border','1px solid #e11f26');
        valid = false;
    }*/
    if(!$(".your_query").val()) {
        $(".your_query").css('background-color','#f4e0e0');          
        $(".your_query").css('border-color','#ee4e4e');
        $(".your_query").css('border','1px solid #e11f26');
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
</body> 
</html>
