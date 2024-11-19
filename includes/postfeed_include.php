<?php
//error_reporting(0);
require_once'dbconnect.php';


$question_id = $_GET['ids'];
try {
    $page_id = $_GET['page'];
} catch(Exception $e) {
}
$s_user_id = $_SESSION['user_id'];
$_SESSION['quest_id']=$question_id;

$q = "SELECT * FROM questions WHERE id='$question_id'";
$q_result1 = mysqli_query($data, $q);
$q_info=$q_result1->fetch_assoc();

//retrieve comment from the comment database and limiting the number of comments displayed

$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
$pageSize = 10; // Number of items per page

// Calculate the offset
$offset = $page * $pageSize;

// Query to fetch data with pagination
$c = "SELECT * FROM comments WHERE question_id='$question_id' ORDER BY ratings_good DESC LIMIT $offset, $pageSize";
$c_result1 = mysqli_query($data, $c);

// Check if there are more rows available
$hasMoreRows = mysqli_num_rows(mysqli_query($data, "SELECT 1 FROM comments WHERE question_id='$question_id' ORDER BY ratings_good ASC LIMIT " . ($offset + $pageSize) . ", 1")) > 0;

//logic to retrieve user who posted the question
$user_i = $q_info['user_id'];

$p = "SELECT * FROM profile WHERE userid = '$user_i'";
$p_result = mysqli_query($data, $p);
$p_info = $p_result->fetch_assoc();

