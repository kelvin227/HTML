<?php
$c_rows='';
$q_rows='';
$q = "SELECT user_id, COUNT(*) AS total_rows FROM comments WHERE user_id='$user_id'";
$q_result1 = mysqli_query($data, $q);

//check if there ae results
if ($q_result1->num_rows > 0) {
    # code...
    //fetch rows and store in php variable
    $q_info = $q_result1->fetch_assoc();
    $c_rows = $q_info['total_rows'];
}

$q_q = "SELECT user_id, COUNT(*) AS total_rows FROM questions WHERE user_id='$user_id'";
$q_q_result1 = mysqli_query($data, $q_q);

//check if there ae results
if ($q_q_result1->num_rows > 0) {
    # code...
    //fetch rows and store in php variable
    $q_q_info = $q_q_result1->fetch_assoc();
    $q_rows = $q_q_info['total_rows'];
}

$rows = $c_rows + $q_rows;

