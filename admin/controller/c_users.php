<?php
	session_start();
	/*
	This Controller recive and send data to  View users Page from model
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
		$tablename = "olx.users";
		$data = new crud();
		$countallrow = $data->getdatacount($tablename);
		$per_page = 2;
		
		// page 1 from 0,4 - 0 =(page_number-1), start row to 4 per_page 
		// page 2 from 4,4 - 5 =(page_number-1), start row to 4 per_page
		// (page_number-1)*per_page --- $starting limit number
		$starting_limit_number = ($page_number-1)*$per_page; 
		// 1 mean all- Where 1 limit -,4
		$columnname = "1 ORDER BY UserID DESC LIMIT $starting_limit_number,$per_page "; 
		$result = $data->getdata($columnname,$tablename);
		// send num_of_page by session to use it in <li>paggination</li> loop
		$_SESSION['numpage'] = $num_of_page = ceil($countallrow/$per_page);
		// send data from controller used session to user table
		$_SESSION['queryusers'] = $result;

		// send data to view page adads selectbox (users - categories)
		// $userselectads = $data->getdata("1","olx.users");
		// $_SESSION['user_select_ads'] = $userselectads;

		// $categoryselectads = $data->getdata("1","olx.categories");
		// $_SESSION['category_select_ads'] = $categoryselectads;

		
		//with header send paggination number to used it after change like (edit - delete) value show in this page -- prevent trnasfer to first page
		header("location:../dashboard.php?mainpage=users&pagno=$page_number");	
## first condition to edit Role from view page users btn status
}elseif (isset($_GET['role']) && is_numeric($_GET['role'])) {
		// check is get from regstatus and is number
		 $role = intval($_GET['role']) ;
		 $pagginationnumber = intval($_GET['pagno']) ;
		// recive data from page user url role
		$data['Role'] = ($role == 0) ? 1 : 0;
		$id 		= intval($_GET['userid']) ; 
		$tablename = "olx.users";
		// declare object from cud class
		$resultrole = new crud($data);
		$count = $resultrole->editdata($tablename,"UserID = $id");

		if ($count > 0) {
				// $Message = "query done";
   		 header("Location:c_users.php?page=$pagginationnumber");
			}else{
				echo "This query alredy edit or exist";
			}
## second condition to edit status from view page users btn status
}elseif (isset($_GET['regstatus']) && is_numeric($_GET['regstatus'])) {
		// check is get from regstatus and is number
		 $regstatus = intval($_GET['regstatus']) ;
		 $pagginationnumber = intval($_GET['pagno']) ;
		// recive data from page user url regstatus
		$data['RegStatus'] = ($regstatus == 0) ? 1 : 0;
		$id 		= intval($_GET['userid']) ; 
		$tablename = "olx.users";
		// declare object from cud class
		$resultrole = new crud($data);
		$count = $resultrole->editdata($tablename,"UserID = $id");

		if ($count > 0) {
				// $Message = "query done";
   		 header("Location:c_users.php?page=$pagginationnumber");
			}else{
				echo "This query alredy edit or exist";
			}
## this condition to recivied $_POST from adduser to DBMS	
}elseif (isset($_POST['submit']) and $_POST['submit'] == "adduser" ) {
	
	$data['UserName'] = $_POST['username'];
	$data['Email'] 	  = $_POST['email'];
	$data['Password'] = $_POST['password'];

	$tablename = "olx.users";		
	$result = new crud($data);
	$returnresult = $result->insertdata($tablename);
	// check query done or not execute return true or false	
		if ($returnresult) {
		 		header("Location:c_users.php?page=");
		}else{
			echo "your data not saved try again";
		}
## first condition to recive data from checkboxes selected _POST			
}elseif (isset($_POST['checkbox']) and is_array($_POST['checkbox'])) {
	$tablename  = "olx.users";
	$columnname = "UserID";
	// implode array to string for used it in query sql like that - '65','66','68','69','72'
	$idlistCheck = "'" . implode("','", $_POST['checkbox']) . "'";
	$pagno = $_POST['pagno'];
	$data = new crud();
	$result = $data->deletedata($tablename,$columnname,$idlistCheck);
	if ( $result > 0) {
		echo "query done";
		header("refresh:2;url=c_users.php?page=$pagno");
	}else{
		echo "this user is not exist";
		}				
## second condition to recive data from btn delete _GET
}elseif (isset($_GET['deleteid']) and is_numeric($_GET['deleteid'])) {
	$tablename = "olx.users";
	$columnname = "UserID";
    $AdsID = intval($_GET['deleteid']);
	
	$data = new crud();
	$result = $data->deletedata($tablename,$columnname,$AdsID);	
	$pagginationnumber = intval($_GET['pagno']) ;

	if ( $result > 0) {
		echo "query done";
		header("refresh:2;url=c_users.php?page=$pagginationnumber");
	}else{
		echo "this user is not exist";
		}				
## ------------ recive id for ad to display data at edit ad page --------------	
}elseif (isset($_GET['editid']) and is_numeric($_GET['editid'])) {
	 $user_id = intval($_GET['editid']);

   	 $data = new crud();
	 $result = $data->getdata("UserID = $user_id","olx.users");
	 $_SESSION['Query_edit_Users'] = $result ;

	 header("Location:../dashboard.php?subpage=edit_user&pagno={$_GET['pagno']}");
## ------------ request from edit ADS page --------------			
}elseif (isset($_POST['submit']) and $_POST['submit'] == "edituser") {
	
	$data['UserName']    = $_POST['username'];
	$data['Email'] 	  = $_POST['email'];
	$data['Password']    = $_POST['password'];
	$user_id 			  = $_POST['userid']; //from input hidden userid to edit 
	 $pagno  			  = intval($_POST['pagno']);

	$tablename = "olx.users";

	$resultform = new crud($data);
	$count = $resultform->editdata($tablename,"UserID = $user_id");	

		if ($count) {
		 header("Location:c_users.php?page=$pagno");
		}else{
			echo "your data not saved try again";
		}

}


	
?>