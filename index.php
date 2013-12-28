<?php

session_start();

$_SESSION['verify_back_to'] = "../BrucesSurveySystem/index2.php";
$_SESSION['app_name'] = "Bruce's Survey System";

// redirect to home page
header ("Location: ../BrucesAdminArea/index.php?action=VerifyLogin");

?>