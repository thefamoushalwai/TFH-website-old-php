<?php
include("../includes/config_path.php");

if(empty($_SESSION['LOGINUSERNAME'])) {	
	?>
	<script>window.location = '<?php echo ADMIN_SITE_URL;?>/login.php';	</script>
	<?php
	exit;
}
?>