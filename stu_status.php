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

	$uid = $user_id;
	$status = $row["status"];
	$stuKey = $row["stuKey"];
	$sendNights = $row["sendNights"];
	// echo "<script>alert('$uid');</script>";
	//  echo "<script>alert('$stuKey'+'sk');</script>";
	//  echo "<script>alert('$status' + ' = status');</script>";

	//looks for all values from users where volKey from db equals $stuKey from previous sql query
	$sqls = "SELECT * FROM users WHERE volKey='$stuKey'";
	$results = $conn->query($sqls);
	$rows = $results->fetch_assoc();

	$volFirst = $rows["first_name"];
	$volLast = $rows["last_name"];
	$volEmail = $rows["email"];
	$volPhone = $rows["phone"];
	$volFromTime = $rows["volFromTime"];
	$volToTime = $rows["volToTime"];
	$volComment = $rows["volComment"];
	$volKey = $rows["volKey"];
	 // echo "<script>alert('$volKey'+'vk');</script>";
	 // 	echo "<script>alert('$volFirst'+'vf');</script>";
	 // 	echo "<script>alert('$volLast'+'vl');</script>";
	$zero = "0";


	if($status==$zero){
		// echo "<script>alert('Part 1');</script>";
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
		// echo "<script>alert('Part 2');</script>";
		?>
		<style type="text/css">#inProgress{
		display:none;
		}</style>
		<?php

		if(!$sendNights){
			// echo "<script>alert('Part 2.5');</script>";
			//hide the 'yes' field from house, show the 'no' field
			//we are goign to move this volunteer somewhere else, we will not house them. Depends on vol's available time frame 
			?>
			<style type="text/css">#sendNightPresent{
			display:none;
			}</style>
			<?php
		} else {
			// echo "<script>alert('Part 2.55');</script>";
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
				<h4>A Volunteer Accepted Your Request</h4>
				<h5>Please get in contact with your Volunteer as soon as possible</h5>
				<p>This Volunteer will take you to your home.</p>
			</div>
			<div class="hoizaontal-center">
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Your Volunteer:</div>
					<div class="pandel-body"><?php echo $volFirst; echo ' '; echo $volLast; ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Volunteer Phone:</div>
					<div class="pandel-body"><?php echo $volPhone;  ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Volunteer Email:</div>
					<div class="pandel-body"><?php echo $volEmail;  ?></div>
				</div>
			</div>
		</div>



		<div id="sendNightPresent">
			<div class="panel-title text-center">
				<h4>A Volunteer Accepted Your Request Present</h4>
				<h5>Please get in contact with your Volunteer as soon as possible</h5>
				<p>This Volunteer will provide shuttle and housing for you</p>
			</div>
			<div class="hoizaontal-center">
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Your Volunteer:</div>
					<div class="pandel-body"><?php echo $volFirst; echo ' '; echo $volLast; ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Volunteer Phone:</div>
					<div class="pandel-body"><?php echo $volPhone;  ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Volunteer Email:</div>
					<div class="pandel-body"><?php echo $volEmail;  ?></div>
				</div>
			</div>
			<div class="text-center">
			<a class="btn btn-default" data-toggle="collapse" data-target=".show-coll">Show More Info</a><br><br>
			<div class="show-coll collapse">
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Volunteer Pick Up Time:</div>
					<div class="pandel-body"><?php echo "From: "; echo $volFromTime;  echo " "; echo "To: "; echo $volToTime ?></div>
				</div>
				<div class="panel panel-default text-center" style="max-width:600px;margin-left:auto; margin-right:auto;">
					<div class="panel-heading">Volunteer Comment:</div>
					<div class="pandel-body"><?php echo $volComment ?></div>
				</div>
			</div>
			</div>
		</div>	

	</div>
</body>
</html>




