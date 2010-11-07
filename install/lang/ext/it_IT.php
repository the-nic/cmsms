<?php
$lang['setup_flat_urls'] = 'Gli URL abbreviati sono impostati';
$lang['install_timezone'] = 'Alcuni server che eseguono php 5.3 hanno un fuso orario impostato non correttamente.  Selezionate il fuso orario appropriato dalla lista precedente.  Se non &egrave; necessario nel vostro server, potete selezionare &quot;Nessuno&quot;, potete modificare questa impostazione nel file config.php anche in seguito.';
$lang['timezone'] = 'Fuso Orario';
$lang['none'] = 'Nessuno';
$lang['test_error_estrict'] = 'Controllo error_reporting per accertare che E_STRICT sia disabilitato';
$lang['test_estrict_failed'] = 'E_STRICT &egrave; abilitato';
$lang['info_estrict_failed'] = 'Alcune librerie utilizzate da CMSMS non funzionano correttamente con E_STRICT.  Vi preghiamo di disabilitarlo prima di procedere';
$lang['test_error_edeprecated'] = 'Controllo error_reporting per accertare che E_DEPRECATED sia disabilitato';
$lang['test_edeprecated_failed'] = 'E_DEPRECATED &egrave; abilitato';
$lang['info_edeprecated_failed'] = 'Se E_DEPRECATED &egrave; abilitato, nei vostri rapporti di errore gli utenti vedranno molti messaggi di avvertimento, che potrebbero influire sulla visualizzazione e sulle funzionalit&agrave;';
$lang['invalidemail'] = 'L&#039;indirizzo email inserito non &egrave; valido';
$lang['empty_query'] = 'Query vuota?? %s';
$lang['no_db_driver'] = 'Nessun driver DB compatibile trovato';
$lang['test_check_output_buffering'] = 'Controllo di output buffering';
$lang['test_check_output_buffering_failed'] = 'Output buffering &egrave; disabilitato. Probabilmente non sarete in grado di usare molte funzionalit&agrave; che lo richiedono.';
$lang['phpinfo'] = 'Visualizza le Informazioni PHP';
$lang['mod_security'] = 'Apache Modulo Security';
$lang['test_check_tempnam'] = 'Contollo della funzione tempnam';
$lang['test_check_db_drivers'] = 'Drivers per database';
$lang['test_check_db_drivers_failed'] = 'Nessun driver per database trovato';
$lang['test_check_register_globals'] = 'Controllo PHP register globals';
$lang['test_check_register_globals_failed'] = 'PHP register globals attivo. Per ragioni di sicurezza dovrebbe essere disabilitato.';
$lang['test_check_disable_functions'] = 'Controllo funzioni PHP disabilitate';
$lang['test_check_disable_functions_failed'] = 'Attenzione: questa &egrave; una lista delle funzioni disabilitate sul Vostro server.';
$lang['install_admin_db_port'] = 'Porta del Database';
$lang['install_admin_db_port_info'] = 'Se non la conoscete, lasciate in bianco per usare la predefinita.';
$lang['install_admin_db_socket'] = 'Socket Database';
$lang['install_admin_db_socket_info'] = 'NON SUPPORTATO.';
$lang['install_admin_frontendlang'] = 'Il linguaggio predefinito per il frontend. Questa informazione imposta il parametro &quot;locale&quot; utilizzato per molte funzioni come date, etc.';
$lang['install_default_encoding'] = 'In quasi tutti i casi, default_encoding dovrebbe essere utf-8.';
$lang['installer_done'] = '[fatto]';
$lang['installer_failed'] = '[fallito]';
$lang['create_permission'] = 'Creo permessi ...';
$lang['add_column_sql'] = 'Aggiungo colonna alla tabella %s ...';
$lang['update_table_sql'] = 'Aggiorno la tabella %s ...';
$lang['installing_module'] = 'Installo il modulo %s ...';
$lang['updating_schema_version'] = 'Aggiorno lo schema alla versione %s ...';
$lang['upgrade_config'] = 'Aggiorno config.php';
$lang['upgrade_config_info'] = 'config aggiornato';
$lang['upgrade_failed_again'] = 'Uno o pi&ugrave; aggiornamenti sono falliti. Correggete il problema e premere il bottone sottostante per un nuovo controllo.';
$lang['upgrade_cache_dirs'] = 'Pulisco le cartelle di cache';
$lang['cannot_clean_cache_dirs'] = 'Non riesco a pulire le cartelle di cache!';
$lang['upgrade_schema'] = 'Aggiorno schema';
$lang['need_upgrade_schema'] = 'Il CMS necessita di un aggiornamento.<br />State al momento utilizzando la versione di schema %s ed &egrave; necessario aggiornare alla versione %s';
$lang['schema_ok'] = 'Ora il database CMS &egrave; aggiornato con la versione di schema %s';
$lang['noneed_upgrade_schema'] = 'Il database CMS &egrave; aggiornato e sta usando la versione di schema %s';
$lang['upgrade_modules'] = 'Aggiornamento dei moduli';
$lang['noneed_upgrade_modules'] = 'I moduli del core sono aggiornati';
$lang['upgrade_sql_module_from_to'] = 'Aggiornamento SQL del modulo &quot;%s&quot; da %s a %s ...';
$lang['upgrade_event_module_from_to'] = 'Aggiornamento Eventi del modulo &quot;%s&quot;da %s a %s ...';
$lang['sitedown_not_removed'] = 'Non riesco a rimuovere il file tmp/cache/SITEDOWN. Si prega di rimuoverlo manualmente o continuerete a mostrare un messaggio &quot;Sito in manutenzione&quot; sulle Vostre pagine.';
$lang['upgrade_ok'] = 'Si prega di rivedere config.php, modificare eventualmente ogni nuova configurazione come necessario e poi ripristinare i suoi permessi ad uno stato di sola lettura. Voi dovreste anche controllare che tutti i Vostri moduli siano aggiornati andando alla pagina Estensioni -> Moduli e guardando per qualsiasi messaggio &quot;Necessita di Aggiornamento&quot;.';
$lang['upgrade_complete'] = 'Processo di aggiornamento completato';
$lang['upgrade_end'] = 'CMS &egrave; aggiornato. Si prega di cliccare %s per andare al Vostro sito o potete %s.';
$lang['here'] = 'qui';
$lang['go_to_admin'] = 'andare al Pannello di Amministrazione';
$lang['errorfilenot'] = 'File non trovato!';
$lang['errorfilenotwritable'] = 'File non scrivibile!';
$lang['nofiles'] = 'Questa risorsa non esiste!';
$lang['is_directory'] = 'Questa risorsa &egrave; una directory!';
$lang['is_readable_false'] = 'Questa risorsa non &egrave; leggibile!';
$lang['checksum_match'] = 'I checksum coincidono!';
$lang['checksum_not_match'] = 'I checksum non coincidono!';
$lang['not_checksum'] = 'Non riesco a recuperare il checksum!';
$lang['format_datetime'] = '%c';
$lang['upload_err_ini_size'] = 'Il file inviato supera il parametro upload_max_filesize in php.ini!';
$lang['upload_err_form_size'] = 'Il file inviato supera il parametro MAX_FILE_SIZE specificato nel form HTML.';
$lang['upload_err_partial'] = 'Il file inviato &egrave; stato caricato solo parzialmente.';
$lang['upload_err_no_file'] = 'Nessun file inviato.';
$lang['upload_err_no_tmp_dir'] = 'Non trovo la cartella temporanei.';
$lang['upload_err_cant_write'] = 'Scrittura del file su disco fallita.';
$lang['upload_err_extension'] = 'Caricamento file bloccato per l&#039;estensione.';
$lang['upload_err_empty'] = 'Il file ha dimensione zero.';
$lang['upload_err_unknown'] = 'Problema sconosciuto nel caricamento file.';
$lang['function_file_uploads_off'] = 'file_uploads &egrave; disattivato nella vostra configurazione di php.ini!';
$lang['upload_file_no_readable'] = 'Il file inviato non &egrave; leggibile!';
$lang['upload_file_multiple'] = 'Non sono permessi invii di file multipli!';
$lang['test_check_magic_quotes_gpc'] = 'Magic quotes per le operazioni Get/Post/Cookie';
$lang['test_check_magic_quotes_gpc_failed'] = 'Quando i magic_quotes sono abilitati, a tutti gli apici, virgolette e barre vengono aggiunte barre retroverse (\) automaticamente. Questa opzione potrebbe creare molti problemi con il CMS.';
$lang['test_check_magic_quotes_runtime'] = 'Magic quotes in esecuzione';
$lang['test_check_magic_quotes_runtime_failed'] = 'Quando i magic_quotes sono abilitati, molte funzioni che restituiscono dati da qualsiasi tipo di sorgente esterna, inclusi database e file di testo, avranno le virgolette con una barra retroversa. Questa opzione potrebbe creare molti problemi con CMS Made Simple';
$lang['install_admin_checksum'] = 'Verficate la Vostra installazione';
$lang['upgrade_admin_checksum'] = 'Verificate il vostro aggiornamento di sistema';
$lang['checksum'] = 'Test del checksum';
$lang['checksum_file'] = 'File di checksum';
$lang['install_test_checksum'] = 'Potete convalidare l&#039;integrit&agrave; dei vostri file del CMS comparandoli con il checksum dei file CMS originali. Pu&ograve; essere utile verificando problemi con i file caricati.';
$lang['checksum_passed'] = 'Tutti i checksums coincidono!';
$lang['checksum_failed'] = 'Corrispondenza checksum con errori. Guardate l&#039;help per ulteriori informazioni';
$lang['test_check_open_basedir'] = 'Controllo per PHP Open Basedir';
$lang['test_check_open_basedir_failed'] = 'Sono attive delle restrizioni date da Open basedir. Potreste avere difficolt&agrave; con alcune funzioni aggiuntive per colpa di queste restrizioni.';
$lang['unlimited'] = 'Non limitato';
$lang['test_open_basedir_session_save_path'] = 'Sembra siano attive restrizioni di Open basedir. Se avete problemi con SESSION e ini_set funziona, potete tentare di abilitare le sessioni con i cookie aggiungendo: ini_set(&#039;session.use_only_cookies&#039;, 1);  all&#039;inizio del file config.php';
$lang['install_warn_db_createtables'] = 'Normalmente questo campo dovrebbe essere spuntato tutte le volte. Usate cautela nel disabilitarlo';
$lang['install_admin_tablesnotcreated'] = 'Processo completato. Il processo di installazione &egrave; stato completato. Come avete richiesto, le tabelle del database non sono state create. Tuttavia il file di configurazione &egrave; stato reinizializzato e tutti i test di pre-installazione sono riusciti. Grazie, qui c&#039;&egrave; il vostro';
$lang['info_create_dir_and_file'] = 'Il proprietario del Processo HTTP non pu&ograve; creare un file all&#039;interno di una directory della quale possiede diritti di propriet&agrave;. Probabilmente significa che in qualche modo il safe mode di php &egrave; stato abilitato. Molte funzioni all&#039;interno di CMS Made Simple non verranno eseguite correttamente senza questa funzionalit&agrave;. Non &egrave; possibile continuare.';
$lang['test_create_dir_and_file'] = 'Controllo se il processo httpd pu&ograve; creare un file all&#039;interno di una directory da esso creata.';
$lang['cms_site'] = 'Sito CMS';
$lang['or_greater'] = 'O maggiore';
$lang['sitename'] = 'Nome del sito';
$lang['warning_safe_mode'] = '<strong><em>ATTENZIONE:</em></strong> PHP Safe mode &egrave; abilitato. Ci&ograve; provocher&agrave; difficolt&agrave; con i file caricati tramite l&#039;interfaccia del browser web, incluse immagini, modelli e pacchetti modulo in XML. E&#039; consigliabile contattare il vostro amministratore del sito per valutare la possibilit&agrave; di disattivare la modalit&agrave; safe mode.';
$lang['test'] = 'Test ';
$lang['results'] = 'Risultati';
$lang['untested'] = 'Non testato';
$lang['owner'] = 'Proprietario';
$lang['permissions'] = 'Permessi';
$lang['off'] = 'Off ';
$lang['on'] = 'On ';
$lang['permission_information'] = 'Informazioni sui permessi';
$lang['server_os'] = 'Sistema Operativo del Server';
$lang['server_api'] = 'API del server';
$lang['server_software'] = 'Software sul server';
$lang['server_information'] = 'Informazioni sul server';
$lang['session_save_path'] = 'Path di salvataggio delle Sessioni';
$lang['max_execution_time'] = 'Massimo tempo di esecuzione';
$lang['gd_version'] = 'Versione GD';
$lang['upload_max_filesize'] = 'Massima dimensione degli upload';
$lang['post_max_size'] = 'Massima dimensione delle variabili Post';
$lang['memory_limit'] = 'Limite di memoria di PHP';
$lang['server_db_type'] = 'Database del server';
$lang['server_db_version'] = 'Versione database del server';
$lang['phpversion'] = 'Versione PHP attuale';
$lang['safe_mode'] = 'Safe Mode di PHP';
$lang['php_information'] = 'Informazioni su PHP';
$lang['cms_install_information'] = 'Informazioni sulla installazione del CMS';
$lang['cms_version'] = 'Versione del CMS';
$lang['systeminfo_copy_paste'] = 'Copiate e incollate il testo selezionato nel vostro messaggio sul forum';
$lang['help_systeminformation'] = 'Le informazioni visualizzate sotto sono ottenute da varie fonti ed elencate cos&igrave; da permettervi di trovare le alcune delle informazioni richieste durante la diagnostica di un problema o la richiesta di aiuto per la vostra installazione di CMS Made Simple.';
$lang['systeminfo'] = 'Informazioni sul sistema';
$lang['systeminfodescription'] = 'Visualizza varie informazioni sul Vostro sistema che possono essere utili in fase di diagnostica dei problemi';
$lang['error'] = 'Errore';
$lang['new_version_available'] = '<em>Nota bene:</em> E&#039; disponibile una nuova versione di CMS Made Simple. Notificatelo al vostro amministratore di sito.';
$lang['info_urlcheckversion'] = 'Se questo indirizzo URL &egrave; la parola &amp;quot;none&amp;quot; non verr&agrave; eseguito nessun controllo.<br/>Una stringa vuota equivale all&#039;utilizzo dell&#039;indirizzo URL predefinito.';
$lang['urlcheckversion'] = 'Verifica la presenza di una nuova versione di CMS usando questo URL';
$lang['read'] = 'Lettura';
$lang['write'] = 'Scrittura';
$lang['execute'] = 'Esecuzione';
$lang['group'] = 'Gruppo';
$lang['other'] = 'Altro';
$lang['global_umask'] = 'Maschera di creazione File (umask)';
$lang['errorcantcreatefile'] = 'Non riesco a creare un file (problemi di permessi?)';
$lang['add'] = 'Aggiungi';
$lang['about'] = 'Circa';
$lang['action'] = 'Azione';
$lang['actionstatus'] = 'Azione/Stato';
$lang['active'] = 'Attivo';
$lang['cantremove'] = 'Non posso rimuovere';
$lang['changepermissions'] = 'Cambio dei permessi';
$lang['changepermissionsconfirm'] = 'ATTENZIONE\n\nQuesta azione cercher&agrave; di verificare che tutti i file che compongono il modulo siano scrivibili dal web server.\nSiete sicuri di voler continuare?';
$lang['success'] = 'Successo';
$lang['advanced'] = 'Avanzato';
$lang['back'] = 'Torna al Menu';
$lang['cancel'] = 'Annulla';
$lang['cantchmodfiles'] = 'Non riesco a modificare i permessi su alcuni file';
$lang['cantremovefiles'] = 'Problema nel rimuovere file (permessi?)';
$lang['create'] = 'Crea';
$lang['database'] = 'Database ';
$lang['databaseprefix'] = 'Prefisso del database';
$lang['databasetype'] = 'Tipo di database';
$lang['date'] = 'Data';
$lang['default'] = 'Predefinito';
$lang['delete'] = 'Elimina';
$lang['deleteconfirm'] = 'Siete sicuri di volere eilminare - %s - ?';
$lang['description'] = 'Descrizione';
$lang['directoryexists'] = 'Questa directory esiste gi&agrave;.';
$lang['down'] = 'Gi&ugrave;';
$lang['edit'] = 'Modifica';
$lang['email'] = 'Indirizzo Email';
$lang['errordeletingfile'] = 'Non riesco a cancellare il file. Problemi di permessi?';
$lang['errordirectorynotwritable'] = 'Nessun permesso per scrivere nella directory. Questo potrebbe essere causato dai permessi e proprietario del file. Potrebbe anche essere attivo safe mode di php.';
$lang['cachenotwritable'] = 'La directory Cache non &egrave; scrivibile. La pulizia della cache non pu&ograve; quindi funzionare. Si prega di modificare i permessi della directory tmp/cache in modo che sia scrivibile (chmod 777). Forse dovete anche disabilitare il safe mode di PHP.';
$lang['modulesnotwritable'] = 'La directory modules non &egrave; scrivibile. Se volete installare nuovi moduli tramite il caricamento di file XML, dovete fare in modo che la directory dei moduli abbia permessi di scrittura completi (chmod 777). Potrebbe anche essere attivo safe mode di php.';
$lang['false'] = 'Falso';
$lang['settrue'] = 'Imposta a vero';
$lang['filename'] = 'Nome File';
$lang['filesize'] = 'Dimensione del file';
$lang['help'] = 'Aiuto';
$lang['language'] = 'Linguaggio';
$lang['lastname'] = 'Cognome';
$lang['name'] = 'Nome';
$lang['password'] = 'Password ';
$lang['passwordagain'] = 'Password (di nuovo)';
$lang['remove'] = 'Rimuovi';
$lang['saveconfig'] = 'Salva il Config';
$lang['true'] = 'Vero';
$lang['setfalse'] = 'Imposta a falso';
$lang['type'] = 'Tipo';
$lang['typenotvalid'] = 'Tipo non valido';
$lang['unknown'] = 'Sconosciuto';
$lang['user'] = 'Utente';
$lang['userdefinedtags'] = 'Tag definito dall&#039;utente';
$lang['usermanagement'] = 'Gestione Utenti';
$lang['username'] = 'Nome Utente';
$lang['usernameincorrect'] = 'Nome Utente o password non corretti';
$lang['version'] = 'Versione';
$lang['install_title'] = 'Installazione di CMS Made Simple (passo %s)';
$lang['install_system'] = 'Sistema di installazione';
$lang['install_thanks'] = 'Grazie per avere installato CMS Made Simple';
$lang['upgrade_title'] = 'Aggiornamento di CMS Made Simple (passo %s)';
$lang['upgrade_system'] = 'Sistema di aggiornamento';
$lang['upgrade_thanks'] = 'Grazie per avere aggiornato CMS Made Simple alla versione';
$lang['install_please_read'] = 'Vi invitiamo a leggere la pagina sulle <a rel="external" href="http://wiki.cmsmadesimple.org/index.php/User_Handbook/Installation/Troubleshooting">Problematiche di Installazione</a> nella documentazione di CMS Made Simple Documentation Wiki.';
$lang['install_checking'] = 'Controllo dei permessi e delle impostazioni PHP';
$lang['install_test'] = 'Test ';
$lang['install_result'] = 'Risultato';
$lang['install_required_settings'] = 'Impostazioni richieste';
$lang['install_recommended_settings'] = 'Impostazioni raccomandate';
$lang['install_you_have'] = 'Voi avete';
$lang['install_legend'] = 'Legenda';
$lang['install_symbol'] = 'Simbolo';
$lang['install_definition'] = 'Definizione';
$lang['install_value_passed'] = 'Un test richiesto passato';
$lang['install_value_failed'] = 'Un test richiesto fallito';
$lang['install_error_fragment'] = 'Informazioni sulle problematiche di installazione';
$lang['install_value_required'] = 'Un&#039;impostazione &egrave; sotto il minimo valore richiesto';
$lang['install_value_recommended'] = 'Un&#039;impostazione &egrave; sopra il valore richiesto, ma sotto il valore raccomandato<br />oppure... una propriet&agrave; che <em>potrebbe</em> essere richiesta per alcune funzionalit&agrave; non &egrave; disponibile';
$lang['install_value_exceed'] = 'Un&#039;impostazione coincide o eccede la gamma valori raccomandata<br />oppure... una propriet&agrave; che <em>potrebbe</em> essere richiesta per alcune funzionalit&agrave; &egrave; disponibile';
$lang['install_test_failed'] = 'Uno o pi&ugrave; test sono falliti o necessitano di verifiche. Potete ancora installare il sistema ma alcune funzioni potrebbero non lavorare correttamente.<br />Provate a correggere la situazione e premere &quot;Prova di nuovo&quot;, o premere il pulsante &quot;Continua&quot; se sono solo valori raccomandati.';
$lang['install_test_passed'] = 'Tutti i test passati (almeno al livello minimo). Si prega di premere il pulsante &quot;Continua&quot;.';
$lang['install_failed_again'] = 'Uno o pi&ugrave; test sono falliti. Correggete il problema e premete il pulsante sotto per eseguire un nuovo controllo.';
$lang['install_try_again'] = 'Prova di nuovo';
$lang['install_continue'] = 'Continua';
$lang['failure'] = 'Fallito';
$lang['caution'] = 'Attenzione';
$lang['install_admin_umask'] = 'Test Maschera Creazione File (umask)';
$lang['install_test_umask'] = 'Premete il pulsante di controllo per verificare l&#039;umask inserita ...';
$lang['test_umask_text'] = 'umask (abbreviazione per user file creation mode mask) &egrave; una funzione nell&#039;ambiente POSIX che influisce la modalit&agrave; di file system predefinito per i file e cartelle appena creati nel processo corrente. Controlla quali permessi non saranno impostati per ogni nuovo file creato.';
$lang['test_check_umask'] = 'Risultato del test sul file creato in';
$lang['test_umask_not_given'] = 'Umask non inserito';
$lang['test_check_umask_failed'] = 'Test umask fallito';
$lang['test_username_not_given'] = 'Dovete inserire un Nome Utente';
$lang['test_username_illegal'] = 'Il Nome Utente contiene caratteri non permessi!';
$lang['test_not_both_passwd'] = 'Compilate entrambi i campi password';
$lang['test_passwd_not_match'] = 'I campi password non coincidono!';
$lang['test_email_accountinfo'] = 'E&#039; stata richiesta l&#039;email con le informazioni dell&#039;account, ma non &egrave; stato fornito alcun indirizzo email da iutilizzare!';
$lang['test_database_prefix'] = 'Il prefisso del database contiene caratteri non permessi';
$lang['test_no_dbms'] = 'Nessun dbms selezionato!';
$lang['test_could_not_connect_db'] = 'Non posso connettermi al database. Verificare che nome utente e password siano corretti e che l&#039;utente abbia permessi di accesso al database inserito.';
$lang['test_could_not_drop_table'] = 'Non posso eliminare una tabella. Verificare che l&#039;utente possieda i privilegi di eliminazione tabelle nel database inserito.';
$lang['test_could_not_create_table'] = 'Non posso creare una tabella. Verificare che l&#039;utente possieda i privilegi di creazione tabelle nel database inserito.';
$lang['test_check_php'] = 'Controllo che la versione PHP sia %s+';
$lang['test_min_recommend'] = '(minimo %s, raccomandato %s o maggiore)';
$lang['test_min_recommend_plus'] = '(min %s, raccomandato %s+)';
$lang['test_requires_php_version'] = 'CMS Made Simple richiede PHP versione 5.2.4 o superiore (Voi avete %s), ma PHP versione %s o maggiore &egrave; raccomandato per assicurare la massima compatibilit&agrave; con estensioni di terze parti';
$lang['test_check_md5_func'] = 'Controllo per la funzione md5';
$lang['test_check_safe_mode'] = 'Controllo per il safe mode di PHP';
$lang['test_check_safe_mode_failed'] = 'Safe mode di PHP potrebbe creare problemi con l&#039;invio di file e altre funzioni. Tutto dipende da quanto sono restrittive le impostazioni di safe mode sul vostro server.';
$lang['test_check_tokenizer'] = 'Controllo per la funzioni tokenizer';
$lang['test_check_tokenizer_failed'] = 'Il non avere la funzione tokenizer potrebbe provocare la visualizzazione di pagine completamente. Richiediamo quindi che sia installata nel sistema.';
$lang['test_check_gd'] = 'Controllo per la libreria GD';
$lang['test_check_gd_failed'] = 'Le libreria GD &egrave; obbligatoria per alcuni moduli e funzionalit&agrave;.';
$lang['test_check_write'] = 'Verifico i permessi di scrittura su';
$lang['test_may_not_exist'] = 'Questo file potrebbe non esistere ancora. Se &egrave; cos&igrave;, dovreste creare un file vuoto con questo nome. Si prega anche di assicurarsi che sia scrivibile dal server web.';
$lang['could_not_retrieve_a_value'] = 'Non posso recuperare un valore.... passo avanti.';
$lang['displaying_the_value_originally'] = '<br />Visualizzo il valore originariamente impostato nel file di configurazione (potrebbe essere non essere accurato).';
$lang['test_check_xml_func'] = 'Controllo per un supporto di base XML (expat)';
$lang['test_check_xml_failed'] = 'Il supporto XML non &egrave; compilato nella vostra installazione di PHP. Potete ancora utilizzare il sistema, ma non riuscirete a sfruttare alcuna delle funzionalit&agrave; di installazione remota dei moduli.';
$lang['test_allow_url_fopen_failed'] = 'Quando allow url fopen &egrave; disabilitato, non riuscirete ad accedere agli oggetti URL come i file remoti usando il protocollo ftp o http.';
$lang['test_remote_url'] = 'Test per indirizzi remoti';
$lang['test_remote_url_failed'] = 'Probabilmente non potrete aprire file su un server web remoto.';
$lang['connection_error'] = 'Le connessioni in uscita sembrano non funzionare! C&#039;&egrave; un firewall o alcune ACL per le connessioni esterne? Questo provocher&agrave; malfunzionamenti nel Module Manager e potenzialmente anche in altre funzionalit&agrave;.';
$lang['remote_connection_timeout'] = 'Tempo scaduto per la connessione!';
$lang['search_string_find'] = 'Connessione ok!';
$lang['connection_failed'] = 'Connessione fallita!';
$lang['remote_response_ok'] = 'Risposta da remoto: ok!';
$lang['remote_response_404'] = 'Risposta da remoto: non trovato!';
$lang['remote_response_error'] = 'Risposta da remoto: errore!';
$lang['test_check_file_upload'] = 'Controllo file uploads';
$lang['test_check_file_failed'] = 'Quando file uploads &egrave; disabilitato, non sarete in grado di utilizzare nessuna delle funzionalit&agrave; di caricamento file incluse in CMS Made Simple. Se possibile, dovreste fare rimuovere questa restrizione dal vostro amministratore per potere sfruttare propriamente tutte le caratteristiche di gestione file del sistema. Procedete con cautela.';
$lang['test_check_memory'] = 'Controllo il limite di memoria di PHP';
$lang['test_check_memory_failed'] = 'Potreste non avere abbastanza memoria disponibile per eseguire correttamente CMSMS, o con tutte le estensioni desiderate. Se possibile, dovreste chiedere al vostro amministratore di sistema di aumentare questo parametro. Procedete con cautela.';
$lang['test_check_time_limit'] = 'Controllo il tempo limite di PHP in secondi';
$lang['test_check_time_limit_failed'] = 'Numero di secondi permessi per eseguire uno script. Se questo valore viene raggiunto, lo script restituisce un errore fatale.';
$lang['test_check_post_max'] = 'Controllo la dimensione massima dei post';
$lang['test_check_post_max_failed'] = 'Probabilmente non sarete in grado di inviare grandi ammontare di dati. Siate consci di questa restrizione.';
$lang['test_check_upload_max'] = 'Controllo la dimensione massima di invio file';
$lang['test_check_upload_max_failed'] = 'Probabilmente non sarete in grado di inviare file di grandi dimensioni utilizzando le funzionalit&agrave; di gestione file incluse. Siate consci di questa restrizione.';
$lang['test_check_writable'] = 'Controllo se %s &egrave; scrivibile';
$lang['test_check_upload_failed'] = 'La cartella uploads non &egrave; scrivibile. Potete ancora installare il sistema, ma non sarete in grado di caricare file tramite il Pannello di amministrazione.';
$lang['test_check_images_failed'] = 'La cartella images non &egrave; scrivibile. Potete ancora installare il sistema, ma non sarete in grado di caricare e utilizzare immagini tramite il Pannello di amministrazione.';
$lang['test_check_modules_failed'] = 'La cartella modules non &egrave; scrivibile. Potete ancora installare il sistema, ma non sarete in grado di caricare moduli tramite il Pannello di amministrazione.';
$lang['test_check_file_get_contents'] = 'Controllo per la funzione file_get_contents';
$lang['test_check_file_get_contents_failed'] = 'Probabilmente non sarete in grado di usare nessuna funzionalit&agrave; che sfrutta questo parametro';
$lang['test_check_session_save_path'] = 'Controllo se session.save_path &egrave; scrivibile';
$lang['test_empty_session_save_path'] = 'La Vostra session.save_path &egrave; vuota. PHP user&agrave; la directory temporanea del vostro Sistema Operativo. Se avete problemi con SESSION e ini_set funziona, potete provare ad abilitare i session cookies aggiungendo: ini_set(&#039;session.use_only_cookies&#039;, 1);  all&#039;inizio del file include.php';
$lang['test_check_session_save_path_failed'] = 'La Vostra session.save_path &egrave; &quot;%s&quot;. Se questo percorso non &egrave; scrivibile potreste non riuscire ad eseguire il login al Pannello di Amministrazione. Se riscontrate problemi di questo tipo potreste cercare di rendere questo percorso scrivibile. Questo test potrebbe fallire se safe_mode di PHP &egrave; abilitato (vedere sotto).';
$lang['test_check_ini_set'] = 'Controllo se ini_set funziona';
$lang['test_check_ini_set_failed'] = 'Sebbene la capacit&agrave; di sovrascrivere le impostazioni di php.ini non sia obbligatoria, alcune funzionalit&agrave; di estensioni (opzionali) utilizzano ini_set per estendere i tempi limite e permettere il caricamento di file di grandi dimensioni, etc. Potreste riscontrare difficolt&agrave; con funzionalit&agrave; di alcune estensioni senza questa propriet&agrave;. Questo test potrebbe fallire se safe_mode di PHP &egrave; abilitato (vedere sotto).';
$lang['install_admin_header'] = 'Informazioni sull&#039;account di Admin';
$lang['install_admin_info'] = 'Selezionate nome utente, password e indirizzo email per il vostro account di amministrazione. Si prega di registrare la password in posto sicuro dato che non c&#039;&egrave; altro modo di collegarsi al pannello di amministrazione senza di essa.';
$lang['install_admin_email'] = 'Indirizzo E-mail';
$lang['install_admin_email_info'] = 'Informazioni sull&#039;account E-Mail';
$lang['install_admin_email_note'] = '<strong>Nota bene:</strong> Questo processo utilizza la funzione mail di php. Se non ricevete questa mail potrebbe trattarsi di un&#039;errata configurazione del vostro server. In questo caso contattate l&#039;amministratore del vostro hosting.';
$lang['install_admin_sitename'] = 'Questo &egrave; il nome del Vostro sito. Verr&agrave; utilizzato nei modelli predefiniti e pu&ograve; essere inserito ovunque con il tag {sitename}.';
$lang['install_admin_db'] = 'Informazioni sul database';
$lang['install_admin_db_info'] = '<p>Verificate di avere creato il vostro database e attribuito pieni privilegi ad un utente.</p>
<p>Per MySQL, usate la seguente procedura:</p>
<p>Accedete a MySql tramite console ed eseguite i comandi seguenti:</p>
<ol>
<li>create database cms; (usate qualsiasi nome volete ma ricordatevelo bene, dovrete inserirlo in questa pagina)</li>
<li>grant all privileges on cms.* to cms_user@localhost identified by &#039;cms_pass&#039;;</li>
</ol>';
$lang['install_admin_follow'] = 'Completate i campi seguenti';
$lang['install_admin_db_type'] = 'Tipo di database';
$lang['install_admin_no_db'] = 'Sembra che non esista nessun driver valido compilato per il database nella vostra installazione PHP. Vi preghiamo di confermare di avere installato il supporto per MySql, MySqli o Postgres7, dopodich&egrave; provate di nuovo.';
$lang['install_admin_db_host'] = 'Indirizzo del server database';
$lang['install_admin_db_name'] = 'Nome database';
$lang['install_admin_db_create'] = 'Crea tabelle (Attenzione: cancella tutti i dati esistenti)';
$lang['install_admin_db_prefix'] = 'Prefisso delle tabelle nel DB';
$lang['install_admin_db_sample'] = 'Installa i modelli ed i contenuti di esempio';
$lang['retry'] = 'Riprova';
$lang['install_admin_db_create_seq'] = 'Creazione della sequenza di tabelle %s...';
$lang['install_admin_importing'] = 'Importazione dei dati di esempio...';
$lang['invalid_query'] = 'Query non valida: %s';
$lang['install_creating_table'] = '<p>Creazione della tabella %s ... [%s]</p>';
$lang['install_creating_index'] = '<p>Creazione dell&#039;indice nella %s tabella... [%s]</p>';
$lang['done'] = 'fatto';
$lang['failed'] = 'fallito';
$lang['install_admin_error_schema'] = 'Errore nell&#039;ottenere lo schema SQL';
$lang['install_admin_set_account'] = 'Imposto le informazioni dell&#039;account di amministrazione...';
$lang['install_admin_set_sitename'] = 'Imposto il nome del sito...';
$lang['install_admin_setup'] = 'Ora continuiamo l&#039;impostazione del vostro file di configurazione, abbiamo gi&agrave; la maggior parte delle informazioni di cui necessitiamo. Con buone possibilit&agrave; potete tralasciare questi valori, perci&ograve;, quando siete pronti, premete il pulsante Continua.';
$lang['install_admin_docroot'] = 'Document root del CMS (come visto dal server web)';
$lang['install_admin_docroot_path'] = 'Percorso del Document root';
$lang['install_admin_querystring'] = 'Stringa Query (tralasciate questo valore a meno che non riscontriate problemi, in quel caso modificate il file config.php manualmente)';
$lang['invalid_querys'] = '<b>ATTENZIONE<b/>: sono presenti query non valide sul vostro DB!';
$lang['install_admin_sitedown'] = 'Errore: non posso rimuovere il file tmp/cache/SITEDOWN. Si prega di rimuoverlo manualmente.';
$lang['install_admin_update_hierarchy'] = 'Aggiornamento delle posizioni gerarchiche...';
$lang['install_admin_set_core_event'] = 'Imposto eventi del core...';
$lang['install_admin_install_modules'] = 'Installo moduli...';
$lang['install_admin_index_search'] = 'Indicizzo la funzione Ricerca...';
$lang['install_admin_clear_cache'] = 'Ripulisco la cache del sito (se esiste)...';
$lang['install_admin_emailing'] = 'Invio per email le informazioni dell&#039;account di amministrazione...';
$lang['install_admin_congratulations'] = 'Congratulazioni, la configurazione &egrave; completa - ecco &egrave; il vostro';
$lang['could_not_connect_db'] = 'Non posso connettermi al database. Verificate che il nome utente e la password siano corretti, e che l&#039;utente possieda accesso al database inserito.';
$lang['cannot_write_config'] = 'Errore: non posso scrivere su %s.';
$lang['email_accountinfo_subject'] = 'Informazioni sull&#039;Account di Amministrazione di CMS Made Simple';
$lang['email_accountinfo_message'] = 'Grazie per avere installato CMS Made Simple.

Queste sono le informazioni del vostro nuovo account:
nome utente: %s
password: %s

Potete accedere all&#039;area di amministrazione da qui: %s';
$lang['utma'] = '156861353.563238401015149400.1226334751.1288697345.1288700024.80';
$lang['qca'] = 'P0-2007686920-1251190815027';
$lang['utmz'] = '156861353.1288181013.71.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>