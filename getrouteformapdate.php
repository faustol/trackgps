<?php
    include 'dbconnect.php';
    
    $sessionid   = isset($_GET['sessionid']) ? $_GET['sessionid'] : '0';
    $dateid   = isset($_GET['dateid']) ? $_GET['dateid'] : '0';
	$horaInicio   = isset($_GET['horaInicio']) ? $_GET['horaInicio'] : '00:00';
	$horaFin   = isset($_GET['horaFin']) ? $_GET['horaFin'] : '23:59';
    $stmt = $pdo->prepare('CALL prcGetRouteForMapdate(:sessionID,:dateid,:horaInicio,:horaFin)');     
    $stmt->execute(array(':sessionID' => $sessionid,':dateid'=>$dateid,':horaInicio'=>$horaInicio,':horaFin'=>$horaFin));
    $json = '{ "locations": [';

    foreach ($stmt as $row) {
        $json .= $row['json'];
        $json .= ',';
    }

    $json = rtrim($json, ",");
    $json .= '] }';

    header('Content-Type: application/json');
    echo $json;

?>