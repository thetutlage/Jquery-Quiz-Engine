<?php include( 'scripts/session.php' ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>UI Elements: jQuery Popout Menu</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="description" content="UI Elements: jQuery Popout Menu" />
		<meta name="keywords" content="jquery, menu, navigation, popout, slide up, slide down "/>
		<!-- The JavaScript -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/get-quiz.js"></script>
		<script type="text/javascript" src="js/add-new.js"></script>
		<script type="text/javascript" src="js/delete.js"></script>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
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

			   <?php include( 'includes/header-nav.php' ); ?>

		  <div class="col-full">
		  	<div id="popup"><p>Are you sure ? <span class="yesdeleteit"><input type="hidden" id="deleteidagain" value="" /><a href="#">Yes delete it</a>| </span>
			<span class="nodeleteit"><a href="#">No dude</a></span></p></div>
		  
			<span class="goback">Go Back</span>
			<div class="quizlist">
				<?php include_once 'scripts/get-quiz.php'; ?>
			</div><!-- end QUIZLIST  -->

				<div id="popupform">
				</div><!-- end popupform -->

				<div id="popupform1">
				<div id="steps">
					<form id="formElem" name="formElem" action="" method="post">
					<fieldset class="step">
					<legend>Add Questions <span class="closepopup"><img src="images/delete.png" width="12" height="12" alt="Close" /></span></legend>
					<p>
								  <label for="username">Question</label>
								  <input id="addquesname" name="questionname"/>
								</p>
								<p>
								   <label for="option1">Option 1</label>
								   <input id="addoption1" name="option1" type="text"/>
								</p>
								<p>
								   <label for="option2">Option 2</label>
								   <input id="addoption2" name="option2" type="text"/>
								</p>
								<p>
								   <label for="option3">Option 3</label>
								   <input id="addoption3" name="option3" type="text"/>
								</p>
								 <p>
								   <label for="option1">Option 4</label>
								   <input id="addoption4" name="option4" type="text"/>
								</p>
							 </fieldset>
							</form>
						</div><!-- end steps -->                     
					 <div id="answeroptions">	
					  <h2>Selected Answer</h2>
					   <ul id="answermenu">
					   <li class="answerdefault" id="ul1"></li>
					   <li class="answerdefault" id="ul2"></li>
					   <li class="answerdefault" id="ul3"></li>
					   <li class="answerdefault" id="ul4"></li>
					   </ul>
					</div>
					<input type="submit" id="addsavequestion" value="Save" class="editsavequestion"/>

				</div><!-- end popupform -->

			  <div id="submiterrors"></div>  

			<div id="navigation">
			   <span id="submit">Submit</span>
				<span id="finish">Finish</span>
			</div><!-- end navigation -->  
		  </div>  <!-- end col-full -->


		   <div id="currentview"><!-- for loading latest question --></div>

		</div><!-- end ocntent -->

	</body>
</html>