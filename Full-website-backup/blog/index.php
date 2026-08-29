<?php
include('../includes/inc.php');
$metatitle='Our Blog - The Famous Halwai';
$metaDesc='';
$metaKeywords='';
include('../inner_header.php');

?>
<style>
.blog-card {
    background-color: #fff;
    transition: all 0.3s ease-in-out;
    height: 100%;
}
.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}
.blog-title {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
    min-height: 42px;
    line-height: 1.3;
}
.blog-card img {
    object-fit: cover;
    width: 100%;
   
}
.blog-card p {
    font-size: 12px;
    color: #666;
}
.blog-imag {
    width: 100%!important;
    height: 250px!important; /* ya jitni aapko chahiye */
    object-fit: cover!important;
    border-radius: 8px!important; /* optional, already `rounded-2` diya hai */
}


.blog-image.me-3 {
    width: 150px!important;
    height: 150px!important;
    overflow: hidden;
    border-radius: 8px!important;
    flex-shrink: 0;
}
.paginationContainer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
    border-radius: 50px;
    border: .5px solid rgb(247, 246, 246);
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
}

.paginationContainer .paginationContent {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 28px;
}

.pagination_item {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    font-weight: 600;
    display: flex;
    align-items: center;
    color: gray;
    justify-content: center;
    box-shadow: 2px 2px 4px #f9fafb, -2px -2px 4px #f9fafb,
        inset 2px 2px 4px transparent, inset -2px -2px 4px transparent;
}

.activeItem {
    box-shadow: 2px 2px 4px transparent, -2px -2px 4px #dddddd,
        inset 2px 2px 4px #f9fafb, inset -2px -2px 4px #f9fafb;
}

.pagination_item:hover {
    box-shadow: 2px 2px 4px transparent, -2px -2px 4px #dddddd,
        inset 2px 2px 4px #f9fafb, inset -2px -2px 4px #f9fafb;
    color: gray;
}

.nextPageText {
    color: #7e7c7c;
    background-color: #f9fafb;
    padding: 7px 15px;
    border-radius: 50px;
    font-size: .9rem;
}
</style>
<!-- <div class="page__banner" style="background-image: url('<?php echo SITE_URL;?>/frontEnd/images/hbanner/blog_header.jpg');height: 200px;">	
</div>-->
<!-- <div class="page__banner section_lr mt-4">
<div class="container-fluid">
<div class="row">
<div class="col-xl-12">	
<h1 class="h1title">Our Blog </h1>
</div>
</div>
</div>
</div> -->




<section class="section_lr main">
    <div class="container-fluid py-lg-5 py-3">
         <h3 class="h1title text-center pb-3 pt-5">Our Blogs</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="putbloginfo">
                    <?php
                    $dispages = 50;
                    
                    if(isset($_GET['page']) && !empty($_GET['page'])){
                        $currentPage = $_GET['page'];
                    } else {
                        $currentPage = 1;
                    }

                    $offset = ($currentPage * $dispages) - $dispages;

                    $blog_qry = db_query("SELECT * FROM our_blogs WHERE display_status='Y' GROUP BY blog_title ");
                    $num = db_num_rows($blog_qry);

                    if($num > 0) { 
                        $link = "";
                        $arr['page'] = $_REQUEST['page'];
                        $arr['limit'] = $dispages;
                        $arr['numrows'] = $num;
                        $arr['link'] = $link;
                        $limit = 30;

                        $blogqry = db_query("SELECT * FROM our_blogs WHERE display_status='Y' GROUP BY blog_title ORDER BY posted_date DESC LIMIT $offset, $limit ");
                    ?>
                    
                    <div class="row">
                        <?php while($blogArr = db_fetch_array($blogqry)) { 
                            $slug = !empty($blogArr['filename']) ? $blogArr['filename'] : strtolower(preg_replace('/[^a-z0-9]+/', '-', $blogArr['blog_title']));
                            $blog_img = !empty($blogArr['image']) ? SITE_URL."/frontEnd/blog/Images/".$blogArr['image'] : SITE_URL."/frontEnd/blog/Images/default-blog.png";
                        ?>
                            <div class="col-lg-3 col-md-6 mb-4"> 
                                <div class="blog-card p-3 shadow rounded-3 h-100 d-flex flex-column justify-content-between">   
                                    <a href="<?php echo SITE_URL ?>/ourblog/<?php echo $slug ?>.php">
                                        <img src="<?php echo $blog_img; ?>" alt="<?php echo $blogArr['blog_title']?>" class="img-fluid blog-imag mb-3 rounded-2" />
                                        <h5 class="blog-title"><?php echo $blogArr['blog_title']?></h5>
                                    </a>
                                    <p class="mb-1 text-muted small">Posted Date: <?php echo $blogArr['posted_date']?></p>
                                    <p class="mb-0 text-muted small">Author: <?php echo $blogArr['posted_by']?></p>     
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <?php } ?>
                </div>

                <!-- Pagination -->
                <?php frontend_pagination($arr); ?>

            </div>
        </div>
    </div>
</section>


	
<?php
include('../inner_footer.php');
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
$(document).ready(function() {	
	$('.load_more_btn').on('click', function() {   
    	var Getdataload=$(this).attr('data-load');        
    	//alert(Getdataload);
	    if(Getdataload!='') {   
	    	var loadvadd=+Getdataload + 40; 
		    $.ajax({
		   		type:'POST',
				url:'<?php echo SITE_URL ?>/ajaxjQuery.php',
				data:'loadinfo='+Getdataload+'&part=showMoreBlog',
				dataType:'html',
				beforeSend: function(){
				  	$('.loader').html('Please Wait.....');
				},
		        success: function(json) {
		        	//alert(json);
					$('.putbloginfo').append(json);
					
					//alert(loadvadd);
					if(json==''){
						$(".load_more_btn").hide();
					}else{
						$(".load_more_btn").attr("data-load",loadvadd);
					}
		        }
		    });
	    }
  	});   
});
</script>	