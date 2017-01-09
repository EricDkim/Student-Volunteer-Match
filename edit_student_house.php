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

	//assign var's from the user input form(yes)
	$nights = $_POST["nights"];
	$address = $_POST["address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = $_POST["zip"];
	$housephone = $_POST["housephone"];

	//assign var's from the user input form(no)
	$addressNo = $_POST["addressNo"];
	$cityNo = $_POST["cityNo"];
	$stateNo = $_POST["stateNo"];
	$zipNo = $_POST["zipNo"];
	$housephoneNo = $_POST["housephoneNo"];
	$comment = $_POST["comment"];

	//use for show user id and name
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
					$querys = "UPDATE `users` SET `sendNights`='".$nights."', `sendAddress`='".$address."', `sendCity`='".$city."', `sendState`='".$state."', `sendZip`='".$zip."', `sendPhone`='".$housephone."' WHERE `ID`=$id";

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

	if(isset($_POST['changeNo'])){

	
			// $result = $conn->query($sql);

			if($result = $conn->query($sql)){
				while ($row = $result->fetch_row()){
					$querys = "UPDATE `users` SET `send2address`='".$addressNo."', `send2city`='".$cityNo."', `send2state`='".$stateNo."', `send2zip`='".$zipNo."', `send2phone`='".$housephoneNo."', `comment`='".$comment."' WHERE `ID`=$id";

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
	<title>Update Housing Info</title>
	<meta charset="utf-8">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="panel-group">
		<div class="main-center">
		<div class="text-center">

			<h1>Update Your Housing Info</h1>
			<hr />

		</div>
			
			<form class="horizontal-center" method="POST" action="edit_student_house.php" name="flight_info">
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
				<hr />

				<div class="panel-title text-center">
					<h4>Do You Need Housing Provided?</h4>
					<!-- <hr />adds line break -->
				</div><br>
				<div class="text-center">
					<a class="btn btn-default" data-toggle="collapse" data-target=".yes-coll">Yes</a>
					<a class="btn btn-default" data-toggle="collapse" data-target=".no-coll">No</a>
				</div><!-- end button div -->

				<div class="yes-coll collapse">
				<div class="form-group">
				<div class="panel-title text-center">
					<h4>How Many Nights?</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="luggage" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
							<select class="form-control" name="nights">
								<option selected disabled>How many nights?</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4+</option>
							</select>
						</div><br/>
					</div>
				</div><br><br>

				<div class="text-center">
					<h3>Where Should We Send You After?</h3>
				</div><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Street Address</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-font" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="address" placeholder="Steet Address of House" value=<?php echo $address ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>City</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="city" placeholder="City of House" value=<?php echo $city ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>State</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="state" placeholder="State of House" value=<?php echo $state ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Zip</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="zip" placeholder="Zip Code of House" value=<?php echo $zip ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Housing Phone</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-md-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="housephone" placeholder="House Phone" value=<?php echo $housephone ?>>
					</div><br>
			    	</div>
				</div><br><br><br>

				<div class="form-group text-center">
						<label class="col-xs-4 control-label" for="submit3"></label>
					<div class="col-xs-4">
						<button id="cancel" name="cancel" class="btn btn-warning"><a href="account.php">Cancel</a></button>
						<input type="submit" id="change" name="change" class="btn btn-success">
						<!--<button id="submit" name="submit" class="btn btn-success" onclick="return validate(); return false;"><a href="student_complete.html">Submit</a></button>-->
						<!-- <input type="submit" value=" Submit " name="submit"/><br /> -->
					</div>
				</div><br><br>
				</div><!-- end yes div -->
			</form>

			<!-- start no div -->
			<div class="no-coll collapse">
			<form class="horizontal-center" method="POST" action="edit_student_house.php" name="flight_info">

				<div class="text-center">
					<h3>Where Should We Send You?</h3>
				</div><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Street Address</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-font" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="addressNo" placeholder="Steet Address of House" value=<?php echo $addressNo ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>City</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="cityNo" placeholder="City of House" value=<?php echo $cityNo ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>State</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="stateNo" placeholder="State of House" value=<?php echo $stateNo ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Zip</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="zipNo" placeholder="Zip Code of House" value=<?php echo $zipNo ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Housing Phone</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="pickdate" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th" aria-hidden="true"></i></span>
				    		<input type="text" class="form-control" name="housephoneNo" placeholder="House Phone" value=<?php echo $housephoneNo ?>>
					</div><br>
			    	</div>
				</div><br><br>

				<div class="form-group">
				<div class="panel-title text-center">
					<h4>Any Comments?</h4>
					<!-- <hr />adds line break -->
				</div>
					<label for="comment" class="col-xs-4 control-label"></label>
					<div class="col-xs-4">
						<div class="input-group">
				    	<textarea class="form-control" id="comment" name="comment" rows="3" style="width:212%;"></textarea>
				    	</div><br><br>
				    </div>
			  	</div><br><br><br><br><br><br>

				<div class="form-group text-center">
						<label class="col-xs-4 control-label" for="submit3"></label>
					<div class="col-xs-4">
						<button id="cancel" name="cancel" class="btn btn-warning"><a href="account.php">Cancel</a></button>
						<input type="submit" id="changeNo" name="changeNo" class="btn btn-success">
						<!--<button id="submit" name="submit" class="btn btn-success" onclick="return validate(); return false;"><a href="student_complete.html">Submit</a></button>-->
						<!-- <input type="submit" value=" Submit " name="submit"/><br /> -->
					</div>
				</div><br><br>

			</form>
			</div>
		</div><!-- end maincenter div -->
		</div><!-- end panelgroup div -->
	</div><!-- end row div -->
</div><!-- end container div -->

</body>
</html>




