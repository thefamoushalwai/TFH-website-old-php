<?php
include('includes/inc.php');
$metatitle='Top Rated Professionals - The Famous Halwai';
$metaDesc='Well Trained, Verified & Checked Background';
$metaKeywords='';
include('inner_header.php');
?> 

<section class="topChefs">
    <div class="topChefs-header">
        <h3>Our Top Rated Professionals</h3>
        <p>Our top rated professionals are trained and verified from top restaurants and hotels.</p>
    </div>

    <div class="topchef-bottomheader">
        <p>Showing profiles of 4.0+ rated</p>
        <div>
            <div>
                <select name="city" id="citylist" class="selectCity">
                    <option value="all">All Cities</option>
                    <?php
                    $city_qry = db_query("SELECT * FROM prof_job_worker WHERE status='Y' && city!='' GROUP BY city ORDER BY city ");
            		while($cityArr = db_fetch_assoc($city_qry)) {
            			$cityN = $cityArr['city'];
            			if($_REQUEST['qc']=="$cityN") {
            				?>
		                    <option value="<?php echo $cityArr['city']?>" selected><?php echo $cityArr['city']?></option>
		                    <?php
            			}
            			else {
		                    ?>
		                    <option value="<?php echo $cityArr['city']?>"><?php echo $cityArr['city']?></option>
		                    <?php
		                }
	                }
	                ?>                    
                </select>
            </div>
            <!-- <p id="selectedCity"></p> -->
        </div>
    </div>

    <div class="professional-chef-container">
    	<?php
    	$search_str ='';
		if(!empty($_REQUEST['qc'])) {			
			$search_str = " &&  city LIKE '".$_REQUEST['qc']."%' ";		
		}		

		$profjw_qry = db_query("SELECT * FROM prof_job_worker WHERE status='Y' ".$search_str." order by rand() ASC");
		if(db_num_rows($profjw_qry)>0) {
			while($parr = db_fetch_assoc($profjw_qry)) {
				?>
				<div class="topChef_content">
				<!-- <div class="tag">
				<p>Pro</p>
				</div> -->

				<div class="img-area">
				<div class="inner-area">
				<img src="<?php echo SITE_URL;?>/frontEnd/professional/<?php echo $parr['userimg']?>" alt="">
				</div>
				</div>

				<div class="top-chefDetails">
				<h3 class="topChefRating-Title"><a href="<?php echo SITE_URL;?>/professionals/<?php echo $parr['flname']?>.php" target="_blank"><?php echo $parr['contact_name']?></a> <!-- <i class="ri-arrow-go-forward-line"></i> --> </h3>
				<p><?php echo $parr['profession']?></p>
				<p><?php echo $parr['experience']?> Years of Experience</p>
				<p class="topChefRating"><?php echo $parr['rating']?></p>
				</div>
				</div>
				<?php
			}
		}
		?>
    </div>
</section>
<?php
include('inner_footer.php');
?>
<script type="text/javascript">
$(document).ready(function(){    
    $("#citylist").change(function () {
        if($('#citylist').val().length!='') {
        var pageurl = '<?php echo $_SERVER['PHP_SELF']?>';            
        var city = $('#citylist').val();           
        if(city=='all') {}
        else { pageurl += '?qc='+city;}
        }  
        //alert(pageurl);    
        location = pageurl;
    });
});
</script>