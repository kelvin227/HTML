<?php
// Establish a PDO connection (adjust connection details)
try {
    $pdo = new PDO("mysql:host=localhost;dbname=gatordb", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $snippetId = $_GET['snippetId'];

    // Retrieve the code snippet from the database based on $snippetId
    $stmt = $pdo->prepare("SELECT snippet_content FROM code_snippets WHERE id = :id");
    $stmt->bindParam(":id", $snippetId, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Output the code snippet
        header('Content-Type: application/javascript');
        echo 'document.write(' . json_encode($row["snippet_content"]) . ');';
    } else {
        echo "// Code snippet not found";
    }
} else {
    // Invalid request method
    header("HTTP/1.1 400 Bad Request");
    echo "Bad Request";
}
?>
