<?php
include_once('model/dbconnect.php');
class m_UserLog extends DBconnect
{

	public function getAllUserLog()
	{
		$sql = "SELECT * FROM tbluserlog";
		$this->setQuery($sql);
		$userloglist = $this->getAllRows();
		return $userloglist;
	}

	public function AddUserLog($user_id)
	{
		$date = date("Y-m-d H:i:s");
		$sql = "INSERT INTO tbluserlog(user_id,last_activity_at) values (?,?);";
		$this->setQuery($sql);

		$result = $this->execute(array($user_id, $date));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}

	public function EditUserLog($user_id)
	{
		$date = date("Y-m-d H:i:s");
		$sql = "UPDATE tbluserlog SET last_activity_at ='$date' where user_id='$user_id' ;";
		$this->setQuery($sql);

		$result = $this->execute(array($user_id, $date));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}

	public function DeleteUserLog($user_id)
	{

		$sql = "DELETE FROM tbluserlog where user_id='$user_id';";
		$this->setQuery($sql);

		$result = $this->execute(array($user_id));
		if ($result) {
			return $this->getLastInserted();
		} else
			return false;
	}
	public function getOneUserLog($user_id)
	{
		$sql = "SELECT last_activity_at FROM tbluserlog WHERE user_id='$user_id';";
		$this->setQuery($sql);
		return $this->getOneRow(array($user_id));
	}
}
