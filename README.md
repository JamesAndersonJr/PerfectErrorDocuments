# Perfect Error Documents #
- - - -

*“The perfect PHP script for effectively managing most website error documents!”*

## Script Name : Perfect Error Documents | Version : 3.0.0 ##

Author : James Anderson Jr. (Email: [james@jamesandersonjr.com](https://www.jamesandersonjr.com/contact-james.php "Contact the Author via Email"); Web : [https://card.jamesandersonjr.com](https://card.jamesandersonjr.com "View the Author’s Website"))

Website : [https://www.perfecterrordocs.com](https://www.perfecterrordocs.com "View Perfect Error Document’s &#010;Official Website")

Download Address : [https://www.perfecterrordocs.com/download/](https://www.perfecterrordocs.com/download/ "Download Perfect Error Documents")

License Address : [https://www.perfecterrordocs.com/license/](https://www.perfecterrordocs.com/license/ "View the Perfect Error Documents &#010;License Agreement")

Demo Address : [https://www.perfecterrordocs.com/demo/](https://www.perfecterrordocs.com/demo/ "Try the Perfect Error Documents &#010;Live Interactive Demo.")

- - - -
## Copyright : ##

Copyright © 2020 James Anderson Jr.

This file is part of the **“Perfect Error Documents v.3.x.x” online script**.

**“Perfect Error Documents” (“PED”) online script** is distributed in the hope that it will be useful, but **WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE**. See the full “PED” license agreement at [ [https://www.perfecterrordocs.com/license/](https://www.perfecterrordocs.com/license/ "View the Perfect Error Documents &#010;License Agreement") ].

You should have received a PDF copy of the license agreement, along with your download of the **“PED” online script**. If not, please visit: [ [https://www.perfecterrordocs.com/license/](https://www.perfecterrordocs.com/license/ "View the Perfect Error Documents &#010;License Agreement") ], for your free copy.

For support, and all other inquiries, please feel free to email us at: **cs [at] perfecterrordocs [dot] com**.

- - - -
## System Requirements : ##

**Web Server :** Apache 2.x (or later) hosted on UNIX/Linux

**PHP :** PHP 5.4.x (or later)

**Database :** *Not Required*

- - - -
## To Install : ##

 1.	Unzip the downloaded [***‘PerfectErrorDocuments.zip’***](https://www.perfecterrordocs.com/download/ "Download the ‘PerfectErrorDocuments.zip’ &#010; Web Package From PED’s Official Website") ([***‘PerfectErrorDocuments-master.zip’***](https://github.com/JamesAndersonJr/PerfectErrorDocuments/archive/master.zip "Download the ‘PerfectErrorDocuments-master.zip’ &#010; Web Package Directly From GitHub") on **GitHub**) web package contents into an off-line repository of your website, with the ***‘error_documents’*** folder being a ***direct*** sub-directory of the root of your website’s tree. (e.g. ***‘/public_html/error_documents/’*** )

 2. Open ***‘config.php’*** located inside ***‘/error_documents/config/’*** folder, with your favorite HTML/PHP code editor ([**Notepad++**](https://notepad-plus-plus.org "Get Notepad++") is highly recommended).

 3. Locate, and update line | **47** |, as shown below, to the actual location of your webmasters contact page.

 **47** |`$wbmstr_lnk = '/contact_webmaster.php';`

  (e.g. `$wbmstr_lnk = '/contact_wm.php';`)

  >***Side Note:*** *| This can be a relative URL, a root-relative URL (as shown above), an absolute URL, or a `'MailTo:'` email link. Just make sure it points to the correct location of your webmasters contact info.*

 4. Locate, and update line | **51** |, as shown below, to include your **‘Facebook App ID’**, if you have a **‘Facebook App’**. If not, you can create one [**here**](https://developers.facebook.com "Create a Facebook App").

 **51** |`$fb_app_id = '';`

 5. Locate, and update line | **53** |, as shown below, to include your **‘Facebook Page ID’**, if you have a **‘Facebook Page’**. If not, you can create one [**here**](https://www.facebook.com/pages/creation/ "Create a Facebook Page").

 **53** |`$fb_pg_id = '';`

 >***Side Note:*** *| You must be signed into an active [**Facebook**](https://www.facebook.com "Go to Facebook") account, in order to create a new **‘Facebook App’**, or a new* ***‘Facebook Page’***.

 6. Locate, and update line | **57** |, as shown below, to include your **[‘Twitter’](https://twitter.com "Visit Twitter") username**, if you have a **‘Twitter’** account for your website. If not, you can create one [**here**](https://twitter.com/signup "Create a Twitter Account").

 **57** |`$twtr_usrn = '';`

 >***Side Note:*** *| ALL of the social media account PHP variables, such as `$fb_app_id`, `$fb_pg_id`, and `$twtr_usrn` will gracefully fallback to PED's own default social media account information, if you do not enter any overriding values of your own (So, if you skip steps (4-6), and you decide to leave one, or more, of them blank, it won't break anything).*

 7. Locate, and update line | **61** |, as shown below, to include your websites current locale. Use the format: `'language_TERRITORY'`. For a list of valid locales, visit: [ [https://fbdevwiki.com/wiki/Locales](https://fbdevwiki.com/wiki/Locales "View a List of Valid Locales") ].

  **61** |`$locale = '';`

 8. Save, and close, the ***‘config.php’*** file.

 9. Upload the entire ***‘error_documents’*** folder into the root directory of your website (usually the ***‘public_html’*** directory).

 >***Side Note:*** *| For ‘add-on domains’ and ‘subdomains’ usually not accessed directly under the web server’s primary root directory (e.g. **‘public_html’**), please relocate the **‘error_documents’** folder into the directory that your ‘add-on domain’ or ‘subdomain’ points to, in order to use the script for that website.*

 10. Finally, add the below lines of code, into your ***‘.htaccess’*** file, in the root directory of the same website you intend to deploy the “PED” script (*See previous **‘Side Note’*** ). If you don't have an ***‘.htaccess’*** file, already, you will need to create one, now.

```apache
# ###################---Specify Error Documents---################### #

# Error - [401] Unauthorized

ErrorDocument 401 /error_documents/error401.php

# Error - [403] Forbidden

ErrorDocument 403 /error_documents/error403.php

# Error - [404] Not Found

ErrorDocument 404 /error_documents/error404.php

# Error - [500] Internal Server Error

ErrorDocument 500 /error_documents/error500.php

# ################################################################### #
```

That’s it! Your new installation of the **[‘PED’](https://www.perfecterrordocs.com "View Perfect Error Document’s &#010;Official Website") online script** is now complete.&#128515;&#128077;

Congratulations on obtaining, and installing your *personal* copy of the **[‘PED’](https://www.perfecterrordocs.com "View Perfect Error Document’s &#010;Official Website") online script**.&#128079;

- - - -
## Support : ##

>&#128161; ***Remember:*** *| For support, and all other inquiries, please feel free to email us 24/7 at: cs&nbsp;[at]&nbsp;perfecterrordocs&nbsp;[dot]&nbsp;com.*

- - - -
## Donations : ##

>&#128161; ***Remember:***  | 100% voluntary donations are currently being accepted through our [Official Website](https://www.perfecterrordocs.com/ "View Perfect Error Document’s &#010;Official Website") at [ [https://www.perfecterrordocs.com/donate/](https://www.perfecterrordocs.com/donate/ "Make a Donation Toward the Development &#010;of Perfect Error Documents") ]. We would surely appreciate your support! &#10084;

### Thank You for choosing “PED!” &#10084;
#### We look forward to serving you!