<?php
		/* Register page Controller to recive data from login view 
			and to send model crud */
		// first include parent class then subclass then declare opject from class //
	include_once "../model/repeatedfunctions.php";
	include_once "../model/m_crud.php";

	## condition to recive data from add_ads page to DBMS ##
if (isset($_POST['submit']) and $_POST['submit'] == "addads") {
	
	 $data['Title'] 			 = $_POST['Title'];
	 $data['Details'] 			 = $_POST['Details'];
	 $data['Price'] 			 = $_POST['price'];
	 $data['City'] 				 = $_POST['city'];
	 $data['ConditionStatus'] 	 = $_POST['CondiStatus'];
	 $data['Availability'] 		 = $_POST['Availability'];
 	 $data['UserID'] 	     	 = $_POST['UserID'];
 	 $data['CategoryID'] 		 = $_POST['CategoryID'];
     $file = $_FILES['file'];
 	 $dirpath = "../resources/images/home/";
	 $data['Image'] 			 = rand().$file['name'];
	 move_uploaded_file($file['tmp_name'], $dirpath.$data['Image']);

		$tablename = "olx.advertisments";
			
		$result = new crud($data);
		$return_result = $result->insertdata($tablename);
		// check query done or not execute return true or false	
			if ($return_result) {
				echo "query done";
   		 // header("Location:c_advertismentscrud.php?page=$pagginationnumber");
			}else{
				echo "your data not saved try again";
			}
## condition to recive from form comment and insert to comments-table
}elseif(isset($_POST['submit']) and $_POST['submit'] == "addcomment"){

	  $data['Details'] 			 = $_POST['Details'];
	  $data['UsserID'] 			 = $_POST['UsserID'];
	  $data['AdssID'] 			 = $_POST['AdssID'];

	  	$tablename = "olx.comments";
	  	$result = new crud($data);
		$return_result = $result->insertdata($tablename);

		if ($return_result) {
				// echo "query done";
   		 header("Location:c_displaydata.php?adsid={$_POST['AdssID']}");
			}else{
				echo "your data not saved try again";
			}


}else{
	## condition to recive data from jquery-ajax registration page ##
	$data['UserName'] = $_POST['username'];
	$data['Email'] 	  = $_POST['email'];
	$data['Password'] = $_POST['password'];

	$tablename = "olx.users";
	$result = new crud($data);
	$result->insertdata($tablename);
			
		if ($result) {
			echo "You have Successfully Registered";
			// header("location:../controller/c_displaydata.php?page=");
		}else{
			echo "your data not saved try again";
		}	
}
?>




