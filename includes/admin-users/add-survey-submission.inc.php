<?php 

$name= $_POST["name"];
$description= $_POST["description"];

$query = " INSERT INTO SurveyInfo SET name='$name', description='$description', user_id='$ses_user_id' ";
$res = mysql_query($query);

if($res){
	
	echo "<p>Survey Added</p>";
			
	echo "<p>To add questions to your survey, click on the List Surveys link above and then you can find options</p>";
	
}else{
	
	echo "Unable to add the survey, please try again later";
	
}


?>