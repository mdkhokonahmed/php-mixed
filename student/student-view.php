<?php include_once 'lib/StudentAddDetalies.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
   $student = new StudentAddDetalies();
    if (isset($_GET['delId'])) {
    $delId = $_GET['delId'];
    $delete = $student->StudentDelete($delId);
   }
   
 ?>


 <div id="page-wrapper">
 <h2 class="text-center">View-Student</h2>
  <div class="form-group">
  <form class="navbar-form navbar-right" role="search" action="search.php" method="get">
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search">
        <span class="input-group-btn">
            <input class="btn btn-default" type="submit" name="submit" value="Search"></input>
        </span>
    </div>
</form>

</div>
   
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th width="5%">SL</th>
            <th width="5%">Department</th>
            <th width="5%">Semester</th>
            <th width="15%">Name</th>
            <th width="5%">Date Of Bath</th>
            <th width="10%">Phone</th>
            <th width="15%">Eamil</th>
            <th width="5%">Gender</th>
            <th width="5%">Guardian Name</th>
            <th width="10%">Guardian Phone</th>
            <th width="10%">Address</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
          
          $getstudent = $student->GetShowStudent();
          $i = 0;
          foreach ($getstudent as $result) {
            $i++;
         ?>
        <tr> 
            <th scope="row"><?php echo $i;?></th>
            <td><?php echo $result['departname'];?></td>
            <td><?php echo $result['semt'];?></td>
            <td><?php echo $result['name'];?></td>
            <td><?php echo $result['datetime'];?></td>
            <td><?php echo $result['phone'];?></td>
            <td><?php echo $result['email'];?></td> 
            <td><?php echo $result['gender'];?></td>
            <td><?php echo $result['gardname'];?></td>
            <td><?php echo $result['garphone'];?></td>
            <td><?php echo $result['address'];?></td>
            <td>
                <a href="edit-student.php?studetId=<?php echo $result['studetId'];?>" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="?delId=<?php echo $result['studetId'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td> 
        </tr>
        <?php } ?>
       
    </tbody>
</table>
 <?php
 $parpage = 3;
  if (isset($_GET["page"])) {
     $page = $_GET["page"];

  }else{
    $page = 1;
  }
  $start_form = ($page-1) * $parpage;

  ?>
<?php
   $pagination = $student->paginationdata($start_form,$parpage);
 ?>
  <?php echo "<span class='pag'><a href='student-view.php'?page=1>".'start'."</a>";
   for ($i=1; $i <= $pagination; $i++) { 
      echo "<a href='student-view.php?page=" .$i. "'>".$i."</a>";
   };
   echo "<a href='student-view.php'?page=$parpage>".'last'."</a></span>"?>
</div>  

<?php include_once 'inc/footer.php';?>	