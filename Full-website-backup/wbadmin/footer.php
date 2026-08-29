</div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  
<!-- Main Footer -->
<footer class="main-footer noshowinprint">
    <?php echo SITE_FOOTER;?>
    <!-- <div class="float-right d-none d-sm-inline-block"><b>Version</b> 3.2.0</div> -->
  </footer>
</div>
<!-- ./wrapper -->


<div class="modal fade" id="delete_modal" admins="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header" style="display: block">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Confirm delete</h4>
            </div>
           	<!--Modal body-->
            <div class="modal-body">
            	<p>Are you sure you want to delete this data?</p>
            	<div class="text-right">
            		<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close">Close</button>
                	<button class="btn btn-danger btn-sm" id="delete_client" value="">Delete</button>
            	</div>
            </div>
           
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="<?php echo SITE_URL;?>/static/js/jquery.min.js"></script>
<script src="<?php echo SITE_URL;?>/static/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap -->

<!-- Admin-->
<script src="<?php echo SITE_URL;?>/static/js/custom.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo SITE_URL;?>/chart.js/Chart.min.js"></script>
<script src="<?php echo SITE_URL;?>/static/js/demo.js"></script>
<script src="<?php echo SITE_URL;?>/static/js/jquery.validate.js"></script>

<script src="<?php echo SITE_URL;?>/static/js/summernote.js"></script>

<script>
function multiple_openwin (file,Iwidth,Iheight,popup_name) {
    var newWin = open(file, popup_name, 'x=0,y=0,toolbar=no,location=no,directories=no,status=no,scrollbars=yes, copyhistory=no,width='+Iwidth+',height='+Iheight+',screenX=0,screenY=0,left=20,top=20');
    newWin.focus();
}
</script>

<script type="text/javascript">
$('.checked_all').on('change', function() {     
        $('.checkbox').prop('checked', $(this).prop("checked"));              
});
//deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
$('.checkbox').change(function(){ //".checkbox" change 
    if($('.checkbox:checked').length == $('.checkbox').length){
           $('.checked_all').prop('checked',true);
    }else{
           $('.checked_all').prop('checked',false);
    }
});
</script> 

<!-- <script type="text/javascript">
$(function() {             
  $('#input-description').summernote({height: 300,
    onpaste: function (e) {
       //the normal browser paste function removes all formatting:
      var clpData = ((e.originalEvent || e).clipboardData || window.clipboardData);
      if (clpData) {
        var bufferText = clpData.getData('text/plain');
        e.preventDefault();
        window.setTimeout(function() {
          document.execCommand('insertText', false, bufferText);
        }, 0);
      }
    }
  });

  $('#input-description1').summernote({height: 300,
    onpaste: function (e) {
       //the normal browser paste function removes all formatting:
      var clpData = ((e.originalEvent || e).clipboardData || window.clipboardData);
      if (clpData) {
        var bufferText = clpData.getData('text/plain');
        e.preventDefault();
        window.setTimeout(function() {
          document.execCommand('insertText', false, bufferText);
        }, 0);
      }
    }
  });

  $('#input-description2').summernote({height: 300,
    onpaste: function (e) {
       //the normal browser paste function removes all formatting:
      var clpData = ((e.originalEvent || e).clipboardData || window.clipboardData);
      if (clpData) {
        var bufferText = clpData.getData('text/plain');
        e.preventDefault();
        window.setTimeout(function() {
          document.execCommand('insertText', false, bufferText);
        }, 0);
      }
    }
  });
});
</script> -->