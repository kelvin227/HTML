
<!-- partial:index.partial.html -->
<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

require_once 'includes/config.php';
    //check if user is logged in
if($_SESSION['username']) {
    require_once 'tools/sidebar.php';
}
else{
    //user is not loggen in, redirect to the login page
    header("location: login.php");
    exit;
}
?>
