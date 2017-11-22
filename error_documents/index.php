<?php

/* Include "Forbidden" (Error 403) document, and exit. */

if ( file_exists(dirname(__FILE__)."/error403.php") )
	{
		require_once(dirname(__FILE__)."/error403.php");
		exit(0);
	}
else
	{
		exit(0);
	};

?>