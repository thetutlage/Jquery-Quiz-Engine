<?php

	include_once( '../../config.php' );

	$db_host = DB_HOST;
	$db_pass = DB_PASSWORD;
	$db_user = DB_USER;
	$db_name = DB_NAME;
	
	$encrypted_conn = mysql_connect($db_host,$db_user,$db_pass) or die(mysql_error());
	mysql_select_db($db_name,$encrypted_conn) or die(mysql_error());
?>