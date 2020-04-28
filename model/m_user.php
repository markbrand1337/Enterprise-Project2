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
		$sql = "SELECT  * FROM tbluser WHERE first_name like CONCAT('%',?,'%') or last_name like CONCAT('%',?,'%') ;";
		$this->setQuery($sql);
		$userlist = $this->getAllRows(array($name, $name));
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
		// $sql = "SELECT user_id,first_name,last_name,email,password,role FROM tbluser.u inner join tblclassroomstudent.c on u.user_id = c.user_id where c.classroom_id != '$class'";
		$sql1 = "SELECT * FROM tbluser where user_id NOT IN (SELECT user_id from tblclassroomstudent where classroom_id = ? )";
		// $sql2 ="SELECT u.user_id, u.first_name, u.last_name,u.email, u.role FROM tbluser as u LEFT OUTER JOIN tblclassroomstudent as cs ON (u.user_id = cs.user_id) WHERE cs.user_id IS NULL";


		$this->setQuery($sql1);
		$studentlist = $this->getAllRows(array($class));
		return $studentlist;
	}
	public function getAvailableStudent()
	{

		$sql2 = "SELECT u.user_id, u.first_name, u.last_name,u.email, u.role FROM tbluser as u LEFT OUTER JOIN tblclassroomstudent as cs ON (u.user_id = cs.user_id) WHERE cs.user_id IS NULL AND u.role = 1";


		$this->setQuery($sql2);
		$studentlist = $this->getAllRows();
		return $studentlist;
	}
	public function searchAvailableStudent($name)
	{

		$sql2 = "SELECT u.user_id, u.first_name, u.last_name,u.email, u.role FROM tbluser as u LEFT OUTER JOIN tblclassroomstudent as cs ON (u.user_id = cs.user_id) WHERE cs.user_id IS NULL AND u.role = 1 AND (first_name like CONCAT('%',?,'%') or last_name like CONCAT('%',?,'%'));";


		$this->setQuery($sql2);
		$studentlist = $this->getAllRows(array($name, $name));
		return $studentlist;
	}
	public function getAvailableTutor()
	{

		$sql2 = "SELECT u.user_id, u.first_name, u.last_name,u.email, u.role FROM tbluser as u LEFT OUTER JOIN tblclassroomstudent as cs ON (u.user_id = cs.user_id) WHERE cs.user_id IS NULL";


		$this->setQuery($sql2);
		$studentlist = $this->getAllRows();
		return $studentlist;
	}

	public function register($first_name, $last_name, $email, $password, $role)
	{
		//the inset sql statement with ? is parameter

		$sql = "INSERT INTO tbluser(first_name,last_name,email,password,role) values (?,?,?,?,?);";
		$this->setQuery($sql);
		//before insert , must encrypt pass to md5
		//call function to execute with array as parameter
		$result = $this->execute(array($first_name, $last_name, $email, md5($password), $role));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}

	public function login($email, $md5pass)
	{

		$sql = "SELECT * FROM tbluser WHERE email=? and password=?;";
		$this->setQuery($sql);
		return $this->getOneRow(array($email, $md5pass));
	}

	public function EditUser($user_id, $first_name, $last_name, $email, $password, $role)
	{

		$sql = "UPDATE tbluser SET first_name = ?,last_name = ? ,email = ? ,password = ?,role = ? where user_id= ? ;";
		$this->setQuery($sql);

		$result = $this->execute(array($first_name, $last_name, $email, $password, $role, $user_id));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}

	public function DeleteUser($user_id)
	{

		$sql = "DELETE FROM tbluser where user_id='$user_id';";
		$this->setQuery($sql);

		$result = $this->execute(array($user_id));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}
	public function getOneUser($user_id)
	{
		$sql = "SELECT * FROM tbluser WHERE user_id= ?;";
		$this->setQuery($sql);
		return $this->getOneRow(array($user_id));
	}

	public function getUserByEmail($email)
	{

		$sql2 = "SELECT COUNT(user_id) as user_count 
		FROM tbluser 
		WHERE email = ?";


		$this->setQuery($sql2);
		$count = $this->getOneRow(array($email));
		return $count;
	}
}
