<?php

	require_once 'db_connection_params.php';

	header('Content-Type: application/json; charset=utf-8');

	function openConnection()
 	{
 		$mysqli = new mysqli(dbhost, dbuser, dbpass, dbname) or die("Connection failed: " . $mysqli -> connect_error);
 		return $mysqli;
 	}

?>