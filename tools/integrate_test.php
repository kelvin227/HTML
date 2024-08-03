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
    $allowed_types = array('text/html', 'text/plain', 'appplication/json');
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
    <link rel="stylesheet" href="../codemirror-5.65.17/lib/codemirror.css">
    <script src="../codemirror-5.65.17/lib/codemirror.js"></script>
    <script src="../codemirror-5.65.17/mode/javascript/javascript.js"></script>
    <script src="../js/jquery-2.1.4.min.js"></script>
</head>
<body>
    <h1>Code Editor</h1>
<textarea id="myCodeEditor">
</textarea>

<button id="upload-btn" onclick="save();">upload file</button>
<button id="retrieve-btn" onclick = "load()">Retrieve file</button>

<form method="POST" enctype="multipart/form-data">
            <label for="">Image</label>
            <input type="file" name="file">
            <br>
            <input type="submit" value="Submit" name="add">    
        </form>
</body>

<script src="script.js"></script>
<script>
    const editor = CodeMirror.fromTextArea(document.getElementById('myCodeEditor'), {
        mode: 'javascript',
        theme: 'default',
        lineNumbers: true,
        linewrapping: true,
        tabSize: 2,
    });
        editor.setValue('');
    

//make an Ajax reuqst to fetch the file content
const filepath = 'embed.js';
function load(){
    $.ajax({
        type: 'GET',
        url: "save_text.php",
        dataType: 'text', 
        success: function(data){
            editor.setValue(data);
        },
        error: function(xhr, status, error){
                console.log('Error saving file', error);
            }
    });
}
        //send the updated content to the server-side script using ajax
        var updateContent = editor.getValue();
        function save(){
        $.ajax({
            type: 'POST',
            url: 'save_text.php', //Replace with your server-side script url
            data: { content: editor.getValue(), filename: 'embed.js' },
            success: function(response){
                console.log('file saved successfully');
            },
            error: function(xhr, status, error){
                console.log('Error saving file', error);
            }
        });
    };
</script>
</html>