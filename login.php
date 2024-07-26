<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login panel </title>
    <meta name="description" content="Example description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/login_style3.css'>


</head>

<body>
    <!-- partial:index.partial.html -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <div class="bg">


    </div>

    <main class="form-signin">

        <h1 class="h3">Login
            <h4>

                <?php
                        
                        error_reporting(0);
                        
                        session_start();
                        
                    
                    echo $_SESSION['error'];
                    
                
                    ?>

            </h4>

        </h1>

        <form action="login_check.php" method="POST">


            <div class="form-floating">
                <input type="text" class="form-control" name="username" required>
                <label for="floatingInput">UserName</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <div class="container">
                <div class="row">
                    <a href="index.php">Home Page</a>
                    <a href="reset_pass.php">Forgot Password?</a>
                </div>

            </div>
            <button class="w-100 btn btn-lg" type="submit">Sign in</button>
        </form>
        <p class="copyright">&copy; 2021</p>
    </main>
    <!-- partial -->

</body>

</html>
