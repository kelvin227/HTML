<?php
$selectedOption = isset($_GET['option'])? $_GET['option'] : 'default';

$options = array(
    "Gator Magic" => "main_feed.php",
    "Integrate" => "tools/integrate.php",
    "My AI" => "tools/profile.php",
    "Snippet store" => "snippet.php",
    "Gator School" => "includes/lessons.php"
);

$selectedOptionURL = isset($options[$selectedOption]) ? $options[$selectedOption] :'';
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>My Tools</title>
  <link rel="stylesheet" href="./css/sidebar_style.css">


</head>
<body>
<!-- partial:index.partial.html -->
<div class="grid-container">
  <div id="sidebar" class="sidebar">
  <ul>
 <?php
 foreach($options as $option => $url){
    echo"<li>
    <a href='?option=".urlencode($option). "'>$option</a><span class='badge'>i</span>
</li>";
 }

?>



</ul>
    <button class="m">M</button>
  </div>
  <div class="main-content">
    <iframe id="framee" frameborder="0" src="<?php echo $selectedOptionURL;?>"></iframe>
  </div>
</div>
<!-- partial -->
  <script>

    const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main-content');
document.querySelector('.m').onclick = function () {
  sidebar.classList.toggle('sidebar_small');
  mainContent.classList.toggle('main-content_large')
}
  </script>

</body>
</html>
