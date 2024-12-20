<?php
require_once 'dbconnect.php';

session_start();

$user_id = $_SESSION['user_id'];

// Check if the form was submitted
if(isset($_POST["rate"])) {
    $f_c_id = $_POST["commentId"];
    $f_c_user_id = $_POST["userid"];
    $img_value = $_POST["rate"];
    $question_id = $_POST['ids'];
    $page_id = $_POST['page'];

    // Check if the user has already rated the comment
    $check_rate_query = "SELECT * FROM rate WHERE userId = '$user_id' AND commentId = '$f_c_id'";
    $check_rate_result = mysqli_query($data, $check_rate_query);
    $check_rate_info=$check_rate_result->fetch_assoc();

    // If the user hasn't rated the comment yet
    if(mysqli_num_rows($check_rate_result) === 0) {
        // Insert the user's rating into the rate table
        $insert_rate_query = "INSERT INTO rate(commentId, userId, rating) VALUES('$f_c_id', '$user_id', '$img_value')";
        mysqli_query($data, $insert_rate_query);

        if($img_value <= 1 ){
        // Update the ratings for the comment in the comments table
        $update_ratings_query1 = "UPDATE comments SET ratings_good = ratings_good + $img_value WHERE id = '$f_c_id'";
        mysqli_query($data, $update_ratings_query1);

        } else {}

        if($img_value >= -1 ){
            // Update the ratings for the comment in the comments table
            $update_ratings_query2 = "UPDATE comments SET ratings_bad = ratings_bad + $img_value WHERE id = '$f_c_id'";
            mysqli_query($data, $update_ratings_query2);
    
            } else{}

        // Update the user's level experience in the profile table
        $update_level_exp_query3 = "UPDATE profile SET level_exp = (SELECT SUM(ratings_good) FROM comments WHERE user_id='$f_c_user_id') WHERE userid='$f_c_user_id'";
        mysqli_query($data, $update_level_exp_query3);
        
        // Update the user's level based on their level experience
        $update_user_level_query4 = "UPDATE profile SET lvl = 
            CASE
                WHEN level_exp >= 171 THEN 10
                WHEN level_exp >= 151 THEN 9
                WHEN level_exp >= 131 THEN 8
                WHEN level_exp >= 111 THEN 7
                WHEN level_exp >= 91 THEN 6
                WHEN level_exp >= 71 THEN 5
                WHEN level_exp >= 51 THEN 4
                WHEN level_exp >= 31 THEN 3
                WHEN level_exp >= 11 THEN 2
                ELSE 1
            END
        WHERE userid='$f_c_user_id'";
        mysqli_query($data, $update_user_level_query4);

    }else{

        //checks if the user rate is greater or equal to 1 if it is it executes below code
        if($img_value <= 1 ){

        //
        if($check_rate_info['rating'] != $img_value ) {
            //update the rate table in the ratings column
            $update_rate_query5 = "UPDATE rate SET rating = '$img_value' WHERE commentId = '$f_c_id' AND userId = '$user_id'";
            mysqli_query($data, $update_rate_query5);

            // Update the ratings for the comment in the comments table
        $update_ratings_query6 = "UPDATE comments SET ratings_good = ratings_good + $img_value WHERE id = '$f_c_id'";
        mysqli_query($data, $update_ratings_query6);
        }
        //if the user rate is not equal to the one in the database it executes the below code
        else{
            
            

        }
    }
    if($img_value >= -1 ){
        if($check_rate_info['rating'] != $img_value ) {
            //update the rate table in the ratings column
            $update_rate_query7 = "UPDATE rate SET rating = '$img_value' WHERE commentId = '$f_c_id' AND userId = '$user_id'";
            mysqli_query($data, $update_rate_query7);

            // Update the ratings for the comment in the comments table
        $update_ratings_query8 = "UPDATE comments SET ratings_bad = ratings_bad + $img_value WHERE id = '$f_c_id'";
        mysqli_query($data, $update_ratings_query8);
        }
        //if the user rate is not equal to the one in the database it executes the below code
        else{
            
            

        }
    }
    }
}

// Redirect the user back to the post page
header("location: post.php?page=$page_id&ids=$question_id");
?>
