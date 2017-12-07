<?php

/* Script Properties - DO NOT EDIT [BELOW] */

/* Script Name. */

$script_name = "Perfect Error Documents";

/* Script Version. */

$script_version = "1.7.7";

/* Script Website. */

$script_website = "https://www.perfecterrordocs.com";

/* Script Support Email Address. */

$script_support_email = "support@perfecterrordocs.com";

/* Script [ obfuscated ] Support Email Address. */

$script_obfus_support_email = "support [at] perfecterrordocs [dot] com";

/* Script Properties - DO NOT EDIT [ABOVE] */

/* Edit [BELOW], if necessary, to customize the script. */

/* Enter your webmasters contact URL address below. It can be a relative URL, an absolute URL, or a 'MailTo:' email link (e.g. $webmaster_link = "/contact_webmaster.php";). */

$webmaster_link = "/contact_webmaster.php";

/* Enter your Facebook 'App ID' & 'Page ID' below. Visit: https://developers.facebook.com , for an new app ID, if you don't already have one. */

$facebook_app_id = ""; /* If you leave this blank, the script will default to its own Facebook 'App ID'. */

$facebook_page_id = ""; /* If you leave this blank, the script will default to its own Facebook 'Page ID'. */

/* Enter your locale below, in the format: 'language_TERRITORY'. For a list of valid locales, visit: https://fbdevwiki.com/wiki/Locales */

$locale = ""; /* If you leave this blank, the script will default to 'en_US' locale. */

/* Edit [ABOVE], if necessary, to customize the script. */

/* If Facebook 'App ID' not entered, default to the script's own Facebook 'App ID'. [BEGIN] */

$script_facebook_app_id = "1421670971246284";

if (empty($facebook_app_id))
	{
		$facebook_app_id = $script_facebook_app_id;
	};

/* If Facebook 'App ID' not entered, default to the script's own Facebook 'App ID'. [END] */

/* If Facebook 'Page ID' not entered, default to the script's own Facebook 'Page ID'. [BEGIN] */

$script_facebook_page_id = "775281312545105";

if (empty($facebook_page_id))
	{
		$facebook_page_id = $script_facebook_page_id;
	};

/* If Facebook 'Page ID' not entered, default to the script's own Facebook 'Page ID'. [END] */

/* If locale not entered, default to 'en_US' locale. [BEGIN] */

$script_dflt_locale = "en_US";

if (empty($locale))
	{
		$locale = $script_dflt_locale;
	};
	
$og_locale = str_replace("-", "_", $locale);

/* If locale not entered, default to 'en_US' locale. [END] */

?>