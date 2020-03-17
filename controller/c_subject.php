<?php
include_once("controller/c_router.php");
include_once("model/m_subject.php");
class c_Subject extends c_Router{
	public function getSubject()
	{
		$model =new m_Subject();
		$subjectlist = $model->getAllSubject();
		$data = array('SubjectList'=>$subjectlist);
		$this->loadView('v_subject', $data);
	}
	 
	 public function getList()
	{
		$model =new m_Subject();
		$subjectlist = $model->getAllSubject();
		$data = array('SubjectList'=>$subjectlist);
		return $data;
	}

	public function AddSubject($name,$subject_id,$user_id,$status)
	{

		$model = new m_Subject();
		$id = $model->AddSubject($name,$subject_id,$user_id,$status);
		
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
	public function EditSubject($comment_id,$name,$subject_id,$user_id,$status)
	{

		$model = new m_Subject();
		$idd = $model->EditSubject($comment_id,$name,$subject_id,$user_id,$status);
		
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

	
	public function getOneSubject($id)
	{
		$model = new m_Subject();
		$onesubject = $model->getOneSubject($id);
		
		$result = array( 'OneSubject' => $onesubject);
		return $result;
	}
	
	

	public function DeleteSubject($id)
	{

		$model = new m_Subject();
		$idd = $model->DeleteSubject($id);
		
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