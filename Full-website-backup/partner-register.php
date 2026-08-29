<?php
include('includes/inc.php');
//For Captch Start
session_start();
$captcha_val = 'ABCDEFGHJKLMNOPQRSTUVWXYZ123456789abcdefghijkmnpqrstuvwxyz';
$captcha_val = substr(str_shuffle($captcha_val), 0, 5);
$_SESSION['CAPTCHKEY'] = $captcha_val;
//For Captch END

$metatitle='Register Partners - The Famous Halwai';
$metaDesc='';
$metaKeywords='';
include('inner_header.php');

if($_POST['pID']=='AddPostForm') {

  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
      $ip_address = $_SERVER['REMOTE_ADDR'];
  }

  $errorMsg='';
  if(empty($_POST['profession'])) {
      $errorMsg .= 'Type of Partner <br>';
  }
  if(empty($_POST['contact_name'])) {
      $errorMsg .= 'Your Name <br>';
  }
  if(empty($_POST['mobile_phone'])) {
      $errorMsg .= 'Please enter Mobile Number  <br>';
  }
  if(empty($_POST['state'])) {
      $errorMsg .= 'Please Select State <br>';
  }
  if(empty($_POST['city'])) {
      $errorMsg .= 'Please enter City <br>';
  }
  if(empty($_POST['address'])) {
      $errorMsg .= 'Please enter Address <br>';
  }
  if(empty($_POST['experience'])) {
      $errorMsg .= 'Please Select Experience  <br>';
  }
