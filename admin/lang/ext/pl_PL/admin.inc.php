<?php
$lang['admin']['info_smarty_cacheudt'] = 'If enabled, all calls to user defined tags will be cached.  This will be useful for tags that display the output of database queries.  You can disable caching using the nocache parameter in the udt call.  i.e: <code>{myusertag nocache}</code>';
$lang['admin']['prompt_smarty_cacheudt'] = 'Cache UDT Calls';
$lang['admin']['always'] = 'Zawsze';
$lang['admin']['never'] = 'Nigdy';
$lang['admin']['moduledecides'] = 'Module Decides';
$lang['admin']['info_smarty_cachemodules'] = 'Select how to cache tags in various templates that call module actions.  If enabled, all module calls will be cached.  This may have negative effects on some modules, or modules with forms.  <em>(note: you can override this using the nocache option as described in the smarty manual)</em>.  If disabled no module calls will be cached which may have an effect on performance.   If you select to allow the module to decide, the default is that caching is not performed.  The module can override this, and you can disable caching using the nocache parameter when calling the module.';
$lang['admin']['prompt_smarty_cachemodules'] = 'Cache module calls';
$lang['admin']['info_smarty_compilecheck'] = 'If disabled, smarty will not check the modification dates of templates to see if they have been modified.  This can significantly improve performance.  However performing any template change (or even some content changes) may require a cache clearing';
$lang['admin']['prompt_smarty_compilecheck'] = 'Do a Compilation Check';
$lang['admin']['info_smarty_options'] = 'The following options have effect only when the above caching options are enabled';
$lang['admin']['info_smarty_caching'] = 'When enabled, the output from various plugins will be cached to increase performance.  This only applies to output on content pages marked as cachable, and only for non-admin users.  Note, this functionality may interfere with the behavior of some modules or plugins, or plugins that use non-inline forms.';
$lang['admin']['prompt_use_smartycaching'] = 'Enable Smarty Caching';
$lang['admin']['smarty_settings'] = 'Smarty Settings';
$lang['admin']['help_function_cms_init_editor'] = '<h3>What does this do?</h3>
  <p>This plugin is used to initialize the selected wysiwyg editor for display when wysiwyg functionalities are required for frontend data submission.  This module will find the selected frontend wysiwyg, determine if it has been requested, and if so generate the appropriate html code <em>(usually javascript links)</em> so that the wysiwyg will initialize properly when the page is loaded.  If no wysiwyg editors have been requested for the frontend request this plugin will produce no output.</p>
  <p><strong>Note:</strong> This plugin will work properly given the default configuration of CMSMS.  If you have modified the &quot;process_whole_template&quot; configuration variable from its default value, you may have to adjust the parameters supplied to this plugin.</p>
<h3>How do I use it?</h3>
<p>The first thing you must do is select the frontend WYSIWYG editor to use in the global settings page of the admin console.  Next If you use frontend wysiwyg editors on numerous pages, it may be best to place the {cms_init_editor} plugin directly into your page template.  If you only require the wysiwyg editor to be enabled on a limited amount of pages you may just place it into the &quot;Page Specific Metadata&quot; field in each page.</p>
<h3>What parameters does it take?</h3>
<ul>
<li><em>(optional)wysiwyg</em> - Specify the name of the wysiwyg editor module to initialize.  Use with caution.  If you have a different wysiwyg editor selected in the global settings, this will force the specified  editor to be initialized.</li>
<li><em>(optional)force=0</em> - Normally this plugin will not initialize the specified (or detected) editor if it has not been marked as &quot;active&quot;.  This parameter will override that behavior.  This parameter may be required of the &quot;process_whole_template&quot; configuration variable is set to a non default value.</li>
<li><em>(optional)assign</em> - Assign the output of the plugin to the named smarty variable.</li>
</ul>';
$lang['admin']['info_pagedefaults'] = 'This form allows specifying various options as to the initial settings when creating new content pages.  The items in this page have no effect when editing existing pages';
$lang['admin']['default_contenttype'] = 'Default Content Type';
$lang['admin']['info_default_contenttype'] = 'Applicable when adding new content objects, this control specifies the type that is selected by default.  Please ensure that the selected item is not one of the &quot;disallowed types&quot;.';
$lang['admin']['error_contenttype'] = 'The content type associated with this page is invalid or not permitted';
$lang['admin']['info_disallowed_contenttypes'] = 'Select which content types to remove from the content type dropdown when editing or adding content.  Use CTRL+Click to select, unselect items.  Having no selected items will indicate that all content types are allowed. <em>(applies to all users)</em>';
$lang['admin']['disallowed_contenttypes'] = 'Content Types that are not Allowed';
$lang['admin']['search_module'] = 'Search module';
$lang['admin']['info_search_module'] = 'Select the module that should be used to index words for searching, and will provide the site search capabilities';
$lang['admin']['filecreatedirbadchars'] = 'Invalid characters were detected in the submitted directory name';
$lang['admin']['modulehelp_yourlang'] = 'Pokaż w Twoim języku';
$lang['admin']['info_umask'] = 'The &quot;umask&quot; is an octal value that is used to specify the default permission for newly created files (this is used for files in the cache directory, and uploaded files.  For more information see the appropriate <a href="http://en.wikipedia.org/wiki/Umask">wikipedia article.</a>';
$lang['admin']['general_operation_settings'] = 'General Operation Settings';
$lang['admin']['info_checkversion'] = 'Jeśli jest włączone, system codziennie sprawdzi, czy jest nowsza wersja CMSMS';
$lang['admin']['checkversion'] = 'Sprawdzaj czy jest nowsza wersja';
$lang['admin']['actioncontains'] = 'Action Contains';
$lang['admin']['filterapplied'] = 'Current Filter';
$lang['admin']['automatedtask_success'] = 'Automated task performed';
$lang['admin']['siteprefsupdated'] = 'Ustawienia og&oacute;lne zaaktualizowane';
$lang['admin']['ip_addr'] = 'Adres IP';
$lang['admin']['warn_admin_ipandcookies'] = 'Warning: Admin activities use cookies and tracks your IP address';
$lang['admin']['event_desc_loginfailed'] = 'Failed Login';
$lang['admin']['modulehelp_english'] = 'Pokaż tekst angielski';
$lang['admin']['nopluginabout'] = 'Nie ma informacji dla tego pluginu';
$lang['admin']['nopluginhelp'] = 'Nie ma dostępnej pomocy dla tego pluginu';
$lang['admin']['moduleupgraded'] = 'Upgrade Successfull';
$lang['admin']['added_css'] = 'Added Stylesheet';
$lang['admin']['toggle'] = 'Toggle';
$lang['admin']['added_group'] = 'Added Group';
$lang['admin']['expanded_xml'] = 'Expanded XML file consisting of %s %s';
$lang['admin']['installed_mod'] = 'Zainstalowano wersję %s';
$lang['admin']['uninstalled_mod'] = 'Odlinstalowano moduł %s';
$lang['admin']['upgraded_mod'] = '%s Upgraded from Version %s to %s';
$lang['admin']['edited_gcb'] = 'Edited Global Content Block';
$lang['admin']['edited_content'] = 'Edited Content';
$lang['admin']['added_content'] = 'Added Content';
$lang['admin']['added_css_association'] = 'Added Stylesheet Association';
$lang['admin']['deleted_group'] = 'Deleted Group';
$lang['admin']['deleted_content'] = 'Deleted Content';
$lang['admin']['edited_user'] = 'Edited User';
$lang['admin']['edited_udt'] = 'Edited User Defined Tag';
$lang['admin']['content_copied'] = 'Content Item Copied to %s';
$lang['admin']['deleted_template'] = 'Deleted Template';
$lang['admin']['added_udt'] = 'Added User Defined Tag';
$lang['admin']['deleted_udt'] = 'Deleted User Defined Tag';
$lang['admin']['added_gcb'] = 'Added Global Content Block';
$lang['admin']['edited_group'] = 'Edited Group';
$lang['admin']['deleted_css_association'] = 'Deleted Stylesheet Association';
$lang['admin']['user_logout'] = 'User Logout';
$lang['admin']['user_login'] = 'User Login';
$lang['admin']['login_failed'] = 'User Login Failed';
$lang['admin']['deleted_css'] = 'Deleted Stylesheet';
$lang['admin']['uploaded_file'] = 'Uploaded File';
$lang['admin']['created_directory'] = 'Created Directory';
$lang['admin']['deleted_file'] = 'Deleted File';
$lang['admin']['deleted_directory'] = 'Deleted Directory';
$lang['admin']['edited_template'] = 'Edited Template';
$lang['admin']['deleted_user'] = 'Deleted User';
$lang['admin']['deleted_module'] = 'Permanently removed %s';
$lang['admin']['deleted_gcb'] = 'Deleted Global Content Block';
$lang['admin']['added_user'] = 'Added User';
$lang['admin']['edited_user_preferences'] = 'Edited User Preferences';
$lang['admin']['added_template'] = 'Added Template';
$lang['admin']['event_desc_stylesheetpostcompile'] = 'Sent after a stylesheet is compiled through smarty';
$lang['admin']['event_desc_stylesheetprecompile'] = 'Sent before a stylesheet is compiled through smarty';
$lang['admin']['confirm_uploadmodule'] = 'Jesteś pewny, że chcesz grać wybrany plik XML?. Niepoprawnie wgrany moduł może całkowicie uniemożliwić działanie serwisu';
$lang['admin']['error_module_mincmsversion'] = 'Ten moduł wymaga nowszej wersji CMS Made Simple';
$lang['admin']['info_browser_cache_expiry'] = 'Określa czas (w minutach), dla kt&oacute;rego przeglądarki będą używać pamięci podręcznej (cache). Ustawienie na 0 wyłącza tę funkcjonalność.';
$lang['admin']['browser_cache_expiry'] = 'Czas wygaśnięcia pamięci podręcznej dla przeglądarek <em>(minuty)</em>';
$lang['admin']['info_browser_cache'] = 'Applicable only to cachable pages, this setting indicates that browsers should be allowed to cache the pages for an amount of time.  If enabled repeat visitors to your site may not immediately see changes to the content of the pages.';
$lang['admin']['allow_browser_cache'] = 'Pozw&oacute;l przeglądarce wrzucać strony do pamięci podręcznej (cache)';
$lang['admin']['server_cache_settings'] = 'Ustawienia pamięci podręcznej (cache) serwera';
$lang['admin']['browser_cache_settings'] = 'Ustawienia pamięci podręcznej (cache) przeglądarki';
$lang['admin']['help_function_browser_lang'] = '<h3>What does this do?</h3>
  <p>This plugin detects and outputs the language that the users browser accepts, and cross references it with a list of allowed languages to determine a language value for the session.</p>
