<?php

require_once("controller/c_user.php");
$cuser = new c_User();
$cuser->getDashboard();
// if(isset($_SESSION['user_name'])) {
// $cuser->getDashboard();
// } else {
// 	header('location:index.php');
// }
?>