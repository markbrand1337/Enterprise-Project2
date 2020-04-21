<?php
include_once("controller/c_user.php");

$cuser = new c_User();

$data = $cuser->getList();


$userlist = $data['UserList'];

?>

<!-- Content -->
<div class="container">
	<div class="card col-sm-12 col-md-6 mb-5 mx-auto text-white bg-white">
		<h2 class="pt-4 text-dark card-title text-center">Edit User</h2>
		<form action="#" method="post" class="center p-3 pb-4">
			<h3 class="pt-4 text-dark card-title">First Name</h3>
			<h4 class=" bg-danger text-white"></h4>
			<input type="text" class="col-12 single-input-primary form-control form-control-lg border border-info" name="first_name" required="required" />
			<h3 class="pt-4 text-dark card-title">Last Name</h3>
			<h4 class=" bg-danger text-white"></h4>
			<input type="text" class="col-12 single-input-primary form-control form-control-lg border border-info" name="last_name" required="required" />
			<h3 class="pt-4 text-dark card-title">Email</h3>
			<h4 class=" bg-danger text-white"></h4>
			<input type="email" class="col-12 single-input-primary form-control form-control-lg border border-info" name="email" required="required" />
			<h3 class="pt-4 text-dark card-title">Password</h3>
			<h4 class=" bg-danger text-white"></h4>
			<input type="password" class="col-12 single-input-primary form-control form-control-lg border border-info" name="password" id="password1" required="required">
			<h3 class="pt-4 text-dark card-title">Confirm Password</h3>
			<h4 class=" bg-danger text-white"></h4>
			<input type="password" class="col-12 single-input-primary form-control form-control-lg border border-info" name="repassword" id="repassword" required="required">
			<h3 class="pt-4 text-dark  card-title">Role</h3>

			<div class="form-select">
				<select class="form-control form-control-lg border border-info" name="role" id="role">
					<option value="1" selected="">Student</option>
					<option value="2">Tutor</option>
					<?php
					if (isset($_SESSION['role']))
						if ($_SESSION['role'] == 0) {
							echo '<option value="0">Staff</option>';
						}
					?>
				</select>
			</div>
			<div class="pt-3">
				<input type="submit" class="genric-btn success circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-right" value="Sign up" name="register">
			</div>
		</form>
	</div>







</div>
<!-- End Content -->