<h3>How do I use it?</h3>
<p>Insert the tag early into your page template <em>(it can go above the <head> section if you want)</em> and provide it the name of the default language, and the accepted languages (only two character language names are accepted), then do something with the result.  i.e:</p>
<pre><code>{browser_lang accept=de,fr,en,es default=en assign=tmp}{session_put var=lang val=$tmp}</code></pre>
<p><em>({session_put} is a plugin provided by the CGSimpleSmarty module)</em></p>
<h3>What Parameters does it Take?</h3>
<ul>
<li><strong>accepted <em>(required)</em></strong><br/> - A comma separated list of two character language names that are accepted.</li>
<li>default<br/>- <em>(optional)</em> A default language to output if no accepted language was supported by the browser.  en is used if no other value is specified.</li>
<li>assign<br/>- <em>(optional)</em> The name of the smarty variable to assign the results to.  If not specified the results of this function are returned.</li>
</ul>';
$lang['admin']['info_target'] = 'Ta opcja może zostać użyta przez menadżera menu do wskazania jak i kiedy nowe okna lub ramki mają zostać otworzone. Niekt&oacute;re szablony menadżera menu mogą ignorować tą opcję.';
$lang['admin']['close'] = 'Zamknij';
$lang['admin']['open'] = 'Otw&oacute;rz';
$lang['admin']['revert'] = 'Cofnij wszystkie zmiany';
$lang['admin']['autoclearcache2'] = 'Usuń pliki tymczasowe starsze od podanej liczby dni';
$lang['admin']['root'] = 'Root';
$lang['admin']['info_content_autocreate_flaturls'] = 'Po zaznaczeniu, wszystkie adresy url będą tworzone jako kopia aliasu strony (ale nie będą z zsynchronizowane z aliasem strony)';
$lang['admin']['content_autocreate_flaturls'] = 'Automatycznie tworzone adresy URL są płaskie';
$lang['admin']['content_autocreate_urls'] = 'Automatycznie tw&oacute;rz adresy URL';
$lang['admin']['content_mandatory_urls'] = 'Adresy URL stron są wymagane';
$lang['admin']['content_imagefield_path'] = 'Ścieżka dla pola obrazka ( image field)';
$lang['admin']['info_content_imagefield_path'] = 'Relatywna do ścieżki dla wgrywany obraz&oacute;w, podaj nazwę folderu kt&oacute;ry zawiera ściężki dla plik&oacute;w dla pola obrazu (image field)';
$lang['admin']['content_thumbnailfield_path'] = 'Ścieżka dla pola miniatur';
$lang['admin']['info_content_thumbnailfield_path'] = 'Relatywna do ścieżki dla wgrywanych obraz&oacute;w - podaj nazwę folderu, kt&oacute;ry zawiera ścieżki dla plik&oacute;w dla pola obrazu (image field). Zazwyczaj taka sama jak w polu powyżej';
$lang['admin']['contentimage_path'] = 'Ścieżka dla znacznika {content_image} ';
$lang['admin']['info_contentimage_path'] = 'Relatywna do ścieżki dla wgrywanych obraz&oacute;w - podaj nazwę folderu, kt&oacute;ry zawiera ścieżki dla plik&oacute;w dla {content_image}.  Ta wartość jest używana jako domyślna dla parametru dir';
$lang['admin']['editcontent_settings'] = 'Ustawienia edycji treści';
$lang['admin']['help_page_url'] = 'Określa alternatywny URL (relatywny względem gł&oacute;wnego adresu twojej strony), kt&oacute;ry będzie użyty do identyfikacji tej strony,  np.: path/to/mypage.  Adres ten zostanie użyty tylko jeśli aktywne są przyjazne linki (pretty urls).';
$lang['admin']['help_page_alias'] = 'Alias jest używany jako alternatywa dla id strony, do unikalnej identyfikacji strony. Musi być unikalna i nie powtarzać się na żadnej innej stronie. Alias jest także używany przy tworzeniu adresu URL dla tej strony.';
$lang['admin']['help_page_searchable'] = 'Ustawienie to określa czy zawartość tej strony zostanie zaindeksowana przez moduł wyszukiwarki';
$lang['admin']['help_page_cachable'] = 'Szybkość może zostać zwiększona poprzez ustawienie tej opcji włączonej dla tak wielu stron jak to tylko możliwe.  Jednak nie może zostać to użyte dla stron, kt&oacute;rych zawartość może być dynamiczna (np. zależna od logowania).';
$lang['admin']['sitedownexcludeadmins'] = 'Wyklucz użytkownik&oacute;w zalogowanych do panelu administracyjnego';
$lang['admin']['your_ipaddress'] = 'Tw&oacute;j adres IP to';
$lang['admin']['use_wysiwyg'] = 'Użyj WYSIWYG';
$lang['admin']['contenttype_redirlink'] = 'Przekierowanie linku';
$lang['admin']['yes'] = 'Tak';
$lang['admin']['no'] = 'Nie';
$lang['admin']['listcontent_showalias'] = 'Wyświetl kolumnę &quot;Alias&quot;';
$lang['admin']['listcontent_showurl'] = 'Wyświetl kolumnę &quot;URL&quot; ';
$lang['admin']['listcontent_showtitle'] = 'Wyświetl tytuł strony lub tekst menu';
$lang['admin']['listcontent_settings'] = 'Ustawienia treści';
$lang['admin']['lctitle_page'] = 'The title of existing content items';
$lang['admin']['lctitle_alias'] = 'The alias of existing content items. Some content items do not have aliases';
$lang['admin']['lctitle_url'] = 'The URL suffix for the content item.  If set';
$lang['admin']['lctitle_template'] = 'The selected template for the content item. Some content items do not have templates';
$lang['admin']['lctitle_owner'] = 'Właściciel elementu treści';
$lang['admin']['lctitle_active'] = 'Pokazuje, czy element treści jest aktywny. Nieaktywne elementy nie mogą być wyświetlane.';
$lang['admin']['lctitle_default'] = 'Określa element treści, kt&oacute;ry jest pokazywany gdy gł&oacute;wny adres  serwisu (root_url) jest wywoływany. Tylko jedna strona może być domyślną.';
$lang['admin']['lctitle_move'] = 'Pozwala na zmiany hierarchii (struktury) treści';
$lang['admin']['lctitle_multiselect'] = 'Zaznacz wszystko/Odznacz wszystko';
$lang['admin']['invalid_url2'] = 'The page URL specified is invalid.  It should contain only alphanumeric characters, or - or /.  Extensions must contain only alphanumeric chars and be less than 5 characters in length.  It is also possible that the URL specified is already in use.';
$lang['admin']['page_url'] = 'Adres URL strony';
$lang['admin']['runuserplugin'] = 'Wywołaj Znacznik Użytkownika';
$lang['admin']['output'] = 'Wyjście';
$lang['admin']['run'] = 'Uruchom';
$lang['admin']['run_udt'] = 'Wywołaj ten Znacznik Użytkownika';
$lang['admin']['stylesheetcopied'] = 'Arkusz styli został skopiowany';
$lang['admin']['templatecopied'] = 'Szablon został skopiowany';
$lang['admin']['ecommerce_desc'] = 'Moduły, kt&oacute;re dostarczają możliwości e-commerce (handlowe i portalowe)';
$lang['admin']['ecommerce'] = 'E-Commerce';
$lang['admin']['help_function_content_module'] = '<h3>What does this do?</h3>
<p>This content block type allows interfacing with different modules to create different content block types.</p>
<p>Some modules can define content block types for use in module templates.  i.e: The FrontEndUsers module may define a group list content block type.  It will then indicate how you can use the content_module tag to utilize that block type within your templates.</p>
<p><strong>Note:</strong> This block type must be used only with compatible modules.  You should not use this in any way except for as guided by addon modules.</p>';
$lang['admin']['error_parsing_content_blocks'] = 'Błąd podczas przetwarzania blok&oacute;w treści (może zdublowane nazwy blok&oacute;w?)';
$lang['admin']['error_no_default_content_block'] = 'Brak domyślnego bloku treści (content block) w tym szablonie. Upewnij się, że masz znacznik {content} w szablonie tej strony.';
$lang['admin']['help_function_cms_stylesheet'] = '	<h3>What does this do?</h3>
  <p>A replacement for the {stylesheet} tag, this tag provides caching of css files by generating static files in the tmp/cache directory, and smarty processing of the individual stylesheets.</p>
  <p>This plugin retrieves stylesheet information from the system.  By default, it grabs all of the stylesheets attached to the current template in the order specified by the designer, and generates stylesheet tags.</p>
  <p>Generated stylesheets are uniquely named according to the last modification date in the database, and are only generated if the stylesheet has changed.</p>
  <p>This tag is the replacement for the {stylesheet} tag.</p>
  <h3>How do I use it?</h3>
  <p>Just insert the tag into your template/page&#039;s head section like: <code>{cms_stylesheet}</code></p>
  <h3>What parameters does it take?</h3>
  <ul>
  <li><em>(optional)</em>name - Instead of getting all stylesheets for the given page, it will only get one specifically named one, whether it&#039;s attached to the current template or not.</li>
  <li><em>(optional)</em>templateid - If templateid is defined, this will return stylesheets associated with that template instead of the current one.</li>
  <li><em>(optional)</em>media - When used in conjunction with the name parameter this parameter will allow you to override the media type for that stylesheet.  When used in conjunction with the templateid parameter, the media parameter will only output stylesheet tags for those stylesheets that are marked as compatible with the specified media type.</li>
  </ul>
  <h3>Smarty Processing</h3>
  <p>When generating css files this system passes the stylesheets retrieved from the database through smarty.  The smarty delimiters have been changed from the CMSMS standard { and } to [[ and ]] respectively to ease transition in stylesheets.  This allows creating smarty variables i.e.: [[assign var=&#039;red&#039; value=&#039;#900&#039;]] at the top of the stylesheet, and then using these variables later in the stylesheet, i.e:</p>
<pre>
<code>
h3 .error { color: [[$red]]; }<br/>
</code>
</pre>
<p>Because the cached files are generated in the tmp/cache directory of the CMSMS installation, the CSS relative working directory is not the root of the website.  Therefore any images, or other tags that require a url should use the [[root_url]] tag to force it to be an absolute url. i.e:</p>
<pre>
<code>
h3 .error { background: url([[root_url]]/uploads/images/error_background.gif); }<br/>
</code>
</pre>
<p><strong>Note:</strong> Due to the caching nature of the plugin, smarty variables should be placed at the top of EACH stylesheet that is attached to a template.</p>';
$lang['admin']['pseudocron_granularity'] = 'Pseudocron Granularity';
$lang['admin']['info_pseudocron_granularity'] = 'To ustawienie odpowiada za to, jak często system spr&oacute;buje wykonać wcześniej zaplanowane zadania (pseudo-cron)';
$lang['admin']['cron_request'] = 'Każde wywołanie';
$lang['admin']['cron_15m'] = '15 Minut';
$lang['admin']['cron_30m'] = '30 Minut';
$lang['admin']['cron_60m'] = '1 Godzina';
$lang['admin']['cron_120m'] = '2 Godziny';
$lang['admin']['cron_3h'] = '3 Godziny';
$lang['admin']['cron_6h'] = '6 Godzin';
$lang['admin']['cron_12h'] = '12 Godzin';
$lang['admin']['cron_24h'] = '24 Godziny';
$lang['admin']['adminlog_1day'] = '1 dzień';
$lang['admin']['adminlog_1week'] = '1 tydzień';
$lang['admin']['adminlog_2weeks'] = '2 tygodnie';
$lang['admin']['adminlog_1month'] = '1 miesiąc';
$lang['admin']['adminlog_3months'] = '3 miesiące';
$lang['admin']['adminlog_6months'] = 'P&oacute;ł roku';
$lang['admin']['adminlog_manual'] = 'Ręczne usuwanie';
$lang['admin']['adminlog_lifetime'] = 'Pliki log&oacute;w będą usuwane co';
$lang['admin']['info_adminlog_lifetime'] = 'Usuwa logi, kt&oacute;re są starsze niż wybrana wartość.';
$lang['admin']['filteruser'] = 'Username is';
$lang['admin']['filtername'] = 'Event name contains';
$lang['admin']['filteraction'] = 'Action contains';
$lang['admin']['filterapply'] = 'Apply filters';
$lang['admin']['filterreset'] = 'Reset filters';
$lang['admin']['filters'] = 'Filters';
$lang['admin']['showfilters'] = 'Edit filter';
$lang['admin']['clearcache_taskdescription'] = 'Executed daily, this task will clear cached files that are older than the age preset in the global preferences';
$lang['admin']['clearcache_taskname'] = 'Wyczyść pliki cache';
$lang['admin']['info_autoclearcache'] = 'Podaj wartość całkowitą. Wprowadźr 0 aby wyłączyć czyszczenie plik&oacute;w cache';
$lang['admin']['autoclearcache'] = 'Automatiycznie czyść cache co N dni';
$lang['admin']['listtemplates_pagelimit'] = 'Liczba wierszy na stronę przy oglądaniu listy szablon&oacute;w';
$lang['admin']['liststylesheets_pagelimit'] = 'Liczba wierszy na stronę przy oglądaniu listy arkuszy styl&oacute;w';
$lang['admin']['listgcbs_pagelimit'] = 'Liczba wierszy na stronę przy oglądaniu listy Globalnych Blok&oacute;w HTML';
$lang['admin']['insecure'] = 'Insecure (HTTP)';
$lang['admin']['secure'] = 'Secure (HTTPS)';
$lang['admin']['secure_page'] = 'Użyj HTTPS dla tej strony';
$lang['admin']['thumbnail_width'] = 'Szerokość miniatury';
$lang['admin']['thumbnail_height'] = 'Wysokość miniatury';
$lang['admin']['E_STRICT'] = 'Is E_STRICT disabled in error_reporting';
$lang['admin']['test_estrict_failed'] = 'E_STRICT is enabled in the error_reporting';
$lang['admin']['info_estrict_failed'] = 'Some libraries that CMSMS uses do not work well with E_STRICT.  Please disable this before continuing';
$lang['admin']['E_DEPRECATED'] = 'Is E_DEPRECATED disabled in error_reporting';
$lang['admin']['test_edeprecated_failed'] = 'E_DEPRECATED is enabled';
$lang['admin']['info_edeprecated_failed'] = 'If E_DEPRECATED is enabled in your error reporting users will see a lot of warning messages that could affect the display and functionality';
$lang['admin']['session_use_cookies'] = 'Sessions are allowed to use Cookies';
$lang['admin']['errorgettingcontent'] = 'Could not retrieve information for the specified content object';
$lang['admin']['errordeletingcontent'] = 'Error deleting content (either this page has children or is the default content)';
$lang['admin']['invalidemail'] = 'Podany adres email jest niepoprawny';
$lang['admin']['info_deletepages'] = 'Note: due to permission restrictions, some of the pages you selected for deletion may not be listed below';
$lang['admin']['info_pagealias'] = 'Podaj unikatowy alias dla tej strony.';
$lang['admin']['info_autoalias'] = 'Jeśli to pole jest puste, alias zostanie stworzony automatycznie.';
$lang['admin']['invalidparent'] = 'You must select a parent page (contact your administrator if you do not see this option).';
$lang['admin']['forgotpwprompt'] = 'Enter your admin username.  An email will then be sent to the email address associated with that username with new login information';
$lang['admin']['info_basic_attributes'] = 'This field allows you to specify which content properties that users without the &quot;Manage All Content&quot; permission are allowed to edit.';
$lang['admin']['basic_attributes'] = 'Basic Properties';
$lang['admin']['no_permission'] = 'You have not permission to perform that function.';
$lang['admin']['bulk_success'] = 'Bulk operation was successfully updated.';
$lang['admin']['no_bulk_performed'] = 'No bulk operation performed.';
$lang['admin']['info_preview_notice'] = 'Ostrzeżenie: Ten panel poglądowy zachowuje się bardziej jak okno przeglądarki pozwalając na nawigację poza pierwotnie wyświetloną stronę. Jednak jeśli to zrobisz możesz doświadczyć niespodziewanego zachowania. Jeśli opuścisz oryginalną stronę i potem na nią powr&oacute;cisz możesz nie zobaczyć wprowadzonych zmian w treści. Jeśli wprowadzisz treść i następnie opuścisz stronę, nie będziesz m&oacute;gł powr&oacute;cić zanim nie odświeżysz tego panelu.';
$lang['admin']['sitedownexcludes'] = 'Wyklucz użytkownik&oacute;w tych adres&oacute;w, aby nie widzieli komunikatu o niedostępności strony';
$lang['admin']['info_sitedownexcludes'] = 'This parameter allows listing a comma separated list of ip addresses or networks that should not be subject to the sitedown mechanism.  This allows administrators to work on a site whilst anonymous visitors receive a sitedown message.<br/><br/>Addresses can be specified in the following formats:<br/>
1. xxx.xxx.xxx.xxx -- (exact IP address)<br/>
2. xxx.xxx.xxx.[yyy-zzz] -- (IP address range)<br/>
3. xxx.xxx.xxx.xxx/nn -- (nnn = number of bits, cisco style.  i.e:  192.168.0.100/24 = entire 192.168.0 class C subnet)';
$lang['admin']['setup'] = 'Zaawansowane ustawienia';
$lang['admin']['handle_404'] = 'Custom 404 Handling';
$lang['admin']['sitedown_settings'] = 'Sitedown Settings';
$lang['admin']['general_settings'] = 'Og&oacute;lne ustawienia';
$lang['admin']['help_function_page_attr'] = '<h3>What does this do?</h3>
<p>This tag can be used to return the value of the attributes of a certain page.</p>
<h3>How do I use it?</h3>
<p>Insert the tag into the template like: <code>{page_attr key=&quot;extra1&quot;}</code>.</p>
<h3>What parameters does it take?</h3>
<ul>
  <li><strong>key [required]</strong> The key to return the attribute of.</li>
</ul>';
$lang['admin']['forge'] = 'Forge';
$lang['admin']['disable_wysiwyg'] = 'Edytor WYSIWYG jest zabroniony na tej stronie';
$lang['admin']['help_function_page_image'] = '<h3>What does this do?</h3>
<p>This tag can be used to return the value of the image or thumbnail fields of a certain page.</p>
<h3>How do I use it?</h3>
<p>Insert the tag into the template like: <code>{page_image}</code>.</p>
<h3>What parameters does it take?</h3>
<ul>
  <li>thumbnail - Optionally display the value of the thumbnail property instead of the image property.</li>
</ul>';
$lang['admin']['pagelink_circular'] = 'Link do strony serwisu nie może wskazywać na inny link';
$lang['admin']['destinationnotfound'] = 'Wybrana strona nie została odnaleziona lub jest nieprawidłowa';
$lang['admin']['help_function_dump'] = '<h3>What does this do?</h3>
  <p>This tag can be used to dump the contents of any smarty variable in a more readable format.  This is useful for debugging, and editing templates, to know the format and types of data available.</p>
<h3>How do I use it?</h3>
<p>Insert the tag in the template like <code>{dump item=&#039;the_smarty_variable_to_dump&#039;}</code>.</p>
<h3>What parameters does it take</h3>
<ul>
<li><strong>item (required)</strong> - The smarty variable to dump the contents of.</li>
<li>maxlevel - The maximum number of levels to recurse (applicable only if recurse is also supplied.  The default value for this parameter is 3</li>
<li>nomethods - Skip output of methods from objects.</li>
<li>novars - Skip output of object members.</li>
<li>recurse - Recurse a maximum number of levels through the objects providing verbose output for each item until the maximum number of levels is reached.</li>
</ul>';
$lang['admin']['sqlerror'] = 'Błąd SQL w: %s';
$lang['admin']['image'] = 'Obrazek';
$lang['admin']['thumbnail'] = 'Miniatura';
$lang['admin']['searchable'] = 'Ta strona jest wyszukiwalna';
$lang['admin']['help_function_content_image'] = '<h3>What does this do?</h3>
<p>This plugin allows template designers to prompt users to select an image file when editing the content of a page. It behaves similarly to the content plugin, for additional content blocks.</p>
<h3>How do I use it?</h3>
<p>Just insert the tag into your page template like: <code>{content_image block=&#039;image1&#039;}</code>.</p>
<h3>What parameters does it take?</h3>
<ul>
  <li><strong>(required)</strong> block - The name for this additional content block.
  <p>Example:</p>
  <pre>{content_image block=&#039;image1&#039;}</pre><br/>
  </li>

  <li><em>(optional)</em> label - A label or prompt for this content block in the edit content page.  If not specified, the block name will be used.</li>
 
  <li><em>(optional)</em> dir - The name of a directory (relative to the uploads directory, from which to select image files. If not specified, the uploads directory will be used.
  <p>Example: use images from the uploads/image directory.</p>
  <pre>{content_image block=&#039;image1&#039; dir=&#039;images&#039;}</pre><br/>
  </li>

  <li><em>(optional)</em> class - The css class name to use on the img tag in frontend display.</li>

  <li><em>(optional)</em> id - The id name to use on the img tag in frontend display.</li> 

  <li><em>(optional)</em> name - The tag name to use on the img tag in frontend display.</li> 

  <li><em>(optional)</em> width - The desired width of the image.</li>

  <li><em>(optional)</em> height - The desired height of the image.</li>

  <li><em>(optional)</em> alt - Alternative text if the image cannot be found.</li>


</ul>';
$lang['admin']['error_udt_name_chars'] = 'Nazwa UDT powinna zaczynać się od litery lub podkreślenia. Dalsze znaki mogą być cyframi, literami lub podkreśleniem.';
$lang['admin']['errorupdatetemplateallpages'] = 'Szablon nie jest aktywny';
$lang['admin']['hidefrommenu'] = 'Ukryj w menu';
$lang['admin']['settemplate'] = 'Ustaw szablon';
$lang['admin']['text_settemplate'] = 'Ustaw inny szablon wybranym stronom';
$lang['admin']['cachable'] = 'Cache-owalny';
$lang['admin']['noncachable'] = 'Niecacheowalny';
$lang['admin']['copy_from'] = 'Skopiuj z';
$lang['admin']['copy_to'] = 'Skopiuj do';
$lang['admin']['copycontent'] = 'Skopiuj treść (element)';
$lang['admin']['md5_function'] = 'Funkcja md5';
$lang['admin']['tempnam_function'] = 'funkcja tempnam';
$lang['admin']['register_globals'] = 'PHP register_globals';
$lang['admin']['output_buffering'] = 'PHP output_buffering';
$lang['admin']['disable_functions'] = 'disable_functions w PHP';
$lang['admin']['xml_function'] = 'Podstawowe wsparcie XML (expat)';
$lang['admin']['magic_quotes_gpc'] = 'Magic quotes dla zmiennych Get/Post/Cookie';
$lang['admin']['magic_quotes_gpc_on'] = 'Znak apostrofu, cudzysłow&oacute;w i ukośnika są przetwarzane automatycznie. Uważaj na te znaki przy zapisywaniu i edycji szablon&oacute;w!';
$lang['admin']['magic_quotes_runtime'] = 'Magic quotes w funkcji startowej';
$lang['admin']['magic_quotes_runtime_on'] = 'Większość funkcji zwracających dane będzie miała apostrofy poprzedzone backslashami. Może to spowodować problemy.';
$lang['admin']['file_get_contents'] = 'Testuj file_get_contents';
$lang['admin']['check_ini_set'] = 'Testuj ini_set';
$lang['admin']['check_ini_set_off'] = 'Możesz mieć problemy z niekt&oacute;rymi funkcjonalnościami bez tej opcji. Ten test może się nie powieść, gdy opcja safe_mode jest włączona (enabled).';
$lang['admin']['file_uploads'] = 'Wgrywanie plik&oacute;w (upload)';
$lang['admin']['test_remote_url'] = 'Testuj dla zdalnego adresu URL';
$lang['admin']['test_remote_url_failed'] = 'Prawdopodobnie nie będziesz w stanie otworzyć plik&oacute;w na zdalnym serwerze';
$lang['admin']['test_allow_url_fopen_failed'] = 'Gdy allow url fopen jest wyłączone, nie będziesz w stanie uzyskać dostępu do pliku z użyciem protokołu FTP lub HTTP.';
$lang['admin']['connection_error'] = 'Wychodzące połączenia http nie działają. Czy istnieje jakiś firewall lub inne ustawienia blokujące wyjście na zewnątrz? Sytuacja ta spowoduje, że Manadżer Moduł&oacute;w oraz inne moduły będą działać niepoprawnie.';
$lang['admin']['remote_connection_timeout'] = 'BŁĄD: Upłynął czas oczekiwania na połączenie!';
$lang['admin']['search_string_find'] = 'Połączenie ok!';
$lang['admin']['connection_failed'] = 'Połączenie nie powiodło się!';
$lang['admin']['remote_response_ok'] = 'Odpowiedź zdalna: ok!';
$lang['admin']['remote_response_404'] = 'Odpowiedź zdalna: nie znaleziono!';
$lang['admin']['remote_response_error'] = 'Odpowiedź zdalna: błąd!';
$lang['admin']['notifications_to_handle'] = 'Masz <b>%d</b> powiadomień bez Twojej reakcji';
$lang['admin']['notification_to_handle'] = 'Masz <b>%d</b> nowych powiadomień';
$lang['admin']['notifications'] = 'Powiadomienia';
$lang['admin']['dashboard'] = 'Rzuć okiem na Tablicę';
$lang['admin']['ignorenotificationsfrommodules'] = 'Ignoruj powiadomienia z tych moduł&oacute;w';
$lang['admin']['admin_enablenotifications'] = 'Zezw&oacute;l użytkownikom na oglądanie powiadomień na każdej stronie panelu administracyjnego';
$lang['admin']['enablenotifications'] = 'Włącz powiadomienia użytkownik&oacute;w w panelu administracyjnym';
$lang['admin']['test_check_open_basedir_failed'] = 'Wykryto restrykcje Open basedir. Możesz mieć problemy z niekt&oacute;rymi dodatkami.';
$lang['admin']['config_writable'] = 'plik config.php ma włączone prawa do zapisywania. Jest bezpieczniej, gdy przestawisz te atrybuty na tylko-do-czytania (read-only)';
$lang['admin']['caution'] = 'Uwaga';
$lang['admin']['create_dir_and_file'] = 'Sprawdzanie czy proces serwera WWW może stworzyć plik w katalogu, kt&oacute;ry sam stworzył';
$lang['admin']['os_session_save_path'] = 'Nie sprawdzono, ponieważ zastosowano ścieżkę OS';
$lang['admin']['unlimited'] = 'Bez limitu';
$lang['admin']['open_basedir'] = 'PHP Open Basedir';
$lang['admin']['open_basedir_active'] = 'Nie sprawdzono, ponieważ open basedir jest aktywny';
$lang['admin']['invalid'] = 'Nieprawidłowy';
$lang['admin']['checksum_passed'] = 'Wszystkie sumy kontrolne się zgadzają!';
$lang['admin']['error_retrieving_file_list'] = 'Błąd podczas odczytu listy plik&oacute;w';
$lang['admin']['files_checksum_failed'] = 'Pliki nie mogą być por&oacute;wnane z sumami kontrolnymi';
$lang['admin']['failure'] = 'Niepowodzenie';
$lang['admin']['help_function_process_pagedata'] = '<h3>Co to robi?</h3>
<p>Ta wtyczka przetwarza dane w bloku &quot;pagedata&quot; stron z użyciem Smarty. To pozwala na podanie danych specyficznych dla strony bez zmiany szablonu dla niej.</p>
<h3>Jak tego użyć?</h3>
<ol>
  <li>Wstaw tagi Smarty do bloku pagedata stron z zawaerością.</li>
  <li>Wstaw tag <code>{process_pagedata}</code> na samej g&oacute;rze swojego szablonu stron.</li>
</ol>
<br/>
<h3>Jakie są możliwe parametry?</h3>
<p>Na razie - żadnych</p>';
$lang['admin']['page_metadata'] = 'Metadane specyficzne dla strony';
$lang['admin']['pagedata_codeblock'] = 'Dane Smarty specyficzne dla strony';
$lang['admin']['error_uploadproblem'] = 'Wystąpił błąd podczas zapisu';
$lang['admin']['error_nofileuploaded'] = 'Nie załadowano żadnego pliku';
$lang['admin']['files_failed'] = 'Sprawdzanie plik&oacute;w przy użyciu md5sum nie powiodło się';
$lang['admin']['files_not_found'] = 'Nie odnaleziono plik&oacute;w';
$lang['admin']['info_generate_cksum_file'] = 'Ta funkcja pozwioli zapisać Ci pliki z sumami kontrolnymi, kt&oacute;re możesz zapisac na swoim komputerze. Operacja ta powinna być wykonywana przed otworzeniem strony dla odwiedzających i/lub po aktualizacjach lub większych zmianach';
$lang['admin']['info_validation'] = 'Ta funkcja por&oacute;wna sumy kontrolne zapisane w pliku z tymi wygenerowanymi w tej konkretnej instalacji. Może to pom&oacute;c w rozwiązywaniu problem&oacute;w z ładowaniem plik&oacute;w, lub z odnalezieniem zmodyfikowanych plik&oacute;w w wypadku włamania na Tw&oacute;j serwer. Plik z sumami kontrolnymi jest generowany dla każdej wersji CMSMS począwszy od 1.4.';
$lang['admin']['download_cksum_file'] = 'Ściągnij plik z sumami kontrolnymi';
$lang['admin']['perform_validation'] = 'Wykonaj sprawdzenie';
$lang['admin']['upload_cksum_file'] = 'Załaduj plik z sumami kontrolnymi';
$lang['admin']['checksumdescription'] = 'Sprawdź integralność plik&oacute;w CMSMS poprzez por&oacute;wnanie ze znanymi sumami kontrolnymi';
$lang['admin']['system_verification'] = 'Weryfikacja systemu';
$lang['admin']['extra1'] = 'Atrybut dodatkowy strony 1';
$lang['admin']['extra2'] = 'Atrybut dodatkowy strony 2';
$lang['admin']['extra3'] = 'Atrybut dodatkowy strony 3';
$lang['admin']['start_upgrade_process'] = 'Rozpocznij proces aktualizacji systemu';
$lang['admin']['warning_upgrade'] = '<em><strong>Ostrzeżenie:</strong></em> CMSMS wymaga aktualizacji!';
$lang['admin']['warning_upgrade_info1'] = 'Aktualnie działasz na schemacie wersji %s. Potrzebujesz wykonać aktualizację do wersji %s';
$lang['admin']['warning_upgrade_info2'] = 'Kliknij na następujący link: %s.';
$lang['admin']['warning_mail_settings'] = 'Ustawienia wysyłania e-maili nie zostały skonfigurowane. Może to mieć wpływ na zdolność systemu do wysyłania jakichkolwiek wiadomości. Powinieneś użyć <a href="moduleinterface.php?module=CMSMailer">tego linku</a>, aby skonfigurować moduł CMSMailer.';
$lang['admin']['view_page'] = 'Otw&oacute;rz stronę w nowym oknie';
$lang['admin']['off'] = 'Wyłączone';
$lang['admin']['on'] = 'Włączone';
$lang['admin']['invalid_test'] = 'Niepoprawna wartość parametru testującego!';
$lang['admin']['copy_paste_forum'] = 'Wyświetl raport tekstowy <em>(przydatne do umieszczania na forum)</em>';
$lang['admin']['permission_information'] = 'Informacje o uprawnieniach';
$lang['admin']['server_os'] = 'System operacyjny serwera';
$lang['admin']['server_api'] = 'API serwera';
$lang['admin']['server_software'] = 'Oprogramowanie serwera';
$lang['admin']['server_information'] = 'Informacje o serwerze';
$lang['admin']['session_save_path'] = 'Ścieżka zapisu plik&oacute;w sesji';
$lang['admin']['max_execution_time'] = 'Maksymalny czas wykonywania skryptu';
$lang['admin']['gd_version'] = 'Wersja biblioteki GD';
$lang['admin']['upload_max_filesize'] = 'Maksymalna wielkość uploadowanego pliku';
$lang['admin']['post_max_size'] = 'Maksymalna wielkość danych wysyłanych metodą POST';
$lang['admin']['memory_limit'] = 'Limit pamięci dla PHP';
$lang['admin']['server_db_type'] = 'Baza danych';
$lang['admin']['server_db_version'] = 'Wersja serwera baz danych';
$lang['admin']['phpversion'] = 'Wersja PHP';
$lang['admin']['safe_mode'] = 'Tryb bezpieczny PHP (safe_mode)';
$lang['admin']['php_information'] = 'Informacje o PHP';
$lang['admin']['cms_install_information'] = 'Informacje o instalacji CMSMS';
$lang['admin']['cms_version'] = 'Wersja CMSMS';
$lang['admin']['installed_modules'] = 'Zainstalowane moduły';
$lang['admin']['config_information'] = 'Informacje o konfiguracji';
$lang['admin']['systeminfo_copy_paste'] = 'Skopiuj i wklej zaznaczony tekst do swojego postu na forum';
$lang['admin']['help_systeminformation'] = 'Informacje wyświetlone poniżej są pobierane z wielu r&oacute;żnych lokacji i tworzą podsumowanie, tak abyś w wygodny spos&oacute;b mogł się podzielić informacjami na temat Twojej instalacji CMSMS gdy będziesz szukał pomocy.';
$lang['admin']['systeminfo'] = 'Informacje o systemie';
$lang['admin']['systeminfodescription'] = 'Wyświetl informacje o systemie pomocne podczas diagnostyki problem&oacute;w';
$lang['admin']['systemmaintenance'] = 'System Maintenance';
$lang['admin']['systemmaintenancedescription'] = 'Various functions for maintaining the health of your system. You can also browser the changelog of CMSMadeSimple';
$lang['admin']['sysmaintab_database'] = 'Database';
$lang['admin']['sysmaintab_changelog'] = 'Changelog';
$lang['admin']['sysmaintab_content'] = 'Cache and content';
$lang['admin']['sysmain_content_status'] = 'Content status';
$lang['admin']['sysmain_cache_status'] = 'Cache status';
$lang['admin']['sysmain_database_status'] = 'Database status';
$lang['admin']['sysmain_updatehierarchy'] = 'Update page hierarchy positions';
$lang['admin']['sysmain_confirmupdatehierarchy'] = 'Are you sure you want to update page hierarchy positions?';
$lang['admin']['sysmain_update'] = 'Update';
$lang['admin']['sysmain_pagesfound'] = 'pages found';
$lang['admin']['sysmain_hierarchyupdated'] = 'Page hierarchy positions updated';
$lang['admin']['sysmain_repair'] = 'Repair';
$lang['admin']['sysmain_repairtables'] = 'Repair tables';
$lang['admin']['sysmain_tablesrepaired'] = 'Tables repaired';
$lang['admin']['sysmain_optimizetables'] = 'Optimize tables';
$lang['admin']['sysmain_tablesoptimized'] = 'Tables optimized';
$lang['admin']['sysmain_optimize'] = 'Optimize';
$lang['admin']['sysmain_confirmclearcache'] = 'Are you sure you want to clear the cache?';
$lang['admin']['sysmain_nocontenterrors'] = 'No content errors detected';
$lang['admin']['sysmain_pagesmissinalias'] = 'pages missing aliases';
$lang['admin']['sysmain_confirmfixaliases'] = 'Are you sure you want to add aliases to pages missing it?';
$lang['admin']['sysmain_fixaliases'] = 'Add aliases where missed';
$lang['admin']['sysmain_aliasesfixed'] = 'aliases fixed';
$lang['admin']['sysmain_pagesinvalidtypes'] = 'pages with invalid content type';
$lang['admin']['sysmain_confirmfixtypes'] = 'Are you sure you want to convert all with invalid content into standard content pages?';
$lang['admin']['sysmain_fixtypes'] = 'Convert into standard content pages';
$lang['admin']['sysmain_typesfixed'] = 'page content types fixed';
$lang['admin']['welcome_user'] = 'Witamy';
$lang['admin']['itsbeensincelogin'] = 'Upłynęło %s od Twojego ostatniego logowania';
$lang['admin']['days'] = 'dni';
$lang['admin']['day'] = 'dzień';
$lang['admin']['hours'] = 'godzin';
$lang['admin']['hour'] = 'godzina';
$lang['admin']['minutes'] = 'minut';
$lang['admin']['minute'] = 'minuta';
$lang['admin']['help_css_max_age'] = 'Ten parametr powinien być ustawiony na wysoką wartość dla statycznych stron oraz na 0 podczas fazy budowy strony.';
$lang['admin']['css_max_age'] = 'Maksymalna ilość sekund, przez kt&oacute;rą arkusze styli mogą być trzymane w pamięci podręcznej przeglądarki';
$lang['admin']['error'] = 'Błąd';
$lang['admin']['new_version_available'] = '<em>Uwaga:</em> Nowa wersja CMS Made Simple jest dostępna. Powiadom swojego administratora.';
$lang['admin']['master_admintheme'] = 'Domyślny szablon administratora (szablon strony loginu i nowych kont w panelu admina)';
$lang['admin']['contenttype_separator'] = 'Separator ';
$lang['admin']['contenttype_sectionheader'] = 'Nagł&oacute;wek sekcji';
$lang['admin']['contenttype_content'] = 'Treść';
$lang['admin']['contenttype_pagelink'] = 'Link do strony serwisu';
$lang['admin']['nogcbwysiwyg'] = 'Zabroń używania aplikacji WYSIWYG przy Globalnych Blokach HTML';
$lang['admin']['destination_page'] = 'Docelowa strona';
$lang['admin']['additional_params'] = 'Dodatkowe parametry';
$lang['admin']['help_function_current_date'] = '	<h3>What does this do?</h3>
	<p>Prints the current date and time.  If no format is given, it will default to a format similar to &#039;Jan 01, 2004&#039;.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{current_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em>format - Date/Time format using parameters from php&#039;s strftime function.  See <a href="http://php.net/strftime" target="_blank">here</a> for a parameter list and information.</li>
		<li><em>(optional)</em>ucword - If true return uppercase the first character of each word.</li>
	</ul>
	</p>';
$lang['admin']['help_function_valid_xhtml'] = '<h3>What does this do?</h3>
<p>Returns a link to the w3c HTML validator.</p>
<h3>How do I use it?</h3>
<p>Just insert the tag into your template/page like: <code>{valid_xhtml}</code></p>
<h3>What parameters does it take?</h3>
<p>
    <ul>
	<li><em>(optional)</em> url         (string)     - The URL used for validation, if none is given http://validator.w3.org/check/referer is used.</li>
	<li><em>(optional)</em> class       (string)     - If set, this will be used as class attribute for the link (a) element</li>
	<li><em>(optional)</em> target      (string)     - If set, this will be used as target attribute for the link (a) element</li>
	<li><em>(optional)</em> image       (true/false) - If set to false, a text link will be used instead of an image/icon.</li>
	<li><em>(optional)</em> text        (string)     - If set, this will be used for the link text or alternate text for the image. Default is &#039;valid XHTML 1.0 Transitional&#039;.<br /> When an image is used, the given string will also be used for the image alt attribute (by default, this can be overridden by using the &#039;alt&#039; parameter).</li>
	<li><em>(optional)</em> image_class (string)     - Only if &#039;image&#039; is not set to false. If set, this will be used as class attribute for the image (img) element</li>
	<li><em>(optional)</em> src         (string)     - Only if &#039;image&#039; is not set to false. The icon to show. Default is http://www.w3.org/Icons/valid-xhtml10</li>
	<li><em>(optional)</em> width       (string)     - Only if &#039;image&#039; is not set to false. The image width. Default is 88 (width of http://www.w3.org/Icons/valid-xhtml10)</li>
	<li><em>(optional)</em> height      (string)     - Only if &#039;image&#039; is not set to false. The image height. Default is 31 (height of http://www.w3.org/Icons/valid-xhtml10)</li>
	<li><em>(optional)</em> alt         (string)     - Only if &#039;image&#039; is not set to false. The alternate text (&#039;alt&#039; attribute) for the image (element). If none is given the link text will be used.</li>
    </ul>
</p>';
$lang['admin']['help_function_valid_css'] = '<h3>What does this do?</h3>
<p>Returns a link to the w3c CSS validator.</p>
<h3>How do I use it?</h3>
<p>Just insert the tag into your template/page like: <code>{valid_css}</code></p>
<h3>What parameters does it take?</h3>
<p>
    <ul>
        <li><em>(optional)</em> url         (string)     - The URL used for validation, if none is given http://jigsaw.w3.org/css-validator/check/referer is used.</li>
	<li><em>(optional)</em> class       (string)     - If set, this will be used as class attribute for the link (a) element</li>
	<li><em>(optional)</em> target      (string)     - If set, this will be used as target attribute for the link (a) element</li>
	<li><em>(optional)</em> image       (true/false) - If set to false, a text link will be used instead of an image/icon.</li>
	<li><em>(optional)</em> text        (string)     - If set, this will be used for the link text or alternate text for the image. Default is &#039;Valid CSS 2.1&#039;.<br /> When an image is used, the given string will also be used for the image alt attribute (by default, this can be overridden by using the &#039;alt&#039; parameter).</li>
	<li><em>(optional)</em> image_class (string)     - Only if &#039;image&#039; is not set to false. If set, this will be used as class attribute for the image (img) element</li>
        <li><em>(optional)</em> src         (string)     - Only if &#039;image&#039; is not set to false. The icon to show. Default is http://jigsaw.w3.org/css-validator/images/vcss</li>
        <li><em>(optional)</em> width       (string)     - Only if &#039;image&#039; is not set to false. The image width. Default is 88 (width of http://jigsaw.w3.org/css-validator/images/vcss)</li>
        <li><em>(optional)</em> height      (string)     - Only if &#039;image&#039; is not set to false. The image height. Default is 31 (height of http://jigsaw.w3.org/css-validator/images/vcss)</li>
	<li><em>(optional)</em> alt         (string)     - Only if &#039;image&#039; is not set to false. The alternate text (&#039;alt&#039; attribute) for the image (element). If none is given the link text will be used.</li>
    </ul>
</p>';
$lang['admin']['help_function_title'] = '	<h3>What does this do?</h3>
	<p>Prints the title of the page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{title}</code></p>
	<h3>What parameters does it take?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_stylesheet'] = '<h3>What does this do?</h3>
        <p><strong>Deprecated:</strong> This function is deprecated and will be removed in later versions of CMSMS.</p>
	<p>Gets stylesheet information from the system.  By default, it grabs all of the stylesheets attached to the current template.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page&#039;s head section like: <code>{stylesheet}</code></p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em>name - Instead of getting all stylesheets for the given page, it will only get one spefically named one, whether it&#039;s attached to the current template or not.</li>
		<li><em>(optional)</em>media - If name is defined, this allows you set a different media type for that stylesheet.</li>
    <li><em>(optional)</em>templateid - If templateid is defined, this will return stylesheets associated with that template instead of the current one.</li>
	</ul>';
$lang['admin']['help_function_sitename'] = '        <h3>What does this do?</h3>
        <p>Shows the name of the site.  This is defined during install and can be modified in the Global Settings section of the admin panel.</p>
        <h3>How do I use it?</h3>
        <p>Just insert the tag into your template/page like: <code>{sitename}</code></p>
        <h3>What parameters does it take?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_search'] = '	<h3>What does this do?</h3>
	<p>This is actually just a wrapper tag for the <a href="listmodules.php?action=showmodulehelp&amp;module=Search">Search module</a> to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;Search&#039;}</code> you can now just use <code>{search}</code> to insert the module in a template.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{search}</code> in a template where you want the search input box to appear. For help about the Search module, please refer to the <a href="listmodules.php?action=showmodulehelp&amp;module=Search">Search module help</a>.';
$lang['admin']['help_function_root_url'] = '	<h3>What does this do?</h3>
	<p>Prints the root url location for the site.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{root_url}</code></p>
	<h3>What parameters does it take?</h3>
	<p>None at this time.</p>';
$lang['admin']['help_function_repeat'] = '  <h3>What does this do?</h3>
  <p>Repeats a specified sequence of characters, a specified number of times</p>
  <h3>How do I use it?</h3>
  <p>Insert a tag similar to the following into your template/page, like this: <code>{repeat string=&#039;repeat this &#039; times=&#039;3&#039;}</code>
  <h3>What parameters does it take?</h3>
  <ul>
  <li>string=&#039;text&#039; - The string to repeat</li>
  <li>times=&#039;num&#039; - The number of times to repeat it.</li>
  </ul>';
$lang['admin']['help_function_recently_updated'] = '	<h3>What does this do?</h3>
	<p>Outputs a list of recently updated pages.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{recently_updated}</code></p>
	<h3>What parameters does it take?</h3>
	<ul>
	 <li><p><em>(optional)</em> number=&#039;10&#039; - Number of updated pages to show.</p><p>Example: <pre>{recently_updated number=&#039;15&#039;}</pre></p></li>
 	 <li><p><em>(optional)</em> leadin=&#039;Last changed&#039; - Text to show left of the modified date.</p><p>Example: <pre>{recently_updated leadin=&#039;Last Changed&#039;}</pre></p></li>
 	 <li><p><em>(optional)</em> showtitle=&#039;true&#039; - Shows the titleattribute if it exists as well (true|false).</p><p>Example: <pre>{recently_updated showtitle=&#039;true&#039;}</pre></p></li>											 	
	 <li><p><em>(optional)</em> css_class=&#039;some_name&#039; - Warp a div tag with this class around the list.</p><p>Example: <pre>{recently_updated css_class=&#039;some_name&#039;}</pre></p></li>											 	
	 <li><p><em>(optional)</em> dateformat=&#039;d.m.y h:m&#039; - default is d.m.y h:m , use the format you whish (php -date- format)</p><p>Example: <pre>{recently_updated dateformat=&#039;D M j G:i:s T Y&#039;}</pre></p></li>											 	
	</ul>
	<p>or combined:</p>
	<pre>{recently_updated number=&#039;15&#039; showtitle=&#039;false&#039; leadin=&#039;Last Change: &#039; css_class=&#039;my_changes&#039; dateformat=&#039;D M j G:i:s T Y&#039;}</pre>';
$lang['admin']['help_function_print'] = '	<h3>What does this do?</h3>
	<p>This is actually just a wrapper tag for the <a href="listmodules.php?action=showmodulehelp&amp;module=Printing">Printing module</a> to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;Printing&#039;}</code> you can now just use <code>{print}</code> to insert the module on pages and templates.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{print}</code> on a page or in a template. For help about the Printing module, what parameters it takes etc., please refer to the <a href="listmodules.php?action=showmodulehelp&amp;module=Printing">Printing module help</a>.';
$lang['admin']['login_info_title'] = 'Informacje';
$lang['admin']['login_info'] = 'Od tej chwili weź pod uwagę następujące parametry';
$lang['admin']['login_info_params'] = '<ol> 
  <li>Ciasteczka (cookies) włączone w przeglądarce</li> 
  <li>Javascript włączony w przeglądarce</li> 
  <li>Wyskakujące okienka (popup) aktywne dla następującego adresu:</li> 
</ol>';
$lang['admin']['help_function_news'] = '	<h3>What does this do?</h3>
	<p>This is actually just a wrapper tag for the <a href="listmodules.php?action=showmodulehelp&amp;module=News">News module</a> to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;News&#039;}</code> you can now just use <code>{news}</code> to insert the module on pages and templates.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{news}</code> on a page or in a template. For help about the News module, what parameters it takes etc., please refer to the <a href="listmodules.php?action=showmodulehelp&amp;module=News">News module help</a>.';
$lang['admin']['help_function_modified_date'] = '        <h3>What does this do?</h3>
        <p>Prints the date and time the page was last modified.  If no format is given, it will default to a format similar to &#039;Jan 01, 2004&#039;.</p>
        <h3>How do I use it?</h3>
        <p>Just insert the tag into your template/page like: <code>{modified_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
        <h3>What parameters does it take?</h3>
        <ul>
                <li><em>(optional)</em>format - Date/Time format using parameters from php&#039;s strftime function.  See <a href="http://php.net/strftime" target="_blank">here</a> for a parameter list and information.</li>
        </ul>';
$lang['admin']['help_function_metadata'] = '	<h3>What does this do?</h3>
	<p>Displays the metadata for this page. Both global metdata from the global settings page and metadata for each page will be shown.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template like: <code>{metadata}</code></p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em>showbase (true/false) - If set to false, the base tag will not be sent to the browser.  Defaults to true if use_hierarchy is set to true in config.php.</li>
	</ul>';
$lang['admin']['help_function_menu_text'] = '	<h3>What does this do?</h3>
	<p>Prints the menu text of the page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{menu_text}</code></p>
	<h3>What parameters does it take?</h3>
	<p>None at this time.</p>';
$lang['admin']['help_function_menu'] = '	<h3>What does this do?</h3>
	<p>This is actually just a wrapper tag for the <a href="listmodules.php?action=showmodulehelp&amp;module=MenuManager">Menu Manager module</a> to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;MenuManager&#039;}</code> you can now just use <code>{menu}</code> to insert the module on pages and templates.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{menu}</code> on a page or in a template. For help about the Menu Manager module, what parameters it takes etc., please refer to the <a href="listmodules.php?action=showmodulehelp&amp;module=MenuManager">Menu Manager module help</a>.';
$lang['admin']['help_function_last_modified_by'] = '        <h3>What does this do?</h3>
        <p>Prints last person that edited this page.  If no format is given, it will default to a ID number of user .</p>
        <h3>How do I use it?</h3>
        <p>Just insert the tag into your template/page like: <code>{last_modified_by format=&quot;fullname&quot;}</code></p>
        <h3>What parameters does it take?</h3>
        <ul>
                <li><em>(optional)</em>format - id, username, fullname</li>
        </ul>';
$lang['admin']['help_function_image'] = '<h3>What does this do?</h3>
  <p>Creates an image tag to an image stored within your images directory</p>
  <h3>How do I use it?</h3>
  <p>Just insert the tag into your template/page like: <code>{image src=&quot;something.jpg&quot;}</code></p>
  <h3>What parameters does it take?</h3>
  <ul>
     <li><em>(required)</em>  <tt>src</tt> - Image filename within your images directory.</li>
     <li><em>(optional)</em>  <tt>width</tt> - Width of the image within the page. Defaults to true size.</li>
     <li><em>(optional)</em>  <tt>height</tt> - Height of the image within the page. Defaults to true size.</li>
     <li><em>(optional)</em>  <tt>alt</tt> - Alt text for the image -- needed for xhtml compliance. Defaults to filename.</li>
     <li><em>(optional)</em>  <tt>class</tt> - CSS class for the image.</li>
     <li><em>(optional)</em>  <tt>title</tt> - Mouse over text for the image. Defaults to Alt text.</li>
     <li><em>(optional)</em>  <tt>addtext</tt> - Additional text to put into the tag</li>
  </ul>';
$lang['admin']['help_function_html_blob'] = '	<h3>Co to robi?</h3>
	<p>Zobacz pomoc dla global_content.</p>';
$lang['admin']['help_function_google_search'] = '	<h3>What does this do?</h3>
	<p>Search&#039;s your website using Google&#039;s search engine.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{google_search}</code><br>
	<br>
	Note: Google needs to have your website indexed for this to work. You can submit your website to google <a href="http://www.google.com/addurl.html">here</a>.</p>
	<h3>What if I want to change the look of the textbox or button?</h3>
	<p>The look of the textbox and button can be changed via css. The textbox is given an id of textSearch and the button is given an id of buttonSearch.</p>

	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em> domain - This tells google the website domain to search. This script tries to determine this automatically.</li>
		<li><em>(optional)</em> buttonText - The text you want to display on the search button. The default is &quot;Search Site&quot;.</li>
	</ul>
	</p>';
$lang['admin']['help_function_global_content'] = '	<h3>What does this do?</h3>
	<p>Inserts a global content block into your template or page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{global_content name=&#039;myblob&#039;}</code>, where name is the name given to the block when it was created.</p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li>name - The name of the global content block to display.</li>
	</ul>';
$lang['admin']['help_function_get_template_vars'] = '	<h3>What does this do?</h3>
	<p>Dumps all the known smarty variables into your page</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{get_template_vars}</code></p>
	<h3>What parameters does it take?</h3>
											  <p>None at this time</p>';
$lang['admin']['help_function_uploads_url'] = '	<h3>What does this do?</h3>
	<p>Prints the uploads url location for the site.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{uploads_url}</code></p>
	<h3>What parameters does it take?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_embed'] = '	<h3>What does this do?</h3>
	<p>Enable inclusion (embeding) of any other application into the CMS. The most usual use could be a forum. 
	This implementation is using IFRAMES so older browsers can have problems. Sorry bu this is the only known way 
	that works without modifing the embeded application.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{embed url=http://www.google.com/}</code><br></p>
        <h4>Example to make the iframe larger</h4>
	<p>Add the following to your style sheet:</p>
        <pre>#myframe { height: 600px; }</pre>
        <h3>What parameters does it take?</h3>
        <ul>
               <li><em>(required)</em>url - the url to be included 
               <li><em>(optional)</em>header=true - this will generate the header code for good resizing of the IFRAME.</li>

        </ul>
       <p>You must include in your page content {embed url=..} and in the &quot;Metadata:&quot; section (advanced tab) you must put {embed header=true}. Also be sure to put this in between the &quot;head&quot; tags of your template: {metadata}</p>';
$lang['admin']['help_function_description'] = '	<h3>What does this do?</h3>
	<p>Prints the description (title attribute) of the page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{description}</code></p>
	<h3>What parameters does it take?</h3>
	<p>None at this time.</p>';
$lang['admin']['help_function_created_date'] = '        <h3>What does this do?</h3>
        <p>Prints the date and time the page was created.  If no format is given, it will default to a format similar to &#039;Jan 01, 2004&#039;.</p>
        <h3>How do I use it?</h3>
        <p>Just insert the tag into your template/page like: <code>{created_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
        <h3>What parameters does it take?</h3>
        <ul>
                <li><em>(optional)</em>format - Date/Time format using parameters from php&#039;s strftime function.  See <a href="http://php.net/strftime" target="_blank">here</a> for a parameter list and information.</li>
        </ul>';
$lang['admin']['help_function_content'] = '	<h3>What does this do?</h3>
	<p>This is where the content for your page will be displayed.  It&#039;s inserted into the template and changed based on the current page being displayed.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template like: <code>{content}</code>.</p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em>block - Allows you to have more than one content block per page.  When multiple content tags are put on a template, that number of edit boxes will be displayed when the page is edited.
<p>Example:</p>
<pre>{content block=&quot;Second Content Block&quot;}</pre>
<p>Now, when you edit a page there will a textarea called &quot;Second Content Block&quot;.</li>
		<li><em>(optional)</em>wysiwyg (true/false) - If set to false, then a wysiwyg will never be used while editing this block.  If true, then it acts as normal.  Only works when block parameter is used.</li>
		<li><em>(optional)</em>oneline (true/false) - If set to true, then only one edit line will be shown while editing this block.  If false, then it acts as normal.  Only works when block parameter is used.</li>
		<li><em>(optional)</em>default - Allows you to specify default content content for this content blocks (additional content blocks only).</li>
		<li><em>(optional)</em>assign - Assigns the content to a smarty parameter, which you can then use in other areas of the page, or use to test whether content exists in it or not.
<p>Example of passing page content to a User Defined Tag as a parameter:</p>
<pre>
         {content assign=pagecontent}
         {table_of_contents thepagecontent=&quot;$pagecontent&quot;}
</pre>
</li>
	</ul>';
$lang['admin']['help_function_contact_form'] = '  <h2>NOTE: This plugin is deprecated</h2>
  <h3>This plugin has been removed as of CMS made simple version 1.5</h3>
  <p>You can use the module FormBuilder instead.</p>';
$lang['admin']['help_function_cms_versionname'] = '	<h3>What does this do?</h3>
	<p>This tag is used to insert the current version name of CMS into your template or page.  It doesn&#039;t display any extra besides the version name.</p>
	<h3>How do I use it?</h3>
	<p>This is just a basic tag plugin.  You would insert it into your template or page like so: <code>{cms_versionname}</code>
	<h3>What parameters does it take?</h3>
	<p>It takes no parameters.</p>';
$lang['admin']['help_function_cms_version'] = '	<h3>What does this do?</h3>
	<p>This tag is used to insert the current version number of CMS into your template or page.  It doesn&#039;t display any extra besides the version number.</p>
	<h3>How do I use it?</h3>
	<p>This is just a basic tag plugin.  You would insert it into your template or page like so: <code>{cms_version}</code>
	<h3>What parameters does it take?</h3>
	<p>It takes no parameters.</p>';
$lang['admin']['about_function_cms_selflink'] = '		<p>Author: Ted Kulp <tedkulp@users.sf.net></p>
		<p>Version: 1.1</p>
		<p>Modified: Martin B. Vestergaard <mbv@nospam.dk></p>
		<p>Version: 1.41</p>
		<p>Modified: Russ Baldwin</p>
		<p>Version: 1.42</p>
		<p>Modified: Marcus Bointon <coolbru@users.sf.net></p>
		<p>Version: 1.43</p>
		<p>Modified: Tatu Wikman <tsw@backspace.fi></p>
		<p>Version: 1.44</p>
		<p>Modified: Hans Mogren <http://hans.bymarken.net/></p>
		<p>Version: 1.45</p>

		<p>
		Change History:<br/>
		1.46 - Fixes a problem with too many queries when using the dir=start option.<br/>
		1.45 - Added a new option for &quot;dir&quot;, &quot;up&quot;, for links to the parent page e.g. dir=&quot;up&quot; (Hans Mogren).<br />
		1.44 - Added new parameters &quot;ext&quot; and &quot;ext_info&quot; to allow external links with class=&quot;external&quot; and info text after the link, ugly hack but works thinking about rewriting this(Tatu Wikman)<br />
		1.43 - Added new parameters &quot;image&quot; and &quot;imageonly&quot; to allow attachment of images to be used for page links, either instead of or in addition to text links. (Marcus Bointon)<br />
		1.42 - Added new parameter &quot;anchorlink&quot; and a new option for &quot;dir&quot; namely, &quot;anchor&quot;, for internal page links. e.g. dir=&quot;anchor&quot; anchorlink=&quot;internal_link&quot;. (Russ)<br />
		1.41 - added new parameter &quot;href&quot; (LeisureLarry)<br />
		1.4 - fixed bug next/prev linking to non-content pages. (Thanks Teemu Koistinen for this fix)<br />
		1.3 - added option &quot;more&quot;<br />
		1.2 - by Martin B. Vestergaard
		<ul>
		<li>changed default text to Page Name (was Page Alias)</li>
		<li>added option dir=next/prev to display next or previous item in the hirachy - thanks to 100rk</li>
		<li>added option class to add a class= statement to the a-tag.</li>
		<li>added option menu to display menu-text in sted of Page Name</li>
		<li>added option lang to display link-labels in different languages</li>
		</ul>
		1.1 - Changed to new content system<br />
		1.0 - Initial release
		</p>';
$lang['admin']['help_function_cms_selflink'] = '		<h3>What does this do?</h3>
		<p>Creates a link to another CMSMS content page inside your template or content. Can also be used for external links with the ext parameter.</p>
		<h3>How do I use it?</h3>
		<p>Just insert the tag into your template/page like: <code>{cms_selflink page=&quot;1&quot;}</code> or  <code>{cms_selflink page=&quot;alias&quot;}</code></p>
		<h3>What parameters does it take?</h3>
		<p>
		<ul>
		<li><em>(optional)</em> <tt>page</tt> - Page ID or alias to link to.</li>
		<li><em>(optional)</em> <tt>dir anchor (internal links)</tt> - New option for an internal page link. If this is used then <tt>anchorlink</tt> should be set to your link. </li> <!-- Russ - 25-04-2006 -->
		<li><em>(optional)</em> <tt>anchorlink</tt> - New paramater for an internal page link. If this is used then <tt>dir =&quot;anchor&quot;</tt> should also be set. No need to add the #, because it is added automatically.</li> <!-- Russ - 25-04-2006 -->
		<li><em>(optional)</em> <tt>urlparam</tt> - Specify additional parameters to the URL.  <strong>Do not use this in conjunction with the <em>anchorlink</em> parameter</em></strong>
		<li><em>(optional)</em> <tt>tabindex =&quot;a value&quot;</tt> - Set a tabindex for the link.</li> <!-- Russ - 22-06-2005 -->
		<li><em>(optional)</em> <tt>dir start/next/prev/up (previous)</tt> - Links to the default start page or the next or previous page, or the parent page (up). If this is used <tt>page</tt> should not be set.</li> <!-- mbv - 21-06-2005 -->
		<B>Note!</B> Only one of the above may be used in the same cms_selflink statement!!
		<li><em>(optional)</em> <tt>text</tt> - Text to show for the link.  If not given, the Page Name is used instead.</li>
		<li><em>(optional)</em> <tt>menu 1/0</tt> - If 1 the Menu Text is used for the link text instead of the Page Name</li> <!-- mbv - 21-06-2005 -->
		<li><em>(optional)</em> <tt>target</tt> - Optional target for the a link to point to.  Useful for frame and javascript situations.</li>
		<li><em>(optional)</em> <tt>class</tt> - Class for the <a> link. Useful for styling the link.</li> <!-- mbv - 21-06-2005 -->
		<li><em>(optional)</em> <tt>lang</tt> - Display link-labels  (&quot;Next Page&quot;/&quot;Previous Page&quot;) in different languages (0 for no label.) Danish (dk), English (en) or French (fr), for now.</li> <!-- mbv - 21-06-2005 -->
		<li><em>(optional)</em> <tt>id</tt> - Optional css_id for the <a> link.</li> <!-- mbv - 29-06-2005 -->
		<li><em>(optional)</em> <tt>more</tt> - place additional options inside the <a> link.</li> <!-- mbv - 29-06-2005 -->
		<li><em>(optional)</em> <tt>label</tt> - Label to use in with the link if applicable.</li>
		<li><em>(optional)</em> <tt>label_side left/right</tt> - Side of link to place the label (defaults to &quot;left&quot;).</li>
		<li><em>(optional)</em> <tt>title</tt> - Text to use in the title attribute.  If none is given, then the title of the page will be used for the title.</li>
		<li><em>(optional)</em> <tt>rellink 1/0</tt> - Make a relational link for accessible navigation.  Only works if the dir parameter is set and should only go in the head section of a template.</li>
		<li><em>(optional)</em> <tt>href</tt> - If href is used only the href value is generated (no other parameters possible). <strong>Example:</strong> <a href="{cms_selflink href="alias"}"><img src=&quot;&quot;></a></li>
		<li><em>(optional)</em> <tt>image</tt> - A url of an image to use in the link. <strong>Example:</strong> {cms_selflink dir=&quot;next&quot; image=&quot;next.png&quot; text=&quot;Next&quot;}</li>
		<li><em>(optional)</em> <tt>alt</tt> - Alternative text to be used with image (alt=&quot;&quot; will be used if no alt parameter is given).</li>
		<li><em>(optional)</em> <tt>imageonly</tt> - If using an image, whether to suppress display of text links. If you want no text in the link at all, also set lang=0 to suppress the label. <B>Example:</B> {cms_selflink dir=&quot;next&quot; image=&quot;next.png&quot; text=&quot;Next&quot; imageonly=1}</li>
		<li><em>(optional)</em> <tt>ext</tt> - For external links, will add class=&quot;external and info text. <strong>warning:</strong> only text, target and title parameters are compatible with this parameter</li>
		<li><em>(optional)</em> <tt>ext_info</tt> - Used together with &quot;ext&quot; defaults to (external link)</li>
		</ul>
		</p>';
$lang['admin']['about_function_cms_module'] = '	<p>Author: Ted Kulp<tedkulp@users.sf.net></p>
	<p>Version: 1.0</p>
	<p>
	Change History:<br/>
	None
	</p>';
$lang['admin']['help_function_cms_module'] = '	<h3>What does this do?</h3>
	<p>This tag is used to insert modules into your templates and pages.  If a module is created to be used as a tag plugin (check it&#039;s help for details), then you should be able to insert it with this tag.</p>
	<h3>How do I use it?</h3>
	<p>It&#039;s just a basic tag plugin.  You would insert it into your template or page like so: <code>{cms_module module=&quot;somemodulename&quot;}</code>
	<h3>What parameters does it take?</h3>
	<p>There is only one required parameter.  All other parameters are passed on to the module.
	<ul>
		<li>module - Name of the module to insert.  This is not case sensitive.</li>
	</ul>
	</p>';
$lang['admin']['about_function_breadcrumbs'] = '<p>Author: Marcus Deglos <<a href="mailto:md@zioncore.com">md@zioncore.com</a>></p>
<p>Version: 1.7</p>
<p>
Change History:<br/>
1.1 - Modified to use new content rewrite (wishy)<br />
1.2 - Added parameters: delimiter, initial, and root (arl)<br />
1.3 - Added parameter: classid (tdh / perl4ever)<br />
1.4 - Added parameter currentclassid and fixed some bugs (arl)<br />
1.5 - Modified to use new hierarchy manager<br />
1.6 - Modified to skip any parents that are marked to be &quot;not shown in menu&quot; except for root<br />
1.7 - Added root_url parameter (elijahlofgren)<br />
</p>';
$lang['admin']['help_function_breadcrumbs'] = '<h3>What does this do?</h3>
<p>Prints a breadcrumb trail .</p>
<h3>How do I use it?</h3>
<p>Just insert the tag into your template/page like: <code>{breadcrumbs}</code></p>
<h3>What parameters does it take?</h3>
<p>
<ul>
<li><em>(optional)</em> <tt>delimiter</tt> - Text to seperate entries in the list (default &quot;>>&quot;).</li>
<li><em>(optional)</em> <tt>initial</tt> - 1/0 If set to 1 start the breadcrumbs with a delimiter (default 0).</li>
<li><em>(optional)</em> <tt>root</tt> - Page alias of a page you want to always appear as the first page in
    the list. Can be used to make a page (e.g. the front page) appear to be the root of everything even though it is not.</li>
<li><em>(optional)</em> <tt>root_url</tt> - Override the URL of the root page. Useful for making link be to &#039;/&#039; instead of &#039;/home/&#039;. This requires that the root page be set as the default page.</li>
<li><em>(optional)</em> <tt>classid</tt> - The CSS class for the non current page names, i.e. the first n-1 pages in the list. If the name is a link it is added to the <a href> tags, otherwise it is added to the <span> tags.</li>
<li><em>(optional)</em> <tt>currentclassid</tt> - The CSS class for the <span> tag surrounding the current page name.</li>
<li><em>(optional)</em> <tt>starttext</tt> - Text to append to the front of the breadcrumbs list, something like &quot;You are here&quot;.</li>
</ul>
</p>';
$lang['admin']['about_function_anchor'] = '	<p>Author: Ted Kulp<tedkulp@users.sf.net></p>
	<p>Version: 1.1</p>
	<p>
	Change History:<br/>
	<strong>Update to version 1.1 from 1.0</strong> <em>2006/07/19</em><br/>
	Russ added the means to insert a title, a tabindex and a class for the anchor link. Westis added accesskey and changed parameter names to not include &#039;anchorlink&#039;.<br/>
	</hr>
	</p>';
$lang['admin']['help_function_anchor'] = '	<h3>What does this do?</h3>
	<p>Makes a proper anchor link.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{anchor anchor=&#039;here&#039; text=&#039;Scroll Down&#039;}</code></p>
	<h3>What parameters does it take?</h3>
	<p>
	<ul>
	<li><tt>anchor</tt> - Where we are linking to.  The part after the #.</li>
	<li><tt>text</tt> - The text to display in the link.</li>
	<li><tt>class</tt> - The class for the link, if any</li>
	<li><tt>title</tt> - The title to display for the link, if any.</li>
	<li><tt>tabindex</tt> - The numeric tabindex for the link, if any.</li>
	<li><tt>accesskey</tt> - The accesskey for the link, if any.</li>
	<li><em>(optional)</em> <tt>onlyhref</tt> - Only display the href and not the entire link. No other options will work</li>
	</ul>
	</p>';
$lang['admin']['help_function_site_mapper'] = '<h3>What does this do?</h3>
  <p>This is actually just a wrapper tag for the <a href="listmodules.php?action=showmodulehelp&amp;module=MenuManager">Menu Manager module</a> to make the tag syntax easier, and to simplify creating a sitemap.</p>
<h3>How do I use it?</h3>
  <p>Just put <code>{site_mapper}</code> on a page or in a template. For help about the Menu Manager module, what parameters it takes etc., please refer to the <a href="listmodules.php?action=showmodulehelp&amp;module=MenuManager">Menu Manager module help</a>.</p>
  <p>By default, if no template option is specified the minimal_menu.tpl file will be used.</p>
  <p>Any parameters used in the tag are available in the menumanager template as <code>{$menuparams.paramname}</code></p>';
$lang['admin']['help_function_redirect_url'] = '<h3>What does this do?</h3>
  <p>This plugin allows you to easily redirect to a specified url.  It is handy inside of smarty conditional logic (for example, redirect to a splash page if the site is not live yet).</p>
<h3>How do I use it?</h3>
<p>Simply insert this tage into your page or template: <code>{redirect_url urle=&#039;www.cmsmadesimple.org&#039;}</code></p>';
$lang['admin']['help_function_redirect_page'] = '<h3>What does this do?</h3>
 <p>This plugin allows you to easily redirect to another page.  It is handy inside of smarty conditional logic (for example, redirect to a login page if the user is not logged in.)</p>
<h3>How do I use it?</h3>
<p>Simply insert this tage into your page or template: <code>{redirect_page page=&#039;some-page-alias&#039;}</code></p>';
$lang['admin']['help_function_cms_jquery'] = '<h3>What does this do?</h3>
 <p>This plugin allows you output the javascript libraries and plugins used from the admin.</p>
<h3>How do I use it?</h3>
<p>Simply insert this tag into your page or template: <code>{cms_jquery}</code></p>

<h3>Sample</h3>
<pre><code>{cms_jquery cdn=&#039;true&#039; exclude=&#039;jquery.ui.nestedSortable-1.3.4.js&#039; append=&#039;uploads/NCleanBlue/js/ie6fix.js&#039;}</code></pre>
<h4><em>Outputs</em></h4>
<pre><code><script type=&quot;text/javascript&quot; src=&quot;https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js&quot;></script>
<script type=&quot;text/javascript&quot; src=&quot;https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js&quot;></script>
<script type=&quot;text/javascript&quot; src=&quot;http://localhost/1.10.x/lib/jquery/js/jquery.json-2.2.js&quot;></script>
<script type=&quot;text/javascript&quot; src=&quot;uploads/NCleanBlue/js/ie6fix.js&quot;></script>
</code></pre>

<h3><em>Included Defaults</em></h3>
<ul>
	<li><tt>jQuery</tt><em>(1.6.2)</em> - jquery-1.6.2.min.js</li>
	<li><tt>jQuery UI</tt><em>(1.8.14)</em> - jquery-ui-1.8.14.custom.min.js</li>
	<li><tt>nestedSortable</tt>(1.3.4) - jquery/js/jquery.ui.nestedSortable-1.3.4.js</li>
	<li><tt>jQuery json</tt><em>(2.2)</em> - jquery/js/jquery.json-2.2.js</li>
</ul>
    
<h3>What parameters does it take?</h3>
<ul>
	<li><em>(optional) </em><tt>exclude</tt> - use comma seperated value(CSV) list of scripts you would like to exclude. <code>&#039;jquery.ui.nestedSortable.js,jquery.json-2.2.js&#039;</code></li>
	<li><em>(optional) </em><tt>append</tt> - use comma seperated value(CSV) list of script paths you would like to append. <code>&#039;/uploade/jquery.ui.nestedSortable.js,http://code.jquery.com/jquery-1.6.2.min.js&#039;</code></li>
	<li><em>(optional) </em><tt>cdn</tt> - cdn=&#039;true&#039; will insert jQuery and jQueryUI Frameworks using Google&#039;s Content Delivery Netwok. Default is false.</li>
	<li><em>(optional) </em><tt>ssl</tt> - use to use the ssl_url as the base path.</li>
	<li><em>(optional) </em><tt>custom_root</tt> - use to set any base path wished.<code>custom_root=&#039;http://test.domain.com/&#039;</code> <br/>NOTE: overwrites ssl option and works with the cdn option</li>
	<li><em>(optional)</em> <tt>assign</tt> - Assign the results to the named smarty variable.</li>
	</ul>

';
$lang['admin']['of'] = 'z';
$lang['admin']['first'] = 'Pierwszy';
$lang['admin']['last'] = 'Ostatni';
$lang['admin']['adminspecialgroup'] = 'UWAGA: Członkowie tej grupy automatycznie mają włączone wszystkie uprawnienia';
$lang['admin']['disablesafemodewarning'] = 'Wyłącz ostrzeżenie o trybie bezpiecznym (safe mode warning)';
$lang['admin']['date_format_string'] = 'Format daty (string)';
$lang['admin']['date_format_string_help'] = '<em>strftime</em> sformatowany łańcuch znak&oacute;w formatu daty';
$lang['admin']['last_modified_at'] = 'Ostatnio zmodyfikowano o';
$lang['admin']['last_modified_by'] = 'Ostatnio zmodyfikowano przez';
$lang['admin']['read'] = 'Czytanie (read)';
$lang['admin']['write'] = 'Zapisywanie (write)';
$lang['admin']['execute'] = 'Wykonywanie (execute)';
$lang['admin']['group'] = 'Grupa';
$lang['admin']['other'] = 'Inni';
$lang['admin']['event_desc_moduleupgraded'] = 'Wyślij po upgradzie modułu';
$lang['admin']['event_help_moduleupgraded'] = '<p>Wyślij po upgradzie modułu.</p>';
$lang['admin']['event_desc_moduleinstalled'] = 'Wyślij po instalacji modułu';
$lang['admin']['event_help_moduleinstalled'] = '<p>Wyślij po instalacji modułu.</p>';
$lang['admin']['event_desc_moduleuninstalled'] = 'Wyślij po deinstalacji modułu';
$lang['admin']['event_help_moduleuninstalled'] = '<p>Wyślij po deinstalacji modułu.</p>';
$lang['admin']['event_desc_edituserdefinedtagpost'] = 'Wyślij po aktualizacji znacznika własnego ';
$lang['admin']['event_help_edituserdefinedtagpost'] = '<p>Wyślij po aktualizacji znacznika własnego .</p>';
$lang['admin']['event_desc_edituserdefinedtagpre'] = 'Wyślij przed aktualizacją znacznika własnego';
$lang['admin']['event_help_edituserdefinedtagpre'] = '<p>Wyślij przed aktualizacją znacznika własnego.</p>';
$lang['admin']['event_desc_deleteuserdefinedtagpre'] = 'Wyślij przed usunięciem znacznika własnego';
$lang['admin']['event_help_deleteuserdefinedtagpre'] = '<p>Wyślij przed usunięciem znacznika własnego.</p>';
$lang['admin']['event_desc_deleteuserdefinedtagpost'] = 'Wyślij po usunięciu znacznika własnego';
$lang['admin']['event_help_deleteuserdefinedtagpost'] = '<p>Wyślij po usunięciu znacznika własnego.</p>';
$lang['admin']['event_desc_adduserdefinedtagpost'] = 'Wyślij po wstawieniu znacznika własnego';
$lang['admin']['event_help_adduserdefinedtagpre'] = '<p>Wyślij po wstawieniu znacznika własnego.</p>';
$lang['admin']['event_desc_adduserdefinedtagpre'] = 'Wyślij przed wstawieniem znacznika własnego';
$lang['admin']['event_help_adduserdefinedtagpost'] = '<p>Wyślij przed wstawieniem znacznika własnego.</p>';
$lang['admin']['global_umask'] = 'Maska tworzenia pliku (umask)';
$lang['admin']['errorcantcreatefile'] = 'Nie można utworzyć pliku (sprawdź uprawnienia)';
$lang['admin']['errormoduleversionincompatible'] = 'Moduł nie jest kompatybilny z tą wersją CMS';
$lang['admin']['errormodulenotloaded'] = 'Błąd wewnętrzny, moduł nie został zainicjalizowany';
$lang['admin']['errormodulenotfound'] = 'Błąd wewnętrzny, nie można znaleźć instancji modułu';
$lang['admin']['errorinstallfailed'] = 'Błąd podczas instalacji modułu';
$lang['admin']['errormodulewontload'] = 'Problem przy inicjalizacji dostępnego modułu';
$lang['admin']['frontendlang'] = 'Domyślny język dla interfejsu użytkownika';
$lang['admin']['info_edituser_password'] = 'Zmień to pole aby zmienić hasło użytkownika';
$lang['admin']['info_edituser_passwordagain'] = 'Zmień to pole aby zmienić hasło użytkownika';
$lang['admin']['originator'] = 'Pochodzenie';
$lang['admin']['module_name'] = 'Nazwa modułu';
$lang['admin']['event_name'] = 'Nazwa zdarzenia';
$lang['admin']['event_description'] = 'Opis zdarzenia';
$lang['admin']['error_delete_default_parent'] = 'Nie możesz usunąć el. nadrzędnego domyślnej strony.';
$lang['admin']['jsdisabled'] = 'Przykro mi, ta funkcja wymaga włączenia obsługi Javascript.';
$lang['admin']['order'] = 'Numer porządkowy';
$lang['admin']['reorderpages'] = 'Zmień kolejność stron';
$lang['admin']['reorder'] = 'Uporządkuj';
$lang['admin']['page_reordered'] = 'Strona została pomyślnie uporządkowana.';
$lang['admin']['pages_reordered'] = 'Strony zostały pomyślnie uporządkowane.';
$lang['admin']['sibling_duplicate_order'] = 'Sąsiadujące strony nie mogą posiadać tego samego numeru porządkowego. Strony nie zostały uporządkowane.';
$lang['admin']['no_orders_changed'] = 'Wybrano uporządkowanie stron, ale nie dokonano zmian numeru porządkowego żadnej z nich. Strony nie zostały uporządkowane.';
$lang['admin']['order_too_small'] = 'Numer porządkowy strony nie może wynosić zero. Strony nie zostały uporządkowane.';
$lang['admin']['order_too_large'] = 'Numer porządkowy strony nie może być większy niż ilość stron na tym poziomie. Strony nie zostały uporządkowane.';
$lang['admin']['user_tag'] = 'Znacznik użytkownika';
$lang['admin']['add'] = 'Dodaj';
$lang['admin']['CSS'] = 'Styl CSS';
$lang['admin']['about'] = 'Opis';
$lang['admin']['action'] = 'Akcja';
$lang['admin']['actionstatus'] = 'Akcja/Status';
$lang['admin']['active'] = 'Aktywny/a';
$lang['admin']['addcontent'] = 'Dodaj nową treść';
$lang['admin']['cantremove'] = 'Nie można usunąć';
$lang['admin']['changepermissions'] = 'Zmiana uprawnień';
$lang['admin']['changepermissionsconfirm'] = 'UWAGA !\n\nTa operacja wymaga aby wszystkie pliki tworzące moduł miały uprawnienia do zapisu przez serwer www.\nCzy na pewno chcesz kontynuować?';
$lang['admin']['contentadded'] = 'Zawartość została pomyślnie dodana do bazy danych.';
$lang['admin']['contentupdated'] = 'Zawartość została pomyślnie zaktualizowana.';
$lang['admin']['contentdeleted'] = 'Zawartość została pomyślnie usunięta z bazy danych.';
$lang['admin']['success'] = 'Powodzenie';
$lang['admin']['addcss'] = 'Dodaj nowy arkusz CSS';
$lang['admin']['addgroup'] = 'Dodaj nową grupę';
$lang['admin']['additionaleditors'] = 'Dodatkowi edytorzy';
$lang['admin']['addtemplate'] = 'Dodaj nowy szablon';
$lang['admin']['adduser'] = 'Dodaj nowego użytkownika';
$lang['admin']['addusertag'] = 'Dodaj własny znacznik';
$lang['admin']['adminaccess'] = 'Dostęp do logowania na administratora';
$lang['admin']['adminlog'] = 'Dziennik administratora';
$lang['admin']['adminlogcleared'] = 'Dziennik administratora został wyczyszczony';
$lang['admin']['adminlogempty'] = 'Dziennik administratora jest pusty';
$lang['admin']['adminsystemtitle'] = 'System administracji CMS';
$lang['admin']['adminpaneltitle'] = 'Panel administracyjny CMS Made Simple';
$lang['admin']['advanced'] = 'Zaawansowane';
$lang['admin']['aliasalreadyused'] = 'Alias jest już używany na innej stronie';
$lang['admin']['aliasmustbelettersandnumbers'] = 'Alias musi być alfanumeryczny';
$lang['admin']['aliasnotaninteger'] = 'Alias nie może być liczbą';
$lang['admin']['allpagesmodified'] = 'Wszystkie strony zostały zmodyfikowane!';
$lang['admin']['assignments'] = 'Przypisz użytkownik&oacute;w';
$lang['admin']['associationexists'] = 'To przyporządkowanie już istnieje';
$lang['admin']['autoinstallupgrade'] = 'Automatyczna instalacja lub aktualizacja';
$lang['admin']['back'] = 'Wr&oacute;ć do menu';
$lang['admin']['backtoplugins'] = 'Wr&oacute;ć do listy wtyczek';
$lang['admin']['cancel'] = 'Anuluj';
$lang['admin']['cantchmodfiles'] = 'Nie udało się zmienić praw dostępu dla niekt&oacute;rych plik&oacute;w';
$lang['admin']['cantremovefiles'] = 'Problem przy usuwaniu plik&oacute;w (uprawnienia?)';
$lang['admin']['confirmcancel'] = 'Czy na pewno odrzucić zmiany? Kliknij OK aby odrzucić wszystkie zmiany. Kliknij Anuluj aby kontynuować edycję.';
$lang['admin']['canceldescription'] = 'Odrzuć zmiany';
$lang['admin']['clearadminlog'] = 'Wyczyść dziennik administratora';
$lang['admin']['code'] = 'Kod';
$lang['admin']['confirmdefault'] = 'Czy na pewno chcesz ustawić tę stronę jako domyślną?';
$lang['admin']['confirmdeletedir'] = 'Czy na pewno chcesz usunąć ten katalog i całą jego zawartość?';
$lang['admin']['content'] = 'Treść';
$lang['admin']['contentmanagement'] = 'Zarządzanie treścią';
$lang['admin']['contenttype'] = 'Typ zawartości';
$lang['admin']['copy'] = 'Kopiuj';
$lang['admin']['copytemplate'] = 'Kopiuj szablon';
$lang['admin']['create'] = 'Utw&oacute;rz';
$lang['admin']['createnewfolder'] = 'Utw&oacute;rz nowy folder';
$lang['admin']['cssalreadyused'] = 'Nazwa tego CSS jest już w użyciu';
$lang['admin']['cssmanagement'] = 'Zarządzanie CSS';
$lang['admin']['currentassociations'] = 'Bieżące przyporządkowania';
$lang['admin']['currentdirectory'] = 'Bieżący katalog';
$lang['admin']['currentgroups'] = 'Bieżące grupy';
$lang['admin']['currentpages'] = 'Bieżące strony';
$lang['admin']['currenttemplates'] = 'Bieżące szablony';
$lang['admin']['currentusers'] = 'Bieżący użytkownicy';
$lang['admin']['custom404'] = 'Własny komunikat błędu 404';
$lang['admin']['database'] = 'Baza danych';
$lang['admin']['databaseprefix'] = 'Prefiks bazy danych';
$lang['admin']['databasetype'] = 'Typ bazy danych';
$lang['admin']['date'] = 'Data';
$lang['admin']['default'] = 'Domyślny/a';
$lang['admin']['delete'] = 'Usuń';
$lang['admin']['deleteconfirm'] = 'Na pewno chcesz usunąć?';
$lang['admin']['deleteassociationconfirm'] = 'Czy na pewno chcesz usunąć połączenie z - %s - ?';
$lang['admin']['deletecss'] = 'Usuń CSS';
$lang['admin']['dependencies'] = 'Zależności';
$lang['admin']['description'] = 'Opis';
$lang['admin']['directoryexists'] = 'Taki katalog już istnieje';
$lang['admin']['down'] = 'W d&oacute;ł';
$lang['admin']['edit'] = 'Edytuj';
$lang['admin']['editconfiguration'] = 'Edycja konfiguracji';
$lang['admin']['editcontent'] = 'Edycja treści';
$lang['admin']['editcss'] = 'Edycja arkusza styli';
$lang['admin']['editcsssuccess'] = 'Arkusz styli zaktualizowano';
$lang['admin']['editgroup'] = 'Edycja grupy';
$lang['admin']['editpage'] = 'Edycja strony';
$lang['admin']['edittemplate'] = 'Edycja szablonu';
$lang['admin']['edittemplatesuccess'] = 'Szablon zaktualizowano';
$lang['admin']['edituser'] = 'Edycja użytkownika';
$lang['admin']['editusertag'] = 'Edycja własnych znacznik&oacute;w';
$lang['admin']['usertagadded'] = 'Znacznik własny został pomyślnie dodany.';
$lang['admin']['usertagupdated'] = 'Znacznik własny został pomyślnie zaktualizowany.';
$lang['admin']['usertagdeleted'] = 'Znacznik własny został pomyślnie usunięty.';
$lang['admin']['email'] = 'Adres e-mail';
$lang['admin']['errorattempteddowngrade'] = 'Instalacja tego modułu spowoduje użycie niższej wersji. Operacja zaniechana.';
$lang['admin']['errorchildcontent'] = 'Nadal istnieją dokumenty podrzędne. Usuń je najpierw.';
$lang['admin']['errorcopyingtemplate'] = 'Błąd przy kopiowaniu szablonu';
$lang['admin']['errorcouldnotparsexml'] = 'Błąd podczas parsowania pliku XML';
$lang['admin']['errorcreatingassociation'] = 'Błąd przy tworzeniu przyporządkowania';
$lang['admin']['errorcssinuse'] = 'Ten arkusz jest używany przez jakiś szablon lub stronę. Usuń najpierw to przyporządkowanie.';
$lang['admin']['errordefaultpage'] = 'Nie można usunąć bieżącej strony domyślnej. Ustaw najpierw jakąś inną.';
$lang['admin']['errordeletingassociation'] = 'Błąd przy usuwaniu przyporządkowania';
$lang['admin']['errordeletingcss'] = 'Błąd przy usuwaniu CSS';
$lang['admin']['errordeletingdirectory'] = 'Nie można usunąć katalogu. Może to być problem z uprawnieniami';
$lang['admin']['errordeletingfile'] = 'Nie można usunąć pliku. Może to być problem z uprawnieniami.';
$lang['admin']['errordirectorynotwritable'] = 'Brak uprawnień do zapisu w katalogu';
$lang['admin']['errordtdmismatch'] = 'Brak informacji o wersji DTD lub jest niekompatybilna z plikiem XML';
$lang['admin']['errorgettingcssname'] = 'Bład przy odczycie nazwy arkusza styli';
$lang['admin']['errorgettingtemplatename'] = 'Błąd przy odczycie nazwy szablonu';
$lang['admin']['errorincompletexml'] = 'Plik XML jest niekompletny lub nieprawidłowy';
$lang['admin']['uploadxmlfile'] = 'Instaluj moduł poprzez plik XML';
$lang['admin']['cachenotwritable'] = 'Folder cache nie jest zapisywalny. Nie działa czyszczenie cache. Nadaj folderowi tmp/cache pełne uprawnienia odczyt/zapis/wykonanie (chmod 777)';
$lang['admin']['error_nomodules'] = 'No modules installed! Check Extensions > Modules';
$lang['admin']['modulesnotwritable'] = 'Folder modules nie jest zapisywalny, jeśli chcesz instalować moduły poprzez wgrywanie plik&oacute;w XML powinieneś nadać mu pełne uprawnienia odczyt/zapis/wykonanie (chmod 777)';
$lang['admin']['noxmlfileuploaded'] = 'Nie załadowano plik&oacute;w. Aby zainstalować moduł via XML musisz wybrać i załadować plik modułu .xml z twojego komputera.';
$lang['admin']['errorinsertingcss'] = 'Błąd przy wstawianiu arkusza styli';
$lang['admin']['errorinsertinggroup'] = 'Błąd przy wstawianiu grupy';
$lang['admin']['errorinsertingtag'] = 'Błąd przy wstawianiu znacznika użytkownika';
$lang['admin']['errorinsertingtemplate'] = 'Błąd przy wstawianiu szablonu';
$lang['admin']['errorinsertinguser'] = 'Błąd przy wstawianiu użytkownika';
$lang['admin']['errornofilesexported'] = 'Błąd przy eksporcie plik&oacute;w do xml';
$lang['admin']['errorretrievingcss'] = 'Błąd podczas dostępu do arkusza styli';
$lang['admin']['errorretrievingtemplate'] = 'Błąd podczas dostępu do szablonu';
$lang['admin']['errortemplateinuse'] = 'Ten szablon jest używany przez jakąś stronę. Usuń ją najpierw.';
$lang['admin']['errorupdatingcss'] = 'Błąd przy aktualizacji arkusza styli';
$lang['admin']['errorupdatinggroup'] = 'Błąd przy aktualizacji grupy';
$lang['admin']['errorupdatingpages'] = 'Błąd podczas uaktualniania stron';
$lang['admin']['errorupdatingtemplate'] = 'Błąd przy aktualizacji szablonu';
$lang['admin']['errorupdatinguser'] = 'Błąd przy aktualizacji użytkownika';
$lang['admin']['errorupdatingusertag'] = 'Błąd przy aktualizacji znacznika użytkownika';
$lang['admin']['erroruserinuse'] = 'Ten użytkownik nadal posiada strony. Zmień własność stron na innego użytkownika zanim usuniesz tego';
$lang['admin']['eventhandlers'] = 'Zdarzenia';
$lang['admin']['eventhandler'] = 'Obsługa zdarzeń';
$lang['admin']['editeventhandler'] = 'Edytuj obsługę zdarzeń';
$lang['admin']['eventhandlerdescription'] = 'Przypisz znaczniki własne do zdarzeń';
$lang['admin']['export'] = 'Eksport';
$lang['admin']['event'] = 'Zdarzenie';
$lang['admin']['false'] = 'Fałsz';
$lang['admin']['settrue'] = 'Ustaw na Prawda';
$lang['admin']['filecreatedirnodoubledot'] = 'Nazwa katalogu nie może zawierać \&#039;..\&#039;.';
$lang['admin']['filecreatedirnoname'] = 'Nie można utworzyć katalogu bez nazwy';
$lang['admin']['filecreatedirnoslash'] = 'Nazwa katalogu nie może zawierać \&#039;/\&#039; ani \&#039;\&#039;.';
$lang['admin']['filemanagement'] = 'Zarządzanie plikami';
$lang['admin']['filename'] = 'Nazwa pliku';
$lang['admin']['filenotuploaded'] = 'Nie można wgrać pliku. Może to być problem z uprawnieniami.';
$lang['admin']['filesize'] = 'Rozmiar pliku';
$lang['admin']['firstname'] = 'Imię';
$lang['admin']['groupmanagement'] = 'Zarządzanie grupą';
$lang['admin']['grouppermissions'] = 'Uprawnienia grupy';
$lang['admin']['handler'] = 'Program obsługi (znacznik własny)';
$lang['admin']['headtags'] = 'Nagł&oacute;wki';
$lang['admin']['help'] = 'Pomoc';
$lang['admin']['new_window'] = 'nowe okno';
$lang['admin']['helpwithsection'] = '%s Pomoc';
$lang['admin']['helpaddtemplate'] = '<p>Szablon jest tym, co kontroluje wygląd Twojego serwisu.</p><p>Możesz tutaj stworzyć układ serwisu i dodać CSS w sekcji Arkusze styli, aby kontrolować wygląd r&oacute;żnych element&oacute;w.</p>';
$lang['admin']['helplisttemplate'] = 'Ta strona pozwala edytować, usuwać i tworzyć szablony.</p><p>Aby utworzyć nowy szablon kliknij na przycisk <u>Dodaj nowy szablon</u>.</p><p>Jeśli chcesz ustawić wszystkie strony korzystały z tego samego szablonu, kliknij na link <u>Ustaw dla wszystkich treści</u>.</p><p>Jeśli chcesz powielić szablon, kliknij na ikonę <u>Kopiuj</userdefined> i podaj nową nazwę dla powielonego szablonu.</p>';
$lang['admin']['home'] = 'Home (start)';
$lang['admin']['homepage'] = 'Strona startowa (homepage)';
$lang['admin']['hostname'] = 'Nazwa hosta';
$lang['admin']['idnotvalid'] = 'Podany identyfikator jest nieprawidłowy';
$lang['admin']['imagemanagement'] = 'Menadżer obrazk&oacute;w';
$lang['admin']['informationmissing'] = 'Brakująca informacja';
$lang['admin']['install'] = 'Instaluj';
$lang['admin']['invalidcode'] = 'Wprowadzono błędny kod.';
$lang['admin']['illegalcharacters'] = 'Nieprawidłowe znaki w polu %s.';
$lang['admin']['invalidcode_brace_missing'] = 'Nieparzysta liczba nawias&oacute;w';
$lang['admin']['invalidtemplate'] = 'Szablon jest nieprawidłowy';
$lang['admin']['itemid'] = 'Identyfikator';
$lang['admin']['itemname'] = 'Nazwa';
$lang['admin']['language'] = 'Język';
$lang['admin']['lastname'] = 'Nazwisko';
$lang['admin']['logout'] = 'Wyloguj';
$lang['admin']['loginprompt'] = 'Wprowadź poprawne dane uprawnionego użytkownika aby uzyskać dostęp do panelu administracyjnego';
$lang['admin']['logintitle'] = 'Logowanie do panelu administracyjnego CMS Made Simple';
$lang['admin']['menutext'] = 'Tekst w menu';
$lang['admin']['missingparams'] = 'Brakuje niekt&oacute;rych parametr&oacute;w lub są nieprawidłowe';
$lang['admin']['modifygroupassignments'] = 'Modyfikuj przypisania grupy';
$lang['admin']['moduleabout'] = 'O module %s';
$lang['admin']['modulehelp'] = 'Pomoc dla modułu %s';
$lang['admin']['msg_defaultcontent'] = 'Dodaj kod, kt&oacute;ry pojawiać się będzie jako domyślna treść każdej nowej strony';
$lang['admin']['msg_defaultmetadata'] = 'Dodaj kod, kt&oacute;ry pojawiać się będzie jako domyślna wartość sekcji meta-znacznik&oacute;w (metadata) każdej nowej strony';
$lang['admin']['wikihelp'] = 'Pomoc Społeczności';
$lang['admin']['moduleinstalled'] = 'Moduł jest już zainstalowany';
$lang['admin']['moduleinterface'] = 'Interfejs %s';
$lang['admin']['modules'] = 'Moduły';
$lang['admin']['move'] = 'Przesuń';
$lang['admin']['name'] = 'Nazwa';
$lang['admin']['needpermissionto'] = 'Musisz mieć dostęp \&#039;%s\&#039; aby wykonać tę funkcję';
$lang['admin']['needupgrade'] = 'Wymaga aktualizacji';
$lang['admin']['newtemplatename'] = 'Nowa nazwa szablony';
$lang['admin']['next'] = 'Następny';
$lang['admin']['noaccessto'] = 'Brak dostępu do %s';
$lang['admin']['nocss'] = 'Brak arkusza styli';
$lang['admin']['noentries'] = 'Brak wpis&oacute;w';
$lang['admin']['nofieldgiven'] = 'Nie podano %s !';
$lang['admin']['nofiles'] = 'Brak plik&oacute;w';
$lang['admin']['nopasswordmatch'] = 'Hasła nie zgadzają się';
$lang['admin']['norealdirectory'] = 'Nie podano właściwego katalogu';
$lang['admin']['norealfile'] = 'Nie podano właściwego pliku';
$lang['admin']['notinstalled'] = 'Nie zainstalowano';
$lang['admin']['overwritemodule'] = 'Nadpisz istniejące moduły';
$lang['admin']['owner'] = 'Właściciel';
$lang['admin']['pagealias'] = 'Alias strony';
$lang['admin']['content_id'] = 'Content ID';
$lang['admin']['pagedefaults'] = 'Ustawienia domyślne strony';
$lang['admin']['pagedefaultsdescription'] = 'Ustaw domyślne wartości dla nowych stron';
$lang['admin']['parent'] = 'Nadrzędny';
$lang['admin']['password'] = 'Hasło';
$lang['admin']['passwordagain'] = 'Hasło (powt&oacute;rz)';
$lang['admin']['permission'] = 'Uprawnienie';
$lang['admin']['permissions'] = 'Uprawnienia';
$lang['admin']['permissionschanged'] = 'Uaktualniono uprawnienia';
$lang['admin']['pluginabout'] = 'O znaczniku %s';
$lang['admin']['pluginhelp'] = 'Pomoc dla znacznika %s';
$lang['admin']['pluginmanagement'] = 'Zarządzanie wtyczkami';
$lang['admin']['prefsupdated'] = 'Uaktualniono preferencje';
$lang['admin']['accountupdated'] = 'User account has been updated.';
$lang['admin']['preview'] = 'Podgląd';
$lang['admin']['previewdescription'] = 'Podgląd zmian';
$lang['admin']['previous'] = 'Poprzedni';
$lang['admin']['remove'] = 'Usuń';
$lang['admin']['removeconfirm'] = 'Ta operacja spowoduje trwałe usunięcie plik&oacute;w tworzących ten moduł z danej instalacji.\nCzy na pewno chcesz kontynuować ?';
$lang['admin']['removecssassociation'] = 'Usuń przyporządkowania arkusza styli';
$lang['admin']['saveconfig'] = 'Zapisz konfigurację';
$lang['admin']['send'] = 'Wyślij';
$lang['admin']['setallcontent'] = 'Ustaw dla wszystkich treści';
$lang['admin']['setallcontentconfirm'] = 'Czy jesteś pewny/a, że chcesz aby wszystkie strony używały tego szablonu ?';
$lang['admin']['showinmenu'] = 'Wyświetl w menu';
$lang['admin']['use_name'] = 'In the parent page dropdown, show the page title instead of the menu text';
$lang['admin']['showsite'] = 'Wyświetl stronę';
$lang['admin']['sitedownmessage'] = 'Wiadomość o niedostępności strony';
$lang['admin']['siteprefs'] = 'Ustawienia og&oacute;lne';
$lang['admin']['status'] = 'Status ';
$lang['admin']['stylesheet'] = 'Arkusz styli';
$lang['admin']['submit'] = 'Zatwierdź';
$lang['admin']['submitdescription'] = 'Zapisz zmiany';
$lang['admin']['tags'] = 'Znaczniki';
$lang['admin']['template'] = 'Szablon';
$lang['admin']['templateexists'] = 'Nazwa szablonu już istnieje';
$lang['admin']['templatemanagement'] = 'Zarządzanie szablonami';
$lang['admin']['title'] = 'Tytuł';
$lang['admin']['tools'] = 'Narzędzia';
$lang['admin']['true'] = 'Prawda';
$lang['admin']['setfalse'] = 'Ustaw na Fałsz';
$lang['admin']['type'] = 'Typ';
$lang['admin']['typenotvalid'] = 'Typ jest nieprawidłowy';
$lang['admin']['uninstall'] = 'Odinstaluj';
$lang['admin']['uninstallconfirm'] = 'Na pewno chcesz odinstalować ten moduł? Nazwa:';
$lang['admin']['up'] = 'W g&oacute;rę';
$lang['admin']['upgrade'] = 'Aktualizuj';
$lang['admin']['upgradeconfirm'] = 'Czy na pewno chcesz to aktualizować?';
$lang['admin']['uploadfile'] = 'Wgraj plik';
$lang['admin']['url'] = 'Link URL';
$lang['admin']['useadvancedcss'] = 'Użyj zaawansowanego zarządzania arkuszami styli';
$lang['admin']['user'] = 'Użytkownik';
$lang['admin']['userdefinedtags'] = 'Znaczniki użytkownika';
$lang['admin']['usermanagement'] = 'Zarządzanie użytkownikami';
$lang['admin']['username'] = 'Nazwa użytkownika';
$lang['admin']['usernameincorrect'] = 'Niewłaściwa nazwa lub hasłu użytkownika';
$lang['admin']['userprefs'] = 'Preferencje użytkownika';
$lang['admin']['useraccount'] = 'User Account';
$lang['admin']['lang_settings_legend'] = 'Language related settings';
$lang['admin']['content_editor_legend'] = 'Content editor settings';
$lang['admin']['admin_layout_legend'] = 'Admin lay-out settings';
$lang['admin']['usersassignedtogroup'] = 'Użytkownicy przypisani do grupy %s';
$lang['admin']['usertagexists'] = 'Znacznik o tej nazwie już istnieje. Wybierz inną nazwę.';
$lang['admin']['usewysiwyg'] = 'Użyj edytora WYSIWYG dla treści';
$lang['admin']['version'] = 'Wersja';
$lang['admin']['view'] = 'Zobacz';
$lang['admin']['welcomemsg'] = 'Witaj %s';
$lang['admin']['directoryabove'] = 'katalog powyżej bieżącego poziomu';
$lang['admin']['nodefault'] = 'Nie wybrano wartości domyślnej';
$lang['admin']['blobexists'] = 'Taka nazwa globalnego bloku HTML już istnieje';
$lang['admin']['blobmanagement'] = 'Zarządzanie globalnymi blokami HTML';
$lang['admin']['errorinsertingblob'] = 'Wystąpił błąd przy wstawianiu globalnego bloku HTML';
$lang['admin']['addhtmlblob'] = 'Dodaj globalny blok HTML';
$lang['admin']['edithtmlblob'] = 'Edytuj globalny blok HTML';
$lang['admin']['edithtmlblobsuccess'] = 'Globalny blok HTML zaktualizowano';
$lang['admin']['tagtousegcb'] = 'Znacznik wykorzystania tego bloku';
$lang['admin']['gcb_wysiwyg'] = 'Włącz GCB WYSIWYG';
$lang['admin']['gcb_wysiwyg_help'] = 'Włącz edytor WYSIWYG podczas edytowania globalnych blok&oacute;w zawartości';
$lang['admin']['filemanager'] = 'Menadżer plik&oacute;w';
$lang['admin']['imagemanager'] = 'Menadżer obrazk&oacute;w';
$lang['admin']['encoding'] = 'Kodowanie';
$lang['admin']['clearcache'] = 'Wyczyść pamięc podręczną';
$lang['admin']['clear'] = 'Wyczyść';
$lang['admin']['cachecleared'] = 'Wyczyszczono pamięć podręczną';
$lang['admin']['apply'] = 'Zastosuj';
$lang['admin']['applydescription'] = 'Zachowaj zmiany i przejdź do edycji';
$lang['admin']['none'] = 'Brak';
$lang['admin']['wysiwygtouse'] = 'Wybierz edytor WYSIWYG';
$lang['admin']['syntaxhighlightertouse'] = 'Wybierz podświetlenie składni, kt&oacute;re chcesz użyć';
$lang['admin']['hasdependents'] = 'Ma zależności';
$lang['admin']['missingdependency'] = 'Brakująca zależność';
$lang['admin']['minimumversion'] = 'Minimalna wersja';
$lang['admin']['minimumversionrequired'] = 'Wymagana minimalnie wersja CMSMS';
$lang['admin']['maximumversion'] = 'Wersja maksymalna';
$lang['admin']['maximumversionsupported'] = 'Najwyższa wersja CMSMS wspierana';
$lang['admin']['depsformodule'] = 'Zależności dla modułu %s';
$lang['admin']['installed'] = 'Zainstalowany/a';
$lang['admin']['author'] = 'Autor';
$lang['admin']['changehistory'] = 'Historia zmian';
$lang['admin']['moduleerrormessage'] = 'Komunikat błędu dla modułu %s';
$lang['admin']['moduleupgradeerror'] = 'Wystąpił błąd podczas aktualizowania modułu';
$lang['admin']['moduleinstallmessage'] = 'Komunikat instalacyjny modułu %s';
$lang['admin']['moduleuninstallmessage'] = 'Komunikat deinstalacyjny modułu %s';
$lang['admin']['admintheme'] = 'Motyw administracyjny';
$lang['admin']['addstylesheet'] = 'Dodaj arkusz styli';
$lang['admin']['editstylesheet'] = 'Edytuj arkusz styli';
$lang['admin']['addcssassociation'] = 'Dodaj powiązanie arkusza styli';
$lang['admin']['attachstylesheet'] = 'Dołącz ten arkusz styli';
$lang['admin']['attachtemplate'] = 'Dołącz do tego szablonu';
$lang['admin']['main'] = 'Gł&oacute;wna';
$lang['admin']['pages'] = 'Strony';
$lang['admin']['page'] = 'Strona';
$lang['admin']['files'] = 'Pliki';
$lang['admin']['layout'] = 'Wygląd';
$lang['admin']['usersgroups'] = 'Użytkownicy i Grupy';
$lang['admin']['extensions'] = 'Rozszerzenia';
$lang['admin']['preferences'] = 'Ustawienia';
$lang['admin']['admin'] = 'Administracja serwisu';
$lang['admin']['viewsite'] = 'Podgląd strony';
$lang['admin']['templatecss'] = 'Przypisz szablony do arkusza styli';
$lang['admin']['plugins'] = 'Wtyczki';
$lang['admin']['movecontent'] = 'Przenieś strony';
$lang['admin']['module'] = 'Moduł';
$lang['admin']['usertags'] = 'Znaczniki użytkownika';
$lang['admin']['htmlblobs'] = 'Globalne bloki HTML';
$lang['admin']['adminhome'] = 'Strona administracyjna';
$lang['admin']['liststylesheets'] = 'Arkusze styli';
$lang['admin']['preferencesdescription'] = 'Tutaj ustawia się r&oacute;żne preferencje dotyczące całego serwisu.';
$lang['admin']['adminlogdescription'] = 'Wyświetla dziennik kto, co i kiedy robił w panelu administracyjnym';
$lang['admin']['mainmenu'] = 'Menu gł&oacute;wne';
$lang['admin']['users'] = 'Użytkownicy';
$lang['admin']['usersdescription'] = 'Zarządzanie użytkownikami';
$lang['admin']['groups'] = 'Grupy';
$lang['admin']['groupsdescription'] = 'Zarządzanie grupami';
$lang['admin']['groupassignments'] = 'Przypisania grup';
$lang['admin']['groupassignmentdescription'] = 'Przypisywanie użytkownik&oacute;w do grup';
$lang['admin']['groupperms'] = 'Uprawnienia grup';
$lang['admin']['grouppermsdescription'] = 'Ustawianie uprawnień i poziom&oacute;w dostępu dla grup';
$lang['admin']['pagesdescription'] = 'Dodawanie i edycja stron i innych treści';
$lang['admin']['htmlblobdescription'] = 'Globalne bloki HTML są fragmentami treści, kt&oacute;re możesz umieścić na swoich stronach lub w szablonach.';
$lang['admin']['templates'] = 'Szablony';
$lang['admin']['templatesdescription'] = 'Tutaj można dodawać i edytować szablony. Szablony definiują wygląd i zachowanie się Twojego serwisu.';
$lang['admin']['stylesheets'] = 'Arkusze styli';
$lang['admin']['stylesheetsdescription'] = 'Zarządzanie arkuszami styli jest zaawansowaną techniką utrzymywania arkuszy CSS oddzielnie od szablon&oacute;w';
$lang['admin']['filemanagerdescription'] = 'Wgrywanie i zarządzanie plikami';
$lang['admin']['imagemanagerdescription'] = 'Wgrywanie, edycja i usuwanie obrazk&oacute;w';
$lang['admin']['moduledescription'] = 'Moduły rozszerzają CMS Made Simple i dostarczają zr&oacute;żnicowaną funkcjonalność.';
$lang['admin']['tagdescription'] = 'Znaczniki są małymi fragmentami funkcjonalnymi, kt&oacute;re mogą być dodane do Twojej treści i/lub szablon&oacute;w';
$lang['admin']['usertagdescription'] = 'Znaczniki, kt&oacute;re możesz tworzyć i modydikować sam, aby wykonać specyficzne zadania wprost z przeglądarki';
$lang['admin']['installdirwarning'] = '<em><strong>Uwaga:</strong></em> katalog instalacyjny (install) ciągle istnieje. Proszę go usunąć.';
$lang['admin']['subitems'] = 'Elementy podrzędne';
$lang['admin']['extensionsdescription'] = 'Moduły, znaczniki i inne.';
$lang['admin']['usersgroupsdescription'] = 'Elementy odnoszące się do użytkownik&oacute;w i grup';
$lang['admin']['layoutdescription'] = 'Opcje układu serwisu';
$lang['admin']['admindescription'] = 'Funkcje administracyjne serwisu';
$lang['admin']['contentdescription'] = 'Tutaj można dodawać i edytować treści.';
$lang['admin']['enablecustom404'] = 'Włącz własny komunikat błędu 404';
$lang['admin']['enablesitedown'] = 'Włącz komunikat niedostępności strony';
$lang['admin']['enablewysiwyg'] = 'Włącz edytor WYSIWYG dla komunikatu niedostępności strony';
$lang['admin']['bookmarks'] = 'Zakładki';
$lang['admin']['user_created'] = 'Skr&oacute;ty użytkownika';
$lang['admin']['forums'] = 'Fora';
$lang['admin']['wiki'] = 'Wiki ';
$lang['admin']['irc'] = 'IRC';
$lang['admin']['team'] = 'Team';
$lang['admin']['module_help'] = 'Pomoc dla modułu';
$lang['admin']['managebookmarks'] = 'Zarządzanie zakładkami';
$lang['admin']['editbookmark'] = 'Edycja zakładki';
$lang['admin']['addbookmark'] = 'Dodaj zakładkę';
$lang['admin']['recentpages'] = 'Ostatnio używane strony';
$lang['admin']['groupname'] = 'Nazwa grupy';
$lang['admin']['selectgroup'] = 'Wybierz grupę';
$lang['admin']['updateperm'] = 'Aktualizuj uprawnienia';
$lang['admin']['admincallout'] = 'Skr&oacute;ty administratora';
$lang['admin']['showbookmarks'] = 'Wyświetl zakładki administratora';
$lang['admin']['hide_help_links'] = 'Ukryj linki pomocy';
$lang['admin']['hide_help_links_help'] = 'Zaznacz to pole aby wyłączyć wiki i linki pomocy do modułu w nagł&oacute;wkach strony.';
$lang['admin']['showrecent'] = 'Wyświetl ostatnio używane strony';
$lang['admin']['attachtotemplate'] = 'Dołącz arkusz styli do szablonu';
$lang['admin']['attachstylesheets'] = 'Dołącz arkusz styli';
$lang['admin']['indent'] = 'R&oacute;b wcięcia w liście stron aby uwydatnić hierarchię';
$lang['admin']['adminindent'] = 'Wyświetlanie zawartości';
$lang['admin']['contract'] = 'Zwiń sekcję';
$lang['admin']['expand'] = 'Rozwiń sekcję';
$lang['admin']['expandall'] = 'Rozwiń wszystkie sekcje';
$lang['admin']['contractall'] = 'Zwiń wszystkie sekcje';
$lang['admin']['menu_bookmarks'] = '[+] ';
$lang['admin']['globalconfig'] = 'Ustawienia globalne';
$lang['admin']['adminpaging'] = 'Ilość element&oacute;w zawartości do pokazania na stronie w liście stron';
$lang['admin']['nopaging'] = 'Pokaż wszystkie elementy';
$lang['admin']['myprefs'] = 'Moje preferencje';
$lang['admin']['myprefsdescription'] = 'Tutaj możesz dostosować interfejs administracyjny do swoich potrzeb.';
$lang['admin']['myaccount'] = 'Moje konto';
$lang['admin']['myaccountdescription'] = 'Tutaj możesz zaktualizować szczeg&oacute;ły dotyczące Twojego konta osobistego.';
$lang['admin']['adminprefs'] = 'Preferencje użytkownika';
$lang['admin']['adminprefsdescription'] = 'Tutaj można ustawić specyficzne preferencje dotyczące administracji serwisu';
$lang['admin']['managebookmarksdescription'] = 'Tutaj można zarządzać zakładkami administracyjnymi';
$lang['admin']['options'] = 'Opcje';
$lang['admin']['langparam'] = 'Ten parametr jest używany do określenia kt&oacute;rego języka używać do wyświetlania frontendu. Nie wszystkie moduły wspierają to i nie wszystkie tego potrzebują.';
$lang['admin']['parameters'] = 'Parametry';
$lang['admin']['mediatype'] = 'Typ medium';
$lang['admin']['mediatype_'] = 'Nic nie ustawiono : będzie dotyczyło wszystkich ustawień ';
$lang['admin']['mediatype_all'] = 'wszystko : Wygląd dla wszystkich urządzeń.';
$lang['admin']['mediatype_aural'] = 'aural : Przeznaczone dla syntezator&oacute;w mowy.';
$lang['admin']['mediatype_braille'] = 'braille : Przeznaczone dla czytnik&oacute;w braille.';
$lang['admin']['mediatype_embossed'] = 'embossed : Przeznaczone dla drukarek braille.';
$lang['admin']['mediatype_handheld'] = 'handheld : Przeznaczone dla urządzeń przenośnych';
$lang['admin']['mediatype_print'] = 'print : Przenaczone dla urządzeń drukujących i podgłądu wydruku w przeglądarce';
$lang['admin']['mediatype_projection'] = 'projection : Przeznaczone dla materiał&oacute;w drukowanych na materiałach przezroczystych';
$lang['admin']['mediatype_screen'] = 'screen : Przeznaczone dla kolorowych ekran&oacute;w komputerowych';
$lang['admin']['mediatype_tty'] = 'tty : Przeznaczone dla urządzeń drukujących czcionką o stałej szerokości, np. teletekst&oacute;w';
$lang['admin']['mediatype_speech'] = 'speech : Intended for speech synthesizers.';
$lang['admin']['mediatype_tv'] = 'tv : Przeznaczone dla urządzeń telewizyjnych';
$lang['admin']['assignmentchanged'] = 'Przypisania do grup zostały zaktualizowane';
$lang['admin']['stylesheetexists'] = 'Arkusz styli już istnieje';
$lang['admin']['errorcopyingstylesheet'] = 'Błąd przy kopiowaniu arkusz styli';
$lang['admin']['copystylesheet'] = 'Kopiuj arkusz styli';
$lang['admin']['newstylesheetname'] = 'Nowa nazwa arkusza styli';
$lang['admin']['target'] = 'Cel';
$lang['admin']['xml'] = 'XML ';
$lang['admin']['xmlmodulerepository'] = 'URL serwera Repozytorium Moduł&oacute;w';
$lang['admin']['metadata'] = 'Metadane';
$lang['admin']['globalmetadata'] = 'Globalne Metadane';
$lang['admin']['titleattribute'] = 'atrybut Title';
$lang['admin']['tabindex'] = 'Kolejność tabulacji';
$lang['admin']['accesskey'] = 'Klawisz skr&oacute;tu aktywujący link';
$lang['admin']['sitedownwarning'] = '<strong>Uwaga:</strong>
Twoja strona wyświetla obecnie wiadomość \&quot;System nie działa\&quot;. Usuń plik %s by usunąć ten problem.';
$lang['admin']['deletecontent'] = 'Usuń zawartość';
$lang['admin']['deletepages'] = 'Usunąć te strony?';
$lang['admin']['selectall'] = 'Zaznacz wszystko';
$lang['admin']['selecteditems'] = 'Wybrane elementy';
$lang['admin']['inactive'] = 'Nieaktywny';
$lang['admin']['deletetemplates'] = 'Usuń szablony';
$lang['admin']['templatestodelete'] = 'Te szablony zostaną usunięte';
$lang['admin']['wontdeletetemplateinuse'] = 'Te szablony są używane i nie zostaną usunięte';
$lang['admin']['deletetemplate'] = 'Usuń arkusze styli';
$lang['admin']['stylesheetstodelete'] = 'Te arkusze styli zostaną usunięte';
$lang['admin']['sitename'] = 'Nazwa strony';
$lang['admin']['goto'] = 'Back to:';
$lang['admin']['siteadmin'] = 'Administrator serwisu';
$lang['admin']['images'] = 'Menadżer obrazk&oacute;w';
$lang['admin']['blobs'] = 'Globalne obiekty blokowe';
$lang['admin']['groupmembers'] = 'Przynależności grupowe';
$lang['admin']['troubleshooting'] = '(Rozwiązywanie problem&oacute;w)';
$lang['admin']['event_desc_loginpost'] = 'Wyślij po zalogowaniu się użytkownika do panelu administratora';
$lang['admin']['event_desc_logoutpost'] = 'Wyślij po wylogowaniu się użytkownika z panelu administratora';
$lang['admin']['event_desc_adduserpre'] = 'Wyślij przed utowrzeniem nowego użytkownika';
$lang['admin']['event_desc_adduserpost'] = 'Wyślij po utowrzeniu nowego użytkownika';
$lang['admin']['event_desc_edituserpre'] = 'Wyślij przed zapisaniem zmian dotyczących użytkownika';
$lang['admin']['event_desc_edituserpost'] = 'Wyślij po zapisaniu zmian dotyczących użytkownika';
$lang['admin']['event_desc_deleteuserpre'] = 'Wyślij przed usunięciem użytkownika z systemu';
$lang['admin']['event_desc_deleteuserpost'] = 'Wyślij po usunięciu użytkownika z systemu';
$lang['admin']['event_desc_addgrouppre'] = 'Wyślij przed utowrzeniem nowej grupy';
$lang['admin']['event_desc_addgrouppost'] = 'Wyślij po utowrzeniu nowej grupy';
$lang['admin']['event_desc_changegroupassignpre'] = 'Wysłane przed zapisaniem powiązań grup';
$lang['admin']['event_desc_changegroupassignpost'] = 'Wysłane po zapisie powiązań grup';
$lang['admin']['event_desc_editgrouppre'] = 'Wyślij przed zapisaniem zmian w grupach';
$lang['admin']['event_desc_editgrouppost'] = 'Wyślij po zapisaniu zmian w grupach';
$lang['admin']['event_desc_deletegrouppre'] = 'Wyślij przed usunięciem grupy z systemu';
$lang['admin']['event_desc_deletegrouppost'] = 'Wyślij po usunięciu grupy z systemu';
$lang['admin']['event_desc_addstylesheetpre'] = 'Wyślij przed utworzeniem nowego arkusza styli';
$lang['admin']['event_desc_addstylesheetpost'] = 'Wyślij po utworzeniu nowego arkusza styli';
$lang['admin']['event_desc_editstylesheetpre'] = 'Wyślij przed zapisaniem zmian w arkuszu styli';
$lang['admin']['event_desc_editstylesheetpost'] = 'Wyślij po zapisaniu zmian w arkuszu styli';
$lang['admin']['event_desc_deletestylesheetpre'] = 'Wyslij przed usunięciem arkusza styli z systemu';
$lang['admin']['event_desc_deletestylesheetpost'] = 'Wyslij po usunięciu arkusza styli z systemu';
$lang['admin']['event_desc_addtemplatepre'] = 'Wyslij przed utworzeniem nowego szablonu';
$lang['admin']['event_desc_addtemplatepost'] = 'Wyslij po utworzeniu nowego szablonu';
$lang['admin']['event_desc_edittemplatepre'] = 'Wyślij przed zapisaniem zmian w szablonie';
$lang['admin']['event_desc_edittemplatepost'] = 'Wyślij po zapisaniu zmian w szablonie';
$lang['admin']['event_desc_deletetemplatepre'] = 'Wyślij przed usunięciem szablonu z systemu';
$lang['admin']['event_desc_deletetemplatepost'] = 'Wyślij po usunięciu szablonu z systemu';
$lang['admin']['event_desc_templateprecompile'] = 'Wyślij zanim szablon zostanie wysłany do przetworzenia przez smarty';
$lang['admin']['event_desc_templatepostcompile'] = 'Wyślij po przetworzeniu szablonu przez smarty';
$lang['admin']['event_desc_addglobalcontentpre'] = 'Wyślij przed utworzeniem nowego globalnego bloku zawartości';
$lang['admin']['event_desc_addglobalcontentpost'] = 'Wyślij po utworzeniu nowego globalnego bloku zawartości';
$lang['admin']['event_desc_editglobalcontentpre'] = 'Wyślij przed zapisaniem zmian w globalnym bloku zawartości';
$lang['admin']['event_desc_editglobalcontentpost'] = 'Wyślij po zapisaniu zmian w globalnym bloku zawartości';
$lang['admin']['event_desc_deleteglobalcontentpre'] = 'Wyślij przed usunięciem globalnego bloku zawartości z systemu';
$lang['admin']['event_desc_deleteglobalcontentpost'] = 'Wyślij po usunięciu globalnego bloku zawartości z systemu';
$lang['admin']['event_desc_globalcontentprecompile'] = 'Wyślij przed wysłaniem globalnego bloku zawartości do smarty w celu prztworzenia';
$lang['admin']['event_desc_globalcontentpostcompile'] = 'Wyślij po przetworzeniu globalnego bloku zawartości przez smarty';
$lang['admin']['event_desc_contenteditpre'] = 'Wyślij przed zapisaniem zmian w zawartości';
$lang['admin']['event_desc_contenteditpost'] = 'Wyślij po zapisaniu zmian w zawartości';
$lang['admin']['event_desc_contentdeletepre'] = 'Wyślij przed usunięciem zawartości z systemu';
$lang['admin']['event_desc_contentdeletepost'] = 'Wyślij po usunięciu zawartości z systemu';
$lang['admin']['event_desc_contentstylesheet'] = 'Wyślij zanim arkusz styli zostanie wysłany do przeglądarki';
$lang['admin']['event_desc_contentprecompile'] = 'Wyślij przed przetworzeniem zawartości przez smarty';
$lang['admin']['event_desc_contentpostcompile'] = 'Wyślij po przetworzeniu zawartości przez smarty';
$lang['admin']['event_desc_contentpostrender'] = 'Wyślij zanim połączony html zostanie wysłany do przeglądarki';
$lang['admin']['event_desc_smartyprecompile'] = 'Wyślij przed wysłaniem do przetworzenia jakiejkolwiek zawartości przeznaczonej do smarty';
$lang['admin']['event_desc_smartypostcompile'] = 'Wyślij po przetworzeniu jakiejkolwiek zawartości przeznaczonej do smarty';
$lang['admin']['event_help_loginpost'] = '<p>Sent after a user logs into the admin panel.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;user\&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_logoutpost'] = '<p>Sent after a user logs out of the admin panel.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;user\&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_adduserpre'] = '<p>Sent before a new user is created.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;user\&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_adduserpost'] = '<p>Sent after a new user is created.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;user\&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_edituserpre'] = '<p>Sent before edits to a user are saved.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;user\&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_edituserpost'] = '<p>Sent after edits to a user are saved.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;user\&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_deleteuserpre'] = '<p>Sent before a user is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;user\&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_deleteuserpost'] = '<p>Sent after a user is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;user\&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_addgrouppre'] = '<p>Sent before a new group is created.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;group\&#039; - Reference to the affected group object.</li>
</ul>
';
$lang['admin']['event_help_addgrouppost'] = '<p>Sent after a new group is created.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;group\&#039; - Reference to the affected group object.</li>
</ul>
';
$lang['admin']['event_help_changegroupassignpre'] = '<p>Sent before group assignments are saved.</p>
<h4>Parameters></h4>
<ul>
<li>\&#039;group\&#039; - Reference to the group object.</li>
<li>\&#039;users\&#039; - Array of references to user objects belonging to the group.</li>
';
$lang['admin']['event_help_changegroupassignpost'] = '<p>Sent after group assignments are saved.</p>
<h4>Parameters></h4>
<ul>
<li>\&#039;group\&#039; - Reference to the affected group object.</li>
<li>\&#039;users\&#039; - Array of references to user objects now belonging to the affected group.</li>
';
$lang['admin']['event_help_editgrouppre'] = '<p>Sent before edits to a group are saved.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;group\&#039; - Reference to the affected group object.</li>
</ul>
';
$lang['admin']['event_help_editgrouppost'] = '<p>Sent after edits to a group are saved.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;group\&#039; - Reference to the affected group object.</li>
</ul>
';
$lang['admin']['event_help_deletegrouppre'] = '<p>Sent before a group is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;group\&#039; - Reference to the affected group object.</li>
</ul>
';
$lang['admin']['event_help_deletegrouppost'] = '<p>Sent after a group is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;group\&#039; - Reference to the affected group object.</li>
</ul>
';
$lang['admin']['event_help_addstylesheetpre'] = '<p>Sent before a new stylesheet is created.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;stylesheet\&#039; - Reference to the affected stylesheet object.</li>
</ul>
';
$lang['admin']['event_help_addstylesheetpost'] = '<p>Sent after a new stylesheet is created.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;stylesheet\&#039; - Reference to the affected stylesheet object.</li>
</ul>
';
$lang['admin']['event_help_editstylesheetpre'] = '<p>Sent before edits to a stylesheet are saved.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;stylesheet\&#039; - Reference to the affected stylesheet object.</li>
</ul>
';
$lang['admin']['event_help_editstylesheetpost'] = '<p>Sent after edits to a stylesheet are saved.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;stylesheet\&#039; - Reference to the affected stylesheet object.</li>
</ul>
';
$lang['admin']['event_help_deletestylesheetpre'] = '<p>Sent before a stylesheet is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;stylesheet\&#039; - Reference to the affected stylesheet object.</li>
</ul>
';
$lang['admin']['event_help_deletestylesheetpost'] = '<p>Sent after a stylesheet is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;stylesheet\&#039; - Reference to the affected stylesheet object.</li>
</ul>
';
$lang['admin']['event_help_addtemplatepre'] = '<p>Sent before a new template is created.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;template\&#039; - Reference to the affected template object.</li>
</ul>
';
$lang['admin']['event_help_addtemplatepost'] = '<p>Sent after a new template is created.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;template\&#039; - Reference to the affected template object.</li>
</ul>
';
$lang['admin']['event_help_edittemplatepre'] = '<p>Sent before edits to a template are saved.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;template\&#039; - Reference to the affected template object.</li>
</ul>
';
$lang['admin']['event_help_edittemplatepost'] = '<p>Sent after edits to a template are saved.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;template\&#039; - Reference to the affected template object.</li>
</ul>
';
$lang['admin']['event_help_deletetemplatepre'] = '<p>Sent before a template is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;template\&#039; - Reference to the affected template object.</li>
</ul>
';
$lang['admin']['event_help_deletetemplatepost'] = '<p>Sent after a template is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;template\&#039; - Reference to the affected template object.</li>
</ul>
';
$lang['admin']['event_help_templateprecompile'] = '<p>Sent before a template is sent to smarty for processing.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;template\&#039; - Reference to the affected template text.</li>
</ul>
';
$lang['admin']['event_help_templatepostcompile'] = '<p>Sent after a template has been processed by smarty.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;template\&#039; - Reference to the affected template text.</li>
</ul>
';
$lang['admin']['event_help_addglobalcontentpre'] = '<p>Sent before a new global content block is created.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;global_content\&#039; - Reference to the affected global content block object.</li>
</ul>
';
$lang['admin']['event_help_addglobalcontentpost'] = '<p>Sent after a new global content block is created.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;global_content\&#039; - Reference to the affected global content block object.</li>
</ul>
';
$lang['admin']['event_help_editglobalcontentpre'] = '<p>Sent before edits to a global content block are saved.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;global_content\&#039; - Reference to the affected global content block object.</li>
</ul>
';
$lang['admin']['event_help_editglobalcontentpost'] = '<p>Sent after edits to a global content block are saved.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;global_content\&#039; - Reference to the affected global content block object.</li>
</ul>
';
$lang['admin']['event_help_deleteglobalcontentpre'] = '<p>Sent before a global content block is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;global_content\&#039; - Reference to the affected global content block object.</li>
</ul>
';
$lang['admin']['event_help_deleteglobalcontentpost'] = '<p>Sent after a global content block is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;global_content\&#039; - Reference to the affected global content block object.</li>
</ul>
';
$lang['admin']['event_help_globalcontentprecompile'] = '<p>Sent before a global content block is sent to smarty for processing.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;global_content\&#039; - Reference to the affected global content block text.</li>
</ul>
';
$lang['admin']['event_help_globalcontentpostcompile'] = '<p>Sent after a global content block has been processed by smarty.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;global_content\&#039; - Reference to the affected global content block text.</li>
</ul>
';
$lang['admin']['event_help_contenteditpre'] = '<p>Sent before edits to content are saved.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;global_content\&#039; - Reference to the affected content object.</li>
</ul>
';
$lang['admin']['event_help_contenteditpost'] = '<p>Sent after edits to content are saved.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;content\&#039; - Reference to the affected content object.</li>
</ul>
';
$lang['admin']['event_help_contentdeletepre'] = '<p>Sent before content is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;content\&#039; - Reference to the affected content object.</li>
</ul>
';
$lang['admin']['event_help_contentdeletepost'] = '<p>Sent after content is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;content\&#039; - Reference to the affected content object.</li>
</ul>
';
$lang['admin']['event_help_contentstylesheet'] = '<p>Sent before the sytlesheet is sent to the browser.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;content\&#039; - Reference to the affected stylesheet text.</li>
</ul>
';
$lang['admin']['event_help_contentprecompile'] = '<p>Sent before content is sent to smarty for processing.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;content\&#039; - Reference to the affected content text.</li>
</ul>
';
$lang['admin']['event_help_contentpostcompile'] = '<p>Sent after content has been processed by smarty.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;content\&#039; - Reference to the affected content text.</li>
</ul>
';
$lang['admin']['event_help_contentpostrender'] = '<p>Sent before the combined html is sent to the browser.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;content\&#039; - Reference to the html text.</li>
</ul>
';
$lang['admin']['event_help_smartyprecompile'] = '<p>Sent before any content destined for smarty is sent to for processing.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;content\&#039; - Reference to the affected text.</li>
</ul>
';
$lang['admin']['event_help_smartypostcompile'] = '<p>Sent after any content destined for smarty has been processed.</p>
<h4>Parameters</h4>
<ul>
<li>\&#039;content\&#039; - Reference to the affected text.</li>
</ul>
';
$lang['admin']['filterbymodule'] = 'Filtruj po modułach';
$lang['admin']['showall'] = 'Pokaż wszystko';
$lang['admin']['core'] = 'Rdzeń';
$lang['admin']['defaultpagecontent'] = 'Domyślna treść strony';
$lang['admin']['file_url'] = 'Linkuj do pliku (zamiast do URL-a)';
$lang['admin']['no_file_url'] = 'Brak (używa URL-a powyżej)';
$lang['admin']['defaultparentpage'] = 'Domyślna strona-rodzic';
$lang['admin']['error_udt_name_whitespace'] = 'Błąd: Znaczniki Użytkownika nie mogą mieć spacji w nazwach';
$lang['admin']['warning_safe_mode'] = '<strong><em>UWAGA:</em></strong> PHP Safe mode (tryb bezpieczny PHP) jest włączony. To może spowodować problemy przy wgrywaniu plik&oacute;w na serwer przez przeglądarkę, np. przy obrazkach, motywach graficznych lub przy wgrywaniu moduł&oacute;w przez XML. Polecamy kontakt z administratorem serwera (strony) i pytanie, czy może ten tryb wyłączyć.';
$lang['admin']['test'] = 'Testuj';
$lang['admin']['results'] = 'Wynik&oacute;w';
$lang['admin']['untested'] = 'Nie testowano';
$lang['admin']['unknown'] = 'Nieznane';
$lang['admin']['download'] = 'Ściągnij';
$lang['admin']['frontendwysiwygtouse'] = 'Edytor WYSIWYG dla frontendu';
$lang['admin']['backendwysiwygtouse'] = 'Default backend wysiwyg (for new user accounts)';
$lang['admin']['all_groups'] = 'Wszystkie grupy';
$lang['admin']['error_type'] = 'Typ błędu';
$lang['admin']['contenttype_errorpage'] = 'Strona błędu';
$lang['admin']['errorpagealreadyinuse'] = 'Ten kod błędu jest już w użyciu';
$lang['admin']['404description'] = 'Strona nie znaleziona';
$lang['admin']['usernotfound'] = 'Użytkownik nie znaleziony';
$lang['admin']['passwordchange'] = 'Proszę podaj nowe hasło.';
$lang['admin']['recoveryemailsent'] = 'Email został wysłany na adres z bazy danych. Proszę sprawdzić swoją skrzynkę przychodzącą żeby zobaczyć dalsze instrukcję.';
$lang['admin']['errorsendingemail'] = 'Wystąpił błąd przy wysyłaniu emaila. Skontaktuj się z administratorem.';
$lang['admin']['passwordchangedlogin'] = 'Hasło zmienione.  Proszę zaloguj się używając nowych danych.';
$lang['admin']['nopasswordforrecovery'] = 'Brak przypisanego emaila dla tego użytkownika. Odzyskanie hasła nie jest możlwie.  Proszę skontaktować się z administratorem strony.';
$lang['admin']['lostpw'] = 'Zapomniałeś hasła?';
$lang['admin']['lostpwemailsubject'] = '[%s] Odzyskiwanie hasła';
$lang['admin']['lostpwemail'] = 'Otrzymujesz ten e-mail ponieważ zgłoszono zmianę (%s) hasła powiązanego z kontem użytkownika (%s). Jeśli chcesz zresetować hasło dla tego konta kliknij poniższy link lub wklej go w pole adresu w swojej przeglądarce:
(%s)

Jeśli uważasz, że to pomyłka, po prostu zignoruj tą wiadomość i nic się nie zmieni.
';
$lang['admin']['utma'] = '156861353.1808335048.1332111794.1332111794.1332111794.1';
$lang['admin']['utmz'] = '156861353.1332111794.1.1.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/viewtopic.php|utmcmd=referral';
$lang['admin']['utmc'] = '156861353';
$lang['admin']['utmb'] = '156861353';
?>