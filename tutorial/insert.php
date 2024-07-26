<?php

require_once '../includes/dbconnect.php';
 

    if (isset($_POST['add'])) {
        # code...
        $file = $_FILES['img']['name'];

        $file_db = "image/".$file;

        $dst = "./image/".$file;

        move_uploaded_file($_FILES['img']['tmp_name'], $dst);

        $sql = "INSERT INTO tutorials(img) VALUES ('$file_db')";
        $q_insert = mysqli_query($data, $sql);
 
        if($q_insert){
            echo"success";
        } 
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>edit courses</title>
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Image</label>
            <input type="file" name="img">
            <br>
            <input type="submit" value="Submit" name="add">    
        </form>
    </body>
    </html>