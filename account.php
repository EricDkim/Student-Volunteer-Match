<!DOCTYPE html>
<html>
<head>
	<title>Account Page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>

	<?php
		require_once("functions.php");
		require_once("nav.php");
	?>
	<?php 
	if(loggedIn()){ 

	?>
	<?php
		if(!loggedIn()){
			header("location: error.php");
		}
	?>


	<h3><?php

	?>
	<?php } ?>
	</h3>
<?php if (loggedIn()){ ?>
<?php if(getUser_value("user_type") == "0"){ ?>
<h3>Student Page For</h3>
<?php
	// if($resultss=$conn->query("SELECT status FROM users WHERE user_type='0'")){
	// $row_cnts = $resultss->num_rows;
	echo getUser_value("first_name");
?>
<?php } else if(getUser_value("user_type") == "1") {?>
<h3>Volunteer Page</h3>
<?php
	// if($resultss=$conn->query("SELECT status FROM users WHERE user_type='0'")){
	// $row_cnts = $resultss->num_rows;
	echo getUser_value("first_name");
?>
<?php } else { ?>

<?php
			if($results=$conn->query("SELECT status FROM users WHERE user_type='0'")){
			$row_cnt = $results->num_rows;
		}

			echo "<h4>Welcome Admin ".getUser_value("first_name")."</h4>";
			echo "There are ";
			echo $row_cnt;
			echo " Student who needs volunteers";
			echo "<br>";
			echo "Please choose from the tabs from above to complete any administrative actions.";
}} ?>

	<?php
		// This works
		// $test = "simple";
		// $hash = password_hash($test, PASSWORD_DEFAULT);
		// echo $hash;

		if(isset($_POST["submit"])){
			if(!empty($_POST['flight_num'])){
				$flight_num = $_POST["flight_num"];
				$airline = $_POST["airline"];
				$pickdate = $_POST["pickdate"];
				$timepicker = $_POST["timepicker"];
				$leave_flight_num = $_POST["leave_flight_num"];
				$leave_flight_airline = $_POST["leave_flight_airline"];
				$luggage = $_POST["luggage"];
				$email = $_GET['_email'];

				// echo "<script>alert('$email');</script>";
				// echo "<script>alert('$flight_num');</script>";
				// echo "<script>alert('$airline');</script>";
				// echo "<script>alert('$pickdate');</script>";
				// echo "<script>alert('$timepicker');</script>";
				// echo "<script>alert('$leave_flight_num');</script>";
				// echo "<script>alert('$leave_flight_airline');</script>";
				// echo "<script>alert('$luggage');</script>";

				$conn = new mysqli('localhost', 'phpmyadmin','phpmaster', 'mytestdatabase') or die(mysqli_error()); // db connection
				$db = mysqli_select_db($conn, 'mytestdatabase') or die("DB Error"); // select from db
				// selecting db
				// $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
				// $numrows = mysqli_num_rows($query);


					//insert to mysqli query
					// //the VALUES only get from the html FORM not the p_fist_name values above. 				
					$sql = "UPDATE users SET FlightNum = '".$_POST["flight_num"]."', Airline = '".$_POST["airline"]."', ArrivalDate = '".$_POST["pickdate"]."', ArrivalTime = '".$_POST["timepicker"]."', HomeFlightNum = '".$_POST["leave_flight_num"]."', HomeAirline = '".$_POST["leave_flight_airline"]."', Luggage = '".$_POST["luggage"]."' WHERE email='".$_GET["_email"]."'";
					// result message
					//if($conn->query($sql) === TRUE){
					if(mysqli_query($conn, $sql)){
						echo "<script>alert('Flight and Airport Info Register Success!');</script>";
						header('location: login2.php');
					} else {
						echo "<script>alert('Registration Error!');</script>";
					}
		}else {
				//js alert
				?>
				<script>alert('Required all fields');</script><?php
			}
		}

		if(isset($_POST["submitSend"])){
			if(!empty($_POST["sendPhone"])){
				$sendNights = $_POST["sendNights"];
				$sendAddress = $_POST["sendAddress"];
				$sendCity = $_POST["sendCity"];
				$sendState = $_POST["sendState"];
				$sendZip = $_POST["sendZip"];
				$sendPhone = $_POST["sendPhone"];
				$email = $_GET['_email'];

		

				$conn = new mysqli('localhost', 'phpmyadmin','phpmaster', 'mytestdatabase') or die(mysqli_error()); // db connection
				$db = mysqli_select_db($conn, 'mytestdatabase') or die("DB Error"); // select from db
				// selecting db
				// $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
				// $numrows = mysqli_num_rows($query);


					//insert to mysqli query
					// //the VALUES only get from the html FORM not the p_fist_name values above. 
					$sql = "UPDATE users SET sendNights = '".$_POST["sendNights"]."', sendAddress = '".$_POST["sendAddress"]."', sendCity = '".$_POST["sendCity"]."', sendState = '".$_POST["sendState"]."', sendZip = '".$_POST["sendZip"]."', sendPhone = '".$_POST["sendPhone"]."' WHERE email='".$_GET["_email"]."'";
					// result message
					//if($conn->query($sql) === TRUE){
					if(mysqli_query($conn, $sql)){
						echo "<script>alert('Housing Stay Info Registration Success!');</script>";
						header('location: login2.php');
					} else {
						echo "<script>alert('Housing Stay Registration Error!');</script>";
					}
		}else {
				//js alert
				?>
				<script>alert('Required all fields for send');</script><?php
			}
		}

		if(isset($_POST["submit2send"])){
			if(!empty($_POST["send2address"])){
				$send2address = $_POST["send2address"];
				$send2city = $_POST["send2city"];
				$send2state = $_POST["send2state"];
				$send2zip = $_POST["send2zip"];
				$send2phone = $_POST["send2phone"];
				$comment = $_POST["comment"];
				$email = $_GET['_email'];

				echo "<script>alert('$send2address');</script>";
				echo "<script>alert('$send2city');</script>";
				echo "<script>alert('$send2state');</script>";
				echo "<script>alert('$send2zip');</script>";
				echo "<script>alert('$send2phone');</script>";
				echo "<script>alert('$comment');</script>";
				echo "<script>alert('$email');</script>";

		

				$conn = new mysqli('localhost', 'phpmyadmin','phpmaster', 'mytestdatabase') or die(mysqli_error()); // db connection
				$db = mysqli_select_db($conn, 'mytestdatabase') or die("DB Error"); // select from db
				// selecting db
				// $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
				// $numrows = mysqli_num_rows($query);


					//insert to mysqli query
					// //the VALUES only get from the html FORM not the p_fist_name values above. 
					$sql = "UPDATE users SET send2address = '".$_POST["send2address"]."', send2city = '".$_POST["send2city"]."', send2state = '".$_POST["send2state"]."', send2zip = '".$_POST["send2zip"]."', send2phone = '".$_POST["send2phone"]."', comment = '".$_POST["comment"]."' WHERE email='".$_GET["_email"]."'";
					// result message
					//if($conn->query($sql) === TRUE){
					if(mysqli_query($conn, $sql)){
						echo "<script>alert('Housing Send Info Registration Success!');</script>";
						header('location: login2.php');
					} else {
						echo "<script>alert('Housing Send Registration Error!');</script>";
					}
		}else {
				//js alert
				?>
				<script>alert('Required all fields for send');</script><?php
			}
		}

		if(isset($_POST["submitVolFlight"])){
			if(!empty($_POST["start_picktime"])){
				$start_picktime = $_POST["start_picktime"];
				$end_picktime = $_POST["end_picktime"];
				$pick_student = $_POST["pick_student"];
				$pick_luggage = $_POST["pick_luggage"];
				$trips = $_POST["trips"];
				$volComment = $_POST["volComment"];
				$email = $_GET['_email'];

				echo "<script>alert('$start_picktime');</script>";
				echo "<script>alert('$end_picktime');</script>";
				echo "<script>alert('$pick_student');</script>";
				echo "<script>alert('$pick_luggage');</script>";
				echo "<script>alert('$trips');</script>";
				echo "<script>alert('$volComment');</script>";
				echo "<script>alert('$email');</script>";

		

				$conn = new mysqli('localhost', 'phpmyadmin','phpmaster', 'mytestdatabase') or die(mysqli_error()); // db connection
				$db = mysqli_select_db($conn, 'mytestdatabase') or die("DB Error"); // select from db
				// selecting db
				// $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
				// $numrows = mysqli_num_rows($query);


					//insert to mysqli query
					// //the VALUES only get from the html FORM not the p_fist_name values above. 
					$sql = "UPDATE users SET volFromTime = '".$_POST["start_picktime"]."', volToTime = '".$_POST["end_picktime"]."', volCarStudent = '".$_POST["pick_student"]."', volCarLuggage = '".$_POST["pick_luggage"]."', volTrips = '".$_POST["trips"]."', volComment = '".$_POST["volComment"]."' WHERE email='".$_GET["_email"]."'";
					// result message
					//if($conn->query($sql) === TRUE){
					if(mysqli_query($conn, $sql)){
						echo "<script>alert('Volunteer Flight and Airpot Info Registered!!!');</script>";
						header('location: login2.php');
					} else {
						echo "<script>alert(Volunteer Flight and Airport Info Error!!!');</script>";
					}
		}else {
				//js alert
				?>
				<script>alert('Required all fields for send');</script><?php
			}
		}

		if(isset($_POST["submitVolHome"])){
			if(!empty($_POST["volHomeAddress"])){
				$volHomeAddress = $_POST["volHomeAddress"];
				$volHomeCity = $_POST["volHomeCity"];
				$volHomeState = $_POST["volHomeState"];
				$volHomeZip = $_POST["volHomeZip"];
				$house_students = $_POST["house_students"];
				$house_length = $_POST["house_length"];
				$volPickdateFrom = $_POST["volPickdateFrom"];
				$volPickdateTo = $_POST["volPickdateTo"];
				$gender_pref = $_POST["gender_pref"];
				$volHomeComment = $_POST["volHomeComment"];
				$email = $_GET['_email'];

				echo "<script>alert('$volHomeAddress');</script>";
				echo "<script>alert('$volHomeCity');</script>";
				echo "<script>alert('$volHomeState');</script>";
				echo "<script>alert('$volHomeZip');</script>";
				echo "<script>alert('$house_students');</script>";
				echo "<script>alert('$house_length');</script>";
				echo "<script>alert('$volPickdateFrom');</script>";
				echo "<script>alert('$volPickdateTo');</script>";
				echo "<script>alert('$volHomeComment');</script>";
				echo "<script>alert('$email');</script>";

		

				$conn = new mysqli('localhost', 'phpmyadmin','phpmaster', 'mytestdatabase') or die(mysqli_error()); // db connection
				$db = mysqli_select_db($conn, 'mytestdatabase') or die("DB Error"); // select from db
				// selecting db
				// $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
				// $numrows = mysqli_num_rows($query);


					//insert to mysqli query
					// //the VALUES only get from the html FORM not the p_fist_name values above. 
					$sql = "UPDATE users SET volHomeAddress = '".$_POST["volHomeAddress"]."', volHomeCity = '".$_POST["volHomeCity"]."', volHomeState = '".$_POST["volHomeState"]."', volHomeZip = '".$_POST["volHomeZip"]."', volHomeHouse = '".$_POST["house_students"]."', volHomeLength = '".$_POST["house_length"]."', volHomeFrom = '".$_POST["volPickdateFrom"]."', volHomeTo = '".$_POST["volPickdateTo"]."', volGenderPref = '".$_POST["gender_pref"]."', volHomeComment = '".$_POST["volHomeComment"]."' WHERE email='".$_GET["_email"]."'";
					// result message
					//if($conn->query($sql) === TRUE){
					if(mysqli_query($conn, $sql)){
						echo "<script>alert('Volunteer Home Info Registered!!!');</script>";
						header('location: login2.php');
					} else {
						echo "<script>alert(Volunteer Home Info Error!!!');</script>";
					}
		}else {
				//js alert
				?>
				<script>alert('Required all fields for send');</script><?php
			}
		}


	?>
	<script type="text/javascript">
		$('.collThis').on('show', function () {
    var actives = $(this).find('.collapse.in'),
        hasData;
    
    if (actives && actives.length) {
        hasData = actives.data('collapse')
        if (hasData && hasData.transitioning) return
        actives.collapse('hide')
        hasData || actives.data('collapse', null)
    }
});
	</script>
	<script type="text/javascript">
		// $(document).ready(function() {
  //       $("#main input").datepicker();
  //  		 });
		// $('.timepicker').wickedpicker();

		// // document.getElementById("yes2").onclick = function(){
		// // 	document.getElementById("accordian1").style.display = "block";
		// // }
		// // document.getElementById("no2").onclick = function(){
		// // 	document.getElementById("accordian2").style.display = "block";
		// // }
		// if(document.getElementById("yes2").onclick){
		// 	function showYes(){
		// 		document.getElementById("accordian1").style.display = "block";
		// 	}
		// } else if(document.getElementById("no2").onclick){
		// 		document.getElementById("accordian2").style.display = "block";
		// }


	</script>
	<!-- <script src="node_modules/datatables.net/js/jquery.dataTables.js"></script> -->
<!-- 	<script src="spage_validator.js"></script>
	<script src="bootstrap-timepicker.js"></script>
	<script src="bootstrap-datepicker.js"></script>
	<script src="wickedpicker.js"></script>
	<script src="student.js"></script>
	<script src="spage_valid.js"></script>
	<script src="spage2_valid.js"></script> -->
</body>
</html>