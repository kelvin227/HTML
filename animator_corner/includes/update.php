<?php
session_start();

include'dbconnect.php';

if($data==false)
{
    die("connecton error");
    echo'error';
}


if($_SERVER["REQUEST_METHOD"]=="POST")
    
{
    $username = htmlspecialchars($_POST['username']);
    
    $name = htmlspecialchars($_POST['name']);

    $Bio = htmlspecialchars($_POST['bio']);
    
    $DOB = htmlspecialchars($_POST['dob']);
    
    $email = htmlspecialchars($_POST['email']);
    
    
    $sql =$data->prepare("UPDATE profile SET username = ?, nam=?, Bio = ?, DOB = ?, email = ?  WHERE userid = '{$_SESSION['user_id']}'");
    

    $sign_up=$sql->execute(array($username, $name, $Bio, $DOB, $email));
    
    if($sign_up)
    {   
        header("location:../profile.php");
    }
    
    else{
         echo "<script type='text/javascript'>
        
        alert('There was an error while updating profile');
        
        </script>";
        header("location:profile.php");
    }
    
    
    

}

?>
