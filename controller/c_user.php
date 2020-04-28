<?php
require_once("controller/c_router.php");
include_once("model/m_user.php");
include_once("model/m_classroom.php");
include_once("model/m_userlog.php");
class c_User extends c_Router
{
	public function getUser()
	{

		$muser = new m_User();
		$userlist = $muser->getAllUser();
		$data = array('UserList' => $userlist);
		$this->loadView('v_user', $data);
	}
	public function searchStudentByName($name)
	{

		$muser = new m_User();
		$userlist = $muser->searchStudentByName($name);
		$data = array('UserList' => $userlist);
		return $data;
	}

	public function searchAvailableStudent($name)
	{

		$muser = new m_User();
		$userlist = $muser->searchAvailableStudent($name);
		$data = array('UserList' => $userlist);
		return $data;
	}
	public function getAllStudentNotFromClass($class)
	{

		$muser = new m_User();
		$userlist = $muser->getAllStudentNotFromClass($class);
		$data = array('UserList' => $userlist);
		return $data;
	}
	public function getAvailableStudent()
	{

		$muser = new m_User();
		$userlist = $muser->getAvailableStudent();
		$data = array('UserList' => $userlist);
		return $data;
	}
	public function getAvailableTutor()
	{

		$muser = new m_User();
		$userlist = $muser->getAvailableTutor();
		$data = array('UserList' => $userlist);
		return $data;
	}
	public function getOtherUser($id)
	{

		$muser = new m_User();
		$userlist = $muser->getOtherUser($id);
		$data = array('UserList' => $userlist);
		return $data;
	}
	public function getList()
	{
		$muser = new m_User();
		$userlist = $muser->getAllUser();
		$data = array('UserList' => $userlist);
		return $data;
	}
	public function getStudentList()
	{
		$muser = new m_User();
		$userlist = $muser->getAllStudent();
		$data = array('UserList' => $userlist);
		return $data;
	}
	public function getTutorList()
	{
		$muser = new m_User();
		$userlist = $muser->getAllTutor();
		$data = array('UserList' => $userlist);
		return $data;
	}

	public function getLogin()
	{

		$this->loadView('v_login');
	}
	public function getDashboard()
	{

		$this->loadView('v_dashboard');
	}

	public function getAdd()
	{

		$this->loadView('v_useradd');
	}
	public function getEdit()
	{

		$this->loadView('v_useredit');
	}

	public function getReport()
	{

		$this->loadView('v_report');
	}
	public function getSignUp()
	{

		$this->loadView('v_signup');
	}

	public function getOneUser($id)
	{
		$model = new m_User();
		$oneuser = $model->getOneUser($id);

		$user = array('OneUser' => $oneuser);
		return $user;
	}
	public function emailNotification($id, $class)
	{
		$model = new m_User();
		$oneuser = $model->getOneUser($id);
		$model = new m_Classroom();
		$oneclassroom = $model->getOneClassroom($class);
		if ($oneuser->role == 2) {
			$msg = $oneuser->first_name . " " . $oneuser->last_name . " has been assigned to teach Class " . $class . " - " . $oneclassroom->name . " .";
		} else {
			$msg = $oneuser->first_name . " " . $oneuser->last_name . " has been assigned to study in Class " . $class . " - " . $oneclassroom->name . " .";
		}
		//print_r($msg);
		$email = $oneuser->email;
		mail($email, "Class Assignment", $msg);
	}





	public function login($email, $pass)
	{
		$muser = new m_User();
		$user = $muser->login($email, md5($pass));
		if ($user) {

			$_SESSION['user_name'] = $user->first_name;
			$_SESSION['user_id'] = $user->user_id;
			$_SESSION['role'] = $user->role;
			if (isset($_SESSION['login_error']))
				unset($_SESSION['login_error']);

			echo '<script> location.replace("index.php"); </script>';
			// }
		} else {
			$_SESSION['login_error'] = "Login fail! Incorrect Email, or Password.";
			echo '<script> console.log("Fail"); </script>';
		}
	}
	public function logout()
	{



		// 	if (ini_get("session.use_cookies")) {
		//     $params = session_get_cookie_params();
		//     setcookie(session_name(), '', time() - 42000,
		//         $params["path"], $params["domain"],
		//         $params["secure"], $params["httponly"]
		//     );
		// }
		unset($_SESSION['user_name']);
		session_unset();
		setcookie(session_name(), '', 100);
		session_destroy();
		$_SESSION = array();
		echo '<script> location.replace("index.php?logout=1"); </script>';
	}


	public function DeleteUser($id)
	{

		$muser = new m_User();
		$idd = $muser->DeleteUser($id);

		if ($idd > 0) {

			//reg is succ
			$_SESSION['success'] = 'DeleteUser succeed!';
			if (isset($_SESSION['error']))
				unset($_SESSION['error']);
			//header("location:userman.php");
			//echo '<script> location.replace("index.php"); </script>';
		} else {

			//fail
			$_SESSION['error'] = 'DeleteUser failed.';
			// header("location:userman.php");
			//echo '<script> location.replace("index.php"); </script>';
		}
	}
	public function register($first_name, $last_name, $email, $password, $role)
	{
		$muser = new m_User();
		$count = $muser->getUserByEmail($email);
		if ($count->user_count == 0) {
			$id = $muser->register($first_name, $last_name, $email, $password, $role);
			if ($id > 0) {
				$muserlog = new m_UserLog();
				$log = $muserlog->AddUserLog($id);
				//register succeed
				$_SESSION['success'] = 'Registration succeed!';
				if (isset($_SESSION['signup_error'])) {
					unset($_SESSION['signup_error']);
				}
				echo '<script> location.replace("index.php"); </script>';
			} else {
				//register fail
				$_SESSION['signup_error'] = 'Registration fail.';
				echo '<script> location.replace("signup.php"); </script>';
			}
		} else {
			//register fail
			$_SESSION['signup_error'] = 'Email already exist.';
		}
	}
}
