<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if(!empty($metatitle)) {
  ?>
  <title><?php echo $metatitle;?></title>
  <?php
}
else {
  ?>
  <title>Admin Dashboard</title>
  <?php
}
?>
<link rel="icon" href="<?php echo SITE_URL;?>/static/images/tfh-32x32.png" sizes="32x32" />

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- IonIcons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

 <!-- Theme style -->
<link rel="stylesheet" href="<?php echo SITE_URL;?>/static/css/custom.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo SITE_URL;?>/static/css/summernote.css">

<style>
.content-wrapper {background-color: #fff;}
label.error, span.error, div.error { font-size: 12px; color:#FB3A3A; font-weight: normal;}
lable {display: inline-block; max-width: 100%;}
.form-control{width: 97%;}

h1,h2,h3,h4,h5,h6{font-family:'Montserrat'}
/*h1{font-size:24px}
h2{font-size:22px}
h3{font-size:20px}
h4{font-size:16px}
h5{font-size:14px}*/

.overflow-x { height: 460px; overflow: scroll; overflow-x: auto }
.tr-text-white th { background-color: #135884; color: #fff !important; font-size: 14px; font-weight: 600;}
tr.tr-text-white th { position: sticky; top: -1px; overflow: hidden; left: 0 }
.btn {padding: 0px;font-size: 14px;}
.btn-outline-warning {padding: 3px 2px 1px 4px;font-size: 18px;vertical-align: middle;}
.table th {padding: 5px;}
.big-checkbox {width: 18px; height: 16px;vertical-align: middle;}

.form-control-label{color:#8f8a8a;font-weight: 400!important;margin-top: 8px;text-align: right} 

ul.bar_tabs>li.active a {border-bottom: none;}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {color: #555;cursor: default; background-color: #fff;border: 1px solid #ddd;/* border-bottom-color: transparent;*/}
ul.bar_tabs>li a {padding: 10px 17px; background: #F5F7FA;margin: 0;border-top-right-radius: 0;}
.nav>li>a {padding: 13px 15px 12px;}
.nav.top_menu>li>a, .nav>li>a {position: relative; display: block;}
.nav-tabs>li>a {margin-right: 2px;line-height: 1.42857143;border: 1px solid transparent;border-radius: 4px 4px 0 0;}
ul.bar_tabs>li.active { border-right: 6px solid #D3D6DA; border-top: 0; margin-top: -15px;}
ul.bar_tabs>li {border: 1px solid #E6E9ED; color: #333!important; margin-top: -17px; margin-left: 8px;
  background: #fff;  border-bottom: none;  border-radius: 4px 4px 0 0;}
.nav-tabs>li {float: left; margin-bottom: -1px;}
.nav>li { position: relative; display: block;}
.h1, .h2, .h3, h1, h2, h3 { margin-top: 0px!important;}
.h3, h3 {font-size: 18px!important;}
.nowrap_space {white-space: nowrap;}
</style>

</head>

<body class="hold-transition sidebar-mini" style="font-size:14px!important;">
<div class="wrapper">
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #45a1d7; box-shadow: none; height:50px;padding-left: 900px;">
    <!-- Left navbar links -->
    <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
      
    </ul> -->
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Super Admin  
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <!-- <a class="dropdown-item" href="#"><i class="fa fa-user nav-icon"></i> Profile</a> -->
    <a class="dropdown-item" href="<?php echo ADMIN_SITE_URL;?>/logout.php"><i class="fa fa-power-off nav-icon"></i> Logout</a>
  </div>
</div>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php
  include("left_sidemenu.php");
  ?>
  <!-- <link rel="stylesheet" href="<?php echo SITE_URL;?>/static/css/bootstrap.min.css"> -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    
