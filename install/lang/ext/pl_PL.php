<?php
$lang['no_db_driver'] = 'Nie znaleziono zgodnych sterownik&oacute;w bazy danych';
$lang['test_check_output_buffering'] = 'Sprawdzanie buforowania wyjścia';
$lang['test_check_output_buffering_failed'] = 'Buforowanie wyjścia jest wyłączone. Prawdopodobnie nie będziesz w stanie używać żadnej funkcjonalności wymagającej tej opcji';
$lang['phpinfo'] = 'Wyświetl informacje o PHP';
$lang['mod_security'] = 'Apache Mod Security';
$lang['test_check_tempnam'] = 'Sprawdzanie funkcji tempnam';
$lang['test_check_db_drivers'] = 'Sterowniki bazy danych';
$lang['test_check_db_drivers_failed'] = 'Nie znaleziono sterownik&oacute;w bazy danych';
$lang['test_check_register_globals'] = 'Sprawdzanie zmiennej register globals w PHP';
$lang['test_check_register_globals_failed'] = 'Zmienna register globals w PHP jest włączona. Ze względu na bezpieczeństwo powinieneś ją wyłączyć.';
$lang['test_check_disable_functions'] = 'Sprawdzanie zmiennej disable functions w PHP';
$lang['test_check_disable_functions_failed'] = 'To jest lista funkcji wyłączona na Twoim serwerze.';
$lang['install_admin_db_port'] = 'Port serwera bazy danych';
$lang['install_admin_db_port_info'] = 'Jeżeli nie jesteś pewny pozostaw to pole puste, aby użyć domyślnych ustawień';
$lang['install_admin_db_socket'] = 'Socket bazy danych';
$lang['install_admin_db_socket_info'] = 'NIE OBŁUGIWANE.';
$lang['install_admin_frontendlang'] = 'Domyślny język dla frontendu. Ta opcja zmienia locale używane przez r&oacute;zne funkcje obsługi daty i czasu itp.';
$lang['install_default_encoding'] = 'W większości wypadk&oacute;w default_encoding powinno być ustawione na utf-8. Możesz zmienić ten parametr, ale pamiętaj, że wszystkie tłumaczenia są w utf-8.';
$lang['installer_done'] = '[gotowe]';
$lang['installer_failed'] = '[niepowodzenie]';
$lang['create_permission'] = 'Tworzenie uprawnień ...';
$lang['add_column_sql'] = 'Dodawanie kollumny do tabeli %s ...';
$lang['update_table_sql'] = 'Aktualizacja tabeli %s ...';
$lang['installing_module'] = 'Instalacja modułu %s ...';
$lang['updating_schema_version'] = 'Aktualizacja schematu do wersji %s ...';
$lang['upgrade_config'] = 'Aktualizacja config.php';
$lang['upgrade_config_info'] = 'Aktualizacja konfiguracji';
$lang['upgrade_failed_again'] = 'Jeden lub więcej test&oacute;w nie powiodło się. Spr&oacute;buj zmienić konfigurację i naciśnij przycisk poniżej, aby sprawdzić jeszcze raz.';
$lang['upgrade_cache_dirs'] = 'Czyszczenie katalog&oacute;w pamięci podręcznej';
$lang['cannot_clean_cache_dirs'] = 'Nie można wyczyścić katalog&oacute;w pamięci podręcznej!';
$lang['upgrade_schema'] = 'Aktualizacja schematu';
$lang['need_upgrade_schema'] = 'Wymagana jest aktualizacja CMS.<br />W chwili obecnej schemat bazy jest w wersji %s i należy go zaktualizować do wersji %s';
$lang['schema_ok'] = 'Baza danych jest teraz aktualna i używa schematu w wersji %s';
$lang['noneed_upgrade_schema'] = 'Baza danych jest aktualna i używa schematu w wersji  %s';
$lang['upgrade_modules'] = 'Aktualizacja moduł&oacute;w';
$lang['noneed_upgrade_modules'] = 'Moduły podstawowe są aktualne';
$lang['upgrade_sql_module_from_to'] = 'Aktualizacja bazy modułu %s z wersji %s do %s ...';
$lang['upgrade_event_module_from_to'] = 'Aktualizacja zdarzeń modułu %s z wersji %s do %s ...';
$lang['sitedown_not_removed'] = 'Nie można usunąć pliku tmp/cache/SITEDOWN. Usuń go ręcznie, inaczej strona nadal będzie wyłączona dla odwiedzających.';
$lang['upgrade_ok'] = 'Przejrzyj config.php, zmień potrzebne ustawienia, a p&oacute;źniej przywr&oacute;ć jego ustawienia na &#039;tylko do odczytu&#039;. Powinieneś także sprawdzić czy wszystkie moduły są aktualne poprzez przejście do Rozszerzenia -> Moduły.';
$lang['upgrade_complete'] = 'Proces aktualizacji został zakończony';
$lang['upgrade_end'] = 'CMS jest aktualny. Kliknij %s aby wr&oacute;cić do strony. Możesz też %s.';
$lang['here'] = 'tutaj';
$lang['go_to_admin'] = 'przejść do panelu administracyjnego';
$lang['errorfilenot'] = 'NIe znaleziono nazwy pliku!';
$lang['errorfilenotwritable'] = 'Plik jest niezapisywalny!';
$lang['nofiles'] = 'Ten zas&oacute;b nie istnieje!';
$lang['is_directory'] = 'Ten zas&oacute;b jest katalogiem!';
$lang['is_readable_false'] = 'Nie można odczytać zasobu!';
$lang['checksum_match'] = 'Suma kontrolna się zgadza!';
$lang['checksum_not_match'] = 'Suma kontrolna nie zgadza się!';
$lang['not_checksum'] = 'Brak sumy kontrolnej!';
$lang['format_datetime'] = '%c';
$lang['upload_err_ini_size'] = 'Załadowany plik przekracza wielkość ustawioną w upload_max_filesize directive w php.ini!';
$lang['upload_err_form_size'] = 'Załadowany plik przekracza wartość zmiennej formularza MAX_FILE_SIZE.';
$lang['upload_err_partial'] = 'Załadowany plik został załadowany tylko częściowo.';
$lang['upload_err_no_file'] = 'Nie załadowano żadnego pliku.';
$lang['upload_err_no_tmp_dir'] = 'Brak foldera tymczasowego.';
$lang['upload_err_cant_write'] = 'Zapis na dysku nie powi&oacute;dł się.';
$lang['upload_err_extension'] = 'Plik z takim rozszerzeniem jest nieprawidłowy.';
$lang['upload_err_empty'] = 'Plik ma zerową długość.';
$lang['upload_err_unknown'] = 'Wystąpił nieznany błąd podczas ładowania pliku.';
$lang['function_file_uploads_off'] = 'Zmienna PHP file_uploads jest wyłączona!';
$lang['upload_file_no_readable'] = 'Nie udało się odczytać załadowanego pliku!';
$lang['upload_file_multiple'] = 'Upload wielu plik&oacute;w naraz jest niedozwolony!';
$lang['test_check_magic_quotes_gpc'] = 'Magic quotes dla metod Get/Post/Cookie';
$lang['test_check_magic_quotes_gpc_failed'] = 'Gdy magic_quotes jest włączone, wszystkie apostrofy, cudzysłowy i backslashe są automatycznie poprzedzane przez dodatkowy backslash. Możesz napotkać problemy przy zapisie szablon&oacute;w.';
$lang['test_check_magic_quotes_runtime'] = 'Użyj Magic quotes w trakcie działania';
$lang['test_check_magic_quotes_runtime_failed'] = 'Gdy magic_quotes jest włączone, dane zwracane z jakiegokolwiek zewnętrznego źr&oacute;dła (włączając bazy danych, pliki tekstowe itp), będą miały poprzedzone dodatkowym backslashem  wszystkie apostrofy, cudzysłowia i backslashe. To ustawienie może powodować problemy.';
$lang['install_admin_checksum'] = 'Sprawdź swoją instalację';
$lang['upgrade_admin_checksum'] = 'Sprawdzenie Twojego systemu';
$lang['checksum'] = 'SPrawdzanie sumy kontrolnej';
$lang['checksum_file'] = 'Plik sumy kontrolnej';
$lang['install_test_checksum'] = 'Możesz przeprowadzić integralność plik&oacute;w CMSMS poprzez por&oacute;wnanie go z sumami kontrolnymi.';
$lang['checksum_passed'] = 'Wszystkie sumy kontrolne się zgadzają!';
$lang['checksum_failed'] = 'Suma kontrolna pasuje, ale wystąpiły błedy. Zajrzyj do pomocy, aby uzyskać więcej informacji.';
$lang['test_check_open_basedir'] = 'Sprawdzanie PHP Open Basedir';
$lang['test_check_open_basedir_failed'] = 'Wykryto ograniczenia Open basedir. Niekt&oacute;re dodatkowe funkcje mogą nie działać z tymi ograniczeniami.';
$lang['unlimited'] = 'Nielimitowane';
$lang['test_open_basedir_session_save_path'] = 'Wykryto ograniczenia Open basedir. Jeśli doświadczysz problem&oacute;w z sesjami, a masz możliwość użycia ini_set, spr&oacute;buj użyć polecenia: ini_set(&#039;session.use_only_cookies&#039;, 1);  na samej g&oacute;rze pliku include.php';
$lang['install_warn_db_createtables'] = 'W normalnych watunkach to pole powinno być zaznaczone cały czas. Wyłącz tę opcję z ostrożnością.';
$lang['install_admin_tablesnotcreated'] = 'Proces instalacji został zakończony, ale zgodnie z Twoimi ustawieniami nie zostały stworzone żadne tablice w bazie danych. Plik config został zresetowany, a także wszystkie testy przedinstalacyjne zostały wykonane poprawnie. Dziękujemy! Oto Tw&oacute;j';
$lang['info_create_dir_and_file'] = 'Proces HTTP nie może stworzyć pliku wewnątrz katalogum kt&oacute;rego jest właścicielem. Jest to spowodowane prawdopodobnie obecnością &#039;safe mode&#039; w konfiguracji PJP. Wiele funkcji CMSMS nie vędzie działało poprawnie, jeśli włączona jest opcja &#039;safe mode&#039;. Kontynuacja instalacji jest niemożliwa.';
$lang['test_create_dir_and_file'] = 'Sprawdzanie czy proces HTTP nie może stworzyć pliku wewnątrz katalogum kt&oacute;rego jest właścicielem';
$lang['cms_site'] = 'Strona CMS';
$lang['or_greater'] = 'Lub większa';
$lang['sitename'] = 'Nazwa strony';
$lang['warning_safe_mode'] = '<strong><em>UWAGA:</em></strong> Tryb bezpieczny PHP (safe mode) jest włączony. Spowoduje to, że w dostępie do plik&oacute;w załadowanych na serwer z użyciem interfejsu CMSMS (włączając obrazki, szablony, pliki XML z modułami). POwinieneś skontaktować się z administratorem Twojego serwera w z prośbą o wyłączenie safe mode.';
$lang['test'] = 'Testuj';
$lang['results'] = 'Wyniki';
$lang['untested'] = 'Nieprzetestowano';
$lang['owner'] = 'Właściciel';
$lang['permissions'] = 'Uprawnienia';
$lang['off'] = 'WYłączone';
$lang['on'] = 'Włączone';
$lang['permission_information'] = 'Informacje o uprawnieniach';
$lang['server_os'] = 'System operacyjny serwera';
$lang['server_api'] = 'API serwera';
$lang['server_software'] = 'Oprogramowanie serwera';
$lang['server_information'] = 'Informacje o serwerze';
$lang['session_save_path'] = 'Ścieżka zapisu plik&oacute;w sesji';
$lang['max_execution_time'] = 'Maksymalny czas wykonywania skryptu';
$lang['gd_version'] = 'Wersja biblioteki GD';
$lang['upload_max_filesize'] = 'Maksymalna wielkość uploadowanego pliku';
$lang['post_max_size'] = 'Maksymalna wielkość danych wysyłanych metodą POST';
$lang['memory_limit'] = 'Limit pamięci dla PHP';
$lang['server_db_type'] = 'Baza danych';
$lang['server_db_version'] = 'Wersja serwera baz danych';
$lang['phpversion'] = 'Wersja PHP';
$lang['safe_mode'] = 'Tryb bezpieczny PHP (safe_mode)';
$lang['php_information'] = 'Informacje o PHP';
$lang['cms_install_information'] = 'Informacje o instalacji CMSMS';
$lang['cms_version'] = 'Wersja CMSMS';
$lang['systeminfo_copy_paste'] = 'Proszę skopiować zaznaczony tekst do posta na forum';
$lang['help_systeminformation'] = 'Informacje wyświetlone poniżej są pobierane z wielu r&oacute;żnych lokacji i tworzą podsumowanie, tak abyś w wygodny spos&oacute;b mogł się podzielić informacjami na temat Twojej instalacji CMSMS gdy będziesz szukał pomocy.';
$lang['systeminfo'] = 'INformacje o systemie';
$lang['systeminfodescription'] = 'Wyświetl informacje o systemie pomocne podczas diagnostyki problem&oacute;w';
$lang['error'] = 'Błąd';
$lang['new_version_available'] = '<em>Uwaga:</em>Nowa wersja CMS Made Simple jest dostępna. Powiadom o tym swojego administratora.';
$lang['info_urlcheckversion'] = 'Jeżeli URL jest ustawiony jako &quot;none&quot;, nie będzie przerowadzona żadna weryfikacja<br/>Pusty ciąg spowoduje uzycie domyślnego URL.';
$lang['urlcheckversion'] = 'Sprawdź czy pojawiła się nowa wersja CMSMS uzywając tego URLa';
$lang['read'] = 'Odczyt';
$lang['write'] = 'Zapis';
$lang['execute'] = 'Wykonanie';
$lang['group'] = 'Grupa';
$lang['other'] = 'Inni';
$lang['global_umask'] = 'Maska tworzenia plik&oacute;w (umask)';
$lang['errorcantcreatefile'] = 'Nie można stworzyć pliku (problem z uprawnieniami?)';
$lang['add'] = 'Dodaj';
$lang['about'] = 'Informacja';
$lang['action'] = 'Operacja';
$lang['actionstatus'] = 'Operacja/Status';
$lang['active'] = 'Aktywny';
$lang['cantremove'] = 'Nie można usunąć';
$lang['changepermissions'] = 'Zmień uprawnienia';
$lang['changepermissionsconfirm'] = 'UWAGA\n\nZostanie przeprowadzony test mający na celu powierdzenie, że serwer WWW może zapisać do wszystkich tworzących  moduł.\nCzy chcesz kontynuować?';
$lang['success'] = 'Sukces';
$lang['advanced'] = 'Zaawansowanu';
$lang['back'] = 'Wr&oacute;c do menu';
$lang['cancel'] = 'Anuluj';
$lang['cantchmodfiles'] = 'Nie można zmienić uprawnień do niekt&oacute;rych plik&oacute;w';
$lang['cantremovefiles'] = 'Wystąpił problem podczas usuwania plik&oacute;w (uprawnienia?)';
$lang['create'] = 'Stw&oacute;rz';
$lang['database'] = 'Baza danych';
$lang['databaseprefix'] = 'Prefiks nazw tablic w bazie';
$lang['databasetype'] = 'Typ bazy';
$lang['date'] = 'Data';
$lang['default'] = 'Domyślny';
$lang['delete'] = 'Skasuj';
$lang['deleteconfirm'] = 'Czy napewno skasować - %s - ?';
$lang['description'] = 'Opis';
$lang['directoryexists'] = 'Katalog już istnieje.';
$lang['down'] = 'D&oacute;ł';
$lang['edit'] = 'Edytuj';
$lang['email'] = 'Adres e-mail';
$lang['errordeletingfile'] = 'Nie można skasować pliku (problem z uprawnieniami?)';
$lang['errordirectorynotwritable'] = 'Brak uprawnień do zapisu do katalogu. Może to być spowodowane błędnymi uprawnieniami lub trybem safe mode PHP.';
$lang['cachenotwritable'] = 'Katalog Cache jest niezapisywalny. Kasowanie zawartości nie będzie działało. Upewnij się, że katalog tmp/cache ma pełne prawa odczytu, zapisu i wykonania (chmod 777).  Może byc także wymagane wyłącznie trybu safe mode.';
$lang['modulesnotwritable'] = 'Katalog moduł&oacute;w jest niezapisywalny. Jeżeli będziesz chciał zainstalować moduł(y) poprzez ładowanie plik&oacute;w XML, upewnij się, że katalog modules ma pełne prawa odczytu, zapisu i wykonania (chmod 777).  Może byc także wymagane wyłącznie trybu safe mode.';
$lang['false'] = 'Fałsz';
$lang['settrue'] = 'Ustaw Prawda';
$lang['filename'] = 'Nazwa pliku';
$lang['filesize'] = 'Rozmiar pliku';
$lang['help'] = 'Pomoc';
$lang['language'] = 'Język';
$lang['lastname'] = 'Nazwisko';
$lang['name'] = 'Imię';
$lang['password'] = 'Hasło';
$lang['passwordagain'] = 'Hasło (potwierdzenie)';
$lang['remove'] = 'Usuń';
$lang['saveconfig'] = 'Zapisz konfigurację';
$lang['true'] = 'Prawda';
$lang['setfalse'] = 'Ustaw Fałsz';
$lang['type'] = 'Typ';
$lang['typenotvalid'] = 'Typ jest nieprawidłowy';
$lang['unknown'] = 'Nieznany';
$lang['user'] = 'Użytkownik';
$lang['userdefinedtags'] = 'Znaczniki użytkownika';
$lang['usermanagement'] = 'Zarządzanie użytkownikami';
$lang['username'] = 'Nazwa użytkownika';
$lang['usernameincorrect'] = 'Nazwa użytkownika lub hasło jest nieprawidłowe';
$lang['version'] = 'Wersja';
$lang['install_title'] = 'Instalacja CMS Made Simple (krok %s)';
$lang['install_system'] = 'ZAinstaluj system';
$lang['install_thanks'] = 'Dziękujemy za zainstalowanie CMS Made Simple';
$lang['upgrade_title'] = 'Aktualizacja CMS Made Simple (krok %s)';
$lang['upgrade_system'] = 'Aktualizuj system';
$lang['upgrade_thanks'] = 'Dziękujemy za aktualizację CMS Made Simple do wersji';
$lang['install_please_read'] = 'Przeczytaj <a href="http://wiki.cmsmadesimple.org/index.php/User_Handbook/Installation/Troubleshooting">rozwiązywanie problem&oacute;w z instalacją</a> w CMS Made Simple Documentation Wiki.';
$lang['install_checking'] = 'Sprawdzanie uprawnień i ustawień PHP';
$lang['install_test'] = 'Testuj';
$lang['install_result'] = 'Wynik';
$lang['install_required_settings'] = 'Wymagane ustaiwenia';
$lang['install_recommended_settings'] = 'Rekomendowane ustawienia';
$lang['install_you_have'] = 'Masz';
$lang['install_legend'] = 'Legenda';
$lang['install_symbol'] = 'Symbol';
$lang['install_definition'] = 'Definicja';
$lang['install_value_passed'] = 'Test składnika wymaganego wykonany pomyślnie';
$lang['install_value_failed'] = 'Test składnika wymaganego wykonany niepomyślnie';
$lang['install_error_fragment'] = 'Rozwiązywanie problem&oacute;w z instalacją';
$lang['install_value_required'] = 'Ten składnik ma wartośc poniżej minimalnej wymaganej wartości';
$lang['install_value_recommended'] = 'Parametr jest powyżej minimalnej wartości, ale poniżej zalecanej<br />lub funkcjonalność, kt&oacute;ra <em>może</em być wymagana przez opcjonalne komponenty jest niedostępna.';
$lang['install_value_exceed'] = 'Parametr jest r&oacute;wny lub powyżej zalecanej wartości<br />lub funkcjonalność, kt&oacute;ra <em>może</em być wymagana przez opcjonalne komponenty jest dostępna.';
$lang['install_test_failed'] = 'Jeden lub więcej test&oacute;w nie powi&oacute;dł się. Możesz zainstalować system, ale niekt&oacute;re funkcje mogą nie działać poprawnie..<br />Spr&oacute;buj zmienić ustawienia i naciśnij przycisk &quot;Spr&oacute;buj ponownie&quot;. Możesz też kliknąć &quot;Kontynuuj&quot;, aby rozpocząć instalację.';
$lang['install_test_passed'] = 'Wszystkie testy wykonane pomyśnie. Naciśnij przycisk &quot;Kontynuuj&quot;.';
$lang['install_failed_again'] = 'Jeden lub więcej test&oacute;w nie powi&oacute;dł się. Zmień ustawienia i naciśnij poniższy przycisk, aby prztestować konfigurację jeszcze raz.';
$lang['install_try_again'] = 'Spr&oacute;buj jeszcze raz';
$lang['install_continue'] = 'Kontynuuj';
$lang['failure'] = 'Niepowodzenie';
$lang['caution'] = 'Uwaga';
$lang['install_admin_umask'] = 'Przetestuj umask tworzenia nowych plik&oacute;w';
$lang['install_test_umask'] = 'Naciśnij przycisk Test aby rozpocząć sprawdzanie';
$lang['test_umask_text'] = 'umask to funkcja środowisk POSIXowych, kt&oacute;ra ustala domyślne uprawnienia nowo tworzonych plik&oacute;w i katalog&oacute;w.';
$lang['test_check_umask'] = 'Rezultat testu na pliku stworzonym w';
$lang['test_umask_not_given'] = 'Nie podano parametru umask';
$lang['test_check_umask_failed'] = 'Test umask nie powi&oacute;dł się';
$lang['test_username_not_given'] = 'Nie podano nazwy użytkownika';
$lang['test_username_illegal'] = 'Nazwa użytkownika zawiera niedozwolone znaki';
$lang['test_not_both_passwd'] = 'Nie wpisano hasła w oba pola';
$lang['test_passwd_not_match'] = 'Hasła się nie zgadzają!';
$lang['test_email_accountinfo'] = 'Zarządano wysłania danych o koncie administratora, ale nie podano adresu e-mail!';
$lang['test_database_prefix'] = 'Prefiks nazw tablic zawiera niedozwolone znaki';
$lang['test_no_dbms'] = 'Nie wybrano silnika bazy danych!';
$lang['test_could_not_connect_db'] = 'Nie można się połączyć z bazą danych. Upewnij się, że podałeś poprawną nazwę użytkownika i hasło oraz że użytkownik ten ma uprawnienia do tej bazy danych.';
$lang['test_could_not_drop_table'] = 'nie można usunąć tablicy. Upewnij się, że użytkownik ma prawo usuwania tablic w tej bazie danych.';
$lang['test_could_not_create_table'] = 'nie można stworzyć tablicy. Upewnij się, że użytkownik ma prawo tworzenia tablic w tej bazie danych.';
$lang['test_check_php'] = 'Sprawdzanie wersji PHP %s+';
$lang['test_min_recommend'] = '(minimum %s, zalecana %s lub nowsza)';
$lang['test_min_recommend_plus'] = '(min %s, zalecana %s+)';
$lang['test_requires_php_version'] = 'CMS Made Simple wymaga PHP w wersji co najmniej 4.3 (Twoja wersja to %s), ale PHP w wersji %s lub nowszej jest zalecana ze względu na lepszą kompatybilność z dodatkami.';
$lang['test_check_md5_func'] = 'Sprawdzanie funkcji md5';
$lang['test_check_safe_mode'] = 'Sprawdzanie obecności Trybu Bezpiecznego  (PHP safe mode)';
$lang['test_check_safe_mode_failed'] = 'Tryb bezpieczny PHP (safe mode) może powodować problemu z uploadowaniem plik&oacute;w lub innymi funkcjami. Wszystko zależy od tego jak restrykcyjne są ustawienia tego trybu.';
$lang['test_check_tokenizer'] = 'Sprawdzanie funkcji tokenizera';
$lang['test_check_tokenizer_failed'] = 'Jeżeli funkcje tokenizera są niedostępne, strony mogą się generować jako białe strony. Dostępność tych funkcji jest wymagana.';
$lang['test_check_gd'] = 'Sprawdzanie obecności biblioteki GD';
$lang['test_check_gd_failed'] = 'Biblioteka GD jest wymagana przez niekt&oacute;re moduły i funkcje.';
$lang['test_check_write'] = 'Sprawdzanie uprawnienie zapisu do';
$lang['test_may_not_exist'] = 'Ten plik może jeszcze nie istnieć. Jeśli nie istnieje, stw&oacute;rz pusty plik z tą nazwą. Pamiętaj też aby ustawić prawo zapisu do tego pliku przez proces serwera WWW.';
$lang['could_not_retrieve_a_value'] = 'Nie można pobrać wartości. Mimo to proces jest kontynuowany.';
$lang['displaying_the_value_originally'] = '<br />Wartość oryginalnie pobrana z pliku konfiguracyjnego (może być niedokładna).';
$lang['test_check_xml_func'] = 'Sprawdzanie obecności podstawowych funkcji XML (expat)';
$lang['test_check_xml_failed'] = 'Wsparcie dla funkcji XML nie jest dostępne w Twojej konfiguracji PHP. Możesz zainstalować system, ale nie będziesz w stanie używać funkcji zdalnej instalacji moduł&oacute;w.';
$lang['test_allow_url_fopen_failed'] = 'Jeżeli wyłączona jest opcja &#039;allow url fopen&#039;, nie będziesz miał możliwości otwierać żadnych plik&oacute;w przez protok&oacute;ł HTTP';
$lang['test_remote_url'] = 'Sprawdzanie zdalnego URL';
$lang['test_remote_url_failed'] = 'Prawdopodobnie nie będziesz w stanie otworzyć żadnego pliku ze zdalnego serwera';
$lang['connection_error'] = 'Połączenia wychodzące wydają się być zablokowane. Może to być spowodowane ustawieniami firewalla lub innych uprawnień. Może to spowodować, że Menadżer moduł&oacute;w a także inne funkcje nie będą działać poprawnie';
$lang['remote_connection_timeout'] = 'Połączenie nie powiodło się, przekroczono czas operacji!';
$lang['search_string_find'] = 'Połączenie zostało nawiązane!';
$lang['connection_failed'] = 'Połączenie nie powiodło się!';
$lang['remote_response_ok'] = 'Otrzymano poprawną odpowiedź zdalną.';
$lang['remote_response_404'] = 'Otrzymano odpowiedź zdalną: nie znaleziono!';
$lang['remote_response_error'] = 'Otrzymano odpowiedź zdalną: błąd!';
$lang['test_check_file_upload'] = 'Sprawdzanie możliwości uploadu plik&oacute;w';
$lang['test_check_file_failed'] = 'Gdy możliwość uploadu plik&oacute;w jest wyłączona, nie będziesz w stanie ładować żadnych plik&oacute;w z użyciem CMS Made Simple. Jeżeli to możliwe powinieneś poprosić swojego administratora o zdjęcie tej blokady.';
$lang['test_check_memory'] = 'Sprawdzanie limitu pamięci dla PHP';
$lang['test_check_memory_failed'] = 'Ilość pamięci przydzielonej dla procesu PHP może być niewystarczająca dla poprawnego działania CMSMS, szczeg&oacute;lnie gdy dodasz r&oacute;żne moduły lub inne dodatki. Powinieneś poprosić swojego administratora, aby zwiększył ten parametr.';
$lang['test_check_time_limit'] = 'Sprawdzanie limitu wykonywania się skryptu PHP';
$lang['test_check_time_limit_failed'] = 'Ilość sekund przez kt&oacute;rą skrypt PHP może się wykonywać. Gdy zostanie osiągnięty, skrypt zakończy działania z błędem.';
$lang['test_check_post_max'] = 'Sprawdzanie maksymalnej ilości danych możliwych do wysłania metodą POST';
$lang['test_check_post_max_failed'] = 'Prawdopodobnie nie będziesz m&oacute;gł wysłać przez żaden formularz większej ilości danych. Pamiętaj o tym ograniczeniu.';
$lang['test_check_upload_max'] = 'Sprawdzanie maksymalnej wieklości uploadowanego pliku';
$lang['test_check_upload_max_failed'] = 'Prawdopodobnie nie będziesz m&oacute;gł załadować zna serwer większego pliku. Pamiętaj o tym ograniczeniu.';
$lang['test_check_writable'] = 'Sprawdzanie czy %s jest zapisywalny';
$lang['test_check_upload_failed'] = 'Katalog uploads jest niezapisywalny. Możesz zainstalować system, ale nie będziesz w stanie załadować żadnego pliku z użyciem panelu administarcyjnego CMSMS.';
$lang['test_check_images_failed'] = 'Katalog images jest niezapisywalny. Możesz zainstalować system, ale nie będziesz w stanie załadować żadnego obrazka z użyciem panelu administarcyjnego CMSMS.';
$lang['test_check_modules_failed'] = 'Katalog modules jest niezapisywalny. Możesz zainstalować system, ale nie będziesz w stanie załadować żadnego modułu z użyciem panelu administarcyjnego CMSMS.';
$lang['test_check_file_get_contents'] = 'Sprawdzanie dostępności file_get_contents';
$lang['test_check_file_get_contents_failed'] = 'Prawdopodobnie nie będziesz w stanie użyć żadnej opcji, kt&oacute;ra używa tej funkcji';
$lang['test_check_session_save_path'] = 'Sprawdzanie czy session.save_path jest zapisywalne';
$lang['test_empty_session_save_path'] = 'Parametr session.save_path jest pusty. PHP użyje katalogu tymczasowego systemu operacyjnego serwera do zapisu danych sesji. Jeżeli napotkasz jakieś problemy z obsługą sesji PHP oraz możesz użyć ini_set, spr&oacute;buj użyć polecenia: <em>ini_set(&#039;session.use_only_cookies&#039;, 1);</em> na samej g&oacute;rze pliku include.php';
$lang['test_check_session_save_path_failed'] = 'Parametr session.save_path jest ustawiony na &quot;%s&quot;. Ten katalog powinien być zapisywalny, inaczej logowanie do panelu administracyjnego CMSMS może nie działać. Ten test może nie działać jeśli jest włączony safe mode w PHP.';
$lang['test_check_ini_set'] = 'Sprawdzanie czy ini_set działa';
$lang['test_check_ini_set_failed'] = 'Chociaż możliwośc nadpisywania parametr&oacute;w php.ini nie jest wymagana, niekt&oacute;re opcjonalne dodatki/moduły mogą używać ini_set do wydłużania maksymalnego czasu wykonywania skryptu itp. Jeżeli ini_set nie działa, możesz mieć problemy z działaniem niekt&oacute;rych dodatk&oacute;w. Ten test może nie działać jeśli jest włączony safe mode w PHP.';
$lang['install_admin_header'] = 'Informacje o koncie administratora';
$lang['install_admin_info'] = 'Wpisz nazwę użytkownika, hasło i adres email dla pierwszego konta administratora CMSMS. Zapamiętaj to hasło, bo będzie to (po instalacji) jedyne konto, kt&oacute;rego możesz użyć do zalogowania się do panelu administracyjnego.';
$lang['install_admin_email'] = 'Adres e-mail ';
$lang['install_admin_email_info'] = 'Wyślij informacje o koncie na podany e-mail';
$lang['install_admin_email_note'] = '<strong>Uwaga:</strong> Ta funkcja używa instrukcji mail języka PHP. Jeśli nie otrzymasz wiadomości, może to być znak, że Tw&oacute;j serwer jest niepoprawnie skonfigurowany.';
$lang['install_admin_sitename'] = 'Nazwa Twojej strony bedzie używana w r&oacute;żnych miejscach domyślnych szablon&oacute;w, możesz jej też używać poprzez znacznik {sitename}.';
$lang['install_admin_db'] = 'Informacje o bazie danych';
$lang['install_admin_db_info'] = '<p>Upewnij się, że baza danych została stworzona, a także, że jest skonfigurowane konto użytkownika, kt&oacute;re ma pełne prawa do bazy.</p>
<p>Dla MySQL użyj następujących zapytań:</p>
<ol>
<li>create database cms; (możesz użyć dowolnej nazwy, zapamiętaj tę nazwę, bo będziesz ją potrzebował na tej stronie)</li>
<li>grant all privileges on cms.* to cms_user@localhost identified by &#039;cms_pass&#039;;</li>
</ol>';
$lang['install_admin_follow'] = 'Proszę wypełnić poniższe pola';
$lang['install_admin_db_type'] = 'Typ bazy danych';
$lang['install_admin_no_db'] = 'Nie odnaleziono wsparcia dla kompatybilnych baz danych. Upewnij się, że PHP jest skonfigurowane ze wsparniem dla mysql, mysqli i/lub postgres7.';
$lang['install_admin_db_host'] = 'Adres hosta bazy danych';
$lang['install_admin_db_name'] = 'Nazwa bazy danych';
$lang['install_admin_db_create'] = 'Stw&oacute;rz tablice (Uwaga: kasuje istniejące tablice w bazie!)';
$lang['install_admin_db_prefix'] = 'Prefiks nazw tablic';
$lang['install_admin_db_sample'] = 'Zainstaluj przykładowe dane i szablony';
$lang['retry'] = 'Spr&oacute;buj ponownie';
$lang['install_admin_db_create_seq'] = 'Tworzenie %s sekwencji tablicy....';
$lang['install_admin_importing'] = 'Import przykładowych danych...';
$lang['invalid_query'] = 'Nieprawidłowe zapytanie: %s';
$lang['install_creating_table'] = '<p>Tworzenie tablicy %s ... [%s]</p>';
$lang['install_creating_index'] = '<p>Tworzenie indeksu w tablicy %s ... [%s]</p>';
$lang['done'] = 'gotowe';
$lang['failed'] = 'błąd';
$lang['install_admin_error_schema'] = 'Błąd podczas odczytu schematu SQL';
$lang['install_admin_set_account'] = 'Konfiguracja konta administratora...';
$lang['install_admin_set_sitename'] = 'Konfiguracja nazwy strony...';
$lang['install_admin_setup'] = 'Teraz możemy przystąpić do stworzenia pliku konfiguracyjnego. Instalator posiada już wszystkie informacje potrzebne do wykonania tego procesu. Gdy będziesz gotowy naciśnij przycisk &quot;Kontynuuj&quot;.';
$lang['install_admin_docroot'] = 'Adres katalogu gł&oacute;wnego striony CMSMS (widziany przez serwer WWW)';
$lang['install_admin_docroot_path'] = 'Ścieżka do katalogi gł&oacute;wnego strony (Document root)';
$lang['install_admin_querystring'] = 'Nazwa zmiennej używana do ptzrkazywania parametr&oacute;w strony (nie zmieniaj tego ciągu, chyba, że masz problemy z działaniem strony, pamiętaj o aktualizacji config.php)';
$lang['invalid_querys'] = '<b>UWAGA<b/>: Nieprawidłowe zapytania na bazie danych!';
$lang['install_admin_sitedown'] = 'Błąd: Nie można usunąć pliku tmp/cache/SITEDOWN. Usuń ten plik ręcznie.';
$lang['install_admin_update_hierarchy'] = 'Aktualizacja pozycji hierarchi...';
$lang['install_admin_set_core_event'] = 'konfiguracja zdarzeń rdzenia...';
$lang['install_admin_install_modules'] = 'Instalacja moduł&oacute;w...';
$lang['install_admin_index_search'] = 'Przeszukiwanie indeksu...';
$lang['install_admin_clear_cache'] = 'Czyszcczenie pamięci podręcznej...';
$lang['install_admin_emailing'] = 'Wysłanie informacji o koncie administratora...';
$lang['install_admin_congratulations'] = 'Gratulacje! Instalacja zakończona. Oto Tw&oacute;j ';
$lang['could_not_connect_db'] = 'Nie można się podłączyć do bazy danych. Upewnij się, że nazwa użytkownika i hasło są poprawne, a także czy użytkownik ma prawo dostępu do bazy.';
$lang['cannot_write_config'] = 'Błąd zapisu do %s.';
$lang['email_accountinfo_subject'] = 'Informacje o koncie administratora CMS Made Simple';
$lang['email_accountinfo_message'] = 'Dziękujemy za zainstalowanie CMS Made Simple.

To są szczeg&oacute;ły skonfigurowanego konta administratora:
Nazwa użytkownika: %s
Hasło: %s

Panel administracyjny dostępny jest pod tym adresem: %s';
$lang['utma'] = '156861353.1258716175.1227369677.1228120940.1228214100.5';
$lang['utmz'] = '156861353.1228120940.4.3.utmccn=(referral)|utmcsr=otrebusy.pl|utmcct=/admin/editevent.php|utmcmd=referral';
$lang['utmb'] = '156861353.1.10.1228214100';
$lang['utmc'] = '156861353';
?>