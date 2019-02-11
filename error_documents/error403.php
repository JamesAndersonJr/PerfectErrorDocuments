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

function doesFileExistAtURL( $file_url )
	{
		$get_file_headers = @get_headers($file_url);

		if (preg_match("|200|", $get_file_headers[0]))
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

$_SESSION["orig_domain"] = $cur_website_fqdn;

$_SESSION["orig_path"] = $cur_path;

$_SESSION["orig_url"] = $cur_web_page_cmpl_url_addr;

/* Save [ Location ] info into PHP session variables, to recall later, if necessary. [END] */

/* Preliminary Meta-Data [BEGIN] */

$meta_tag_site_name = "Error - [403] Forbidden";

$meta_tag_description = "Access to this resource has been forbidden.";

$meta_tag_site_image = $cur_website_fqdn."/error_documents/php/open_graph_image.php";

$meta_tag_key_words = "error, error 403, exception, access, entry, denied, blocked, forbidden, disallowed, prohibited, banned, barred, refused, off-limits, rejected, withheld, inhibited, not allowed, inaccessible, private, exclusive, confidential";

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

<title><?php echo $meta_tag_site_name; ?></title>

<link rel="canonical" href="<?php echo $cur_web_page_canonical_url_addr; ?>">

<link rel="shortcut icon" type="image/x-icon" href="/error_documents/favicon.ico">

<meta name="description" content="<?php echo $meta_tag_description; ?>">
<meta name="keywords" content="<?php echo $meta_tag_key_words; ?>">
<meta name="author" content="<?php echo $script_name; ?>">
<meta name="web_author" content ="<?php echo $script_author; ?>">
<meta name="robots" content="noindex,nofollow">
<meta name="slurp" content="noindex, nofollow"> <!-- For 'Yahoo!' bot -->
<meta name="msnbot" content="noindex, nofollow"> <!-- For 'Bing' bot -->

<meta name="viewport" content="width=device-width, initial-scale=0.8">

<!-- Google Search Metadata (i.e. "Structured Data") Tags [BEGIN] -->

<meta itemprop="name" content="<?php echo $meta_tag_site_name; ?>">
<meta itemprop="image" content="<?php echo $meta_tag_site_image; ?>">
<meta itemprop="description" content="<?php echo $meta_tag_description; ?>">
<meta itemprop="about" content="<?php echo $meta_tag_description; ?>">
<meta itemprop="url" content="<?php echo $cur_web_page_canonical_url_addr; ?>">
<meta itemprop="inLanguage" content="<?php echo str_replace("_", "-", $og_locale); ?>">
<meta itemprop="agent" content="<?php echo $script_name; ?> v.<?php echo $script_version; ?>">
<meta itemprop="actionStatus" content="FailedActionStatus">
<meta itemprop="error" content="<?php echo substr($meta_tag_site_name,8); ?>">
<meta itemprop="recipient" content="<?php echo $client_ip; ?>">

<!-- Google Search Metadata (i.e. "Structured Data") Tags [END] -->

<!-- Facebook / Open Graph Tags [BEGIN] -->

<meta property="og:title" content="<?php echo $meta_tag_site_name; ?>">
<meta property="og:image" content="<?php echo $meta_tag_site_image; ?>">
<meta property="og:image:url" content="<?php echo $meta_tag_site_image; ?>">
<?php

if ($protocol == "https://")
	{
?>
<meta property="og:image:secure_url" content="<?php echo preg_replace("/^http:/i", "https:", $meta_tag_site_image); ?>">
<?php 
	};

if (function_exists('doesFileExistAtURL'))
	{
		if (doesFileExistAtURL( $meta_tag_site_image ))
			{
				$file_info = finfo_open();
				$meta_tag_site_image_mime_type = finfo_buffer($file_info, $meta_tag_site_image, FILEINFO_MIME_TYPE);
				$meta_tag_site_image_info_array = getimagesize($meta_tag_site_image);
				list($meta_tag_site_image_width, $meta_tag_site_image_height) = $meta_tag_site_image_info_array;

				if ((!empty($meta_tag_site_image_width)) && (!empty($meta_tag_site_image_height)))
					{
?>
<meta property="og:image:width" content="<?php echo $meta_tag_site_image_width; ?>">
<meta property="og:image:height" content="<?php echo $meta_tag_site_image_height; ?>">
<?php
					};

				if (!empty($meta_tag_site_image_mime_type))
					{
?>
<meta property="og:image:type" content="<?php echo $meta_tag_site_image_mime_type; ?>">
<?php
					};
			};
	};
?>
<meta property="og:image:alt" content="<?php echo $meta_tag_site_name; ?>">
<meta property="og:description" content="<?php echo $meta_tag_description; ?>">
<meta property="og:url" content="<?php echo $cur_web_page_canonical_url_addr; ?>">
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
<meta name="twitter:title" content="<?php echo $meta_tag_site_name; ?>">
<meta name="twitter:description" content="<?php echo $meta_tag_description; ?>">
<meta name="twitter:image" content="<?php echo $meta_tag_site_image; ?>">

<!-- Twitter Card Tags [END] -->

<link rel="stylesheet" href="/error_documents/css/error_docs.min.css" media="all">

<script src="/error_documents/js/viewport_fix.min.js"></script>

<noscript><meta http-equiv="refresh" content="10; url=/error_documents/javascript-test.php"></noscript>

</head>

<body>

<div class="main_cont_div">

	<div class="sub_cont_div">

		<div class="dialog">

			<!--[if lte IE 7]>
			<br>
			<![endif]-->

			<h1>Access Denied</h1>

			<p>You do not have the proper authorization to access this resource. If you came to this page via a link, please inform the owner(s) of that page.</p>

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
		in (<input type="text" name="sec" id="sec" value="30" class="no_sel sec_ctr" maxlength="2" onfocus="blur();" readonly="readonly">) seconds.
		</p>

	</div>

</div>

<script>

/* Redirect Timer script. [BEGIN] */

/* Set initial variables [BEGIN] */

document.getElementById('sec').value = '30';

var count = 30;

/* Set initial variables [END] */

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