<?php

	error_reporting(0);
 	$showDivFlag = true;

	require_once("functions.php");
	require_once("nav.php");

	//get user id from SESSION
	$user_id = $_SESSION["user_id"];

	//gets the status and key usign the user_id value
	$sql = "SELECT * FROM users WHERE ID='$user_id' ";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$status = $row["status"];
	$volKey = $row["volKey"];
	$sendNights = $row["sendNights"];
	  // echo "<script>alert('$volKey'+'sk');</script>";
	  // echo "<script>alert('$status' + ' = status');</script>";

	$sql = "SELECT * FROM users WHERE stuKey='$volKey'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$stuFirst = $row["first_name"];
	$stuLast = $row["last_name"];
	$stuEmail = $row["email"];
	$stuPhone = $row["phone"];
	$stuArrivalDate = $row["ArrivalDate"];
	$stuArrivalTime = $row["ArrivalTime"];
	$stuSend2address = $row["send2address"];
	$stuSend2city = $row["send2city"];
	$stuSend2state = $row["send2state"];
	$stuSend2zip = $row["send2zip"];
	$stuAirline = $row["Airline"];
	$stuFlightNum = $row["FlightNum"];
	$stuHomeFlightNum = $row["HomeFlightNum"];
	$stuHomeAirline = $row["HomeAirline"];
	$stuLuggage = $row["Luggage"];
	$stuKey = $row["stuKey"];
	 // echo "<script>alert('$stuKey'+'vk');</script>";
	// 	echo "<script>alert('$volFirst'+'vf');</script>";
	// 	echo "<script>alert('$volLast'+'vl');</script>";


	if($status==NULL){
		//echo "<script>alert('ITS NULL');</script>";
		?>
		
		<style type="text/css">
		#sendNightNull{
		display:none;
		}#sendNightPresent{
		display:none;
		}
		</style>
		<?php

	} else { 
		?>
		<style type="text/css">#inProgress{
		display:none;
		}</style>
		<?php

		if(!$sendNights){
			//hide the 'yes' field from house, show the 'no' field
			//wea re goign to move this volunteer somewhere else, we will not house them. Depends on vol's available time frame 
			?>
			<style type="text/css">#sendNightPresent{
			display:none;
			}</style>
			<?php
		} else {
			//show the 'yes' field, hide the 'no' field
			?>
			<style type="text/css">#sendNightNull{
			display:none;
			}</style>
			<?php
		}
		//echo "<script>alert('WE GOT IT');</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Check Status</title>
</head>
<body>
	<div class="container-fluid">

		<div id="inProgress">
			<div class="panel-title text-center">
				<h4>Request Still In The Works</h4>
			</div>
		</div>


		<div id="sendNightNull">
			<div class="panel-title text-center">
				<h4>A Student Has Been Assigned To You</h4>
				<h5>Please get in contact with your Student as soon as possible</h5>
				<p>This Student will need you to take him/her home.</p>
			</div>
			<div class="hoizaontal-center">
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Your Student:</div>
					<div class="pandel-body"><?php echo $stuFirst; echo ' '; echo $stuLast; ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Student Phone:</div>
					<div class="pandel-body"><?php echo $stuPhone;  ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Student Email:</div>
					<div class="pandel-body"><?php echo $stuEmail;  ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Student Destination Address:</div>
					<div class="pandel-body"><?php echo $stuSend2address;  ?></div>
					<div class="pandel-body"><?php echo $stuSend2city;  ?></div>
					<div class="pandel-body"><?php echo $stuSend2state;  ?></div>
					<div class="pandel-body"><?php echo $stuSend2zip;  ?></div>
				</div>
			</div>
			<div class="text-center">
			<a class="btn btn-default" data-toggle="collapse" data-target=".small-coll">Show Flight Info</a><br><br>
			</div>
			<div class="small-coll collapse">
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Student Arrival Date:</div>
					<div class="pandel-body"><?php echo $stuArrivalDate ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Student Arrival Time:</div>
					<div class="pandel-body"><?php echo $stuArrivalTime ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Airline:</div>
					<div class="pandel-body"><?php echo $stuAirline ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Flight Num:</div>
					<div class="pandel-body"><?php echo $stuFlightNum ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Home Flight Number:</div>
					<div class="pandel-body"><?php echo $stuHomeFlightNum ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Home Airline:</div>
					<div class="pandel-body"><?php echo $stuHomeAirline ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Luggage:</div>
					<div class="pandel-body"><?php echo $stuLuggage ?></div>
				</div>
			</div>
			</div>
		</div>



		<div id="sendNightPresent">
			<div class="panel-title text-center">
				<h4>A Student Has Been Assigned To You Present</h4>
				<h5>Please get in contact with your Student as soon as possible</h5>
				<p>This Student need you to provide shuttle and housing</p>
			</div>
			<div class="hoizaontal-center">
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Your Student:</div>
					<div class="pandel-body"><?php echo $stuFirst; echo ' '; echo $stuLast; ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Student Phone:</div>
					<div class="pandel-body"><?php echo $stuPhone;  ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Student Email:</div>
					<div class="pandel-body"><?php echo $stuEmail;  ?></div>
				</div>
			</div>
			<div class="text-center">
			<a class="btn btn-default" data-toggle="collapse" data-target=".show-coll">Show More Info</a><br><br>
			<div class="show-coll collapse">
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Student Arrival Date:</div>
					<div class="pandel-body"><?php echo $stuArrivalDate ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Student Arrival Time:</div>
					<div class="pandel-body"><?php echo $stuArrivalTime ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Airline:</div>
					<div class="pandel-body"><?php echo $stuAirline ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Flight Num:</div>
					<div class="pandel-body"><?php echo $stuFlightNum ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Home Flight Number:</div>
					<div class="pandel-body"><?php echo $stuHomeFlightNum ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Home Airline:</div>
					<div class="pandel-body"><?php echo $stuHomeAirline ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Luggage:</div>
					<div class="pandel-body"><?php echo $stuLuggage ?></div>
				</div>
			</div>
			</div>
		</div>	

	</div>
</body>
</html>




