<?php include_once 'lib/User.php';?>
<?php include 'inc/header.php';?>
 <?php 
   $user = new User();
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
     $userregi = $user->RegistionUser($_POST);
   }
  ?>
<div class="container">
     <div class="panel panel-default">
   <div class="panel-headeing">
    <h2 class="text-center">User Registion</h2>
    <?php
      if (isset($userregi)) {
       echo "$userregi";
      }
    ?>
   </div>
 </div>   
  <div class="panel-body">
   <form action="" method="POST">

    <div class="form-group">
      <label for="name">Your Name</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
     </div>
     <div class="form-group">
      <label for="username">Username</label>
      <input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
     </div>
     <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
     </div>
     <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
     </div>
   <div class="form-group">
      
      <input type="submit" name="register" value="Submit" class="btn btn-success">
     
     </div>
   </form>

  </div>
</div>
<?php include 'inc/footer.php';?>
