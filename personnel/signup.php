<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="fonts/material-design-iconic-font-main/dist/css/material-design-iconic-font.min.css">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="wrapper" style="background-image: url('images/concentrated.jpg');">
        <div class="inner">
            <div class="image-holder">
                <img src="images/OQ6UTW0.jpg" alt="">
            </div>
            <form method="post" action="include/signup.php" enctype="multipart/form-data">

                <h3>Doctor Registration Page</h3>

                <div class="form-wrapper">
                    <label for="">Profil Picture :</label>
                    <input type="file" name="image" class="form-control" accept="images/jpg, images/png, images/jpeg" required>
                    <i class="zmdi zmdi-image"></i>
                </div>
                <div class="form-wrapper">
                    <input type="text" name="nom" placeholder="Full Name" class="form-control" value="<?php echo $_POST["nom"]; ?>" required>
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="form-wrapper">
                    <input type="text" name="mail" placeholder="Email Address" class="form-control" value="<?php echo $_POST["mail"]; ?>" required>
                    <i class="zmdi zmdi-email"></i>
                </div>
                <div class="form-wrapper">
                    <input type="text" name="address" placeholder="Address" class="form-control" value="<?php echo $_POST["address"]; ?>" required>
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="form-wrapper">
                    <select name="gender" id="" class="form-control" required>
                        <option value="<?php echo $_POST["gender"]; ?>" disabled selected>Gender</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                    <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="password" placeholder="Password" class="form-control" value="<?php echo $_POST["password"]; ?>" required>
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control" value="<?php echo $_POST["confirmPassword"]; ?>" required>
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <button name="register">Register
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
                <center>
                    <p class="loginhere">
                        Have already an account ?
                        <a href="inedex.php" style="color: #222;">
                            Login here
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