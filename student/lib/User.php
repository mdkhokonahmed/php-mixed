 <?php include 'lib/Database.php';?>
<?php
 class User{
 	private $db; 

   public function __construct(){
 	 
 	 $this->db = new Database();	

 	}

 	public function RegistionUser($data){
 	 $name     = $data['name'];
 	 $username = $data['username'];	
 	 $email    = $data['email'];	
 	 $password = md5($data['password']);
 	 $chk_email = $this->emailCheck($email);
 	 if ($name == "" OR $username == "" OR $email == "" OR $password == "") {
 	 	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed Must be empty</div>";
 	 	return $msg;
 	 	}

 	   if (filter_var($email, FILTER_VALIDATE_EMAIL === false )) {
 	   	$msg = "<div class='alert alert-danger'><strong>Error !</strong>The email Address is not Valid</div>";
 	 	return $msg;
 	   	}	

 	   	if ($chk_email == true) {
 	   	$msg = "<div class='alert alert-danger'><strong>Error !</strong>The email Address Alreday Exit</div>";
 	 	return $msg;
 	   	} 
 	   	

 	  $sql = "INSERT INTO tbl_register (name, username, email, password) VALUES(:name, :username, :email, :password)";	
 	  $query = $this->db->pdo->prepare($sql);
 	  $query->bindValue(':name', $name);
 	  $query->bindValue(':username', $username);
 	  $query->bindValue(':email', $email);
 	  $query->bindValue(':password', $password);
 	  $result = $query->execute();
 	  if ($result) {
 	  	$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Register</div>";
 	 	return $msg;
 	  }else{
 	  	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Problem!</div>";
 	 	return $msg;
 	  }

 	}

 	public function emailCheck($email){
     $sql = "SELECT email FROM tbl_register WHERE email = :email";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':email', $email);
      $query->execute();
     if ($query->rowCount() > 0) {
     	return true;
     } else {
     	return false;
     }
     
 	}

 public function getLoginUser($email,$password){
 	$sql = "SELECT * FROM tbl_register WHERE email = :email AND password = :password LIMIT 1";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':email', $email);
     $query->bindValue(':password', $password);
     $query->execute();
     $result = $query->fetch(PDO::FETCH_OBJ);
     return $result;
 }

 public function LoginUser($data){
 	 $email    = $data['email'];	
 	 $password = md5($data['password']);
 	 $chk_email = $this->emailCheck($email);
 	 if ($email == "" OR $password == "") {
 	 	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed Must be empty</div>";
 	 	return $msg;
 	 	}

    
 	   if (filter_var($email, FILTER_VALIDATE_EMAIL === false )) {
 	   	$msg = "<div class='alert alert-danger'><strong>Error !</strong>The email Address is not Valid</div>";
 	 	return $msg;
 	   	}	

 	   	if ($chk_email == false) {
 	   	$msg = "<div class='alert alert-danger'><strong>Error !</strong>The email Address Alreday Exit</div>";
 	 	return $msg;
 	   	} 

 	   $result = $this->getLoginUser($email,$password);
         if ($result) {
         	Session::init();
         	Session::set("login", true);
         	Session::set("id", $result->id);
            Session::set("name", $result->name);
            Session::set("username", $result->username);
            Session::set("loginmsg", "<div class='alert alert-success'><strong>Success !</strong>You are login</div>");
            header("Location:index.php");

         } else {
         	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Data not found</div>";
 	 	       return $msg;
         }
     }

        public function getuserdata(){
         $sql = "SELECT * FROM tbl_register ORDER BY id DESC";
         $query = $this->db->pdo->prepare($sql);
         $query->execute();
         $result = $query->fetchAll();
         return $result;
        } 
         
 	   	public function getUserById($userid){
          $sql = "SELECT * FROM tbl_register WHERE id = :id LIMIT 1";
         $query = $this->db->pdo->prepare($sql);
         $query->bindValue(':id', $userid);
         $query->execute();
         $result = $query->fetchAll();
         return $result;  
        }

        public function ProfileUser($id,$data){
      $name     = $data['name'];
      $username = $data['username']; 
      $email    = $data['email'];    
     if ($name == "" OR $username == "" OR $email == "") {
        $msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed Must be empty</div>";
        return $msg;
        }

      $sql = "UPDATE tbl_register set
                 name = :name,
                 username = :username,
                 email = :email
            WHERE id = :id";  
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':name', $name);
      $query->bindValue(':username', $username);
      $query->bindValue(':email', $email);
      $query->bindValue(':id', $id);
      $result = $query->execute();
      if ($result) {
        $msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Profile Updated</div>";
        return $msg;
      }else{
        $msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Profile Updated Problem!</div>";
        return $msg;
      }
        }



 }
?>