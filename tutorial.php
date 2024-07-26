<?php

require_once 'includes/config.php';
    //check if user is logged in
if($_SESSION['username']) {
    require_once 'includes/lessons.php';
}
else{
    require_once 'login.php';
}
?>
