# The Famous Halwai (TFH) - Old PHP Website Documentation

Yeh **The Famous Halwai (TFH)** ka purana PHP-based monolith web application hai. Yeh platform Halwai (traditional Indian cooks), Caterers, Tiffin services, Banquet venue inquiry, Bhaji (wedding sweets boxes), aur Pickles/Chutneys ki booking/inquiry ke liye banaya gaya tha.

---

## 1. Project Overview & Working Mechanism (Kaise Kaam Karta Hai)

Yeh project **Procedural PHP + MySQL + jQuery AJAX + Bootstrap** stack par structured hai.

### Key Working Workflows:

1. **User Inquiry & Event Menu Builder (Client Side)**:
   - Users website par aakar event type (Wedding, Birthday, Corporate, etc.), occasion, date, location aur guest count select karte hain.
   - **Menu Selection (`our-menu.php`)**: Users interactive menu explorer se specific dishes (Starters, Sweets, Main Course) pick kar sakte hain. AJAX (`ajaxjQuery.php`) ke dwara session-based cart (`$_SESSION["item_cart_item"]`) update hota hai.
   - **Inquiry Submission (`enquiry.php`)**: Form submit hone par customer data `menu_inquiry` / `order_inquiry` database table mein save hota hai aur notification email trigger hota hai.

2. **Partner & Worker Registration (`partner-register.php`)**:
   - Halwai, Chefs, Caterers, aur Helpers apke details submit karke platform par register hote hain.
   - System automatically ek unique Referral Code generate karta hai: `{State}TFH{Type}{Number}` (e.g. `DELTFHHALW00751`).
   - Admin control panel se entries verify hokar partners ko public view (`top-rated-professionals.php`) mein list kiya jata hai.

3. **Vendor Profile & Portfolio System (`professionals-detail.php`)**:
   - Har registered professional/halwai ki detailed profile page hoti hai jisme unka past work experience, hotel experience (`worke_work_experience`), gallery photos, specialty cuisines, aur ratings display hoti hain.

4. **Service-Specific Booking Modules**:
   - **Banquet / Venue Inquiries (`banquet_venue_inquiry.php`)**: Venues booking inquiries handle karta hai.
   - **Tiffin Services (`tiffin-services.php`)**: Daily / monthly tiffin package inquiries collection.
   - **Bhaji Box Orders (`bhaji.php` / `view_bhaji_cart.php`)**: Custom wedding sweet box customization aur cart order booking.
   - **Chutney & Pickle Orders (`chutney_achhar.php` / `pickle_achhar.php`)**: Bulk achhar aur chutney ordering.

5. **Admin Control Panel (`wbadmin/`)**:
   - Site administrators can manage master data (Categories, Cuisines, Items, Meals, Occasions, Locations).
   - Inquiries management (`enquiry.php`, `order_inquiry.php`, `bhajiOrders.php`, `tiffin_services_inq.php`, `venue_inq.php`).
   - Partner approval and profile enrichment (`partners_inq.php`, `worke_work_experience.php`).
   - Dynamic CMS content management (`website_information`).

---

## 2. Directory & Folder Structure (Folder Structure)

```
c:/projects/thefh/old-website-php/
├── readme.md                             # Documentation file (This document)
├── database/                             # Database dump folder (Contains thefamoushalwai_db.sql - 34.1 MB dump)
└── Full-website-backup/                  # Main Web Application Codebase
    ├── index.php                         # Main Website Homepage
    ├── our-menu.php                      # Menu exploration & package calculator
    ├── enquiry.php / enquiry111.php      # Catering & Event inquiry form wizard
    ├── partner-register.php              # Halwai / Chef / Helper vendor registration
    ├── top-rated-professionals.php       # Directory listing of top Halwais/Cooks
    ├── professionals-detail.php          # Detailed profile of a specific Halwai
    ├── banquet_venue_inquiry.php         # Venue / Banquet hall booking inquiry
    ├── tiffin-services.php               # Tiffin service catalog & inquiry
    ├── bhaji.php                         # Wedding Sweets Box (Bhaji) selector
    ├── view_bhaji_cart.php               # Bhaji shopping cart
    ├── view_items_cart.php               # Item-wise menu cart view
    ├── view_menu_cart.php                # Package-wise menu cart view
    ├── chutney_achhar.php                # Chutney & Pickle catalog
    ├── pickle_achhar.php                 # Pickle product page
    ├── blog-detail.php                   # Blog article detail view
    ├── website-pages.php                 # CMS dynamic page renderer
    ├── ajaxjQuery.php                    # Central AJAX backend API endpoint
    ├── includes/                         # Core Backend Utilities & Configs
    │   ├── conn.php                      # Database Connection (MySQLi setup)
    │   ├── db-func.php                   # DB Helper wrapper functions (db_query, etc.)
    │   ├── common_func.php               # HTML/Upload/Dropdown utility functions
    │   ├── array-func.php                # Static arrays & lookup constants
    │   ├── config_path.php               # URL paths & system directories constants
    │   └── inc.php                       # System bootstrap includes wrapper
    ├── wbadmin/                          # Admin Control Panel Dashboard
    │   ├── login.php / checklogin.php    # Admin login & authentication
    │   ├── index.php                     # Admin Dashboard Home
    │   ├── left_sidemenu.php / header.php # Admin UI Layout Components
    │   ├── addedit_category.php          # Manage Food Categories
    │   ├── addedit_cuisine.php           # Manage Cuisines (North Indian, South Indian, etc.)
    │   ├── addedit_items.php             # Manage Food Items & Pricing
    │   ├── addedit_menu.php              # Manage Preset Menu Packages
    │   ├── addedit_meals.php             # Manage Meal Times (Breakfast, Lunch, Dinner)
    │   ├── addedit_occasion.php          # Manage Event Occasions
    │   ├── addedit_location.php          # Manage State / City Locations
    │   ├── addedit_profession.php        # Manage Profession Types (Halwai, Chef, Waiter)
    │   ├── worke_work_experience.php     # Manage Worker Profile Work History & Photos
    │   ├── enquiry.php                   # View & Process Event Catering Inquiries
    │   ├── order_inquiry.php             # View Custom Package Orders
    │   ├── bhajiOrders.php               # View Sweets Box Orders
    │   ├── chutneyPickleAchhar_Orders.php# View Pickle & Chutney Orders
    │   ├── tiffin_services_inq.php       # View Tiffin Subscriptions
    │   ├── venue_inq.php                 # View Banquet Venue Inquiries
    │   └── partners_inq.php              # View & Approve Partner Registrations
    ├── frontEnd/                         # Frontend layout templates, CSS, JS, Fonts
    ├── pdf/ & quotepdf/                  # Dynamic PDF Quotation generator scripts
    └── static/                           # Public assets, images, vendor JS/CSS libraries
```

