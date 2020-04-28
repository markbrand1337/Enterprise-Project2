<?php
include_once("controller/c_router.php");
include_once("model/m_conversation.php");
include_once("model/m_userlog.php");
class c_Conversation extends c_Router
{
	public function getConversation()
	{
		$model = new m_Conversation();
		$conversationlist = $model->getAllConversation();
		$data = array('ConversationList' => $conversationlist);
		$this->loadView('v_conversation', $data);
	}

	public function getList()
	{
		$model = new m_Conversation();
		$conversationlist = $model->getAllConversation();
		$data = array('ConversationList' => $conversationlist);
		return $data;
	}
	public function getConversationList($id)
	{
		$model = new m_Conversation();
		$conversationlist = $model->getAllUserConversation($id);
		$data = array('ConversationList' => $conversationlist);
		return $data;
	}


	public function getUserRecentConversation($id)
	{
		$model = new m_Conversation();
		$conversationlist = $model->getUserRecentConversation($id);
		$data = array('ConversationList' => $conversationlist);
		return $data;
	}
	public function AddConversation($user_one, $user_two)
	{

		$model = new m_Conversation();
		$id = $model->AddConversation($user_one, $user_two);
		$muserlog = new m_UserLog();
		$log = $muserlog->EditUserLog($user_one);
		if ($id > 0) {

			//reg is succ
			$_SESSION['success'] = 'add succeed!';
			if (isset($_SESSION['error']))
				unset($_SESSION['error']);
			echo '<script> location.replace("conversation.php?conv_id=' . $id . '"); </script>';
		} else {
			//fail
			$_SESSION['error'] = 'add fail';
		}
	}
	public function EditConversation($conversation_id, $user_one, $user_two)
	{

		$model = new m_Conversation();
		$idd = $model->EditConversation($conversation_id, $user_one, $user_two);

		if ($idd > 0) {
			print_r("succ c");
			//reg is succ
			$_SESSION['success'] = 'Edit succeed!';
			if (isset($_SESSION['error']))
				unset($_SESSION['error']);
			// echo '<script> location.replace("index.php"); </script>';

		} else {
			print_r("fail c");
			//fail
			$_SESSION['error'] = 'Edit fail';
			// echo '<script> location.replace("index.php"); </script>';

		}
	}


	public function getOneConversation($id)
	{
		$model = new m_Conversation();
		$oneconversation = $model->getOneConversation($id);

		$result = array('OneConversation' => $oneconversation);
		return $result;
	}
	public function getOneConversation2($id, $id2)
	{
		$model = new m_Conversation();
		$oneconversation = $model->getOneConversation2($id, $id2);

		//$result = array( 'OneConversation' => $oneconversation);
		return $oneconversation;
	}



	public function DeleteConversation($id)
	{

		$model = new m_Conversation();
		$idd = $model->DeleteConversation($id);

		if ($idd > 0) {

			//reg is succ
			$_SESSION['success'] = 'Delete succeed!';
			if (isset($_SESSION['error']))
				unset($_SESSION['error']);
			// echo '<script> location.replace("index.php"); </script>';

		} else {

			//fail
			$_SESSION['error'] = 'Delete fail';
			//echo '<script> location.replace("index.php"); </script>';

		}
	}
}
