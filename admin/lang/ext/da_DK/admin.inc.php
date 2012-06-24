<?php
$lang['admin']['info_smarty_cacheudt'] = 'If enabled, all calls to user defined tags will be cached.  This will be useful for tags that display the output of database queries.  You can disable caching using the nocache parameter in the udt call.  i.e: <code>{myusertag nocache}</code>';
$lang['admin']['prompt_smarty_cacheudt'] = 'Cache UDT Calls';
$lang['admin']['always'] = 'Always';
$lang['admin']['never'] = 'Never';
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
$lang['admin']['info_pagedefaults'] = 'P&aring; denne side kan du specificere egenskaber for nye sider. Indstillingerne vil blive brugt n&aring;r der efterf&oslash;lgende oprettes nye sider. Indstillingerne har ingen indflydelse p&aring; allerede oprettede sider';
$lang['admin']['default_contenttype'] = 'Default indholdstype';
$lang['admin']['info_default_contenttype'] = 'Indholdstype der v&aelig;lges som default. Tjek at det ikke er en indholdstype der er valgt fra under Global konfiguration.';
$lang['admin']['error_contenttype'] = 'Indholdstypen er ugyldig eller ikke tilladt for denne side';
$lang['admin']['info_disallowed_contenttypes'] = 'V&aelig;lg de indholdstyper som skal fjernes fra dropdown-menuen n&aring;r man redigerer eller opretter nyt indhold. Brug Ctrl+Click til at v&aelig;lge og fjerne indholdstyperne p&aring; listen. Hvis ingen v&aelig;lges, vises alle. <em>(g&aelig;lder for alle brugere)</em>';
$lang['admin']['disallowed_contenttypes'] = 'Indholdstyper der ikke skal kunne v&aelig;lges';
$lang['admin']['search_module'] = 'S&oslash;ge modulet';
$lang['admin']['info_search_module'] = 'Select the module that should be used to index words for searching, and will provide the site search capabilities';
$lang['admin']['filecreatedirbadchars'] = 'Der blev fundet ugyldige tegn i mappenavnet';
$lang['admin']['modulehelp_yourlang'] = 'Se p&aring; dit eget sprog';
$lang['admin']['info_umask'] = 'The &quot;umask&quot; is an octal value that is used to specify the default permission for newly created files (this is used for files in the cache directory, and uploaded files.  For more information see the appropriate <a href="http://en.wikipedia.org/wiki/Umask">wikipedia article.</a>';
$lang['admin']['general_operation_settings'] = 'General Operation Settings';
$lang['admin']['info_checkversion'] = 'Systemet vil tjekke dagligt efter en ny version af CMSMS, hvis denne er aktiveret';
$lang['admin']['checkversion'] = 'Tillad periodiske s&oslash;gninger efter nye versioner';
$lang['admin']['actioncontains'] = 'Action Contains';
$lang['admin']['filterapplied'] = 'Valgte filter';
$lang['admin']['automatedtask_success'] = 'Automatisk opgave blev udf&oslash;rt';
$lang['admin']['siteprefsupdated'] = 'Global konfiguration blev opdateret';
$lang['admin']['ip_addr'] = 'IP adresse';
$lang['admin']['warn_admin_ipandcookies'] = 'Bem&aelig;rk: Administration af hjemmesiden bruger cookies registrerer din IP addresse';
$lang['admin']['event_desc_loginfailed'] = 'Login mislykkedes';
$lang['admin']['modulehelp_english'] = 'Se p&aring; engelsk';
$lang['admin']['nopluginabout'] = 'Der er ingen information tilg&aelig;ngelig for dette plugin';
$lang['admin']['nopluginhelp'] = 'Der er ingen hj&aelig;lp tilg&aelig;ngelig for dette plugin';
$lang['admin']['moduleupgraded'] = 'Opgraderingen lykkedes';
$lang['admin']['added_css'] = 'Tilf&oslash;jede typografiark';
$lang['admin']['toggle'] = 'Toggle';
$lang['admin']['added_group'] = 'Tilf&oslash;jede gruppe';
$lang['admin']['expanded_xml'] = 'Expanded XML file consisting of %s %s';
$lang['admin']['installed_mod'] = 'Installeret version %s';
$lang['admin']['uninstalled_mod'] = 'Afinstallerede modul %s';
$lang['admin']['upgraded_mod'] = '%s Opgraderet fra version %s til %s';
$lang['admin']['edited_gcb'] = 'Redigerede Global indholdsblok';
$lang['admin']['edited_content'] = 'Redigerede Indhold';
$lang['admin']['added_content'] = 'Tilf&oslash;jede indhold';
$lang['admin']['added_css_association'] = 'Tilf&oslash;jede Typografiark tilknytning';
$lang['admin']['deleted_group'] = 'Slettede gruppe';
$lang['admin']['deleted_content'] = 'Slettede indhold';
$lang['admin']['edited_user'] = 'Redigerede bruger';
$lang['admin']['edited_udt'] = 'Redigerede Brugerdefineret tag';
$lang['admin']['content_copied'] = 'Indhold kopieret til %s';
$lang['admin']['deleted_template'] = 'Slettede Skabelon';
$lang['admin']['added_udt'] = 'Tilf&oslash;jede Brugerdefineret tag';
$lang['admin']['deleted_udt'] = 'Slettede Brugerdefineret tag';
$lang['admin']['added_gcb'] = 'Tilf&oslash;jede Global indholdsblok';
$lang['admin']['edited_group'] = 'Redigerede gruppe';
$lang['admin']['deleted_css_association'] = 'Slettede Typografiark tilknytning';
$lang['admin']['user_logout'] = 'Bruger logout';
$lang['admin']['user_login'] = 'Bruger login';
$lang['admin']['login_failed'] = 'Bruger login mislykkedes';
$lang['admin']['deleted_css'] = 'Slettede Typografiark';
$lang['admin']['uploaded_file'] = 'Uploadede fil';
$lang['admin']['created_directory'] = 'Oprettede Mappe';
$lang['admin']['deleted_file'] = 'Slettede Fil';
$lang['admin']['deleted_directory'] = 'Slettede Mappe';
$lang['admin']['edited_template'] = 'Redigerede Skabelon';
$lang['admin']['deleted_user'] = 'Slettede Bruger';
$lang['admin']['deleted_module'] = 'Permanent slettet %s';
$lang['admin']['deleted_gcb'] = 'Slettet Global indholdsblok';
$lang['admin']['added_user'] = 'Tilf&oslash;jede Bruger';
$lang['admin']['edited_user_preferences'] = 'Redigerede Brugerindstillinger';
$lang['admin']['added_template'] = 'Tilf&oslash;jede Skabelon';
$lang['admin']['event_desc_stylesheetpostcompile'] = 'Sendt efter et typografiark er blevet genereret via smarty';
$lang['admin']['event_desc_stylesheetprecompile'] = 'Sendt f&oslash;r et typografiark er blevet genereret via smarty';
$lang['admin']['confirm_uploadmodule'] = 'Er du sikker p&aring; du &oslash;nsker at uploade den valgte xml-fil?
Ukorrekt upload af en modul-fil kan g&oslash;re at hjemmesiden ikke l&aelig;ngere vises som den skal';
$lang['admin']['error_module_mincmsversion'] = 'Dette modul kr&aelig;ver en nyere vesion af CMS Made Simple';
$lang['admin']['info_browser_cache_expiry'] = 'Angiv tiden (i minutter) som browseren skal cache sider i. Hvis du skriver 0 vil denne funktion v&aelig;re deaktiveret.';
$lang['admin']['browser_cache_expiry'] = 'Antal minutter som browseren skal cache en side i: <em>(minutter)</em>';
$lang['admin']['info_browser_cache'] = 'Denne indstilling g&aelig;lder kun for sider der skal caches, og betyder at browseren tillades at cache en side i et givet tidsrum. Hvis funktionen er aktiveret, kan det betyde at bes&oslash;gende p&aring; din hjemmeside ikke ser &aelig;ndringer p&aring; en side med det samme.';
$lang['admin']['allow_browser_cache'] = 'Tillad en browser at cache sider';
$lang['admin']['server_cache_settings'] = 'Server cache indstillinger';
$lang['admin']['browser_cache_settings'] = 'Browser cache indstillinger';
$lang['admin']['help_function_browser_lang'] = '<h3>Hvad g&oslash;r denne funktion?</h3>

<p>Denne funktion registrerer det sprog som den bes&oslash;gendes browser er indstillet til. Det registerede sprog sammenholdes med en liste af tilladte sprog og bestemmer sproget for bes&oslash;get p&aring; siden.</p>

<h3>Hvordan bruger jeg den?</h3>
<p>Inds&aelig;t taggen tidligt i din sideskabelon. <em>(den kan skrives over <head> sektionen hvis du &oslash;nsker det)</em> og inds&aelig;t default sproget, og accepterede sprog (brug sprogkoder med to bogstaver), og brug resultatet til noget. 

For eksempel:</p>
<pre><code>{browser_lang accept=de,fr,en,es default=en assign=tmp}{session_put var=lang val=$tmp}</code></pre>
<p><em>({session_put} er en tag der leveres af CGSimpleSmarty modulet)</em></p>

<h3>Hvilke parametre kan jeg bruge?</h3>
<ul>
<li><strong>accepted <em>(p&aring;kr&aelig;vet)</em></strong><br/> - En komma-separeret liste af sprogkoder p&aring; to bogstaver.</li>
<li>default<br/><em>(valgfri)</em> - Et default sprog der bruges, hvis ingen af de accepterede sprog underst&oslash;ttes af browseren. Sproget &#039;en&#039; bruges hvis inget andet er angivet.</li>
<li>assign<br/><em>(valgfri)</em> - Navnet p&aring; den smarty variabel indholdet tilknyttes.</li>
</ul>';
$lang['admin']['info_target'] = 'M&aring;l bruges af Menu Manager til at bestemme hvor nye sider skal &aring;bnes. Nogle Menu templates ignorerer denne mulighed.';
$lang['admin']['close'] = 'Luk';
$lang['admin']['open'] = 'Open';
$lang['admin']['revert'] = 'Nulstil alle &aelig;ndringer';
$lang['admin']['autoclearcache2'] = 'Fjern cache filer der er &aelig;ldre en det angivne antal dage';
$lang['admin']['root'] = 'Roden';
$lang['admin']['info_content_autocreate_flaturls'] = 'Hvis dette er sl&aring;et til, vil alle urls blive oprettet som en kopi af side alias&#039;et (men ikke synkroniseret til side alias&#039;et)';
$lang['admin']['content_autocreate_flaturls'] = 'Automatisk generede url&#039;s er &quot;flade&quot;';
$lang['admin']['content_autocreate_urls'] = 'Generer side url&#039;s automatisk';
$lang['admin']['content_mandatory_urls'] = 'Side URLS er p&aring;kr&aelig;vet';
$lang['admin']['content_imagefield_path'] = 'Sti for billed felt';
$lang['admin']['info_content_imagefield_path'] = 'Angiv den mappe hvori billederne beregnet til billedfeltet skal v&amp;aelig;re. Stien angives relativt til billed-uploads stien.';
$lang['admin']['content_thumbnailfield_path'] = 'sti til thumb_billedfeltet';
$lang['admin']['info_content_thumbnailfield_path'] = 'Angiv den mappe hvori billederne beregnet til thumb_billedfeltet skal v&amp;aelig;re. Stien skal angives relativt til billed-uploads stien.  Ofte vil dette v&amp;aelig;re den samme som ovenst&aring;ende sti.';
$lang['admin']['contentimage_path'] = 'Sti for {content_image}';
$lang['admin']['info_contentimage_path'] = 'Angiv den mappe hvori billederne beregnet til {content_image} taggen skal v&amp;aelig;re. Stien skal angives relativt til uploads stien. Den angivne mappe bruges som default for dir parametret.';
$lang['admin']['editcontent_settings'] = 'Indstillinger for indholdsredigering';
$lang['admin']['help_page_url'] = 'Specificer en URL (relativ i forhold til roden p&aring; din hjemmeside) som er unik for denne side - f.eks: sti/til/minside.  Denne url er kun anvendelig n&aring;r pretty urls bliver brugt.';
$lang['admin']['help_page_alias'] = 'Alias bruges som et alternativ til sidens id, til identificere den enkelte side. Sidens alias skal v&aelig;re unik blandt alle sider p&aring; hjemmesiden.  Sidens alias bruges som basis for den unikke url for siden.';
$lang['admin']['help_page_searchable'] = 'Denne indstilling viser om sidens indhold skal kunne indexeres af hjemmesidens s&oslash;gefunktion.';
$lang['admin']['help_page_cachable'] = 'Hjemmesidens hastighed kan &oslash;ges ved at lade s&aring; mange sider som muligt caches. Dette kan dog ikke bruges p&aring; sider hvor indholdet kan &aelig;ndres p&aring; brugerens anmodning.';
$lang['admin']['sitedownexcludeadmins'] = 'Undtag brugere som er logged ind i CMSMS admin omr&aring;det';
$lang['admin']['your_ipaddress'] = 'Din IP adresse er';
$lang['admin']['use_wysiwyg'] = 'Benyt WYSIWYG';
$lang['admin']['contenttype_redirlink'] = 'Link';
$lang['admin']['yes'] = 'Ja';
$lang['admin']['no'] = 'Nej';
$lang['admin']['listcontent_showalias'] = 'Vis &quot;Alias&quot; oversigten';
$lang['admin']['listcontent_showurl'] = 'Vis &quot;URL&quot; oversigten';
$lang['admin']['listcontent_showtitle'] = 'Vis sidens titel eller menu tekst';
$lang['admin']['listcontent_settings'] = 'Indstillinger for sideoversigt';
$lang['admin']['lctitle_page'] = 'Titlen p&aring; de eksisterende indholdselementer';
$lang['admin']['lctitle_alias'] = 'Alias p&aring; de eksisterende indholdselementer. Nogle indholdselementer har ikke et alias';
$lang['admin']['lctitle_url'] = 'URL suffix for indholdselement. Hvis der er et.';
$lang['admin']['lctitle_template'] = 'Sideskabelonen for det p&aring;g&aelig;ldende indholdselement. Nogle indholdselementer har ikke en sideskabelon';
$lang['admin']['lctitle_owner'] = 'Ejeren af indholdselementet';
$lang['admin']['lctitle_active'] = 'Indikerer om inholdselementet er aktivt. Inaktive elementer vises ikke.';
$lang['admin']['lctitle_default'] = 'Viser det indholdselement, der vises p&aring; root url adressen. Kun &eacute;t indholdselement kan vises';
$lang['admin']['lctitle_move'] = 'Tillader at indholdet arrangeres hierakisk';
$lang['admin']['lctitle_multiselect'] = 'Select All/Select None';
$lang['admin']['invalid_url2'] = 'The page URL specified is invalid.  It should contain only alphanumeric characters, or - or /.  Extensions must contain only alphanumeric chars and be less than 5 characters in length.  It is also possible that the URL specified is already in use.';
$lang['admin']['page_url'] = 'Side URL';
$lang['admin']['runuserplugin'] = 'K&oslash;r bruger plugin';
$lang['admin']['output'] = 'Ouput';
$lang['admin']['run'] = 'K&oslash;r';
$lang['admin']['run_udt'] = 'K&oslash;r denne Bruger Definerede Tag';
$lang['admin']['stylesheetcopied'] = 'Stylesheet kopieret';
$lang['admin']['templatecopied'] = 'Skabelon kopieret';
$lang['admin']['ecommerce_desc'] = 'Moduler som kan give E-handels muligheder';
$lang['admin']['ecommerce'] = 'E-handel';
$lang['admin']['help_function_content_module'] = '<h3>What does this do?</h3>
<p>This content block type allows interfacing with different modules to create different content block types.</p>
<p>Some modules can define content block types for use in module templates.  i.e: The FrontEndUsers module may define a group list content block type.  It will then indicate how you can use the content_module tag to utilize that block type within your templates.</p>
<p><strong>Note:</strong> This block type must be used only with compatible modules.  You should not use this in any way except for as guided by addon modules.</p>';
$lang['admin']['error_parsing_content_blocks'] = 'Der opstod en fejl under behandlingen af indholdsblokke (muligvis pga et gentaget blok navn)';
$lang['admin']['error_no_default_content_block'] = 'Der blev ikke fundet en default indholdsblok {content} i denne template. 
Tjek om {content} findes i sideskabelonen - den <em>skal</em> v&aelig;re der.';
$lang['admin']['help_function_cms_stylesheet'] = '<h3>Hvad g&oslash;r denne funktion?</h3>

