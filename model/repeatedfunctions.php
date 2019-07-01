<?php
/**
 *  this parent class for functions repeated 
 */
	class repeatedfunctions 
	{
		protected $dbc;

				//  function to connect database
		protected function conndb(){
			include "../model/database.php" ;
			$varse = "../model/varse.php";
			$this->dbc = new database($varse);
		}
				// function to close database connection
		protected function close(){
			$this->dbc->closedb();
		}
		 
	}
?>