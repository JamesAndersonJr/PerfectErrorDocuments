<?php

session_start();

/* Include required configuration file [BEGIN] */ 

require_once(dirname(__FILE__)."/config/config.php");

/* Include required configuration file [END] */ 

/* Set the referral address that the visitor came from into a PHP variable to later use in a JavaScript variable [BEGIN] */

if (isset($_SESSION["origURL"]))
	{
		$http_Ref_Address = $_SESSION["origURL"];
	}
elseif (isset($_SERVER['HTTP_REFERER']))
	{
		$http_Ref_Address = $_SERVER['HTTP_REFERER'];
	}
else
	{
		$http_Ref_Address = "/";
	};

/* Set the referral address that the visitor came from into a PHP variable to later use in a JavaScript variable [END] */

/* Preliminary Meta-Data [BEGIN] */

$meta_Tag_Site_Name = "JavaScript Disabled";

$meta_Tag_Description = "A simple test to verify if JavaScript is enabled in your web browser.";

$meta_Tag_Key_Words = "JavaScript, script, test, verify, check, web browser";

/* Preliminary Meta-Data [END] */

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<?php require_once(dirname(__FILE__)."/includes/royalty.php"); ?>

<title><?php echo $meta_Tag_Site_Name; ?></title>

<script type="text/javascript">document.title = "JavaScript Enabled";</script>

<meta name="description" content="<?php echo $meta_Tag_Description; ?>">
<meta name="keywords" content="<?php echo $meta_Tag_Key_Words; ?>">
<meta name="robots" content="noindex,nofollow">

<meta name="viewport" content="width=device-width, initial-scale=0.8">

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

<style type="text/css" media="all">

@-ms-viewport
	{
		width:device-width;
	}

html
	{
		margin:0px;
		padding:0px;
		height:100% !important;
		min-height:100%;
		
		-moz-box-sizing:border-box;
		-webkit-box-sizing:border-box;
		box-sizing:border-box;
	}

body
	{
		margin:0px;
		padding:0px;
		height:100% !important;
		min-height:100%;
		
		-moz-box-sizing:border-box;
		-webkit-box-sizing:border-box;
		box-sizing:border-box;
		
		background-color:#FFFFFF;
		color:#676767;
		text-align:center;
		font-family:Arial, Helvetica, Sans-Serif;
		text-shadow:1px 1px #FFFFFF;
		background-image:url('/error_documents/images/backgrounds/wallpapers/gray-gradient-background-up.png');
		background-repeat:repeat !important;
		font-size:1.000em;	
	}

.main_container_div
	{
		width:100%;
		height:100%;

		-moz-box-sizing:border-box;
		-webkit-box-sizing:border-box;
		box-sizing:border-box;

		margin:0px !important;
		text-align:center;

		padding-top:0px;
		padding-right:0px;
		padding-bottom:0px;
		padding-left:0px;

		border-width:0px;
		border-style:none;
		border-color:transparent;	
	}

.sub_container_div
	{
		width:100%;
		max-width:37em;
		
		-moz-box-sizing:border-box;
		-webkit-box-sizing:border-box;
		box-sizing:border-box;
	
		vertical-align:middle;
		text-align:center;
		display:table;
		margin:0px auto;
		
		padding-top:2.1em;
		padding-right:2em;
		padding-bottom:0px;
		padding-left:2em;

		border-width:0px;
		border-style:none;
		border-color:transparent;
	}

div.dialog
	{
		width:inherit !important;
		
		-moz-box-sizing:border-box;
		-webkit-box-sizing:border-box;
		box-sizing:border-box;
		
		padding-top:0.8em;
		padding-right:4em;
		padding-bottom:1.7em;
		padding-left:4em;

		margin-top:2.2em;
		margin-right:auto;
		margin-bottom:0px;
		margin-left:auto;

		border:1px solid #CCCCCC;
		border-collapse:collapse;
		border-right-color:#999999;
		border-bottom-color:#999999;
		
		background-image:url('/error_documents/images/backgrounds/gray-gradient-special-message-background.png');
		background-repeat:repeat;
	}
h1
	{
		font-size:1.000em;
		color:#FF3737;
		line-height:1.5em;
		text-shadow:1px 1px #FFFFFF;
	}

a:link
	{
		color:#008AED;
	}

a:visited
	{
		color:#8066FF;
	}
	
