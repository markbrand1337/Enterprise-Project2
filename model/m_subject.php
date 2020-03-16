<?php
include_once('model/dbconnect.php');
class m_Subject extends DBconnect
{

	public function getAllSubject()
	{
		$sql = "SELECT * FROM tblsubject";
		$this->setQuery($sql);
		$classroomlist = $this->getAllRows();
		return $classroomlist;
	}

	public function AddClassroom($name,$description)
		 {
		 	 
		 	$sql = "INSERT INTO tblsubject(name,description) values (?,?);";
		 	$this->setQuery($sql);
		  
		 	$result = $this->execute(array($name,$description));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

public function EditClassroom($subject_id,$name,$description)
		 {
		 	 
		 	$sql = "UPDATE tblsubject SET name = '$name',description = '$description' where subject_id='$subject_id' ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($subject_id,$name,$description));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

	public function DeleteClassroom($subject_id)
		 {
		 	 
		 	$sql = "DELETE FROM tblsubject where subject_id='$subject_id';";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($subject_id));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }
	public function getOneClassroom($subject_id)
			 {
			 	$sql = "SELECT  name,description FROM tblsubject WHERE subject_id='$subject_id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($subject_id));
			 }
}
?>
