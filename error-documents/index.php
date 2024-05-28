<?php

/* Include 'Forbidden' (Error 403) document, if available, and exit. Else, report the missing file, and exit. [BEGIN] */

if (file_exists(dirname(__FILE__).'/error403.php'))
	{
		include_once(dirname(__FILE__).'/error403.php');
	}
else
	{
		$missing_file_line_num = intval(__LINE__) - 6;

		error_log('A file is missing on line ('.$missing_file_line_num.') of file: '.__FILE__.'.', 0);
	};

exit(0);

/* Include 'Forbidden' (Error 403) document, if available, and exit. Else, report the missing file, and exit. [END] */

?>