<?php include_once 'lib/Adddepartment.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>

  <?php
      $department = new Adddepartment();

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {

       $insertdpt = $department->InsertDepartment($_POST);  
      }
    ?>
 <div id="page-wrapper">
  <div class="row">
   <h2 class="text-center">Add Department</h2>
   <h3 class="text-center text-success">
      <?php
           if (isset($insertdpt)) {
           echo $insertdpt;
           }
       ?>
   </h3>
   <div class="container">
  <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Short Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Short Name" name="departname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Full Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="Enter Full Name" name="subjctname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Department Code</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" placeholder="Enter Department Code" name="code">
      </div>
    </div>
      
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       <input type="submit" name="register" value="Submit" class="btn btn-primary btn-block">
      </div>
    </div>
  </form>
</div>
</div>
</div>
<?php include_once 'inc/footer.php';?>