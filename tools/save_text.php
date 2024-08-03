<?php
// write the update content to file
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename = $_POST['filename'];
    $content = $_POST['content'];
    file_put_contents($filename, $content . PHP_EOL);
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $filecontent = file_get_contents("embed.js");
 //return the content as plain text
 header('Content-Type: text/plain');
 echo $filecontent;
}
?>
