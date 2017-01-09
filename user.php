<?php
    require_once("functions.php");
    require_once("nav.php");
    echo "<br>";

if(loggedIn()){

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
#fdadas


$sql = "SELECT * FROM users WHERE user_type=0 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table id='dt' class='display' cellspacing='0' width='100%'>
        <thead>
        <tr>
            <th>Edit</th><th>Delete</th><th data-field='name' data-sortable='true'>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Level</th><th>Major</th><th>Username</th><th>FlightNum</th><th>Airline</th><th>ArrivalDate</th><th>ArrivalTime</th><th>HomeFlightNum</th><th>HomeAirline</th><th>Luggage</th><th>sendNights</th><th>sendAddress</th><th>sendCity</th><th>sendState</th><th>sendZip</th><th>sendPhone</th><th>send2address</th><th>send2city</th><th>send2state</th><th>send2zip</th><th>send2phone</th><th>comment</th>
        </tr></thead>
        <tfoot>
            <tr>
                <th>Edit</th><th>Delete</th><th data-field='name' data-sortable='true'>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Level</th><th>Major</th><th>Username</th><th>FlightNum</th><th>Airline</th><th>ArrivalDate</th><th>ArrivalTime</th><th>HomeFlightNum</th><th>HomeAirline</th><th>Luggage</th><th>sendNights</th><th>sendAddress</th><th>sendCity</th><th>sendState</th><th>sendZip</th><th>sendPhone</th><th>send2address</th><th>send2city</th><th>send2state</th><th>send2zip</th><th>send2phone</th><th>comment</th>
                </tr>
        </tfoot>";
     // output data of each row
     while($row = $result->fetch_assoc()) {

         echo "
         <tr>
            <td><a href='edit_table_user.php?user_id=".$row["ID"]."&fname=".$row["first_name"]."&lname=".$row["last_name"]."&email=".$row["email"]."&phone=".$row["phone"]."'>Edit</a></td>
            <td><a href='delete_new.php?user_id=".$row["ID"]."&fname=".$row["first_name"]."&lname=".$row["last_name"]."'>Delete</a></td>
            <td>" . $row["first_name"]. "</td> 
            <td>" . $row["last_name"]. "</td>
            <td>" . $row["email"]. "</td>
            <td>" . $row["phone"]. "</td>
            <td>" . $row["level"]. "</td>
            <td>" . $row["Major"]. "</td>
            <td>" . $row["username"]. "</td>
            <td>" . $row["FlightNum"]. "</td>
            <td>" . $row["Airline"]. "</td>
            <td>" . $row["ArrivalDate"]. "</td>
            <td>" . $row["ArrivalTime"]. "</td>
            <td>" . $row["HomeFlightNum"]. "</td>
            <td>" . $row["HomeAirline"]. "</td>
            <td>" . $row["Luggage"]. "</td>
            <td>" . $row["sendNights"]. "</td>
            <td>" . $row["sendAddress"]. "</td>
            <td>" . $row["sendCity"]. "</td>
            <td>" . $row["sendState"]. "</td>
            <td>" . $row["sendZip"]. "</td>
            <td>" . $row["sendPhone"]. "</td>
            <td>" . $row["send2address"]. "</td>
            <td>" . $row["send2city"]. "</td>
            <td>" . $row["send2state"]. "</td>
            <td>" . $row["send2zip"]. "</td>
            <td>" . $row["send2phone"]. "</td>
            <td>" . $row["comment"]. "</td>
            </tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}
} else {
    header('location: login_err.php');
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Only Page</title>
    <link rel="stylesheet" type="text/css" href="node_modules/datatables.net-dt/css/jquery.dataTables.css">
    <script type="text/javascript" src="node_modules/datatables.net/js/jquery.dataTables.js"></script>
	<style type="text/css">
		table, th, td {
     	border: 1px solid black;
			}
	</style>
</head>
<body>

<script type="text/javascript">
    $(document).ready(function() {
    $('#dt').DataTable({
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]
    });
} );
</script>

</body>
</html>