<p>Denne tag bevirker at css bliver cached gennem at generere en statisk fil i tmp/cache mappen, og smarty behandler desuden de individuelle typografiark.</p>
<p>Denne plugin henter typografiark information fra systemet. Som default, tager den alle typografiark der er tilknyttet den aktive skabelon i den r&aelig;kkef&oslash;lge, der er specificeret af designeren og genererer typografiark filer.</p>
<p>De genererede typografiark f&aring;r et unikt navn som f&oslash;lger den seneste modifikation i databasen, og de &aelig;ndres kun hvis typografiarket &aelig;ndres.</p>
<p>Denne tag erstatter {stylesheet} taggen</p>

<h3>Hvordan bruger jeg den?</h3>
<p>Inds&aelig;t <code>{cms_stylesheet}</code> i skabelonens head sektion</p>

<h3>Hvilke parametre kan jeg bruge?</h3>
<ul>
<li><em>(optional)</em> name - dette vil hente det navngivne typografiark, uanset om det er tilknyttet skabelonen eller ej, i stedet for alle typografiark.</li>
<li><em>(optional)</em> templateid - Hvis templateid er angivet, vil de typografiark der er knyttet til den p&aring;g&aelig;ldende templateid hentes, istedet for de typografiark der er knyttet til den aktuelle skabelon.</li>
<li><em>(optional)</em> media - Media brugt sammen med name parametret, vil dette overtrumfe media typen, der er valgt for det p&aring;g&aelig;ldende typografiark.Media brugt sammen med templateid parametret, vil kun de typografiark der er kompatible med en p&aring;g&aelig;ldende media type hentes.</li>
</ul>

