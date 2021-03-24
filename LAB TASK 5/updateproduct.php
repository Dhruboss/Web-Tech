<?php  
require_once 'model.php';


if (isset($_POST['updateproduct'])) {
	$data['name'] = $_POST['name'];
	$data['buyingprice'] = $_POST['buyingprice'];
	$data['sellingprice'] = $_POST['sellingprice'];




  if (updateproduct($_POST['id'], $data)) {
  	echo 'Successfully updated!!';

  	header('Location: showproduct.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>