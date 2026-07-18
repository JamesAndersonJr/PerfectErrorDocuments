<?php

/* Function can be used to directly call/fetch/summon an available error page, by its corresponding HTTP status code. [BEGIN] */

function callErrorPage($http_status_code)
	{
		$sptd_http_status_codes_array = array('401', '403', '404', '500'); /* An array list of the available supported HTTP status codes. */

		if (in_array(strval($http_status_code), $sptd_http_status_codes_array))
			{
				$sptd_http_status_code = strval($http_status_code);
			}
		else
			{
				return false; /* The caller passed an unsupported HTTP status code ($http_status_code) into the function as an argument, so we're not going to process it. */
			};

		if (file_exists(dirname(__FILE__).'/../error'.$sptd_http_status_code.'.php')) /* First, let's check if the error page that handles that HTTP status code actually exists on the server. */
			{
				if (!headers_sent()) /* If headers have not already been sent, up to this point... */
					{
						header('Location: /error-documents/error'.$sptd_http_status_code.'.php'); /* Attempt to redirect the end-user to the function caller's requested error page, and exit. */
					}
				else /* Else... */
					{
						include_once(dirname(__FILE__).'/../error'.$sptd_http_status_code.'.php'); /* Attempt to include the contents of the function caller's requested error page into its own file, and exit. */
					};
			}
		else /* The error page that handles that HTTP status code is not present on the server, where it should be, so report the missing file, and exit. */
			{
				$missing_file_line_num = intval(__LINE__) - 15;
				error_log('A file is missing on line ('.$missing_file_line_num.') of file: '.__FILE__.'.', 0);
			};

		exit(0);
	};

/* Function can be used to directly call/fetch/summon an available error page, by its corresponding HTTP status code. [END] */

/* Function returns the MIME type of a file, based solely on its extension (i.e., without actually attempting to request the contents of the file from any source, or even attempting to verify that the file actually exists). [BEGIN] */

if (!function_exists('getMimeTypeFromFileNameOnly'))
	{
		function getMimeTypeFromFileNameOnly($file_nm)
			{
				if (pathinfo($file_nm, PATHINFO_EXTENSION))
					{
						$ext = pathinfo($file_nm, PATHINFO_EXTENSION);
					}
				else
					{
						$ext = explode('.', $file_nm);
						$cnt_expl = count($ext);
						$ext = strtolower($ext[$cnt_expl - 1]);
					};

				$mime_type = array(
				'txt' => 'text/plain', 'htm' => 'text/html', 'html' => 'text/html', 'php' => 'text/html', 'css' => 'text/css', 'ttl' => 'text/turtle',

				'js' => 'application/javascript', 'json' => 'application/json', 'jsonld' => 'application/ld+json', 'xml' => 'application/xml', 'smil' => 'application/smil',

				/* Images */

				'png' => 'image/png', 'apng' => 'image/apng', 'jpe' => 'image/jpe', 'jpeg' => 'image/jpeg', 'jpg' => 'image/jpg', 'gif' => 'image/gif', 'bmp' => 'image/bmp', 'xbm' => 'image/xbm', 'ico' => 'image/x-icon', 'tiff' => 'image/tiff', 'tif' => 'image/tif', 'svg' => 'image/svg+xml', 'svgz' => 'image/svg+xml', 'webp' => 'image/webp', 'avif' => 'image/avif',

				/* Archives */

				'zip' => 'application/zip', 'rar' => 'application/x-rar-compressed', 'exe' => 'application/x-msdownload', 'msi' => 'application/x-msdownload', 'cab' => 'application/vnd.ms-cab-compressed',

				/* Audio */

				'mp3' => 'audio/mpeg', 'm4a' => 'audio/mp4', 'wav' => 'audio/x-wav', 'aiff' => 'audio/x-aiff', 'aifc' => 'audio/x-aiff', 'ogg' => 'audio/ogg', 'oga' => 'audio/ogg', 'spx' => 'audio/ogg', 'opus' => 'audio/ogg', 'flac' => 'audio/flac',

				/* Video */

				'mp4' => 'video/mp4', 'mpg' => 'video/mpeg', 'mpeg' => 'video/mpeg', 'avi' => 'video/x-msvideo', 'wmv' => 'video/x-ms-wmv', 'ogv' => 'video/ogg', '3gp' => 'video/3gpp', '3gpp' => 'video/3gpp', '3g2' => 'video/3gpp2', '3gpp2' => 'video/3gpp2', 'mov' => 'video/quicktime', 'qt' => 'video/quicktime', 'flv' => 'video/x-flv',

				/* Adobe */

				'pdf' => 'application/pdf', 'psd' => 'image/vnd.adobe.photoshop', 'ai' => 'application/postscript', 'eps' => 'application/postscript', 'ps' => 'application/postscript', 'swf' => 'application/x-shockwave-flash',

				/* MS Office */

				'doc' => 'application/msword', 'rtf' => 'application/rtf', 'xls' => 'application/vnd.ms-excel', 'ppt' => 'application/vnd.ms-powerpoint', 'docx' => 'application/msword', 'xlsx' => 'application/vnd.ms-excel', 'pptx' => 'application/vnd.ms-powerpoint',

				/* Open Office */

				'odt' => 'application/vnd.oasis.opendocument.text', 'ods' => 'application/vnd.oasis.opendocument.spreadsheet'
				);

				if (isset($mime_type[$ext]))
					{
						return $mime_type[$ext];
					}
				else
					{
						return 'application/octet-stream';
					};
			};
	};

