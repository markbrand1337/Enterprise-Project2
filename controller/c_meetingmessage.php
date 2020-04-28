<?php
include_once("controller/c_router.php");
include_once("model/m_meetingmessage.php");
include_once("model/m_userlog.php");
class c_MeetingMessage extends c_Router
{
	public function getMessage()
	{
		$model = new m_MeetingMessage();
		$messagelist = $model->getAllMessage();
		$data = array('MessageList' => $messagelist);
		$this->loadView('v_message', $data);
	}

	public function getList()
	{
		$model = new m_MeetingMessage();
		$messagelist = $model->getAllMessage();
		$data = array('MessageList' => $messagelist);
		return $data;
	}


	public function getMessageList($id)
	{
		$model = new m_MeetingMessage();
		$messagelist = $model->getAllMeetingMessage($id);
		$data = array('MessageList' => $messagelist);
		return $data;
	}
	public function AddMessage($id, $id2, $content, $from_id, $send_at)
	{
		$date = date();
		$model = new m_MeetingMessage();
		$idd = $model->AddMessage($id, $content, $from_id, $send_at);
		$muserlog = new m_UserLog();
		$log = $muserlog->EditUserLog($from_id);
		if ($idd > 0) {

			//reg is succ
			$_SESSION['success'] = 'add succeed!';
			if (isset($_SESSION['error']))
				unset($_SESSION['error']);

			echo '<script> location.replace("meeting_detail.php?id=' . $id . '&id2=' . $id2 . '"); </script>';
		} else {
			//fail
			$_SESSION['error'] = 'add fail';
			echo '<script> location.replace("meeting_detail.php?id=' . $id . '&id2=' . $id2 . '"); </script>';
		}
	}
	// public function EditMessage($message_id,$conversation_id,$content,$from_id,$to_id,$send_at)
	// {

	// 	$model = new m_MeetingMessage();
	// 	$idd = $model->EditMessage($comment_id,$name,$subject_id,$user_id,$status);

	// 	if($idd>0)
	// 	{
	// 		 print_r("succ c");
	// 	 	//reg is succ
	// 		$_SESSION['success'] ='Edit succeed!';
	// 		if(isset($_SESSION['error']))
	// 			unset($_SESSION['error']);
	// 		 echo '<script> location.replace("index.php"); </script>';

	// 	}
	// 	else
	// 	{	
	// 		print_r("fail c");
	// 		//fail
	// 		$_SESSION['error']='Edit fail';
	// 		 echo '<script> location.replace("index.php"); </script>';

	// 	}
	// }


	// public function getOneMessage($id)
	// {
	// 	$model = new m_MeetingMessage();
	// 	$onemessage = $model->getOneMessage($id);

	// 	$result = array( 'OneMessage' => $onemessage);
	// 	return $result;
	// }



	public function DeleteMessage($id)
	{

		$model = new m_MeetingMessage();
		$idd = $model->DeleteMessage($id);

		if ($idd > 0) {

			//reg is succ
			$_SESSION['success'] = 'Delete succeed!';
			if (isset($_SESSION['error']))
				unset($_SESSION['error']);
			//echo '<script> location.replace("index.php"); </script>';

		} else {

			//fail
			$_SESSION['error'] = 'Delete fail';
			//echo '<script> location.replace("index.php"); </script>';

		}
	}
}
