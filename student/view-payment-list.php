<?php include_once 'lib/Paymentsystem.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
  $payment = new Paymentsystem();
   if (isset($_GET['delId'])) {
   	$delId = $_GET['delId'];

   	$delete = $payment->PaymentgDelete($delId);
   }
 ?>
 <div id="page-wrapper">
 <h2 class="text-center">View-Payment-List</h2>
 <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Department</th>
            <th>Rool/ID</th>
            <th>Total Tk</th>
            <th>Payment</th>
            <th>Due Tk</th>
            <th>Due Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
          
          $getpayment = $payment->GetShowAllPayment();
          $i = 0;
          foreach ($getpayment as $result) {
          	$i++;
         ?>
        <tr> 
            <th scope="row"><?php echo $i;?></th>
            <td><?php echo $result['name'];?></td>
            <td><?php echo $result['departname'];?></td>
            <td><?php echo $result['stdid'];?></td> 
            <td><?php echo $result['total'];?></td>
            <td><?php echo $result['payment'];?></td>
            <td><?php echo $result['duetk'];?></td>
            <td><?php echo $result['duedate'];?></td>
            <td>
                <a href="edit-payment.php?payId=<?php echo $result['payId'];?>" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="?delId=<?php echo $result['payId'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
                 <a href="view-payment.php?viwId=<?php echo $result['payId'];?>" class="btn btn-primary">
                    <span class="glyphicon glyphicon-check"></span>
                </a>
               
            </td> 
        </tr>
        <?php } ?>
       
    </tbody>
</table>

 </div>

<?php include_once 'inc/footer.php';?>	