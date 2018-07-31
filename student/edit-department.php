<?php include_once 'lib/Adddepartment.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>

  <?php
      $department = new Adddepartment();

       if (!isset($_GET['deptId']) || $_GET['deptId'] == NULL) {
         header("Location:view-department.php");
       }else{
         $deptId = $_GET['deptId'];
       }

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

       $updatedpt = $department->UpdateDepartment($deptId, $_POST);  
      }
    ?>
 <div id="page-wrapper">
  <div class="row">
   <h2 class="text-center">Updated Department</h2>
   <h3 class="text-center text-success">
      <?php
           if (isset($updatedpt)) {
           echo $updatedpt;
           }
       ?>
   </h3>
   <div class="container">
    <?php
          $getdepartment = $department->DepartmentById($deptId);
          foreach ($getdepartment as $result) {?>
      
  <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Short Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="<?php echo $result['departname'];?>" name="departname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Full Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="<?php echo $result['subjctname'];?>" name="subjctname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Department Code</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" value="<?php echo $result['code'];?>" name="code">
      </div>
    </div>
      
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       <input type="submit" name="update" value="Update" class="btn btn-primary btn-block">
      </div>
    </div>
  </form>
  <?php } ?>
</div>
</div>
</div>
<?php include_once 'inc/footer.php';?>