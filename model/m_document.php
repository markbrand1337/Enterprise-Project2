<?php
include_once('model/dbconnect.php');
class m_Document extends DBconnect
{

	public function getAllDocument()
	{
		$sql = "SELECT * FROM tbldocument";
		$this->setQuery($sql);
		$documentlist = $this->getAllRows();
		return $documentlist;
	}
	// public function getAllConversationMessage($id)
	// {
	// 	$sql = "SELECT  * FROM tblmessage WHERE conversation_id='$id';";
	// 	$this->setQuery($sql);
	// 	$conversationlist = $this->getAllRows(array($id));
	// 	return $conversationlist;
	// }

	public function getAllClassDocument($id)
	{
		$sql = "SELECT * FROM tbldocument WHERE classroom_id='$id';";
		$this->setQuery($sql);
		$documentlist = $this->getAllRows(array($id));
		return $documentlist;
	}
	public function getAllClassDocumentFromTutor($id)
	{


		$sql = "SELECT p.id as id, p.classroom_id as classroom_id, p.user_id as user_id, u.role as role, p.classroom_id as classroom_id, p.file as file, p.name as name , p.description as description FROM tbldocument as p inner join tbluser as u  ON (u.user_id = p.user_id) where classroom_id='$id' and u.role = 2;";
		$this->setQuery($sql);
		$documentlist = $this->getAllRows(array($id));
		return $documentlist;
	}
	public function getAllClassDocumentFromStudent($id)
	{


		$sql = "SELECT p.id as id, p.classroom_id as classroom_id, p.user_id as user_id, u.role as role, p.classroom_id as classroom_id, p.file as file, p.name as name , p.description as description FROM tbldocument as p inner join tbluser as u  ON (u.user_id = p.user_id) where classroom_id='$id' and u.role = 1;";
		$this->setQuery($sql);
		$documentlist = $this->getAllRows(array($id));
		return $documentlist;
	}
	public function getAllUserDocument($id)
	{
		$sql = "SELECT * FROM tbldocument WHERE user_id='$id';";
		$this->setQuery($sql);
		$documentlist = $this->getAllRows(array($id));
		return $documentlist;
	}
	public function getAllUserDocumentFromClass($id, $classroom_id)
	{
		$sql = "SELECT * FROM tbldocument WHERE user_id= ? and classroom_id = ?;";
		$this->setQuery($sql);
		$documentlist = $this->getAllRows(array($id, $classroom_id));
		return $documentlist;
	}
	public function AddDocument($classroom_id, $user_id, $file, $name, $description)
	{

		$sql = "INSERT INTO tbldocument(classroom_id,user_id,file,name,description) values (?,?,?,?,?);";
		$this->setQuery($sql);

		$result = $this->execute(array($classroom_id, $user_id, $file, $name, $description));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}

	public function EditDocument($id, $classroom_id, $user_id, $file, $name, $description)
	{

		$sql = "UPDATE tbldocument SET classroom_id = '$classroom_id',user_id = '$user_id' ,file = '$file',name = '$name', description = '$description' where id='$id' ;";
		$this->setQuery($sql);

		$result = $this->execute(array($id, $classroom_id, $user_id, $file, $name, $description));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}

	public function DeleteDocument($id)
	{

		$sql = "DELETE FROM tbldocument where id='$id';";
		$this->setQuery($sql);

		$result = $this->execute(array($id));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}
	public function getOneDocument($id)
	{
		$sql = "SELECT  * FROM tbldocument WHERE id='$id';";
		$this->setQuery($sql);
		return $this->getOneRow(array($id));
	}
}
