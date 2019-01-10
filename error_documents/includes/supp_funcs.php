<?php

/* Some additional, supplementary, supporting functions to better utilize the 'Perfect Error Documents' online script. [BEGIN] */

function callErrorPage($httpStatusCode)
	{
		$validHTTPStatusCode = '';
		
		switch (strval($httpStatusCode))
			{
				case '401':
					$validHTTPStatusCode = '401';
					break;
				case '403':
					$validHTTPStatusCode = '403';
					break;
				case '404':
					$validHTTPStatusCode = '404';
					break;
				case '500':
					$validHTTPStatusCode = '500';
					break;
				default:
					return false;
			};
			
		if (!empty($validHTTPStatusCode))
			{
				if ( file_exists(dirname(__FILE__).'/../error'.$validHTTPStatusCode.'.php') )
					{
						if (!headers_sent())
							{
								/* Redirect user to error document. [BEGIN] */

								header('Location: /error_documents/error'.$validHTTPStatusCode.'.php');
								exit(0);

								/* Redirect user to error document. [END] */
							}
						else
							{
								/* Include error document contents, and exit. [BEGIN] */

								include_once(dirname(__FILE__).'/../error'.$validHTTPStatusCode.'.php');
								exit(0);

								/* Include error document contents, and exit. [BEGIN] */
							};
					}
				else
					{
						/* Else, report missing file, and exit. [BEGIN] */

						$missing_file_line_num = intval(__LINE__) - 25;

						error_log("A file is missing on line (".$missing_file_line_num.") of file: ".__FILE__.".", 0);

						exit(0);

						/* Else, report missing file, and exit. [END] */
					};
			}
		else
			{
				/* The caller passed an invalid/unsupported HTTP status code ($HTTPStatusCode) into the function, as an argument, so we're not going to process it. [BEGIN] */

				return false;

				/* The caller passed an invalid/unsupported HTTP status code ($HTTPStatusCode) into the function, as an argument, so we're not going to process it. [END] */
			};
	};

/* Some additional, supplementary, supporting functions to better utilize the 'Perfect Error Documents' online script. [END] */

?>