<h3>Smarty behandling</h3>
<p>N&aring;r css-filerne bliver genereret, hentes typografiarkene fra databasen og behandles af smarty.  
De kr&oslash;llede paranteser i smarty er &aelig;ndret fra CMSMS standard { og } til henholdsvis [[ og ]] for at g&oslash;re dem lettere at bruge i typografiark. 
Dette tillader at bruge smarty-variabler - f.eks. [[assign var=&#039;red&#039; value=&#039;#900&#039;]] i toppen af et typografiark, og derefter bruge denne variabel senere i typografiarket, f.eks s&aring;dan:</p>
<pre>
<code>
h3 .error { color: [[$red]]; }<br/>
</code>
</pre>

<p>Da de cachede filer bliver genereret i tmp/cache mappen i CMSMS installationen, er den relative sti til CSS-filerne er ikke roden. Derfor kr&aelig;ver kr&aelig;ver billeder og andre tags der kr&aelig;ver en URL, at der bruges [[root_url]] for at danne en absolut URL. For eksempel:</p>
<pre>
<code>
h3 .error { background: url([[root_url]]/uploads/images/error_background.gif); }<br/>
</code>
</pre>
<p><strong>Bem&aelig;rk:</strong> Da denne plugin danner filer der caches, skal smarty variabler placeres i toppen af HVERT typografiark der er knyttet til en skabelon.</p>
';
$lang['admin']['pseudocron_granularity'] = 'Pseudocron Granularity';
$lang['admin']['info_pseudocron_granularity'] = 'Denne indstilling viser hvor ofte systemet vil fors&oslash;ge at udf&oslash;re en  planlagt opgave';
$lang['admin']['cron_request'] = 'Hver gang';
$lang['admin']['cron_15m'] = '15 minutter';
$lang['admin']['cron_30m'] = '30 minutter';
$lang['admin']['cron_60m'] = '1 time';
$lang['admin']['cron_120m'] = '2 timer';
$lang['admin']['cron_3h'] = '3 timer';
$lang['admin']['cron_6h'] = '6 timer';
$lang['admin']['cron_12h'] = '12 timer';
$lang['admin']['cron_24h'] = '24 timer';
$lang['admin']['adminlog_1day'] = '1 dag';
$lang['admin']['adminlog_1week'] = '1 uge';
$lang['admin']['adminlog_2weeks'] = '2 uger';
$lang['admin']['adminlog_1month'] = '1 m&aring;ned';
$lang['admin']['adminlog_3months'] = '3 m&aring;neder';
$lang['admin']['adminlog_6months'] = '6 m&aring;neder';
$lang['admin']['adminlog_manual'] = 'Manuel sletning';
$lang['admin']['adminlog_lifetime'] = 'Levetid for log-filer';
$lang['admin']['info_adminlog_lifetime'] = 'Fjern log-filer der er &aelig;ldre end den angivne periode';
$lang['admin']['filteruser'] = 'Brugernavn er';
$lang['admin']['filtername'] = 'Event navn indeholder';
$lang['admin']['filteraction'] = 'Action indeholder';
$lang['admin']['filterapply'] = 'Filtrer';
$lang['admin']['filterreset'] = 'Nulstil filtre';
$lang['admin']['filters'] = 'Filtrer';
$lang['admin']['showfilters'] = 'Rediger filter';
$lang['admin']['clearcache_taskdescription'] = 'Udf&oslash;rt dagligt - dette vil fjerne cachede filer, der er &aelig;ldre end den angivet i global konfiguration';
$lang['admin']['clearcache_taskname'] = 'Nulstil Cache';
$lang['admin']['info_autoclearcache'] = 'Skriv et tal. Skriv 0 for at deaktivere automatisk cache nulstilling';
$lang['admin']['autoclearcache'] = 'Fjern cache filer der er &aelig;ldre en det angivne antal dage';
$lang['admin']['listtemplates_pagelimit'] = 'Antal r&aelig;kker p&aring; oversigten over Skabeloner.';
$lang['admin']['liststylesheets_pagelimit'] = 'Antal r&aelig;kker p&aring; oversigten over Typografiark';
$lang['admin']['listgcbs_pagelimit'] = 'Antal r&aelig;kker p&aring; oversigten over Globale indholdsblokke';
$lang['admin']['insecure'] = 'Ikke-sikret (HTTP)';
$lang['admin']['secure'] = 'Sikret (HTTPS)';
$lang['admin']['secure_page'] = 'Benyt HTTPS for denne side';
$lang['admin']['thumbnail_width'] = 'Billed-eksempel bredde';
$lang['admin']['thumbnail_height'] = 'Billed-eksempel h&oslash;jde';
$lang['admin']['E_STRICT'] = 'Er E_STRICT sl&aring;et fra i error_reporting';
$lang['admin']['test_estrict_failed'] = 'E_STRICT er sl&aring;et til i error_reporting';
$lang['admin']['info_estrict_failed'] = 'Nogle af de biblioteker CMSMS bruger, virker ikke godt sammen med E_STRICT. Sl&aring; E_STRICT fra, f&oslash;r du forts&aelig;tter';
$lang['admin']['E_DEPRECATED'] = 'Er E_DEPRECATED sl&aring;et fra i error_reporting';
$lang['admin']['test_edeprecated_failed'] = 'E_DEPRECATED er sl&aring;et til';
$lang['admin']['info_edeprecated_failed'] = 'Hvis E_DEPRECATED er sl&aring;et til, vil brugere se advarsler der vil p&aring;virke udseendet og funktionaliteten p&aring; hjemmesiden.';
$lang['admin']['session_use_cookies'] = 'Sessioner m&aring; gerne benytte sig af Cookies';
$lang['admin']['errorgettingcontent'] = 'Kunne ikke indhente information om the specificerede indholds-objekt';
$lang['admin']['errordeletingcontent'] = 'Fejl ved sletning af indhold (enten har denne side undersider, eller ogs&aring; er det standardsiden)';
$lang['admin']['invalidemail'] = 'Email adressen er ikke gyldig';
$lang['admin']['info_deletepages'] = 'Bem&aelig;rk: p&aring; grund af manglende rettigheder, kan nogle af de sider du valgte til at slettes mangle nedenfor';
$lang['admin']['info_pagealias'] = 'Angiv et unikt alias for siden';
$lang['admin']['info_autoalias'] = 'Hvis dette felt er tomt, vil et alias blive lavet automatisk';
$lang['admin']['invalidparent'] = 'Du skal angive en overliggende side til siden (kontakt din systemadminisitraor hvis du ikke ser denne valgmulighed)';
$lang['admin']['forgotpwprompt'] = 'Skriv din administrator brugernavn. En email med nye login-oplysninger vil blive sendt til den adresse der er tilknyttet brugernavnet.';
$lang['admin']['info_basic_attributes'] = 'Dette felt giver dig mulighed for at specificere hvilket indholdsegenskaber brugere uden &amp;quot;H&aring;ndt&eacute;r alt indhold&amp;quot; tilladelsen har mulighed for at redigere.';
$lang['admin']['basic_attributes'] = 'Alm. egenskaber';
$lang['admin']['no_permission'] = 'Du har ikke tilladelse til at udf&oslash;re dette';
$lang['admin']['bulk_success'] = 'Masse operationen blev korrekt gennemf&oslash;rt.';
$lang['admin']['no_bulk_performed'] = 'Ingen masse operation udf&oslash;rt.';
$lang['admin']['info_preview_notice'] = 'Advarsel: Forh&aring;ndsvisningen opf&oslash;rer sig meget lige et browser vindue, og giver mulighed for at navigere v&aelig;k fra den side du forh&aring;ndsviser. Hvis du g&oslash;r dette kan der ske s&aelig;re ting. Hvis du navigerer v&aelig;k fra siden og tilbage igen, vil du ikke se indholds&aelig;ndringer der ikke er gemt. N&aring;r du tilf&oslash;jer en side og navigerer v&aelig;k fra denne i forh&aring;ndsvisningen vil du ikke kunne g&aring; tilbage igen.';
$lang['admin']['sitedownexcludes'] = 'Vis ikke SiteDown beskeder for bes&oslash;gende fra disse adresser';
$lang['admin']['info_sitedownexcludes'] = 'Skriv en kommasepareret liste af ip-adresser, som skal undtages fra site-down visningen. <br/>Dette tillader administratorer at arbejde p&amp;aring; siden samtidig med at anonyme bes&amp;oslash;gende ser en sitedown meddelse.<br/><br/>
Adresser kan skrives i f&amp;oslash;lgende formater:<br/>
1. xxx.xxx.xxx.xxx -- (pr&amp;aelig;cis IP adresse)<br/>
2. xxx.xxx.xxx.[yyy-zzz] -- (IP adresse interval)<br/>
3. xxx.xxx.xxx.xxx/nn -- (nnn = antal bits, cisco style. F.eks: 192.168.0.100/24 = hele 192.168.0 class C subnet)';
$lang['admin']['setup'] = 'Avanceret ops&aelig;tning';
$lang['admin']['handle_404'] = 'Brugerdefineret 404 h&aring;ndtering';
$lang['admin']['sitedown_settings'] = 'Sitedown indstillinger';
$lang['admin']['general_settings'] = 'Generelle indstillinger';
$lang['admin']['help_function_page_attr'] = '<h3>Hvad g&oslash;r denne funktion?</h3>
<p>Denne tag kan bruges til at hente indholdet i felterne Ekstra sideegenskaber.</p>

<h3>Hvordan bruger jeg den?</h3>
<p>Inds&aelig;t <code>{page_attr key=&quot;extra1&quot;}</code> i skabelonen.</p>

<h3>Hvilke parametre kan jeg bruge?</h3>
<ul>
  <li><strong>key [p&aring;kr&aelig;vet]</strong> Feltets key - extra1, extra2, extra3.</li>
<li><em>(valgfri)</em> assign (string) - knytter feltets indhold til en smarty variabel med dette navn.</li>
</ul>
';
$lang['admin']['forge'] = 'Forge';
$lang['admin']['disable_wysiwyg'] = 'WYSIWYG ikke tilladt for denne side';
$lang['admin']['help_function_page_image'] = '<h3>Hvad g&oslash;r denne tag?</h3>
<p>Denne tag kan bruges til at vise billedet eller thumbnail&acute;en som er knyttet til en bestemt side.</p>

<h3>Hvordan bruger jeg den?</h3>
<p>Inds&aelig;t taggen i din skabelon s&aring;dan: <code>{page_image}</code>.</p>

<h3>Hvilke parametre kan jeg bruge?</h3>
<ul>
  <li>thumbnail - Viser thumbnail i stedet for billede.</li>
</ul>';
$lang['admin']['pagelink_circular'] = 'Et sidelink kan ikke have et andet sidelink som dets destination';
$lang['admin']['destinationnotfound'] = 'Den valgte side kunne ikke findes eller er ugyldig';
$lang['admin']['help_function_dump'] = '<h3>What does this do?</h3>
  <p>This tag can be used to dump the contents of any smarty variable in a more readable format.  This is useful for debugging, and editing templates, to know the format and types of data available.</p>
<h3>How do I use it?</h3>
<p>Insert the tag in the template like <code>{dump item=&#039;the_smarty_variable_to_dump&#039;}</code>.</p>
<h3>What parameters does it take?</h3>
<ul>
<li><strong>item (required)</strong> - The smarty variable to dump the contents of.</li>
<li>maxlevel - The maximum number of levels to recurse (applicable only if recurse is also supplied.  The default value for this parameter is 3</li>
<li>nomethods - Skip output of methods from objects.</li>
<li>novars - Skip output of object members.</li>
<li>recurse - Recurse a maximum number of levels through the objects providing verbose output for each item until the maximum number of levels is reached.</li>
</ul>';
$lang['admin']['sqlerror'] = 'SQL fejl i %s';
$lang['admin']['image'] = 'Billede';
$lang['admin']['thumbnail'] = 'Billedeksempel';
$lang['admin']['searchable'] = 'Denne side er s&oslash;gbar';
$lang['admin']['help_function_content_image'] = '<h3>Hvad g&oslash;r denne funktion?</h3>

<p>Denne plugin tillader skabelon designere at lade brugere v&aelig;lge et billede, n&aring;r de redigerer en side. Det opf&oslash;rer sig i stil med content, som kan bruges til at inds&aelig;tte flere indholdsblokke.</p>

<h3>Hvordan bruger jeg den?</h3>
<p>Inds&aelig;t: <code>{content_image block=&#039;image1&#039;}</code> i din skabelon.</p>

<h3>Hvilke parametre kan jeg bruge?</h3>
<ul>
<li><strong>(required)</strong> block - Navnet for denne indholdsblok.
<p>Eksempel:</p>
pre>{content_image block=&#039;image1&#039;}</pre><br/>
</li>
<li><em>(optional)</em> label - En beskrivelse af denne indholdsblok som vises over indholdsfeltet ved redigering af siden.
Hvis ingen label er angivet, bruges indholdsblokkens navn.</li>
<li><em>(optional)</em> dir - Navnet p&aring; en mappe, angives relativt til uploads mappen, som indeholder billederne der skal v&aelig;lges. 
Hvis ingen mappe er angivet, vises billederne i uploads mappen.
<p>Eksempel: brug billeder fra uploads/image mappen.</p>
<pre>{content_image block=&#039;image1&#039; dir=&#039;images&#039;}</pre><br/>
</li>
<li><em>(optional)</em> class - tilf&oslash;jer den angivne class til den genererede billedtag.</li>
  <li><em>(optional)</em> id - tilf&oslash;jer den angivne id til den genererede billedtag.</li> 
  <li><em>(optional)</em> name - tilf&oslash;jer det angivne name til den genererede billedtag.</li> 
  <li><em>(optional)</em> width - tilf&oslash;jer den angivne bredde til den genererede billedtag.</li>
  <li><em>(optional)</em> height - tilf&oslash;jer den angivne h&oslash;jde til den genererede billedtag.</li>
  <li><em>(optional)</em> alt - tilf&oslash;jer en alternativ tekst til den genererede billedtag.</li>
</ul>';
$lang['admin']['error_udt_name_chars'] = 'Et gyldigt UDT navn starter med et bogstav eller underscore, efterfulgt af et antal bogstaver, tal eller underscores';
$lang['admin']['errorupdatetemplateallpages'] = 'Skabelonen er ikke aktiv';
$lang['admin']['hidefrommenu'] = 'Skjul i menu';
$lang['admin']['settemplate'] = 'S&aelig;t skabelon';
$lang['admin']['text_settemplate'] = 'S&aelig;t ny skabelon for de markerede sider';
$lang['admin']['cachable'] = 'Kan cache&#039;s';
$lang['admin']['noncachable'] = 'Kan ikke cache&#039;s';
$lang['admin']['copy_from'] = 'Kopi&eacute;r fra';
$lang['admin']['copy_to'] = 'Kopi&eacute;r til';
$lang['admin']['copycontent'] = 'Kopi&eacute;r indhold';
$lang['admin']['md5_function'] = 'md5 funktion';
$lang['admin']['tempnam_function'] = 'tempnam funktion';
$lang['admin']['register_globals'] = 'PHP register_globals';
$lang['admin']['output_buffering'] = 'PHP output_buffering';
$lang['admin']['disable_functions'] = 'disable_functions i PHP';
$lang['admin']['xml_function'] = 'Basal XML (expat) underst&oslash;ttelse';
$lang['admin']['magic_quotes_gpc'] = 'Magic quotes for Get/Post/Cookie';
$lang['admin']['magic_quotes_gpc_on'] = 'Apostrof, anf&oslash;rselstegn og backslash escape&#039;s automatisk. Du kan f&aring;r problemer med at gemme skabeloner';
$lang['admin']['magic_quotes_runtime'] = 'Magic quotes in runtime';
$lang['admin']['magic_quotes_runtime_on'] = 'Most functions that return data will have quotes escaped with a backslash. You can to have problems';
$lang['admin']['file_get_contents'] = 'Test file_get_contents';
$lang['admin']['check_ini_set'] = 'Test ini_set';
$lang['admin']['check_ini_set_off'] = 'Du kan f&aring; problemer med visse funktioner uden denne egenskab. Denne test kan fejle hvis safe_mode er sl&aring;et til';
$lang['admin']['file_uploads'] = 'Fil uploads';
$lang['admin']['test_remote_url'] = 'Test af remote URL';
$lang['admin']['test_remote_url_failed'] = 'Du kan muligvis ikke &aring;bne en fil p&aring; en ikke-lokal server';
$lang['admin']['test_allow_url_fopen_failed'] = 'Hvis du tillader at url fopen er sl&aring;et fra vil du ikke kunne tilg&aring; URL objekter ved hj&aelig;lp af ftp eller http protokollerne.';
$lang['admin']['connection_error'] = 'Udg&aring;ende http forbindelse lader til ikke at virke! Er der en firewall eller ACL der blokeret eksterne forbindelser? Dette vil g&oslash;re at Modul H&aring;ndtering og potentielt anden funktionalitet ikke virker.';
$lang['admin']['remote_connection_timeout'] = 'Forbindelsen tog for lang tid.';
$lang['admin']['search_string_find'] = 'Forbindelse ok!';
$lang['admin']['connection_failed'] = 'Forbindelse fejlede!';
$lang['admin']['remote_response_ok'] = 'Fjern svar: ok!';
$lang['admin']['remote_response_404'] = 'Fjern svar: ikke fundet!';
$lang['admin']['remote_response_error'] = 'Fjern svar: fejl!';
$lang['admin']['notifications_to_handle'] = 'Du har <b>%d</b> ventende underretninger';
$lang['admin']['notification_to_handle'] = 'Du har <b>%d</b> ventende underretninger';
$lang['admin']['notifications'] = 'Underretninger';
$lang['admin']['dashboard'] = 'Vis Dashboard';
$lang['admin']['ignorenotificationsfrommodules'] = 'Ignor&eacute;r underretninger fra disse moduler';
$lang['admin']['admin_enablenotifications'] = 'Tillade brugere at vise underretninger<br/><em>(underretninger vil blive vist p&aring; alle administrations sider)</em>';
$lang['admin']['enablenotifications'] = 'Vis underretninger i admin delen';
$lang['admin']['test_check_open_basedir_failed'] = 'Open basedir begr&aelig;nsningen er sl&aring;et til. Du vil m&aring;ske opleve problemer med nogle udvidede funktioner.';
$lang['admin']['config_writable'] = 'config.php er skrivbar. Det er sikrere hvis du &aelig;ndre tilladelsen til skrive-beskyttet';
$lang['admin']['caution'] = 'Advarsel';
$lang['admin']['create_dir_and_file'] = 'Kontrollerer om httpd processen kan oprette en fil inde i en mappe den skabte';
$lang['admin']['os_session_save_path'] = 'Kan ikke kontrolleres pga. OS sti';
$lang['admin']['unlimited'] = 'Ubegr&aelig;nset';
$lang['admin']['open_basedir'] = 'PHP Open Basedir';
$lang['admin']['open_basedir_active'] = 'Kan ikke kontrolleres pga af at open_basedir er aktiv';
$lang['admin']['invalid'] = 'Ugyldig';
$lang['admin']['checksum_passed'] = 'Alle checksumme svarede til dem i den upload&#039;ede fil';
$lang['admin']['error_retrieving_file_list'] = 'Fejl ved hentning af file liste';
$lang['admin']['files_checksum_failed'] = 'Filer kunne ikke kontrolleres';
$lang['admin']['failure'] = 'Fejl';
$lang['admin']['help_function_process_pagedata'] = '<h3>Hvad g&oslash;r denne funktion?</h3>
<p>Denne funktion henter data fra pagedata felterne p&aring; siderne og bearbejder dem via smarty. Den g&oslash;r det muligt at sende side specifik data gennem smarty uden at skifte sideskabelon for hver side.
</p>

<h3>Hvordan bruger jeg den?</h3>
<ol>
<li>Inds&aelig;t smarty variabler eller andre smarty udtryk i pagedata felterne p&aring; indholds sider.</li>

<li>Inds&aelig;t <code>{process_pagedata}</code> taggen aller&oslash;verst i din sideskabelon.</li>
</ol>
<br/>

<h3>Hvilke parametre kan jeg bruge?</h3>
<p>Ingen.</p>';
$lang['admin']['page_metadata'] = 'Side specifik metadata';
$lang['admin']['pagedata_codeblock'] = 'Smarty data eller logik som er specifik for denne side';
$lang['admin']['error_uploadproblem'] = 'Der skete en fejl ved upload';
$lang['admin']['error_nofileuploaded'] = 'Ingen fil blev uploadet';
$lang['admin']['files_failed'] = 'Filer fejlede md5sum kontrol';
$lang['admin']['files_not_found'] = 'Filer ikke fundet';
$lang['admin']['info_generate_cksum_file'] = 'Denne funktion giver mulighed for at generere en checksum fil og gemme den p&aring; din lokale computer til senere kontrol. Dette b&oslash;r g&oslash;res lige f&oslash;r et site lanceres, og/eller efter opgraderinger eller st&oslash;rre &aelig;ndringer.';
$lang['admin']['info_validation'] = 'Denne funktion vil sammenligne checksummene i den upload&#039;ede fil med filerne i installationen. Det kan hj&aelig;lpe med at finde problemer ved upload, eller pr&aelig;cis hvilke filer det blev &aelig;ndret ved hacking. En checksum fil genereres for hver version af CMS Made Simple fra version 1.4 og frem.';
$lang['admin']['download_cksum_file'] = 'Hen checksum fil';
$lang['admin']['perform_validation'] = 'Udf&oslash;rer validering';
$lang['admin']['upload_cksum_file'] = 'Upload Checksum fil';
$lang['admin']['checksumdescription'] = 'Valid&eacute;r CMS filer ved at sammenligne med kendte checksumme';
$lang['admin']['system_verification'] = 'System Verifikation';
$lang['admin']['extra1'] = 'Ekstra sideegenskab 1';
$lang['admin']['extra2'] = 'Ekstra sideegenskab 2';
$lang['admin']['extra3'] = 'Ekstra sideegenskab 3';
$lang['admin']['start_upgrade_process'] = 'Start opgraderingsprocessen';
$lang['admin']['warning_upgrade'] = '<em><strong>Advarsel:</strong></em> CMSMS beh&oslash;ver en opgradering';
$lang['admin']['warning_upgrade_info1'] = 'Du k&oslash;rer nu skema version %s, og du bliver n&oslash;dt til at opgradere til version %s';
$lang['admin']['warning_upgrade_info2'] = 'Klik venligst p&aring; dette link: %s.';
$lang['admin']['warning_mail_settings'] = 'Dine mail indstillinger er ikke blevet sat. Dette kan skabe problemer for dit site&#039;s evne til at sende emails. Du b&oslash;r g&aring; til <a href="%s">Udvidelser >> CMSMailer</a> og konfigurere indstillingerne til det din host har angivet..';
$lang['admin']['view_page'] = 'Vis denne side i et nyt vindue';
$lang['admin']['off'] = 'Til';
$lang['admin']['on'] = 'Fra';
$lang['admin']['invalid_test'] = 'Ugyldig test parameter v&aelig;rdi!';
$lang['admin']['copy_paste_forum'] = 'Vis tekst rapport <em>(egner sig til at kopiere ind i forum-foresp&oslash;rgsler)</em>';
$lang['admin']['permission_information'] = 'Rettigheds information';
$lang['admin']['server_os'] = 'Server Operativ System';
$lang['admin']['server_api'] = 'Server API';
$lang['admin']['server_software'] = 'Server Software';
$lang['admin']['server_information'] = 'Server Information';
$lang['admin']['session_save_path'] = 'Session Save Path';
$lang['admin']['max_execution_time'] = 'Maksimal k&oslash;rselstid';
$lang['admin']['gd_version'] = 'GD version';
$lang['admin']['upload_max_filesize'] = 'Maksimal upload st&oslash;rrelse';
$lang['admin']['post_max_size'] = 'Maksimal post st&oslash;rrelse';
$lang['admin']['memory_limit'] = 'PHP hukommelses gr&aelig;nse';
$lang['admin']['server_db_type'] = 'Server Database';
$lang['admin']['server_db_version'] = 'Server Database Version';
$lang['admin']['phpversion'] = 'Nuv&aelig;rende PHP version';
$lang['admin']['safe_mode'] = 'PHP Safe Mode';
$lang['admin']['php_information'] = 'PHP Information';
$lang['admin']['cms_install_information'] = 'Information vedr&oslash;rende CMS-installationen';
$lang['admin']['cms_version'] = 'CMS Version';
$lang['admin']['installed_modules'] = 'Installerede moduler';
$lang['admin']['config_information'] = 'Information vedr&oslash;rende konfigurationen';
$lang['admin']['systeminfo_copy_paste'] = 'Kopi&eacute;r venligst denne markerede tekst ind i dit forum-indl&aelig;g';
$lang['admin']['help_systeminformation'] = 'Informationen vist nedenfor er samlet fra en r&aelig;kke steder og opsummeret her s&aring; du nemt kan finde oplysningerne der kr&aelig;ves for at hj&aelig;lpe til diagnosticering af problemer eller sp&oslash;rge om hj&aelig;lp med din CMS Made Simple installation.';
$lang['admin']['systeminfo'] = 'Information vedr&oslash;rende systemet';
$lang['admin']['systeminfodescription'] = 'Viser forskellige typer information om dit system som kan v&aelig;re brugbare til diagnosticering af problemer';
$lang['admin']['systemmaintenance'] = 'System vedligeholdelse';
$lang['admin']['systemmaintenancedescription'] = 'Forskellige funktioner der vedligeholder dit systems helbred. Du kan ogs&aring; kigge i changelog&#039;en for systemet.Various functions for maintaining the health of your system. You can also browser the changelog of CMSMadeSimple';
$lang['admin']['sysmaintab_database'] = 'Database';
$lang['admin']['sysmaintab_changelog'] = 'Changelog';
$lang['admin']['sysmaintab_content'] = 'Cache og indhold';
$lang['admin']['sysmain_content_status'] = 'Indholds status';
$lang['admin']['sysmain_cache_status'] = 'Cache status';
$lang['admin']['sysmain_database_status'] = 'Database status';
$lang['admin']['sysmain_updatehierarchy'] = 'Update page hierarchy positions';
$lang['admin']['sysmain_update'] = 'Update';
$lang['admin']['sysmain_hierarchyupdated'] = 'Page hierarchy positions updated';
$lang['admin']['sysmain_repair'] = 'Repair';
$lang['admin']['sysmain_repairtables'] = 'Repair tables';
$lang['admin']['sysmain_tablesrepaired'] = 'Tables repaired';
$lang['admin']['sysmain_optimizetables'] = 'Optimize tables';
$lang['admin']['sysmain_tablesoptimized'] = 'Tables optimized';
$lang['admin']['sysmain_optimize'] = 'Optimize';
$lang['admin']['welcome_user'] = 'Velkommen';
$lang['admin']['itsbeensincelogin'] = 'Der er g&aring;et %s siden dit sidste login';
$lang['admin']['days'] = 'dage';
$lang['admin']['day'] = 'dag';
$lang['admin']['hours'] = 'timer';
$lang['admin']['hour'] = 'time';
$lang['admin']['minutes'] = 'minutter';
$lang['admin']['minute'] = 'minut';
$lang['admin']['help_css_max_age'] = 'Dette parameter skal s&aelig;ttes ret h&oslash;jt for statiske sites, og s&aelig;ttes til 0 for sites under udvikling';
$lang['admin']['css_max_age'] = 'Maksimal tid (i sekunder) typografiark kan v&aelig;re cache&#039;t i browseren';
$lang['admin']['error'] = 'Fejl';
$lang['admin']['new_version_available'] = '<em>Bem&aelig;rk:</em> En ny version af CMS Made Simple er tilg&aelig;ngelig. Underret venligst den systemansvarlige';
$lang['admin']['master_admintheme'] = 'Standard Admininstrationstema (for login-siden og nye brugerkonti)';
$lang['admin']['contenttype_separator'] = 'Adskillelse';
$lang['admin']['contenttype_sectionheader'] = 'Sektionsoverskrift';
$lang['admin']['contenttype_content'] = 'Indhold';
$lang['admin']['contenttype_pagelink'] = 'Internt sidelink';
$lang['admin']['nogcbwysiwyg'] = 'Tillad ikke WYSIWYG-redigering ved globale indholdsblokke';
$lang['admin']['destination_page'] = 'Destinationsside';
$lang['admin']['additional_params'] = 'Yderligere parametre';
$lang['admin']['help_function_current_date'] = '	<h3>Hvad g&oslash;r denne funktion?</h3>
	<p>Inds&aelig;tter den aktuelle dato og klokkeslet.  Hvis der ikke er angivet et format, formateres der som standard til noget i retning af &#039;Jan 01, 2004&#039;.</p>
	<h3>Hvordan bruger jeg det?</h3>
	<p>Du skal blot inds&aelig;tte en kode i en skabelon/side s&aring;som: <code>{current_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
	<h3>Hvilke parametre bruger den?</h3>
	<ul>
		<li><em>(valgfri)</em> <b>&quot;format&quot;</b> - Dato -og tids-format som anvender parametre fra php&#039;s strftime function. <a href="http://php.net/strftime" target="_blank">Se listen over parametre samt yderligere information her</a>.</li>
		<li><em>(valgfri)</em> <b>&quot;ucword&quot;</b> - S&aelig;ttes den til &quot;true&quot; skrives det f&oslash;rste bogstav i alle ord med stort.</li>
	</ul>
	</p>';
$lang['admin']['help_function_valid_xhtml'] = '<h3>Hvad g&oslash;r denne funktion?</h3>
<p>Returnerer et link til w3c&#039;s HTML-efterpr&oslash;vningstest.</p>
<h3>Hvordan bruger jeg det?</h3>
<p>Du skal blot inds&aelig;tte en kode i en skabelon/side s&aring;som: <code>{valid_xhtml}</code></p>
<h3>Hvilke parametre bruger den?</h3>
<p>
    <ul>
	<li><em>(valgfri)</em> <b>&quot;url&quot;</b> (tekststreng)  - Den URL der skal  valideres, angives ingen url vil http://validator.w3.org/check/referer blive brugt i stedet.</li>
	<li><em>(valgfri)</em> <b>&quot;class&quot;</b> (tekststreng) - Hvis angivet, vil parametret blive brugt som class-egenskab for selektoren anker (a)</li>
	<li><em>(valgfri)</em> <b>&quot;target&quot;</b> (tekststreng)  - Hvis angivet, vil parametret blive brugt som m&aring;l for linket (a)</li>
	<li><em>(valgfri)</em> <b>&quot;image&quot;</b> (true/false) - Sat til &quot;false&quot;, vil der blive brugt et tekst-link i stedet for en billede/ikon.</li>
	<li><em>(valgfri)</em> <b>&quot;text&quot;</b>   (tekststreng)  - Hvis angivet, vil parametret blive brugt som link-tekst eller som alternativ tekst, hvis der anvendes et billede som link. Standard er &#039;valid XHTML 1.0 Transitional&#039;.<br /> Hvis der bruges et billede, vil den angivne tekststreng ogs&aring; blive brugt som billedets alt-attribut (hvis &#039;alt&#039;-parametret angives vil det som standard overskrive &#039;text&#039;-parametret).</li>
	<li><em>(valgfri)</em> <b>&quot;image_class&quot;</b> (tekststreng)  - Benyttes kun hvis &#039;image&#039; ikke er sat til &quot;false&quot;. Hvis angivet, vil parametret blive brugt som  class-attribut for billed-selektoren (img)</li>
	<li><em>(valgfri)</em> <b>&quot;src&quot;</b>  (tekststreng)     - Benyttes kun hvis &#039;image&#039; ikke er sat til &quot;false&quot;. Bestemmer hvilket ikon, der skal vises. Standard er http://www.w3.org/Icons/valid-xhtml10</li>
	<li><em>(valgfri)</em> <b>&quot;width&quot;</b> (tekststreng)     - Benyttes kun hvis &#039;image&#039; ikke er sat til &quot;false&quot;. Billedets bredde i pixels. Standard er 88 (bredden p&aring; http://www.w3.org/Icons/valid-xhtml10)</li>
	<li><em>(valgfri)</em> <b>&quot;height&quot;</b> (tekststreng)     - Benyttes kun hvis &#039;image&#039; ikke er sat til &quot;false&quot;. Billedets h&oslash;jde i pixels. Standard er 31 (h&oslash;jden af http://www.w3.org/Icons/valid-xhtml10)</li>
	<li><em>(valgfri)</em> alt         (tekststreng)     - Benyttes kun hvis &#039;image&#039; ikke er sat til &quot;false&quot;. Den alternative tekst (&#039;alt&#039;-attributten) for billedet (elementet). Hvis intet er angivet bruges linkteksten (&quot;text&quot;).</li>
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
$lang['admin']['help_function_title'] = '<h3>Hvad g&oslash;r denne funktion?</h3>
<p>Den viser sidens titel.</p>

<h3>Hvordan bruger jeg den?</h3>
<p>Inds&aelig;t <code>{title}</code> i din skabelon / p&aring; din side.</p>

<h3>Hvilke parametre kan jeg bruge?</h3>
<p>Ingen.</p>';
$lang['admin']['help_function_stylesheet'] = '	<h3>What does this do?</h3>
	<p>Gets stylesheet information from the system.  By default, it grabs all of the stylesheets attached to the current template.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page&#039;s head section like: <code>{stylesheet}</code></p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em>name - Instead of getting all stylesheets for the given page, it will only get one spefically named one, whether it&#039;s attached to the current template or not.</li>
		<li><em>(optional)</em>media - If name is defined, this allows you set a different media type for that stylesheet.</li>
	</ul>
	</p>';
$lang['admin']['help_function_sitename'] = '<h3>Hvad g&oslash;r denne funktion?</h3>

<p>Den viser hjemmesidens navn. Hjemmesidens navn defineres under installationen og kan redigeres under Globale indstilinger.</p>

<h3>Hvordan bruger jeg den?</h3>
<p>Inds&aelig;t <code>{sitename}</code> i din kode / p&aring; din side.</p>

<h3>Hvilke parametre kan jeg bruge?</h3>
<p>Ingen.</p>';
$lang['admin']['help_function_search'] = '<h3>Hvad g&oslash;r denne funktion?</h3>
<p>Dette er bare en tag til Search modulet som g&oslash;r syntaksen lettere. 
I stedet for koden <code>{cms_module module=&#039;Search&#039;}</code> kan du skrive <code>{search}</code> n&aring;r du inds&aelig;tter s&oslash;gefunktionen i en skabelon.</p>

<h3>Hvordan bruger jeg den?</h3>
<p>Inds&aelig;t <code>{search}</code> i en skabelon hvor du &oslash;nsker at s&oslash;gefeltet skal v&aelig;re. <br />
Se Search module help for at f&aring; hj&aelig;lp til s&oslash;gefunktionen. </p>';
$lang['admin']['help_function_root_url'] = '<h3>Hvad g&oslash;r denne funktion?</h3>
<p>Den viser root url for hjemmesiden.</p>

<h3>Hvordan bruger jeg den?</h3>
<p>Inds&aelig;t <code>{root_url}</code>i din skabelon / p&aring; din side.</p>

<h3>Hvilke parametre kan jeg bruge?</h3>
<p>Ingen.</p>';
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
	<p>This is actually just a wrapper tag for the Printing module to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;Printing&#039;}</code> you can now just use <code>{print}</code> to insert the module on pages and templates.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{print}</code> on a page or in a template. For help about the Printing module, what parameters it takes etc., please refer to the <a href="listmodules.php?action=showmodulehelp&amp;module=Printing">Printing module help</a>.';
$lang['admin']['login_info_title'] = 'Information';
$lang['admin']['login_info'] = 'Fra dette punkt skal de f&oslash;lgende parametre tages i betragtning';
$lang['admin']['login_info_params'] = '<ol> 
  <li>Cookies skal v&aelig;re tilladt</li> 
  <li>Javascript skal v&aelig;re sl&aring;et til</li> 
  <li>Windows popup skal v&aelig;re tilladt for denne adresse:</li> 
</ol>';
$lang['admin']['help_function_news'] = '	<h3>What does this do?</h3>
	<p>This is actually just a wrapper tag for the News module to make the tag syntax easier. 
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
	<p>This is actually just a wrapper tag for the Menu Manager module to make the tag syntax easier. 
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
$lang['admin']['help_function_image'] = '  <h3>What does this do?</h3>
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
$lang['admin']['help_function_html_blob'] = '	<h3>What does this do?</h3>
	<p>See the help for global_content for a description.</p>';
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
		<li><em>(optional)</em> <tt>id</tt> - Optional css_id for the &amp;lt;a&amp;gt; link.</li> <!-- mbv - 29-06-2005 -->
		<li><em>(optional)</em> <tt>more</tt> - place additional options inside the &amp;lt;a&amp;gt; link.</li> <!-- mbv - 29-06-2005 -->
		<li><em>(optional)</em> <tt>label</tt> - Label to use in with the link if applicable.</li>
		<li><em>(optional)</em> <tt>label_side left/right</tt> - Side of link to place the label (defaults to &quot;left&quot;).</li>
		<li><em>(optional)</em> <tt>title</tt> - Text to use in the title attribute.  If none is given, then the title of the page will be used for the title.</li>
		<li><em>(optional)</em> <tt>rellink 1/0</tt> - Make a relational link for accessible navigation.  Only works if the dir parameter is set and should only go in the head section of a template.</li>
		<li><em>(optional)</em> <tt>href</tt> - If href is used only the href value is generated (no other parameters possible). <strong>Example:</strong> &amp;lt;a href=&quot;{cms_selflink href=&quot;alias&quot;}&quot;&amp;gt;&amp;lt;img src=&quot;&quot;&amp;gt;&amp;lt;/a&amp;gt;</li>
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
$lang['admin']['of'] = 'af';
$lang['admin']['first'] = 'F&oslash;rst';
$lang['admin']['last'] = 'Sidst';
$lang['admin']['adminspecialgroup'] = 'Advarsel: Medlemmer af denne gruppe har automatisk alle tilladelser';
$lang['admin']['disablesafemodewarning'] = 'Sl&aring; &quot;safe mode&quot; advarsel fra';
$lang['admin']['date_format_string'] = 'Dato format streng';
$lang['admin']['date_format_string_help'] = '<em>strftime</em> formateret dato-string';
$lang['admin']['last_modified_at'] = 'Sidst &aelig;ndret';
$lang['admin']['last_modified_by'] = 'Sidst &aelig;ndret af';
$lang['admin']['read'] = 'L&aelig;s';
$lang['admin']['write'] = 'Skriv';
$lang['admin']['execute'] = 'Eksekv&eacute;r';
$lang['admin']['group'] = 'Gruppe';
$lang['admin']['other'] = 'Andet';
$lang['admin']['event_desc_moduleupgraded'] = 'Sendes efter at et modul er opgraderet';
$lang['admin']['event_help_moduleupgraded'] = '<p>Sendes efter at et modul er opgraderet</p>';
$lang['admin']['event_desc_moduleinstalled'] = 'Sendes efter at et modul er installeret';
$lang['admin']['event_help_moduleinstalled'] = '<p>Sent after a module is installed.</p>';
$lang['admin']['event_desc_moduleuninstalled'] = 'Sendes efter at et modul er fjernet';
$lang['admin']['event_help_moduleuninstalled'] = '<p>Sent after a module is uninstalled.</p>';
$lang['admin']['event_desc_edituserdefinedtagpost'] = 'Sendes efter at et bruger tag er opdateret';
$lang['admin']['event_help_edituserdefinedtagpost'] = '<p>Sent after a user defined tag is updated.</p>';
$lang['admin']['event_desc_edituserdefinedtagpre'] = 'Sendes f&oslash;r en brugerdefineret tag opdateres';
$lang['admin']['event_help_edituserdefinedtagpre'] = '<p>Sent prior to a user defined tag update.</p>';
$lang['admin']['event_desc_deleteuserdefinedtagpre'] = 'Sendes f&oslash;r en brugerdefineret tag slettes';
$lang['admin']['event_help_deleteuserdefinedtagpre'] = '<p>Sent prior to deleting a user defined tag.</p>';
$lang['admin']['event_desc_deleteuserdefinedtagpost'] = 'Sendes efter at et bruger tag er fjernet';
$lang['admin']['event_help_deleteuserdefinedtagpost'] = '<p>Sent after a user defined tag is deleted.</p>';
$lang['admin']['event_desc_adduserdefinedtagpost'] = 'Sendes efter at et bruger tag er indsat';
$lang['admin']['event_help_adduserdefinedtagpre'] = '<p>Sent after a user defined tag is inserted.</p>';
$lang['admin']['event_desc_adduserdefinedtagpre'] = 'Sendes f&oslash;r en brugerdefineret tag inds&aelig;ttes';
$lang['admin']['event_help_adduserdefinedtagpost'] = '<p>Sent prior to a user defined tag insert.</p>';
$lang['admin']['global_umask'] = 'Fil Oprettelses Maske (umask)';
$lang['admin']['errorcantcreatefile'] = 'Kunne ikke oprette filen (problem med fil-tilladelser?)';
$lang['admin']['errormoduleversionincompatible'] = 'Modulet er ikke kompatibelt med denne version af CMS';
$lang['admin']['errormodulenotloaded'] = 'Intern fejl, modulet kunne ikke instantieres';
$lang['admin']['errormodulenotfound'] = 'Intern fejl, kunne ikke finde en instans af modulet';
$lang['admin']['errorinstallfailed'] = 'Modul installation fejlede';
$lang['admin']['errormodulewontload'] = 'Problemer med at instantiere en tilg&aelig;ngeligt modul';
$lang['admin']['frontendlang'] = 'Standard sprog for siden';
$lang['admin']['info_edituser_password'] = '&AElig;ndr dette felt for at &aelig;ndre brugerens kodeord';
$lang['admin']['info_edituser_passwordagain'] = '&AElig;ndr dette felt for at &aelig;ndre brugerens kodeord';
$lang['admin']['originator'] = 'Ophavsmand';
$lang['admin']['module_name'] = 'Modul navn';
$lang['admin']['event_name'] = 'Begivenhedsnavn';
$lang['admin']['event_description'] = 'Begivenhedsbeskrivelse';
$lang['admin']['error_delete_default_parent'] = 'Du kan ikke slette den overliggende side til standard-siden.';
$lang['admin']['jsdisabled'] = 'Beklager, denne funktion kr&aelig;ver at du har JavaScript sl&aring;et til.';
$lang['admin']['order'] = 'R&aelig;kkef&oslash;lge';
$lang['admin']['reorderpages'] = '&AElig;ndre sider&aelig;kkef&oslash;lgen';
$lang['admin']['reorder'] = 'Gem r&aelig;kkef&oslash;lge';
$lang['admin']['page_reordered'] = 'Sidens position blev &aelig;ndret';
$lang['admin']['pages_reordered'] = 'Sidernes positioner blev &aelig;ndret';
$lang['admin']['sibling_duplicate_order'] = 'To &quot;s&oslash;skende-sider&quot; kan have samme position i r&aelig;kkef&oslash;lgen. Sider&aelig;kkef&oslash;lgen blev ikke &aelig;ndret';
$lang['admin']['no_orders_changed'] = 'Du valgte at &aelig;ndre r&aelig;kkef&oslash;lgen af siderne, men &aelig;ndrede ingenting. Sider&aelig;kkef&oslash;lgen blev ikke &aelig;ndret.';
$lang['admin']['order_too_small'] = 'En side kan ikke have positionen 0. Sider&aelig;kkef&oslash;lgen blev ikke &aelig;ndret.';
$lang['admin']['order_too_large'] = 'En side kan ikke ha en position der er h&oslash;jere end antallet af sider. Sider&aelig;kkef&oslash;lgen blev ikke &aelig;ndret.';
$lang['admin']['user_tag'] = 'Bruger Tag';
$lang['admin']['add'] = 'Tilf&oslash;j';
$lang['admin']['CSS'] = 'CSS';
$lang['admin']['about'] = 'Om';
$lang['admin']['action'] = 'Handling';
$lang['admin']['actionstatus'] = 'Handling/status';
$lang['admin']['active'] = 'Aktiv';
$lang['admin']['addcontent'] = 'Tilf&oslash;j nyt indhold';
$lang['admin']['cantremove'] = 'Kan ikke fjernes';
$lang['admin']['changepermissions'] = 'S&aelig;t tilladelser';
$lang['admin']['changepermissionsconfirm'] = 'ADVARSEL\n\nDette ville fors&oslash;ge at sikre at filerne modulet best&aring;r af kan &aelig;ndres af web-serveren.\nEr du sikker p&aring; du vil forts&aelig;tte?';
$lang['admin']['contentadded'] = 'Indholdet blev tilf&oslash;jet databasen uden fejl.';
$lang['admin']['contentupdated'] = 'Indholdet blev opdateret uden fejl.';
$lang['admin']['contentdeleted'] = 'Indholdet blev fjernet fra databasen uden fejl.';
$lang['admin']['success'] = 'Succes';
$lang['admin']['addcss'] = 'Tilf&oslash;j Stylesheet';
$lang['admin']['addgroup'] = 'Tilf&oslash;j ny gruppe';
$lang['admin']['additionaleditors'] = 'Yderligere redakt&oslash;rer';
$lang['admin']['addtemplate'] = 'Tilf&oslash;j ny sideskabelon';
$lang['admin']['adduser'] = 'Tilf&oslash;j ny bruger';
$lang['admin']['addusertag'] = 'Tilf&oslash;j nyt brugerdefineret tag';
$lang['admin']['adminaccess'] = 'Rettigheder til login til admin';
$lang['admin']['adminlog'] = 'Administratorlog';
$lang['admin']['adminlogcleared'] = 'Administratorlog blev slettet med succes';
$lang['admin']['adminlogempty'] = 'Administratorlog er tom';
$lang['admin']['adminsystemtitle'] = 'CMS Administrations System';
$lang['admin']['adminpaneltitle'] = 'CMS Made Simple Administrations Panel';
$lang['admin']['advanced'] = 'Avanceret';
$lang['admin']['aliasalreadyused'] = 'Alias&#039;et er allerede brugt p&aring; en anden side.';
$lang['admin']['aliasmustbelettersandnumbers'] = 'Alias&#039;et m&aring; v&aelig;re alle tal og bogstaver';
$lang['admin']['aliasnotaninteger'] = 'Alias kan ikke v&aelig;re et heltal';
$lang['admin']['allpagesmodified'] = 'Alle sider blev &aelig;ndret!';
$lang['admin']['assignments'] = 'Tildelinger';
$lang['admin']['associationexists'] = 'Denne tildeling eksisterer allerede';
$lang['admin']['autoinstallupgrade'] = 'Automatisk installation eller opgradering';
$lang['admin']['back'] = 'Tilbage til menu';
$lang['admin']['backtoplugins'] = 'Tilbage til loginlisten';
$lang['admin']['cancel'] = 'Annull&eacute;r';
$lang['admin']['cantchmodfiles'] = 'Kunne ikke &aelig;ndre adgangstilladelser p&aring; nogle filer.';
$lang['admin']['cantremovefiles'] = 'Fejl ved sletning af filer (adgangstilladelser?)';
$lang['admin']['confirmcancel'] = 'Er du sikker p&aring; du vil fortryde din &aelig;ndringer? Klik OK forat fortryde alle &aelig;ndringer. Klik Fortryd for at forts&aelig;tte redigeringen.';
$lang['admin']['canceldescription'] = 'Fortryd &aelig;ndringer';
$lang['admin']['clearadminlog'] = 'Slet administratorlog';
$lang['admin']['code'] = 'Kode';
$lang['admin']['confirmdefault'] = 'Er du sikker p&aring; dette skal v&aelig;re standardsiden?';
$lang['admin']['confirmdeletedir'] = 'Vil du slette denne mappe og alt dens indhold?';
$lang['admin']['content'] = 'Indhold';
$lang['admin']['contentmanagement'] = 'Indholdsstyring';
$lang['admin']['contenttype'] = 'Indholdstype';
$lang['admin']['copy'] = 'Kopi';
$lang['admin']['copytemplate'] = 'Kopi&eacute;r sideskabelon';
$lang['admin']['create'] = 'Opret';
$lang['admin']['createnewfolder'] = 'Opret ny mappe';
$lang['admin']['cssalreadyused'] = 'CSS navn allerede i brug';
$lang['admin']['cssmanagement'] = 'CSS styring';
$lang['admin']['currentassociations'] = 'Nuv&aelig;rende tildelinger';
$lang['admin']['currentdirectory'] = 'Nuv&aelig;rende mappe';
$lang['admin']['currentgroups'] = 'Nuv&aelig;rende gruppe';
$lang['admin']['currentpages'] = 'Nuv&aelig;rende sider';
$lang['admin']['currenttemplates'] = 'Nuv&aelig;rende sideskabeloner';
$lang['admin']['currentusers'] = 'Nuv&aelig;rende brugere';
$lang['admin']['custom404'] = 'Brugerdefineret 404 fejlmeddelelse';
$lang['admin']['database'] = 'Database';
$lang['admin']['databaseprefix'] = 'Databaseprefix';
$lang['admin']['databasetype'] = 'Databasetype';
$lang['admin']['date'] = 'Dato';
$lang['admin']['default'] = 'Standard';
$lang['admin']['delete'] = 'Slet';
$lang['admin']['deleteconfirm'] = 'Er du sikker p&aring; du vil slette?';
$lang['admin']['deleteassociationconfirm'] = 'Er du sikker p&aring; du vil slette associationen til - %s - ?';
$lang['admin']['deletecss'] = 'Slet CSS';
$lang['admin']['dependencies'] = 'Afh&aelig;ngigheder';
$lang['admin']['description'] = 'Beskrivelse';
$lang['admin']['directoryexists'] = 'Mappen eksisterer allerede';
$lang['admin']['down'] = 'Ned';
$lang['admin']['edit'] = 'Redig&eacute;r';
$lang['admin']['editconfiguration'] = 'Redig&eacute;r ops&aelig;tning';
$lang['admin']['editcontent'] = 'Redig&eacute;r indhold';
$lang['admin']['editcss'] = 'Redig&eacute;r CSS';
$lang['admin']['editcsssuccess'] = 'CSS opdateret';
$lang['admin']['editgroup'] = 'Redig&eacute;r gruppe';
$lang['admin']['editpage'] = 'Redig&eacute;r side';
$lang['admin']['edittemplate'] = 'Redig&eacute;r sideskabelon';
$lang['admin']['edittemplatesuccess'] = 'Skabelon opdateret';
$lang['admin']['edituser'] = 'Redig&eacute;r bruger';
$lang['admin']['editusertag'] = 'Redig&eacute;r brugerdefineret tag';
$lang['admin']['usertagadded'] = 'Den brugerdefinerede tag blev tilf&oslash;jet.';
$lang['admin']['usertagupdated'] = 'Den brugerdefinerede tag blev opdateret.';
$lang['admin']['usertagdeleted'] = 'Den brugerdefinerede tag blev fjernet.';
$lang['admin']['email'] = 'E-mail-adresse';
$lang['admin']['errorattempteddowngrade'] = 'Installation af dette module ville resultere i en tidligere version. Handlingen blev afbrudt';
$lang['admin']['errorchildcontent'] = 'Det valgte indeholder stadig underkategorier. Slet venligst dem f&oslash;rst';
$lang['admin']['errorcopyingtemplate'] = 'Kunne ikke kopiere sideskabelon';
$lang['admin']['errorcouldnotparsexml'] = 'Fejl ved l&aelig;sning af XML-fil';
$lang['admin']['errorcreatingassociation'] = 'Kunne ikke oprette reference';
$lang['admin']['errorcssinuse'] = 'Dette stylesheet benyttes stadigv&aelig;k af en skabelon. Fjern venligst de referencer f&oslash;rst.';
$lang['admin']['errordefaultpage'] = 'Kan ikke slette den nuv&aelig;rende standardside. V&aelig;lg en anden f&oslash;rst.';
$lang['admin']['errordeletingassociation'] = 'Kan ikke fjerne reference';
$lang['admin']['errordeletingcss'] = 'Kan ikke slette CSS-skabelon';
$lang['admin']['errordeletingdirectory'] = 'Kan ikke slette mappe. Tilladelsesproblem?';
$lang['admin']['errordeletingfile'] = 'Kunne ikke slette filen. Tilladelsesproblem?';
$lang['admin']['errordirectorynotwritable'] = 'Ingen skrivetilladels til dette bibliotek';
$lang['admin']['errordtdmismatch'] = 'DTD version mangler eller er inkompatibel i XML-filen';
$lang['admin']['errorgettingcssname'] = 'Kunne ikke hente CSS-navn';
$lang['admin']['errorgettingtemplatename'] = 'Fejl - kunne ikke hente navnet p&aring; sideskabelonen';
$lang['admin']['errorincompletexml'] = 'XML Filen er ugyldig eller ikke komplet';
$lang['admin']['uploadxmlfile'] = 'Install&eacute;r modulet fra XML-fil';
$lang['admin']['cachenotwritable'] = 'Cache mappen er skrivebeskyttet. Nulstilling af cache&#039;n vil ikke virke. S&oslash;rg venligst for at der er fulde skriverettigheder til mappen tmp/cache (chmod 777)';
$lang['admin']['error_nomodules'] = 'No modules installed! Check Extentions > Modules';
$lang['admin']['modulesnotwritable'] = 'Modul-folderen (/modules) er skrivebeskyttet, hvis du &oslash;nsker at installere moduler ved at upload&#039;e en XML fil skal der gives fulde skriverettigheder til denne (read/write/execute), f.eks. med chmod 777 gennem ftp.';
$lang['admin']['noxmlfileuploaded'] = 'Ingen filer blev upload&#039;et. For at installere et modul via XML skal du v&aelig;lge og upload&#039;e en xml-fil med modulet fra din computer.';
$lang['admin']['errorinsertingcss'] = 'Fejl under inds&aelig;ttelse af CSS';
$lang['admin']['errorinsertinggroup'] = 'Fejl under inds&aelig;ttelse af gruppe';
$lang['admin']['errorinsertingtag'] = 'Fejl under inds&aelig;ttelse af brugerdefineret tag';
$lang['admin']['errorinsertingtemplate'] = 'Fejl under inds&aelig;ttelse af sideskabelon';
$lang['admin']['errorinsertinguser'] = 'Fejl under oprettelse af bruger';
$lang['admin']['errornofilesexported'] = 'Fejl ved eksportering af filer til xml';
$lang['admin']['errorretrievingcss'] = 'Fejl under hentning af CSS';
$lang['admin']['errorretrievingtemplate'] = 'Fejl under hentning af sideskabelon';
$lang['admin']['errortemplateinuse'] = 'Denne sideskabelon er stadig i brug p&aring; en side, v&aelig;lg en anden og pr&oslash;v at slette igen.';
$lang['admin']['errorupdatingcss'] = 'Fejl under opdatering af CSS';
$lang['admin']['errorupdatinggroup'] = 'Fejl under opdatering af gruppe';
$lang['admin']['errorupdatingpages'] = 'Fejl ved opdatering af sider';
$lang['admin']['errorupdatingtemplate'] = 'Fejl under opdatering af sideskabelon';
$lang['admin']['errorupdatinguser'] = 'Fejl under opdatering af bruger';
$lang['admin']['errorupdatingusertag'] = 'Fejl under opdatering af brugerdefineret tag';
$lang['admin']['erroruserinuse'] = 'Denne bruger har stadig ansvaret for nogle sider. Giv ansvaret til en anden bruger f&oslash;r du sletter.';
$lang['admin']['eventhandlers'] = 'H&aelig;ndelses H&aring;ndtering';
$lang['admin']['eventhandler'] = 'Event Handlers';
$lang['admin']['editeventhandler'] = 'Ret h&aelig;ndelses-handler';
$lang['admin']['eventhandlerdescription'] = 'Associ&eacute;r bruger-tags med h&aelig;ndelser';
$lang['admin']['export'] = 'Eksport&eacute;r';
$lang['admin']['event'] = 'Begivenhed';
$lang['admin']['false'] = 'Falsk';
$lang['admin']['settrue'] = 'Set til sand';
$lang['admin']['filecreatedirnodoubledot'] = 'Mappen kan ikke indeholde &#039;..&#039;.';
$lang['admin']['filecreatedirnoname'] = 'Kan ikke oprette en mappe uden navn.';
$lang['admin']['filecreatedirnoslash'] = 'Mappen m&aring; ikke indeholde &#039;/&#039; or &#039;\&#039;.';
$lang['admin']['filemanagement'] = 'Filh&aring;ndtering';
$lang['admin']['filename'] = 'Filnavn';
$lang['admin']['filenotuploaded'] = 'Filen kunne ikke uploades til nettet. Filrettighederne forkerte?';
$lang['admin']['filesize'] = 'Filst&oslash;rrelse';
$lang['admin']['firstname'] = 'Fornavn';
$lang['admin']['groupmanagement'] = 'Gruppeh&aring;ndtering';
$lang['admin']['grouppermissions'] = 'Gruppe tilladelser';
$lang['admin']['handler'] = 'Handler (brugerdefineret tag)';
$lang['admin']['headtags'] = 'Head-tags';
$lang['admin']['help'] = 'Hj&aelig;lp';
$lang['admin']['new_window'] = 'nyt vindue';
$lang['admin']['helpwithsection'] = '%s hj&aelig;lp';
$lang['admin']['helpaddtemplate'] = '<p>En sideskabelon styrer din sides udseende</p><p>Opret en skabelon her, og tilf&oslash;j dine stylesheets til den for at kontrollere dit layout i alle detaljer.</p>';
$lang['admin']['helplisttemplate'] = '<p>Her kan du oprette, &aelig;ndre eller slette sideskabeloner</p><p>For at oprette en ny sideskabelon, klik p&aring; <u>Tilf&oslash;j ny skabelon</u>-knappen.</p><p>Hvis du vil have at alle indholdssider skal benytte den samme skabelon, s&aring; klik p&aring; <u>S&aelig;t til alle sider</u>-linker.</p><p>Hvis vil vil lave en kopi af en skabelon, klik p&aring; <u>Kopi</u>-ikonet og du vil blive bedt om et navn til den nye kopi.</p>';
$lang['admin']['home'] = 'Forside';
$lang['admin']['homepage'] = 'Homepage';
$lang['admin']['hostname'] = 'V&aelig;rtsnavn';
$lang['admin']['idnotvalid'] = 'Det angivne ID er ikke gyldigt';
$lang['admin']['imagemanagement'] = 'Billed h&aring;ndtering';
$lang['admin']['informationmissing'] = 'Mangler information';
$lang['admin']['install'] = 'Install&eacute;r';
$lang['admin']['invalidcode'] = 'Forkert kode';
$lang['admin']['illegalcharacters'] = 'Ugyldige karakterer i feltet %s.';
$lang['admin']['invalidcode_brace_missing'] = 'Ulige antal af parenteser';
$lang['admin']['invalidtemplate'] = 'Sideskabelonen er ikke gyldig';
$lang['admin']['itemid'] = 'Objekt ID';
$lang['admin']['itemname'] = 'Objekt name';
$lang['admin']['language'] = 'Sprog';
$lang['admin']['lastname'] = 'Efternavn';
$lang['admin']['logout'] = 'Log ud';
$lang['admin']['loginprompt'] = 'Indtast gyldige brugeroplysninger for at f&aring; adgang til Administrations Panelet';
$lang['admin']['logintitle'] = 'CMS Made Simple Administrations Login';
$lang['admin']['menutext'] = 'Menutekst';
$lang['admin']['missingparams'] = 'Nogle parametre er ugyldige eller mangler';
$lang['admin']['modifygroupassignments'] = 'Rediger gruppe-tildelinger';
$lang['admin']['moduleabout'] = 'Om %s-modulet';
$lang['admin']['modulehelp'] = 'Hj&aelig;lp til %s-modulet';
$lang['admin']['msg_defaultcontent'] = 'Tilf&oslash;j kode her som skal dukke op om standardindholdet for alle nye sider';
$lang['admin']['msg_defaultmetadata'] = 'Tilf&oslash;j kode her som skal dukke op i metadata sektionen for alle nye sider';
$lang['admin']['wikihelp'] = 'Hj&aelig;lp i Wiki';
$lang['admin']['moduleinstalled'] = 'Modul allerede installeret';
$lang['admin']['moduleinterface'] = '%s gr&aelig;nseflade';
$lang['admin']['modules'] = 'Moduler';
$lang['admin']['move'] = 'Flyt';
$lang['admin']['name'] = 'Navn';
$lang['admin']['needpermissionto'] = 'Du skal bruge rettigheden &#039;%s&#039; for at udf&oslash;re den funktion';
$lang['admin']['needupgrade'] = 'Skal opgraderes';
$lang['admin']['newtemplatename'] = 'Nyt sideskabelon-navn';
$lang['admin']['next'] = 'N&aelig;ste';
$lang['admin']['noaccessto'] = 'Ingen adgang til %s';
$lang['admin']['nocss'] = 'Ingen CSS';
$lang['admin']['noentries'] = 'Ingen tilf&oslash;jelser';
$lang['admin']['nofieldgiven'] = 'Ingen %s indtastet!';
$lang['admin']['nofiles'] = 'Ingen filer';
$lang['admin']['nopasswordmatch'] = 'Kodeordene passer ikke sammen';
$lang['admin']['norealdirectory'] = 'Ingen rigtig mappe tilf&oslash;jet';
$lang['admin']['norealfile'] = 'Ingen rigtig fil angivet';
$lang['admin']['notinstalled'] = 'Ikke installeret';
$lang['admin']['overwritemodule'] = 'Overskriv eksisterende moduler';
$lang['admin']['owner'] = 'Ejer';
$lang['admin']['pagealias'] = 'Sidealias';
$lang['admin']['content_id'] = 'Content ID';
$lang['admin']['pagedefaults'] = 'Standard side indstillinger';
$lang['admin']['pagedefaultsdescription'] = 'S&aelig;t standard indstillinger for nye sider';
$lang['admin']['parent'] = 'Overliggende side';
$lang['admin']['password'] = 'Kodeord';
$lang['admin']['passwordagain'] = 'Kodeord (igen)';
$lang['admin']['permission'] = 'Rettighed';
$lang['admin']['permissions'] = 'Rettigheder';
$lang['admin']['permissionschanged'] = 'Tilladelser blev opdateret.';
$lang['admin']['pluginabout'] = 'Om %s tag&#039;en';
$lang['admin']['pluginhelp'] = 'Hj&aelig;lp til %s tag\&#039;en';
$lang['admin']['pluginmanagement'] = 'Plugin-ops&aelig;tning';
$lang['admin']['prefsupdated'] = 'Indstillinger blev opdateret.';
$lang['admin']['accountupdated'] = 'User account has been updated.';
$lang['admin']['preview'] = 'Se';
$lang['admin']['previewdescription'] = 'Forh&aring;ndsvis &aelig;ndringer';
$lang['admin']['previous'] = 'Forrige';
$lang['admin']['remove'] = 'Fjern';
$lang['admin']['removeconfirm'] = 'Dette vil fjerne filerne modulet best&aring;r af permanent fra dette installation af CMSms.\nEr du sikker p&aring; du vil forts&aelig;tte?';
$lang['admin']['removecssassociation'] = 'Fjern CSS-reference';
$lang['admin']['saveconfig'] = 'Gem konfiguration';
$lang['admin']['send'] = 'Ok';
$lang['admin']['setallcontent'] = 'S&aelig;t til alle sider';
$lang['admin']['setallcontentconfirm'] = 'Er du sikker p&aring;, du vil have alle sider til at bruge denne sideskabelon?';
$lang['admin']['showinmenu'] = 'Vis i menu';
$lang['admin']['use_name'] = 'Vis sidens titel i stedet for sidens menutekst i dropdown for overliggende side.';
$lang['admin']['showsite'] = 'Vis webside';
$lang['admin']['sitedownmessage'] = 'Siden virker ikke-besked';
$lang['admin']['siteprefs'] = 'Side indstillinger';
$lang['admin']['status'] = 'Status';
$lang['admin']['stylesheet'] = 'Typografiark';
$lang['admin']['submit'] = 'Send';
$lang['admin']['submitdescription'] = 'Gem &aelig;ndringer';
$lang['admin']['tags'] = 'Tags (koder)';
$lang['admin']['template'] = 'Sideskabelon';
$lang['admin']['templateexists'] = 'Navnet p&aring; sideskabelonen eksisterer allerede';
$lang['admin']['templatemanagement'] = 'Sideskabelon-ops&aelig;tning';
$lang['admin']['title'] = 'Titel';
$lang['admin']['tools'] = 'V&aelig;rkt&oslash;jer';
$lang['admin']['true'] = 'Sand';
$lang['admin']['setfalse'] = 'S&aelig;t til falsk';
$lang['admin']['type'] = 'Type';
$lang['admin']['typenotvalid'] = 'Typen er ikke gyldig';
$lang['admin']['uninstall'] = 'Afinstall&eacute;r';
$lang['admin']['uninstallconfirm'] = 'Er du sikker p&aring; du vil afinstallere?';
$lang['admin']['up'] = 'Op';
$lang['admin']['upgrade'] = 'Opgrad&eacute;r';
$lang['admin']['upgradeconfirm'] = 'Vil du opgradere denne?';
$lang['admin']['uploadfile'] = 'Upload fil';
$lang['admin']['url'] = 'URL';
$lang['admin']['useadvancedcss'] = 'Brug avanceret CSS-ops&aelig;tning';
$lang['admin']['user'] = 'Bruger';
$lang['admin']['userdefinedtags'] = 'Brugerdefinerede Tags';
$lang['admin']['usermanagement'] = 'Bruger-ops&aelig;tning';
$lang['admin']['username'] = 'Brugernavn';
$lang['admin']['usernameincorrect'] = 'Brugernavn eller password ikke korrekt';
$lang['admin']['userprefs'] = 'Bruger indstillinger';
$lang['admin']['useraccount'] = 'User Account';
$lang['admin']['lang_settings_legend'] = 'Language related settings';
$lang['admin']['content_editor_legend'] = 'Content editor settings';
$lang['admin']['admin_layout_legend'] = 'Admin lay-out settings';
$lang['admin']['usersassignedtogroup'] = 'Brugere tildelt til gruppen %s';
$lang['admin']['usertagexists'] = 'Et tag med dette navn eksisterer allerede. V&aelig;lg venligst en anden.';
$lang['admin']['usewysiwyg'] = 'Brug grafisk redigering af indhold';
$lang['admin']['version'] = 'Version';
$lang['admin']['view'] = 'Se';
$lang['admin']['welcomemsg'] = 'Velkommen %s';
$lang['admin']['directoryabove'] = 'mappe over nuv&aelig;rende niveau';
$lang['admin']['nodefault'] = 'Intet standardvalg';
$lang['admin']['blobexists'] = 'Navnet p&aring; den globale indholdsblok findes allerede';
$lang['admin']['blobmanagement'] = 'Ops&aelig;tning af globale indholdsblokke';
$lang['admin']['errorinsertingblob'] = 'Fejl under inds&aelig;ttelse af global indholdsblok';
$lang['admin']['addhtmlblob'] = 'Tilf&oslash;j Global indholdsblok';
$lang['admin']['edithtmlblob'] = 'Redig&eacute;r Global indholdsblok';
$lang['admin']['edithtmlblobsuccess'] = 'Global indholdsblok blev opdateret';
$lang['admin']['tagtousegcb'] = 'Tag der skal inds&aelig;ttes for at vise denne blok';
$lang['admin']['gcb_wysiwyg'] = 'Sl&aring; WYSIWYG til for GCB ';
$lang['admin']['gcb_wysiwyg_help'] = 'Sl&aring;r WYSIWYG-editoren til ved redigering af globale indholdsblokke';
$lang['admin']['filemanager'] = 'Filh&aring;ndtering';
$lang['admin']['imagemanager'] = 'Billedh&aring;ndtering';
$lang['admin']['encoding'] = 'Kodning';
$lang['admin']['clearcache'] = 'Nulstil Cache';
$lang['admin']['clear'] = 'Nulstil';
$lang['admin']['cachecleared'] = 'Cache nulstillet';
$lang['admin']['apply'] = 'Aktiv&eacute;r';
$lang['admin']['applydescription'] = 'Gem &aelig;ndringer og forts&aelig;t redigering';
$lang['admin']['none'] = 'Ingen';
$lang['admin']['wysiwygtouse'] = 'V&aelig;lg hvilket WYSIWYG-system der skal bruges';
$lang['admin']['syntaxhighlightertouse'] = 'V&aelig;lg hvilken syntaks fremh&aelig;ver der skal bruges';
$lang['admin']['hasdependents'] = 'Andre moduler er afh&aelig;ngige af dette modul';
$lang['admin']['missingdependency'] = 'Mangler modul';
$lang['admin']['minimumversion'] = 'Mindste Version';
$lang['admin']['minimumversionrequired'] = 'Tidligste CMSMS Version der p&aring;kr&aelig;ves';
$lang['admin']['maximumversion'] = 'Nyeste version';
$lang['admin']['maximumversionsupported'] = 'Nyeste CMSMS Version underst&oslash;ttet';
$lang['admin']['depsformodule'] = 'Modulet %s er afh&aelig;ngigt af';
$lang['admin']['installed'] = 'Installeret';
$lang['admin']['author'] = 'Lavet af';
$lang['admin']['changehistory'] = 'Historik over &aelig;ndringer';
$lang['admin']['moduleerrormessage'] = 'Fejlbesked for %s-modulet';
$lang['admin']['moduleupgradeerror'] = 'Der opstod en fejl under opgraderingen af modulet';
$lang['admin']['moduleinstallmessage'] = 'Installations-besked for %s modulet';
$lang['admin']['moduleuninstallmessage'] = 'Afinstallations-besked for modulet %s';
$lang['admin']['admintheme'] = 'Administrations tema';
$lang['admin']['addstylesheet'] = 'Tilf&oslash;j et typografiark';
$lang['admin']['editstylesheet'] = 'Redig&eacute;r typografiark';
$lang['admin']['addcssassociation'] = 'Tilf&oslash;j typografiark-tilknytning';
$lang['admin']['attachstylesheet'] = 'Tilknyt dette typografiark';
$lang['admin']['attachtemplate'] = 'Forbind til denne skabelon';
$lang['admin']['main'] = 'Start';
$lang['admin']['pages'] = 'Sider';
$lang['admin']['page'] = 'Page';
$lang['admin']['files'] = 'Filer';
$lang['admin']['layout'] = 'Layout';
$lang['admin']['usersgroups'] = 'Brugere/Grupper';
$lang['admin']['extensions'] = 'Udvidelser';
$lang['admin']['preferences'] = 'Indstillinger';
$lang['admin']['admin'] = 'Side Administration';
$lang['admin']['viewsite'] = 'Vis siden';
$lang['admin']['templatecss'] = 'Tilknyt skabeloner til typografiark';
$lang['admin']['plugins'] = 'Udvidelser';
$lang['admin']['movecontent'] = 'Flyt sider';
$lang['admin']['module'] = 'Modul';
$lang['admin']['usertags'] = 'Brugerdefinerede tags';
$lang['admin']['htmlblobs'] = 'Globale indholdsblokke';
$lang['admin']['adminhome'] = 'Administration Hjem';
$lang['admin']['liststylesheets'] = 'Typografiark';
$lang['admin']['preferencesdescription'] = 'Her angiver du diverse indstillinger for hele hjemmesiden.';
$lang['admin']['adminlogdescription'] = 'Viser en log over, hvem der gjorde hvad i administrationen.';
$lang['admin']['mainmenu'] = 'Hovedmenu';
$lang['admin']['users'] = 'Brugere';
$lang['admin']['usersdescription'] = 'Her administreres brugere.';
$lang['admin']['groups'] = 'Grupper';
$lang['admin']['groupsdescription'] = 'Her administreres grupper.';
$lang['admin']['groupassignments'] = 'Gruppe-tilknytning';
$lang['admin']['groupassignmentdescription'] = 'Her kan du tilknytte brugere til grupper.';
$lang['admin']['groupperms'] = 'Gruppetilladelser';
$lang['admin']['grouppermsdescription'] = 'S&aelig;t tilladelser og adgangsniveau for grupper';
$lang['admin']['pagesdescription'] = 'Her tilf&oslash;jer og redigerer man sider og andet indhold.';
$lang['admin']['htmlblobdescription'] = 'Globale indholdsblokke er sm&aring; stumper indhold du kan placere i dine sider eller skabeloner.';
$lang['admin']['templates'] = 'Skabeloner';
$lang['admin']['templatesdescription'] = 'Her tilf&oslash;jer eller redigerer vi skabeloner. Skabeloner angiver hvordan dit site ser ud og virker.';
$lang['admin']['stylesheets'] = 'Typografiark';
$lang['admin']['stylesheetsdescription'] = 'Typografiark-h&aring;ndtering er en avanceret m&aring;de, hvorp&aring; man kan arbejde med typografiark uafh&aelig;ngigt af skabeloner.';
$lang['admin']['filemanagerdescription'] = 'Upload og h&aring;ndt&eacute;r filer.';
$lang['admin']['imagemanagerdescription'] = 'Upload/redig&eacute;r og slet billeder.';
$lang['admin']['moduledescription'] = 'Moduler udvider CMS Made Simple med forskellige former for funktionalitet.';
$lang['admin']['tagdescription'] = 'Tags er sm&aring; stumper funktionalitet som kan tilf&oslash;jes dine sider og/eller skabeloner.';
$lang['admin']['usertagdescription'] = 'Tags som du kan oprette og redigere selv til at udf&oslash;re forskellige opgaver, direkte i din browser.';
$lang['admin']['installdirwarning'] = '<em><strong>Advarsel:</strong></em> install folderen eksisterer stadig. Fjern den helst helt.';
$lang['admin']['subitems'] = 'Undermenuer';
$lang['admin']['extensionsdescription'] = 'Moduler, tags, og andet sjov.';
$lang['admin']['usersgroupsdescription'] = 'Bruger- og gruppe-relaterede ting.';
$lang['admin']['layoutdescription'] = 'Side layout indstillinger.';
$lang['admin']['admindescription'] = 'Side Administration funktioner.';
$lang['admin']['contentdescription'] = 'Her tilf&oslash;jer og redigerer vi indhold.';
$lang['admin']['enablecustom404'] = 'Tillad brugerdefineret &quot;404&quot;-besked';
$lang['admin']['enablesitedown'] = 'Sl&aring; &quot;Siden er nede&quot;-besked til';
$lang['admin']['enablewysiwyg'] = 'Brug WYSIWYG til Site Down Besked';
$lang['admin']['bookmarks'] = 'Bogm&aelig;rker';
$lang['admin']['user_created'] = 'Bruger oprettet';
$lang['admin']['forums'] = 'Forum';
$lang['admin']['wiki'] = 'Wiki';
$lang['admin']['irc'] = 'IRC';
$lang['admin']['team'] = 'Team';
$lang['admin']['module_help'] = 'Modul-hj&aelig;lp';
$lang['admin']['managebookmarks'] = 'H&aring;ndt&eacute;r bogm&aelig;rker';
$lang['admin']['editbookmark'] = 'Redig&eacute;r bogm&aelig;rke';
$lang['admin']['addbookmark'] = 'Tilf&oslash;j bogm&aelig;rke';
$lang['admin']['recentpages'] = 'Nyligt viste sider';
$lang['admin']['groupname'] = 'Gruppe navn';
$lang['admin']['selectgroup'] = 'V&aelig;lg gruppe';
$lang['admin']['updateperm'] = 'Opdat&eacute;r tilladelser';
$lang['admin']['admincallout'] = 'Genveje til administration';
$lang['admin']['showbookmarks'] = 'Vis admin bogm&aelig;rker';
$lang['admin']['hide_help_links'] = 'Skjul hj&aelig;lpelinks';
$lang['admin']['hide_help_links_help'] = 'S&aelig;t kryds i denne kasse for at sl&aring; links til wiki og modulhj&aelig;lp fra i sidehovederne';
$lang['admin']['showrecent'] = 'Vis nyligt bes&oslash;gte sider';
$lang['admin']['attachtotemplate'] = 'Tilknyt typografiark til skabelon';
$lang['admin']['attachstylesheets'] = 'Tilknyt typografiark';
$lang['admin']['indent'] = 'Vis indrykning af sidelisten for at fremh&aelig;ve hierakiet';
$lang['admin']['adminindent'] = 'Vis indhold';
$lang['admin']['contract'] = 'Skjul undersektion';
$lang['admin']['expand'] = 'Vis sektion';
$lang['admin']['expandall'] = 'Vis alle undersektioner';
$lang['admin']['contractall'] = 'Skjul alle undersektioner';
$lang['admin']['menu_bookmarks'] = '[+]';
$lang['admin']['globalconfig'] = 'Global konfiguration';
$lang['admin']['adminpaging'] = 'Antal sider der skal vises ad gangen';
$lang['admin']['nopaging'] = 'Vis alt';
$lang['admin']['myprefs'] = 'Mine indstillinger';
$lang['admin']['myprefsdescription'] = 'Her kan du indstille forskellige ting, der f&aring;r adminstrations-delen til at fungere p&aring; den m&aring;de du &oslash;nsker.';
$lang['admin']['myaccount'] = 'Min konto';
$lang['admin']['myaccountdescription'] = 'Her kan du opdatere din personlige konto.';
$lang['admin']['adminprefs'] = 'Brugerindstillinger';
$lang['admin']['adminprefsdescription'] = 'Her kan du ops&aelig;tte dine specifikke indstillinger for administrationen.';
$lang['admin']['managebookmarksdescription'] = 'Her kan du konfigurere dine bogm&aelig;rker i administrationen.';
$lang['admin']['options'] = 'Indstillinger';
$lang['admin']['langparam'] = 'Parametret angiver hvilket sprog der skal bruges til visning for bes&oslash;gende. Ikke alle moduler underst&oslash;tter eller beh&oslash;ver dette.';
$lang['admin']['parameters'] = 'Parametre';
$lang['admin']['mediatype'] = 'Medietype';
$lang['admin']['mediatype_'] = 'Intet sat: vil have indflydelse overalt';
$lang['admin']['mediatype_all'] = 'alle: passer til alle typer udstyr';
$lang['admin']['mediatype_aural'] = 'aural: passer til tekst til tale-udstyr';
$lang['admin']['mediatype_braille'] = 'braille: passer til braille-udstyr';
$lang['admin']['mediatype_embossed'] = 'embossed: passer til braille printere';
$lang['admin']['mediatype_handheld'] = 'handheld: passer til h&aring;ndholdt udstyr';
$lang['admin']['mediatype_print'] = 'print: passer til ikke-gennemsigtigt materiale og dokumenter der vises p&aring; sk&aelig;rmen i print preview tilstand.';
$lang['admin']['mediatype_projection'] = 'projection: passer til presentationer der skal projekteret, for eksempel overheads';
$lang['admin']['mediatype_screen'] = 'screen: passer til almindelige computer farve-sk&aelig;rme';
$lang['admin']['mediatype_tty'] = 'tty: passer til terminal udstyr';
$lang['admin']['mediatype_speech'] = 'speech : Intended for speech synthesizers.';
$lang['admin']['mediatype_tv'] = 'tv: passer til tv-agtigt udstyr';
$lang['admin']['assignmentchanged'] = 'Gruppetildelinger opdateret.';
$lang['admin']['stylesheetexists'] = 'Typografiark eksisterer allerede';
$lang['admin']['errorcopyingstylesheet'] = 'Fejl ved kopiering af typografiark';
$lang['admin']['copystylesheet'] = 'Kopi&eacute;r typografiark';
$lang['admin']['newstylesheetname'] = 'Navn p&aring; det nye typografiark';
$lang['admin']['target'] = 'M&aring;l';
$lang['admin']['xml'] = 'XML';
$lang['admin']['xmlmodulerepository'] = 'URL til ModuleRepository soap server';
$lang['admin']['metadata'] = 'Metadata';
$lang['admin']['globalmetadata'] = 'Globale Metadata';
$lang['admin']['titleattribute'] = 'Beskrivelse (egenskab i title-tag&#039;et)';
$lang['admin']['tabindex'] = 'Tab Indeks';
$lang['admin']['accesskey'] = 'Genvejstast';
$lang['admin']['sitedownwarning'] = '<strong>Advarsel:</strong>Dit site viser lige nu en &quot;Hjemmesiden er nede pga. vedligeholdelse&quot;-besked. Slet filen %s for at &aelig;ndre dette.';
$lang['admin']['deletecontent'] = 'Slet indhold';
$lang['admin']['deletepages'] = 'Slet disse sider?';
$lang['admin']['selectall'] = '(V&aelig;lg alle)';
$lang['admin']['selecteditems'] = 'Valgte dele';
$lang['admin']['inactive'] = 'Inaktiv';
$lang['admin']['deletetemplates'] = 'Slet skabeloner';
$lang['admin']['templatestodelete'] = 'Disse skabeloner vil blive slettet';
$lang['admin']['wontdeletetemplateinuse'] = 'Disse skabeloner er i brug og vil ikke blive slettet';
$lang['admin']['deletetemplate'] = 'Slet typografiark';
$lang['admin']['stylesheetstodelete'] = 'Disse typografiark vil blive slettet';
$lang['admin']['sitename'] = 'Hjemmesidens navn';
$lang['admin']['goto'] = 'Back to:';
$lang['admin']['siteadmin'] = 'Administration af hjemmeside';
$lang['admin']['images'] = 'Billedh&aring;ndtering';
$lang['admin']['blobs'] = 'Globale indholdsblokke';
$lang['admin']['groupmembers'] = 'Gruppetilknytninger';
$lang['admin']['troubleshooting'] = '(Fejlfinding)';
$lang['admin']['event_desc_loginpost'] = 'Sendes efter en bruger logger ind i administrationen';
$lang['admin']['event_desc_logoutpost'] = 'Sendt efter en bruger logger ud af administrationen';
$lang['admin']['event_desc_adduserpre'] = 'Sendes f&oslash;r en ny bruger oprettes';
$lang['admin']['event_desc_adduserpost'] = 'Sendes efter en ny bruger oprettes';
$lang['admin']['event_desc_edituserpre'] = 'Sendes f&oslash;r rettelser til en bruger gemmes';
$lang['admin']['event_desc_edituserpost'] = 'Sendes efter rettelser til en bruger gemmes';
$lang['admin']['event_desc_deleteuserpre'] = 'Sendes f&oslash;r en bruger slettes fra systemet';
$lang['admin']['event_desc_deleteuserpost'] = 'Sendes efter en bruger er slettet fra systemet';
$lang['admin']['event_desc_addgrouppre'] = 'Sendes f&oslash;r en ny gruppe oprettes';
$lang['admin']['event_desc_addgrouppost'] = 'Sendes efter en ny gruppe er oprettet';
$lang['admin']['event_desc_changegroupassignpre'] = 'Sendes f&oslash;r gruppetilh&oslash;rsforhold gemmes';
$lang['admin']['event_desc_changegroupassignpost'] = 'Sendes efter gruppetilh&oslash;rsforhold gemmes';
$lang['admin']['event_desc_editgrouppre'] = 'Sendes f&oslash;r rettelser til en gruppe gemmes';
$lang['admin']['event_desc_editgrouppost'] = 'Sendes efter rettelser til en gruppe er gemt';
$lang['admin']['event_desc_deletegrouppre'] = 'Sendes f&oslash;r en gruppe slettes fra systemet';
$lang['admin']['event_desc_deletegrouppost'] = 'Sendes efter en gruppe er blevet slettes fra systemet';
$lang['admin']['event_desc_addstylesheetpre'] = 'Sendt f&oslash;r et nyt stylesheet er oprettet';
$lang['admin']['event_desc_addstylesheetpost'] = 'Sent efter et nyt stylesheet er oprettet';
$lang['admin']['event_desc_editstylesheetpre'] = 'Sendt f&oslash;r &aelig;ndringer til et stylesheet er gemt';
$lang['admin']['event_desc_editstylesheetpost'] = 'Sendt efter &aelig;ndringer til et stylesheet er gemt';
$lang['admin']['event_desc_deletestylesheetpre'] = 'Sendt f&oslash;r et stylesheet er slettet';
$lang['admin']['event_desc_deletestylesheetpost'] = 'Sendt efter et stylesheet er slettet';
$lang['admin']['event_desc_addtemplatepre'] = 'Sendt f&oslash;r en ny template er oprettet';
$lang['admin']['event_desc_addtemplatepost'] = 'Sendt efter en ny template er oprettet';
$lang['admin']['event_desc_edittemplatepre'] = 'Sendt f&oslash;r &aelig;ndringer til en template er gemt';
$lang['admin']['event_desc_edittemplatepost'] = 'Sendt efter &aelig;ndringer til en template er gemt';
$lang['admin']['event_desc_deletetemplatepre'] = 'Sendt f&oslash;r en template er slettet fra systemet';
$lang['admin']['event_desc_deletetemplatepost'] = 'Sendt efter en template er slettet fra systemet';
$lang['admin']['event_desc_templateprecompile'] = 'Sendes f&oslash;r en skabelon sendes til smarty til behandling';
$lang['admin']['event_desc_templatepostcompile'] = 'Sendes efter en skabelon sendes til smarty til behandling';
$lang['admin']['event_desc_addglobalcontentpre'] = 'Sendt f&oslash;r en ny global content blok er oprettet';
$lang['admin']['event_desc_addglobalcontentpost'] = 'Sendt efter en ny global content blok er oprettet';
$lang['admin']['event_desc_editglobalcontentpre'] = 'Sendt f&oslash;r &aelig;ndringer i en ny global indholdsblok er gemt';
$lang['admin']['event_desc_editglobalcontentpost'] = 'Sendt efter &aelig;ndringer i en ny global indholdsblok er gemt';
$lang['admin']['event_desc_deleteglobalcontentpre'] = 'Sendes f&oslash;r en ny global content blok er slettet fra systemet';
$lang['admin']['event_desc_deleteglobalcontentpost'] = 'Sendes efter en ny global content blok er slettet fra systemet';
$lang['admin']['event_desc_globalcontentprecompile'] = 'Sendes f&oslash;r en global indholdsblok sendes til afvikling af smarty';
$lang['admin']['event_desc_globalcontentpostcompile'] = 'Sendes efter en global indholdsblok er blevet afviklet af smarty';
$lang['admin']['event_desc_contenteditpre'] = 'Sendes f&oslash;r &aelig;ndringer i indholdet bliver gemt';
$lang['admin']['event_desc_contenteditpost'] = 'Sendes efter &aelig;ndringer i indholdet er blevet gemt';
$lang['admin']['event_desc_contentdeletepre'] = 'Sendes f&oslash;r indhold bliver slettet fra systemet';
$lang['admin']['event_desc_contentdeletepost'] = 'Sendes efter indhold er blevet slettet fra systemet';
$lang['admin']['event_desc_contentstylesheet'] = 'Sendes f&oslash;r stypografiarket bliver sendt til browseren';
$lang['admin']['event_desc_contentprecompile'] = 'Sendes f&oslash;r indhold sendes til afvikling af smarty';
$lang['admin']['event_desc_contentpostcompile'] = 'Sendes efter indhold er blevet afviklet af smarty';
$lang['admin']['event_desc_contentpostrender'] = 'Sendes f&oslash;r den samlede html bliver sendt til browseren';
$lang['admin']['event_desc_smartyprecompile'] = 'Sendes f&oslash;r indhold som skal afvikles af smarty bliver sendt';
$lang['admin']['event_desc_smartypostcompile'] = 'Sendes n&aring;r smarty har afviklet tilsendt indhold';
$lang['admin']['event_help_loginpost'] = '<p>Sendes efter en bruger er logget ind i administrationspanelet.</p>
<h4>Parametre</h4>
<ol>
<li>&#039;user&#039; - Henviser til den ber&oslash;rte bruger.</li>
</ol>
';
$lang['admin']['event_help_logoutpost'] = '<p>Sendes efter en bruger logger ud af admin panelet.</p>
<h4>Parameters</h4>
<ol>
<li>&#039;user&#039; - Henviser til den ber&oslash;rte bruger.</li>
</ol>
';
$lang['admin']['event_help_adduserpre'] = '<p>Sendes f&oslash;r en ny bruger oprettes.</p>
<h4>Parameters</h4>
<ol>
<li>&#039;user&#039; - Henviser til den ber&oslash;rte bruger.</li>
</ol>
';
$lang['admin']['event_help_adduserpost'] = '<p>Sendes efter en ny bruger oprettes.</p>
<h4>Parameters</h4>
<ol>
<li>&#039;user&#039; - Henviser til den ber&oslash;rte bruger.</li>
</ol>
';
$lang['admin']['event_help_edituserpre'] = '<p>Sendes f&oslash;r redigering af en bruger gemmes.</p>
<h4>Parameters</h4>
<ol>
<li>&#039;user&#039; - Henviser til den ber&oslash;rte bruger.</li>
</ol>
';
$lang['admin']['event_help_edituserpost'] = '<p>Sendes efter redigering af en bruger gemmes.</p>
<h4>Parameters</h4>
<ol>
<li>&#039;user&#039; - Henviser til den ber&oslash;rte bruger.</li>
</ol>
';
$lang['admin']['event_help_deleteuserpre'] = '<p>Sendes f&oslash;r en bruger slettes fra systemet.</p>
<h4>Parameters</h4>
<ol>
<li>&#039;user&#039; - Henviser til den ber&oslash;rte bruger.</li>
</ol>
';
$lang['admin']['event_help_deleteuserpost'] = '<p>Sendes efter en bruger er slettet fra systemet.</p>
<h4>Parameters</h4>
<ol>
<li>&#039;user&#039; - Henviser til den ber&oslash;rte bruger.</li>
</ol>
';
$lang['admin']['event_help_addgrouppre'] = '<p>Sendes f&oslash;r en ny gruppe oprettes.</p>
<h4>Parameters</h4>
<ol>
<li>&#039;group&#039; - Henviser til den ber&oslash;rte gruppe.</li>
</ol>
';
$lang['admin']['event_help_addgrouppost'] = '<p>Sent after a new group is created.</p>
<h4>Parameters</h4>
<ol>
<li>&#039;group&#039; - Henviser til den ber&oslash;rte gruppe.</li>
</ol>
';
$lang['admin']['event_help_changegroupassignpre'] = '<p>Sent before group assignments are saved.</p>
<h4>Parameters></h4>
<ul>
<li>&#039;group&#039; - Reference to the group object.</li>
<li>&#039;users&#039; - Array of references to user objects belonging to the group.</li>

';
$lang['admin']['event_help_changegroupassignpost'] = '<p>Sent after group assignments are saved.</p>
<h4>Parameters></h4>
<ul>
<li>&#039;group&#039; - Reference to the affected group object.</li>
<li>&#039;users&#039; - Array of references to user objects now belonging to the affected group.</li>
';
$lang['admin']['event_help_editgrouppre'] = '<p>Sent before edits to a group are saved.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected group object.</li>
</ol>
';
$lang['admin']['event_help_editgrouppost'] = '<p>Sent after edits to a group are saved.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected group object.</li>
</ol>
';
$lang['admin']['event_help_deletegrouppre'] = '<p>Sent before a group is deleted from the system.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected group object.</li>
</ol>
';
$lang['admin']['event_help_deletegrouppost'] = '<p>Sent after a group is deleted from the system.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected group object.</li>
</ol>
';
$lang['admin']['event_help_addstylesheetpre'] = '<p>Sent before a new stylesheet is created.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected stylesheet object.</li>
</ol>
';
$lang['admin']['event_help_addstylesheetpost'] = '<p>Sent after a new stylesheet is created.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected stylesheet object.</li>
</ol>
';
$lang['admin']['event_help_editstylesheetpre'] = '<p>Sent before edits to a stylesheet are saved.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected stylesheet object.</li>
</ol>
';
$lang['admin']['event_help_editstylesheetpost'] = '<p>Sent after edits to a stylesheet are saved.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected stylesheet object.</li>
</ol>
';
$lang['admin']['event_help_deletestylesheetpre'] = '<p>Sent before a stylesheet is deleted from the system.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected stylesheet object.</li>
</ol>
';
$lang['admin']['event_help_deletestylesheetpost'] = '<p>Sent after a stylesheet is deleted from the system.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected stylesheet object.</li>
</ol>
';
$lang['admin']['event_help_addtemplatepre'] = '<p>Sent before a new template is created.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected template object.</li>
</ol>
';
$lang['admin']['event_help_addtemplatepost'] = '<p>Sent after a new template is created.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected template object.</li>
</ol>
';
$lang['admin']['event_help_edittemplatepre'] = '<p>Sent before edits to a template are saved.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected template object.</li>
</ol>
';
$lang['admin']['event_help_edittemplatepost'] = '<p>Sent after edits to a template are saved.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected template object.</li>
</ol>
';
$lang['admin']['event_help_deletetemplatepre'] = '<p>Sent before a template is deleted from the system.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected template object.</li>
</ol>
';
$lang['admin']['event_help_deletetemplatepost'] = '<p>Sent after a template is deleted from the system.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected template object.</li>
</ol>
';
$lang['admin']['event_help_templateprecompile'] = '<p>Sent before a template is sent to smarty for processing.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected template text.</li>
</ol>
';
$lang['admin']['event_help_templatepostcompile'] = '<p>Sent after a template has been processed by smarty.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected template text.</li>
</ol>
';
$lang['admin']['event_help_addglobalcontentpre'] = '<p>Sent before a new global content block is created.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected global content block object.</li>
</ol>
';
$lang['admin']['event_help_addglobalcontentpost'] = '<p>Sent after a new global content block is created.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected global content block object.</li>
</ol>
';
$lang['admin']['event_help_editglobalcontentpre'] = '<p>Sent before edits to a global content block are saved.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected global content block object.</li>
</ol>
';
$lang['admin']['event_help_editglobalcontentpost'] = '<p>Sent after edits to a global content block are saved.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected global content block object.</li>
</ol>
';
$lang['admin']['event_help_deleteglobalcontentpre'] = '<p>Sent before a global content block is deleted from the system.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected global content block object.</li>
</ol>
';
$lang['admin']['event_help_deleteglobalcontentpost'] = '<p>Sent after a global content block is deleted from the system.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected global content block object.</li>
</ol>
';
$lang['admin']['event_help_globalcontentprecompile'] = '<p>Sent before a global content block is sent to smarty for processing.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected global content block text.</li>
</ol>
';
$lang['admin']['event_help_globalcontentpostcompile'] = '<p>Sent after a global content block has been processed by smarty.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected global content block text.</li>
</ol>
';
$lang['admin']['event_help_contenteditpre'] = '<p>Sent before edits to content are saved.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected content object.</li>
</ol>
';
$lang['admin']['event_help_contenteditpost'] = '<p>Sent after edits to content are saved.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected content object.</li>
</ol>
';
$lang['admin']['event_help_contentdeletepre'] = '<p>Sent before content is deleted from the system.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected content object.</li>
</ol>
';
$lang['admin']['event_help_contentdeletepost'] = '<p>Sent after content is deleted from the system.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected content object.</li>
</ol>
';
$lang['admin']['event_help_contentstylesheet'] = '<p>Sent before the sytlesheet is sent to the browser.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected stylesheet text.</li>
</ol>
';
$lang['admin']['event_help_contentprecompile'] = '<p>Sent before content is sent to smarty for processing.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected content text.</li>
</ol>
';
$lang['admin']['event_help_contentpostcompile'] = '<p>Sent after content has been processed by smarty.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected content text.</li>
</ol>
';
$lang['admin']['event_help_contentpostrender'] = '<p>Sent before the combined html is sent to the browser.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the html text.</li>
</ol>
';
$lang['admin']['event_help_smartyprecompile'] = '<p>Sent before any content destined for smarty is sent to for processing.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected text.</li>
</ol>
';
$lang['admin']['event_help_smartypostcompile'] = '<p>Sent after any content destined for smarty has been processed.</p>
<h4>Parameters</h4>
<ol>
<li>Reference to the affected text.</li>
</ol>
';
$lang['admin']['filterbymodule'] = 'Filtr&eacute;r efter modul';
$lang['admin']['showall'] = 'Vis alle';
$lang['admin']['core'] = 'Kerne';
$lang['admin']['defaultpagecontent'] = 'Default sideindhold';
$lang['admin']['file_url'] = 'Link til fil (i stedet for URL)';
$lang['admin']['no_file_url'] = 'Ingen (Brug ovenst&aring;ende URL)';
$lang['admin']['defaultparentpage'] = 'Standard moder-side';
$lang['admin']['error_udt_name_whitespace'] = 'Fejl: Brugerdefinerede tags kan ikke have mellemrum i deres navne';
$lang['admin']['warning_safe_mode'] = '<strong><em>ADVARSEL:</em></strong> PHP Safe mode er sl&aring;et til.  Dette vanskeligg&oslash;r upload af filer via web browseren, f.eks. billeder, temaer og XML module pakker. Du anbefales at kontakte adminsitratoren for sitet for at f&aring; sl&aring;et safe mode fra.';
$lang['admin']['test'] = 'Test';
$lang['admin']['results'] = 'Resultater';
$lang['admin']['untested'] = 'Ikke testet';
$lang['admin']['unknown'] = 'Ukendt';
$lang['admin']['download'] = 'Hent';
$lang['admin']['frontendwysiwygtouse'] = 'Wysiwyg-editor for bes&oslash;gende';
$lang['admin']['backendwysiwygtouse'] = 'Default backend wysiwyg (for new user accounts)';
$lang['admin']['all_groups'] = 'Alle grupper';
$lang['admin']['error_type'] = 'Fejl type';
$lang['admin']['contenttype_errorpage'] = 'Fejl side';
$lang['admin']['errorpagealreadyinuse'] = 'Fejl kode allerede i brug';
$lang['admin']['404description'] = 'Side ikke funder';
$lang['admin']['usernotfound'] = 'Bruger ikke fundet.';
$lang['admin']['passwordchange'] = 'Angiv venligst det nye kodeord';
$lang['admin']['recoveryemailsent'] = 'En email blev sendt til den tilknyttede adresse. Kontroll&eacute;r din email for videre instruktioner';
$lang['admin']['errorsendingemail'] = 'Der skete en fejl ved fremsendelse af email. Kontakt din systemadministrator';
$lang['admin']['passwordchangedlogin'] = 'Kodeord &aelig;ndret. Log venligst ind med de nye oplysninger.';
$lang['admin']['nopasswordforrecovery'] = 'Ingen email adresse er tilknyttet den bruger. Genoprettelse af kodeord er ikke muligt. Kontakt venligst din systemadministrator.';
$lang['admin']['lostpw'] = 'Glemt dit kodeord?';
$lang['admin']['lostpwemailsubject'] = '[%s] Kodeord genoprettelse';
$lang['admin']['lostpwemail'] = 'Du modtager denne email fordi der er anmodet om at &aelig;ndre (%s) kodeordet tilknyttet denne brugerkonto (%s). Hvis du vil angive nyt kodeord for denne konto klik p&aring; nedenst&aring;ende link, eller kopi&eacute;r dette til din browser:
%s

Hvis du ikke kender noget til denne anmodning eller den er sendt ved en fejl, s&aring; ignor&eacute;r venligst denne email og intet vil blive &aelig;ndret.';
$lang['admin']['qca'] = 'P0-1354095071-1308648773305';
$lang['admin']['utma'] = '156861353.1382734326.1329528460.1329528460.1329528460.1';
$lang['admin']['utmc'] = '156861353';
$lang['admin']['utmz'] = '156861353.1329528460.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['admin']['utmb'] = '156861353';
?>