<?php

require_once 'config.php';
    //check if user is logged in
if($_SESSION['username']) {
    require_once 'postfeed_include.php';
}
else{
    //user is not loggen in, redirect to the login page
    header("location: ../login.php");
    exit;
}
