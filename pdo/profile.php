<?php include_once 'lib/User.php';?>
<?php include 'inc/header.php';?>
 <?php 
   Session::checksession();
   $user = new User();
   if (isset($_GET['id'])) {
    $userid = (int)$_GET['id'];
   }

     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
     $userprofile = $user->ProfileUser($userid,$_POST);
   }
  ?>
<div class="container">
     <div class="panel panel-default">
   <div class="panel-headeing">
    <h2>User Profile<span class="pull-right"><a class="btn btn-primary" href="index.php">Back</a></span></h2>
    <?php
     if (isset($userprofile)) {
       echo "$userprofile";
     }
    ?>
   </div>
 </div>   
  <div class="panel-body">
    <?php 
       $getuser = $user->getUserById($userid);
       foreach ($getuser as $getuser ) {?>
      
      <form action="" method="POST">
    <div class="form-group">
      <label for="name">Your Name</label>
      <input type="name" class="form-control" id="name" value="<?php echo $getuser['name'];?>" name="name">
     </div>
     <div class="form-group">
      <label for="username">Username</label>
      <input type="username" class="form-control" id="username" value="<?php echo $getuser['username'];?>" name="username">
     </div>
     <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" id="email" value="<?php echo $getuser['email'];?>" name="email">
     </div>
     
   <div class="form-group">
      <?php 
          $sesId = Session::get("id");
          if ($userid == $sesId) {?>
            
       
      <input type="submit" name="update" value="Update" class="btn btn-success">
     <?php } ?>
     </div>
   </form>
   <?php } ?>

  </div>
</div>
<?php include 'inc/footer.php';?>