button, input[type="button"], input[type="submit"], input[type="reset"] 
	{
		color:#535353 !important;
		font-size:0.928em !important;
		line-height:normal !important;
		font-weight:normal !important;

		-moz-box-shadow:0px 1px 2px rgba(159,159,159,0.5);
		-webkit-box-shadow:0px 1px 2px rgba(159,159,159,0.5);
		-khtml-box-shadow:0px 1px 2px rgba(159,159,159,0.5);
		box-shadow:0px 1px 2px rgba(159,159,159,0.5);
		
		-moz-box-sizing:border-box;
		-webkit-box-sizing:border-box;
		box-sizing:border-box;

		padding-top:8px !important;
		padding-right:14px !important;
		padding-bottom:9px !important;
		padding-left:14px !important;

		-webkit-border-radius:2px;
		-moz-border-radius:2px;
		-khtml-border-radius:2px;
		border-radius:2px;

		border:1px solid #BCBCBC;
		background:#f0f0f0;
		background:-moz-linear-gradient(top, #f0f0f0 0%, #E0E0E0 100%);
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#f0f0f0), color-stop(100%,#E0E0E0));
		background:-webkit-linear-gradient(top, #f0f0f0 0%,#E0E0E0 100%);
		background:-o-linear-gradient(top, #f0f0f0 0%,#E0E0E0 100%);
		background:-ms-linear-gradient(top, #f0f0f0 0%,#E0E0E0 100%);
		background:linear-gradient(to bottom, #f0f0f0 0%,#E0E0E0 100%);
		filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#f0f0f0', endColorstr='#E0E0E0',GradientType=0 );
	}

button:hover, input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover, button:focus, input[type="button"]:focus, input[type="submit"]:focus, input[type="reset"]:focus 
	{
		background:#f8f8f8;
		background:-moz-linear-gradient(top, #f8f8f8 0%, #E1E1E1 100%);
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#f8f8f8), color-stop(100%,#E1E1E1));
		background:-webkit-linear-gradient(top, #f8f8f8 0%,#E1E1E1 100%);
		background:-o-linear-gradient(top, #f8f8f8 0%,#E1E1E1 100%);
		background:-ms-linear-gradient(top, #f8f8f8 0%,#E1E1E1 100%);
		background:linear-gradient(to bottom, #f8f8f8 0%,#E1E1E1 100%);
		filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#f8f8f8', endColorstr='#E1E1E1',GradientType=0 );
	}

button:active, input[type="button"]:active, input[type="submit"]:active, input[type="reset"]:active 
	{
		background:#E0E0E0;
		-moz-box-shadow:inset 0px 1px 2px rgba(205,205,205,1);
		-webkit-box-shadow:inset 0px 1px 2px rgba(205,205,205,1);
		-khtml-box-shadow:inset 0px 1px 2px rgba(205,205,205,1);
		box-shadow:inset 0px 1px 2px rgba(205,205,205,1);
		text-decoration:none !important;
	}

</style>

<script type="text/javascript" src="/error_documents/js/viewport_fix.js"></script>

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
	else
		{
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
	if ( ( referringPage != "" ) && ( referringPage != window.location.href ) )
		{
			alert("Returing you to where you left off.");
			window.location.replace(referringPage);
		}
	else
		{
			goBack();
		};
};

</script>

</head>
<body>

<div class="main_container_div">
	<div class="sub_container_div">

		<div class="dialog">

		<!--[if lte IE 7]>
		<br>
		<![endif]-->

		<h1 id="heading">JavaScript is Disabled in Your Web Browser.</h1>

		<p id="message" style="line-height:150%">
		For full functionality of this website, it is necessary to <br><a href="http://www.enable-javascript.com" target="_blank">Enable JavaScript in your Web Browser</a>.
		</p>
		
		<div id="google_translate_element"></div>
		
		<script type="text/javascript">
		
		function googleTranslateElementInit() 
			{
				new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			};
		
		</script>
		
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<script type="text/javascript">document.write("<br>");</script>
		
		<span id="action_buttons"><button onclick="JavaScript:window.location.replace(window.location.href);">Re-Test</button></span>
		
		</div>
		
	</div>
</div>

<script type="text/javascript">

document.getElementById("heading").innerHTML = "<span style='color:#39BF45 !important;'>JavaScript is Enabled in Your Web Browser.</span>";
document.getElementById("message").innerHTML = "Congratulations! JavaScript is enabled, and working properly in your web browser.";
document.getElementById("action_buttons").innerHTML = "<button onclick='JavaScript:returnToPreviousPage();'>Close this Window ( <span id=\"counter\"></span> )</button>";

</script>

<script type="text/JavaScript">

/* Redirect Timer script [BEGIN] */

/* Set initial variables [BEGIN] */

document.getElementById('counter').innerHTML = '30';

var count = 30;

/* Set initial variables [END] */

/* The 'timer' function code [BEGIN] */

function timer()
	{
		count = count - 1;
		if (count < 0)
			{
				/* Counter has ended. Clear interval and redirect page.	*/	
				clearInterval(counter);
				returnToPreviousPage();
				
				return;
			};

		/* Display the number of seconds here. */
		document.getElementById('counter').innerHTML = count; 
	};
	
/* The 'timer' function code [END] */
	
/* Start Redirect Timer [BEGIN] */

var counter=setInterval(timer, 1000); /* 1000 will run it every 1 second. */

/* Start Redirect Timer [END] */

/* Redirect Timer script [END] */

</script>

</body>
</html>