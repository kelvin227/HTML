<?php
$dsn="mysql:host=localhost;dbname=gatordb";
$dbusername= "root";
$dbpassword= "";

$pdo = new PDO($dsn, $dbusername, $dbpassword);
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);