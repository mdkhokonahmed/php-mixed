<?php include 'inc/header.php';?>
<div class="panel-heading">
  <h2>Add Student<a class="pull-right" href="index.php">Back</a></h2>
</div>
 <div class="panel-body">
   <form action="lib/process_student.php" mathod="post">
     <div class="form-gurop">
        <label for="name">Student Name</label>
        <input type="text" class="form-control" name="name" id="name" required="1">
     </div>
     <div class="form-gurop">
        <label for="eamil">Student Eamil</label>
        <input type="text" class="form-control" name="eamil" id="eamil" required="1">
     </div>
     <div class="form-gurop">
        <label for="phone">Student Phone</label>
        <input type="text" class="form-control" name="phone" id="phone" required="1">
     </div>

     <div class="form-gurop">

      	<input type="hidden" name="action" value="Add"/>
        <input type="submit" class="btn btn-primary" name="submit" value="Add Student"/>
     </div>
   </form>
 	</div>
 	<?php include 'inc/footer.php';?>
   	