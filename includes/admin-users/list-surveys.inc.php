<?php

// handle variables
$ses_user_id = $_SESSION['user_id'];

// query the database for surveys available
$query = " SELECT * FROM SurveyInfo ";
$res = mysql_query($query) or die("error");

// display the surveys if the user id matches
while( $row = mysql_fetch_array($res, MYSQL_ASSOC) ){
	
	if($ses_user_id == $row['user_id']){
	
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
	
}

?>