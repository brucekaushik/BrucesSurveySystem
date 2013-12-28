<?php
 
// show navigation depending on user level
if($ses_user_level == "reg"){
	include 'includes/reg-users/topnav.inc.php';
}elseif ($ses_user_level == "admin" || $ses_user_level == "root"){
	include 'includes/admin-users/topnav.inc.php';
}

?>