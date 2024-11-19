<?php

require_once 'includes/config.php';
    //check if user is logged in
if($_SESSION['username']) {
    require_once 'includes/vprofile.php';
}
else{
    //user is not loggen in, redirect to the login page
    header("location: login.php");
    exit;
}
?>
