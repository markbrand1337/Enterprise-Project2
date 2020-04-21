<?php
include_once('model/dbconnect.php');
class m_Report extends DBconnect
{

	public function getReceivedMessageCountLastWeek($id){
		$sql = "SELECT COUNT(message_id) as message_count 
		FROM tblmessage 
		WHERE to_id = ? 
		AND send_at >= DATE(NOW()) + INTERVAL -7 DAY;";
		$this->setQuery($sql);
		$count = $this->getOneRow(array($id));
		return $count;
	}
	public function getReceivedMessageCount($id){
		$sql = "SELECT COUNT(message_id) as message_count 
		FROM tblmessage 
		WHERE to_id = ?;";
		$this->setQuery($sql);
		$count = $this->getOneRow(array($id));
		return $count;
	}
	public function getSentMessageCountLastWeek($id){
		$sql = "SELECT COUNT(message_id) as message_count 
		FROM tblmessage 
		WHERE from_id = ? 
		AND send_at >= DATE(NOW()) + INTERVAL -7 DAY;";
		$this->setQuery($sql);
		$count = $this->getOneRow(array($id));
		return $count;
	}
	public function getSentMessageCount($id){
		$sql = "SELECT COUNT(message_id) as message_count 
		FROM tblmessage 
		WHERE from_id = ?;";
		$this->setQuery($sql);
		$count = $this->getOneRow(array($id));
		return $count;
	}
	public function getAllMessageCount(){
		$sql = "SELECT COUNT(message_id) as message_count 
		FROM tblmessage ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	
	           
	public function getAverageSentMessageCount(){
		$sql = "SELECT COUNT(message_id) as message_count ,
		count(DISTINCT from_id) as user_count, 
		COUNT(message_id) / COUNT(DISTINCT from_id) as message_average 
		FROM tblmessage ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getAverageTutorSentMessageCount(){
		$sql = "SELECT COUNT(m.message_id) as message_count ,
		count(DISTINCT m.from_id) as user_count, 
		COUNT(m.message_id) / COUNT(DISTINCT m.from_id) as message_average 
		FROM tblmessage as m 
		INNER JOIN tbluser as u 
		ON (u.user_id = m.from_id) 
		WHERE u.role = 2";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getAverageStudentSentMessageCount(){
		$sql = "SELECT COUNT(m.message_id) as message_count ,
		count(DISTINCT m.from_id) as user_count, 
		COUNT(m.message_id) / COUNT(DISTINCT m.from_id) as message_average 
		FROM tblmessage as m 
		INNER JOIN tbluser as u 
		ON (u.user_id = m.from_id) 
		WHERE u.role = 1 ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}

	public function getAverageReceivedMessageCount(){
		$sql = "SELECT COUNT(message_id) as message_count ,
		count(DISTINCT to_id) as user_count, 
		COUNT(message_id) / COUNT(DISTINCT to_id) as message_average 
		FROM tblmessage ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getAverageTutorReceivedMessageCount(){
		$sql = "SELECT COUNT(m.message_id) as message_count ,
		count(DISTINCT m.to_id) as user_count, 
		COUNT(m.message_id) / COUNT(DISTINCT m.to_id) as message_average 
		FROM tblmessage as m 
		INNER JOIN tbluser as u 
		ON (u.user_id = m.to_id) 
		WHERE u.role = 2";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getAverageStudentReceivedMessageCount(){
		$sql = "SELECT COUNT(m.message_id) as message_count ,
		count(DISTINCT m.to_id) as user_count, 
		COUNT(m.message_id) / COUNT(DISTINCT m.to_id) as message_average 
		FROM tblmessage as m 
		INNER JOIN tbluser as u 
		ON (u.user_id = m.to_id) 
		WHERE u.role = 1 ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}


	public function getAllDocumentCount(){
		$sql = "SELECT COUNT(id) as document_count 
		FROM tbldocument ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getAverageDocumentCount(){
		$sql = "SELECT COUNT(id) as document_count ,
		count(DISTINCT user_id) as user_count, 
		COUNT(id) / COUNT(DISTINCT user_id) as document_average 
		FROM tbldocument ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getAverageClassDocumentCount(){
		$sql = "SELECT COUNT(id) as document_count ,
		count(DISTINCT classroom_id) as classroom_count, 
		COUNT(id) / COUNT(DISTINCT classroom_id) as document_average 
		FROM tbldocument ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}

	public function getAverageStudentDocumentCount(){
		$sql = "SELECT COUNT(m.id) as document_count ,
		count(DISTINCT m.user_id) as user_count, 
		COUNT(m.id) / COUNT(DISTINCT m.user_id) as document_average 
		FROM tbldocument as m 
		INNER JOIN tbluser as u 
		ON (u.user_id = m.user_id) 
		WHERE u.role = 1 ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getAverageTutorDocumentCount(){
		$sql = "SELECT COUNT(m.id) as document_count ,
		count(DISTINCT m.user_id) as user_count, 
		COUNT(m.id) / COUNT(DISTINCT m.user_id) as document_average 
		FROM tbldocument as m 
		INNER JOIN tbluser as u 
		ON (u.user_id = m.user_id)
		WHERE u.role = 2 ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getPostCount($id){
		$sql = "SELECT COUNT(post_id) as post_count 
		FROM tblpost WHERE user_id = ?;";
		$this->setQuery($sql);
		$count = $this->getOneRow(array($id));
		return $count;
	}
	public function getAveragePostCount(){
		$sql = "SELECT COUNT(post_id) as post_count ,
		count(DISTINCT user_id) as user_count, 
		COUNT(post_id) / COUNT(DISTINCT user_id) as post_average 
		FROM tblpost ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getAveragePostCountPerClass(){
		$sql = "SELECT COUNT(post_id) as post_count ,
		count(DISTINCT in_class) as class_count, 
		COUNT(post_id) / COUNT(DISTINCT in_class) as post_average 
		FROM tblpost 
		where in_class != 0; ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getAverageStudentPostCount(){
		$sql = "SELECT COUNT(m.post_id) as post_count ,
		count(DISTINCT m.user_id) as user_count, 
		COUNT(m.post_id) / COUNT(DISTINCT m.user_id) as post_average 
		FROM tblpost as m INNER JOIN tbluser as u ON (u.user_id = m.user_id) 
		WHERE u.role = 1 ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getAverageTutorPostCount(){
		$sql = "SELECT COUNT(m.post_id) as post_count ,
		count(DISTINCT m.user_id) as user_count, 
		COUNT(m.post_id) / COUNT(DISTINCT m.user_id) as post_average 
		FROM tblpost as m 
		INNER JOIN tbluser as u 
		ON (u.user_id = m.user_id) 
		WHERE u.role = 2 ";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getAllPostCount(){
		$sql = "SELECT COUNT(post_id) as post_count 
		FROM tblpost;";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getCommentCount($id){
		$sql = "SELECT COUNT(comment_id) as comment_count 
		FROM tblcomment WHERE user_id = ?;";
		$this->setQuery($sql);
		$count = $this->getOneRow(array($id));
		return $count;
	}
	public function getAllCommentCount(){
		$sql = "SELECT COUNT(comment_id) as comment_count 
		FROM tblcomment;";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getInactiveStudentCount(){
		$sql = "SELECT COUNT(u.user_id) as student_count 
		FROM tbluser as u 
		inner join tbluserlog as l 
		ON (u.user_id = l.user_id) 
		WHERE u.role = 1 
		AND l.last_activity_at < DATE(NOW()) + INTERVAL -7 DAY;";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}
	public function getInactiveStudentCount2(){
		$sql = "SELECT COUNT(u.user_id) as student_count 
		FROM tbluser as u 
		inner join tbluserlog as l 
		ON (u.user_id = l.user_id) 
		WHERE u.role = 1 AND l.last_activity_at < DATE(NOW()) + INTERVAL -28 DAY;";
		$this->setQuery($sql);
		$count = $this->getOneRow();
		return $count;
	}

	public function getInactiveStudent(){
		$sql = "SELECT u.user_id, u.first_name, u.last_name,u.email, u.role, l.last_activity_at 
		FROM tbluser as u 
		inner join tbluserlog as l 
		ON (u.user_id = l.user_id) 
		WHERE u.role = 1 
		AND l.last_activity_at < DATE(NOW()) + INTERVAL -7 DAY;";
		$this->setQuery($sql);
		$studentlist = $this->getAllRows();
		return $studentlist;
	}
	public function getInactiveStudent2(){
		$sql = "SELECT u.user_id, u.first_name, u.last_name,u.email, u.role, l.last_activity_at 
		FROM tbluser as u 
		inner join tbluserlog as l 
		ON (u.user_id = l.user_id) 
		WHERE u.role = 1 
		AND l.last_activity_at < DATE(NOW()) + INTERVAL -28 DAY;";
		$this->setQuery($sql);
		$studentlist = $this->getAllRows();
		return $studentlist;
	}
	//student w no class
	public function getAvailableStudent()
	{
		
		$sql2 ="SELECT u.user_id, u.first_name, u.last_name,u.email, u.role 
		FROM tbluser as u 
		LEFT OUTER JOIN tblclassroomstudent as cs 
		ON (u.user_id = cs.user_id) 
		WHERE cs.user_id IS NULL
		 AND u.role = 1";


		$this->setQuery($sql2);
		$studentlist = $this->getAllRows();
		return $studentlist;
	}
	public function getAvailableStudentCount()
	{
		
		$sql2 ="SELECT COUNT(u.user_id) as student_count 
		FROM tbluser as u 
		LEFT OUTER JOIN tblclassroomstudent as cs
		ON (u.user_id = cs.user_id) 
		WHERE cs.user_id IS NULL 
		AND u.role = 1";


		$this->setQuery($sql2);
		$count = $this->getAllRows();
		return $count;
	}
}
?>
