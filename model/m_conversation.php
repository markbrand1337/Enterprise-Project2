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
			 	$sql = "SELECT  user_one,user_two FROM tblconversation WHERE conversation_id='$conversation_id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($conversation_id));
			 }
}
?>
