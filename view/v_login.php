<?php

require_once('controller/c_user.php');
if (isset($_SESSION['role'])) {
	$_SESSION['role'] = $role;
	print_r($role);
	print_r("$role");
}
if (isset($_POST['login'])) {
	//print_r("role");
	if (isset($_POST['emaillog']) && isset($_POST['passwordlog'])) {

		$email = $_POST['emaillog'];
		$pass = $_POST['passwordlog'];
		$cuser = new c_User();
		$cuser->login($email, $pass);
	}
}
if (isset($_SESSION['login_error'])) {
	echo '<h4 class=" bg-danger text-white text-center">' . $_SESSION['login_error'] . '</h4>';
}
?>



<!-- Content -->
<div class="container">

	<div class="card col-sm-12 col-md-6 mb-5 mx-auto text-white bg-primary">
		<h2 class="pt-4 text-white card-title text-center">Login Form</h2>
		<form action="" method="post" class="center p-3 pb-4">
			<h3 class="pt-4 text-white card-title">Email</h3>
			<input type="email" name="emaillog" class="email col-12 single-input-primary form-control form-control-lg" placeholder="Your Email" required="">
			<h3 class="pt-4 text-white card-title">Password</h3>
			<input type="password" name="passwordlog" class="password col-12 single-input-primary form-control form-control-lg" placeholder="Your Password" required="">
			<div class="pt-3">
				<input type="submit" class="genric-btn success circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-right" value="Login" name="login">
				<!-- <a href="" class="genric-btn info circle px-5 py-1 col-sm-12 col-md-4 float-right" > Cancel</a> -->



			</div>
		</form>
	</div>
</div>






<!-- End Content -->