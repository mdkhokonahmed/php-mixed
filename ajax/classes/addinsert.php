<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');

class Addinsert{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}

	public function checkInsertData($name, $email){
		$query = "INSERT INTO tbl_name (name, email) VALUES('$name', '$email')";
		$getuser = $this->db->select($query);
		if ($getuser) {
			echo "Data Inserted Successfully";
		}else{
			echo "Data not Inserted.";
		}
	}

}

?>