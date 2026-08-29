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
          <td valign="middle" align="right" class="nobdr" style="width: 70%;text-align: right">
          <strong style="font-size:18px;margin-bottom:5px">Quotation</strong><br>
          Issue Dated : <?php echo date_short_daymonthyear($varr['recv_date']);?>  
          </td>
        </tr>
      </table>

      <table cellspacing="0" cellpadding="0" style="width: 100%; margin-bottom:10px; padding:10px; border: solid 1px #666666; border-collapse:separate;">
        <tr>
          <td class="nobdr" style="width: 100%;">
            <strong>Name: <?php echo $varr['yname']?></strong>&nbsp;&nbsp;&nbsp;
            <strong>Mobile No.:</strong> <?php echo $varr['mobile_no']?>&nbsp;&nbsp;&nbsp;
            <strong>Email:</strong> <?php echo $varr['email']?><br>

            <strong>Service Location:</strong> <?php echo $varr['slocation']?><br>
            <strong>Delivery Address:</strong> <?php echo $varr['address']?><br>    

            <strong>City:</strong> <?php echo $varr['city']?>&nbsp;&nbsp;&nbsp;
            <strong>Pincode:</strong> <?php echo $varr['pincode']?>
            </td>
        </tr>
      </table>

      <table cellspacing="0" cellpadding="0" border="0" class="desc-table" style="width:100%; margin-bottom:3px;font-size: 12px;">
        <tr style="background-color: #135884; color: #fff !important; font-size: 14px; font-weight: 400;">
          <th align="center" style="width: 10%;padding: 3px;color:#fff">Sr. No.</th>
          <th align="center" style="width: 25%;padding: 3px;color:#fff">Image</th>
          <th align="center" style="width: 35%;padding: 3px;color:#fff">Items Name</th>          
          <th align="center" style="width: 15%;padding: 3px;color:#fff">Items Type</th>          
          <th align="center" style="width: 15%;padding: 3px;color:#fff">Price (Rs.)</th>
        </tr>
        <?php        
        $order_detail_qry = db_query("SELECT * FROM order_detail WHERE order_members_slno = '".$varr['slno']."' && qryType IN ('2','3') ORDER BY category ASC ");
        $slno=1; $total_cart_price =0;
        while($orderArr = db_fetch_array($order_detail_qry)) { 
          $menuArr = db_fetch_assoc(db_query("SELECT * from product_item_tbl WHERE slno=".$orderArr['menu_item_slno'].""));         
         
          if(!empty($menuArr['menu_img'])) {
            $imageName = "https://www.thefamoushalwai.com/frontEnd/items/".$menuArr['menu_img']; 
          }
          else {
            $imageName = "https://www.thefamoushalwai.com/frontEnd/images/NoImage.jpg";
          }    

          if($orderArr['category']==1) {
            $ctype ="Bhaji";
          }
          else if($orderArr['category']==2) {
            $ctype ="Pickle and Achhar";
          }
          else if($orderArr['category']==3) {
            $ctype ="Chutney";
          }
          ?>
          <tr>
          <td style="width: 10%;"><?php echo $slno?></td>
          <td style="width: 25%;"> <img src="<?php echo $imageName;?>" style=" border-radius: 4px;width: 50px;height: 30px;"></td>
          <td style="width: 35%;"><?php echo $menuArr['menu_name']?></td>
          <td style="width: 15%;text-align: center;"><?php echo $ctype?></td>
          <td style="width: 15%;text-align: center;"><?php echo $orderArr['menu_rate']?></td>          
          </tr>
          <?php
          $slno++;
          $total_cart_price +=$orderArr['menu_rate'];
        }
        
        $gstAmt = round(18/100*$total_cart_price);

        $total_paid = ($total_cart_price+$gstAmt);  
        ?>
        <tr>
          <td colspan="4" style="background-color: #eee;text-align: right"><strong>GST @18%</strong></td>
          <td style="text-align: center;background-color: #eee;">Rs.:<b><?php echo $gstAmt?></b></td>
          </tr>

        <tr>
          <td colspan="4" style="background-color: #eee;"><strong>Total in Words:</strong> <?php echo getIndianCurrency($total_paid)?> Only</td>
          <td style="text-align: center;background-color: #eee;">Rs.:<b style="font-size: 20px;color:#e11f26"><?php echo ($total_paid)?></b></td>
          </tr>
      </table>

      <table cellspacing="0" cellpadding="0" border="1" class="desc-table" style="width: 100%; margin-top:10px;">
        <tr><td colspan="2" valign="top" align="center" class="nobdr" style="width: 100%; padding:0">* This is a Computer Generated Quotation</td></tr>
      </table>
    </td>
    </tr>  
    </table>  
</page>
