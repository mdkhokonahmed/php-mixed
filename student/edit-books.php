<?php include_once 'lib/Addlibrarysystem.php';?>
<?php include_once 'lib/Adddepartment.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>

  <?php
      $lib = new Adddlibrary();

        if (!isset($_GET['librId']) || $_GET['librId'] == NULL) {
         header("Location:view-book-list.php");
       }else{
         $librId = $_GET['librId'];
       }
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

       $updatebooks = $lib->BooksUpdate($librId, $_POST);  
      }
    ?>
 <div id="page-wrapper">
  <div class="row">
   <h2 class="text-center">Update Books</h2>
   <h3 class="text-center text-success">
      <?php
           if (isset($updatebooks)) {
           echo $updatebooks;
           }
       ?>
   </h3>
   <div class="container">
  <?php
     $getboos = $lib->GetBooksShowById($librId);
     foreach ($getboos as $showbook) {?>

  <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Subject Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="<?php echo $showbook['subjctname'];?>" name="subjctname">
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
                          if ($showbook['deptId'] == $showdepartment['deptId']) {?>
                         selected = "selected"
                       <?php } ?> value="<?php echo $showdepartment['deptId'];?>"><?php echo $showdepartment['departname'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Author Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="<?php echo $showbook['author'];?>" name="author">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Total Book</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" value="<?php echo $showbook['book'];?>" name="book">
      </div>
    </div
      
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       <input type="submit" name="update" value="Update" class="btn btn-primary">
      </div>
    </div>
  </form>
  <?php } ?>
</div>
</div>
</div>
<?php include_once 'inc/footer.php';?>