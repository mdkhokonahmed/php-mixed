<?php include_once 'lib/Paymentsystem.php';?>
<?php include_once 'lib/Adddepartment.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
  $payment = new Paymentsystem();

     if (!isset($_GET['viwId']) || $_GET['viwId'] == NULL) {
         header("Location:view-payment-list.php");
       }else{
         $viwId = $_GET['viwId'];
       }
   
 ?>
 <div id="page-wrapper">
 <h2 class="text-center">Student-View-Payment</h2>
<div class="container">
  <?php 
          $getpayment = $payment->GetShowPaymentViewId($viwId);
          foreach ($getpayment as $result) { ?>
    
  <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="<?php echo $result['name'];?>" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Rool/ID</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="<?php echo $result['stdid'];?>" name="stdid">
      </div>
    </div>
          <div class="form-group">
                <label for="inputPassword3" class="control-label col-sm-2">Department</label>
                <div class="col-sm-10">
                    <select class="form-control" name="deptId">
                        <option>Select Your Department</option>
                        <?php
                             $department = new Adddepartment();
                            $getdept = $department->GetShowDepartment();
                             foreach ($getdept as $showdepartment) {?>
                            
                       <option 
                        <?php
                          if ($result['deptId'] == $showdepartment['deptId']) { ?>
                            selected="selected"
                      <?php } ?> value="<?php echo $showdepartment['deptId'];?>"><?php echo $showdepartment['departname'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Month</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="<?php echo $result['month'];?>" name="month">
      </div>
    </div>

      <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Month Rate</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="<?php echo $result['monthrate'];?>" name="monthrate">
      </div>
    </div>
      
        <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Total Tk</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="<?php echo $result['total'];?>" name="total">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Payment Tk</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="<?php echo $result['payment'];?>" name="payment">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Due Tk</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="<?php echo $result['duetk'];?>" name="duetk">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Due Date</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="<?php echo $result['duedate'];?>" name="duedate">
      </div>
    </div>
  </form>
  <?php } ?>
</div>
  <div class=text-center>
 <a class="btn btn-primary" href="view-payment-list.php">View-payment-list</a>
  </div>
 </div>

<?php include_once 'inc/footer.php';?>	