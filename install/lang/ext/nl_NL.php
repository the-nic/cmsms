<?php
$lang['installed_module'] = 'Module ge&iuml;nstalleerd';
$lang['automatedtask_success'] = 'Automatische taak succesvol uitgevoerd';
$lang['ip_addr'] = 'IP-adres';
$lang['install_admin_pwsalt_note'] = 'Als u er voor kiest om de wachtwoorden te versleutelen, dan is er geen enkele andere mogelijkheid meer om verloren admin-wachtwoorden te herstellen dan via de &#039;wachtwoord vergeten&#039;-functionaliteit. Het is dus van belang dat u voor iedere admin-account een geldig e-mailadres invoert.';
$lang['admin_salt'] = 'Versleutel wachtwoorden van administrators';
$lang['setup_flat_urls'] = 'Platte URL&#039;s worden weer aangemaakt!';
$lang['install_timezone'] = 'Sommige webservers met PHP 5.3 hebben de tijdzone niet goed ingesteld. Selecteer hier &uacute;w juiste tijdzone. Als dit voor uw webserver niet van toepassing is, dan kiest u &quot;Geen&quot;. <strong>Opmerking:</strong> Dit is geen display instelling, maar is gerelateerd aan datum en tijd instellingen. U kunt deze instelling later altijd nog weer wijzigen in de config.php.';
$lang['timezone'] = 'Tijdzone';
$lang['none'] = 'Geen';
$lang['test_error_estrict'] = 'Error_reporting testen om er zeker van te zijn dat E_STRICT is uitgeschakeld';
$lang['test_estrict_failed'] = 'E_STRICT is ingeschakeld';
$lang['info_estrict_failed'] = 'Bepaalde functionaliteiten die CMSMS gebruikt, werken niet goed met E_STRICT.  Schakel deze alstublieft uit voordat u verder gaat';
$lang['test_error_edeprecated'] = 'Error_reporting testen om er zeker van te zijn dat E_DEPRECATED is uitgeschakeld';
$lang['test_edeprecated_failed'] = 'E_DEPRECATED is ingeschakeld';
$lang['info_edeprecated_failed'] = 'Als E_DEPRECATED is ingeschakeld by error_reporting zullen gebruikers veel waarschuwingsmeldingen krijgen te zien, wat effect heeft op de lay-out en werking van de website';
$lang['invalidemail'] = 'Het ingevoerde e-mail adres is niet correct';
$lang['empty_query'] = 'Lege query?? %s';
$lang['no_db_driver'] = 'Geen bruikbare database drivers gevonden';
$lang['test_check_output_buffering'] = 'Controleer output buffering';
$lang['test_check_output_buffering_failed'] = 'Output buffering is uitgeschakeld. Waarschijnlijk werken niet alle functionaliteit die deze benodigd.';
$lang['phpinfo'] = 'Bekijken van PHP informatie';
$lang['mod_security'] = 'Apache Mod Beveiliging';
$lang['test_check_tempnam'] = 'Controle op tempnam functie';
$lang['test_check_db_drivers'] = 'Database drivers';
$lang['test_check_db_drivers_failed'] = 'Geen database drivers gevonden';
$lang['test_check_register_globals'] = 'Controleren van PHP register globals';
$lang['test_check_register_globals_failed'] = 'PHP register globals zijn actief. Voor beveiligingsredenen moet u dit uitschakelen.';
$lang['test_check_disable_functions'] = 'Controleren voor uitstaande PHP functies.';
$lang['test_check_disable_functions_failed'] = 'Deze lijst bevat alle uitgeschakelde PHP functies op uw server.';
$lang['install_admin_db_port'] = 'Database poort';
$lang['install_admin_db_port_info'] = 'Als u het niet weet, laat het dan bij de bestaande instellingen';
$lang['install_admin_db_socket'] = 'Database socket ';
$lang['install_admin_db_socket_info'] = 'NIET ONDERSTEUND';
$lang['install_admin_frontendlang'] = 'Standaard taal voor de frontend. Dit past de lokale standaard voor verschillende functies standaard datum behandeling, enz.';
$lang['install_default_encoding'] = 'In vrijwel alle gevalen zal default_encoding ingesteld staan op utf-8. Als u dit anders wilt, kunt u dit wijzigen, maar houdt er rekening mee dat alle vertalingen zijn ingesteld op utf-8.';
$lang['installer_done'] = '[voltooid]';
$lang['installer_failed'] = '[mislukt]';
$lang['create_permission'] = 'Rechten aanmaken ...';
$lang['add_column_sql'] = 'Rij toevoegen aan tabel %s ...';
$lang['update_table_sql'] = 'Bezig met het bijwerken van tabel %s ...';
$lang['installing_module'] = 'Bezig met het installeren van de %s module ...';
$lang['updating_schema_version'] = 'Bezig met het upgraden naar schema versie %s ...';
$lang['upgrade_config'] = 'Bezig met het bijwerken van config.php';
$lang['upgrade_config_info'] = 'Configuratie Upgrade';
$lang['upgrade_failed_again'] = 'E&eacute;n of meer upgrades zijn mislukt. Verhelp het probleem en klik op de knop om het opnieuw te controleren.';
$lang['upgrade_cache_dirs'] = 'Legen van buffer mappen';
$lang['cannot_clean_cache_dirs'] = 'Kan de buffer mappen niet legen!';
$lang['upgrade_schema'] = 'Bijwerken van de database schema';
$lang['need_upgrade_schema'] = 'CMS heeft een update nodig.<br />U gebruikt nu schema versie %s en u moet deze bijwerken naar schema versie %s';
$lang['schema_ok'] = 'De CMS database is bijgewerkt en gebruikt schema versie %s';
$lang['noneed_upgrade_schema'] = 'De CMS database is bijgewerkt en gebruikt schema versie %s';
$lang['upgrade_modules'] = 'Bezig met bijwerken van modules';
$lang['noneed_upgrade_modules'] = 'De core modules zijn bijgewerkt';
$lang['upgrade_sql_module_from_to'] = 'Bijwerken SQL van &quot;%s&quot; module van %s naar %s ...';
$lang['upgrade_event_module_from_to'] = 'Bijwerken Gebeurtenissen van &quot;%s&quot; module van %s naar %s ...';
$lang['sitedown_not_removed'] = 'Kan tmp/cache/SITEDOWN bestand niet verwijderen. Verwijder dit bestand handmatig, anders zal uw site een &quot;Site Down for Maintenance&quot; melding blijven weergeven.';
$lang['upgrade_ok'] = 'Controleer uw config.php, wijzig de mogelijke nieuwe instellingen en stel het bestand daarna weer in als &#039;Alleen lezen&#039; (CHMOD444). U moet ook controleren of al uw modules up-to-date zijn. Hiervoor gaat u naar Uitbreidingen -> Module Manager en kijk in de tab &#039;Beschikbare Upgrades&#039;.';
$lang['upgrade_complete'] = 'Update proces voltooid';
$lang['upgrade_end'] = 'Het CMS is up-to-date. Klik op %s om naar uw website te gaan, of %s.';
$lang['here'] = 'hier';
$lang['go_to_admin'] = 'ga naar het Beheerpaneel';
$lang['errorfilenot'] = 'Bestand niet gevonden!';
$lang['errorfilenotwritable'] = 'Bestand niet beschrijfbaar!';
$lang['nofiles'] = 'Deze bron bestaat niet!';
$lang['is_directory'] = 'Deze bron is een map!';
$lang['is_readable_false'] = 'Deze bron is niet leesbaar!';
$lang['checksum_match'] = 'Checksum klopt!';
$lang['checksum_not_match'] = 'Checksum komt niet overeen!';
$lang['not_checksum'] = 'Geen checksum gevonden!';
$lang['format_datetime'] = '%c ';
$lang['upload_err_ini_size'] = 'Het ge&uuml;ploade bestand overschrijdt upload_max_filesize instelling in php.ini!';
$lang['upload_err_form_size'] = 'Het ge&uuml;ploade bestand overschrijdt MAX_FILE_SIZE instelling die is op gegeven in het HTML formulier.';
$lang['upload_err_partial'] = 'Het ge&uuml;ploade bestand is slechts gedeeltelijk ge&uuml;pload.';
$lang['upload_err_no_file'] = 'Er is geen bestand ge&uuml;pload.';
$lang['upload_err_no_tmp_dir'] = 'Mist een tijdelijke map.';
$lang['upload_err_cant_write'] = 'Fout bij het wegschrijven van bestand naar schijf.';
$lang['upload_err_extension'] = 'Bestandupload gestopt door extensie.';
$lang['upload_err_empty'] = 'Bestand heeft geen omvang (0kb).';
$lang['upload_err_unknown'] = 'Onbekende upload fout.';
$lang['function_file_uploads_off'] = 'file_uploads is in uw php configuratie uitgeschakeld!';
$lang['upload_file_no_readable'] = 'Ge&uuml;pload bestand is onleesbaar.';
$lang['upload_file_multiple'] = 'Meerdere bestandsuploads zijn niet toegestaan!';
$lang['test_check_magic_quotes_gpc'] = 'Magic quotes voor Get/Post/Cookie bewerkingen';
$lang['test_check_magic_quotes_gpc_failed'] = 'Enkele aanhalingstekens, dubbele aanhalingstekens en backslashes worden automatisch verwijderd. U kunt daardoor problemen krijgen bij het gebruik van het CMS.';
$lang['test_check_magic_quotes_runtime'] = 'Er bevinden zich magic quotes in de runtime.';
$lang['test_check_magic_quotes_runtime_failed'] = 'Als magic_quotes zijn ingeschakeld, zullen de meeste functies data met elke soort van externe verbinding, inclusief databases en tekstbestanden, de quotes vervangen met een backslash. Dit kan problemen veroorzaken.';
$lang['install_admin_checksum'] = 'Controleer uw installatie';
$lang['upgrade_admin_checksum'] = 'Controleer uw systeem upgrade';
$lang['checksum'] = 'Checksum test ';
$lang['checksum_file'] = 'Checksum bestand';
$lang['install_test_checksum'] = 'U kunt de echtheid van de bestanden van uw CMS vergelijken met de originele bestanden door middel van een checksum. Het kan helpen met het opsporen van problemen bij uploads.';
$lang['checksum_passed'] = 'Alle checksums kloppen!';
$lang['checksum_failed'] = 'Checksum komt overeen met fouten. Kijk bij help voor meer informatie.';
$lang['test_check_open_basedir'] = 'Controle op &#039;PHP Open Basedir&#039;';
$lang['test_check_open_basedir_failed'] = '&#039;Open basedir&#039; beperking is actief. Sommige additionele functionaliteiten kunnen hierdoor beperkt werken.';
$lang['unlimited'] = 'Ongelimiteerd';
$lang['test_open_basedir_session_save_path'] = '&#039;Open basedir&#039; beperkingen lijken van invloed te zijn. Als u SESSION problemen krijgt en ini_set is toepasbaar, kunt u proberen om sessions door middel van cookies aan te zetten door: ini_set(&#039;session.use_only_cookies&#039;, 1);  boven in het config.php bestand te plaatsen.';
$lang['install_warn_db_createtables'] = 'Normaal dient dit veld aangevinkt te zijn. Wees voorzichtig met het uitschakelen van deze optie.';
$lang['install_admin_tablesnotcreated'] = 'Proces gereed. De installatie is gereed. Op uw verzoek zijn er g&eacute;&eacute;n tabellen in de database aangemaakt. De config.php is echter gereset en alle pre-installatie testen zijn uitgevoerd. Bedankt, hier is uw';
$lang['info_create_dir_and_file'] = 'De HTTP proces eigenaar kan geen bestand aanmaken in een directory waar deze eigenaar van is. Dit betekent waarschijnlijk dat safe mode is ingeschakeld. Veel functies binnen CMS Made Simple zullen waarschijnlijk niet goed werken als dit niet mogelijk is. Doorgaan is niet mogelijk.';
$lang['test_create_dir_and_file'] = 'Controleert of het httpd proces een bestand kan aanmaken in een (door het proces) aangemaakte directory.';
$lang['cms_site'] = 'CMS Website ';
$lang['or_greater'] = 'Of groter';
$lang['sitename'] = 'Website naam';
$lang['warning_safe_mode'] = '<strong><em>WAARSCHUWING:</em></strong> PHP Safe Mode is ingeschakeld. Dit geeft mogelijk problemen bij het uploaden van bestanden met de webbrowser interface, waaronder afbeeldingen, thema&#039;s en module XML installaties. Het is aan te raden om contact op te nemen met de Host, en deze de Safe Mode te laten uitschakelen.';
$lang['test'] = 'Test ';
$lang['results'] = 'Resultaten';
$lang['untested'] = 'Niet getest';
$lang['owner'] = 'Eigenaar';
$lang['permissions'] = 'Toestemmingen';
$lang['off'] = 'Uit';
$lang['on'] = 'Aan';
$lang['permission_information'] = 'Toestemming informatie';
$lang['server_os'] = 'Server Operating System ';
$lang['server_api'] = 'Server API ';
$lang['server_software'] = 'Server Software ';
$lang['server_information'] = 'Server Informatie';
$lang['session_save_path'] = 'Opslagpad voor sessie';
$lang['max_execution_time'] = 'Maximale Uitvoer Tijd';
$lang['gd_version'] = 'GD versie';
$lang['upload_max_filesize'] = 'Maximale Upload Grootte';
$lang['post_max_size'] = 'Maximale Post Grootte';
$lang['memory_limit'] = 'PHP Memory Limit ';
$lang['server_db_type'] = 'Server Database ';
$lang['server_db_version'] = 'Server Database Versie';
$lang['phpversion'] = 'Huidige PHP Versie';
$lang['safe_mode'] = 'PHP Safe Mode ';
$lang['php_information'] = 'PHP Informatie';
$lang['cms_install_information'] = 'CMS Installatie informatie';
$lang['cms_version'] = 'CMS Versie';
$lang['systeminfo_copy_paste'] = 'Kopieer en plak deze geselecteerde tekst in je forum bericht';
$lang['help_systeminformation'] = 'De hieronder getoonde informatie, uit verschillende elementen van het systeem, kunnen worden gebruikt bij probleem analyse van uw CMS Made Simple website.';
$lang['systeminfo'] = 'Systeem Informatie';
$lang['systeminfodescription'] = 'Tonen van verschillende informatie elementen van het systeem die kunnen worden gebruikt bij probleem analyse';
$lang['error'] = 'Fout';
$lang['new_version_available'] = '<em>Opmerking:</em> Er is een nieuwere versie van CMS Made Simple beschikbaar. Neem contact op met uw websitebeheerder.';
$lang['info_urlcheckversion'] = 'Wanneer &quot;none&quot; wordt opgegeven wordt geen controle gedaan .<br/>Een lege URL zal gebruik maken van de standaard-link.';
$lang['urlcheckversion'] = 'Controleer op nieuwe versie van het CMS door het gebruik van deze link';
$lang['read'] = 'Lezen';
$lang['write'] = 'Schrijven';
$lang['execute'] = 'Uitvoeren';
$lang['group'] = 'Groep';
$lang['other'] = 'Andere';
$lang['global_umask'] = 'Bestandscreatiemasker (umask)';
$lang['errorcantcreatefile'] = 'Kan geen bestand aanmaken (rechtenprobleem?)';
$lang['add'] = 'Toevoegen';
$lang['about'] = 'Over';
$lang['action'] = 'Actie';
$lang['actionstatus'] = 'Actie / Status';
$lang['active'] = 'Actief';
$lang['cantremove'] = 'Kan niet verwijderen';
$lang['changepermissions'] = 'Wijzig rechten';
$lang['changepermissionsconfirm'] = 'WEES VOORZICHTIG\n\n Deze actie probeert alle bestanden waaruit de module bestaat schrijfbaar voor de webserver te maken.\nWeet u zeker dat u door wilt gaan?';
$lang['success'] = 'Succes';
$lang['advanced'] = 'Geavanceerd';
$lang['back'] = 'Terug naar Menu';
$lang['cancel'] = 'Annuleren';
$lang['cantchmodfiles'] = 'Kon de rechten op sommige bestanden niet wijzigen.';
$lang['cantremovefiles'] = 'Probleem bij het verwijderen van bestanden (rechten?)';
$lang['create'] = 'Maak';
$lang['database'] = 'Database ';
$lang['databaseprefix'] = 'Database Prefix (voorvoegsel)';
$lang['databasetype'] = 'Database Type ';
$lang['date'] = 'Datum';
$lang['default'] = 'Standaard';
$lang['delete'] = 'Verwijderen';
$lang['deleteconfirm'] = 'Ben u zeker dat je dit wilt verwijderen - %s - ?';
$lang['description'] = 'Omschrijving';
$lang['directoryexists'] = 'Deze directory bestaat al';
$lang['down'] = 'Beneden';
$lang['edit'] = 'Bewerken';
$lang['email'] = 'E-mail Adres';
$lang['errordeletingfile'] = 'Kan bestand niet verwijderen. Controleer of dit een rechtenprobleem is.';
$lang['errordirectorynotwritable'] = 'Geen rechten om in map te schrijven. Dit kan veroorzaakt worden door bestands- en eigendomsrechten. De veilige modus (PHP safe mode) kan ook aanstaan.';
$lang['cachenotwritable'] = 'De cachemap is niet schrijfbaar. Het legen van de cache is niet mogelijk. Zorg dat de map tmp/cache volledig lees/schrijf/uitvoer rechten heeft (chmod 777). Ook kan het nodig zijn de veilige modus (PHP safe mode) uit te schakelen.';
$lang['modulesnotwritable'] = 'De modulemap is niet schrijfbaar. Om modules te installeren door een XML-bestand te uploaden, moet de modulemap volledige lees/schrijf/uitvoer rechten hebben (chmod 777). De veilige modus (PHP safe mode) kan ook aanstaan.';
$lang['false'] = 'Nee';
$lang['settrue'] = 'Zet op Waar (true)';
$lang['filename'] = 'Bestandsnaam';
$lang['filesize'] = 'Bestand grootte';
$lang['help'] = 'Help ';
$lang['language'] = 'Taal';
$lang['lastname'] = 'Achternaam';
$lang['name'] = 'Naam';
$lang['password'] = 'Wachtwoord';
$lang['passwordagain'] = 'Wachtwoord (opnieuw)';
$lang['remove'] = 'Verwijderen';
$lang['saveconfig'] = 'Configuratie opslaan';
$lang['true'] = 'Waar';
$lang['setfalse'] = 'Zet op onwaar';
$lang['type'] = 'Type ';
$lang['typenotvalid'] = 'Type is niet correct';
$lang['unknown'] = 'Onbekend';
$lang['user'] = 'Gebruiker';
$lang['userdefinedtags'] = 'Gebruikergedefinieerde tags (UDT)';
$lang['usermanagement'] = 'Gebruikersbeheer';
$lang['username'] = 'Gebruikersnaam';
$lang['usernameincorrect'] = 'Gebruikersnaam of wachtwoord zijn niet correct';
$lang['version'] = 'Versie';
$lang['install_title'] = 'CMS Made Simple Installatie (stap %s)';
$lang['install_system'] = 'Installeer Systeem';
$lang['install_thanks'] = 'Bedankt voor het installeren van CMS Made Simple.';
$lang['upgrade_title'] = 'CMS Made Simple Upgrade (stap %s)';
$lang['upgrade_system'] = 'Upgraden van het systeem';
$lang['upgrade_thanks'] = 'Bedankt voor het upgraden van CMS Made Simple naar';
$lang['install_please_read'] = 'Lees de <a href="http://wiki.cmsmadesimple.org/index.php/User_Handbook/Installation/Troubleshooting" > Installation Troubleshooting</a> pagina in het CMS Made Simple Documentatie Wiki.';
$lang['install_checking'] = 'Controleer rechten en PHP instellingen';
$lang['install_test'] = 'Test ';
$lang['install_result'] = 'Resultaat';
$lang['install_required_settings'] = 'Verplichte instellingen';
$lang['install_recommended_settings'] = 'Aanbevolen instellingen';
$lang['install_you_have'] = 'U hebt';
$lang['install_legend'] = 'Legenda';
$lang['install_symbol'] = 'Symbool';
$lang['install_definition'] = 'Definitie';
$lang['install_value_passed'] = 'Een verplichte test is geslaagd';
$lang['install_value_failed'] = 'Een verplichte test is mislukt';
$lang['install_error_fragment'] = 'Info Hulp bij Installatie';
$lang['install_value_required'] = 'Een instelling voldoet niet aan de minimale eisen';
$lang['install_value_recommended'] = 'Een instelling is boven de vereiste, maar onder de aanbevolen waarde<br />of... een onderdeel dat <em>misschien</em> vereist is voor optionele functionaliteit is niet beschikbaar';
$lang['install_value_exceed'] = 'Een instelling valt binnen of boven de aanbevolen drempel waardes<br />of... een onderdeel dat <em>misschien<em> vereist is voor optionele functionaliteit is beschikbaar
';
$lang['install_test_failed'] = 'Een of meer van de tests zijn niet gelukt. Het systeem kan wel ge&iuml;nstalleerd worden, maar sommige functionaliteiten zullen misschien niet correct functioneren.<br />Probeer de situatie te corrigeren en klik op &quot;Probeer opnieuw&quot;, of klik op &quot;Volgende&quot;.
';
$lang['install_test_passed'] = 'Alle testen zijn gelukt (in ieder geval op het minimale niveau). Klik de &quot;Volgende&quot; button.';
$lang['install_failed_again'] = 'E&eacute;n of meerdere testen zijn mislukt. Herstel de problemen en voer de test opnieuw uit.';
$lang['install_try_again'] = 'Probeer opnieuw';
$lang['install_continue'] = 'Volgende';
$lang['failure'] = 'Mislukt';
$lang['caution'] = 'Voorzichtig';
$lang['install_admin_umask'] = 'Test umask server';
$lang['install_test_umask'] = 'Klik de Test knop om te controleren...';
$lang['test_umask_text'] = 'umask (afgekort van user file creation mode mask) is een functie in POSIX omgevingen die de standaard systeem instellingen voor nieuw (door het huidige proces) aangemaakte bestanden en directories be&iuml;nvloedt. Het bepaalt welke bestandsrechten niet worden ingesteld voor ieder nieuw aangemaakt bestand.';
$lang['test_check_umask'] = 'Resultaat test op bestand aangemaakt in';
$lang['test_umask_not_given'] = 'Umask niet opgegeven';
$lang['test_check_umask_failed'] = 'Test umask mislukt';
$lang['test_username_not_given'] = 'Gebruikersnaam niet opgegeven!';
$lang['test_username_illegal'] = 'Gebruikersnaam bevat verkeerde tekens!';
$lang['test_not_both_passwd'] = 'U heeft niet beide wachtwoordvelden ingevuld!';
$lang['test_passwd_not_match'] = 'Wachtwoorden komen niet overeen!';
$lang['test_email_accountinfo'] = 'E-mail accountinfo geselecteerd, maar geen e-mail adres opgegeven!';
$lang['test_database_prefix'] = 'Database voorvoegsel bevat foutieve karakters';
$lang['test_no_dbms'] = 'Geen dbms geselecteerd!';
$lang['test_could_not_connect_db'] = 'Kan geen verbinding maken met de database. Controleer je gebruikersnaam en wachtwoord en probeer het opnieuw.';
$lang['test_could_not_drop_table'] = 'Niet mogelijk tabel te verwijderen. Controleer de rechten van de gebruiker op de database.';
$lang['test_could_not_create_table'] = 'Niet mogelijk tabel aan te maken. Controleer de rechten van de gebruiker op de database.';
$lang['test_check_php'] = 'Controleer voor PHP versie %s+';
$lang['test_min_recommend'] = '(minimaal %s, aanbevolen %s of hoger)';
$lang['test_min_recommend_plus'] = '(minimaal %s, aanbevolen %s+)';
$lang['test_requires_php_version'] = 'CMS Made Simple heeft een php versie nodig van 5.2.4 of hoger (u heeft %s), maar PHP %s of hoger is aanbevolen voor de beste prestaties bij het gebruik van modules van derden';
$lang['test_check_md5_func'] = 'Controleren op md5-funktie';
$lang['test_check_safe_mode'] = 'Controle op safe mode';
$lang['test_check_safe_mode_failed'] = 'PHP veilige modus kan voor problemen met het uploaden van bestanden en andere functies. Het hangt allemaal af van hoe streng je server veilige modus instellingen zijn.';
$lang['test_check_tokenizer'] = 'Controle van tokenizer functies';
$lang['test_check_tokenizer_failed'] = 'Als u geen tokenizer heeft, kunnen pagina&#039;s volledig wit geladen worden. We raden u aan dit te installeren.';
$lang['test_check_gd'] = 'Controle van GD bibliotheek';
$lang['test_check_gd_failed'] = 'GD bibliotheek is verplicht voor sommige modules en funtionaliteiten.';
$lang['test_check_write'] = 'Controle van schrijfrechten in';
$lang['test_may_not_exist'] = 'Het is mogelijk dat dit bestand niet bestaat. Wanneer deze niet bestaat, cre&euml;er een leeg bestand met deze naam. Zorg dat het webserver proces schrijfrechten heeft.';
$lang['could_not_retrieve_a_value'] = 'Geen waarde opgehaald... verwerking gaat verder.';
$lang['displaying_the_value_originally'] = '<br />Toont de originele waarde in het configuratie-bestand (deze hoeft niet actueel te zijn).';
$lang['test_check_xml_func'] = 'Controle van elementaire XML (expat) ondersteuning';
$lang['test_check_xml_failed'] = 'XML ondersteuning is niet in de php installatie gecompileerd. Het systeem kan gebruikt worden, maar zal niet in staat zijn de module installatie functies &quot;op afstand&quot; van modulebeheer te gebruiken.
';
$lang['test_allow_url_fopen_failed'] = 'Als url fopen uitgeschakeld is zal het niet lukken URL objecten zoals bestanden te open middels het ftp of http protocol.
';
$lang['test_remote_url'] = 'Test van externe URL';
$lang['test_remote_url_failed'] = 'Het zal waarschijnlijk niet lukken een bestand op een andere/externe webserver te openen.';
$lang['connection_error'] = 'Uitgaande http connecties lijken niet te werken! Er is een firewall of ACL voor de externe aansluitingen? Dit zal resulteren in het niet werken van module manager, en mogelijk ook andere functies.';
$lang['remote_connection_timeout'] = 'Verbinden duurde te lang!';
$lang['search_string_find'] = 'Verbinden geslaagd!';
$lang['connection_failed'] = 'Verbinden mislukt!';
$lang['remote_response_ok'] = 'Extern antwoord: Geslaagd!';
$lang['remote_response_404'] = 'Extern antwoord: Niet gevonden!';
$lang['remote_response_error'] = 'Extern antwoord: Fout!';
$lang['test_check_file_upload'] = 'Controle van bestand uploads';
$lang['test_check_file_failed'] = 'Als bestand uploads uitgeschakeld zijn zal er geen gebruik gemaakt kunnen worden van de bestands upload faciliteiten van CMS Made Simple. Indien mogelijk moet deze beperking opgeheven worden om goed gebruik te kunnen maken van alle bestands management mogelijkheden. Ga door met de nodige voorzichtigheid.
';
$lang['test_check_memory'] = 'Controle van PHP geheugen limiet (php_memory_limit)';
$lang['test_check_memory_failed'] = 'Er is mischien niet genoeg geheugen beschikbaar voor PHP scripts om CMSMS correct te laten functioneren, of alle gewenste uitbreidingen te gebruiken. Indien mogelijk, probeer de systeembeheerder deze waarde te laten verhogen. Ga door met de nodige voorzichtigheid.';
$lang['test_check_time_limit'] = 'Controleren van PHP tijd limiet (time_limit) in seconden';
$lang['test_check_time_limit_failed'] = 'Aantal seconden dat een script is toegestaan te draaien. Als dit wordt bereikt geeft het script een fatale fout.';
$lang['test_check_post_max'] = 'Controle van maximale post grootte (max_post_size)';
$lang['test_check_post_max_failed'] = 'Het zal waarschijnlijk niet mogelijk zijn (grotere hoeveelheden) data te versturen. Houd rekening met deze beperking.';
$lang['test_check_upload_max'] = 'Controle van maximale upload bestandsgrootte (max_upload_file_size)';
$lang['test_check_upload_max_failed'] = 'Het zal waarschijnlijk niet mogelijk zijn (grotere) bestanden te uploaden met de opgenomen bestands management functies. Houd rekening met deze beperking.';
$lang['test_check_writable'] = 'Controleer of %s beschrijfbaar is';
$lang['test_check_upload_failed'] = 'De Uploads map is niet beschrijfbaar. Je kan nog steeds het systeem installeren, maar het is dan niet mogelijk om bestanden te uploaden via het CMS.';
$lang['test_check_images_failed'] = 'De Images map is niet beschrijfbaar. Je kan nog steeds het systeem installeren, maar het is dan niet mogelijk om images te uploaden via het CMS.';
$lang['test_check_modules_failed'] = 'De modules map is niet beschrijfbaar. Je kan nog steeds het systeem installeren, maar het is dan niet mogelijk om modules te uploaden via het CMS.';
$lang['test_check_file_get_contents'] = 'Controle van file_get_contents';
$lang['test_check_file_get_contents_failed'] = 'U zal hoogstwaarschijnlijk geen gebruik kunnen maken van functionaliteiten die deze functie gebruikt';
$lang['test_check_session_save_path'] = 'Controleer of session.save_path beschrijfbaar is';
$lang['test_empty_session_save_path'] = 'session.save_path is leeg. PHP gebruikt de tijdelijke directory van uw OS. Als er sessie problemen optreden en ini_set werkt, kunt u proberen sessie cookies in te schakelen door: ini_set(&#039;session.use_only_cookies&#039;, 1);  toe te voegen bovenaan in config.php';
$lang['test_check_session_save_path_failed'] = 'session.save_path is &quot;%s&quot;. Als dit pad niet beschrijfbaar is kan inloggen op het beheerpaneel niet werken. Zorg ervoor dat dit pad schrijfbaar is als u problemen heeft met het inloggen op het beheerpaneel. Deze test kan falen als safe_mode is ingeschakeld (zie hieronder).';
$lang['test_check_ini_set'] = 'Controleer of ini_set werkt';
$lang['test_check_ini_set_failed'] = 'Hoewel de mogelijkheid om php ini instellingen te overschrijven niet verplicht is, gebruiken sommige (optionele) functionaliteiten ini_set om timeouts te verlengen, uploaden van grotere bestanden toe te staan, etc. Het is mogelijk dat bepaalde optionele functionaliteit niet werkt zonder deze mogelijkheid. Deze test kan falen als PHP safe_mode is ingeschakeld (zie hieronder).
';
$lang['install_admin_header'] = 'Admin Account Informatie';
$lang['install_admin_info'] = 'Selecteer de gebruikersnaam, wachtwoord en E-mail adres voor de beheerders . Zorg ervoor dat u dit wachtwoord niet kwijtraakt aangezien het benodigd is om in te kunnen loggen op uw CMS Made Simple beheer systeem.';
$lang['install_admin_email'] = 'E-mail Adres';
$lang['install_admin_email_info'] = 'E-Mail Account Informatie';
$lang['install_admin_email_note'] = '<strong>Let op:</strong> Deze functie gebruikt de php mail functie. Al u geen email ontvangt is dit een indicatie dat de server niet goed is geconfigureerd en u contact dient op te nemen met een systeembeheerder.';
$lang['install_admin_sitename'] = 'Dit is de naam van je website. Het kan gebruikt worden op verschillende plaatsen in de templates of door deze {sitename} tag.';
$lang['install_admin_db'] = 'Database Informatie';
$lang['install_admin_db_info'] = '<p>Zorg ervoor dat de database is aangemaakt en de database gebruiker volledige rechten heeft op het gebruik ervan.</p>
<p>Voor MySQL vanuit console, doe het volgende:</p>
<p>Log in op mysql vanuit een console en geef de volgende commando&#039;s:</p>
<ol>
<li>create database cms; (of een andere gewenste naam voor de database, onthoud de naam, deze moet worden ingevuld op deze pagina)</li>
<li>grant all privileges on cms.* to cms_user@localhost identified by &quot;cms_pass&quot;;</li>
</ol>';
$lang['install_admin_follow'] = 'Vul onderstaande velden in het geheel in';
$lang['install_admin_db_type'] = 'Database Type ';
$lang['install_admin_no_db'] = 'Er lijken geen ondersteunde database drivers in de PHP installatie te zijn gecompileerd. Verzeker uzelf ervan dat mysql, mysqli en/of postgres7 ondersteuning is geinstalleerd en probeer opnieuw.';
$lang['install_admin_db_host'] = 'Database hostadres ';
$lang['install_admin_db_name'] = 'Database naam';
$lang['install_admin_db_create'] = 'Maak tabellen (Waarschuwing: Overschrijft bestaande data!!!)';
$lang['install_admin_db_prefix'] = 'Tabel prefix';
$lang['install_admin_db_sample'] = 'Installeer voorbeeld templates en teksten';
$lang['retry'] = 'Opnieuw';
$lang['install_admin_db_create_seq'] = 'Maak %s tabel sequence...';
$lang['install_admin_importing'] = 'Importeren voorbeeld data...';
$lang['invalid_query'] = 'Ongeldige query: %s';
$lang['install_creating_table'] = '<p>Maak %s tabel... [%s]</p>';
$lang['install_creating_index'] = '<p>Maak index in %s tabel... [%s]</p>';
$lang['done'] = 'gereed';
$lang['failed'] = 'mislukt';
$lang['install_admin_error_schema'] = 'Fout in ophalen van SQL schema';
$lang['install_admin_set_account'] = 'Admin account informatie wordt ingesteld...';
$lang['install_admin_set_sitename'] = 'Websitenaam wordt ingesteld... ';
$lang['install_admin_setup'] = 'Instellen van het configuratie bestand. De meeste gegevens zijn bekend, de kans is groot dat deze waarden niet gewijzigd hoeven te worden. Controleer de gegevens en klik op &quot;Volgende&quot; als u klaar bent.';
$lang['install_admin_docroot'] = 'CMS Website root (zoals gezien vanaf de webserver)';
$lang['install_admin_docroot_path'] = 'Pad naar de website root';
$lang['install_admin_querystring'] = 'Query string (ongewijzigd laten tenzij u problemen ondervindt, bewerk dan config.php handmatig)';
$lang['invalid_querys'] = '<b>WAARSCHUWING</b>: Foute queries in de database!';
$lang['install_admin_sitedown'] = 'Fout: Kan het bestand tmp/cache/SITEDOWN niet verwijderen. Verwijder deze handmatig.';
$lang['install_admin_update_hierarchy'] = 'Bijwerken van hierarchie posities...';
$lang['install_admin_set_core_event'] = 'Opzetten van core events...';
$lang['install_admin_install_modules'] = 'Bezig met installeren van modules...';
$lang['install_admin_index_search'] = 'Indexeren voor zoekfunctie... ';
$lang['install_admin_clear_cache'] = 'Verwijderen van site cache (indien aanwezig)';
$lang['install_admin_emailing'] = 'E-mail mijn admin account informatie...';
$lang['install_admin_congratulations'] = 'Gefeliciteerd, de installatie is gelukt - hier is uw';
$lang['could_not_connect_db'] = 'Kan geen verbinding maken met de database. Controleer de gebruikersnaam en het wachtwoord, en controleer of de gebruiker rechten heeft op de opgeven database.';
$lang['cannot_write_config'] = 'Fout: Kan niet schrijven in %s.';
$lang['email_accountinfo_subject'] = 'CMS Made Simple Admin Account Informatie';
$lang['email_accountinfo_message'] = 'Bedankt voor het installeren van CMS Made Simple.

Dit zijn de nieuwe inlog gegevens:
gebruikersnaam: %s
wachtwoord: %s

Log hier in op het beheerpaneel van de website: %s';
$lang['utma'] = '156861353.1908875727.1315500743.1315500743.1315500743.1';
$lang['utmz'] = '156861353.1315500743.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['qca'] = 'P0-1408926661-1309528475256';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>