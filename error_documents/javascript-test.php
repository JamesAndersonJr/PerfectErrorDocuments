<?php

/* If session is not started yet, start session now. */

if (!session_id())
	{
		session_start();
	};

/* Check if necessary prerequisite files exist, in their designated locations, on the server. */

if ( ( file_exists(dirname(__FILE__).'/includes/domain_info.php')) && ( file_exists(dirname(__FILE__).'/includes/ip_info.php')) && ( file_exists(dirname(__FILE__).'/config/config.php')) )
	{
		/* Include required domain-related information, and variables. [BEGIN] */

		require_once(dirname(__FILE__).'/includes/domain_info.php');

		/* Include required domain-related information, and variables. [END] */

		/* Include required IP-related information, and variables. [BEGIN] */

		require_once(dirname(__FILE__).'/includes/ip_info.php');

		/* Include required IP-related information, and variables. [END] */

		/* Include required configuration file. [BEGIN] */

		require_once(dirname(__FILE__).'/config/config.php');

		/* Include required configuration file. [END] */
	}
else
	{
		/* Else, stop all subsequent code execution, and exit. */

		exit(0);
	};

/* A function to test if a file exists at a remote URL (The PHP integrated function 'file_exists()' only works on server paths, on your own server. This one works on remote URLs). [BEGIN] */

/* We'll first need to check if this function is already declared elsewhere, in the complete scope of the document. */

