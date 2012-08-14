<?php
$lang['admin']['server_db_grants'] = 'Kontrolli andmebaasi ligip&auml;&auml;su tasemeid';
$lang['admin']['error_nograntall_found'] = 'Ei leidnud sobivat &quot;k&otilde;ikkelubavat&quot; &otilde;igust. See v&otilde;ib t&auml;hendada, et v&otilde;ib esineda probleeme moodulite paigaldamise ja eemaldamisega. V&otilde;i isegi kirjete, sealhulgas sisu, lisamise ja kustutamisega.';
$lang['admin']['msg_grantall_found'] = 'Leitud &quot;k&otilde;ikelubav&quot; kanne, mis tundub olevat sobiv';
$lang['admin']['curlversion'] = 'Curl versiooni test';
$lang['admin']['curl'] = 'Curl teegi test';
$lang['admin']['test_curl'] = 'Curl saadavuse test';
$lang['admin']['test_curlversion'] = 'Curl versiooni test';
$lang['admin']['curl_versionstr'] = 'versioon %s, minimaalne soovituslik versioon on %s';
$lang['admin']['lines_in_error'] = '%d rida veaga';
$lang['admin']['no_files_scanned'] = '&Uuml;htegi faili ei skaneeritud verifitseerimise k&auml;igus (v&otilde;ibolla on fail vigane)';
$lang['admin']['stylesheetnotfound'] = 'Stiililehte %d ei leitud';
$lang['admin']['sysmain_updateurls'] = 'Uuenda teid';
$lang['admin']['sysmain_confirmupdateurls'] = 'Oled sa kindel, et soovid v&auml;rskendada teede andmebaasi?';
$lang['admin']['text_changeowner'] = 'Sea valitud lehed teisele kasutajale';
$lang['admin']['changeowner'] = 'Muuda omanikku';
$lang['admin']['xmlreader_class'] = 'XMLReader klassi kontrollimine';
$lang['admin']['info_smarty_cacheudt'] = 'Kui on lubatud, k&otilde;ik Kasutaja Defineeritud T&auml;hise v&auml;ljakutsed on puhverdatud.  See on kasulik siltide puhul, mis n&auml;itavad andmebaasi p&auml;ringute v&auml;ljundit.  Puhverdamise saab v&auml;lja l&uuml;litada kasutades nocache parameetrit UDT v&auml;ljakutses. Nt: <code> {myusertag nocache} </code>';
$lang['admin']['prompt_smarty_cacheudt'] = 'Puhverda UDT v&auml;ljakutsed';
$lang['admin']['always'] = 'Alati';
$lang['admin']['never'] = 'Mitte kunagi';
$lang['admin']['moduledecides'] = 'Moodul otsustab';
$lang['admin']['info_smarty_cachemodules'] = 'Valige, kuidas puhverdada t&auml;hiseid erinevates mallides, mis kutsuvad mooduli toiminguid.  Kui on lubatud, k&otilde;ik mooduli v&auml;ljakutsed on puhverdatud.  See v&otilde;ib avaldada negatiivset m&otilde;ju m&otilde;nedele moodulitele v&otilde;i vormidega moodulitele. <em> (M&auml;rkus: sa v&otilde;id selle t&uuml;histada kasutades nocache valikut nagu kirjeldatud smarty manuaalis) </em>.  Kui keelatud &uuml;htegi mooduli v&auml;ljakutset ei puhverdata, mis v&otilde;ib m&otilde;ju avaldada j&otilde;udlusele.   Kui lasete moodulil otsustada, on vaikimisi puhverdamine v&auml;lja l&uuml;litatud.  Moodul v&otilde;ib selle t&uuml;histada ja puhverdamist saab v&auml;lja l&uuml;litada kasutades nocache parameeterit moodulit v&auml;lja kutsudes.';
$lang['admin']['prompt_smarty_cachemodules'] = 'Puhverda mooduli v&auml;ljakutsed';
$lang['admin']['info_smarty_compilecheck'] = 'Kui keelatud, smarty ei kontrolli mallide muutmise kuup&auml;eva, et n&auml;ha, kas neid on muudetud.  See v&otilde;ib oluliselt parandada j&otilde;udlust.  Samas igasugune malli muutus (v&otilde;i isegi m&otilde;ni sisumuutus) v&otilde;ib n&otilde;uda vahem&auml;lu puhastamist';
$lang['admin']['prompt_smarty_compilecheck'] = 'Tee komplektsuse kontrolli';
$lang['admin']['info_smarty_options'] = 'J&auml;rgmistel valikutel on m&otilde;ju ainult siis, kui eespool puhverdamise valikud on lubatud';
$lang['admin']['info_smarty_caching'] = 'Kui lubatud, erinevate lisade v&auml;ljundid on puhverdatud j&otilde;udluse suurendamiseks.  See kehtib ainult sisulehek&uuml;lgede v&auml;ljundile, mis on m&auml;rgitud puhverdatavateks ja ainult mitte-admin kasutajatele.  Pange t&auml;hele, see funktsioon v&otilde;ib segada m&otilde;ne mooduli, lisa v&otilde;i lisa, mis kasutab tekstiv&auml;liseid vorme, k&auml;itumist.';
$lang['admin']['prompt_use_smartycaching'] = 'Luba Smarty puhverdamist';
$lang['admin']['smarty_settings'] = 'Smarty seaded';
$lang['admin']['help_function_cms_init_editor'] = '<h3>What does this do?</h3>
  <p>This plugin is used to initialize the selected wysiwyg editor for display when wysiwyg functionalities are required for frontend data submission.  This module will find the selected frontend wysiwyg, determine if it has been requested, and if so generate the appropriate html code <em>(usually javascript links)</em> so that the wysiwyg will initialize properly when the page is loaded.  If no wysiwyg editors have been requested for the frontend request this plugin will produce no output.</p>
  <p><strong>Note:</strong> This plugin will work properly given the default configuration of CMSMS.  If you have modified the &amp;quot;process_whole_template&amp;quot; configuration variable from its default value, you may have to adjust the parameters supplied to this plugin.</p>
<h3>How do I use it?</h3>
<p>The first thing you must do is select the frontend WYSIWYG editor to use in the global settings page of the admin console.  Next If you use frontend wysiwyg editors on numerous pages, it may be best to place the {cms_init_editor} plugin directly into your page template.  If you only require the wysiwyg editor to be enabled on a limited amount of pages you may just place it into the &amp;quot;Page Specific Metadata&amp;quot; field in each page.</p>
<h3>What parameters does it take?</h3>
<ul>
<li><em>(optional)wysiwyg</em> - Specify the name of the wysiwyg editor module to initialize.  Use with caution.  If you have a different wysiwyg editor selected in the global settings, this will force the specified  editor to be initialized.</li>
<li><em>(optional)force=0</em> - Normally this plugin will not initialize the specified (or detected) editor if it has not been marked as &amp;quot;active&amp;quot;.  This parameter will override that behavior.  This parameter may be required of the &amp;quot;process_whole_template&amp;quot; configuration variable is set to a non default value.</li>
<li><em>(optional)assign</em> - Assign the output of the plugin to the named smarty variable.</li>
</ul>';
$lang['admin']['info_pagedefaults'] = 'See vorm v&otilde;imaldab t&auml;psustada erinevaid valikuid esialgsetele seadetele uue sisulehe loomisel. Kirjed siin lehel ei oma mingit m&otilde;ju olemasolevate lehtede muutmisel';
$lang['admin']['default_contenttype'] = 'Vaikimisi sisut&uuml;&uuml;p';
$lang['admin']['info_default_contenttype'] = 'Kohaldatakse uute sisu objektide lisamisel, see kontroll t&auml;psustab t&uuml;&uuml;bi, mis on vaikimisi valitud.  Veenduge, et valitud kirje pole &uuml;hte &quot;keelatud t&uuml;&uuml;pi&quot;.';
$lang['admin']['error_contenttype'] = 'Valitud sisut&uuml;&uuml;p ei ole &otilde;ige v&otilde;i on keelatud';
$lang['admin']['info_disallowed_contenttypes'] = 'Valige, milliseid sisut&uuml;&uuml;pe eemaldada sisut&uuml;&uuml;pide rippmen&uuml;&uuml;st sisu muutmisel v&otilde;i lisamisel.  Kasuta CTRL+Klikk kirjete valimiseks, valiku eemaldamiseks. J&auml;ttes &uuml;htegi kirjet valimata n&auml;itab, et k&otilde;ik sisut&uuml;&uuml;bid on lubatud. <em>(kehtib k&otilde;ikidele kasutajatele) </em>';
$lang['admin']['disallowed_contenttypes'] = 'Sisut&uuml;&uuml;bid, mis EI OLE lubatud';
$lang['admin']['search_module'] = 'Otsingu moodul';
$lang['admin']['info_search_module'] = 'Valige moodul, mida tuleks kasutada s&otilde;nade indekseerimiseks otsingu jaoks ja pakub kodulehel otsimise v&otilde;imalusi';
$lang['admin']['filecreatedirbadchars'] = 'Sisestatud kataloogi nimes tuvastati vigaseid t&auml;hem&auml;rke';
$lang['admin']['modulehelp_yourlang'] = 'Vaata omas keeles';
$lang['admin']['info_umask'] = '&quot;umask&quot;on kaheksand v&auml;&auml;rtus, mida kasutatakse vaikimisi &otilde;iguste m&auml;&auml;ramiseks &auml;sjaloodud failidele (seda kasutatakse cache kataloogi failide, ja &uuml;leslaetud failide puhul. Lisateabe saamiseks vaata asjakohast <a href="http://en.wikipedia.org/wiki/Umask">wikipedia artiklit.</a>';
$lang['admin']['general_operation_settings'] = '&Uuml;ldised operatsiooni seaded';
$lang['admin']['info_checkversion'] = 'Kui lubatud, teostab s&uuml;steem igap&auml;evaselt uue CMSMS reliisi kontrolli';
$lang['admin']['checkversion'] = 'Luba perioodilised uuenduste kontrollimised';
$lang['admin']['actioncontains'] = 'Tegevus sisaldab';
$lang['admin']['filterapplied'] = 'Praegune filter';
$lang['admin']['automatedtask_success'] = 'Automatiseeritud &uuml;lesanne teostatud';
$lang['admin']['siteprefsupdated'] = 'Globaalsed seaded uuendatud';
$lang['admin']['ip_addr'] = 'IP Aadress';
$lang['admin']['warn_admin_ipandcookies'] = 'Hoiatus: Admin tegevused kasutavad k&uuml;psiseid ja j&auml;lgivad su IP aadressi';
$lang['admin']['event_desc_loginfailed'] = 'Eba&otilde;nnestunud sisselogimine';
$lang['admin']['modulehelp_english'] = 'Vaata inglise keelsena';
$lang['admin']['nopluginabout'] = 'Selle lisa kohta pole lisainfot saadaval';
$lang['admin']['nopluginhelp'] = 'Selle lisa jaoks pole abi saadaval';
$lang['admin']['moduleupgraded'] = 'Uuendamine edukas';
$lang['admin']['added_css'] = 'Stiilileht lisatud';
$lang['admin']['toggle'] = 'L&uuml;lita';
$lang['admin']['added_group'] = 'Grupp lisatud';
$lang['admin']['expanded_xml'] = 'Laiendatud XML fail, mis sisaldab %s %s';
$lang['admin']['installed_mod'] = 'Paigaldatud versioon %s';
$lang['admin']['uninstalled_mod'] = 'Moodul %s eemaldatud';
$lang['admin']['upgraded_mod'] = '%s uuendatud versioonist %s versiooniks %s';
$lang['admin']['edited_gcb'] = 'Globaalne sisuplokk muudetud';
$lang['admin']['edited_content'] = 'Sisu muudetud';
$lang['admin']['added_content'] = 'Sisu lisatud';
$lang['admin']['added_css_association'] = 'Stiililehe seotud lisatud';
$lang['admin']['deleted_group'] = 'Grupp kustutatud';
$lang['admin']['deleted_content'] = 'Sisu kustutatud';
$lang['admin']['edited_user'] = 'Kasutaja muudetud';
$lang['admin']['edited_udt'] = 'Kasutaja Defineeritud T&auml;his muudetud';
$lang['admin']['content_copied'] = 'Sisukirje kopeeritud asukohta %s';
$lang['admin']['deleted_template'] = 'Mall kustutatud';
$lang['admin']['added_udt'] = 'Kasutaja Defineeritud t&auml;his lisatud';
$lang['admin']['deleted_udt'] = 'Kasutaja Defineeritud t&auml;his kustutatud';
$lang['admin']['added_gcb'] = 'Globaalne sisuplokk lisatud';
$lang['admin']['edited_group'] = 'Grupp muudetud';
$lang['admin']['deleted_css_association'] = 'Stiililehe seotus kustutatud';
$lang['admin']['user_logout'] = 'Kasutaja v&auml;lja logimine';
$lang['admin']['user_login'] = 'Kasutaja sisselogimine';
$lang['admin']['login_failed'] = 'Kasutaja sisselogimine eba&otilde;nnestus';
$lang['admin']['deleted_css'] = 'Stiilileht kustutatud';
$lang['admin']['uploaded_file'] = 'Fail &uuml;les laetud';
$lang['admin']['created_directory'] = 'Kataloog loodud';
$lang['admin']['deleted_file'] = 'Fail kustutatud';
$lang['admin']['deleted_directory'] = 'Kataloog kustutatud';
$lang['admin']['edited_template'] = 'Mall muudetud';
$lang['admin']['deleted_user'] = 'Kasutaja kustutatud';
$lang['admin']['deleted_module'] = 'J&auml;&auml;davalt eemaldatud %s';
$lang['admin']['deleted_gcb'] = 'Globaalne sisuplokk kustutatud';
$lang['admin']['added_user'] = 'Kasutaja lisatud';
$lang['admin']['edited_user_preferences'] = 'Kasutaja eelistused muudetud';
$lang['admin']['added_template'] = 'Mall lisatud';
$lang['admin']['event_desc_stylesheetpostcompile'] = 'Saadetud peale stiililehe koostamist l&auml;bi Smarty';
$lang['admin']['event_desc_stylesheetprecompile'] = 'Saadetud enne stiililehe koostamist l&auml;bi Smarty';
$lang['admin']['confirm_uploadmodule'] = 'Oled kindel, et soovid valitud XML-faili &uuml;les laadida? Vigase mooduli faili &uuml;leslaadimine v&otilde;ib l&otilde;hkuda toimiva kodulehe.';
$lang['admin']['error_module_mincmsversion'] = 'See moodul n&otilde;uab uuemat CMS Made Simple versiooni';
$lang['admin']['info_browser_cache_expiry'] = 'M&auml;&auml;ra aeg minutites kui kaua lehitsejad peaksid hoidma lehti vahem&auml;lus. Seades selle v&auml;&auml;rtuse 0 l&uuml;litab selle funktsionaalsuse v&auml;lja.';
$lang['admin']['browser_cache_expiry'] = 'Lehitseja vahem&auml;lu kehtivusaeg <em>(minutites)</em>';
$lang['admin']['info_browser_cache'] = 'Kohaldatakse &uuml;ksnes puhverdatavatele lehek&uuml;lgedele, see seade m&auml;&auml;rab, et lehitsejad tuleks lubada lehek&uuml;lgi puhverdada mingiks ajaks. Kui see on sisse l&uuml;litatud, siis korduvad kodulehe k&uuml;lastajad ei pruugi kohe n&auml;ha lehek&uuml;lgede sisu muudatusi.';
$lang['admin']['allow_browser_cache'] = 'Luba lehitsejatel lehti puhvedada';
$lang['admin']['server_cache_settings'] = 'Serveri vahem&auml;lu seaded';
$lang['admin']['browser_cache_settings'] = 'Lehitseja vahem&auml;lu seaded';
$lang['admin']['help_function_browser_lang'] = '<h3>What does this do?</h3>
  <p>This plugin detects and outputs the language that the users browser accepts, and cross references it with a list of allowed languages to determine a language value for the session.</p>
