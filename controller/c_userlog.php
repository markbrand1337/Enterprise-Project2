<?php
include_once("controller/c_router.php");
include_once("model/m_userlog.php");
class c_UserLog extends c_Router{
	public function getUserLog()
	{
		$model =new m_UserLog();
		$userloglist = $model->getAllUserLog();
		$data = array('UserLogList'=>$userloglist);
		$this->loadView('v_userlog', $data);
	}
	public function getList()
	{
		$model =new m_UserLog();
		$userloglist = $model->getAllUserLog();
		$data = array('UserLogList'=>$userloglist);
		return $data;
	}

	 
	public function AddUserLog($user_id)
	{
		$date = date("Y-m-d H:i:s");

		// $date = '02/07/2020 00:07:00';
		// $date = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $date);
		$model = new m_UserLog();
		$id = $model->AddUserLog($user_id,$$date);
		//$date = date('m/d/Y h:i:s a', time());
		
		if($id>0)
		{

			//reg is succ
			$_SESSION['success'] ='add succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			//echo '<script> location.replace("index.php"); </script>';
			
		}
		else
		{
			//fail
			$_SESSION['error']='add fail';
			//echo '<script> location.replace("index.php"); </script>';

		}
	}
	public function EditUserLog($user_id)
	{
		$date = date("Y-m-d H:i:s");
		$model = new m_UserLog();
		$idd = $model->EditUserLog($user_id,$date);
		
		if($idd>0)
		{
			 //print_r("succ c");
		 	//reg is succ
			$_SESSION['success'] ='Edit succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			
			
		}
		else
		{	
			//print_r("fail c");
			//fail
			$_SESSION['error']='Edit fail';
			 

		}
	}



	
	public function getOneUserLog($id)
	{
		$model = new m_UserLog();
		$oneuserlog = $model->getOneUserLog($id);
		
		$result = array( 'OneUserLog' => $oneuserlog);
		return $result;
	}
	
	

	public function DeleteUserLog($id)
	{

		$model = new m_UserLog();
		$idd = $model->DeleteUserLog($id);
		
		if($idd>0)
		{
			 
			//reg is succ
			$_SESSION['success'] ='Delete succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			 //echo '<script> location.replace("index.php"); </script>';
			
		}
		else
		{	
			
			//fail
			$_SESSION['error']='Delete fail';
			// echo '<script> location.replace("index.php"); </script>';

		}
	}
}


?>