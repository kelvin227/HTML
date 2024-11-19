<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$text = $_POST['content'];
$user_id = $_SESSION['user_id'];
date_default_timezone_set('Africa/Lagos');
$timestamp = date('Y-m-d H:i:s'); // 24-hour format
$ratings = 0;

require_once 'db.inc.php';

$sql = "INSERT INTO questions(q, user_id, time_stamp, ratings) VALUES (?, ?, ?, ?);";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([$text, $user_id, $timestamp, $ratings]);
} catch (PDOException $e) {
    // Handle potential database errors
    die("Error: " . $e->getMessage());
}

// Clean up
$pdo = null;
$stmt = null;

// Optionally redirect or output a success message
die("Question submitted successfully.");
} else{
    header("location: index.php");
}
