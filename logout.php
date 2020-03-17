<?php

	include('controller/c_user.php');
	 $cuser = new c_User();
	 $cuser->logout();
	 header('location:index.php');

?>