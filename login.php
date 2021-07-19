<?php

	include 'setup/db_connection.php';
	$mysqli = openConnection();

	if(isset($_POST["username"], $_POST["password"])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(!empty($username) && !empty($password)) {
			$query = "SELECT * FROM person WHERE username = '$username' AND password = '$password'";
			$result = $mysqli -> query($query);
			
			$json = $result -> fetch_assoc();
			echo json_encode($json);

			$result -> free_result();
		} else {
			echo ("You must fill both fields.\n");
		}

	} else {
		echo "Failed to set POST superglobals.\n";
	}

	$mysqli -> close();

?>
