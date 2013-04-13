<?php
	include('connection.php');
	$sql = mysql_query("SELECT * FROM quizes WHERE status = 'published' AND final_status = 'true' ORDER BY id ASC") or die(mysql_error());
	while($row = mysql_fetch_array($sql))
	{
		extract($row);
		$qualify_quiz = mysql_query("SELECT * FROM questions WHERE connection_meta = '$id'") or die(mysql_error());
		$num_rows = mysql_num_rows($qualify_quiz);
		if($num_rows >= 1)
		{
		echo '<li><input type="hidden" id="quiztorun" value="'.$id.'" /><a href="#" class="quiz_default_to_start">'.$quiz_name.'</a></li>';
		}
	}
?>