<?php session_start();?>
<?php include "view/template/header.php" ?>
	 <!-- start navbar dashboard -->
 <?php include "view/template/navigation.php" ?> 
  <!-- end navbar dashboard -->

<div class="container">
            <!-- condition to get page and display it -->
  <?php
      // first condition to check request get mainpages like navbar links 
    $mainurl = isset($_GET['mainpage']) ? $_GET['mainpage'] : 'dashboardhome';
                  // second condition by switch to go paths mainpages 
       switch ($mainurl) {
         case 'users':
              include "view/users.php";
           break;
         case 'comments':
              include "view/comments.php";
           break;
         case 'advertisments':
              include "view/advertisments.php";
           break;
         case 'categories':
            include "view/categories.php";
         break;
         
         // default:
           //    include "view/dashboardhome.php";
           // break;
       }
      // first condition to check request get subpages like users crud
    $suburl = isset($_GET['subpage']) ? $_GET['subpage'] : 'dashboardhome';

      switch ($suburl) {
         case 'add_user':
              include "view/crud_users/add_users.php";
           break;
         case 'edit_user':
              include "view/crud_users/edit_users.php";
           break;
         case 'add_ads':
              include "view/crud_Ads/add_ads.php";
           break;
         case 'edit_ads':
              include "view/crud_Ads/edit_ads.php";
           break;
         case 'edit_category':
              include "view/crud_categories/edit_category.php";
           break;
         
         // default:
         //      include "view/dashboardhome.php";
         //   break;
       }


  ?>

  </div>
  <!--  footer -->
<?php include "view/template/footer.php" ?>
  <!--  /footer -->