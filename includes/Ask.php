<?php
require_once 'dbconnect.php';
$user_id = $_SESSION['user_id'];
 
$p = "SELECT * FROM profile WHERE userid = '$user_id'";
$p_result = mysqli_query($data, $p);
$p_info = $p_result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask community</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-2.1.4.min.js"></script>
    <style>
        body{
            background-color: #cbccce;
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .form{
            padding: 10px;
            width: 100%;
            max-width: 330px;
            margin: auto;
            background: #d8d8d6;
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            border-left: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.2);
            border-radius: 3px;
        }
        table tr{
        }

        table .row2 td:nth-child(2), .row2 td:nth-child(3){
            border: 10px solid black;
            border-collapse: collapse;
            background-color: black; 
        }
        
        table .row1 .td1 {
            border-radius: 10px !important;
            background-color: #10ffff;
        }
        .info{
            background-color: #ccd0cf;
            border: 1px hidden black;
            width: 10%;
            border-radius: 100px;
            float: right;
            text-align: center;
            box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.5);
        }
        select{
            border-radius: 10px;
            float: right;
        }
        input[type="text"]{
            width: 100%;
            resize: none;
        }
        input[type="text"]:focus{
            height: 200px;
        }
        input[type="button"]{
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="form">
        <h1>Ask Community</h1>
        <hr>
        <table width="100%" cellspacing="0">
            <tr class="row1">
                <th><?php echo"{$p_info['username']}"?></th>
                <td><i class="td1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></td>

            </tr>
            <tr>
             <td>Level:<?php echo"{$p_info['lvl']}"?></td>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
            <tr>
                <td>
                    <h4><input type="checkbox" name="Topfeed" id="Topfeed">Top feed</h4>
                </td>
                <td>
                    <div class="info">
                        i
                    </div>
                </td>
            </tr>
            <tr>
            <td colspan="2"><hr></td>
            </tr>
            <tr>
                <td>language category</td>
                <td><select name="select" id="select">
                    <option value="none">None</option>
                    <option value="PY">Python</option>
                    <option value="PHP">PHP</option>
                    <option value="JS">javascript</option>
                </select></td>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
            <tr>
                <td>
                    Question
                </td>
            </tr>
                <tr>
                    <td colspan="2">
                    <input type="text" id="question">
                    </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="btn btn-primary" onclick="send()">Submit</button>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <a class="btn btn-primary" href="main_feed.php">Home</a>
                </td>
            </tr>
        </table>
    </div>
</body>
<script>
    const text = document.getElementById('question');
     function send(){
        $.ajax({
            type: 'POST',
            url: 'handler.php', //Replace with your server-side script url
            data: { content: text.value },
            success: function(response){
                alert('your question has been  uploaded successfully');
                window.location.replace('main_feed.php');
            },
            error: function(xhr, status, error){
                alert('Error saving file', error);
            }
        });
    };
</script>
</html>