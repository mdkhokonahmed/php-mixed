 <?php include_once 'lib/Database.php';?>
<?php
 class Adddlibrary{
 	private $db; 

   public function __construct(){
 	 
 	 $this->db = new Database();	

 	}

 	public function BooksInsert($data){
 	  $subjctname = $data['subjctname'];
      $deptId     = $data['deptId'];
      $author     = $data['author'];
      $book       = $data['book'];
      if ($subjctname == "" OR $deptId == "" OR $author == "" OR $book == "") {
      		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
 	 	  return $msg;
      }

     $sql = "INSERT INTO tbl_library (subjctname, deptId, author, book) VALUES(:subjctname, :deptId, :author, :book)";	
 	  $query = $this->db->pdo->prepare($sql);
 	  $query->bindValue(':subjctname', $subjctname);
 	  $query->bindValue(':deptId', $deptId);
 	  $query->bindValue(':author', $author);
 	  $query->bindValue(':book', $book);
 	  $result = $query->execute();
 	  if ($result) {
 	  	$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Books Added</div>";
 	 	return $msg;
 	  }else{
 	  	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Problem!</div>";
 	 	return $msg;
 	  }
 	}

 	public function GetShowAllBookslist(){
 	$sql = "SELECT tbl_library .*, tbl_department.departname 
 	   FROM tbl_library
 	  INNER JOIN tbl_department
 	  ON tbl_library.deptId = tbl_department.deptId
 	  ORDER BY tbl_library.librId DESC";
    $query = $this->db->pdo->prepare($sql);
    $query->execute();
     $result = $query->fetchAll();
     return $result;
 	}

 	 public function GetBooksShowById($librId){
 	 $sql = "SELECT * FROM tbl_library WHERE librId = :librId LIMIT 1";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':librId', $librId);
     $query->execute();
     $result = $query->fetchAll();
     return $result;
 	 }
   
     public function BooksUpdate($librId, $data){
 	  $subjctname = $data['subjctname'];
      $deptId     = $data['deptId'];
      $author     = $data['author'];
      $book       = $data['book'];
      if ($subjctname == "" OR $deptId == "" OR $author == "" OR $book == "") {
      		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
 	 	  return $msg;
      }

     $sql = "UPDATE tbl_library SET
        subjctname = :subjctname,
        deptId = :deptId,
        author = :author,
         book = :book
        WHERE librId = :librId";	
 	  $query = $this->db->pdo->prepare($sql);
 	  $query->bindValue(':subjctname', $subjctname);
 	  $query->bindValue(':deptId', $deptId);
 	  $query->bindValue(':author', $author);
 	  $query->bindValue(':book', $book);
 	  $query->bindValue(':librId', $librId);
 	  $result = $query->execute();
 	  if ($result) {
 	  	$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Books Added</div>";
 	 	return $msg;
 	  }else{
 	  	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Problem!</div>";
 	 	return $msg;
 	  }
 	}

 	public function BooksDelete($id){
 	  $sql = "DELETE FROM tbl_library WHERE librId = :id LIMIT 1";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':id', $id);
      $query->execute();
 	}


 }