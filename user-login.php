<?php
require_once("user.php");
require_once("classes/patient.php");
if (isset($_POST['login'])) {

	if (empty($_POST['identifiant']) || empty($_POST['password'])) {
	} else {
		$doct = new Patient();
		$identifiant = $_POST['identifiant'];
		$password = $_POST['password'];
		$action = new User();
		$action->connect();

		$nbr = $action->loginPatient($password, $identifiant);
		//var_dump($nbr);
		foreach ($nbr as $row) {
			$nombre = $row['count(*)'];
			if ($nombre > 0) {
				$_SESSION['identifiant'] = $_POST['idenfiant'];
				$all = $action->checkIdentifiantPatient($_POST['identifiant']);
				foreach ($all as $key => $val) {
					echo "<script>alert('Login successfuly!');document.location='dashboard.php?id=" . $val['id'] . "'</script>";
				}
				//header('Location: ');

			} else {
				echo "<script>alert('Login no mutch');document.location='index.php'</script>";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>User-Login</title>

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
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
					<h2> Th Clinic | Patient Login</h2>
				</a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post">
				<?php
                    if (!empty($_GET['id'])) {
                        echo "<p>Votre identifiant est<p style='color:red;'>".$_GET['id']."</p><p>veillez connecter avec votre identifiant</p>";
                    }
                ?>
					<fieldset>
						<legend>
							Sign in to your account
						</legend>
						<p>
							Please enter your name and password to log in.<br />
							<span style="color:red;"></span>
						</p>
						<div class="form-group">
							<span class="input-icon">
								<input type="email" class="form-control" name="identifiant" placeholder="Username">
								<i class="fa fa-user"></i> </span>
						</div>
						<div class="form-group form-actions">
							<span class="input-icon">
								<input type="password" class="form-control password" name="password" placeholder="Password">
								<i class="fa fa-lock"></i>
							</span><a href="forgot-password.php">
								Forgot Password ?
							</a>
						</div>
						<div class="form-actions">

							<button type="submit" class="btn btn-primary pull-right" name="submit">
								Login <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
						<div class="new-account">
							Don't have an account yet?
							<a href="registration.php">
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
		jQuery(document).ready(function() {
			Main.init();
			Login.init();
		});
	</script>

</body>
<!-- end: BODY -->

</html>