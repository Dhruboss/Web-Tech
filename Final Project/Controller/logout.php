<?php 

session_start();

if (isset($_SESSION['uname'])) {
	session_destroy();
	header("location:../view/LOGIN.php");
	
}

else{
	header("location:../view/LOGIN.php");
}

?>