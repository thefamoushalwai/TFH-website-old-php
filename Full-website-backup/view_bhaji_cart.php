<?php
include('includes/inc.php');
$metatitle='Our Bhaji - The Famous Halwai';
$metaDesc='';
$metaKeywords='';
include('inner_header.php');

if($_REQUEST['part']=='submitMenuCart') {    

  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
  //echo "INSERT IGNORE INTO order_members SET yname='".$_REQUEST['yname']."', email='".$_REQUEST['email']."', mobile_no='".$_REQUEST['mobileno']."', slocation='".$_REQUEST['slocation']."', occasions_slno='".$_REQUEST['occasions_slno']."', noof_people='".$_REQUEST['noof_people']."', event_date='".$_REQUEST['event_date']."', qryType='".$_REQUEST['qryType']."', address='".$_REQUEST['address']."', pincode='".$_REQUEST['pincode']."', city='".$_REQUEST['city']."', ip_address='".$ip_address."', recv_date='".date("Y-m-d")."', status='Y' <br>";
  db_query("INSERT IGNORE INTO order_members SET yname='".$_REQUEST['yname']."', email='".$_REQUEST['email']."', mobile_no='".$_REQUEST['mobileno']."', slocation='".$_REQUEST['slocation']."', occasions_slno='".$_REQUEST['occasions_slno']."', noof_people='".$_REQUEST['noof_people']."', event_date='".$_REQUEST['event_date']."', qryType='".$_REQUEST['qryType']."', address='".$_REQUEST['address']."', pincode='".$_REQUEST['pincode']."', city='".$_REQUEST['city']."', ip_address='".$ip_address."', recv_date='".date("Y-m-d")."', status='Y' ");

  $mid = db_insert_id();

  $orderID = Get_Order_No();
  db_query("UPDATE order_members SET order_no = '".$orderID."' WHERE slno='".$mid."' ");

  foreach ($_SESSION["bhaji_cart_item"] as $key => $value) {

      $menuArr = db_fetch_assoc(db_query("SELECT * from product_item_tbl WHERE slno IN (".$value.") order by menu_name ASC"));

      //echo "INSERT INTO order_detail SET order_members_slno = '".$mid."', event_cuisine_slno ='".$menuArr['event_cuisine_slno']."', menu_item_slno='".$value."', menu_rate='".$menuArr['menu_rate']."', state_slno='".$prodinfo['state_slno']."', veg_type='".$prodinfo['veg_type']."', recv_date='".date("Y-m-d")."', recv_time='".date("g:i:s")."', qryType='2' <br><br>";

      db_query("INSERT INTO order_detail SET order_members_slno = '".$mid."', event_cuisine_slno ='".$menuArr['event_cuisine_slno']."', menu_item_slno='".$value."', menu_rate='".$menuArr['menu_rate']."', state_slno='".$prodinfo['state_slno']."', veg_type='".$prodinfo['veg_type']."', recv_date='".date("Y-m-d")."', recv_time='".date("g:i:s")."', qryType='2', category='".$menuArr['category']."' ");
  }  
  
  ?>
  <script type="text/javascript">
  window.location.href = "<?php echo SITE_URL;?>/view_bhaji_cart.php?success=yes&slno=<?php echo $mid;?>";  
  </script>
  <?php
  exit;
} 
if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') { 

  unset($_SESSION["bhaji_cart_item"]); 
  ?>
  <div class="text-center mt-5" style="margin-top: 110px!important;height: 250px">
    <div style="font-size: 30px;font-weight: 600;color:#bb731b">Thank You!</div>
    <h3 class="text-success">Your order Details has submitted successfully.</h3>
    <h5>Our Representative will call you soon.</h5>
    <div style="font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight: 400; padding-top: 8px; color: #616161; line-height:20px">You can find the quotation of <a href="<?php SITE_URL ?>/pdf/download_quote_oth.php?slno=<?php echo $_REQUEST['slno']?>"  target="_blank">Download</a> as <img src="<?php echo SITE_URL;?>/frontEnd/images/pdf_icon.png" alt="Download Quote in PDF" width="20"></div>
  </div>
  <?php
}
else {  
  $cartbVal='0';
  if(!empty($_SESSION["bhaji_cart_item"])) {
      $cartbVal = count($_SESSION["bhaji_cart_item"]);
  }
  ?>
  <section id="menu-item" class="cartitemh">
      <div class="menu-container">
          <h4 class="menu-section text-left"> Your Bhaji Items
          <sup>(<span class="text-danger" id="cart-item" style="font-family: sans-serif;"><?php echo $cartbVal;?></span>)</sup> Summary</h4>          

          <?php
          if(!empty($_SESSION["bhaji_cart_item"])) {
              ?>
              <div class="row">
                  <div class="col-12 col-md-7 col-lg-9">                       
                      <div class="ps-shopping__table">
                          <table class="table table-center mb-0 table-hover">
                              <thead>
                                  <tr>
                                      <th>Image</th>
                                      <th>Items Name</th>
                                      <th>Price</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php
                              $total_cart_price =0;
                              foreach ($_SESSION["bhaji_cart_item"] as $key => $value) {
                                                                     
                                  $menuArr = db_fetch_assoc(db_query("SELECT * from product_item_tbl WHERE slno IN (".$value.") && category='1' order by menu_name ASC"));

                                   $total_cart_price += $menuArr['menu_rate'];
                                  ?>  
                                  <tr>
                                      
                                      <td class="ps-product__thumbnail">
                                      <?php                                       
                                      if(!empty($menuArr['menu_img'])) {
                                          ?>
                                          <img src="<?php echo SITE_URL;?>/frontEnd/items/<?php echo $menuArr['menu_img'];?>" style=" border-radius:4px;width: 100px;height: 50px;">
                                          <?php
                                      }
                                      else {
                                          ?>
                                          <img src="<?php echo SITE_URL;?>/frontEnd/images/NoImage.jpg" alt="" class="card-image" style=" border-radius: 4px;width: 100px;height: 50px;">
                                          <?php
                                      }
                                      ?>
                                      </td>

                                      <td class="ps-product__name"> <?php echo $menuArr['menu_name']?></td>
                                      <td class="ps-product__meta"> Rs. <?php echo $menuArr['menu_rate']?></td>

                                      <td class="ps-product__remove">
                                      <a style="cursor: pointer;" onclick="removetocartproduct('<?php echo $value; ?>');"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a>
                                      </td>

                                  </tr>
                                  <?php
                              }
                              ?>

                              </tbody>
                          </table>
                          <div style="font-size: 16px;">
                          <div class="text-right pr-5 mt-2"><b>Total Items Amount:</b> Rs.<b><?php echo $total_cart_price;?></b></div>
                          <?php
                          $gstAmt = round(18/100*$total_cart_price);
                          $totalPay = round($total_cart_price+$gstAmt);
                          ?>
                          <div class="text-right pr-5 mt-2"><b>GST (@18%):</b> Rs.<b><?php echo $gstAmt;?></b></div>
                          <div class="text-right pr-5 mt-2"><b>Pay Amount:</b> Rs.<span class="text-danger"><b><?php echo $totalPay;?></b></span></div>
                          </div>
                      </div>
                  </div>

                   <div class="col-12 col-md-5 col-lg-3 right-side-box">                    
                      <div class="ps-shopping__label"><b>Contact Detail</b></div>
                     <form name="cartForm" id="cartForm" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" onsubmit="return post_menucart_validation();">    
                      <div class="ps-shopping__box">
                          <div class="ps-shopping__form">                               
                              <div class="mb-3">Service Location
                              <select name="slocation" id="slocation" class="form-control ps-input">
                              <option value="">-- Service Location --</option>
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

                              <div class="mb-3">Delivery Address *
                              <input class="form-control ps-input" type="text" name="address" id="address" placeholder="Delivery">
                              </div>

                              <div class="mb-3">City*
                              <input class="form-control ps-input" type="text" name="city" id="city" placeholder="Enter City">
                              </div>

                              <div class="mb-3">Pincode*
                              <input class="form-control ps-input" type="texr" name="pincode" id="pincode" placeholder="Enter Pincode">
                              </div>

                              <div class="mb-3">Your Name
                              <input class="form-control ps-input" type="text" name="yname" id="yname" placeholder="Your Name">
                              </div>

                              <div class="mb-3">Mobile Phone no. 
                              <input class="form-control ps-input" type="text" name="mobileno" id="mobileno" placeholder=" eg.98xxxxxx10"><span id="mobileno-info" class="text-danger"></span>
                              </div>

                              <div class="mb-3">Email Address
                              <input class="form-control ps-input" type="text" name="email" id="email" placeholder="Email Address"><span id="email-info" class="text-danger"></span>
                              </div>
                          </div>

                          <div class="mb-2"> 
                          <input type="hidden" name="part" value="submitMenuCart">                       
                          <input type="submit" name="submit" id="ProceedNow" class="btn btn-success v-btn"> <b>Pay Amount:</b> Rs.<span class="text-danger"><b><?php echo $totalPay;?></b></span>
                          </div>
                          <div><a href="<?php echo SITE_URL;?>/bhaji.php"><small class="add-more">Add More Items</small></a></div>
                      </div>
                      </form>
                  </div>
              </div>
              <?php
          }
          else {
              ?>
              <h3 class="text-danger text-center mb-5 mt-5">Your Items Cart is Empty</h3>
              <?php
          }
          ?>
          </div>
      </div>  
  </div>
  </section>
  <?php
}
include('inner_footer.php');
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">     
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script>
function removetocartproduct(mid) {
    var action ='remove';
    var action_url = 'ajaxjQuery.php?part=bhajiSection';
    //alert(action_url);
    var queryString = "";
    if(action != "") {
        switch(action) {
            case "remove":
                queryString = 'action='+action+'&slno='+ mid;
            break;           
        }    
    }
    jQuery.ajax({
        type:'POST',
        url:action_url,
        data:queryString,
        dataType:'html',
        beforeSend: function(){
            $('#cart-item').html('Please Wait.....');
        },    
        success:function(data){
            //alert(data);
            $("#cart-item").html(data);
            if(action != "") {
                switch(action) {
                    case "remove":
                        //$("#addfeature_"+prodslno).hide();
                        //$("#addedfeature_"+prodslno).show();
                        /*$("#addprorange_"+mid).hide();
                        $("#addedprorange_"+mid).show();*/                        
                        setTimeout(function(){ location.reload(); }, 100);                 
                    break;                
                }    
            }
        },
        error:function (){}
    });
}  
</script>

