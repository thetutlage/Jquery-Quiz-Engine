$(function(){
	$('.icon_delete').click(function(){
		$('#popup').fadeIn(500);		
		var id = $(this).find('#deleteid1').val();
		$('#deleteidagain').val(id);
			
	$('.yesdeleteit a').click(function(){
		var senddelete = $('#deleteidagain').val();
			
			if(window.XMLHttpRequest)
			{
				xmlhttp = new window.XMLHttpRequest();
			}
			else
			{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange = function() {
				if(xmlhttp.readyState == '4' && xmlhttp.status == '200')
				{
					response = xmlhttp.responseText;
					if(response == 'Deleted Successfully')
					{
						window.location.reload();
					}
					else
					{
						alert(response);
					}
					
				}
			}

			parameters = 'senddelete=' + senddelete + '&sendtype=quiz';

			xmlhttp.open('POST', 'scripts/delete.php', true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(parameters);
			return false;
	});
	});
	
		$('.ques_delete').live("click",function(){
			$('#popup').fadeIn(500);		
			var id = $(this).find('#hiddendelete').val();
			$('#deleteidagain').val(id);
			
				$('.yesdeleteit a').click(function(){
				var senddelete = $('#deleteidagain').val();

			if(window.XMLHttpRequest)
			{
				xmlhttp = new window.XMLHttpRequest();
			}
			else
			{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange = function() {
				if(xmlhttp.readyState == '4' && xmlhttp.status == '200')
				{
					response = xmlhttp.responseText;
					if(response == 'Deleted Successfully')
					{
						window.location.reload();
					}
					else
					{
						alert(response);
						$('#popup').fadeOut(500);
					}
				}
			}

			parameters = 'senddelete=' + senddelete + '&sendtype=question';

			xmlhttp.open('POST', 'scripts/delete.php', true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(parameters);
			return false;
		});
		});
		
		$('.nodeleteit a').click(function(){
		$('#popup').fadeOut(500);
		});
	
		// mark as complete function
		
		$('#completenow').click(function(){
			var markid = $(this).find('#markascomplete').val();
			
			if(window.XMLHttpRequest)
			{
				xmlhttp = new window.XMLHttpRequest();
			}
			else
			{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange = function() {
				if(xmlhttp.readyState == '4' && xmlhttp.status == '200')
				{
					window.location.reload();
				}
			}

			parameters = 'markid=' + markid;

			xmlhttp.open('POST', 'scripts/markcomplete.php', true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(parameters);
			return false;
		});
	
});

