<?php
$lang['installed_module'] = 'Module install&eacute;';
$lang['automatedtask_success'] = 'T&acirc;che automatis&eacute;e r&eacute;alis&eacute;e';
$lang['ip_addr'] = 'Adresse IP';
$lang['install_admin_pwsalt_note'] = 'Si vous choisissez d&#039;activer &quot;Mots de passe Admin s&eacute;curis&eacute;&quot;, il n&#039;y a absolument aucun moyen de r&eacute;initialiser les mots de passe Admin perdu autrement que par la fonctionnalit&eacute; de r&eacute;cup&eacute;ration du mot de passe sur la page de connexion administration. Il est essentiel que vous associez donc une adresse email &agrave; chaque compte Admin pour recevoir par courrier &eacute;lectronique ce nouveau mot de passe.';
$lang['admin_salt'] = 'Mots de passe Admin s&amp;eacute;curis&amp;eacute;';
$lang['setup_flat_urls'] = 'URL courtes en service';
$lang['install_timezone'] = 'Certains serveurs PHP 5.3 n&#039;ont pas configur&eacute; le bon fuseau horaire. Merci de s&eacute;lectionner le fuseau horaire appropri&eacute; dans la liste. Si ce n&#039;est pas n&eacute;cessaire sur votre serveur, vous pouvez s&eacute;lectionner &quot;Aucun&quot;. <strong>Note :</strong> Choisissez le fuseau horaire de votre serveur, ce n&#039;est pas un param&egrave;tre d&#039;affichage mais il sera utilis&eacute; dans le calcul des dates. Vous pouvez toujours modifier ce param&egrave;tre ult&eacute;rieurement dans le fichier config.php.';
$lang['timezone'] = 'Fuseau horaire';
$lang['none'] = 'Aucun';
$lang['test_error_estrict'] = 'Test error_reporting pour assurer que E_STRICT est d&eacute;sactiv&eacute;';
$lang['test_estrict_failed'] = 'E_STRICT est activ&eacute;';
$lang['info_estrict_failed'] = 'Certaines biblioth&egrave;ques utilis&eacute;es par CMSMS&trade; ne fonctionnent pas bien avec E_STRICT. Merci de les d&eacute;sactiver avant de continuer';
$lang['test_error_edeprecated'] = 'Test error_reporting pour assurer que E_DEPRECATED est d&eacute;sactiv&eacute;';
$lang['test_edeprecated_failed'] = 'E_DEPRECATED est activ&eacute;';
$lang['info_edeprecated_failed'] = 'Si E_DEPRECATED est activ&eacute; dans error_reporting, les utilisateurs verront de nombreux messages d&#039;avertissement qui pourraient affecter l&#039;affichage et le fonctionnement du site';
$lang['invalidemail'] = 'L&#039;adresse de courriel entr&eacute;e est invalide !';
$lang['empty_query'] = 'Base de donn&eacute;es vide ?? %s';
$lang['no_db_driver'] = 'Aucun driver de Base de Donn&eacute;es compatible CMSMS&trade;';
$lang['test_check_output_buffering'] = 'V&eacute;rification des buffers de sortie';
$lang['test_check_output_buffering_failed'] = 'Les buffers de sortie sont d&eacute;sactiv&eacute;s. Vous ne serez probablement pas en mesure d&#039;utiliser toutes les fonctionnalit&eacute;s de cette fonction';
$lang['phpinfo'] = 'Affichage des informations PHP';
$lang['mod_security'] = 'Module Mod_Security Apache';
$lang['test_check_tempnam'] = 'V&eacute;rification de la fonction PHP tempnam';
$lang['test_check_db_drivers'] = 'Drivers de Base de Donn&eacute;es';
$lang['test_check_db_drivers_failed'] = 'Aucun drivers DB trouv&eacute;';
$lang['test_check_register_globals'] = 'V&eacute;rification PHP register globals';
$lang['test_check_register_globals_failed'] = 'PHP register_globals actif. Pour des raisons de s&eacute;curit&eacute;, d&eacute;sactivez cette option.';
$lang['test_check_disable_functions'] = 'V&eacute;rification des fonctions PHP d&eacute;sactiv&eacute;es';
$lang['test_check_disable_functions_failed'] = 'Attention : ceci est une liste des fonctions d&eacute;sactiv&eacute;es sur votre serveur.';
$lang['install_admin_db_port'] = 'Port de Base de Donn&eacute;es';
$lang['install_admin_db_port_info'] = 'Laissez ce champ vide pour avoir le port de BD par d&eacute;faut';
$lang['install_admin_db_socket'] = 'Socket de Base de Donn&eacute;es';
$lang['install_admin_db_socket_info'] = 'NON support&eacute;.';
$lang['install_admin_frontendlang'] = 'Langue par d&eacute;faut pour l&#039;interface publique. Locale &agrave; utiliser par d&eacute;faut pour diverses fonctions de manipulation de la date, etc... Laisser ce champ vide pour un environnement multilingue ou utiliser les valeurs par d&eacute;faut du serveur';
$lang['install_default_encoding'] = 'Dans presque tous les cas, utf-8 devrait &ecirc;tre l&#039;encodage. Si vous vous voulez un encodage diff&eacute;rent, changez ici, mais gardez &agrave; l&#039;esprit, cependant, que toutes les traductions de langues sont en utf-8';
$lang['installer_done'] = '[fait]';
$lang['installer_failed'] = '[&eacute;chec]';
$lang['create_permission'] = 'Cr&eacute;ation des permissions ...';
$lang['add_column_sql'] = 'Ajout de colonne &agrave; la table %s ...';
$lang['update_table_sql'] = 'Mise &agrave; jour de la table %s ...';
$lang['installing_module'] = 'Installation du module %s ...';
$lang['updating_schema_version'] = 'Mise &agrave; jour au sch&eacute;ma version %s ...';
$lang['upgrade_config'] = 'Mise &agrave; niveau du fichier config.php';
$lang['upgrade_config_info'] = 'Mise &agrave; niveau de la configuration';
$lang['upgrade_failed_again'] = 'Une ou plusieurs mises &agrave; niveau ont &eacute;chou&eacute;. Merci de corriger le probl&egrave;me, puis cliquez sur le bouton ci-dessous pour rev&eacute;rifier';
$lang['upgrade_cache_dirs'] = 'Effacement des fichiers du dossier de cache';
$lang['cannot_clean_cache_dirs'] = 'Impossible d&#039;effacer les fichiers du dossier de cache !';
$lang['upgrade_schema'] = 'Upgrade du sch&eacute;ma version&nbsp;';
$lang['need_upgrade_schema'] = 'CMSMS&trade; a besoin d&#039;une mise &agrave; niveau.<br />Vous utilisez le sch&eacute;ma version %s et vous devez mettre &agrave; niveau vers le sch&eacute;ma version %s';
$lang['schema_ok'] = 'Maintenant, la base de donn&eacute;es de CMS est &agrave; jour et utilise le sch&eacute;ma version %s';
$lang['noneed_upgrade_schema'] = 'La base de donn&eacute;es de CMS est &agrave; jour et utilise le sch&eacute;ma version %s';
$lang['upgrade_modules'] = 'Mise &agrave; niveau des modules';
$lang['noneed_upgrade_modules'] = 'Les modules du noyau sont &agrave; jour';
$lang['upgrade_sql_module_from_to'] = 'Mise &agrave; niveau SQL du module &quot;%s&quot; depuis %s vers %s ...';
$lang['upgrade_event_module_from_to'] = 'Mise &agrave; niveau des &eacute;v&eacute;nements du module &quot;%s&quot; depuis  %s vers %s ...';
$lang['sitedown_not_removed'] = 'Impossible de supprimer le fichier tmp/cache/SITEDOWN. Merci de le faire manuellement ou votre site affichera le message de maintenance.';
$lang['upgrade_ok'] = 'V&eacute;rifier le fichier config.php, modifier &eacute;ventuellement la configuration et remettre les permissions &agrave; 444 pour des raisons de s&eacute;curit&eacute;. Vous pouvez aussi v&eacute;rifier si vos modules sont &agrave; la derni&egrave;re version, en allant au menu Extensions -> Modules et regarder dans l&#039;onglet &quot;Mises &agrave; jour disponibles&quot;.';
$lang['upgrade_complete'] = 'Mise &agrave; niveau termin&eacute;e';
$lang['upgrade_end'] = 'CMSMS&trade; est &agrave; jour. Cliquez %s pour aller sur votre site ou aller sur %s.';
$lang['here'] = 'ici';
$lang['go_to_admin'] = 'Administration';
$lang['errorfilenot'] = 'Fichier non trouv&eacute; !';
$lang['errorfilenotwritable'] = 'Le fichier n&#039;a pas de permission en &eacute;criture';
$lang['nofiles'] = 'Cette ressource n&#039;existe pas !';
$lang['is_directory'] = 'Cette ressource est un dossier !';
$lang['is_readable_false'] = 'Cette ressource n&#039;a pas les permissions de lecture !';
$lang['checksum_match'] = 'Les contr&ocirc;les (checksums) correspondent !';
$lang['checksum_not_match'] = 'Les contr&ocirc;les (checksums) ne correspondent pas !';
$lang['not_checksum'] = 'Aucun contr&ocirc;le (checksum) r&eacute;cup&eacute;r&eacute; !';
$lang['format_datetime'] = '%c ';
$lang['upload_err_ini_size'] = 'Le fichier upload&eacute; d&eacute;passe la taille de la directive upload_max_filesize du php.ini !';
$lang['upload_err_form_size'] = 'Le fichier upload&eacute; d&eacute;passe la taille de la directive MAX_FILE_SIZE sp&eacute;cifi&eacute;e dans la &quot;form&quot; HTML.';
$lang['upload_err_partial'] = 'Le fichier n&#039;a &eacute;t&eacute; que partiellement upload&eacute;.';
$lang['upload_err_no_file'] = 'Aucun fichier upload&eacute;.';
$lang['upload_err_no_tmp_dir'] = 'Il manque un dossier temporaire.';
$lang['upload_err_cant_write'] = 'Impossible d&#039;&eacute;crire le fichier sur le disque.';
$lang['upload_err_extension'] = 'Arr&ecirc;t de transfert de fichiers &agrave; cause de l&#039;extension.';
$lang['upload_err_empty'] = 'Le fichier a une taille de z&eacute;ro';
$lang['upload_err_unknown'] = 'Erreur inconnue de transfert de fichier.';
$lang['function_file_uploads_off'] = 'file_uploads est d&eacute;sactiv&eacute; dans votre configuration PHP !';
$lang['upload_file_no_readable'] = 'Fichier upload&eacute; non lisible !';
$lang['upload_file_multiple'] = 'Les uploads multiples ne sont pas autoris&eacute;s !';
$lang['test_check_magic_quotes_gpc'] = 'V&eacute;rification de &quot;magic_quotes&quot; pour les op&eacute;rations Get/Post/Cookie';
$lang['test_check_magic_quotes_gpc_failed'] = 'Lorsque les &quot;magic_quotes&quot; sont &agrave; &quot;On&quot;, les guillemets simples, doubles et antislash sont &eacute;chapp&eacute;s avec un antislash automatiquement. Vous pouvez avoir des probl&egrave;mes avec les gabarits.';
$lang['test_check_magic_quotes_runtime'] = 'V&eacute;rification de magic_quotes_runtime';
$lang['test_check_magic_quotes_runtime_failed'] = 'Lorsque les &quot;magic_quotes&quot; sont &agrave; &quot;On&quot;, la plupart des fonctions qui retournent des donn&eacute;es externes, comme ceux des bases de donn&eacute;es ou des fichiers texte, auront &eacute;t&eacute; &eacute;chapp&eacute; avec un anti-slash. Vous pouvez avoir des probl&egrave;mes avec CMS made simple&trade;.';
$lang['install_admin_checksum'] = 'V&eacute;rification de votre installation';
$lang['upgrade_admin_checksum'] = 'V&eacute;rification de votre installation avant mise &agrave; niveau';
$lang['checksum'] = 'Test de contr&ocirc;le (checksum)';
$lang['checksum_file'] = 'Fichier de contr&ocirc;le (checksum)';
$lang['install_test_checksum'] = 'Vous pouvez valider l&#039;int&eacute;grit&eacute; de vos fichiers CMSMS&trade; en comparant avec le fichier de contr&ocirc;le (cmsmadesimple-x.x.x-xxxx-checksum.dat). Il peut vous aider &agrave; trouver des probl&egrave;mes sur le transfert des fichiers.';
$lang['checksum_passed'] = 'Tous les contr&ocirc;les (checksums) correspondent !';
$lang['checksum_failed'] = 'Les contr&ocirc;les (checksums) ne correspondent pas. Voir l&#039;aide pour les autres informations';
$lang['test_check_open_basedir'] = 'V&eacute;rification de PHP open_basedir';
$lang['test_check_open_basedir_failed'] = 'La restriction sp&eacute;cifi&eacute;e par open_basedir est activ&eacute;e. Cette restriction peut entra&icirc;ner des difficult&eacute;s avec certaines fonctionnalit&eacute;s.';
$lang['unlimited'] = 'Illimit&eacute;';
$lang['test_open_basedir_session_save_path'] = 'La restriction sp&eacute;cifi&eacute;e par open_basedir est activ&eacute;e. Si vous avez des probl&egrave;mes avec SESSION et que ini_set fonctionne, vous pouvez essayer d&#039;activer les sessions par cookies en ajoutant : ini_set (\&#039;session.use_only_cookies\&#039;, 1); en haut de la page include.php';
$lang['install_warn_db_createtables'] = 'Normalement, ce champ doit rester coch&eacute;.<br /> Soyez prudent lors de la d&eacute;sactivation de cette fonctionnalit&eacute;';
$lang['install_admin_tablesnotcreated'] = 'Processus termin&eacute;. Le processus d&#039;installation est termin&eacute;, &agrave; votre demande les tables de la base de donn&eacute;es n&#039;ont pas &eacute;t&eacute; cr&eacute;&eacute;s. Cependant, le fichier de configuration a &eacute;t&eacute; r&eacute;initialis&eacute; et tous les tests de pr&eacute;-installation sont pass&eacute;s. Merci, et voici&nbsp;';
$lang['info_create_dir_and_file'] = 'Le processus HTTP du propri&eacute;taire ne peut cr&eacute;er un fichier dans un dossier du CMS. Cela signifie probablement que le safe_mode est activ&eacute;. De nombreuses fonctions de CMS Made Simple&trade; ne fonctionneront donc pas correctement. Impossible de continuer.';
$lang['test_create_dir_and_file'] = 'V&eacute;rification si le processus httpd peut cr&eacute;er un fichier dans un nouveau dossier.';
$lang['cms_site'] = 'le site CMS Made Simple&trade;';
$lang['or_greater'] = 'Ou plus';
$lang['sitename'] = 'Nom du site';
$lang['warning_safe_mode'] = '<strong><em>ATTENTION :</em></strong>Le PHP safe_mode est activ&eacute;. Cela causera des difficult&eacute;s avec les fichiers t&eacute;l&eacute;charg&eacute;s via l&#039;interface de navigation Web, y compris les images, les th&egrave;mes et la gestion des modules XML. Vous &ecirc;tes invit&eacute; &agrave; prendre contact avec votre h&eacute;bergeur pour le consulter afin de d&eacute;sactiver le safe_mode.';
$lang['test'] = 'Test&nbsp;';
$lang['results'] = 'R&eacute;sultats';
$lang['untested'] = 'Non test&eacute;';
$lang['owner'] = 'Propri&eacute;taire&nbsp;';
$lang['permissions'] = 'Permissions&nbsp;';
$lang['off'] = 'Faux';
$lang['on'] = 'Bon';
$lang['permission_information'] = 'Informations sur les Permissions';
$lang['server_os'] = 'Syst&egrave;me d&#039;exploitation serveur';
$lang['server_api'] = 'API serveur';
$lang['server_software'] = 'Version software du serveur';
$lang['server_information'] = 'Informations serveur';
$lang['session_save_path'] = 'Chemin du dossier Session';
$lang['max_execution_time'] = 'Temps Maximum d&#039;&eacute;xecution';
$lang['gd_version'] = 'Version GD ';
$lang['upload_max_filesize'] = 'Taille maximum pour l&#039;Upload';
$lang['post_max_size'] = 'Taille maximum par m&eacute;thode POST';
$lang['memory_limit'] = 'PHP memory_limit';
$lang['server_db_type'] = 'Serveur de base de donn&eacute;es';
$lang['server_db_version'] = 'Version du serveur de base de donn&eacute;es';
$lang['phpversion'] = 'Version PHP actuelle';
$lang['safe_mode'] = 'safe_mode PHP';
$lang['php_information'] = 'Informations PHP';
$lang['cms_install_information'] = 'Informations d&#039;Installation du CMS';
$lang['cms_version'] = 'Version de CMS ';
$lang['systeminfo_copy_paste'] = 'Merci de faire un copier coller de cette s&eacute;lection dans le post du forum';
$lang['help_systeminformation'] = 'Les informations affich&eacute;es ci-dessous sont collect&eacute;es depuis diff&eacute;rents endroits, et permettent d&#039;informer pour un diagnostic ou une aide sur l&#039;installation de CMS Made Simple&trade;.';
$lang['systeminfo'] = 'Informations syst&egrave;me';
$lang['systeminfodescription'] = 'Affiche diff&eacute;rentes informations sur votre syst&egrave;me pour aider &agrave; diagnostiquer des probl&egrave;mes.';
$lang['error'] = 'Erreur';
$lang['new_version_available'] = '<em>Remarque :</em> une nouvelle version de CMS Made Simple&trade; est disponible. Informez-en votre administrateur.';
$lang['info_urlcheckversion'] = 'Si cette URL utilise le mot &quot;none&quot;, aucun contr&ocirc;le ne sera effectu&eacute;.<br/>Une cha&icirc;ne vide utilisera l&#039;URL par d&eacute;faut.';
$lang['urlcheckversion'] = 'V&eacute;rifier les nouvelles versions CMS &agrave; l&#039;aide de cette URL&nbsp;';
$lang['read'] = 'Lecture';
$lang['write'] = 'Ecriture';
$lang['execute'] = 'Ex&eacute;cution';
$lang['group'] = 'Groupe&nbsp;';
$lang['other'] = 'Autres&nbsp;';
$lang['global_umask'] = 'Masque de cr&eacute;ation de fichier (umask)&nbsp;';
$lang['errorcantcreatefile'] = 'Impossible de cr&eacute;er un fichier (probl&egrave;me de permissions ?)';
$lang['add'] = 'Ajouter';
$lang['about'] = 'A propos';
$lang['action'] = 'Action&nbsp;';
$lang['actionstatus'] = 'Action/Statut';
$lang['active'] = 'Actif';
$lang['cantremove'] = 'Suppression impossible';
$lang['changepermissions'] = 'Changement de permissions';
$lang['changepermissionsconfirm'] = 'Utiliser avec pr&eacute;caution\n\nCette action veillera &agrave; ce que tous les fichiers qui composent le module soit en &eacute;criture sur le serveur web.\n&Ecirc;tes vous s&ucirc;r(e) de vouloir continuer ?';
$lang['success'] = 'Cr&eacute;ation r&eacute;ussie&nbsp;';
$lang['advanced'] = 'Avanc&eacute;';
$lang['back'] = 'Retour au menu';
$lang['cancel'] = 'Annuler';
$lang['cantchmodfiles'] = 'Impossible de changer les permissions de certains fichiers';
$lang['cantremovefiles'] = 'Probl&egrave;me de suppression de fichier (permissions ?)';
$lang['create'] = 'Cr&eacute;er';
$lang['database'] = 'Base de donn&eacute;es';
$lang['databaseprefix'] = 'Pr&eacute;fixe des tables de Base de donn&eacute;es';
$lang['databasetype'] = 'Type de base de donn&eacute;es&nbsp;';
$lang['date'] = 'Date&nbsp;';
$lang['default'] = 'D&eacute;faut';
$lang['delete'] = 'Supprimer';
$lang['deleteconfirm'] = '&Ecirc;tes-vous s&ucirc;r(e) de vouloir supprimer - %s - ?';
$lang['description'] = 'Description&nbsp;';
$lang['directoryexists'] = 'Ce dossier existe d&eacute;j&agrave;.';
$lang['down'] = 'Bas';
$lang['edit'] = 'Editer';
$lang['email'] = 'Addresse de courriel';
$lang['errordeletingfile'] = 'Impossible de supprimer le fichier. (probl&egrave;me de permissions ?)';
$lang['errordirectorynotwritable'] = 'Aucune autorisation d&#039;&eacute;crire dans le dossier. Cela pourrait &ecirc;tre caus&eacute; par les permissions de fichiers. Le safe_mode de PHP peut causer des difficult&eacute;s.';
$lang['cachenotwritable'] = 'Le dossier /tmp/cache n&#039;a pas de permissions en &eacute;criture. L&#039;effacement du cache ne fonctionnera pas. Mettre Le dossier /tmp/cache avec des droits de lecture/&eacute;criture/ex&eacute;cution (chmod 777 ou 755 ou 775 suivant h&eacute;bergement). Il est &eacute;galement possible de d&eacute;sactiver le safe_mode.';
$lang['modulesnotwritable'] = 'Le dossier /modules n&#039;a pas de permissions en &eacute;criture. Si vous souhaitez installer des modules en t&eacute;l&eacute;chargeant un fichier XML, vous devez donner au dossier /modules des droits de lecture/ &eacute;criture/ex&eacute;cution (chmod 777 ou 755 ou 775 suivant h&eacute;bergement). Le safe_mode de PHP peut causer des difficult&eacute;s.';
$lang['false'] = 'Faux';
$lang['settrue'] = 'Mettre &agrave; Vrai';
$lang['filename'] = 'Nom du fichier';
$lang['filesize'] = 'Taille du fichier';
$lang['help'] = 'Aide';
$lang['language'] = 'Langue';
$lang['lastname'] = 'Nom';
$lang['name'] = 'Nom';
$lang['password'] = 'Mot de passe';
$lang['passwordagain'] = 'Mot de passe (encore)';
$lang['remove'] = 'Supprimer';
$lang['saveconfig'] = 'Sauver la Configuration';
$lang['true'] = 'Vrai';
$lang['setfalse'] = 'Mettre &agrave; Faux';
$lang['type'] = 'Type&nbsp;';
$lang['typenotvalid'] = 'Type non valide';
$lang['unknown'] = 'Inconnu';
$lang['user'] = 'Utilisateur';
$lang['userdefinedtags'] = 'Balises Utilisateurs';
$lang['usermanagement'] = 'Management Utilisateurs';
$lang['username'] = 'Nom d&#039;utilisateur ';
$lang['usernameincorrect'] = 'Nom d&#039;utilisateur ou mot de passe incorrect';
$lang['version'] = 'Version&nbsp;';
$lang['install_title'] = 'Installation de CMS Made Simple&trade; (&eacute;tape %s)';
$lang['install_system'] = 'Installation du Syst&egrave;me';
$lang['install_thanks'] = 'Merci pour l&#039;installation de CMS Made Simple&trade;';
$lang['upgrade_title'] = 'CMS Made Simple&trade; mise &agrave; niveau (&eacute;tape %s)';
$lang['upgrade_system'] = 'Mise &agrave; niveau du syst&egrave;me';
$lang['upgrade_thanks'] = 'Merci pour la mise &agrave; niveau de CMS Made Simple&trade; vers';
$lang['install_please_read'] = 'Merci de lire <a rel="external" href="http://wiki.cmsmadesimple.org/index.php/User_Handbook/Installation/Troubleshooting/fr">R&eacute;solution de probl&egrave;mes durant l&#039;installation</a> du Wiki de CMS Made Simple&trade;.';
$lang['install_checking'] = 'V&eacute;rification des permissions et de la configuration PHP';
$lang['install_test'] = 'Test&nbsp;';
$lang['install_result'] = 'R&eacute;sultat';
$lang['install_required_settings'] = 'Pr&eacute;requis';
$lang['install_recommended_settings'] = 'Configuration recommand&eacute;e';
$lang['install_you_have'] = 'Vous avez&nbsp;';
$lang['install_legend'] = 'L&eacute;gende';
$lang['install_symbol'] = 'Symbole';
$lang['install_definition'] = 'D&eacute;finition';
$lang['install_value_passed'] = 'Un test requis pass&eacute;';
$lang['install_value_failed'] = 'Un test requis a &eacute;chou&eacute;';
$lang['install_error_fragment'] = 'Informations de d&eacute;pannage pour l&#039;installation';
$lang['install_value_required'] = 'Configuration au-dessous d&#039;une valeur minimum exig&eacute;e';
$lang['install_value_recommended'] = 'Configuration au-dessus de la valeur exig&eacute;e, mais au-dessous de la valeur recommand&eacute;e<br />ou... Des possibilit&eacute;s qui <em>peuvent</em> &ecirc;tre exig&eacute;es pour une certaine fonctionnalit&eacute; facultative sont indisponibles';
$lang['install_value_exceed'] = 'Configuration OK ou sup&eacute;rieure au seuil recommand&eacute;<br />ou... Des possibilit&eacute;s, qui peuvent &ecirc;tre <em>exig&eacute;es</em> pour une certaine fonctionnalit&eacute; facultative, sont disponibles';
$lang['install_test_failed'] = 'Un ou plusieurs essais ont &eacute;chou&eacute; ou sont en alerte. Vous pouvez installer le syst&egrave;me mais quelques fonctions peuvent ne pas fonctionner correctement.<br />Refaire un essai pour corriger la situation et cliquer sur &quot;Nouvel essai&quot;, ou sur le bouton &quot;Continuer&quot; si les valeurs sont au minimum recommand&eacute;.';
$lang['install_test_passed'] = 'Tous les essais sont pass&eacute;s (au moins &agrave; un niveau minimum). Veuillez cliquer sur le bouton &quot;Continuer&quot;.';
$lang['install_failed_again'] = 'Un ou plusieurs essais ont &eacute;chou&eacute;. Veuillez corriger le probl&egrave;me et cliquez le bouton ci-dessous pour rev&eacute;rifier.';
$lang['install_try_again'] = 'Nouvel essai';
$lang['install_continue'] = 'Continuer';
$lang['failure'] = 'Echec';
$lang['caution'] = 'Attention';
$lang['install_admin_umask'] = 'Test masque de cr&eacute;ation de fichier';
$lang['install_test_umask'] = 'Cliquez sur le bouton Test pour v&eacute;rifier';
$lang['test_umask_text'] = 'Umask (abr&eacute;viation de : user file creation mode mask) est une fonction de l&#039;environnement POSIX qui affecte les nouveaux fichiers et dossiers cr&eacute;&eacute;s dans l&#039;h&eacute;bergement. Il contr&ocirc;le les permissions de fichier pour tout fichier ou dossier nouvellement cr&eacute;&eacute;.';
$lang['test_check_umask'] = 'R&eacute;sultat du test sur le fichier cr&eacute;&eacute;&nbsp;';
$lang['test_umask_not_given'] = 'Umask Non donn&eacute;';
$lang['test_check_umask_failed'] = 'Test Umask d&eacute;faillant';
$lang['test_username_not_given'] = 'Nom d&#039;utilisateur non renseign&eacute; !';
$lang['test_username_illegal'] = 'Le nom d&#039;utilisateur contient des caract&egrave;res invalides !';
$lang['test_not_both_passwd'] = 'Merci de renseigner les 2 champs &quot;mot de passe&quot; !';
$lang['test_passwd_not_match'] = 'Mots de passe diff&eacute;rents !';
$lang['test_email_accountinfo'] = 'Email information selectionn&eacute;, mais aucune adresse email renseign&eacute;e';
$lang['test_database_prefix'] = 'Le pr&eacute;fixe des tables de Base de donn&eacute;es contient des caract&egrave;res invalides !';
$lang['test_no_dbms'] = 'Aucun dbms s&eacute;lection&eacute; !';
$lang['test_could_not_connect_db'] = 'Impossible de se connecter &agrave; la base de donn&eacute;es. V&eacute;rifier que le Nom d&#039;utilisateur et/ou le mot de passe sont corrects, et que les acc&egrave;s sont autoris&eacute;s pour l&#039;utilisateur.';
$lang['test_could_not_drop_table'] = 'DROP TABLE impossible. V&eacute;rifier que l&#039;utilisateur soit autoris&eacute; pour DROP TABLE.';
$lang['test_could_not_create_table'] = 'Impossible de cr&eacute;er une table. V&eacute;rifier que l&#039;utilisateur soit autoris&eacute; &agrave; la cr&eacute;ation des tables.';
$lang['test_check_php'] = 'V&eacute;rification version PHP %s+';
$lang['test_min_recommend'] = '(mini %s, recommand&eacute; %s ou plus)';
$lang['test_min_recommend_plus'] = '(mini %s, recommand&eacute;; %s+)';
$lang['test_requires_php_version'] = 'CMS Made Simple&trade; a besoin de la version PHP 5.2.4 ou plus (vous avez %s), mais PHP %s ou plus est recommand&eacute; pour des probl&egrave;mes de compatibilit&eacute; avec les modules tierces parties';
$lang['test_check_md5_func'] = 'V&eacute;rification de la fonction md5';
$lang['test_check_safe_mode'] = 'V&eacute;rification de PHP safe_mode';
$lang['test_check_safe_mode_failed'] = 'le safe_mode de PHP peut causer des difficult&eacute;s avec les fichiers upload&eacute;s et pour d&#039;autres fonctions. Tout d&eacute;pend de la fa&ccedil;on dont le serveur est configur&eacute;.';
$lang['test_check_tokenizer'] = 'V&eacute;rification des fonctions Tokenizer';
$lang['test_check_tokenizer_failed'] = 'Ne pas utiliser les fonctions tokenizer pourraient faire en sorte de rendre les pages blanches. Nous vous recommandons leur installation.';
$lang['test_check_gd'] = 'V&eacute;rification de version de la librairie GD';
$lang['test_check_gd_failed'] = 'La librairie GD est obligatoire pour certains modules et fonctionnalit&eacute;s.';
$lang['test_check_write'] = 'V&eacute;rification des permissions en &eacute;criture sur';
$lang['test_may_not_exist'] = 'Ce fichier n&#039;existe peut-&ecirc;tre pas encore. Si c&#039;est le cas, cr&eacute;ez un fichier vide nomm&eacute; &quot;config.php&quot;. Enregistrez-le dans le dossier principal de &quot;CMSMS&trade;&quot;. V&eacute;rifier les permissions de ce fichier (permissions &agrave; 666)';
$lang['could_not_retrieve_a_value'] = 'Valeur non trouv&eacute;e... On passe...&nbsp;';
$lang['displaying_the_value_originally'] = '<br />Affiche la valeur originelle contenue dans le fichier de configuration (Peut ne pas &ecirc;tre correct).';
$lang['test_check_xml_func'] = 'V&eacute;rification du support basic XML (expat)';
$lang['test_check_xml_failed'] = 'le support XML n&#039;est pas compil&eacute; dans votre installation PHP. Vous pouvez toujours utiliser le syst&egrave;me, mais ne serez pas en mesure d&#039;utiliser les fonctions du Gestionnaire de Modules.';
$lang['test_allow_url_fopen_failed'] = 'Quand l&#039;autorisation &quot;url fopen&quot; est d&eacute;sactiv&eacute;e, vous ne serez pas en mesure d&#039;acc&eacute;der aux URL de fichiers en utilisant le protocole ftp ou http. ';
$lang['test_remote_url'] = 'Test URL &agrave; distance';
$lang['test_remote_url_failed'] = 'Vous ne serez probablement pas en mesure d&#039;ouvrir un fichier sur un serveur web distant.';
$lang['connection_error'] = 'Les connexions http sortantes ne semblent pas fonctionner ! Un pare-feu ou un contr&ocirc;le d&#039;acc&egrave;s bloquerait les connexions externes ? Cela donnera un d&eacute;faut dans le module ModuleManager (Gestionnaire de Modules), et peut-&ecirc;tre dans d&#039;autres fonctions.';
$lang['remote_connection_timeout'] = 'D&eacute;lai de connexion &eacute;coul&eacute; !';
$lang['search_string_find'] = 'Connection Ok !';
$lang['connection_failed'] = 'Erreur de connection !';
$lang['remote_response_ok'] = 'R&eacute;ponse protocole Remote : Ok';
$lang['remote_response_404'] = 'R&eacute;ponse protocole Remote : Non trouv&eacute;e !';
$lang['remote_response_error'] = 'R&eacute;ponse protocole Remote : Erreur !';
$lang['test_check_file_upload'] = 'V&eacute;rification d&#039;uploads de fichiers';
$lang['test_check_file_failed'] = 'Lorsque les uploads de fichiers sont d&eacute;sactiv&eacute;s, vous ne serez pas en mesure d&#039;utiliser les possibilit&eacute;s d&#039;uploader des fichiers incluses dans CMS Made Simple&trade;. Dans la mesure du possible, cette restriction devrait &ecirc;tre lev&eacute;e par votre administrateur syst&egrave;me afin d&#039;utiliser correctement toutes les fonctionnalit&eacute;s de gestion de fichiers du syst&egrave;me. Proc&eacute;dez avec prudence.';
$lang['test_check_memory'] = 'V&eacute;rification de PHP memory_limit';
$lang['test_check_memory_failed'] = 'Vous pouvez ne pas avoir assez de m&eacute;moire pour utiliser CMSMS&trade; correctement, ou avec tous vos modules d&eacute;sir&eacute;s. Si possible, essayer d&#039;augmenter cette valeur en liaison avec votre h&eacute;bergeur. Proc&eacute;dez avec prudence.';
$lang['test_check_time_limit'] = 'V&eacute;rification de PHP max_execution_time (secondes)<br />';
$lang['test_check_time_limit_failed'] = 'Nombre de secondes allou&eacute;es pour ex&eacute;cuter un script. Si cela est atteint, le script renvoie une erreur fatale.';
$lang['test_check_post_max'] = 'V&eacute;rification de post_max_size';
$lang['test_check_post_max_failed'] = 'Vous ne serez probablement pas en mesure d&#039;utiliser des donn&eacute;es plus grandes. Attention &agrave; cette restriction.';
$lang['test_check_upload_max'] = 'V&eacute;rification de upload_max_filesize';
$lang['test_check_upload_max_failed'] = 'Vous ne sera probablement pas en mesure d&#039;uploader (de plus gros) fichiers avec les fonctions de gestion de fichiers. Attention &agrave; cette restriction.';
$lang['test_check_writable'] = 'V&eacute;rification des permissions d&#039;&eacute;criture sur %s';
$lang['test_check_upload_failed'] = 'le dossier /uploads n&#039;a pas les permissions en &eacute;criture. Vous pouvez toujours installer le syst&egrave;me, mais vous ne serez pas en mesure de transf&eacute;rer des fichiers via le panneau d&#039;administration.';
$lang['test_check_images_failed'] = 'Le dossier /images n&#039;a pas les permissions en &eacute;criture.  Vous pouvez toujours installer le syst&egrave;me, mais vous ne serez pas en mesure de transf&eacute;rer des images via le panneau d&#039;administration.';
$lang['test_check_modules_failed'] = 'Le dossier /modules n&#039;a pas les permissions en &eacute;criture. Vous pouvez toujours installer le syst&egrave;me, mais vous ne serez pas en mesure d&#039;installer des modules via le panneau d&#039;administration.';
$lang['test_check_file_get_contents'] = 'V&eacute;rification de file_get_contents';
$lang['test_check_file_get_contents_failed'] = 'Vous ne sera probablement pas en mesure d&#039;utiliser l&#039;une des fonctionnalit&eacute;s qui utilise cette fonction.';
$lang['test_check_session_save_path'] = 'V&eacute;rification des permissions d&#039;&eacute;criture sur session.save_path';
$lang['test_empty_session_save_path'] = 'Votre session.save_path est vide. PHP utilisera le dossier temporaire de votre syst&egrave;me d&#039;exploitation. Si vous avez des probl&egrave;mes de SESSION et que ini_set fonctionne, vous pouvez essayer d&#039;activer la session de cookies en ajoutant : ini_set(&#039;session.use_only_cookies&#039;, 1); en haut du fichier config.php';
$lang['test_check_session_save_path_failed'] = 'Votre session.save_path est &quot;%s&quot;. Le fait qu&#039;il ne soit pas inscriptible pourrait emp&ecirc;cher la connexion au panneau d&#039;administration. Vous devriez essayer de rendre ce chemin inscriptible si vous avez des probl&egrave;mes &agrave; vous connecter au panneau d&#039;administration. Ce test pourrait &eacute;chouer si safe_mode est activ&eacute; (voir plus bas).';
$lang['test_check_ini_set'] = 'V&eacute;rification si ini_set fonctionne';
$lang['test_check_ini_set_failed'] = 'Bien que la capacit&eacute; de passer outre les param&egrave;tres de php ini n&#039;est pas obligatoire, certaines fonctionnalit&eacute;s de module (facultatif) utilisent ini_set pour proroger des d&eacute;lais d&#039;expiration, et pour permettre le t&eacute;l&eacute;chargement de fichiers volumineux, etc. Vous pouvez avoir des difficult&eacute;s avec certaines fonctionnalit&eacute;s sans cette possibilit&eacute;. Ce test peut &eacute;chouer si le safe_mode est activ&eacute; (voir ci-dessous).';
$lang['install_admin_header'] = 'Information sur le compte administrateur';
$lang['install_admin_info'] = 'Choisissez le nom d&#039;utilisateur, le mot de passe et l&#039;adresse email pour votre compte d&#039;administration. Veuillez vous assurer que vous enregistrez ces donn&eacute;es &quot;quelque part&quot;, car elles sont indispensables pour l&#039;acc&egrave;s &agrave; votre syst&egrave;me d&#039;administration de CMS Made Simple.';
$lang['install_admin_email'] = 'Adresse email';
$lang['install_admin_email_info'] = 'Email pour le compte administrateur';
$lang['install_admin_email_note'] = '<strong>Remarque :</strong> Cette notification utilise la fonction PHP Mail. Si vous ne recevez pas cet email, cela peut &ecirc;tre une indication de mauvaise configuration de votre serveur et vous devriez contacter votre h&eacute;bergeur.';
$lang['install_admin_sitename'] = 'C&#039;est le nom de votre site WEB. Il sera employ&eacute; dans divers endroits des gabarits par d&eacute;faut et peut &ecirc;tre employ&eacute; n&#039;importe o&ugrave; avec la Balise (Tag) {sitename}.';
$lang['install_admin_db'] = 'Information sur la base de donn&eacute;es';
$lang['install_admin_db_info'] = '<p><strong>Connectez-vous &agrave; MySQL depuis une console puis tapez les commandes suivantes :</strong><br />
- create database cms; 
(Utiliser le nom que vous voulez, sauf contrainte h&eacute;bergeur, mais retenez le nom exact)<br />
- grant all privileges on cms.* to cms_user@localhost identified by &#039;cms_pass&#039;;<br />
</p>
<p><strong>Ou utiliser un programme comme PhpMyAdmin ou le panneau d&#039;administration de votre compte.</strong></p>';
$lang['install_admin_follow'] = 'Merci de compl&eacute;ter les champs suivants&nbsp;';
$lang['install_admin_db_type'] = 'Type de base de donn&eacute;es';
$lang['install_admin_no_db'] = 'Il n&#039;existe pas de drivers de base de donn&eacute;es valide compil&eacute;e dans votre installation de PHP. Merci de confirmer que vous avez mysql, mysqli, et/ou postgres7 d&#039;install&eacute;, et essayez &agrave; nouveau.';
$lang['install_admin_db_host'] = 'Adresse du serveur de base de donn&eacute;es';
$lang['install_admin_db_name'] = 'Nom de la base de donn&eacute;es';
$lang['install_admin_db_create'] = 'Cr&eacute;ation des tables - Ne pas cocher si mise &agrave; niveau <br />(Attention : suppression des donn&eacute;es existantes)';
$lang['install_admin_db_prefix'] = 'Pr&eacute;fixe des tables';
$lang['install_admin_db_sample'] = 'Installer les exemples de contenus et les gabarits';
$lang['retry'] = 'Nouvel essai';
$lang['install_admin_db_create_seq'] = 'Cr&eacute;ation %s s&eacute;quences des tables ...&nbsp;';
$lang['install_admin_importing'] = 'Import des exemples de donn&eacute;es ...&nbsp;';
$lang['invalid_query'] = 'Requ&ecirc;te invalide : %s';
$lang['install_creating_table'] = '<p>Cr&eacute;ation table %s ... [%s]</p>';
$lang['install_creating_index'] = '<p>Cr&eacute;ation index de table %s  ... [%s]</p>';
$lang['done'] = 'fait';
$lang['failed'] = '&eacute;chec';
$lang['install_admin_error_schema'] = 'Erreur dans le sch&eacute;ma SQL';
$lang['install_admin_set_account'] = 'Configuration des informations administration ...&nbsp;';
$lang['install_admin_set_sitename'] = 'Configuration du nom de votre site ...&nbsp;';
$lang['install_admin_setup'] = 'Continuons maintenant avec l&#039;installation de votre fichier de configuration, nous avons presque toutes les donn&eacute;es dont nous avons besoin. Quand vous &ecirc;tes pr&ecirc;t(e), cliquez sur le bouton Continuer.';
$lang['install_admin_docroot'] = 'La racine du CMS (adresse du site web)';
$lang['install_admin_docroot_path'] = 'Chemin de la racine du CMS';
$lang['install_admin_querystring'] = 'Symbole apr&egrave;s &quot;index.php?&quot; (exemple. http://www.monsite.fr/index.php?page=xxx ). Laissez tel quel et &eacute;ventuellement &eacute;ditez le fichier config.php &agrave; la main';
$lang['invalid_querys'] = '<b>ATTENTION</b> : requ&ecirc;te invalide sur la base de donn&eacute;es !';
$lang['install_admin_sitedown'] = 'Erreur : Impossible de supprimer le fichier tmp/cache/SITEDOWN. Merci de le supprimer manuellement.';
$lang['install_admin_update_hierarchy'] = 'Mise &agrave; jour de la hi&eacute;rarchie ...&nbsp;';
$lang['install_admin_set_core_event'] = 'Configuration du noyau CMS Made Simple ...&nbsp;';
$lang['install_admin_install_modules'] = 'Installation des modules ...&nbsp;';
$lang['install_admin_index_search'] = 'Recherche de l&#039;index...&nbsp;';
$lang['install_admin_clear_cache'] = 'Effacement du cache (si besoin) ...&nbsp;';
$lang['install_admin_emailing'] = 'Mail d&#039;information sur le compte Administrateur cr&eacute;&eacute; ...&nbsp;';
$lang['install_admin_congratulations'] = 'Merci pour l&#039;installation de CMS Made Simple, la configuration est termin&eacute;e - Se connecter sur&nbsp; ';
$lang['could_not_connect_db'] = 'Impossible de se connecter &agrave; la base de donn&eacute;es. V&eacute;rifiez que le nom d&#039;utilisateur et/ou le mot de passe sont correct, et que les acc&egrave;s sont autoris&eacute;s pour l&#039;utilisateur.';
$lang['cannot_write_config'] = 'Erreur : Impossible d&#039;&eacute;crire sur %s.';
$lang['email_accountinfo_subject'] = 'CMS Made Simple&trade; - Information sur le compte administrateur';
$lang['email_accountinfo_message'] = 'Merci d&#039;avoir install&eacute; CMS Made Simple&trade;.

Vos informations sur le nouveau compte Administrateur :
Nom utilisateur : %s
Mot de passe : %s

Se connecter &agrave; l&#039;administration : %s';
$lang['utma'] = '156861353.948801647.1310372010.1310372010.1310372010.1';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1310372010.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['utmb'] = '156861353';
?>