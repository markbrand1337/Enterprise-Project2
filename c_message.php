<?php
include_once("controller/c_router.php");
include_once("model/m_message.php");
class c_Message extends c_Router{
	public function getMessage()
	{
		$model =new m_Message();
		$messagelist = $model->getAllMessage();
		$data = array('MessageList'=>$messagelist);
		$this->loadView('v_message', $data);
	}
	 
	 public function getList()
	{
		$model =new m_Message();
		$messagelist = $model->getAllMessage();
		$data = array('MessageList'=>$messagelist);
		return $data;
	}

	public function AddMessage($name,$subject_id,$user_id,$status)
	{

		$model = new m_Message();
		$id = $model->AddMessage($name,$subject_id,$user_id,$status);
		
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
	public function EditMessage($comment_id,$name,$subject_id,$user_id,$status)
	{

		$model = new m_Message();
		$idd = $model->EditMessage($comment_id,$name,$subject_id,$user_id,$status);
		
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

	
	public function getOneMessage($id)
	{
		$model = new m_Message();
		$onemessage = $model->getOneMessage($id);
		
		$result = array( 'OneMessage' => $onemessage);
		return $result;
	}
	
	

	public function DeleteMessage($id)
	{

		$model = new m_Message();
		$idd = $model->DeleteMessage($id);
		
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