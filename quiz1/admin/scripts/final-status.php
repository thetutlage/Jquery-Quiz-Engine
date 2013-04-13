<?php

	include_once( 'connection.php' );
	include_once( 'session.php' );
	
	if($_POST)
	{
		$quizinfo = $_POST['quizinfo'];
		
		if(empty($quizinfo))
		{
			echo 'There was an internal error';
		}
		else
		{
			$sql = mysql_query("UPDATE quizes SET final_status = 'true' WHERE id = '$quizinfo' LIMIT 1") or die(mysql_error());
			$affected_rows = mysql_affected_rows();
			
			if($affected_rows == 1)
			{
				echo 'Submitted Successfully';
			}
			else
			{
				echo 'There was an internal error';
			}
			
		}
	}

?>