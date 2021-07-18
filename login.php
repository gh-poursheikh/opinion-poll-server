<?php

	include 'setup/db_connection.php';
	$mysqli = OpenConnection();

	if(isset($_POST["username"], $_POST["password"])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(!empty($username) && !empty($password)) {
			echo ("Both fields provided!\n");		
		} else {
			echo ("You must fill both fields.\n");
		}

	} else {
		echo "Failed to set POST superglobals.\n";
	}
	$mysqli -> close();

?>
