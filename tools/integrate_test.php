<?php

require_once '../includes/dbconnect.php';
 
if($_FILES) {
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $file_tmp = $_FILES['file']['tmp_name'];

    //check file size (e.g 2MB)
    if($file_size > 2000000){
        echo "Uploada file less than 2MB!";
    } else{
    //check file extension (e.g, PDF, DOCX, JPG)
    $allowed_types = array('application/pdf'. 'application/msword', 'image/jpeg', 'image/png', 'text/html', 'application/x-httpd-php', 'text/plain', 'appplication/json');
    if(in_array($file_type, $allowed_types)){
    //upload file to server
    move_uploaded_file($file_tmp, "uploads/".$file_name);
    echo "File uploaded Successfully.";
    } else{
    echo"invalid file type";
    }
}
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integration test</title>
<style>
    #codefield{
        width: 80%;
        height: 300px;
        font-size: 18ox;
        padding: 10px;
        border: 1px solid #ccc;
        resize: none;
    }
</style>
</head>
<body>
    <h1>Code Editor</h1>
<textarea id="codefield">
</textarea>

<button id="upload-btn">upload file</button>
<button id="retrieve-btn">Retrieve file</button>

<form method="POST" enctype="multipart/form-data">
            <label for="">Image</label>
            <input type="file" name="file">
            <br>
            <input type="submit" value="Submit" name="add">    
        </form>
</body>

<script src="script.js"></script>
</html>