<?php

// handle variables
$id = $_GET["id"];

// query the database for all the questions of the survey
// store the questions in an array, each question is an array item
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

?>

<br><br>
<form name="questions" method="post">

	<?php 
	
	// loop through array, display each question depending on its type
	// provide an option to delete the question 
	foreach($rows as $x): ?>
		
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
			
				<div style="font-weight:bold"><?php echo $question ?> 
					<span><a href="manage-surveys.php?action=DeleteQuestion&qNo=<?php echo $qno ?>&sID=<?php echo $id ?>">delete</a></span>
				</div><br>
								
				<div>Answer <input name="q<?php echo $qno ?>a" type="text" ></div><br><br>
			
			<?php break; ?>
			
			<?php case "yes-no": ?>
			
				<div style="font-weight:bold"><?php echo $question ?> 
					<span><a href="manage-surveys.php?action=DeleteQuestion&qNo=<?php echo $qno ?>&sID=<?php echo $id ?>">delete</a></span>
				</div><br>
				
				<div><input name="q<?php echo $qno ?>a" type="radio" value="yes" > Yes</div>
				<div><input name="q<?php echo $qno ?>a" type="radio" value="no" > No</div><br><br>
			
			<?php break; ?>
			
			<?php case "choose-one": ?>
			
				<div style="font-weight:bold"><?php echo $question ?> 
					<span><a href="manage-surveys.php?action=DeleteQuestion&qNo=<?php echo $qno ?>&sID=<?php echo $id ?>">delete</a></span>
				</div><br>
				
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
			
				<div style="font-weight:bold"><?php echo $question ?> 
					<span><a href="manage-surveys.php?action=DeleteQuestion&qNo=<?php echo $qno ?>&sID=<?php echo $id ?>">delete</a></span>
				</div><br>
				
				<?php if (isset($o1) && $o1 != ""): ?>
					<div><input name="q<?php echo $qno ?>a" type="checkbox" value="<?php echo $o1 ?>" ><?php echo $o1 ?></div>
				<?php endif; ?>
				<?php if (isset($o2) && $o2 != ""): ?>
					<div><input name="q<?php echo $qno ?>a" type="checkbox" value="<?php echo $o2 ?>" ><?php echo $o2 ?></div>
				<?php endif; ?>
				<?php if (isset($o3) && $o3 != ""): ?>
					<div><input name="q<?php echo $qno ?>a" type="checkbox" value="<?php echo $o3 ?>" ><?php echo $o3 ?></div>
				<?php endif; ?>
				<?php if (isset($o4) && $o4 != ""): ?>
					<div><input name="q<?php echo $qno ?>a" type="checkbox" value="<?php echo $o4 ?>" ><?php echo $o4 ?></div>
				<?php endif; ?>
				<?php if (isset($o5) && $o5 != ""): ?>
					<div><input name="q<?php echo $qno ?>a" type="checkbox" value="<?php echo $o5 ?>" ><?php echo $o5 ?></div>
				<?php endif; ?>
			
			<?php break; ?>
			
		<?php endswitch; ?>			
			
	<?php endforeach; ?>

	<br><br><br><br>
	<button type="submit">Submit Survey</button> (Dummy Button)
</form>