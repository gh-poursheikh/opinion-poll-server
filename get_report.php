<?php
    
    include 'setup/db_connection.php';
	$mysqli = openConnection();

    $query = "SELECT DISTINCT product_id FROM rating";
    $result = $mysqli -> query($query) or die($mysqli -> error);

    if(($result -> num_rows) > 0) {
        while($row = $result -> fetch_assoc()) {
            $product_identifiers[] = $row;
        }
    } else {
        die("table empty!");
    }

    // prepare and bind
    $stmt = $mysqli -> prepare(
                "SELECT product_name, AVG (rating_number) AS product_average FROM (
                SELECT product.product_id, product.product_name, rating.rating_number FROM
                product INNER JOIN rating ON product.product_id = rating.product_id) AS sub_query 
                WHERE product_id = ?");
    $stmt -> bind_param("i", $prdc_id);
    
    foreach ($product_identifiers as $value) {
        $prdc_id = $value["product_id"];

        // execute select query
        if(!$stmt -> execute()) {
            $report['report'] = $stmt -> error;
            die(json_encode($report));
        } else {
            $result = $stmt -> get_result();
            $report[] = $result -> fetch_assoc();
        }
    }

    echo json_encode($report);

    $result -> free_result();
    $stmt -> close();
    $mysqli -> close();
    
?>