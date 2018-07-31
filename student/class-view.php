<?php include_once 'lib/ClassRoom.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
   $class = new Classroom();
    if (isset($_GET['delId'])) {
    $delId = $_GET['delId'];

    $delete = $class->ClassRoomDelete($delId);
   }
 ?>
 <div id="page-wrapper">
 <h2 class="text-center">View-Student</h2>
 <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>SL</th>
            <th>Room Number</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
          
          $getroom = $class->GetShowClassRoom();
          $i = 0;
          foreach ($getroom as $result) {
          	$i++;
         ?>
        <tr> 
            <th scope="row"><?php echo $i;?></th>
            <td><?php echo $result['room'];?></td>
            <td>
                <a href="edit-class-room.php?roomId=<?php echo $result['roomId'];?>" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="?delId=<?php echo $result['roomId'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td> 
        </tr>
        <?php } ?>
       
    </tbody>
</table>
 </div>

<?php include_once 'inc/footer.php';?>	