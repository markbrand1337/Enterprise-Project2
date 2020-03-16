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

	public function AddMeeting($meeting_date,$classroom_id,$status,$start_at,$end_at)
		 {
		 	 
		 	$sql = "INSERT INTO tblmeeting(meeting_date,classroom_id,status,start_at,end_at) values (?,?,?,?,?);";
		 	$this->setQuery($sql);
		  
		 	$result = $this->execute(array($meeting_date,$classroom_id,$status,$start_at,$end_at));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

public function EditMeeting($id,$meeting_date,$classroom_id,$status,$start_at,$end_at)
		 {
		 	 
		 	$sql = "UPDATE tblmeeting SET meeting_date = '$meeting_date',classroom_id = '$classroom_id' ,status = '$status',start_at = '$start_at', end_at = '$end_at' where id='$id' ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($id,$meeting_date,$classroom_id,$status,$start_at,$end_at));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

	public function DeleteMeeting($id)
		 {
		 	 
		 	$sql = "DELETE FROM tblmeeting where id='$id';";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($id));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }
	public function getOneMeeting($id)
			 {
			 	$sql = "SELECT  meeting_date,classroom_id,status,start_at,end_at FROM tblmeeting WHERE id='$id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($id));
			 }
}
?>
