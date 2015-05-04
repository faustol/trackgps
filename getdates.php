<?php
    include 'dbconnect.php';

    $stmt = $pdo->prepare('CALL prcGetDates();');
    $stmt->execute();

    $json = '{ "dates": [';

    foreach ($stmt as $row) {
        $json .= $row['json'];
        $json .= ',';
    }
   
    $json = rtrim($json, ",");
    $json .= '] }';

    header('Content-Type: application/json');
    echo $json;
?>
