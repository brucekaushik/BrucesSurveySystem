<?php 

// handle variables
$id = $_POST["id"];
$question = $_POST["question"];
$type = $_POST["type"];

if(isset($option1) && $option1 != ""){
	$option1 = $_POST["option1"];
}else{
	$option1 = null;
}

if(isset($option2) && $option2 != ""){
	$option2 = $_POST["option2"];
}else{
	$option2 = null;
}

if(isset($option3) && $option3 != ""){
	$option3 = $_POST["option3"];
}else{
	$option3 = null;
}

if(isset($option4) && $option4 != ""){
	$option4 = $_POST["option4"];
}else{
	$option4 = null;
}

if(isset($option5) && $option5 != ""){
	$option5 = $_POST["option5"];
}else{
	$option5 = null;
}

/*
echo $id;
echo "<br>";
echo $question;
echo "<br>";
echo $type;
echo "<br>";
//*/

// query the db for all the questions of the survey
$query = " SELECT * FROM SurveyQuestions WHERE survey_id='$id' ";
$res = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
	$rows[] = $row;
}

/*
echo "<pre>";
print_r($rows);
echo "</pre>";
//*/

// set the question number
if(isset($rows)){
	$count = count($rows) - 1;
	// echo '<br><br>Count Is =>' . $count . '<br><br>';
	$qno = $rows[$count]["question_number"] + 1;
}else{
	$qno = 1;	
}

// depending on the type of the question insert it into the database
switch ($type){
	
	case "fill-in":
		
		$query = " INSERT INTO SurveyQuestions SET survey_id='$id', question_number='$qno' ,question='$question', question_type='$type' ";
		$res = mysql_query($query) or die(mysql_error());
		
		if($res){
			
			echo "<p>Question Added</p>";
					
			echo "<p><a href='manage-surveys.php?action=AddQuestion&id=$id'>add another question</a> or <a href='manage-surveys.php?action=ListSurveys'>list surveys</a></p>";
			
		}else{
			
			echo "Unable to add the question, please try again later";
			
		}
		
	break;
	
	case "yes-no":
	
		$query = " INSERT INTO SurveyQuestions SET survey_id='$id', question_number='$qno' ,question='$question', question_type='$type' ";
		$res = mysql_query($query) or die(mysql_error());
	
		if($res){
				
			echo "<p>Question Added</p>";
				
			echo "<p><a href='manage-surveys.php?action=AddQuestion&id=$id'>add another question</a> or <a href='manage-surveys.php?action=ListSurveys'>list surveys</a></p>";
				
		}else{
			
			echo "Unable to add the question, please try again later";
		
		}
	
	break;
	
	case "choose-one":
	
		$query = " INSERT INTO SurveyQuestions SET survey_id='$id', question_number='$qno' ,question='$question', question_type='$type', option1='$option1', option2='$option2', option3='$option3', option4='$option4', option5='$option5' ";
		$res = mysql_query($query) or die(mysql_error());
	
		if($res){
	
			echo "<p>Question Added</p>";
	
			echo "<p><a href='manage-surveys.php?action=AddQuestion&id=$id'>add another question</a> or <a href='manage-surveys.php?action=ListSurveys'>list surveys</a></p>";
	
		}else{
			
		echo "Unable to add the question, please try again later";
	
		}
	
	break;
	
	case "choose-multiple":
	
		$query = " INSERT INTO SurveyQuestions SET survey_id='$id', question_number='$qno' ,question='$question', question_type='$type', option1='$option1', option2='$option2', option3='$option3', option4='$option4', option5='$option5' ";
		$res = mysql_query($query) or die(mysql_error());
	
		if($res){
	
			echo "<p>Question Added</p>";
	
			echo "<p><a href='manage-surveys.php?action=AddQuestion&id=$id'>add another question</a> or <a href='manage-surveys.php?action=ListSurveys'>list surveys</a></p>";
	
		}else{
			
		echo "Unable to add the question, please try again later";
	
		}
	
	break;
	
}


?>