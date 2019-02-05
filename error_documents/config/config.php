<?php

/* Script Properties - DO NOT EDIT [BELOW] */

/* Script Author. */

$script_author = "James Anderson Jr. | Web Profile: https://card.jamesandersonjr.com";

/* Script Name. */

$script_name = "Perfect Error Documents";

/* Script Version. */

$script_version = "2.1.0";

/* Get 'Last Modification' Date/Time. [BEGIN] */

$last_mod_date = DateTime::createFromFormat('U, e', getlastmod().', America/New_York'); /* Get the date, and time, of the last modification of this file, from Unix Epoch time (e.g. '1278259200'.', US/Eastern'). */

$last_mod_date_unix_epoch = $last_mod_date->getTimestamp(); /* Get the Unix Epoch time, of the last modification of this file ( e.g. '1278259200' ). */

$last_mod_date_iso_8601 = strval($last_mod_date->format(DateTime::ATOM)); /* Get the date, and time, of the last modification of this file, in ISO-8601 format (e.g. '2010-07-04T12:00:00-04:00'). */

$last_mod_date = strval($last_mod_date->format('l, F d, Y h:i:s A T')); /* Get the date, and time, of the last modification of this file, in the most legible, and readable, format (e.g. 'Sunday, July 04, 2010 12:00:00 PM EST'). */

/* Get 'Last Modification' Date/Time. [END] */

/* Script Website. */

$script_website = "https://www.perfecterrordocs.com"; /* Don't worry, this is NOT used to "phone home"! It is only referenced in royalty attribution links. */

/* Script Support Email Address. */

$script_support_email = "cs@perfecterrordocs.com"; /* The scripts 'support' email address. Used only for user reference, and to create the obfuscated 'support' email address. */

/* Script [ obfuscated ] Support Email Address. */

$script_obfus_support_email = str_replace("."," [dot] ",str_replace("@"," [at] ",$script_support_email));

/* Script Properties - DO NOT EDIT [ABOVE] */

/* Edit [BELOW], if necessary, to customize the script. */

/* Enter your webmasters contact URL address below. It can be a relative URL, an absolute URL, or a 'MailTo:' email link (e.g. $webmaster_link = "/contact_webmaster.php";). */

$webmaster_link = "/contact_webmaster.php";

/* Enter your Facebook 'App ID' & 'Page ID' below. Visit: https://developers.facebook.com , for an new app ID, if you don't already have one. */

$facebook_app_id = ""; /* If you leave this blank, the script will default to its own Facebook 'App ID'. */

$facebook_page_id = ""; /* If you leave this blank, the script will default to its own Facebook 'Page ID'. */

/* Enter your Twitter username below. Remember: DO NOT include the '@' symbol, as it will be added by the script, automatically. */

$twitter_usrn = ""; /* If you leave this blank, the script will default to its own Twitter username. */

/* Enter your locale below, in the format: 'language_TERRITORY'. For a list of valid locales, visit: https://fbdevwiki.com/wiki/Locales */

$locale = ""; /* If you leave this blank, the script will default to 'en_US' locale. */

/* Edit [ABOVE], if necessary, to customize the script. */

/* Script Conditional Statements - DO NOT EDIT [BELOW] */

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

/* If Twitter username not entered, default to the script's own Twitter username. [BEGIN] */

$script_twitter_usrn = "PerfErrorDocs";

if (empty($twitter_usrn))
	{
		$twitter_usrn = $script_twitter_usrn;
	};

if ((!empty($twitter_usrn))&&($twitter_usrn[0]=='@'))
	{
		$twitter_usrn = ltrim($twitter_usrn, '@');
	};

/* If Twitter username not entered, default to the script's own Twitter username. [END] */

/* If locale not entered, default to 'en_US' locale. [BEGIN] */

$script_dflt_locale = "en_US";

if (empty($locale))
	{
		$locale = $script_dflt_locale;
	};

$og_locale = str_replace("-", "_", $locale);

/* If locale not entered, default to 'en_US' locale. [END] */

/* Script Conditional Statements - DO NOT EDIT [ABOVE] */

?>