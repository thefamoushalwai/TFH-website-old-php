<?php
include("includes/inc.php");

$_SESSION['LOGINNAME']="";
unset($_SESSION['LOGINNAME']);

$_SESSION['LOGINUSERNAME']="";
unset($_SESSION['LOGINUSERNAME']);
?>
<script type="text/javascript">window.location.href="<?php echo SITE_URL ?>/login.php";</script>
<?php
exit;
?>