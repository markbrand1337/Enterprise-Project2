<?php
include_once("controller/c_router.php");
include_once("model/m_classroomstudent.php");
class c_ClassroomStudent extends c_Router{
	public function getClassroomStudent()
	{
		$model =new m_Classroom();
		$classroomStudentlist = $model->getAllClassroomStudent();
		$data = array('ClassroomStudentList'=>$classroomstudentlist);
		$this->loadView('v_classroomstudent', $data);
	}
	public function getList()
	{
		$model =new m_Classroom();
		$classroomStudentlist = $model->getAllClassroomStudent();
		$data = array('ClassroomStudentList'=>$classroomstudentlist);
		return $data;
	}


	public function AddClassroomStudent($name,$subject_id,$user_id,$status)
	{

		$model = new m_ClassroomStudent();
		$id = $model->AddClassroomStudent($name,$subject_id,$user_id,$status);
		
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
	// public function EditClassroomStudent($classroom_id,$name,$subject_id,$user_id,$status)
	// {

	// 	$model = new m_ClassroomStudent();
	// 	$idd = $mcourse->EditClassroomStudent($classroom_id,$name,$subject_id,$user_id,$status);
		
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

	
	public function getOneClassroomStudent($id,$id2)
	{
		$model = new m_ClassroomStudent();
		$oneclassroomstudent = $model->getOneClassroomStudent($id,$id2);
		
		$classroomstudent = array( 'OneClassroomStudent' => $oneclassroomstudent);
		return $classroomstudent;
	}
	
	

	public function DeleteClassroomStudent($id,$id2)
	{

		$model = new m_ClassroomStudent();
		$idd = $model->DeleteClassroomStudent($id,$id2);
		
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