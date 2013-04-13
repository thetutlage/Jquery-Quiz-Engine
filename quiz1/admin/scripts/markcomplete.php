<?php

	include( 'connection.php' );
	if($_POST)
	{
		$markid = $_POST['markid'];
		
		$sql = mysql_query("UPDATE quizes SET final_status = 'true' WHERE id = '$markid' LIMIT 1") or die(mysql_error());
	}
?>