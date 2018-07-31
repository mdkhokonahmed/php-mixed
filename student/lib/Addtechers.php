 <?php include_once 'lib/Database.php';?>
<?php
 class Addtechers{
 	private $db; 

   public function __construct(){
 	 
 	 $this->db = new Database();	

 	}
 	public function InsertTecher($data, $file){
      $name    = $data['name'];
      $address = $data['address'];
      $phone   = $data['phone'];
      $email   = $data['email'];
      $gender  = $data['gender'];

       $permited  = array('jpg', 'jpeg', 'png', 'gif');
       $file_name = $file['file']['name'];
       $file_size = $file['file']['size'];
       $file_temp = $file['file']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;

      if ($name == "" OR $address == "" OR $phone == "" OR $email == "" OR $gender == "" OR $file_name == "") {
      		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
 	 	  return $msg;
      }else{
         move_uploaded_file($file_temp, $uploaded_image);
       $sql = "INSERT INTO tbl_techers (name, address, phone, email, gender, file) VALUES(:name, :address, :phone, :email, :gender, :uploaded_image)";	
 	  $query = $this->db->pdo->prepare($sql);
 	  $query->bindValue(':name', $name);
 	  $query->bindValue(':address', $address);
 	  $query->bindValue(':phone', $phone);
 	  $query->bindValue(':email', $email);
 	  $query->bindValue(':gender', $gender);
     $query->bindValue(':uploaded_image', $uploaded_image);
 	  $result = $query->execute();
 	  if ($result) {
 	  	$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Techers Register</div>";
 	 	return $msg;
 	  }else{
 	  	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Profile Problem!</div>";
 	 	return $msg;
 	  }
 	}
 }

   public function GetShowAllTechers(){
   $sql = "SELECT * FROM tbl_techers ORDER BY tecrId DESC";
    $query = $this->db->pdo->prepare($sql);
    $query->execute();
     $result = $query->fetchAll();
     return $result;
 }
  
  public function GetTecherById($tecrId){
    $sql = "SELECT * FROM tbl_techers WHERE tecrId = :tecrId LIMIT 1";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':tecrId', $tecrId);
     $query->execute();
     $result = $query->fetchAll();
     return $result;
  }

  public function UpdatedTecher($id, $data, $file){
      $name    = $data['name'];
      $address = $data['address'];
      $phone   = $data['phone'];
      $email   = $data['email'];
      $gender  = $data['gender'];

       $permited  = array('jpg', 'jpeg', 'png', 'gif');
       $file_name = $file['file']['name'];
       $file_size = $file['file']['size'];
       $file_temp = $file['file']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;

      if ($name == "" OR $address == "" OR $phone == "" OR $email == "" OR $gender == "") {
            $msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
          return $msg;
      }
      elseif(!empty($file_name)) {
        move_uploaded_file($file_temp, $uploaded_image);
       $sql = "UPDATE tbl_techers SET
                name = :name,
                address = :address,
                phone = :phone,
                email = :email,
                gender = :gender,
                file = :uploaded_image
               WHERE tecrId = :id";
       $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':name', $name);
      $query->bindValue(':address', $address);
      $query->bindValue(':phone', $phone);
      $query->bindValue(':email', $email);
      $query->bindValue(':gender', $gender);
      $query->bindValue(':uploaded_image', $uploaded_image);
      $query->bindValue(':id', $id);
      $result = $query->execute();   
     if ($result) {
      $msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Techers Register Updated</div>";
      return $msg;
     }else{
      $msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Profile Problem not Updated!</div>";
      return $msg;
     }
      }else{

       $sql = "UPDATE tbl_techers SET
                name = :name,
                address = :address,
                phone = :phone,
                email = :email,
                gender = :gender
               WHERE tecrId = :id"; 
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':name', $name);
      $query->bindValue(':address', $address);
      $query->bindValue(':phone', $phone);
      $query->bindValue(':email', $email);
      $query->bindValue(':gender', $gender);
      $query->bindValue(':id', $id);
      $result = $query->execute();        
     if ($result) {
      $msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Techers Register</div>";
      return $msg;
     }else{
      $msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Profile Problem!</div>";
      return $msg;
     } 
      }
  }

  public function TecherDelete($tecrId){
      $sql = "SELECT * FROM tbl_techers WHERE tecrId = :tecrId";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':tecrId', $tecrId);
      $query->execute();
      $result = $query->fetchAll();
     foreach ($result as $delimage) {
       $dellink = $delimage['file'];
       unlink($dellink);
     }
       

      $sql = "DELETE FROM tbl_techers WHERE tecrId = :tecrId LIMIT 1";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':tecrId', $tecrId);
      $query->execute();
  }




 }