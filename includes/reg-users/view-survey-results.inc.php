<?php 

// handle variables
$id = $_GET["id"];

// TODO: sanitize the above variables

// query the database for answers of the survey, store them in an array
$query1 = " SELECT ans,question_number FROM SurveyAnswers WHERE survey_id='$id' ";
$res1 = mysql_query($query1) or die(mysql_error());
while($row1 = mysql_fetch_array($res1, MYSQL_ASSOC)){
	$rows1[] = $row1;
}

/*
echo "<pre>";
print_r($rows1);
echo "</pre>";
//*/

// query the database for questions of the survey, store them in an array
$query2 = " SELECT * FROM SurveyQuestions WHERE survey_id='$id' ";
$res2 = mysql_query($query2) or die(mysql_error());
while($row2 = mysql_fetch_array($res2, MYSQL_ASSOC)){
	
	$rows2[] = $row2;
	
	$qno = $row2["question_number"];
	$type = $row2["question_type"];
	$q = $row2["question"];
	$r2o1 = $row2["option1"];
	$r2o2 = $row2["option2"];
	$r2o3 = $row2["option3"];
	$r2o4 = $row2["option4"];
	$r2o5 = $row2["option5"];
	
	// initilize some variables that will be incremented later
	$num_people = 0;
	$a_yes = 0;
	$a_no = 0;
	$o1 = 0;
	$o2 = 0;
	$o3 = 0;
	$o4 = 0;
	$o5 = 0;
	
	foreach ($rows1 as $x){
		
		if($x["question_number"] == $qno){
			
			// number of people who answered this question
			$num_people += 1;
			
			// if this is a yes-no question, number of people who have answered yes or no
			if($type == "yes-no" && $x["ans"] == "yes"){
				$a_yes += 1;
			}else if($type == "yes-no" && $x["ans"] == "no"){
				$a_no += 1;
			}
			
			// if this is a choose-one question, number of people who have choose that particular option
			if($type == "choose-one" && $x["ans"] == $r2o1 && $r2o1 != ""){
				$o1 += 1;
			}else if($type == "choose-one" && $x["ans"] == $r2o2 && $r2o2 != ""){
				$o2 += 1;
			}else if($type == "choose-one" && $x["ans"] == $r2o3 && $r2o3 != ""){
				$o3 += 1;
			}else if($type == "choose-one" && $x["ans"] == $r2o4 && $r2o4 != ""){
				$o4 += 1;
			}else if($type == "choose-one" && $x["ans"] == $r2o5 && $r2o5 != ""){
				$o5 += 1;
			}
			
			// if this is a choose-multiple question, number of people who have choose that particular option
			if($type == "choose-multiple"){
				
				$ans = unserialize($x["ans"]);
				
				foreach ($ans as $y){
					
					if($y == $r2o1 && $r2o1 != ""){
						$o1 += 1;
					}
					if($y == $r2o2 && $r2o2 != ""){
						$o2 += 1;
					}					
					if($y == $r2o3 && $r2o3 != ""){
						$o3 += 1;
					}					
					if($y == $r2o4 && $r2o4 != ""){
						$o4 += 1;
					}
					if($y == $r2o5 && $r2o5 != ""){
						$o5 += 1;
					}
					
				}
				
			}
			
		}
				
	}
	
	if($type == "fill-in"){
		
		echo "<div><h2>$q</h2><p>Number of people who answered this question => $num_people</p></div>";
		
	}
	
	if($type == "yes-no"){
	
		echo "<div>";
			echo "<h2>$q</h2>";
			echo "<p>Number of people who answered this question => $num_people</p>";
			echo "<p>% of people who answered 'Yes' => " . ( $a_yes / $num_people) * 100 . "</p>";
			echo "<p>% of people who answered 'No' => " . ( $a_no / $num_people) * 100 . "</p>";
		echo "</div>";
		
	}
	
	if($type == "choose-one"){
	
		echo "<div>";
			echo "<h2>$q</h2>";
			echo "<p>Number of people who answered this question => $num_people</p>";
			if($r2o1){
				echo"<p>% of people who answered '$r2o1' => " .  ( $o1 / $num_people ) * 100 . "<p>";
			}
			if($r2o2){
				echo "<p>% of people who answered '$r2o2' => " .  ( $o2 / $num_people ) * 100 . "<p>";
			}
			if($r2o3){
				echo "<p>% of people who answered '$r2o3' => " .  ( $o3 / $num_people ) * 100 . "<p>";
			}
			if($r2o4){
				echo "<p>% of people who answered '$r2o4' => " .  ( $o4 / $num_people ) * 100 . "<p>";
			}
			if($r2o5){
				echo "<p>% of people who answered '$r2o5' => " .  ( $o5 / $num_people ) * 100 . "<p>";
			}
		echo "</div>";
	
	}
	
	if($type == "choose-multiple"){
	
		echo "<div>";
			echo "<h2>$q</h2>";
			echo "<p>Number of people who answered this question => $num_people</p>";
			if($r2o1){
				echo"<p>% of people who answered '$r2o1' => " .  ( $o1 / $num_people ) * 100 . "<p>";
			}
			if($r2o2){
				echo "<p>% of people who answered '$r2o2' => " .  ( $o2 / $num_people ) * 100 . "<p>";
			}
			if($r2o3){
				echo "<p>% of people who answered '$r2o3' => " .  ( $o3 / $num_people ) * 100 . "<p>";
			}
			if($r2o4){
				echo "<p>% of people who answered '$r2o4' => " .  ( $o4 / $num_people ) * 100 . "<p>";
			}
			if($r2o5){
				echo "<p>% of people who answered '$r2o5' => " .  ( $o5 / $num_people ) * 100 . "<p>";
			}
		echo "</div>";
	
	}
	
}

/*
echo "<pre>";
print_r($rows2);
echo "</pre>";
//*/

?>