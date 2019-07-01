<?php
	session_start();
	/*
	This Controller recive and send data to  View Comments Page from model
	@ diplay Data 
	@ Edit   Data 
	@ insert Data
	@ Delete Data
	*/
	include_once "../model/repeatedfunctions.php";
	include_once "../model/m_crud.php";

	
## show data in comments page paggination by pagnumber     	
if (isset($_GET['page'])) {
		$page_number = $_GET['page'] ? intval($_GET['page']) : 1;  
		$tablename = "olx.releationcomments";//view from dbms (user-com-ads)
		$data = new crud();
		$countallrow = $data->getdatacount($tablename);
		$per_page = 2;
		
		// page 1 from 0,4 - 0 =(page_number-1), start row to 4 per_page 
		// page 2 from 4,4 - 5 =(page_number-1), start row to 4 per_page
		// (page_number-1)*per_page --- $starting limit number
		$starting_limit_number = ($page_number-1)*$per_page; 
		// 1 mean all- Where 1 limit -,4
		$columnname = "1 ORDER BY commentID DESC LIMIT $starting_limit_number,$per_page "; 
		$result = $data->getdata($columnname,$tablename);
		// send num_of_page by session to use it in <li>paggination</li> loop
		$_SESSION['numpage'] = $num_of_page = ceil($countallrow/$per_page);
		// send data from controller used session to user table
		$_SESSION['querycomments'] = $result;
		
		//with header send paggination number to used it after change like (edit - delete) value show in this page -- prevent trnasfer to first page
		header("location:../dashboard.php?mainpage=comments&pagno=$page_number");	
## this condition to edit status from view page comments btn status
}elseif (isset($_GET['commentid']) && is_numeric($_GET['commentid'])) {
		// check is get from regstatus and is number
		$comentstatus = intval($_GET['comstatus']) ;
		$pagginationnumber = intval($_GET['pagno']) ;
		// recive data from page user url adsstatus
		$data['Status'] = ($comentstatus == 0) ? 1 : 0;
		$id 		= intval($_GET['commentid']) ; 
		$tablename = "olx.comments";
		// declare object from cud class
		$resultstatus = new crud($data);
		$count = $resultstatus->editdata($tablename,"commentID = $id");

		if ($count > 0) {
				// $Message = "query done";
   		 	header("Location:c_commentscrud.php?page=$pagginationnumber");
			}else{
				echo "This query alredy edit or exist";
			}
## first condition to recive data from checkboxes selected _POST			
}elseif (isset($_POST['checkbox']) and is_array($_POST['checkbox'])) {
	$tablename  = "olx.comments";
	$columnname = "commentID";
	// implode array to string for used it in query sql like that - '65','66','68','69','72'
	$idlistCheck = "'" . implode("','", $_POST['checkbox']) . "'";
	
	$data = new crud();
	$result = $data->deletedata($tablename,$columnname,$idlistCheck);
	if ( $result > 0) {
		echo "query done";
		header("refresh:2;url=c_commentscrud.php?page=");
	}else{
		echo "this user is not exist";
		}				
## second condition to recive data from btn delete _GET
}elseif (isset($_GET['deleteid']) and is_numeric($_GET['deleteid'])) {
	$tablename = "olx.comments";
	$columnname = "commentID";
    $commentID = intval($_GET['deleteid']);
	
	$data = new crud();
	$result = $data->deletedata($tablename,$columnname,$commentID);	
	$pagginationnumber = intval($_GET['pagno']) ;

	if ( $result > 0) {
		echo "query done";
		header("refresh:1;url=c_commentscrud.php?page=$pagginationnumber");
	}else{
		echo "this user is not exist";
		}				
}


	

 














?>