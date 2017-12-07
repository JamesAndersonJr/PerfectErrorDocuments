<?php

/* If session is not started yet, start session now. */

if (!session_id()) 
	{
		session_start();
	};

/* Check if necessary prerequisite files exist, in their designated locations, on the server. */

if ( ( file_exists(dirname(__FILE__)."/includes/domain_info.php") ) && ( file_exists(dirname(__FILE__)."/includes/ip_info.php") ) && ( file_exists(dirname(__FILE__)."/config/config.php") ) )
	{
		/* Include required domain-related information, and variables. [BEGIN] */ 

		require_once(dirname(__FILE__)."/includes/domain_info.php");

		/* Include required domain-related information, and variables. [END] */ 
		
		/* Include required IP-related information, and variables. [BEGIN] */ 

		require_once(dirname(__FILE__)."/includes/ip_info.php");

		/* Include required IP-related information, and variables. [END] */ 

		/* Include required configuration file. [BEGIN] */ 

		require_once(dirname(__FILE__)."/config/config.php");

		/* Include required configuration file. [END] */ 
	}
else
	{
		/* Else, stop all subsequent code execution, and exit. */
		
		exit(0);
	};
	
/* A function to test if a file exist at a remote URL (PHP's integrated function 'file_exists()' only works on server paths, on your own server. This one works on remote URL's). [BEGIN] */

function doesFileExistAtURL( $fileURL )
	{
		$getFileHeaders = @get_headers($fileURL);
		
		if (preg_match("|200|", $getFileHeaders[0])) 
			{
				/* The file exists. So, return 'true'. */	
				return true;
			} 
		else 
			{
				/* The file doesn't exist. So, return 'false'. */	
				return false;
			};
	};
	
/* A function to test if a file exist at a remote URL (PHP's integrated function 'file_exists()' only works on server paths, on your own server. This one works on remote URL's). [END] */

/* Save [ Location ] info into PHP session variables, to recall later, if necessary. [BEGIN] */

$_SESSION["origDomain"] = $current_Website_Domain_Name;

$_SESSION["origPath"] = $current_path;

$_SESSION["origURL"] = $current_Webpage_Complete_URL_Address;

/* Save [ Location ] info into PHP session variables, to recall later, if necessary. [END] */

/* Preliminary Meta-Data [BEGIN] */

$meta_Tag_Site_Name = "Error - [500] Internal Server Error";

$meta_Tag_Description = "An internal server error has occurred.";

$meta_Tag_Site_Image = $current_Website_Domain_Name."/error_documents/php/open_graph_image.php";

$meta_Tag_Key_Words = "error, error 500, exception, internal, server, fault, flaw, glitch, failure, malfunction, broken, bug, problem, defect, defective, unresolved, unresponsive, issue, not working, nonworking, dysfunctional";

/* Preliminary Meta-Data [END] */

?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="<?php echo $protocol; ?>schema.org/InformAction">

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<?php

/* Include royalty attribution info, only if it exists on the server, in the designated location. [BEGIN] */

if ( file_exists(dirname(__FILE__)."/includes/royalty.php") )
	{
		include_once(dirname(__FILE__)."/includes/royalty.php");
	};

/* Include royalty attribution info, only if it exists on the server, in the designated location. [END] */

?>

<title><?php echo $meta_Tag_Site_Name; ?></title>

<link rel="canonical" href="<?php echo $current_Webpage_Canonical_URL_Address; ?>">

<link rel="shortcut icon" type="image/x-icon" href="/error_documents/favicon.ico">

<meta name="description" content="<?php echo $meta_Tag_Description; ?>">
<meta name="keywords" content="<?php echo $meta_Tag_Key_Words; ?>">
<meta name="author" content="<?php echo $script_name; ?>">
<meta name="robots" content="noindex,nofollow">
<meta name="googlebot" content="noindex, nofollow"> <!-- For 'Google' bot -->
<meta name="slurp" content="noindex, nofollow"> <!-- For 'Yahoo!' bot -->
<meta name="msnbot" content="noindex, nofollow"> <!-- For 'Bing' bot -->
<meta name="teoma" content="noindex, nofollow"> <!-- For 'Ask.com' bot -->

<meta name="viewport" content="width=device-width, initial-scale=0.8">

<!-- Google Plus Metadata (i.e. "Structured Data") Tags [BEGIN] -->

