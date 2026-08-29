<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Service Category";

if (!empty($_REQUEST['slno']) && !empty($_REQUEST['status'])) { //Update Course display status

  db_query("UPDATE product_category set status = '".$_REQUEST['status']."' where cid='".$_REQUEST['slno']."' ");
  echo $_REQUEST['status'];
}
else if (!empty($_REQUEST['posval'])) { //Update Postion as Dynamic
  if(count($_REQUEST['posval'])>0) {
    foreach($_REQUEST['posval'] as $p) {
      db_query("update product_category set position = '".$p[1]."' where cid='".$p[0]."'");
      //echo "update services_category set position = '".$p[1]."' where cid='".$p[0]."' ";
    }
  }
  return "success";
}

include("header.php");

$ref_id=0;
if(!empty($_REQUEST['refID'])) {
  $ref_id=$_REQUEST['refID'];
}
?>
<style>
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {border: 1px solid #c5c5c5; background: #fff; font-weight: normal; color: #454545;} 
.btn-group-xs>.btn, .btn-xs {font-size: 11px;}    
</style>

<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage Service Category</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- <li class="breadcrumb-item">User Summary</li> -->
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addedit_category.php?refID=<?php echo $ref_id;?>"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New Category</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="section profile">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="card">      
        <div class="card-body profile-card pt-1">
        <?php
        if(!empty($_REQUEST['success']) && $_REQUEST['success']=='yes') {  
          ?>
          <div class="text-success text-center mt-3"><h3>Category detail has updated successfully.</h3></div><br>
          <?php
        }        
         
        $product_catg_qry = db_query("SELECT * FROM product_category WHERE ref_id='".$ref_id."' order by position ASC");        

        if(db_num_rows($product_catg_qry)>0) {
          ?>
          <table id="datatable" class="table table-bordered mb-1">
          <tr class="tr-text-white">         
            <tr class="tr-text-white">
            <th class="text-center" width="3%">Slno</th>
            <th width="15%">Category Name</th>
            <th width="35%">Meta Title</th>
            <th width="20%">Action</th>
            </tr>           
            <tbody>

            <?php
            $slno=1;
            while($carr = db_fetch_assoc($product_catg_qry)) {

              ?>  
              <tr class="ui-state-default" data-index="<?php echo $carr['cid']?>" data-position="<?php echo $carr['position']?>">

                <td class="text-center"><?php echo $slno;?></td>

                <td>
                <?php echo ucwords(strtolower($carr['product_catg']));?><br>

                <?php 
                if(!empty($carr['catg_img'])) {

                  ?>
                  <a href="<?php echo SITE_URL;?>/frontEnd/pcategory/<?php echo $carr['catg_img']?>" target="_blank">View</a>
                  <?php
                }
                ?>
                </td>

                <td><?php echo ucwords(strtolower($carr['meta_title']));?></td>
              
                <td>
                <a href="addedit_category.php?cid=<?php echo $carr['cid']?>" alt="Edit Product Category" title="Edit Product Category"><button type="button" class="btn btn-primary btn-sm p-1" style="vertical-align:top;"> <i class="bi bi-pencil"></i> Edit</button></a>  

                <?php
                if($carr['status']=='Y') {

                  ?>&nbsp;&nbsp;
                  <a href="javascript:change_status('<?php echo $carr['cid']?>','N');" onclick="return confirm('Are you sure you want to shift this in Non-Approve Section');"><button type="button" class="btn btn-success btn-sm p-1" style="vertical-align:top;" id="default_active_<?php echo $arr['slno']?>"><i class="bi bi-check"></i> Approved</button> <span id="disp_active_<?php echo $arr['slno']?>"></span></a>
                  <?php
                }
                else {
                  ?>&nbsp;&nbsp;
                  <a href="javascript:change_status('<?php echo $carr['cid'] ?>','Y');" onclick="return confirm('Are you sure you want to shift this in Approve Section');"><button type="button" class="btn btn-danger btn-sm p-1" style=";vertical-align:top;" id="default_in_active_<?php echo $arr['slno']?>"><i class="bi bi-close fa-fw"></i> Non-Approve</button> <span id="disp_in_active_<?php echo $arr['slno']?>"></span></a>
                  <?php
                }

                if($carr['is_category']=='Y') {
                  ?>&nbsp;&nbsp;
                  <a href="<?php echo ADMIN_SITE_URL; ?>/manage_service_category.php?refID=<?php echo $carr['cid']; ?>" alt="View Sub Product Category" title="View Sub Product Category"><button type="button" class="btn btn-info btn-sm p-1" style="vertical-align:top;"> <i class="bi bi-eye"></i> Sub Category</button></a> 
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
            <div class="text-center red" style="font-size:16px;">No Any Menu Category Added</div>
            <?php
          }
          ?>
          </div>  
      </div>
    </div>
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
    url:"manage_service_category.php",
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
    url: "manage_service_category.php",
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