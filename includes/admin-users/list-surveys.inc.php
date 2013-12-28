<?php

$query = " SELECT * FROM SurveyInfo ";
$res = mysql_query($query) or die("error");

while( $row = mysql_fetch_array($res, MYSQL_ASSOC) ){
	
	$name = $row["name"];
	$description = $row["description"];
	$id = $row["survey_id"];
	
	echo "<div>". 
		$name . " --- " .
		$description . " --- " .
		"<a href='manage-surveys.php?action=AddQuestion&id=$id'>add question</a> |" .
		"<a href='manage-surveys.php?action=PreviewSurvey&id=$id'>preview/edit survey</a> |" .
		"<a href='manage-surveys.php?action=DeleteSurvey&id=$id'>delete survey</a>" .
		"</div>";
}

?>