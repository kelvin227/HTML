<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
	require_once 'dbconnect.php';
	$user1_id = $_SESSION["user_id"];
$p = "SELECT * FROM profile WHERE userid IN( SELECT sender_id FROM messages WHERE receiver_id='$user1_id' UNION SELECT receiver_id FROM messages WHERE sender_id='$user1_id');";
$p_result1 = mysqli_query($data, $p);
while($p_info=mysqli_fetch_assoc($p_result1))
    {
        $message = $p_info['username'];
		$user2_id = $p_info['userid'];
		//<script>
		//var user_id = ' . $user2_id .';
		//</script>

														
echo '<li>
            <div class="conversation" onclick="user_id = '. $user2_id .'">
                <div class="user-avatar user-avatar-rounded online">
                    <img src="img/01.jpg" alt="">
                </div>
	            <div class="conversation__details">
	                <div class="conversation__name">
    		            <div class="conversation__name--title">'.htmlspecialchars($message).'</div>
            	    	<div class="conversation__time">00:21 PM</div>
                	</div>
                <div class="conversation__message">
                    <div class="conversation__message-preview">
                        <span class="tick">
                    	    <img src="./tick-read.svg" alt="">
                        </span>
					    <span>
                           Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta consequuntur accusantium tempora. Ad officiis voluptate neque, deleniti porro necessitatibus aut!
                        </span>
                    </div>
                                                                            
                    <span>
                    	<i class="mdi mdi-pin"></i>
                    </span>
                                                                            
                </div>
            </div>
	    </li>'  ;
    }
}else{
	header("location: index.php");
}
?>
<script src="javascript/jquery-3.4.1.min.js"></script>
<script src="javascript/bootstrap.bundle.min.js"></script>
<script src="javascript/mfb.min.js"></script>
<script src="javascript/perfect-scrollbar.min.js"></script>
<script src="javascript/owl.carousel.min.js"></script>
<script src="javascript/app.js"></script>