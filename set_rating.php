<?php

	include 'setup/db_connection.php';
	$mysqli = openConnection();

    $payload = isset($_POST['params']) ? $_POST['params'] : 'Failed to set POST superglobals.';

    // convert json object to php associative array (user ratings)
    // each element of this array would be an object with three fields:
    // person_id, product_id and rating_number
    $ratings_array = json_decode($payload, true);

    // prepare and bind
    $stmt = $mysqli -> prepare("INSERT INTO rating (person_id, product_id, rating_number) VALUES (?, ?, ?)");
    $stmt -> bind_param("sss", $prsn_id, $prdc_id, $rtng_number);

    foreach ($ratings_array as $value) {
        $prsn_id = $value["person_id"];
        $prdc_id = $value["product_id"];
        $rtng_number = $value["rating_number"];

        // execute insert query
        if(!$stmt -> execute()) {
            $result['result'] = $stmt -> error;
            die(json_encode($result));
        }
    }

    // After a successfull insertion into table rating, now it's time to mark 
    // the user as "voted" so that they cannot vote again in the future!
    $query = "UPDATE person SET voted = '1' WHERE person_id = $prsn_id";
    
    if($mysqli -> query($query)){ 
        $result['result'] = "success";
    } else { 
        $result['result'] = $mysqli -> error;
    }
    echo json_encode($result);

    $stmt -> close();
	$mysqli -> close();

?>