<?php
include_once("controller/c_router.php");
include_once("model/m_classroomstudent.php");
class c_ClassroomStudent extends c_Router
{
	public function getClassroomStudent()
	{
		$model = new m_ClassroomStudent();
		$classroomstudentlist = $model->getAllClassroomStudent();
		$data = array('ClassroomStudentList' => $classroomstudentlist);
		$this->loadView('v_classroomstudent', $data);
	}
	public function getList()
	{
		$model = new m_ClassroomStudent();
		$classroomstudentlist = $model->getAllClassroomStudent();
		$data = array('ClassroomStudentList' => $classroomstudentlist);
		return $data;
	}
	public function getStudentList($classroom_id)
	{
		$model = new m_ClassroomStudent();
		$cstudentlist = $model->getStudentList($classroom_id);
		$data = array('CStudentList' => $cstudentlist);
		return $data;
	}
	public function getClassroomList($user_id)
	{
		$model = new m_ClassroomStudent();
		$sclassroomlist = $model->getClassroomList($user_id);
		$data = array('SClassroomList' => $sclassroomlist);
		return $data;
	}

	public function getAdd()
	{

		$this->loadView('v_classroomstudentadd');
	}
	public function getAddBulk()
	{

		$this->loadView('v_classroomstudentadd_bulk');
	}
	public function getEdit()
	{

		$this->loadView('v_classroomstudentedit');
	}


	public function AddClassroomStudent($user_id, $classroom_id)
	{

		$model = new m_ClassroomStudent();
		$id = $model->AddClassroomStudent($user_id, $classroom_id);

		if ($id > 0) {

			//reg is succ
			$_SESSION['success'] = 'add succeed!';
			if (isset($_SESSION['error']))
				unset($_SESSION['error']);
			echo '<script> location.replace("classroom.php?id=' . $classroom_id . '"); </script>';
		} else {
			//fail
			$_SESSION['error'] = 'add fail';
			echo '<script> location.replace("classroomstudent.php?id=' . $classroom_id . '"); </script>';
		}
	}
	public function AddClassroomStudentBulk($classroom_id, $user_id1, $user_id2, $user_id3, $user_id4, $user_id5)
	{

		$model = new m_ClassroomStudent();
		$id1 = $model->AddClassroomStudent($user_id1, $classroom_id);
		$id2 = $model->AddClassroomStudent($user_id2, $classroom_id);
		$id3 = $model->AddClassroomStudent($user_id3, $classroom_id);
		$id4 = $model->AddClassroomStudent($user_id4, $classroom_id);
		$id5 = $model->AddClassroomStudent($user_id5, $classroom_id);
		if ($id1 > 0 && $id2 > 0 && $id3 > 0 && $id4 > 0 && $id5 > 0) {

			//reg is succ
			$_SESSION['success'] = 'add succeed!';
			if (isset($_SESSION['error']))
				unset($_SESSION['error']);
			echo '<script> location.replace("classroom.php"); </script>';
		} else {
			//fail
			$_SESSION['error'] = 'add fail';
			echo '<script> location.replace("classroom.php"); </script>';
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


	public function getOneClassroomStudent($id, $id2)
	{
		$model = new m_ClassroomStudent();
		$oneclassroomstudent = $model->getOneClassroomStudent($id, $id2);

		$classroomstudent = array('OneClassroomStudent' => $oneclassroomstudent);
		return $classroomstudent;
	}



	public function DeleteClassroomStudent($id, $id2)
	{

		$model = new m_ClassroomStudent();
		$idd = $model->DeleteClassroomStudent($id, $id2);

		if ($idd > 0) {

			//reg is succ
			$_SESSION['success'] = 'Delete succeed!';
			if (isset($_SESSION['error']))
				unset($_SESSION['error']);
			echo '<script> location.replace("classroomstudent.php?id=' . $id2 . '"); </script>';
		} else {

			//fail
			$_SESSION['error'] = 'Delete fail';
			echo '<script> location.replace("classroomstudent.php?id=' . $id2 . '"); </script>';
		}
	}
}
