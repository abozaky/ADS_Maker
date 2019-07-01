<?php
	session_start();
	/*
	This Controller recive and send data to  View Advertisments Page from model
	@ diplay Data 
	@ Edit   Data 
	@ insert Data
	@ Delete Data
	*/
	include_once "../model/repeatedfunctions.php";
	include_once "../model/m_crud.php";

	
## show data in adviretisment paggination by pagnumber     	
if (isset($_GET['page'])) {
		$page_number = $_GET['page'] ? intval($_GET['page']) : 1;  
		$tablename = "olx.Relationads";//view from dbms (user-cat-ads)
		$data = new crud();
		$countallrow = $data->getdatacount($tablename);
		$per_page = 5;
		
		// page 1 from 0,5 - 0 =(page_number-1), start row to 4 per_page 
		// page 2 from 5,5 - 5 =(page_number-1), start row to 4 per_page
		// (page_number-1)*per_page --- $starting limit number
		$starting_limit_number = ($page_number-1)*$per_page; 
		// 1 mean all- Where 1 limit -,4
		$columnname = "1 ORDER BY AdsID DESC LIMIT $starting_limit_number,$per_page "; 
		$result = $data->getdata($columnname,$tablename);
		// send num_of_page by session to use it in <li>paggination</li> loop
		$_SESSION['numpage'] = $num_of_page = ceil($countallrow/$per_page);
		// send data from controller used session to user table
		$_SESSION['query'] = $result;

		// send data to view page adads selectbox (users - categories)
		$userselectads = $data->getdata("1","olx.users");
		$_SESSION['user_select_ads'] = $userselectads;

		$categoryselectads = $data->getdata("1","olx.categories");
		$_SESSION['category_select_ads'] = $categoryselectads;

		
		//with header send paggination number to used it after change like (edit - delete) value show in this page -- prevent trnasfer to first page
		header("location:../dashboard.php?mainpage=advertisments&pagno=$page_number");	
## this condition to edit status from view page ads btn status
}elseif (isset($_GET['adsstatus']) && is_numeric($_GET['adsstatus'])) {
		// check is get from regstatus and is number
		$adsstatus = intval($_GET['adsstatus']) ;
		$pagginationnumber = intval($_GET['pagno']) ;
		// // recive data from page user url adsstatus
		$data['Status'] = ($adsstatus == 0) ? 1 : 0;
		$id 		= intval($_GET['adsid']) ; 
		$tablename = "olx.advertisments";
		// declare object from cud class
		$resultstatus = new crud($data);
		$count = $resultstatus->editdata($tablename,"AdsID = $id");

		if ($count > 0) {
				// $Message = "query done";
   		 header("Location:c_advertismentscrud.php?page=$pagginationnumber");
			}else{
				echo "This query alredy edit or exist";
			}
## this condition to recivied $_POST from AddADS to DBMS	
}elseif (isset($_POST['submit']) and $_POST['submit'] == "addads" ) {
	
	 $data['Title'] 			 = $_POST['Title'];
	 $data['Details'] 			 = $_POST['Details'];
	 $data['Price'] 			 = $_POST['price'];
	 $data['City'] 				 = $_POST['city'];
	 $data['ConditionStatus'] 	 = $_POST['CondiStatus'];
	 $data['Availability'] 		 = $_POST['Availability'];
 	 $data['UserID'] 	     	 = $_POST['UserID'];
 	 $data['CategoryID'] 		 = $_POST['CategoryID'];
     $file = $_FILES['file'];
     $dirpath = "../../resources/images/home/";
	 $data['Image'] 			 = rand().$file['name'];
	 move_uploaded_file($file['tmp_name'], $dirpath.$data['Image']);

		$tablename = "olx.advertisments";
			
		$result = new crud($data);
		$returnresult = $result->insertdata($tablename);
		// check query done or not execute return true or false	
			if ($returnresult) {
   		 header("Location:c_advertismentscrud.php?page=$pagginationnumber");
			}else{
				echo "your data not saved try again";
			}
## first condition to recive data from checkboxes selected _POST			
}elseif (isset($_POST['checkbox']) and is_array($_POST['checkbox'])) {
	$tablename  = "olx.advertisments";
	$columnname = "AdsID";
	// implode array to string for used it in query sql like that - '65','66','68','69','72'
	$idlistCheck = "'" . implode("','", $_POST['checkbox']) . "'";
	
	$data = new crud();
	$result = $data->deletedata($tablename,$columnname,$idlistCheck);
	if ( $result > 0) {
		echo "query done";
		header("refresh:2;url=c_advertismentscrud.php?page=");
	}else{
		echo "this user is not exist";
		}				
## second condition to recive data from btn delete _GET
}elseif (isset($_GET['deleteid']) and is_numeric($_GET['deleteid'])) {
	$tablename = "olx.advertisments";
	$columnname = "AdsID";
    $AdsID = intval($_GET['deleteid']);
	
	$data = new crud();
	$result = $data->deletedata($tablename,$columnname,$AdsID);	
	$pagginationnumber = intval($_GET['pagno']) ;

	if ( $result > 0) {
		echo "query done";
		header("refresh:2;url=c_advertismentscrud.php?page=$pagginationnumber");
	}else{
		echo "this user is not exist";
		}				
## ------------ recive id for ad to display data at edit ad page --------------	
}elseif (isset($_GET['editid']) and is_numeric($_GET['editid'])) {
	 $ad_id = intval($_GET['editid']);

   	 $data = new crud();
	 $result = $data->getdata("AdsID = $ad_id","olx.Relationads");
	 $_SESSION['Query_edit_ads'] = $result ;

	 header("Location:../dashboard.php?subpage=edit_ads&pagno={$_GET['pagno']}");
## ------------ request from edit ADS page --------------			
}elseif (isset($_POST['submit']) and $_POST['submit'] == "editads") {
	
	 $data['Title'] 			 = $_POST['Title'];
	 $data['Details'] 			 = $_POST['Details'];
	 $data['Price'] 			 = $_POST['price'];
	 $data['City'] 				 = $_POST['city'];
	 $data['ConditionStatus'] 	 = $_POST['CondiStatus'];
	 $data['Availability'] 		 = $_POST['Availability'];
 	 $data['CategoryID'] 		 = $_POST['CategoryID'];
     $file = $_FILES['file'];
     $dirpath = "../../resources/images/home/";
	 $data['Image'] 			 = rand().$file['name'];
	 move_uploaded_file($file['tmp_name'], $dirpath.$data['Image']);
 	 $adsid			 	     	 = $_POST['AdsID']; // hidden input
   	 $pagno 					 = $_POST['pagno'] ;// hidden input


		$tablename = "olx.advertisments";
		$resultform = new crud($data);
		$count = $resultform->editdata($tablename,"AdsID = $adsid");	
		
			if ($count) {
   		 header("Location:c_advertismentscrud.php?page=$pagno");
			}else{
				echo "your data not saved try again";
			}

}


	

 














?>