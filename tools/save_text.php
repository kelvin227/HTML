<?php
require_once"../includes/dbconnect.php";
// Establish a PDO connection (adjust connection details)
try {
    $pdo = new PDO("mysql:host=localhost;dbname=gatordb", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Validate and sanitize user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $snippetName = $_POST["snippetName"];
    $codeSnippet = $_POST["codeSnippet"];

    // Validate input size
    if (strlen($snippetName) > 255 || strlen($codeSnippet) > 1000) {
        echo "Input is too long.";
        exit();
    }

    // Sanitize input
    $sanitizedName = filter_var($snippetName, FILTER_SANITIZE_STRING);
    $sanitizedSnippet = filter_var($codeSnippet, FILTER_SANITIZE_STRING);

    // Save the code snippet securely
    try {
        $stmt = $pdo->prepare("INSERT INTO code_snippets (snippet_name, snippet_content) VALUES (:name, :snippet)");
        $stmt->bindParam(":name", $sanitizedName, PDO::PARAM_STR);
        $stmt->bindParam(":snippet", $sanitizedSnippet, PDO::PARAM_STR);
        $stmt->execute();

        
        $sql = "SELECT * FROM code_snippets WHERE snippet_name = '$snippetName'";
        $result=mysqli_query($data,$sql);
        $info=$result->fetch_assoc();
        
        $embed = htmlspecialchars("<script src='http://127.0.0.1/HTML/tools/embed.js' data-snippet-id='{$info["id"]}'></script>")
;
        
        echo "Code saved successfully! $embed";
    } catch (PDOException $e) {
        echo "Error saving code snippet: " . $e->getMessage();
    }
} else {
    // Redirect or handle invalid requests
    header("Location: code_editor_form.html");
    exit();
}
?>
