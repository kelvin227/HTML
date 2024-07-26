<?php
require_once 'includes/config.php';

//check if the session expiration time is set


if(isset($_SESSION['expire_time'])) {
    //check if the session has expired
    if(time() > $_SESSION['expire_time']){
        session_unset();
        session_destroy();
        echo json_encode(['status' => 'expired']);
        exit;
    }
}

echo json_encode(['status' => 'active']);