<?php
include_once("controller/c_router.php");
include_once("model/m_document.php");
class c_Document extends c_Router{
	public function getDocument()
	{
		$model =new m_Document();
		$documentlist = $model->getAllDocument();
		$data = array('DocumentList'=>$documentlist);
		$this->loadView('v_document', $data);
	}

	public function getList()
	{
		$model =new m_Document();
		$documentlist = $model->getAllDocument();
		$data = array('DocumentList'=>$documentlist);
		return $data;
	}
	public function AddDocument($classroom_id,$user_id,$file,$name,$description)
	{

		$model = new m_Document();
		$id = $model->AddDocument($classroom_id,$user_id,$file,$name,$description);
		
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
	public function EditDocument($id,$classroom_id,$user_id,$file,$name,$description)
	{

		$model = new m_Document();
		$idd = $model->EditDocument($id,$classroom_id,$user_id,$file,$name,$description);
		
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

	
	public function getOneDocument($id)
	{
		$model = new m_Comment();
		$onedocument = $model->getOneDocument($id);
		
		$document = array( 'OneCDocument' => $onedocument);
		return $document;
	}
	
	

	public function DeleteDocument($id)
	{

		$model = new m_Document();
		$idd = $model->DeleteDocument($id);
		
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