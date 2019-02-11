<?php

/* * * * * * * * * * * SUBROUTINE: Find any given websites [ domain name ] ONLY, without any subdomain (e.g. [ example.co.uk ]), and assign the value to '$server_url' variable. [BEGIN] * * * * * * * * * *  */

/* The function [BELOW] returns just the [ domain name ] (without any subdomain) of a valid URL string (e.g. getDomain('https://testing.multiple.subdomain.example.co.uk'); returns 'example.co.uk'). [BEGIN] */

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

/* The function [ABOVE] returns just the [ domain name ] (without any subdomain) of a valid URL string (e.g. getDomain('https://testing.multiple.subdomain.example.co.uk'); returns 'example.co.uk'). [END]   */

/* Default protocol */

$protocol = "//";

if ((!empty($_SERVER['HTTPS'])) && ($_SERVER['HTTPS'] != 'off'))
	{
		/* SSL/TLS detected. Use secure protocol. */

		$protocol = 'https://';
	}
else
	{
		/* No SSL/TLS detected. Do NOT use secure protocol. */

		$protocol = 'http://';
	};

$server_name = $_SERVER["SERVER_NAME"];

$cur_path = $_SERVER['REQUEST_URI'];

$server_url = getDomain($protocol.$server_name);

if (empty($server_url))
	{
		$server_url = $server_name;
	};

$subdomain = preg_replace("/\.$/","",(str_replace($server_url, "", $server_name)));

if (empty($subdomain))
	{
		$subdomain = "www";
	};

/* * * * * * * * * * * SUBROUTINE: Find any given websites [ domain name ] ONLY, without any subdomain (e.g. [ example.co.uk ]), and assign the value to '$server_url' variable. [END] * * * * * * * * * * *  */

/* Declare domain-related variables. [BEGIN] */

/* Get the fully-qualified domain name (FQDN) of the primary website (e.g. [ https://www.example.com ]). [BEGIN] */

$prm_website_fqdn = $protocol."www.".$server_url;

/* Get the fully-qualified domain name (FQDN) of the primary website (e.g. [ https://www.example.com ]). [END] */

/* Get the fully-qualified domain name (FQDN) of the current website (e.g. [ https://current-3ld.example.com ]). [BEGIN] */

$cur_website_fqdn = $protocol.$subdomain.".".$server_url;

/* Get the fully-qualified domain name (FQDN) of the current website (e.g. [ https://current-3ld.example.com ]). [END] */

/* Get the complete URL address to the current web page, on the Internet (e.g. [ https://www.example.com/index.php ]). [BEGIN] */

$cur_web_page_cmpl_url_addr = $cur_website_fqdn.$cur_path;

/* Get the complete URL address to the current web page, on the Internet (e.g. [ https://www.example.com/index.php ]). [END] */

/* Get the canonical URL address to the current web page, on the Internet (e.g. [ https://www.example.com/page.php ], or [ https://www.example.com ], but NOT [ https://www.example.com/index.php ], or [ https://www.example.com/ ]). [BEGIN] */

$cur_web_page_canonical_url_addr = preg_replace('/((\\index)\.[a-z]+)$/', '', $cur_web_page_cmpl_url_addr); /* Removes any known [ default directory index ] page path of the URL address, but NOT other [ ordinary ] page paths. */

$cur_web_page_canonical_url_addr = rtrim($cur_web_page_canonical_url_addr, '/'); /* Removes any trailing forward slash ('/') from the end of the URL. */

/* Get the canonical URL address to the current web page, on the Internet (e.g. [ https://www.example.com/page.php ], or [ https://www.example.com ], but NOT [ https://www.example.com/index.php ], or [ https://www.example.com/ ]). [END] */

/* Get the primary websites version of the current page (e.g. used at [ https://m.example.com/about.php ], would produce [ https://www.example.com/about.php ]). Typically used for canonical links on mobile-only subdomains. [BEGIN] */

$prm_website_ver = $prm_website_fqdn.$cur_path;

/* Get the primary websites version of the current page (e.g. used at [ https://m.example.com/about.php ], would produce [ https://www.example.com/about.php ]). Typically used for canonical links on mobile-only subdomains. [END] */

/* Declare domain-related variables. [END] */

?>