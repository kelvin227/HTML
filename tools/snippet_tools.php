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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/snippet_style.css">
</head>
<body>
    <div class="title"><h1>Code In Style</h1></div>
<?php



?>

<table>
        
        <th>
            item name
        </th>
        <tr>
            <td><img src="img/item_ig" alt=""></td>
        </tr>
        <tr>
            <td>item price</td>
        </tr>
        <tr>
            <td>item description</td>
        </tr>
</table>

    <?php


?>


<center>
        <?php if ($page > 0): ?>
   <a href="?page=<?php echo $page - 1; ?>&sort=<?php echo"$sort";?>" class="prev btn btn-primary">Previous</a>
        <?php endif; ?>
        <?php if ($hasMoreRows): ?>
        <a href="?page=<?php echo $page + 1?>&sort=<?php echo"$sort";?>" class="next btn btn-primary">Next</a>
        <?php endif; ?>

        </center>
</body>
<script type="text/javascript">
    void main() {
        print("hello, world");
    }
</script>
</html>
555555555555555555