/* Function returns the MIME type of a file, based solely on its extension (i.e., without actually attempting to request the contents of the file from any source, or even attempting to verify that the file actually exists). [END] */

$fke_usr_agnts_arr = array
	(
		'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',
		'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36',
		'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36',
		'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
		'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36',
		'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36'
	);

/* Function tests if a file exists at a remote URL using cURL. PHP’s integrated function ‘file_exists()’ only works on local server paths (i.e., on your own server). This function should work on most remote URLs. [BEGIN] */

if (!function_exists('doesFileExistAtURL'))
	{
		function doesFileExistAtURL($file_url)
			{
				global $fke_usr_agnts_arr;

				if (!extension_loaded('curl'))
					{
						error_log('cURL extension is not loaded in PHP.');
						return false;
					};

				$timeout = 10;
				$usr_agnts = $fke_usr_agnts_arr;
				$user_agent = (!empty($usr_agnts)) ? $usr_agnts[array_rand($usr_agnts)] : 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)';

				$ch = curl_init();

				curl_setopt_array($ch,
					[
						CURLOPT_URL => $file_url,
						CURLOPT_NOBODY => true,           /* Send a HEAD request to only get headers, not the body. */
						CURLOPT_RETURNTRANSFER => true,   /* Return the response instead of outputting it. */
						CURLOPT_FOLLOWLOCATION => true,   /* Automatically follow redirects (301, 302, etc.). */
						CURLOPT_MAXREDIRS => 5,           /* Limit redirects to prevent infinite loops. */
						CURLOPT_TIMEOUT => $timeout,      
						CURLOPT_USERAGENT => $user_agent, 
						CURLOPT_SSL_VERIFYPEER => false,   /* Enforce SSL verification. */
						CURLOPT_SSL_VERIFYHOST => false
					]);

				$response = curl_exec($ch);

				if ($response === false)
					{
						error_log('cURL Error for URL: ' . $file_url . ' - Reason: ' . curl_error($ch));
						curl_close($ch);
						return false;
					};

				$http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				$final_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); /* Grabs the final URL after all redirects. */

				curl_close($ch);

				if ($http_status_code >= 200 && $http_status_code < 300)
					{
						/* Check MIME type, if function exists */
						if (function_exists('getMimeTypeFromFileNameOnly'))
							{
								$expected_mime_type = getMimeTypeFromFileNameOnly(pathinfo($file_url, PATHINFO_BASENAME));
								$final_mime_type = getMimeTypeFromFileNameOnly(pathinfo($final_url, PATHINFO_BASENAME));

								if (($expected_mime_type && $final_mime_type) && ($expected_mime_type !== $final_mime_type))
									{
										return false; /* MIME type mismatch. */
									};
							};

						return true; /* File exists, is accessible, and MIME type matches. */
					};


				return false; /* Handle 404s and other error codes. */
			};
	};

/* Function tests if a file exists at a remote URL using cURL. PHP’s integrated function ‘file_exists()’ only works on local server paths (i.e., on your own server). This function should work on most remote URLs. [END] */

?>