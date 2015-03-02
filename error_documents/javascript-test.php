<?PHP

/* Set the referral address that the visitor came from into a PHP variable to later use in a JavaScript variable [BEGIN] */

session_start();

$http_Ref_Address = $_SESSION["origURL"];

/* Set the referral address that the visitor came from into a PHP variable to later use in a JavaScript variable [END] */

require_once(dirname(__FILE__)."/royalty.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8" >

<script type="text/javascript">document.write("<title>JavaScript Enabled</title>");</script>
<noscript><title>JavaScript Disabled</title></noscript>

<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">

<link rel="SHORTCUT ICON" href="/favicon.ico" type="image/x-icon">

<style type="text/css">
body, html	{ 
				background-color: #FFFFFF;
				color:#676767;
				text-align: center;
				font-family: Arial, Helvetica, Sans-Serif;
				text-shadow:1px 1px #FFFFFF;
				background-image:url('/error_documents/images/backgrounds/wallpapers/grey-gradient-background-up.png');
				background-repeat: repeat !important;
				font-size:16px;
 			}
div.dialog	{
		
				width: 25em;
				padding-top: 0em;
				padding-right: 4em;
				padding-bottom: 1.2em;
				padding-left: 4em;
				margin: 4em auto 0 auto;
				border: 1px solid #CCCCCC;
				border-right-color: #999999;
				border-bottom-color: #999999;
				background-image:url('/error_documents/images/backgrounds/grey-gradient-special-message-background.png');
				background-repeat:repeat;
		
			}
							
		h1	{ 	
  
				font-size: 16px; 
				color: #FF3737; 
				line-height: 1.5em;
				text-shadow:1px 1px #FFFFFF;
				
			}
		  		 
	button	{
				padding-top: 5px;
				padding-right: 10px;
				padding-bottom: 5px;
				padding-left: 10px;
			)
</style>

<script type="text/javascript">

function goBack()
	{
	  
	  if ( (window.history.length == 0) || (window.history.length == 1) || (history.length == 0) || (history.length == 1) )
		
			{	
				if (!(window.close()))
					{ 
						
						if (!(document.close()))
							{
								close();	
							};
					};	
			}
	else 	{  
				if (!(window.history.back()))
					{

						if (!(history.back()))

							{

								if (!(history.go(-1)))

									{
										back();
									};
							};

					};

				
			};
  
	};
  
</script>

<script type="text/javascript">

var referringPage = "<?php echo $http_Ref_Address; ?>";

function returnToPreviousPage()
	{
	
	 if ( ( referringPage != "") && ( referringPage !=  window.location.href) ) 
	 
		{
			alert("Returing you to where you left off.");
			window.location.replace(referringPage);
		}
	 
	else
		{
			goBack();
		}
			
	};

</script>

</head>
<body>
	<div class="dialog">
	
		<!--[if lte IE 7]>
		<br>
		<![endif]-->
		
		<h1 id="heading">JavaScript is Disabled in Your Web Browser.</h1>
		
		<p id="message" style="line-height:150%">
		For full functionality of this website, it is necessary to <br><a href="http://www.enable-javascript.com/" target="_blank">Enable JavaScript in your Web Browser</a>.
		</p>
		<div id="google_translate_element">
		</div>
			<script type="text/javascript">
			function googleTranslateElementInit() 
				{
					new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
				}
			</script>
			<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<script type="text/javascript">document.write("<br>");</script>
		<span id="action_buttons"><a href="#" style="text-decoration:none;border-width:0px;border-style:none;border-color:transparent;" target="_self" onclick="JavaScript:window.location.replace(window.location.href);"><button>Re-Test</button></a></span>
  	</div>

<script type="text/javascript">document.getElementById("heading").innerHTML = "<span style='color:#39BF45 !important;'>JavaScript is Enabled in Your Web Browser.</span>";</script>
<script type="text/javascript">document.getElementById("message").innerHTML = "Congratulations! JavaScript is enabled, and working properly in your web browser.";</script>
<script type="text/javascript">document.getElementById("action_buttons").innerHTML = "<button onclick='JavaScript:returnToPreviousPage();'>Close this Window ( <span id=\"counter\"></span> )</button>";</script>

<script type="text/JavaScript">

/* Redirect Timer script [BEGIN]  */

/* Set initial variables [BEGIN]  */
document.getElementById('counter').innerHTML='30';
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
				returnToPreviousPage();
				
				return;
			}

		//Display the number of seconds here.
		document.getElementById('counter').innerHTML=count; 
	};
/* The 'timer' function code [END]  */
	
/* Start Redirect Timer [BEGIN]  */
var counter=setInterval(timer, 1000); //1000 will  run it every 1 second
/* Start Redirect Timer [END]  */

/* Redirect Timer script [END]  */

</script>

</body>
</html>