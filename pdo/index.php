<?php include_once 'lib/User.php';?>
<?php include 'inc/header.php';?>
<?php
 Session::checksession();
  $loginmsg = Session::get("loginmsg");
  if (isset($loginmsg)) {
  echo $loginmsg;
  }
  Session::set("loginmsg",NULL);
  
?>
<div class="container">
     <div class="panel panel-default">
   <div class="panel-headeing">
    <h2>User List<span class="pull-right">Welcome!<strong>
     <?php
        $name = Session::get('username');
        if (isset($name)) {
         echo $name;
        }
      ?>
    </strong></span></h2>
   </div>
 </div>   
  <table class="table table-bordered">
    <thead>
      <tr>
         <th>SL</th>
        <th>Name</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
           $user = new User();
           $getshow = $user->getuserdata();
            $i=0;
           foreach ($getshow as $sdata) { 
             $i++;
            ?>

        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $sdata['name'];?></td>
        <td><?php echo $sdata['username'];?></td>
        <td><?php echo $sdata['email'];?></td>
        <td>
         <a class="btn btn-primary" href="profile.php?id=<?php echo $sdata['id'];?>">View</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php include 'inc/footer.php';?>
