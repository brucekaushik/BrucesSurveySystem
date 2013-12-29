<?php 

// handle variables
$id = $_GET["id"];

?>

<!-- display all the available question types -->
<div class="add-question">
	<h3>What type of question would you like to add?</h3>
	<a href="manage-surveys.php?action=AddQuestion&type=FillIn&id=<?php echo $id ?>">Fill In The Blanks</a> |
	<a href="manage-surveys.php?action=AddQuestion&type=YesNo&id=<?php echo $id ?>">Yes or No</a> |
	<a href="manage-surveys.php?action=AddQuestion&type=ChooseOne&id=<?php echo $id ?>">Mulitiple Choice - Choose One</a> |
	<a href="manage-surveys.php?action=AddQuestion&type=ChooseMultiple&id=<?php echo $id ?>">Mulitiple Choice - Choose Multiple</a>
</div>

<?php 

// handle variables
@$type = $_GET["type"];
$id = $_GET["id"];

?>

<?php 

// show form according to the type of the question
switch ($type): 
	
	case "FillIn": ?>
		
		<br>
		<form name="add-question-form" id="add-question-form" method="post" action="manage-surveys.php?action=AddQuestionSubmission">
			<div>Enter Question <input name="question" type="text"></div><br>
			<input name="id" type="hidden" value="<?php echo $id ?>">
			<input name="type" type="hidden" value="fill-in">
			<div><button type="submit">Add Question</button></div>
		</form>
		
	<?php break; ?>
	
	<?php case "YesNo": ?>
	
		<br>
		<form name="add-question-form" id="add-question-form" method="post" action="manage-surveys.php?action=AddQuestionSubmission">
			<div>Enter Question <input name="question" type="text"></div><br>
			<input name="id" type="hidden" value="<?php echo $id ?>">
			<input name="type" type="hidden" value="yes-no">
			<div><button type="submit">Add Question</button></div>
		</form>
		
	<?php break; ?>
	
	<?php case "ChooseOne": ?>
	
		<br>
		<form name="add-question-form" id="add-question-form" method="post" action="manage-surveys.php?action=AddQuestionSubmission">
			<div>Enter Question <input name="question" type="text"></div>
			<div>Option 1 <input name="option1" type="text"></div>
			<div>Option 2 <input name="option2" type="text"></div>
			<div>Option 3 <input name="option3" type="text"></div>
			<div>Option 4 <input name="option4" type="text"></div>
			<div>Option 5 <input name="option5" type="text"></div><br>
			<input name="id" type="hidden" value="<?php echo $id ?>">
			<input name="type" type="hidden" value="choose-one">
			<div><button type="submit">Add Question</button></div>
		</form>
		
	<?php break; ?>
	
	<?php case "ChooseMultiple": ?>
	
		<br>
		<form name="add-question-form" id="add-question-form" method="post" action="manage-surveys.php?action=AddQuestionSubmission">
			<div>Enter Question <input name="question" type="text"></div>
			<div>Option 1 <input name="option1" type="text"></div>
			<div>Option 2 <input name="option2" type="text"></div>
			<div>Option 3 <input name="option3" type="text"></div>
			<div>Option 4 <input name="option4" type="text"></div>
			<div>Option 5 <input name="option5" type="text"></div><br>
			<input name="id" type="hidden" value="<?php echo $id ?>">
			<input name="type" type="hidden" value="choose-multiple">
			<div><button type="submit">Add Question</button></div>
		</form>
		
	<?php break; ?>
	
<?php endswitch; ?>