 <?php include_once 'lib/Database.php';?>
<?php
 class Adminlogin{
 	private $db; 

   public function __construct(){
 	 
 	 $this->db = new Database();	

 	}

 	public function LoginAdmin($data){	
 	 $email    = $data['email'];	
 	 $password = md5($data['password']);	
      
     if (empty($email) OR empty($password)) {
       $msg = "<div class='alert alert-danger'><strong>Error !</strong>Username or Password must be empty</div>";
 	 	return $msg;
       }

       $sql = "SELECT * FROM tbl_user WHERE email = :email AND password = :password";
       $query = $this->db->pdo->prepare($sql);
       $query->bindValue(':email', $email);
       $query->bindValue(':password', $password);
       $query->execute();
 	   if ($query->rowCount() > 0) {
 	   $result = $query->fetch(PDO::FETCH_OBJ);
 	    	Session::init();
        Session::set("login", true);
        Session::set("id", $result->id);
        Session::set("username", $result->username);
            header("Location:index.php");
 	   }else{
 	   	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Data not found</div>";
 	 	       return $msg;
 	   }

        } 



 }
