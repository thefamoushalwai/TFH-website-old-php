<style >
.center { text-align: center }
table { margin:0; padding:0; border-collapse:collapse; }
th, td { border:1px solid #666666; vertical-align:top; }
th { padding:3px 2px; line-height:1.2; }
td { padding:2px; line-height:1.2; }
.nobdr { border:none; }
.desc-table th, .desc-table td { font-size: 12px }
</style>
<page backtop="3mm" backbottom="1mm" backleft="2mm" backright="2mm" style="font-size: 12px;"> 
<table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
  <tr>
    <td style="width:100%;padding:12px;">
      <table cellspacing="0" cellpadding="0" border="0" style="width: 100%; margin-bottom:15px;">
        <tr>
          <td valign="middle" class="nobdr" style="width: 25%;"><img src="https://www.thefamoushalwai.com/frontEnd/images/logo.png" alt="" border="0" height="70" ></td>
          <td valign="middle" align="right" class="nobdr" style="width: 50%; font-weight: bold; font-size: 22px;">Quotation</td>         
        </tr>
      </table>

      <table cellspacing="0" cellpadding="0" style="width: 100%; margin-bottom:10px; padding:10px; border: solid 1px #666666; border-collapse:separate;">
        <tr>
          <td class="nobdr" style="width: 80%;">
            <strong>Name: <?php echo $varr['yname']?></strong><br>
            Mobile No.: <?php echo $varr['mobile_no']?><br>
            Email: <?php echo $varr['email']?><br>
            Service Location: <?php echo $varr['slocation']?><br>
            No of People: <?php echo $varr['noof_people']?><br>
            Event Date: <?php echo $varr['event_date']?><br>    
            Your Event: <?php echo $occasionsArr['occasions_title']?>
            </td>
        </tr>
      </table>

      <table cellspacing="0" cellpadding="0" border="0" class="desc-table" style="width:100%; margin-bottom:3px;font-size: 12px;">
        <tr style="background-color: #135884; color: #fff !important; font-size: 14px; font-weight: 400;">
          <th align="center" style="width: 8%;padding: 3px;color:#fff">Sr. No.</th>
          <th align="center" style="width: 45%;padding: 3px;color:#fff">Image</th>
          <th align="center" style="width: 12%;padding: 3px;color:#fff">Menu Name</th>
          <th align="center" style="width: 8%;padding: 3px;color:#fff">Cuisine</th>
          <th align="center" style="width: 12%;padding: 3px;color:#fff">Food Type</th>          
          <th align="center" style="width: 15%;padding: 3px;color:#fff">Price</th>
        </tr>
        <?php
        $order_detail_qry = db_query("SELECT * FROM order_detail WHERE order_members_slno = '".$varr['slno']."'");
        $slno=1; $total_cart_price =0;
        while($menuArr = db_fetch_array($order_detail_qry)) {
          $cuisineArr = db_fetch_assoc(db_query("SELECT * FROM event_cuisine WHERE slno=".$menuArr['event_cuisine_slno']." "));
          ?>
          <tr>
            <td><?php echo $slno?></td>
            <td> <img src="<?php echo SITE_URL;?>/frontEnd/menuimg/<?php echo $menuArr['menu_img'];?>" style="width:60px;height:50px"></td>
            <td><?php echo $varr['menu_name']?></td>
            <td><?php echo $cuisineArr['cuisine_title']?></td>
            <td><img src="<?php echo SITE_URL;?>/frontEnd/menuimg/<?php echo $menuArr['menu_img'];?>" style=" border-radius: 4px;width: 30px;height: 30px;"></td>
            <td>Rs.<?php echo $varr['menu_rate']?></td>
          </tr>       
          <?php
          $slno++;
          $total_cart_price +=$menuArr['menu_rate'];
        }
        ?>
      </table>

      <table cellspacing="0" cellpadding="0" border="0" class="desc-table" style="width:100%; background-color: #eee;">
        <tr>
          <td style="width: 15%; padding:3px 5px;"><strong><strong>Total Amount</strong></strong></td>
          <td style="width: 85%; padding:3px 5px">Rs. <?php echo $total_cart_price?></td>
        </tr>
      </table>

      <table cellspacing="0" cellpadding="0" border="1" class="desc-table" style="width: 100%; margin-top:10px;">
        <tr><td colspan="2" valign="top" align="center" class="nobdr" style="width: 100%; padding:0">* This is a Computer Generated Quotation</td></tr>
      </table>
    </td>
    </tr>  
    </table>  
</page>
