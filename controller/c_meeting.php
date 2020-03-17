<?php
include_once("controller/c_router.php");
include_once("model/m_meeting.php");
class c_Meeting extends c_Router{
	public function getMeeting()
	{
		$model =new m_Meeting();
		$meetinglist = $model->getAllMeeting();
		$data = array('MeetingList'=>$meetinglist);
		$this->loadView('v_meeting', $data);
	}

	public function getList()
	{
		$model =new m_Meeting();
		$meetinglist = $model->getAllMeeting();
		$data = array('MeetingList'=>$meetinglist);
		return $data;
	}

	
	public function AddMeeting($name,$subject_id,$user_id,$status)
	{

		$model = new m_Meeting();
		$id = $model->AddMeeting($name,$subject_id,$user_id,$status);
		
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
	public function EditMeeting($comment_id,$name,$subject_id,$user_id,$status)
	{

		$model = new m_Meeting();
		$idd = $model->EditMeeting($comment_id,$name,$subject_id,$user_id,$status);
		
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

	
	public function getOneMeeting($id)
	{
		$model = new m_Meeting();
		$onemeeting = $model->getOneMeeting($id);
		
		$result = array( 'OneMeeting' => $onemeeting);
		return $result;
	}
	
	

	public function DeleteMeeting($id)
	{

		$model = new m_Meeting();
		$idd = $model->DeleteMeeting($id);
		
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