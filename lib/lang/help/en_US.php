<?php
$lang['siteprefs_sitename'] = 'This is a human readable name for your website, i.e: the business, club, or organization name';
$lang['siteprefs_frontendlang'] = 'The default language that your webiste displays on the frontend.  This can be changed on a per-page basis using different smarty tags. i.e: <code>{cms_set_language}</code>';
$lang['siteprefs_frontendwysiwyg'] = 'When WYSIWYG editors are provided on frontend forms, what WYSIWYG module should be used?  Or none.';
$lang['siteprefs_nogcbwysiwyg'] = 'This option will disable the WYSIWYG editor on all global content blocks indepentent of user settings, or of the individual global content blocks';
$lang['siteprefs_globalmetadata'] = 'This textarea provides the ability to enter meta information that is relavent to all content pages.  This is an ideal location for meta tags such as Generator, and Author, etc';
$lang['siteprefs_logintheme'] = 'Select the admin theme (from installed admin themes) that will be used to generate the administrator login form, and as the default login theme for new admin user accounts.  Admin users will be able to select their preferred admin theme from within the user preferences panel.';
$lang['siteprefs_backendwysiwyg'] = 'Select the WYSIWYG editor for newly created admin user accounts.  Admin users will be able to select their preferred WYSIWYG editor from within the user preference panel.';
$lang['siteprefs_dateformat'] = '<p>Specify the date format string in <a href="http://ca2.php.net/manual/en/function.strftime.php">PHP strftime</a> format that will be used <em>(by default)</em> to display dates and times in your website.</p><p>Admin users can adjust these settings in the user preferences panel.</p><p><strong>Note:</strong> Some modules may choose to display times and dates differently</p>';
$lang['siteprefs_thumbwidth'] = 'Specify a width <em>(in pixels)</em> to be used by default when generating thumbnails from uploaded image files.  Thumbnails are typically displayed in the admin panel in the FileManager module or when selecting an image to insert into page content.  However, some modules may use the thumbnails on the website frontend.<br/><br/><strong>Note:</strong> Some modules may have additional preferences for how to generate thumbnails, and ignore this setting.';
$lang['siteprefs_thumbwidth'] = 'Specify a height <em>(in pixels)</em> to be used by default when generating thumbnails from uploaded image files.  Thumbnails are typically displayed in the admin panel in the FileManager module or when selecting an image to insert into page content.  However, some modules may use the thumbnails on the website frontend.<br/><br/><strong>Note:</strong> Some modules may have additional preferences for how to generate thumbnails, and ignore this setting.';
$lang['settings_searchmodule'] = 'Select the module that should be used to index words for searching, and will provide the site search capabilities';
$lang['settings_autocreate_url'] = 'When editing content pages, should SEF/pretty URLS be auto-created?  Auto creating URLS will have no effect if pretty urls are not enabled in the CMSMS config.php file.';
$lang['settings_nosefurl'] = 'To configure <strong>S</strong>each <strong>E</strong>ngine <strong>F</strong>riendly <em>(pretty)</em> URLs you need to edit a few lines in your config.php file and possibly to edit a .htaccess file or your web servers configuration.   You can read more about configuring pretty URLS <a href="http://docs.cmsmadesimple.org/configuration/pretty-url">here</a>';
$lang['settings_autocreate_flaturls'] = 'If SEF/pretty URLs are enabled, and the option to auto-create urls is enabled, this option indicatest hat those auto-created URLS should be flat <em>(i.e: identical to the page alias)</em>.  <strong>Note:</strong> The two values do not need to remain identical, the URL value can be changed to be different than the page alias in subsequent page edits';
$lang['settings_mandatory_urls'] = 'If SEF/pretty URLs are enabled, this option indicates wether page URLS are a required field in the content editor.';
$lang['settings_badtypes'] = 'Select which content types to remove from the content type dropdown when editing or adding content.  This feature is useful if you do not want editors to be able to create certain types of content.  Use CTRL+Click to select, unselect items.  Having no selected items will indicate that all content types are allowed. <em>(applies to all users)</em>';
$lang['settings_basicattribs'] = 'This field allows you to specify which content properties that users without the &quot;Manage All Content&quot; permission are allowed to edit. The selected properties will appear in the &quot;Main Tab&quot; on the edit content page.<br/><br/>This feature us useful when you have content editors with restricted permission and want to control what content properties that they are allowed to edit.';
$lang['settings_imagefield_path'] = 'This setting is used when editing content.  The directory specified here is used to provide a list of images from which to associate an image with the content page.<br/></br/>Relative to the image uploads path, specify a directory name that contains the paths containing files for the image field';
$lang['settings_thumbfield_path'] = 'This setting is used when editing content.  The directory specified here is used to provide a list of images from which to associate a thumbnail with the content page.<br/><br/>Relative to the image uploads path, specify a directory name that contains the paths containing files for the image field.  Usually this will be the same as the path above.';
$lang['settings_contentimage_path'] = 'This setting is used when a page template contains the {content_image} tag.  The directory specified here is used to provide a selection of images to associate with the tag.<br/><br/>Relative to the uploads path, specify a directory name that contains the paths containing files for the {content_image} tag.  This value is used as a default for the dir parameter';
$lang['settings_mailtest_testaddress'] = 'Specify a valid email address that will receive the test email';
$lang['settings_mailprefs_mailer'] = 'This choice controls how CMSMS will send mail.  Using PHPs <a href="http://www.cmsmadesimple.org/downloads/">mail</a> function, sendmail, or by communicating directly with an SMTP server.<br/><br/>The &quot;mail&quot; option should work on most shared hosts, however it almost certainly will not work on most self hosted windows installations.<br/><br/>The &quot;sendmail&quot; option should work on most properly configured self hosted linux servers.  However it may not work on shared hosts.<br/><br/>The SMTP Option requires configuration information from your host.';
$lang['settings_mailprefs_from'] = 'This option controls the <em>default<em> address that CMSMS will use to send email messages.  This cannot just be any email address.  It must match the domain that CMSMS is providing.  Specifying a personal email address from a different domain is known as &quot;<a href="https://en.wikipedia.org/wiki/Open_mail_relay">relaying</a>&quot; and will most probably result in emails not being sent, or not being accepted by the receipient email server.  A typical good example for this field is noreply@mydomain.com';
$lang['settings_mailprefs_fromuser'] = 'Here you can specify a name to be associated with the email address specified above.  This name can be anything but should reasonably correspond to the email address.  i.e: &quot;Do Not Reply&quot;';
$lang['settings_mailprefs_smtphost'] = 'When using the SMTP mailer this option specifies the hostname <em>(or IP address)</em> of the SMTP server to use when sending email.  You may need to contact your host for the proper value.';
$lang['settings_mailprefs_smtpport'] = 'When using the SMTP mailer this option specifies the integer port number for the SMTP server.  In most cases this value is 25, though you may need to contact your host for the proper value.';
$lang['settings_mailprefs_smtptimeout'] = 'When using the SMTP mailer, this option specifies the number of seconds before an attempted connection to the SMTP server will fail.  A typical value for this setting is 60.<br/><br/><strong>Note:</strong> If you need a longer value here it probably indicates an underlying DNS, routing or firewall problem, and you may need to contact your host.';
$lang['settings_mailprefs_smtpauth'] = 'When using the SMTP mailer, this option indicates that the SMTP server requires authentication to send emails.  You then must specify <em>(at a minimum)</em> a username, and password.  Your host should indicate wether SMTP authentication is required, and if so provide you with a username and password, and optionally an encryption method.<br/><br/><strong>Note:</strong> SMTP authentication is required if your domain is using google apps for email.';
$lang['settings_mailprefs_smtpsecure'] = 'This option, when using SMTP authentication specifies an encryption mechanism to use when communicating with the SMTP server.  Your host should provide this information if SMTP authentication is required.';
$lang['settings_mailprefs_smtpusername'] = 'This is the username for connecting to the SMTP server if SMTP authentication is enabled.';
$lang['settings_mailprefs_smtppassword'] = 'This is the password for connecting to the SMTP server if SMTP authentication is enabled.';
$lang['settings_mailprefs_sendmail'] = 'If using the &quot;sendmail&quot; mailer method, you must specify the complete path to the sendmail binary program.  A typical value for this field is &quot;/usr/sbin/sendmail&quot;.  This option is typically not used on windows hosts.<br/><br/><strong>Note:</strong> If using this option your host must allow the popen and pclose PHP functions which are often disabled on shared hosts.';
$lang['settings_browsercache'] = 'Applicable only to cachable pages, this setting indicates that browsers should be allowed to cache the pages for an amount of time.  If enabled repeat visitors to your site may not immediately see changes to the content of the pages, however enabling this option can seriously improve the performance of your website.';
$lang['settings_browsercache_expiry'] = 'Specify the amount of time (in minutes) that browsers should cache pages for.  Setting this value to 0 disables the functionality.  In most circumstances you should specify a value greater than 30';
$lang['settings_autoclearcache'] = 'This option allows you to specify the maximum age <em>(in days)</em> before files in the cache directory will be deleted.<br/><br/>This option is useful to ensure that cached files are regenerated periodically, and that the filesystem does not become polluted with old and unnecessary files.  An ideal value for this field is 14 or 30 days.<br/><br/><strong>Note:</strong> Cached files are cleared at most once per day.';
$lang['settings_umask'] = 'The &quot;umask&quot; is an octal value that is used to specify the default permission for newly created files (this is used for files in the cache directory, and uploaded files.  For more information see the appropriate <a href="http://en.wikipedia.org/wiki/Umask">wikipedia article.</a>';
$lang['settings_disablesafemodewarn'] = 'This option will disable a warning notice if CMSMS detects that <a href="http://php.net/manual/en/features.safe-mode.php">PHP Safe Mode</a> has been detected.<br/><br/><strong>Note:</strong> Safe mode has been deprecated as of PHP 5.3.0 and removed for PHP 5.4.0.  CMSMS Does not support operation under safe mode, and our support team will not render any technical assistance for installs where safe mode is active';
$lang['settings_enablenotifications'] = 'This option will enable notifications being shown at the top of the page in each admin request.  This is useful for important notifications about the system that may require user action.  It is possible for each admin user to turn off notifications in their preferences.';
$lang['settings_pseudocron_granularity'] = 'This setting indicates how often (in minutes) the system will attempt to handle regularly scheduled tasks.';
$lang['settings_adminlog_lifetime'] = 'This setting indicates the maximum amount of time <em>(in days)</em> That entires in the admin log should be retained.';
$lang['settings_checkversion'] = 'If enabled, the system will perform a daily check for a new release of CMSMS';
$lang['settings_smartycaching'] = 'When enabled, the output from various plugins will be cached to increase performance. Additionally, most portions of compiled templates will be cached. This only applies to output on content pages marked as cachable, and only for non-admin users.  Note, this functionality may interfere with the behavior of some modules or plugins, or plugins that use non-inline forms.<br/><br/><strong>Note:</strong> When smarty caching is enabled, global content blocks <em>(GCBs)</em> are always cached by smarty, and user defined tags <em>(UDTs)</em> are never cached.  Additionally, content blocks are never cached.';
$lang['settings_smartycompilecheck'] = 'If disabled, smarty will not check the modification dates of templates to see if they have been modified.  This can significantly improve performance.  However performing any template change (or even some content changes) may require a cache clearing';
?>