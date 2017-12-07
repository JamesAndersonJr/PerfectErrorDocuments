<?php

/* Get the 'best known' client IP. */

if (!function_exists('getClientIP'))
	{
		function getClientIP()
			{
				if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) 
					{
						$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
					};
				
				foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)
					{
						if (array_key_exists($key, $_SERVER)) 
							{
								foreach (explode(',', $_SERVER[$key]) as $ip)
									{
										$ip = trim($ip);
										
										if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
											{
												return $ip;
											};
									};
							};
					};
				
				return false;
			};
	};
	
$best_known_ip = getClientIP();
	
if(!empty($best_known_ip))
	{
		$ip = $client_ip = $client_IP = $clients_IP = $best_known_ip;
	}
else
	{
		$ip = $client_ip = $client_IP = $clients_IP = $best_known_ip = '';
	};

?>