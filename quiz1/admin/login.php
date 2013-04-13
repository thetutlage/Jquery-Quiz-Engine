<?php
	if(file_exists('../config.php')){}else{header("location: ../install.php");}
	include_once( 'scripts/login-script.php' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>UI Elements: jQuery Popout Menu</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="description" content="UI Elements: jQuery Popout Menu" />
		<meta name="keywords" content="jquery, menu, navigation, popout, slide up, slide down "/>
		<!-- The JavaScript -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/submit-data.js"></script>       
		<link rel="stylesheet" href="css/login.css" type="text/css" media="screen"/>
		<style>
			*{
				padding:0;
				margin:0;
			}
			 body{
				background-color:#f0f0f0;
				font-family:"Helvetica Neue",Arial,Helvetica,Geneva,sans-serif;
			}
			h1{
				font-size:180px;
				line-height:180px;
				text-transform: uppercase;
				color:#ddd;
				position:absolute;
				text-shadow:0 1px 0 #fff;
				top:-25px;
				margin-top: 23px;
				white-space: nowrap;
				width: 100%;
				text-align: center;
			}
			span.reference{
				position:fixed;
				left:10px;
				bottom:10px;
				font-size:11px;
			}
			span.reference a{
				color:#666;
				text-decoration:none;
				text-transform: uppercase;
				text-shadow:0 1px 0 #fff;
			}
			span.reference a:hover{
				color:#ccc;
			}
			.m_wrapper{
				margin-top:200px;
			}
		</style>
	</head>
	<body>
		<div class="content">
			<h1>Quiz Admin</h1>
			<div id="fake"> </div> 

<?php if(isset($error))	
	{
				echo '<div id="error">
				<h3>Correct Following Errors</h3>
				<ol style="margin: 0 0 0 20px;">
					<li>'.$error.'</li>
				</ol>
			</div><!-- end error -->'; 
	}	
		?>
			
						<div id="login">
				<h2>Login Panel</h2>
				<form action="login.php" method="post">
				<label for="email">UserName</label><br />
					<input type="text" id="username" name="username" value="" class="input"/>

					<div style="margin: 1.8em 0 0 0;">
						<label for="passwd">Password</label><br />
						<input id="passwd" type="password" name="passwd" class="input" value=""/>
					</div>

					<div>
						<div id="submit"><input type="submit" name="submit" value="Login" class="button" /></div>
						<div id="lost"><a href="http://www.thetutlage.com" target="_blank">Like it? Check out thetutlage.com</a></div>
					</div>
				</form>

			</div>
			
		
		</div><!-- end ocntent -->

	</body>
</html>