//   if(empty($_POST['total_bookings'])) {
//       $errorMsg .= 'Please Select Total Your Bookings  <br>';
//   } 
//   if(empty($_POST['rating'])) {
//       $errorMsg .= 'Please Select Work Rating  <br>';
//   }  

  if(empty($$errorMsg)) {

    $_POST['email'] = trim($_POST['email']);
    $_POST['mobile_phone'] = trim($_POST['mobile_phone']);

    //echo "INSERT INTO prof_job_worker SET contact_name  = '".db_real_escape(trim($_POST['contact_name']))."', about_us = '".db_real_escape(trim($_POST['about_us']))."', status='".$_POST['status']."', email='".db_real_escape($_POST['email'])."', mobile_phone ='".db_real_escape($_POST['mobile_phone'])."', profession = '".db_real_escape($_POST['partner_type'])."', rating = '".db_real_escape($_POST['rating'])."', experience = '".db_real_escape($_POST['experience'])."', total_bookings = '".db_real_escape($_POST['total_bookings'])."', special_keyword = '".db_real_escape($_POST['special_keyword'])."', state = '".$_POST['state']."', city = '".db_real_escape($_POST['city'])."', address = '".db_real_escape($_POST['address'])."', ipaddress='".$ip_address."', recv_date='".date("Y-m-d")."', referralcode='".$_POST['referralcode']."' <br>";

    db_query("INSERT INTO prof_job_worker SET contact_name  = '".db_real_escape(trim($_POST['contact_name']))."', about_us = '".db_real_escape(trim($_POST['about_us']))."', email='".db_real_escape($_POST['email'])."', mobile_phone ='".db_real_escape($_POST['mobile_phone'])."', profession = '".db_real_escape($_POST['partner_type'])."',  experience = '".db_real_escape($_POST['experience'])."', special_keyword = '".db_real_escape($_POST['special_keyword'])."', state = '".$_POST['state']."', city = '".db_real_escape($_POST['city'])."', address = '".db_real_escape($_POST['address'])."', ipaddress='".$ip_address."', recv_date='".date("Y-m-d")."', referralcode='".$_POST['referralcode']."' ");

     $pslno = db_insert_id();

     if(!empty($pslno)) {
        $pageurl = create_valid_flnm ($_POST['contact_name']);
        $flanurl = $pageurl."_".$pslno;        
        db_query ("UPDATE prof_job_worker SET flname='".$flanurl."' WHERE slno='".$pslno."' ");
        if(!empty($_FILES['menuImage']['name'])) {
          $ext = pathinfo($_FILES['menuImage']['name'],PATHINFO_EXTENSION);     
          $image_name = $pslno.".".$ext;       
          $image_upload_path = BASEDIR."/frontEnd/professional/".$image_name;
          move_uploaded_file($_FILES['menuImage']['tmp_name'], $image_upload_path); 
          db_query ("UPDATE prof_job_worker SET userimg='".$image_name."' WHERE slno='".$pslno."' ");
        }
        if(!empty($_FILES['document']['name'])) {
    $doc_ext = pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION);
    $allowed_ext = ['pdf', 'doc', 'docx', 'jpg', 'png'];
    
    if(in_array($doc_ext, $allowed_ext)) {
        $doc_name = "doc_".$pslno.".".$doc_ext;
        $doc_upload_path = BASEDIR."/frontEnd/documents/".$doc_name;
        move_uploaded_file($_FILES['document']['tmp_name'], $doc_upload_path);
        
        // Store document filename in the database
        db_query("UPDATE prof_job_worker SET document='".$doc_name."' WHERE slno='".$pslno."'");
    } else {
        echo "<script>alert('Invalid file type! Only PDF, DOC, DOCX, JPG, and PNG are allowed.');</script>";
    }
}

        
        
        
        
        
        
    }
    ?>
    <script type="text/javascript">
    window.location.href='<?php echo SITE_URL;?>/partner-register.php?success_msg=Y';
    </script>
    <?php
  }
}
?>
<style type="text/css">
.reg_error_msg{color:red;font-size:16px;}      
.pr-hb {background-image: linear-gradient(to right,#2c9284,#bb6327);color: #fff;padding: 30px 0 20px 0;}
.ffos {font-family: 'Open Sans',sans-serif;}
.fw {width: 1155px;margin: 0 auto;}
.prhb-heading {text-align: center;}
.prhb-heading h1 {font-size: 32px;font-weight: 600;line-height: 40px;}
.prhb-heading p {font-size: 16px;font-weight: 400;line-height: 25px;}
.nb-qutit-head {font-size: 18px;font-weight: 600;}
.nb-quote {border-bottom: 1px dotted #a7a7a7;padding-bottom: 10px;margin-top: 7px;}
.nb-qutit.nb-pr.nb-dble {color: #f28b00;font-size: 15px;font-weight: 600;margin-top: 12px;}
.qutits-fs {font-size: 14px;}
.nb-w40 {padding: 0px 10px;}
.head-title {font-size: 16px;font-weight: 600;color: #bb731b;}
</style>

<div class="page__banner" style="background: url('<?php echo SITE_URL;?>/frontEnd/images/hbanner/hand-banner.png');height: 200px; margin-top: 94px;/* #f1f1f1 right no-repeat; background-size: 100%; color: #000;padding: 84px 0 84px 0;height: 200px;*/">	
</div>  

<section class="my-5 section_lr">
<div class="container-fluid">
<h1 class="h1title">Partner Registration</h1>  
    <?php
    if(!empty($errorMsg)) {
        ?>
        <div class="text-danger"><?php echo $errorMsg?></div>
        <?php
    }
    ?>
 <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">   
            <div class="join d-flex">
            <form name="postReqForm" id="postReqForm" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" onsubmit="return validate_contact_form();" enctype="multipart/form-data" autocomplete="off">
              <div class="regst-left">
                <h2 class="head-title text-center">Kindly share your information for become partner of The Famous Halwai.</h2>
                <h2 class="head-title text-center">(कृपया अपनी जानकारी साझा करें ताकि आप The Famous Halwai के पार्टनर बन सकें।)</h2>
                <?php
                if(isset($_REQUEST['success_msg']) && $_REQUEST['success_msg']=='Y') {
                  ?>
                  <div class="text-center mt-3 text-success"><h2>Thank you for interesting a become partner.<br>Our Representative will call you soon.</h2></div>
                  <?php
                }
                else {
                    ?>    
                    <div class="form-steps-content mt-5">
                      
                        <!-- <form action="" class=""> -->
                      <div class="row">
                        <div class="form-group col-md-6">
                        <label for="country">Type of Partner(पार्टनर के प्रकार)<span class="text-danger">*</span></label>
                        <select class="floating-select form-control partner_type inputfild" id="partner_type" name="partner_type">
                        <option value="">-- Type of Partner--</option>
                        <option value="Halwai">Halwai</option>
                        <option value="Chef">Chef</option>
                        <option value="Caterers">Caterers</option>
                        <option value="House Wife">House Wife</option>
                        <option value="Others">Others</option>
                        </select>                        
                        </div>

                        <div class="form-group col-md-6">
                        <label for="yname">Your Name (आपका नाम)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control contact_name inputfild" id="contact_name" placeholder="Enter Your Name" name="contact_name">
                        <span id="yname-info" class="error-info reg_error_msg"></span>
                        </div>

                        <div class="form-group col-md-6">
                        <label for="mobile">Mobile Number (मोबाइल नंबर)<span class="text-danger">*</span></label>
                        <input type="number" class="form-control mobile_phone inputfild bgfff" id="mobile_phone" placeholder="Enter Mobile Number" name="mobile_phone" onkeypress="return isNumberKey(event);">
                        <span id="phone-info" class="error-info mobile_phone_error"></span>    
                        </div>


                        <div class="form-group col-md-6">
                        <label for="city">Enter Email (ईमेल दर्ज करें)</label>
                        <input type="text" class="form-control email inputfild" id="email" placeholder="Enter Email" name="email">                        
                        </div>

                        <div class="form-group col-md-6">
                        <label for="country">Select State(राज्य चुनें) <span class="text-danger">*</span></label>
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
                        <label for="city">Enter City (शहर दर्ज करें) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control city inputfild" id="city" placeholder="Enter City Name" name="city">
                        <span id="city-info" class="error-info reg_error_msg"></span>
                        </div>


                        <div class="form-group col-md-12">
                        <label for="city">Address (पता)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control address inputfild" id="address" placeholder="Enter Address" name="address">                       
                        <span id="address-info" class="error-info reg_error_msg"></span>
                        </div>

                         <div class="form-group col-md-6">
                        <label for="city">Upload Your Photo (अपनी फोटो अपलोड करें)<br><small class="text-danger" style="font-size: 12px;">Note: (W:150px & H:150px) and JPEG,JPG,PNG only</small></label>
                        <input type="file" class="form-control inputfild" name="menuImage">
                        </div>
                        
                         <div class="col-md-6">
                         <label for="document">Upload Your Document(अपना दस्तावेज़ अपलोड करें):</label>
                            <input type="file" name="document" id="document" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png" required>
                         </div>
   

                        <!--<div class="form-group col-md-6">-->
                        <!--<label for="mobile">Work Rating <span class="text-danger">*</span></label>-->
                        <!--<select class="floating-select form-control rating inputfild" id="rating" name="rating">-->
                        <!--<option value="">-- Select One--</option>-->
                        <!--<?php-->
                        <!--for($i=1;$i<=5;$i++) {-->
                        <!--     ?>-->
                        <!--    <option value="<?php echo $i;?>"><?php echo $i;?></option>-->
                        <!--    <?php-->
                        <!--}-->
                        <!--?>-->
                        <!--</select>    -->
                        <!--</div>-->


                        <div class="form-group col-md-6">
                        <label for="city">Your Experience (आपका अनुभव) (<small>in Years</small>) <span class="text-danger">*</span></label>
                        <select class="floating-select form-control experience inputfild" id="experience" name="experience">
                        <option value="">-- Select One--</option>
                        <?php
                       for($i=1;$i<=30;$i++) {
                             ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php
                        }
                        ?>
                        </select> 
                        </div>

                        <!--<div class="form-group col-md-6">-->
                        <!--<label for="mobile">Total Your Bookings <span class="text-danger">*</span></label>-->
                        <!--<select class="floating-select form-control total_bookings inputfild" id="total_bookings" name="total_bookings">-->
                        <!--<option value="">-- Select One--</option>-->
                        <!--<?php-->
                        <!--for($i=1;$i<=500;$i++) {-->
                        <!--     ?>-->
                        <!--    <option value="<?php echo $i;?>"><?php echo $i;?></option>-->
                        <!--    <?php-->
                        <!--}-->
                        <!--?>-->
                        <!--</select>                       -->
                        <!--</div>-->

                        <div class="form-group col-md-12">
                        <label for="city">Specialization in Your Profession(आपके पेशे में विशेषज्ञता) <span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control special_keyword inputfild" id="special_keyword" placeholder="Enter Specialization in Profession" name="special_keyword"></textarea>
                        </div>  

                        <div class="form-group col-md-12">
                        <label for="city">About Your Self(अपने बारे में बताएं) <small>(max. 300 chars)</small> <span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control about_us inputfild" id="about_us" placeholder="Enter About Your Self" name="about_us" rows="7"></textarea>
                        </div>                        

                        <div class="form-group col-md-12">
                        <label for="city">Referral Code (रेफरल कोड)<!-- <span class="text-danger">*</span> --></label>
                        <input type="text" class="form-control ReferralCode" id="ReferralCode" placeholder="Enter Referral Code" name="referralcode">
                        <!-- <span id="city-info" class="error-info reg_error_msg"></span> -->
                        </div>

                        <!--<div class="col-md-8 pt-2">          -->
                        <!--  <div class="row"> -->
                        <!--  <div class="col-md-5 pt-2">  -->
                        <!--    Verification Code -->
                        <!--  </div>             -->
                        <!--  <div class="captcha_box">-->
                        <!--    <div class="calc_captcha"> <span><i><?php echo $_SESSION['CAPTCHKEY']?></i></span> </div>-->
                        <!--    <div class="captch_input">-->
                        <!--      <input type="text" name="inputCaptcha" class="inputCaptcha inputfild form-control" autocomplete="off">-->
                        <!--      <input type="hidden" name="hiddenCaptcha" class="hiddenCaptcha" value="<?php echo $_SESSION['CAPTCHKEY']; ?>" />-->
                        <!--      <span class="error-info captcha-error" style="color:red;font-size:13px;"></span>-->
                        <!--    </div>-->
                        <!--  </div>-->
                        <!--</div>        -->
                        <!--</div>-->

                        
<div class="form-group">
  <label>
    <input type="checkbox" id="consent_checkbox" required>
    I agree to the <a href="#" onclick="showTermsPopup(); return false;">Terms & Conditions</a>
  </label>
</div>
                      
                    </div>
                    <!-- </form>   -->                    
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
        
        <div id="termsModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); z-index:9999;">
  <div style="background:#fff; padding:20px; margin:10% auto; width:80%; max-width:600px; position:relative;">
    <h4>Terms & Conditions</h4>
    <p>This Terms of Use agreement was last updated on 1st Jan 2024. This Terms of Use agreement is effective as of 15th July 2015.

THE FAMOUS HALWAI Private Limited ("THE FAMOUS HALWAI"), primarily operates, controls and manages the Services (as defined below) provided by it from its Corporate Office at B-191 Kushak No-2 Kadhi Pur Delhi registered with GSTIN: 07AAHCK2813M1ZD and CIN:U55204DL2018PTC339550.

PLEASE READ THE TERMS OF USE THOROUGHLY AND CAREFULLY.

</p>
    <button onclick="closeTermsPopup();" style="position:absolute; top:10px; right:10px;">X</button>
  </div>
</div>

<script>
function showTermsPopup() {
  document.getElementById('termsModal').style.display = 'block';
}
function closeTermsPopup() {
  document.getElementById('termsModal').style.display = 'none';
}
</script>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pt-5">
            <div class="nb-w40">
                <?php
                $benefit_Qry = db_query("SELECT * FROM benefit_point_tbl WHERE website_slno ='8' LIMIT 0, 1");
                if(db_num_rows($benefit_Qry)>0) {
                  $benArr = db_fetch_assoc($benefit_Qry);
                  
                  ?>
                  <div class="nb-qutit-head"><?php echo $benArr['benefit_title'];?></div>
                  <?php
                  $benefitQry = db_query("SELECT * FROM benefit_point_tbl WHERE website_slno ='8' ");
                  while($benefitArr=db_fetch_assoc($benefitQry)) {
                    ?>
                    <div class="nb-quote">                
                    <div class="nb-qutits nb-pr qutits-fs"><?php echo $benefitArr['benefit_point']?></div>
                    </div>
                    <?php
                  }
                }
                ?>

                <!-- <div class="nb-quote">                
                    <div class="nb-qutits nb-pr qutits-fs">Get Leads & Increase your revenue</div>
                </div>

                <div class="nb-quote">                
                    <div class="nb-qutits nb-pr qutits-fs">Improve occupancy, hiring, profits</div>
                </div>

                <div class="nb-quote">                
                    <div class="nb-qutits nb-pr qutits-fs">Support in the form of staffing, training, marketing, sales acquisition etc.</div>
                </div>

                <div class="nb-quote">                
                    <div class="nb-qutits nb-pr qutits-fs">Explore various events across a wide range of customer base</div>
                </div> -->
                
                
            </div>
        </div>
    </div>	


</div>      
</section>
	
<br><br>

<?php

include('inner_footer.php');
?>
<script>
function validate_contact_form() { 
  
   var valid = true;      
    $(".inputfild").css('background-color','');
    $(".partner_type").css('border-color','');
    $(".contact_name").css('border-color','');
    $(".address").css('border-color','');
    $(".mobile_phone").css('border-color','');
    $(".email").css('border-color','');
    $(".state").css('border-color','');
    $(".city").css('border-color','');

    // $(".rating").css('border-color','');
    $(".experience").css('border-color','');
    // $(".total_bookings").css('border-color','');
    $(".special_keyword").css('border-color','');
    $(".about_us").css('border-color','');
    
    //$(".query_for").css('border-color','');
    //$(".your_query").css('border-color','');
    $(".inputCaptcha").css('border-color','');

    $(".error-info").html('');

    if(!$(".partner_type").val()) {
        $(".partner_type").css('background-color','#f4e0e0');          
        $(".partner_type").css('border-color','#ee4e4e');
        $(".partner_type").css('border','1px solid #e11f26');
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

//   if(!$(".rating").val()) {
//         $(".rating").css('background-color','#f4e0e0');          
//         $(".rating").css('border-color','#ee4e4e');
//         $(".rating").css('border','1px solid #e11f26');
//         valid = false;
//     }
    if(!$(".experience").val()) {
        $(".experience").css('background-color','#f4e0e0');          
        $(".experience").css('border-color','#ee4e4e');
        $(".experience").css('border','1px solid #e11f26');
        valid = false;
    }
    // if(!$(".total_bookings").val()) {
    //     $(".total_bookings").css('background-color','#f4e0e0');          
    //     $(".total_bookings").css('border-color','#ee4e4e');
    //     $(".total_bookings").css('border','1px solid #e11f26');
    //     valid = false;
    // }
    if(!$(".special_keyword").val()) {
        $(".special_keyword").css('background-color','#f4e0e0');          
        $(".special_keyword").css('border-color','#ee4e4e');
        $(".special_keyword").css('border','1px solid #e11f26');
        valid = false;
    }
    if(!$(".about_us").val()) {
        $(".about_us").css('background-color','#f4e0e0');          
        $(".about_us").css('border-color','#ee4e4e');
        $(".about_us").css('border','1px solid #e11f26');
        valid = false;
    }

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
