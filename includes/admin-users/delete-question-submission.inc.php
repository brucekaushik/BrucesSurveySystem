<?php 

$sId = $_GET["sID"];
$qNo = $_GET["qNo"];

$query = " DELETE FROM SurveyQuestions WHERE survey_id='$sId' AND question_number='$qNo' ";
$res = mysql_query($query) or die(mysql_error());

if($res){
		
	echo "<p>Question Deleted</p>";
		
	echo "<p><a href='manage-surveys.php?action=PreviewSurvey&id=$sId'>preview survey</a> or <a href='manage-surveys.php?action=ListSurveys'>list surveys</a></p>";
		
}else{
	
	echo "Unable to delete the question, please try again later";
		
}


?>