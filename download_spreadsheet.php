<?php
    
    include 'setup/db_connection.php';
    include 'PhpSpreadsheet/vendor/autoload.php';
	
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

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $Excel_writer = new Xlsx($spreadsheet);

    $spreadsheet->setActiveSheetIndex(0);
    $activeSheet = $spreadsheet->getActiveSheet();

    $activeSheet->setCellValue('A1', 'Product Name');
    $activeSheet->setCellValue('B1', 'Product Average');

    $i = 2;
	foreach ($report as $record) {
        $activeSheet->setCellValue('A'.$i , $record['product_name']);
        $activeSheet->setCellValue('B'.$i , $record['product_average']);
        $i++;
    }

	$filename = 'report.xlsx';
	
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename='. $filename);
	header('Cache-Control: max-age=0');
	$Excel_writer->save('php://output');

    $result -> free_result();
    $stmt -> close();
    $mysqli -> close();
    
?>