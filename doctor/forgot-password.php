<?php
require_once "../user.php";
require_once "../classes/docteur.php";

$action = new User();
$ab = new Docteur();

	if (isset($_POST['submit'])) {

		if (!empty($_POST['identifiant'])) {
			$action->connect();
			$listadmin = $action->fetchOneDrIdent($_POST['identifiant']);
			foreach ($listadmin as $key => $value) {
			header("location:reset-password.php?id=" . $value['id'] . "");
			//echo "<script>alert('Updated successfully!');document.location='home.php?id=".$_GET['id']."</script>";
			}
		} else
			echo "<script>alert('Identify no mutch!');document.location='forgot-password.php</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Password Recovery</title>

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
				<a href="../../index.php">
					<h2> Th Clinic | Doctor Password Recovery</h2>
				</a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post">
					<fieldset>
						<legend>
							Doctor Password Recovery
						</legend>
						<p>
							Please enter your Contact number and Email to recover your password.<br />

						</p>
						<div class="form-group">
							<span class="input-icon">
								<input type="email" class="form-control" name="identifiant" placeholder="Registred Email">
								<i class="fa fa-user"></i> </span>
						</div>

						<div class="form-actions">

							<button type="submit" class="btn btn-primary pull-right" name="submit">
								Reset <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
						<div class="new-account">
							Already have an account?
							<a href="index.php">
								Log-in
							</a>
						</div>
					</fieldset>
				</form>

				<div class="copyright">
					<span class="text-bold text-uppercase"> Th Clinic</span>
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