<script>
/*$(document).ready(function() {
    $(document).on('click', '#ProceedNow', function() {
        var status = post_menucart_validation();
        if(status==true) {
            var action_url = "<?php echo SITE_URL;?>/ajaxjQuery.php?part=submitMenuCart";
            $.ajax({  
                type: 'POST',
                url: action_url,
                dataType: "html",
                cache : false,
                data : $("#cartForm").serialize(), //Encode a set of form elements as a string for submission                
                success: function(reponse) {          
                    //console.log(reponse);
                    //alert(reponse.trim());
                    if(reponse.trim()=='Y') {
                        window.location.href = "<?php echo SITE_URL;?>/thankyou.php";
                    }
                    else {
                        $('.wrongaddress').text('You are tring to wrong');                    
                        return false;
                    }
                },
                error: function(reponse, status) {        
                  alert(reponse);
                }
                //xhrFields: {withCredentials: true}
            });
        }
    });
}); 
*/
  function post_menucart_validation() {

      var valid = true;      
      $(".postInputText").css('background-color','');
      $("#slocation").css('border-color','');
      /*$("#occasions_slno").css('border-color','');
      $("#noof_people").css('border-color','');
      $("#event_date").css('border-color','');*/

      $("#address").css('border-color','');
      $("#city").css('border-color','');      
      $("#pincode").css('border-color','');

      $("#yname").css('border-color','');
      $("#mobileno").css('border-color','');      
      $("#email").css('border-color','');
      
   

      $(".error-info").html('');

      if(!$("#slocation").val()) {
          $("#slocation").css('background-color','#f4e0e0');        
          $("#slocation").css('border-color','#ee4e4e');
          $("#slocation").css('border','1px solid #e11f26');
          valid = false;
      }
      if(!$("#address").val()) {
          $("#address").css('background-color','#f4e0e0');          
          $("#address").css('border-color','#ee4e4e');
          $("#address").css('border','1px solid #e11f26');
          valid = false;
      }

      if(!$("#city").val()) {
          $("#city").css('background-color','#f4e0e0');          
          $("#city").css('border-color','#ee4e4e');
          $("#city").css('border','1px solid #e11f26');
          valid = false;
      }

      if(!$("#pincode").val()) {
          $("#pincode").css('background-color','#f4e0e0');          
          $("#pincode").css('border-color','#ee4e4e');
          $("#pincode").css('border','1px solid #e11f26');
          valid = false;
      }

      if(!$("#yname").val()) {
          $("#yname").css('background-color','#f4e0e0');          
          $("#yname").css('border-color','#ee4e4e');
          $("#yname").css('border','1px solid #e11f26');
          valid = false;
      }    

      if(!$("#mobileno").val()) {
          $("#mobileno").css('background-color','#f4e0e0');          
          $("#mobileno").css('border-color','#ee4e4e');
          $("#mobileno").css('border','1px solid #e11f26');
          valid = false;
      }
      else if($("#mobileno").val() && $("#mobileno").val().length<10) {
        $("#mobileno").css('background-color','#f4e0e0');        
        $("#mobileno").css('border-color','#ee4e4e');
        $("#mobileno").css('border','1px solid #e11f26');
        $("#mobileno-info").html("Mobile no. should be 10 digits");
        valid = false;
      } 
      else {
        $("#mobileno-info").html("");
      }

      if(!$("#email").val()) {
          $("#email").css('background-color','#f4e0e0');         
          $("#email").css('border-color','#ee4e4e');
          $("#email").css('border','1px solid #e11f26');
          valid = false;
      }
      else if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
          $("#email").css('background-color','#f4e0e0');
          $("#email-info").html("Please enter valid email address");
          $("#email").css('border-color','#ee4e4e');
          $("#email").css('border','1px solid #e11f26');
          valid = false;
      }
      else {
        $("#email-info").html("");
      }
      
      return valid;
  }
  </script>
</body> 
</html>