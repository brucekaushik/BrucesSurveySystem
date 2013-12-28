<?php

$id = $_GET["id"];

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

$no_of_q = count($rows);

// echo "<br>$no_of_q<br>";

$ip_query = " SELECT ip_address FROM SurveyAnswers WHERE survey_id='$id' ";
$ip_res = mysql_query($ip_query) or die(mysql_error());
while($ip_row = mysql_fetch_array($ip_res, MYSQL_ASSOC)){
	
	$ip = $ip_row['ip_address'];

	if($ip == $_SERVER["REMOTE_ADDR"]){
		$eligible = "no";
		break;
	}else{
		$eligible = "yes";
	}
	
}

if(!$ip_row){
	$eligible = "yes";
} 

/*
echo "<pre>";
print_r($ip_rows);
echo "</pre>";
//*/

$eligible = "yes";

?>

<?php if($eligible == "yes"): ?>

	<br><br>
	<form name="questions" method="post" action="answer-surveys.php?action=SurveyAnswersSubmission">
	
		<?php foreach($rows as $x): ?>
			
			<?php 
			
			$id = $x["survey_id"];
			$qno = $x["question_number"];
			$qtype = $x["question_type"];
			$question = $x["question"];
			$o1 = $x["option1"];
			$o2 = $x["option2"];
			$o3 = $x["option3"];
			$o4 = $x["option4"];
			$o5 = $x["option5"];
			
			?>
					
			<?php switch ($qtype):
			 
				case "fill-in": ?>
				
					<div style="font-weight:bold"><?php echo $question ?></div><br>
									
					<div>Answer <input name="q<?php echo $qno ?>a" type="text" ></div><br><br>
				
				<?php break; ?>
				
				<?php case "yes-no": ?>
				
					<div style="font-weight:bold"><?php echo $question ?></div><br>
					
					<div><input name="q<?php echo $qno ?>a" type="radio" value="yes" > Yes</div>
					<div><input name="q<?php echo $qno ?>a" type="radio" value="no" > No</div><br><br>
				
				<?php break; ?>
				
				<?php case "choose-one": ?>
				
					<div style="font-weight:bold"><?php echo $question ?></div><br>
					
					<?php if (isset($o1) && $o1 != ""): ?>
						<div><input name="q<?php echo $qno ?>a" type="radio" value="<?php echo $o1 ?>" ><?php echo $o1 ?></div>
					<?php endif; ?>
					<?php if (isset($o2) && $o2 != ""): ?>
						<div><input name="q<?php echo $qno ?>a" type="radio" value="<?php echo $o2 ?>" ><?php echo $o2 ?></div>
					<?php endif; ?>
					<?php if (isset($o3) && $o3 != ""): ?>
						<div><input name="q<?php echo $qno ?>a" type="radio" value="<?php echo $o3 ?>" ><?php echo $o3 ?></div>
					<?php endif; ?>
					<?php if (isset($o4) && $o4 != ""): ?>
						<div><input name="q<?php echo $qno ?>a" type="radio" value="<?php echo $o4 ?>" ><?php echo $o4 ?></div>
					<?php endif; ?>
					<?php if (isset($o5) && $o5 != ""): ?>
						<div><input name="q<?php echo $qno ?>a" type="radio" value="<?php echo $o5 ?>" ><?php echo $o5 ?></div>
					<?php endif; ?>
					
					<br><br>
				
				<?php break; ?>
				
				<?php case "choose-multiple": ?>
				
					<div style="font-weight:bold"><?php echo $question ?> </div><br>
					
					<?php if (isset($o1) && $o1 != ""): ?>
						<div><input name="q<?php echo $qno ?>a[]" type="checkbox" value="<?php echo $o1 ?>" ><?php echo $o1 ?></div>
					<?php endif; ?>
					<?php if (isset($o2) && $o2 != ""): ?>
						<div><input name="q<?php echo $qno ?>a[]" type="checkbox" value="<?php echo $o2 ?>" ><?php echo $o2 ?></div>
					<?php endif; ?>
					<?php if (isset($o3) && $o3 != ""): ?>
						<div><input name="q<?php echo $qno ?>a[]" type="checkbox" value="<?php echo $o3 ?>" ><?php echo $o3 ?></div>
					<?php endif; ?>
					<?php if (isset($o4) && $o4 != ""): ?>
						<div><input name="q<?php echo $qno ?>a[]" type="checkbox" value="<?php echo $o4 ?>" ><?php echo $o4 ?></div>
					<?php endif; ?>
					<?php if (isset($o5) && $o5 != ""): ?>
						<div><input name="q<?php echo $qno ?>a[]" type="checkbox" value="<?php echo $o5 ?>" ><?php echo $o5 ?></div>
					<?php endif; ?>
				
				<?php break; ?>
				
			<?php endswitch; ?>
			
			<input type="hidden" name="id" value="<?php echo $id ?>">		
				
		<?php endforeach; ?>
		
		<input type="hidden" name="no-of-q" value="<?php echo $no_of_q ?>">
	
		<br><br>
		<button type="submit">Submit Answers</button>
	</form>

<?php elseif ($eligible == "no"): ?>

	<p>You have already answered this survey.</p>

<?php endif; ?>