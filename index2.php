<?php

// start a session
session_start();

/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/

// handle variables
unset($_SESSION['app_name']);
unset($_SESSION['verify_back_to']);
unset($_SESSION['action']);

// connect to database
require '../BrucesAdminArea/includes/dbConnect.inc.php';

// query user details from the database and store then in an array
$userDetailsQuery = "select * from AdminArea where username='$ses_username'";
$userDetailsRes = mysql_query($userDetailsQuery, $c);
$userDetailsRow = mysql_fetch_array($userDetailsRes, MYSQL_ASSOC);

/*
echo "<pre>";
print_r($userDetailsRow);
echo "</pre>";
//*/

// handle variables
$_SESSION['user_id'] = $userDetailsRow["user_id"];

// redirect to home page
header ("Location: home.php");

?>