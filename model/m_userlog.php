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

	public function AddUserLog($user_id,$last_activity_at)
		 {
		 	 
		 	$sql = "INSERT INTO tbluserlog(user_id,last_activity_at) values (?,?);";
		 	$this->setQuery($sql);
		  
		 	$result = $this->execute(array($user_id,$last_activity_at));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }
		 
	public function EditUserLog($user_id,$last_activity_at)
		 {
		 	 
		 	$sql = "UPDATE tbluserlog SET last_activity_at ='$last_activity_at' where user_id='$user_id' ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($user_id,$last_activity_at));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

	public function DeleteUserLog($user_id)
		 {
		 	 
		 	$sql = "DELETE FROM tbluserlog where user_id='$user_id';";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($user_id));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }
	public function getOneUserLog($user_id)
			 {
			 	$sql = "SELECT last_activity_at FROM tbluserlog WHERE user_id='$user_id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($user_id));
			 }
}
?>
