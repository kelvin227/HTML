<?php
require_once'../includes/dbconnect.php';
$edu = "SELECT * FROM tutorials ";
$q_edu = mysqli_query($data, $edu);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <link rel="stylesheet" href="../css/bootstrap2.css">
</head>
<body>
<div class="navbar nav-inverse" style="background-color: black;">
    <ul class="nav navbar-nav">
        <li><a href="../index.php">Home</a></li>
        <li><a href="courses.php">Courses</a></li>
        <li><a href="lessons.php">Lesssons</a></li>
        <li><a href="exams.php">Exams</a></li>
        <li><a href="help.php">Help</a></li>
    </ul>
</div>
<center>

            <?php
            
            while($edu_info = $q_edu->fetch_assoc())
            {
                $class_id = $edu_info['class_id'];
                $course_id = $edu_info['course_id'];
                $course = $edu_info['course'];
                $img = $edu_info['img'];
    
                //logic to get username from profile database
                //$p = "SELECT * FROM profile WHERE userid = '$user_id'";
                //$p_result1 = mysqli_query($data, $p);
                //$p_info = $p_result1->fetch_assoc();
                //$username=$p_info['username'];
            ?>
            <table border="2px">
            <tr>
                <th colspan="2">
                    <center>
                <?php echo $course; ?>
            </center>
                </th>
            </tr>
            <tr>
                <td colspan="2">
                     <center><img src="<?php echo $img;?>" alt="no image" height="166vh" width="98%"></center>
                </td>
            </tr>
            <tr>
                
                <td class="btn btn-warning" style="width: 100%;"><center>View Course</center></td>
                <td class="btn btn-success" style="width: 100%"><center>Buy course</center></td>            
            </tr>

            </table><br>
            <?php
                
            }
                ?>

            </div>
        </center>
</body>
</html>