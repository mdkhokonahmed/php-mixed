 <?php include_once 'lib/Database.php';?>
<?php
 class Adddepartment{
 	private $db; 

   public function __construct(){
 	 
 	 $this->db = new Database();	

 	}

 	public function InsertDepartment($data){
      $departname = $data['departname'];
      $subjctname = $data['subjctname'];
      $code       = $data['code'];
      if ($departname == "" OR $subjctname == "" OR $code == "" ) {
      		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
 	 	    return $msg;
      }

    $sql = "INSERT INTO tbl_department (departname, subjctname, code) VALUES(:departname, :subjctname, :code)";	
 	  $query = $this->db->pdo->prepare($sql);
 	  $query->bindValue(':departname', $departname);
 	  $query->bindValue(':subjctname', $subjctname);
 	  $query->bindValue(':code', $code);
 	  $result = $query->execute();
 	  if ($result) {
 	  	$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Register</div>";
 	 	return $msg;
 	  }else{
 	  	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Problem!</div>";
 	 	return $msg;
 	  }
 	}

   public function GetShowDepartment(){
      $sql = "SELECT * FROM tbl_department ORDER BY deptId DESC";
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
        return $result;
   }

   public function DepartmentById($deptId){
   $sql = "SELECT * FROM tbl_department WHERE deptId = :deptId LIMIT 1";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':deptId', $deptId);
     $query->execute();
     $result = $query->fetchAll();
     return $result;
   }

   public function UpdateDepartment($deptId, $data){
       $departname = $data['departname'];
      $subjctname = $data['subjctname'];
      $code       = $data['code'];
      if ($departname == "" OR $subjctname == "" OR $code == "" ) {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
        return $msg;
      }

     $sql = "UPDATE tbl_department SET
               departname = :departname,
               subjctname = :subjctname,
               code       = :code
         WHERE deptId = :deptId";
      $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':departname', $departname);
     $query->bindValue(':subjctname', $subjctname);
     $query->bindValue(':code', $code);
     $query->bindValue(':deptId', $deptId);
      $result = $query->execute();
      if ($result) {
        $msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Department Updated</div>";
        return $msg;
      }else{
        $msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Department Updated Problem!</div>";
        return $msg;
      }        

   }
  public function DepartmentDelete($id){
   $sql = "DELETE FROM tbl_department WHERE deptId = :id LIMIT 1";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':id', $id);
      $query->execute();
  }


  } 