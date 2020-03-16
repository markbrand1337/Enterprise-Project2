<?php
include_once('model/dbconnect.php');
class m_Comment extends DBconnect
{

	public function getAllComment()
	{
		$sql = "SELECT * FROM tblcomment";
		$this->setQuery($sql);
		$userlist = $this->getAllRows();
		return $userlist;
	}

	public function AddComment($post_id,$content,$user_id,$created_at)
		 {
		 	 
		 	$sql = "INSERT INTO tblcomment(post_id,content,user_id,created_at) values (?,?,?,?);";
		 	$this->setQuery($sql);
		  
		 	$result = $this->execute(array($post_id,$content,$user_id,$created_at));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

public function EditComment($comment_id,$post_id,$content,$user_id,$created_at)
		 {
		 	 
		 	$sql = "UPDATE tblcomment SET post_id = '$post_id',content = '$content' ,user_id = '$user_id',created_at = '$created_at' where comment_id='$comment_id' ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($comment_id,$post_id,$content,$user_id,$created_at));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }

	public function DeleteComment($comment_id)
		 {
		 	 
		 	$sql = "DELETE FROM tblcomment where comment_id='$comment_id';";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($comment_id));
		 	if($result)
		 	{
		 		return $this->getLastInserted();
		 	}
		 	else
		 		return false;
		 }
	public function getOneComment($comment_id)
			 {
			 	$sql = "SELECT  post_id,content,user_id,created_at FROM tblcomment WHERE comment_id='$comment_id';";
			 	$this->setQuery($sql);
			 	return $this->getOneRow(array($comment_id));
			 }
}
?>
