<?php include_once 'lib/Adddepartment.php';?>
<?php include_once 'lib/ClassRuting.php';?>
<?php include_once 'lib/Addtechers.php';?>
<?php include_once 'lib/ClassRoom.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
   <?php
      $ruting = new Classrouting();

      if (!isset($_GET['rutingId']) || $_GET['rutingId'] == NULL) {
         header("Location:view-class-ruting.php");
       }else{
         $rutingId = $_GET['rutingId'];
       }

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

       $updatedrouting = $ruting->UpdatedClassRuting($rutingId, $_POST);  
      }
    ?>
 <div id="page-wrapper">
  <div class="row">
   <h2 class="text-center">Update Class Routing</h2>
   <h3 class="text-center text-success">
     <?php
       if (isset($updatedrouting)) {
         echo $updatedrouting;
       }
      ?>
   </h3>
   <div class="container">
    <?php
         $getruting = $ruting->GetRutingById($rutingId);
         foreach ($getruting as $result) {?> 

  <form class="form-horizontal" action="" method="POST">
       <div class="form-group">
      <label class="control-label col-sm-2" for="date">Time</label>
      <div class="col-sm-10">          
       <input type="text" class="form-control" id="date" name="datetime" value="<?php echo $result['datetime'];?>" />
      </div>
    </div>
       <div class="form-group">
                <label for="inputPassword3" class="control-label col-sm-2">Department</label>
                <div class="col-sm-10">
                    <select class="form-control" name="deptId">
                        <option>Select Your Department</option>
                        <?php
                             $department = new Adddepartment();
                            $getdept = $department->GetShowDepartment();
                             foreach ($getdept as $showdepartment) {?>
                            
                       <option 
                        <?php
                            if ($result['deptId'] == $showdepartment['deptId']) {?>
                            selected="selected"
                       
                       <?php } ?>value="<?php echo $showdepartment['deptId'];?>"><?php echo $showdepartment['departname'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
             <div class="form-group">
      <label class="control-label col-sm-2" for="name">Semester</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="<?php echo $result['semt'];?>" name="semt">
      </div>
    </div>

       <div class="form-group">
                <label for="inputPassword3" class="control-label col-sm-2">Techers Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="tecrId">
                        <option>Select Your Techers</option>
                        <?php
                            $techer = new Addtechers();
                            $gettechr = $techer->GetShowAllTechers();
                             foreach ($gettechr as $showtecher) {?>
                            
                       <option 
                         <?php
                            if ($result['tecrId'] == $showtecher['tecrId']) {?>
                            selected="selected"
                      <?php } ?> value="<?php echo $showtecher['tecrId'];?>"><?php echo $showtecher['name'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

        <div class="form-group">
      <label class="control-label col-sm-2" for="name">Subject Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="<?php echo $result['subject'];?>" name="subject">
      </div>
    </div>

      <div class="form-group">
                <label for="inputPassword3" class="control-label col-sm-2">Class Room Number</label>
                <div class="col-sm-10">
                    <select class="form-control" name="roomId">
                        <option>Select Your Class Room</option>
                        <?php
                            $class = new Classroom();
                            $getclass = $class->GetShowClassRoom();
                             foreach ($getclass as $showroom) {?>
                            
                       <option 
                       <?php
                            if ($result['roomId'] == $showroom['roomId']) {?>
                            selected="selected"
                      <?php } ?>value="<?php echo $showroom['roomId'];?>"><?php echo $showroom['room'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
              
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Day</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="<?php echo $result['daywek'];?>" name="daywek">
      </div>
    </div>
     
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Techers Phone Number</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="pwd" value="<?php echo $result['phone'];?>" name="phone">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       <input type="submit" name="submit" value="Update" class="btn btn-primary btn-block">
      </div>
    </div>
  </form>
  <?php } ?>
</div>
</div>
</div>
 <?php include_once 'inc/footer.php';?>