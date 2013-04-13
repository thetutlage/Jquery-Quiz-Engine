$(function(){
	// for adding new ques

	// for 1st option
	$('#addoption1').keyup(function(){
		var value = $(this).val();
		var input = $('#ul1');

		input.html(value);
		$('#answeroptions').show();
		input.show();
		input.css("display","inline");
	});

	// for 2nd option	
	$('#addoption2').keyup(function(){
		var value = $(this).val();
		var input = $('#ul2');

		input.html(value);
		$('#answeroptions').show();
		input.css("display","inline");
	});

	// for 3rd option
	$('#addoption3').keyup(function(){
		var value = $(this).val();
		var input = $('#ul3');

		input.html(value);
		$('#answeroptions').show();
		input.show();
		input.css("display","inline");
	});

	// for 4th option
	$('#addoption4').keyup(function(){
		var value = $(this).val();
		var input = $('#ul4');
		
		input.html(value);
		$('#answeroptions').show();
		input.show();
		input.css("display","inline");
	});

		$('#addplusques').live("click",function(){
		var insertid = $(this).parents('.inputbox').find('#editquizid').val();
		$('#popupform1').fadeIn(500);
		
		$('#addsavequestion').click(function(){		
		var answer = $('li.answerselected').html();
		var question = $('#addquesname').val();
		var option1 = $('#addoption1').val();
		var option2 = $('#addoption2').val();
		var option3 = $('#addoption3').val();
		var option4 = $('#addoption4').val();

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

						if(response == ' Successfully Added')
						{
							alert(response + ' you can add more questions');
							$('#addquesname').val('');
							$('#addoption1').val('');
							$('#addoption2').val('');
							$('#addoption3').val('');
							$('#addoption4').val('');
							$('#answeroptions').hide();
							$('#answeroptions li').html('');
							$('#answeroptions li').css("display","none");
							$('#answeroptions li').removeClass('answerselected').addClass('answerdefault');
						}
						else
						{
							alert(response);
						}
					}
				}
				parameters = 'question=' + question + '&option1=' + option1 + '&option2=' + option2 + '&option3=' + option3 + '&option4=' + option4 + '&answer=' + answer + '&insertid=' + insertid;

				xmlhttp.open('POST', 'scripts/add-new.php', true);
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

	});
});