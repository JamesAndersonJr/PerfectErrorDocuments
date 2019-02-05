<?php

/* Include "Forbidden" (Error 403) document, if available, and exit. Else, report the missing file, and exit. */

if ( file_exists(dirname(__FILE__)."/error403.php") )
	{
		include_once(dirname(__FILE__)."/error403.php");

		exit(0);
	}
else
	{
		$missing_file_line_num = intval(__LINE__) - 8;

		error_log("A file is missing on line (".$missing_file_line_num.") of file: ".__FILE__.".", 0);

		exit(0);
	};

?>