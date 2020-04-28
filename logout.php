<?php

	include('controller/c_user.php');
	 $cuser = new c_User();
	 $cuser->logout();
	 // unset($_SESSION['user_name']);
	 // header('location:index.php');
