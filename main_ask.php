<?php
require_once 'includes/config.php';
require_once 'includes/post_handler.php';

$user_id = $_SESSION['user_id'];
 
$p = "SELECT * FROM profile WHERE userid = '$user_id'";
$p_result = mysqli_query($data, $p);
$p_info = $p_result->fetch_assoc();


//check if user is logged in
if($_SESSION['username']) {
    require_once"includes/Ask.php";
}
else{
    //user is not loggen in, redirect to the login page
    header("location:login.php");
    exit;
}
?>