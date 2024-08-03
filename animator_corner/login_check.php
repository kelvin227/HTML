<?php
session_start();
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user input
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username and password are required";
        header("Location: login.php");
        exit;
    }

    // Database connection details
    $host = "localhost";
    $dbname = "gatordb";
    $user = "root";
    $pass = "";

    try {
        // Establish database connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute SQL query to retrieve user data
        $stmt = $conn->prepare("SELECT * FROM profile WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Fetch user data
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_data) {
            // Verify password (plaintext comparison)
            if ($password === $user_data['password']) {
                if($user_data['roles'] === 'animator'){
                // Authentication successful
                $_SESSION['username'] = $user_data['username'];
                $_SESSION['user_id'] = $user_data['userid'];
                header("Location: main_feed.php");
                exit;
                } else{
                    $_SESSION['error'] = "This account isn't an animator account";
                    header("Location: login.php");
                }
            } else {
                // Invalid password
                $_SESSION['error'] = "Invalid username or password";
                header("Location: login.php");
                exit;
            }
        } else {
            // User not found
            $_SESSION['error'] = "User not found";
            header("Location: login.php");
            exit;
        }
    } catch (PDOException $e) {
        // Database connection error
        $_SESSION['error'] = "Database connection error: " . $e->getMessage();
        header("Location: login.php");
        exit;
    }
} else {
    // Redirect if form not submitted
    header("Location: login.php");
    exit;
}
?>
