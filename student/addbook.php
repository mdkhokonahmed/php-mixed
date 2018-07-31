<?php include_once 'lib/Addlibrarysystem.php';?>
<?php include_once 'lib/Adddepartment.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>

  <?php
      $lib = new Adddlibrary();
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

       $inserbooks = $lib->BooksInsert($_POST);  
      }
    ?>
 <div id="page-wrapper">
  <div class="row">
   <h2 class="text-center">Add Books</h2>
   <h3 class="text-center text-success">
      <?php
           if (isset($inserbooks)) {
           echo $inserbooks;
           }
       ?>
   </h3>
   <div class="container">
  <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Subject Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="Enter Subject Name" name="subjctname">
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
                            
                       <option value="<?php echo $showdepartment['deptId'];?>"><?php echo $showdepartment['departname'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Author Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="Enter Author Name" name="author">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Total Book</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" placeholder="Enter Total Books" name="book">
      </div>
    </div
      
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       <input type="submit" name="submit" value="Submit" class="btn btn-primary">
      </div>
    </div>
  </form>
</div>
</div>
</div>
<?php include_once 'inc/footer.php';?>