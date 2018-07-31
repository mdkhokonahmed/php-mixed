 <?php include_once 'lib/Database.php';?>
<?php
 class Classroom{
 	private $db; 

   public function __construct(){
 	 
 	 $this->db = new Database();	

 	}

 	public function InsertClassRoom($data){
      $room = $data['room'];
      if ($room == "" ) {
      		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
 	 	  return $msg;
      }

     $sql = "INSERT INTO tbl_room (room) VALUES(:room )";	
 	  $query = $this->db->pdo->prepare($sql);
 	  $query->bindValue(':room', $room);
 	  $result = $query->execute();
 	  if ($result) {
 	  	$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Class Room Added</div>";
 	 	return $msg;
 	  }else{
 	  	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Class Room Problem!</div>";
 	 	return $msg;
 	  }
 	}

  
   public function GetShowClassRoom(){
   	$sql = "SELECT * FROM tbl_room ORDER BY roomId DESC";
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
        return $result;
   }

   public function GetByRoomId($roomId){
    $sql = "SELECT * FROM tbl_room WHERE roomId = :roomId LIMIT 1";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':roomId', $roomId);
     $query->execute();
     $result = $query->fetchAll();
     return $result;
   }
 
  public function UpdateClassRoom($roomId, $data){
    $room = $data['room'];
      if ($room == "" ) {
          $msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
      return $msg;
      }

     $sql = "UPDATE tbl_room SET
             room = :room
             WHERE roomId = :roomId"; 
    $query = $this->db->pdo->prepare($sql);
    $query->bindValue(':room', $room);
    $query->bindValue(':roomId', $roomId);
    $result = $query->execute();
    if ($result) {
      $msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Class Room Updated</div>";
    return $msg;
    }else{
      $msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Class Room Problem!</div>";
    return $msg;
    }
  }

  public function ClassRoomDelete($delId){
    $sql = "DELETE FROM tbl_room WHERE roomId = :delId LIMIT 1";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':delId', $delId);
      $query->execute();
  }

 }	