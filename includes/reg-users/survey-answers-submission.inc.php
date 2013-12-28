<?php 

$id = $_POST["id"];
$ip = $_SERVER["REMOTE_ADDR"];

/*
$q1a = $_POST["q1a"];
$q2a = $_POST["q2a"];
$q3a = $_POST["q3a"];
$q4a_array = $_POST["q4a"];
$q4a = "";
*/

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

foreach ($rows as $x){
	
	// echo "$x<br>"; 
	
	$qno = $x["question_number"];
	$aname = "q" . $qno . "a";
	$ans = $_POST[$aname];

	if(gettype($ans) == "array"){
		$ans = serialize($ans);
	} 
		
	$query = " INSERT INTO SurveyAnswers SET survey_id='$id', question_number='$qno', ans='$ans', ip_address='$ip' ";
	$res = mysql_query($query) or die(mysql_error());
	
	if($res){
		$msg = "Submission Successful";
	}else{
		$msg = "Submission Failed! Please try again.";
	}
	
}

echo $msg;

?>

<p><a href="answer-surveys.php?action=ViewSurveyResults&id=<?php echo $id ?>">View Survey Results</a></p>