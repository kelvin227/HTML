
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gator School</title>
    <link rel="stylesheet" href="../css/bootstrap.css">

<style>
    body{
        background-color: limegreen;
    }
    .auth{
    margin-top: 15%;
    background-color: black;
    width: 30%;
    border-radius: 10px;
    }
    .auth form{
        padding: 5%;
    
    }
    .auth form label, submit, h2{
        color: white;
    }
</style>
</head>
<body>
    <div class="navbar nav-inverse" style="background-color: black;">
    <ul class="nav navbar-nav">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../tutorial/courses.php">Courses</a></li>
        <li><a href="lessons.php">Lesssons</a></li>
        <li><a href="">Exams</a></li>
        <li><a href="">Help</a></li>
    </ul>
</div>


<?php
require_once '../includes/config.php';
require_once '../dbconnect.php';
// Check if the form was submitted
if(isset($_SESSION['username'])){
//check if user is logged in
if($_SESSION['username']) {
    //check for user data in the gator school
    $edu = "SELECT * FROM tutorial_progress WHERE user_id='{$_SESSION['user_id']}'";
    $q_edu = mysqli_query($data, $edu);
    $edu_info = $q_edu->fetch_assoc();
    $row_count=mysqli_num_rows($q_edu);

    if($row_count != 1)
    {
        echo"<center style='color: white; font-size: 120%;'><b>Go to the Course Page to take a course</b></center>";
    }
    else{
        echo $edu_info['course'];
    }
}else{
    
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    // Validate user input
    if (empty($username) || empty($pass)) {
        $_SESSION['error'] = "Username and password are required";
        exit;
    }

    try {
        // Establish database connection
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute SQL query to retrieve user data
        $stmt = $conn->prepare("SELECT * FROM profile WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Fetch user data
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_data) {
            // Verify password (plaintext comparison)
            if ($pass == $user_data['password']) {
                // Authentication successful
                $_SESSION['username'] = $user_data['username'];
                $_SESSION['user_id'] = $user_data['userid'];
                header("Location: lessons.php");
                exit;
            } else {
                // Invalid password
                $_SESSION['error'] = "Invalid username or password";
                exit;
            }
        } else {
            // User not found
            $_SESSION['error'] = "User not found";
            echo$_SESSION["error"];
            exit;
        }
    } catch (PDOException $e) {
        // Database connection error
        $_SESSION['error'] = "Database connection error: " . $e->getMessage();
        echo$_SESSION["error"];
        exit;
    }
} else {
}
echo"
<center>
<div class='auth'>
<form action='' method='post'>
<h2>Sign In</h2><br />
<label for=''>Username</label>
<input type='text' name='username' placeholder='username'><br />
<label for=''>Password</label>
<input type='password' name='password' placeholder='password'><br /><br>
<input type='submit' value='Submit' class='btn btn-success' name='submit'>
</form>
</center>
</div>
";
}

} else{
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $pass = $_POST['password'];
    
        // Validate user input
        if (empty($username) || empty($pass)) {
            $_SESSION['error'] = "Username and password are required";
            exit;
        }
    
        try {
            // Establish database connection
            $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Prepare and execute SQL query to retrieve user data
            $stmt = $conn->prepare("SELECT * FROM profile WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
    
            // Fetch user data
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user_data) {
                // Verify password (plaintext comparison)
                if ($pass == $user_data['password']) {
                    // Authentication successful
                    $_SESSION['username'] = $user_data['username'];
                    $_SESSION['user_id'] = $user_data['userid'];
                    header("Location: lessons.php");
                    exit;
                } else {
                    // Invalid password
                    $_SESSION['error'] = "Invalid username or password";
                    exit;
                }
            } else {
                // User not found
                $_SESSION['error'] = "User not found";
                echo$_SESSION["error"];
                exit;
            }
        } catch (PDOException $e) {
            // Database connection error
            $_SESSION['error'] = "Database connection error: " . $e->getMessage();
            echo$_SESSION["error"];
            exit;
        }
    } else {
    }
    echo"
    <center>
    <div class='auth'>
    <form action='' method='post'>
    <h2>Sign In</h2><br />
    <label for=''>Username</label>
    <input type='text' name='username' placeholder='username'><br />
    <label for=''>Password</label>
    <input type='password' name='password' placeholder='password'><br /><br>
    <input type='submit' value='Submit' class='btn btn-success' name='submit'>
    </form>
    </center>
    </div>
    ";
    }
    
?>

</body>
</html>