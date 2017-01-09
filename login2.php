<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<?php
		require_once("functions.php");
		require_once("nav.php");
	?>

	<?php
		if(loggedIn()){
			header("location: account.php");
		}
	?>
	<?php

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$id = $_GET['user_id'];
			$fname = $_GET['fname'];
			$lname = $_GET['lname'];
			$_email = $_GET['email'];
			$phone = $_GET['phone'];
			$email = $_POST["email"];
			$pwd = $_POST["password"]; //this is the user input variable
			//this is the hashed pw for pik@gmail.com
			// $hash = '$2y$10$h/tkqwZUgkkpCyQgBG58g..UEodfcCS5Eb/3L/rd0h/ES9/HWKn5q';

			if(empty($email) || empty($password)){

				echo "<script>alert('fields are empty!!!');</script>";

			} else {
				//get hashedpw from DB 
				//use 'password_verify'

				$sql = "SELECT * FROM users WHERE email='$email'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				$hash_pwd = $row['pw'];
				$hash = password_verify($pwd, $hash_pwd);
				echo "<script>alert('$hash_pwd');</script>";
				echo "<script>alert('$hash');</script>";

				if ($hash == 0){
					//error handeling saying pwd not correct
					echo "<script>alert('password not correct!!!');</script>";
				} else {

				$sql = "SELECT id, status, stuKey, first_name, last_name, email, phone FROM users WHERE email='$email' AND pw='$hash_pwd'";
				$result = $conn->query($sql);

				if(!$row = $result->fetch_assoc()){
					echo "Email or Password is incorrect";
				} else {
					$user_id = $row['id'];
					$_SESSION['user_id'] = $user_id;
				}

					//move user to location by the value of 'user_id'
					header("location: account.php?user_id=".$row["ID"]."&fname=".$row["first_name"]."&lname=".$row["last_name"]."&_email=".$row["email"]."&phone=".$row["phone"]."&stuKey=".$row["stuKey"]."&status=".$row["status"]." ");

				}
			}

		}

		?>
	<div class="container">
	<div class="row">
	<div class="absolute-center is-responsive text-center">
	<div class="col-sm-12 col-md-10 col-md-offset-1">
	<h3>Login</h3>
	<form method="POST">
	

		Email: <br>
		<input type="text" name="email" />
		<br><br>

		Password: <br>
		<input type="password" name="password" />
		<br><br>

		<input type="submit" name="login" value="Login" />
	</form>
	</div>
	</div>
	</div>
	</div>

</body>
</html>