<?php

/**
 * this class to connection with mysqli database 
 */
class Database
{
	  // database servername & username & pass  from vars
		private $dsn;  
		private $dbu;
		private $dbp;
		public $conn;

	function __construct($filname)
	{
		if (is_file($filname)) {
			include $filname;
		} else {
			echo "wrong path" ;
		}
			// to set data from vars file to variable

			$this->dsn = $dsn;
			$this->dbu = $dbu;
			$this->dbp = $dbp;
			$this->connetdb();
	}

	 function connetdb(){
		try {
		   $this->conn = new PDO ($this->dsn,$this->dbu,$this->dbp);
          	// echo "connection done";	    
		}
		catch(PDOException $e){

		   echo $e->getMessage();
		}
	}
				// function to close connection database
	 function closedb(){
			$this->conn = null;

	}
}
?>