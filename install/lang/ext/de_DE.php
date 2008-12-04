<?php
$lang['no_db_driver'] = 'Keine Datenbanktreiber-Anforderung in CMSms?';
$lang['test_check_output_buffering'] = 'Pr&uuml;fung auf output buffering';
$lang['test_check_output_buffering_failed'] = 'Output buffering ist bei Ihrem Host deaktiviert. Sie k&ouml;nnen wahrscheinlich keine der Funktionalit&auml;ten verwenden, die diese Funktion ben&ouml;tigen.';
$lang['phpinfo'] = 'Anzeige der PHP-Informationen';
$lang['mod_security'] = 'Apache Security Modul';
$lang['test_check_tempnam'] = 'Pr&uuml;fung auf die Funktion tempnam';
$lang['test_check_db_drivers'] = 'Datenbank-Treiber';
$lang['test_check_db_drivers_failed'] = 'Keine Datenbank-Treiber gefunden';
$lang['test_check_register_globals'] = 'Pr&uuml;fung auf PHP register globals';
$lang['test_check_register_globals_failed'] = 'PHP register globals ist auf Ihrem Host aktiv. Aus Sicherheitsgr&uuml;nden sollten Sie Ihren Hoster bitten, dies zu deaktivieren.';
$lang['test_check_disable_functions'] = 'Pr&uuml;fung auf deaktivierte PHP-Funktionen';
$lang['test_check_disable_functions_failed'] = 'Dies ist eine Liste der Funktionen, die auf Ihrem Server deaktiviert sind.';
$lang['install_admin_db_port'] = 'Datenbank-Port';
$lang['install_admin_db_port_info'] = 'Wenn Sie diesen Wert nicht kennen, lassen Sie ihn leer. Dann wird der serverseitig voreingestellte Datenbank-Port verwendet.';
$lang['install_admin_db_socket'] = 'Datenbank-Socket';
$lang['install_admin_db_socket_info'] = 'AKTUELL NICHT UNTERST&Uuml;TZT.';
$lang['install_admin_frontendlang'] = 'Voreingestellte Sprache f&uuml;r die Webseite. Der Wert dieses Feldes wird f&uuml;r die Voreinstellung verschiedener Funktionen verwendet (z.Bsp. Datums-Funktionen). Lassen Sie dieses Feld leer, wenn Sie eine mehrsprachige Webseite betreiben oder die Voreinstellungen des Servers verwenden m&ouml;chten.';
$lang['install_default_encoding'] = 'In den meisten F&auml;llen sollte die Standard-Kodierung utf-8 sein. Wenn Sie eine andere Kodierung verwenden m&ouml;chten, k&ouml;nnen Sie dies &auml;ndern. Bitte bedenken Sie jedoch, dass die Sprachdateien alle in utf-8 kodiert sind.';
$lang['installer_done'] = '[erledigt]';
$lang['installer_failed'] = '[fehlgeschlagen]';
$lang['create_permission'] = 'Erstelle Berechtigung ...';
$lang['add_column_sql'] = 'F&uuml;ge der Tabelle %s eine weitere Spalte hinzu ...';
$lang['update_table_sql'] = 'Aktualisiere die Tabelle %s ...';
$lang['installing_module'] = 'Installiere das Modul %s ...';
$lang['updating_schema_version'] = 'Aktualisiere Schema-Version %s ...';
$lang['upgrade_config'] = 'Die Datei config.php wird aktualisiert';
$lang['upgrade_config_info'] = 'Aktualisierung wird konfiguriert';
$lang['upgrade_failed_again'] = 'Ein oder mehrere Aktualisierungspr&uuml;fungen sind fehlgeschlagen. Bitte beheben Sie das Problem und klicken Sie den unten stehenden Button f&uuml;r eine erneute Pr&uuml;fung.';
$lang['upgrade_cache_dirs'] = 'Zwischenspeicher wird geleert';
$lang['cannot_clean_cache_dirs'] = 'Konnte den Zwischenspeicher nicht leeren!';
$lang['upgrade_schema'] = 'Schema aktualisieren';
$lang['need_upgrade_schema'] = 'Ihr CMS ben&ouml;tigt eine Aktualisierung.<br />Sie verwenden aktuell Schema-Version %s und m&uuml;ssen auf Version %s aktualisieren';
$lang['schema_ok'] = 'Jetzt ist Ihre CMS-Datenbank mit der Schema-Version %s aktuell';
$lang['noneed_upgrade_schema'] = 'Ihre CMS-Datenbank ist mit der verwendeten Schema-Version %s aktuell';
$lang['upgrade_modules'] = 'Aktualisiere die Module';
$lang['noneed_upgrade_modules'] = 'Die Core-Module sind auf dem aktuellsten Stand';
$lang['upgrade_sql_module_from_to'] = 'Aktualisiere die Datenbank des &quot;%s&quot;-Moduls von %s auf %s ...';
$lang['upgrade_event_module_from_to'] = 'Aktualisiere die Ereignisse des &quot;%s&quot;-Moduls von %s auf %s ...';
$lang['sitedown_not_removed'] = 'Konnte die Datei tmp/cache/SITEDOWN nicht entfernen. Bitte l&ouml;schen Sie diese Datei manuell, ansonsten wird auf Ihrer Webseite eine Wartungsmeldung angezeigt.';
$lang['upgrade_ok'] = 'Bitte schauen Sie sich die Datei config.php an, &auml;ndern ggf. die neuen Einstellungen nach Ihren Vorstellungen und setzen dann die Berechtigung f&uuml;r diese Datei auf einen sicheren Wert zur&uuml;ck. Sie sollten au&szlig;erdem pr&uuml;fen, dass alle Module aktuell sind. Hierzu gehen Sie in der Administration in das Men&uuml; &quot;Erweiterungen > Module&quot; und sehen nach ob dort eventuell ein Modul mit einem Hinweis &quot;Ben&ouml;tigt eine Aktualisierung&quot; versehen ist.';
$lang['upgrade_complete'] = 'Die Aktualisierung wurde erfolgreich beendet';
$lang['upgrade_end'] = 'Ihr CMS ist aktuell. Bitte klicken Sie %s, um zu Ihrer CMS-Seite zu gehen oder %s.';
$lang['here'] = 'hier';
$lang['go_to_admin'] = 'um zur Administration zu gelangen';
$lang['errorfilenot'] = 'Der Datei-String wurde nicht gefunden!';
$lang['errorfilenotwritable'] = 'Die Datei ist nicht beschreibbar!';
$lang['nofiles'] = 'Die angegebene Quelle existiert nicht!';
$lang['is_directory'] = 'Die angegebene Quelle ist ein Verzeichnis!';
$lang['is_readable_false'] = 'Die angegebene Quelle konnte nicht gelesen werden!';
$lang['checksum_match'] = 'Die Pr&uuml;fsumme stimmt &uuml;berein!';
$lang['checksum_not_match'] = 'Die Pr&uuml;fsumme stimmt NICHT &uuml;berein!';
$lang['not_checksum'] = 'Konnte keine Pr&uuml;fsumme erstellen!';
$lang['format_datetime'] = '%c';
$lang['upload_err_ini_size'] = 'Die hochgeladene Datei ist gr&ouml;&szlig;er als der Wert (upload_max_filesize), der nach Ihrer php.ini erlaubt ist!';
$lang['upload_err_form_size'] = 'Die hochgeladene Datei ist gr&ouml;&szlig;er als der Wert (MAX_FILE_SIZE), der im HTML-Formular festgelegt wurde.';
$lang['upload_err_partial'] = 'Die Datei wurde nur teilweise hochgeladen.';
$lang['upload_err_no_file'] = 'Es wurde keine Datei hochgeladen.';
$lang['upload_err_no_tmp_dir'] = 'Es fehlt ein tempor&auml;res Verzeichnis.';
$lang['upload_err_cant_write'] = 'Das Schreiben der Datei auf die Festplatte ist fehlgeschlagen.';
$lang['upload_err_extension'] = 'Das Hochladen der Datei wurde abgebrochen.';
$lang['upload_err_empty'] = 'Die Datei ist 0 Bytes gro&szlig;';
$lang['upload_err_unknown'] = 'Beim Hochladen der Datei ist ein unbekannter Fehler aufgetreten.';
$lang['function_file_uploads_off'] = 'Das Hochladen von Dateien ist in ihrer php.ini deaktiviert!';
$lang['upload_file_no_readable'] = 'Die hochgeladene Datei ist nicht lesbar!';
$lang['upload_file_multiple'] = 'Das Hochladen von mehreren Dateien ist nicht erlaubt!';
$lang['test_check_magic_quotes_gpc'] = 'Magic Quotes f&uuml;r Get/Post/Cookie Aktionen';
$lang['test_check_magic_quotes_gpc_failed'] = 'Wenn die Einstellung magic_quotes aktiviert ist, dann wird allen einfachen und doppelten Anf&uuml;hrungszeichen sowie Backslashes automatisch ein Backslash vorangestellt. Aufgrund dessen k&ouml;nnen beim Speichern von Templates Probleme auftreten.';
$lang['test_check_magic_quotes_runtime'] = 'Magic Quotes zur Laufzeit';
$lang['test_check_magic_quotes_runtime_failed'] = 'Wenn die Einstellung magic_quotes aktiviert ist, dann wird den Daten aus externen Quellen (einschlie&szlig;lich Datenbanken und Textdateien) von den meisten Funktionen automatisch ein Backslash vorangestellt. Aufgrund dessen k&ouml;nnen Probleme auftreten.';
$lang['install_admin_checksum'] = 'Die Installation pr&uuml;fen';
$lang['upgrade_admin_checksum'] = 'Die System-Aktualisierung pr&uuml;fen';
$lang['checksum'] = 'Pr&uuml;fsummen-Test';
$lang['checksum_file'] = 'Pr&uuml;fsummen-Datei';
$lang['install_test_checksum'] = 'Sie k&ouml;nnen die Integrit&auml;t Ihrer CMS-Dateien &uuml;ber einen Vergleich mit bekannte Pr&uuml;fsummen kontrollieren. Dies kann hilfreich sein, um Probleme beim Hochladen von Dateien ausfindig zu machen.';
$lang['checksum_passed'] = 'Alle Pr&uuml;fsummen stimmen &uuml;berein!';
$lang['checksum_failed'] = 'Die Pr&uuml;fsumme stimmt mit einigen Fehlern &uuml;berein. F&uuml;r weitere Informationen schauen Sie in die Hilfe.';
$lang['test_check_open_basedir'] = 'Pr&uuml;fung auf PHP Open Basedir';
$lang['test_check_open_basedir_failed'] = 'Die &quot;Open basedir&quot;-Beschr&auml;nkungen sind bei Ihnen aktiviert. Es kann sein, dass aufgrund dieser Beschr&auml;nkung Schwierigkeiten bei bestimmten Funktionalit&auml;ten auftreten.';
$lang['unlimited'] = 'Keine Einschr&auml;nkung';
$lang['test_open_basedir_session_save_path'] = 'Die &quot;Open basedir&quot;-Beschr&auml;nkungen scheint bei Ihnen aktiviert zu sein. Wenn Sie Probleme mit Sessions haben, aber der Befehl ini_set ausgef&uuml;hrt werden kann, k&ouml;nnen Sie versuchen, die Option &quot;session by cookies&quot; zu aktivieren, indem Sie der Datei include.php gleich in der ersten Zeile folgendes hinzuf&uuml;gen: ini_set(&#039;session.use_only_cookies&#039;, 1);';
$lang['install_warn_db_createtables'] = 'Normalerweise sollte dieses Feld regelm&auml;&szlig;ig &uuml;berpr&uuml;ft werden. Sie sollten daher wissen, was Sie tun, wenn Sie diese Option deaktivieren.';
$lang['install_admin_tablesnotcreated'] = 'Die Installation ist jetzt vollst&auml;ndig. Aufgrund Ihrer Einstellungen wurden die Datenbanktabellen NICHT erzeugt. Die Einstellungen in der Datei config.php wurden vorgenommen und alle Tests erfolgreich absolviert.  Vielen Dank, hier ist Ihr';
$lang['info_create_dir_and_file'] = 'Der httpd-Proze&szlig; kann in eigenen Verzeichnissen keine Datei erzeugen. Das bedeutet, dass der Safe-Modus auf Ihrem Host aktiviert ist. Ohne diese F&auml;higkeit k&ouml;nnen einige Funktionen von CMS made simple jedoch nicht arbeiten. Die Fortsetzung ist daher nicht m&ouml;glich.';
$lang['test_create_dir_and_file'] = 'Pr&uuml;fung, ob der httpd-Proze&szlig; eine Datei in einem selbst erstellten Verzeichnis erzeugen kann.';
$lang['cms_site'] = 'CMS Seite';
$lang['or_greater'] = 'Oder h&ouml;her';
$lang['sitename'] = 'Name der Webseite';
$lang['warning_safe_mode'] = '<strong><em>WARNUNG:</em></strong> Der PHP-Safe-Modus ist auf Ihrem Server aktiviert. Beim Hochladen von Bildern, Themes und Modul-XML-Dateien kann es eventuell zu Problemen kommen. Fragen Sie den Server-Administrator, ob er den Safe-Modus deaktiviert.';
$lang['test'] = 'Testen';
$lang['results'] = 'Ergebnisse';
$lang['untested'] = 'Nicht getestet';
$lang['owner'] = 'Eigent&uuml;mer';
$lang['permissions'] = 'Berechtigungen';
$lang['off'] = 'Aus';
$lang['on'] = 'An';
$lang['permission_information'] = 'Berechtigungs-Informationen';
$lang['server_os'] = 'Server-Betriebssystem';
$lang['server_api'] = 'Server-API';
$lang['server_software'] = 'Server-Software';
$lang['server_information'] = 'Server-Information';
$lang['session_save_path'] = 'Speicherpfad f&uuml;r Sessions';
$lang['max_execution_time'] = 'Maximale Ausf&uuml;hrungszeit';
$lang['gd_version'] = 'GD-Version';
$lang['upload_max_filesize'] = 'Maximale Gr&ouml;&szlig;e f&uuml;r hochzuladende Dateien';
$lang['post_max_size'] = 'Maximale Gr&ouml;&szlig;e f&uuml;r POST-Dateien';
$lang['memory_limit'] = 'PHP-Speicherlimit';
$lang['server_db_type'] = 'Server-Datenbank';
$lang['server_db_version'] = 'Version der Server-Datenbank';
$lang['phpversion'] = 'Aktuelle PHP-Version';
$lang['safe_mode'] = 'PHP Safe-Mode';
$lang['php_information'] = 'PHP-Informationen';
$lang['cms_install_information'] = 'Informationen zur CMSms-Installation';
$lang['cms_version'] = 'CMS-Version';
$lang['systeminfo_copy_paste'] = 'Klicken Sie hier, um diese Informationen f&uuml;r eine Anfrage im Forum zu kopieren.';
$lang['help_systeminformation'] = 'Die hier angezeigten Informationen werden von verschiedenen Stellen Ihres Systems gesammelt und zusammengefasst angezeigt. Diese Informationen k&ouml;nnen hilfreich sein, wenn Sie versuchen, ein bestimmtes Problem zu diagnostizieren. Auch bei Fragen im CMSms-Forum k&ouml;nnen diese Informationen weiterhelfen, eine L&ouml;sung zu finden.';
$lang['systeminfo'] = 'System-Informationen';
$lang['systeminfodescription'] = 'Zeigt bestimmte Informationen Ihres Systems an, die bei der Diagnostizierung von Problemen hilfreich sein k&ouml;nnen';
$lang['error'] = 'Fehler';
$lang['new_version_available'] = '<em>ACHTUNG:</em> Eine neue Version von CMS made simple ist verf&uuml;gbar. Sie sollten schnellstm&ouml;glich Ihren Administrator/Webmaster f&uuml;r eine Aktualisierung kontaktieren.';
$lang['info_urlcheckversion'] = 'Wird in diesem Feld &quot;none&quot; eingegeben, erfolgt keine &Uuml;berpr&uuml;fung.<br />Ohne Eintrag wird eine intern vorgegebene URL verwendet.';
$lang['urlcheckversion'] = '&Uuml;ber diese URL auf neue CMSms-Versionen pr&uuml;fen';
$lang['read'] = 'Lesen';
$lang['write'] = 'Schreiben';
$lang['execute'] = 'Ausf&uuml;hren';
$lang['group'] = 'Gruppe';
$lang['other'] = 'Andere';
$lang['global_umask'] = 'Maske zum Erstellen von Dateien (umask)';
$lang['errorcantcreatefile'] = 'Konnte keine Datei erstellen (Berechtigungsproblem?)';
$lang['add'] = 'Hinzuf&uuml;gen';
$lang['about'] = '&Uuml;ber';
$lang['action'] = 'Aktion';
$lang['actionstatus'] = 'Aktion/Status';
$lang['active'] = 'Aktiv';
$lang['cantremove'] = 'Kann aktuell nicht entfernt werden (Verzeichnis-Berechtigung)';
$lang['changepermissions'] = 'Berechtigungen &auml;ndern';
$lang['changepermissionsconfirm'] = 'ACHTUNG\n\nDiese Aktion wird versuchen sicherzustellen, dass alle von den Modulen erstellten Dateien vom Webserver beschreibbar sind.\nWollen Sie das wirklich?';
$lang['success'] = 'Erfolgreich abgeschlossen';
$lang['advanced'] = 'Weitere Optionen';
$lang['back'] = 'Zur&uuml;ck zum Men&uuml;';
$lang['cancel'] = 'Abbrechen';
$lang['cantchmodfiles'] = 'Konnte die Berechtigungen einiger Dateien nicht &auml;ndern';
$lang['cantremovefiles'] = 'Problem beim Entfernen von Dateien (Berechtigungen?)';
$lang['create'] = 'Erstellen';
$lang['database'] = 'Datenbank';
$lang['databaseprefix'] = 'Datenbank-Prefix';
$lang['databasetype'] = 'Datenbank-Typ';
$lang['date'] = 'Datum';
$lang['default'] = 'Standard';
$lang['delete'] = 'L&ouml;schen';
$lang['deleteconfirm'] = 'Wollen Sie wirklich - %s - l&ouml;schen?';
$lang['description'] = 'Beschreibung';
$lang['directoryexists'] = 'Dieses Verzeichnis existiert bereits.';
$lang['down'] = 'Zur&uuml;ck';
$lang['edit'] = 'Bearbeiten';
$lang['email'] = 'Email-Adresse';
$lang['errordeletingfile'] = 'Konnte die Datei nicht l&ouml;schen. Ein Berechtigungsproblem?';
$lang['errordirectorynotwritable'] = 'Keine Berechtigung in dieses Verzeichnis zu schreiben. Ursache daf&uuml;r k&ouml;nnen die Berechtigungen und die Eigent&uuml;merschaft sein. Au&szlig;erdem kann dies eine Auswirkung des Safe-Modus sein.';
$lang['cachenotwritable'] = 'Das cache-Verzeichnis ist nicht beschreibbar. Die Leerung des Zwischenspeichers wird daher nicht funktionieren. Bitte geben Sie dem Verzeichnis tmp/cache die vollen Lese-/Schreib- und Ausf&uuml;hrungsberechtigungen (chmod 777). Zus&auml;tzlich sollten Sie den Safe-Modus deaktivieren.';
$lang['modulesnotwritable'] = 'Das /modules-Verzeichnis ist nicht beschreibbar. Wenn Sie Module &uuml;ber die Administration installieren m&ouml;chten (als XML-Datei), sollten Sie diesem Verzeichnis die vollen Lese-/Schreib- und Ausf&uuml;hrungsberechtigungen geben (chmod 777). Dies kann jedoch auch eine Auswirkung des Safe-Modus sein.';
$lang['false'] = 'Falsch';
$lang['settrue'] = 'Auf True setzen';
$lang['filename'] = 'Dateiname';
$lang['filesize'] = 'Dateigr&ouml;&szlig;e';
$lang['help'] = 'Hilfe';
$lang['language'] = 'Sprache';
$lang['lastname'] = 'Nachname';
$lang['name'] = 'Name';
$lang['password'] = 'Passwort';
$lang['passwordagain'] = 'Passwort (nochmals)';
$lang['remove'] = 'Entfernen';
$lang['saveconfig'] = 'Konfiguration speichern';
$lang['true'] = 'Richtig';
$lang['setfalse'] = 'Auf False setzen';
$lang['type'] = 'Typ';
$lang['typenotvalid'] = 'Der Typ ist ung&uuml;ltig.';
$lang['unknown'] = 'Unbekannt';
$lang['user'] = 'Benutzer';
$lang['userdefinedtags'] = 'Benutzerdefinierte Tags';
$lang['usermanagement'] = 'Benutzerverwaltung';
$lang['username'] = 'Benutzername';
$lang['usernameincorrect'] = 'Benutzername oder Passwort sind falsch';
$lang['version'] = 'Version';
$lang['install_title'] = 'CMS Made Simple - Installation - Schritt %s';
$lang['install_system'] = 'Installations-System';
$lang['install_thanks'] = 'Vielen Dank f&uuml;r die Installation von CMS made simple';
$lang['upgrade_title'] = 'CMS made simple - Aktualisierung - Schritt %s';
$lang['upgrade_system'] = 'Aktualisierungs-System';
$lang['upgrade_thanks'] = 'Vielen Dank f&uuml;r die Aktualisierung von CMS made simple auf ';
$lang['install_please_read'] = 'Sollten bei der Installation Probleme auftreten, lesen Sie bitte den Abschnitt <a href="http://wiki.cmsmadesimple.org/index.php/User_Handbook/Installation/Troubleshooting/de">Fehlersuche</a> im CMS made simple Wiki.';
$lang['install_checking'] = 'Berechtigungen und PHP-Einstellungen pr&uuml;fen';
$lang['install_test'] = 'Testen';
$lang['install_result'] = 'Ergebnis';
$lang['install_required_settings'] = 'Erforderliche Einstellungen';
$lang['install_recommended_settings'] = 'Empfohlene Einstellungen';
$lang['install_you_have'] = 'Ihre Einstellung';
$lang['install_legend'] = 'Legende';
$lang['install_symbol'] = 'Symbol';
$lang['install_definition'] = 'Definition';
$lang['install_value_passed'] = 'Ein erforderlicher Test ist bestanden';
$lang['install_value_failed'] = 'Ein erforderlicher Test ist fehlgeschlagen';
$lang['install_error_fragment'] = 'Info zur Installations-Fehlersuche';
$lang['install_value_required'] = 'Eine Einstellung ist unterhalb des erforderlichen Minimums';
$lang['install_value_recommended'] = 'Eine Einstellung ist oberhalb des erforderlichen, aber unterhalb des empfohlenen Wertes. <br />Es <em>kann</em> daher sein, dass bestimmte Funktionen, die f&uuml;r zus&auml;tzliche Funktionalit&auml;ten ben&ouml;tigt werden, nicht verf&uuml;gbar sind.';
$lang['install_value_exceed'] = 'Eine Einstellung entspricht oder &uuml;bertrifft den empfohlenen Wert<br />Es <em>kann</em> daher sein, dass bestimmte Funktionen, die f&uuml;r zus&auml;tzliche Funktionalit&auml;ten ben&ouml;tigt werden, verf&uuml;gbar sind.';
$lang['install_test_failed'] = 'Ein oder mehrere Tests sind fehlgeschlagen. Sie k&ouml;nnen das System zwar installieren, aber einige Funktionen werden nicht richtig funktionieren.<br />Versuchen Sie, dies zu &auml;ndern und klicken dann auf &quot;Neuer Versuch&quot;. Anderenfalls klicken Sie auf den Button &quot;Weiter&quot;.';
$lang['install_test_passed'] = 'Alle Tests wurden bestanden (teilweise auf minimalem Niveau). Bitte klicken Sie auf &quot;Weiter&quot;.';
$lang['install_failed_again'] = 'Ein oder mehrere Tests sind fehlgeschlagen. Bitte beheben Sie das Problem und klicken auf &quot;Neuer Versuch&quot;, um die Tests zu wiederholen.';
$lang['install_try_again'] = 'Neuer Versuch';
$lang['install_continue'] = 'Weiter';
$lang['failure'] = 'Fehlgeschlagen';
$lang['caution'] = 'Achtung';
$lang['install_admin_umask'] = 'Maske zum Erstellen von Dateien (umask) testen';
$lang['install_test_umask'] = 'F&uuml;r einen Test klicken Sie auf den Button &quot;Testen&quot;.';
$lang['test_umask_text'] = 'umask (abgek&uuml;rzt von user file creation mode mask) ist eine Funktion in POSIX-Umgebungen, mit der die Voreinstellungen f&uuml;r neu erstellte Dateien und Verzeichnisse gesteuert werden k&ouml;nnen. Damit wird kontrolliert, welche der Berechtigungen f&uuml;r eine neu erstellte Datei nicht gesetzt werden sollen.';
$lang['test_check_umask'] = 'Das Testergebnis wurde in einer Datei gespeichert - im Verzeichnis ';
$lang['test_umask_not_given'] = 'Kein umask-Wert vorgegeben';
$lang['test_check_umask_failed'] = 'Der umask-Test ist fehlgeschlagen';
$lang['test_username_not_given'] = 'Es wurde kein Benutzername eingegeben!';
$lang['test_username_illegal'] = 'Der Benutzername enth&auml;lt unzul&auml;ssige Zeichen!';
$lang['test_not_both_passwd'] = 'Es wurden nicht beide Passwort-Felder ausgef&uuml;llt!';
$lang['test_passwd_not_match'] = 'Die eingegebenen Passw&ouml;rter stimmen nicht &uuml;berein!';
$lang['test_email_accountinfo'] = 'Es wurde eine Info per Email &uuml;ber das Benutzerkonto ausgew&auml;hlt, aber keine Email-Adresse eingegeben!';
$lang['test_database_prefix'] = 'Der Datenbank-Prefix enth&auml;lt ung&uuml;ltige Zeichen';
$lang['test_no_dbms'] = 'Keine Datenbank ausgew&auml;hlt!';
$lang['test_could_not_connect_db'] = 'Die Verbindung zur Datenbank konnte nicht hergestellt werden. Pr&uuml;fen Sie, ob der Benutzername und Passwort richtig sind und dass der Benutzer auch Zugriff auf die angegebene Datenbank hat.';
$lang['test_could_not_drop_table'] = 'Eine Tabelle konnte nicht entfernt werden. Pr&uuml;fen Sie, ob der Benutzer f&uuml;r die angegebene Datenbank die Berechtigung zum Entfernen von Tabellen hat.';
$lang['test_could_not_create_table'] = 'Eine Tabelle konnte nicht erstellt werden. Pr&uuml;fen Sie, ob der Benutzer f&uuml;r die angegebene Datenbank die Berechtigung zum Erzeugen von Tabellen hat.';
$lang['test_check_php'] = 'Pr&uuml;fung auf PHP-Version %s+';
$lang['test_min_recommend'] = '(minimal %s, empfohlen %s oder h&ouml;her)';
$lang['test_min_recommend_plus'] = '(minimal %s, empfohlen %s+)';
$lang['test_requires_php_version'] = 'CMS made simple ben&ouml;tigt PHP in der Version 4.3 oder h&ouml;her (Sie haben %s). Um eine maximale Kompatibilit&auml;t mit Erweiterungen von Drittanbietern sicherzustellen, wird die Verwendung von PHP %s oder h&ouml;her empfohlen.';
$lang['test_check_md5_func'] = 'Pr&uuml;fung auf MD5-Funktionen';
$lang['test_check_safe_mode'] = 'Pr&uuml;fung auf die Verwendung des Safe-Modus';
$lang['test_check_safe_mode_failed'] = 'Wenn der PHP-Safe-Modus verwendet wird, kann es beim Hochladen von Dateien und anderen Funktionen zu Problemen kommen. Dies ist davon abh&auml;ngig, wie streng die Einstellungen Ihres Servers bez&uuml;glich des Safe-Modus sind.';
$lang['test_check_tokenizer'] = 'Pr&uuml;fung der Tokenizer-Funktionen';
$lang['test_check_tokenizer_failed'] = 'Ohne den Tokenizer kann es sein, dass nur eine wei&szlig;e Seite angezeigt wird. Wir empfehlen daher dessen Installation.';
$lang['test_check_gd'] = 'Pr&uuml;fung auf die GD-Library';
$lang['test_check_gd_failed'] = 'Die GD-Library wird von einigen Modulen und Funktionalit&auml;ten ben&ouml;tigt.';
$lang['test_check_write'] = 'Pr&uuml;fung auf aktivierte Schreibberechtigung';
$lang['test_may_not_exist'] = 'Diese Datei existiert m&ouml;glicherweise noch nicht. Falls dies zutrifft, sollten Sie eine leere Datei mit diesem Namen erstellen. Stellen Sie sicher, dass diese Datei vom Webserver beschreibbar ist.';
$lang['could_not_retrieve_a_value'] = 'Konnte keinen Wert abfragen ... Test &uuml;bersprungen';
$lang['displaying_the_value_originally'] = '<br />Anzeige des Werts, wie er in der config-Datei gesetzt wurde.';
$lang['test_check_xml_func'] = 'Pr&uuml;fung auf einfache XML (expat) Unterst&uuml;tzung';
$lang['test_check_xml_failed'] = 'Die XML-Unterst&uuml;tzung wurde nicht in Ihre PHP-Installation kompiliert. Sie k&ouml;nnen das System zwar verwenden, aber es ist nicht m&ouml;glich, Module per Remote-Funktion zu installieren.';
$lang['test_allow_url_fopen_failed'] = 'Wenn die Funktion allow url fopen deaktiviert ist, ist es Ihnen nicht m&ouml;glich, auf eine Datei via FTP oder HTTP-Protokoll zuzugreifen.';
$lang['test_remote_url'] = 'Test auf eine Remote-URL';
$lang['test_remote_url_failed'] = 'Ihnen ist es wahrscheinlich nicht m&ouml;glich, eine Datei auf einem Remote-Webserver zu &ouml;ffnen.';
$lang['connection_error'] = 'Auf Ihrem Host sind keine ausgehenden http-Verbindungen erlaubt! Verwenden Sie eine Firewall oder &auml;hnliches f&uuml;r externe Verbindungen? Dies hat zur Folge, dass Sie den ModulManager und m&ouml;glicherweise weitere Funktionalit&auml;ten nicht nutzen k&ouml;nnen.';
$lang['remote_connection_timeout'] = 'Keine Verbindung wegen Zeit&uuml;berschreitung!';
$lang['search_string_find'] = 'Verbindung ok!';
$lang['connection_failed'] = 'Verbindung fehlgeschlagen!';
$lang['remote_response_ok'] = 'Antwort des Remote-Servers: ok!';
$lang['remote_response_404'] = 'Antwort des Remote-Servers: Versionsdatei nicht gefunden!';
$lang['remote_response_error'] = 'Antwort des Remote-Servers: Fehler!';
$lang['test_check_file_upload'] = 'Pr&uuml;fung der M&ouml;glichkeit zum Hochladen von Dateien';
$lang['test_check_file_failed'] = 'Wenn diese Funktion deaktiviert ist, k&ouml;nnen Sie die in CMS made simple enthaltenen F&auml;higkeiten zum Hochladen von Dateien nicht nutzen. Falls m&ouml;glich sollte Ihr Systemadministrator daher diese Beschr&auml;nkung aufheben. Seien Sie vorsichtig.';
$lang['test_check_memory'] = 'Pr&uuml;fung des PHP-Speicher-Limits';
$lang['test_check_memory_failed'] = 'M&ouml;glicherweise wird CMSms mit dem Ihnen zur Verf&uuml;gung stehenden Speicher nicht richtig funktionieren. Falls m&ouml;glich sollten Sie Ihren Systemadministrator bitten, diesen Wert zu erh&ouml;hen. Seien Sie vorsichtig.';
$lang['test_check_time_limit'] = 'Pr&uuml;fung des PHP-Zeitlimits';
$lang['test_check_time_limit_failed'] = 'Zeitdauer in Sekunden, die ein PHP-Skript ben&ouml;tigen darf. Bei &Uuml;berschreitung dieses Wertes wird eine Fehlermeldung ausgegeben.';
$lang['test_check_post_max'] = 'Pr&uuml;fung der maximalen Gr&ouml;&szlig;e f&uuml;r POST-Dateien';
$lang['test_check_post_max_failed'] = 'Es ist Ihnen wahrscheinlich nicht m&ouml;glich, (gr&ouml;&szlig;ere) Dateien via POST zu senden. Seien Sie sich dieser Einschr&auml;nkung bewusst.';
$lang['test_check_upload_max'] = 'Pr&uuml;fung der maximal hochladbaren Datei-Gr&ouml;&szlig;e';
$lang['test_check_upload_max_failed'] = 'Es ist Ihnen wahrscheinlich nicht m&ouml;glich, (gr&ouml;&szlig;ere) Dateien &uuml;ber die integrierte Dateiverwaltung hochzuladen. Seien Sie sich dieser Einschr&auml;nkung bewusst.';
$lang['test_check_writable'] = 'Pr&uuml;fung, ob %s beschreibbar ist';
$lang['test_check_upload_failed'] = 'Das uploads-Verzeichnis ist nicht beschreibbar. Sie k&ouml;nnen zwar das System installieren. Es ist dann jedoch nicht m&ouml;glich, Dateien &uuml;ber die Administration hochzuladen.';
$lang['test_check_images_failed'] = 'Das images-Verzeichnis ist nicht beschreibbar. Sie k&ouml;nnen zwar das System installieren. Es ist dann jedoch nicht m&ouml;glich, Dateien &uuml;ber die Administration hochzuladen und zu verwenden.';
$lang['test_check_modules_failed'] = 'Das modules-Verzeichnis ist nicht beschreibbar. Sie k&ouml;nnen zwar das System installieren. Es ist dann jedoch nicht m&ouml;glich, Module &uuml;ber die Administration zu hochzuladen.';
$lang['test_check_file_get_contents'] = 'Pr&uuml;fung auf die Funktion file_get_contents';
$lang['test_check_file_get_contents_failed'] = 'Ihnen ist es wahrscheinlich nicht m&ouml;glich, irgend eine Funktionalit&auml;t zu verwenden, die diese Funktion ben&ouml;tigt.';
$lang['test_check_session_save_path'] = 'Pr&uuml;fung, ob der Pfad session.save_path &uuml;berschreibbar ist';
$lang['test_empty_session_save_path'] = 'session.save_path ist bei Ihnen leer. PHP wird jetzt den tempor&auml;ren Speicher des Betriebssystems verwenden. Sollten bei Ihnen SESSION-Probleme auftreten und die Funktion ini_set ausf&uuml;hrbar sein, k&ouml;nnten Sie versuchen, Session-Cookies zu aktivieren. F&uuml;gen Sie dazu als erste Zeile folgendes der include.php hinzu: ini_set(&#039;session.use_only_cookies&#039;, 1);';
$lang['test_check_session_save_path_failed'] = 'Ihr System verwendet aktuell den Pfad &quot;%s&quot;. Wenn der Pfad nicht &uuml;berschreibbar ist, k&ouml;nnen Sie sich unter Umst&auml;nden nicht in der Administration anmelden. Bei eventuell auftretenden Problemen sollten Sie dies zun&auml;chst &uuml;berpr&uuml;fen. Dieser Test kann fehlschlagen, wenn der Safe-Modus aktiviert ist.';
$lang['test_check_ini_set'] = 'Pr&uuml;fung, ob die Funktion ini_set() ausf&uuml;hrbar ist';
$lang['test_check_ini_set_failed'] = 'Die M&ouml;glichkeit, Einstellungen der php.ini &uuml;berschreiben zu k&ouml;nnen, ist zwar nicht zwingend. Einige (optionale) Zusatzfunktionen verwenden jedoch ini_set(), um zum Beispiel Zeitlimits zu ver&auml;ndern oder das Hochladen von gr&ouml;&szlig;eren Dateien zu erlauben usw. Ohne diese F&auml;higkeit kann es zu Unterschieden in der Funktionsweise von Modulen kommen. Dieser Test kann fehlschlagen, wenn der Safe-Modus aktiviert ist.';
$lang['install_admin_header'] = 'Informationen zum Administratoren-Konto';
$lang['install_admin_info'] = 'Geben Sie hier den Benutzernamen, die Emailadresse und das Passwort f&uuml;r den Administrator ein und notieren sich diese Daten irgendwo, da Sie ohne diese Daten keinen Zugang zur Administration von CMS made simple erhalten.';
$lang['install_admin_email'] = 'Email-Adresse';
$lang['install_admin_email_info'] = 'Informationen zum Email-Konto';
$lang['install_admin_email_note'] = '<strong>Hinweis:</strong> F&uuml;r diese Funktion wird die PHP-Funktion mail() verwendet. Wenn Sie diese Email nicht erhalten, kann das ein Hinweis darauf sein, dass Ihr Server nicht richtig konfiguriert ist. Sie sollten daher Ihren Hoster kontaktieren.';
$lang['install_admin_sitename'] = 'Das ist der Name Ihrer Seite. Er wird an verschiedenen Stellen der Muster-Templates verwendet und kann mit dem Tag {sitename} an beliebiger Stelle aufgerufen werden.';
$lang['install_admin_db'] = 'Informationen zur Datenbank';
$lang['install_admin_db_info'] = '<p>Stellen Sie sicher, dass die Datenbank erstellt und einem User alle Rechte zur Nutzung dieser Datenbank gew&auml;hrt wurden.</p>
<p>F&uuml;r MySQL gehen Sie wie folgt vor:</p>
<p>Melden Sie sich von einer Konsole aus bei mysql an und starten die folgenden Befehle:</p>
<ol>
<li>create database cms; (cms = Name der Datenbank. Sie k&ouml;nnen Ihrer Datenbank jeden beliebigen Namen geben. Merken Sie sich jedoch den Namen genau, da Sie ihn auf dieser Seite eingeben m&uuml;ssen.)</li>
<li>grant all privileges on cms.* to cms_user@localhost identified by &#039;cms_pass&#039;;</li>
</ol>';
$lang['install_admin_follow'] = 'Bitte vervollst&auml;ndigen Sie die folgenden Felder';
$lang['install_admin_db_type'] = 'Datenbank-Typ';
$lang['install_admin_no_db'] = 'In Ihre PHP-Installation wurde anscheinend kein g&uuml;ltiger Datenbank-Treiber kompiliert. Bitte best&auml;tigen Sie, dass die Unterst&uuml;tzung f&uuml;r mysql, mysqli und/oder postgres7 installiert ist und versuchen es noch einmal.';
$lang['install_admin_db_host'] = 'Datenbank-Hostadresse';
$lang['install_admin_db_name'] = 'Datenbank-Name';
$lang['install_admin_db_create'] = 'Tabellen erzeugen (ACHTUNG: bereits existierende Daten werden gel&ouml;scht!';
$lang['install_admin_db_prefix'] = 'Tabellen-Prefix';
$lang['install_admin_db_sample'] = 'Musterdaten (Templates, Inhalte) installieren';
$lang['retry'] = 'Wiederholen';
$lang['install_admin_db_create_seq'] = 'Erstelle die sequentielle Tabelle %s ...';
$lang['install_admin_importing'] = 'Importiere die Musterdaten ...';
$lang['invalid_query'] = 'Ung&uuml;ltige Abfrage: %s';
$lang['install_creating_table'] = '<p>Erstelle die Tabelle %s ... [%s]</p>';
$lang['install_creating_index'] = '<p>Erzeuge Index in der Tabelle %s ... [%s]</p>';
$lang['done'] = 'erledigt';
$lang['failed'] = 'fehlgeschlagen';
$lang['install_admin_error_schema'] = 'Fehler im SQL-Schema';
$lang['install_admin_set_account'] = 'Einstellungen des Administratorzuganges werden gespeichert ... ';
$lang['install_admin_set_sitename'] = 'Der Seitenname wird gesetzt ... ';
$lang['install_admin_setup'] = 'Nun geht&#039;s weiter mit der Einrichtung der Konfigurationsdatei, den gr&ouml;&szlig;ten Teil der Installation haben wir bereits hinter uns. F&uuml;r die Funktionsf&auml;higkeit des CMS k&ouml;nnen Sie alle Werte so belassen. Wenn Sie fertig sind, klicken Sie auf &quot;Weiter&quot;.';
$lang['install_admin_docroot'] = 'CMS Dokumenten-Root (vom Webserver aus gesehen)';
$lang['install_admin_docroot_path'] = 'Pfad zum Dokumenten-Root';
$lang['install_admin_querystring'] = 'Abfrage-/Query-String (Wenn keine Probleme auftreten, k&ouml;nnen Sie den Wert so belassen. Die Datei config.php kann sp&auml;ter manuell anpasst werden.';
$lang['invalid_querys'] = '<b>WARNUNG<b/>: Ung&uuml;ltige Abfragen auf Ihre Datenbank!';
$lang['install_admin_sitedown'] = 'Fehler: Die Datei tmp/cache/SITEDOWN konnte nicht entfernt werden. Bitte l&ouml;schen Sie diese manuell.';
$lang['install_admin_update_hierarchy'] = 'Die Seitenhierarchie wird aktualisiert ... ';
$lang['install_admin_set_core_event'] = 'Die Core-Ereignisse werden erstellt ... ';
$lang['install_admin_install_modules'] = 'Die Module werden installiert ... ';
$lang['install_admin_index_search'] = 'Erstellung des Suche-Index ... ';
$lang['install_admin_clear_cache'] = 'L&ouml;schen des Seitencaches (falls vorhanden) ... ';
$lang['install_admin_emailing'] = 'Die Daten f&uuml;r den Administratorzugang werden jetzt per Email versandt ... ';
$lang['install_admin_congratulations'] = 'Gratulation, die Installation ist vollst&auml;ndig. Hier ist Ihre <a href="%s">CMSms-Seite</a>.';
$lang['could_not_connect_db'] = 'Die Verbindung zur Datenbank konnte nicht hergestellt werden. Pr&uuml;fen Sie, ob der Benutzername und das Passwort richtig sind und ob der Benutzer Zugriff auf die angegebene Datenbank hat.';
$lang['cannot_write_config'] = 'Fehler: Kann nicht in die Datei %s schreiben.';
$lang['email_accountinfo_subject'] = 'CMS Made Simple - Informationen zum Administrator-Konto';
$lang['email_accountinfo_message'] = 'Vielen Dank f&uuml;r die Installation von CMS made simple.

Mit den folgenden Daten k&ouml;nnen Sie sich in der Administration anmelden:
Benutzername: %s
Passwort: %s

In die Administration Ihrer Seite gelangen Sie hier: %s';
$lang['utma'] = '156861353.717462736.1147511856.1213780620.1213782764.320';
$lang['utmz'] = '156861353.1212906535.318.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
?>