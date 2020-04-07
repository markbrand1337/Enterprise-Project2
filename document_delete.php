<?php
include_once("model/dbconnect.php");
include_once("controller/c_document.php");

if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	&& isset($_GET['id2']) 
	&&filter_var($_GET['id2'],FILTER_VALIDATE_INT,array('min_range'=>1) )
	){
				$id=$_GET['id'];
				$id2=$_GET['id2'];
				$controller = new c_Comment();
				$controller->DeleteComment($id);
				echo '<script> location.replace("post.php?id='.$id2.'"); </script>';
}





?>