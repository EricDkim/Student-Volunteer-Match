<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
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
			<h1>Student Registration</h1>
			<hr /><!--adds line break-->
		</div>
	</div>
			<div class="main-login main-center">

				<form class="form-horizontal" method="POST" action="" name="student_registration" id="student_registration">
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
						<label for="level" class="col-md-4 control-label">Level</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-indent-left" aria-hidden="true"></i></span>
								<select id="level" name="level" class="form-control">
									<option value="Undergrad">Undergrad</option>
				         			<option value="Graduate">Graduate</option>
				         			<option value="Visiting Scholar">Visiting Scholar</option>
								</select>
							</div>
						</div>
					</div>
			         <div class="form-group">
						<label for="major" class="col-md-4 control-label">Major</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-education" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="major" id="major" placeholder="Major">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-4 control-label">Email</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="email" id="email"  placeholder="Please Enter Your Email"/>
								</div>
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-md-4 control-label">Phone</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-phone" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="phone" id="phone"  placeholder="Home Phone Number"/>
								</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="username" class="col-md-4 control-label">Username</label>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="username" id="username"  placeholder="Username"/>
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
						</div>
					</div>
				</form>
			</div>
<?php 

	function getGUID(){
	    if (function_exists('com_create_guid')){
	        return com_create_guid();
	    }else{
	        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
	        $charid = strtoupper(md5(uniqid(rand(), true)));
	        $hyphen = chr(45);// "-"
	        $uuid = chr(123)// "{"
	            .substr($charid, 0, 8).$hyphen
	            .substr($charid, 8, 4).$hyphen
	            .substr($charid,12, 4).$hyphen
	            .substr($charid,16, 4).$hyphen
	            .substr($charid,20,12)
	            .chr(125);// "}"
	        return $uuid;
	    }
	}
	$GUID = getGUID();
	echo $GUID;
?>
<?php
		// This works
		// $test = "simple";
		// $hash = password_hash($test, PASSWORD_DEFAULT);
		// echo $hash;

		if(isset($_POST["submit"])){
			if(!empty($_POST['email']) && !empty($_POST['first_name']) && !empty($_POST['last_name'])
				&& !empty($_POST['phone']) && !empty($_POST['pw'])){
				$first_name_ = $_POST["first_name"];
				$last_name = $_POST["last_name"];
				$email = $_POST["email"];
				$phone = $_POST["phone"];
				$p_pw = $_POST["pw"]; 
				$p_vpw = $_POST["vpw"];
				$p_hash = password_hash($p_pw, PASSWORD_DEFAULT);
				$gender = $_POST["gender"];
				$level = $_POST["level"];
				$major = $_POST["major"];
				$username = $_POST["username"];


				//$varPass = $_GET["pw"];
				//check to see if the two passwrods are identical
				if($p_pw === $p_vpw){

			//	$varPost = $_POST['$hash'];
				$conn = new mysqli('localhost', 'phpmyadmin','phpmaster', 'mytestdatabase') or die(mysqli_error()); // db connection
				$db = mysqli_select_db($conn, 'mytestdatabase') or die("DB Error"); // select from db
				// selecting db
				$query = mysqli_query($conn, "SELECT * FROM users WHERE email='".$p_email."'");
				$numrows = mysqli_num_rows($query);

				// echo "<script type='text/javascript'>
				// 	alert('$hash');
				// 	</script>";

				if($numrows == 0){

					//insert to mysqli query
					// //the VALUES only get from the html FORM not the p_fist_name values above. 
					// $sql = "INSERT INTO users (first_name, last_name, email, phone, pw)
					// VALUES ('".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["email"]."',
					// '".$_POST["phone"]."','".$_POST['$p_pwPost']."')";
					$sql = "INSERT INTO users (user_type, status, stuKey,first_name, last_name, email, phone, pw, gender, level, Major, username) VALUES (0 , 0,'".$GUID."','".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["email"]."','".$_POST["phone"]."','$p_hash','".$_POST["gender"]."','".$_POST["level"]."','".$_POST["major"]."','".$_POST["username"]."')";
					//$sql = "INSERT INTO users (user_type ,first_name, last_name, email, phone, pw, gender, level, Major, username)VALUES ('first', 'name', 'email', 'phone', 'pass', 'gender', 'level', 'major', 'username')";
					// $result = mysqli_query($conn, $sql);



					if($conn->query($sql) === TRUE){
						echo "<script>alert('Registration Success! Please login to update your Flight and Housing info.');</script>";
						// header("location: error.php?=?user_id=".$_SESSION["user_id"].""); exit;
						

					} else {
						echo "<script>alert('Registration Error!');</script>";

					}
				} else {
					echo "email exists!";
				} //end numrows if statement

			} else { // end p_pw === p_vpw if statement
				?>
				<script>alert('Passwords Are Not Identical');</script><?php
			} 
		}else {
				//js alert
				?>
				<script>alert('Required all fields');</script><?php
			}// end second if statement
			
		}//end first if statement


	?>
</body>
</html>









