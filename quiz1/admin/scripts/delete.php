<?php
	include('connection.php');
	
	if($_POST)
	{
		$sendtype = $_POST['sendtype'];
		$senddelete = $_POST['senddelete'];
		
		if($sendtype == 'quiz')
		{
			$deletequiz = mysql_query("DELETE FROM quizes WHERE id = '$senddelete' LIMIT 1") or die(mysql_error());
			$num_rows = mysql_affected_rows();
			
			if($num_rows == 1)
			{
				$deleteques = mysql_query("DELETE FROM questions WHERE connection_meta = '$senddelete'") or die(mysql_error());
				
				if($deleteques)
				{
					echo 'Deleted Successfully';
				}
				else
				{
					echo 'There was an error';
				}
			}
		}
		elseif($sendtype == 'question')
		{
			$deleteques = mysql_query("DELETE FROM questions WHERE id = '$senddelete'") or die(mysql_error());
			$num_rows = mysql_affected_rows();
			if($num_rows == 1)
			{
				echo 'Deleted Successfully';
			}
			else
			{
				echo 'Unable to delete';
			}
		}
		
	}
?>