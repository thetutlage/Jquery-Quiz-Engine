<?php
	session_start();
	if(isset($_POST['submit']))
	{
		include_once( 'conn.php' );
	
		$username = $_POST['username'];
		$password = $_POST['passwd'];
		
		
		if(empty($username) || empty($password))
		{
			$error =  'Enter your login credentials';
		}
		else
		{
			$username = strip_tags($username);
			$password = strip_tags($password);

			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			$password = md5($password);
			
			$sql = mysql_query("SELECT * FROM tut_users WHERE username = '$username' && password = '$password' LIMIT 1") or die(mysql_error());
			$row = mysql_num_rows($sql);
			if($row == 1)
			{
				$fetch = mysql_fetch_array($sql);
				extract($fetch);
				
				$_SESSION['username'] = $username;
				if(isset($_SESSION['username']))
				{
					$update = mysql_query("UPDATE tut_users SET last_log = now() WHERE user_id = '$user_id'") or die(mysql_error());
					header("location:index.php");
				}
			}
			else
			{
				$error = 'Invalid Credentials';
			}
		}
	}

?>