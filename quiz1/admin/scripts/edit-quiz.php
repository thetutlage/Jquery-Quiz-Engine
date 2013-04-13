<?php
	
	if($_POST)
	{
		include( 'connection.php');
	
		$quizeditname = $_POST['quizeditname'];
		$editquizid = $_POST['editquizid'];
		
		if(empty($quizeditname))
		{
			echo 'Quizname cannot be empty';
		}
		else
		{
			$sql = mysql_query("UPDATE quizes SET quiz_name = '$quizeditname' WHERE id = '$editquizid' LIMIT 1") or die(mysql_error());
			$numrows = mysql_affected_rows();
			
			if($numrows >= 1)
			{
				$fetch = mysql_query("SELECT quiz_name FROM quizes WHERE id = '$editquizid' LIMIT 1");
				$row = mysql_fetch_array($fetch);
				extract($row);
				
				echo $quiz_name; 
			}
			else
			{
				echo $quizeditname;
			}
		}
	}
	
	

?>