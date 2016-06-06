<?php

/* ********************* SUBROUTINE: Find server URL (domain + TLD) ONLY, without sub-domain (e.g. google.co.uk), and assign to '$server_url' variable [BEGIN] *********************  */

/* This function returns the just domain + TLD (without any sub-domain(s)) of a valid URL string (e.g. 'https://testing.multiple.subdomain.google.co.uk' returns just 'google.co.uk') [BEGIN] */
function getDomain($url) 
	{
		$pieces = parse_url($url);
		$domain = isset($pieces['host']) ? $pieces['host'] : '';
		if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) 
			{
				return $regs['domain'];
			}
		return false;
	}
/* This function returns the just domain + TLD (without any sub-domain(s)) of a valid URL string (e.g. 'https://testing.multiple.subdomain.google.co.uk' returns just 'google.co.uk') [END] */

$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';

$server_name = $_SERVER["SERVER_NAME"];

$current_path = $_SERVER['REQUEST_URI'];

$server_url = getDomain($protocol.$server_name);

if (($server_url == "")||($server_url == false))
	{ 
		$server_url = $server_name; 
	}

$sub_domain = preg_replace("/\.$/","",(str_replace($server_url, "", $server_name)));

if (($sub_domain == "")||( $sub_domain == null ))
{
		$sub_domain = "www";
};
	
/* ********************* SUBROUTINE: Find server URL (domain + TLD) ONLY, without sub-domain (e.g. google.co.uk), and assign to '$server_url' variable [END] *********************  */

/* Get the full domain name of the primary website [BEGIN] */
$primary_Website_Domain_Name = $protocol."www.".$server_url; // (e.g. http://www.example.com)
/* Get the full domain name of the primary website [END] */

/* Get the full domain name of the current website [BEGIN] */
$current_Website_Domain_Name = $protocol.$sub_domain.".".$server_url;
/* Get the full domain name of the current website [BEGIN] */

/* Get the complete URL address to the current webpage, on the Internet (e.g. http://www.example.com/index.php) [BEGIN] */
$current_Webpage_Complete_URL_Address = $current_Website_Domain_Name.$current_path;
/* Get the complete URL address to the current webpage, on the Internet (e.g. http://www.example.com/index.php) [END] */

/* Get the primary websites version of the current page. Used for canonical links on mobile-only sub-domains (e.g. used on http://m.example.com/about.php would produce http://www.example.com/about.php) [BEGIN] */
$primary_Website_Version = $primary_Website_Domain_Name.$current_path;
/* Get the primary websites version of the current page. Used for canonical links on mobile-only sub-domains (e.g. used on http://m.example.com/about.php would produce http://www.example.com/about.php) [END] */

?>