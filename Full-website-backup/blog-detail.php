<?php
include('includes/inc.php');

$page_flname = $_REQUEST['file_name'];

if(!empty($page_flname)) {

	$flname1 = str_replace(".php", "", $page_flname);
	
	$flname = strtolower($flname1);

	$blog_qry = db_query("SELECT * FROM our_blogs WHERE display_status='Y' && filename = '".$flname."' ");
	if(db_num_rows($blog_qry)>0) {
		$pagesArr = db_fetch_assoc($blog_qry);
		$metatitle 	  = ($pagesArr['meta_title'])?($pagesArr['meta_title']):($pagesArr['blog_title']); 
		$metaDesc 	  = $pagesArr['meta_keyword']; 
		$metaKeywords = $pagesArr['meta_desc']; 

		include('inner_header.php');	
		if(!empty($pagesArr['innder_header_img'])) {
			?>
			<div class="page__banner" style="background-image: url('<?php echo SITE_URL;?>/frontEnd/innderheader/<?php echo $pagesArr['innder_header_img']?>');height: 60px;">
			</div>				
			<?php
		}
		else {
			?>
			<div class="page__banner" style="background-image: url('https://www.aeropaath.com/frontEnd/innderheader/events-catering-5.jpg');height: 60px;">
			</div>
			
			<?php	
		}
		?>		
		<section class="contact-info-section">
		<div class="container-fluid">
	<h1 class="h1title section_lr"><?php echo ucwords(strtolower($pagesArr['blog_title']));?></h1> 

<?php if (!empty($pagesArr['image'])) { ?>
   <div class="blog-detail-img mb-4" style="overflow: hidden; border-radius: 10px; margin-bottom: 30px;">
        <img src="<?php echo SITE_URL; ?>/frontEnd/blog/Images/<?php echo $pagesArr['image']; ?>" 
             alt="<?php echo $pagesArr['blog_title']; ?>" 
             class="img-fluid" 
             style="width: 100%; height: 400px; object-fit: cover; display: block;">
    </div>
<?php } ?>

		<div class="row">
    	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

    	<div class="author_sec d-flex align-items-center mb-3">
		<span class="d-flex align-items-center"><img src="<?php echo SITE_URL ?>/frontEnd/images/profile.png" alt="profile"> &nbsp; <?php echo $pagesArr['posted_by']?></span>

		<span class="pl-4 d-flex align-items-center"><img src="<?php echo SITE_URL ?>/frontEnd/images/calender.png" alt="calender">&nbsp;<?php echo $pagesArr['posted_date'];?></span>
		</div>	

		<?php 
		if(stristr($pagesArr['blog_desc'], $pagesArr['blog_title'],true)) {
			$pagesArr['blog_desc'] = str_replace($pagesArr['blog_title'], '', $pagesArr['blog_desc']);
		}
		
		if(!empty($pagesArr['blog_desc'])) {
			echo $pagesArr['blog_desc'];
		}

		?>
		</div>
		
		<div class="right_sec col-xl-3">
		<?php
        $blogqry = db_query("SELECT * FROM our_blogs WHERE display_status='Y' ORDER BY rand(), slno DESC LIMIT 0, 10 ");        
        if(db_num_rows($blogqry)>0) {                                
            ?>			
			<h3 class="headbg"><b>Recent Blog</b></h3>
			<?php
			while($blog_Arr = db_fetch_assoc($blogqry)) { 
				?>
				<a href="<?php echo SITE_URL;?>/ourblog/<?php echo $blog_Arr['filename']?>.php" style="color:#000">
				<div class="text-left service_lts"><?php echo ucwords(strtolower($blog_Arr['blog_title']));?></div>
				</a>
				<?php
			}
		}
		?>	
		</div>
		</div>			
		</div>      
		</section>
	
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
	