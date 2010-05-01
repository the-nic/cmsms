<?php
$lang['test_error_estrict'] = 'Tester error_reporting for &aring; sikre at E_STRICT ikke er aktivert';
$lang['test_estrict_failed'] = 'E_STRICT er aktivert';
$lang['info_estrict_failed'] = 'Noen biblioteker som CMS Made Simple benytter fungerer ikke godt med E_STRICT. Vennligst sl&aring; av denne f&oslash;r du fortsetter';
$lang['test_error_edeprecated'] = 'Tester error_reporting for &aring; sikre at E_DEPRECATED ikke er aktivert';
$lang['test_edeprecated_failed'] = 'E_DEPRECATED er aktivert';
$lang['info_edeprecated_failed'] = 'Om E_DEPRECATED er aktivert i din feilrapportering s&aring; vil brukere se mange advarselsmeldinger som kan ha innvirkning p&aring; visningen og funksjonaliteten';
$lang['invalidemail'] = 'E-postadressen som er oppgitt er ugyldig';
$lang['empty_query'] = 'Tom sp&oslash;rring?? %s';
$lang['no_db_driver'] = 'Ingen kompatible databasedrivere ble funnet';
$lang['test_check_output_buffering'] = 'Tester for output buffring';
$lang['test_check_output_buffering_failed'] = 'Output buffring er avsl&aring;tt. Du vil trolig f&aring;r problemer med &aring; benytte de funksjoner som benytter denne funksjonen';
$lang['phpinfo'] = 'Se p&aring; PHP Informasjon';
$lang['mod_security'] = 'Apache Mod Security ';
$lang['test_check_tempnam'] = 'Tester for tempnam Function';
$lang['test_check_db_drivers'] = 'DB drivere';
$lang['test_check_db_drivers_failed'] = 'Ingen DB drivere ble funnet';
$lang['test_check_register_globals'] = 'Tester PHP register globals';
$lang['test_check_register_globals_failed'] = 'PHP register globals er aktiv. For sikkerhetskyld be om dette sl&aring;s av.';
$lang['test_check_disable_functions'] = 'Tester PHP disable functions';
$lang['test_check_disable_functions_failed'] = 'Dette er en liste med funksjoner som er avsl&aring;tt p&aring; din server.';
$lang['install_admin_db_port'] = 'Database port ';
$lang['install_admin_db_port_info'] = 'Om du ikke kjenner denne - lar du dette felte forbli blankt for &aring; benytte standard port';
$lang['install_admin_db_socket'] = 'Database socket ';
$lang['install_admin_db_socket_info'] = 'NOT WORK YET. Work with mysqli DB driver only';
$lang['install_admin_frontendlang'] = 'Standard spr&aring;k for frontend. Dette justerer lokalitet(locale) som benyttes for diverse standard datobehandlingsfunksjoner, osv.. ';
$lang['install_default_encoding'] = 'I nesten alle tilfeller,b&oslash;r default_encoding v&aelig;re utf-8.';
$lang['installer_done'] = '[utf&oslash;rt]';
$lang['installer_failed'] = '[feilet]';
$lang['create_permission'] = 'Oppretter rettighet ...';
$lang['add_column_sql'] = 'Legger til kolonne til %s tabellen ...';
$lang['update_table_sql'] = 'Oppdaterer %s tabellen ...';
$lang['installing_module'] = 'Installerer %s modulen ...';
$lang['updating_schema_version'] = 'Oppdaterer skjemaversjon %s ...';
$lang['upgrade_config'] = 'Oppgraderer config.php';
$lang['upgrade_config_info'] = 'config oppgradert';
$lang['upgrade_failed_again'] = 'En eller flere oppgraderinger har feilet. Vennligst korriger problemet og klikk knappen nedenfor for en ny test.';
$lang['upgrade_cache_dirs'] = 'Renser ut fra cache katalogene';
$lang['cannot_clean_cache_dirs'] = 'Klarer ikke &aring; rense ut fra cache katalogene!';
$lang['upgrade_schema'] = 'Oppgrader skjema';
$lang['need_upgrade_schema'] = 'CMS trenger en oppgradering.<br />Du kj&oslash;rer n&aring; p&aring; skjema versjon %s og du trenger &aring; oppgradere til versjon %s';
$lang['schema_ok'] = 'N&aring; er CMS databasen oppdatert og benytter skjema versjon %s';
$lang['noneed_upgrade_schema'] = 'CMS databasen kj&oslash;rer siste skjema versjon som er %s';
$lang['upgrade_modules'] = 'Oppgrader moduler';
$lang['noneed_upgrade_modules'] = 'Core modulene er siste versjon';
$lang['upgrade_sql_module_from_to'] = 'Oppgraderer SQL for &quot;%s&quot; modulen fra %s til %s ...';
$lang['upgrade_event_module_from_to'] = 'Oppgraderer Hendelser/Events for &quot;%s&quot; modulen fra %s til %s ...';
$lang['sitedown_not_removed'] = 'Kunne ikke fjerne tmp/cache/SITEDOWN filen. Vennligst fjern denne manuelt ellers vil nettstedet forsatt vise en &quot;Site Down for Maintainence&quot; melding';
$lang['upgrade_ok'] = 'Vennligst se over config.php, endre eventuelt nye innstillinger om n&oslash;dvendig og s&aring; setter du filens rettigheter tilbake til beskyttet. Du b&aelig;r ogs&aring; sjekke at alle dine moduler er siste versjon, ved &aring; g&aring; til Utvidelser -> Moduler siden og se etter om noen av dem er merket &quot;Trenger Oppgradering&quot;';
$lang['upgrade_complete'] = 'Oppgraderingsprosessen er fullf&oslash;rt';
$lang['upgrade_end'] = 'CMS er oppdatert. Vennligst klikk %s for &aring; g&aring; til ditt CMS nettsted eller du kan %s.';
$lang['here'] = 'her';
$lang['go_to_admin'] = 'g&aring; til Administrasjonspanelet';
$lang['errorfilenot'] = 'Filen ble ikke funnet!';
$lang['errorfilenotwritable'] = 'Fil ikke skrivbar!';
$lang['nofiles'] = 'Denne ressursen eksisterer ikke!';
$lang['is_directory'] = 'Denne ressursen er en katalog!';
$lang['is_readable_false'] = 'Denne ressursen er ikke lesbar!';
$lang['checksum_match'] = 'Checksum er lik!';
$lang['checksum_not_match'] = 'Checksum er ikke lik!';
$lang['not_checksum'] = 'Ingen checksum &aring; finne!';
$lang['format_datetime'] = '%c ';
$lang['upload_err_ini_size'] = 'Den opplastede filen overstiger upload_max_filesize oppsettet i php.ini!';
$lang['upload_err_form_size'] = 'Den opplastede filen overstiger MAX_FILE_SIZE oppsettet som er spesifisert i HTML skjemaet.';
$lang['upload_err_partial'] = 'Den opplastede filen ble bare delvis lastet opp.';
$lang['upload_err_no_file'] = 'Ingen fil ble lastet opp.';
$lang['upload_err_no_tmp_dir'] = 'Mangler en midlertidig katalog.';
$lang['upload_err_cant_write'] = 'Feilet &aring; skrive filen til disken.';
$lang['upload_err_extension'] = 'Filopplasting stoppet av filendelsen.';
$lang['upload_err_empty'] = 'Filen har null st&oslash;rrelse';
$lang['upload_err_unknown'] = 'Filopplastingsfeil ukjent.';
$lang['function_file_uploads_off'] = 'file_uploads er avsl&aring;tt i din php!';
$lang['upload_file_no_readable'] = 'Opplastet fil er ikke lesbar!';
$lang['upload_file_multiple'] = 'Flere filopplastinger ikke tillatt!';
$lang['test_check_magic_quotes_gpc'] = 'Magic quotes for Get/Post/Cookie operasjoner';
$lang['test_check_magic_quotes_gpc_failed'] = 'N&aring;r magic_quotes er p&aring;, vil alle apostrofer, anf&oslash;rselstegn og omvendt skr&aring;strek bli markert(escaped) med omvendt skr&aring;strek automatisk. Kan ogs&aring; ha problemer med lagring av maler.';
$lang['test_check_magic_quotes_runtime'] = 'Test om Magic quotes er aktivert';
$lang['test_check_magic_quotes_runtime_failed'] = 'N&aring;r magic_quotes er p&aring;, vil de fleste funksjoner som returnerer data fra enhver form for ekstern kilde - inkludert databaser og tekstfiler ha anf&oslash;rselstegn markert(escaped) med omvendt skr&aring;strek. Dette vil gi problemer med CMS Made Simple.';
$lang['install_admin_checksum'] = 'Test din installasjon';
$lang['upgrade_admin_checksum'] = 'Test din systemoppgradering';
$lang['checksum'] = 'Checksum test ';
$lang['checksum_file'] = 'Checksum fil';
$lang['install_test_checksum'] = 'Du kan teste integriteten for dine CMS filer ved &aring; sammenligne mot en original CMS checksum. Dette kan hjelpe til med &aring; finne problemer med opplastinger.';
$lang['checksum_passed'] = 'Alle checksum&#039;er er like!';
$lang['checksum_failed'] = 'Checksum hadde feil. Se i hjelp for mer informasjon';
$lang['test_check_open_basedir'] = 'Test for PHP Open Basedir';
$lang['test_check_open_basedir_failed'] = 'Open basedir restriksjoner er effektive. Du vil trolig ha problemer med noe tilleggsfunksjonalitet med denne restriksjonen.';
$lang['unlimited'] = 'Ubegrenset';
$lang['test_open_basedir_session_save_path'] = 'Open basedir restriksjoner ser ut til &aring; v&aelig;re i effekt. Om du har SESSION problemer og ini_set fungerer kan du fors&oslash;ke &aring; sl&aring; p&aring; session cookies ved &aring; legge til: ini_set(&#039;session.use_only_cookies&#039;, 1); til toppen av include.php fila';
$lang['install_warn_db_createtables'] = 'Normal skal dette feltet alltid v&aelig;re avkrysset. V&aelig;r forsiktig om du sl&aring;r av denne egenskapen.';
$lang['install_admin_tablesnotcreated'] = 'Prosessering ferdig. Installasjonsprosessen er fullf&oslash;rt, p&aring; din begj&aelig;ring ble ikke databasetabeller opprettet. Men config filen har blitt tilbakestilt og alle f&oslash;r-installasjonstester ble gjennomf&oslash;rt. Takk, og her er din';
$lang['info_create_dir_and_file'] = 'HTTP prosessens eier kan ikke opprette en fil inne i en katalog som den eier. Dette betyr sannsynligvis at safe mode er sl&aring;tt p&aring; p&aring; en eller annen m&aring;te. Mange funksjoner inne i CMS Made Simple vil ikke fungere skikkelig uten denne muligheten. &Aring; fortsette er ikke mulig.';
$lang['test_create_dir_and_file'] = 'Tester om http prosessen kan opprette en fil inne i en katalog den har opprettet.';
$lang['cms_site'] = 'CMS nettsted';
$lang['or_greater'] = 'Eller st&oslash;rre';
$lang['sitename'] = 'Nettstedsnavn';
$lang['warning_safe_mode'] = '<strong><em>ADVARSEL:</em></strong> PHP Safe_mode er p&aring;sl&aring;tt.  Dette vil medf&oslash;re problemer med filer som lastes opp via nettleser grensesnittet, inkludert bilder, tema og modul XML pakker. Du r&aring;des til  &aring; kontakte din nettstedsadministrator for &aring; se om safe_mode kan sl&aring;s av.';
$lang['test'] = 'Test ';
$lang['results'] = 'Resultater';
$lang['untested'] = 'Ikke testet';
$lang['owner'] = 'Eier';
$lang['permissions'] = 'Rettigheter';
$lang['off'] = 'Av';
$lang['on'] = 'P&aring;';
$lang['permission_information'] = 'Rettighetsinformasjon';
$lang['server_os'] = 'Server operativsystem';
$lang['server_api'] = 'Server API ';
$lang['server_software'] = 'Server programvare';
$lang['server_information'] = 'Serverinformasjon';
$lang['session_save_path'] = 'Session Save Path ';
$lang['max_execution_time'] = 'Maximum Execution Time ';
$lang['gd_version'] = 'GD versjon';
$lang['upload_max_filesize'] = 'Maksimum &#039;Upload Size&#039;';
$lang['post_max_size'] = 'Maksimum &#039;Post Size&#039;';
$lang['memory_limit'] = 'PHP Memory Limit ';
$lang['server_db_type'] = 'Server Database ';
$lang['server_db_version'] = 'Server Database versjon';
$lang['phpversion'] = 'N&aring;v&aelig;rende PHP versjon';
$lang['safe_mode'] = 'PHP Safe Mode ';
$lang['php_information'] = 'PHP informasjon';
$lang['cms_install_information'] = 'CMS Installasjonsinformasjon';
$lang['cms_version'] = 'CMS versjon';
$lang['systeminfo_copy_paste'] = 'Vennligst kopier og lim inn f&oslash;lgende valgte tekst i ditt forum innlegg';
$lang['help_systeminformation'] = 'Informasjonen vist nedenfor er innsamlet fra forskjellige plasser og summeres her s&aring; du enkelt kan finne noe av informasjonen du trenger n&aring;r du fors&oslash;ker &aring; diagnostisere et problem eller sp&oslash;r etter hjelp med din CMS Made Simple installasjon.';
$lang['systeminfo'] = 'Systeminformasjon';
$lang['systeminfodescription'] = 'Vis forskjellige biter med informasjon om ditt system som kan v&aelig;re nyttig i diagnostisering av problemer';
$lang['error'] = 'Feil';
$lang['new_version_available'] = '<em>Merk:</em> En ny versjon av CMS Made Simple er tilgjengelig.  Vennligst meld fra til din administrator.';
$lang['info_urlcheckversion'] = 'Om urlen er ordet &quot;none&quot; vil ingen sjekk gj&oslash;res.<br/>En blank streng vil resultere i at en standard URL benyttes.';
$lang['urlcheckversion'] = 'Se etter nye CMS versjoner ved &aring; benytte denne URL/sti';
$lang['read'] = 'Lese';
$lang['write'] = 'Skrive';
$lang['execute'] = 'Utf&oslash;re';
$lang['group'] = 'Gruppe';
$lang['other'] = 'Annet';
$lang['global_umask'] = 'Fil opprettelse maske (umask)';
$lang['errorcantcreatefile'] = 'Kunne ikke opprette fil (rettighetsproblem?)';
$lang['add'] = 'Legg til';
$lang['about'] = 'Om';
$lang['action'] = 'Handling';
$lang['actionstatus'] = 'Handling/Status';
$lang['active'] = 'Aktiv';
$lang['cantremove'] = 'Kan ikke fjerne';
$lang['changepermissions'] = 'Endre rettigheter';
$lang['changepermissionsconfirm'] = 'V&AElig;R FORSIKTIG\n\nDenne handling vil fors&oslash;ke &aring; endre det slik at alle filene som utgj&oslash;r modulen er skrivbare for webserveren.\nEr du sikker p&aring; at du vil fortsette?';
$lang['success'] = 'Vellykket';
$lang['advanced'] = 'Avansert';
$lang['back'] = 'Tilbake til meny';
$lang['cancel'] = 'Avbryt';
$lang['cantchmodfiles'] = 'Klarte ikke &aring; endre rettigheter p&aring; noen av filene';
$lang['cantremovefiles'] = 'Problem med &aring; fjerne filer (rettigheter?)';
$lang['create'] = 'Opprett';
$lang['database'] = 'Database ';
$lang['databaseprefix'] = 'Database forstavelse(prefix)';
$lang['databasetype'] = 'Databasetype';
$lang['date'] = 'Dato';
$lang['default'] = 'Standard';
$lang['delete'] = 'Slett';
$lang['deleteconfirm'] = 'Er du sikker p&aring; at du vil slette - %s - ?';
$lang['description'] = 'Beskrivelse';
$lang['directoryexists'] = 'Katalogen eksisterer allerede.';
$lang['down'] = 'Ned';
$lang['edit'] = 'Rediger';
$lang['email'] = 'E-postadresse';
$lang['errordeletingfile'] = 'Kan ikke slette filen, Rettighetsproblem?';
$lang['errordirectorynotwritable'] = 'Har ikke rettighet til &aring; skrive til katalog. Dette kan for&aring;rsakes av filrettigheter og eierskap. Safe_mode kan ogs&aring; v&aelig;re i effekt.';
$lang['cachenotwritable'] = 'Cache mappen er ikke skrivbar. &Aring; t&oslash;mme cache vil ikke fungere. Vennligst endre tmp/cache katalogen til &aring; ha full lese/skrive/utf&oslash;re(read/write/execute) rettigheter (chmod 777). Du trenger kanskje ogs&aring; &aring; sl&aring; av safe mode.';
$lang['modulesnotwritable'] = 'Modules mappen er ikke skrivbar. Om du &oslash;nsker &aring; installere moduler ved &aring; laste opp en XML-fil s&aring; trenger du &aring; endre modules-mappen til &aring; ha fulle lese/skrive/utf&oslash;r(read/write/execute) rettigheter (chmod 777).  Safe mode kan ogs&aring; v&aelig;re i effekt.';
$lang['false'] = 'Usann';
$lang['settrue'] = 'Sett sann';
$lang['filename'] = 'Filnavn';
$lang['filesize'] = 'Filst&oslash;rrelse';
$lang['help'] = 'Hjelp';
$lang['language'] = 'Spr&aring;k';
$lang['lastname'] = 'Etternavn';
$lang['name'] = 'Navn';
$lang['password'] = 'Passord';
$lang['passwordagain'] = 'Passord (gjenta)';
$lang['remove'] = 'Fjern';
$lang['saveconfig'] = 'Lagre konfig.';
$lang['true'] = 'Sann';
$lang['setfalse'] = 'Sett usann';
$lang['type'] = 'Type ';
$lang['typenotvalid'] = 'Type er ikke gyldig';
$lang['unknown'] = 'Ukjent';
$lang['user'] = 'Bruker';
$lang['userdefinedtags'] = 'Brukerdefinerte tagger (UDT)';
$lang['usermanagement'] = 'Brukeradministrasjon';
$lang['username'] = 'Brukernavn';
$lang['usernameincorrect'] = 'Brukernavn eller passord er feil';
$lang['version'] = 'Versjon';
$lang['install_title'] = 'CMS Made Simple Installasjon (steg %s)';
$lang['install_system'] = 'Installer systemet';
$lang['install_thanks'] = 'Takk for at du installerer CMS Made Simple';
$lang['upgrade_title'] = 'CMS Made Simple Oppgradering (trinn %s)';
$lang['upgrade_system'] = 'Oppgrader Systemet';
$lang['upgrade_thanks'] = 'Takk for at du oppgraderer CMS Made Simple til ';
$lang['install_please_read'] = 'Vennligst les <a href="http://wiki.cmsmadesimple.org/index.php/User_Handbook/Installation/Troubleshooting" >Installation Troubleshooting</a>- siden i CMS Made Simple Dokumentasjon Wiki.';
$lang['install_checking'] = 'Tester rettigheter og PHP innstillinger';
$lang['install_test'] = 'Test ';
$lang['install_result'] = 'Resultat';
$lang['install_required_settings'] = 'P&aring;krevde innstillinger';
$lang['install_recommended_settings'] = 'Anbefalte innstillinger';
$lang['install_you_have'] = 'Du har';
$lang['install_legend'] = 'Tegnforklaring(Legend)';
$lang['install_symbol'] = 'Tegn';
$lang['install_definition'] = 'Definisjon';
$lang['install_value_passed'] = 'En p&aring;krevd test var vellykket';
$lang['install_value_failed'] = 'En p&aring;krevd test mislyktes';
$lang['install_error_fragment'] = 'Info for feils&oslash;king ved installasjon';
$lang['install_value_required'] = 'En innstilling er lavere enn p&aring;krevd minimum';
$lang['install_value_recommended'] = 'En innstilling er over p&aring;krevd verdi, men er lavere enn anbefalt verdi<br />eller... Noe som <em>kan</em> v&aelig;re p&aring;krevd for at noe utvidet funksjonalitet skal fungere';
$lang['install_value_exceed'] = 'En innstilling fyller eller overstiger anbefalt niv&aring;<br />eller... Noe som <em>kan</em> v&aelig;re p&aring;krevd for at noe utvidet funksjonalitet skal fungere';
$lang['install_test_failed'] = 'En eler flere tester har feilet. Du kan fortsatt installere systemet men noen funksjoner vil muligens ikke fungere godt.<br />Vennligst fors&oslash;k &aring; rette p&aring; situasjonen og klikk &quot;Fors&oslash;k igjen&quot;, eller klikk p&aring; Fortsett knappen.';
$lang['install_test_passed'] = 'Alle tester ble best&aring;tt (i det minste p&aring; minimum niv&aring;). Vennligst klikk p&aring; Fortsett knappen.';
$lang['install_failed_again'] = 'En eller flere tester har feilet. Vennligst korriger problemet og klikk p&aring; knappen nedenfor for &aring; teste p&aring; ny.';
$lang['install_try_again'] = 'Fors&oslash;k igjen';
$lang['install_continue'] = 'Fortsett';
$lang['failure'] = 'Feilet';
$lang['caution'] = 'Obs';
$lang['install_admin_umask'] = 'Test umask p&aring; serveren';
$lang['install_test_umask'] = 'Vennligst klikk testknappen for &aring; teste umask som er oppgitt ...';
$lang['test_umask_text'] = 'umask (som kommer fra user file creation mode mask) er en funksjon i POSIX omgivelser som innvirker p&aring; standard filsystem modus for nylig opprettede filer og kataloger for denne prosessen. Det kontrollerer hvilke filrettigheter som ikke vil bli satt for alle nylig opprettede filer.';
$lang['test_check_umask'] = 'Resultat for test av fil opprettet i';
$lang['test_umask_not_given'] = 'Umask ikke oppgitt';
$lang['test_check_umask_failed'] = 'umask-test feilet';
$lang['test_username_not_given'] = 'Brukernavn ikke oppgitt!';
$lang['test_username_illegal'] = 'Brukernavn inneholder ugyldige bokstaver!';
$lang['test_not_both_passwd'] = 'Begge passordfeltene ble ikke fylt ut';
$lang['test_passwd_not_match'] = 'Passordfeltene samsvarer ikke!';
$lang['test_email_accountinfo'] = 'Send kontoinformasjon via e-post er valgt, men ingen e-postadresse er oppgitt!';
$lang['test_database_prefix'] = 'Database forstavelse inneholder ugyldige bokstaver';
$lang['test_no_dbms'] = 'Ingen dbms valgt!';
$lang['test_could_not_connect_db'] = 'Kunne ikke koble til databasen. Sjekk at brukernavn og passord er korrekte, og at den brukeren har tilgang til den oppgitte databasen.';
$lang['test_could_not_drop_table'] = 'Kunne ikke gj&oslash;re &#039;drop&#039; av en tabell. Bekreft at brukeren har rettighet til &aring; gj&oslash;re &#039;drop&#039; tabell i den oppgitte databasen.';
$lang['test_could_not_create_table'] = 'Kunne ikke opprette en tabell. Bekreft at brukeren har rettigheter  til &aring; opprette tabeller i den oppgitte databasen.';
$lang['test_check_php'] = 'Tester om PHP versjon %s+';
$lang['test_min_recommend'] = '(min %s, anbefalt %s eller st&oslash;rre)';
$lang['test_min_recommend_plus'] = '(min. %s, anbefalt %s+)';
$lang['test_requires_php_version'] = 'CMS Made Simple krever php versjon 5.2.4 eller st&oslash;rre (du har %s), men PHP %s eller st&oslash;rre er anbefalt for &aring; sikre maksimum kompatibilitet med tredjeparts tillegg';
$lang['test_check_md5_func'] = 'Ser etter md5 funksjon';
$lang['test_check_safe_mode'] = 'Tester om safe_mode';
$lang['test_check_safe_mode_failed'] = 'PHP safe mode kan for&aring;rsake noen problemer under opplasting av filer og med andre funksjoner. Alt avhenger av hvor streng din server safe mode innstilling er.';
$lang['test_check_tokenizer'] = 'Ser etter tokenizer funksjoner';
$lang['test_check_tokenizer_failed'] = '&Aring; ikke ha tokenizeren kan for&aring;rsake sider til &aring; rendere helt hvite. Vi anbefaler deg &aring; ha denne installert, men nettstedet ditt kan mulig ogs&aring; fungere uten denne.';
$lang['test_check_gd'] = 'Ser etter GD bibliotek';
$lang['test_check_gd_failed'] = 'GD biblioteket er n&oslash;dvendig for noen moduler og funksjoner.';
$lang['test_check_write'] = 'Tester skriverett p&aring;';
$lang['test_may_not_exist'] = 'Det er mulig denne filen ikke eksisterer enn&aring;. Om den ikke eksisterer, oppretter du en tom fil med dette navnet. Vennligst ogs&aring; forsikre deg om at denne filen er skrivbar for webserver prosessen.';
$lang['could_not_retrieve_a_value'] = 'Klarte ikke lese verdien.... fortsetter alikevel.';
$lang['displaying_the_value_originally'] = '<br />Viser verdien opprinnelig satt i config filen (dette kan v&aelig;re uriktig).';
$lang['test_check_xml_func'] = 'Tester om grunnleggende XML (expat) st&oslash;tte';
$lang['test_check_xml_failed'] = 'XML st&oslash;tte er ikke kompilert inn i din php installasjon. Du kan fortsatt benytte systemet, men vil ikke kunne benytte noen av fjerninstallasjonsfunksjonene for moduler.';
$lang['test_allow_url_fopen_failed'] = 'N&aring;r &#039;allow url fopen&#039; er sl&aring;tt av vil du ikke v&aelig;re i stand til &aring; n&aring; URL objekter som fil ved &aring; benytte ftp eller http protokollene.';
$lang['test_remote_url'] = 'Test for fjern URL';
$lang['test_remote_url_failed'] = 'Du vil trolig ikke kunne &aring;pne en fil p&aring; en fjern-webserver.';
$lang['connection_error'] = 'Utg&aring;ende http forbindelser ser ikke ut til &aring; fungere! Det er en brannmur eller en eller annen ACL for eksterne forbindelser? Dette vil medf&oslash;re at modulbehandleren, og potensielt annen funksjonalitet feiler.';
$lang['remote_connection_timeout'] = 'Forbindelsen fikk tidsavbrudd!';
$lang['search_string_find'] = 'Forbindelse i orden!';
$lang['connection_failed'] = 'Tilkobling feilet!';
$lang['remote_response_ok'] = 'Fjern respons: i orden!';
$lang['remote_response_404'] = 'Fjern respons: ikke funnet!';
$lang['remote_response_error'] = 'Fjern respons: feil!';
$lang['test_check_file_upload'] = 'Tester filopplasting';
$lang['test_check_file_failed'] = 'N&aring;r filopplasting er sl&aring;tt av vil du ikke kunne benytte noen av filopplastingsfasilitetene inkludert i CMS Made Simple. Om mulig, b&oslash;r denne restriksjonen fjernes av din systemadministrator for at du skal kunne benytte alle filbehandlingsfunksjonene i systemet. Fortsett med forsiktighet.';
$lang['test_check_memory'] = 'Tester PHP memory limit';
$lang['test_check_memory_failed'] = 'Det er mulig du ikke har nok minne for &aring; kj&oslash;re CMSMS ordentlig, eller med alle &oslash;nskede tillegg. Om mulig,, b&oslash;r du fors&oslash;ke &aring; f&aring; din systemadministrator til &aring; heve denne verdien. Fortsett med forsiktighet.';
$lang['test_check_time_limit'] = 'Tester PHP time limit';
$lang['test_check_time_limit_failed'] = 'Antall sekunder et skript er tillatt &aring; kj&oslash;re. Om denne verdi n&aring;s vil skriptet returnere en fatal error(=alvorlig feil).';
$lang['test_check_post_max'] = 'Tester max post size';
$lang['test_check_post_max_failed'] = 'Du vil trolig ikke kunne sende (mye) data. Vennligst v&aelig;r oppmerksom p&aring; denne begrensningen.';
$lang['test_check_upload_max'] = 'Tester max upload file size';
$lang['test_check_upload_max_failed'] = 'Du vil trolig ikke kunne sende (store) filer ved &aring; benytte de innebygde filbehandlingsfunksjonene. Vennligst v&aelig;r oppmerksom p&aring; denne begrensningen.';
$lang['test_check_writable'] = 'Sjekker om %s er skrivbar';
$lang['test_check_upload_failed'] = 'uploads mappa er ikke skrivbar. Du kan fortsatt installere systemet, men du vil ikke kunne laste opp filer via Administrasjonspanelet.';
$lang['test_check_images_failed'] = 'images mappa er ikke skrivbar. Du kan fortsatt installere systemet, men du vil ikke kunne laste opp og benytte bilder via Administrasjonspanelet.';
$lang['test_check_modules_failed'] = 'modules mappa er ikke skrivbar. Du kan fortsatt installere systemet, men du vil ikke kunne laste opp moduler via Administrasjonspanelet.';
$lang['test_check_file_get_contents'] = 'Tester file_get_contents';
$lang['test_check_file_get_contents_failed'] = 'Du vil trolig ikke kunne benytte funksjonalitet som benytter denne funksjonen';
$lang['test_check_session_save_path'] = 'Sjekker om session.save_path er skrivbar';
$lang['test_empty_session_save_path'] = 'Din session.save_path er tom. PHP vil benytte den midlertidige mappa for din vert. Om du har SESSION problemer og ini_set fungerer kan du fors&oslash;ke &aring; sl&aring; p&aring; session cookies ved &aring; legge til: ini_set(&#039;session.use_only_cookies&#039;, 1);  til toppen av include.php';
$lang['test_check_session_save_path_failed'] = 'Din session.save_path er &quot;%s&quot;. &Aring; ikke ha denne satt som skrivbar kan for&aring;rsake at innlogginger til administrasjonspanelet ikke fungerer. Du b&oslash;r fors&oslash;ke &aring; gj&oslash;re denne stien skrivbar om du har problemer med innlogging til administrasjonspanelet. Denne testen kan feile om safe_mode er aktivert (se nedenfor).';
$lang['test_check_ini_set'] = 'Sjekker om ini_set fungerer';
$lang['test_check_ini_set_failed'] = 'Selv om muligheten til &aring; overstyre php ini innstillinger ikke er n&oslash;dvendig, noen tillegg (valgfri) funksjonalitet benytter ini_set for &aring; utvide tidsavbrudd, og tillater da opplasting av st&oslash;rre filer, osv. Du kan f&aring; vanskeligheter med noen tilleggsfunksjoner om du ikke har denne muligheten. Denne testen kan feile om safe_mode er aktivert (se nedenfor).';
$lang['install_admin_header'] = 'Admin kontoinformasjon';
$lang['install_admin_info'] = 'Velg brukernavn, passord og e-postadresse for din adminkonto. Vennligst pass p&aring; at du tar godt vare p&aring; denne informasjonen.';
$lang['install_admin_email'] = 'E-postadresse';
$lang['install_admin_email_info'] = 'E-post kontoinformasjon';
$lang['install_admin_email_note'] = '<strong>Merk:</strong> Denne funksjonen benytter php&#039;s e-postfunksjon. Om du ikke mottar denne e-posten, kan det v&aelig;re en indikasjon p&aring; at din server ikke er godt konfigurert og at du b&oslash;r kontakte din vert administrator.';
$lang['install_admin_sitename'] = 'Dette er navnet p&aring; ditt nettsted. Det vil bli benyttet p&aring; forskjellige plasser i standard malene og kan benyttes hvor som helst med taggen {sitename}.';
$lang['install_admin_db'] = 'Databaseinformasjon';
$lang['install_admin_db_info'] = '<p>V&aelig;r sikker p&aring; at du har opprettet din database og har tilegnet en bruker fulle privileger for &aring; benytte denne databasen.</p>
<p>For MySQL, benytt f&oslash;lgende:</p>
<p>Logg inn i mysql fra et konsoll og kj&oslash;r f&oslash;lgende kommandoer:</p>
<ol>
<li>create database cms; (benytt hvilket navn du vil her, men pass p&aring; at du husker det, du vil trenge &aring; skrive dette inn p&aring; denne siden)</li>
<li>grant all privileges on cms.* to cms_user@localhost identified by &#039;cms_pass&#039;;</li>
</ol>';
$lang['install_admin_follow'] = 'Vennligst fyll ut f&oslash;lgende felter';
$lang['install_admin_db_type'] = 'Databasetype';
$lang['install_admin_no_db'] = 'Ingen gyldige database drivere synes &aring; v&aelig;re kompilert inn i din PHP installasjon. Vennligst bekreft at du har mysql, mysqli, og/eller postgres7 st&oslash;tte installert, og fors&oslash;k s&aring; igjen.';
$lang['install_admin_db_host'] = 'Database vertsadresse(host address)';
$lang['install_admin_db_name'] = 'Databasenavn';
$lang['install_admin_db_create'] = 'Opprett kataloger (Advarsel: Sletter eksisterende data)';
$lang['install_admin_db_prefix'] = 'Table prefiks';
$lang['install_admin_db_sample'] = 'Installer standarddata og maler';
$lang['retry'] = 'Fors&oslash;k igjen';
$lang['install_admin_db_create_seq'] = 'Oppretter %s tabellsekvens...';
$lang['install_admin_importing'] = 'Importerer standarddata...';
$lang['invalid_query'] = 'Ugyldig sp&oslash;rring: %s';
$lang['install_creating_table'] = '<p>Opretter %s tabell... [%s]</p>';
$lang['install_creating_index'] = '<p>Oppretter index i %s tabell... [%s]</p>';
$lang['done'] = 'utf&oslash;rt';
$lang['failed'] = 'feilet';
$lang['install_admin_error_schema'] = 'Feil ved henting av SQL schema';
$lang['install_admin_set_account'] = 'Skriver admin kontoinformasjon...';
$lang['install_admin_set_sitename'] = 'Skriver nettstedsnavn...';
$lang['install_admin_setup'] = 'N&aring; la oss fortsette &aring; sette opp din konfigurasjonsfil. Vi har allerede det meste vi trenger. Det er mulig du kan la de f&oslash;lgende verdier v&aelig;re som de er, s&aring; n&aring;r du er klar - trykk Fortsett.';
$lang['install_admin_docroot'] = 'CMS dokumentrot (som sett fra webservveren)';
$lang['install_admin_docroot_path'] = 'Sti til Dokumentrota(Document root)';
$lang['install_admin_querystring'] = 'Query string (ikke r&oslash;r denne om du ikke har problemer, om s&aring; - rediger config.php manuelt)';
$lang['invalid_querys'] = '<b>ADVARSEL<b/>: Ugyldige sp&oslash;rringer mot din DB!';
$lang['install_admin_sitedown'] = 'Feil: Kunne ikke fjerne tmp/cache/SITEDOWN filen. Vennligst fjern denne manuelt.';
$lang['install_admin_update_hierarchy'] = 'Oppdaterer hierarkiposisjoner...';
$lang['install_admin_set_core_event'] = 'Setter opp core handlinger...';
$lang['install_admin_install_modules'] = 'Installerer moduler...';
$lang['install_admin_index_search'] = 'Indekserer s&oslash;k...';
$lang['install_admin_clear_cache'] = 'T&oslash;mmer nettsteds cache (om finnes)...';
$lang['install_admin_emailing'] = 'Sender admin kontoinnstillinger via e-post...';
$lang['install_admin_congratulations'] = 'Gratulerer, n&aring; er alt ferdig satt opp - her er ditt';
$lang['could_not_connect_db'] = 'Kunne ikke koble til databasen. Sjekk at brukernavn og passord er korrekte, og at denne brukeren har tilgang til den oppgitte databasen.';
$lang['cannot_write_config'] = 'Feil: kan ikke skrive til %s.';
$lang['email_accountinfo_subject'] = 'CMS Made Simple Adminkonto informasjon';
$lang['email_accountinfo_message'] = 'Takk for at du installerte CMS Made Simple.

Dette er din nye kontoinformasjon:
brukernavn: %s
passord: %s

Logg inn i nettstedets administrasjon her: %s';
$lang['utma'] = '156861353.4516254727077762000.1214829895.1269862427.1271013637.210';
$lang['utmz'] = '156861353.1258366036.187.21.utmcsr=themes.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/index.php';
$lang['qca'] = '1214401694-66536492-18746566';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>