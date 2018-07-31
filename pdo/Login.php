<?php include_once 'lib/User.php';?>
<?php include 'inc/header.php';?>
 <?php 
    Session::checklogin();
   $user = new User();
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
     $userlogin = $user->LoginUser($_POST);
   }
  ?>
<div class="container">
     <div class="panel panel-default">
   <div class="panel-headeing">
    <h2 class="text-center">User Login</h2>
   </div>
 </div>   
  <div class="panel-body">
   <form action="" method="POST">
     <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
     </div>
     <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
     </div>

      <div class="form-group">
     <input type="submit" name="login" value="Login" class="btn btn-success">
   </div>
   
   </form>
  </div>
</div>
<?php include 'inc/footer.php';?>
