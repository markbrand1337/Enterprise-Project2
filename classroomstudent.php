<?php

require_once("controller/c_classroomstudent.php");
$controller = new c_ClassroomStudent();
// $controller->getClassroomStudent();
if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	){
	// $id = $_GET['id'];
	$controller->getClassroomStudent();

} else {
	header('location:classroom.php');
}
