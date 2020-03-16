<?php
include_once('model/dbconnect.php');
class m_Post extends DBconnect
{

	public function getAllPost()
	{
		$sql = "SELECT * FROM tblpost";
		$this->setQuery($sql);
		$userlist = $this->getAllRows();
		return $userlist;
	}
	public function AddPost($content,$user_id,$created_at)
		 {
		 	 
		 	$sql = "INSERT INTO tblpost(content,user_id,created_at) values (?,?,?);";
		 	$this->setQuery($sql);
		  
		 	$result = $this->execute(array($content,$user_id,$created_at));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

public function EditPost($post_id,$content,$user_id,$created_at)
		 {
		 	 
		 	$sql = "UPDATE tblpost SET content = '$content',user_id = '$user_id' ,created_at = '$created_at' where post_id='$post_id' ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($post_id,$content,$user_id,$created_at));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

	public function DeletePost($post_id)
		 {
		 	 
		 	$sql = "DELETE FROM tblpost where post_id='$post_id';";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($post_id));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }
	public function getOnePost($post_id)
			 {
			 	$sql = "SELECT  content, user_id, created_at FROM tblpost WHERE post_id='$post_id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($post_id));
			 }
}
?>
