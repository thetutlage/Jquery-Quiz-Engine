<?php

	include( 'conn.php' );
	
	$sql = mysql_query("SELECT * FROM quizes ORDER BY id DESC") or die(mysql_error());
	$num_rows = mysql_num_rows($sql);
	
	if($num_rows >= 1)
	{
	echo '<table class="table-normal no-margin" summary="Employee Pay Sheet">
				<thead>
					<tr>
						<th scope="col">Quiz Name</th>
						<th scope="col">Quiz Status</th>
						<th scope="col">Created On</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>';
	while($row = mysql_fetch_array($sql))
	{
		extract($row);
		
		if($final_status == 'false')
		{
			$status = 'Incomplete';
			$trigger = '<td><a href="#" id="completenow"><input type="hidden" id="markascomplete" value="'.$id.'" />Mark as Complete</a></td>';
		}
		else
		{
			$status = $status;
			$trigger = '';
		}
		
		
		echo '<tr>
				<td>'.$quiz_name.'</td>
				<td>'.$status.'</td>
				<td>'.$created_on.'</td>
				<td><span class="icon_edit"><input type="hidden" id="hiddenid" value="'.$id.'" /><img src="images/doc_edit.png" width="12" height="12" id="editimage"/></span>
				<span class="icon_delete"><input type="hidden" id="deleteid1" value="'.$id.'" /><img src="images/delete.png" width="12" height="12" /></span></td>
				'.$trigger.'
		</tr>';
	}
		echo '</tbody></table>';
	}
	else
	{
		echo '<div id="noquizsofar">There are no quiz so far</div>';
	}
?>