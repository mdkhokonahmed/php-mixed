<?php include_once 'lib/Adddepartment.php';?>
<?php include_once 'lib/StudentAddDetalies.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
   <?php

      $student = new StudentAddDetalies();

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {

       $insertstd = $student->InsertStudent($_POST);  
      }
    ?>
 <div id="page-wrapper">
  <div class="row">
   <h2 class="text-center">Add Student</h2>
   <h3 class="text-center text-success">
     <?php
       if (isset($insertstd)) {
         echo $insertstd;
       }
      ?>
   </h3>
   <div class="container">
  <form class="form-horizontal" action="" method="POST">
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
      <label class="control-label col-sm-2" for="name">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">ROll/ID</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Roll & ID" name="stduid">
     
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="name">Semester</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Semester" name="semt">
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="datepicker">Date Of Bath</label>
      <div class="col-sm-10">          
       <input type="text" class="form-control" id="datepicker" name="datetime" placeholder="MM/DD/YYY" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Phone</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" placeholder="Enter Phone" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Email</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" id="pwd" placeholder="Enter Email" name="email">
      </div>
    </div>
      <div class="form-group">
                <label for="inputPassword3" class="control-label col-sm-2">Gender</label>
                <div class="col-sm-10">
                    <select class="form-control" name="gender">
                        <option>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option> 
                    </select>
                </div>
            </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Guardian Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="Enter Name" name="gardname">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Guardian Phone</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" placeholder="Enter Phone" name="garphone">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Address</label>
      <div class="col-sm-10">          
       <textarea class="form-control" name="address" rows="5"></textarea>
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