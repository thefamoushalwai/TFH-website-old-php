<?php
include("checklogin.php");
include("../includes/inc.php");

$metatitle ="Manage Top Header Banner";

if (!empty($_REQUEST['slno']) && !empty($_REQUEST['status'])) { //Update Course display status

  db_query("UPDATE homepage_banner set status = '".$_REQUEST['status']."' WHERE slno='".$_REQUEST['slno']."' ");
  echo $_REQUEST['status'];
}
else if (!empty($_REQUEST['posval'])) { //Update Postion as Dynamic
  if(count($_REQUEST['posval'])>0) {
    foreach($_REQUEST['posval'] as $p) {
      db_query("UPDATE homepage_banner set position = '".$p[1]."' WHERE slno='".$p[0]."'");
      //echo "UPDATE homepage_banner set position = '".$p[1]."' where slno='".$p[0]."' ";
    }
  }
  return "success";
}

include("header.php");

?>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>Manage Top Header Banner</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- <li class="breadcrumb-item">User Summary</li> -->
          <li class="breadcrumb-item active"><a href="<?php echo ADMIN_SITE_URL ?>/addeditbanner.php"><span class="btn-info" style="border-radius: 3px;padding: 5px;">Add New Banner</span></a></li>
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
          <div class="text-success text-center mt-3"><h3>Top Header Banner detail has updated successfully.</h3></div><br>
          <?php
        }        
         
        $hpbanner_qry = db_query("SELECT * FROM homepage_banner WHERE 1=1 order by position ASC");        

        if(db_num_rows($hpbanner_qry)>0) {
          ?>
          <table id="datatable" class="table table-bordered mb-1">
          <tr class="tr-text-white">         
            <tr class="tr-text-white">
            <th width="5%">Slno</th>
            <th width="40%">Banner Heading</th>
            <th width="15%">Banner View</th>            
            <th width="15%">Option</th>
            </tr>           
            <tbody>

            <?php
            $slno=1;
            while($carr = db_fetch_assoc($hpbanner_qry)) {

              ?>  
              <tr class="ui-state-default" data-index="<?php echo $carr['slno']?>" data-position="<?php echo $carr['position']?>">

                <td class="text-center"><?php echo $slno;?></td>

                <td>
                <?php echo ucwords(strtolower($carr['heading']));?></td>

                <td>
                <?php 
                if(!empty($carr['homepage_img'])) {

                  ?>
                  <a href="<?php echo SITE_URL;?>/frontEnd/hpbanner/<?php echo $carr['homepage_img']?>" target="_blank">View</a>
                  <?php
                }
                ?>
                </td>                
              
                <td>
                <a href="<?php echo ADMIN_SITE_URL ?>/addeditbanner.php?slno=<?php echo $carr['slno'];?>" alt="Edit Banner" title="Edit Banner"><button type="button" class="btn btn-primary btn-sm p-1" style="vertical-align:top;"> <i class="bi bi-pencil"></i> Edit</button></a>  
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
            <div class="text-center red" style="font-size:16px;">No Any Menu Banner Added</div>
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
    url:"manage_top_homebanner.php",
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
    url: "manage_top_homebanner.php",
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