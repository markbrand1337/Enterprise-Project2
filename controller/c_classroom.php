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

	public function getStudentCount($id)
	{
		$model= new m_Classroom();
		$count = $model->getStudentCount($id);
		// $data = array('ClassroomList'=>$count);
		return $count;
		
	}
	public function getAllStudentClassroom($id)
	{
		$model= new m_Classroom();
		$classroomlist = $model->getAllStudentClassroom($id);
		$data = array('ClassroomList'=>$classroomlist);
		return $data;
		
	}
	public function getAllTutorClassroom($id)
	{
		$model= new m_Classroom();
		$classroomlist = $model->getAllTutorClassroom($id);
		$data = array('ClassroomList'=>$classroomlist);
		return $data;
		
	}
	public function getClassroomDetail($id)
	{
		$model =new m_Classroom();
		$classroomlist = $model->getOneClassroom($id);
		$data = array('ClassroomList'=>$classroomlist);
		$this->loadView('v_classroom_detail', $data);
	}
	public function getAdd()
	{
		
		$this->loadView('v_classroomadd');
	}
	public function getEdit()
	{
		
		$this->loadView('v_classroomedit');
	}


	public function AddClassroom($name,$tutor_id,$note)
	{

		$model = new m_Classroom();
		$id = $model->AddClassroom($name,$tutor_id,$note);
		
		if($id>0)
		{

			//reg is succ
			$_SESSION['success'] ='add succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			//echo '<script> location.replace("index.php"); </script>';
			echo '<script> location.replace("classroom.php"); </script>';
			
		}
		else
		{
			//fail
			$_SESSION['error']='add fail';
			//echo '<script> location.replace("classroom_add.php"); </script>';

		}
		return $id;
	}
	public function EditClassroom($classroom_id,$name,$tutor_id,$note)
	{

		$model = new m_Classroom();
		$idd = $model->EditClassroom($classroom_id,$name,$tutor_id,$note);
		
		if($idd>0)
		{
			 //print_r("succ c");
		 	//reg is succ
			$_SESSION['success'] ='EditClassroom succeed!';
			if(isset($_SESSION['error']))
				unset($_SESSION['error']);
			 echo '<script> location.replace("classroom.php"); </script>';
			
		}
		else
		{	
			//print_r("fail c");
			//fail
			$_SESSION['error']='EditClasroom fail';
			 echo '<script> location.replace("classroom.php"); </script>';

		}
		return $idd;
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
			 echo '<script> location.replace("classroom.php"); </script>';
			
		}
		else
		{	
			
			//fail
			$_SESSION['error']='DeleteUser fail';
			 echo '<script> location.replace("classroom.php"); </script>';

		}
	}
}


?>