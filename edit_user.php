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
	$_gender = $_POST["_gender"];
	$_level = $_POST["_level"];
	$_major = $_POST["_major"];
	$_affiliation = $_POST["_affiliation"];
	$_username = $_POST["_username"];



	$id = getuser_value("id");
	$fname = getUser_value("first_name");
	$lname = getUser_value("last_name");
	$email = getUser_value("email");
	$phone = getUser_value("phone");
	$gender = getUser_value("gender");
	$level = getUser_value("level");
	$major = getUser_value("Major");
	$username = getUser_value("username");
	$affiliation = getUser_value("Affiliation");
	//this works
	//echo "<script>alert('$gender');</script>";

	//this should work, according to function.php
	global $conn;
	$user_id = $_SESSION["user_id"];//works
	$sql = "SELECT * FROM users WHERE id='$user_id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	//$level = $row['level'];

	if(isset($_POST['change'])){

	
			// $result = $conn->query($sql);

			if($result = $conn->query($sql)){
				while ($row = $result->fetch_row()){
					$querys = "UPDATE `users` SET `first_name`='".$_fname."', `last_name`='".$_lname."', `email`='".$_email."', `phone`='".$_phone."', `gender`='".$_gender."', `level`='".$_level."', `Major`='".$_major."', `username`='".$_username."' WHERE `ID`=$id";

					$update = mysqli_query($conn, $querys);

					//if email exists show data in inputs
					if($update){
						//ERROR-need to display message before redirecting to account.php
					 	//echo "<script>alert('Data updated');</script>";
					 	header('location: account.php');

					 } else {
					 	echo "<script>alert('Data not updated');</script>";
					 }
				}
			}

		mysqli_free_results($result);

		mysqli_close($conn);

	}

} else {
	echo "<script>alert('Data not updated2');</script>";
	header('location: login_err.php');
}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
	<meta charset="utf-8">
</head>
<body>
	<h2>Update Your Profile</h2>
	<form action="edit_user.php" method="POST">
		ID: <input type="text" name="_id" value=<?php echo $id ?> disabled=disabled><br><br>
		First Name: <input type="text" name="_fname" value=<?php echo $fname ?> required><br><br>
		Last Name: <input type="text" name="_lname" value=<?php echo $lname ?> required><br><br>
		Email: <input type="text" name="_email" value=<?php echo $email ?> required><br><br>
		Phone: <input type="text" name="_phone" value=<?php echo $phone ?> required><br><br>
		Gender: <input type="text" name="_gender" value=<?php echo $gender ?> required><br><br>
		Level: <input type="text" name="_level" value=<?php echo $level ?> required><br><br>
		Major: <input type="text" name="_major" value=<?php echo $major ?> required><br><br> 
		Affiliation: <input type="text" name="_affiliation" value=<?php echo $affiliation ?> required><br><br> 
		Username: <input type="text" name="_username" value=<?php echo $username ?> required><br><br>
		<input type="submit" name="change" value="Change My Profile">
		<button>
		<a href="account.php">I Changed My Mind, Don't Do It!</a>
		</button>
	</form>
</body>
</html>




