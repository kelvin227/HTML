<?php 

function opened($id_1, $conn, $chats){
    foreach ($chats as $chat) {
    	if ($chat['opened'] == 0) {
    		$opened = 1;
    		$message_id = $chat['message_id'];

    		$sql = "UPDATE messages
    		        SET   opened = ?
    		        WHERE sender_id=? 
    		        AND   message_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$opened, $id_1, $message_id]);

    	}
    }
}