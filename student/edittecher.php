<?php include_once 'lib/Addtechers.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>

  <?php
      $techer = new Addtechers();

         if (!isset($_GET['id']) || $_GET['id'] == NULL) {
         header("Location:techers-view.php");
      }else{
        $id = $_GET['id'];
      }
         
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {

       $updatedttec = $techer->UpdatedTecher($id, $_POST, $_FILES);  
      }
    ?>
 <div id="page-wrapper">
  <div class="row">
   <h2 class="text-center">Update Techers</h2>
   <h3 class="text-center text-success">
      <?php
           if (isset($updatedttec)) {
           echo $updatedttec;
           }
       ?>
   </h3>
   <div class="container">
    <?php 
         $gettecher = $techer->GetTecherById($id);
         foreach ($gettecher as $result) {?>
      
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="<?php echo $result['name'];?>" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Address</label>
      <div class="col-sm-10">          
       <textarea class="form-control" name="address" rows="8"><?php echo $result['address'];?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Phone</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" value="<?php echo $result['phone'];?>" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Email</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" id="pwd" value="<?php echo $result['email'];?>" name="email">
      </div>
    </div>
       <div class="form-group">
                <label for="inputPassword3" class="control-label col-sm-2">Gender</label>
                <div class="col-sm-10">
                    <select class="form-control" name="gender">
                        <option>Select Gender</option>
                         <?php
                             if ($result['gender'] == 'male') { ?>
                               <option selected="selected" value="male">Male</option>
                                <option value="female">Female</option> 
                         <?php } else{ ?> 
                        <option selected="selected" value="female">Female</option> 
                        <option value="male">Male</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Image</label>
      <div class="col-sm-10">  
          <img src="<?php echo $result['file'];?>" height="150px" width="200px"/>        
        <input type="file" class="file" id="pwd"   name="file"  multiple accept="image/*"/>
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