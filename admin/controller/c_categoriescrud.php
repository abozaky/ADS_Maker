<?php
	session_start();
	/*
	This Controller recive and send data to  View categories Page from model
	@ diplay Data 
	@ Edit   Data 
	@ insert Data
	@ Delete Data
	*/
	include_once "../model/repeatedfunctions.php";
	include_once "../model/m_crud.php";

	
## show data in categories paggination by pagnumber     	
if (isset($_GET['page'])) {
		$page_number = $_GET['page'] ? intval($_GET['page']) : 1;  
		$tablename = "olx.categories";
		$data = new crud();
		$countallrow = $data->getdatacount($tablename);
		$per_page = 2;
		
		// page 1 from 0,4 - 0 =(page_number-1), start row to 4 per_page 
		// page 2 from 4,4 - 5 =(page_number-1), start row to 4 per_page
		// (page_number-1)*per_page --- $starting limit number
		$starting_limit_number = ($page_number-1)*$per_page; 
		// 1 mean all- Where 1 order by desc limit -,4
		$columnname = "1 ORDER BY CategoryID DESC LIMIT $starting_limit_number,$per_page "; 
		$result = $data->getdata($columnname,$tablename);
		// send num_of_page by session to use it in <li>paggination</li> loop
		$_SESSION['numpage'] = $num_of_page = ceil($countallrow/$per_page);
		// send data from controller used session to user table
		$_SESSION['query_categories'] = $result;

		//with header send paggination number to used it after change like (edit - delete) value show in this page -- prevent trnasfer to first page
		header("location:../dashboard.php?mainpage=categories&pagno=$page_number");	
## this condition to recivied $_POST from AddCategory to DBMS	
}elseif (isset($_POST['submit']) and $_POST['submit'] == "addcat" ) {
	
	 $data['CategoryName'] 	= $_POST['CategoryName'];

		$tablename = "olx.categories";		
		$result = new crud($data);
		$returnresult = $result->insertdata($tablename);
		// check query done or not execute return true or false	
			if ($returnresult) {
   		 		header("Location:c_categoriescrud.php?page=");
			}else{
				echo "your data not saved try again";
			}
## first condition to recive data from checkboxes selected _POST			
}elseif (isset($_POST['checkbox']) and is_array($_POST['checkbox'])) {
	$tablename  = "olx.categories";
	$columnname = "CategoryID";
	// implode array to string for used it in query sql like that - '65','66','68','69','72'
	$idlistCheck = "'" . implode("','", $_POST['checkbox']) . "'";
	
	$data = new crud();
	$result = $data->deletedata($tablename,$columnname,$idlistCheck);
	if ( $result > 0) {
		echo "query done";
		header("refresh:2;url=c_categoriescrud.php?page=");
	}else{
		echo "this user is not exist";
		}				
## second condition to recive data from btn delete _GET
}elseif (isset($_GET['deleteid']) and is_numeric($_GET['deleteid'])) {
	$tablename = "olx.categories";
	$columnname = "CategoryID";
    $AdsID = intval($_GET['deleteid']);
	
	$data = new crud();
	$result = $data->deletedata($tablename,$columnname,$AdsID);	
	$pagginationnumber = intval($_GET['pagno']) ;

	if ( $result > 0) {
		echo "query done";
		header("refresh:2;url=c_categoriescrud.php?page=$pagginationnumber");
	}else{
		echo "this user is not exist";
		}				
## ------------ recive id for ad to display data at edit ad page --------------	
}elseif (isset($_GET['editid']) and is_numeric($_GET['editid'])) {
	 $cat_id = intval($_GET['editid']);

   	 $data = new crud();
	 $result = $data->getdata("CategoryID = $cat_id","olx.categories");
	 $_SESSION['Query_edit_cat'] = $result ;

	 header("Location:../dashboard.php?subpage=edit_category&pagno={$_GET['pagno']}");
## ------------ request from edit category page --------------			
}elseif (isset($_POST['submit']) and $_POST['submit'] == "editcat") {
	
 	$data['CategoryName'] 			 = $_POST['CategoryName'];

	 $cat_id = intval($_POST['catID']);
 	 $pagno  = intval($_POST['pagno']);

	$tablename = "olx.categories";
	$resultform = new crud($data);
	$count = $resultform->editdata($tablename,"CategoryID = $cat_id");	
	
		if ($count) {
		 header("Location:c_categoriescrud.php?page=$pagno");
		}else{
			echo "your data not saved try again";
		}

}



	

 














?>