if (!function_exists('doesFileExistAtURL'))
	{
		function doesFileExistAtURL($f_url)
			{
				$get_f_hdrs = @get_headers($f_url);

				if (preg_match('|200|', $get_f_hdrs[0]))
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
	};

/* A function to test if a file exists at a remote URL (The PHP integrated function 'file_exists()' only works on server paths, on your own server. This one works on remote URLs). [END] */

/* Set the referral address that the visitor came from, into a PHP variable, to later use in a JavaScript variable. [BEGIN] */

if (isset($_SESSION['orig_url']))
	{
		$http_ref_addr = $_SESSION['orig_url'];
	}
elseif (isset($_SERVER['HTTP_REFERER']))
	{
		$http_ref_addr = $_SERVER['HTTP_REFERER'];
	}
else
	{
		$http_ref_addr = '/';
	};

/* Set the referral address that the visitor came from, into a PHP variable, to later use in a JavaScript variable. [END] */

/* Preliminary Meta-Data [BEGIN] */

$titl_tag_pg_titl = 'A Simple JavaScript Test';

$meta_tag_pg_descr = 'A simple test to verify if JavaScript is enabled in your web browser.';

$meta_tag_pg_img = $cur_site_fqdn.'/error_documents/php/og_img.php';

$meta_tag_pg_kywrds = 'JavaScript, script, test, analysis, assess, assessment, evaluate, evaluation, verify, verification, confirm, confirmation, check, web browser, enabled, disabled, support, supported, unsupported, query, inquiry, probe, feature, try, trial';

/* Preliminary Meta-Data [END] */

?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="<?php echo $prot; ?>schema.org/InformAction">

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<?php

/* Include royalty attribution info, only if it exists on the server, in the designated location. [BEGIN] */

if (file_exists(dirname(__FILE__)."/includes/royalty.php"))
	{
		include_once(dirname(__FILE__)."/includes/royalty.php");
	}
else
	{
		echo "<meta http-equiv='refresh' content='0;url=/error_documents/error403.php'>";
	};

/* Include royalty attribution info, only if it exists on the server, in the designated location. [END] */

?>

<title><?php echo $titl_tag_pg_titl; ?></title>

<link rel="canonical" href="<?php echo $cur_pg_canon_url_addr; ?>">

<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

<script>document.title += ' - JavaScript is Enabled.';</script>

<meta name="description" content="<?php echo $meta_tag_pg_descr; ?>">
<meta name="keywords" content="<?php echo $meta_tag_pg_kywrds; ?>">
<meta name="author" content="<?php echo $scr_nm; ?>">
<meta name="web_author" content ="<?php echo $scr_au; ?>">
<meta name="robots" content="noindex, nofollow">
<meta name="slurp" content="noindex, nofollow"> <!-- For 'Yahoo!' bot -->
<meta name="msnbot" content="noindex, nofollow"> <!-- For 'Bing' bot -->

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Google Search Metadata (i.e. "Structured Data") Tags [BEGIN] -->

<meta itemprop="name" content="<?php echo $titl_tag_pg_titl; ?>">
<meta itemprop="image" content="<?php echo $meta_tag_pg_img; ?>">
<meta itemprop="description" content="<?php echo $meta_tag_pg_descr; ?>">
<meta itemprop="url" content="<?php echo $cur_pg_canon_url_addr; ?>">
<meta itemprop="inLanguage" content="<?php echo str_replace('_', '-', $og_locale); ?>">
<meta itemprop="agent" content="<?php echo $scr_nm; ?> v.<?php echo $scr_ver; ?>">

<!-- Google Search Metadata (i.e. "Structured Data") Tags [END] -->

<!-- Facebook / Open Graph Tags [BEGIN] -->

<meta property="og:title" content="<?php echo $titl_tag_pg_titl; ?>">
<meta property="og:image" content="<?php echo $meta_tag_pg_img; ?>">
<meta property="og:image:url" content="<?php echo $meta_tag_pg_img; ?>">
<?php

if ($prot == 'https://')
	{
?>
<meta property="og:image:secure_url" content="<?php echo preg_replace('/^http:/i', 'https:', $meta_tag_pg_img); ?>">
<?php
	};

if (function_exists('doesFileExistAtURL'))
	{
		if (doesFileExistAtURL($meta_tag_pg_img))
			{
				$meta_tag_pg_img_info_arr = getimagesize($meta_tag_pg_img);
				$meta_tag_pg_img_mime_typ = @$meta_tag_pg_img_info_arr['mime'];

				list($meta_tag_pg_img_wdt, $meta_tag_pg_img_hgt) = $meta_tag_pg_img_info_arr;

				if ((!empty($meta_tag_pg_img_wdt)) && (!empty($meta_tag_pg_img_hgt)))
					{
?>
<meta property="og:image:width" content="<?php echo $meta_tag_pg_img_wdt; ?>">
<meta property="og:image:height" content="<?php echo $meta_tag_pg_img_hgt; ?>">
<?php				};

				if (!empty($meta_tag_pg_img_mime_typ)) 
					{
?>
<meta property="og:image:type" content="<?php echo $meta_tag_pg_img_mime_typ; ?>">
<?php
					};
			};
	};
?>
<meta property="og:image:alt" content="<?php echo $titl_tag_pg_titl; ?>">
<meta property="og:description" content="<?php echo $meta_tag_pg_descr; ?>">
<meta property="og:url" content="<?php echo $cur_pg_canon_url_addr; ?>">
<meta property="og:see_also" content="<?php echo $scr_site; ?>">
<meta property="og:rich_attachment" content="true">
<meta property="og:type" content="website">
<meta property="og:ttl" content="604800">
<meta property="og:updated_time" content="<?php echo $last_mod_date_iso_8601; ?>">
<meta property="og:locale" content="<?php echo $og_locale; ?>">
<meta property="fb:app_id" content="<?php echo $fb_app_id; ?>">
<meta property="fb:pages" content="<?php echo $fb_pg_id; ?>">

<!-- Facebook / Open Graph Tags [END] -->

<!-- Twitter Card Tags [BEGIN] -->

<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@<?php echo $twtr_usrn; ?>">
<meta name="twitter:title" content="<?php echo $titl_tag_pg_titl; ?>">
<meta name="twitter:description" content="<?php echo $meta_tag_pg_descr; ?>">
<meta name="twitter:image" content="<?php echo $meta_tag_pg_img; ?>">

<!-- Twitter Card Tags [END] -->

<link rel="stylesheet" href="/error_documents/css/error_docs.min.css" media="all">

<script src="/error_documents/js/viewport_fix.min.js"></script>

<script>

function goBack()
	{
		if ((window.history.length == 0) || (window.history.length == 1) || (history.length == 0) || (history.length == 1))
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

var ref_pg = '<?php echo $http_ref_addr; ?>';

function rtnToPrevPg()
	{
		if ((ref_pg != '') && (ref_pg != window.location.href))
			{
				alert('Returing you to where you left off.');
				window.location.replace(ref_pg);
			}
		else
			{
				goBack();
			};
	};

</script>

</head>

<body>

<div class="main_cont_div">

	<div class="sub_cont_div">

		<div class="dialog">

		<!--[if lte IE 7]>
		<br>
		<![endif]-->

		<h1 id="hdg"><span class="txt_trsfm_cap_forc">JavaScript</span> is <span class="txt_trsfm_cap_forc">Disabled</span> in <span class="txt_trsfm_cap_forc">Your Web Browser</span>.</h1>

		<p id="msg">
		<span class="txt_trsfm_cap_forc">For</span> full functionality of this website, it is necessary to
		<br>
		<a href="https://www.enable-javascript.com" target="_blank"><span class="txt_trsfm_cap_forc">Enable JavaScript</span> in your <span class="txt_trsfm_cap_forc">Web Browser</span></a>.
		</p>

		<div id="google_translate_element"></div>

		<script>

		function googleTranslateElementInit()
			{
				new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			};

		</script>

		<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		<script>document.write('<br>');</script>

		<span id="act_bttns"><button class="bttn txt_trsfm_cap_forc" onclick="window.location.replace(window.location.href);">Re-Test</button></span>

		</div>

	</div>

</div>

<script>

document.getElementById('hdg').innerHTML = '<span style="color:#39BF45 !important;"><span class="txt_trsfm_cap_forc">JavaScript</span> is <span class="txt_trsfm_cap_forc">Enabled</span> in <span class="txt_trsfm_cap_forc">Your Web Browser</span>.</span>';
document.getElementById('msg').innerHTML = '<span class="txt_trsfm_cap_forc">Congratulations!</span> <span class="txt_trsfm_cap_forc">JavaScript</span> is enabled, and working properly in your web browser.';
document.getElementById('act_bttns').innerHTML = '<button class="bttn" onclick="rtnToPrevPg();"><span class="txt_trsfm_cap_forc">Close</span> this <span class="txt_trsfm_cap_forc">Window</span> <span class="no_wrap">(&#8202;<span id="ctr"></span>&#8202;)</span></button>';

</script>

<script>

/* Redirect Count-Down Timer Script [BEGIN] */

var ctr = 30; /* Declare the initial counter ('ctr') value in seconds. */

document.getElementById('ctr').innerHTML = ctr.toString(); /* Assign the counter ('ctr') value to the displayed second counter on the page. */

function cntDwnTmr() /* Declare the count-down timer ('cntDwnTmr') function. */
	{
		ctr = ctr - 1; /* Decrement the counter ('ctr') value by one (1) second for each function call. */

		if (ctr < 0) /* If the 'just-decremented' counter ('ctr') value is now less than zero (0), then... */
			{
				clearInterval(clk); /* Clear the interval assigned to the clock ('clk') variable below. */
				rtnToPrevPg(); /* Now attempt to redirect the page. */
				return; /* Terminate the function execution here so as never to erroneously display a value less than zero (0) on the page. */
			};

		document.getElementById('ctr').innerHTML = ctr.toString(); /* Display the new counter ('ctr') value on the page. */
	};

var clk = setInterval(cntDwnTmr, 1000); /* Initialize the clock ('clk') variable to run the counter-down timer ('cntDwnTmr') function every (1) second (i.e. '1000 milliseconds'). */

/* Redirect Count-Down Timer Script [END] */

</script>

</body>
</html>