<meta itemprop="name" content="<?php echo $meta_Tag_Site_Name; ?>">
<meta itemprop="image" content="<?php echo $meta_Tag_Site_Image; ?>">
<meta itemprop="description" content="<?php echo $meta_Tag_Description; ?>">
<meta itemprop="about" content="<?php echo $meta_Tag_Description; ?>">
<meta itemprop="url" content="<?php echo $current_Webpage_Canonical_URL_Address; ?>">
<meta itemprop="inLanguage" content="<?php echo str_replace("_", "-", $og_locale); ?>">
<meta itemprop="agent" content="<?php echo $script_name; ?> v.<?php echo $script_version; ?>">
<meta itemprop="actionStatus" content="FailedActionStatus">
<meta itemprop="error" content="<?php echo substr($meta_Tag_Site_Name,8); ?>">
<meta itemprop="recipient" content="<?php echo $client_ip; ?>">

<!-- Google Plus Metadata (i.e. "Structured Data") Tags [END] -->

<!-- Facebook / Open Graph Tags [BEGIN] -->

<meta property="og:title" content="<?php echo $meta_Tag_Site_Name; ?>">
<meta property="og:image" content="<?php echo $meta_Tag_Site_Image; ?>">
<meta property="og:image:url" content="<?php echo $meta_Tag_Site_Image; ?>">
<?php

if ($protocol == "https://")
	{
?>
<meta property="og:image:secure_url" content="<?php echo preg_replace("/^http:/i", "https:", $meta_Tag_Site_Image); ?>">
<?php 
	};

if (function_exists('doesFileExistAtURL'))
	{
		if (doesFileExistAtURL( $meta_Tag_Site_Image ))
			{
				$file_info = finfo_open();
				$meta_Tag_Site_Image_MIME_Type = finfo_buffer($file_info, $meta_Tag_Site_Image, FILEINFO_MIME_TYPE);
				$meta_Tag_Site_Image_Info_Array = getimagesize($meta_Tag_Site_Image);
				list($meta_Tag_Site_Image_Width, $meta_Tag_Site_Image_Height) = $meta_Tag_Site_Image_Info_Array;

				if ((!empty($meta_Tag_Site_Image_Width)) && (!empty($meta_Tag_Site_Image_Height)))
					{
?>
<meta property="og:image:width" content="<?php echo $meta_Tag_Site_Image_Width; ?>">
<meta property="og:image:height" content="<?php echo $meta_Tag_Site_Image_Height; ?>">
<?php
					};

				if (!empty($meta_Tag_Site_Image_MIME_Type))
					{
?>
<meta property="og:image:type" content="<?php echo $meta_Tag_Site_Image_MIME_Type; ?>">
<?php
					};
			};
	};
?>
<meta property="og:description" content="<?php echo $meta_Tag_Description; ?>">
<meta property="og:url" content="<?php echo $current_Webpage_Canonical_URL_Address; ?>">
<meta property="og:type" content="website">
<meta property="og:locale" content="<?php echo $og_locale; ?>">
<meta property="fb:app_id" content="<?php echo $facebook_app_id; ?>">

<!-- Facebook / Open Graph Tags [END] -->

<link rel="stylesheet" href="/error_documents/css/error_pages.css" media="all">

<script src="/error_documents/js/viewport_fix.js"></script>

<noscript><meta http-equiv="refresh" content="10; url=/error_documents/javascript-test.php"></noscript>

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
			
			<script>
			
			function googleTranslateElementInit() 
				{
					new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
				};
			
			</script>
			
			<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
			
		</div>
		
		<p>
		If you do nothing, you will be redirected<br>
		to the site&#8217;s <a href="/" target="_self">home page</a>, 
		in (<input type="text" name="sec" id="sec" value="30" class="no_select sec_counter" maxlength="2" onfocus="blur();" readonly="readonly">) seconds.
		</p>

	</div>

</div>
	
<script>

/* Redirect Timer script. [BEGIN] */

/* Set initial variables. [BEGIN] */

document.getElementById('sec').value = '30';

var count = 30;

/* Set initial variables. [END] */

/* The 'timer' function code. [BEGIN] */

function timer()
	{
		count = count - 1;
		
		if (count < 0)
			{
				/* The counter has ended. Clear the interval, and redirect the page. */
				clearInterval(counter);
				location.href = '/';
				
				return;
			};

		/* Display the number of seconds here. */
		document.getElementById('sec').value = count; 
	};

/* The 'timer' function code. [END] */
	
/* Start Redirect Timer. [BEGIN] */

var counter = setInterval(timer, 1000); /* 1000 will run it every 1 second. */

/* Start Redirect Timer. [END] */

/* Redirect Timer script. [END] */

</script>

</body>
</html>