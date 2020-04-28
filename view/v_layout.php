<?php
include_once("controller/c_user.php");
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_GET['logout'])) {
	unset($_SESSION['user_name']);
	session_unset();
	setcookie(session_name(), '', 100);
	session_destroy();
	$_SESSION = array();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="public/img/logo.png" type="image/png">
	<title>Enterprise Project</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="edusmart/css/bootstrap.css">
	<link rel="stylesheet" href="edusmart/vendors/linericon/style.css">
	<link rel="stylesheet" href="edusmart/css/font-awesome.min.css">
	<link rel="stylesheet" href="edusmart/vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="edusmart/vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="edusmart/vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="edusmart/vendors/animate-css/animate.css">
	<!-- main css -->

	<link rel="stylesheet" href="edusmart/css/style.css">
	<!-- <link rel="stylesheet" href="public/css/style.css"> -->

</head>

<body>

	<!--================ Start Header Menu Area =================-->
	<header class="header_area" id="top">
		<div class="header-top">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-sm-6 col-4 header-top-left">

						<div>
							<?php if (isset($_SESSION['user_name'])) { ?>
								<span class="text">Hello <?= $_SESSION['user_name'] ?></span>
							<?php } ?>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-8 header-top-right">
						<?php if (isset($_SESSION['user_name'])) { ?>
							<a href="index.php?logout=1" class="text-uppercase">Logout</a>
						<?php } else { ?>
							<a href="signup.php" class="text-uppercase">Signup</a>
							<a href="login.php" class="text-uppercase">Login</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="main_menu">
			<!-- <div class="search_input" id="search_input_box">
				<div class="container">
					<form class="d-flex justify-content-between" method="" action="">
						<input type="text" class="form-control" id="search_input" placeholder="Search Here">
						<button type="submit" class="btn"></button>
						<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
					</form>
				</div>
			</div> -->

			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="public/img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
							<!-- <li class="nav-item"><a class="nav-link" href="#">About</a></li> -->
							<!-- <li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Classroom</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="classroom.php">Classroom List</a></li>
									
								</ul>
							</li> -->
							<?php

							if (isset($_SESSION['user_name'])) {
							?>
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Personal</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
										<li class="nav-item"><a class="nav-link" href="conversation.php">Messages</a></li>
									</ul>
								</li>
							<?php
							} ?>
							<?php
							if (isset($_SESSION['role']))
								if ($_SESSION['role'] == 0) {
							?>
								<!-- <li class="nav-item"><a class="nav-link" href="">Staff Function</a></li> -->
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Staff Function</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="report.php">Report</a></li>


										<li class="nav-item"><a class="nav-link" href="classroom.php">Classroom List</a></li>
									</ul>
								</li>

							<?php
								} ?><li class="nav-item">
								<!-- <a href="#" class="nav-link search" id="search">
									<i class="lnr lnr-magnifier"></i>
								</a> -->
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================ End Header Menu Area =================-->

	<!--================ Start Body Area =================-->
	<div class="content-wrapper bg-light">


		<?php
		include_once("view/$view.php");
		?>
	</div>
	<!--================ End Body Area =================-->


	<!--================ Start footer Area  =================-->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Top Tutor</h4>
					<ul>
						<li><a href="#top">Managed Website</a></li>
						<li><a href="#top">Manage Reputation</a></li>
						<li><a href="#top">Power Tools</a></li>

					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Top Tutor</h4>
					<ul>
						<li><a href="#top">Managed Website</a></li>
						<li><a href="#top">Manage Reputation</a></li>
						<li><a href="#top">Power Tools</a></li>

					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Top Tutor</h4>
					<ul>
						<li><a href="#top">Managed Website</a></li>
						<li><a href="#top">Manage Reputation</a></li>
						<li><a href="#top">Power Tools</a></li>

					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Top Tutor</h4>
					<ul>
						<li><a href="#top">Managed Website</a></li>
						<li><a href="#top">Manage Reputation</a></li>
						<li><a href="#top">Power Tools</a></li>

					</ul>
				</div>
				<div class="col-lg-4 col-md-6 single-footer-widget float-right justify-right align-right">
					<a href="#top" title="Back to Top">
						<h2 class="text-white text-center"><i class="lnr lnr-chevron-up"></i></h2>
						<h4 class="text-white text-center">Back to Top</h4>
					</a>

					<!-- <h4>Newsletter</h4>
					<p>You can trust us. we only send promo offers,</p>
					<div class="form-wrap" id="mc_embed_signup">
						<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
						 method="get" class="form-inline">
							<input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'"
							 required="" type="email">
							<button class="click-btn btn btn-default">
								<span>subscribe</span>
							</button>
							<div style="position: absolute; left: -5000px;">
								<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
							</div>

							<div class="info"></div>
						</form>
					</div> -->
				</div>
			</div>
			<div class="row footer-bottom d-flex justify-content-between">
				<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">Copyright © 2018 All rights reserved | This template is
					made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a></p>
				<div class="col-lg-4 col-sm-12 footer-social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-dribbble"></i></a>
					<a href="#"><i class="fa fa-behance"></i></a>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="edusmart/js/jquery-3.2.1.min.js"></script>
	<script src="edusmart/js/popper.js"></script>
	<script src="edusmart/js/bootstrap.min.js"></script>
	<script src="edusmart/js/stellar.js"></script>
	<script src="edusmart/js/countdown.js"></script>
	<script src="edusmart/vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="edusmart/vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="edusmart/js/owl-carousel-thumb.min.js"></script>
	<script src="edusmart/js/jquery.ajaxchimp.min.js"></script>
	<script src="edusmart/vendors/counter-up/jquery.counterup.js"></script>
	<script src="edusmart/js/mail-script.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="edusmart/js/gmaps.min.js"></script>
	<script src="edusmart/js/theme.js"></script>
	<script src="public/js/message.js"></script>
</body>

</html>