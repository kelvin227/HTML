<?php
require_once 'dbconnect.php';
require_once 'includes/config.php';
$user1_id = $_SESSION["user_id"];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $user2_ids = $_POST['user_ids'];
    $sql="INSERT INTO messages (sender_id, receiver_id, message_text) VALUES ('$user1_id', '$user2_ids','$content');";
    $result=mysqli_query($data,$sql);
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $user2_id = $_GET['user_ids'];
    $m = "SELECT * FROM messages WHERE receiver_id='$user1_id' AND sender_id='$user2_id' OR receiver_id='$user2_id' AND sender_id='$user1_id' ORDER BY timestamp DESC";
    $m_result1 = mysqli_query($data, $m);
while($m_info=$m_result1->fetch_assoc())
            {   
                if($m_info['sender_id'] == $user1_id){
                $message = $m_info['message_text'];
                echo 
'                <div class="ca-send">
                    <div class="ca-send__msg-group">
                        <div class="ca-send__msgwrapper">
                            <div class="ca-msg-actions">
                                <div class="iconbox-dropdown dropdown">
                                    <div class="iconbox btn-hovered-light" id="dropdownMenuButtons3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="iconbox__icon mdi mdi-dots-horizontal"></i>
                                                                    </div>
                                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButtons3">
                                                                        
                                                                        <a class="dropdown-item" href="javascript:;">
                                                                            <span><i class="mdi mdi-share-outline"></i></span> 
                                                                            <span>Forward</span>
                                                                        </a>
                                                                        <a class="dropdown-item" href="javascript:;">
                                                                            <span><i class="mdi mdi-content-copy"></i></span> 
                                                                            <span>Copy</span>
                                                                        </a>
                                                                        <a class="dropdown-item" href="javascript:;">
                                                                            <span><i class="mdi mdi-star-outline"></i></span> 
                                                                            <span>Add Star</span>
                                                                        </a>
                                                                        <a class="dropdown-item" href="javascript:;">
                                                                            <span><i class="mdi mdi-trash-can-outline"></i></span> 
                                                                            <span>Delete</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ca-send__msg">'. $message .'</div>
                                                        </div>
                                                        <div class="metadata">
                                                            <span class="time">10:10 AM</span>
                                                            <span class="tick">
                                                                <img src="./tick-read.svg" alt="">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="user-avatar user-avatar-sm user-avatar-rounded online">
                                                        <img src="./02.jpg" alt="">
                                                    </div>
                                                </div>'
                
                ;
                } else {
                    //user 2 sent the message display in the left
                $message = $m_info['message_text'];
                echo '<div class="ca-received">
                                                    <div class="user-avatar user-avatar-sm user-avatar-rounded online">
                                                        <img src="./01.jpg" alt="">
                                                    </div>
                                                    <div class="ca-received__msg-group">
                                                        <div class="ca-received__msgwrapper">
                                                            <div class="ca-received__msg">'. $message.'</div>
                                                            <div class="ca-msg-actions">
                                                                <div class="iconbox-dropdown dropdown">
                                                                    <div class="iconbox btn-hovered-light" id="dropdownMenuButtonsr4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="iconbox__icon mdi mdi-dots-horizontal"></i>
                                                                    </div>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonsr4">
                                                            
                                                                        <a class="dropdown-item" href="javascript:;">
                                                                            <span><i class="mdi mdi-share-outline"></i></span> 
                                                                            <span>Forward</span>
                                                                        </a>
                                                                        <a class="dropdown-item" href="javascript:;">
                                                                            <span><i class="mdi mdi-content-copy"></i></span> 
                                                                            <span>Copy</span>
                                                                        </a>
                                                                        <a class="dropdown-item" href="javascript:;">
                                                                            <span><i class="mdi mdi-star-outline"></i></span> 
                                                                            <span>Add Star</span>
                                                                        </a>
                                                                        <a class="dropdown-item" href="javascript:;">
                                                                            <span><i class="mdi mdi-trash-can-outline"></i></span> 
                                                                            <span>Delete</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
													</div>
												</div>';		
                }
            }
            
}
