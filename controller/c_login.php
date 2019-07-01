<?php
	session_start();
			/* Login page Controller to recive data from login view */

			include_once "../model/repeatedfunctions.php";
			include_once "../model/m_crud.php";

		## condition to recive data from request  post ajax and check it display alert befor btn signup  ##
if (isset($_POST['key']) and isset($_POST['colname'])) {
		// recive data from ajax
	$value     = $_POST['key'];
	$colname   = $_POST['colname'];
	$tablename = "olx.users";
	$condi 	   = "WHERE $colname = '$value'";
	$result    = new crud();
	// function to return count row 
	$count     = $result->getdatacount($condi,$tablename);
	if ($count > 0) {
	
	echo "<h5 id='check' class='alert alert-danger'>This Value Already Exist try another value</h5>";	
	}else{echo "<h5 class=' alert alert-success '>Your Value Free</h5>";}  
		
}

	## condition to recive data from request post LoginPage and check it ##
if (isset($_POST['submitlogin'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];	

	$condi 	     = "WHERE UserName = '{$username}' and Password = '{$password}'";
	$tablename   = "olx.users";

	$result      = new crud();
	// function to return count row 
	$count 	   	 =  $result->getdatacount($condi,$tablename);
	if ( $count>0 ) {
		$tablename = "olx.users";
		$condi = "WHERE UserName = '{$username}' and Password = '{$password}'" ;
		$result_data = 	$result->getdata($condi,$tablename);
		
		$_SESSION['user_id']   = $result_data[0]['UserID'];
		$_SESSION['user_role'] = $result_data[0]['Role'];		
		$_SESSION['username']  = $result_data[0]['UserName'];		
		
		header("location:../controller/c_displaydata.php"); // redirect to homepage
	}else{
		header("location:{$_SERVER['HTTP_REFERER']}");
	}
		
}

?>