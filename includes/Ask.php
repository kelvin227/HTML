<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask community</title>
    <link rel="stylesheet" href="css/bootstrap.css">
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
        textarea{
            width: 100%;
            resize: none;
        }
        textarea:focus{
            height: 200px;
        }
        button{
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="form">
    <form action="#" method="post">
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
                    <textarea type="textarea" name="text"></textarea>
                    </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </td>
            </tr>
        </table>
        </form>
    </div>
</body>
</html>