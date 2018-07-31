<?php include_once 'lib/Adddepartment.php';?>
<?php include_once 'lib/StudentAddDetalies.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
   <?php
      $student = new StudentAddDetalies();
        if (!isset($_GET['studetId']) || $_GET['studetId'] == NULL) {
         header("Location:student-view.php");
       }else{
         $studetId = $_GET['studetId'];
       }
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {

       $updatestd = $student->UpdatedStudent($studetId, $_POST);  
      }
    ?>
 <div id="page-wrapper">
  <div class="row">
   <h2 class="text-center">Update-Student</h2>
   <h3 class="text-center text-success">
     <?php
       if (isset($updatestd)) {
         echo $updatestd;
       }
      ?>
   </h3>
   <div class="container">
           <?php
           $getstd = $student->GetStudentById($studetId);
            foreach ($getstd as $departById) {?>
           
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
                            
                       <option 
                        <?php
                          if ($departById['deptId'] == $showdepartment['deptId']) { ?>
                            selected="selected"
                      <?php } ?> value="<?php echo $showdepartment['deptId'];?>"><?php echo $showdepartment['departname'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="<?php echo $departById['name'];?>" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">ROll/ID</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="<?php echo $departById['stduid'];?>" name="stduid">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="name">Semester</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="<?php echo $departById['semt'];?>" name="semt">
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="date">Date Of Bath</label>
      <div class="col-sm-10">          
       <input type="text" class="form-control" id="date" name="datetime" value="<?php echo $departById['datetime'];?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Phone</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" value="<?php echo $departById['phone'];?>" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Email</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" id="pwd" value="<?php echo $departById['email'];?>" name="email">
      </div>
    </div>
      <div class="form-group">
                <label for="inputPassword3" class="control-label col-sm-2">Gender</label>
                <div class="col-sm-10">
                    <select class="form-control" name="gender">
                        <option>Select Gender</option>
                         <?php 
                            if ($departById['gender'] == 'male') {?>
                             <option selected="selected" value="male">Male</option>
                           <option value="female">Female</option>
                          <?php } else{ ?>
                          <option selected="selected" value="female">Female</option>
                          <option value="male">Male</option>
                         <?php  } ?>
                         
                    </select>
                </div>
            </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Guardian Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" value="<?php echo $departById['gardname'];?>" name="gardname">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Guardian Phone</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" value="<?php echo $departById['garphone'];?>" name="garphone">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Address</label>
      <div class="col-sm-10">          
       <textarea class="form-control" name="address" rows="5"><?php echo $departById['address'];?></textarea>
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       <input type="submit" name="register" value="Submit" class="btn btn-primary btn-block">
      </div>
    </div>
  </form>
  <?php } ?>
</div>
</div>
</div>

 <?php include_once 'inc/footer.php';?>