<?php

	session_start();
	
    unset($_SESSION["username"]);
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_role"]);

	session_destroy();

	header("location:../controller/c_displaydata.php");

?>