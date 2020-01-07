<?php

/* * * * * * * * * * * SUBROUTINE: Find any given websites [ root domain name ] ONLY, without any subdomain (e.g. [ example.co.uk ]), and assign the value to '$svr_url' variable. [BEGIN] * * * * * * * * * *  */

/* Function returns just the [ root domain name ] (without any subdomain) of a valid URL string (e.g. getDomain('https://testing.multiple.subdomain.example.co.uk'); returns 'example.co.uk'). [BEGIN] */

function getDomain($url)
	{
		$parsd = parse_url($url);
		$dmn = isset($parsd['host'])? $parsd['host'] : '';

		if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $dmn, $regs))
			{
				return $regs['domain'];
			};

		return false;
	};

/* Function returns just the [ root domain name ] (without any subdomain) of a valid URL string (e.g. getDomain('https://testing.multiple.subdomain.example.co.uk'); returns 'example.co.uk'). [END] */

/* Default protocol */

$prot = '//';

if ((!empty($_SERVER['HTTPS'])) && ($_SERVER['HTTPS'] != 'off'))
	{
		/* SSL/TLS detected. Use secure protocol. */

		$prot = 'https://';
	}
else
	{
		/* No SSL/TLS detected. Do NOT use secure protocol. */

		$prot = 'http://';
	};

$svr_nm = $_SERVER['SERVER_NAME'];
$cur_pth = $_SERVER['REQUEST_URI'];
$svr_url = getDomain($prot.$svr_nm);

if (empty($svr_url))
	{
		$svr_url = $svr_nm;
	};

$sbdmn = preg_replace('/\.$/','',(str_replace($svr_url, '', $svr_nm)));

if (empty($sbdmn))
	{
		$sbdmn = 'www';
	};

/* * * * * * * * * * * SUBROUTINE: Find any given websites [ root domain name ] ONLY, without any subdomain (e.g. [ example.co.uk ]), and assign the value to '$svr_url' variable. [END] * * * * * * * * * * *  */

/* Declare domain-related variables. [BEGIN] */

/* Get the fully-qualified domain name (FQDN) of the primary website (e.g. [ https://www.example.com ]). [BEGIN] */

$pri_site_fqdn = $prot.'www.'.$svr_url;

/* Get the fully-qualified domain name (FQDN) of the primary website (e.g. [ https://www.example.com ]). [END] */

/* Get the fully-qualified domain name (FQDN) of the current website (e.g. [ https://current-3ld.example.com ]). [BEGIN] */

$cur_site_fqdn = $prot.$sbdmn.'.'.$svr_url;

/* Get the fully-qualified domain name (FQDN) of the current website (e.g. [ https://current-3ld.example.com ]). [END] */

/* Get the complete URL address to the current web page, on the Internet (e.g. [ https://www.example.com/index.php ]). [BEGIN] */

$cur_pg_cmpl_url_addr = $cur_site_fqdn.$cur_pth;

/* Get the complete URL address to the current web page, on the Internet (e.g. [ https://www.example.com/index.php ]). [END] */

/* Get the canonical URL address to the current web page, on the Internet (e.g. [ https://www.example.com/page.php ], or [ https://www.example.com ], but NOT [ https://www.example.com/index.php ], or [ https://www.example.com/ ]). [BEGIN] */

$cur_pg_canon_url_addr = preg_replace('/((\\index)\.[a-z]+)$/', '', $cur_pg_cmpl_url_addr); /* Removes any known [ default directory index ] page path of the URL address, but NOT other [ ordinary ] page paths. */

$cur_pg_canon_url_addr = rtrim($cur_pg_canon_url_addr, '/'); /* Removes any trailing forward slash ('/') from the end of the URL. */

/* Get the canonical URL address to the current web page, on the Internet (e.g. [ https://www.example.com/page.php ], or [ https://www.example.com ], but NOT [ https://www.example.com/index.php ], or [ https://www.example.com/ ]). [END] */

/* Get the primary websites version of the current page (e.g. used at [ https://m.example.com/about.php ], would produce [ https://www.example.com/about.php ]). Typically used for canonical links on mobile-only subdomains. [BEGIN] */

$pri_site_ver = $pri_site_fqdn.$cur_pth;

/* Get the primary websites version of the current page (e.g. used at [ https://m.example.com/about.php ], would produce [ https://www.example.com/about.php ]). Typically used for canonical links on mobile-only subdomains. [END] */

/* Get the current URL 'file path', without any domain name, or query string. [BEGIN] */

$cur_url_f_pth = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '?'));

/* Get the current URL 'file path', without any domain name, or query string. [END] */

/* Get the current URL 'file directory', without any domain name, file name, or query string. [BEGIN] */

$cur_url_f_dir = substr($cur_url_f_pth, 0, strrpos($cur_url_f_pth, '/') + 1);

/* Get the current URL 'file directory', without any domain name, file name, or query string. [END] */

/* Declare domain-related variables. [END] */

?>