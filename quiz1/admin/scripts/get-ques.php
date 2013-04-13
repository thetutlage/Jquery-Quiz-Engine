<script type="text/javascript" src="js/get-quiz.js"></script>
<?php
	include('connection.php');
	
	if($_POST)
	{
		$getid = $_POST['trackid'];
		$sql = mysql_query("SELECT * FROM questions WHERE connection_meta = '$getid'") or die(mysql_error());
		
		$get_ques = mysql_query("SELECT * FROM quizes WHERE id = '$getid'") or die(mysql_error());
		$ques_row = mysql_fetch_array($get_ques);
		
		extract($ques_row);
		
		echo '<table class="table-normal no-margin"><thead><tr>
				<th scope="col"><b style="float: left;">Quiz Name:- </b><span class="realques"> '.$quiz_name.'</span>
				
				<span class="inputbox"><input type="text" id="onlyquizques" value="'.$quiz_name.'" />
					<input type="hidden" id="editquizid" value="'.$id.'" />
					<img src="images/add.png" width="12" height="12" alt="Add Ques" id="addplusques" title="Add Questions"/>
				</span>
				
				<span class="edit_question"><img src="images/pencil.png" width="12" height="12" alt="Edit" /></span></th>
			  </tr></thead><tbody>';
		
		while($row = mysql_fetch_array($sql))
		{
			extract($row);
			echo '<tr>
				<td><b>Ques:- </b>'.$question.'</td>
				<td><b>Ans:- </b>'.$answer.'</td>
				<td><span class="ques_edit"><input type="hidden" id="quesid" value="'.$id.'" /><img src="images/doc_edit.png" width="12" height="12" id="indques"/></span>
				<span class="ques_delete"><input type="hidden" id="hiddendelete" value="'.$id.'" /><img src="images/delete.png" width="12" height="12" id="quesdelete"/></span></td>
			</tr>';
		}
		echo '</tbody>
			</table>';
	}
?>