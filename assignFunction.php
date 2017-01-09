<?php
    require_once("functions.php");
    require_once("nav.php");
    echo "<br>";
?>

<?php
	ob_start();
 	$firstName = $_GET["fname"];
 	$lastName = $_GET["lname"];
 	$user_id = $_GET["user_id"];


 	$servername = "localhost";
	$username = "phpmyadmin";
	$password = "phpmaster";
	$dbname = "mytestdatabase";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	     die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT ArrivalTime FROM users WHERE ID='$user_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data 
	    while($row = $result->fetch_assoc()) {
	        $aTime = $row["ArrivalTime"];
	        $myTime = (string)$aTime;

	    }
	} else {
	    echo "0 results";
	}

	$conn->close();

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Assign Student</title>
 </head>
 <body>
 	<h2>Assign Student: <?php echo $firstName; echo " "; echo $lastName;?></h2>

 	<form method="POST" action="">
 		Input ID: <input type="text" name="assignID" id="assignID" placeholder="Please Enter Volunteer ID...">
 		Assign ID: <input type="submit" name="submit" id="submit">
 	</form>

<?php
	$servername = "localhost";
	$username = "phpmyadmin";
	$password = "phpmaster";
	$dbname = "mytestdatabase";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	     die("Connection failed: " . $conn->connect_error);
	} 

	$resultArr = array();
	$stuKey = $_GET['stuKey'];
	$status = $_GET['status'];

	$executingFetchQuery = $conn->query("SELECT * FROM users WHERE user_type='1'");
	//assign the fromtime and totime into an array
	if ($executingFetchQuery){
		while($arr = $executingFetchQuery->fetch_assoc()){
			//convert from 12 hour to 24 hour for both from and to time variables

			$timeFrom = date("H:i", strtotime($arr['volFromTime']));
			$timeTo = date("H:i", strtotime($arr['volToTime']));

			//compare the timeFrom and timeTo with myTime variable to and show only the ones that matches with the vol and stu
			if ($myTime <= $timeFrom && $myTime >= $timeTo){
				$compareArray = array($arr['ID']=>$timeFrom." to ".$timeTo);
?>
				<h3>Available Volunteer: 
<?php  echo $arr['first_name']; echo " "; echo $arr['last_name'];  
?></h3>
<?php
				//prints out the array for vol ID and Time frame
				foreach($compareArray as $x => $x_value) {
				    echo "Volunteer's ID = " . $x . ", Time Available From = " . $x_value;
				    echo "<br><br>";
				}

			 } else if ($timeFrom <= $myTime && $timeTo >= $myTime){
				echo "There are some volunteers that fall out of the time frame of this student.";
		 }
		}

?>

<?php
	if(isset($_POST["submit"])){
		if(!empty($_POST['email'])){
			echo "<script>alert('You need to enter a valid volunteer ID');</script>";
		} else {
			$volID = $_POST["assignID"];
			$thisSql = "UPDATE users SET volKey='$stuKey', status='1' WHERE ID='$volID'";
			$secondSql = "UPDATE users SET status='1' WHERE ID='$user_id'";
			if ($conn->query($thisSql) === TRUE) {
			    // hedaer("location: finalAssign.php");
			    echo "<script>alert('Data Vol updated');</script>";
			} else {
			    echo "<script>alert('Data Vol not updated');</script>";
			}
			if ($conn->query($secondSql) === TRUE) {
			    // hedaer("location: finalAssign.php");
			    echo "<script>alert('Data Stu updated');</script>";
			    exit(0);
			} else {
			    echo "<script>alert('Data Stu not updated');</script>";
			}
		}


	}



?>
<?php

		
	}

	$conn_>close();

?>
 </body>
 </html>




