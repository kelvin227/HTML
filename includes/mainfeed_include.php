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
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Integrate</title>
    <link rel="stylesheet" href="css/feed_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/include_style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <style>
        .curve{
            border-radius: 10px !important;
            font-size:115%; 
            border: 1px solid black; 
            
        }
    </style>
</head>
  <body>
    <div class="area">
        <center>
            <h2 style="border: 1px solid black; margin-top: -0.5%; background-color: black; color: white;">Feed<div class="badge btn-info">12</div></h2>
        </center>

        <h2 style="border: 1px solid black; margin-top: -1%; background-color: purple;">
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label style="color: white;">language tag:</label>
                <select name="sort">
                <option value="ratings">By ratings</option>
                <option value="php">PHP</option>
                <option value="ratings1">dog</option>
                </select>
            <button type="submit">filter</button>
            </form>
        </h2>
        
        
        
        <table style="width:100%;">
            <?php
            
            while($q_info=$q_result1->fetch_assoc())
            {
                $questionId = $q_info['id'];
                $questionText = $q_info['q'];
                $user_id = $q_info['user_id'];
    
                //logic to get username from profile database
                $p = "SELECT * FROM profile WHERE userid = '$user_id'";
                $p_result1 = mysqli_query($data, $p);
                $p_info = $p_result1->fetch_assoc();
                $username=$p_info['username'];

                //timestamp logic
                $timestamp = $q_info['time_stamp'];
                $dateTime = new DateTime($timestamp);
                $now = new DateTime();
                $interval = $now->diff($dateTime);

                $formatted = ($interval->days > 0) ? $dateTime->format('y-m-d') : $dateTime->format('H:i');
            ?>
            
                    
            <tr onclick="window.location.replace('v_profile.php?ids=<?php echo $user_id;?>')">

            <th colspan="3"><center><div class="curve"><?php echo"$username"; ?><i class="fa fa-comments fa-2x"></i></div></center></th>
                
            </tr>
        <tr>
        <td class="badge btn-info"><center><?php echo $formatted;?></center></td>
            </tr>
            
            <tr style="height:15em;  background-color: white;">
                <td onclick="window.location.replace('includes/post.php?ids=<?php echo $questionId;?> & page=<?php echo 0; ?>')" colspan="3"><center><p><?php echo"$questionText";?></a></p></center></td>
            </tr>
            <tr>
                <td><center><i class="fa fa-heart fa-2x"></i></center></td>
                <td><center><i class="fa fa-comment fa-2x"></center></i></td>
                <td><center><i class="fa fa-share fa-2x"></center></i></td>
            </tr>
                <tr><td>&nbsp;&nbsp;</td></tr>
                <tr><td>&nbsp;&nbsp;</td></tr>
            <?php
                
            }
                ?>

            </div>
        </table>
        
        
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

  </div><nav class="main-menu">
            <ul>
                <li>
                    <a href="profile.php">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                           profile dashboard
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="tools/integrate_test.php">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">
                            integrate
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="integrate_fuse.php">
                       <i class="fa fa-code fa-2x"></i>
                        <span class="nav-text">
                            CodeFusion
                        </span>
                    </a>
                </li>
                <li class="has-subnav">
                    <a href="chat-app/home.php">
                       <i class="fa fa-comments fa-2x"></i>
                        <span class="nav-text">
                            FusionMessenger
                        </span>
                    </a>
                   
                </li>
                <li class="has-subnav">
                    <a href="main_ask.php">
                       <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i>
                        <span class="nav-text">
                            Ask community
                        </span>
                    </a>
                   
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-robot fa-2x"></i>
                        <span class="nav-text">
                            Gator Ai
                        </span>
                    </a>
                </li>
                <li>
                    <a href="Support.php">
                        <i class="fa fa-phone fa-2x"></i>
                        <span class="nav-text">
                           Customer Support
                        </span>
                    </a>
                </li>
                <li>
                   <a href="tools/setting.php">
                       <i class="fa fa-cogs fa-2x"></i>
                        <span class="nav-text">
                            Tools & Settings
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Documentation
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                    <a href="logout.php">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
  </body>
    </html>