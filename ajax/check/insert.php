<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/addinsert.php');
     
     $insert = new Addinsert();

     if ($_SERVER['REQUEST_METHOD'] == "POST") {
     	$name = $_POST['name'];
     	$email = $_POST['email'];
     	$user = $insert->checkInsertData($name, $email);
     }

	?>