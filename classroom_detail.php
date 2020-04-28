<?php
require_once("controller/c_classroom.php");
$controller = new c_Classroom();

if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	){
	$id = $_GET['id'];
	$controller->getClassroomDetail($id);

} else {
	header('location:classroom.php');
}
