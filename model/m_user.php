<?php
include_once('model/dbconnect.php');
class m_User extends DBconnect
{

	public function getAllUser()
	{
		// $sql = "SELECT * FROM tbluser";
		// $this->setQuery($sql);
		// $userlist = $this->getAllRows();
		// return $userlist;

		$sql = "SELECT * FROM tbluser";
		$this->setQuery($sql);
		$userlist = $this->getAllRows();
		return $userlist;
	}
	public function searchStudentByName($name)
	{
		$sql = "SELECT  * FROM tbluser WHERE first_name like'%$name%' or last_name like '%$name%' ;";
		$this->setQuery($sql);
		$userlist = $this->getAllRows(array($name));
		return $userlist;
	}
	public function getAllTutor()
	{
		$sql = "SELECT * FROM tbluser where role = 2";
		$this->setQuery($sql);
		$tutorlist = $this->getAllRows();
		return $tutorlist;
	}

	public function getAllStudent()
	{
		$sql = "SELECT * FROM tbluser where role = 1";
		$this->setQuery($sql);
		$studentlist = $this->getAllRows();
		return $studentlist;
	}
	public function getOtherUser($id)
	{
		$sql = "SELECT * FROM tbluser where user_id != ?";
		$this->setQuery($sql);
		$studentlist = $this->getAllRows(array($id));
		return $studentlist;
	}
	public function getAllStudentNotFromClass($class)
	{
		$sql = "SELECT user_id,first_name,last_name,email,password,role FROM tbluser.u inner join tblclassroomstudent.c on u.user_id = c.user_id where c.classroom_id != '$class'";
		$sql1="SELECT * FROM tbluser where user_id NOT IN (SELECT user_id from tblclassroomstudent where classroom_id = ? )";



		$this->setQuery($sql1);
		$studentlist = $this->getAllRows(array($class));
		return $studentlist;
	}

	public function register($first_name,$last_name,$email,$password,$role)
		 {
		 	//the inset sql statement with ? is parameter
		 	
		 	$sql = "INSERT INTO tbluser(first_name,last_name,email,password,role) values (?,?,?,?,?);";
		 	$this->setQuery($sql);
		 	//before insert , must encrypt pass to md5
		 	//call function to execute with array as parameter
		 	$result = $this->execute(array($first_name,$last_name,$email,md5($password),$role));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

 public function login($email, $md5pass)
 {
 	
 	$sql = "SELECT * FROM tbluser WHERE email=? and password=?;";
 	$this->setQuery($sql);
 	return $this->getOneRow(array($email,$md5pass));
 }
		 
	public function EditUser($user_id,$first_name,$last_name,$email,$password,$role)
		 {
		 	 
		 	$sql = "UPDATE tbluser SET first_name = '$first_name',last_name = '$last_name' ,email = '$email' ,password = '$password',role ='$role' where user_id='$user_id' ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($user_id,$first_name,$last_name,$email,$password,$role));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

	public function DeleteUser($user_id)
		 {
		 	 
		 	$sql = "DELETE FROM tbluser where user_id='$user_id';";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($user_id));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }
	public function getOneUser($user_id)
			 {
			 	$sql = "SELECT first_name,last_name,email,password,role FROM tbluser WHERE user_id='$user_id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($user_id));
			 }
}
?>
