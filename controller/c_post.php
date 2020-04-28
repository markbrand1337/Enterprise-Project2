<?php
include_once("controller/c_router.php");
include_once("model/m_post.php");
include_once("model/m_userlog.php");
class c_Post extends c_Router
{
	public function getPost()
	{
		$model = new m_Post();
		$postlist = $model->getAllPost();
		$data = array('PostList' => $postlist);
		$this->loadView('v_post', $data);
	}

	public function getList()
	{
		$model = new m_Post();
		$postlist = $model->getAllPost();
		$data = array('PostList' => $postlist);
		return $data;
	}
	public function getAllClassPost($id)
	{
		$model = new m_Post();
		$postlist = $model->getAllClassPost($id);
		$data = array('PostList' => $postlist);
		return $data;
	}

	public function getAllClassPostFromTutor($id)
	{
		$model = new m_Post();
		$postlist = $model->getAllClassPostFromTutor($id);
		$data = array('PostList' => $postlist);
		return $data;
	}
	public function getAllClassPostFromStudent($id)
	{
		$model = new m_Post();
		$postlist = $model->getAllClassPostFromStudent($id);
		$data = array('PostList' => $postlist);
		return $data;
	}
	public function getAllUserPost($id)
	{
		$model = new m_Post();
		$postlist = $model->getAllUserPost($id);
		$data = array('PostList' => $postlist);
		return $data;
	}
	public function getAllUserPostFromClass($id, $cid)
	{
		$model = new m_Post();
		$postlist = $model->getAllUserPostFromClass($id, $cid);
		$data = array('PostList' => $postlist);
		return $data;
	}
	public function getAdd()
	{

		$this->loadView('v_postadd');
	}
	public function getEdit()
	{

		$this->loadView('v_postedit');
	}
	public function getPostDetail()
	{
		$this->loadView('v_post_detail');
	}
	public function AddPost($content, $user_id, $in_class)
	{
		$date = date("Y-m-d H:i:s");
		$model = new m_Post();
		$id = $model->AddPost($content, $user_id, $in_class, $date);
		$muserlog = new m_UserLog();
		$log = $muserlog->EditUserLog($user_id);
		if ($id > 0) {

			//reg is succ
			$_SESSION['success'] = 'add succeed!';
			if (isset($_SESSION['error']))
				unset($_SESSION['error']);
			//echo '<script> location.replace("index.php"); </script>';

		} else {
			//fail
			$_SESSION['error'] = 'add fail';
			//echo '<script> location.replace("index.php"); </script>';

		}
	}
	public function EditPost($post_id, $content)
	{

		$model = new m_Post();
		$idd = $model->EditPost($post_id, $content);

		if ($idd > 0) {
			//print_r("succ c");
			//reg is succ
			$_SESSION['success'] = 'Edit succeed!';
			if (isset($_SESSION['error']))
				unset($_SESSION['error']);
			// echo '<script> location.replace("index.php"); </script>';

		} else {
			//print_r("fail c");
			//fail
			$_SESSION['error'] = 'Edit fail';
			// echo '<script> location.replace("index.php"); </script>';

		}
	}


	public function getOnePost($id)
	{
		$model = new m_Post();
		$onepost = $model->getOnePost($id);

		$result = array('OnePost' => $onepost);
		return $result;
	}



	public function DeletePost($id)
	{

		$model = new m_Post();
		$idd = $model->DeletePost($id);

		if ($idd > 0) {

			//reg is succ
			$_SESSION['success'] = 'Delete succeed!';
			if (isset($_SESSION['error']))
				unset($_SESSION['error']);
			// echo '<script> location.replace("index.php"); </script>';

		} else {

			//fail
			$_SESSION['error'] = 'Delete fail';
			// echo '<script> location.replace("index.php"); </script>';

		}
	}
}
