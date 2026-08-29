<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Website Pages";

if (!empty($_REQUEST['slno']) && !empty($_REQUEST['status'])) { //Update Course display status

  db_query("UPDATE website_information set status = '".$_REQUEST['status']."' where slno='".$_REQUEST['slno']."' ");
  echo $_REQUEST['status'];
}
else if (!empty($_REQUEST['posval'])) { //Update Postion as Dynamic
  if(count($_REQUEST['posval'])>0) {
    foreach($_REQUEST['posval'] as $p) {
      db_query("update website_information set position = '".$p[1]."' where slno='".$p[0]."'");
      //echo "update services_category set position = '".$p[1]."' where cid='".$p[0]."' ";
    }
  }
  return "success";
}
include("header.php");

?>
<style>
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {border: 1px solid #c5c5c5; background: #fff; font-weight: normal; color: #454545;} 
.btn-group-xs>.btn, .btn-xs {font-size: 11px;}    
</style>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Website Pages</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- <li class="breadcrumb-item">User Summary</li> -->
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addedit_website_pages.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add Website Pages</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="section profile"> 
  <div class="col-md-12 col-sm-12 col-xs-12">   
  <?php
  if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
    ?>
    <div class="text-success text-center mt-3"><h3>Website Pages has updated successfully.</h3></div><br>
    <?php
  }       
   
  $winfo_qry = db_query("SELECT * FROM website_information WHERE 1=1 order by position ASC");        
  if(db_num_rows($winfo_qry)>0) {
    ?>
    <table id="datatable" class="table table-bordered mb-1">
    <tr class="tr-text-white">         
      <tr class="tr-text-white">
      <th class="text-center" width="3%">Slno</th>
      <th class="nowrap_space" width="25%">Page Title</th>
      <th class="nowrap_space" width="15%">Page URL</th>
      <th class="nowrap_space">Meta Title</th>  
      <th class="nowrap_space" width="8%">Page Type</th>       
      <th class="nowrap_space" width="20%">Action</th>
      </tr>           
      <tbody>

      <?php
      $slno=1;
      while($carr = db_fetch_assoc($winfo_qry)) {
        ?>  
        <tr class="ui-state-default" data-index="<?php echo $carr['slno']?>" data-position="<?php echo $carr['position']?>">

          <td class="text-center"><?php echo $slno;?></td>
          <td>
          <?php echo ucwords(strtolower($carr['page_title']));?>
          <?php
          if(!empty($carr['innder_header_img'])) {
            ?><br>
            <a href="<?php echo SITE_URL;?>/frontEnd/innderheader/<?php echo $carr['innder_header_img']?>" target="_blank">View Header</a>
            <?php
          }
          if($carr['slno']==8) {
            ?>&nbsp;|&nbsp;
            <a href="partner_benefit.php?slno=<?php echo $carr['slno']?>" title="Edit Partner Benefit"> <i class="bi bi-pencil"></i> Edit Partner Benefit</a> 
            <?php
          }
          ?>         
          </td>

          <td><?php echo $carr['page_url']?></td>

          <td><?php echo $carr['meta_title']?></td>

          <td><?php echo ($carr['page_type']=='N')?('General'):('Service')?></td>          
        
          <td>
          <a href="addedit_website_pages.php?slno=<?php echo $carr['slno']?>" alt="Edit Website Pages" title="Edit Website Pages"><button type="button" class="btn btn-primary btn-sm p-1" style="vertical-align:top;"> <i class="bi bi-pencil"></i> Edit Page</button></a>  
          <?php
          if($carr['status']=='Y') {
            ?>&nbsp;&nbsp;
            <a href="javascript:change_status('<?php echo $carr['slno']?>','N');" onclick="return confirm('Are you sure you want to shift this in Non-Approve Section');"><button type="button" class="btn btn-success btn-sm p-1" style="vertical-align:top;" id="default_active_<?php echo $arr['slno']?>"><i class="bi bi-check"></i> Approved</button> <span id="disp_active_<?php echo $arr['slno']?>"></span></a>
            <?php
          }
          else {
            ?>&nbsp;&nbsp;
            <a href="javascript:change_status('<?php echo $carr['slno'] ?>','Y');" onclick="return confirm('Are you sure you want to shift this in Approve Section');"><button type="button" class="btn btn-danger btn-sm p-1" style=";vertical-align:top;" id="default_in_active_<?php echo $arr['slno']?>"><i class="bi bi-close fa-fw"></i> Non-Approve</button> <span id="disp_in_active_<?php echo $arr['slno']?>"></span></a>
            <?php
          }

          
          ?>          
          </td>
          </tr>
          <?php
          $slno++;
        }
        ?>
        </tbody>
      </table>
      <div><h6><b>Note:</b> <small>Select Row and Use Drag and Drop feature and change display position for Front End.</small></h6></div>
      <?php
    }
    else {
      ?>
      <div class="text-center text-danger" style="font-size:16px;">No Any Website Pages Added</div>
      <?php
    }
    ?>
  </div>       
</section>
<?php
include("footer.php");
?>
<script src="<?php echo SITE_URL;?>/static/js/jquery-ui.js"></script>
<script>
$(document).ready(function(){
  $('table tbody').sortable({
    update:function(event,ui) {
      $(this).children().each(function(index) {  
        if($(this).attr('data-position') !=(index+1)){
          $(this).attr('data-position',(index+1)).addClass('updated')
        }
      });
      saveNewPositions();
    }
  });
});    

function saveNewPositions() {  
  var positions=[];
  $('.updated').each(function(){
    positions.push([$(this).attr('data-index'),$(this).attr('data-position')]);
    $(this).removeClass('updated');
  });     
  //console.log(positions);
  //alert(positions);           

  $.ajax({
    url:"website_pages.php",
    type:'get',
    data:{update:1,posval:positions},
    success:function(response) {
      //alert(response); 
      console.table(response);
    }
  });
}
</script>

<script>
function change_status(sl, status) {
  $.ajax({
    url: "website_pages.php",
    type: 'get',
    dataType: 'html',
    data: {slno: sl, status:status},
    success: function(catg_status){
      console.log(catg_status);
      //alert('ssssssss');
      if(catg_status=='Y') { 
        $("#default_in_active_"+sl).hide();
        //$("#disp_in_active_"+sl).append('<span style="display:inline-block;"><i class="fa fa-check"> Active</i></span>');
        $("#disp_in_active_"+sl).show();
        $("#disp_in_active_"+sl).append('<button type="button" class="btn btn-success btn-sm p-1" style="vertical-align:top;display:inline-block;"><i class="fa fa-check fa-fw"></i> Approved</button>');
        $("#default_inactive_"+sl).hide();
        $("#display_inactive_"+sl).append('<p class="text-success">Approved</p>');
      }
      else { //Action on Active section
        $("#default_active_"+sl).hide();
        //$("#disp_active_"+sl).append('<span style="display:inline-block;"><i class="fa fa-close"> In-Active</i></span>');
        $("#disp_active_"+sl).show();
        $("#disp_active_"+sl).append('<button type="button" class="btn btn-danger btn-sm p-1" style="vertical-align:top;"><i class="fa fa-close fa-fw"></i> Non-Approve</button>');
        $("#default_active_txt"+sl).hide();
        $("#display_active_"+sl).append('<p class="text-danger">Non-Approve</p>');
      }
      setTimeout(function(){ location.reload(); }, 200);
    }
  });
}
</script>
</body>
</html>