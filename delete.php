<?php

	error_reporting(0);
 	$showDivFlag = true;

	require_once("functions.php");
	require_once("nav.php");
if(loggedIn()){
	if(isset($_POST['delete'])){

		//email to search
		$email = $_POST['email'];
		//$getemail = mysqli_real_escape_string($conn, trim($_POST['email']));
		//mysql search query
		$query = "DELETE FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $query);

		//if email exists show data in inputs
		if($result){
			echo 'Data Deleted';
		} else {
			echo 'Data Not Deleted';
		}

		//mysqli_free_results($result);
		mysqli_close($conn);
	}
} else {
	header('location: login_err.php');
}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete A User</title>
	<meta charset="utf-8">
</head>
<body>


	<br>

	<form action="delete.php" method="POST">
		Email: <input type="text" name="email" required><br><br>
		<input type="submit" name="delete" value="Clear Data">
	</form>
</body>
</html>