---

## 3. Database Architecture & Schema Structure (Database Structure)

Database: `thefamoushalwai_db` (Production) / `aeropaat_thefamoushalwai` (Localhost)

Below is the complete breakdown of all database tables used in the application code:

### A. Authentication & Admin
1. **`admin_login`**: Admin user credentials (`username`, `password`, `email`, `last_login`, `status`).

### B. Master Catalog & Categories
2. **`add_category` / `service_category`**: Food item categories (Sweets, Starters, Main Course, Bakery, Chinese).
3. **`add_cuisine`**: Cuisines catalog (North Indian, South Indian, Rajasthani, Chinese, Continental).
4. **`add_item` / `product_item_tbl` / `add_item_for_per_plate`**: Master table for food items (`slno`, `cat_id`, `cuisine_id`, `item_name`, `item_price`, `per_plate_rate`, `item_desc`, `image`, `status`).
5. **`event_meals` & `event_meals_schedule`**: Event meal categories & time slots (Breakfast, Lunch, High-Tea, Dinner).
6. **`add_meals`**: Meal types lookup table.
7. **`add_occasion`**: Event types (Wedding, Birthday, Corporate, Anniversary, House Warming).
8. **`add_requirement`**: Service scope requirements (Halwai Only, Full Catering, Waiter Only, Crockery).
9. **`state_master` & `add_location`**: States and Cities lookup tables for service coverage.

### C. Partner & Professional Profiles
10. **`partner_register` / `partners_inq`**: Partner registration records (`slno`, `name`, `email`, `mobile`, `partner_type`, `state`, `city`, `experience`, `specialization`, `referralcode`, `id_proof`, `status`).
11. **`generate_referralcode`**: Stores generated unique referral codes (`slno`, `referralcode`, `created_date`).
12. **`professionals_details`**: Extended profile details of top cooks & halwais.
13. **`worke_work_experience`**: Detailed work history records for partners (`slno`, `prof_job_worker_slno`, `worker_title`, `work_type`, `hotel_name`, `workproimg`).
14. **`job_worker_rate` / `add_jwrate`**: Daily wage / per event rate matrix for Halwais & helpers based on guest count tiers.
15. **`add_empolyee`**: Internal staff records managed by admin.

### D. Inquiries & Orders
16. **`menu_inquiry` / `order_inquiry`**: Customer event menu quote & booking inquiries (`slno`, `name`, `mobile`, `email`, `event_date`, `occasion`, `guest_count`, `city`, `selected_menu`, `total_amount`, `created_at`, `status`).
17. **`general_inquiry`**: Web contact form submissions.
18. **`banquet_venue_inquiry`**: Banquet hall booking inquiries (`slno`, `name`, `phone`, `venue_location`, `event_date`, `guest_count`, `budget`).
19. **`bhajiOrders`**: Custom Sweets box orders (`slno`, `box_type`, `quantity`, `contact_name`, `phone`, `address`, `status`).
20. **`chutneyPickleAchhar_Orders`**: Orders for pickles & chutneys (`slno`, `product_id`, `quantity`, `customer_name`, `phone`, `address`).
21. **`tiffin_services_inq`**: Tiffin service subscription inquiries (`slno`, `name`, `phone`, `meal_type`, `duration`, `address`).

### E. CMS & Marketing Content
22. **`our_blogs` / `add_blog`**: Blog articles (`slno`, `blog_title`, `blog_slug`, `blog_desc`, `posted_by`, `posted_date`, `blog_image`, `display_status`).
23. **`add_evenet` & `add_gallery`**: Photo gallery & showcase events (`slno`, `event_title`, `event_image`, `event_date`, `status`).
24. **`add_testimonials`**: Client reviews & ratings (`slno`, `client_name`, `review`, `rating`, `client_image`, `status`).
25. **`add_top_homebanner` & `add_burner`**: Homepage hero banners and promotional ads.
26. **`website_information`**: Dynamic content for CMS pages (Privacy Policy, Terms & Conditions, About Us).

---

## 4. Key Configuration Files

- **[conn.php](file:///c:/projects/thefh/old-website-php/Full-website-backup/includes/conn.php)**: Detects environment (`localhost` vs Server) and connects to MySQL database.
- **[db-func.php](file:///c:/projects/thefh/old-website-php/Full-website-backup/includes/db-func.php)**: Provides custom database query wrapper functions like `db_query()`, `db_fetch_assoc()`, `db_num_rows()`, and `db_real_escape()`.
- **[ajaxjQuery.php](file:///c:/projects/thefh/old-website-php/Full-website-backup/ajaxjQuery.php)**: Handles AJAX calls for dynamic cuisines, referral code generation, cart additions, and infinite scroll blogs.
