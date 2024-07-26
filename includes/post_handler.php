<?php

require_once'dbconnect.php';
session_start();

if(isset($_POST['submit']))
{
    $text=htmlspecialchars($_POST['text']);
    $user_id=$_SESSION['user_id'];
    $timestamp= date('Y-m-d H:i:s', time());

    
    $sql="INSERT INTO questions (text, user_id, time_stamp, ratings) VALUES ('$text','$user_id', '$timestamp', '0')";
    
    $result=mysqli_query($data,$sql);
    
    if($result)
    {
        echo "<script type='text/javascript'>
        
        alert('posted');
        
        </script>";
        
        header("location: ../main_feed.php");
        exit();
    }
    
    else{
        echo "<script type='text/javascript'>
        
        alert('failed to post');
        
        </script>";
    }
    
}
