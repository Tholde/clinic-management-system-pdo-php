<?php
	require_once "../user.php";
	require_once "../classes/page.php";
	session_start();
	if (!isset($_SESSION["id"])) {
		header("Location: index.php");
	}
	$action = new User();
	$ab = new About();
	if (isset($_POST['submit'])) {
		$ab->pageTitle = $_POST['pagetitle'];
		$ab->email = $_POST['email'];
		$ab->phone = $_POST['phone'];
		$ab->pageDescription = $_POST['pageDescription'];
		$ab->disponibleTime = $_POST['disponibleTime'];
		$action->connect();
		$action->updateContact($ab);
		echo "<script>alert('Updated successfully!');document.location='dashboard.php'</script>";
	}
	$action->connect();
	$all = $action->fetchAllContact();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Contact Us </title>

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
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
								<h1 class="mainTitle">Admin | Update the Contact us Content</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin </span>
								</li>
								<li class="active">
									<span>Update the Contact us Content</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">


						<div class="row">
							<div class="col-md-12">
							<?php
								foreach ($all as $key => $row):
							?>
								<form class="forms-sample" method="post">

									<div class="form-group">
										<label for="exampleInputUsername1">Page Title</label>
										<input id="pagetitle" name="pagetitle" type="text" class="form-control"
											required="true" value="<?php echo $row['pageTitle']; ?>">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Page Description</label>
										<textarea class="form-control" name="pageDescription" id="pagedes" rows="5"><?php echo $row['pageDescription']; ?></textarea>
									</div>
									<div class="form-group">
										<label for="exampleInputUsername1">Email Addresss</label>
										<input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required='true'>
									</div>
									<div class="form-group">
										<label for="exampleInputUsername1">Mobile Number</label>
										<input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" required='true'
											maxlength="10" pattern='[0-9]+'>
									</div>
									<div class="form-group">
										<label for="exampleInputUsername1">Disponible Time</label>
										<input type="text" class="form-control" name="disponibleTime" value="<?php echo $row['disponibleTime']; ?>" required='true'>
									</div>
									<button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
								</form>
								<?php endforeach ?>
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