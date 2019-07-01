<?php 
	ob_start();  
	session_start(); 
?>

		<!-- start header template  -->
<?php include "view/template/header.php" ?>
		<!-- end header template  -->
		<!-- start headerpage(navbar-upnavbar) template  -->
<?php include "view/template/navigation.php" ?>
		<!-- end headerpage(navbar-upnavbar) template  -->
		<!-- condtion to get all page in one page here -->
		    <!-- condition to get page and display it -->
  <?php
      // first condition to check request get mainpages like navbar links 
	    $mainurl = isset($_GET['mainpage']) ? $_GET['mainpage'] : '';
	                  // second condition by switch to go paths mainpages 
	       switch ($mainurl) {
	          case 'login':
	              include "view/login.php";
	           break;
	          case 'home':
	              include "view/home.php";
	           break;
           	  case 'product_details':
	              include "view/product-details.php";
	           break;
	           case 'add_new_advertisment':
	              include "view/add_new_advertisment.php";
	           break;
	           case 'products':
	              include "view/products.php";
	           break;


	         default:
	              
	           break;
	       }
	      // second condition to check request get subpages like users crud
	    // $suburl = isset($_GET['subpage']) ? $_GET['subpage'] : 'dashboardhome';

	    //   switch ($suburl) {
	    //      case 'add_user':
	    //           include "view/crud_users/add_users.php";
	    //        break;
	    //      case 'edit_user':
	    //           include "view/crud_users/edit_users.php";
	    //        break;
	         
	         // default:
	         //      include "view/dashboardhome.php";
	         //   break;
       // }
  ?>
		
	
	<!-- start footer page & template -->
<?php include "view/template/footer.php";
	ob_end_flush();
?>
	<!-- end footer page & template -->


