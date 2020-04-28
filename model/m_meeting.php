<?php
include_once('model/dbconnect.php');
class m_Meeting extends DBconnect
{

	public function getAllMeeting()
	{
		$sql = "SELECT * FROM tblmeeting";
		$this->setQuery($sql);
		$meetinglist = $this->getAllRows();
		return $meetinglist;
	}

	public function getAllClassMeeting($id)
	{
		$sql = "SELECT  * FROM tblmeeting WHERE classroom_id='$id';";
		$this->setQuery($sql);
		$meetinglist = $this->getAllRows(array($id));
		return $meetinglist;
	}

	public function AddMeeting($meeting_date, $classroom_id, $note)
	{

		$sql = "INSERT INTO tblmeeting(meeting_date,classroom_id,note) values (?,?,?);";
		$this->setQuery($sql);

		$result = $this->execute(array($meeting_date, $classroom_id, $note));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}

	public function EditMeeting($id, $meeting_date, $classroom_id, $note, $start_at, $end_at)
	{

		$sql = "UPDATE tblmeeting SET meeting_date = '$meeting_date',classroom_id = '$classroom_id' ,note = '$note',note = '$note', end_at = '$end_at' where id='$id' ;";
		$this->setQuery($sql);

		$result = $this->execute(array($id, $meeting_date, $classroom_id, $note, $start_at, $end_at));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}
	public function StartMeeting($id, $start_at)
	{

		$sql = "UPDATE tblmeeting SET  start_at = ? where id= ? ;";
		$this->setQuery($sql);

		$result = $this->execute(array($start_at, $id));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}
	public function EndMeeting($id, $end_at)
	{

		$sql = "UPDATE tblmeeting SET  end_at = '$end_at' where id='$id' ;";
		$this->setQuery($sql);

		$result = $this->execute(array($id, $end_at));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}

	public function DeleteMeeting($id)
	{

		$sql = "DELETE FROM tblmeeting where id='$id';";
		$this->setQuery($sql);

		$result = $this->execute(array($id));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}
	public function getOneMeeting($id)
	{
		$sql = "SELECT  * FROM tblmeeting WHERE id='$id';";
		$this->setQuery($sql);
		return $this->getOneRow(array($id));
	}
}
