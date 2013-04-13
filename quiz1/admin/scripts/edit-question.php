<?php

	include_once( 'connection.php' );

	$question = $_POST['question'];
	$option1 = $_POST['option1'];
	$option2 = $_POST['option2'];
	$option3 = $_POST['option3'];
	$option4 = $_POST['option4'];
	$answer = $_POST['answer'];
	$quizinfo = $_POST['quizinfo'];

	if(empty($quizinfo))
	{
		echo 'Unable to process request';
	}
	else
	{
		$question = strip_tags($question);
		$question = mysql_real_escape_string($question);

		$sql = mysql_query("UPDATE questions SET question = '$question' ,option1 = '$option1' ,option2 = '$option2' ,option3 = '$option3' ,option4 = '$option4', answer = '$answer' WHERE id = '$quizinfo'") or die(mysql_error());

		$num_rows = mysql_affected_rows();
		if($num_rows >= 1)
		{
			echo 'Successfully Edited';
		}
		else
		{
			echo 'No updation done';
		}
	}
?>