<h3>How do I use it?</h3>
<p>Insert the tag early into your page template <em>(it can go above the <head> section if you want)</em> and provide it the name of the default language, and the accepted languages (only two character language names are accepted), then do something with the result.  i.e:</p>
<pre><code>{browser_lang accepted=de,fr,en,es default=en assign=tmp}{session_put var=lang val=$tmp}</code></pre>
<p><em>({session_put} is a plugin provided by the CGSimpleSmarty module)</em></p>
<h3>What Parameters does it Take?</h3>
<ul>
<li><strong>accepted <em>(required)</em></strong><br/> - A comma separated list of two character language names that are accepted.</li>
<li>default<br/>- <em>(optional)</em> A default language to output if no accepted language was supported by the browser.  en is used if no other value is specified.</li>
<li>assign<br/>- <em>(optional)</em> The name of the smarty variable to assign the results to.  If not specified the results of this function are returned.</li>
</ul>';
$lang['admin']['info_target'] = 'Seda valikut v&otilde;ib kasutada Men&uuml;&uuml; Haldur n&auml;itamaks millal ja kuidas uued raamid v&otilde;i aknad tuleks avada. M&otilde;ned Men&uuml;&uuml; Halduri mallid v&otilde;ivad ignoreerida seda valikut.';
$lang['admin']['close'] = 'Sule';
$lang['admin']['open'] = 'Ava';
$lang['admin']['revert'] = 'T&uuml;hista k&otilde;ik muudatused';
$lang['admin']['autoclearcache2'] = 'Kustuta vahem&auml;lu failid, mis on vanemad kui antud arv p&auml;evi';
$lang['admin']['root'] = 'Juur';
$lang['admin']['info_content_autocreate_flaturls'] = 'See seab k&otilde;ik URLid samale v&auml;&auml;rtusele kui Lehe Alias. M&auml;rkus: kahte v&auml;&auml;rtust ei s&uuml;nkrooniseerita peale esimese seadmist.';
$lang['admin']['content_autocreate_flaturls'] = 'Automaatselt loodud URLid on lamedad';
$lang['admin']['content_autocreate_urls'] = 'Automaatselt loo lehe URLid';
$lang['admin']['content_mandatory_urls'] = 'Lehe URLid on kohustuslikud';
$lang['admin']['content_imagefield_path'] = 'Pildi v&auml;lja kaust';
$lang['admin']['info_content_imagefield_path'] = 'Piltide &uuml;leslaadimiste kaustaga v&otilde;rreldes, anna kataloogi nimi, mis sisaldab teed pildi v&auml;lja failide kaustani.';
$lang['admin']['content_thumbnailfield_path'] = 'Pisipildi v&auml;lja kaust';
$lang['admin']['info_content_thumbnailfield_path'] = 'Piltide &uuml;lesaadimiste kaustaga v&otilde;rreldes, anna kataloogi nimi, mis sisaldab teed pisipildi v&auml;lja failide kaustani.  Tavaliselt see on sama tee, mis &uuml;lalpool.';
$lang['admin']['contentimage_path'] = '{content_image} t&auml;hise kaust';
$lang['admin']['info_contentimage_path'] = '&Uuml;leslaadimiste kaustaga v&otilde;rreldes, anna kataloogi nimi, mis sisaldab teed {content_image} t&auml;hise failide kaustani.  Seda v&auml;&auml;rtust kasutatakse vaikimisi dir parameetrile.';
$lang['admin']['editcontent_settings'] = 'Sisu muutmise seaded';
$lang['admin']['help_page_url'] = 'T&auml;psustada alternatiivne URL (oma kodulehe juurega v&otilde;rreldes), mida saab kasutada  selle lehe unikaalseks identifitseerimiseks. st: tee/minu/lehele. Lehe URL on ainult siis kasulik, kui &quot;pretty urls&quot; on sisse l&uuml;litatud.';
$lang['admin']['help_page_alias'] = 'Aliast ​​kasutatakse alternatiivina lehe id-le lehe unikaalseks identifitseerimiseks. See peab olema unikaalne &uuml;le k&otilde;ikide lehek&uuml;lgede. Aliast ​​kasutatakse ka lehe URLi loomise abina.';
$lang['admin']['help_page_searchable'] = 'See seade n&auml;itab, kas selle lehe sisu tuleks indekseerida Otsingu mooduli poolt.';
$lang['admin']['help_page_cachable'] = 'J&otilde;udlust saab suurendada m&auml;rkides nii palju lehti kui v&otilde;imalik puhverdatavateks. Kuid seda ei saa kasutada lehek&uuml;lgede puhul, mille sisu v&otilde;ib muutuda iga p&auml;ringu puhul.';
$lang['admin']['sitedownexcludeadmins'] = 'V&auml;lista CMSMS admin paneelile sisseloginud kasutajad';
$lang['admin']['your_ipaddress'] = 'Sinu IP aadress on';
$lang['admin']['use_wysiwyg'] = 'Kasuta WYSIWYG';
$lang['admin']['contenttype_redirlink'] = 'Suunav link';
$lang['admin']['yes'] = 'Jah';
$lang['admin']['no'] = 'Ei';
$lang['admin']['listcontent_showalias'] = 'Display the &quot;Alias&quot; column';
$lang['admin']['listcontent_showurl'] = 'Display the &quot;URL&quot; column';
$lang['admin']['listcontent_showtitle'] = 'Display the Page Title or Menu Text';
$lang['admin']['listcontent_settings'] = 'Content List Settings';
$lang['admin']['lctitle_page'] = 'The title of existing content items';
$lang['admin']['lctitle_alias'] = 'The alias of existing content items. Some content items do not have aliases';
$lang['admin']['lctitle_url'] = 'The URL suffix for the content item.  If set';
$lang['admin']['lctitle_template'] = 'The selected template for the content item. Some content items do not have templates';
$lang['admin']['lctitle_owner'] = 'The owner of the content item';
$lang['admin']['lctitle_active'] = 'Indicates whether the content item is active. Inactive items cannot be displayed.';
$lang['admin']['lctitle_default'] = 'Specify the content item that is accessed when the root url is requested.  Only one item can be default';
$lang['admin']['lctitle_move'] = 'Allows arranging your content hierarchy';
$lang['admin']['lctitle_multiselect'] = 'Select all visible items / Select none';
$lang['admin']['invalid_url2'] = 'Antud lehe URL on vale.  See peaks sisaldama ainult t&auml;htnumbrilisi t&auml;hem&auml;rke, v&otilde;i - v&otilde;i /.  Laiend peab sisaldama ainult t&auml;htnumbrilisi t&auml;hem&auml;rke ja olema l&uuml;hem kui 5 t&auml;hem&auml;rki. Samuti on v&otilde;imalik, et antud URL on juba kasutusel.';
$lang['admin']['page_url'] = 'Lehe URL';
$lang['admin']['runuserplugin'] = 'K&auml;ivita kasutaja lisa';
$lang['admin']['output'] = 'V&auml;ljund';
$lang['admin']['run'] = 'K&auml;ivita';
$lang['admin']['run_udt'] = 'K&auml;ivita see Kasutaja Defineeritud T&auml;his';
$lang['admin']['stylesheetcopied'] = 'Stiilileht kopeeritud';
$lang['admin']['templatecopied'] = 'Mall kopeeritud';
$lang['admin']['ecommerce_desc'] = 'E-kaubanduse v&otilde;imalusi pakkuvad moodulid';
$lang['admin']['ecommerce'] = 'E-Kaubandus';
$lang['admin']['help_function_content_module'] = '<h3>What does this do?</h3>
<p>This content block type allows interfacing with different modules to create different content block types.</p>
<p>Some modules can define content block types for use in module templates.  i.e: The FrontEndUsers module may define a group list content block type.  It will then indicate how you can use the content_module tag to utilize that block type within your templates.</p>
<p><strong>Note:</strong> This block type must be used only with compatible modules.  You should not use this in any way except for as guided by addon modules.</p>
<p>This tag accepts a few parameters, and passes all other paramters to the module for processing.</p>
<p>Parameters:
 <ul>
 <li><strong>(required)</strong>module - The name of the module that will provide this content block. This module must be installed and available</li>
 <li><strong>(required)</strong>block  - The name of the content block.</li>
 <li><em>(optional)</em>label - A label for the content block for use when editing the page.</li>
 <li><em>(optional)</em> tab - The desired tab to display this field on in the edit form..</li>
 <li><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</li>
 </ul>
</p>';
$lang['admin']['error_parsing_content_blocks'] = 'Ilmnes viga sisuplokkide parsimisel (v&otilde;imalikud topelt ploki nimed)';
$lang['admin']['error_no_default_content_block'] = '&Uuml;htegi vaikimisi sisuplokki ei tuvastatud sellel mallil. Palun veendu, et sul on lehe mallis olemas t&auml;his {content}.';
$lang['admin']['help_function_cms_stylesheet'] = '	<h3>What does this do?</h3>
  <p>A replacement for the {stylesheet} tag, this tag provides caching of css files by generating static files in the tmp/cache directory, and smarty processing of the individual stylesheets.</p>
  <p>This plugin retrieves stylesheet information from the system.  By default, it grabs all of the stylesheets attached to the current template in the order specified by the designer, and combines them into a single stylesheet tag.</p>
  <p>Generated stylesheets are uniquely named according to the last modification date in the database, and are only generated if a stylesheet has changed.</p>
  <p>This tag is the replacement for the {stylesheet} tag.</p>
  <h3>How do I use it?</h3>
  <p>Just insert the tag into your template/page&#039;s head section like: <code>{cms_stylesheet}</code></p>
  <h3>What parameters does it take?</h3>
  <ul>
  <li><em>(optional)</em> name - Instead of getting all stylesheets for the given page, it will only get one specifically named one, whether it&#039;s attached to the current template or not.</li>
  <li><em>(optional)</em> nocombine - If set to a non zero value, and there are multiple stylesheets associated with the template, the stylesheets will be output as separate tags rather than combined into a single tag.</li>
  <li><em>(optional)</em> nolinks - If set to a non zero value, the stylesheets will be output as a URL without &amp;lt;link&amp;gt; tag.</li>
  <li><em>(optional)</em> https - (boolean) indicates wether the ssl_url config entry should be used to prefix stylesheet urls.  If not specified, the system will attempt to determine the proper root url based on the secure flag of the page being displayed.</li>
  <li><em>(optional)</em> templateid - If templateid is defined, this will return stylesheets associated with that template instead of the current one.</li>
  <li><em>(optional)</em> media - When used in conjunction with the name parameter this parameter will allow you to override the media type for that stylesheet.  When used in conjunction with the templateid parameter, the media parameter will only output stylesheet tags for those stylesheets that are marked as compatible with the specified media type.</li>
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
$lang['admin']['info_pseudocron_granularity'] = 'This setting indicates how often the system will attempt to handle regularly scheduled tasks';
$lang['admin']['cron_request'] = 'Each Request';
$lang['admin']['cron_15m'] = '15 Minutes';
$lang['admin']['cron_30m'] = '30 Minutes';
$lang['admin']['cron_60m'] = '1 Hour';
$lang['admin']['cron_120m'] = '2 Hours';
$lang['admin']['cron_3h'] = '3 Hours';
$lang['admin']['cron_6h'] = '6 Hours';
$lang['admin']['cron_12h'] = '12 Hours';
$lang['admin']['cron_24h'] = '24 Hours';
$lang['admin']['adminlog_1day'] = '1 day';
$lang['admin']['adminlog_1week'] = '1 week';
$lang['admin']['adminlog_2weeks'] = '2 weeks';
$lang['admin']['adminlog_1month'] = '1 month';
$lang['admin']['adminlog_3months'] = '3 months';
$lang['admin']['adminlog_6months'] = '6 months';
$lang['admin']['adminlog_manual'] = 'Manual deletion';
$lang['admin']['adminlog_lifetime'] = 'Lifetime of log-entries';
$lang['admin']['info_adminlog_lifetime'] = 'Remove log-entries that are older than the specified period.';
$lang['admin']['filteruser'] = 'Username is';
$lang['admin']['filtername'] = 'Event name contains';
$lang['admin']['filteraction'] = 'Action contains';
$lang['admin']['filterapply'] = 'Apply filters';
$lang['admin']['filterreset'] = 'Reset filters';
$lang['admin']['filters'] = 'Filters';
$lang['admin']['showfilters'] = 'Edit filter';
$lang['admin']['clearcache_taskdescription'] = 'T&auml;idetakse iga p&auml;ev, see &uuml;lesanne puhastab vahem&auml;lu failid, mis on vanemad kui globaalsetes eelistustes m&auml;rgitud vanus.';
$lang['admin']['clearcache_taskname'] = 'Puhasta vahem&auml;lu failid';
$lang['admin']['info_autoclearcache'] = 'Anna t&auml;isarvuline v&auml;&auml;rtus. Sisesta 0 automaatse vahem&auml;lu puhastamise v&auml;lja l&uuml;litamiseks.';
$lang['admin']['autoclearcache'] = 'Automaatselt puhasta vahem&auml;lu iga N p&auml;eva tagant.';
$lang['admin']['listtemplates_pagelimit'] = 'Number of rows per page when viewing templates';
$lang['admin']['liststylesheets_pagelimit'] = 'Number of rows per page when viewing stylesheets';
$lang['admin']['listgcbs_pagelimit'] = 'Number of rows per page when viewing Global Content Blocks';
$lang['admin']['insecure'] = 'Insecure (HTTP)';
$lang['admin']['secure'] = 'Secure (HTTPS)';
$lang['admin']['secure_page'] = 'Use HTTPS for this page';
$lang['admin']['thumbnail_width'] = 'Thumbnail Width';
$lang['admin']['thumbnail_height'] = 'Thumbnail Height';
$lang['admin']['E_STRICT'] = 'On E_STRICT keelatud seades error_reporting';
$lang['admin']['test_estrict_failed'] = 'E_STRICT on lubatud seades error_reporting';
$lang['admin']['info_estrict_failed'] = 'M&otilde;ned teegid, mida CMSMS kasutab ei t&ouml;&ouml;ta h&auml;sti E_STRICT seadega. Palun keela see enne j&auml;tkamist';
$lang['admin']['E_DEPRECATED'] = 'On E_DEPRECATED keelatud seades error_reporting';
$lang['admin']['test_edeprecated_failed'] = 'E_DEPRECATED on lubatud';
$lang['admin']['info_edeprecated_failed'] = 'Kui E_DEPRECATED on lubatud seades error_reporting, siis kasutajad n&auml;evad palju hoiatusteated, mis v&otilde;ivad m&otilde;jutada v&auml;ljan&auml;gemist ja funktsionaalsust';
$lang['admin']['session_use_cookies'] = 'Sessioonidel on lubatud kasutada k&uuml;psiseid';
$lang['admin']['errorgettingcontent'] = 'Ei suutnud hankida teavet antud sisuobjektile';
$lang['admin']['errordeletingcontent'] = 'Viga sisu kustutamisel (kas sellel lehel on alamlehti v&otilde;i on vaikimisi leht)';
$lang['admin']['invalidemail'] = 'Sisestaud emaili aadress on vale';
$lang['admin']['info_deletepages'] = 'M&auml;rge: &otilde;iguste piirangute t&otilde;ttu ei pruugi m&otilde;ned lehed, mis sa kustutamiseks valisid, allolevas nimekirjas avalduda';
$lang['admin']['info_pagealias'] = 'M&auml;&auml;ra unikaalne alias selle lehe jaoks.';
$lang['admin']['info_autoalias'] = 'Kui see v&auml;li on t&uuml;hi, luuakse alias automaatselt.';
$lang['admin']['invalidparent'] = 'Sa pead valima vanema lehe (v&otilde;ta &uuml;hendust oma administraatoriga, kui sa ei n&auml;e seda valikut).';
$lang['admin']['forgotpwprompt'] = 'Sisesta oma kasutajanimi.  Email saadetakse siis selle kasutajanimega seotud emaili aadressile uute sisselogimise andmetega';
$lang['admin']['info_basic_attributes'] = 'See v&auml;li v&otilde;imaldab m&auml;&auml;rata, milliseid sisu omadusi ilma &quot;Halda kogu sisu&quot; loata kasutajatel on lubatud muuta. Valitud omadused ilmuvad sakil &quot;Peasakk&quot; sisu muutmise lehel.';
$lang['admin']['basic_attributes'] = 'P&otilde;hiomadused';
$lang['admin']['no_permission'] = 'Sul ei ole &otilde;igust selle funktsiooni t&auml;itmiseks.';
$lang['admin']['bulk_success'] = 'Massitehing oli edukalt uuendatud.';
$lang['admin']['no_bulk_performed'] = '&Uuml;htegi massitehingut ei teostatud.';
$lang['admin']['info_preview_notice'] = 'Hoiatus: See eelvaate paneel k&auml;itub &uuml;sna lehitseja akna moodi, mis v&otilde;imaldab teil liikuda &auml;ra algselt eelvaadeldud lehelt. Siiski, kui te seda teete, v&otilde;ite kogeda ootamatut k&auml;itumist. Kui lahkute algsest vaatest ja naasete, ei pruugi te n&auml;ha mittesisestatud sisu enne, kui teete muutusi sisule peamisel sakil ja seej&auml;rel laete uuesti selle sakki. Sisu lisamisel, kui lahkute siit lehelt, siis te ei saa tagasi ning peate v&auml;rskendama selle paneeli.';
$lang['admin']['sitedownexcludes'] = 'J&auml;ta need aadressid maas oleva kodulehe teatest v&auml;lja';
$lang['admin']['info_sitedownexcludes'] = 'This parameter allows listing a comma separated list of ip addresses or networks that should not be subject to the Site Down mechanism.  This allows administrators to work on a site whilst anonymous visitors receive a Site Down message.<br/><br/>Addresses can be specified in the following formats:<br/>
1. xxx.xxx.xxx.xxx -- (exact IP address)<br/>
2. xxx.xxx.xxx.[yyy-zzz] -- (IP address range)<br/>
3. xxx.xxx.xxx.xxx/nn -- (nnn = number of bits, cisco style.  i.e:  192.168.0.100/24 = entire 192.168.0 class C subnet)';
$lang['admin']['setup'] = 'T&auml;psem h&auml;&auml;lestus';
$lang['admin']['handle_404'] = 'Kohaldatud 404 k&auml;itlemine';
$lang['admin']['sitedown_settings'] = 'Maas oleva saidi seaded';
$lang['admin']['general_settings'] = '&Uuml;ldised seaded';
$lang['admin']['help_function_page_attr'] = '<h3>What does this do?</h3>
<p>This tag can be used to return the value of the attributes of a certain page.</p>
<h3>How do I use it?</h3>
<p>Insert the tag into the template like: <code>{page_attr key=&quot;extra1&quot;}</code>.</p>
<h3>What parameters does it take?</h3>
<ul>
  <li><strong>key [required]</strong> The key to return the attribute of.</li>
  <li><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</li>
</ul>';
$lang['admin']['forge'] = 'Sepikoda';
$lang['admin']['disable_wysiwyg'] = 'Keela WYSIWYG redaktor sellel lehel (s&otilde;ltumata mallist v&otilde;i kasutaja seadest)';
$lang['admin']['help_function_page_image'] = '<h3>What does this do?</h3>
<p>This tag can be used to return the value of the image or thumbnail fields of a certain page.</p>
<h3>How do I use it?</h3>
<p>Insert the tag into the template like: <code>{page_image}</code>.</p>
<h3>What parameters does it take?</h3>
<ul>
  <li>thumbnail - Optionally display the value of the thumbnail property instead of the image property.</li>
  <li><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</li>
