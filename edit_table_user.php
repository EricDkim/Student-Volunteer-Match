<?php

	error_reporting(0);
 	$showDivFlag = true;

	require_once("functions.php");
	require_once("nav.php");
if(loggedIn()){
	// value from inputs
	$_id = $_POST["_id"];
	$_fname = $_POST["_fname"];
	$_lname = $_POST["_lname"];
	$_email = $_POST["_email"];
	$_phone = $_POST["_phone"];


	$id = $_GET['user_id'];
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];


	// $id = getUser_value("id");
	// $fname = getUser_value("first_name");
	// $lname = getUser_value("last_name");
	// $email = getUser_value("email");
	// $phone = getUser_value("phone");

	 if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// 		$id = getUser_value("id");
	// $fname = getUser_value("first_name");
	// $lname = getUser_value("last_name");
	// $email = getUser_value("email");
	// $phone = getUser_value("phone");

		//mysql update query
		$query = "UPDATE `users` SET `first_name`='".$_fname."', `last_name`='".$_lname."', `email`='".$_email."', `phone`='".$_phone."' WHERE `ID`=$id";
		$results = mysqli_query($conn, $query);

		//if id exists show data in inputs
		if($results){
		 	echo 'Data Updated';
		 } else {
		 	echo 'Data Not Updated';
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
	<title>Edit User</title>
	<meta charset="utf-8">
</head>
<body>
	<h2>Edit User <?php echo $fname ?></h2>
	<form action="" method="POST">
		ID: <input type="text" name="_id" value=<?php echo $id ?> disabled=disabled><br><br>
		First Name: <input type="text" name="_fname" value=<?php echo $fname ?> required><br><br>
		Last Name: <input type="text" name="_lname" value=<?php echo $lname ?> required><br><br>
		Email: <input type="text" name="_email" value=<?php echo $email ?> required><br><br>
		Phone: <input type="text" name="_phone" value=<?php echo $phone ?> required><br><br>
		<input type="submit" name="change" value="Change My Profile">
		<button>
		<a href="account.php">I Changed My Mind, Don't Do It!</a>
		</button>
	</form>
</body>
</html>




