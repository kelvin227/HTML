<?php
$dsn="mysql:host=localhost;dbname=moksipor_Gator_db";
$dbusername= "moksipor_Gator";
$dbpassword= "@Thanks123";

$pdo = new PDO($dsn, $dbusername, $dbpassword);
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);