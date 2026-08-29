<?php
include("checklogin.php");
include("../includes/inc.php");

if($_POST['part']=='Add_Personal_Info_Table_Items') {
  ?>
  <tr>   
  <td>      
  <input type="text" class="form-control personal_info" name="personal_info[]" value="<?php echo $_POST['personal_info']?>" style="text-align:left;width:570px;" placeholder="enter Personal Information">      
  </td>

  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveEP"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}
if($_POST['part']=='Add_WorkExperience_Table_Items') {
  ?>
  <tr>   
  <td>      
  <input type="text" class="form-control experience_info" name="experience_info[]" value="<?php echo $_POST['experience_info']?>" style="text-align:left;width:570px;" placeholder="Work Experience in Firm and Location">      
  </td>

  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveEE"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}
if($_POST['part']=='Add_Hotel_Restaurant_Table_Items') {
  ?>
  <tr>   
  <td>     
  <input type="text" class="form-control hotel_name" name="hotel_name[]" style="text-align:left;width:250px;" value="<?php echo $_POST['hotel_name']?>">      
  </td>

  <td><input type="file" class="form-control HotelImg" name="HotelImg[]" style="width:200px;"></td>

  <td>&nbsp;</td>
  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveEL"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}

if($_POST['part']=='Add_worked_Location_Table_Items') {
  ?>
  <tr>   
  <td>     
  <input type="text" class="form-control hotel_nameA" name="hotel_nameA[]" style="text-align:left;width:250px;" value="<?php echo $_POST['hotel_name']?>">      
  </td>

  <td><input type="file" class="form-control HotelImgA" name="HotelImgA[]" style="width:200px;"></td>

  <td>&nbsp;</td>
  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveA"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}

if($_POST['part']=='Add_Cuisines_Table_Items') {
  ?>
  <tr>   
  <td>     
  <input type="text" class="form-control hotel_nameB" name="hotel_nameB[]" style="text-align:left;width:250px;" value="<?php echo $_POST['hotel_name']?>">      
  </td>

  <td><input type="file" class="form-control HotelImgB" name="HotelImgB[]" style="width:200px;"></td>

  <td>&nbsp;</td>
  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveB"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}
if($_POST['part']=='Add_North_Indian_Table_Items') {
  ?>
  <tr>   
  <td>     
  <input type="text" class="form-control hotel_nameC" name="hotel_nameC[]" style="text-align:left;width:250px;" value="<?php echo $_POST['hotel_name']?>">      
  </td>

  <td><input type="file" class="form-control HotelImgC" name="HotelImgC[]" style="width:200px;"></td>

  <td>&nbsp;</td>
  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveC"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}
if($_POST['part']=='Add_Starters_Table_Items') {
  ?>
  <tr>   
  <td>     
  <input type="text" class="form-control hotel_nameD" name="hotel_nameD[]" style="text-align:left;width:250px;" value="<?php echo $_POST['hotel_name']?>">      
  </td>

  <td><input type="file" class="form-control HotelImgD" name="HotelImgD[]" style="width:200px;"></td>

  <td>&nbsp;</td>
  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveD"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}
if($_POST['part']=='Add_Dessert_Table_Items') {
  ?>
  <tr>   
  <td>     
  <input type="text" class="form-control hotel_nameF" name="hotel_nameF[]" style="text-align:left;width:250px;" value="<?php echo $_POST['hotel_name']?>">      
  </td>

  <td><input type="file" class="form-control HotelImgF" name="HotelImgF[]" style="width:200px;"></td>

  <td>&nbsp;</td>
  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveF"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}
if($_POST['part']=='Add_Breakfast_Table_Items') {
  ?>
  <tr>   
  <td>     
  <input type="text" class="form-control hotel_nameG" name="hotel_nameG[]" style="text-align:left;width:250px;" value="<?php echo $_POST['hotel_name']?>">      
  </td>

  <td><input type="file" class="form-control HotelImgG" name="HotelImgG[]" style="width:200px;"></td>

  <td>&nbsp;</td>
  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveG"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}
if($_POST['part']=='Add_Chinese_Table_Items') {
  ?>
  <tr>   
  <td>     
  <input type="text" class="form-control hotel_nameH" name="hotel_nameH[]" style="text-align:left;width:250px;" value="<?php echo $_POST['hotel_name']?>">      
  </td>

  <td><input type="file" class="form-control HotelImgH" name="HotelImgH[]" style="width:200px;"></td>

  <td>&nbsp;</td>
  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveH"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}
if($_POST['part']=='Add_Barbecue_Table_Items') {
  ?>
  <tr>   
  <td>     
  <input type="text" class="form-control hotel_nameJ" name="hotel_nameJ[]" style="text-align:left;width:250px;" value="<?php echo $_POST['hotel_name']?>">      
  </td>

  <td><input type="file" class="form-control HotelImgJ" name="HotelImgJ[]" style="width:200px;"></td>

  <td>&nbsp;</td>
  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveJ"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}
if($_POST['part']=='Add_South_Indian_Table_Items') {
  ?>
  <tr>   
  <td>     
  <input type="text" class="form-control hotel_nameK" name="hotel_nameK[]" style="text-align:left;width:250px;" value="<?php echo $_POST['hotel_name']?>">      
  </td>

  <td><input type="file" class="form-control HotelImgK" name="HotelImgK[]" style="width:200px;"></td>

  <td>&nbsp;</td>
  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveK"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}
if($_POST['part']=='Add_Navratri_Table_Items') {
  ?>
  <tr>   
  <td>     
  <input type="text" class="form-control hotel_nameM" name="hotel_nameM[]" style="text-align:left;width:250px;" value="<?php echo $_POST['hotel_name']?>">      
  </td>

  <td><input type="file" class="form-control HotelImgM" name="HotelImgM[]" style="width:200px;"></td>

  <td>&nbsp;</td>
  <td>
  <span class="float-right ml-2"> <a href="javascript:void" class="RemoveM"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
  </td>  
  </tr>
  <?php
  exit;
}

$metatitle ="View Worker Profile";
include("header.php");
if($_POST['pID']=='addeditWorkProfile') {
  $_REQUEST['slno'] = $_POST['profwslno'];   
  if(!empty($_POST['profwslno'])) {    

    if(!empty($_POST['personal_info'])){        
      foreach ($_POST['personal_info'] as $key => $value) {
        if(!empty($value)) {           
          if($_POST['pslno_arr'][$key]>0) {
            //echo "UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['personal_info'][$key]))."', work_type='1' WHERE slno='".$_POST['pslno_arr'][$key]."' && work_type='1' <br>";
            db_query("UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['personal_info'][$key]))."', work_type='1' WHERE slno='".$_POST['pslno_arr'][$key]."' && work_type='1' ");
          }
          else {
            if(!empty($_POST['hotel_nameA'][$key])) {
              $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='1' && worker_title='".db_real_escape($_POST['personal_info'][$key])."' ");
              if(db_num_rows($recipeKitsQry)==0) { 
                //echo "INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['personal_info'][$key]))."', work_type='1' ";
                db_query("INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['personal_info'][$key]))."', work_type='1' ");                
              }
            }
          }          
        }
      }
    }
    
    if(!empty($_POST['experience_info'])){        
      foreach ($_POST['experience_info'] as $key => $value) {
        if(!empty($value)) {           
          if($_POST['wslno_arr'][$key]>0) {
            //echo "UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['experience_info'][$key]))."', work_type='2' WHERE slno='".$_POST['wslno_arr'][$key]."' && work_type='2' <br>";
            db_query("UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['experience_info'][$key]))."', work_type='2' WHERE slno='".$_POST['wslno_arr'][$key]."' && work_type='2' ");
          }
          else {
            if(!empty($_POST['hotel_nameA'][$key])) {
              $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='2' && worker_title='".db_real_escape($_POST['experience_info'][$key])."' ");
              if(db_num_rows($recipeKitsQry)==0) { 
                //echo "INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['experience_info'][$key]))."', work_type='2' ";
                db_query("INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['experience_info'][$key]))."', work_type='2' ");                
              }
            }
          }          
        }
      }
    }

    //has worked at
    if(!empty($_POST['hotel_nameA'])){        
      foreach ($_POST['hotel_nameA'] as $key => $value) {
        if(!empty($value)) {           
          if($_POST['Aslno_arr'][$key]>0) {
            //echo "UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameB'][$key]))."' WHERE slno='".$_POST['Bslno_arr'][$key]."' && work_type='4'<br>";
            db_query("UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameA'][$key]))."' WHERE slno='".$_POST['Aslno_arr'][$key]."' && work_type='3' ");
            $Bslno = $_POST['Aslno_arr'][$key];
          }
          else {
            if(!empty($_POST['hotel_nameA'][$key])) {
              //echo "SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='4' && worker_title='".db_real_escape($_POST['hotel_nameB'][$key])."' ";
              $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='3' && worker_title='".db_real_escape($_POST['hotel_nameA'][$key])."' ");
              if(db_num_rows($recipeKitsQry)==0) { 
                db_query("INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameA'][$key]))."', work_type='3' ");
                $Bslno = db_insert_id();
              }
            }
          }
          if(!empty($_FILES['HotelImgA']['name'][$key]) && !empty($Aslno)) {
            $ext = pathinfo($_FILES['HotelImgA']['name'][$key],PATHINFO_EXTENSION); 
            $imagename = $Aslno.".".$ext;  
            $image_upload_path = BASEDIR."/frontEnd/workerimage/".$imagename;                
            move_uploaded_file($_FILES['HotelImgA']['tmp_name'][$key],$image_upload_path); 
            //echo "UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Aslno."'<br>";
            db_query("UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Aslno."' "); 
          }
        }
      }
    }
    //has worked at

    //knows these Cuisines
    if(!empty($_POST['hotel_nameB'])){        
      foreach ($_POST['hotel_nameB'] as $key => $value) {
        if(!empty($value)) {           
          if($_POST['Bslno_arr'][$key]>0) {            
            db_query("UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameB'][$key]))."' WHERE slno='".$_POST['Bslno_arr'][$key]."' && work_type='4' ");
            $Bslno = $_POST['Bslno_arr'][$key];
          }
          else {
            if(!empty($_POST['hotel_nameB'][$key])) {             
              $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='4' && worker_title='".db_real_escape($_POST['hotel_nameB'][$key])."' ");
              if(db_num_rows($recipeKitsQry)==0) { 
                db_query("INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameB'][$key]))."', work_type='4' ");
                $Bslno = db_insert_id();
              }
            }
          }
          if(!empty($_FILES['HotelImgB']['name'][$key]) && !empty($Bslno)) {
            $ext = pathinfo($_FILES['HotelImgB']['name'][$key],PATHINFO_EXTENSION); 
            $imagename = $Bslno.".".$ext;  
            $image_upload_path = BASEDIR."/frontEnd/workerimage/".$imagename;                
            move_uploaded_file($_FILES['HotelImgB']['tmp_name'][$key],$image_upload_path);             
            db_query("UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Bslno."' "); 
          }
        }
      }
    }
    //knows these Cuisines

    //North Indian Dishes by
    if(!empty($_POST['hotel_nameC'])){        
      foreach ($_POST['hotel_nameC'] as $key => $value) {
        if(!empty($value)) {           
          if($_POST['Cslno_arr'][$key]>0) {
            //echo "UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameC'][$key]))."' WHERE slno='".$_POST['Cslno'][$key]."' && work_type='5'<br>";
            db_query("UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameC'][$key]))."' WHERE slno='".$_POST['Cslno_arr'][$key]."' && work_type='5' ");
            $Cslno = $_POST['Cslno_arr'][$key];
          }
          else {
            if(!empty($_POST['hotel_nameC'][$key])) {
              //echo "SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='4' && worker_title='".db_real_escape($_POST['hotel_nameB'][$key])."' ";
              $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='5' && worker_title='".db_real_escape($_POST['hotel_nameC'][$key])."' ");
              if(db_num_rows($recipeKitsQry)==0) { 
                //echo "INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameC'][$key]))."', work_type='5' <br>";
                db_query("INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameC'][$key]))."', work_type='5' ");
                $Cslno = db_insert_id();
              }
            }
          }
          if(!empty($_FILES['HotelImgC']['name'][$key]) && !empty($Cslno)) {
            $ext = pathinfo($_FILES['HotelImgC']['name'][$key],PATHINFO_EXTENSION); 
            $imagename = $Cslno.".".$ext;  
            $image_upload_path = BASEDIR."/frontEnd/workerimage/".$imagename;                
            move_uploaded_file($_FILES['HotelImgC']['tmp_name'][$key],$image_upload_path); 
            //echo "UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Cslno."'<br>";
            db_query("UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Cslno."' "); 
          }
        }
      }
    }
    //North Indian Dishes by

    //Starters Dishes by
    if(!empty($_POST['hotel_nameD'])){        
      foreach ($_POST['hotel_nameD'] as $key => $value) {
        if(!empty($value)) {           
          if($_POST['Dslno_arr'][$key]>0) {
            //echo "UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameD'][$key]))."' WHERE slno='".$_POST['Dslno_arr'][$key]."' && work_type='6'<br>";
            db_query("UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameD'][$key]))."' WHERE slno='".$_POST['Dslno_arr'][$key]."' && work_type='6' ");
            $Dslno = $_POST['Dslno_arr'][$key];
          }
          else {
            if(!empty($_POST['hotel_nameD'][$key])) {
              //echo "SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='4' && worker_title='".db_real_escape($_POST['hotel_nameB'][$key])."' ";
              $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='6' && worker_title='".db_real_escape($_POST['hotel_nameD'][$key])."' ");
              if(db_num_rows($recipeKitsQry)==0) { 
                //echo "INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameD'][$key]))."', work_type='6' <br>";
                db_query("INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameD'][$key]))."', work_type='6' ");
                $Dslno = db_insert_id();
              }
            }
          }

          if(!empty($_FILES['HotelImgD']['name'][$key]) && !empty($Dslno)) {
            $ext = pathinfo($_FILES['HotelImgD']['name'][$key],PATHINFO_EXTENSION); 
            $imagename = $Dslno.".".$ext;  
            $image_upload_path = BASEDIR."/frontEnd/workerimage/".$imagename;                
            move_uploaded_file($_FILES['HotelImgD']['tmp_name'][$key],$image_upload_path); 
            //echo "UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Dslno."'<br>";
            db_query("UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Dslno."' "); 
          }
        }
      }
    }
    //Starters Dishes by

    //Desserts Dishes by 
    if(!empty($_POST['hotel_nameF'])){        
      foreach ($_POST['hotel_nameF'] as $key => $value) {
        if(!empty($value)) {           
          if($_POST['Fslno_arr'][$key]>0) {
            //echo "UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameF'][$key]))."' WHERE slno='".$_POST['Fslno_arr'][$key]."' && work_type='7'<br>";
            db_query("UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameF'][$key]))."' WHERE slno='".$_POST['Fslno_arr'][$key]."' && work_type='7' ");
            $Fslno = $_POST['Fslno_arr'][$key];
          }
          else {
            if(!empty($_POST['hotel_nameF'][$key])) {
              //echo "SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='4' && worker_title='".db_real_escape($_POST['hotel_nameB'][$key])."' ";
              $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='7' && worker_title='".db_real_escape($_POST['hotel_nameF'][$key])."' ");
              if(db_num_rows($recipeKitsQry)==0) { 
                //echo "INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameF'][$key]))."', work_type='7' <br>";
                db_query("INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameF'][$key]))."', work_type='7' ");
                $Fslno = db_insert_id();
              }
            }
          }
          if(!empty($_FILES['HotelImgF']['name'][$key]) && !empty($Fslno)) {
            $ext = pathinfo($_FILES['HotelImgF']['name'][$key],PATHINFO_EXTENSION); 
            $imagename = $Fslno.".".$ext;  
            $image_upload_path = BASEDIR."/frontEnd/workerimage/".$imagename;                
            move_uploaded_file($_FILES['HotelImgF']['tmp_name'][$key],$image_upload_path); 
            //echo "UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Fslno."'<br>";
            db_query("UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Fslno."' "); 
          }
        }
      }
    }
    //Desserts Dishes by 

     //Breakfast Dishes by
    if(!empty($_POST['hotel_nameG'])){        
      foreach ($_POST['hotel_nameG'] as $key => $value) {
        if(!empty($value)) {           
          if($_POST['Gslno_arr'][$key]>0) {
            //echo "UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameG'][$key]))."' WHERE slno='".$_POST['Gslno_arr'][$key]."' && work_type='8'<br>";
            db_query("UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameG'][$key]))."' WHERE slno='".$_POST['Gslno_arr'][$key]."' && work_type='8' ");
            $Gslno = $_POST['Gslno_arr'][$key];
          }
          else {
            if(!empty($_POST['hotel_nameG'][$key])) {
              //echo "SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='4' && worker_title='".db_real_escape($_POST['hotel_nameB'][$key])."' ";
              $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='8' && worker_title='".db_real_escape($_POST['hotel_nameG'][$key])."' ");
              if(db_num_rows($recipeKitsQry)==0) { 
                //echo "INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameG'][$key]))."', work_type='8' <br>";
                db_query("INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameG'][$key]))."', work_type='8' ");
                $Gslno = db_insert_id();
              }
            }
          }
          if(!empty($_FILES['HotelImgG']['name'][$key]) && !empty($Gslno)) {
            $ext = pathinfo($_FILES['HotelImgG']['name'][$key],PATHINFO_EXTENSION); 
            $imagename = $Gslno.".".$ext;  
            $image_upload_path = BASEDIR."/frontEnd/workerimage/".$imagename;                
            move_uploaded_file($_FILES['HotelImgG']['tmp_name'][$key],$image_upload_path); 
            //echo "UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Gslno."'<br>";
            db_query("UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Gslno."' "); 
          }
        }
      }
    }
    //Breakfast Dishes by

     // Chinese Dishes by
    if(!empty($_POST['hotel_nameH'])){        
      foreach ($_POST['hotel_nameH'] as $key => $value) {
        if(!empty($value)) {           
          if($_POST['Hslno_arr'][$key]>0) {
            //echo "UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameH'][$key]))."' WHERE slno='".$_POST['Hslno_arr'][$key]."' && work_type='9'<br>";
            db_query("UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameH'][$key]))."' WHERE slno='".$_POST['Hslno_arr'][$key]."' && work_type='9' ");
            $Hslno = $_POST['Hslno_arr'][$key];
          }
          else {
            if(!empty($_POST['hotel_nameH'][$key])) {
              //echo "SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='4' && worker_title='".db_real_escape($_POST['hotel_nameB'][$key])."' ";
              $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='9' && worker_title='".db_real_escape($_POST['hotel_nameH'][$key])."' ");
              if(db_num_rows($recipeKitsQry)==0) { 
                //echo "INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameH'][$key]))."', work_type='9' <br>";
                db_query("INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameH'][$key]))."', work_type='9' ");
                $Hslno = db_insert_id();
              }
            }
          }
          if(!empty($_FILES['HotelImgH']['name'][$key]) && !empty($Hslno)) {
            $ext = pathinfo($_FILES['HotelImgH']['name'][$key],PATHINFO_EXTENSION); 
            $imagename = $Hslno.".".$ext;  
            $image_upload_path = BASEDIR."/frontEnd/workerimage/".$imagename;                
            move_uploaded_file($_FILES['HotelImgH']['tmp_name'][$key],$image_upload_path); 
            //echo "UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Hslno."'<br>";
            db_query("UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Hslno."' "); 
          }
        }
      }
    }
    // Chinese Dishes by

     //Barbecue Dishes by
    if(!empty($_POST['hotel_nameJ'])){        
      foreach ($_POST['hotel_nameJ'] as $key => $value) {
        if(!empty($value)) {           
          if($_POST['Jslno_arr'][$key]>0) {
            //echo "UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameJ'][$key]))."' WHERE slno='".$_POST['Jslno_arr'][$key]."' && work_type='10'<br>";
            db_query("UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameJ'][$key]))."' WHERE slno='".$_POST['Jslno_arr'][$key]."' && work_type='10' ");
            $Jslno = $_POST['Jslno_arr'][$key];
          }
          else {
            if(!empty($_POST['hotel_nameJ'][$key])) {
              //echo "SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='4' && worker_title='".db_real_escape($_POST['hotel_nameB'][$key])."' ";
              $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='10' && worker_title='".db_real_escape($_POST['hotel_nameJ'][$key])."' ");
              if(db_num_rows($recipeKitsQry)==0) { 
                //echo "INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameJ'][$key]))."', work_type='10' <br>";
                db_query("INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameJ'][$key]))."', work_type='10' ");
                $Jslno = db_insert_id();
              }
            }
          }
          if(!empty($_FILES['HotelImgJ']['name'][$key]) && !empty($Jslno)) {
            $ext = pathinfo($_FILES['HotelImgJ']['name'][$key],PATHINFO_EXTENSION); 
            $imagename = $Jslno.".".$ext;  
            $image_upload_path = BASEDIR."/frontEnd/workerimage/".$imagename;                
            move_uploaded_file($_FILES['HotelImgJ']['tmp_name'][$key],$image_upload_path); 
            //echo "UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Jslno."'<br>";
            db_query("UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Jslno."' "); 
          }
        }
      }
    }
    //Barbecue Dishes by

     //South Indian Dishes by
    if(!empty($_POST['hotel_nameK'])){        
      foreach ($_POST['hotel_nameK'] as $key => $value) {
        if(!empty($value)) {           
          if($_POST['Kslno_arr'][$key]>0) {
            //echo "UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameK'][$key]))."' WHERE slno='".$_POST['Kslno_arr'][$key]."' && work_type='10'<br>";
            db_query("UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameK'][$key]))."' WHERE slno='".$_POST['Kslno_arr'][$key]."' && work_type='11' ");
            $Kslno = $_POST['Kslno_arr'][$key];
          }
          else {
            if(!empty($_POST['hotel_nameK'][$key])) {
              //echo "SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='4' && worker_title='".db_real_escape($_POST['hotel_nameB'][$key])."' ";
              $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='11' && worker_title='".db_real_escape($_POST['hotel_nameK'][$key])."' ");
              if(db_num_rows($recipeKitsQry)==0) { 
                //echo "INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameK'][$key]))."', work_type='11' <br>";
                db_query("INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameK'][$key]))."', work_type='11' ");
                $Kslno = db_insert_id();
              }
            }
          }
          if(!empty($_FILES['HotelImgK']['name'][$key]) && !empty($Kslno)) {
            $ext = pathinfo($_FILES['HotelImgK']['name'][$key],PATHINFO_EXTENSION); 
            $imagename = $Kslno.".".$ext;  
            $image_upload_path = BASEDIR."/frontEnd/workerimage/".$imagename;                
            move_uploaded_file($_FILES['HotelImgK']['tmp_name'][$key],$image_upload_path); 
            //echo "UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Kslno."'<br>";
            db_query("UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Kslno."' "); 
          }
        }
      }
    }
    //South Indian Dishes by

    //Navratri Dishes by
    if(!empty($_POST['hotel_nameM'])){        
      foreach ($_POST['hotel_nameM'] as $key => $value) {
        if(!empty($value)) {           
          if($_POST['Mslno_arr'][$key]>0) {
            //echo "UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameM'][$key]))."' WHERE slno='".$_POST['Mslno_arr'][$key]."' && work_type='12'<br>";
            db_query("UPDATE worke_work_experience SET worker_title  = '".db_real_escape(trim($_POST['hotel_nameM'][$key]))."' WHERE slno='".$_POST['Mslno_arr'][$key]."' && work_type='12' ");
            $Mslno = $_POST['Mslno_arr'][$key];
          }
          else {
            if(!empty($_POST['hotel_nameM'][$key])) {
              //echo "SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='4' && worker_title='".db_real_escape($_POST['hotel_nameB'][$key])."' ";
              $recipeKitsQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_POST['profwslno']."' && work_type='12' && worker_title='".db_real_escape($_POST['hotel_nameM'][$key])."' ");
              if(db_num_rows($recipeKitsQry)==0) { 
                //echo "INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameM'][$key]))."', work_type='12' <br>";
                db_query("INSERT INTO worke_work_experience SET prof_job_worker_slno='".$_POST['profwslno']."', worker_title  = '".db_real_escape(trim($_POST['hotel_nameM'][$key]))."', work_type='12' ");
                $Mslno = db_insert_id();
              }
            }
          }
          if(!empty($_FILES['HotelImgM']['name'][$key]) && !empty($Mslno)) {
            $ext = pathinfo($_FILES['HotelImgM']['name'][$key],PATHINFO_EXTENSION); 
            $imagename = $Mslno.".".$ext;  
            $image_upload_path = BASEDIR."/frontEnd/workerimage/".$imagename;                
            move_uploaded_file($_FILES['HotelImgM']['tmp_name'][$key],$image_upload_path); 
            //echo "UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Mslno."'<br>";
            db_query("UPDATE worke_work_experience SET workproimg = '".$imagename."' WHERE slno='".$Mslno."' "); 
          }
        }
      }
    }
    //Navratri Dishes by
    ?>
    <script type="text/javascript">
    window.location.href = "<?php echo ADMIN_SITE_URL;?>/worke_work_experience.php?success=yes&slno=<?php echo $_POST['profwslno'];?>";  
    </script>
    <?php
    exit;
  }
  else {
    $errorMsg='N';  
  }  
}

$MeniItemArr = db_fetch_assoc(db_query("SELECT * FROM prof_job_worker WHERE slno ='".$_REQUEST['slno']."'"));

?>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<section class="content-header mt-2">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6>View <span class="text-danger"><?php echo $MeniItemArr['contact_name']?></span> (<?php echo $MeniItemArr['profession']?>) Work Profile</h6>
      </div>
      <div class="col-sm-6 text-right">
         <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL;?>"> <i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_URL ?>/manage_employee.php?status=Y">Manage Job Workers</a></li>
          <li class="breadcrumb-item active"><?php echo $MeniItemArr['contact_name']?> Profile</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content-header mt-4">
  <div class="container-fluid">    
    <form name="searchfrm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" data-parsley-validate autocomplete="off" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">          
            <div class="x_content">
            <?php            
            if(!empty($errorMsg)) {  
              ?>
              <div class="text-danger text-center mt-3"><h3>You are trying wrong for update Work Profile.</h3></div><br>
              <?php
            }
            else if($_REQUEST['success']=='yes') { 
              ?>
              <div class="text-success text-center mt-3"><h2>Work Profile has updated successfully.</h2></div><br>
              <?php
            }
            ?>  
            
            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label">Personal Information</label>
              <div class="col-sm-8">
              <table class="table table-hover table-center mb-0 table-bordered" id="myTableP">
              <?php
              $personalQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_REQUEST['slno']."' && work_type='1' ");
              while($personalArr=db_fetch_assoc($personalQry)) {
                ?>
                <tr>                
                <td>      
                <input type="text" class="form-control personal_info" name="personal_info[]" value="<?php echo $personalArr['worker_title']?>">      
                </td>                

                <td>
                <input type="hidden" name="pslno_arr[]" value="<?php echo $personalArr['slno']?>">  
                <span class="float-right ml-2"><a href="javascript:void" class="RemoveP"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                <?php
              }
              ?>  
              <tr>                
              <td>  
              <input type="text" class="form-control personal_info" name="personal_info[]" placeholder="Enter Personal Information">      
              </td>
              
              <td>
              <span class="float-right ml-2"> <a href="javascript:void" id="AddP"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
              </td>  
              </tr>  
              </table>  
              </div>  
              </div>
            </div>

            <div class="form-group row"> 
              <label for="title_en" class="col-sm-3 form-control-label">Work Experience in Firm and Location</label>
              <div class="col-sm-8">
              <table class="table table-hover table-center mb-0 table-bordered" id="myTableE">
              <?php
              $expQry = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_REQUEST['slno']."' && work_type='2' ");
              while($expArr=db_fetch_assoc($expQry)) {
                ?>
                <tr>                
                <td>      
                <input type="text" class="form-control experience_info" name="experience_info[]" value="<?php echo $expArr['worker_title']?>">      
                </td>                

                <td>
                <input type="hidden" name="wslno_arr[]" value="<?php echo $expArr['slno']?>">  
                <span class="float-right ml-2"><a href="javascript:void" class="RemoveE"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                <?php
              }
              ?>  
              <tr>                
              <td>  
              <input type="text" class="form-control experience_info" name="experience_info[]" placeholder="Work Experience in Firm and Location">      
              </td>
              
              <td>
              <span class="float-right ml-2"> <a href="javascript:void" id="AddE"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
              </td>  
              </tr>  
              </table>  
              </div>  
              </div>
            </div>

            <div class="row mb-3">
              <label for="page_url" class="col-sm-3 form-control-label"><?php echo $MeniItemArr['profession']?> <?php echo $MeniItemArr['contact_name']?> has worked at (W:150px H:100px (max 10KB))</label>
              <div class="col-sm-8">
              <table class="table table-hover table-center mb-0 table-bordered" id="myTableA">
                <?php
                $recipeKitsQry1 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_REQUEST['slno']."' && work_type='3' ");
                while($recipeArr1=db_fetch_assoc($recipeKitsQry1)) {
                  ?>
                  <tr>                
                  <td>      
                  <input type="text" class="form-control hotel_nameA" name="hotel_nameA[]" style="text-align:left;width:250px;" value="<?php echo $recipeArr1['worker_title']?>">      
                  </td>
                  <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                  <td><input type="file" class="form-control HotelImgA" name="HotelImgA[]" style="width: 200px;"></td>

                  <td width="20%" align="center">
                  <?php 
                  if(!empty($recipeArr1['workproimg'])) {
                    ?>  
                    <img src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr1['workproimg']?>" style="width: 80px;">
                    <?php
                  }
                  ?>
                  </td>

                  <td>
                  <input type="hidden" name="Aslno_arr[]" value="<?php echo $recipeArr1['slno']?>">  
                  <span class="float-right ml-2"><a href="javascript:void" class="RemoveEA"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                  </td>  
                  </tr>
                  <?php
                }
                ?>
                <tr>                
                <td>      
                <input type="text" class="form-control hotel_nameA" name="hotel_nameA[]" style="text-align:left;width:250px;">
                </td>
                <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                <td><input type="file" class="form-control HotelImgA" name="HotelImgA[]" style="width: 200px;"></td>

                <td>&nbsp;</td>

                <td>
                <span class="float-right ml-2"> <a href="javascript:void" id="AddA"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                
                </table>  
              </div>
            </div>

            <div class="row mb-3">
              <label for="page_url" class="col-sm-3 form-control-label"><?php echo $MeniItemArr['profession']?> <?php echo $MeniItemArr['contact_name']?> knows these Cuisines (W:150px H:100px (max 10KB))</label>
              <div class="col-sm-8">
              <table class="table table-hover table-center mb-0 table-bordered" id="myTableB">
                <?php
                $recipeKitsQry2 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_REQUEST['slno']."' && work_type='4' ");
                while($recipeArr2=db_fetch_assoc($recipeKitsQry2)) {
                  ?>
                  <tr>                
                  <td>      
                  <input type="text" class="form-control hotel_nameB" name="hotel_nameB[]" style="text-align:left;width:250px;" value="<?php echo $recipeArr2['worker_title']?>">      
                  </td>
                  <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                  <td><input type="file" class="form-control HotelImgB" name="HotelImgB[]" style="width: 200px;"></td>

                  <td width="20%" align="center">
                  <?php 
                  if(!empty($recipeArr2['workproimg'])) {
                    ?>  
                    <img src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr2['workproimg']?>" style="width: 80px;">
                    <?php
                  }
                  ?>
                  </td>

                  <td>
                  <input type="hidden" name="Bslno_arr[]" value="<?php echo $recipeArr2['slno']?>">  
                  <span class="float-right ml-2"><a href="javascript:void" class="RemoveEB"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                  </td>  
                  </tr>
                  <?php
                }
                ?>
                <tr>                
                <td>      
                <input type="text" class="form-control hotel_nameB" name="hotel_nameB[]" style="text-align:left;width:250px;">
                </td>
                <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                <td><input type="file" class="form-control HotelImgB" name="HotelImgB[]" style="width: 200px;"></td>

                <td>&nbsp;</td>

                <td>
                <span class="float-right ml-2"> <a href="javascript:void" id="AddB"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                
                </table>  
              </div>
            </div>

            <div class="row mb-3">
              <label for="page_url" class="col-sm-3 form-control-label">North Indian Dishes by <?php echo $MeniItemArr['profession']?> <?php echo $MeniItemArr['contact_name']?> (W:150px H:100px (max 10KB))</label>
              <div class="col-sm-8">
              <table class="table table-hover table-center mb-0 table-bordered" id="myTableC">
                <?php
                $recipeKitsQry3 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_REQUEST['slno']."' && work_type='5' ");
                while($recipeArr3=db_fetch_assoc($recipeKitsQry3)) {
                  ?>
                  <tr>                
                  <td>      
                  <input type="text" class="form-control hotel_nameC" name="hotel_nameC[]" style="text-align:left;width:250px;" value="<?php echo $recipeArr3['worker_title']?>">      
                  </td>
                  <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                  <td><input type="file" class="form-control HotelImgC" name="HotelImgC[]" style="width: 200px;"></td>

                  <td width="20%" align="center">
                  <?php 
                  if(!empty($recipeArr3['workproimg'])) {
                    ?>  
                    <img src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr3['workproimg']?>" style="width: 80px;">
                    <?php
                  }
                  ?>
                  </td>

                  <td>
                  <input type="hidden" name="Cslno_arr[]" value="<?php echo $recipeArr3['slno']?>">  
                  <span class="float-right ml-2"><a href="javascript:void" class="RemoveEC"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                  </td>  
                  </tr>
                  <?php
                }
                ?>
                <tr>                
                <td>      
                <input type="text" class="form-control hotel_nameC" name="hotel_nameC[]" style="text-align:left;width:250px;">
                </td>
                <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                <td><input type="file" class="form-control HotelImgC" name="HotelImgC[]" style="width: 200px;"></td>

                <td>&nbsp;</td>

                <td>
                <span class="float-right ml-2"> <a href="javascript:void" id="AddC"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                
                </table>  
              </div>
            </div>

            <div class="row mb-3">
              <label for="page_url" class="col-sm-3 form-control-label">Starters Dishes by <?php echo $MeniItemArr['profession']?> <?php echo $MeniItemArr['contact_name']?> (W:150px H:100px (max 10KB))</label>
              <div class="col-sm-8">
              <table class="table table-hover table-center mb-0 table-bordered" id="myTableD">
                <?php
                $recipeKitsQry4 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_REQUEST['slno']."' && work_type='6' ");
                while($recipeArr4=db_fetch_assoc($recipeKitsQry4)) {
                  ?>
                  <tr>                
                  <td>      
                  <input type="text" class="form-control hotel_nameD" name="hotel_nameD[]" style="text-align:left;width:250px;" value="<?php echo $recipeArr4['worker_title']?>">      
                  </td>
                  <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                  <td><input type="file" class="form-control HotelImgD" name="HotelImgD[]" style="width: 200px;"></td>

                  <td width="20%" align="center">
                  <?php 
                  if(!empty($recipeArr4['workproimg'])) {
                    ?>  
                    <img src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr4['workproimg']?>" style="width: 80px;">
                    <?php
                  }
                  ?>
                  </td>

                  <td>
                  <input type="hidden" name="Dslno_arr[]" value="<?php echo $recipeArr4['slno']?>">  
                  <span class="float-right ml-2"><a href="javascript:void" class="RemoveED"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                  </td>  
                  </tr>
                  <?php
                }
                ?>
                <tr>                
                <td>      
                <input type="text" class="form-control hotel_nameD" name="hotel_nameD[]" style="text-align:left;width:250px;">
                </td>
                <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                <td><input type="file" class="form-control HotelImgD" name="HotelImgD[]" style="width: 200px;"></td>

                <td>&nbsp;</td>

                <td>
                <span class="float-right ml-2"> <a href="javascript:void" id="AddD"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                
                </table>  
              </div>
            </div>

            <div class="row mb-3">
              <label for="page_url" class="col-sm-3 form-control-label">Desserts Dishes by <?php echo $MeniItemArr['profession']?> <?php echo $MeniItemArr['contact_name']?> (W:150px H:100px (max 10KB))</label>
              <div class="col-sm-8">
              <table class="table table-hover table-center mb-0 table-bordered" id="myTableF">
                <?php
                $recipeKitsQry5 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_REQUEST['slno']."' && work_type='7' ");
                while($recipeArr5=db_fetch_assoc($recipeKitsQry5)) {
                  ?>
                  <tr>                
                  <td>      
                  <input type="text" class="form-control hotel_nameF" name="hotel_nameF[]" style="text-align:left;width:250px;" value="<?php echo $recipeArr5['worker_title']?>">      
                  </td>
                  <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                  <td><input type="file" class="form-control HotelImgF" name="HotelImgF[]" style="width: 200px;"></td>

                  <td width="20%" align="center">
                  <?php 
                  if(!empty($recipeArr5['workproimg'])) {
                    ?>  
                    <img src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr5['workproimg']?>" style="width: 80px;">
                    <?php
                  }
                  ?>
                  </td>

                  <td>
                  <input type="hidden" name="Fslno_arr[]" value="<?php echo $recipeArr5['slno']?>">  
                  <span class="float-right ml-2"><a href="javascript:void" class="RemoveEF"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                  </td>  
                  </tr>
                  <?php
                }
                ?>
                <tr>                
                <td>      
                <input type="text" class="form-control hotel_nameF" name="hotel_nameF[]" style="text-align:left;width:250px;">
                </td>
                <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                <td><input type="file" class="form-control HotelImgF" name="HotelImgF[]" style="width: 200px;"></td>

                <td>&nbsp;</td>

                <td>
                <span class="float-right ml-2"> <a href="javascript:void" id="AddF"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                
                </table>  
              </div>
            </div>

            <div class="row mb-3">
              <label for="page_url" class="col-sm-3 form-control-label">Breakfast Dishes by <?php echo $MeniItemArr['profession']?> <?php echo $MeniItemArr['contact_name']?> (W:150px H:100px (max 10KB))</label>
              <div class="col-sm-8">
              <table class="table table-hover table-center mb-0 table-bordered" id="myTableG">
                <?php
                $recipeKitsQry6 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_REQUEST['slno']."' && work_type='8' ");
                while($recipeArr6=db_fetch_assoc($recipeKitsQry6)) {
                  ?>
                  <tr>                
                  <td>      
                  <input type="text" class="form-control hotel_nameG" name="hotel_nameG[]" style="text-align:left;width:250px;" value="<?php echo $recipeArr6['worker_title']?>">      
                  </td>
                  <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                  <td><input type="file" class="form-control HotelImgG" name="HotelImgG[]" style="width: 200px;"></td>

                  <td width="20%" align="center">
                  <?php 
                  if(!empty($recipeArr6['workproimg'])) {
                    ?>  
                    <img src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr6['workproimg']?>" style="width: 80px;">
                    <?php
                  }
                  ?>
                  </td>

                  <td>
                  <input type="hidden" name="Gslno_arr[]" value="<?php echo $recipeArr6['slno']?>">  
                  <span class="float-right ml-2"><a href="javascript:void" class="RemoveEG"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                  </td>  
                  </tr>
                  <?php
                }
                ?>
                <tr>                
                <td>      
                <input type="text" class="form-control hotel_nameG" name="hotel_nameG[]" style="text-align:left;width:250px;">
                </td>
                <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                <td><input type="file" class="form-control HotelImgG" name="HotelImgG[]" style="width: 200px;"></td>

                <td>&nbsp;</td>

                <td>
                <span class="float-right ml-2"> <a href="javascript:void" id="AddG"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                
                </table>  
              </div>
            </div>

            <div class="row mb-3">
              <label for="page_url" class="col-sm-3 form-control-label">Chinese Dishes by <?php echo $MeniItemArr['profession']?> <?php echo $MeniItemArr['contact_name']?> (W:150px H:100px (max 10KB))</label>
              <div class="col-sm-8">
              <table class="table table-hover table-center mb-0 table-bordered" id="myTableH">
                <?php
                $recipeKitsQry7 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_REQUEST['slno']."' && work_type='9' ");
                while($recipeArr7=db_fetch_assoc($recipeKitsQry7)) {
                  ?>
                  <tr>                
                  <td>      
                  <input type="text" class="form-control hotel_nameH" name="hotel_nameH[]" style="text-align:left;width:250px;" value="<?php echo $recipeArr7['worker_title']?>">      
                  </td>
                  <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                  <td><input type="file" class="form-control HotelImgH" name="HotelImgH[]" style="width: 200px;"></td>

                  <td width="20%" align="center">
                  <?php 
                  if(!empty($recipeArr7['workproimg'])) {
                    ?>  
                    <img src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr7['workproimg']?>" style="width: 80px;">
                    <?php
                  }
                  ?>
                  </td>

                  <td>
                  <input type="hidden" name="Hslno_arr[]" value="<?php echo $recipeArr7['slno']?>">  
                  <span class="float-right ml-2"><a href="javascript:void" class="RemoveEH"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                  </td>  
                  </tr>
                  <?php
                }
                ?>
                <tr>                
                <td>      
                <input type="text" class="form-control hotel_nameH" name="hotel_nameH[]" style="text-align:left;width:250px;">
                </td>
                <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                <td><input type="file" class="form-control HotelImgH" name="HotelImgH[]" style="width: 200px;"></td>

                <td>&nbsp;</td>

                <td>
                <span class="float-right ml-2"> <a href="javascript:void" id="AddH"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                
                </table>  
              </div>
            </div>

            <div class="row mb-3">
              <label for="page_url" class="col-sm-3 form-control-label">Barbecue Dishes by <?php echo $MeniItemArr['profession']?> <?php echo $MeniItemArr['contact_name']?> (W:150px H:100px (max 10KB))</label>
              <div class="col-sm-8">
              <table class="table table-hover table-center mb-0 table-bordered" id="myTableJ">
                <?php
                $recipeKitsQry8 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_REQUEST['slno']."' && work_type='10' ");
                while($recipeArr8=db_fetch_assoc($recipeKitsQry8)) {
                  ?>
                  <tr>                
                  <td>      
                  <input type="text" class="form-control hotel_nameJ" name="hotel_nameJ[]" style="text-align:left;width:250px;" value="<?php echo $recipeArr8['worker_title']?>">      
                  </td>
                  <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                  <td><input type="file" class="form-control HotelImgJ" name="HotelImgJ[]" style="width: 200px;"></td>

                  <td width="20%" align="center">
                  <?php 
                  if(!empty($recipeArr8['workproimg'])) {
                    ?>  
                    <img src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr8['workproimg']?>" style="width: 80px;">
                    <?php
                  }
                  ?>
                  </td>

                  <td>
                  <input type="hidden" name="Jslno_arr[]" value="<?php echo $recipeArr8['slno']?>">  
                  <span class="float-right ml-2"><a href="javascript:void" class="RemoveEJ"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                  </td>  
                  </tr>
                  <?php
                }
                ?>
                <tr>                
                <td>      
                <input type="text" class="form-control hotel_nameJ" name="hotel_nameJ[]" style="text-align:left;width:250px;">
                </td>
                <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                <td><input type="file" class="form-control HotelImgJ" name="HotelImgJ[]" style="width: 200px;"></td>

                <td>&nbsp;</td>

                <td>
                <span class="float-right ml-2"> <a href="javascript:void" id="AddJ"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                
                </table>  
              </div>
            </div>

            <div class="row mb-3">
              <label for="page_url" class="col-sm-3 form-control-label">South Indian Dishes by <?php echo $MeniItemArr['profession']?> <?php echo $MeniItemArr['contact_name']?> (W:150px H:100px (max 10KB))</label>
              <div class="col-sm-8">
              <table class="table table-hover table-center mb-0 table-bordered" id="myTableK">
                <?php
                $recipeKitsQry9 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_REQUEST['slno']."' && work_type='11' ");
                while($recipeArr9=db_fetch_assoc($recipeKitsQry9)) {
                  ?>
                  <tr>                
                  <td>      
                  <input type="text" class="form-control hotel_nameK" name="hotel_nameK[]" style="text-align:left;width:250px;" value="<?php echo $recipeArr9['worker_title']?>">      
                  </td>
                  <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                  <td><input type="file" class="form-control HotelImgK" name="HotelImgK[]" style="width: 200px;"></td>

                  <td width="20%" align="center">
                  <?php 
                  if(!empty($recipeArr9['workproimg'])) {
                    ?>  
                    <img src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr9['workproimg']?>" style="width: 80px;">
                    <?php
                  }
                  ?>
                  </td>

                  <td>
                  <input type="hidden" name="Kslno_arr[]" value="<?php echo $recipeArr9['slno']?>">  
                  <span class="float-right ml-2"><a href="javascript:void" class="RemoveEK"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                  </td>  
                  </tr>
                  <?php
                }
                ?>
                <tr>                
                <td>      
                <input type="text" class="form-control hotel_nameK" name="hotel_nameK[]" style="text-align:left;width:250px;">
                </td>
                <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                <td><input type="file" class="form-control HotelImgK" name="HotelImgK[]" style="width: 200px;"></td>

                <td>&nbsp;</td>

                <td>
                <span class="float-right ml-2"> <a href="javascript:void" id="AddK"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                
                </table>  
              </div>
            </div>

            <div class="row mb-3">
              <label for="page_url" class="col-sm-3 form-control-label">Navratri Dishes by <?php echo $MeniItemArr['profession']?> <?php echo $MeniItemArr['contact_name']?> (W:150px H:100px (max 10KB))</label>
              <div class="col-sm-8">
              <table class="table table-hover table-center mb-0 table-bordered" id="myTableM">
                <?php
                $recipeKitsQry10 = db_query("SELECT * FROM worke_work_experience WHERE prof_job_worker_slno='".$_REQUEST['slno']."' && work_type='12' ");
                while($recipeArr10=db_fetch_assoc($recipeKitsQry10)) {
                  ?>
                  <tr>                
                  <td>      
                  <input type="text" class="form-control hotel_nameM" name="hotel_nameM[]" style="text-align:left;width:250px;" value="<?php echo $recipeArr10['worker_title']?>">      
                  </td>
                  <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                  <td><input type="file" class="form-control HotelImgM" name="HotelImgM[]" style="width: 200px;"></td>

                  <td width="20%" align="center">
                  <?php 
                  if(!empty($recipeArr10['workproimg'])) {
                    ?>  
                    <img src="<?php echo SITE_URL;?>/frontEnd/workerimage/<?php echo $recipeArr10['workproimg']?>" style="width: 80px;">
                    <?php
                  }
                  ?>
                  </td>

                  <td>
                  <input type="hidden" name="Mslno_arr[]" value="<?php echo $recipeArr10['slno']?>">  
                  <span class="float-right ml-2"><a href="javascript:void" class="RemoveEM"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></span>  
                  </td>  
                  </tr>
                  <?php
                }
                ?>
                <tr>                
                <td>      
                <input type="text" class="form-control hotel_nameM" name="hotel_nameM[]" style="text-align:left;width:250px;">
                </td>
                <!-- onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="[0-9 ]+"-->
                <td><input type="file" class="form-control HotelImgM" name="HotelImgM[]" style="width: 200px;"></td>

                <td>&nbsp;</td>

                <td>
                <span class="float-right ml-2"> <a href="javascript:void" id="AddM"><i class="fa fa-plus-circle text-success" aria-hidden="true"></i></a></span>  
                </td>  
                </tr>
                
                </table>  
              </div>
            </div>


            <div class="form-group row">
              <label for="title_en" class="col-sm-3 form-control-label">&nbsp;</label>
              <div class="col-sm-5"> 
              <input type="hidden" name="pID" value="addeditWorkProfile">
              <input type="hidden" name="profwslno" value="<?php echo $_REQUEST['slno']?>">
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
$(document).on("click", "#AddP", function(e) {
  var titlename=$(this).closest('tr').find('.personal_info').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_Personal_Info_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableP').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveP", function(e) {
  $(this).parents("tr").remove();
});

$(document).on("click", "#AddE", function(e) {
  var titlename=$(this).closest('tr').find('.experience_info').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_WorkExperience_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableE').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveE", function(e) {
  $(this).parents("tr").remove();
});

/*Wor profle set START*/
$(document).on("click", "#AddL", function(e) {
  var titlename=$(this).closest('tr').find('.hotel_name').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_Hotel_Restaurant_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableL').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveL", function(e) {
  $(this).parents("tr").remove();
}); 

$(document).on("click", "#AddA", function(e) {
  var titlename=$(this).closest('tr').find('.hotel_nameA').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_worked_Location_Table_Items',
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
$(document).on("click", ".RemoveA", function(e) {
  $(this).parents("tr").remove();
}); 


$(document).on("click", "#AddB", function(e) {
  var titlename=$(this).closest('tr').find('.hotel_nameB').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_Cuisines_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableB').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveB", function(e) {
  $(this).parents("tr").remove();
});  

$(document).on("click", "#AddC", function(e) {
  var titlename=$(this).closest('tr').find('.hotel_nameC').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_North_Indian_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableC').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveC", function(e) {
  $(this).parents("tr").remove();
}); 

$(document).on("click", "#AddD", function(e) {
  var titlename=$(this).closest('tr').find('.hotel_nameD').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_Starters_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableD').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveD", function(e) {
  $(this).parents("tr").remove();
}); 

$(document).on("click", "#AddF", function(e) {
  var titlename=$(this).closest('tr').find('.hotel_nameF').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_Dessert_Table_Items',
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
$(document).on("click", ".RemoveF", function(e) {
  $(this).parents("tr").remove();
}); 

$(document).on("click", "#AddG", function(e) {
  var titlename=$(this).closest('tr').find('.hotel_nameG').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_Breakfast_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableG').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveG", function(e) {
  $(this).parents("tr").remove();
}); 

$(document).on("click", "#AddH", function(e) {
  var titlename=$(this).closest('tr').find('.hotel_nameH').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_Chinese_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableH').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveH", function(e) {
  $(this).parents("tr").remove();
}); 

$(document).on("click", "#AddJ", function(e) {
  var titlename=$(this).closest('tr').find('.hotel_nameJ').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_Barbecue_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableJ').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveJ", function(e) {
  $(this).parents("tr").remove();
}); 

$(document).on("click", "#AddK", function(e) {
  var titlename=$(this).closest('tr').find('.hotel_nameK').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_South_Indian_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableK').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveK", function(e) {
  $(this).parents("tr").remove();
}); 

$(document).on("click", "#AddM", function(e) {
  var titlename=$(this).closest('tr').find('.hotel_nameM').val(); 
  if(titlename!=''){
    jQuery.ajax({
      type:'POST',
      url:'worke_work_experience.php',
      data:'part=Add_Navratri_Table_Items',
      dataType:'html',
      success : function (responseData, status, XMLHttpRequest) {
        $('#myTableM').append(responseData);
      }
    });
  }
  else {
    alert('Please fill all mandotory fields');
  }
});
$(document).on("click", ".RemoveM", function(e) {
  $(this).parents("tr").remove();
}); 
</script>
</body>
</html>