<?php
 $errorMSG = "";

  if (empty($_POST['name'])) {
      $errorMSG = "<li>Name is required</<li>";
} else {
    $name = $_POST["name"];
}


echo json_encode(['code'=>404, 'msg'=>$errorMSG]);

?>