<?php

// process_data.php
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $name = $_POST['name'];
    // Process the name
    // For example, log the name or perform any required action
//    file_put_contents('log.txt', "Name: " . $name . PHP_EOL, FILE_APPEND);
//    echo "Received name: " . $name;
//} else {
//    echo "Invalid request method.";
//}




//get data
$data = [
    'status' => 'success',
    'message' => 'data retrieved successfully',
    'data1' => [
        'key1' => 'value1',
        'key2' => 'value2'
    ],
    'data2' => [
        "name" => 'KELLY'
        ]
];
header('Content-Type: application/json');
echo json_encode($data);


?>
