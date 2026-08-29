<?php
include("../includes/inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo PROJECT_NAME;?> Login</title>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="<?php echo SITE_URL;?>/static/css/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo SITE_URL;?>/static/css/custom.css">
<style>
/*label.error, span.error, div.error { font-size: 12px; color:#FB3A3A; font-weight: normal;}
lable {display: inline-block; max-width: 100%;}
.form-control{width: 100%;}*/
</style>
<link rel="icon" href="<?php echo SITE_URL;?>/static/images/tfh-32x32.png" sizes="32x32" />
</head>
<body> 
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
  <a class="navbar-brand" href="<?php echo SITE_URL;?>/"><img src="<?php echo SITE_URL;?>/static/images/tfamousehalwai-logo.png" alt="logo" width="80px" class="img-fluid pt-1" /></a>                
  <div class="collapse navbar-collapse" id="navbarSupportedContent">  
  <ul class="navbar-nav mr-auto"></ul>  
  <h3><?php echo PROJECT_NAME;?></h3>
  </div>
  </div>
</nav>

<main class="py-4">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Please enter your login details.</div>
                <?php
                 if(!empty($_POST['loginme']) && $_POST['loginme']=='yes') {

                  $errorMsg='';
                  if(empty($_POST['username'])) {
                    $errorMsg .='Please Enter Username<br>';
                  }
                  if(empty($_POST['password'])) {
                    $errorMsg .='Please Enter Password<br>';
                  }

                  if(empty($errorMsg)) {

                    //echo $_POST['username']."===".$_POST['password'];
                    $status = admin_login ($_POST['username'], $_POST['password']);

                    //echo $status."####".ADMIN_SITE_URL;
                    //exit;

                    if($status=='Y') {
                      ?>
                      <script>window.location = '<?php echo ADMIN_SITE_URL;?>/';</script>
                      <?php
                      exit;
                    }
                    else {
                      $errorMsg .='These credentials do not match our records.<br>';
                    }
                  }
                 }
                 ?>
                 <?php
                 if(!empty($errorMsg)) {
                    ?>
                    <div class="text-danger text-center mt-2"><?php echo $errorMsg;?></div>
                    <?php
                 }
                 ?> 
                <div class="card-body">
                     <form name="loginfrm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="user_login_form">                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control " name="username" value="" required autofocus autocomplete="current-username">

                                                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">

                                                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" >

                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="hidden" name="loginme" value='yes'>
                                <button type="submit" class="btn btn-primary">
                                <span class="fa fa-lock"></span> Sign In</button>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     </main>

 <!-- /.login-box --> 
 <!-- jQuery -->
 <script src="<?php echo SITE_URL;?>/static/js/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="<?php echo SITE_URL;?>/static/js/bootstrap.bundle.min.js"></script>
 <script src="<?php echo SITE_URL;?>/static/js/jquery.validate.js"></script> 
 <!-- Custom App JS -->
 <script src="<?php echo SITE_URL;?>/static/js/custom.js"></script>
 </body>
 </html>
 