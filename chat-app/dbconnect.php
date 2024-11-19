<?php
$dsn="mysql:host=localhost;dbname=speuvwio_eagleway";
$dbusername= "speuvwio_eagleway";
$dbpassword= "@Thanks123";
try{
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e-getMessage();
}