<?php

/* Some additional, supplementary, supporting functions to better utilize the 'Perfect Error Documents' online script. [BEGIN] */

/* The function [BELOW] can be used to directly fetch/call/summon an available error page, by it's corresponding HTTP status code. [BEGIN] */

function callErrorPage($http_status_code)
	{
		$sptd_http_status_codes_array = array('401', '403', '404', '500'); /* An array list of the available supported HTTP status codes. */

		if (in_array(strval($http_status_code), $sptd_http_status_codes_array))
			{
				$sptd_http_status_code = $http_status_code;
			}
		else
			{
				return false; /* The caller passed an unsupported HTTP status code ($http_status_code) into the function, as an argument, so we're not going to process it. */
			};

		if (file_exists(dirname(__FILE__).'/../error'.$sptd_http_status_code.'.php')) /* First, let's check if the error page that handles that HTTP status code actually exists on the server. */
			{
				if (!headers_sent()) /* If headers have not already been sent, up to this point... */
						{
							header('Location: /error_documents/error'.$sptd_http_status_code.'.php'); /* Attempt to redirect the end-user to the function caller's requested error page, and exit. */
							exit(0);
						}
					else /* Else... */
						{
							include_once(dirname(__FILE__).'/../error'.$sptd_http_status_code.'.php'); /* Attempt to include the the function caller's requested error page's contents into its own file, and exit. */
							exit(0);
						};
			}
		else /* The error page that handles that HTTP status code is not present on the server, where it should be, so report the missing file, and exit. */
			{
				$missing_file_line_num = intval(__LINE__) - 15;
				error_log("A file is missing on line (".$missing_file_line_num.") of file: ".__FILE__.".", 0);
				exit(0);
			};
	};

/* The function [ABOVE] can be used to directly fetch/call/summon an available error page, by it's corresponding HTTP status code. [END] */

/* Some additional, supplementary, supporting functions to better utilize the 'Perfect Error Documents' online script. [END] */

?>