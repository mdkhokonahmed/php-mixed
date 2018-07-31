<?php include_once 'lib/Addlibrarysystem.php';?>
<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
    $lib = new Adddlibrary();
   if (isset($_GET['delId'])) {
   	$delId = $_GET['delId'];

   	$delete = $lib->BooksDelete($delId);
   }
 ?>
 <div id="page-wrapper">
 <h2 class="text-center">View-Books-List</h2>
 <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>SL</th>
            <th>Book Name</th>
            <th>Departmen Name</th>
            <th>Author</th>
            <th>Total Book</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
          $getbook = $lib->GetShowAllBookslist();
               $i = 0;
            foreach ($getbook as $result) {
          	    $i++;
         ?>
        <tr> 
            <th scope="row"><?php echo $i;?></th>
            <td><?php echo $result['subjctname'];?></td>
            <td><?php echo $result['departname'];?></td>
            <td><?php echo $result['author'];?></td> 
            <td><?php echo $result['book'];?></td>
            <td>
                <a href="edit-books.php?librId=<?php echo $result['librId'];?>" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="?delId=<?php echo $result['librId'];?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this'); ">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td> 
        </tr>
        <?php } ?>
       
    </tbody>
</table>
 </div>

<?php include_once 'inc/footer.php';?>	