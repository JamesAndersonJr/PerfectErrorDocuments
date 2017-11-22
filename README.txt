Perfect Error Documents
=======================

The perfect PHP script for effectively managing most website error documents! 

-----------------------------------------------------------------------
Script Name: Perfect Error Documents | Version : 1.7.5
-----------------------------------------------------------------------

Author : James Anderson Jr. (Email: james@jamesandersonjr.com; Web: https://card.jamesandersonjr.com)

Website : https://www.perfecterrordocs.com

Download Address : https://www.perfecterrordocs.com/download/

License Address : https://www.perfecterrordocs.com/license/

Donation Address : https://www.perfecterrordocs.com/donate/

-----------------------------------------------------------------------
Copyright :
-----------------------------------------------------------------------

Copyright © 2017 James Anderson Jr.


This file is part of the "Perfect Error Documents v.1.x.x" online script.

'Perfect Error Documents' online script is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the full license agreement at [ https://perfecterrordocs.com/license/ ].

You should have received a PDF copy of the license agreement, along with your download of the **'Perfect Error Documents'** online script. If not, please visit: [ https://perfecterrordocs.com/license/ ], for your free copy.

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

2.) Change the line `$webmaster_link = "/contact_webmaster.php";` to the real location of your webmasters contact page (e.g. `$webmaster_link = "/contact_us.php";`).
    Please Note: This can be a relative URL (as shown above), an absolute URL, or a '`MailTo:`' email link. Just make sure it points to the correct location of your webmasters contact info.
    
3.) Update the line `$facebook_app_id = "";` to include your Facebook App ID, if you have one. If not, you can get one here: [ https://developers.facebook.com ].

4.) Update the line `$og_locale = "";` to include your websites current locale. Use the format: `language_TERRITORY`. For a list of valid locales, visit: [ http://fbdevwiki.com/wiki/Locales ].

5.) Save, and close, the 'config.php' file.

6.) Upload the entire 'error_documents' folder into the root directory of your website (usually the 'public_html' directory), NOT into the root directory of your entire web server, unless you know what you're doing!

7.) Add the below lines in your '.htaccess' file (if you don't have one, create one) in the root of your website:


#######################---Specify error documents---#######################

# 401-Authorization Required Error
 
ErrorDocument 401 /error_documents/error401.php

# 403-Forbidden Error
 
ErrorDocument 403 /error_documents/error403.php

# 404-File Not Found Error
 
ErrorDocument 404 /error_documents/error404.php

# 500-Internal Server Error
 
ErrorDocument 500 /error_documents/error500.php

#######################################################################

8.) That's it! Enjoy your new installation of 'Perfect Error Documents' online script!
