<?php

	require_once("functions.php");
	require_once("nav.php");
if(loggedIn()){
	$first_id = $_GET['user_id'];
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];


if(isset($_POST['delete'])){
    //$id = $_POST['id_user'];


    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: ("
        . $conn->connect_errno . ") " . $conn->connect_error;
    }

    // $query = "DELETE FROM users WHERE ID=?";
    // $sql = $conn->prepare($query);
    // $sql->bind_param("i", $id);
    // if ($sql->execute()) {
    //     header('location: user.php');
    // } else {
    //     echo ' No ';
    // }


    //email to search
		//$_fname = $_POST['_fname'];
		$_id = $_POST['_id'];
		//$getemail = mysqli_real_escape_string($conn, trim($_POST['email']));
		//mysql search query
		$query = "DELETE FROM users WHERE ID='$_id'";
		$result = mysqli_query($conn, $query);

		//if email exists show data in inputs
		if($result){
			echo 'Data Deleted';
		} else {
			echo 'Data Not Deleted';
		}

	header('location: user.php');
    $conn->close();


} 
} else {
	header('location: login_err.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete A User By ID</title>
	<meta charset="utf-8">
</head>
<body>
	<h2>Are You Sure You Want To Delete This User?</h2>
	<form action="delete_new.php" method="POST">
		ID: <input type="text" name="id" value=<?php echo $first_id ?> disabled required><br><br>
		<input type="text" name="_id" value=<?php echo $first_id ?> hidden>
		First Name: <input type="text" name="_fname" value=<?php echo $fname ?> disabled required><br><br>
		Last Name: <input type="text" name="_lname" value=<?php echo $lname ?> disabled required><br><br>
		<input type="submit" name="delete" value="Yes, Delete User">
		<button>
			<a style="text-decoration: none" href="account.php">I Changed My Mind, Don't Do It!</a>
		</button>
	</form>
</body>
</html>




