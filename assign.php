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


$sql = "SELECT * FROM users WHERE user_type=0 AND status='0'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table id='dt' class='display' cellspacing='0' width='100%'>
        <thead>
        <tr>
            <th>Assign Student</th><th data-field='name' data-sortable='true'>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Level</th><th>Major</th>
        </tr></thead>";
     // output data of each row
     while($row = $result->fetch_assoc()) {

         echo "
         <tr>
            <td><a href='assignFunction.php?user_id=".$row["ID"]."&fname=".$row["first_name"]."&lname=".$row["last_name"]."&stuKey=".$row["stuKey"]."&status=".$row["status"]."'>Assign</a></td>
            <td>" . $row["first_name"]. "</td> 
            <td>" . $row["last_name"]. "</td>
            <td>" . $row["email"]. "</td>
            <td>" . $row["phone"]. "</td>
            <td>" . $row["level"]. "</td>
            <td>" . $row["Major"]. "</td>
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
<script>
	var guids = guid();
</script>

<?php
	//finished getting GUID
	//need to somehow get students arrival time match with volunteers available timing
	/*
		Select student first, then have that students arrival time value dictate which volunteer will be shown
		This can be done by using a table to show the list of students first
		In the side of the table, a button can be implemented to select the student of choice
		The selected student can then use its arrival time to show any volunteers that match with their time
		If no volunteers are available, then print out a simple alert saying no volunteers present
		If however, there is a volunteer available, then generate the GUID and assign to each the student and the volunteer in their 
			'key' field within the DB
		The student and the volunteer will be notified that they have been matched. 
	*/


?>


<!DOCTYPE html>
<html>
<head>
	<title>Assign Partner</title>
    <link rel="stylesheet" type="text/css" href="node_modules/datatables.net-dt/css/jquery.dataTables.css">
    <script type="text/javascript" src="node_modules/datatables.net/js/jquery.dataTables.js"></script>
    <style type="text/css">
		table, th, td {
     	border: 1px solid black;
			}
	</style>

</head>
<body>

<!-- 	use this late for GUID -->
	<div id="jsIdResult">

	<!-- Print out the list of students -->
	


</body>
<script src="guid.js"></script>
<script>
	var thisDemo = document.getElementById('jsIdResult').value = guid();
	document.getElementById("demo").innerHTML = thisDemo;

</script>

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


</html>