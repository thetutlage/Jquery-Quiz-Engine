<script type="text/javascript" src="js/get-quiz.js"></script>       

<?php
	include('connection.php');
	
	if($_POST)
	{
		$id = $_POST['id'];
	
		$sql = mysql_query("SELECT * FROM questions WHERE id = '$id'") or die(mysql_error());
		if($sql)
		{
			$row = mysql_fetch_array($sql);
			extract($row);
			
				if($answer == $option1)
				{
					$finalanswer1 =  '<li class="answerselected" id="li1">'.$option1.'</li>';
				}
				else
				{
					$finalanswer1 = '<li class="answerdefault" id="li1">'.$option1.'</li>';
				}
				
				if($answer == $option2)
				{
					$finalanswer2 =  '<li class="answerselected" id="li2">'.$option2.'</li>';
				}
				else
				{
					$finalanswer2 = '<li class="answerdefault" id="li2">'.$option2.'</li>';
				}

				if($answer == $option3)
				{
					$finalanswer3 =  '<li class="answerselected" id="li3">'.$option3.'</li>';
				}
				else
				{
					$finalanswer3 = '<li class="answerdefault" id="li3">'.$option3.'</li>';
				}
				
				if($answer == $option4)
				{
					$finalanswer4 =  '<li class="answerselected" id="li4">'.$option4.'</li>';
				}
				else
				{
					$finalanswer4 = '<li class="answerdefault" id="li4">'.$option4.'</li>';
				}
				
				


			echo '<div id="steps">
					<form id="formElem" name="formElem" action="" method="post">
					<fieldset class="step">
					<legend>Edit Question <span class="closepopup"><img src="images/delete.png" width="12" height="12" alt="Close" /></span></legend>
					<p>
								  <label for="username">Question</label>
								  <input id="editquesname" name="questionname" value="'.$question.'"/>
								</p>
								<p>
								   <label for="option1">Option 1</label>
								   <input id="editoption1" name="option1" type="text" value="'.htmlentities($option1).'"/>
								</p>
								<p>
								   <label for="option2">Option 2</label>
								   <input id="editoption2" name="option2" type="text" value="'.htmlentities($option2).'"/>
								</p>
								<p>
								   <label for="option3">Option 3</label>
								   <input id="editoption3" name="option3" type="text" value="'.htmlentities($option3).'"/>
								</p>
								 <p>
								   <label for="option1">Option 4</label>
								   <input id="editoption4" name="option4" type="text" value="'.htmlentities($option4).'"/>
								</p>
								<input type="hidden" id="hiddeneditid" value="'.$id.'" />
							 </fieldset>
							</form>
						</div><!-- end steps -->                     
					 <div id="answeroptions">	
					  <h2>Selected Answer</h2>
					   <ul id="answermenu">
						'.$finalanswer1.''.$finalanswer2.''.$finalanswer3.''.$finalanswer4.'
					   </ul>
					</div>
					<input type="submit" id="editsavequestion" value="Save" class="editsavequestion"/>
					';
		}
	}
?>