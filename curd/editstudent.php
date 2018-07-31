<?php include 'inc/header.php';?>
<div class="panel-heading">
  <h2>Update Student<a class="pull-right" href="index.php">Back</a></h2>
</div>
 <div class="panel-body">
   <form action="addstudent.php" mathod="post">
     <div class="form-gurop">
        <label for="name">Student Name</label>
        <input type="text" class="form-control" name="name" id="name" value="khokon">
     </div>
     <div class="form-gurop">
        <label for="eamil">Student Eamil</label>
        <input type="text" class="form-control" name="eamil" id="eamil" value="email">
     </div>
     <div class="form-gurop">
        <label for="phone">Student Phone</label>
        <input type="text" class="form-control" name="phone" id="phone" value="phone">
     </div>

     <div class="form-gurop">
        <input type="hidden" name="id" value="Add"/>
      	<input type="hidden" name="action" value="Add"/>
        <input type="submit" class="btn btn-primary" name="submit" value="Update Student"/>
     </div>
   </form>
 	</div>
 	<?php include 'inc/footer.php';?>
   	