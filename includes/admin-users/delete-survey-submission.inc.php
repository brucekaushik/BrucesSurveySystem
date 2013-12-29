<?php 

// handle variables
$sId = $_GET["id"];

// delete all the survey info, questions, answers from the database
$query1 = " DELETE FROM SurveyInfo WHERE survey_id='$sId' ";
$res1 = mysql_query($query1) or die(mysql_error());

$query2 = " DELETE FROM SurveyQuestions WHERE survey_id='$sId' ";
$res2 = mysql_query($query2) or die(mysql_error());

$query3 = " DELETE FROM SurveyAnswers WHERE survey_id='$sId' ";
$res3 = mysql_query($query3) or die(mysql_error());

// show the success message if deletion is succesful
if($res1 && $res2 && $res3){
		
	echo "<p>Survey Deleted</p>";
		
	echo "<p><a href='manage-surveys.php?action=AddSurvey'>add new survey</a> or <a href='manage-surveys.php?action=ListSurveys'>list surveys</a></p>";
		
}
// show failure message
else{
	
	echo "Unable to delete the survey, please try again later";
		
}

?>