<aside class="main-sidebar sidebar-dark-primary">
  <!-- Brand Logo -->
  <a href="#" class="brand-link" style="background-color: #32749b; height:50px">
    <!-- <img src="AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light"><strong><h6><?php echo PROJECT_NAME?></h6></strong></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>" class="nav-link  active "><i class="fa fa-dashboard nav-icon"></i> <p>Dashboard</p></a>
        </li>          

        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/user_summary.php?status=Y" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Panel User</p></a>
        </li> 

        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/manage_top_homebanner.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Top Header Banner</p></a>
        </li>

        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/manage_service_category.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Service Category</p></a>
        </li>

        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/manage_occasion.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Occasion</p></a>
        </li>

        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/manage_evenet.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Events</p></a>
        </li>
        
        <!-- <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/manage_requirement.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Requirement</p></a>
        </li> -->

        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/manage_meals.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Meals</p></a>
        </li> 

        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/manage_cuisine.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Cuisine</p></a>
        </li>

        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/manage_items.php?category=1" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Items</p></a>
        </li>

        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/manage_location.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Location</p></a>
        </li>
     
        
        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/manage_testimonials.php?status=N" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Testimonials</p></a>
        </li>
        
        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/website_pages.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Website Pages</p></a>
        </li>  

        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/manage_blog.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Our Blog</p></a>
        </li>  

        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/manage_gallery.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Gallery</p></a>
        </li>  

        <li class="nav-item">
            <a href="#" class="nav-link"><i class="fa fa-building-o nav-icon"></i><p>All Inquiry <i class="right fa fa-angle-left"></i></p> </a>

            <ul class="nav nav-treeview" style="padding-left: 12px;"> 

              <li class="nav-item">
              <a href="<?php echo ADMIN_SITE_URL;?>/enquiry.php?status=N" class="nav-link "> <i class="fa fa-tasks nav-icon"></i> <p>Halwai/Chef/Caterers</p> </a>
              </li>
            
              <li class="nav-item">
              <a href="<?php echo ADMIN_SITE_URL;?>/general_inquiry.php?status=N" class="nav-link" class="nav-link"> <i class="fa fa-tasks nav-icon"></i> <p>General Inquiry</p> </a>
              </li>

              <li class="nav-item">
              <a href="<?php echo ADMIN_SITE_URL;?>/tiffin_services_inq.php?status=N" class="nav-link" class="nav-link"> <i class="fa fa-tasks nav-icon"></i> <p>Tiffin Services Inquiry</p> </a>
              </li>

              <li class="nav-item">
              <a href="<?php echo ADMIN_SITE_URL;?>/venue_inq.php?status=N" class="nav-link"> <i class="fa fa-tasks nav-icon"></i> <p>Venue Inquiry</p> </a>
              </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link"><i class="fa fa-building-o nav-icon"></i><p>Order Inquiry <i class="right fa fa-angle-left"></i></p> </a>

            <ul class="nav nav-treeview" style="padding-left: 12px;"> 

              <li class="nav-item">
              <a href="<?php echo ADMIN_SITE_URL;?>/customizedPlate.php" class="nav-link" class="nav-link"> <i class="fa fa-tasks nav-icon"></i> <p>Customized Plate</p> </a>
              </li>

              <li class="nav-item">
              <a href="<?php echo ADMIN_SITE_URL;?>/bhajiOrders.php" class="nav-link" class="nav-link"> <i class="fa fa-tasks nav-icon"></i> <p>Bhaji Orders</p> </a>
              </li>

              <li class="nav-item">
              <a href="<?php echo ADMIN_SITE_URL;?>/chutneyPickleAchhar_Orders.php" class="nav-link" target="_blank"> <i class="fa fa-tasks nav-icon"></i> <p>Chutney Pickle / Achhar</p> </a>
              </li>     
            </ul>
        </li>        

           

        <li class="nav-item">
            <a href="#" class="nav-link"><i class="fa fa-building-o nav-icon"></i><p>Master <i class="right fa fa-angle-left"></i></p> </a>

            <ul class="nav nav-treeview" style="padding-left: 12px;"> 

              <li class="nav-item">
              <a href="<?php echo ADMIN_SITE_URL;?>/manage_employee.php?status=N" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Job Worker</p></a>
              </li> 

              <li class="nav-item">
              <a href="<?php echo ADMIN_SITE_URL;?>/job_worker_rate.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Job Worker Rate</p></a>
              </li>

              <li class="nav-item">
              <a href="<?php echo ADMIN_SITE_URL;?>/referral-code.php" class="nav-link"><i class="fa fa-tasks nav-icon" aria-hidden="true"></i><p>Manage Referral Code</p></a>
              </li>

              <li class="nav-item">
              <a href="<?php echo ADMIN_SITE_URL;?>/site_contact.php" class="nav-link"> <i class="fa fa-tasks nav-icon"></i> <p>Contact Us</p> </a>
              </li>

              <li class="nav-item">
              <a href="<?php echo ADMIN_SITE_URL;?>/our_package.php" class="nav-link"> <i class="fa fa-tasks nav-icon"></i> <p>Our Package</p> </a>
              </li>     
            </ul>
        </li> 
                         

        <li class="nav-item">
        <a href="<?php echo ADMIN_SITE_URL;?>/logout.php" class="nav-link "><i class="fa fa-power-off nav-icon"></i> <p>Logout</p></a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>