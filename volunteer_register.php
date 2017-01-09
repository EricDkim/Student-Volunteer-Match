<!DOCTYPE html>
<html>
<head>
	<title>Volunteer Registration</title>
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

	<!-- import student registration old -->
	<div class="panel-heading">
		<div class="panel-title text-center">
			<h1>Volunteer Registration</h1>
			<hr /><!--adds line break-->
		</div>
	</div>
			<div class="main-login main-center">

				<form class="form-horizontal" method="POST" action="" name="volunteer_registration" id="volunteer_registration">
				<div class="form-group">
						<label for="first_name" class="col-md-4 control-label">First Name</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-font" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="first_name" id="first_name" required="required" placeholder="First Name (English Please)">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="last_name" class="col-md-4 control-label">Last Name</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-bold" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="last_name" id="last_name" required="required" placeholder="Last Name (English Please)">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="gender">Gender</label>
						<div class="col-md-4">
							<div class="input-group">
							<label class="radio-inline" for="gender" id="gender-0">
								<div id="thisVal"><input type="radio" name="gender" id="gender" value="0" checked="checked">Male<br></div>
								</label>
								<label class="radio-inline" for="gender" id="gender-1">
									<div id="thisVal2"><input type="radio" name="gender" id="gender" value="1" checked="checked">Female</div>
								</label>
							</div>
						</div>
					</div>
			         <div class="form-group">
						<label for="major" class="col-md-4 control-label">Affiliation</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-education" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="aff" id="aff" required="required" placeholder="Affiliation/Recommended By:">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-4 control-label">Email</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="email" id="email" required="required" placeholder="Email"/>
								</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-4 control-label">Mobile Phone</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-phone" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="mphone" id="mphone" required="required" placeholder="Mobile Phone Number"/>
								</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="username" class="col-md-4 control-label">Username</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="username" id="username" required="required" placeholder="Username"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-md-4 control-label">Password</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="pw" id="pw" required="required" placeholder="Password"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-md-4 control-label">Verify Password</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="vpw" id="vpw" required="required" placeholder="Password"/>
							</div>
						</div>
					</div>
					<div class="form-group text-center">
  						<label class="col-md-4 control-label" for="submit"></label>
						<div class="col-md-4 ">
							<button id="cancel" name="cancel" class="btn btn-warning"><a href="login2.php">Cancel</a></button>
							<input type="submit" id="submit" name="submit" class="btn btn-success">
							<!--<button id="submit" name="submit" class="btn btn-success" onclick="return validate(); return false;"><a href="student_complete.html">Submit</a></button>-->
							<!-- <input type="submit" value=" Submit " name="submit"/><br /> -->
						</div>
					</div>
				</form>
			</div>
	
	<?php
		// This works
		// $test = "simple";
		// $hash = password_hash($test, PASSWORD_DEFAULT);
		// echo $hash;

		if(isset($_POST["submit"])){
			if(!empty($_POST['email']) && !empty($_POST['first_name']) && !empty($_POST['last_name'])
				&& !empty($_POST['mphone']) && !empty($_POST['pw'])){
				$first_name_ = $_POST["first_name"];
				$last_name = $_POST["last_name"];
				$email = $_POST["email"];
				$mphone = $_POST["mphone"];
				$p_pw = $_POST["pw"]; 
				$p_vpw = $_POST["vpw"];
				$p_hash = password_hash($p_pw, PASSWORD_DEFAULT);
				$genedr = $_POST["gender"];
				$aff = $_POST["aff"];
				$username = $_POST["username"];

				//$varPass = $_GET["pw"];
				//check to see if the two passwrods are identical
				if($p_pw === $p_vpw){


				// this prints out the hash, works
				// echo "<script>alert('$p_hash');</script>";

			//	$varPost = $_POST['$hash'];
				$conn = new mysqli('localhost', 'phpmyadmin','phpmaster', 'mytestdatabase') or die(mysqli_error()); // db connection
				$db = mysqli_select_db($conn, 'mytestdatabase') or die("DB Error"); // select from db
				// selecting db
				$query = mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'");
				$numrows = mysqli_num_rows($query);

				if($numrows == 0){
					//insert to mysqli query
					// //the VALUES only get from the html FORM not the p_fist_name values above. 
					$sql = "INSERT INTO users (user_type,first_name, last_name, email, phone, pw, gender, username, Affiliation) VALUES (1 ,'".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["email"]."','".$_POST["mphone"]."','$p_hash','".$_POST["gender"]."','".$_POST["username"]."','".$_POST["Affiliation"]."')";

					// result message
					if($conn->query($sql) === TRUE){
						echo "<script>alert('Registration Success! Please login to update your pickup and housing info.');</script>";
						
					} else {
						echo "<script>alert('Registration Error!');</script>";
					}
				} else {
					echo "email exists!";
				}
			} else {
				?>
				<script>alert('Passwords Are Not Identical');</script><?php
			} 
		}else {
				//js alert
				?>
				<script>alert('Required all fields');</script><?php
			}
		}


	?>

</body>
</html>









