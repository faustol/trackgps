<?php
    include 'dbconnect.php';
	$login   = isset($_GET['login']) ? $_GET['login'] : '0';
    $clave   = isset($_GET['clave']) ? $_GET['clave'] : '0';
    $stmt = $pdo->prepare('CALL prcGetLogin(:login,:clave);');
     $stmt->execute(array(':login' => $login,':clave'=>$clave));

    $json = '{ "usuarios": [';

    foreach ($stmt as $row) {
        $json .= $row['json'];
        $json .= ',';
    }
   
    $json = rtrim($json, ",");
    $json .= '] }';

    header('Content-Type: application/json');
    echo $json;
?>