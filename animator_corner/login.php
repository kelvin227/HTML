<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/login_style3.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->

<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->

<style>
    
</style>
</head>
<body>
    <?php
                        
                        //error_reporting(0);
                        

                        session_start();

						echo $_SESSION['error'];
                        //session_destroy();
                    
                    ?>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Login</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="login_check.php" method="post">
					<input class="text" type="text" name="username" placeholder="username" required=""><br />
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<div class="wthree-text">
						<div class="clear"> </div>
					</div>
					<input type="submit" value="Login">
				</form>
				<p>Don't have an Account? <a href="sign_up.php"> Sign Up!</a></p>
			</div>
		</div>
		<!--
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
            
		</ul>-->
	</div>
	<!-- //main -->
</body>
</html>
<!-- partial -->
  
