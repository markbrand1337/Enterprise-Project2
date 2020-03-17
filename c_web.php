<?php 
include_once("controller/c_router.php");
class c_Web extends c_Router{
	public function index(){
		$this->loadView('v_index');
	}
}

?>