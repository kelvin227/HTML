<?php 
  session_start();

  if (isset($_SESSION['user_id'])) {
  	# database connection file
  	include 'app/db.conn.php';

  	include 'app/helpers/user.php';
  	include 'app/helpers/chat.php';
  	include 'app/helpers/opened.php';

  	include 'app/helpers/timeAgo.php';

  	if (!isset($_GET['user'])) {
  		header("Location: home.php");
  		exit;
  	}

  	# Getting User data data
  	$chatWith = getUser($_GET['user'], $conn);

  	if (empty($chatWith)) {
  		header("Location: home.php");
  		exit;
  	}

  	$chats = getChats($_SESSION['user_id'], $chatWith['userid'], $conn);

    opened($chatWith['userid'], $conn, $chats);

					//timezone convert
					// Specific date and time
					$last_seen = $chatWith['last_seen'];
					

					// Create DateTime object
					$date = new DateTime($last_seen, new DateTimeZone('UTC'));

					// Set Africa/Lagos timezone
					$date->setTimezone(new DateTimeZone('Africa/Lagos'));

					// Format date and time
					$lagosTime = $date->format('Y-m-d H:i:s');

					
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat App</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" 
	      href="css/style.css">
		  <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="icon" href="img/logo.png">
	<link rel="style" href="../fontawesome-free-5.15.4-web/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="d-flex
             justify-content-center
             align-items-center
             vh-100">
    <div class="w-400 shadow p-4 rounded">
    	<a href="home.php"
    	   class="fs-4 link-dark">&#8592;</a>

    	   <div class="d-flex align-items-center">
    	   	  <img src="uploads/<?=$chatWith['p_p']?>"
    	   	       class="w-15 rounded-circle">

               <h3 class="display-4 fs-sm m-2">
               	  <?=$chatWith['nam']?> <br>
               	  <div class="d-flex
               	              align-items-center"
               	        title="online">
               	    <?php
                    if (last_seen($chatWith['last_seen']) == "Active") {
               	    ?>
               	        <div class="online"></div>
               	        <small class="d-block p-1">Online</small>
               	  	<?php }else{ ?>
               	         <small class="d-block p-1">
               	         	Last seen:
               	         	<?=last_seen($chatWith['last_seen'])?>
               	         </small>
               	  	<?php } ?>
               	  </div>
               </h3>
    	   </div>

    	   <div class="shadow p-4 rounded
    	               d-flex flex-column
    	               mt-2 chat-box"
    	        id="chatBox">
    	        <?php 
                     if (!empty($chats)) {
                     foreach($chats as $chat){
					
						//time date shorten 
					$timestamp = $chat['created_at'];
					$dateTime = new DateTime($timestamp);
    				$now = new DateTime();
    				$interval = $now->diff($dateTime);


    				$formatted = ($interval->days > 0) ? $dateTime->format('y-m-d') : $dateTime->format('H:i');
                     	if($chat['sender_id'] == $_SESSION['user_id'])
                     	{ ?>
						<p class="rtext align-self-end
						        border rounded p-2 mb-1">
						    <?=$chat['message']?> 
						    <small class="d-block">
						    	<?=$formatted?>
						    </small>      	
						</p>
                    <?php }else{ ?>
					<p class="ltext border 
					         rounded p-2 mb-1">
					    <?=$chat['message']?> 
					    <small class="d-block">
							
					    	<?=$formatted?>
					    </small>      	
					</p>
                    <?php } 
                     }	
    	        }else{ ?>
               <div class="alert alert-info 
    				            text-center">
				   <i class="fa fa-comments d-block fs-big"></i>
	               No messages yet, Start the conversation
			   </div>
    	   	<?php } ?>
    	   </div>
    	   <div class="input-group mb-3">
    	   	   <textarea cols="3"
    	   	             id="message"
    	   	             class="form-control"></textarea>
    	   	   <button class="btn btn-primary"
    	   	           id="sendBtn">
    	   	   	  <i class="fa fa-paper-plane"></i>
    	   	   </button>
    	   </div>

    </div>
 

 <script src="../js/jquery-2.1.4.min.js"></script>

<script>
	var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
	}

	scrollDown();

	$(document).ready(function(){
      
      $("#sendBtn").on('click', function(){
      	message = $("#message").val();
      	if (message == "") return;

      	$.post("app/ajax/insert.php",
      		   {
      		   	message: message,
      		   	receiver_id: <?=$chatWith['userid']?>
      		   },
      		   function(data, status){
                  $("#message").val("");
                  $("#chatBox").append(data);
                  scrollDown();
      		   });
      });

      /** 
      auto update last seen 
      for logged in user
      **/
      let lastSeenUpdate = function(){
      	$.get("app/ajax/update_last_seen.php");
      }
      lastSeenUpdate();
      /** 
      auto update last seen 
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);



      // auto refresh / reload
      let fechData = function(){
      	$.post("app/ajax/getMessage.php", 
      		   {
      		   	id_2: <?=$chatWith['userid']?>
      		   },
      		   function(data, status){
                  $("#chatBox").append(data);
                  if (data != "") scrollDown();
      		    });
      }

      fechData();
      /** 
      auto update last seen 
      every 0.5 sec
      **/
      setInterval(fechData, 500);
    
    });
</script>
 </body>
 </html>
<?php
  }else{
  	header("Location: index.php");
   	exit;
  }
 ?>