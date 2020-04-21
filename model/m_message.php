<?php
include_once('model/dbconnect.php');
class m_Message extends DBconnect
{

	public function getAllMessage()
	{
		$sql = "SELECT * FROM tblmessage";
		$this->setQuery($sql);
		$messagelist = $this->getAllRows();
		return $messagelist;
	}
	public function getAllConversationMessage($id)
	{
		$sql = "SELECT  * FROM tblmessage WHERE conversation_id='$id';";
		$this->setQuery($sql);
		$conversationlist = $this->getAllRows(array($id));
		return $conversationlist;
	}
	public function getUserRecentConversation($id)
	{
		$sql = "SELECT  DISTINCT conversation_id FROM tblmessage WHERE from_id='$id';";
		$this->setQuery($sql);
		$conversationlist = $this->getAllRows(array($id));
		return $conversationlist;
	}

	
	public function getMessageCountLastWeek($id){
		$sql = "SELECT COUNT(message_id) as message_count FROM `tblmessage` WHERE to_id = ? AND send_at >= DATE(NOW()) + INTERVAL -7 DAY;";
		$this->setQuery($sql);
		$count = $this->getOneRow(array($id));
		return $count;
	}
	public function AddMessage($conversation_id,$content,$from_id,$to_id,$send_at)
		 {
		 	 
		 	$sql = "INSERT INTO tblmessage(conversation_id,content,from_id,to_id,send_at) values (?,?,?,?,?);";
		 	$this->setQuery($sql);
		  
		 	$result = $this->execute(array($conversation_id,$content,$from_id,$to_id,$send_at));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

public function EditMessage($message_id,$conversation_id,$content,$from_id,$to_id,$send_at)
		 {
		 	 
		 	$sql = "UPDATE tblmessage SET conversation_id = '$conversation_id',content = '$content' ,from_id = '$from_id',to_id = '$to_id', send_at = '$send_at' where message_id='$message_id' ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($message_id,$conversation_id,$content,$from_id,$to_id,$send_at));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

	public function DeleteMessage($message_id)
		 {
		 	 
		 	$sql = "DELETE FROM tblmessage where message_id='$message_id';";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($message_id));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }
	public function getOneMessage($message_id)
			 {
			 	$sql = "SELECT  conversation_id, content, from_id, to_id, send_at FROM tblmessage WHERE message_id='$message_id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($message_id));
			 }
}
?>
