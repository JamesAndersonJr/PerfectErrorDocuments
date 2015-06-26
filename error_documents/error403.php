<?php

/* Include required configuration file [BEGIN] */ 

require_once(dirname(__FILE__)."/config/config.php");

/* Include required configuration file [END] */ 

/* Include required domain-related information and variables [BEGIN] */ 

require_once(dirname(__FILE__)."/includes/domain_info.php");

/* Include required domain-related information and variables [END] */ 

$_SESSION["origURL"] = $current_Website_Domain_Name;

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<?php require_once(dirname(__FILE__)."/includes/royalty.php"); ?>

<title>Error - [403]&nbsp;&nbsp;Access Denied</title>

<link rel="shortcut icon" href="/error_documents/favicon.ico" type="image/x-icon"> 
<link rel="stylesheet" href="/error_documents/css/error_pages.css"  type="text/css" media="all">

<meta name="robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1">

<noscript><meta http-equiv="refresh" content="0; url=/error_documents/javascript-test.php"></noscript>	  

</head>
<body>

<form name="countdown" id="countdown" action="#">
	<div class="dialog">
	
		<!--[if lte IE 7]>
		<br>
		<![endif]-->
	
		<h1>Access Denied</h1>
		<p>You do not have the proper authorization to access this resource. If you came to this page via a link, please inform the owner(s) of that page.</p>
		<div id="google_translate_element">
		</div>
			<script type="text/javascript">
			function googleTranslateElementInit() 
				{
					new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
				}
			</script>
			<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	</div>
	<p>&nbsp;&nbsp;&nbsp; If you do nothing, you will be redirected<br>
	to the homepage in (<input type="text" name="sec" id="sec" value="30" class="sec_counter" maxlength="2" onfocus="blur();" readonly="readonly">) seconds.
	</p>
</form>	
	
<script type="text/JavaScript">

/* Redirect Timer script [BEGIN]  */

/* Set initial variables [BEGIN]  */
document.getElementById('sec').value='30';
var count=30;
/* Set initial variables [END]  */

/* The 'timer' function code [BEGIN]  */
function timer()
	{
		count=count-1;
		if (count < 0)
			{
				//Counter has ended; Clear interval and redirect page.		
				clearInterval(counter);
				location.href = '/';
				
				return;
			}

		//Display the number of seconds here.
		document.getElementById('sec').value=count; 
	};
/* The 'timer' function code [END]  */
	
/* Start Redirect Timer [BEGIN]  */
var counter=setInterval(timer, 1000); //1000 will  run it every 1 second
/* Start Redirect Timer [END]  */

/* Redirect Timer script [END]  */

</script>
		
</body>
</html>