<?php

require_once("controller/c_meeting.php");
$controller = new c_Meeting();
// $controller->getMeetingDetail();
if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	&& isset($_GET['id2']) 
	&&filter_var($_GET['id2'],FILTER_VALIDATE_INT,array('min_range'=>1) )
	){
				$id=$_GET['id'];
				$id2=$_GET['id2'];
				$controller = new c_Meeting();
				$res =$controller->StartMeeting($id);
				print_r($res);
				echo '<script> location.replace("meeting_detail.php?id='.$id.'&id2='.$id2.'"); </script>';
}
