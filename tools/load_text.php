<?php
// Use PDO for database connection (adjust connection details)
$pdo = new PDO("mysql:host=localhost;dbname=gatordb", "root", "");

$stmt = $pdo->query("SELECT * FROM saved_texts ORDER BY id DESC LIMIT 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
    echo $row["text_content"];
} else {
    echo "No saved text found.";
}
?>
