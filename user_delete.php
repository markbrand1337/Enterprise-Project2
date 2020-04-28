<?php
include_once("model/dbconnect.php");
include_once("controller/c_user.php");

if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	){
				$id=$_GET['id'];
				$controller = new c_User();
				$controller->DeleteUser($id);
}
