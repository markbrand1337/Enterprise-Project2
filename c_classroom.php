<?php
include_once("controller/c_router.php");
include_once("model/m_classroom.php");
class c_Classroom extends c_Router{
	public function getClassroom()
	{
		$model =new m_Classroom();
		$classroomlist = $model->getAllClassroom();
		$data = array('ClassroomList'=>$classroomlist);
		$this->loadView('v_classroom', $data);
	}
	public function getList()
	{
		$model= new m_Classroom();
		$classroomlist = $model->getAllClassroom();
		$data = array('ClassroomList'=>$classroomlist);
		return $data;
		
	}


	public function AddClassroom($name,$subject_id,$user_id,$status)
	{

		$model = new m_Classroom();
		$id = $model->AddClassroom($name,$subject_id,$user_id,$status);
		
		if($id>0)
		{

			//reg is succ
			$_SESSION['success'] ='add succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			//echo '<script> location.replace("index.php"); </script>';
			echo '<script> location.replace("index.php"); </script>';
		}
		else
		{
			//fail
			$_SESSION['error']='add fail';
			echo '<script> location.replace("index.php"); </script>';

		}
	}
	public function EditClassroom($classroom_id,$name,$subject_id,$user_id,$status)
	{

		$model = new m_Classroom();
		$idd = $model->EditClassroom($classroom_id,$name,$subject_id,$user_id,$status);
		
		if($idd>0)
		{
			 print_r("succ c");
		 	//reg is succ
			$_SESSION['success'] ='EditClassroom succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			 echo '<script> location.replace("index.php"); </script>';
			
		}
		else
		{	
			print_r("fail c");
			//fail
			$_SESSION['error']='EditClasroom fail';
			 echo '<script> location.replace("index.php"); </script>';

		}
	}

	
	public function getOneClassroom($id)
	{
		$model = new m_Classroom();
		$oneclassroom = $model->getOneClassroom($id);
		
		$classroom = array( 'OneClassroom' => $oneclassroom);
		return $classroom;
	}
	
	

	public function DeleteClassroom($id)
	{

		$model = new m_Classroom();
		$idd = $model->DeleteClassroom($id);
		
		if($idd>0)
		{
			 
			//reg is succ
			$_SESSION['success'] ='DeleteUser succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			 echo '<script> location.replace("index.php"); </script>';
			
		}
		else
		{	
			
			//fail
			$_SESSION['error']='DeleteUser fail';
			 echo '<script> location.replace("index.php"); </script>';

		}
	}
}


?>