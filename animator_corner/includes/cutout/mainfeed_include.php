<?php
require_once'dbconnect.php';
$sort = isset($_GET['sort']) ? $_GET['sort']: 'ratings';

    $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
$pageSize = 6; // Number of items per page

// Calculate the offset
$offset = $page * $pageSize;

// Query to fetch data with pagination
$q = "SELECT * FROM questions";
switch ($sort){
    case 'ratings1':
        $q = "SELECT * FROM questions ORDER BY ratings ASC LIMIT $offset, $pageSize";
        break;
        
        case 'ratings':
        $q = "SELECT * FROM questions ORDER BY ratings DESC LIMIT $offset, $pageSize";
        break;
        
    default:
        $q = "SELECT * FROM questions ORDER BY ratings ASC LIMIT $offset, $pageSize";
        break;
}
$q_result1 = mysqli_query($data, $q);

// Check if there are more rows available
$hasMoreRows = mysqli_num_rows(mysqli_query($data, "SELECT 1 FROM questions ORDER BY ratings DESC LIMIT " . ($offset + $pageSize) . ", 1")) > 0;
    



?>

<!DOCTYPE html>
<html>
<head>
<title>Codegator integrate</title>
<link rel="icon" type="image/png" href="../HTML/img/img-about.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Custom Theme files -->
<link href="../HTML/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/include_style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
    
</head>
<body style="font-family:Open sans;">
        <nav class="navbar navbar-inverse" style=" background: linear-gradient(150deg, #8700ff 20%, #f000ff 100%);">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color: white; padding-top: 15%;  font-size: 200%;"><strong>Codegator</strong></a>
            </div>
            <ul class="nav navbar-nav" style="padding-top: 2%;">
                <li><a href="profile.php" style="color: white;">Profile</a></li>
                <li class="active"><a href="main_feed.php" style="color: white;">Feed</a></li>
                <li><a href="tools.php" style="color: white;">My Tools</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php" class="btn btn-danger navbar-btn btn-sm" style="border-radius: 10px; color: white;">Log out</a></li>
                </ul>
        </div>
    </nav>
    <center>
        <h2 style="border: 1px solid black; margin-top: -1.5%; background-color: black; color: white; padding-top: -10%;">Feed<div class="badge btn-info">12</div></h2>
    </center>

        <h2 style="border: 1px solid black; margin-top: -1%; background-color: purple;">
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label style="color: white;">language tag:</label>
                <select name="sort">
                <option value="ratings">default</option>
                <option value="php">cat</option>
                <option value="ratings1">dog</option>
                </select>
            <button type="submit">filter</button>
            </form>
        </h2>
    <div>
    <div class="slider-container">
    <div class="slider">
        
        
        
        <table style="width:100%;">
            <?php
            
            while($q_info=$q_result1->fetch_assoc())
            {
                $questionId = $q_info['id'];
                $questionText = $q_info['text'];
                $user_id = $q_info['user_id'];
    
                //logic to get username from profile database
                $p = "SELECT * FROM profile WHERE userid = '$user_id'";
                $p_result1 = mysqli_query($data, $p);
                $p_info = $p_result1->fetch_assoc();
                $username=$p_info['username'];
            ?>
            
            <div class="slide">
        
            <tr>
                
            <th style="font-size:115%; border-top: 1px solid black;"><?php echo"$username"; ?></th>
                </tr>
        <tr>
        <td class="badge btn-info"><?php $_SESSION['time_stamp']=$q_info['time_stamp']; echo"{$q_info['time_stamp']}";?></td>
            </tr>
            
            <tr style="height:15em;  background:  color: white;">
                <td><center><p><a href="includes/post.php?ids=<?php echo"$questionId";?>" style="text-decoration: none; overflow:hidden; color: Black;"><?php echo"$questionText";?></a></p></center></td>
            </tr>
                
                <tr>
                    <td><span><i class="fa fa-thumbs-up">like</i></span></td>
                
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
   <a href="?page=<?php echo $page - 1; ?>&sort=<?php echo"$sort";?>" class="prev btn btn-primary">Previous</a>
        <?php endif; ?>
        <?php if ($hasMoreRows): ?>
        <a href="?page=<?php echo $page + 1?>&sort=<?php echo"$sort";?>" class="next btn btn-primary">Next</a>
        <?php endif; ?>

        </center>
</div>

    </div>
</body>
</html>
<!-- partial -->
