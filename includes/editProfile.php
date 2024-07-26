
<!-- partial:index.partial.html -->
<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Edit Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/sign_up_style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
    <?php
                    
                    ?>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Sign Up</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="includes/update.php" method="post">
					<input class="text" type="text" name="username" placeholder="username" required=""><br />
                    <input class="text" type="text" name="name" placeholder="name" required=""><br />
                    <input class="text" type="text" name="bio" placeholder="Bio" required=""><br />
                    <input class="text" type="date" name="dob" placeholder="date of birth" required="">

					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="hidden" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="hidden" name="con_password" placeholder="Confirm Password" required="">
					<input type="submit" value="SIGNUP">
				</form>
				<p>Satisfied? <a href="profile.php"> Leave It Be!</a></p>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
            
		</ul>
	</div>
	<!-- //main -->
</body>
</html>
<!-- partial -->
  