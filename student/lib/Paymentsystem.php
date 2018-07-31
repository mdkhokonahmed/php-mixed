 <?php include_once 'lib/Database.php';?>
<?php
 class Paymentsystem{
 	private $db; 

   public function __construct(){
 	 
 	 $this->db = new Database();	

 	}

 	public function InsertPayment($data){
       $stdid = $data['stdid'];
       $toddate = $data['toddate'];
       $name = $data['name'];
       $deptId = $data['deptId'];
       $month = $data['month'];
       $monthrate = $data['monthrate'];
       $total = $data['total'];
       $payment = $data['payment'];
       $description = $data['description'];
       $subtotal = $data['subtotal'];
       $duetk = $data['duetk'];
       $mode = $data['mode'];
       $duedate = $data['duedate'];

       if ($stdid == "" || $toddate == "" || $name == "" || $deptId == "" || $month == "" || $monthrate == "" || $total == "" || $payment == "" || $description == "" || $subtotal == "" || $duetk == "" || $mode == "" || $duedate == "") {
       		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
 	 	    return $msg;
       }


      $sql = "INSERT INTO tbl_payment (stdid, toddate, name, deptId, month, monthrate, total, payment, description, subtotal, duetk, mode, duedate) VALUES(:stdid, :toddate, :name, :deptId, :month, :monthrate, :total, :payment, :description, :subtotal, :duetk, :mode, :duedate)";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':stdid', $stdid);
 	  $query->bindValue(':toddate', $toddate);
 	  $query->bindValue(':name', $name);
 	  $query->bindValue(':deptId', $deptId);
 	  $query->bindValue(':month', $month);
 	  $query->bindValue(':monthrate', $monthrate);
 	  $query->bindValue(':total', $total);
 	  $query->bindValue(':payment', $payment);
 	  $query->bindValue(':description', $description);
 	  $query->bindValue(':subtotal', $subtotal);
 	  $query->bindValue(':duetk', $duetk);
 	  $query->bindValue(':mode', $mode);
 	  $query->bindValue(':duedate', $duedate);
 	  $result = $query->execute();
 	   if ($result) {
 	  	$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Payment Successfully</div>";
 	 	return $msg;
 	  }else{
 	  	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Problem!</div>";
 	 	return $msg;
 	  }

 	}
   
    public function GetShowAllPayment(){
    $sql = "SELECT tbl_payment .*, tbl_department.departname 
 	   FROM tbl_payment
 	  INNER JOIN tbl_department
 	  ON tbl_payment.deptId = tbl_department.deptId
 	  ORDER BY tbl_payment.payId DESC";
    $query = $this->db->pdo->prepare($sql);
    $query->execute();
     $result = $query->fetchAll();
     return $result;
    }

    public function GetPaymentById($payId){
    $sql = "SELECT * FROM tbl_payment WHERE payId = :payId LIMIT 1";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':payId', $payId);
     $query->execute();
     $result = $query->fetchAll();
     return $result;
    }

     public function UpdatePayment($payId, $data){
             $stdid = $data['stdid'];
       $toddate = $data['toddate'];
       $name = $data['name'];
       $deptId = $data['deptId'];
       $month = $data['month'];
       $monthrate = $data['monthrate'];
       $total = $data['total'];
       $payment = $data['payment'];
       $description = $data['description'];
       $subtotal = $data['subtotal'];
       $duetk = $data['duetk'];
       $mode = $data['mode'];
       $duedate = $data['duedate'];

       if ($stdid == "" || $toddate == "" || $name == "" || $deptId == "" || $month == "" || $monthrate == "" || $total == "" || $payment == "" || $description == "" || $subtotal == "" || $duetk == "" || $mode == "" || $duedate == "") {
       		$msg = "<div class='alert alert-danger'><strong>Error !</strong>Filed must be empty</div>";
 	 	    return $msg;
       }


      $sql = "UPDATE tbl_payment SET
      			stdid = :stdid,
      			toddate = :toddate,
      			name = :name,
      			deptId = :deptId,
      			month = :month,
      			monthrate = :monthrate,
      			total = :total,
      			payment = :payment,
      			description = :description,
      			subtotal = :subtotal,
      			duetk = :duetk,
      			mode = :mode,
      			duedate = :duedate
      			WHERE payId = :payId";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':stdid', $stdid);
 	  $query->bindValue(':toddate', $toddate);
 	  $query->bindValue(':name', $name);
 	  $query->bindValue(':deptId', $deptId);
 	  $query->bindValue(':month', $month);
 	  $query->bindValue(':monthrate', $monthrate);
 	  $query->bindValue(':total', $total);
 	  $query->bindValue(':payment', $payment);
 	  $query->bindValue(':description', $description);
 	  $query->bindValue(':subtotal', $subtotal);
 	  $query->bindValue(':duetk', $duetk);
 	  $query->bindValue(':mode', $mode);
 	  $query->bindValue(':duedate', $duedate);
 	  $query->bindValue(':payId', $payId);
 	  $result = $query->execute();
 	   if ($result) {
 	  	$msg = "<div class='alert alert-success'><strong>Success !</strong>Thank You, You have been Payment Updated</div>";
 	 	return $msg;
 	  }else{
 	  	$msg = "<div class='alert alert-danger'><strong>Error !</strong>Sorry You have been Problem!</div>";
 	 	return $msg;
 	  }

     }

    public function PaymentgDelete($delId){
     $sql = "DELETE FROM tbl_payment WHERE payId = :delId LIMIT 1";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':delId', $delId);
      $query->execute();	
    } 


   public function GetShowPaymentViewId($viwId){
      $sql = "SELECT * FROM tbl_payment WHERE payId = :viwId LIMIT 1";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':viwId', $viwId);
     $query->execute();
     $result = $query->fetchAll();
     return $result;
   } 



 }
 	