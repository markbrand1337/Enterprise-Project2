<?php
include_once("model/dbconnect.php");
include_once("controller/c_classroom.php");

if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	&& isset($_GET['id2']) 
	&&filter_var($_GET['id2'],FILTER_VALIDATE_INT,array('min_range'=>1) )
	){
				$id=$_GET['id'];
			$id2=$_GET['id2'];
				$controller = new c_Classroom();
				$controller->DeleteClassroom($id,$id2);
}



?>