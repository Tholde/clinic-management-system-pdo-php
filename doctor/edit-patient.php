<?php
require_once "../user.php";
require_once "../classes/patient.php";
//error_reporting(0);
session_start();
if (!isset($_SESSION["id"])) {
	header("Location: index.php");
}
$action = new User();
$doc = new Patient();

if (isset($_POST['submit'])) {

	$doc->firstname = $_POST['firstname'];
	$doc->lastname = $_POST['lastname'];
	$doc->address = $_POST['address'];
	$doc->email = $_POST['mail'];
	$doc->phone = $_POST['phone'];
	$doc->gender = $_POST['gender'];
	$doc->age = $_POST['age'];

	$action->connect();
	$action->insertPatient($doc);
	echo "<script>alert('data saved successfully');document.location='manage-patient.php?id=" . $_GET['id'] . "'</script>";
}
$action->connect();
$oneDr = $action->fetchOnePatient($_GET['editid']);



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor | Add Patient</title>

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />


</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">
			<?php include('include/header.php'); ?>

			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Patient | Add Patient</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Patient</span>
								</li>
								<li class="active">
									<span>Add Patient</span>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Add Patient</h5>
											</div>
											<div class="panel-body">
												<?php foreach ($oneDr as $key => $value) : ?>
													<form role="form" name="" method="post">

														<div class="form-group">
															<label for="doctorname">
																Patient First Name
															</label>
															<input type="text" name="firstname" class="form-control" value="<?= $value['firstname'] ?>" required="true">
														</div>
														<div class="form-group">
															<label for="doctorname">
																Patient Last Name
															</label>
															<input type="text" name="lastname" class="form-control" value="<?= $value['lastname'] ?>" required="true">
														</div>
														<div class="form-group">
															<label for="fess">
																Patient Contact
															</label>
															<input type="text" name="phone" class="form-control" value="<?= $value['phone'] ?>" required="true" maxlength="10" pattern="[0-9]+">
														</div>
														<div class="form-group">
															<label for="fess">
																Patient Email
															</label>
															<input type="email" id="patemail" name="email" class="form-control" value="<?= $value['email'] ?>" readonly='true'>
															<span id="email-availability-status"></span>
														</div>
														<div class="form-group">
															<label class="control-label">Gender: </label>
															<?php if ($value['firstname'] == "female") { ?>
																<input type="radio" name="gender" id="gender" value="female" checked="true">Female
																<input type="radio" name="gender" id="gender" value="male">Male
															<?php } else { ?>
																<label>
																	<input type="radio" name="gender" id="gender" value="male" checked="true">Male
																	<input type="radio" name="gender" id="gender" value="female">Female
																</label>
															<?php } ?>
														</div>
														<div class="form-group">
															<label for="address">
																Patient Address
															</label>
															<textarea name="address" class="form-control" required="true"><?= $value['address'] ?></textarea>
														</div>
														<div class="form-group">
															<label for="fess">
																Patient Age
															</label>
															<input type="text" name="age" class="form-control" value="<?= $value['age'] ?>" required="true">
														</div>

														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
												<?php endforeach ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="panel panel-white">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- start: FOOTER -->
	<?php include('include/footer.php'); ?>
	<!-- end: FOOTER -->

	<!-- start: SETTINGS -->
	<?php include('include/setting.php'); ?>

	<!-- end: SETTINGS -->
	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<!-- end: MAIN JAVASCRIPTS -->
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- start: CLIP-TWO JAVASCRIPTS -->
	<script src="assets/js/main.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>