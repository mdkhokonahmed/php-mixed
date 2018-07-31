<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');

class Project{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}

	public function checkUserName($username){
		$query = "SELECT * FROM tbl_user WHERE username = '$username'";
		$getuser = $this->db->select($query);
		if ($getuser == "") {
			echo "<span class='error'>Place Enter Username</span>";
			exit();
		}elseif ($getuser) {
		  echo "<span class='error'><b>$username</b>Name Avabilibol</span>";
		  exit();
		}else{
			echo "<span class='success'><b>$username</b>Avabilibol</span>";
			exit();
		}
	}

	public function Livesearch($search){
    $query = "SELECT * FROM tbl_serch WHERE username LIKE '%$search%'";
    $getdata = $this->db->select($query);
     if ($getdata) {
           $data = "";
           $data .='<table class="tblone"><tr>
           			<th>User name</th>
           			<th>Name</th>
           			<th>Email</th>
           			</tr>';
           			
           			while ($result = $getdata->fetch_assoc()) {
           				$data .='<tr>
           						 <td>'.$result["username"].'</td>
           						 <td>'.$result["name"].'</td>
           						 <td>'.$result["email"].'</td>
           				       </tr>';
           			}
           			echo $data;
     }else{
     	echo "Data not Found";
     }
	}

	
}
?>