<?php if(file_exists('config.php')){ include_once( 'config.php' );}else{header("location: install.php");} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>UI Elements: jQuery Popout Menu</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="UI Elements: jQuery Popout Menu" />
        <meta name="keywords" content="jquery, menu, navigation, popout, slide up, slide down "/>
        <!-- The JavaScript -->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/select-quiz.js"></script>       
        <script type="text/javascript">
            $(function() {	
				//graceful degradation
				$('#ui_element').find('li').hide();
				
				$('#ui_element').find('.m_itemMain').toggle(
					function(){
						var $this 	= $(this);
						$this.addClass('m_down').removeClass('m_up');
						var $menu	= $this.prev();
						var t = 50;
						$($menu.find('li').get().reverse()).each(function(){
							var $li = $(this);
							var showmenu = function(){$li.show();};
							setTimeout(showmenu,t+=50);
						});
					},
					function(){
						var $this 	= $(this);
						$this.addClass('m_up').removeClass('m_down');
						var $menu	= $this.prev();
						var t = 50;
						$($menu.find('li').get().reverse()).each(function(){
							var $li = $(this);
							var hidemenu = function(){$li.hide();};
							setTimeout(hidemenu,t+=50);
						});
					}
				);
            });
        </script>
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
<?php session_start(); if(isset($_SESSION['username'])) { ?>
<div id="ifloggedin">
    <a href="admin/index.php">Admin Area</a>
</div><!-- end iflogged in -->
<?php } ?>
        <div class="content">
            <h1>Quiz Engine</h1>
          
          <div class="col-full">
            <div id="fake"> </div>
             <span class="initialcount"></span>
            <div class="start">
                <h2>jQuery Quiz </h2>
                <div id="ui_element" class="m_wrapper">
                    <ul>
                    <?php include_once 'scripts/get-quiz.php' ;?>
                    </ul>
                       <div class="m_itemMain m_up">Select Quiz</div><!-- class m -->
                       </div><!-- id ui-element -->  
                       
                       <div class="quizstartdiv">
                           <input type="submit" name="startquiz" value="Start Quiz" id="startquiz"/>
                       </div>

              
            </div><!-- end end -->
            
            <div id="allquestions">
             </div><!-- end allquestions -->
        

            <div class="finished" id="finished">
                <h2 id="score"></h2>
                    <div class="quizenddiv">
                        <a href="http://www.facebook.com/sharer.php?u=<?php echo FACEBOOK_LINK; ?>&t=<?php echo FACEBOOK_QUERY; ?>">
                        <img src="images/Untitled.png" /></a>
                     </div>
                     
                     <div id="quizend">
                         <input id="endquiz" type="submit" value="Try Again" name="endquiz">
                     </div>
                     <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
            </div><!-- end finished -->
            
            
             <div class="meter"><span> </span></div>             
             <div id="submiterrors"></div>
             
            <div id="navigation">
               <span id="submit">Submit</span>
               <span id="next">Next &#8250;</span>
                <span id="finish">Finish</span>
            <div><!-- end navigation -->  



            
            
          </div>  <!-- end col-full -->
        </div><!-- end ocntent -->


        
    </body>
</html>