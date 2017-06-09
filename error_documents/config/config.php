<?php

/* Perfect Error Documents Version. - DO NOT EDIT [BELOW] */

$ped_version = "1.7.2";

/* Perfect Error Documents Version. - DO NOT EDIT [ABOVE] */

/* Edit [BELOW], if necessary, to customize the script. */

/* Enter your webmasters contact URL address below. It can be a relative URL, an absolute URL, or a 'MailTo:' email link (e.g. $webmaster_link = "/contact_webmaster.php";). */

$webmaster_link = "/contact_webmaster.php";

/* Enter your Facebook App ID below. Visit: https://developers.facebook.com , if you don't have one. */

$facebook_app_id = ""; /* If you leave this blank, the script will default to PED's Facebook App ID. */

/* Enter your locale below, in the format: 'language_TERRITORY'. For a list of valid locales, visit: http://fbdevwiki.com/wiki/Locales */

$og_locale = ""; /* If you leave this blank, the script will default to 'en_US' locale. */

/* Edit [ABOVE], if necessary, to customize the script. */

/* If Facebook App ID not entered, default to PED's Facebook App ID. [BEGIN] */

$ped_facebook_app_id = "1421670971246284";

if (empty($facebook_app_id))
	{
		$facebook_app_id = $ped_facebook_app_id;
	};

/* If Facebook App ID not entered, default to PED's Facebook App ID. [END] */

/* If locale not entered, default to 'en_US' locale. [BEGIN] */

if (empty($og_locale))
	{
		$og_locale = "en_US";
	};

/* If locale not entered, default to 'en_US' locale. [END] */

?>