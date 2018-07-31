<?php include_once 'lib/Addtechers.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>

  <?php
      $techer = new Addtechers();

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {

       $inserttec = $techer->InsertTecher($_POST, $_FILES);  
      }
    ?>
 <div id="page-wrapper">
  <div class="row">
   <h2 class="text-center">Add Techers</h2>
   <h3 class="text-center text-success">
      <?php
           if (isset($inserttec)) {
           echo $inserttec;
           }
       ?>
   </h3>
   <div class="container">
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Address</label>
      <div class="col-sm-10">          
       <textarea class="form-control" name="address" rows="8"></textarea>
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
      <label class="control-label col-sm-2" for="pwd">Image</label>
      <div class="col-sm-10">          
        <input type="file" class="file" id="pwd"   name="file"  multiple accept="image/*"/>
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