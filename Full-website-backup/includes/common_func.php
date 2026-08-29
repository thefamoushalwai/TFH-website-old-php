<?php
function admin_login ($username, $password) {

	$user_qry = db_query("SELECT * FROM admin_tbl WHERE username='".$username."' && password='".$password."' && status='Y' ");

	$status= 'N';
	if(db_num_rows($user_qry)>0) {
		$adminArr = db_fetch_assoc($user_qry);
		$_SESSION['LOGINNAME'] = $adminArr['contact_name'];
		$_SESSION['LOGINUSERNAME'] = $adminArr['username'];

		$status= 'Y';
	} 

	return ($status);
}

function getUserName ($slno) {

	$user_qry = db_query("SELECT * FROM admin_tbl WHERE slno='".$slno."' ");
	
	if(db_num_rows($user_qry)>0) {
		$adminArr = db_fetch_assoc($user_qry);
		$name = $adminArr['contact_name'];
	} 

	return ($name);
}

function date_display_daymonthyear($display_date) {
	$dt = new DateTime($display_date);
  	echo $dt->format('j F, Y');
}

function display_date_display_daymonthyear($display_date) {
	$dt = new DateTime($display_date);
  	return($dt->format('j F, Y'));
}

function date_short_daymonthyear($display_date) {
	$dt = new DateTime($display_date);
  	echo $dt->format('j M Y');
}

function create_valid_flnm($catgName) {	

	$flnm_1 = strip_tags(strtolower(trim($catgName)));

    $flnm_1 = str_replace("'", "", $flnm_1);

    $flnm_1 = str_replace("\?", "", $flnm_1);    	    

 	$flnm_1 = preg_replace("/[^_0-9a-zA-Z]/i", " ", stripslashes($flnm_1));

    $flnm_1 = preg_replace("/[[:space:]]+/i", " ",$flnm_1);

    $flnm_1 = str_replace(" ", "-",trim($flnm_1));    

	return ($flnm_1);
}

function getCountryName($contName) {
	//echo "SELECT * FROM country WHERE country_code='".$contName."' <br>";
	$country_qry = db_query("SELECT * FROM country WHERE country_code='".$contName."' ");
	$contArr = db_fetch_assoc($country_qry);
	if(!empty($contArr['country_name'])) {
		$country_name = $contArr['country_name'];
	}
	else {
		$country_name = $contName;	
	}
	return $country_name;
}

function getProductCategoryName($catg_slno) {

	$catgName ='';
	if(!empty($catg_slno)) {
		$pcategory_qry = db_query("SELECT * FROM product_category WHERE slno='".$catg_slno."' ");
		$catgArr = db_fetch_assoc($pcategory_qry);
		$catgName = $catgArr['category_name'];
	}
	return ($catgName);
}

// delete all files and sub-folders from a folder
function deleteDirwithFile($dir) {
	foreach(glob($dir.'/*') as $file) {
		if(is_dir($file)) {
			deleteDirwithFile($file);
		}
		else {
			unlink($file);
		}		
	}
	rmdir($dir);
}

function display_pagination ($arr){
	$pageno = ($arr['page'])?($arr['page']):('1');

	if(!empty($pageno)) {
		//$pageno = $arr['page'];
		$limit = $arr['limit'];
		$numrows = $arr['numrows'];
		$link 	 = $arr['link'];
		$filename = $_SERVER['SCRIPT_FILENAME'];
		$filename = basename($filename); //file name

		$startFrom = ($page * $limit) - $limit;
		$total_pages = ceil($numrows/$limit);

		$firstPage = 1;
		$nextPage = $page + 1;
		$previousPage = $page - 1;

		$disp_last_record = $startFrom+$limit;

		if($disp_last_record>$numrows) {
			$disp_last_record = $numrows;
		}
		?>
		<style type="text/css">
		.pagination-bg { background-color: #e585463b; padding: 0; height: 30px; 
			vertical-align: middle; display: flex; align-items: center; padding: 13px }
		.pagination-bg span { font-size: 13px }
		.pagination1>li { display: inline }
		.pagination1 { display: inline-block; padding-left: 0; margin: 20px 20px;
		 border-radius: 4px }
		.pagination1>li a { font-weight: 400; color: black }	
		.row {margin-right: 0px!important; margin-left: 0px!important;}
		</style>
		<div class="row">

		<div class="col-sm-8  pagination-bg">
		<span>Page <?php echo $pageno;?> of <?php echo ceil($numrows/$limit);?>, Showing <?php echo $limit; ?> of <?php echo $numrows; ?> Records || Current Page No.: <b class="text-danger" style="font-size: 18px;"><?php echo $pageno;?></b></span>
		</div>		

		<div class="col-sm-4 text-right  pagination-bg">
			<ul class="pagination1">
				<li><a href="?page=1<?php echo $link;?>">First</a></li>
				<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>" style="padding: 5px;">
				<?php
				if($pageno <= 1) {
					?>
					<a href="#">&laquo; Prev</a>
					<?php
				}
				else {
					?>
					<a href="<?php echo $filename;?>?page=<?php echo ($pageno -1)?><?php echo $link;?>">&laquo; Prev</a>
					<?php
				}?>
				</li>

				<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>" style="padding: 5px;">
				<?php
				if($pageno >= $total_pages) {
					?>
					<a href="#">Next &raquo;</a>
					<?php
				}
				else {
					?>
					<a href="<?php echo $filename;?>?page=<?php echo ($pageno + 1)?><?php echo $link;?>">Next &raquo;</a>
					<?php
				}?>
				</li>
				<li><a href="?page=<?php echo $total_pages; ?><?php echo $link;?>">Last</a></li>
			</ul>
			</div>
		</div>
		<?php
	}
}
function Get_Order_No(){
	$sql=db_query("SELECT max(right(order_no,4)) as odrn from order_members");	
	$row=db_fetch_assoc($sql);
	if($row['odrn']!=''){
		$orderid=$row['odrn'];
		$Number=$orderid+1;	
	} else { $Number="0001"; }
	$pInvID = "TFHORD/".sprintf('%05d',$Number);
	return $pInvID;
}