//logic to post new comment
if(isset($_POST['comment']))
{
    $text=htmlspecialchars($_POST['tex']);
    $user_id=$_SESSION['user_id'];
    $timestamp= date('Y-m-d H:i:s', time());

    
    $sql="INSERT INTO comments (text, user_id, question_id, time_stamp, ratings_good, ratings_bad) VALUES ('$text','$user_id', '$question_id', '$timestamp', '0', '0')";
    
    $result=mysqli_query($data,$sql);
    
    if($result)
    {
        echo "<script type='text/javascript'>
        
        alert('posted');
        
        </script>";
        
        $redirect = "post.php?page=$page + 1&ids=$question_id";
        
        header("location: $redirect");
        exit();
    }
    
    else{
        echo "<script type='text/javascript'>
        
        alert('failed to post');
        
        </script>";
    }
    
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Codegator integrate</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Custom Theme files -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/include_style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
    
</head>
<body style="font-family:Open sans;">
    <div style="border: 3px solid black;">
        <nav class="navbar navbar-inverse" style=" background: linear-gradient(150deg, #8700ff 20%, #f000ff 100%);">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color: white; padding-top: 15%;  font-size: 200%;"><strong>Codegator</strong></a>
            </div>
            <ul class="nav navbar-nav" style="padding-top: 2%;">
                <li class="active" style="color: white;"><a href="#">Home</a></li>
                <li><a href="../profile.php" style="color: white;">Profile</a></li>
                <li><a href="../main_feed.php" style="color: white;">Feed</a></li>
                <li><a href="#" style="color: white;">My Tools</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="../logout.php" class="btn btn-danger navbar-btn btn-sm" style="border-radius: 10px; color: white;">Log out</a></li>
                </ul>
        </div>
    </nav>

</div>
    <center>
        <h2 style="border: 1px solid black; margin-top: 0%; background-color: black; color: white;">Feed<div class="badge btn-info">12</div></h2>
    </center>
    <div>
    <div class="slider-container">
    <div class="slider">
        
        <table style="width:100%;">
            
            <div class="slide">
        
            <tr>
            <th style="font-size:115%; border: 1px solid black;"><?php echo"{$p_info['username']}"; ?></th>
                </tr>
        <tr>
        <td class="badge btn-info"><?php echo"{$q_info['time_stamp']}";?></td>
            </tr>
            
            <tr style="height:15em; color: white;  background: linear-gradient(150deg, #8700ff 20%, #f000ff 100%);">
                <td><center><p><?php echo"{$q_info['q']}";?></p></center></td>
            </tr>
                
                
                
                <tr>
                    <form method="post">
                    <td><input type="text" style="width: 70%; margin-left: 4%;" name="tex" autocomplete="off"/><button class="btn btn-primary" name="comment" type="submit">comment</button></td>
                    </form>
                </tr>
                <tr><td>&nbsp;&nbsp;</td></tr>
                <tr><td>&nbsp;&nbsp;</td></tr>
                <div class="slide"></div>

            </div>
        </table>
        
        <table style="width:100%;">
            
            <?php
            
            
            
            ?>
            <?php
            
            while($c_info=$c_result1->fetch_assoc())
            {
                $commentId = $c_info['id'];
                $comment = $c_info['text'];
                $c_user_id = $c_info['user_id'];
                $c_ratings_good = $c_info['ratings_good'];
                $c_ratings_bad = $c_info['ratings_bad'];
                $G_ratings = '';

                $c_user = "SELECT * FROM profile WHERE userid = '$c_user_id'";
                $c_user_result = mysqli_query($data, $c_user);
                $c_info1 = $c_user_result->fetch_assoc();
                $c_username = $c_info1['username'];

                $G_rate = "SELECT * FROM rate WHERE userId = '$s_user_id' AND commentId='$commentId'";
                $q_G_rate = mysqli_query($data, $G_rate);
                $G_rate_info = $q_G_rate->fetch_assoc();
                if (mysqli_num_rows($q_G_rate) != 0) {
                    # code...
                    $G_ratings = $G_rate_info['rating'];

                }
                else {}
                
            ?>
            
            <div class="slide">
        
            <tr>
                
            <th style="font-size:115%; border: 1px solid black;"><?php echo"$c_username"; ?></th>
                </tr>
        <tr>
        <td class="badge btn-info"><?php echo"{$c_info['time_stamp']}";?></td>
            </tr>
            
            <tr style="height:15em; background-color:rgba(128,0,128,0.5);  background: linear-gradient(150deg, #8700ff 20%, #f000ff 100%);">
                <td><center><p><?php echo"$comment";?></p></center></td>
                <td>
                <div class="comment-up">
                    <form action="lvl_regulator.php" method="post">
                    <input type="hidden" name="commentId" value="<?php echo $commentId;?>">
                    <input type="hidden" name="userid" value="<?php echo $c_user_id;?>">
                    <input type="hidden" name="ids" value="<?php echo $question_id;?>">
                    <input type="hidden" name="page" value="<?php echo $page_id;?>">
                    <label><?php echo $c_ratings_good; ?></label><br />
                    <button name="rate" value="1" style="border-radius: 50%; margin: 4px 2px; text-align: center; padding:20px; border: none; background-color:<?php if($G_ratings === '1' ){echo 'Green';} ?>;"><span><i class="fa fa-arrow-up"></i></span></button><br />
                    <button name="rate" value="-1" style="border-radius: 50%; margin: 4px 2px; text-align: center; padding:20px; border: none; background-color:<?php if($G_ratings === '-1') { echo 'red';} ?>;"><span><i class="fa fa-arrow-down"></i></span></button><br />
                    <label><?php echo $c_ratings_bad; ?></label>
                </form>
                    
                </div>
            </td>
            </tr>
                
                <tr><td>&nbsp;&nbsp;</td></tr>
                <tr><td>&nbsp;&nbsp;</td></tr>
                <div class="slide"></div>
            <?php
                
            }
                ?>

            </div>
        </table>
        
        
        
        
    </div>
        <center>
        <?php if ($page > 0): ?>
   <a href="?page=<?php echo $page - 1; ?>&ids=<?php echo"$question_id";?>" class="prev btn btn-primary">Previous</a>
        <?php endif; ?>
        <?php if ($hasMoreRows): ?>
        <a href="?page=<?php echo $page + 1; ?>&ids=<?php echo"$question_id";?>" class="next btn btn-primary">Next</a>
        <?php endif; ?>

        </center>
</div>

    </div>
    
   
</body>
</html>
<!-- partial -->

