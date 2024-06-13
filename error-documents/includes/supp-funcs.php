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

/* Function tests if a file exists at a remote URL. PHP’s integrated function ‘file_exists()’ only works on local server paths (i.e., on your own server). This function works on most remote URLs. [BEGIN] */

if (!function_exists('doesFileExistAtURL'))
	{
		function doesFileExistAtURL($file_url)
			{
				if (get_headers($file_url))
					{
						$hdrs = get_headers($file_url); /* Use 'get_headers' first, as it's much faster than cURL. */

						if ((stripos($hdrs[0], '301 Moved Permanently') !== false) || (stripos($hdrs[0], '302 Moved Temporarily') !== false)) /* If '301 Moved Permanently' or '302 Moved Temporarily' is found in $hdrs[0], then... */
							{
								$ch = curl_init();

								curl_setopt($ch, CURLOPT_URL, $file_url);
								curl_setopt($ch, CURLOPT_AUTOREFERER, true);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
								curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); /* Don't Verify Host SSL. */
								curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); /* Don't Verify Peer SSL. */
								curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
								curl_setopt($ch, CURLOPT_MAXREDIRS, 4);
								curl_setopt($ch, CURLOPT_HEADER, true);
								curl_setopt($ch, CURLOPT_NOBODY, true);

								$resp_cont = curl_exec($ch);
								$cont_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
								$resp_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
								$finl_dest = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

								curl_close($ch);

								/* Check the response code. */

								if (preg_match('/^2\d{2}$/', trim(strval($resp_code)))) /* If the response code is any number in the range of 200 - 299, then... */
									{
										if (pathinfo($file_url, PATHINFO_EXTENSION)) /* If the originally requested file has an extension, then... */
											{
												$file_url_ext = pathinfo($file_url, PATHINFO_EXTENSION);
												$ignr_ext_arr = array('php'); /* Build the ignored file extensions array. */

												if (!in_array(strtolower($file_url_ext), $ignr_ext_arr)) /* If the file extension of originally requested file is not in the ignored file extensions array, then... */
													{
														$expt_cont_type = strval(getMimeTypeFromFileNameOnly(pathinfo($file_url, PATHINFO_BASENAME))); /* Declare the 'expected' content type (e.g., 'image/png') from the base-name (e.g., 'example.png') of the originally requested file. */

														if (strpos(strval($cont_type), $expt_cont_type) === false) /* If the $expt_cont_type [ String ] is not a sub-string of the $cont_type [ String ], then... */
															{
																return false; /* Return false, because the content-type of the content that was actually served, is not the originally expected content type. So, no further checking is necessary. */
															};
													};
											};

										return true; /* Return true. */
									}
								else
									{
										return false; /* Else, return false. */
									};
							}
						elseif (stripos($hdrs[0], '404 Not Found') !== false) /* Else, If '404 Not Found' is found in $hdrs[0], then... */
							{
								return false;
							}
						else
							{
								return true;
							};
					}
				else
					{
						return false;
					};
			};
	};

/* Function tests if a file exists at a remote URL. PHP’s integrated function ‘file_exists()’ only works on local server paths (i.e., on your own server). This function works on most remote URLs. [END] */

?>