<?php

// query the database for information of all the available surveys
$query = " SELECT * FROM SurveyInfo ";
$res = mysql_query($query) or die(mysql_error());

// loop through all the surveys and provide the user with the option to take the surveys
while( $row = mysql_fetch_array($res, MYSQL_ASSOC) ){
	
	$name = $row["name"];
	$description = $row["description"];
	$id = $row["survey_id"];
	
	echo "<div>". 
		$name . " --- " .
		$description . " --- " .
		"<a href='answer-surveys.php?action=TakeSurvey&id=$id'>take survey</a>" .
		"</div>";
}

// TODO: add condition to display appropriate msg if no surveys are available

?>