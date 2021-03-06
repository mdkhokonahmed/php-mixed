<?php
 $filepath = realpath(dirname(__FILE__));
 include_once $filepath.'/../lib/Session.php';
  Session::init();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
  if (isset($_GET['action']) && $_GET['action'] == "logout") {
     Session::destroy();
  }
?>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">PHP PDO REGISTER & LOGIN SYSTEM</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 
     
      <ul class="nav navbar-nav navbar-right">
        
        <?php
           $id = Session::get("id");
           $userlogin = Session::get("login");
           if ($userlogin == true) {?>
       <li><a href="profile.php?id=<?php echo $id; ?>">Profile</a></li>
        <li><a href="?action=logout">Logout</a></li>
        <?php }else{ ?>
        <li><a href="login.php">Login</a></li> 
        <li><a href="register.php">Register</a></li>
       <?php }?>
       
      
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>