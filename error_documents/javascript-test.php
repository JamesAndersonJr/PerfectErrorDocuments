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

/* Set the referral address that the visitor came from, into a PHP variable, to later use in a JavaScript variable. [BEGIN] */

if (isset($_SESSION["origURL"]))
	{
		$http_ref_addr = $_SESSION["origURL"];
	}
elseif (isset($_SERVER['HTTP_REFERER']))
	{
		$http_ref_addr = $_SERVER['HTTP_REFERER'];
	}
else
	{
		$http_ref_addr = "/";
	};

/* Set the referral address that the visitor came from, into a PHP variable, to later use in a JavaScript variable. [END] */

/* Preliminary Meta-Data [BEGIN] */

$meta_Tag_Site_Name = "JavaScript Disabled";

$meta_Tag_Description = "A simple test to verify if JavaScript is enabled in your web browser.";

$meta_Tag_Site_Image = $current_Website_Domain_Name."/error_documents/php/open_graph_image.php";

$meta_Tag_Key_Words = "JavaScript, script, test, analysis, assess, assessment, evaluate, evaluation, verify, verification, confirm, confirmation, check, web browser, enabled, disabled, support, supported, unsupported, query, inquiry, probe, feature, try, trial";

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
	}
else
	{
		echo "<meta http-equiv='refresh' content='0;url=/error_documents/error403.php'>";
	};

/* Include royalty attribution info, only if it exists on the server, in the designated location. [END] */

?>

<title><?php echo $meta_Tag_Site_Name; ?></title>

<link rel="canonical" href="<?php echo $current_Webpage_Canonical_URL_Address; ?>">

<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

<script>document.title = "JavaScript Enabled";</script>

<meta name="description" content="<?php echo $meta_Tag_Description; ?>">
<meta name="keywords" content="<?php echo $meta_Tag_Key_Words; ?>">
<meta name="author" content="<?php echo $script_name; ?>">
<meta name="web_author" content ="<?php echo $script_author; ?>">
<meta name="robots" content="noindex,nofollow">
<meta name="slurp" content="noindex, nofollow"> <!-- For 'Yahoo!' bot -->
<meta name="msnbot" content="noindex, nofollow"> <!-- For 'Bing' bot -->

<meta name="viewport" content="width=device-width, initial-scale=0.8">

<!-- Google Plus Metadata (i.e. "Structured Data") Tags [BEGIN] -->

<meta itemprop="name" content="<?php echo $meta_Tag_Site_Name; ?>">
<meta itemprop="image" content="<?php echo $meta_Tag_Site_Image; ?>">
<meta itemprop="description" content="<?php echo $meta_Tag_Description; ?>">
<meta itemprop="url" content="<?php echo $current_Webpage_Canonical_URL_Address; ?>">
<meta itemprop="inLanguage" content="<?php echo str_replace("_", "-", $og_locale); ?>">
<meta itemprop="agent" content="<?php echo $script_name; ?> v.<?php echo $script_version; ?>">

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
<?php				};

				if (!empty($meta_Tag_Site_Image_MIME_Type)) 
					{
?>
<meta property="og:image:type" content="<?php echo $meta_Tag_Site_Image_MIME_Type; ?>">
<?php
					};
			};
	};
?>
<meta property="og:image:alt" content="<?php echo $meta_Tag_Site_Name; ?>">
<meta property="og:description" content="<?php echo $meta_Tag_Description; ?>">
<meta property="og:url" content="<?php echo $current_Webpage_Canonical_URL_Address; ?>">
<meta property="og:see_also" content="<?php echo $script_website; ?>">
<meta property="og:rich_attachment" content="true">
<meta property="og:type" content="website">
<meta property="og:ttl" content="604800">
<meta property="og:updated_time" content="<?php echo $last_mod_date_iso_8601; ?>">
<meta property="og:locale" content="<?php echo $og_locale; ?>">
<meta property="fb:app_id" content="<?php echo $facebook_app_id; ?>">
<meta property="fb:pages" content="<?php echo $facebook_page_id; ?>">

<!-- Facebook / Open Graph Tags [END] -->

<!-- Twitter Card Tags [BEGIN] -->

<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@<?php echo $twitter_usrn; ?>">
<meta name="twitter:title" content="<?php echo $meta_Tag_Site_Name; ?>">
<meta name="twitter:description" content="<?php echo $meta_Tag_Description; ?>">
<meta name="twitter:image" content="<?php echo $meta_Tag_Site_Image; ?>">

<!-- Twitter Card Tags [END] -->

<link rel="stylesheet" href="/error_documents/css/error_docs.min.css" media="all">

<script src="/error_documents/js/viewport_fix.min.js"></script>

<script>

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

<script>

var referringPage = "<?php echo $http_ref_addr; ?>";

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
		For full functionality of this website, it is necessary to 
		<br>
		<a href="https://www.enable-javascript.com" target="_blank">Enable JavaScript in your Web Browser</a>.
		</p>
		
		<div id="google_translate_element"></div>
		
		<script>
		
		function googleTranslateElementInit() 
			{
				new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			};
		
		</script>
		
		<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<script>document.write("<br>");</script>
		
		<span id="action_buttons"><button onclick="JavaScript:window.location.replace(window.location.href);">Re-Test</button></span>
		
		</div>
		
	</div>

</div>

<script>

document.getElementById("heading").innerHTML = "<span style='color:#39BF45 !important;'>JavaScript is Enabled in Your Web Browser.</span>";
document.getElementById("message").innerHTML = "Congratulations! JavaScript is enabled, and working properly in your web browser.";
document.getElementById("action_buttons").innerHTML = "<button onclick='JavaScript:returnToPreviousPage();'>Close this Window ( <span id=\"counter\"></span> )</button>";

</script>

<script>

/* Redirect Timer script. [BEGIN] */

/* Set initial variables. [BEGIN] */

document.getElementById('counter').innerHTML = '30';

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
				returnToPreviousPage();

				return;
			};

		/* Display the number of seconds here. */
		document.getElementById('counter').innerHTML = count; 
	};
	
/* The 'timer' function code. [END] */
	
/* Start Redirect Timer. [BEGIN] */

var counter = setInterval(timer, 1000); /* 1000 will run it every 1 second. */

/* Start Redirect Timer. [END] */

/* Redirect Timer script. [END] */

</script>

</body>
</html>