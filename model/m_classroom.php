<?php
include_once('model/dbconnect.php');
class m_Classroom extends DBconnect
{

	public function getAllClassroom()
	{
		$sql = "SELECT * FROM tblclassroom";
		$this->setQuery($sql);
		$classroomlist = $this->getAllRows();
		return $classroomlist;
	}
	public function getAllStudentClassroom($user_id)
	{
		$sql = "SELECT * FROM tblclassroom as c inner join tblclassroomstudent as cs on c.classroom_id = cs.classroom_id where cs.user_id = ?";
		$this->setQuery($sql);
		$classroomlist = $this->getAllRows(array($user_id));
		return $classroomlist;
	}
	public function getAllTutorClassroom($user_id)
	{
		$sql = "SELECT * FROM tblclassroom  where tutor_id = ?";
		$this->setQuery($sql);
		$classroomlist = $this->getAllRows(array($user_id));
		return $classroomlist;
	}
	
	public function getStudentCount($classroom_id)
	{
		$sql = "SELECT COUNT(user_id) as student_count FROM `tblclassroomstudent` WHERE classroom_id = ?;";
		$this->setQuery($sql);
		$count = $this->getOneRow(array($classroom_id));
		return $count;
	}
	public function AddClassroom($name,$tutor_id,$note)
		 {
		 	 
		 	$sql = "INSERT INTO tblclassroom(name,tutor_id,note) values (?,?,?);";
		 	$this->setQuery($sql);
		  
		 	$result = $this->execute(array($name,$tutor_id,$note));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

public function EditClassroom($classroom_id,$name,$tutor_id,$note)
		 {
		 	 
		 	$sql = "UPDATE tblclassroom SET name = ? ,tutor_id = ?, note = ? where classroom_id= ? ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($name,$tutor_id,$note,$classroom_id));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

	public function DeleteClassroom($classroom_id)
		 {
		 	 
		 	$sql = "DELETE FROM tblclassroom where classroom_id='$classroom_id';";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($classroom_id));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }
	public function getOneClassroom($classroom_id)
			 {
			 	$sql = "SELECT  classroom_id,name,tutor_id,note FROM tblclassroom WHERE classroom_id='$classroom_id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($classroom_id));
			 }
}
?>
