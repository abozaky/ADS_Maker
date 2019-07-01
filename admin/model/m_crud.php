<?php
/**
 * class to add any data -> database  more dynamic 
 * extended from repeated function to connect and close database
 */
class crud extends repeatedfunctions
{
	private $data;  // data array from form post to insertdata()
	private $tablename; // insertdata & delete data $ update-editdata
	private $columnname; 	  // deletedata()
	private $id ; 		 	  // deletedata() and editdata() -update
	
	

	function __construct($data=[])
		{
			// set data to variable array
			if (is_array($data)) {
				$this->data  = $data;
				
			}else{
				echo "you must array";
			}
			// connect db from parent class repeatedfunctions 
			$this->conndb();

				
		}

	public function getdata($columnname,$tablename){
		/*function to get data from display and fectch data as array*/
			$this->columnname = $columnname;
			$this->tablename = $tablename;
			
			$stmt = $this->dbc->conn->prepare(" SELECT * FROM
					$this->tablename WHERE $this->columnname ");
			$stmt->execute() or die(print_r($stmt->errorInfo())) ;

			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();

			if ($count > 0) {
				
				return $row;


			}else{
	 			header("Location:../dashboard.php");

			}		
	}
	public function insertdata($tablename){
		/* important -- this way instead of setdata then insertdata
			- to make function more dynamic with any table 
			- i make loop to recieve data from array 
			- and save it data as key and value to used it in query
		*/	
			$this->tablename = $tablename;	

			foreach ($this->data as $key => $value) {
				$keys[]  =  $key;
				$values[]=	$value;
			}				 

			// implode array to string to like that - userName,Password ,Email ,fullName, structure query sql

			 $columsname	= implode($keys, ",");
			 $values    	= '"'.implode($values,'","').'"';
			
			
			$stmt = $this->dbc->conn->prepare("INSERT INTO 
					$this->tablename ($columsname,Date) VALUES ($values,now())");
			$result = $stmt->execute() or die(print_r($stmt->errorInfo())) ;
			return $result;

	}
	public function deletedata($tablename,$columnname,$id){
		/* function  dynamic to delete row by id
			@tablename & column $ id used it query
		*/	
			$this->tablename  = $tablename;
			$this->columnname = $columnname;
			$this->id = $id;

			$stmt = $this->dbc->conn->prepare("DELETE FROM $this->tablename WHERE $this->columnname IN ($this->id)");

			$result = $stmt->execute() or die (print_r($stmt->errorInfo()));
			$count = $stmt->rowCount();
			return $count ;
										
	}
	public function editdata($tablename,$condi){
		/* function  dynamic to update data row by id
			@tablename & column $ id used it query
		*/	
			$this->tablename  = $tablename;
			
			foreach ($this->data as $key => $value) {
				$result[] = $key ."="."'".$value."'";
			}		
				// implode array to string to like update structure
			     $setcolvalue = implode($result, ",");		 
	
			$stmt = $this->dbc->conn->prepare("UPDATE $this->tablename 
									SET $setcolvalue WHERE $condi");

			$result = $stmt->execute() or die(print_r($stmt->errorInfo())) ;
			return $count = $stmt->rowCount();
			
	}
	public function getdatacount($tablename){
		// functin to count row to used in paggination
			$this->tablename = $tablename;
			// count all records
			$countrow = $this->dbc->conn->prepare(" SELECT * FROM
					$this->tablename ");
			$countrow->execute() or die(print_r($stmt->errorInfo())) ;
			return $countrow->rowCount();
	}

}

?>





	