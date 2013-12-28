<?php 

session_start();

/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/

require '../BrucesAdminArea/includes/dbConnect.inc.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Manage Polls</title>
</head>
<body>
	<div class="wrapper">
	
		<?php if($ses_user_level == "reg"): ?>
				
		<?php 
		
			@$action = $_GET['action'];
					
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