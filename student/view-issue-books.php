<?php include_once 'lib/Issuesystem.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
    $issue = new Issuesystem();
   if (isset($_GET['delId'])) {
   	$delId = $_GET['delId'];

   	$delete = $issue->BooksDelete($delId);
   }
 ?>
 <div id="page-wrapper">
 <h2 class="text-center">View-Issue-Books-List</h2>
 <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>SL</th>
            <th>Studen Name</th>
            <th>ROOL/ID</th>
             <th>Contact</th>
            <th>Departmen Name</th>
            <th>Book Name</th>
            <th>Today Date</th>
            <th>Return Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
         
          $getbook = $issue->GetShowAllIssueBooks();
               $i = 0;
            foreach ($getbook as $result) {
          	    $i++;
         ?>
        <tr> 
            <th scope="row"><?php echo $i;?></th>
            <td><?php echo $result['studname'];?></td>
            <td><?php echo $result['stdroll'];?></td>
            <td><?php echo $result['phone'];?></td>
            <td><?php echo $result['departname'];?></td>
            <td><?php echo $result['subjctname'];?></td> 
            <td><?php echo $result['tddate'];?></td>
            <td><?php echo $result['rutndate'];?></td>
            <td>
                <a href="edit-issue-books.php?issuId=<?php echo $result['issuId'];?>" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="?delId=<?php echo $result['issuId'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td> 
        </tr>
        <?php } ?>
       
    </tbody>
</table>
 </div>

<?php include_once 'inc/footer.php';?>	