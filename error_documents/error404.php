<?php

require_once(dirname(__FILE__)."/config/config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<title>Error - [404]&nbsp;&nbsp;The page you were looking for doesn&#39;t exist</title>

<link rel="SHORTCUT ICON" href="/error_documents/favicon.ico" type="image/x-icon">  
<link rel="stylesheet" href="/error_documents/css/error_pages.css"  type="text/css">  

</head>

<body>

<form name="countdown" id="countdown" action="#">
	<div class="dialog">
		<h1>The page you were looking for doesn&#39;t exist.</h1>
		<p>You may have mistyped the address, or the page may have moved.</p>
		<div id="google_translate_element">
		</div>
			<script type="text/javascript">
			function googleTranslateElementInit() 
				{
					new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
				}
			</script>
			<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<br>
	</div>
		<p>&nbsp;&nbsp;&nbsp; If you do nothing, you will be redirected<br>
		to the homepage in (<input type="text" name="sec" id="sec" class="sec_counter" maxlength="2" onfocus="blur();" readonly="readonly">) seconds.
		</p>
</form>	
	
<script type="text/JavaScript">
//<!-- Redirect Timer script [Begin] -->

//<!-- Set initial variables [Begin]
document.getElementById('sec').value='30';
var count=30;
// Set initial variables [End] -->

//<!-- Start Redirect Timer [Begin]

var counter=setInterval(timer, 1000); //1000 will  run it every 1 second
// Start Redirect Timer [End] -->

function timer()
	{
		count=count-1;
		if (count < 0)
			{
				//counter ended, clear interval and redirect page		
				clearInterval(counter);
				location.href = '/';
				
				return;
			}

		//Dsiplay the number of seconds here
		document.getElementById('sec').value=count; 
	}
//<!-- Redirect Timer script [End] -->
</script>	
	
</body>
</html>