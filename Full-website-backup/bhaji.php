<?php
include('includes/inc.php');
$metatitle = 'Bhaji Box for Wedding & Gifting | Order Custom Boxes Online';
$metaDesc = 'Make your wedding or event special with handcrafted bhaji boxes. Elegant & customisable gift packs for weddings, poojas & more. Order online today!';
$metaKeywords = 'bhaji box for wedding, wedding bhaji box, bhaji box for gifting, best bhaji box in delhi';

include('inner_header.php');

$cartBVal='0';
if(!empty($_SESSION["bhaji_cart_item"])) {
    $cartBVal = count($_SESSION["bhaji_cart_item"]);
}
?>


<div class="page__banner" style="background-image: url('<?php echo SITE_URL;?>/frontEnd/images/hbanner/our_services.jpg');height: 200px;"></div>
<!-- MENU ITEMS -->
<section id="menu-item" class="bhajih">
    <div class="menu-container">
    <h2  class="serv_head text-center"> Bhaji Services</h2>
    <div class="text-center" style="font-size:18px;">
    <a class="ViewCart"> <span style="color: #bb731b">Cart</span> <img src="<?php echo SITE_URL;?>/frontEnd/images/foodcart.jpg" width="35px" alt=""><sup><span id="cart-item" style="font-size: 22px;">(<?php echo $cartBVal;?>) </span></sup> 
    <input type="hidden" class="cartval" value="<?php echo $cartBVal;?>">    
    </a>
    </div>
    
    </div>
</section>

        
<section class="food-section">
    <div class="food-container">
        <div class="foods-container">                    
        <?php
        $bhaji_qry = db_query("SELECT * FROM product_item_tbl WHERE display_status='Y' && category='1' ");
        if(db_num_rows($bhaji_qry)>0) {
            ?>                    
            <div class="blog-section">
            <div class="section-content blog">
            <?php
            $slno=1;
            while($menuArr = db_fetch_assoc($bhaji_qry)) {                               
                ?>
                <div class="cards">
                    <div class="card">
                        <div class="image-section">
                            <!-- <a href="blog-5.html"> -->
                            <?php                                       
                            if(!empty($menuArr['menu_img'])) {
                                ?>
                                <img src="<?php echo SITE_URL;?>/frontEnd/items/<?php echo $menuArr['menu_img'];?>" alt="" class="card-image" style=" border-radius: 4px;">
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
                            <small><b>Rs. <?php echo $menuArr['menu_rate']?></b></small>	
                            <?php                                    
                            $checkedVal ='';
                            if(!empty($_SESSION["bhaji_cart_item"]) && in_array($menuArr['slno'], $_SESSION["bhaji_cart_item"])) {
                                $checkedVal = "checked";
                            }
                            ?>
                            <input type="checkbox" name="menu_item_arr[]" value="<?php echo $menuArr['slno']?>" onclick="return add_item_party_menu('<?php echo $menuArr['slno']?>');" <?php echo $checkedVal?>>
                            </div>
                            
                            <p> <?php echo $menuArr['menu_name']?></p>
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
include('inner_footer.php');
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">     
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script>
function add_item_party_menu(mid) {
    var action ='add';
    var action_url = 'ajaxjQuery.php?part=bhajiSection';
    //alert(action_url);
    var queryString = "";
    if(action != "") {
        switch(action) {
            case "add":
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
    window.location.href = "<?php echo SITE_URL;?>/view_bhaji_cart.php";    
}); 
</script>
</body> 
</html>