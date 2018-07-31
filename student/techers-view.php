<?php include_once 'lib/Addtechers.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
  $techer = new Addtechers();
   if (isset($_GET['delId'])) {
   	$delId = $_GET['delId'];

   	$delete = $techer->TecherDelete($delId);
   }
 ?>
 <div id="page-wrapper">
 <h2 class="text-center">View-Techers</h2>
 <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
          
          $gettecher = $techer->GetShowAllTechers();
          $i = 0;
          foreach ($gettecher as $result) {
          	$i++;
         ?>
        <tr> 
            <th scope="row"><?php echo $i;?></th>
            <td><?php echo $result['name'];?></td>
            <td><?php echo $result['address'];?></td>
            <td><?php echo $result['phone'];?></td> 
            <td><?php echo $result['email'];?></td>
            <td><?php echo $result['gender'];?></td>
            <td><img src="<?php echo $result['file'];?>" height="100px" width="120px"/></td>
            <td>
                <a href="edittecher.php?id=<?php echo $result['tecrId'];?>" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="?delId=<?php echo $result['tecrId'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>

               
            </td> 
        </tr>
        <?php } ?>
       
    </tbody>
</table>
 </div>

<?php include_once 'inc/footer.php';?>	