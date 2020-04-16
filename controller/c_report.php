<?php 
include_once("controller/c_router.php");
include_once("model/m_report.php");
class c_Report extends c_Router{
	public function getReceivedMessageCountLastWeek($id)
	{
		$model =new m_Report();
		$count = $model->getReceivedMessageCountLastWeek($id);
		$data = array('MessageCount'=>$count);
		return $data;
	}
	public function getReceivedMessageCount($id)
	{
		$model =new m_Report();
		$count = $model->getReceivedMessageCount($id);
		$data = array('MessageCount'=>$count);
		return $data;
	}
	public function getSentMessageCountLastWeek($id)
	{
		$model =new m_Report();
		$count = $model->getSentMessageCountLastWeek($id);
		$data = array('MessageCount'=>$count);
		return $data;
	}
	public function getSentMessageCount($id)
	{
		$model =new m_Report();
		$count = $model->getSentMessageCount($id);
		$data = array('MessageCount'=>$count);
		return $data;
	}
	public function getAllDocumentCount()
	{
		$model =new m_Report();
		$count = $model->getAllDocumentCount();
		$data = array('DocumentCount'=>$count);
		return $data;
	}
	public function getAllPostCount()
	{
		$model =new m_Report();
		$count = $model->getAllPostCount();
		$data = array('PostCount'=>$count);
		return $data;
	}
	public function getAllMessageCount()
	{
		$model =new m_Report();
		$count = $model->getAllMessageCount();
		$data = array('MessageCount'=>$count);
		return $data;
	}
	public function getAverageSentMessageCount()
	{
		$model =new m_Report();
		$count = $model->getAverageSentMessageCount();
		$data = array('MessageCount'=>$count);
		return $data;
	}
	public function getAverageTutorSentMessageCount()
	{
		$model =new m_Report();
		$count = $model->getAverageTutorSentMessageCount();
		$data = array('MessageCount'=>$count);
		return $data;
	}
	public function getAverageStudentSentMessageCount()
	{
		$model =new m_Report();
		$count = $model->getAverageStudentSentMessageCount();
		$data = array('MessageCount'=>$count);
		return $data;
	}
	public function getAverageReceivedMessageCount()
	{
		$model =new m_Report();
		$count = $model->getAverageReceivedMessageCount();
		$data = array('MessageCount'=>$count);
		return $data;
	}
	public function getAverageTutorReceivedMessageCount()
	{
		$model =new m_Report();
		$count = $model->getAverageTutorReceivedMessageCount();
		$data = array('MessageCount'=>$count);
		return $data;
	}
	public function getPostCount($id)
	{
		$model =new m_Report();
		$count = $model->getPostCount($id);
		$data = array('PostCount'=>$count);
		return $data;
	}
	public function getAveragePostCount()
	{
		$model =new m_Report();
		$count = $model->getAveragePostCount();
		$data = array('PostCount'=>$count);
		return $data;
	}
	public function getAveragePostCountPerClass()
	{
		$model =new m_Report();
		$count = $model->getAveragePostCountPerClass();
		$data = array('PostCount'=>$count);
		return $data;
	}
	public function getAverageStudentPostCount()
	{
		$model =new m_Report();
		$count = $model->getAverageStudentPostCount();
		$data = array('PostCount'=>$count);
		return $data;
	}
	public function getAverageTutorPostCount()
	{
		$model =new m_Report();
		$count = $model->getAverageTutorPostCount();
		$data = array('PostCount'=>$count);
		return $data;
	}
	public function getAverageStudentReceivedMessageCount()
	{
		$model =new m_Report();
		$count = $model->getAverageStudentReceivedMessageCount();
		$data = array('MessageCount'=>$count);
		return $data;
	}
	// public function getPostCount($id)
	// {
	// 	$model =new m_Report();
	// 	$count = $model->getPostCount($id);
	// 	$data = array('PostCount'=>$count);
	// 	return $data;
	// }
	public function getAverageTutorDocumentCount()
	{
		$model =new m_Report();
		$count = $model->getAverageTutorDocumentCount();
		$data = array('DocumentCount'=>$count);
		return $data;
	}
	public function getAverageStudentDocumentCount()
	{
		$model =new m_Report();
		$count = $model->getAverageStudentDocumentCount();
		$data = array('DocumentCount'=>$count);
		return $data;
	}
	public function getAverageClassDocumentCount()
	{
		$model =new m_Report();
		$count = $model->getAverageClassDocumentCount();
		$data = array('DocumentCount'=>$count);
		return $data;
	}
	public function getAverageDocumentCount()
	{
		$model =new m_Report();
		$count = $model->getAverageDocumentCount();
		$data = array('DocumentCount'=>$count);
		return $data;
	}
	public function getCommentCount($id)
	{
		$model =new m_Report();
		$count = $model->getCommentCount($id);
		$data = array('CommentCount'=>$count);
		return $data;
	}
	public function getAllCommentCount()
	{
		$model =new m_Report();
		$count = $model->getAllCommentCount();
		$data = array('CommentCount'=>$count);
		return $data;
	}
	public function getInactiveStudentCount()
	{
		$model =new m_Report();
		$count = $model->getInactiveStudentCount();
		$data = array('StudentCount'=>$count);
		return $data;
	}
	public function getInactiveStudentCount2()
	{
		$model =new m_Report();
		$count = $model->getInactiveStudentCount2();
		$data = array('StudentCount'=>$count);
		return $data;
	}
	public function getInactiveStudent()
	{
		$model =new m_Report();
		$count = $model->getInactiveStudent();
		$data = array('StudentList'=>$count);
		return $data;
	}
	public function getInactiveStudent2()
	{
		$model =new m_Report();
		$count = $model->getInactiveStudent2();
		$data = array('StudentList'=>$count);
		return $data;
	}
	public function getAvailableStudentCount()
	{
		$model =new m_Report();
		$count = $model->getAvailableStudentCount();
		$data = array('StudentCount'=>$count);
		return $data;
	}
	public function getAvailableStudent()
	{
		$model =new m_Report();
		$count = $model->getAvailableStudent();
		$data = array('StudentList'=>$count);
		return $data;
	}
	public function getReport()
	{
		
		$this->loadView('v_report');
	}
}

?>