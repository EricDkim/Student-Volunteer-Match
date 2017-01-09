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



$sql = "SELECT * FROM users WHERE user_type=1 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table id='dt' class='display' cellspacing='0' width='100%'>
     <thead>
     	<tr>
     		<th>Edit</th><th>Delete</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>username</th><th>volFromTime</th><th>volToTime</th><th>volCarStudent</th><th>volCarLuggage</th><th>volTrips</th><th>volComment</th><th>volHomeAddress</th><th>volHomeCity</th><th>volHomeState</th><th>volHomeZip</th><th>volHomeHouse</th><th>volHomeLength</th><th>volHomeFrom</th><th>volHomeTo</th><th>volGenderPref</th><th>volHomeComment</th>
 		</tr><thead>
        <tfoot>
            <tr>
               <th>Edit</th><th>Delete</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>username</th><th>volFromTime</th><th>volToTime</th><th>volCarStudent</th><th>volCarLuggage</th><th>volTrips</th><th>volComment</th><th>volHomeAddress</th><th>volHomeCity</th><th>volHomeState</th><th>volHomeZip</th><th>volHomeHouse</th><th>volHomeLength</th><th>volHomeFrom</th><th>volHomeTo</th><th>volGenderPref</th><th>volHomeComment</th>
           </tr>
       </tfoot>";
     // output data of each row
     while($row = $result->fetch_assoc()) {

         echo "<tr>
            <td><a href='edit_table_user.php?user_id=".$row["ID"]."&fname=".$row["first_name"]."&lname=".$row["last_name"]."&email=".$row["email"]."&phone=".$row["phone"]."'>Edit</a></td>
            <td><a href='delete_new.php?user_id=".$row["ID"]."&fname=".$row["first_name"]."&lname=".$row["last_name"]."'>Delete</a></td>
         	<td>" . $row["first_name"]. "</td> 
         	<td>" . $row["last_name"]. "</td>
         	<td>" . $row["email"]. "</td>
         	<td>" . $row["phone"]. "</td>
            <td>" . $row["username"]. "</td>
            <td>" . $row["volFromTime"]. "</td>
            <td>" . $row["volToTime"]. "</td>
            <td>" . $row["volCarStudent"]. "</td>
            <td>" . $row["volCarLuggage"]. "</td>
            <td>" . $row["volTrips"]. "</td>
            <td>" . $row["volComment"]. "</td>
            <td>" . $row["volHomeAddress"]. "</td>
            <td>" . $row["volHomeCity"]. "</td>
            <td>" . $row["volHomeState"]. "</td>
            <td>" . $row["volHomeZip"]. "</td>
            <td>" . $row["volHomeHouse"]. "</td>
            <td>" . $row["volHomeLength"]. "</td>
            <td>" . $row["volHomeFrom"]. "</td>
            <td>" . $row["volHomeTo"]. "</td>
            <td>" . $row["volGenderPref"]. "</td>
            <td>" . $row["volHomeComment"]. "</td>
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

</head>
<body>

</body>
</html>