</ul>';
$lang['admin']['pagelink_circular'] = 'Lehe link ei saa viidata teisele lehe lingile.';
$lang['admin']['destinationnotfound'] = 'Valitud lehte ei leitud v&otilde;i on vale.';
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
$lang['admin']['sqlerror'] = 'SQL viga lauses %s';
$lang['admin']['image'] = 'Pilt';
$lang['admin']['thumbnail'] = 'Pisipilt';
$lang['admin']['searchable'] = 'See leht on otsitav';
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
  <li><em>(optional)</em> urlonly - output only the url to the image, ignoring all parameters like id, name, width, height, etc.</li>
</ul>';
$lang['admin']['error_udt_name_chars'] = 'Valiidne Kasutaja Defineeritud T&auml;hise nimi algab t&auml;hem&auml;rgiga v&otilde;i alakriipsuga, millele j&auml;rgneb suvaline kogus t&auml;hem&auml;rke, numbreid v&otilde;i alakriipse.';
$lang['admin']['errorupdatetemplateallpages'] = 'Mall ei ole aktiivne';
$lang['admin']['hidefrommenu'] = 'Peida men&uuml;&uuml;st';
$lang['admin']['settemplate'] = 'Sea mall';
$lang['admin']['text_settemplate'] = 'Sea valitud lehed teisele mallile';
$lang['admin']['cachable'] = 'Puhverdatav';
$lang['admin']['noncachable'] = 'Mitte puhverdatav';
$lang['admin']['copy_from'] = 'Kopeeri l&auml;htekohast';
$lang['admin']['copy_to'] = 'kopeeri sihtkohta';
$lang['admin']['copycontent'] = 'Kopeeri sisuelement';
$lang['admin']['md5_function'] = 'md5 funktsioon';
$lang['admin']['tempnam_function'] = 'tempnam funktsioon';
$lang['admin']['register_globals'] = 'PHP register_globals ';
$lang['admin']['output_buffering'] = 'PHP output_buffering ';
$lang['admin']['disable_functions'] = 'disable_functions PHP-s';
$lang['admin']['xml_function'] = 'Tavaline XML (expat) tugi';
$lang['admin']['magic_quotes_gpc'] = 'Get/Post/Cookie Magic quotes';
$lang['admin']['magic_quotes_gpc_on'] = '&Uuml;ksik- ja topeltjutum&auml;rgid ning tagurpidi kaldkriips on automaatselt vabastatud. V&otilde;ib esineda probleeme mallide salvestamisel';
$lang['admin']['magic_quotes_runtime'] = 'Magic quotes jooksult';
$lang['admin']['magic_quotes_runtime_on'] = 'Enamik andmeid tagastavad funktsioonid vabastavad jutum&auml;rgid tagurpidi kaldkriipsuga. V&otilde;ib esineda probleeme';
$lang['admin']['file_get_contents'] = '&quot;file_get_contents&quot; test';
$lang['admin']['check_ini_set'] = '&quot;ini_set&quot; test';
$lang['admin']['check_ini_set_off'] = 'V&otilde;ib esineda raskusi m&otilde;ningate funktsionaalsustega ilma selle v&otilde;imaluseta. See test v&otilde;ib eba&otilde;nnestuda, kui &quot;safe_mode&quot; on sisse l&uuml;litatud';
$lang['admin']['file_uploads'] = 'Faili &uuml;leslaadimised';
$lang['admin']['test_remote_url'] = 'V&auml;lise URLi test';
$lang['admin']['test_remote_url_failed'] = 'Arvatavasti ei ole v&otilde;imalik avada faili v&auml;lisel veebiserveril.';
$lang['admin']['test_allow_url_fopen_failed'] = 'Kui &quot;allow url fopen&quot; on v&auml;lja l&uuml;litatud, siis ei ole v&otilde;imalik ligi p&auml;&auml;seda URL objekti laadsetele failidele FTP v&otilde;i HTTP protokolli kaudu.';
$lang['admin']['connection_error'] = 'V&auml;ljuvad http &uuml;hendused ei paista t&ouml;&ouml;tavat! On seal tulem&uuml;&uuml;r v&otilde;i m&otilde;ni ACL v&auml;lis&uuml;henduste jaoks?. See toob kaasa mooduli halduri ja potentsiaalselt teiste funktsionaalsuste mittet&ouml;&ouml;tamise.';
$lang['admin']['remote_connection_timeout'] = '&Uuml;hendus aegus!';
$lang['admin']['search_string_find'] = '&Uuml;hendus OK!';
$lang['admin']['connection_failed'] = '&Uuml;hendus eba&otilde;nnestus!';
$lang['admin']['remote_response_ok'] = 'Kaugvastus: OK!';
$lang['admin']['remote_response_404'] = 'Kaugvastus: ei leitud!';
$lang['admin']['remote_response_error'] = 'Kaugvastus: viga!';
$lang['admin']['notifications_to_handle'] = 'Sul on <b>%d</b> problemaatilisi teateid';
$lang['admin']['notification_to_handle'] = 'Sul on <b>%d</b> problemaatiline teade';
$lang['admin']['notifications'] = 'Teated';
$lang['admin']['dashboard'] = 'Vaata armatuurlauda';
$lang['admin']['ignorenotificationsfrommodules'] = 'Ignoreeri teateid nendelt moodulitelt';
$lang['admin']['admin_enablenotifications'] = 'Luba kasutajatel n&auml;ha teateid<br/><em>(teateid kuvatakse k&otilde;ikidel admin lehtedel)</em>';
$lang['admin']['enablenotifications'] = 'Luba kasutaja teated admin sektsioonis.';
$lang['admin']['test_check_open_basedir_failed'] = '&quot;Open basedir&quot; piirangud on j&otilde;us. V&otilde;ib esineda probleeme m&otilde;ne lisafunktsionaalsusega selle piiranguga.';
$lang['admin']['config_writable'] = 'config.php on kirjutatav. Turvalisuse huvides on soovitatav seada selle &otilde;igused ainult lugemiseks.';
$lang['admin']['caution'] = 'Hoiatus';
$lang['admin']['create_dir_and_file'] = 'Checking if the httpd process can create a file inside of a directory it created';
$lang['admin']['os_session_save_path'] = 'No check because OS path';
$lang['admin']['unlimited'] = 'Piiramatu';
$lang['admin']['open_basedir'] = 'PHP Open Basedir ';
$lang['admin']['open_basedir_active'] = 'No check because open basedir active';
$lang['admin']['invalid'] = 'Vale';
$lang['admin']['checksum_passed'] = 'All checksums match those in the uploaded file';
$lang['admin']['error_retrieving_file_list'] = 'Error retrieving file list';
$lang['admin']['files_checksum_failed'] = 'Files could not be checksummed';
$lang['admin']['failure'] = 'T&otilde;rge';
$lang['admin']['help_function_process_pagedata'] = '<h3>What does this do?</h3>
<p>This plugin will process the data in the &quot;pagedata&quot; block of content pages through smarty.  It allows you to specify page specific data to smarty without changing the template for each page.</p>
<h3>How do I use it?</h3>
<ol>
  <li>Insert smarty assign variables and other smarty logic into the pagedata field of some of your content pages.</li>
  <li>Insert the <code>{process_pagedata}</code> tag into the very top of your page template.</li>
</ol>
<br/>
<h3>What parameters does it take?</h3>
<p>None at this time</p>';
$lang['admin']['page_metadata'] = 'Page Specific Metadata';
$lang['admin']['pagedata_codeblock'] = 'Smarty data or logic that is specific to this page';
$lang['admin']['error_uploadproblem'] = 'Viga ilmnes &uuml;leslaadimisel';
$lang['admin']['error_nofileuploaded'] = '&Uuml;htegi faili ei laetud &uuml;les';
$lang['admin']['files_failed'] = 'Failid ei l&auml;binud md5sum kontrolli';
$lang['admin']['files_not_found'] = 'Faili ei leitud';
$lang['admin']['info_generate_cksum_file'] = 'This function will allow you to generate a checksum file and save it on your local computer for later validation.  This should be done just prior to rolling out the website, and/or after any upgrades, or major modifications.';
$lang['admin']['info_validation'] = 'This function will compare the checksums found in the uploaded file with the files on the current installation.  It can assist in finding problems with uploads, or exactly what files were modified if your system has been hacked.  A checksum file is generated for each release of CMS Made simple from version 1.4 on.';
$lang['admin']['download_cksum_file'] = 'Download Checksum File';
$lang['admin']['perform_validation'] = 'Perform Validation';
$lang['admin']['upload_cksum_file'] = 'Upload Checksum File';
$lang['admin']['checksumdescription'] = 'Validate the integrity of CMS files by comparing against known checksums';
$lang['admin']['system_verification'] = 'S&uuml;steemi vastavust&otilde;endamine';
$lang['admin']['extra1'] = 'Extra Page Attribute 1';
$lang['admin']['extra2'] = 'Extra Page Attribute 2';
$lang['admin']['extra3'] = 'Extra Page Attribute 3';
$lang['admin']['start_upgrade_process'] = 'Alusta uuendamise protsessi';
$lang['admin']['warning_upgrade'] = '<em><strong>Warning:</strong></em> CMSMS is in need of an upgrade.';
$lang['admin']['warning_upgrade_info1'] = 'You are now running schema version %s. and you need to be upgraded to version %s';
$lang['admin']['warning_upgrade_info2'] = 'Please click the following link: %s.';
$lang['admin']['warning_mail_settings'] = 'Your mail settings have not been configured.  This could interfere with the ability of your website to send email messages.  You should go to <a href="%s">Extensions >> CMSMailer</a> and configure the mail settings with the information provided by your host.';
$lang['admin']['view_page'] = 'Vaata seda lehek&uuml;lge uues aknas';
$lang['admin']['off'] = 'V&auml;ljas';
$lang['admin']['on'] = 'Sees';
$lang['admin']['invalid_test'] = 'Invalid test param value!';
$lang['admin']['copy_paste_forum'] = 'View Text Report <em>(suitable for copying into forum posts)</em>';
$lang['admin']['permission_information'] = '&Otilde;iguste informatsioon';
$lang['admin']['server_os'] = 'Serveri operatsioonis&uuml;steem';
$lang['admin']['server_api'] = 'Serveri API';
$lang['admin']['server_software'] = 'Serveri tarkvara';
$lang['admin']['server_information'] = 'Serveri informatsioon';
$lang['admin']['session_save_path'] = 'Sessiooni salvestuse tee';
$lang['admin']['max_execution_time'] = 'Maksimaalne sooritamisaeg';
$lang['admin']['gd_version'] = 'GD versioon';
$lang['admin']['upload_max_filesize'] = 'Maksimaalne &uuml;leslaadimise suurus';
$lang['admin']['post_max_size'] = 'Maksimaalne postituse suurus';
$lang['admin']['memory_limit'] = 'PHP effektiivne m&auml;lulimiit';
$lang['admin']['server_db_type'] = 'Serveri andmebaas';
$lang['admin']['server_db_version'] = 'Serveri andmebaasi versioon';
$lang['admin']['phpversion'] = 'Praegune PHP versioon';
$lang['admin']['safe_mode'] = 'PHP Safe Mode ';
$lang['admin']['php_information'] = 'PHP informatsioon';
$lang['admin']['cms_install_information'] = 'CMS paigalduse informatsioon';
$lang['admin']['cms_version'] = 'CMS versioon';
$lang['admin']['installed_modules'] = 'Paigaldatud moodulid';
$lang['admin']['config_information'] = 'Konfiguratsiooni informatsioon';
$lang['admin']['systeminfo_copy_paste'] = 'Palun kopeeri ja kleebi see valitud tekst oma foorumi postitusse.';
$lang['admin']['help_systeminformation'] = 'The information displayed below is collected from a variety of locations, and summarized here so that you may be able to conveniently find some of the information required when trying to diagnose a problem or request help with your CMS Made Simple installation.';
$lang['admin']['systeminfo'] = 'S&uuml;steemi informatsioon';
$lang['admin']['systeminfodescription'] = 'Kuva erinevaid informatsioonit&uuml;kke s&uuml;steemi kohta, mis v&otilde;ivad olla kasulikud probleemide diagnoosimisel.';
$lang['admin']['systemmaintenance'] = 'S&uuml;steemi hooldus';
$lang['admin']['systemmaintenancedescription'] = 'Erinevad funktsioonid s&uuml;steemi tervise hoolduseks.';
$lang['admin']['sysmaintab_database'] = 'Andmebaas';
$lang['admin']['sysmaintab_changelog'] = 'Muutused';
$lang['admin']['sysmaintab_content'] = 'Vahem&auml;lu ja sisu';
$lang['admin']['sysmain_content_status'] = 'Sisu staatus';
$lang['admin']['sysmain_cache_status'] = 'Vahem&auml;lu staatus';
$lang['admin']['sysmain_database_status'] = 'Andmebaasi staatus';
$lang['admin']['sysmain_updatehierarchy'] = 'Update page hierarchy positions';
$lang['admin']['sysmain_confirmupdatehierarchy'] = 'Are you sure you want to update page hierarchy positions?';
$lang['admin']['sysmain_update'] = 'Update';
$lang['admin']['sysmain_pagesfound'] = 'pages found';
$lang['admin']['sysmain_hierarchyupdated'] = 'Page hierarchy positions updated';
$lang['admin']['sysmain_nostr_errors'] = 'No structural errors were detected in the database';
$lang['admin']['sysmain_str_error'] = 'Structural error detected in table';
$lang['admin']['sysmain_str_errors'] = 'Structural errors detected in tables';
$lang['admin']['sysmain_tablesfound'] = 'tables found (out of which %d are not seq-tables)';
$lang['admin']['sysmain_repair'] = 'Repair';
$lang['admin']['sysmain_repairtables'] = 'Repair tables';
$lang['admin']['sysmain_tablesrepaired'] = 'Tables repaired';
$lang['admin']['sysmain_optimizetables'] = 'Optimize tables';
$lang['admin']['sysmain_tablesoptimized'] = 'Tables optimized';
$lang['admin']['sysmain_optimize'] = 'Optimize';
$lang['admin']['sysmain_confirmclearcache'] = 'Are you sure you want to clear the cache?';
$lang['admin']['sysmain_nocontenterrors'] = 'No content errors detected';
$lang['admin']['sysmain_pagesmissinalias'] = 'pages missing aliases';
$lang['admin']['sysmain_confirmfixaliases'] = 'Are you sure you want to add aliases to pages missing?';
$lang['admin']['sysmain_fixaliases'] = 'Add aliases where missed';
$lang['admin']['sysmain_aliasesfixed'] = 'aliases fixed';
$lang['admin']['sysmain_pagesinvalidtypes'] = 'pages with invalid content type';
$lang['admin']['sysmain_confirmfixtypes'] = 'Are you sure you want to convert all with invalid content into standard content pages?';
$lang['admin']['sysmain_fixtypes'] = 'Convert into standard content pages';
$lang['admin']['sysmain_typesfixed'] = 'page content types fixed';
$lang['admin']['welcome_user'] = 'Tere';
$lang['admin']['itsbeensincelogin'] = 'M&ouml;&ouml;dunud on %s sinu viimasest sisselogimisest';
$lang['admin']['days'] = 'p&auml;eva';
$lang['admin']['day'] = 'p&auml;ev';
$lang['admin']['hours'] = 'tundi';
$lang['admin']['hour'] = 'tund';
$lang['admin']['minutes'] = 'minutit';
$lang['admin']['minute'] = 'minut';
$lang['admin']['help_css_max_age'] = 'This parameter should be set relatively high for static sites, and should be set to 0 for site development';
$lang['admin']['css_max_age'] = 'Maximum amount of time (seconds) stylesheets can be cached in the browser';
$lang['admin']['error'] = 'Viga';
$lang['admin']['new_version_available'] = '<em>Notice:</em> A new version of CMS Made Simple is available.  Please notify your administrator.';
$lang['admin']['master_admintheme'] = 'Default Administration Theme (for the login page and new user accounts)';
$lang['admin']['contenttype_separator'] = 'Eraldaja';
$lang['admin']['contenttype_sectionheader'] = 'L&otilde;igu p&auml;is';
$lang['admin']['contenttype_content'] = 'Sisu';
$lang['admin']['contenttype_pagelink'] = 'Sisemise lehe link';
$lang['admin']['nogcbwysiwyg'] = 'Keela WYSIWYG redaktor globaalsetel sisuplokkidel';
$lang['admin']['destination_page'] = 'Sihtleht';
$lang['admin']['additional_params'] = 'Lisa parameetrid';
$lang['admin']['help_function_current_date'] = '        <h3 style=&quot;color: red;&quot;>Deprecated</h3>
	 <p>use <code>{$smarty.now|cms_date_format}</code></p>
	<h3>What does this do?</h3>
	<p>Prints the current date and time.  If no format is given, it will default to a format similar to &#039;Jan 01, 2004&#039;.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{current_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em>format - Date/Time format using parameters from php&#039;s strftime function.  See <a href="http://php.net/strftime" target="_blank">here</a> for a parameter list and information.</li>
		<li><em>(optional)</em>ucword - If true return uppercase the first character of each word.</li>
		<li><em>(optional)</em> <tt>assign</tt> - Assign the results to the named smarty variable.</li>
	</ul>';
