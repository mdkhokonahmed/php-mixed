<?php include_once 'lib/ClassRuting.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
  $ruting = new Classrouting();
   if (isset($_GET['delId'])) {
   	$delId = $_GET['delId'];

   	$delete = $ruting->ClassRutingDelete($delId);
   }
 ?>
 <div id="page-wrapper">
 <h2 class="text-center">View-Class-Routing</h2>
 <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>SL</th>
            <th>Time</th>
            <th>Department</th>
            <th>Semester</th>
            <th>Techer Name</th>
            <th>Subject Name</th>
            <th>Class Room Number</th>
            <th>Day</th>
            <th>Techers Phone Number</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
          
          $getruting = $ruting->GetShowAllRouting();
          $i = 0;
          foreach ($getruting as $result) {
          	$i++;
         ?>
        <tr> 
            <th scope="row"><?php echo $i;?></th>
            <td><?php echo $result['datetime'];?></td>
            <td><?php echo $result['departname'];?></td>
            <td><?php echo $result['semt'];?></td> 
            <td><?php echo $result['name'];?></td>
            <td><?php echo $result['subject'];?></td>
            <td><?php echo $result['room'];?></td>
            <td><?php echo $result['daywek'];?></td>
            <td><?php echo $result['phone'];?></td>
            <td>
                <a href="edit-class-routing.php?rutingId=<?php echo $result['rutingId'];?>" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="?delId=<?php echo $result['rutingId'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>

               
            </td> 
        </tr>
        <?php } ?>
       
    </tbody>
</table>

 </div>

<?php include_once 'inc/footer.php';?>	