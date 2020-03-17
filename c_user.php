<?php
require_once("controller/c_router.php");
include_once("model/m_user.php");
class c_User extends c_Router{
	public function getUser()
	{
		$muser= new m_User();
		$userlist = $muser->getAllUser();
		$data = array('UserList'=>$userlist);
		$this->loadView('v_user', $data);
	}

	public function getList()
	{
		$muser=new m_User();
		$userlist = $muser->getAllUser();
		$data = array('UserList'=>$userlist);
		return $data;
	}
	
	public function getLogin()
	{
		
		$this->loadView('v_login');
	}
	public function getSignUp()
	{
		
		$this->loadView('v_signup');
	}

	

	


	public function login($email, $pass)
	{	
		$muser = new m_User();
		$user = $muser->login($email,md5($pass));
		if($user)
		{	

			$_SESSION['user_name'] = $user->first_name;
			$_SESSION['user_id'] = $user->user_id;
			$_SESSION['role'] = $user->role;
			if(isset($_SESSION['user_error']))
				unset($_SESSION['user_error']);
			print_r($user->role);
			print_r("expression");
			echo '<script> console.log("login"); </script>';
			// if($user->role == 1){
			// 	// student
			// //header("location:index.php");
			// 	print_r($user->role);
			// //echo '<script> location.replace("index.php"); </script>';
			// }else if($user->role == 2){
			// 	//print_r("admin");
			// //header("location:index.php");
			// 	print_r($user->role);
			// 	//echo '<script> location.replace("index.php"); </script>';
			// }else if($user->role == 0){
			// 	//print_r("tutor");
			// //header("location:index.php");
			// 	print_r($user->role);
			echo '<script> location.replace("index.php"); </script>';
			// }
		}else
			{
				$_SESSION['user_error'] = "login fail!";
				echo '<script> console.log("Fail"); </script>';
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
			 //header("location:userman.php");
			echo '<script> location.replace("index.php"); </script>';
		}
		else
		{	
			
			//fail
			$_SESSION['error']='DeleteUser fail';
			 // header("location:userman.php");
			echo '<script> location.replace("index.php"); </script>';
		}
	}
	public function register($first_name,$last_name,$email,$password,$role)
	{

		$muser = new m_User();
		$id = $muser->register($first_name,$last_name,$email,$password,$role);
		// $id = 1;
		if($id>0)
		{


			//reg is succ
			$_SESSION['success'] ='registration succeed!';
			if(isset($_SESSION['error']))
				{unset($_SESSION['error']);}
			//header("location:index.php");
			 echo '<script> location.replace("index.php"); </script>';
		}
		else
		{
			//fail
			$_SESSION['error']='Registration fail';
			//header("location:signup.php");
			echo '<script> location.replace("signup.php"); </script>';
		}
	}
}

?>