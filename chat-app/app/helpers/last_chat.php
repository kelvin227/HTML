<?php 

function lastChat($id_1, $id_2, $conn){
   
   $sql = "SELECT * FROM messages
           WHERE (sender_id=? AND receiver_id=?)
           OR    (receiver_id=? AND sender_id=?)
           ORDER BY message_id DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_1, $id_2, $id_1, $id_2]);

    if ($stmt->rowCount() > 0) {
    	$chat = $stmt->fetch();
    	return $chat['message'];
    }else {
    	$chat = '';
    	return $chat;
    }

}