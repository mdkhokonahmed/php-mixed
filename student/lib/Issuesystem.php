 <?php include_once 'lib/Database.php';?>
<?php
 class Issuesystem{
 	private $db; 

   public function __construct(){
 	 
 	 $this->db = new Database();	

 	}

 	public function StudentbookInsert($data){
 	  $studname = $data['studname'];
 	  $stdroll  = $data['stdroll'];
 	  $phone    = $data['phone'];
      $deptId   = $data['deptId'];
      $librId   = $data['librId'];
      $tddate   = $data['tddate'];
      $rutndate = $data['rutndate'];
      if ($studname == "" OR $stdroll == "" OR $phone == "" OR $deptId == "" OR $librId == "" OR $tddate == "" OR $rutndate == "") {
      		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
 	 	  return $msg;
      }

     $sql = "INSERT INTO tbl_issue(studname, stdroll, phone, deptId, librId, tddate, rutndate) VALUES(:studname, :stdroll, :phone,  :deptId, :librId, :tddate, :rutndate)";	
 	  $query = $this->db->pdo->prepare($sql);
 	  $query->bindValue(':studname', $studname);
 	  $query->bindValue(':stdroll', $stdroll);
 	  $query->bindValue(':phone', $phone);
 	  $query->bindValue(':deptId', $deptId);
 	  $query->bindValue(':librId', $librId);
 	  $query->bindValue(':tddate', $tddate);
 	  $query->bindValue(':rutndate', $rutndate);
 	  $result = $query->execute();
 	  if ($result) {
 	  	$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Students Books Added</div>";
 	 	return $msg;
 	  }else{
 	  	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Problem!</div>";
 	 	return $msg;
 	  }
 	}

    public function GetShowAllIssueBooks(){
     $sql = "SELECT tbl_issue .*, tbl_department.departname, tbl_library.subjctname
 	   FROM tbl_issue
 	  INNER JOIN tbl_department
 	  ON tbl_issue.deptId = tbl_department.deptId
 	  INNER JOIN tbl_library
 	  ON tbl_issue.librId = tbl_library.librId
 	  ORDER BY tbl_issue.issuId DESC";
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
     $result = $query->fetchAll();
     return $result;
    }

    public function GetShowByIssueId($issuId){
    $sql = "SELECT * FROM tbl_issue WHERE issuId = :issuId LIMIT 1";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':issuId', $issuId);
     $query->execute();
     $result = $query->fetchAll();
     return $result;
    }

    public function StudentbookissueUpdate($issuId, $data){
    $studname = $data['studname'];
 	  $stdroll  = $data['stdroll'];
 	  $phone    = $data['phone'];
      $deptId   = $data['deptId'];
      $librId   = $data['librId'];
      $tddate   = $data['tddate'];
      $rutndate = $data['rutndate'];
      if ($studname == "" OR $stdroll == "" OR $phone == "" OR $deptId == "" OR $librId == "" OR $tddate == "" OR $rutndate == "") {
      		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
 	 	  return $msg;
      }

     $sql = "UPDATE tbl_issue SET
           studname = :studname,
           stdroll = :stdroll,
           phone = :phone,
           deptId = :deptId,
           librId = :librId,
           tddate = :tddate,
           rutndate = :rutndate
           WHERE issuId = :issuId";	
 	  $query = $this->db->pdo->prepare($sql);
 	  $query->bindValue(':studname', $studname);
 	  $query->bindValue(':stdroll', $stdroll);
 	  $query->bindValue(':phone', $phone);
 	  $query->bindValue(':deptId', $deptId);
 	  $query->bindValue(':librId', $librId);
 	  $query->bindValue(':tddate', $tddate);
 	  $query->bindValue(':rutndate', $rutndate);
 	  $query->bindValue(':issuId', $issuId);
 	  $result = $query->execute();
 	  if ($result) {
 	  	$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Students Books Updated</div>";
 	 	return $msg;
 	  }else{
 	  	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Problem!</div>";
 	 	return $msg;
 	  }
    }

    public function BooksDelete($id){
    $sql = "DELETE FROM tbl_issue WHERE issuId = :id LIMIT 1";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':id', $id);
      $query->execute();
    }


 }
