<?php
require_once "user.php";
require_once "classes/appointment.php";
require_once "classes/specialization.php";
session_start();
if (!isset($_SESSION["id"])) {
	header("Location: index.php");
}
$action = new User();
$apt = new Appointment();
$spec = new Specialization();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>User | Book Appointment</title>

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

			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">User | Book Appointment</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>User</span>
								</li>
								<li class="active">
									<span>Book Appointment</span>
								</li>
							</ol>
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
												<h5 class="panel-title">Book Appointment</h5>
											</div>
											<div class="panel-body">
												<p style="color:red;"></p>
												<form role="form" name="book" method="post">



													<div class="form-group">
														<label for="DoctorSpecialization">
															Doctor Specialization
														</label>
														<select name="doctorSpecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
															<option value="">Select Specialization</option>
															<?php
															$action->connect();
															$listSpec = $action->fetchAllSpecialization();
															foreach ($listSpec as $key => $value) {

															?>
																<option value="<?= $value['name'] ?>"><?= $value['name'] ?>
																</option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group">
														<label for="doctor">
															Doctors Disponible
														</label>
														<select name="doctorname" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">

															<?php
															$action->connect();
															$listdoc = $action->fetchOneDrSpecial($value['name']);
															$count = count($listdoc);

															if (empty($listdoc == $listdoc[$i])) {
															?>
																<option value="">Select Doctor</option>
																<?php foreach ($listdoc as $key => $val) { ?>
																	<option value="<?= $val['firstname'] ?>"><?= $val['firstname'] ?>
																	</option>
															<?php
																}
															} ?>
														</select>

													</div>
													<div class="form-group">
														<label for="consultancyfees">
															Consultancy Fees
														</label>
														<input type="number" class="form-control" name="consultancyFees" required="required">

													</div>
													<div class="form-group">
														<label for="appointmentDate">
															Date
														</label>
														<input class="form-control datepicker" name="appointmentDate" required="required" data-date-format="yyyy-mm-dd">
													</div>
													<div class="form-group">
														<label for="Appointmenttime">
															Time
														</label>
														<input class="form-control" name="apptime" id="timepicker1" required="required">eg : 10:00 PM
													</div>
													<button type="submit" name="submit" class="btn btn-o btn-primary">
														Submit
													</button>
												</form>
												<?php
												$action->connect();
												$listPat = $action->fetchOnePatient($_GET['id']);
												foreach ($listPat as $key => $valu) {

													if (isset($_POST['submit'])) {

														$apt->doctorSpecialization = $_POST['doctorSpecialization'];
														$apt->doctorname = $_POST['doctorname'];
														$apt->patientname = $valu['firstname'];
														$apt->consultancyFees = $_POST['consultancyFees'];
														$apt->appointmentDate = $_POST['appointmentDate'] . " at " . $_POST['apptime'];
														$apt->postingDate = $_POST['postingDate'];

														$action->connect();
														$action->insertAppointment($apt);
														echo "<script>alert('data saved successfully');document.location='dashboard.php?id=" . $_GET['id'] . "'</script>";
													}
												}
												?>
											</div>
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

		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			startDate: '-3d'
		});
	</script>
	<script type="text/javascript">
		$('#timepicker1').timepicker();
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

</body>

</html>