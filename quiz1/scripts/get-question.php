<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/animate.js"></script> 

<?php
	include_once( 'conn.php' );
	
	if($_POST)
	{
		$searchName = $_POST['searchName'];
		
		$sql = mysql_query("SELECT * FROM questions WHERE connection_meta = '$searchName'") or die(mysql_error());
		while($row = mysql_fetch_array($sql))
		{
			extract($row);
			echo '<div class="box">
				 <div id="question">
					 <h2>'.$question.'</h2>
				 </div>
				 <ul id="options">
					  <li class="question">'.$option1.'</li>
					  <li class="question">'.$option2.'</li>
					  <li class="question">'.$option3.'</li>
					  <li class="question">'.$option4.'</li>
				 </ul>
				 <input type="hidden" name="answer" value="'.htmlentities($answer).'" id="answer"/>
			 </div><!-- end box -->';
		}
	}
?>