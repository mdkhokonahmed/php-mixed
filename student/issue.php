<?php include_once 'lib/Issuesystem.php';?>
<?php include_once 'lib/Addlibrarysystem.php';?>
<?php include_once 'lib/Adddepartment.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>

  <?php
      $issue = new Issuesystem();
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

       $inserbooks = $issue->StudentbookInsert($_POST);  
      }
    ?>
 <div id="page-wrapper">
  <div class="row">
   <h2 class="text-center">Issue Book</h2>
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
      <label class="control-label col-sm-2" for="pwd">Student Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="Enter Student Name" name="studname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Roll/ID</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="Enter Rool/Id" name="stdroll">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Phone No</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" placeholder="Enter Phone number" name="phone">
      </div>
    </div>
      <div class="form-group">
                <label for="inputPassword3" class="control-label col-sm-2">Department Name</label>
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
                <label for="inputPassword3" class="control-label col-sm-2">Book Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="librId">
                        <option>Select Your book</option>
                        <?php
                             $lib = new Adddlibrary();
                            $getbook = $lib->GetShowAllBookslist();
                             foreach ($getbook as $showbbook) {?>
                            
                       <option value="<?php echo $showbbook['librId'];?>"><?php echo $showbbook['subjctname'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Today Date</label>
      <div class="col-sm-10">        
         <?php 
            date_default_timezone_set('Asia/Dhaka'); 
           ?>  
        <input type="text" class="form-control" id="pwd" value="<?php echo date("d-m-Y");?>" readonly="" name="tddate">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Return Date</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="Enter Return Date" name="rutndate">
      </div>
    </div>
      
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