$(function(){
	$('#editimage').live("click",function(){
		var trackid = $(this).parents('.icon_edit').find('#hiddenid').val();
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
					$('.quizlist').html(response);
					$('.goback').show();
				}
			}

			parameters = 'trackid=' + trackid;

			xmlhttp.open('POST', 'scripts/get-ques.php', true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(parameters);		
	});
		
		$('.goback').click(function(){
			window.location.reload();
		});
	
		
		// for the ques editing popup box
		
		
		$('#indques').live("click",function(){
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
					$('#popupform').html(response);
					$('#popupform').fadeIn();
					$('#answeroptions').show();
					$('#answeroptions li').css("display","inline");
				}
			}
				var quesid = $(this).parents('.ques_edit').find('#quesid').val();
			
			parameters = 'id=' + quesid;

			xmlhttp.open('POST', 'scripts/individual-ques.php', true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(parameters);
		});
		
		// for closing the popupbox
		
		$('.closepopup').click(function(){
			$('#popupform').fadeOut();
			$('#popupform1').fadeOut();
		});
		// editing features
		
			// creating dynamic options from input values

	// for 1st option
	$('#editoption1').keyup(function(){
		var value = $(this).val();
		var input = $('#li1');

		input.html(value);
		$('#answeroptions').show();
		input.show();
		input.css("display","inline");
	});

	// for 2nd option	
	$('#editoption2').keyup(function(){
		var value = $(this).val();
		var input = $('#li2');

		input.html(value);
		$('#answeroptions').show();
		input.css("display","inline");
	});

	// for 3rd option
	$('#editoption3').keyup(function(){
		var value = $(this).val();
		var input = $('#li3');

		input.html(value);
		$('#answeroptions').show();
		input.show();
		input.css("display","inline");
	});

	// for 4th option
	$('#editoption4').keyup(function(){
		var value = $(this).val();
		var input = $('#li4');

		input.html(value);
		$('#answeroptions').show();
		input.show();
		input.css("display","inline");
	});



	$('#answermenu li').click(function(){
		$('#answermenu li').removeClass('answerselected').addClass('answerdefault');
		$(this).removeClass('answerdefault').addClass('answerselected');		
	});


	// submit function 


	$('#editsavequestion').click(function(){		
		var answer = $('li.answerselected').html();
		var question = $('#editquesname').val();
		var option1 = $('#editoption1').val();
		var option2 = $('#editoption2').val();
		var option3 = $('#editoption3').val();
		var option4 = $('#editoption4').val();

		if(option1.length == '' || option2.length == '' || option3.length == '' || option4.length == '' || question.length == '')
		{
			alert('All fields are required');
		}
		else
		{
			if($('#answermenu li').hasClass('answerselected'))
			{
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
						response1 = xmlhttp.responseText;
						if(response1 == ' Successfully Edited')
						{
							alert(response1);
							window.location.reload();
						}
						else
						{
							alert(response1);
						}
					}
				}
				var quizinfo1 = $('#hiddeneditid').val();

				parameters = 'question=' + question + '&option1=' + option1 + '&option2=' + option2 + '&option3=' + option3 + '&option4=' + option4 + '&answer=' + answer + '&quizinfo=' + quizinfo1;

				xmlhttp.open('POST', 'scripts/edit-question.php', true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(parameters);
				return true;
			  }
			  else
			  {
				alert('Select an answer to continue');
			  }
		}
	});
	
	
	// updating quiz name only
	
	$('.edit_question').live("click",function(){
		$('.realques').hide();
		$('#onlyquizques').show();	
	});
	
	
	$('#onlyquizques').keypress(function(e){
		if(e.which == 13)
		{
			if(window.XMLHttpRequest)
			{
				request = new window.XMLHttpRequest();
			}
			else
			{
				request = new ActiveXObject('Microsoft.XMLHTTP');
			}
				request.onreadystatechange = function() {
				if(request.readyState == '4' && request.status == '200')
				{
					response = request.responseText;
						$('.realques').show();
						$('#onlyquizques').hide();
						$('.realques').html(response);
				}
			}
				var quizeditname = $(this).val();
				var editquizid = $(this).parents('.inputbox').find('#editquizid').val();
				parameters = 'quizeditname=' + quizeditname + '&editquizid=' + editquizid;
				
				request.open('POST', 'scripts/edit-quiz.php', true);
				request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				request.send(parameters);
		}
	});
});