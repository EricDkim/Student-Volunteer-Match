<?php

	session_start();

	require_once("connection.php");
	function loggedIn(){
		if(isset($_SESSION["user_id"])){
			return true;
		} else {
			return false;

		}
	}

	function getuser_value($field_name) {

		global $conn;
		$user_id = $_SESSION["user_id"];
		$sql = "SELECT $field_name FROM users WHERE id='$user_id'";
		//$sql = "SELECT * FROM users WHERE id='$user_id'";

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		return $row[$field_name];
	}

	// function delete_user($field_name){
	// 	global
	// }
?>