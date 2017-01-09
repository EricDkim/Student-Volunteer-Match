<?php
	session_start();
	header("location: login2.php");

	
	// unset($_SESSION['user_id']);  
     
	
	session_destroy(); 

?>