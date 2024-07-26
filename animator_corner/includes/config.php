<?php
session_start();
$session_timeout = 5 * 60;

if(isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)) {
    session_unset();
    session_destroy();
}
$_SESSION['last_activity'] = time();