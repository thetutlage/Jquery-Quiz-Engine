$(function(){
	
	// general functionality to make checks and run functions
	var quizinfo = $('#quizwork');
	if(quizinfo.val().length == '')
	{
		$('.box').hide();
		$('#wrapper').hide();
		$('.start').show();
	}
	else
	{
		$('.start').hide();
		$( "#wrapper" ).fadeIn(1000);
	}

	// for submitting questions
	var quizname = $('#quizname');
	var errors = $('.questionerror');
	
	$('#next').click(function(){
		if(quizname.val().length == '')
		{
			errors.html('Choose a name for your quiz');
			return false;
		}	
		else
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
					response = xmlhttp.responseText;
					
					if(response == 'QuizName is required')
					{
						alert('There was an error, To report bugs visit www.thetutlage.com');
					}
					else
					{
						$('#quizwork').val(response);
						$('.start').fadeOut(700);
						$( "#wrapper" ).fadeIn(1000);
						$('#next').hide();
						errors.html('');
						$('#finish').show(500);
						$('#submit').show(500);
					}
				}
			}

			quizname1 = quizname.val();

			parameters = 'quizname=' + quizname1;

			xmlhttp.open('POST', 'scripts/submit-quiz.php', true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(parameters);
		}
	});
	
	// creating dynamic options from input values
	
	// for 1st option
	$('#option1').keyup(function(){
		var value = $(this).val();
		var input = $('#li1');
		
		input.html(value);
		$('#answeroptions').show();
		input.show();
		input.css("display","inline");
	});
	
	// for 2nd option	
	$('#option2').keyup(function(){
		var value = $(this).val();
		var input = $('#li2');

		input.html(value);
		$('#answeroptions').show();
		input.show();
		input.css("display","inline");
	});
	
	// for 3rd option
	$('#option3').keyup(function(){
		var value = $(this).val();
		var input = $('#li3');

		input.html(value);
		$('#answeroptions').show();
		input.show();
		input.css("display","inline");
	});
	
	// for 4th option
	$('#option4').keyup(function(){
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
		
	
	$('#submit').click(function(){		
		var answer = $('li.answerselected').html();
		var question = $('#questionname').val();
		var option1 = $('#option1').val();
		var option2 = $('#option2').val();
		var option3 = $('#option3').val();
		var option4 = $('#option4').val();

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
						response = xmlhttp.responseText;
	
						if(response != 'Unable to process request')
						{
							$('#questionname').val('');
							$('#option1').val('');
							$('#option2').val('');
							$('#option3').val('');
							$('#option4').val('');
							$('#answeroptions').hide();
							$('#answeroptions li').html('');
							$('#answeroptions li').css("display","none");
							$('#answeroptions li').removeClass('answerselected').addClass('answerdefault');
							$('#currentview').html(response);
							$('#currentview').show();
						}
						else
						{
							alert('There was an error, To report bugs visit www.thetutlage.com');
						}
					}
				}
						var quizinfo1 = quizinfo.val();
				parameters = 'question=' + question + '&option1=' + option1 + '&option2=' + option2 + '&option3=' + option3 + '&option4=' + option4 + '&answer=' + answer + '&quizinfo=' + quizinfo1;
				
				xmlhttp.open('POST', 'scripts/submit-question.php', true);
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
	
	
	// finsihing the quiz 
	$('#finish').click(function(){
		var answer = $('li.answerselected').html();
		var question = $('#questionname').val();
		var option1 = $('#option1').val();
		var option2 = $('#option2').val();
		var option3 = $('#option3').val();
		var option4 = $('#option4').val();
		
		if(option1.length != '' || option2.length != '' || option3.length != '' || option4.length != '' || question.length != '')
		{
			alert('Please submit this question first or clear all fields');
		}
		else
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
					response = xmlhttp.responseText;

					if(response == 'Submitted Successfully')
					{
						quizinfo.val('');
						window.location.reload();
						$('#quizname').val('');
					}
					
					else
					{
						alert(response);
						window.location.reload();
					}
				}
			}
				quizinfo1 = quizinfo.val();
				
			parameters = 'quizinfo=' + quizinfo1;
			xmlhttp.open('POST', 'scripts/final-status.php', true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(parameters);
			return true;
		}
	});
	
	
	
});