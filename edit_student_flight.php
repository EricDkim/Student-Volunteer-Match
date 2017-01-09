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

	$_flightnum = $_POST["_flightnum"];
	$_airline = $_POST["_airline"];
	$_arrivaldate = $_POST["_arrivaldate"];
	$_arrivaltime = $_POST["_arrivaltime"];
	$_homeflightnum = $_POST["_homeflightnum"];
	$_homeairline = $_POST["_homeairline"];
	$_luggage = $_POST["_luggage"];



	$id = getuser_value("id");
	$fname = getUser_value("first_name");
	$lname = getUser_value("last_name");

	$flightnum = getUser_value("FlightNum");
	$airline = getUser_value("Airline");
	$arrivaldate = getUser_value("ArrivalDate");
	$arrivaltime = getUser_value("ArrivalTime");
	$homeflightnum = getUser_value("HomeFlightNum");
	$homeairline = getUser_value("HomeAirline");
	$luggage = getUser_value("Luggage");
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
					$querys = "UPDATE `users` SET `FlightNum`='".$_flightnum."', `Airline`='".$_airline."', `ArrivalDate`='".$_arrivaldate."', `ArrivalTime`='".$_arrivaltime."', `HomeFlightNum`='".$_homeflightnum."', `HomeAirline`='".$_homeairline."', `Luggage`='".$_luggage."' WHERE `ID`=$id";

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
	<title>Update Flight Info</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap-timepicker/css/timepicker.less">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="panel-group">
		<div class="main-center">
		<div class="text-center">

			<h1>Update Your Flight Info</h1>
			<hr />

		</div>
			
			<form class="horizontal-center" method="POST" action="edit_student_flight.php" name="flight_info">
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
				</div><br><br><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Flight Number</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-font" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="_flightnum" value=<?php echo $flightnum ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Airline</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-font" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="_airline" value=<?php echo $airline ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Arrival Date</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group date" data-provide="datepicker">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="_arrivaldate" value=<?php echo $arrivaldate ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Arrival Time</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="timepicker" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group bootstrap-timepicker timepicker">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control timepicker" name="_arrivaltime" id="timepicker1" value=<?php echo $arrivaltime ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Home Flight Number</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="_homeflightnum" value=<?php echo $homeflightnum ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Home Airline</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="_homeairline" value=<?php echo $homeairline ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Number of Luggage</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="luggage" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
							<select class="form-control" name="_luggage">
								<option selected disabled>How many luggage?</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4+</option>
							</select>
						</div><br/>
					</div>
				</div><br><br><br>
				<!-- Arrival Time: <input type="text" name="_arrivaltime" value=<?php echo $arrivaltime ?> required><br><br> -->
				<!-- Home Flight Number: <input type="text" name="_homeflightnum" value=<?php echo $homeflightnum ?>><br><br> -->
				<!-- Home Airline: <input type="text" name="_homeairline" value=<?php echo $homeairline ?> required><br><br> -->
				<!-- Number of Luggage: <input type="text" name="_luggage" value=<?php echo $luggage ?> required><br><br> -->

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
</script>
</body>
</html>




