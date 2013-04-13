<?php

	include_once( 'connection.php' );
	include_once( 'session.php' );
	
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
		
		$sql = mysql_query("INSERT INTO questions (question,option1,option2,option3,option4,answer,connection_meta,created_on,created_by,status)
			VALUES ('$question','$option1','$option2','$option3','$option4','$answer','$quizinfo',now(),'$session_name','published')") or die(mysql_error());
		
		$num_rows = mysql_affected_rows();
		if($num_rows >= 1)
		{
			$fetch = mysql_query("SELECT * FROM questions WHERE connection_meta = '$quizinfo'") or die(mysql_error());
			
			echo '<h2>Recent Questions</h2><ul>';
			while($row = mysql_fetch_array($fetch))
			{
				extract($row);				
				echo '<li>'.$question.'</li>';
			}
			echo '</ul>';
		}
		else
		{
			echo 'Unable to process request';
		}
	}
?>