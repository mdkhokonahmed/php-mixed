 <?php include_once 'lib/Database.php';?>
<?php
 class Classrouting{
 	private $db; 

   public function __construct(){
 	 
 	 $this->db = new Database();	

 	}

 	public function InsertClassRuting($data){
      $datetime = $data['datetime'];
      $deptId   = $data['deptId'];
      $semt     = $data['semt'];
      $tecrId   = $data['tecrId'];
      $subject  = $data['subject'];
      $roomId   = $data['roomId'];
      $daywek   = $data['daywek'];
      $phone    = $data['phone'];
      if ($datetime == "" OR $deptId == "" OR $semt == "" OR $tecrId == "" OR $subject == "" OR $roomId == "" OR $daywek == "" OR $phone == "") {
      		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
 	 	  return $msg;
      }

     $sql = "INSERT INTO tbl_ruting (datetime, deptId, semt, tecrId, subject, roomId, daywek, phone) VALUES(:datetime, :deptId, :semt, :tecrId, :subject, :roomId, :daywek, :phone)";	
 	  $query = $this->db->pdo->prepare($sql);
 	  $query->bindValue(':datetime', $datetime);
 	  $query->bindValue(':deptId', $deptId);
 	  $query->bindValue(':semt', $semt);
 	  $query->bindValue(':tecrId', $tecrId);
 	  $query->bindValue(':subject', $subject);
 	  $query->bindValue(':roomId', $roomId);
 	  $query->bindValue(':daywek', $daywek);
 	  $query->bindValue(':phone', $phone);
 	  $result = $query->execute();
 	  if ($result) {
 	  	$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Class Ruting Register</div>";
 	 	return $msg;
 	  }else{
 	  	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Problem!</div>";
 	 	return $msg;
 	  }
 	}

    public function GetShowAllRouting(){
      $sql = "SELECT  tbl_ruting.*, tbl_department.departname, tbl_techers.name, tbl_room.room
            FROM tbl_ruting
            INNER JOIN tbl_department
            ON tbl_ruting.deptId = tbl_department.deptId
            INNER JOIN tbl_techers
            ON tbl_ruting.tecrId = tbl_techers.tecrId
            INNER JOIN tbl_room
            ON tbl_ruting.roomId = tbl_room.roomId
             
       ORDER BY tbl_ruting.rutingId DESC";
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
        return $result;
    }

    public function GetRutingById($rutingId){
      $sql = "SELECT * FROM tbl_ruting WHERE rutingId = :rutingId LIMIT 1";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':rutingId', $rutingId);
     $query->execute();
     $result = $query->fetchAll();
     return $result;
    }

    public function UpdatedClassRuting($rutingId, $data){
      $datetime = $data['datetime'];
      $deptId   = $data['deptId'];
      $semt     = $data['semt'];
      $tecrId   = $data['tecrId'];
      $subject  = $data['subject'];
      $roomId   = $data['roomId'];
      $daywek   = $data['daywek'];
      $phone    = $data['phone'];
      if ($datetime == "" OR $deptId == "" OR $semt == "" OR $tecrId == "" OR $subject == "" OR $roomId == "" OR $daywek == "" OR $phone == "") {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
        return $msg;
      }

      $sql = "UPDATE tbl_ruting SET
             datetime = :datetime,
             deptId   = :deptId,
             semt     = :semt,
             tecrId   = :tecrId,
             subject  = :subject,
             roomId   = :roomId,
             daywek   = :daywek,
             phone    = :phone
       WHERE rutingId = :rutingId";
      $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':datetime', $datetime);
     $query->bindValue(':deptId', $deptId);
     $query->bindValue(':semt', $semt);
     $query->bindValue(':tecrId', $tecrId);
     $query->bindValue(':subject', $subject);
     $query->bindValue(':roomId', $roomId);
     $query->bindValue(':daywek', $daywek);
     $query->bindValue(':phone', $phone);
     $query->bindValue(':rutingId', $rutingId);
     $result = $query->execute();
     if ($result) {
          $msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Class Ruting Updated</div>";
      return $msg;
     }else{
      $msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Problem!</div>";
      return $msg;
     }
    }

    public function ClassRutingDelete($delId){
      $sql = "DELETE FROM tbl_ruting WHERE rutingId = :delId LIMIT 1";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':delId', $delId);
      $query->execute();
    }



 }