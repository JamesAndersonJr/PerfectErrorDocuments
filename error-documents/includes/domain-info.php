<?php

/* Function returns just the [ root domain name ] (without any subdomain) of a valid URL string (e.g., getDomain('https://testing.multiple.subdomain.example.co.uk'); returns 'example.co.uk'). [BEGIN] */

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

/* Function returns just the [ root domain name ] (without any subdomain) of a valid URL string (e.g., getDomain('https://testing.multiple.subdomain.example.co.uk'); returns 'example.co.uk'). [END] */

$prot = '//'; /* Default protocol */

if ((!empty($_SERVER['HTTPS'])) && ($_SERVER['HTTPS'] != 'off'))
	{
		$prot = 'https://'; /* SSL/TLS detected. Use secure protocol. */
	}
else
	{
		$prot = 'http://'; /* No SSL/TLS detected. Do NOT use secure protocol. */
	};

$svr_nm = $_SERVER['SERVER_NAME'];

$cur_pth = $_SERVER['REQUEST_URI'];

$svr_url = getDomain($prot.$svr_nm);

if (empty($svr_url))
	{
		$svr_url = $svr_nm;
	};

$submn = preg_replace('/\.$/','',(str_replace($svr_url, '', $svr_nm)));

if (empty($submn))
	{
		$submn = 'www';
	};

/* Get the fully-qualified domain name (FQDN) of the primary website (e.g., used at [ https://sub.example.com/about.php?abc=123 ], would return [ https://www.example.com ]). [BEGIN] */

$pri_site_fqdn = $prot.'www.'.$svr_url;

/* Get the fully-qualified domain name (FQDN) of the primary website (e.g., used at [ https://sub.example.com/about.php?abc=123 ], would return [ https://www.example.com ]). [END] */

/* Get the fully-qualified domain name (FQDN) of the current website (e.g., used at [ https://sub.example.com/about.php?abc=123 ], would return [ https://sub.example.com ]). [BEGIN] */

$cur_site_fqdn = $prot.$submn.'.'.$svr_url;

/* Get the fully-qualified domain name (FQDN) of the current website (e.g., used at [ https://sub.example.com/about.php?abc=123 ], would return [ https://sub.example.com ]). [END] */

/* Get the primary websites version of the current page (e.g., used at [ https://sub.example.com/about.php?abc=123 ], would return [ https://www.example.com/about.php?abc=123 ]). Typically used for canonical links on mobile-only subdomains. [BEGIN] */

$pri_site_ver = $pri_site_fqdn.$cur_pth;

/* Get the primary websites version of the current page (e.g., used at [ https://sub.example.com/about.php?abc=123 ], would return [ https://www.example.com/about.php?abc=123 ]). Typically used for canonical links on mobile-only subdomains. [END] */

/* Get the complete URL address to the current web page, on the Internet (e.g., used at [ https://sub.example.com/about.php?abc=123 ], would return [ https://www.example.com/about.php?abc=123 ]). [BEGIN] */

$cur_pg_cmpl_url_addr = $cur_site_fqdn.$cur_pth;

/* Get the complete URL address to the current web page, on the Internet (e.g., used at [ https://sub.example.com/about.php?abc=123 ], would return [ https://www.example.com/about.php?abc=123 ]). [END] */

/* Get the [no query string] URL address to the current web page, on the Internet (e.g., used at [ https://sub.example.com/about.php?abc=123 ], would return [ https://sub.example.com/about.php ]). [BEGIN] */

$cur_pg_no_qs_url_addr = strtok($cur_pg_cmpl_url_addr, '?');

/* Get the [no query string] URL address to the current web page, on the Internet (e.g., used at [ https://sub.example.com/about.php?abc=123 ], would return [ https://sub.example.com/about.php ]). [END] */

/* Get the canonical URL address to the current web page, on the Internet (e.g., used at [ https://sub.example.com/index.php?abc=123 ], would return [ https://sub.example.com?abc=123 ]). Allows for, and retains 'non-index' pages such as [ https://sub.example.com/page.php?abc=123 ]. [BEGIN] */

$cur_pg_canon_url_addr = preg_replace('/((\\index)\.[a-z]+)$/', '', $cur_pg_cmpl_url_addr); /* Removes any known [ default directory index ] page path of the URL address, but NOT other [ ordinary ] page paths. */

$cur_pg_canon_url_addr = rtrim($cur_pg_canon_url_addr, '/'); /* Removes any trailing forward slash ('/') from the end of the URL. */

/* Get the canonical URL address to the current web page, on the Internet (e.g., used at [ https://sub.example.com/index.php?abc=123 ], would return [ https://sub.example.com?abc=123 ]). Allows for, and retains 'non-index' pages such as [ https://sub.example.com/page.php?abc=123 ]. [END] */

/* Get the current URL 'file path', without any domain name, or query string. [BEGIN] */

$cur_url_f_pth = strtok($cur_pth, '?');

/* Get the current URL 'file path', without any domain name, or query string. [END] */

/* Get the current URL 'file directory', without any domain name, file name, or query string. [BEGIN] */

$cur_url_f_dir = substr($cur_url_f_pth, 0, strrpos($cur_url_f_pth, '/') + 1);

/* Get the current URL 'file directory', without any domain name, file name, or query string. [END] */

?>