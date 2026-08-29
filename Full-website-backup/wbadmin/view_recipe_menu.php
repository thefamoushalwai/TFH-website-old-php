<?php
include("checklogin.php");
include("../includes/inc.php");
if($_POST['part']=='Add_View_Recipe_Table_Items') {
  ?>
  <tr>   
  <td width="20%">      
  <input type="text" class="form-control recipe_name" name="recipe_name[]" style="text-align:left;width:250px;" value="<?php echo $_POST['recipe_name']?>">      
  </td>

  <td><input type="file" class="form-control RecipeImg" name="RecipeImg[]" style="width: 200px;"></td>

  <td width="20%">&nbsp;</td>

  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveRecipe"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}
if($_POST['part']=='Add_View_Appliances_Table_Items') {
  ?>
  <tr>   
  <td width="20%">     
  <input type="text" class="form-control appliances_name" name="appliances_name[]" style="text-align:left;width:250px;" value="<?php echo $_POST['appliances_name']?>">      
  </td>

  <td><input type="file" class="form-control AppliancesImg" name="AppliancesImg[]" style="width:200px;"></td>

  <td width="20%">&nbsp;</td>
  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveAppliances"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}


$metatitle ="View Menu Recipe";
include("header.php");
if($_POST['pID']=='addeditRecipe') {
  $_REQUEST['slno'] = $_POST['slno'];   
  if(!empty($_POST['slno'])) {    
    $recipeQry = db_query("SELECT * FROM recipe_menu_item WHERE menu_item_tbl_slno='".$_POST['slno']."' ");
    if(db_num_rows($recipeQry)==0) {
      //echo "INSERT INTO recipe_menu_item SET menu_item_tbl_slno='".$_POST['slno']."', plate_serve  = '".db_real_escape(trim($_POST['plate_serve']))."', pieces_per_plate = '".db_real_escape(trim($_POST['pieces_per_plate']))."', preparation_time='".$_POST['preparation_time']."', cooking_time='".db_real_escape($_POST['cooking_time'])."', meta_title ='".db_real_escape($_POST['meta_title'])."', meta_keyword = '".db_real_escape($_POST['meta_keyword'])."', meta_desc = '".db_real_escape($_POST['meta_desc'])."', about_us_recipe = '".db_real_escape($_POST['about_us_recipe'])."' ";

      db_query("INSERT INTO recipe_menu_item SET menu_item_tbl_slno='".$_POST['slno']."', plate_serve  = '".db_real_escape(trim($_POST['plate_serve']))."', pieces_per_plate = '".db_real_escape(trim($_POST['pieces_per_plate']))."', preparation_time='".$_POST['preparation_time']."', cooking_time='".db_real_escape($_POST['cooking_time'])."', meta_title ='".db_real_escape($_POST['meta_title'])."', meta_keyword = '".db_real_escape($_POST['meta_keyword'])."', meta_desc = '".db_real_escape($_POST['meta_desc'])."', about_us_recipe = '".db_real_escape($_POST['about_us_recipe'])."' ");

      $recipe_menu_item_slno = db_insert_id();      
      $successmsg = "Y";
    }
    else {
      //echo "UPDATE recipe_menu_item SET plate_serve  = '".db_real_escape(trim($_POST['plate_serve']))."', pieces_per_plate = '".db_real_escape(trim($_POST['pieces_per_plate']))."', preparation_time='".$_POST['preparation_time']."', cooking_time='".db_real_escape($_POST['cooking_time'])."', meta_title ='".db_real_escape($_POST['meta_title'])."', meta_keyword = '".db_real_escape($_POST['meta_keyword'])."', meta_desc = '".db_real_escape($_POST['meta_desc'])."', about_us_recipe = '".db_real_escape($_POST['about_us_recipe'])."' WHERE menu_item_tbl_slno='".$_POST['slno']."' <br>";

      db_query("UPDATE recipe_menu_item SET plate_serve  = '".db_real_escape(trim($_POST['plate_serve']))."', pieces_per_plate = '".db_real_escape(trim($_POST['pieces_per_plate']))."', preparation_time='".$_POST['preparation_time']."', cooking_time='".db_real_escape($_POST['cooking_time'])."', meta_title ='".db_real_escape($_POST['meta_title'])."', meta_keyword = '".db_real_escape($_POST['meta_keyword'])."', meta_desc = '".db_real_escape($_POST['meta_desc'])."', about_us_recipe = '".db_real_escape($_POST['about_us_recipe'])."' WHERE menu_item_tbl_slno='".$_POST['slno']."' ");

      $recipeArr = db_fetch_assoc($recipeQry);
      $recipe_menu_item_slno = $recipeArr['slno'];
      $successmsg = "Y";
    }

    if(!empty($successmsg)) { 
      if(!empty($_POST['recipe_name'])){        
        foreach ($_POST['recipe_name'] as $key => $value) {
          if(!empty($value)) { 
           // echo $_POST['slno_arr'][$key]." === <br>";
            if($_POST['slno_arr'][$key]>0) {
              //echo "UPDATE recipe_appliances_kits SET kits_name  = '".db_real_escape(trim($_POST['recipe_name'][$key]))."' WHERE slno='".$_POST['slno_arr'][$key]."' && type_kits='1' <br>";
              db_query("UPDATE recipe_appliances_kits SET kits_name  = '".db_real_escape(trim($_POST['recipe_name'][$key]))."' WHERE slno='".$_POST['slno_arr'][$key]."' && type_kits='1' ");

              $kslno = $_POST['slno_arr'][$key];
            }
            else {
              if(!empty($_POST['recipe_name'][$key])) {
                $recipeKitsQry = db_query("SELECT * FROM recipe_appliances_kits WHERE recipe_menu_item_slno='".$recipe_menu_item_slno."' && type_kits='1' && kits_name='".db_real_escape($_POST['recipe_name'][$key])."' ");
                if(db_num_rows($recipeKitsQry)==0) { 
                  db_query("INSERT INTO recipe_appliances_kits SET recipe_menu_item_slno='".$recipe_menu_item_slno."', kits_name  = '".db_real_escape(trim($_POST['recipe_name'][$key]))."', type_kits='1' ");
                  $kslno = db_insert_id();
                }
              }
            }
            if(!empty($_FILES['RecipeImg']['name'][$key]) && !empty($kslno)) {
              $ext = pathinfo($_FILES['RecipeImg']['name'][$key],PATHINFO_EXTENSION); 
              $imagename = $kslno.".".$ext;  
              $image_upload_path = BASEDIR."/frontEnd/recipeimage/".$imagename;                
              move_uploaded_file($_FILES['RecipeImg']['tmp_name'][$key],$image_upload_path); 
              //echo "UPDATE recipe_appliances_kits SET kits_img = '".$imagename."' WHERE slno='".$kslno."'<br>";
              db_query("UPDATE recipe_appliances_kits SET kits_img = '".$imagename."' WHERE slno='".$kslno."' "); 
            }
          }
        }
      }
      if(!empty($_POST['appliances_name'])){        
        foreach ($_POST['appliances_name'] as $key => $value) {
          if(!empty($value)) {
            echo $_POST['appliance_slno_arr'][$key]." ######## <br>";
            if($_POST['appliance_slno_arr'][$key]>0) {
              //echo "UPDATE recipe_appliances_kits SET kits_name  = '".db_real_escape(trim($_POST['appliances_name'][$key]))."' WHERE slno='".$_POST['appliance_slno_arr'][$key]."' && type_kits='2'<br>";
              db_query("UPDATE recipe_appliances_kits SET kits_name  = '".db_real_escape(trim($_POST['appliances_name'][$key]))."' WHERE slno='".$_POST['appliance_slno_arr'][$key]."' && type_kits='2' ");

              $Aslno = $_POST['appliance_slno_arr'][$key];
            }
            else {
              if(!empty($_POST['appliances_name'][$key])) {            
                $AppliancesKitsQry = db_query("SELECT * FROM recipe_appliances_kits WHERE recipe_menu_item_slno='".$recipe_menu_item_slno."' && type_kits='2' && kits_name='".db_real_escape($_POST['appliances_name'][$key])."' ");
                if(db_num_rows($AppliancesKitsQry)==0) { 
                  db_query("INSERT INTO recipe_appliances_kits SET recipe_menu_item_slno='".$recipe_menu_item_slno."', kits_name  = '".db_real_escape(trim($_POST['appliances_name'][$key]))."', type_kits='2' ");
                  $Aslno = db_insert_id();
                }
              }
            }

            if(!empty($_FILES['AppliancesImg']['name'][$key]) && !empty($Aslno)) {
              $ext = pathinfo($_FILES['AppliancesImg']['name'][$key],PATHINFO_EXTENSION); 
              $imagename = $Aslno.".".$ext;  
              $image_upload_path = BASEDIR."/frontEnd/appliances/".$imagename;                
              move_uploaded_file($_FILES['AppliancesImg']['tmp_name'][$key],$image_upload_path); 
              db_query("UPDATE recipe_appliances_kits SET kits_img = '".$imagename."' WHERE slno='".$Aslno."' "); 
            }
          }
        }
      }
      ?>
      <script type="text/javascript">
      window.location.href = "<?php echo ADMIN_SITE_URL;?>/view_recipe_menu.php?success=yes&slno=<?php echo $_POST['slno'];?>";  
      </script>
      <?php
      exit;
    }
    else {
      $errorMsg='N';
    }
  }  
}

$MeniItemArr = db_fetch_assoc(db_query("SELECT * FROM menu_item_tbl WHERE slno ='".$_REQUEST['slno']."'"));
$cuisineArr = db_fetch_assoc(db_query("SELECT * FROM event_cuisine WHERE slno ='".$MeniItemArr['event_cuisine_slno']."'"));
?>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>View <span class="text-danger"><?php echo $MeniItemArr['menu_name']?></span> Recipe</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/view_menu.php?menuID=<?php echo $MeniItemArr['slno']?>"><?php echo $cuisineArr['cuisine_title']?> Menu Items</a></li>
          <li class="breadcrumb-item active"><?php echo $MeniItemArr['menu_name']?> Recipe</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content-header mt-4">
  <div class="container-fluid"> 
    <?php      
    $recipeQry = db_query("SELECT * FROM recipe_menu_item WHERE menu_item_tbl_slno ='".$_REQUEST['slno']."'");
    if(db_num_rows($recipeQry)>0) {
      $recipeArr = db_fetch_assoc($recipeQry);
      $_POST['plate_serve'] = $recipeArr['plate_serve'];  
      $_POST['pieces_per_plate'] = $recipeArr['pieces_per_plate'];
      $_POST['preparation_time'] = $recipeArr['preparation_time'];  
      $_POST['cooking_time'] = $recipeArr['cooking_time'];
      $_POST['about_us_recipe'] = $recipeArr['about_us_recipe'];  
      $_POST['meta_title'] = $recipeArr['meta_title'];   
      $_POST['meta_keyword']  = $recipeArr['meta_keyword']; 
      $_POST['meta_desc'] = $recipeArr['meta_desc'];
    }      
    ?>
    <form name="searchfrm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" data-parsley-validate autocomplete="off" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">          
            <div class="x_content">
            <?php            
            if(!empty($errorMsg)) {  
              ?>
              <div class="text-danger text-center mt-3"><h3>You are trying wrong for update Recipe.</h3></div><br>
              <?php
            }
            else if($_REQUEST['success']=='yes') { 
              ?>
              <div class="text-success text-center mt-3"><h2>Recipe has updated successfully.</h2></div><br>
              <?php
            }
            ?>  
            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label">* Menu Name</label>
              <div class="col-sm-6">
              <input class="form-control" type="text" value="<?php echo $MeniItemArr['menu_name']?>" readonly>
              </div>
            </div>
           
            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Plate Serves 3</label>
            <div class="col-sm-5"><input type="text" class="form-control" name="plate_serve" value="<?php echo $_POST['plate_serve']?>">
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Pieces per plate</label>
            <div class="col-sm-5"><input type="text" class="form-control" name="pieces_per_plate" value="<?php echo $_POST['pieces_per_plate']?>">
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Mins Preparation Time</label>
            <div class="col-sm-5"><input type="text" class="form-control" name="preparation_time" value="<?php echo $_POST['preparation_time']?>">
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Mins Cooking Time</label>
            <div class="col-sm-5"><input type="text" class="form-control" name="cooking_time" value="<?php echo $_POST['cooking_time']?>">
            </div>
            </div>
                       

            <div class="row mb-3">
            <label for="short_desc" class="col-sm-3 form-control-label">About Recipe</label>
            <div class="col-md-8">
                <textarea type="text" class="form-control" name="about_us_recipe" rows="4"><?php echo $_POST['about_us_recipe']?></textarea>
                <script>CKEDITOR.replace('about_us_recipe');</script>   
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Meta Title</label>
            <div class="col-sm-5"><input type="text" class="form-control" name="meta_title" value="<?php echo $_POST['meta_title']?>">
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Meta Keyword</label>
            <div class="col-sm-5"><input type="text" class="form-control" name="meta_keyword" value="<?php echo $_POST['meta_keyword']?>">
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Meta Desc</label>
            <div class="col-sm-5"><input type="text" class="form-control" name="meta_desc" value="<?php echo $_POST['meta_desc']?>">
            </div>
            </div>
           
           <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label">Menu Recipe <br> (W:150px H:100px (max 10KB))</label>
            <div class="col-sm-8">
            <table class="table table-hover table-center mb-0 table-bordered" id="myTableF">
              <?php
              $recipeKitsQry = db_query("SELECT * FROM recipe_appliances_kits WHERE type_kits='1' && kits_name!='' ");
              while($recipeArr=db_fetch_assoc($recipeKitsQry)) {
                ?>
                <tr>                
                <td width="20%">      
                <input type="text" class="form-control recipe_name" name="recipe_name[]" style="text-align:left;width:250px;" value="<?php echo $recipeArr['kits_name']?>">      
                </td>
                <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                <td><input type="file" class="form-control RecipeImg" name="RecipeImg[]" placeholder="Mobile No." style="width: 200px;"></td>

                <td width="20%" align="center">
                <?php 
                if(!empty($recipeArr['kits_img'])) {
                  ?>  
                  <img src="<?php echo SITE_URL;?>/frontEnd/recipeimage/<?php echo $recipeArr['kits_img']?>" style="width: 80px;">
                  <?php
                }
                ?>
                </td>

                <td>
                <input type="hidden" name="slno_arr[]" value="<?php echo $recipeArr['slno']?>">  
                <span class="float-right ml-2"><a href="javascript:void" class="RemoveRecipeE"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                <?php
              }
              ?>
              <tr>                
              <td width="20%">      
              <input type="text" class="form-control recipe_name" name="recipe_name[]" style="text-align:left;width:250px;" placeholder="Recipe Name">      
              </td>
              <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
              <td><input type="file" class="form-control RecipeImg" name="RecipeImg[]" placeholder="Mobile No." style="width: 200px;"></td>

              <td width="20%">&nbsp;</td>

              <td>
              <span class="float-right ml-2"> <a href="javascript:void" id="AddR"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
              </td>  
              </tr>
              
              </table>  
            </div>
            </div>

            <div class="row mb-3">
            <label for="page_url" class="col-sm-3 form-control-label"><b>Appliances Require</b> <br> (W:150px H:100px (max 10KB))</label>
            <div class="col-sm-8">
            <table class="table table-hover table-center mb-0 table-bordered" id="myTableA">
             <?php
              $AppliancesQry = db_query("SELECT * FROM recipe_appliances_kits WHERE type_kits='2' && kits_name!='' ");
              while($ApplArr=db_fetch_assoc($AppliancesQry)) {
                ?>
                <tr>                
                <td width="20%">  
                <input type="text" class="form-control appliances_name" name="appliances_name[]" style="text-align:left;width:250px;" value="<?php echo $ApplArr['kits_name']?>">      
                </td>
                <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                <td><input type="file" class="form-control AppliancesImg" name="AppliancesImg[]" style="width: 200px;"></td>

                <td width="20%" align="center">
                <?php 
                if(!empty($ApplArr['kits_img'])) {
                  ?>  
                  <img src="<?php echo SITE_URL;?>/frontEnd/appliances/<?php echo $ApplArr['kits_img']?>" style="width:80px">
                  <?php
                }
                ?>
                </td>

                <td>
                <input type="hidden" name="appliance_slno_arr[]" value="<?php echo $ApplArr['slno']?>">    
                <span class="float-right ml-2"> <a href="javascript:void" class="RemoveApplArrE"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                <?php
              }
              ?> 
             <tr>                
             <td width="20%">  
              <input type="text" class="form-control appliances_name" name="appliances_name[]" style="text-align:left;width:250px;" placeholder="Appliances Name">      
              </td>
              <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
              <td><input type="file" class="form-control AppliancesImg" name="AppliancesImg[]" style="width: 200px;"></td>

              <td width="20%">&nbsp;</td>

              <td>
              <span class="float-right ml-2"> <a href="javascript:void" id="AddA"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
              </td>  
              </tr>
              
              </table>  
            </div>
            </div>
            

            <div class="form-group row">
              <label for="title_en" class="col-sm-3 form-control-label">&nbsp;</label>
              <div class="col-sm-5"> 
              <input type="hidden" name="pID" value="addeditRecipe">
              <input type="hidden" name="slno" value="<?php echo $_REQUEST['slno']?>">
              <button type="submit" class="btn-info bg-info text-white"><i class="fa fa-save"></i> SUBMIT</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</form>
</div>
</section>

<?php
include("footer.php");
?>
<script>
$(document).on("click", "#AddR", function(e) {
  var recipe_name=$(this).closest('tr').find('.recipe_name').val(); 
  if(recipe_name!=''){
    jQuery.ajax({
      type:'POST',
      url:'view_recipe_menu.php',
      data:'part=Add_View_Recipe_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableF').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveRecipe", function(e) {
  $(this).parents("tr").remove();
});

$(document).on("click", "#AddA", function(e) {
  var appliances_name=$(this).closest('tr').find('.appliances_name').val(); 
  if(appliances_name!=''){
    jQuery.ajax({
      type:'POST',
      url:'view_recipe_menu.php',
      data:'part=Add_View_Appliances_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableA').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveAppliances", function(e) {
  $(this).parents("tr").remove();
});  
</script>
</body>
</html>