<?php
include('includes/inc.php');
$metatitle = 'Customize Your Plate Menu | The Famous Halwai';
$metaDesc = 'Create your own plate with handpicked dishes. Perfect for weddings, parties, and events—served fresh with authentic taste.';
$metaKeywords = 'customized plate menu, create your own plate, wedding plate catering, party plate menu';

include('inner_header.php');
?> 

<div class="page__banner" style="background-image: url('<?php echo SITE_URL;?>/frontEnd/images/hbanner/our_services.jpg');height: 180px;margin-top: 94px;"></div>

<!-- MENU ITEMS -->
<section id="menu-item" class="bhajih">
    <div class="menu-container">

        <h2  class="menu-section"> Our Menu</h2>

        <div class="text-center" style="font-size: 18px;">
        <!-- <a class="ViewCart"> <span style="color: #bb731b">My Menu Cart</span> <img src="<?php echo SITE_URL;?>/frontEnd/images/cart.png" width="25px" alt="">  <sup><span id="cart-item" style="font-size: 22px;"> (<?php echo $cartVal;?>) </span></sup>  -->
        <input type="hidden" class="cartval" value="<?php echo $cartVal;?>">    
        </a>
        </div>

        <div class="all-dishes">            
            <div class="left-dropdown-list">
                <div class="left-dropdown-list-inner">
                <div class="dropdown-menuItems_test">
                    <select name="slocation" class="form-control" id="slocation">
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

                

                <div class="dropdown-menuItems_test">
                    <select name="req_slno" class="form-control" id="occasions_slno">
                      <option value="">-- Your Occasion *--</option>
                      <?php
                       $ereq_qry = db_query("SELECT * FROM occasions_tbl WHERE display_status='Y' ");
                       while($ereqArr = db_fetch_assoc($ereq_qry)) {
                        if($_REQUEST['os']==$ereqArr['slno']) {
                            ?>
                            <option value="<?php echo $ereqArr['slno']?>" selected><?php echo $ereqArr['occasions_title']?></option>
                            <?php
                        }
                        else {
                            ?>
                            <option value="<?php echo $ereqArr['slno']?>"><?php echo $ereqArr['occasions_title']?></option>
                            <?php 
                        }
                      }
                      ?>      
                    </select>
                </div>

                <div class="dropdown-menuItems_test">
                    <select name="noof_people" class="form-control" id="noof_people">
                      <option value="">--No of People *--</option>
                      <?php
                       for ($pcnt=1; $pcnt <=500; $pcnt++) {
                           if($_REQUEST['np']=="$pcnt") {
                                ?>
                                <option value="<?php echo $pcnt?>" selected><?php echo $pcnt?> People</option>
                                <?php
                            }
                            else { 
                                ?>
                                <option value="<?php echo $pcnt?>"><?php echo $pcnt?> People</option>
                                <?php 
                            }
                      }
                      ?>      
                    </select>
                </div>
            </div>   

            <!-- <?php
            $cartVal='0';
            if(!empty($_SESSION["cart_item"])) {
                $cartVal = count($_SESSION["cart_item"]);
            }
            ?> 
            <div class="cart-button">
            <a class="ViewCart"> <span>Add to Menu Cart</span> <span id="cart-item"> (<?php echo $cartVal;?>) </span>
            <input type="hidden" class="cartval" value="<?php echo $cartVal;?>">    
            </a>
            </div> -->

            </div>

            <div class="right-dropdown-menu-list">
                <div class="dropdown-menuItems_test">
                    <select name="cuisineslno" class="form-control cuisineslno" id="cuisineslno">
                    <option value="0">All Dishes</option>
                    <option value="99" <?php echo ($_REQUEST['qc']==99)?('selected'):('')?>>Main Course</option>
                    <option value="8" <?php echo ($_REQUEST['qc']==8)?('selected'):('')?>>Starters</option>
                    <option value="4" <?php echo ($_REQUEST['qc']==4)?('selected'):('')?>>Live Barbecue</option>
                    <option value="5" <?php echo ($_REQUEST['qc']==5)?('selected'):('')?>>Breakfast</option>
                    <option value="6" <?php echo ($_REQUEST['qc']==6)?('selected'):('')?>>Desserts</option>
                    <option value="7" <?php echo ($_REQUEST['qc']==7)?('selected'):('')?>>Soups & Beverages</option>
                    <option value="10" <?php echo ($_REQUEST['qc']==10)?('selected'):('')?>>Breads, Rice and Raita</option>
                     <option value="9" <?php echo ($_REQUEST['qc']==9)?('selected'):('')?>>Traditional State Food</option>
                    </select>
                </div>
                <!-- <h4> <a href="#" class="cuisine-text"> Select Cuisines</a> </h4> -->


                <div class="vegnon-button">
                    <?php
                    if(!empty($_REQUEST['ftype']) && $_REQUEST['ftype']=='nonveg') {
                        ?>
                        <div class="menu-btn-container">
                        <span>
                        <img src="<?php echo SITE_URL;?>/frontEnd/images/veg_icon.png" width="20px" alt="">
                        <input type="checkbox" id="check" onclick="checkswitch('<?php echo SITE_URL;?>/our-menu.php?ftype=veg');">
                        <label for="check" class="button-one">
                        </label>
                        </span>
                        </div>

                        <div class="menu-btn-container-two">
                        <span>
                        <img src="<?php echo SITE_URL;?>/frontEnd/images/non_veg_icon.png" width="20px" alt="">
                        <input type="checkbox" id="check-two" onclick="checkswitch('<?php echo SITE_URL;?>/our-menu.php?ftype=nonveg')" checked>
                        <label for="check-two" class="button-two">
                        </label>
                        </span>
                        </div>                
                        <?php
                    }
                    else if(!empty($_REQUEST['ftype']) && $_REQUEST['ftype']=='veg') {
                        ?>
                        <div class="menu-btn-container">
                        <span>
                        <img src="<?php echo SITE_URL;?>/frontEnd/images/veg_icon.png" width="20px" alt="">
                        <input type="checkbox" id="check" onclick="checkswitch('<?php echo SITE_URL;?>/our-menu.php?ftype=veg');" checked>
                        <label for="check" class="button-one">
                        </label>
                        </span>
                        </div>

                        <div class="menu-btn-container-two">
                        <span>
                        <img src="<?php echo SITE_URL;?>/frontEnd/images/non_veg_icon.png" width="20px" alt="">
                        <input type="checkbox" id="check-two" onclick="checkswitch('<?php echo SITE_URL;?>/our-menu.php?ftype=nonveg')">
                        <label for="check-two" class="button-two">
                        </label>
                        </span>
                        </div>                
                        <?php
                    }
                    else {
                        ?>
                        <div class="menu-btn-container">
                        <span>
                        <img src="<?php echo SITE_URL;?>/frontEnd/images/veg_icon.png" width="20px" alt="">
                        <input type="checkbox" id="check" onclick="checkswitch('<?php echo SITE_URL;?>/our-menu.php?ftype=veg');">
                        <label for="check" class="button-one">
                        </label>
                        </span>
                        </div>

                        <div class="menu-btn-container-two">
                        <span>
                        <img src="<?php echo SITE_URL;?>/frontEnd/images/non_veg_icon.png" width="20px" alt="">
                        <input type="checkbox" id="check-two" onclick="checkswitch('<?php echo SITE_URL;?>/our-menu.php?ftype=nonveg')">
                        <label for="check-two" class="button-two">
                        </label>
                        </span>
                        </div>                
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$search_str =''; $menu_search_type='';
if(!empty($_REQUEST['qc'])) {
    if($_REQUEST['qc']==99) {
        $search_str = " &&  slno IN ('1','2','3') ";
    }
    else if($_REQUEST['qc']==0) {
    }
    else {
        $search_str = " &&  slno = '".$_REQUEST['qc']."' ";
    }
}
else if(!empty($_REQUEST['ftype'])) {
    if($_REQUEST['ftype']=='veg') {
        $menu_search_type = " && veg_type='N' ";
    }
    else {
        $menu_search_type = " && veg_type='Y' ";
    }
}

    
    //&& slno!='9'
//echo "SELECT * FROM event_cuisine WHERE display_status='Y' ".$search_str." <br>";
$cuisine_qry = db_query("SELECT * FROM event_cuisine WHERE display_status='Y' && slno!='9' ".$search_str." ");

if(db_num_rows($cuisine_qry)>0) {   
    while($cuisineArr = db_fetch_assoc($cuisine_qry)) {
    ?>
    <!-- NORTH INDIAN -->
    <section class="food-section">
        <div class="food-container">
            <div class="foods-container11">                    
            <?php
            //echo "SELECT * FROM menu_item_tbl WHERE event_cuisine_slno='".$cuisineArr['slno']."' ".$menu_search_type." <br>";
            $menu_item_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno='".$cuisineArr['slno']."' ".$menu_search_type." ");
            if(db_num_rows($menu_item_qry)>0) {
                ?>
                <h3 class="menu-txt"><?php echo $cuisineArr['cuisine_title']?></h3>
                <div class="blog-section">
                <div class="section-content blog">
                <?php
                $slno=1;
                while($menuArr = db_fetch_assoc($menu_item_qry)) {                               
                    ?>
                    <div class="cards">
                        <div class="card">
                            <div class="image-section">
                                <!-- <a href="blog-5.html"> -->
                                <?php                                       
                                if(!empty($menuArr['menu_img'])) {
                                    ?>
                                    <img src="<?php echo SITE_URL;?>/frontEnd/menuimg/<?php echo $menuArr['menu_img'];?>" alt="" class="card-image" style=" border-radius: 4px;">
                                    <?php
                                }
                                else {
                                    ?>
                                    <img src="<?php echo SITE_URL;?>/frontEnd/images/NoImage.jpg" alt="" class="card-image" style=" border-radius: 4px;">
                                    <?php
                                }
                                ?>  
                                <!-- </a> -->
                            </div>
                            <div class="article">

                                <div class="article-section-one">
                                <?php
                                if($menuArr['veg_type']=='Y') {
                                    ?>
                                    <img src="<?php echo SITE_URL;?>/frontEnd/images/non_veg_icon.png" width="20px" alt="non veg icon">
                                    <?php
                                }
                                else {
                                    ?>                                            
                                    <img src="<?php echo SITE_URL;?>/frontEnd/images/veg_icon.png" width="20px" alt="veg icon">
                                    <?php
                                }
                                $checkedVal ='';
                                if(!empty($_SESSION["cart_item"]) && in_array($menuArr['slno'], $_SESSION["cart_item"])) {
                                    $checkedVal = "checked";
                                }
                                ?>
                                <input type="checkbox" name="menu_item_arr[]" value="<?php echo $menuArr['slno']?>" onclick="return add_item_party_menu('<?php echo $menuArr['slno']?>');" <?php echo $checkedVal?>>
                                </div>
                                
                                <?php
                                if($menuArr['price_display']=='Yes') {
                                    ?>
                                    <div class="menurate">Rs. <?php echo $menuArr['menu_rate']?></div>
                                    <?php
                                }
                                ?>

                                <p><a href="<?php echo SITE_URL;?>/recipe/<?php echo $menuArr['flname']?>.php" target="_blank"><?php echo $menuArr['menu_name']?></a></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                </div>
                </div>
                <?php
            }
            ?>                            
                   
            </div>
        </div>
        </div>
        </section>
        <?php
    }
}

//Traditional State Food
if($_REQUEST['qc']==9 or empty($search_str)) {
    $state_cuisine_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' && event_cuisine_slno='9' group by state_slno ");
    if(db_num_rows($state_cuisine_qry)>0) {   
      while($cuisineStArr = db_fetch_assoc($state_cuisine_qry)) {
        ?>
        <!-- NORTH INDIAN -->
        <section class="food-section">
            <div class="food-container">
                <div class="foods-container">                    
                <?php
                //echo "SELECT * FROM menu_item_tbl WHERE state_slno='".$cuisineStArr['state_slno']."' ".$menu_search_type." <br>";
                $menu_item_qry = db_query("SELECT * FROM menu_item_tbl WHERE display_status='Y' &&  state_slno='".$cuisineStArr['state_slno']."' ".$menu_search_type." ");
                if(db_num_rows($menu_item_qry)>0) {

                     $stateArr = db_fetch_assoc(db_query("SELECT * FROM traditional_state WHERE slno='".$cuisineStArr['state_slno']."' "));
                    ?>
                    <h3 class="menu-txt" id="<?php echo str_replace(" ","-",$stateArr['state_name'])?>">Traditional State Food - <span class="text-danger"><?php echo $stateArr['state_name']?></span></h3>
                    <div class="blog-section">
                    <div class="section-content blog">
                    <?php
                    $slno=1;
                    while($menuArr = db_fetch_assoc($menu_item_qry)) {                               
                        ?>
                        <div class="cards">
                            <div class="card">
                                <div class="image-section">
                                    <!-- <a href="blog-5.html"> -->
                                    <?php                                       
                                    if(!empty($menuArr['menu_img'])) {
                                        ?>
                                        <img src="<?php echo SITE_URL;?>/frontEnd/menuimg/<?php echo $menuArr['menu_img'];?>" alt="" class="card-image" style=" border-radius: 4px;">
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <img src="<?php echo SITE_URL;?>/frontEnd/images/NoImage.jpg" alt="" class="card-image" style=" border-radius: 4px;">
                                        <?php
                                    }
                                    ?>  
                                    <!-- </a> -->
                                </div>
                                <div class="article">

                                    <div class="article-section-one">
                                    <?php
                                    if($menuArr['veg_type']=='Y') {
                                        ?>
                                        <img src="<?php echo SITE_URL;?>/frontEnd/images/non_veg_icon.png" width="20px" alt="non veg icon">
                                        <?php
                                    }
                                    else {
                                        ?>                                            
                                        <img src="<?php echo SITE_URL;?>/frontEnd/images/veg_icon.png" width="20px" alt="veg icon">
                                        <?php
                                    }
                                    $checkedVal ='';
                                    if(!empty($_SESSION["cart_item"]) && in_array($menuArr['slno'], $_SESSION["cart_item"])) {
                                        $checkedVal = "checked";
                                    }
                                    ?>
                                    <input type="checkbox" name="menu_item_arr[]" value="<?php echo $menuArr['slno']?>" onclick="return add_item_party_menu('<?php echo $menuArr['slno']?>');" <?php echo $checkedVal?>>
                                    </div>
                                     <?php
                                    if($menuArr['price_display']=='Yes') {
                                        ?>
                                        <div class="menurate">Rs. <?php echo $menuArr['menu_rate']?></div>
                                        <?php
                                    }
                                    ?>                                
                                    
                                    <p><a href="<?php echo SITE_URL;?>/recipe/<?php echo $menuArr['flname']?>.php"  target="_blank"><?php echo $menuArr['menu_name']?></a></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                    </div>
                    <?php
                }
                ?>                            
                       
                </div>
            </div>
            </div>
        </section>
        <?php
    }
    }
}
?>

    <!-- FOOD MENU END HERE -->

<?php
include('inner_footer.php');
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">     
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script>
function add_item_party_menu(mid) {
    var action ='add';
    var action_url = 'ajaxjQuery.php?part=menuSection';
    //alert(action_url);
    var queryString = "";
    if(action != "") {
        switch(action) {
            case "add":
                queryString = 'action='+action+'&slno='+ mid;
            break;           
        }    
    }
    //alert(action_url);
    jQuery.ajax({
        type:'POST',
        url:action_url,
        data:queryString,
        dataType:'html',
        beforeSend: function(){
            //$('#cart-item').html('Adding.....');
        },    
        success:function(data){
            //alert(data);
            $("#cart-item").html(data);
            if(action != "") {
                switch(action) {
                    case "add":                    
                    setTimeout(function(){ location.reload(); }, 100);                 
                    break;                
                }    
            }
        },
        error:function (){}
    });
}   
    
$(document).on("click", ".ViewCart", function(e) {
    var slocation = $('#slocation').val();
    var occasions_slno = $('#occasions_slno').val();
    var noof_people = $('#noof_people').val();
    var cartval = $('.cartval').val();    
    if(slocation!='' && occasions_slno!='' && noof_people!='' && cartval.length!='0') {
        window.location.href = "<?php echo SITE_URL;?>/view_menu_cart.php?sl="+slocation+"&os="+occasions_slno+"&np="+noof_people+"&qtype=<?php echo $_REQUEST['qtype'];?>";
    }
    else {
        alert("Please Select Service Location, Your Occasion, No. of People before view Cart Menu Item.");
    }
});    
    

/*function show(anything) {
    document.querySelector('.textBox').value = anything;
}
let dropdown = document.querySelector('.dropdown-menuItems');
dropdown.onclick = function () {
    dropdown.classList.toggle('active');
}*/
</script>
<script type="text/javascript">
$(document).ready(function(){    
    $("#cuisineslno").change(function () {
        if($('#cuisineslno').val().length!='') {
        var pageurl = '<?php echo $_SERVER['PHP_SELF']?>';            
        var cuisine_val = $('#cuisineslno').val();           
        if(cuisine_val==0) {}
        else { pageurl += '?qc='+cuisine_val;}
        }        
        location = pageurl;
    });
});
function checkswitch(pageurl){    
    location.href = pageurl;
}
</script>
</body> 
</html>