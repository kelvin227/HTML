<?php
require_once"dbconnect.php";

$user_id = $_GET['ids'];
 
$p = "SELECT * FROM profile WHERE userid = '$user_id'";
$p_result = mysqli_query($data, $p);
$p_info = $p_result->fetch_assoc();

require_once"contribution.php";
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="CodeHim">
      <title> My profile</title>
      <!-- Style CSS -->
      <link rel="stylesheet" href="./css/profile_style.css">
      <!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->
      <link rel="stylesheet" href="./css/demo.css">
       <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
   </head>
   <body>
      <header class="cd__intro">
              </header>
      <!--$%adsense%$-->
      <main class="cd__main">
         <!-- Start DEMO HTML (Use the following code into your project)-->
         <div class="profile-page">
  <div class="content">
    <div class="content__cover">
      <div class="content__avatar"></div>
      <div class="content__bull"><span></span><span></span><span></span><span></span><span></span>
      </div>
    </div>
    <div class="content__title"><br />
      <h1><?php echo"{$p_info['nam']}";?></h1><span><?php echo"{$p_info['Bio']}";?></span>
    </div>
    <div class="content__description">
      <p>Web Producer - Web Specialist(specializaton)</p>
        <p><b>E-mail:</b><?php echo"{$p_info['email']}";?></p>
    </div>
    <ul class="content__list">
      <li><span><?php echo $rows;?></span>Contribution</li>
      <li><span><?php echo"{$p_info['lvl']}";?></span>Gator level</li>
      <li><span>21</span>Project</li>
    </ul>
    <div class="content__button"><a class="button" href="main_feed.php">
        <div class="button__border"></div>
        <div class="button__bg"></div>
        <p class="button__text">Follow</p></a>
        <a class="button" href="chat-app/chat.php?user=<?=$user_id?>">
        <div class="button__border"></div>
        <div class="button__bg"></div>
        <p class="button__text">Messge</p></a>
        <a class="button" href="">
        <div class="button__border"></div>
        <div class="button__bg"></div>
        <p class="button__text">Report user</p></a>
      </div>
  </div>
             
  <div class="bg">
    <div><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
    </div>
  </div>
  
</div>
         <!-- END EDMO HTML (Happy Coding!)-->
      </main>
      <footer class="cd__credit">Author: adrien - Distributed By: <a title="Free web design code & scripts" href="https://www.codehim.com?source=demo-page" target="_blank">CodeHim</a></footer>
      
      <!-- Script JS -->
      <script src="./js/script.js"></script>
      <!--$%analytics%$-->
   </body>
</html>
