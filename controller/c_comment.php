<?php
include_once("controller/c_router.php");
include_once("model/m_comment.php");
class c_Comment extends c_Router{
	public function getComment()
	{
		$model =new m_Comment();
		$commentlist = $model->getAllComment();
		$data = array('CommentList'=>$commentlist);
		$this->loadView('v_comment', $data);
	}

	public function getList()
	{
		$model =new m_Comment();
		$commentlist = $model->getAllComment();
		$data = array('CommentList'=>$commentlist);
		return $data;
	}
	public function AddComment($post_id,$content,$user_id,$created_at)
	{

		$model = new m_Comment();
		$id = $model->AddComment($post_id,$content,$user_id,$created_at);
		
		if($id>0)
		{

			//reg is succ
			$_SESSION['success'] ='add succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			echo '<script> location.replace("index.php"); </script>';
			
		}
		else
		{
			//fail
			$_SESSION['error']='add fail';
			echo '<script> location.replace("index.php"); </script>';

		}
	}
	public function EditComment($comment_id,$post_id,$content,$user_id,$created_at)
	{

		$model = new m_Comment();
		$idd = $model->EditComment($comment_id,$post_id,$content,$user_id,$created_at);
		
		if($idd>0)
		{
			 print_r("succ c");
		 	//reg is succ
			$_SESSION['success'] ='Edit succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			 echo '<script> location.replace("index.php"); </script>';
			
		}
		else
		{	
			print_r("fail c");
			//fail
			$_SESSION['error']='Edit fail';
			 echo '<script> location.replace("index.php"); </script>';

		}
	}

	
	public function getOneComment($id)
	{
		$model = new m_Comment();
		$onecomment = $model->getOneComment($id);
		
		$comment = array( 'OneComment' => $onecomment);
		return $comment;
	}
	
	

	public function DeleteComment($id)
	{

		$model = new m_Comment();
		$idd = $model->DeleteComment($id);
		
		if($idd>0)
		{
			 
			//reg is succ
			$_SESSION['success'] ='Delete succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			 echo '<script> location.replace("index.php"); </script>';
			
		}
		else
		{	
			
			//fail
			$_SESSION['error']='Delete fail';
			 echo '<script> location.replace("index.php"); </script>';

		}
	}
}


?>