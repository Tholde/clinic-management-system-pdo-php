<?php
//error_reporting(0);
require_once "user.php";
require_once "classes/patient.php";

$action = new User();
$doc = new Patient();
$action->connect();
?>
<header class="navbar navbar-default navbar-static-top">
	<!-- start: NAVBAR HEADER -->
	<div class="navbar-header">
		<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
			<i class="ti-align-justify"></i>
		</a>
		<a class="navbar-brand" href="#">
			<h2 style="padding-top:20% ">HMS</h2>
		</a>
		<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
			<i class="ti-align-justify"></i>
		</a>
		<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<i class="ti-view-grid"></i>
		</a>
	</div>
	<!-- end: NAVBAR HEADER -->
	<!-- start: NAVBAR COLLAPSE -->
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-right">
			<!-- start: MESSAGES DROPDOWN -->
			<li style="padding-top:2% ">
				<h2>Th Clinic</h2>
			</li>

			<?php
			$action->connect();
			$nbr = $action->fetchOnePatient($_GET['id']);
			foreach ($nbr as $key => $row) {
			?>
				<li class="dropdown current-user">
					<a href class="dropdown-toggle" data-toggle="dropdown">
						<img src="upload/default-user.png"> <span class="username">

						<?php
						echo $row['firstname'];
					}
						?> <i class="ti-angle-down"></i></i>
						</span>
					</a>
					<ul class="dropdown-menu dropdown-dark">
						<li>
							<a href="edit-profile.php?id=<?= $_GET['id'] ?>">
								My Profile
							</a>
						</li>
						<li>
							<a href="change-password.php?id=<?= $_GET['id'] ?>">
								Change Password
							</a>
						</li>
						<li>
							<a href="logout.php">
								Log Out
							</a>
						</li>
					</ul>
				</li>
				<!-- end: USER OPTIONS DROPDOWN -->
		</ul>
		<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
		<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
			<div class="arrow-left"></div>
			<div class="arrow-right"></div>
		</div>
		<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
	</div>


	<!-- end: NAVBAR COLLAPSE -->
</header>