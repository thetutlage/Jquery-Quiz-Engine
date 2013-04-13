$(function(){
	
	// selecting quiz to start
	
	$('#ui_element li').live("click",function(){
		$('#ui_element li a').addClass('quiz_default_to_start').removeClass('quiz_selected_to_start');
		$(this).find('a').removeClass('quiz_default_to_start').addClass('quiz_selected_to_start');
		return false;
	});
	
	
	$('#startquiz').click(function(){
		if($('#ui_element li a').hasClass('quiz_selected_to_start'))
		{
		var searchName = $('a.quiz_selected_to_start').parents('li').find('#quiztorun').val();
		
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
					$('#allquestions').html(response);
					$('#allquestions').children(':first-child').fadeIn(1000).addClass( "hidden_page_part" ).removeClass( "box" );
					$('.start').fadeOut(700).addClass("box");
					$('.meter').fadeIn();
					$('#submit').show();
					$('.initialcount').show();
				}
			}
			parameters = 'searchName=' + searchName;
			xmlhttp.open('POST', 'scripts/get-question.php', true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(parameters);
			}
		else
		{
			alert('Select a quiz to continue');
		}
	});
});