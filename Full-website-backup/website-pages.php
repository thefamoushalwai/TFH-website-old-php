<?php
include('includes/inc.php');

$page_flname = $_REQUEST['file_name'];

if(!empty($page_flname)) {

	$flname1 = str_replace(".php", "", $page_flname);
	
	$flname = strtolower($flname1);

	$general_page_qry = db_query("SELECT * FROM website_information WHERE status='Y' && page_url = '".$flname."' && page_type='N' ");	

	if(db_num_rows($general_page_qry)>0) {
		$pagesArr = db_fetch_assoc($general_page_qry);

		$metatitle 	  = $pagesArr['meta_title']; 
		$metaDesc 	  = $pagesArr['meta_keyword']; 
		$metaKeywords = $pagesArr['meta_desc']; 

		include('inner_header.php');	
		if(!empty($pagesArr['innder_header_img'])) {
			?>
			<div class="page__banner" style="background-image: url('<?php echo SITE_URL;?>/frontEnd/innderheader/<?php echo $pagesArr['innder_header_img']?>');height: 250px;margin-top: 94px;"></div>
			<?php
		}
		else {
			?>
			<div class="page__banner section_lr mt-4">
			<div class="container-fluid">
			<div class="row">
			<div class="col-xl-12">	
			<h1 class="h1title"><?php echo ucwords(strtolower($pagesArr['page_title']));?></h1>
			</div>
			</div>
			</div>
			</div>
			<?php
		}
		?>
		<style type="text/css">
		 ol, ul, dl {padding: 10px;}	
		</style>
		<section class="my-5 section_lr">
		<div class="container-fluid">
		<!-- <h1 class="h1title"><?php echo ucwords(strtolower($pagesArr['page_title']));?></h1> -->	
		<?php echo $pagesArr['page_desc']?>	
		</div>      
		</section>

		<?php
		if($_REQUEST['file_name']=='our-partners.php') {
			?>
			<div class="position2">
				<div class="ban_bg safari_only" style="background-image: url(<?php echo SITE_URL?>/frontEnd/images/ebanner.jpg)">
				    <div class="container">
				      <div class="row">
				        <div class="col-md-12">
				          <div class="quoteBtn">
				            <h2 class="bt-banner_title text-center">We provide valuable Parties Catering, Events Catering and Wedding Catering in your near by.</h2>
				            <div class="text-danger text-center mb-3"><a href="<?php echo SITE_URL;?>/partner-register.php" class="link_btn">Register Now &rarr;</a></div>
				          </div>
				        </div>
				      </div>
				    </div>
				</div>
			</div>
			<?php
		}
		?>

		<?php
		include('inner_footer.php');
		?>
		</body>	
		</html>
		<?php
	}
	else {
		header("Location:".SITE_URL);
		exit;
	}
}
else {
	header("Location:".SITE_URL);
	exit;
}
?>	
	