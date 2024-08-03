<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-2.1.4.min.js"></script>
    <title>FusionMensenger</title>
</head>
<body>
    
    <div id="message_list"></div>
        <input type="text" name="text" id="text">
        <button type="button" id="send" onclick="send()">Send</button>
</body>
<script>
    
    setInterval(function(){
        $.ajax({
            type: 'GET',
            url: "mess.php",
            dataType: 'text', 
            success: function(messages){
                //update chat interface by appending new messages
                $('#message_list').html(messages);
            }
        });
    }, 500); // fetch new messages every 5 seconds

    const text = document.getElementById('text');
     function send(){
        $.ajax({
            type: 'POST',
            url: 'mess.php', //Replace with your server-side script url
            data: { content: text.value },
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