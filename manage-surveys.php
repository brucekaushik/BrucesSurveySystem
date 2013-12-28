<?php 

session_start();

/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/

require '../08-adminArea/includes/dbConnect.inc.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Manage Polls</title>
</head>
<body>
	<div class="wrapper">
	
		<?php if($ses_user_level == "admin" || $ses_user_level == "root"): ?>
		
		<?php include 'includes/admin-users/topnav.inc.php'; ?>
		
		<?php 
		
			@$action = $_GET['action'];
					
			switch ($action){
				
				case "AddSurvey":
					
					include 'includes/admin-users/add-survey.inc.php';
					
				break;
				
				case "AddSurveySubmission":
						
					include 'includes/admin-users/add-survey-submission.inc.php';
						
				break;
				
				case "ListSurveys":
					
					include 'includes/admin-users/list-surveys.inc.php';
					
				break;
				
				case "AddQuestion":
					
					include 'includes/admin-users/add-question.inc.php';
					
				break;
				
				case "AddQuestionSubmission":
					
					include 'includes/admin-users/add-question-submission.inc.php';
					
				break;
				
				case "PreviewSurvey":
						
					include 'includes/admin-users/preview-survey.inc.php';
						
				break;
				
				case "DeleteQuestion":
						
					include 'includes/admin-users/delete-question-submission.inc.php';
						
				break;
				
				case "DeleteSurvey":
				
					include 'includes/admin-users/delete-survey-submission.inc.php';
				
				break;

			}
		
		?>
		
		<?php endif; ?>
	</div>
</body>
</html>