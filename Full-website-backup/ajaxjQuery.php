<?php
include('includes/inc.php');
if(isset($_SERVER['HTTP_ORIGIN'])){
	$http_origin = $_SERVER['HTTP_ORIGIN'];
	header("Access-Control-Allow-Origin: $http_origin");
	header("Access-Control-Allow-Credentials: true");
}

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	$ip_address = $_SERVER['HTTP_CLIENT_IP'];
}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$ip_address = $_SERVER['REMOTE_ADDR'];
}

//print_r($_POST);
if($_POST['part']=='timeCuisines') {
	if(!empty($_POST['menuID'])) { //Breakfast

		$mediaid = explode(',',$_POST['menuID']);
		//$mediaid_arr = asort($mediaid);
		foreach ($mediaid as $key => $value) {
			$meals_arr = db_fetch_assoc(db_query("SELECT * FROM event_meals WHERE slno='".$value."' "));
			?>			
			<div class="form-group row showCuisines">
			<div class="col-sm-12"><label for="title_en" class="form-control-label mt-3"><?php echo $meals_arr['short_desc'];?></div>

			
			<div class="col-sm-12 sechedule mealsDinnerDiv"> 
			<?php 
			//echo "SELECT * FROM event_meals_schedule WHERE event_meals_slno in ('".$_POST['menuID']."') ";
			$schedule_qry = db_query("SELECT * FROM event_meals_schedule WHERE event_meals_slno ='".$value."' ");			
			while($menuArr = db_fetch_assoc($schedule_qry)) {
				?>
				<a class="text_btn" onclick="secheduleTime(this,'<?php echo $meals_arr['slno'];?>','<?php echo $meals_arr['meal_title'];?>','<?php echo $menuArr['schedule_time'].' '.$menuArr['schedule_time_slot']?> onwards')"><?php echo $menuArr['schedule_time']?> <?php echo $menuArr['schedule_time_slot']?> onwards</a>
				<?php 
			}
			?> 
			</div>
			</div>
			<?php
		}
	}	
	exit;
}
else if($_POST['part']=='generate_referralcode') {
	//echo "SELECT max(right(referralcode,5)) as refcode from generate_referralcode";
	$sql=db_query("SELECT max(right(referralcode,5)) as refcode from generate_referralcode");	
	$row=db_fetch_array($sql);
	if($row['refcode']!=''){
		$orderid=$row['refcode'];
		$Number=$orderid+1;	
	}else { $Number="00750"; }

	if(!empty($_POST['state'])) {
		$state=trim($_POST['state']);
	}
	if($_POST['ptype']=='1') {
		$ptype='HALW';
	}
	else if($_POST['ptype']=='2') {
		$ptype='CHEF';	
	}
	else if($_POST['ptype']=='3') {
		$ptype='CATS';
	}
	else if($_POST['ptype']=='4') {
		$ptype='HSWF';
	}
	else if($_POST['ptype']=='5') {
		$ptype='OTHS';
	}
	$refID = $state."TFH".$ptype.$Number;
	echo $refID;
	exit;
}
else if($_POST['part']=='showMoreBlog') {

	$limit_start =  $_POST['loadinfo'];

	$datahtml ='';
	$blog_qry = db_query("SELECT * FROM our_blogs WHERE display_status='Y' order by posted_date DESC LIMIT $limit_start, 20 ");
	while($blogArr = db_fetch_array($blog_qry)) {

		if(stristr($blogArr['blog_desc'], $blogArr['blog_title'],true)) {
			$blogArr['blog_desc'] = str_replace($blogArr['blog_title'], '', $blogArr['blog_desc']);
		}

		$blog_desc = substr($blogArr['blog_desc'], 0, 400);
		//$posted_date = date_short_daymonthyear($blogArr['posted_date']);

		$datahtml.= '
		<div class="blogsec_detail mb-5">
	  	<a href="#">
	  	<div class="btitle">'.$blogArr['blog_title'].'</div>
	  	</a>

	  	<p class="author_sec d-flex align-items-center pl-4">
		<span class="d-flex align-items-center"><img src="'.SITE_URL.'/frontEnd/images/profile.png" alt="profile"> &nbsp; '.$blogArr['posted_by'].';</span>

		<span class="pl-4 d-flex align-items-center"><img src="'.SITE_URL.'/frontEnd/images/calender.png" alt="calender">&nbsp;'.$blogArr['posted_date'].'</span>
		</p>
			
	  	<div class="blogtext">'.$blog_desc.'...</div>
		</div>';
	}
	echo $datahtml;
}
else if($_REQUEST['part']=='itemSection') {	
	switch($_REQUEST["action"]) {
		case "add":
		if(!empty($_REQUEST['slno'])) {
			//echo "SELECT * from product_item_tbl WHERE slno='".$_POST['slno']."' <br>";
			$item_qry = db_query("SELECT * from product_item_tbl WHERE slno='".$_REQUEST['slno']."' ");

			if(db_num_rows($item_qry)>0) {				
				$itemslnoArray[] = $_REQUEST['slno']; 
				$itemArray[]  = $_REQUEST['slno'];
				if(!empty($_SESSION["item_cart_item"])) {

					if(!in_array($_REQUEST['slno'], $_SESSION["item_cart_item"])) {

						$_SESSION["item_cart_item"] = array_merge($_SESSION["item_cart_item"],$itemArray);

						$_SESSION["ITESM_SLNO_ARR"] = array_merge($_SESSION["ITESM_SLNO_ARR"],$itemslnoArray);
					}
				} 
				else {
					$_SESSION["item_cart_item"] = $itemArray;
					$_SESSION['ITESM_SLNO_ARR'] = $itemslnoArray;						
				}

				if(!empty($_SESSION["item_cart_item"])) {
					echo count($_SESSION["item_cart_item"]);
				}
				/*echo "<pre>";
				print_r($_SESSION["item_cart_item"]);
				echo "</pre>";	*/		
			}
		}
		break;
		case "remove":
		if(!empty($_SESSION["item_cart_item"])) {
			$remove_item = $_REQUEST['slno'];
			//print_r($_SESSION["item_cart_item"]);
			foreach($_SESSION["item_cart_item"] as $key => $val) {
				//echo $val."@@";
				if($remove_item == "$val") {
					unset($_SESSION["item_cart_item"][$key]);
				}					
				if(empty($_SESSION["item_cart_item"])) {
					unset($_SESSION["item_cart_item"]);						
				}
				if(empty($_SESSION["ITESM_SLNO_ARR"])) {						
					unset($_SESSION["ITESM_SLNO_ARR"]);
				}					
			}

			for($i=0 ; $i<=count($_SESSION["ITESM_SLNO_ARR"]) ; $i++) {
				if($_SESSION["ITESM_SLNO_ARR"][$i]==$_REQUEST['slno']) {
					//echo $_SESSION["ITESM_SLNO_ARR"][$i]."###".$_POST['slno'];
					unset($_SESSION["ITESM_SLNO_ARR"][$i]);
				}
			}
		}
		break;

		case "empty":
		unset($_SESSION["item_cart_item"]);
		break;		
	}
}
else if($_REQUEST['part']=='bhajiSection') {	
	switch($_REQUEST["action"]) {
		case "add":
		if(!empty($_REQUEST['slno'])) {
			//echo "SELECT * from product_item_tbl WHERE slno='".$_POST['slno']."' <br>";
			$item_qry = db_query("SELECT * from product_item_tbl WHERE slno='".$_REQUEST['slno']."' ");

			if(db_num_rows($item_qry)>0) {				
				$itemslnoArray[] = $_REQUEST['slno']; 
				$itemArray[]  = $_REQUEST['slno'];
				if(!empty($_SESSION["bhaji_cart_item"])) {

					if(!in_array($_REQUEST['slno'], $_SESSION["bhaji_cart_item"])) {

						$_SESSION["bhaji_cart_item"] = array_merge($_SESSION["bhaji_cart_item"],$itemArray);

						$_SESSION["ITESB_SLNO_ARR"] = array_merge($_SESSION["ITESB_SLNO_ARR"],$itemslnoArray);
					}
				} 
				else {
					$_SESSION["bhaji_cart_item"] = $itemArray;
					$_SESSION['ITESB_SLNO_ARR'] = $itemslnoArray;						
				}

				if(!empty($_SESSION["bhaji_cart_item"])) {
					echo count($_SESSION["bhaji_cart_item"]);
				}
				/*echo "<pre>";
				print_r($_SESSION["bhaji_cart_item"]);
				echo "</pre>";	*/		
			}
		}
		break;
		case "remove":
		if(!empty($_SESSION["bhaji_cart_item"])) {
			$remove_item = $_REQUEST['slno'];
			//print_r($_SESSION["bhaji_cart_item"]);
			foreach($_SESSION["bhaji_cart_item"] as $key => $val) {
				//echo $val."@@";
				if($remove_item == "$val") {
					unset($_SESSION["bhaji_cart_item"][$key]);
				}					
				if(empty($_SESSION["bhaji_cart_item"])) {
					unset($_SESSION["bhaji_cart_item"]);						
				}
				if(empty($_SESSION["ITESB_SLNO_ARR"])) {						
					unset($_SESSION["ITESB_SLNO_ARR"]);
				}					
			}

			for($i=0 ; $i<=count($_SESSION["ITESB_SLNO_ARR"]) ; $i++) {
				if($_SESSION["ITESB_SLNO_ARR"][$i]==$_REQUEST['slno']) {
					//echo $_SESSION["ITESB_SLNO_ARR"][$i]."###".$_POST['slno'];
					unset($_SESSION["ITESB_SLNO_ARR"][$i]);
				}
			}
		}
		break;

		case "empty":
		unset($_SESSION["bhaji_cart_item"]);
		break;		
	}
}
else if($_REQUEST['part']=='menuSection') {
	switch($_REQUEST["action"]) {
		case "add":
		if(!empty($_REQUEST['slno'])) {
			//echo "SELECT * from menu_item_tbl WHERE slno='".$_REQUEST['slno']."' <br>";
			$item_qry = db_query("SELECT * from menu_item_tbl WHERE slno='".$_REQUEST['slno']."' ");

			if(db_num_rows($item_qry)>0) {				
				$itemslnoArray[] = $_REQUEST['slno']; 
				$itemArray[]  = $_REQUEST['slno'];
				if(!empty($_SESSION["cart_item"])) {

					if(!in_array($_REQUEST['slno'], $_SESSION["cart_item"])) {

						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);

						$_SESSION["PRODUCT_SLNO_ARR"] = array_merge($_SESSION["PRODUCT_SLNO_ARR"],$itemslnoArray);
					}
				} 
				else {
					$_SESSION["cart_item"] = $itemArray;
					$_SESSION['PRODUCT_SLNO_ARR'] = $itemslnoArray;						
				}

				if(!empty($_SESSION["cart_item"])) {
					echo count($_SESSION["cart_item"]);
				}
				/*echo "<pre>";
				print_r($_SESSION["cart_item"]);
				echo "</pre>";*/
			}
		}
		break;
		case "remove":
		if(!empty($_SESSION["cart_item"])) {
			$remove_item = $_REQUEST['slno'];
			//print_r($_SESSION["cart_item"]);
			foreach($_SESSION["cart_item"] as $key => $val) {
				//echo $val."@@";
				if($remove_item == "$val") {
					unset($_SESSION["cart_item"][$key]);
				}					
				if(empty($_SESSION["cart_item"])) {
					unset($_SESSION["cart_item"]);						
				}
				if(empty($_SESSION["PRODUCT_SLNO_ARR"])) {						
					unset($_SESSION["PRODUCT_SLNO_ARR"]);
				}					
			}

			for($i=0 ; $i<=count($_SESSION["PRODUCT_SLNO_ARR"]) ; $i++) {
				if($_SESSION["PRODUCT_SLNO_ARR"][$i]==$_REQUEST['slno']) {
					//echo $_SESSION["PRODUCT_SLNO_ARR"][$i]."###".$_POST['slno'];
					unset($_SESSION["PRODUCT_SLNO_ARR"][$i]);
				}
			}
		}
		break;

		case "empty":
		unset($_SESSION["cart_item"]);
		break;		
	}
}
else if($_REQUEST['part']=='Get_Nohalwaichef_Rate') {
	$totalAmount =0;
	if(!empty($_REQUEST['slno'])) {
		$grate_qry = db_query("SELECT * FROM job_worker_rate WHERE slno = '".$_REQUEST['slno']."' ");
		if(db_num_rows($grate_qry)>0) {
			$res = db_fetch_assoc($grate_qry);
			$totalAmount = ($res['rate']*$_REQUEST['nohalwaichef']);
		}
	}
	echo $totalAmount;

}

