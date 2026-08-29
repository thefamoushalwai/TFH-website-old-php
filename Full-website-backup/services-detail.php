<?php
include('includes/inc.php');

$page_flname = $_REQUEST['file_name'];

if(!empty($page_flname)) {

	$flname1 = str_replace(".php", "", $page_flname);
	
	$flname = strtolower($flname1);

	$general_page_qry = db_query("SELECT * FROM website_information WHERE status='Y' && page_url = '".$flname."' && page_type='Y' ");	

	if(db_num_rows($general_page_qry)>0) {
		$pagesArr = db_fetch_assoc($general_page_qry);
		$metatitle 	  = $pagesArr['meta_title']; 
		$metaDesc 	  = $pagesArr['meta_desc']; 
		$metaKeywords = $pagesArr['meta_keyword']; 

		include('inner_header.php');	
		if(!empty($pagesArr['innder_header_img'])) {
			?>
			<div class="page__banner" style="background-image: url('<?php echo SITE_URL;?>/frontEnd/innderheader/<?php echo $pagesArr['innder_header_img']?>');height: 350px;"></div>			
			<?php
		}
		else {
			?>
			<div class="page__banner section_lr mt-4">
			<div class="container-fluid">
			<div class="row">
			<div class="col-xl-12">	
			
			</div>
			</div>
			</div>
			</div>
			<?php
		}
		?>
		<section class="my-5 section_lr">
		<div class="container-fluid">
		<h1 class="h1title p-1"><?php echo ucwords(strtolower($pagesArr['page_title']));?></h1>	
		<?php echo $pagesArr['page_desc']?>	
		</div>      
		</section>

		<div class="position2">
			<div class="ban_bg safari_only" style="background-image: url(<?php echo SITE_URL?>/frontEnd/images/ebanner.jpg)">
			    <div class="container">
			      <div class="row">
			        <div class="col-md-12">
			          <div class="quoteBtn">
			            <h2 class="bt-banner_title text-center">We provide valuable Parties Catering,  Events Catering and Wedding Catering in your near by.</h2>
			            <div class="text-danger text-center mb-3"><a href="<?php echo SITE_URL;?>/enquiry.php" class="link_btn">Get Best Quote &rarr;</a></div>
			          </div>
			        </div>
			      </div>
			    </div>
			</div>
		</div>
		<?php
		include('inner_footer.php');
		?>
		</body>	
		</html>
		<?php
	}
	else {
		$occasions_qry = db_query("SELECT * FROM occasions_tbl WHERE display_status='Y' && page_url = '".$flname."' ");
		if(db_num_rows($occasions_qry)>0) {
			$pagesArr = db_fetch_assoc($occasions_qry);
			$metatitle 	  = $pagesArr['meta_title']; 
			$metaDesc 	  = $pagesArr['meta_desc'];  
			$metaKeywords = $pagesArr['meta_keyword'];
			include('inner_header.php');	
			if(!empty($pagesArr['innder_header_img'])) {
				?>
				<div class="page__banner" style="background-image: url('<?php echo SITE_URL;?>/frontEnd/innderheader/<?php echo $pagesArr['innder_header_img']?>');height: 350px;">
				</div>				
				<?php
			}
			else {
				?>
				<div class="page__banner" style="background-image: url('https://www.aeropaath.com/frontEnd/innderheader/events-catering-5.jpg');height: 350px;">
				</div>
				
				<?php	
			}
			?>			
			<section class="my-5 section_lr">
			<div class="container-fluid">
			<h1 class="h1title"><?php echo ucwords(strtolower($pagesArr['occasions_title']));?></h1>	
			<div class="row">
        	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">   		
			<?php 
			if(!empty($pagesArr['short_desc'])) {
				echo $pagesArr['short_desc'];
			}			
			?>
			</div>
			<style type="text/css">
			
			
			</style>
			<div class="right_sec col-xl-3 pl-xl-3">
			<?php
            $services_qry = db_query("SELECT * FROM occasions_tbl WHERE display_status='Y' ORDER BY rand(),  occasions_title ASC LIMIT 0, 11");        
            if(db_num_rows($services_qry)>0) {                                
                ?>
				
				<h3 class="pt-3 headbg"><b>Our Occasion</b></h3>
				<?php
				while($serArr = db_fetch_assoc($services_qry)) { 
					?>
					<a href="<?php echo SITE_URL;?>/services/<?php echo $serArr['page_url']?>.php" style="color:#000">
					<div class="text-left service_lts"><?php echo ucwords(strtolower($serArr['occasions_title']));?></div>
					</a>
					<?php
				}
			}
			?>	
			</div>

			</div>
				
			</div>      
			</section>


			<div class="position2">
				<div class="ban_bg safari_only" style="background-image: url(<?php echo SITE_URL?>/frontEnd/images/ebanner.jpg)">
				    <div class="container">
				      <div class="row">
				        <div class="col-md-12">
				          <div class="quoteBtn">
				            <h2 class="bt-banner_title text-center">We provide valuable Parties Catering,  Events Catering and Wedding Catering in your near by.</h2>
				            <div class="text-danger text-center mb-3"><a href="<?php echo SITE_URL;?>/choose_services.php" class="link_btn">Get Best Quote &rarr;</a></div>
				          </div>
				        </div>
				      </div>
				    </div>
				</div>
			</div>
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
}
else {
	header("Location:".SITE_URL);
	exit;
}
?>	
	