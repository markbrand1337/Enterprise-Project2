<?php
include_once('model/dbconnect.php');
class m_MeetingMessage extends DBconnect
{

	public function getAllMessage()
	{
		$sql = "SELECT * FROM tblmeetingmessage";
		$this->setQuery($sql);
		$messagelist = $this->getAllRows();
		return $messagelist;
	}
	public function getAllMeetingMessage($id)
	{
		$sql = "SELECT  * FROM tblmeetingmessage WHERE id= ?;";
		$this->setQuery($sql);
		$conversationlist = $this->getAllRows(array($id));
		return $conversationlist;
	}

	public function AddMessage($id, $content, $from_id, $send_at)
	{

		$sql = "INSERT INTO tblmeetingmessage(id,content,from_id,send_at) values (?,?,?,?);";
		$this->setQuery($sql);

		$result = $this->execute(array($id, $content, $from_id, $send_at));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}

	public function EditMessage($message_id, $id, $content, $from_id, $send_at)
	{

		$sql = "UPDATE tblmeetingmessage SET id = ?,content = ? ,from_id = ?, send_at = ? where message_id= ? ;";
		$this->setQuery($sql);

		$result = $this->execute(array($id, $content, $from_id, $send_at, $message_id));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}

	public function DeleteMessage($message_id)
	{

		$sql = "DELETE FROM tblmeetingmessage where message_id= ?;";
		$this->setQuery($sql);

		$result = $this->execute(array($message_id));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}
	public function getOneMessage($message_id)
	{
		$sql = "SELECT  * FROM tblmeetingmessage WHERE message_id= ?;";
		$this->setQuery($sql);
		return $this->getOneRow(array($message_id));
	}
}
