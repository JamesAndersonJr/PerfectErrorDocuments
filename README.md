Perfect Error Documents
=======================

The perfect PHP script for effectively managing most website error documents! 

-----------------------------------------------------------------------
Script Name: Perfect Error Documents | Version : 1.7.1
-----------------------------------------------------------------------

Author : James Anderson Jr. (Email: james@jamesandersonjr.com; Web: http://www.jamesandersonjr.com)

Website : http://www.perfecterrordocs.com

Download Address : http://www.perfecterrordocs.com/download/

License Address : http://www.perfecterrordocs.com/license/

Donation Address : http://www.perfecterrordocs.com/donate/

-----------------------------------------------------------------------
Copyright :
-----------------------------------------------------------------------

Copyright © 2017 James Anderson Jr.


This file is part of the "Perfect Error Documents v.1.x.x" online script.

'Perfect Error Documents' online script is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the full license agreement at [ http://perfecterrordocs.com/license/ ].

You should have received a PDF copy of the license agreement, along with your download of 'Perfect Error Documents' online script. If not, please visit: [ http://perfecterrordocs.com/license/ ], for your free copy.

For support, and all other inquiries, please feel free to email us at: support [at] perfecterrordocs [dot] com.

-----------------------------------------------------------------------
SYSTEM REQUIREMENTS :
-----------------------------------------------------------------------

Web Server : Apache 2.x hosted on UNIX/Linux

PHP : PHP 5.4.x or Later

Database : Not Required

-----------------------------------------------------------------------
TO INSTALL :
-----------------------------------------------------------------------

1.) Open 'config.php' located inside 'error_documents/config/' folder, with your favorite html/php code editor (Notepad++ is highly recommended).

2.) Change the line '$webmaster_link = "/contact_webmaster.php";' to the real location of your webmasters contact page (e.g. $webmaster_link = "/contact_us.php";).
    Please Note: This can be a relative URL (as shown above), an absolute URL, or a 'MailTo:' email link. Just make sure it points to the correct location of your webmasters contact info.

3.) Save and close config.php.

4.) Upload "error_documents" folder into your root (topmost) public html directory. 

5.) Add the below lines in your .htaccess file (if you don't have one, create one) in the root directory of your server:


###################---Specify error documents---#######################

401-Authorization Required Error
 
ErrorDocument 401 /error_documents/error401.php

403-Forbidden Error
 
ErrorDocument 403 /error_documents/error403.php

404-File Not Found Error
 
ErrorDocument 404 /error_documents/error404.php

500-Internal Server Error
 
ErrorDocument 500 /error_documents/error500.php

#######################################################################
