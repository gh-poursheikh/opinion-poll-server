<?php

	include 'setup/db_connection.php';
    $mysqli = openConnection();

	// the variable in which we store the id number of the currently selected data item
    $prdc_id = isset($_POST['product_id']) ? $_POST['product_id'] : 'Failed to set GET superglobals.';

    $query = "SELECT * FROM product WHERE product_id BETWEEN ($prdc_id+1) AND ($prdc_id+4)";
    $result = $mysqli -> query($query);

    while($row = $result -> fetch_assoc()) {
        $array[] = $row;
    }

    echo json_encode($array);

    $result -> free_result();
    $mysqli -> close();
?>
