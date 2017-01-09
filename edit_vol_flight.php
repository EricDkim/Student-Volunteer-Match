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

	$start_picktime = $_POST["start_picktime"];
	$end_picktime = $_POST["end_picktime"];
	$pick_student = $_POST["pick_student"];
	$pick_luggage = $_POST["pick_luggage"];
	$trips = $_POST["trips"];
	$volComment = $_POST["volComment"];

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
					$querys = "UPDATE `users` SET `volFromTime`='".$start_picktime."', `volToTime`='".$end_picktime."', `volCarStudent`='".$pick_student."', `volCarLuggage`='".$pick_luggage."', `volTrips`='".$trips."', `volComment`='".$volComment."' WHERE `ID`=$id";

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
	<title>Update Volunteer Flight Info</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap-timepicker/css/timepicker.less">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="panel-group">
		<div class="main-center">
		<div class="text-center">

			<h1>Update Your Volunteer Flight Pickup Info</h1>
			<hr />

		</div>
			
			<form class="horizontal-center" method="POST" action="edit_vol_flight.php" name="flight_info">
				<div class="form-group">
				<div class="panel-title text-center">
					<h4>ID</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-md-4 control-label"></label>
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
					<label for="pickdate" class="col-md-4 control-label"></label>
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
					<h4>Enter You Available Time Frame</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="start_picktime" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<h5>From:</h5>
					<div class="input-group bootstrap-timepicker timepicker">
							<span class="input-group-addon"><i class="glyphicon glyphicon-time" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control timepicker" placeholder="Enter Start Time" name="start_picktime" id="timepicker1">
					</div>
			    	</div>
				</div><br><br><br><br>

				<div class="form-group">
					<label for="start_picktime" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<h5>To:</h5>
					<div class="input-group bootstrap-timepicker timepicker">
							<span class="input-group-addon"><i class="glyphicon glyphicon-time" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control timepicker" placeholder="Enter End Time" name="end_picktime" id="timepicker2">
					</div><br>
			    	</div>
				</div><br><br><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h5>How Many Students Can Fit In Your Car?</h5>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
				    		<select class="form-control" name="pick_student" id="pick_student" placeholder="How many students?">
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
					<h5>How Many Luggage Can Fit In Your Car?</h5>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
				    		<select class="form-control" name="pick_luggage" id="pick_luggage" placeholder="How many luggage?">
								<option selected disabled>How many luggage?</option>
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
					<h5>How Many Trips Are You Willing To Do?</h5>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-road" aria-hidden="true"></i></span>
				    		<select class="form-control" name="trips" id="trips" placeholder="How many trips?">
								<option selected disabled>How many trips?</option>
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
					<h5>Any Comments?</h5>
					<!-- <hr />adds line break -->
				</div>
					<label for="comment" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
						<div class="input-group">
				    	<textarea class="form-control" id="volComment" name="volComment" rows="3" style="width:198%;"></textarea>
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
<script src="bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js" ></script>
<script>
	$('#timepicker1').timepicker();
	$('#timepicker2').timepicker();
</script>
</body>
</html>




