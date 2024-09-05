<?php
if (isset($_POST['register'])) {
    require_once("user.php");
    require_once("classes/patient.php");

    if ($_POST['password'] !== $_POST['confirmPassword']) {
        echo "<script>alert('Password and Confirm Password no macth');document.location='registration.php'</script>";
    } else {
        $action = new User();
        $doc = new Patient();

        $doc->firstname = $_POST['firstname'];
        $doc->lastname = $_POST['lastname'];
        $doc->address = $_POST['address'];
        $doc->email = $_POST['mail'];
        $doc->phone = $_POST['phone'];
        $doc->gender = $_POST['gender'];
        $doc->age = $_POST['age'];
        $doc->password = md5($_POST['password']);
        $action->connect();
        $action->insertPatient($doc);
        echo "<script>alert('data saved successfully');document.location='user-login.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>User-Login</title>

    <link
        href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body class="login">
    <div class="row">
        <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="logo margin-top-30">
                <a href="../index.php">
                    <h2> Th Clinic | Patient Register</h2>
                </a>
            </div>

            <div class="box-login">
                <form class="form-login" method="post">
                    <fieldset>
                        <legend>
                            Sign in to your account
                        </legend>
                        <p>
                            Please enter your name and password to log in.<br />
                            <span style="color:red;"></span>
                        </p>
                        <div class="form-group">
                            <label for="doctorname">
                                Patient Name
                            </label>
                            <input type="text" name="patname" class="form-control" placeholder="Enter Patient Name"
                                required="true">
                        </div>
                        <div class="form-group">
                            <label for="fess">
                                Patient Contact no
                            </label>
                            <input type="text" name="patcontact" class="form-control"
                                placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="[0-9]+">
                        </div>
                        <div class="form-group">
                            <label for="fess">
                                Patient Email
                            </label>
                            <input type="email" id="patemail" name="patemail" class="form-control"
                                placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()">
                            <span id="user-availability-status1" style="font-size:12px;"></span>
                        </div>
                        <div class="form-group">
                            <label class="block">
                                Gender
                            </label>
                            <div class="clip-radio radio-primary">
                                <input type="radio" id="rg-female" name="gender" value="female">
                                <label for="rg-female">
                                    Female
                                </label>
                                <input type="radio" id="rg-male" name="gender" value="male">
                                <label for="rg-male">
                                    Male
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">
                                Patient Address
                            </label>
                            <textarea name="pataddress" class="form-control" placeholder="Enter Patient Address"
                                required="true"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fess">
                                Patient Age
                            </label>
                            <input type="text" name="patage" class="form-control" placeholder="Enter Patient Age"
                                required="true">
                        </div>
                        <div class="form-actions">

                            <button type="submit" class="btn btn-primary pull-right" name="submit">
                                Register <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                        <div class="new-account">
                            Have an account yet?
                            <a href="user-login.php">
                                Create an account
                            </a>
                        </div>
                    </fieldset>
                </form>

                <div class="copyright">
                    </span><span class="text-bold text-uppercase"> Th Clinic</span>.
                </div>

            </div>

        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>

    <script src="assets/js/main.js"></script>

    <script src="assets/js/login.js"></script>
    <script>
        jQuery(document).ready(function () {
            Main.init();
            Login.init();
        });
    </script>

</body>
<!-- end: BODY -->

</html>