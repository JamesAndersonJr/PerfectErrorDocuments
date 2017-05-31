<?php

/* * * * * * * * * * * SUBROUTINE: Find given websites domain name (SLD + TLD) ONLY, without sub-domain, or 3LD (e.g. google.co.uk), and assign to '$server_url' variable [BEGIN] * * * * * * * * * *  */

/* This function [BELOW] returns the just the domain name (SLD + TLD) (without any sub-domain, or 3LD) of a valid URL string (e.g. 'https://testing.multiple.subdomain.google.co.uk' returns just 'google.co.uk') [BEGIN] */

function getDomain($url) 
	{
		$pieces = parse_url($url);	
		$domain = isset($pieces['host']) ? $pieces['host'] : '';
		
		if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) 
			{
				return $regs['domain'];
			};
			
		return false;
	};

/* This function [ABOVE] returns the just the domain name (SLD + TLD) (without any sub-domain, or 3LD) of a valid URL string (e.g. 'https://testing.multiple.subdomain.google.co.uk' returns just 'google.co.uk') [END] */

/* Default protocol */

$protocol = "//";

if ((!empty($_SERVER['HTTPS'])) && ($_SERVER['HTTPS'] != 'off')) 
	{
		/* SSL/TLS Detected. Use secure protocol. */

		$protocol = 'https://';
	}
else
	{
		/* No SSL/TLS Detected. Do NOT use secure protocol. */

		$protocol =  'http://';
	};

$server_name = $_SERVER["SERVER_NAME"];

$current_path = $_SERVER['REQUEST_URI'];

$server_url = getDomain($protocol.$server_name);

if (($server_url == "")||($server_url == false))
	{
		$server_url = $server_name; 
	};

$sub_domain = preg_replace("/\.$/","",(str_replace($server_url, "", $server_name)));

if (($sub_domain == "")||( $sub_domain == null ))
	{
		$sub_domain = "www";
	};

/* * * * * * * * * * * SUBROUTINE: Find given websites domain name (SLD + TLD) ONLY, without sub-domain, or 3LD (e.g. google.co.uk), and assign to '$server_url' variable [END] * * * * * * * * * *  */

/* Declare domain-related variables. [BEGIN] */

/* Get the full domain name of the primary website (e.g. [ http://www.example.com ]). [BEGIN] */

$primary_Website_Domain_Name = $protocol."www.".$server_url;

/* Get the full domain name of the primary website (e.g. [ http://www.example.com ]). [END] */

/* Get the full domain name of the current website. (e.g. [ http://current-3ld.example.com ]). [BEGIN] */

$current_Website_Domain_Name = $protocol.$sub_domain.".".$server_url;

/* Get the full domain name of the current website. (e.g. [ http://current-3ld.example.com ]). [END] */

/* Get the complete URL address to the current web page, on the Internet (e.g. [ http://www.example.com/index.php ]). [BEGIN] */

$current_Webpage_Complete_URL_Address = $current_Website_Domain_Name.$current_path;

/* Get the complete URL address to the current web page, on the Internet (e.g. [ http://www.example.com/index.php ]). [END] */

/* Get the canonical URL address to the current web page, on the Internet (e.g. [ http://www.example.com/page.php ] or [ http://www.example.com ], but NOT [ http://www.example.com/index.php ] NOR [ http://www.example.com/ ]). [BEGIN] */

$current_Webpage_Canonical_URL_Address = preg_replace('/((\\index)\.[a-z]+)$/', '', $current_Webpage_Complete_URL_Address); /* Removes any known homepage path of the URL address, but NOT normal page paths. */

$current_Webpage_Canonical_URL_Address = preg_replace('/\/$/', '', $current_Webpage_Canonical_URL_Address); /* Removes any trailing forward slash ("/") from the end of the URL. */

/* Get the canonical URL address to the current web page, on the Internet (e.g. [ http://www.example.com/page.php ] or [ http://www.example.com ], but NOT [ http://www.example.com/index.php ] NOR [ http://www.example.com/ ]). [END] */

/* Get the primary websites version of the current page (e.g. used at [ http://m.example.com/about.php ] would produce [ http://www.example.com/about.php ]). Typically used for canonical links on mobile-only sub-domains. [BEGIN] */

$primary_Website_Version = $primary_Website_Domain_Name.$current_path;

/* Get the primary websites version of the current page (e.g. used at [ http://m.example.com/about.php ] would produce [ http://www.example.com/about.php ]). Typically used for canonical links on mobile-only sub-domains. [END] */

/* Declare domain-related variables. [END] */

?>