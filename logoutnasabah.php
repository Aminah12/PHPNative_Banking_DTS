<?php  
	session_start();
	unset($_SESSION["no_rek"]);
	session_destroy();

	header('Location:loginnasabah.php');
?>