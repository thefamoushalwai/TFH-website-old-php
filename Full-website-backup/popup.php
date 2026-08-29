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
    <title> Welcome <?php echo PROJECT_NAME?></title>
    <?php
  }
  ?>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
 <meta name="copyright" content="Copyright © The Famous Halwai. All Rights Reserved." />
<!--jcostyle-->
<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/inner/css/halwai.css" />

<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/css/style2.css">
<!--jcostyle-->
<!--bootstrapcssstart-->
<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/inner/css/bootstrap.css" />
<!--bootstrapcssend-->
<!--fontawesomestart-->
<link rel="stylesheet" href="<?php echo SITE_URL;?>/frontEnd/inner/css/font-awesome.css" />
<!--jcostyle-->
<link rel="icon" href="<?php echo SITE_URL;?>/static/images/tfh-32x32.png" sizes="32x32" />

  <style type="text/css">
  .content-wrapper {background-color: #fff;}  
  h1,h2,h3,h4,h5,h6{font-family:'Montserrat'}
  .h1, .h2, .h3, h1, h2, h3 { margin-top: 0px!important;}
  .h3, h3 {font-size: 18px!important;} 
  .h4, h4 {font-size: 16px!important;} 
  overflow-x { height: 450px; overflow: scroll; overflow-x: auto }
  .nowrap_space {white-space: nowrap;}
  .tr-text-white th { background-color: #135884; color: #fff !important; font-size: 14px; font-weight: 400;}
  tr.tr-text-white th { position: sticky; top: -1px; overflow: hidden; left: 0 }
  .btn {padding: 0px;font-size: 14px;}
  .btn-outline-warning {padding: 3px 2px 1px 4px;font-size: 18px;vertical-align: middle;}
  .table th {padding: 5px;}
  .table td {padding: 0.4rem!important;font-size: 15px!important;}
  a { color: #181617 }
  a:hover{ color: #e11f26 }
  .radio_title {padding-left: 5px;vertical-align: center;margin-right:15px;} 
    .my-btn-primary{color: #fff;background-color: #D5923A; border-color:#D5923A;box-shadow:none;padding: 3px 6px;font-weight: 400}
  .my-btn-primary:hover{color: #fff;}

  /*pagination START*/
  .page-row {display: flex; flex-wrap: wrap; }
  .pagination-bg { background-color: #03395c3b; padding: 0;} 
  ul.list-group.pagination1 {flex-direction: row; justify-content: flex-end; vertical-align: middle;
    padding: 0; align-items: center;}
  ul.list-group.pagination1 li { padding: 6px 6px;}
  ul.list-group.pagination1 li a {font-size: 14px; font-weight: 600;color:#39597A;}
  /*pagination END*/ 
  </style>

  <script>
function multiple_openwin (file,Iwidth,Iheight,popup_name) {
    var newWin = open(file, popup_name, 'x=0,y=0,toolbar=no,location=no,directories=no,status=no,scrollbars=yes, copyhistory=no,width='+Iwidth+',height='+Iheight+',screenX=0,screenY=0,left=20,top=20');
    newWin.focus();
}
</script>
</head>
<body>
	<div class="dashboard-header" style="background-color: #f0f0f0;margin-bottom: 5px;">
		<div class="container-fluid">
			<div class="row">
			<div class="header-logo pl-3 col-sm-8 p-2"><h3><?php echo PROJECT_NAME?></h3><!-- <img src="" width="80px"> --></div>

			<div class="col-sm-4 mt-2 text-right pr-3" style="font-size: 12px"><a href="javascript:window.close();">Close Window</a></div>
			</div>	
		</div>
	</div>	
</body>	
</html>
