<?php

	include 'setup/db_connection.php';
    $mysqli = OpenConnection();

	// the variable in which we store the id number of the currently selected data item
    $prdc_id = isset($_POST['product_id']) ? $_POST['product_id'] : 'Failed to set GET superglobals.';

    $mysqli -> close();
?>
