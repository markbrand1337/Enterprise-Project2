<?php
include_once('model/dbconnect.php');
class m_Conversation extends DBconnect
{

	public function getAllConversation()
	{
		$sql = "SELECT * FROM tblconversation";
		$this->setQuery($sql);
		$conversationlist = $this->getAllRows();
		return $conversationlist;
	}
	public function getAllUserConversation($id)
	{
		$sql = "SELECT  * FROM tblconversation WHERE user_one='$id' or user_two='$id';";
		$this->setQuery($sql);
		$conversationlist = $this->getAllRows(array($id));
		return $conversationlist;
	}
	public function getUserRecentConversation($id)
	{
		$sql = "SELECT  DISTINCT conversation_id FROM tblmessage WHERE from_id='$id' limit 3;";
		$this->setQuery($sql);
		$conversationlist = $this->getAllRows(array($id));
		return $conversationlist;
	}

	public function AddConversation($user_one,$user_two)
		 {
		 	 
		 	$sql = "INSERT INTO tblconversation(user_one,user_two) values (?,?);";
		 	$this->setQuery($sql);
		  
		 	$result = $this->execute(array($user_one,$user_two));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

public function EditConversation($conversation_id,$user_one,$user_two)
		 {
		 	 
		 	$sql = "UPDATE tblconversation SET user_one = '$user_one',user_two = '$user_two' where conversation_id='$conversation_id' ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($conversation_id,$user_one,$user_two));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

	public function DeleteConversation($conversation_id)
		 {
		 	 
		 	$sql = "DELETE FROM tblconversation where conversation_id='$conversation_id';";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($conversation_id));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }
	public function getOneConversation($conversation_id)
			 {
			 	$sql = "SELECT  * FROM tblconversation WHERE conversation_id='$conversation_id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($conversation_id));
			 }
	public function getOneConversation2($id,$id2)
			 {
			 	$sql = "SELECT  * FROM tblconversation WHERE user_one = ? AND user_two = ?;";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($id,$id2));
			 }
}
?>
