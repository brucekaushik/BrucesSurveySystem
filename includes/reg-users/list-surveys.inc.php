<?php

$query = " SELECT * FROM SurveyInfo ";
$res = mysql_query($query) or die(mysql_error());

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

?>