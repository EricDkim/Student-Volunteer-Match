<?php
    require_once("functions.php");
    require_once("nav.php");
    echo "<br>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Final Assign</title>
</head>
<body>
	<?php
	global $conn;
	$user_id = $_GET["user_id"];//works
	$sql = "SELECT * FROM users WHERE id='$user_id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if($result = $conn->query($sql)){
				while ($row = $result->fetch_row()){
					$querys = "UPDATE `users` SET `status`='1' WHERE `ID`=$user_id";

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
	?>
</body>
</html>