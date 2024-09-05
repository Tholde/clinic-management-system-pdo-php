<?php
require_once "../user.php";
require_once "../classes/specialization.php";
require_once "../classes/docteur.php";
//error_reporting(0);
session_start();
if (!isset($_SESSION["id"])) {
	header("Location: index.php");
}
$action = new User();
$spec = new Specialization();
$doc = new Docteur();
if (isset($_POST['submit'])) {
	$photo = fopen($_FILES["image"]["tmp_name"], 'rb');
	$permited = array('jpg', 'jpeg', 'png', 'gif');
	$file_size = $_FILES['image']['size'];
	$file_name = $_FILES['image']['name'];
	$file_temp = $_FILES['image']['tmp_name'];

	$div = explode('.', $file_name);
	$file_ext = strtolower(end($div));

	if (!$permited) {
		echo "<script>alert('Please insert jpg or jpeg or png or gif file only!');document.location='../signup.php'</script>";
	} else {

		$unique_image = $file_name . '.' . $file_ext;
		$upload_image = "../upload/" . $unique_image;

		move_uploaded_file($file_temp, $upload_image);

		$doc->firstname = $_POST['firstname'];
		$doc->lastname = $_POST['lastname'];
		$doc->phone = $_POST['phone'];
		$doc->specialization = $_POST['specialization'];
		$doc->address = $_POST['address'];
		$doc->email = $_POST['mail'];
		$doc->docfees = $_POST['docfees'];
		$doc->user_role = $_POST['role'];
		$doc->image = $unique_image;
		$doc->identifiant = strtolower($_POST['firstname']) . '@thclinic.org';
		$action->connect();
		$action->updateDr($doc);
		echo "<script>alert('update succesfuly!');document.location='home.php?id=" . $_GET['id'] . "''</script>";
	}
}
$action->connect();
$oneDr = $action->fetchOneDr($_GET['id']);
$allSpc = $action->fetchAllSpecialization();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctr | Edit Doctor Details</title>

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
								<h1 class="mainTitle">Doctor | Edit Doctor Details</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Doctor</span>
								</li>
								<li class="active">
									<span>Edit Doctor Details</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">

								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Edit Doctor</h5>
											</div>
											<?php foreach ($oneDr as $key => $value) : ?>
												<div class="panel-body">
													<h4><?= $value['firstname'] ?>'s Profile</h4>
													<p><b>Profile Last Updation Date: <?php echo date('d/m/Y à H:i', strtotime($value['last_update'])); ?></b></p>
													<hr />
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="DoctorSpecialization">
																Doctor Specialization
															</label><?php
																	$action->connect();
																	$oneSpc = $action->fetchOneSpecializationName($value['specialization']);
																	?>
															<select name="specialization" class="form-control" required="required">
																<?php if (empty($oneSpc)) { ?>
																	<option value="">Specialization</option>
																	<?php foreach ($allSpc as $key => $val) { ?>
																		<option value="<?= $val['name'] ?>"><?= $val['name'] ?></option>
																	<?php } ?>
																<?php } else { ?>
																	<?php
																	foreach ($all as $key => $val) :
																	?>
																		<option value="<?= $value['specialization'] ?>"><?= $value['specialization'] ?></option>
																		<?php foreach ($allSpc as $key => $value) { ?>
																			<option value="<?= $value['name'] ?>"><?= $val['name'] ?></option>
																		<?php } ?>
																	<?php endforeach; ?>
																<?php } ?>
															</select>
														</div>
														<div class="form-group">
															<label for="DoctorSpecialization">
																Doctor Role
															</label>
															<select name="role" class="form-control" required="true">
																<option value="<?= $val['user_role'] ?>">
																	<?php if ($val['user_role'] = 0) {
																		echo "Medecin";
																	} else {
																		echo "Infirmier";
																	}
																	?>
																</option>
																<option value="0">Medecin</option>
																<option value="1">Infirmier</option>
															</select>
														</div>
														<div class="form-group">
															<label for="doctorname">
																Doctor First Name
															</label>
															<input type="text" name="firstname" class="form-control" value="<?= $value['firstname'] ?>">
														</div>
														<div class="form-group">
															<label for="doctorname">
																Doctor Last Name
															</label>
															<input type="text" name="lastname" class="form-control" value="<?= $value['lastname'] ?>">
														</div>
														<div class="form-group">
															<label for="address">
																Doctor Address
															</label>
															<textarea name="address" class="form-control"><?= $value['address'] ?></textarea>
														</div>
														<div class="form-group">
															<label for="fess">
																Doctor Consultancy Fees
															</label>
															<input type="text" name="docfees" class="form-control" required="required" value="<?= $value['docfees'] ?>">
														</div>
														<div class="form-group">
															<label for="fess">
																Doctor Phone Number
															</label>
															<input type="text" name="phone" class="form-control" required="required" value="<?= $value['phone'] ?>">
														</div>
														<div class="form-group">
															<label for="fess">
																Doctor Email
															</label>
															<input type="email" name="mail" class="form-control" readonly="readonly" value="<?= $value['email'] ?>">
														</div>
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
												<?php endforeach; ?>
												</div>
										</div>
									</div>

								</div>
							</div>

						</div>

						<!-- end: BASIC EXAMPLE -->

						<!-- end: SELECT BOXES -->

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