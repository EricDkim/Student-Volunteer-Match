<!DOCTYPE html>
<html>
<head>
	<title>Account - Admin Panel</title>
</head>
<body>
	<?php
		require_once("functions.php");
		require_once("nav.php");
	?>

	<?php if(loggedIn()){ ?>



	<?php
		if(!loggedIn() || getUser_value("user_type") != "1"){
			header("location: index.php");
		}
	?>
	<?php } ?>

	<h3>Welcome To Admin Panel</h3>
</body>
</html>