$lang['admin']['help_function_valid_xhtml'] = '<h3>What does this do?</h3>
<p>Returns a link to the w3c HTML validator.</p>
<h3>How do I use it?</h3>
<p>Just insert the tag into your template/page like: <code>{valid_xhtml}</code></p>
<h3>What parameters does it take?</h3>
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
    </ul>';
$lang['admin']['help_function_valid_css'] = '<h3>What does this do?</h3>
<p>Returns a link to the w3c CSS validator.</p>
<h3>How do I use it?</h3>
<p>Just insert the tag into your template/page like: <code>{valid_css}</code></p>
<h3>What parameters does it take?</h3>
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
    </ul>';
$lang['admin']['help_function_title'] = '	<h3>What does this do?</h3>
	<p>Prints the title of the page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{title}</code></p>
	<h3>What parameters does it take?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_stylesheet'] = '	<h3>What does this do?</h3>
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
	<p>This is actually just a wrapper tag for the Search module to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;Search&#039;}</code> you can now just use <code>{search}</code> to insert the module in a template.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{search}</code> in a template where you want the search input box to appear. For help about the Search module, please refer to the Search module help.</p>';
$lang['admin']['help_function_root_url'] = '	<h3>What does this do?</h3>
	<p>Prints the root url location for the site.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{root_url}</code></p>
	<h3>What parameters does it take?</h3>
        <p><em>(optional)autossl=1</em> - Enabled by default, this option will detect if the request made to the server was over SSL, and if it was return the appropriately configured SSL url.  To disable this feature specify autossl=0.</p>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_repeat'] = '  <h3>What does this do?</h3>
  <p>Repeats a specified sequence of characters, a specified number of times</p>
  <h3>How do I use it?</h3>
  <p>Insert a tag similar to the following into your template/page, like this: <code>{repeat string=&#039;repeat this &#039; times=&#039;3&#039;}</code></p>
  <h3>What parameters does it take?</h3>
  <ul>
  <li>string=&#039;text&#039; - The string to repeat</li>
  <li>times=&#039;num&#039; - The number of times to repeat it.</li>
  <li><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</li>
  </ul>';
$lang['admin']['help_function_recently_updated'] = '	<h3>What does this do?</h3>
	<p>Outputs a list of recently updated pages.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{recently_updated}</code></p>
	<h3>What parameters does it take?</h3>
	<ul>
	 <li><p><em>(optional)</em> number=&#039;10&#039; - Number of updated pages to show.</p><p>Example: {recently_updated number=&#039;15&#039;}</p></li>
 	 <li><p><em>(optional)</em> leadin=&#039;Last changed&#039; - Text to show left of the modified date.</p><p>Example: {recently_updated leadin=&#039;Last Changed&#039;}</p></li>
 	 <li><p><em>(optional)</em> showtitle=&#039;true&#039; - Shows the titleattribute if it exists as well (true|false).</p><p>Example: {recently_updated showtitle=&#039;true&#039;}</p></li>											 	
	 <li><p><em>(optional)</em> css_class=&#039;some_name&#039; - Warp a div tag with this class around the list.</p><p>Example: {recently_updated css_class=&#039;some_name&#039;}</p></li>											 	
	 <li><p><em>(optional)</em> dateformat=&#039;d.m.y h:m&#039; - default is d.m.y h:m , use the format you whish (php -date- format)</p><p>Example: {recently_updated dateformat=&#039;D M j G:i:s T Y&#039;}</p></li>											 	
	</ul>
	<p>or combined:</p>
	<pre>{recently_updated number=&#039;15&#039; showtitle=&#039;false&#039; leadin=&#039;Last Change: &#039; css_class=&#039;my_changes&#039; dateformat=&#039;D M j G:i:s T Y&#039;}</pre>';
$lang['admin']['help_function_print'] = '	<h3>What does this do?</h3>
	<p>This is actually just a wrapper tag for the CMSPrinting module to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;CMSPrinting&#039;}</code> you can now just use <code>{print}</code> to insert the module on pages and templates.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{print}</code> on a page or in a template. For help about the CMSPrinting module, what parameters it takes etc., please refer to the CMSPrinting module help.</p>';
$lang['admin']['login_info_title'] = 'Informatsioon';
$lang['admin']['login_info'] = 'Et adminni konsool t&ouml;&ouml;taks korralikult';
$lang['admin']['login_info_params'] = '<ol> 
  <li>K&uuml;psised peavad olema lubatud sinu lehitsejal</li> 
  <li>Javascript peab olema lubatud sinu lehitsejal</li> 
  <li>H&uuml;pikaknad peavad olema lubatud j&auml;rgneva aadressi jaoks:</li> 
</ol>';
$lang['admin']['help_function_news'] = '	<h3>What does this do?</h3>
	<p>This is actually just a wrapper tag for the News module to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;News&#039;}</code> you can now just use <code>{news}</code> to insert the module on pages and templates.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{news}</code> on a page or in a template. For help about the News module, what parameters it takes etc., please refer to the News module help.</p>';
$lang['admin']['help_function_modified_date'] = '        <h3>What does this do?</h3>
        <p>Prints the date and time the page was last modified.  If no format is given, it will default to a format similar to &#039;Jan 01, 2004&#039;.</p>
        <h3>How do I use it?</h3>
        <p>Just insert the tag into your template/page like: <code>{modified_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
        <h3>What parameters does it take?</h3>
        <ul>
                <li><em>(optional)</em>format - Date/Time format using parameters from php&#039;s strftime function.  See <a href="http://php.net/strftime" target="_blank">here</a> for a parameter list and information.</li>
                <li><em>(optional)</em>assign - Assign the results to the named smarty variable.</li>
        </ul>';
$lang['admin']['help_function_metadata'] = '	<h3>What does this do?</h3>
	<p>Displays the metadata for this page. Both global metdata from the global settings page and metadata for each page will be shown.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template like: <code>{metadata}</code></p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em>showbase (true/false) - If set to false, The base tag will not be output.</li>
		<li><em>(optional)</em> <tt>assign</tt> - Assign the results to the named smarty variable.</li>
	</ul>';
$lang['admin']['help_function_menu_text'] = '	<h3>What does this do?</h3>
	<p>Prints the menu text of the page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{menu_text}</code></p>
	<h3>What parameters does it take?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_menu'] = '	<h3>What does this do?</h3>
	<p>This is actually just a wrapper tag for the Menu Manager module to make the tag syntax easier. 
	Instead of having to use <code>{cms_module module=&#039;MenuManager&#039;}</code> you can now just use <code>{menu}</code> to insert the module on pages and templates.
	</p>
	<h3>How do I use it?</h3>
	<p>Just put <code>{menu}</code> on a page or in a template. For help about the Menu Manager module, what parameters it takes etc., please refer to the Menu Manager module help.</p>';
$lang['admin']['help_function_last_modified_by'] = '        <h3>What does this do?</h3>
        <p>Prints last person that edited this page.  If no format is given, it will default to a ID number of user .</p>
        <h3>How do I use it?</h3>
        <p>Just insert the tag into your template/page like: <code>{last_modified_by format=&quot;fullname&quot;}</code></p>
        <h3>What parameters does it take?</h3>
        <ul>
                <li><em>(optional)</em>format - id, username, fullname</li>
				<li><em>(optional)</em> <tt>assign</tt> - Assign the results to the named smarty variable.</li>
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
	 <li><em>(optional)</em> <tt>assign</tt> - Assign the results to the named smarty variable.</li>
  </ul>';
$lang['admin']['help_function_html_blob'] = '	<h3>What does this do?</h3>
	<p>See the help for global_content for a description.</p>';
$lang['admin']['help_function_google_search'] = '	<h3>What does this do?</h3>
	<p>Search&#039;s your website using Google&#039;s search engine.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{google_search}</code><br />
	<br />
	Note: Google needs to have your website indexed for this to work. You can submit your website to google <a href="http://www.google.com/addurl.html">here</a>.</p>
	<h3>What if I want to change the look of the textbox or button?</h3>
	<p>The look of the textbox and button can be changed via css. The textbox is given an id of textSearch and the button is given an id of buttonSearch.</p>

	<h3>What parameters does it take?</h3>
	<ul>
		<li><em>(optional)</em> domain - This tells google the website domain to search. This script tries to determine this automatically.</li>
		<li><em>(optional)</em> buttonText - The text you want to display on the search button. The default is &quot;Search Site&quot;.</li>
		<li><em>(optional)</em> <tt>assign</tt> - Assign the results to the named smarty variable.</li>
	</ul>';
$lang['admin']['help_function_global_content'] = '	<h3>What does this do?</h3>
	<p>Inserts a global content block into your template or page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{global_content name=&#039;myblob&#039;}</code>, where name is the name given to the block when it was created.</p>
	<h3>What parameters does it take?</h3>
	<ul>
  	  <li>name - The name of the global content block to display.</li>
          <li><em>(optional)</em> assign - The name of a smarty variable that the global content block should be assigned to.</li>
	</ul>';
$lang['admin']['help_function_get_template_vars'] = '	<h3>What does this do?</h3>
	<p>Dumps all the known smarty variables into your page</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{get_template_vars}</code></p>
	<h3>What parameters does it take?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_uploads_url'] = '	<h3>What does this do?</h3>
	<p>Prints the uploads url location for the site.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{uploads_url}</code></p>
	<h3>What parameters does it take?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_embed'] = '	<h3>What does this do?</h3>
	<p>Enable inclusion (embedding) of any other application into the CMS. The most usual use could be a forum. 
	This implementation is using IFRAMES so older browsers can have problems. Sorry bu this is the only known way 
	that works without modifing the embedded application.</p>
	<h3>How do I use it?</h3>
        <ul>
        <li>a) Add <code>{embed header=true}</code> into the head section of your page template, or into the metadata section in the options tab of a content page.  This will ensure that the required javascript gets included.   If you insert this tag into the metadata section in the options tab of a content page you must ensure that <code>{metadata}</code> is in your page template.</li>
        <li>b) Add <code>{embed url=&quot;http://www.google.com&quot;}</code> into your page content or in the body of your page template.</li>
        </ul>
        <br/>
        <h4>Example to make the iframe larger</h4>
	<p>Add the following to your style sheet:</p>
        <pre>#myframe { height: 600px; }</pre>
        <br/>
        <h3>What parameters does it take?</h3>
        <ul>
            <li><em>(required)</em>url - the url to be included</li> 
            <li><em>(required)</em>header=true - this will generate the header code for good resizing of the IFRAME.</li>
            <li>(optional)name - an optional name to use for the iframe (instead of myframe).<p>If this option is used, it must be used identically in both calls, i.e: {embed header=true name=foo} and {embed name=foo url=http://www.google.com} calls.</p></li>
			
        </ul>';
$lang['admin']['help_function_description'] = '	<h3>What does this do?</h3>
	<p>Prints the description (title attribute) of the page.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{description}</code></p>
	<h3>What parameters does it take?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_created_date'] = '        <h3>What does this do?</h3>
        <p>Prints the date and time the page was created.  If no format is given, it will default to a format similar to &#039;Jan 01, 2004&#039;.</p>
        <h3>How do I use it?</h3>
        <p>Just insert the tag into your template/page like: <code>{created_date format=&quot;%A %d-%b-%y %T %Z&quot;}</code></p>
        <h3>What parameters does it take?</h3>
        <ul>
                <li><em>(optional)</em>format - Date/Time format using parameters from php&#039;s strftime function.  See <a href="http://php.net/strftime" target="_blank">here</a> for a parameter list and information.</li>
                <li><em>(optional)</em>assign - Assign the results to the named smarty variable.</li>
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
<p>Now, when you edit a page there will a textarea called &quot;Second Content Block&quot;.</p></li>
		<li><em>(optional)</em>wysiwyg (true/false) - If set to false, then a wysiwyg will never be used while editing this block.  If true, then it acts as normal.  Only works when block parameter is used.</li>
		<li><em>(optional)</em>oneline (true/false) - If set to true, then only one edit line will be shown while editing this block.  If false, then it acts as normal.  Only works when block parameter is used.</li>
<li><em>(optional)</em>size - Applicable only when the oneline option is used this optional parameter allows you to specify the size of the edit field.  The default value is 50.</li>
		<li><em>(optional)</em>default - Allows you to specify default content for this content blocks (additional content blocks only).</li>
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
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['help_function_cms_version'] = '	<h3>What does this do?</h3>
	<p>This tag is used to insert the current version number of CMS into your template or page.  It doesn&#039;t display any extra besides the version number.</p>
	<h3>How do I use it?</h3>
	<p>This is just a basic tag plugin.  You would insert it into your template or page like so: <code>{cms_version}</code></p>
	<h3>What parameters does it take?</h3>
	<p><em>(optional)</em> assign (string) - Assign the results to a smarty variable with that name.</p>';
$lang['admin']['about_function_cms_selflink'] = '		<p>Author: Ted Kulp &amp;lt;tedkulp@users.sf.net&amp;gt;</p>
		<p>Version: 1.1</p>
		<p>Modified: Martin B. Vestergaard &amp;lt;mbv@nospam.dk&amp;gt;</p>
		<p>Version: 1.41</p>
		<p>Modified: Russ Baldwin</p>
		<p>Version: 1.42</p>
		<p>Modified: Marcus Bointon &amp;lt;coolbru@users.sf.net&amp;gt;</p>
		<p>Version: 1.43</p>
		<p>Modified: Tatu Wikman &amp;lt;tsw@backspace.fi&amp;gt;</p>
		<p>Version: 1.44</p>
		<p>Modified: Hans Mogren &amp;lt;http://hans.bymarken.net/&amp;gt;</p>
		<p>Version: 1.45</p>

		<p>
		Change History:<br/>
		1.46 - Fixes a problem with too many queries when using the dir=start option.<br/>
		1.45 - Added a new option for &amp;quot;dir&amp;quot;, &amp;quot;up&amp;quot;, for links to the parent page e.g. dir=&amp;quot;up&amp;quot; (Hans Mogren).<br />
		1.44 - Added new parameters &amp;quot;ext&amp;quot; and &amp;quot;ext_info&amp;quot; to allow external links with class=&amp;quot;external&amp;quot; and info text after the link, ugly hack but works thinking about rewriting this(Tatu Wikman)<br />
		1.43 - Added new parameters &amp;quot;image&amp;quot; and &amp;quot;imageonly&amp;quot; to allow attachment of images to be used for page links, either instead of or in addition to text links. (Marcus Bointon)<br />
		1.42 - Added new parameter &amp;quot;anchorlink&amp;quot; and a new option for &amp;quot;dir&amp;quot; namely, &amp;quot;anchor&amp;quot;, for internal page links. e.g. dir=&amp;quot;anchor&amp;quot; anchorlink=&amp;quot;internal_link&amp;quot;. (Russ)<br />
		1.41 - added new parameter &amp;quot;href&amp;quot; (LeisureLarry)<br />
		1.4 - fixed bug next/prev linking to non-content pages. (Thanks Teemu Koistinen for this fix)<br />
		1.3 - added option &amp;quot;more&amp;quot;<br />
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
		<ul>
		<li><em>(optional)</em> <tt>page</tt> - Page ID or alias to link to.</li>
		<li><em>(optional)</em> <tt>dir anchor (internal links)</tt> - New option for an internal page link. If this is used then <tt>anchorlink</tt> should be set to your link. </li> <!-- Russ - 25-04-2006 -->
		<li><em>(optional)</em> <tt>anchorlink</tt> - New paramater for an internal page link. If this is used then <tt>dir =&quot;anchor&quot;</tt> should also be set. No need to add the #, because it is added automatically.</li> <!-- Russ - 25-04-2006 -->
		<li><em>(optional)</em> <tt>urlparam</tt> - Specify additional parameters to the URL.  <strong>Do not use this in conjunction with the <em>anchorlink</em> parameter</strong></li>
		<li><em>(optional)</em> <tt>tabindex =&quot;a value&quot;</tt> - Set a tabindex for the link.</li> <!-- Russ - 22-06-2005 -->
		<li><em>(optional)</em> <tt>dir start/next/prev/up (previous)</tt> - Links to the default start page or the next or previous page, or the parent page (up). If this is used <tt>page</tt> should not be set.</li> <!-- mbv - 21-06-2005 -->
		</ul>
		<strong>Note!</strong> Only one of the above may be used in the same cms_selflink statement!!
		<ul>
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
		<li><em>(optional)</em> <tt>imageonly</tt> - If using an image, whether to suppress display of text links. If you want no text in the link at all, also set lang=0 to suppress the label. <strong>Example:</strong> {cms_selflink dir=&quot;next&quot; image=&quot;next.png&quot; text=&quot;Next&quot; imageonly=1}</li>
		<li><em>(optional)</em> <tt>ext</tt> - For external links, will add class=&quot;external and info text. <strong>warning:</strong> only text, target and title parameters are compatible with this parameter</li>
		<li><em>(optional)</em> <tt>ext_info</tt> - Used together with &quot;ext&quot; defaults to (external link).</li>
        <li><em>(optional)</em> <tt>assign</tt> - Assign the results to the named smarty variable.</li>
		</ul>';
$lang['admin']['about_function_cms_module'] = '	<p>Author: Ted Kulp<tedkulp@users.sf.net></p>
	<p>Version: 1.0</p>
	<p>
	Change History:<br/>
	None
	</p>';
$lang['admin']['help_function_cms_module'] = '	<h3>What does this do?</h3>
	<p>This tag is used to insert modules into your templates and pages. If a module is created to be used as a tag plugin (check it&#039;s help for details), then you should be able to insert it with this tag.</p>
	<h3>How do I use it?</h3>
	<p>It&#039;s just a basic tag plugin.  You would insert it into your template or page like so: <code>{cms_module module=&quot;somemodulename&quot;}</code></p>
	<h3>What parameters does it take?</h3>
	<p>There is only one required parameter.  All other parameters are passed on to the module.</p>
	<ul>
		<li>module - Name of the module to insert.  This is not case sensitive.</li>
	</ul>';
$lang['admin']['about_function_breadcrumbs'] = '<p>Author: Marcus Deglos &amp;lt;<a href="mailto:md@zioncore.com">md@zioncore.com</a>&amp;gt;</p>
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
1.8 - Fixes to the root param.<br/>
</p>';
$lang['admin']['help_function_breadcrumbs'] = '<h3>What does this do?</h3>
<p>Prints a breadcrumb trail .</p>
<h3>How do I use it?</h3>
<p>Just insert the tag into your template/page like: <code>{breadcrumbs}</code></p>
<h3>What parameters does it take?</h3>
<ul>
<li><em>(optional)</em> <tt>delimiter</tt> - Text to seperate entries in the list (default &quot;>>&quot;).</li>
<li><em>(optional)</em> <tt>initial</tt> - 1/0 If set to 1 start the breadcrumbs with a delimiter (default 0).</li>
<li><em>(optional)</em> <tt>root</tt> - Page alias of a page you want to always appear as the first page in
    the list. Can be used to make a page (e.g. the front page) appear to be the root of everything even though it is not.</li>
<li><em>(optional)</em> <tt>root_url</tt> - Override the URL of the root page. Useful for making link be to &#039;/&#039; instead of &#039;/home/&#039;. This requires that the root page be set as the default page.</li>
<li><em>(optional)</em> <tt>classid</tt> - The CSS class for the non current page names, i.e. the first n-1 pages in the list. If the name is a link it is added to the <a href> tags, otherwise it is added to the <span> tags.</li>
<li><em>(optional)</em> <tt>currentclassid</tt> - The CSS class for the <span> tag surrounding the current page name.</li>
<li><em>(optional)</em> <tt>starttext</tt> - Text to append to the front of the breadcrumbs list, something like &quot;You are here&quot;.</li>
</ul>';
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
	<ul>
	<li><tt>anchor</tt> - Where we are linking to.  The part after the #.</li>
	<li><tt>text</tt> - The text to display in the link.</li>
	<li><tt>class</tt> - The class for the link, if any</li>
	<li><tt>title</tt> - The title to display for the link, if any.</li>
	<li><tt>tabindex</tt> - The numeric tabindex for the link, if any.</li>
	<li><tt>accesskey</tt> - The accesskey for the link, if any.</li>
	<li><em>(optional)</em> <tt>onlyhref</tt> - Only display the href and not the entire link. No other options will work</li>
	<li><em>(optional)</em> <tt>assign</tt> - Assign the results to the named smarty variable.</li>
	</ul>';
$lang['admin']['help_function_site_mapper'] = '<h3>What does this do?</h3>
  <p>This is actually just a wrapper tag for the Menu Manager module to make the tag syntax easier, and to simplify creating a sitemap.</p>
<h3>How do I use it?</h3>
  <p>Just put <code>{site_mapper}</code> on a page or in a template. For help about the Menu Manager module, what parameters it takes etc., please refer to the Menu Manager module help.</p>
  <p>By default, if no template option is specified the minimal_menu.tpl file will be used.</p>
  <p>Any parameters used in the tag are available in the menumanager template as <code>{$menuparams.paramname}</code></p>';
$lang['admin']['help_function_redirect_url'] = '<h3>What does this do?</h3>
  <p>This plugin allows you to easily redirect to a specified url.  It is handy inside of smarty conditional logic (for example, redirect to a splash page if the site is not live yet).</p>
<h3>How do I use it?</h3>
<p>Simply insert this tage into your page or template: <code>{redirect_url to=&#039;http://www.cmsmadesimple.org&#039;}</code></p>';
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
<pre><code><script type=&quot;text/javascript&quot; src=&quot;https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js&quot;></script>
<script type=&quot;text/javascript&quot; src=&quot;https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js&quot;></script>
<script type=&quot;text/javascript&quot; src=&quot;http://localhost/1.10.x/lib/jquery/js/jquery.json-2.2.js&quot;></script>
<script type=&quot;text/javascript&quot; src=&quot;uploads/NCleanBlue/js/ie6fix.js&quot;></script>
</code></pre>

<h3><em>Included Defaults</em></h3>
<ul>
	<li><tt>jQuery</tt><em>(1.6.2)</em> - jquery-1.7.1.min.js</li>
	<li><tt>jQuery UI</tt><em>(1.8.14)</em> - jquery-ui-1.8.16.custom.min.js</li>
	<li><tt>nestedSortable</tt>(1.3.4) - jquery/js/jquery.ui.nestedSortable-1.3.4.js</li>
	<li><tt>jQuery json</tt><em>(2.2)</em> - jquery/js/jquery.json-2.2.js</li>
</ul>
    
<h3>What parameters does it take?</h3>
<ul>
	<li><em>(optional) </em><tt>exclude</tt> - use comma seperated value(CSV) list of scripts you would like to exclude. <code>&#039;jquery.ui.nestedSortable.js,jquery.json-2.2.js&#039;</code></li>
	<li><em>(optional) </em><tt>append</tt> - use comma seperated value(CSV) list of script paths you would like to append. <code>&#039;/uploade/jquery.ui.nestedSortable.js,http://code.jquery.com/jquery-1.7.1.min.js&#039;</code></li>
	<li><em>(optional) </em><tt>cdn</tt> - cdn=&#039;true&#039; will insert jQuery and jQueryUI Frameworks using Google&#039;s Content Delivery Netwok. Default is false.</li>
	<li><em>(optional) </em><tt>ssl</tt> - use to use the ssl_url as the base path.</li>
	<li><em>(optional) </em><tt>custom_root</tt> - use to set any base path wished.<code>custom_root=&#039;http://test.domain.com/&#039;</code> <br/>NOTE: overwrites ssl option and works with the cdn option</li>
	<li><em>(optional)</em> <tt>assign</tt> - Assign the results to the named smarty variable.</li>
	</ul>

';
$lang['admin']['of'] = 'kokku';
$lang['admin']['first'] = 'Esimene';
$lang['admin']['last'] = 'Viimane';
$lang['admin']['adminspecialgroup'] = 'Warning: Members of this group automatically have all permissions';
$lang['admin']['disablesafemodewarning'] = 'Disable admin safe mode warning';
$lang['admin']['date_format_string'] = 'Date Format String';
$lang['admin']['date_format_string_help'] = '<em>strftime</em> formatted date format string.  Try googling &#039;strftime&#039;';
$lang['admin']['last_modified_at'] = 'Viimati muudetud';
$lang['admin']['last_modified_by'] = 'Viimati muutis';
$lang['admin']['read'] = 'Loetav';
$lang['admin']['write'] = 'Kirjutatav';
$lang['admin']['execute'] = 'T&auml;idetav';
$lang['admin']['group'] = 'Grupp';
$lang['admin']['other'] = 'Muu';
$lang['admin']['event_desc_moduleupgraded'] = 'Saadetud p&auml;rast mooduli uuendamist.';
$lang['admin']['event_help_moduleupgraded'] = '<p>Sent after a module is upgraded.</p>';
$lang['admin']['event_desc_moduleinstalled'] = 'Saadetud p&auml;rast mooduli installeerimist.';
$lang['admin']['event_help_moduleinstalled'] = '<p>Sent after a module is installed.</p>';
$lang['admin']['event_desc_moduleuninstalled'] = 'Saadetud p&auml;rast mooduli eemaldamist.';
$lang['admin']['event_help_moduleuninstalled'] = '<p>Sent after a module is uninstalled.</p>';
$lang['admin']['event_desc_edituserdefinedtagpost'] = 'Saadetud p&auml;rast kasutaja defineeritud t&auml;hise uuendamist.';
$lang['admin']['event_help_edituserdefinedtagpost'] = '<p>Sent after a user defined tag is updated.</p>';
$lang['admin']['event_desc_edituserdefinedtagpre'] = 'Saadetud enne kasutaja defineeritud t&auml;hise uuendamist.';
$lang['admin']['event_help_edituserdefinedtagpre'] = '<p>Sent prior to a user defined tag update.</p>';
$lang['admin']['event_desc_deleteuserdefinedtagpre'] = 'Saadetud enne kasutaja defineeritud t&auml;hise kustutamist.';
$lang['admin']['event_help_deleteuserdefinedtagpre'] = '<p>Sent prior to deleting a user defined tag.</p>';
$lang['admin']['event_desc_deleteuserdefinedtagpost'] = 'Saadetud p&auml;rast kasutaja defineeritud t&auml;hise kustutamist.';
$lang['admin']['event_help_deleteuserdefinedtagpost'] = '<p>Sent after a user defined tag is deleted.</p>';
$lang['admin']['event_desc_adduserdefinedtagpost'] = 'Saadetud p&auml;rast kasutaja defineeritud t&auml;hise sisestamist.';
$lang['admin']['event_help_adduserdefinedtagpre'] = '<p>Sent after a user defined tag is inserted.</p>';
$lang['admin']['event_desc_adduserdefinedtagpre'] = 'Saadetud enne kasutaja defineeritud t&auml;hise sisestamist.';
$lang['admin']['event_help_adduserdefinedtagpost'] = '<p>Sent prior to a user defined tag insert.</p>';
$lang['admin']['global_umask'] = 'Faili Loomise Mask (umask)';
$lang['admin']['errorcantcreatefile'] = 'Faili loomine eba&otilde;nnestus (probleem &otilde;igustega?)';
$lang['admin']['errormoduleversionincompatible'] = 'Moodul &uuml;hildu selle CMS&#039;i versiooniga';
$lang['admin']['errormodulenotloaded'] = 'Sisemine viga, moodulit ei laetud';
$lang['admin']['errormodulenotfound'] = 'Sisemine viga, ei suutnud leida moodulit';
$lang['admin']['errorinstallfailed'] = 'Mooduli installeerimine eba&otilde;nnestus';
$lang['admin']['errormodulewontload'] = 'probleem mooduli laadimisega';
$lang['admin']['frontendlang'] = 'Algne kasutajaliidese keel';
$lang['admin']['info_edituser_password'] = 'Kasutaja parooli muutmiseks kirjuta see siia v&auml;ljale';
$lang['admin']['info_edituser_passwordagain'] = 'Kasutaja parooli muutmiseks kirjuta see siia v&auml;ljale';
$lang['admin']['originator'] = 'Originaator';
$lang['admin']['module_name'] = 'Mooduli nimi';
$lang['admin']['event_name'] = 'S&uuml;ndmuse nimi';
$lang['admin']['event_description'] = 'S&uuml;ndmuse kirjeldus';
$lang['admin']['error_delete_default_parent'] = 'Pealehe vanemat ei saa kustutada.';
$lang['admin']['jsdisabled'] = 'Vabandust, selle funktsiooni kasutamiseks peab sul olema Javascript lubatud.';
$lang['admin']['order'] = 'J&auml;rjesta';
$lang['admin']['reorderpages'] = 'Muuda sisu j&auml;rjekorda';
$lang['admin']['reorder'] = 'Muuda j&auml;rjekorda';
$lang['admin']['page_reordered'] = 'Leht j&auml;rjestati edukalt &uuml;mber.';
$lang['admin']['pages_reordered'] = 'Lehed j&auml;rjestati edukalt &uuml;mber.';
$lang['admin']['sibling_duplicate_order'] = 'Kaks alamlehte ei saa j&auml;rjekorras olla samal kohal. Lehtede j&auml;rjekorda ei muudetud.';
$lang['admin']['no_orders_changed'] = 'Sa tahtsid muuta lehtede j&auml;rjekorda, kuid ei j&auml;rjestanud neid &uuml;mber. Lehtede j&auml;rjekorda ei muudetud.';
$lang['admin']['order_too_small'] = 'Lehe j&auml;rjekorranumber ei saa olla 0. Lehtede j&auml;rjekorda ei muudetud.';
$lang['admin']['order_too_large'] = 'Lehe j&auml;rjekorranumber ei saa olla suurem kui lehtede arv samal tasandil. Lehtede j&auml;rjekorda ei muudetud.';
$lang['admin']['user_tag'] = 'Kasutaja T&auml;his';
$lang['admin']['add'] = 'Lisa';
$lang['admin']['CSS'] = 'CSS ';
$lang['admin']['about'] = 'Info';
$lang['admin']['action'] = 'Tegevus';
$lang['admin']['actionstatus'] = 'Tegevus/Staatus';
$lang['admin']['active'] = 'Aktiivne';
$lang['admin']['addcontent'] = 'Lisa Sisu (Uus leht)';
$lang['admin']['cantremove'] = 'Eemaldamist ei saa teostada';
$lang['admin']['changepermissions'] = 'Muuda &Otilde;igusi';
$lang['admin']['changepermissionsconfirm'] = 'OLE ETTEVAATLIK\n\nSee tegevus proovib, kas k&otilde;ik failid, millest moodul koosneb, on serveri poolt kirjutatavad.\nKas soovid j&auml;tkata?';
$lang['admin']['contentadded'] = 'Sisu lisatud andmebaasi.';
$lang['admin']['contentupdated'] = 'Sisu uuendatud.';
$lang['admin']['contentdeleted'] = 'Sisu andmebaasist kustutatud.';
$lang['admin']['success'] = 'Valmis';
$lang['admin']['addcss'] = 'Lisa Stiilileht';
$lang['admin']['addgroup'] = 'Lisa Uus Grupp';
$lang['admin']['additionaleditors'] = 'Teised toimetajad';
$lang['admin']['addtemplate'] = 'Lisa Uus Mall';
$lang['admin']['adduser'] = 'Lisa Uus Kasutaja';
$lang['admin']['addusertag'] = 'Lisa Kasutaja Defineeritud T&auml;his';
$lang['admin']['adminaccess'] = 'Ligip&auml;&auml;s admini sisselogimisele';
$lang['admin']['adminlog'] = 'Administraatori Logi';
$lang['admin']['adminlogcleared'] = 'Aministraatori logi puhastati edukalt';
$lang['admin']['adminlogempty'] = 'Administraatori logi on t&uuml;hi';
$lang['admin']['adminsystemtitle'] = 'CMS Admin. S&uuml;steem';
$lang['admin']['adminpaneltitle'] = 'CMS Made Simple Administraatori paneel';
$lang['admin']['advanced'] = 'T&auml;psemalt';
$lang['admin']['aliasalreadyused'] = 'Alias on juba &uuml;he teise lehe poolt kasutusel. Muuda &quot;Lehe Alias&quot; vahelehel &quot;Valikud&quot; millegiks muuks.';
$lang['admin']['aliasmustbelettersandnumbers'] = 'Alias peab koosnema t&auml;htedest ja numbritest';
$lang['admin']['aliasnotaninteger'] = 'Alias ei tohi olla t&auml;isarv (integer)';
$lang['admin']['allpagesmodified'] = 'K&otilde;ik lehek&uuml;ljed muudetud!';
$lang['admin']['assignments'] = 'M&auml;&auml;ra Kasutajad';
$lang['admin']['associationexists'] = 'See seos juba eksisteerib';
$lang['admin']['autoinstallupgrade'] = 'Automaatselt installeeri v&otilde;i uuenda';
$lang['admin']['back'] = 'Tagasi Men&uuml;&uuml;sse';
$lang['admin']['backtoplugins'] = 'Tagasi Pluginate nimekirja';
$lang['admin']['cancel'] = 'T&uuml;hista';
$lang['admin']['cantchmodfiles'] = 'Couldn&#039;t change permissions on some files';
$lang['admin']['cantremovefiles'] = 'Probleem failide kustutamisega (&otilde;igused?)';
$lang['admin']['confirmcancel'] = 'Oled kindel, et soovid oma muutused t&uuml;histada? Kliki OK t&uuml;histamiseks. Kliki Cancel toimetamise j&auml;tkamiseks.';
$lang['admin']['canceldescription'] = 'T&uuml;hista muutused';
$lang['admin']['clearadminlog'] = 'T&uuml;hjenda Administraatori Logi';
$lang['admin']['code'] = 'Kood';
$lang['admin']['confirmdefault'] = 'Oled kindel, et soovid muuta Kodulehe avalehte?';
$lang['admin']['confirmdeletedir'] = 'Oled kindel, et soovid kustutada selle kataloogi ja kogu selle sisu?';
$lang['admin']['content'] = 'Sisu';
$lang['admin']['contentmanagement'] = 'Sisu Haldamine';
$lang['admin']['contenttype'] = 'Sisu T&uuml;&uuml;p';
$lang['admin']['copy'] = 'Kopeeri';
$lang['admin']['copytemplate'] = 'Kopeeri Mall';
$lang['admin']['create'] = 'Loo';
$lang['admin']['createnewfolder'] = 'Loo uus kataloog';
$lang['admin']['cssalreadyused'] = 'CSS nimi on juba kasutusel';
$lang['admin']['cssmanagement'] = 'CSS Haldus';
$lang['admin']['currentassociations'] = 'Olemasolevad Seosed';
$lang['admin']['currentdirectory'] = 'Oled kataloogis';
$lang['admin']['currentgroups'] = 'Olemasolevad Grupid';
$lang['admin']['currentpages'] = 'Praegused Lehed';
$lang['admin']['currenttemplates'] = 'Olemasolevad Mallid';
$lang['admin']['currentusers'] = 'Olemasolevad Kasutajad';
$lang['admin']['custom404'] = '404 veateade';
$lang['admin']['database'] = 'Andmebaas';
$lang['admin']['databaseprefix'] = 'Andmebaasi prefiks';
$lang['admin']['databasetype'] = 'Andmebaasi t&uuml;&uuml;p';
$lang['admin']['date'] = 'Kuup&auml;ev';
$lang['admin']['default'] = 'Vaikimisi';
$lang['admin']['delete'] = 'Kustuta';
$lang['admin']['deleteconfirm'] = 'Oled kindel, et tahad kustutada?';
$lang['admin']['deleteassociationconfirm'] = 'Are you sure you want to delete association to - %s - ?';
$lang['admin']['deletecss'] = 'Kustuta CSS';
$lang['admin']['dependencies'] = 'S&otilde;ltujad';
$lang['admin']['description'] = 'Kirjeldus';
$lang['admin']['directoryexists'] = 'Kataloog on juba olemas.';
$lang['admin']['down'] = 'Alla';
$lang['admin']['edit'] = 'Muuda';
$lang['admin']['editconfiguration'] = 'Muuda seadistusi';
$lang['admin']['editcontent'] = 'Muuda sisu';
$lang['admin']['editcss'] = 'Muuda stiililehte';
$lang['admin']['editcsssuccess'] = 'Stiilileht uuendatud';
$lang['admin']['editgroup'] = 'Muuda gruppi';
$lang['admin']['editpage'] = 'Muuda lehek&uuml;lge';
$lang['admin']['edittemplate'] = 'Muuda malli';
$lang['admin']['edittemplatesuccess'] = 'Mall uuendatud';
$lang['admin']['edituser'] = 'Muuda Kasutajat';
$lang['admin']['editusertag'] = 'Muuda Kasutaja Defineeritud T&auml;hist';
$lang['admin']['usertagadded'] = 'Kasutaja Defineeritud T&auml;his lisatud.';
$lang['admin']['usertagupdated'] = 'Kasutaja Defineeritud T&auml;his uuendatud.';
$lang['admin']['usertagdeleted'] = 'Kasutaja Defineeritud T&auml;his kustutatud.';
$lang['admin']['email'] = 'Meiliaadress';
$lang['admin']['errorattempteddowngrade'] = 'elle mooduli installeerimine t&auml;hendaks s&uuml;steemi taandarengut.  Operatsioon katkestatud.';
$lang['admin']['errorchildcontent'] = 'Sisu alla kuulub alamsisu. Palun eemalda alamsisu k&otilde;igepealt.';
$lang['admin']['errorcopyingtemplate'] = 'Viga malli kopeerimisel';
$lang['admin']['errorcouldnotparsexml'] = 'Viga XML faili s&otilde;elumisel. Palun veendu, et laed &uuml;les .xml-laiendiga faili, mitte .tar.gz v&otilde;i -zip faili.';
$lang['admin']['errorcreatingassociation'] = 'Viga seose loomisel';
$lang['admin']['errorcssinuse'] = 'See stiilileht on m&otilde;ne malli v&otilde;i lehe poolt kasutusel. Eemalda k&otilde;igepealt need seosed.';
$lang['admin']['errordefaultpage'] = 'Avalehte ei saa kustutada. Palun vali esmalt m&otilde;ni teine leht avaleheks.';
$lang['admin']['errordeletingassociation'] = 'Viga seose kustutamisel';
$lang['admin']['errordeletingcss'] = 'Viga CSS&#039;i eemaldamisel';
$lang['admin']['errordeletingdirectory'] = 'Kataloogi kustutamine eba&otilde;nnestus. Probleem &otilde;igustega?';
$lang['admin']['errordeletingfile'] = 'Faili kustutamine eba&otilde;nnestus. Probleem &otilde;igustega?';
$lang['admin']['errordirectorynotwritable'] = 'Sellesse kataloogi kirjutamiseks ei ole &otilde;igusi';
$lang['admin']['errordtdmismatch'] = 'DTD Versioon puudub v&otilde;i ei &uuml;hildu XML failiga';
$lang['admin']['errorgettingcssname'] = 'Viga stiililehe nime leidmisel';
$lang['admin']['errorgettingtemplatename'] = 'Viga malli nime ledimisel';
$lang['admin']['errorincompletexml'] = 'XML-fail ei ole &uuml;hilduv v&otilde;i on vigane';
$lang['admin']['uploadxmlfile'] = 'Installeeri moodul XML-faili kaudu';
$lang['admin']['cachenotwritable'] = 'Vahem&auml;lu kataloog ei ole kirjutatav. Vahem&auml;lu t&uuml;hjendamine ei t&ouml;&ouml;ta. Palun anna tmp/cache kataloogile k&otilde;ik read/write/execute &otilde;igused (chmod 777). V&otilde;ibolla tuleb ka safe mode v&auml;lja l&uuml;litada.';
$lang['admin']['error_nomodules'] = '&Uuml;htegi moodluit pole paigaldatud! Kontrolli Laiendused > Moodulid';
$lang['admin']['modulesnotwritable'] = 'Moodulite kataloog ei ole kirjutatav, kui sa soovid installeerida mooduleid laadides &uuml;les XML-faili, siis pead andma moodulite kataloogile read/write/execute &otilde;igused (chmod 777).';
$lang['admin']['noxmlfileuploaded'] = 'Faili ei laetud &uuml;les. Mooduli installeerimiseks XML/&#039;i kaudu pead valima oma arvutist mooduli -xml faili.';
$lang['admin']['errorinsertingcss'] = 'Viga stiililehe sisestamisel';
$lang['admin']['errorinsertinggroup'] = 'Viga grupi sisestamisel';
$lang['admin']['errorinsertingtag'] = 'Viga kasutaja t&auml;hise sisestamisel';
$lang['admin']['errorinsertingtemplate'] = 'Viga malli sisestamisel';
$lang['admin']['errorinsertinguser'] = 'Viga kasutaja sisestamisel';
$lang['admin']['errornofilesexported'] = 'Viga xml-faili ekspordil';
$lang['admin']['errorretrievingcss'] = 'Viga stiililehe taastamisel';
$lang['admin']['errorretrievingtemplate'] = 'Viga malli taastamisel';
$lang['admin']['errortemplateinuse'] = '&Uuml;ks v&otilde;i mitu lehte kasutavad seda malli. Palun eemalda need, v&otilde;i m&auml;&auml;ra neile teine mall.';
$lang['admin']['errorupdatingcss'] = 'Viga stiililehe uuendamisel';
$lang['admin']['errorupdatinggroup'] = 'Viga grupi uuendamisel';
$lang['admin']['errorupdatingpages'] = 'Viga lehtede uuendamisel';
$lang['admin']['errorupdatingtemplate'] = 'Viga malli uuendamisel';
$lang['admin']['errorupdatinguser'] = 'Viga kasutaja uuendamisel';
$lang['admin']['errorupdatingusertag'] = 'Viga kasutaja t&auml;hise uuendamisel';
$lang['admin']['erroruserinuse'] = 'Sellele kasutajale kuuluvad veel m&otilde;ned sisulehed. Palun m&auml;&auml;ra nende omanikuks m&otilde;ni teine kasutaja, ning siis kustuta k&auml;esolev kasutaja.';
$lang['admin']['eventhandlers'] = 'S&uuml;ndmuste Haldur';
$lang['admin']['eventhandler'] = 'Event Handlers';
$lang['admin']['editeventhandler'] = 'Muuda S&uuml;ndmuse Handlerit';
$lang['admin']['eventhandlerdescription'] = 'Seo kasutaja t&auml;hised s&uuml;ndmustega';
$lang['admin']['export'] = 'Ekspordi';
$lang['admin']['event'] = 'S&uuml;ndmus';
$lang['admin']['false'] = 'Ei Kehti';
$lang['admin']['settrue'] = 'Muuda kehtivaks';
$lang['admin']['filecreatedirnodoubledot'] = 'Kataloogi nimi ei tohi sisaldada m&auml;rke: &#039;..&#039;.';
$lang['admin']['filecreatedirnoname'] = 'Ilma nimeta kataloogi luua ei saa.';
$lang['admin']['filecreatedirnoslash'] = 'Directory cannot contain &#039;/&#039; or &#039;\&#039;.';
$lang['admin']['filemanagement'] = 'Failide Haldamine';
$lang['admin']['filename'] = 'Failinimi';
$lang['admin']['filenotuploaded'] = 'Faili ei saadud &uuml;les laadida. Probleem &otilde;igustega?';
$lang['admin']['filesize'] = 'Faili Suurus';
$lang['admin']['firstname'] = 'Eesnimi';
$lang['admin']['groupmanagement'] = 'Grupi Haldamine';
$lang['admin']['grouppermissions'] = 'Grupi &Otilde;igused';
$lang['admin']['handler'] = 'Handler (kasutaja defineeritud t&auml;his)';
$lang['admin']['headtags'] = 'Pea T&auml;hised';
$lang['admin']['help'] = 'Abi';
$lang['admin']['new_window'] = 'avaneb uues aknas';
$lang['admin']['helpwithsection'] = '%s Abi';
$lang['admin']['helpaddtemplate'] = 'p>Mall kotrollib sinu Kodulehe sisu paiknemist.</p><p>Koosta siin Kodulehe k&uuml;ljendus. Mitmete Kodulehe elementide v&auml;limuse kontrollimiseks lisa CSS Stylesheet-sektsioonis.</p>';
$lang['admin']['helplisttemplate'] = '<p>Siin saad muuta, kustutada ja luua Malle.</p><p>Uue Malli loomiseks kliki nupul <u>Lisa Uus Mall</u>.</p><p>Kui soovid, et k&otilde;ik sinu sisu lehed kasutaksid sama Malli, kliki nupul <u>M&auml;&auml;ra Kogu Sisule</u>.</p><p>Kui soovid m&otilde;nest Mallist duplikaati, kliki nupul <u>Kopeeri</u> ja sisesta duplikaadi nimi.</p>';
$lang['admin']['home'] = 'Kodu';
$lang['admin']['homepage'] = 'Koduleht';
$lang['admin']['hostname'] = 'Hosti nimi';
$lang['admin']['idnotvalid'] = 'Antud id on vigane';
$lang['admin']['imagemanagement'] = 'Pildihaldur';
$lang['admin']['informationmissing'] = 'Informatsioon puudub';
$lang['admin']['install'] = 'Installeeri';
$lang['admin']['invalidcode'] = 'Sisestatud kood on vigane.';
$lang['admin']['illegalcharacters'] = 'Vigased t&auml;hem&auml;rgid v&auml;ljas %s.';
$lang['admin']['invalidcode_brace_missing'] = 'Sulgude arv ei ole v&otilde;rdne';
$lang['admin']['invalidtemplate'] = 'Mall on vigane';
$lang['admin']['itemid'] = 'Eseme ID';
$lang['admin']['itemname'] = 'Eseme nimi';
$lang['admin']['language'] = 'Keel';
$lang['admin']['lastname'] = 'Perekonnanimi';
$lang['admin']['logout'] = 'Logi v&auml;lja';
$lang['admin']['loginprompt'] = 'Administraatori paneelile ligip&auml;&auml;suks sisesta kehtiv kasutajanimi.';
$lang['admin']['logintitle'] = 'CMS Made Simple Administraatori sisselogimine';
$lang['admin']['menutext'] = 'Men&uuml;&uuml; Tekst';
$lang['admin']['missingparams'] = 'M&otilde;ned parameetrid olid puudu v&otilde;i vigased';
$lang['admin']['modifygroupassignments'] = 'Muuda Grupi M&auml;&auml;rusi';
$lang['admin']['moduleabout'] = '%s mooduli info';
$lang['admin']['modulehelp'] = '%s mooduli abi';
$lang['admin']['msg_defaultcontent'] = 'Kirjuta siia kood, mis peaks ilmnema k&otilde;ikide uute lehtede vaikimisi sisuna';
$lang['admin']['msg_defaultmetadata'] = 'Kirjuta siia kood, mis peaks ilmnema k&otilde;ikide uute lehtede metadata sektsioonis';
$lang['admin']['wikihelp'] = 'Kommuuni abi';
$lang['admin']['moduleinstalled'] = 'Moodul on juba installeeritud';
$lang['admin']['moduleinterface'] = '%s kasutajaliides';
$lang['admin']['modules'] = 'Moodulid';
$lang['admin']['move'] = 'Liiguta';
$lang['admin']['name'] = 'Nimi';
$lang['admin']['needpermissionto'] = 'Vajad &#039;%s&#039; &otilde;igust, et seda funktsiooni rakendada.';
$lang['admin']['needupgrade'] = 'Vajab Uuendusi';
$lang['admin']['newtemplatename'] = 'Uue malli nimi';
$lang['admin']['next'] = 'J&auml;rgmine';
$lang['admin']['noaccessto'] = 'Puudub ligip&auml;&auml;s: %s';
$lang['admin']['nocss'] = 'Stiililehte ei ole';
$lang['admin']['noentries'] = 'Sissekandeid ei ole';
$lang['admin']['nofieldgiven'] = '%s pole antud!';
$lang['admin']['nofiles'] = 'Faile ei ole';
$lang['admin']['nopasswordmatch'] = 'Paroolid ei kattu';
$lang['admin']['norealdirectory'] = 'Kataloogi ei leitud serverist';
$lang['admin']['norealfile'] = 'Faili ei leitud serverist';
$lang['admin']['notinstalled'] = 'Installeerimata';
$lang['admin']['overwritemodule'] = 'Kirjuta olemasolevad moodulid &uuml;le';
$lang['admin']['owner'] = 'Omanik';
$lang['admin']['pagealias'] = 'Lehe Alias';
$lang['admin']['content_id'] = 'Sisu ID';
$lang['admin']['pagedefaults'] = 'Lehe vaikimisi seaded';
$lang['admin']['pagedefaultsdescription'] = 'Sea vaikimisi v&auml;&auml;rtused uutele lehtedele';
$lang['admin']['parent'] = 'Vanem';
$lang['admin']['password'] = 'Salas&otilde;na';
$lang['admin']['passwordagain'] = 'Salas&otilde;na (uuesti)';
$lang['admin']['permission'] = '&Otilde;igus';
$lang['admin']['permissions'] = '&Otilde;igused';
$lang['admin']['permissionschanged'] = '&Otilde;igused uuendatud.';
$lang['admin']['pluginabout'] = '%s t&auml;hise info';
$lang['admin']['pluginhelp'] = '%s t&auml;hise abi';
$lang['admin']['pluginmanagement'] = 'Pluginate haldamine';
$lang['admin']['prefsupdated'] = 'Eelistused on uuendatud.';
$lang['admin']['accountupdated'] = 'Kasutaja konto on uuendatud.';
$lang['admin']['preview'] = 'Eelvaade';
$lang['admin']['previewdescription'] = 'Vaata muutusi';
$lang['admin']['previous'] = 'Eelmine';
$lang['admin']['remove'] = 'Eemalda';
$lang['admin']['removeconfirm'] = 'Eemaldan paigaldusest l&otilde;plikult k&otilde;ik failid, millest see moodul koosneb.\nOled kindel, et soovid j&auml;tkata?';
$lang['admin']['removecssassociation'] = 'Eemalda stiililehe seos';
$lang['admin']['saveconfig'] = 'Salvesta konfiguratsioon';
$lang['admin']['send'] = 'Saada';
$lang['admin']['setallcontent'] = 'M&auml;&auml;ra k&otilde;ikidele lehtedele';
$lang['admin']['setallcontentconfirm'] = 'Oled kindel, et tahad, et k&otilde;ik lehed kasutaksid seda malli?';
$lang['admin']['showinmenu'] = 'N&auml;ita Men&uuml;&uuml;s';
$lang['admin']['use_name'] = 'In the parent page dropdown, show the page title instead of the menu text';
$lang['admin']['showsite'] = 'N&auml;ita Kodulehte';
$lang['admin']['sitedownmessage'] = 'Maas oleva kodulehe teade';
$lang['admin']['siteprefs'] = 'Globaalsed seaded';
$lang['admin']['status'] = 'Staatus';
$lang['admin']['stylesheet'] = 'Stiilileht';
$lang['admin']['submit'] = 'Saada';
$lang['admin']['submitdescription'] = 'Salvesta muutused';
$lang['admin']['tags'] = 'T&auml;hised';
$lang['admin']['template'] = 'Mall';
$lang['admin']['templateexists'] = 'Sellise nimega mall juba eksisteerib';
$lang['admin']['templatemanagement'] = 'Mallide haldamine';
$lang['admin']['title'] = 'Pealkiri';
$lang['admin']['tools'] = 'T&ouml;&ouml;riistad';
$lang['admin']['true'] = 'Kehtib';
$lang['admin']['setfalse'] = 'Muuda kehtetuks';
$lang['admin']['type'] = 'T&uuml;&uuml;p';
$lang['admin']['typenotvalid'] = 'T&uuml;&uuml;p ei ole sobiv';
$lang['admin']['uninstall'] = 'Eemalda';
$lang['admin']['uninstallconfirm'] = 'Oled kindel, et soovid eemaldada mooduli:';
$lang['admin']['up'] = '&Uuml;les';
$lang['admin']['upgrade'] = 'Uuenda';
$lang['admin']['upgradeconfirm'] = 'Oled sa kindel, et soovid seda uuendada?';
$lang['admin']['uploadfile'] = 'Lae &uuml;les';
$lang['admin']['url'] = 'Aadress';
$lang['admin']['useadvancedcss'] = 'Kasuta t&auml;psemat stiililehtede haldamist';
$lang['admin']['user'] = 'Kasutaja';
$lang['admin']['userdefinedtags'] = 'Kasutaja Defineeritud T&auml;hised';
$lang['admin']['usermanagement'] = 'Kasutajate Haldamine';
$lang['admin']['username'] = 'Kasutajanimi';
$lang['admin']['usernameincorrect'] = 'Vale kasutajanimi v&otilde;i salas&otilde;na';
$lang['admin']['userprefs'] = 'Kasutaja Eelistused';
$lang['admin']['useraccount'] = 'Kasutaja konto';
$lang['admin']['lang_settings_legend'] = 'Keelega seotud seaded';
$lang['admin']['content_editor_legend'] = 'Sisu redaktori seaded';
$lang['admin']['admin_layout_legend'] = 'Admin paigutuse seaded';
$lang['admin']['usersassignedtogroup'] = 'Kasutajad m&auml;&auml;ratud gruppi %s';
$lang['admin']['usertagexists'] = 'Sellise nimega t&auml;his juba eksisteerib. Palun vali teistsugune nimi.';
$lang['admin']['usewysiwyg'] = 'Kasuta WYSIWYG redaktorit sisu jaoks.';
$lang['admin']['version'] = 'Versioon';
$lang['admin']['view'] = 'Vaata';
$lang['admin']['welcomemsg'] = 'Tere tulemast %s';
$lang['admin']['directoryabove'] = 'praeguses tasemest k&otilde;rgem kataloog';
$lang['admin']['nodefault'] = 'Vaikimisi ei ole valitud';
$lang['admin']['blobexists'] = 'Sellise nimega globaalne sisuplokk juba eksisteerib.';
$lang['admin']['blobmanagement'] = 'Globaalsete sisuplokkide haldamine';
$lang['admin']['errorinsertingblob'] = 'Globaalse sisuploki sisestamisel esines viga';
$lang['admin']['addhtmlblob'] = 'Lisa globaalne sisuplokk';
$lang['admin']['edithtmlblob'] = 'Muuda globaalset sisuplokki';
$lang['admin']['edithtmlblobsuccess'] = 'Globaalne sisuplokk uuendatud';
$lang['admin']['tagtousegcb'] = 'T&auml;his selle ploki kasutamiseks';
$lang['admin']['gcb_wysiwyg'] = 'Luba GCB WYSIWYG redaktor';
$lang['admin']['gcb_wysiwyg_help'] = 'Luba WYSIWYG redaktori kasutamist globaalsete sisuplokkide muutmisel';
$lang['admin']['filemanager'] = 'Failihaldur';
$lang['admin']['imagemanager'] = 'Pildihaldur';
$lang['admin']['encoding'] = 'Kodeering';
$lang['admin']['clearcache'] = 'Puhasta vahem&auml;lu';
$lang['admin']['clear'] = 'Puhasta';
$lang['admin']['cachecleared'] = 'Vahem&auml;lu puhastatud';
$lang['admin']['apply'] = 'Rakenda';
$lang['admin']['applydescription'] = 'Salvesta muutused ja j&auml;tka toimetamist';
$lang['admin']['none'] = 'Puudub';
$lang['admin']['wysiwygtouse'] = 'Vali, millist WYSIWYG-liidest kasutada';
$lang['admin']['syntaxhighlightertouse'] = 'Vali s&uuml;ntaksi esiletooja kasutamiseks';
$lang['admin']['hasdependents'] = 'Olemas S&otilde;ltujad';
$lang['admin']['missingdependency'] = 'Puudub S&otilde;ltuvus';
$lang['admin']['minimumversion'] = 'Minimaalne versioon';
$lang['admin']['minimumversionrequired'] = 'Minimaalne n&otilde;utud CMSMS versioon';
$lang['admin']['maximumversion'] = 'Maksimaalne versioon';
$lang['admin']['maximumversionsupported'] = 'Maksimaalne toetatud CMSMS versioon';
$lang['admin']['depsformodule'] = '%s mooduli s&otilde;ltuvused';
$lang['admin']['installed'] = 'Installeeritud';
$lang['admin']['author'] = 'Autor';
$lang['admin']['changehistory'] = 'Muutuste ajalugu';
$lang['admin']['moduleerrormessage'] = '%s mooduli veateade';
$lang['admin']['moduleupgradeerror'] = 'Mooduli uuendamisel esines viga.';
$lang['admin']['moduleinstallmessage'] = '%s mooduli installeerimise teade';
$lang['admin']['moduleuninstallmessage'] = '%s mooduli eemaldamise teade';
$lang['admin']['admintheme'] = 'Administratsiooni teema';
$lang['admin']['addstylesheet'] = 'Lisa Stiilileht';
$lang['admin']['editstylesheet'] = 'Muuda Stiililehte';
$lang['admin']['addcssassociation'] = 'Lisa Stiililehe seos';
$lang['admin']['attachstylesheet'] = 'M&auml;&auml;ra see stiilileht';
$lang['admin']['attachtemplate'] = 'M&auml;&auml;ra sellele mallile';
$lang['admin']['main'] = 'Pealeht';
$lang['admin']['pages'] = 'Lehed';
$lang['admin']['page'] = 'Leht';
$lang['admin']['files'] = 'Failid';
$lang['admin']['layout'] = 'Kujundus';
$lang['admin']['usersgroups'] = 'Kasutajad &amp; Grupid';
$lang['admin']['extensions'] = 'Laiendused';
$lang['admin']['preferences'] = 'Eelistused';
$lang['admin']['admin'] = 'Kodulehe Admin';
$lang['admin']['viewsite'] = 'Vaata Kodulehte';
$lang['admin']['templatecss'] = 'M&auml;&auml;ra stiililehele malle';
$lang['admin']['plugins'] = 'Pluginad';
$lang['admin']['movecontent'] = 'Liiguta Lehti';
$lang['admin']['module'] = 'Moodul';
$lang['admin']['usertags'] = 'Kasutaja Defineeritud T&auml;hised';
$lang['admin']['htmlblobs'] = 'Globaalsed sisuplokid';
$lang['admin']['adminhome'] = 'Kodulehe Administreerimine';
$lang['admin']['liststylesheets'] = 'Stiililehed';
$lang['admin']['preferencesdescription'] = 'Siin saad sa muuta mitmeid terve Kodulehe kohta kehtivaid seadeid.';
$lang['admin']['adminlogdescription'] = 'N&auml;itab, mida, kes ja millal adminstraatoripaneelil tegi.';
$lang['admin']['mainmenu'] = 'Peamen&uuml;&uuml;';
$lang['admin']['users'] = 'Kasutajad';
$lang['admin']['usersdescription'] = 'Siin saad hallata kasutajaid.';
$lang['admin']['groups'] = 'Grupid';
$lang['admin']['groupsdescription'] = 'Siin saad hallata gruppe.';
$lang['admin']['groupassignments'] = 'Grupi M&auml;&auml;rangud';
$lang['admin']['groupassignmentdescription'] = 'Siin saad m&auml;&auml;rata kasutajaid gruppidesse.';
$lang['admin']['groupperms'] = 'Grupi &Otilde;igused';
$lang['admin']['grouppermsdescription'] = 'M&auml;&auml;ra gruppide &otilde;igusi ja juurdep&auml;&auml;sutasemeid';
$lang['admin']['pagesdescription'] = 'Lisa, muuda ja kustuta lehti.';
$lang['admin']['htmlblobdescription'] = 'Globaalsed sisuplokid on sisu t&uuml;kid, mida sa saad paigutada oma lehtedele v&otilde;i mallidele.';
$lang['admin']['templates'] = 'Mallid';
$lang['admin']['templatesdescription'] = 'Siin saad lisada ja muuta Malle. Mallid m&auml;&auml;ravad paljuski su Kodulehe v&auml;ljan&auml;gemise - ehk k&uuml;ljenduse/paigutuse.';
$lang['admin']['stylesheets'] = 'Stiililehed';
$lang['admin']['stylesheetsdescription'] = 'Lisa ja muuda stiililehti. Seda on v&otilde;imalik teha ilma malle muutmata. Stiililehed aitavad sul muuta tekstide suurust ja efekte, linkide v&auml;rve ja k&auml;itumist ning palju muid sinu kodulehe parameetreid.';
$lang['admin']['filemanagerdescription'] = 'Lae ja halda faile.';
$lang['admin']['imagemanagerdescription'] = 'Lae/muuda ja kustuta pilte.';
$lang['admin']['moduledescription'] = 'Moodulid laiendavad CMSMS-i funktsionaalsust. N&auml;iteks v&otilde;id lisada kalendri.';
$lang['admin']['tagdescription'] = 'T&auml;hised on v&auml;ikesed funktsioonid, mida saab lisada lehtedele v&otilde;i otse mallile. Sarnased sisuplokkidele, ainult et info asemel sisaldavad nad funktsioone.';
$lang['admin']['usertagdescription'] = 'T&auml;hised, mida saate ise luua ja muuta teatud toimingute tegemiseks, otse oma lehitsejast.';
$lang['admin']['installdirwarning'] = '<em><strong>Hoiatus:</strong></em> kataloog install eksisteerib ikka veel. Palun eemalda see t&auml;ielikult.';
$lang['admin']['subitems'] = 'Alamelemendid';
$lang['admin']['extensionsdescription'] = 'Moodulid, t&auml;hised ja muud vidinad.';
$lang['admin']['usersgroupsdescription'] = 'Kasutajate ja gruppide haldamine.';
$lang['admin']['layoutdescription'] = 'K&otilde;ik kodulehe kujundusega seotud valikud.';
$lang['admin']['admindescription'] = 'Kodulehe administreerimise funktsioonid.';
$lang['admin']['contentdescription'] = 'Lisa ja muuda sisu.';
$lang['admin']['enablecustom404'] = 'V&otilde;imalda 404 veateate muutmist';
$lang['admin']['enablesitedown'] = 'Avalda kodulehe hooldamise teade ja v&otilde;imalda teate muutmist';
$lang['admin']['enablewysiwyg'] = 'Luba WYSIWYG redaktor on maas oleva kodulehe teatel';
$lang['admin']['bookmarks'] = 'Otseteed';
$lang['admin']['user_created'] = 'Kohaldatud otseteed';
$lang['admin']['forums'] = 'Foorumid';
$lang['admin']['wiki'] = 'Wiki ';
$lang['admin']['irc'] = 'IRC ';
$lang['admin']['team'] = 'Meeskond';
$lang['admin']['module_help'] = 'Mooduli Abi';
$lang['admin']['managebookmarks'] = 'Halda Otseteid';
$lang['admin']['editbookmark'] = 'Muuda Otseteed';
$lang['admin']['addbookmark'] = 'Lisa Otsetee';
$lang['admin']['recentpages'] = 'Hiljutised lehed';
$lang['admin']['groupname'] = 'Grupi Nimi';
$lang['admin']['selectgroup'] = 'Vali Grupp';
$lang['admin']['updateperm'] = 'Uuenda &Otilde;igusi';
$lang['admin']['admincallout'] = 'Administratsiooni Otseteed';
$lang['admin']['showbookmarks'] = 'N&auml;ita Adminni Otseteid';
$lang['admin']['hide_help_links'] = 'Peida Abilingid';
$lang['admin']['hide_help_links_help'] = 'Lisa siia linnuke, et peita wiki ja Abi lingid lehtede p&auml;istes.';
$lang['admin']['showrecent'] = 'N&auml;ita Hiljuti Kasutatud Lehti';
$lang['admin']['attachtotemplate'] = 'Lisa Mallile';
$lang['admin']['attachstylesheets'] = 'Lisa Stiililehti';
$lang['admin']['indent'] = 'Koonda lehtede nimekirjad';
$lang['admin']['adminindent'] = 'Sisu vaatamine';
$lang['admin']['contract'] = 'Koonda Sekstioon';
$lang['admin']['expand'] = 'Laienda Sekstiooni';
$lang['admin']['expandall'] = 'Laienda k&otilde;iki Sektsioone';
$lang['admin']['contractall'] = 'Koonda k&otilde;ik Sektsioonid';
$lang['admin']['menu_bookmarks'] = '[+] ';
$lang['admin']['globalconfig'] = 'Globaalsed muutujad';
$lang['admin']['adminpaging'] = 'Lehelisti &uuml;hel lehel n&auml;idatavate lehtede arv';
$lang['admin']['nopaging'] = 'N&auml;ita K&otilde;iki Esemeid';
$lang['admin']['myprefs'] = 'Minu Eelistused';
$lang['admin']['myprefsdescription'] = 'Siin saad administreerimisliidest endale sobivamaks kohendada ning oma andmeid lisada/muuta.';
$lang['admin']['myaccount'] = 'Minu Konto';
$lang['admin']['myaccountdescription'] = 'Siin saad muuta oma isikliku konto andmeid.';
$lang['admin']['adminprefs'] = 'Kasutaja Eelistused';
$lang['admin']['adminprefsdescription'] = 'Siin saad muuta kodulehe adminsitreerimise eelistusi.';
$lang['admin']['managebookmarksdescription'] = 'Siin saad hallata oma admini otseteid.';
$lang['admin']['options'] = 'Valikud';
$lang['admin']['langparam'] = 'See parameeter m&auml;&auml;rab, mis keelt kasutatakse Kodulehe kasutajaliideses. K&otilde;ik moodulid ei toeta ega vaja seda.';
$lang['admin']['parameters'] = 'Parameetrid';
$lang['admin']['mediatype'] = 'Meedia T&uuml;&uuml;p';
$lang['admin']['media_query'] = 'Meedia P&auml;ring';
$lang['admin']['media_query_description'] = '<strong>M&auml;rkus:</strong> Kui kasutatakse Meedia P&auml;ringut, siis Meedia T&uuml;&uuml;p valikut ignoreeritakse.<br />Kasuta &uuml;ksk&otilde;ik millist kehtiv v&auml;ljendit nagu soovitatakse <a href="http://www.w3.org/TR/css3-mediaqueries/" rel="external" title="W3C">W3C</ a>.';
$lang['admin']['mediatype_'] = 'None set : m&otilde;jub k&otilde;ikjal';
$lang['admin']['mediatype_all'] = 'all : Sobib k&otilde;ikidele seadmetele.';
$lang['admin']['mediatype_aural'] = 'aural : M&otilde;eldud k&otilde;nes&uuml;ntesaatoritele.';
$lang['admin']['mediatype_braille'] = 'braille : M&otilde;eldud pimedate kirja kombitavatele seadmetele.';
$lang['admin']['mediatype_embossed'] = 'embossed : M&otilde;eldud pimedate kirja tr&uuml;kkivatele printeritele.';
$lang['admin']['mediatype_handheld'] = 'handheld : M&otilde;eldud pihuseadmetele';
$lang['admin']['mediatype_print'] = 'print : M&otilde;eldud printimiseks l&auml;bipaistmatule materjalile ja printimise eelvaates kuvatavatele dokumentidele.';
$lang['admin']['mediatype_projection'] = 'projection : M&otilde;eldud projitseerivatele presentatsioonidele, projektorid v&otilde;i kiled.';
$lang['admin']['mediatype_screen'] = 'screen : M&otilde;eldud eelk&otilde;ige v&auml;rvilistele arvutiekraanidele.';
$lang['admin']['mediatype_tty'] = 'tty : M&otilde;eldud fixeeritud sammuga t&auml;hem&auml;rgi v&otilde;rgustikule, nagu teletaip ja terminalid.';
$lang['admin']['mediatype_speech'] = 'speech : M&otilde;eldud k&otilde;nes&uuml;ntesaatoritele.';
$lang['admin']['mediatype_tv'] = 'tv : M&otilde;eldud TV-t&uuml;&uuml;pi seadmetele.';
$lang['admin']['assignmentchanged'] = 'Grupi M&auml;&auml;rangud on muudetud.';
$lang['admin']['stylesheetexists'] = 'Stiilileht juba eksisteerib';
$lang['admin']['errorcopyingstylesheet'] = 'Viga stiililehe kopeerimisel';
$lang['admin']['copystylesheet'] = 'Kopeeri Stiilileht';
$lang['admin']['newstylesheetname'] = 'Uue stiililehe nimi';
$lang['admin']['target'] = 'Sihtkoht';
$lang['admin']['xml'] = 'XML ';
$lang['admin']['xmlmodulerepository'] = 'ModuleRepository soap serveri aadress';
$lang['admin']['metadata'] = 'Meta-andmed';
$lang['admin']['globalmetadata'] = 'Globaalsed meta-andmed';
$lang['admin']['titleattribute'] = 'Kirjeldus (Tiitli atribuut)';
$lang['admin']['tabindex'] = 'Tablatuuri indeks';
$lang['admin']['accesskey'] = 'Ligip&auml;&auml;su v&otilde;ti';
$lang['admin']['sitedownwarning'] = '<strong>Hoiatus:</strong> Sinu Koduleht n&auml;itab hetkel &amp;quot;Koduleht hooldusteks maas&amp;quot; teadet.  Eemalda %s fail selle lahendamiseks.';
$lang['admin']['deletecontent'] = 'Kustuta Sisu';
$lang['admin']['deletepages'] = 'Kustuta need lehed?';
$lang['admin']['selectall'] = 'Vali K&otilde;ik';
$lang['admin']['selecteditems'] = 'Valitutega';
$lang['admin']['inactive'] = 'Deaktiveeri';
$lang['admin']['deletetemplates'] = 'Kustuta malle';
$lang['admin']['templatestodelete'] = 'Need mallid kustutatakse';
$lang['admin']['wontdeletetemplateinuse'] = 'Need mallid on kasutuses ja neid ei kustutata';
$lang['admin']['deletetemplate'] = 'Kustuta stiililehti';
$lang['admin']['stylesheetstodelete'] = 'Need stiililehed kustutatakse';
$lang['admin']['sitename'] = 'Kodulehe nimi';
$lang['admin']['goto'] = 'Tagasi kohta:';
$lang['admin']['siteadmin'] = 'Lehek&uuml;lje administraator';
$lang['admin']['images'] = 'Pildihaldur';
$lang['admin']['blobs'] = 'Globaalsed sisuplokid';
$lang['admin']['groupmembers'] = 'Grupi M&auml;&auml;rangud';
$lang['admin']['troubleshooting'] = '(veaotsing)';
$lang['admin']['event_desc_loginpost'] = 'Saadetud p&auml;rast kasutaja admin. paneeli sisselogimist';
$lang['admin']['event_desc_logoutpost'] = 'Saadetud p&auml;rast kasutaja admin. paneelist v&auml;ljalogimist';
$lang['admin']['event_desc_adduserpre'] = 'Saadetud enne uue kasutaja loomist';
$lang['admin']['event_desc_adduserpost'] = 'Saadetud p&auml;rast uue kasutaja loomist';
$lang['admin']['event_desc_edituserpre'] = 'Saadetud enne kasutaja andmete muutuste salvestatamist';
$lang['admin']['event_desc_edituserpost'] = 'Saadetud p&auml;rast kasutaja andmete muutuste salvestamist';
$lang['admin']['event_desc_deleteuserpre'] = 'Saadetud enne kasutaja s&uuml;steemist kustutamist';
$lang['admin']['event_desc_deleteuserpost'] = 'Saadetud p&auml;rast kasutaja s&uuml;steemist kustutamist';
$lang['admin']['event_desc_addgrouppre'] = 'Saadetud enne uue kasutajagrupi loomist';
$lang['admin']['event_desc_addgrouppost'] = 'Saadetud p&auml;rast uue kasutajagrupi loomist';
$lang['admin']['event_desc_changegroupassignpre'] = 'Saadetud enne gruppi m&auml;&auml;rangute salvestamist';
$lang['admin']['event_desc_changegroupassignpost'] = 'Saadetud peale grupi m&auml;&auml;rangute salvestamist';
$lang['admin']['event_desc_editgrouppre'] = 'Saadetud enne kasutajagrupi andmete muutuste salvestamist';
$lang['admin']['event_desc_editgrouppost'] = 'Saadetud p&auml;rast kasutajagrupi andmete muutuste salvestamist';
$lang['admin']['event_desc_deletegrouppre'] = 'Saadetud enne kasutajagrupi andmete muutuste salvestamist';
$lang['admin']['event_desc_deletegrouppost'] = 'Saadetud p&auml;rast kasutajagrupi andmete muutuste salvestamist';
$lang['admin']['event_desc_addstylesheetpre'] = 'Saadetud enne uue stiililehe loomist';
$lang['admin']['event_desc_addstylesheetpost'] = 'Saadetud p&auml;rast uue stiililehe loomist';
$lang['admin']['event_desc_editstylesheetpre'] = 'Saadetud enne stiililehe muutuste salvestamist';
$lang['admin']['event_desc_editstylesheetpost'] = 'Saadetud p&auml;rast stiililehe muutuste salvestamist';
$lang['admin']['event_desc_deletestylesheetpre'] = 'Saadetud enne stiililehe s&uuml;steemist kustutamist';
$lang['admin']['event_desc_deletestylesheetpost'] = 'Saadetud p&auml;rast stiililehe s&uuml;steemist kustutamist';
$lang['admin']['event_desc_addtemplatepre'] = 'Saadetud enne uue malli loomist';
$lang['admin']['event_desc_addtemplatepost'] = 'Saadetud p&auml;rast uue malli loomist';
$lang['admin']['event_desc_edittemplatepre'] = 'Saadetud enne malli muutuste salvestamist';
$lang['admin']['event_desc_edittemplatepost'] = 'Saadetud p&auml;rast malli muutuste salvestamist';
$lang['admin']['event_desc_deletetemplatepre'] = 'Saadetud enne malli s&uuml;steemist kustutamist';
$lang['admin']['event_desc_deletetemplatepost'] = 'Saadetud p&auml;rast malli s&uuml;steemist kustutamist';
$lang['admin']['event_desc_templateprecompile'] = 'Saadetud enne malli saatmist smartyle t&ouml;&ouml;tlemiseks';
$lang['admin']['event_desc_templatepostcompile'] = 'Saadetud p&auml;rast malli t&ouml;&ouml;tlemist smarty poolt';
$lang['admin']['event_desc_addglobalcontentpre'] = 'Saadetud enne uue globaalse sisuploki loomist';
$lang['admin']['event_desc_addglobalcontentpost'] = 'Saadetud p&auml;rast uue globaalse sisuploki loomist';
$lang['admin']['event_desc_editglobalcontentpre'] = 'Saadetud enne globaalse sisuploki muutuste salvestamist';
$lang['admin']['event_desc_editglobalcontentpost'] = 'Saadetud p&auml;rast globaalse sisuploki muutuste salvestamist';
$lang['admin']['event_desc_deleteglobalcontentpre'] = 'Saadetud enne globaalse sisuploki s&uuml;steemist kustutamist';
$lang['admin']['event_desc_deleteglobalcontentpost'] = 'Saadetud p&auml;rast globaalse sisuploki s&uuml;steemist kustutamist';
$lang['admin']['event_desc_globalcontentprecompile'] = 'Saadetud enne globaalse sisuploki saatmist smartyle t&ouml;&ouml;tlemiseks';
$lang['admin']['event_desc_globalcontentpostcompile'] = 'Saadetud p&auml;rast globaalse sisuploki t&ouml;&ouml;tlemist smarty poolt';
$lang['admin']['event_desc_contenteditpre'] = 'Saadetud enne sisu muutuste salvestamist';
$lang['admin']['event_desc_contenteditpost'] = 'Saadetud p&auml;rast sisu muutuste salvestamist';
$lang['admin']['event_desc_contentdeletepre'] = 'Saadetud enne sisu s&uuml;steemist kustutamist';
$lang['admin']['event_desc_contentdeletepost'] = 'Saadetud p&auml;rast sisu sisu s&uuml;steemist kustutamist';
$lang['admin']['event_desc_contentstylesheet'] = 'Saadetud enne stiililehe saatmist lehitsejale';
$lang['admin']['event_desc_contentprecompile'] = 'Saadetud enne sisu saatmist smartyle t&ouml;&ouml;tlemiseks';
$lang['admin']['event_desc_contentpostcompile'] = 'Saadetud p&auml;rast sisu t&ouml;&ouml;tlemist smarty poolt';
$lang['admin']['event_desc_contentpostrender'] = 'Saadetud enne kombineeritud html-i saatmist lehitsejale';
$lang['admin']['event_desc_smartyprecompile'] = 'Saadetud enne, kui &uuml;ksk&otilde;ik milline sisu on m&auml;&auml;ratud smartyle t&ouml;&ouml;tlemiseks';
$lang['admin']['event_desc_smartypostcompile'] = 'Saadetud p&auml;rast seda, kui &uuml;ksk&otilde;ik milline sisu on m&auml;&auml;ratud smartyle t&ouml;&ouml;tlemiseks';
$lang['admin']['event_help_loginpost'] = '<p>Sent after a user logs into the admin panel.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;user&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_logoutpost'] = '<p>Sent after a user logs out of the admin panel.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;user&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_adduserpre'] = '<p>Sent before a new user is created.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;user&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_adduserpost'] = '<p>Sent after a new user is created.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;user&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_edituserpre'] = '<p>Sent before edits to a user are saved.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;user&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_edituserpost'] = '<p>Sent after edits to a user are saved.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;user&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_deleteuserpre'] = '<p>Sent before a user is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;user&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_deleteuserpost'] = '<p>Sent after a user is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;user&#039; - Reference to the affected user object.</li>
</ul>
';
$lang['admin']['event_help_addgrouppre'] = '<p>Sent before a new group is created.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;group&#039; - Reference to the affected group object.</li>
</ul>
';
$lang['admin']['event_help_addgrouppost'] = '<p>Sent after a new group is created.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;group&#039; - Reference to the affected group object.</li>
</ul>
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
<ul>
<li>&#039;group&#039; - Reference to the affected group object.</li>
</ul>
';
$lang['admin']['event_help_editgrouppost'] = '<p>Sent after edits to a group are saved.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;group&#039; - Reference to the affected group object.</li>
</ul>
';
$lang['admin']['event_help_deletegrouppre'] = '<p>Sent before a group is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;group&#039; - Reference to the affected group object.</li>
</ul>
';
$lang['admin']['event_help_deletegrouppost'] = '<p>Sent after a group is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;group&#039; - Reference to the affected group object.</li>
</ul>
';
$lang['admin']['event_help_addstylesheetpre'] = '<p>Sent before a new stylesheet is created.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;stylesheet&#039; - Reference to the affected stylesheet object.</li>
</ul>
';
$lang['admin']['event_help_addstylesheetpost'] = '<p>Sent after a new stylesheet is created.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;stylesheet&#039; - Reference to the affected stylesheet object.</li>
</ul>
';
$lang['admin']['event_help_editstylesheetpre'] = '<p>Sent before edits to a stylesheet are saved.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;stylesheet&#039; - Reference to the affected stylesheet object.</li>
</ul>
';
$lang['admin']['event_help_editstylesheetpost'] = '<p>Sent after edits to a stylesheet are saved.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;stylesheet&#039; - Reference to the affected stylesheet object.</li>
</ul>
';
$lang['admin']['event_help_deletestylesheetpre'] = '<p>Sent before a stylesheet is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;stylesheet&#039; - Reference to the affected stylesheet object.</li>
</ul>
';
$lang['admin']['event_help_deletestylesheetpost'] = '<p>Sent after a stylesheet is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;stylesheet&#039; - Reference to the affected stylesheet object.</li>
</ul>
';
$lang['admin']['event_help_addtemplatepre'] = '<p>Sent before a new template is created.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;template&#039; - Reference to the affected template object.</li>
</ul>
';
$lang['admin']['event_help_addtemplatepost'] = '<p>Sent after a new template is created.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;template&#039; - Reference to the affected template object.</li>
</ul>
';
$lang['admin']['event_help_edittemplatepre'] = '<p>Sent before edits to a template are saved.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;template&#039; - Reference to the affected template object.</li>
</ul>
';
$lang['admin']['event_help_edittemplatepost'] = '<p>Sent after edits to a template are saved.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;template&#039; - Reference to the affected template object.</li>
</ul>
';
$lang['admin']['event_help_deletetemplatepre'] = '<p>Saadetud enne malli s&uuml;steemist kustutamist.</p>
<h4>Parameetrid</h4>
<ul>
<li>&#039;mall&#039; - Viide s&uuml;ndmusega seotud mallile.</li>
</ul>';
$lang['admin']['event_help_deletetemplatepost'] = '<p>Sent after a template is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;template&#039; - Reference to the affected template object.</li>
</ul>
';
$lang['admin']['event_help_templateprecompile'] = '<p>Sent before a template is sent to smarty for processing.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;template&#039; - Reference to the affected template text.</li>
</ul>
';
$lang['admin']['event_help_templatepostcompile'] = '<p>Sent after a template has been processed by smarty.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;template&#039; - Reference to the affected template text.</li>
</ul>
';
$lang['admin']['event_help_addglobalcontentpre'] = '<p>Sent before a new global content block is created.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;global_content&#039; - Reference to the affected global content block object.</li>
</ul>
';
$lang['admin']['event_help_addglobalcontentpost'] = '<p>Sent after a new global content block is created.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;global_content&#039; - Reference to the affected global content block object.</li>
</ul>
';
$lang['admin']['event_help_editglobalcontentpre'] = '<p>Sent before edits to a global content block are saved.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;global_content&#039; - Reference to the affected global content block object.</li>
</ul>
';
$lang['admin']['event_help_editglobalcontentpost'] = '<p>Sent after edits to a global content block are saved.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;global_content&#039; - Reference to the affected global content block object.</li>
</ul>
';
$lang['admin']['event_help_deleteglobalcontentpre'] = '<p>Sent before a global content block is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;global_content&#039; - Reference to the affected global content block object.</li>
</ul>
';
$lang['admin']['event_help_deleteglobalcontentpost'] = '<p>Sent after a global content block is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;global_content&#039; - Reference to the affected global content block object.</li>
</ul>
';
$lang['admin']['event_help_globalcontentprecompile'] = '<p>Sent before a global content block is sent to smarty for processing.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;global_content&#039; - Reference to the affected global content block text.</li>
</ul>
';
$lang['admin']['event_help_globalcontentpostcompile'] = '<p>Sent after a global content block has been processed by smarty.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;global_content&#039; - Reference to the affected global content block text.</li>
</ul>
';
$lang['admin']['event_help_contenteditpre'] = '<p>Sent before edits to content are saved.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;global_content&#039; - Reference to the affected content object.</li>
</ul>
';
$lang['admin']['event_help_contenteditpost'] = '<p>Sent after edits to content are saved.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the affected content object.</li>
</ul>
';
$lang['admin']['event_help_contentdeletepre'] = '<p>Sent before content is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the affected content object.</li>
</ul>
';
$lang['admin']['event_help_contentdeletepost'] = '<p>Sent after content is deleted from the system.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the affected content object.</li>
</ul>
';
$lang['admin']['event_help_contentstylesheet'] = '<p>Sent before the sytlesheet is sent to the browser.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the affected stylesheet text.</li>
</ul>
';
$lang['admin']['event_help_contentprecompile'] = '<p>Sent before content is sent to smarty for processing.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the affected content text.</li>
</ul>
';
$lang['admin']['event_help_contentpostcompile'] = '<p>Sent after content has been processed by smarty.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the affected content text.</li>
</ul>
';
$lang['admin']['event_help_contentpostrender'] = '<p>Sent before the combined html is sent to the browser.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the html text.</li>
</ul>
';
$lang['admin']['event_help_smartyprecompile'] = '<p>Sent before any content destined for smarty is sent to for processing.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the affected text.</li>
</ul>
';
$lang['admin']['event_help_smartypostcompile'] = '<p>Sent after any content destined for smarty has been processed.</p>
<h4>Parameters</h4>
<ul>
<li>&#039;content&#039; - Reference to the affected text.</li>
</ul>
';
$lang['admin']['filterbymodule'] = 'Filtreeri Mooduli J&auml;rgi';
$lang['admin']['showall'] = 'N&auml;ita K&otilde;iki';
$lang['admin']['core'] = 'P&otilde;hiapplikatsioon';
$lang['admin']['defaultpagecontent'] = 'Vaikimisi lehe sisu';
$lang['admin']['file_url'] = 'Lingi failile (URL&#039;i asemel)';
$lang['admin']['no_file_url'] = 'Pole (Kasuta URL&#039;i &uuml;leval)';
$lang['admin']['defaultparentpage'] = 'Vaikimisi vanem leht';
$lang['admin']['error_udt_name_whitespace'] = 'Viga: Kasutaja Defineeritud T&auml;hise nimi ei tohi sisaldada t&uuml;hikuid.';
$lang['admin']['warning_safe_mode'] = '<strong><em>HOIATUS:</em></strong> PHP Safe mode on aktiveeritud.  See p&otilde;hjustab raskusi failidega, mis on &uuml;les laetud veebilehitseja liidese kaudu, sealhulgas piltidega, kujundustega ja moodulite XML pakettidega. Teil on soovitatav v&otilde;tta &uuml;hendust saidi administraatoriga safe mode keelamisega seoses.';
$lang['admin']['test'] = 'Test ';
$lang['admin']['results'] = 'Tulemused';
$lang['admin']['untested'] = 'Testimata';
$lang['admin']['unknown'] = 'Tundmatu';
$lang['admin']['download'] = 'Lae alla';
$lang['admin']['frontendwysiwygtouse'] = 'Esiplaani wysiwyg redaktor';
$lang['admin']['backendwysiwygtouse'] = 'Vaikimisi tagaplaani wysiwyg redaktor (uutele kasutajakontodele)';
$lang['admin']['all_groups'] = 'K&otilde;ik grupid';
$lang['admin']['error_type'] = 'Vea t&uuml;&uuml;p';
$lang['admin']['contenttype_errorpage'] = 'Vealeht';
$lang['admin']['errorpagealreadyinuse'] = 'Vea kood on juba kasutuses';
$lang['admin']['404description'] = 'Lehte ei leitud';
$lang['admin']['usernotfound'] = 'Kasutajat ei leitud';
$lang['admin']['passwordchange'] = 'Palun sisestage uus parool';
$lang['admin']['recoveryemailsent'] = 'Email saadeti salvestatud aadressile. Palun kontrolli oma sisendkasti edasiste juhendite jaoks.';
$lang['admin']['errorsendingemail'] = 'Emaili saatmisel ilmnes viga. Kontakteeru oma administraatoriga.';
$lang['admin']['passwordchangedlogin'] = 'Parool muudetud. Palnu logi sisse kasutades uusi isikutunnistusi.';
$lang['admin']['nopasswordforrecovery'] = 'Sellele kasutajale ei ole emaili aadress seatud. Parooli taastamine ei ole v&otilde;imalik. Palun kontakteeru oma administraatoriga.';
$lang['admin']['lostpw'] = 'Unustasid oma parooli?';
$lang['admin']['lostpwemailsubject'] = '[%s] Parooli taastamine';
$lang['admin']['lostpwemail'] = 'You are recieving this e-mail because a request has been made to change the (%s) password associated with this user account (%s).  If you would like to reset the password for this account simply click on the link below or paste it into the url field on your favorite browser:
%s

If you feel this is incorrect or made in error, simply ignore the email and nothing will change.';
$lang['admin']['utmz'] = '156861353.1334871120.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['admin']['utma'] = '156861353.1784111165.1334871120.1335380760.1335463694.5';
$lang['admin']['utmc'] = '156861353';
$lang['admin']['utmb'] = '156861353';
?>