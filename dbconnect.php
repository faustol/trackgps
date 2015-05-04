<?php

$dbuser = 'mavij365_gps';
//$dbuser = 'root';
$dbpass = 'maslucdl';
$params = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

//$pdo = new PDO('mysql:host=localhost;dbname=mavij365_gpstracker;charset=utf8', $dbuser, $dbpass, $params);
$pdo = new PDO('mysql:host=localhost;dbname=mavij365_gpstracker;charset=utf8', $dbuser, $dbpass, $params);


?>