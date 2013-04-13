<?php
	
	include_once( 'connection.php' );
	include_once( 'session.php' );
	$status = 'published';
	
	if($_POST)
	{
		$quizname = $_POST['quizname'];
	
		if(empty($quizname))
		{
			echo 'QuizName is required';
		}
		else
		{
			$quizname = strip_tags($quizname);
			$quizname = mysql_real_escape_string($quizname);
			
			$sql = mysql_query("INSERT INTO quizes (quiz_name,created_on,created_by,status,final_status)
			VALUES ('$quizname',now(),'$session_name','$status','false')") or die(mysql_error());
			
			$id = mysql_insert_id();
			
			if($sql)
			{
				echo $id;
			}
		}
	}
	
?>