<?php

session_start();

/* Include required configuration file [BEGIN] */ 

require_once(dirname(__FILE__)."/config/config.php");

/* Include required configuration file [END] */ 

/* Include required domain-related information and variables [BEGIN] */ 

require_once(dirname(__FILE__)."/includes/domain_info.php");

/* Include required domain-related information and variables [END] */ 

$_SESSION["origDomain"] = $current_Website_Domain_Name;

$_SESSION["origPath"] = $current_path;

$_SESSION["origURL"] = $current_Webpage_Complete_URL_Address;

/* Preliminary Meta-Data [BEGIN] */

$meta_Tag_Site_Name = "Error - [500] Internal Server Error";

$meta_Tag_Description = "An Internal Server Error has occurred.";

$meta_Tag_Key_Words = "error, error 500, internal, server, fault, issue";

/* Preliminary Meta-Data [END] */

?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="https://schema.org/Action">

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<?php require_once(dirname(__FILE__)."/includes/royalty.php"); ?>

<title><?php echo $meta_Tag_Site_Name; ?></title>

<link rel="shortcut icon" type="image/x-icon" href="/error_documents/favicon.ico">

<meta name="description" content="<?php echo $meta_Tag_Description; ?>">
<meta name="keywords" content="<?php echo $meta_Tag_Key_Words; ?>">
<meta name="robots" content="noindex,nofollow">

<meta name="viewport" content="width=device-width, initial-scale=0.8">

<!-- Google Plus Metadata (i.e. "Structured Data") Tags [BEGIN] -->

<meta itemprop="name" content="<?php echo $meta_Tag_Site_Name; ?>">
<meta itemprop="description" content="<?php echo $meta_Tag_Description; ?>">

<!-- Google Plus Metadata (i.e. "Structured Data") Tags [END] -->

<!-- Facebook / Open Graph Tags [BEGIN] -->

<meta property="og:title" content="<?php echo $meta_Tag_Site_Name; ?>" >
<meta property="og:description" content="<?php echo $meta_Tag_Description; ?>" >

<!-- Facebook / Open Graph Tags [END] -->

<link rel="stylesheet" type="text/css" href="/error_documents/css/error_pages.css" media="all">

<script type="text/javascript" src="/error_documents/js/viewport_fix.js"></script>

<noscript><meta http-equiv="refresh" content="0; url=/error_documents/javascript-test.php"></noscript>

</head>
<body>

<div class="main_container_div">
	<div class="sub_container_div">

		<div class="dialog">
		
			<!--[if lte IE 7]>
			<br>
			<![endif]-->
			
			<h1>An Internal Server Error has occurred.</h1>
			
			<p>Please, <a href="<?php echo $webmaster_link ?>" target="_blank">report this bug to the webmaster</a>, if you would like to see it resolved.</p>
			
			<div id="google_translate_element"></div>
			
			<script type="text/javascript">
			
			function googleTranslateElementInit() 
				{
					new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
				};
			
			</script>
			
			<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
			
		</div>
		<p>
		If you do nothing, you will be redirected<br>
		to the site&#8217;s <a href="/" target="_self">home page</a>, in (<input type="text" name="sec" id="sec" value="30" class="no_select sec_counter" maxlength="2" onfocus="blur();" readonly="readonly">) seconds.
		</p>

	</div>
</div>
	
<script type="text/JavaScript">

/* Redirect Timer script [BEGIN] */

/* Set initial variables [BEGIN] */

document.getElementById('sec').value = '30';

var count = 30;

/* Set initial variables [END] */

/* The 'timer' function code [BEGIN] */

function timer()
	{
		count = count - 1;
		if (count < 0)
			{
				/* Counter has ended. Clear interval and redirect page. */
				clearInterval(counter);
				location.href = '/';
				
				return;
			};

		/* Display the number of seconds here. */
		document.getElementById('sec').value = count; 
	};

/* The 'timer' function code [END] */
	
/* Start Redirect Timer [BEGIN] */

var counter = setInterval(timer, 1000); /* 1000 will run it every 1 second. */

/* Start Redirect Timer [END] */

/* Redirect Timer script [END] */

</script>

</body>
</html>