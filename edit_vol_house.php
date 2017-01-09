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

	$volAddress = $_POST["volAddress"];
	$volCity = $_POST["volCity"];
	$volState = $_POST["volState"];
	$volZip = $_POST["volZip"];
	$house_students = $_POST["house_students"];
	$house_length = $_POST["house_length"];
	$volPickdateFrom = $_POST["volPickdateFrom"];
	$volPickdateTo = $_POST["volPickdateTo"];
	$gender_pref = $_POST["gender_pref"];
	$volHomeComment = $_POST["volHomeComment"];

	$id = getuser_value("id");
	$fname = getUser_value("first_name");
	$lname = getUser_value("last_name");

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
					$querys = "UPDATE `users` SET `volHomeAddress`='".$volAddress."', `volHomeCity`='".$volCity."', `volHomeState`='".$volState."', `volHomeZip`='".$volZip."', `volHomeHouse`='".$house_students."', `volHomeLength`='".$house_length."', `volHomeFrom`='".$volPickdateFrom."', `volHomeTo`='".$volPickdateTo."', `volGenderPref`='".$gender_pref."', `volHomeComment`='".$volHomeComment."' WHERE `ID`=$id";

					$update = mysqli_query($conn, $querys);

					//if email exists show data in inputs
					if($update){
						//ERROR-need to display message before redirecting to account.php
					 	echo "<script>alert('Data updated');</script>";
					 	//header('location: account.php');

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
	<title>Update Volunteer Housing Info</title>
	<meta charset="utf-8">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="panel-group">
		<div class="main-center">
		<div class="text-center">

			<h1>Update Your Volunteer Housing Info</h1>
			<hr />

		</div>
			
			<form class="horizontal-center" method="POST" action="edit_vol_house.php" name="flight_info">
				<div class="form-group">
				<div class="panel-title text-center">
					<h4>ID</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-font" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="_id" value=<?php echo $id ?> disabled=disabled>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>First And Last Name</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-font" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="_fname" value=<?php echo $fname ?> disabled=disabled>
				    		<input type="text" class="form-control" name="_lname" value=<?php echo $lname ?> disabled=disabled>
					</div><br>
			    	</div>
				</div>
				<br><br><br><br><hr />

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Home Address</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="start_picktime" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-time" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" placeholder="Enter Street Address" name="volAddress">
					</div>
			    	</div>
				</div><br><br>

				<div class="form-group">
					<label for="start_picktime" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-time" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" placeholder="Enter City" name="volCity">
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
					<label for="start_picktime" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-time" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" placeholder="Enter State" name="volState">
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
					<label for="start_picktime" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-time" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" placeholder="Enter Zip" name="volZip">
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h5>How Many Students Can You House?</h5>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
				    		<select class="form-control" name="house_students" id="house_students" placeholder="How many students?">
								<option selected disabled>How many students?</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4+</option>
							</select>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h5>How Long Can The Students Stay?</h5>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
				    		<select class="form-control" name="house_length" id="house_length" placeholder="How long?">
								<option selected disabled>How long?</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4+</option>
							</select>
					</div><br>
			    	</div>
				</div><br><br><br>

				<div class="form-group">
					<label for="pickdate1" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group date" data-provide="datepicker">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="volPickdateFrom" id="volPickdateFrom" placeholder="From">
		    		</div><br>
	            	</div>
				</div><br><br>
				<div class="form-group">
					<label for="pickdate2" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group date" data-provide="datepicker">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="volPickdateTo" id="volPickdateTo" placeholder="To">
		    		</div><br>
	            	</div>
				</div><br><br>

				<div class="form-group">
					<label for="gender_pref" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<h5>Gender Preference</h5>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
							<select class="form-control" name="gender_pref" id="gender_pref" placeholder="Boys or Girls?">
								<option selected disabled>Gender?</option>
								<option value="Male Only">Male Only</option>
								<option value="Female Only">Female Only</option>
								<option value="Both"Both</option>
							</select>
						</div><br/>
					</div>
				</div><br><br><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h5>Any Comments?</h5>
					<!-- <hr />adds line break -->
				</div>
					<label for="comment" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
						<div class="input-group">
				    	<textarea class="form-control" id="volHomeComment" name="volHomeComment" rows="3" style="width:198%;"></textarea>
				    	</div><br>
				    </div>
			  	</div><br><br><br><br><br>

				<div class="form-group text-center">
						<label class="col-md-4 control-label" for="submit3"></label>
					<div class="col-xs-4">
						<button id="cancel" name="cancel" class="btn btn-warning"><a href="account.php">Cancel</a></button>
						<input type="submit" id="change" name="change" class="btn btn-success">
						<!--<button id="submit" name="submit" class="btn btn-success" onclick="return validate(); return false;"><a href="student_complete.html">Submit</a></button>-->
						<!-- <input type="submit" value=" Submit " name="submit"/><br /> -->
					</div>
				</div><br><br>
<!-- 				<input type="submit" name="change" value="Change My Profile">
				<button>
				<a href="account.php">I Changed My Mind, Don't Do It!</a>
				</button> -->
			</form>
		</div><!-- end maincenter div -->
		</div><!-- end panelgroup div -->
	</div><!-- end row div -->
</div><!-- end container div -->

</body>
</html>




