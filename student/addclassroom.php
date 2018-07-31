<?php include_once 'lib/ClassRoom.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>

  <?php
      $class = new Classroom();

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

       $insertroom = $class->InsertClassRoom($_POST);  
      }
    ?>
 <div id="page-wrapper">
  <div class="row">
   <h2 class="text-center">Add Class Room</h2>
   <h3 class="text-center text-success">
      <?php
           if (isset($insertroom)) {
           echo $insertroom;
           }
       ?>
   </h3>
   <div class="container">
  <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Room Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Department Name" name="room">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">
      </div>
    </div>
  </form>
</div>
</div>
</div>
<?php include_once 'inc/footer.php';?>