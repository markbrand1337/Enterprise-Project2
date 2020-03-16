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

	public function AddClassroom($name,$subject_id,$user_id,$status)
		 {
		 	 
		 	$sql = "INSERT INTO tblclassroom(name,subject_id,user_id,status) values (?,?,?,?);";
		 	$this->setQuery($sql);
		  
		 	$result = $this->execute(array($name,$subject_id,$user_id,$status));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

public function EditClassroom($classroom_id,$name,$subject_id,$user_id,$status)
		 {
		 	 
		 	$sql = "UPDATE tblclassroom SET name = '$name' ,subject_id = '$subject_id',user_id = '$user_id', status = '$status' where classroom_id='$classroom_id' ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($classroom_id,$name,$subject_id,$user_id,$status));
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
			 	$sql = "SELECT  name,subject_id,user_id,status FROM tblclassroom WHERE classroom_id='$classroom_id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($classroom_id));
			 }
}
?>
