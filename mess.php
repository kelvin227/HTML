<?php

//require_once 'includes/config.php';
//$p = "SELECT * FROM profile WHERE userid = '{$_SESSION['user_id']}'";
//$p_result = mysqli_query($data, $p);
//$p_info=$p_result->fetch_assoc();

//if ($p_info['roles'] != 'test'){
//    die('Access denied');
//}
// write the update content to file

require_once 'dbconnect.php';
require_once 'includes/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $sql="INSERT INTO mess (text) VALUES ('$content')";
    $result=mysqli_query($data,$sql);
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
$p = "SELECT * FROM mess";
$p_result = mysqli_query($data, $p);

while($p_info=$p_result->fetch_assoc())
            {
                $message = $p_info['text'];
                echo'<div>'. $message . '</div>';
            }
            
}