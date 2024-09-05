<?php
require_once "../user.php";
require_once "../classes/docteur.php";
require_once "../classes/specialization.php";
session_start();
if (!isset($_SESSION["id"])) {
	header("Location: index.php");
}
$action = new User();
$doc = new Docteur();
$apt = new Specialization();

$action->connect();
$listSpec = $action->fetchAllSpecialization();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Add Doctor</title>

	<link
		href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
		rel="stylesheet" type="text/css" />
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
	<script type="text/javascript">
		function valid() {
			if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.adddoc.cfpass.focus();
				return false;
			}
			return true;
		}
	</script>

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
								<h1 class="mainTitle">Admin | Add Doctor</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Add Doctor</span>
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
												<h5 class="panel-title">Add Doctor</h5>
											</div>
											<div class="panel-body">

												<form role="form" name="adddoc" method="post"
													enctype="multipart/form-data" onSubmit="return valid();">
													<div class="form-group">
														<label for="doctorname">
															Doctor Image Profil
														</label>
														<input type="file" name="image" class="form-control"
															required="true">
													</div>
													<div class="form-group">
														<label for="DoctorSpecialization">
															Doctor Specialization
														</label>
														<select name="specialization" class="form-control"
															required="true">
															<option value="">Select Specialization</option>
															<?php foreach ($listSpec as $key => $value):
															?>
																<option value="<?= $value['name'] ?>">
																	<?= $value['name'] ?>
																</option>
																<?php endforeach ?>
														</select>
													</div>
													<div class="form-group">
														<label for="DoctorSpecialization">
															Doctor Role
														</label>
														<select name="role" class="form-control" required="true">
															<option value="">Role </option>
															<option value="0">Medecin</option>
															<option value="1">Infirmier</option>
														</select>
													</div>

													<div class="form-group">
														<label for="firstname">
															Doctor First Name
														</label>
														<input type="text" name="firstname" class="form-control"
															placeholder="Enter Doctor First Name" required="true">
													</div>
													<div class="form-group">
														<label for="lastname">
															Doctor Last Name
														</label>
														<input type="text" name="lastname" class="form-control"
															placeholder="Enter Doctor Last Name">
													</div>

													<div class="form-group">
														<label for="address">
															Doctor Address
														</label>
														<textarea name="address" class="form-control"
															placeholder="Enter Doctor Clinic Address"
															required="true"></textarea>
													</div>
													<div class="form-group">
														<label for="fess">
															Doctor Consultancy Fees
														</label>
														<input type="text" name="docfees" class="form-control"
															placeholder="Enter Doctor Consultancy Fees" required="true">
													</div>

													<div class="form-group">
														<label for="fess">
															Doctor Phone Number
														</label>
														<input type="text" name="phone" class="form-control"
															placeholder="Enter Doctor Phone Number" required="true">
													</div>

													<div class="form-group">
														<label for="fess">
															Doctor Email
														</label>
														<input type="email" id="docemail" name="mail"
															class="form-control" placeholder="Enter Doctor Email"
															required="true" onBlur="checkemailAvailability()">
														<span id="email-availability-status"></span>
													</div>

													<div class="form-group">
														<label for="exampleInputPassword1">
															Password
														</label>
														<input type="password" name="password" class="form-control"
															placeholder="Password" required="required">
													</div>

													<div class="form-group">
														<label for="exampleInputPassword2">
															Confirm Password
														</label>
														<input type="password" name="confirmPassword"
															class="form-control" placeholder="Confirm Password"
															required="required">
													</div>
													<button type="submit" name="submit" id="submit"
														class="btn btn-o btn-primary">
														Submit
													</button>
												</form>
												<?php
												if (isset($_POST['submit'])) {

													$photo = fopen($_FILES["image"]["tmp_name"], 'rb');
													$permited = array('jpg', 'jpeg', 'png', 'gif');
													$file_size = $_FILES['image']['size'];
													$file_name = $_FILES['image']['name'];
													$file_temp = $_FILES['image']['tmp_name'];

													$div = explode('.', $file_name);
													$file_ext = strtolower(end($div));

													if ($_POST['password'] !== $_POST['confirmPassword']) {
														echo "<script>alert('Password and Confirm Password no macth');document.location='../signup.php'</script>";
													} else if (!$permited) {
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
														$doc->password = md5($_POST['password']);
														$doc->image = $unique_image;
														$doc->identifiant = strtolower($_POST['firstname']) . '@thclinic.org';

														$action->connect();
														$action->insertDr($doc);
														echo "<script>alert('data saved successfully');document.location='manage-doctors.php'</script>";
													}
												}
												?>
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
		jQuery(document).ready(function () {
			Main.init();
			FormElements.init();
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>