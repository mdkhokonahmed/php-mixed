<?php include_once 'lib/Adddepartment.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
   $department = new Adddepartment();
   if (isset($_GET['delId'])) {
   	$delId = $_GET['delId'];

   	$delete = $department->DepartmentDelete($delId);
   }
 ?>
 <div id="page-wrapper">
 <h2 class="text-center">View-Department-Details</h2>
 <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>SL</th>
            <th>Short Name</th>
            <th>Full Name</th>
            <th>Department Code</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
          
          $getdepartment = $department->GetShowDepartment();
               $i = 0;
            foreach ($getdepartment as $result) {
          	    $i++;
         ?>
        <tr> 
            <th scope="row"><?php echo $i;?></th>
            <td><?php echo $result['departname'];?></td>
            <td><?php echo $result['subjctname'];?></td>
            <td><?php echo $result['code'];?></td> 
            <td>
                <a href="edit-department.php?deptId=<?php echo $result['deptId'];?>" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="?delId=<?php echo $result['deptId'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td> 
        </tr>
        <?php } ?>
       
    </tbody>
</table>
 </div>

<?php include_once 'inc/footer.php';?>	