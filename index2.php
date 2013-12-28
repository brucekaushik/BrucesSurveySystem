<?php

// start a session
session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

require '../08-adminArea/includes/dbConnect.inc.php';

$userDetailsQuery = "select * from AdminArea where username='$ses_username'";
$userDetailsRes = mysql_query($userDetailsQuery, $c);
$userDetailsRow = mysql_fetch_array($userDetailsRes, MYSQL_ASSOC);

/*
echo "<pre>";
print_r($userDetailsRow);
echo "</pre>";
//*/

$ses_user_id = $userDetailsRow["user_id"];
session_register("ses_user_id");

// redirect to home page
header ("Location: home.php");

?>