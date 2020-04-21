<?php
include_once('model/dbconnect.php');
class m_Post extends DBconnect
{

	public function getAllPost()
	{
		$sql = "SELECT * FROM tblpost order by created_at DESC";
		$this->setQuery($sql);
		$userlist = $this->getAllRows();
		return $userlist;
	}

	public function getAllUserPost($user_id)
	{
		$sql = "SELECT * FROM tblpost where user_id='$user_id' order by created_at DESC";
		$this->setQuery($sql);
		$userlist = $this->getAllRows(array($user_id));
		return $userlist;
	}
	
	public function getAllUserPostFromClass($user_id,$in_class)
	{
		$sql = "SELECT * FROM tblpost where user_id='$user_id' and in_class ='$in_class' order by created_at DESC";
		$this->setQuery($sql);
		$userlist = $this->getAllRows(array($user_id,$in_class));
		return $userlist;
	}
	public function getAllClassPost($in_class)
	{
		$sql = "SELECT * FROM tblpost where in_class='$in_class' order by created_at DESC";
		$this->setQuery($sql);
		$userlist = $this->getAllRows(array($in_class));
		return $userlist;
	}
	public function getAllClassPostFromTutor($in_class)
	{
		$sql = "SELECT p.post_id as post_id, p.content as content, p.user_id as user_id, u.role as role, p.in_class as in_class, p.created_at as created_at FROM tblpost as p inner join tbluser as u  ON (u.user_id = p.user_id) where in_class='$in_class' and u.role = 2 order by created_at DESC";
		$this->setQuery($sql);
		$userlist = $this->getAllRows(array($in_class));
		return $userlist;
	}
	public function getAllClassPostFromStudent($in_class)
	{
		$sql = "SELECT p.post_id as post_id, p.content as content, p.user_id as user_id, u.role as role, p.in_class as in_class, p.created_at as created_at FROM tblpost as p inner join tbluser as u  ON (u.user_id = p.user_id) where in_class='$in_class' and u.role = 1 order by created_at DESC";
		$this->setQuery($sql);
		$userlist = $this->getAllRows(array($in_class));
		return $userlist;
	}
	public function AddPost($content,$user_id,$in_class,$created_at)
		 {
		 	 
		 	$sql = "INSERT INTO tblpost(content,user_id,in_class,created_at) values (?,?,?,?);";
		 	$this->setQuery($sql);
		  
		 	$result = $this->execute(array($content,$user_id,$in_class,$created_at));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

public function EditPost($post_id,$content)
		 {
		 	 
		 	$sql = "UPDATE tblpost SET content = '$content' where post_id='$post_id' ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($post_id,$content));
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
			 	$sql = "SELECT  * FROM tblpost WHERE post_id='$post_id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($post_id));
			 }
}
?>
