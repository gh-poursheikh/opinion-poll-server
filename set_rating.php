<?php

	include 'setup/db_connection.php';
	$mysqli = openConnection();

    $payload = isset($_POST['params']) ? $_POST['params'] : 'Failed to set POST superglobals.';

	$mysqli -> close();

?>