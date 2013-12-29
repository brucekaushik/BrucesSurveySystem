<?php 

session_start();

/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/

// handle varibles
$ses_user_level = $_SESSION['user_level'];

// connect to database
require '../BrucesAdminArea/includes/dbConnect.inc.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Manage Polls</title>
	<link type="text/css" rel="stylesheet" href="styles.css">
</head>
<body>
	<?php include 'includes/topnav.inc.php' ?>
	<div class="content">
	
		<?php // if the user is logged in and is registered
		 
		if($ses_user_level == "reg"): ?>
				
		<?php 
		
			// handle variables
			@$action = $_GET['action'];
					
			// take action depending on link clicked/form submitted etc		
			switch ($action){
				
				case "TakeSurvey":
										
					include 'includes/reg-users/display-survey.inc.php';
					
				break;
				
				case "SurveyAnswersSubmission":
					
					include 'includes/reg-users/survey-answers-submission.inc.php';
					
				break;
				
				case "ViewSurveyResults":
					
					include 'includes/reg-users/view-survey-results.inc.php';
				
				break;
				
				default:
					
					include 'includes/reg-users/list-surveys.inc.php';
				
				break;

			}
		
		?>
		
		<?php endif; ?>
	</div>
</body>
</html>