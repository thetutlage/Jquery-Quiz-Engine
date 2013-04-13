<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		$session_name = $_SESSION['username'];
	}
	else
	{
		header("location: login.php");
	}
?>