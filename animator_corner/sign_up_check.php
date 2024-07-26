<?php

#error_reporting(0);
session_start();

include'../dbconnect.php';

if($data==false)
{
    die("connecton error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
    
{
    $username = htmlspecialchars($_POST['username']);
    
    $name = htmlspecialchars($_POST['name']);
    
    $DOB = htmlspecialchars($_POST['dob']);
    
    $email = htmlspecialchars($_POST['email']);
    
    $pass = htmlspecialchars($_POST['password']);
    
    $con_pass = htmlspecialchars($_POST['con_password']);

    $roles = "animator";

    try{
        //establish database connection
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare and execute SQL query to retrieve user data
        $stmt = $conn->prepare("SELECT * FROM profile WHERE username = :username AND roles = :roles");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':roles', $roles);
        $stmt->execute();
        
        // Fetch user data
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        
    
    }catch (PDOException $e) {
        echo "Database connection error: " . $e->getMessage();
    };
    
    if ($stmt->rowCount() > 0)
    {
        $message = "<script type='text/javascript'>
        
        alert('The username has been used already');
        
        </script>";
        
        $_SESSION['loginMessage']=$message;
        
        header("location:sign_up.php");
    }
    
    else{
    
        if($pass = $con_pass)
    {
    $sql ="INSERT INTO profile(username, roles, nam, lvl, level_exp, DOB, email, password) VALUES ('$username', 'animator', '$name', 1, 0, '$DOB','$email', '$pass')";
    
    $sign_up=mysqli_query($data,$sql);
    
    if($sign_up)
    {
        try {
            // Establish database connection
            if ($user_data) {
                $_SESSION['user_id'] = $user_data['userid'];
                $_SESSION['username'] = $user_data['username'];
                header("location:profile.php");

            }
        }
            catch (PDOException $e) {
                echo "Database connection error: " . $e->getMessage();
            };


    } 
    
    else{
        $message = "<script type='text/javascript'>
        
        alert('account failed to create');
        
        </script>";
        
        $_SESSION['loginMessage']=$message;
        
        header("location:sign_up.php");
    }
    
} else{
    $message = "<script type='text/javascript'>
    
    alert('Password does not match');
    
    </script>";
    
    $_SESSION['loginMessage']=$message;
    
    header("location:sign_up.php");    
    
    }

}
}
?>