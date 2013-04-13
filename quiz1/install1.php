<?php
		
		include_once 'config.php';
		$db_name = DB_NAME;
		$db_user = DB_USER;
		$db_pass = DB_PASSWORD;
		$db_host = DB_HOST;
		
		$conn = mysql_connect($db_host,$db_user,$db_pass);
		$db = mysql_select_db($db_name,$conn);

		
		$email = $_POST['email'];
		$pass1 = $_POST['pass1'];
		$username = $_POST['username'];
		
		$ip_address = $_SERVER['REMOTE_ADDR'];
		
		$pass2 = md5($pass1);
		
		if(empty($email) || empty($pass1) || empty($username))
		{
			echo 'All fields Required';
		}
		else
		{
		
			$fetch = mysql_query("SELECT email FROM tut_users WHERE email = '$email'");
			$fetch_rows = mysql_num_rows($fetch);
			
			if($fetch_rows >= 1)
			{
				echo 'Email already Exists';
			}
			else
			{
		
			$sql2 = mysql_query("INSERT INTO tut_users (username,email,password,ip_address)
			VALUES ('$username','$email','$pass2','$ip_address')") or die(mysql_error());
		
			if($sql2)
			{
				$new_id = mysql_insert_id();
				echo 'Everything went right, Delete the files used for installation (recommended) <a href="install.php?alldelete=alldelete" id="created">Delete</a>';
			}
			}
		}

?>