<?php
include_once('model/dbconnect.php');
class m_ClassroomStudent extends DBconnect
{

	public function getAllClassroomStudent()
	{
		$sql = "SELECT * FROM tblclassroomstudent";
		$this->setQuery($sql);
		$classroomstudentlist = $this->getAllRows();
		return $classroomstudentlist;
	}
	public function getStudentList($classroom_id)
	{
		$sql = "SELECT  * FROM tblclassroomstudent WHERE classroom_id= ? ;";
		$this->setQuery($sql);
		$listclassroomstudent = $this->getAllRows(array($classroom_id));
		return $listclassroomstudent;
	}
	public function getClassroomList($user_id)
	{
		$sql = "SELECT  * FROM tblclassroomstudent WHERE user_id= ?;";
		$this->setQuery($sql);
		$liststudentclassroom = $this->getAllRows(array($user_id));
		return $liststudentclassroom;
	}

	public function AddClassroomStudent($user_id, $classroom_id)
	{

		$sql2 = "SELECT  *  FROM tblclassroomstudent WHERE user_id= ? and classroom_id= ?;";
		$this->setQuery($sql2);
		$res = $this->getAllRows(array($user_id, $classroom_id));
		$count = mysqli_num_rows($res);
		if ($count < 1) {

			$sql = "INSERT INTO tblclassroomstudent(user_id,classroom_id) values (?,?);";
			$this->setQuery($sql);

			$result = $this->execute(array($user_id, $classroom_id));
			if ($result) {
				return $this->getLastInserted();
			} else
				return false;
		} else return false;
	}

	public function DeleteClassroomStudent($user_id, $classroom_id)
	{

		$sql = "DELETE FROM tblclassroomstudent where classroom_id= ? and user_id = ?;";
		$this->setQuery($sql);

		$result = $this->execute(array($classroom_id, $user_id));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}
	public function getOneClasroomStudent($user_id, $classroom_id)
	{
		$sql = "SELECT  user_id FROM tblclassroomstudent WHERE classroom_id= ? and user_id= ?;";
		$this->setQuery($sql);
		return $this->getOneRow(array($classroom_id, $user_id));
	}
}
