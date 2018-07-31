<?php include_once 'lib/Database.php';?>
<?php
 class StudentAddDetalies{
 	private $db; 

   public function __construct(){
 	 
 	 $this->db = new Database();	

 	}

 	public function InsertStudent($data){
      $deptId   = $data['deptId'];
      $name     = $data['name'];
      $stduid   = $data['stduid'];
      $semt     = $data['semt'];
      $datetime     = $data['datetime'];
      $phone    = $data['phone'];
      $email    = $data['email'];
      $gender   = $data['gender'];
      $gardname = $data['gardname'];
      $garphone = $data['garphone'];
      $address  = $data['address'];
      
      if ($deptId == "" OR $name == "" OR $stduid == ""OR $semt == "" OR $datetime == "" OR $phone == "" OR $email == "" OR $gender == "" OR $gardname == "" OR $garphone == "" OR $address == "") {
      		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
 	 	  return $msg;
      }

     $sql = "INSERT INTO tbl_addstudent (deptId, name, stduid, datetime, phone, email, gender, gardname, garphone, address, semt) VALUES(:deptId, :name, :stduid, :datetime, :phone, :email, :gender, :gardname, :garphone, :address, :semt)";	
 	  $query = $this->db->pdo->prepare($sql);
 	  $query->bindValue(':deptId', $deptId);
 	  $query->bindValue(':name', $name);
    $query->bindValue(':stduid', $stduid);
 	  $query->bindValue(':semt', $semt);
 	  $query->bindValue(':datetime', $datetime);
 	  $query->bindValue(':phone', $phone);
 	  $query->bindValue(':email', $email);
 	  $query->bindValue(':gender', $gender);
 	  $query->bindValue(':gardname', $gardname);
 	  $query->bindValue(':garphone', $garphone);
 	  $query->bindValue(':address', $address);
 	  $result = $query->execute();
 	  if ($result) {
 	  	$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Student Register</div>";
 	 	return $msg;
 	  }else{
 	  	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Problem!</div>";
 	 	return $msg;
 	  }
 	}
   
	public function GetShowStudent(){
 	$sql = "SELECT tbl_addstudent .*, tbl_department.departname 
 	FROM tbl_addstudent
 	INNER JOIN tbl_department
 	ON tbl_addstudent.deptId = tbl_department.deptId
 	ORDER BY tbl_addstudent.studetId DESC";
    $query = $this->db->pdo->prepare($sql);
    $query->execute();
     $result = $query->fetchAll();
     return $result;
 	}

  public function GetStudentById($studetId){
     $sql = "SELECT * FROM tbl_addstudent WHERE studetId = :studetId LIMIT 1";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':studetId', $studetId);
     $query->execute();
     $result = $query->fetchAll();
     return $result;
  }

  public function UpdatedStudent($studetId, $data){
      $deptId   = $data['deptId'];
      $name     = $data['name'];
      $stduid     = $data['stduid'];
      $semt     = $data['semt'];
      $datetime = $data['datetime'];
      $phone    = $data['phone'];
      $email    = $data['email'];
      $gender   = $data['gender'];
      $gardname = $data['gardname'];
      $garphone = $data['garphone'];
      $address  = $data['address'];
      if ($deptId == "" OR $name == "" OR $stduid == "" OR $semt == "" OR $datetime == "" OR $phone == "" OR $email == "" OR $gender == "" OR $gardname == "" OR $garphone == "" OR $address == "") {
          $msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
      return $msg;
      }
       
        $sql = "UPDATE tbl_addstudent SET
               deptId   = :deptId,
               name     = :name,
               stduid   = :stduid,
               semt     = :semt,
               datetime = :datetime,
               phone    = :phone,
               email    = :email,
               gender   = :gender,
               gardname = :gardname,
               garphone = :garphone,
               address  = :address
         WHERE studetId = :studetId";

      $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':deptId', $deptId);
     $query->bindValue(':name', $name);
     $query->bindValue(':stduid', $stduid);
     $query->bindValue(':semt', $semt);
     $query->bindValue(':datetime', $datetime);
     $query->bindValue(':phone', $phone);
     $query->bindValue(':email', $email);
     $query->bindValue(':gender', $gender);
     $query->bindValue(':gardname', $gardname);
     $query->bindValue(':garphone', $garphone);
     $query->bindValue(':address', $address);
     $query->bindValue(':studetId', $studetId);
     $result = $query->execute();
      if ($result) {
        $msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Student Profile Updated</div>";
        return $msg;
      }else{
        $msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Student Profile Updated Problem!</div>";
        return $msg;
      }

  }
  
  public function StudentDelete($delId){
    $sql = "DELETE FROM tbl_addstudent WHERE studetId = :delId LIMIT 1";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':delId', $delId);
      $query->execute();
  }

  public function GetShowStudentsearch($search){
     $search = "%$search%";
     $sql = "SELECT * FROM tbl_addstudent WHERE name LIKE ':search'";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':search', $search, PDO::PARAM_STR);
     $query->execute();
     $result = $query->fetch();
     return $result;
  }

  public function paginationdata($start_form,$parpage){
    $sql = "SELECT * FROM tbl_addstudent LIMIT $start_form, $parpage";
    $query = $this->db->pdo->prepare($sql);
    $query->execute();
    $result = $query->rowCount();
    $total_page = ceil($result/$parpage);
    return $total_page;
  }




 

}

 



