<?php
include_once('controller/c_user.php');



if(isset($_POST['register']))
{
	
	if(isset($_POST['first_name']))
		$first_name=$_POST['first_name'];
	if(isset($_POST['last_name']))
		$last_name=$_POST['last_name'];
	if(isset($_POST['email']))
		$email=$_POST['email'];
	if(isset($_POST['password']))
		$pass=$_POST['password'];
	if(isset($_POST['repassword']))
		$repass=$_POST['repassword'];
	if(isset($_POST['role']))
		$role=$_POST['role'];
	if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['repassword']) && $pass==$repass && strlen($_POST['password']) >0 && strlen($_POST['password'])<50 && strlen($_POST['email']) >0 &&strlen($_POST['email'])<100)
	{
		
		$cuser = new c_User();
		$cuser->register($first_name,$last_name,$email,$pass,$role);
	}
	else{
		
		$_SESSION['error']='Registration fail!';
		// header("location:signup.php");
	}
}
  ?>



 <!-- Content -->
<div class="container">
	<div class="card col-sm-12 col-md-6 mb-5 mx-auto text-white bg-primary">
		 <h2 class="pt-4 text-white card-title text-center">Registration Form</h2>
				<form action="#" method="post" class="center p-3 pb-4">
				  <h3 class="pt-4 text-white card-title">First Name</h3><h4 class=" bg-danger text-white"></bg-dark>
				  <input type="text" class="col-12 single-input-primary form-control form-control-lg" name="first_name" required="required" />
				  <h3 class="pt-4 text-white card-title">Last Name</h3><h4 class=" bg-danger text-white"></bg-dark>
				  <input type="text" class="col-12 single-input-primary form-control form-control-lg" name="last_name" required="required" />
				  <h3 class="pt-4 text-white card-title">Email</h3><h4 class=" bg-danger text-white"></bg-dark>
				  <input type="email" class="col-12 single-input-primary form-control form-control-lg" name="email" required="required" />
				  <h3 class="pt-4 text-white card-title">Password</h3><h4 class=" bg-danger text-white"></bg-dark>
				  <input type="password" class="col-12 single-input-primary form-control form-control-lg" name="password" id="password1"  required="required">
				  <h3 class="pt-4 text-white card-title">Confirm Password</h3><h4 class=" bg-danger text-white"></bg-dark>
				  <input type="password" class="col-12 single-input-primary form-control form-control-lg" name="repassword" id="repassword"  required="required">
				<h3 class="pt-4 text-white card-title">Role</h3>
				
				  <div class="form-select">
					<select class="form-control form-control-lg" name="role" id="role">
					<option value="1" selected="">Student</option>
					<option value="2">Tutor</option>
										
					</select>
								</div>				
				  <div class="pt-3">
						<input  type="submit" class="genric-btn success circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-right" value="Sign up" name="register">
					</div> 
				</form> 
	</div>
</div>






 <!-- End Content -->