<?php 

// handle variables
$ses_user_id = $_SESSION['user_id'];
$name= $_POST["name"];
$description= $_POST["description"];

// insert data into the database
$query = " INSERT INTO SurveyInfo SET name='$name', description='$description', user_id='$ses_user_id' ";
$res = mysql_query($query);

// depending on the success of inserting, show relevant message
if($res){
	
	echo "<p>Survey Added</p>";
			
	echo "<p>To add questions to your survey, click on the List Surveys link above and then you can find options</p>";
	
}else{
	
	echo "Unable to add the survey, please try again later";
	
}


?>