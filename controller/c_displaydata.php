<?php
		/* controller page to display data from class m_display */
		
	session_start();
	include_once "../model/repeatedfunctions.php";
	include_once "../model/m_crud.php";

	
## condition to send data to prduct-details page ##
if (isset($_GET['adsid'])) {

	$adsid = $_GET['adsid'];
	$tablename = "olx.relations_products_details";
	$condi = "WHERE AdsID = '$adsid'"; 
	$data = new crud();
	$product_details_data = $data->getdata($condi,$tablename);
	
	$_SESSION['product_details_data'] = $product_details_data;
	// show comment data by adsid in product-details
	$tablename = "olx.releationcomments";
	$condi_comment = "WHERE AdssID = '$adsid'"; 
	$product_comment_data = $data->getdata($condi_comment,$tablename);
	$_SESSION['product_comment_data'] = $product_comment_data;
	// show recomendid ads by category in product-details class active limt last 3 ads
	$cat_name = $product_details_data [0]['CategoryName'] ;
	$tablename = "olx.relations_products_details";
	$condi_reco_active = "WHERE CategoryName = '$cat_name' ORDER BY Date DESC LIMIT 3"; 
	$product_recommend_data_active = $data->getdata($condi_reco_active,$tablename);
	$_SESSION['product_recommend_data_active'] = $product_recommend_data_active;
	// show recomendid ads by category in product-details class item by city (a-b) 3 items
	$condi_reco_class = "WHERE CategoryName = '$cat_name' ORDER BY City ASC LIMIT 3"; 
	$product_recommend_data_item = $data->getdata($condi_reco_class,$tablename);
	$_SESSION['product_recommend_data_item'] = $product_recommend_data_item;

	header("location:../index.php?mainpage=product_details");
## Condition to send data to Products All Page and filter by category name and city and search ##
}elseif (isset($_GET['pro']) or isset($_GET['pro_City']) or isset($_POST['submit']) or isset($_GET['pro_Category'])){

		 $tablename = "olx.relations_products_details";
		 $data = new crud();

			
			// this condition to analys get and sed condititon to query (category-cities-search filter by paggination) 
			if (isset($_GET['pro']) and $_GET['pro'] == "all") {
			 	
			 	$paggin = "products";

			 	$dataa = "all";

			 	
			 	$page_number = $_GET['page'] ? intval($_GET['page']) : 1;  
			 
			 	$countallrow = $data->getdatacount("WHERE 1",$tablename);
			 	
			 	$per_page = 6;
			 	
			 	$_SESSION['numpage_product'] = $num_of_page = ceil($countallrow/$per_page);
			
				$starting_limit_number = ($page_number-1)*$per_page; 

				$paggination = " ORDER BY AdsID DESC LIMIT $starting_limit_number,$per_page "; 
				
				$condi= "WHERE 1".$paggination;

			}elseif(isset($_GET['pro_City'])){
			 	
			 	$paggin = "cities";

			 	$dataa = $_GET['pro_City'];


				$page_number = $_GET['page'] ? intval($_GET['page']) : 1;  
			 
			 	$countallrow = $data->getdatacount("WHERE City LIKE "."'".$_GET['pro_City']."'",$tablename);
			 	
			 	$per_page = 6;

			 	$_SESSION['Numpage_Filter_City'] = $num_of_page = ceil($countallrow/$per_page);
			
				$starting_limit_number = ($page_number-1)*$per_page; 

				$paggination = " ORDER BY AdsID DESC LIMIT $starting_limit_number,$per_page "; 

				$condi= "WHERE City LIKE "."'".$_GET['pro_City']."'".$paggination;

			}elseif(isset($_GET['pro_Category'])){
			 	
			 	$paggin = "categories";

			 	$dataa = $_GET['pro_Category'];
			
				$page_number = $_GET['page'] ? intval($_GET['page']) : 1;  
			 
			 	$countallrow = $data->getdatacount("WHERE CategoryName LIKE "."'".$_GET['pro_Category']."'",$tablename);
			 	
			 	$per_page = 6;

			 	$_SESSION['Numpage_Filter_Category'] = $num_of_page = ceil($countallrow/$per_page);
			
				$starting_limit_number = ($page_number-1)*$per_page; 

				$paggination = " ORDER BY AdsID DESC LIMIT $starting_limit_number,$per_page "; 

				$condi= "WHERE CategoryName LIKE "."'".$_GET['pro_Category']."'".$paggination;
			
			}elseif($_POST['Search_by_title']){
				$condi = "WHERE Title LIKE "."'%".$_POST['Search_by_title']."%'";
			}
		
			$all_products = $data->getdata($condi,$tablename);
			$_SESSION['all_products'] = $all_products;
	

	header("location:../index.php?mainpage=products&paggin=$paggin&data=$dataa");

## Condition to send data to Home Page and asside bar ##	
}else{
	
	$tablename = "olx.advertisments";
	$data = new crud();
	$feature_data = $data->getdata("LIMIT 6",$tablename);
	$_SESSION['feature_data'] = $feature_data;
	// show data at category asside bar tab home (sunglasses-clothes)
	$tablename = "olx.relations_products_details";
	$category_data = $data->getdata("GROUP BY CategoryName",$tablename);
	$_SESSION['category_data'] = $category_data;
	// show data at city asside bar tab home 
	$tablename = "olx.relations_products_details";
	$city_data = $data->getdata("GROUP BY City",$tablename);
	$_SESSION['city_data'] = $city_data;


	header("location:../index.php?mainpage=home");	
	
}
?>