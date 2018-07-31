<?php include_once 'lib/StudentAddDetalies.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
   $student = new StudentAddDetalies();
    if (isset($_GET['delId'])) {
    $delId = $_GET['delId'];

    $delete = $student->StudentDelete($delId);

      if (!isset($_GET['search']) || $_GET['search'] == NULL) {
         header("Location:student-view.php");
       }else{
         $search = $_GET['search'];
       }
   }
 ?>


 <div id="page-wrapper">
 <h2 class="text-center">View-Student</h2>
 <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th width="5%">SL</th>
            <th width="5%">Department</th>
            <th width="5%">Semester</th>
            <th width="15%">Name</th>
            <th width="5%">Date Of Bath</th>
            <th width="10%">Phone</th>
            <th width="15%">Eamil</th>
            <th width="5%">Gender</th>
            <th width="5%">Guardian Name</th>
            <th width="10%">Guardian Phone</th>
            <th width="10%">Address</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
          $search = "";
          $getstudent = $student->GetShowStudentsearch($search);
         
            if ($getstudent) {
              $i = 0;
              while ($result = $getstudent->fetch()) { 
             
            $i++;
         ?>
        <tr> 
            <th scope="row"><?php echo $i;?></th>
            <td><?php echo $result['departname'];?></td>
            <td><?php echo $result['semt'];?></td>
            <td><?php echo $result['name'];?></td>
            <td><?php echo $result['datetime'];?></td>
            <td><?php echo $result['phone'];?></td>
            <td><?php echo $result['email'];?></td> 
            <td><?php echo $result['gender'];?></td>
            <td><?php echo $result['gardname'];?></td>
            <td><?php echo $result['garphone'];?></td>
            <td><?php echo $result['address'];?></td>
            <td>
                <a href="edit-student.php?studetId=<?php echo $result['studetId'];?>" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="?delId=<?php echo $result['studetId'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td> 
        </tr>
        <?php } }?>
       
    </tbody>
</table>
</div>  

<?php include_once 'inc/footer.php';?>  