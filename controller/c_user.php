<?php
include_once("controller/c_router.php");
include_once("model/m_user.php");
class c_User extends c_Router{
	public function getUser()
	{
		$muser=new m_User();
		$userlist = $muser->getAllUser();
		$data = array('UserList'=>$userlist);
		$this->loadView('v_user', $data);
	}

	public function getLogin()
	{
		
		$this->loadView('v_login');
	}
	public function getSignUp()
	{
		
		$this->loadView('v_signup');
	}

	public function register($name, $email, $pass)
	{

		$muser = new m_User();
		$id = $muser->register($name, $email, $pass);
		
		if($id>0)
		{

			//reg is succ
			$_SESSION['success'] ='registration succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			header("location:index.php");
			
		}
		else
		{
			//fail
			$_SESSION['error']='Registration fail';
			header("location:signup.php");

		}
	}
	public function register($first_name,$last_name.$email,$password,$role)
	{

		$muser = new m_User();
		$id = $muser->register($first_name,$last_name.$email,$password,$role);
		
		if($id>0)
		{

			//reg is succ
			$_SESSION['success'] ='registration succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			header("location:index.php");
			
		}
		else
		{
			//fail
			$_SESSION['error']='Registration fail';
			header("location:signup.php");

		}
	}
	public function login($email, $pass)
	{
		$muser = new m_User();
		$user = $muser->login($email, $pass);
		if($user)
		{
			$_SESSION['user_name'] = $user->first_name;
			$_SESSION['user_id'] = $user->user_id;
			$_SESSION['role'] = $user->role;
			if(isset($_SESSION['user_error']))
				unset($_SESSION['user_error']);
			if($user->role == 1){
				// student
			header("location:index.php");}
			else if($user->role == 0){
				//print_r("admin");
			header("location:index.php");}
			}
			else if($user->role == 0){
				//print_r("tutor");
			header("location:index.php");}
			}
			}
			else
			{
				$_SESSION['user_error'] = "login fail!";
			}
	}
	public function logout()
	{
		 if(isset($_SESSION['user_name']))
			 {
			 	session_unset();
			 	session_destroy();
			 }
	}
	

	public function DeleteUser($id)
	{

		$muser = new m_User();
		$idd = $muser->DeleteUser($id);
		
		if($idd>0)
		{
			 
			//reg is succ
			$_SESSION['success'] ='DeleteUser succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			 header("location:userman.php");
			
		}
		else
		{	
			
			//fail
			$_SESSION['error']='DeleteUser fail';
			 header("location:userman.php");

		}
	}
}


?>