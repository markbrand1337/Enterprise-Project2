<?php
include_once('model/dbconnect.php');
class m_Comment extends DBconnect
{

	public function getAllComment()
	{
		$sql = "SELECT * FROM tblcomment";
		$this->setQuery($sql);
		$commentlist = $this->getAllRows();
		return $commentlist;
	}
	public function getAllPostComment($post_id)
	{
		$sql = "SELECT * FROM tblcomment where post_id = '$post_id'";
		$this->setQuery($sql);
		$commentlist = $this->getAllRows(array($post_id));
		return $commentlist;
	}
	public function getUserRecentComment($id)
	{
		$sql = "SELECT * FROM tblcomment where user_id = '$id' ORDER BY created_at DESC LIMIT 5";
		$this->setQuery($sql);
		$commentlist = $this->getAllRows(array($id));
		return $commentlist;
	}
	public function getUserRecentCommentFromClass($id,$in_class)
	{
		$sql = "SELECT c.post_id as post_id, 
				c.content as content, 
				c.user_id as user_id, 
				c.created_at as created_at
				FROM tblcomment as c
				INNER JOIN tblpost as p
				ON (c.post_id = p.post_id)
				where c.user_id = '$id' AND p.in_class = '$in_class'
				ORDER BY created_at DESC 
				LIMIT 5";

		$this->setQuery($sql);
		$commentlist = $this->getAllRows(array($id,$in_class));
		return $commentlist;
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
		 public function getCommentCount($post_id){
		 		// $result = mysql_query( "select count(id) as num_rows from tblcomment where post_id = '$post_id'" );
		 		$sql = "SELECT COUNT(comment_id) as num_rows FROM tblcomment where post_id = ?";
		 		$this->setQuery($sql);
		 		$result = $this->getOneRow(array($post_id));
				// $row = mysql_fetch_object( $result );
				$total = $result->num_rows;
				return $total;
		 }

public function EditComment($comment_id,$post_id,$content,$user_id)
		 {
		 	 
		 	$sql = "UPDATE tblcomment SET post_id = '$post_id',content = '$content' ,user_id = '$user_id' where comment_id='$comment_id' ;";
		 	$this->setQuery($sql);
		 	 
		 	$result = $this->execute(array($comment_id,$post_id,$content,$user_id));
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
