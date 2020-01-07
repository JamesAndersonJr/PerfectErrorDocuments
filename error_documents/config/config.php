<?php

/* Script Properties - DO NOT EDIT [BELOW] */

/* Script Author. */

$scr_au = 'James Anderson Jr. | Web Profile: https://card.jamesandersonjr.com';

/* Script Name. */

$scr_nm = 'Perfect Error Documents';

/* Script Version. */

$scr_ver = '3.0.0';

/* Get 'Last Modification' Date/Time. [BEGIN] */

$last_mod_date = DateTime::createFromFormat('U, e', getlastmod().', America/New_York'); /* Get the date, and time, of the last modification of this file, from Unix Epoch time (e.g. '1278259200'.', US/Eastern'). */

$last_mod_date_unix_epoch = $last_mod_date->getTimestamp(); /* Get the Unix Epoch time, of the last modification of this file ( e.g. '1278259200' ). */

$last_mod_date_iso_8601 = strval($last_mod_date->format(DateTime::ATOM)); /* Get the date, and time, of the last modification of this file, in ISO-8601 format (e.g. '2010-07-04T12:00:00-04:00'). */

$last_mod_date = strval($last_mod_date->format('l, F d, Y h:i:s A T')); /* Get the date, and time, of the last modification of this file, in the most legible, and readable, format (e.g. 'Sunday, July 04, 2010 12:00:00 PM EST'). */

/* Get 'Last Modification' Date/Time. [END] */

/* Script Website. */

$scr_site = 'https://www.perfecterrordocs.com'; /* Don't worry, this is NOT used to "phone home"! It is only referenced in royalty attribution links. */

/* Script Support Email Address. */

$scr_sprt_eml = 'cs@perfecterrordocs.com'; /* The scripts 'support' email address. Used only for user reference, and to create the obfuscated 'support' email address. */

/* Script [ obfuscated ] Support Email Address. */

$scr_obfus_sprt_eml = str_replace('.',' [dot] ',str_replace('@',' [at] ',$scr_sprt_eml));

/* Script Properties - DO NOT EDIT [ABOVE] */

/* Edit [BELOW], if necessary, to customize the script. */

/* Enter your webmaster's contact URL address below. It can be a relative URL, an absolute URL, or a 'MailTo:' email link (e.g. $wbmstr_lnk = '/contact_webmaster.php';). */

$wbmstr_lnk = '/contact_webmaster.php';

/* Enter your Facebook 'App ID' & 'Page ID' below. Visit: https://developers.facebook.com , for an new app ID, if you don't already have one. */

$fb_app_id = ''; /* If you leave this blank, the script will fallback to a default Facebook 'App ID'. */

$fb_pg_id = ''; /* If you leave this blank, the script will fallback to a default Facebook 'Page ID'. */

/* Enter your Twitter username below. Remember: DO NOT include the '@' symbol, as it will be added by the script, automatically. */

$twtr_usrn = ''; /* If you leave this blank, the script will fallback to a default Twitter username. */

/* Enter your locale below, in the format: 'language_TERRITORY'. For a list of valid locales, visit: https://fbdevwiki.com/wiki/Locales */

$locale = ''; /* If you leave this blank, the script will fallback to the default 'en_US' locale. */

/* Edit [ABOVE], if necessary, to customize the script. */

/* Script Conditional Statements - DO NOT EDIT [BELOW] */

/* If Facebook 'App ID' not entered, fallback to the default Facebook 'App ID' of the script. [BEGIN] */

$scr_fb_app_id = '1421670971246284';

if (empty($fb_app_id))
	{
		$fb_app_id = $scr_fb_app_id;
	};

/* If Facebook 'App ID' not entered, fallback to the default Facebook 'App ID' of the script. [END] */

/* If Facebook 'Page ID' not entered, fallback to the default Facebook 'Page ID' of the script. [BEGIN] */

$scr_fb_pg_id = '775281312545105';

if (empty($fb_pg_id))
	{
		$fb_pg_id = $scr_fb_pg_id;
	};

/* If Facebook 'Page ID' not entered, fallback to the default Facebook 'Page ID' of the script. [END] */

/* If Twitter username not entered, fallback to the default Twitter username of the script. [BEGIN] */

$scr_twtr_usrn = 'PerfErrorDocs';

if (empty($twtr_usrn))
	{
		$twtr_usrn = $scr_twtr_usrn;
	};

if ((!empty($twtr_usrn))&&($twtr_usrn[0]=='@'))
	{
		$twtr_usrn = ltrim($twtr_usrn, '@');
	};

/* If Twitter username not entered, fallback to the default Twitter username of the script. [END] */

/* If locale not entered, default to 'en_US' locale. [BEGIN] */

$scr_dflt_locale = 'en_US';

if (empty($locale))
	{
		$locale = $scr_dflt_locale;
	};

$og_locale = str_replace('-', '_', $locale);

/* If locale not entered, default to 'en_US' locale. [END] */

/* Script Conditional Statements - DO NOT EDIT [ABOVE] */

?>