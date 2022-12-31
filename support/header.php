<?php
session_start();

// check is logged or not
if (!isset($_SESSION['logged']) && !($page == "about" || $page == "contact" || $page == 'login' || $page == 'resetPassword' || $page == "register" || $page == 'submitForms')) {
	header("location: login.php");
}

//check the cookies is expired or not
//if expired close the sessions and redirect to login
if (!isset($_COOKIE['loginSession']) && ($page != "login" && $page != 'resetPassword' && $page != "register" && $page != 'submitForms' && $page != 'contact' && $page != 'about')) {
	session_unset();
	session_destroy();
	session_write_close();
	echo '<script> if(!alert("Your session time out...")) { document.location = "login.php"}</script>';
}

if (isset($_SESSION['logged']) && ($page == "login" ||  $page == 'resetPassword' || $page == "register")) {
	header("location: index.php");
}

require_once("connection/connection.php");
?>
<!DOCTYPE html>

<html lang="eng">

<head>

	<!-- Site title -->
	<title>PCDOffice</title>

	<?php
	header('Content-Type: text/html; charset=utf-8');
	// set the default timezone to use.
	date_default_timezone_set('Asia/Colombo');
	?>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Favicon-->
	<link rel="icon" href="https://c0.klipartz.com/pngpicture/944/386/gratis-png-gobierno-de-la-gaceta-del-gobierno-de-sri-lanka-relaciones-entre-indonesia-y-sri-lanka-thumbnail.png" sizes="32x32" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

	<!-- CSS Libraries -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


	<!-- CSS -->
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	<link href="layout/styles/Calender.css" rel="stylesheet" type="text/css" media="all">

</head>

<!-- Begin of body -->

<body id="top">

	<!-- Top header -->
	<div class="wrapper row0">
		<header id="header" class="hoc clear text-md-left">
			<!-- Start of header -->
			<div class="row justify-content-center text-center">

				<h1 class="p-2 font-x3" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
					PCDOffice</h1>

			</div>
		</header>
	</div>

	<div class="wrapper row1">
		<section>

			<!-- Nav Bar Start -->
			<div class="nav ">
				<div class="container-fluid">
					<nav class="navbar navbar-expand-md bg-dark navbar-dark">
						<a href="#" class="navbar-brand">MENU</a>
						<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
							<span class="navbar-toggler-icon"></span>
						</button>

						<!-- Main menu -->
						<div class="collapse navbar-collapse justify-content-between " id="navbarCollapse">
							<div class="navbar-nav nav-tabs mr-auto">
								<?php
								if (isset($_SESSION['logged'])) {
								?>
									<a href="index.php" class="nav-item nav-link home " id="home" onclick="activeLink('home')">Home
										<hr class="hrhome">
									</a>
									<a href="online_application_home.php" class="nav-item nav-link forms" id="forms" onclick="activeLink('forms')">Online Application
										<hr class="hrforms">
									</a>
									<?php
									if (isset($_SESSION['TYPE'])) {
										if ($_SESSION['TYPE'] == '1' || $_SESSION['TYPE'] == '2') {
									?>
											<a href="dashboard.php" class="nav-item nav-link dashboard" id="dashboard" onclick="activeLink('dashboard')">Dashboard
												<hr class="hrdashboard">
											</a>
								<?php
										}
									}
								}
								?>

								<?php
								if (!isset($_SESSION['logged'])) {
								?>
									<a href="online_application.php" class="nav-item nav-link forms" id="forms" onclick="activeLink('forms')">Submit Application
										<hr class="hrforms">
									</a>
								<?php
								}
								?>
								<a href="contact.php" class="nav-item nav-link contact" id="contact" onclick="activeLink('contact')">Contact
									<hr class="hrcontact">
								</a>
								<a href="aboutUs.php" class="nav-item nav-link about" id="about" onclick="activeLink('about')">About Us
									<hr class="hrabout">
								</a>

							</div>
							<!-- User logins -->
							<div class="navbar-nav nav-tabs ml-auto">
								<?php
								if (isset($_SESSION["logged"])) {
								?>
									<p class="nav-item nav-link text-white font-weight-bold">
										Welcome
									<?php
									echo $_SESSION['username'];
								} ?>
									</p>
							</div>

							<?php
							if (isset($_SESSION["logged"])) {
							?>

								<div class="navbar-nav nav-tabs ml-auto">
									<div class="nav-item dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Logout</a>
										<div class="dropdown-menu">
											<a href="logout.php" onclick="activeLink('reset')" class="dropdown-item">Logout</a>
										</div>
									</div>

								<?php
							} else {
								?>

									<div class="nav-item dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
										<div class="dropdown-menu">
											<a href="login.php" onclick="activeLink('reset')" class="dropdown-item">Login</a>
										</div>

									</div>

								<?php
							}
								?>

								</div>
						</div>
					</nav>
				</div>
			</div>
			<!-- Nav Bar End -->

		</section>
	</div>
	<!-- Search bar -->
	<?php if (isset($_SESSION['logged'])) { ?>
		<div class="row" style="background-color:#AA5670;">
			<div class="col-md-3">
			</div>
			<div id="searchform" class="col-md-6">
				<div style="border: 2px solid white; border-radius: 4px;" class="mt-2 mb-2">
					<form action="../php/search.php" method="post">
						<fieldset>
							<legend>Quick Search:</legend>
							<input class="text-white" type="text" name="searchText" placeholder="Enter search term&hellip;">
							<button type="submit"><i class="fas fa-search"></i></button>
						</fieldset>
					</form>
				</div>
			</div>
			<div class="col-md-3">

			</div>
		</div>
	<?php } ?>