/*else if($_REQUEST['part']=='submitMenuCart') {	
	db_query("INSERT IGNORE INTO order_members SET yname='".$_REQUEST['yname']."', email='".$_REQUEST['email']."', mobile_no='".$_REQUEST['mobileno']."', slocation='".$_REQUEST['slocation']."', occasions_slno='".$_REQUEST['occasions_slno']."', noof_people='".$_REQUEST['noof_people']."', event_date='".$_REQUEST['event_date']."', qryType='".$_REQUEST['qryType']."', ip_address='".$ip_address."', recv_date='".date("Y-m-d")."', status='Y' ");

	$mid = db_insert_id();
	$orderID = Get_Order_No();
	db_query("UPDATE order_members SET order_no = '".$orderID."' WHERE slno='".$mid."' ");

	foreach ($_SESSION["cart_item"] as $key => $value) {
		$menuArr = db_fetch_assoc(db_query("SELECT * from menu_item_tbl WHERE slno IN (".$value.") order by menu_name ASC"));

		db_query("INSERT INTO order_detail SET order_members_slno = '".$mid."', order_no = '".$orderID."', event_cuisine_slno ='".$menuArr['event_cuisine_slno']."', menu_item_slno='".$value."', menu_rate='".$menuArr['menu_rate']."', state_slno='".$prodinfo['state_slno']."', veg_type='".$prodinfo['veg_type']."', recv_date='".date("Y-m-d")."', recv_time='".date("g:i:s")."', qryType='1' ");
	}

	require __DIR__.'/pdf/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf();
	ob_start();

	$invoice_qry = db_query("SELECT * FROM order_members WHERE slno = '".$mid."' ");
	$varr = db_fetch_array($invoice_qry);
	$occasionsArr = db_fetch_array(db_query("SELECT * FROM occasions_tbl WHERE slno='".$varr['occasions_slno']."' "));	
	include dirname(__FILE__).'/get_pdf_invoice.php';

	$yname = $varr['yname'];
	$filename = str_replace(' ', '-', $yname);	
	$pdf_filename = $filename."-".$varr['slno'].".pdf";
	$contentHtml = ob_get_clean();

	try {
		$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(10, 5, 10, 3));
	    $html2pdf->pdf->SetDisplayMode('fullpage');
		$html2pdf->setTestTdInOnePage(false);
		
		$html2pdf->writeHTML($contentHtml);
		ob_end_clean();
		//$html2pdf->Output($pdf_filename,'D');
		//$html2pdf->output();
		
		$download_pdf_url = $html2pdf->Output($pdf_filename, true); //Attached PDF in Mail
		$upload_location = $_SERVER['DOCUMENT_ROOT']."/quotepdf/".$pdf_filename;
		$html2pdf->Output($upload_location, 'F'); //Save file on Server	
	}
	catch(HTML2PDF_exception $e) {
		$html2pdf->clean();
	    echo $e;	    
	    //$formatter = new ExceptionFormatter($e);
	    //echo $formatter->getHtmlMessage();
	    
	    exit;
	}
	echo "Y";
}*/	
?>


