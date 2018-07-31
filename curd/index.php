  <?php 
   include 'inc/header.php';
   include 'lib/Database.php';
   include 'lib/Session.php';
   
   ?>
   <?php
      Session::init();
     $msg = Session::get('msg');
     if (!empty($msg)) {
       echo '<h2 class="alert alert-info text-center">'.$msg.'</h2>';
       
     }
   ?>
    	<div class="panel-heading">
    	<h2>Student List<a class="pull-right btn btn-success" href="addstudent.php">Add Student</a></h2>
    	</div>
      <div class="panel-body">
    	<table class="table table-striped">
    		<tr>
             <th>Serial</th>
             <th>Student Name</th>
             <th>Email</th>
             <th>Phone</th>
             <th>Action</th>           
    		</tr>
        <?php
           $db = new Database();
           $table = "tbl_student";
           $order_by = array('order_by'=>'id DESC');
           $studentData = $db->select($table,$order_by);
           if (!empty($studentData)) {
             $i=0;
             foreach ($studentData as $data) { $i++;?>
           
    		<tr>
           <td><?php echo $i;?></td>
           <td><?php echo $data['name'];?></td>
           <td><?php echo $data['email'];?></td>
           <td><?php echo $data['phone'];?></td>
           <td>
             <a class="btn btn-success" href="editstudent.php">Edit</a>
             <a class="btn btn-danger"href="">Delete</a>
           </td>
    		</tr>
         <?php } } ?>
    	</table>
    </div>
  <?php include 'inc/footer.php';?>