function getIndianCurrency(float $number) {
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');

    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    //return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;

    return ($Rupees ? $Rupees . '' : '') . $paise;
}

function mail_sent_func($mailArr) {
	$mailto     = $mailArr['MEM_EMAIL'];
    $mailsub    = $mailArr['MAIL_SUBJECT'];
    $mailfrom   = $mailArr['MAIL_FROM'];
    $mail_msg   = $mailArr['MEM_MESSAGE']; 

    $header = "From: Thefamoushalwai.com <$mailfrom>\n";
	$header .= "X-Mailer: PHP/". phpversion();
	$header .= "X-Priority: 3 \n";
	//$header .= "Cc:afgh@somedomain.com \r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-Type: text/html; charset=iso-8859-1\n"; 
	//$header .= "Content-type: text/html\r\n";*/	
	//display_mail_sent($mailArr, $mailFrom);		
	mail($mailto, $mailsub, $mail_msg, $header);

}

function frontend_pagination ($arr){
	$pageno = ($arr['page'])?($arr['page']):('1');

	if(!empty($pageno)) {
		//$pageno = $arr['page'];
		$limit = $arr['limit'];
		$numrows = $arr['numrows'];
		$link 	 = $arr['link'];
		$filename = $_SERVER['SCRIPT_FILENAME'];
		$filename = basename($filename); //file name

		$startFrom = ($page * $limit) - $limit;
		$total_pages = ceil($numrows/$limit);

		$firstPage = 1;
		$nextPage = $page + 1;
		$previousPage = $page - 1;

		$disp_last_record = $startFrom+$limit;

		if($disp_last_record>$numrows) {
			$disp_last_record = $numrows;
		}
		?>
		<style type="text/css">
		.pagination-bg { background-color: #e585463b; padding: 0; height: 30px; 
			vertical-align: middle; display: flex; align-items: center; padding: 13px }
		.pagination-bg span { font-size: 13px }
		.pagination1>li { display: inline }
		.pagination1 { display: inline-block; padding-left: 0; margin: 20px 20px;
		 border-radius: 4px }
		.pagination1>li a { font-weight: 400; color: black }	
		.row {margin-right: 0px!important; margin-left: 0px!important;}
		</style>
		<div class="row">

		<div class="col-sm-8  pagination-bg">
		<span>Page <?php echo $pageno;?> of <?php echo ceil($numrows/$limit);?>, Showing <?php echo $limit; ?> of <?php echo $numrows; ?> Records || Current Page No.: <b class="text-danger" style="font-size: 18px;"><?php echo $pageno;?></b></span>
		</div>		

		<div class="col-sm-4 text-right  pagination-bg">
			<ul class="pagination1">
				<li><a href="?page=1<?php echo $link;?>">First</a></li>
				<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>" style="padding: 5px;">
				<?php
				if($pageno <= 1) {
					?>
					<a href="#">&laquo; Prev</a>
					<?php
				}
				else {
					?>
					<a href="<?php echo $filename;?>?page=<?php echo ($pageno -1)?><?php echo $link;?>">&laquo; Prev</a>
					<?php
				}?>
				</li>

				<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>" style="padding: 5px;">
				<?php
				if($pageno >= $total_pages) {
					?>
					<a href="#">Next &raquo;</a>
					<?php
				}
				else {
					?>
					<a href="<?php echo $filename;?>?page=<?php echo ($pageno + 1)?><?php echo $link;?>">Next &raquo;</a>
					<?php
				}?>
				</li>
				<li><a href="?page=<?php echo $total_pages; ?><?php echo $link;?>">Last</a></li>
			</ul>
			</div>
		</div>
		<?php
	}
}
?>
