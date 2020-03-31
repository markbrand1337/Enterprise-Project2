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

	public function AddDocument($classroom_id,$user_id,$file,$name,$description)
		 {
		 	 
		 	$sql = "INSERT INTO tbldocument(classroom_id,user_id,file,name,description) values (?,?,?,?,?);";
		 	$this->setQuery($sql);
		  
		 	$result = $this->execute(array($classroom_id,$user_id,$file,$name,$description));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

public function EditDocument($id,$classroom_id,$user_id,$file,$name,$description)
		 {
		 	 
		 	$sql = "UPDATE tbldocument SET classroom_id = '$classroom_id',user_id = '$user_id' ,file = '$file',name = '$name', description = '$description' where id='$id' ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($id,$classroom_id,$user_id,$file,$name,$description));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

	public function DeleteDocument($id)
		 {
		 	 
		 	$sql = "DELETE FROM tbldocument where id='$id';";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($id));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }
	public function getOneDocument($id)
			 {
			 	$sql = "SELECT  * FROM tbldocument WHERE id='$id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($id));
			 }
}
?>
