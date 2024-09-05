<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="wrapper" style="background-image: url('images/concentrated.jpg');">
        <div class="inner">
            <div class="image-holder">
                <img src="images/4338932.jpg" alt="">
            </div>
            <form action="include/signin.php" method="post">
                <h3>Login Page</h3>
                <?php
                if (!empty($_GET['id'])) {
                    echo "<p>Votre identifiant est<p style='color:red;'>" . $_GET['id'] . "</p><p>veillez connecter avec votre identifiant</p>";
                }
                ?>
                <div class="form-wrapper">
                    <input type="text" placeholder="Identifiant" class="form-control" name="identifiant" required>
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="form-wrapper">
                    <input type="password" placeholder="Password" class="form-control" name="password" required>
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <button name="login">login
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
                <br>
                <center>
                    <p class="loginhere">
                        Forgot Password ?
                        <a href="forgot-password.php" style="color: #222;">
                            Join here
                        </a><br>
                        Have not an account ?
                        <a href="signup.php" style="color: #222;">
                            Register here
                        </a><br>
                        Just visitor ?
                        <a href="../index.php" style="color: #222;">
                            Join here
                        </a>
                    </p>
                </center>
            </form>
        </div>
    </div>

</body>

</html>