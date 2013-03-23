<?php
$lang['detected'] = 'Detected';
$lang['docroot_leaveblank'] = 'J&auml;t&auml; t&auml;m&auml; tyhj&auml;ksi jos haluat k&auml;ytt&auml;&auml; systeemin oletusta';
$lang['test_xmlreader_class'] = 'Checking if the XMLReader class exists';
$lang['test_xmlreader_failed'] = 'The XMLReader class is not enabled in your php install.  You can still use the system but will not be able to use any of the remote module installation functions.';
$lang['test_check_xml_failed'] = 'XML-tukea ei ole k&auml;&auml;nnetty PHP-asennukseesi. Voit k&auml;ytt&auml;&auml; j&auml;rjestelm&auml;&auml; ilman XML-tukea, mutta moduuleiden asennus module managerilla ei ole k&auml;ytett&auml;viss&auml; ja XML-toiminnallisuudet ovat rajatumpia.';
$lang['installed_module'] = 'Moduuli asennettu';
$lang['automatedtask_success'] = 'Automated Task Succeeded';
$lang['ip_addr'] = 'IP osoite';
$lang['install_admin_pwsalt_note'] = 'If you choose to enable password salts, there is absolutely no way to reset lost admin passwords, other than through the lost password functionality.   It is critical that you associate an email address with each admin account';
$lang['admin_salt'] = 'Salt Admin Passwords';
$lang['setup_flat_urls'] = 'Litte&auml;t URL-osoitteet ovat asetettu';
$lang['install_timezone'] = 'Jotkin palvelimet joilla on php 5.3 k&auml;yt&ouml;ss&auml;, eiv&auml;t ole asettaneet aikavy&ouml;hykett&auml; oikein.  Ole hyv&auml; ja valitse mielest&auml;si sopivin aikavy&ouml;hyke.  Mik&auml;li t&auml;m&auml; ei ole tarpeellista palvelimellasi, voit valita &amp;quot;Ei mit&auml;&auml;n&amp;quot;. Halutessasi voit vaihtaa t&auml;t&auml; asetusta config.php:sta.';
$lang['timezone'] = 'Aikavy&ouml;hyke';
$lang['none'] = 'Ei mit&auml;&auml;n';
$lang['test_error_estrict'] = 'Testataan error_reporting varmistaaksemme, ett&auml; E_STRICT on pois p&auml;&auml;lt&auml;';
$lang['test_estrict_failed'] = 'E_STRICT on p&auml;&auml;ll&auml;';
$lang['info_estrict_failed'] = 'Osa kirjastoista, joita CMSMS k&auml;ytt&auml;&auml; eiv&auml;t toimi hyvin E_STRICT:n kanssa.  Ole hyv&auml; ja ota se pois k&auml;yt&ouml;st&auml; ennen jatkamista';
$lang['test_error_edeprecated'] = 'Testataan error_reporting varmistaaksemme, ett&auml; E_DEPRECATED on pois p&auml;&auml;lt&auml;';
$lang['test_edeprecated_failed'] = 'E_DEPRECATED on p&auml;&auml;ll&auml;';
$lang['info_edeprecated_failed'] = 'Jos E_DEPRECATED on p&auml;&auml;ll&auml; virheilmoituksissa, k&auml;ytt&auml;j&auml;si n&auml;kev&auml;t paljon virheilmoituksia, jotka voivat vaikuttaa sivuston ulkoasuun ja toiminnallsuuteen.';
$lang['invalidemail'] = 'Annettu s&auml;hk&ouml;postiosoite on virheellinen';
$lang['empty_query'] = 'Tyhj&auml; pyynt&ouml;?? %s';
$lang['no_db_driver'] = 'Yhteensopivia tietokanta-ajureita ei l&ouml;ytynyt';
$lang['test_check_output_buffering'] = 'Tarkistetaan ulosannin puskurointia';
$lang['test_check_output_buffering_failed'] = 'Ulosannin puskurointi on pois p&auml;&auml;lt&auml;. Et todenn&auml;k&ouml;isesti voi k&auml;ytt&auml;&auml; toiminnallisuuksia, jotka vaativat t&auml;t&auml;';
$lang['phpinfo'] = 'N&auml;yt&auml; PHP-tiedot';
$lang['mod_security'] = 'Apachen Mod Security';
$lang['test_check_tempnam'] = 'Tarkistetaan tempnam-funktiota';
$lang['test_check_db_drivers'] = 'Tietokanta-ajurit';
$lang['test_check_db_drivers_failed'] = 'Tietokanta-ajureita ei l&ouml;ytynyt';
$lang['test_check_register_globals'] = 'Tarkistetaan PHP register globals';
$lang['test_check_register_globals_failed'] = 'PHP register globals on p&auml;&auml;ll&auml;. Turvallisuussyist&auml; se tulisi ottaa pois p&auml;&auml;lt&auml;.';
$lang['test_check_disable_functions'] = 'Tarkistetaan PHP disable -funktiot';
$lang['test_check_disable_functions_failed'] = 'Varoitus: t&auml;m&auml; on lista funktioita, jotka ovat pois p&auml;&auml;lt&auml; palvelimellasi.';
$lang['install_admin_db_port'] = 'Tietokantaportti';
$lang['install_admin_db_port_info'] = 'Jos et tied&auml; t&auml;t&auml;, j&auml;t&auml; se tyhj&auml;ksi. Siin&auml; tapauksessa k&auml;ytet&auml;&auml;n oletusarvoa.';
$lang['install_admin_db_socket'] = 'Tietokannan socket';
$lang['install_admin_db_socket_info'] = 'EI TUETTU.';
$lang['install_admin_frontendlang'] = 'Oletuskieli julkiselle sivustolle. T&auml;m&auml; s&auml;&auml;t&auml;&auml; oletus kieliasetusta, jota k&auml;ytet&auml;&auml;n esimerkiksi p&auml;iv&auml;m&auml;&auml;r&auml;- ja aikamuodoissa yms.';
$lang['install_default_encoding'] = 'L&auml;hes kaikissa tapauksissa, oletuksena tulisi olla utf-8.';
$lang['installer_done'] = '[valmis]';
$lang['installer_failed'] = '[ep&auml;onnistui]';
$lang['create_permission'] = 'Luo oikeudet ...';
$lang['add_column_sql'] = 'Lis&auml;t&auml;&auml;n sarake %s tauluun ...';
$lang['update_table_sql'] = 'P&auml;ivitet&auml;&auml;n taulu %s ...';
$lang['installing_module'] = 'Asennetaan moduuli %s ...';
$lang['updating_schema_version'] = 'P&auml;ivitet&auml;&auml;n skeeman versio %s ...';
$lang['upgrade_config'] = 'P&auml;ivitet&auml;&auml;n config.php';
$lang['upgrade_config_info'] = 'konfiguraation p&auml;ivitys';
$lang['upgrade_failed_again'] = 'Yksi tai useampi p&auml;ivitys ep&auml;onnistui. Ole hyv&auml;, korjaa virheet ja klikkaa painiketta alapuolella tehd&auml;ksesi tarkistus uudelleen.';
$lang['upgrade_cache_dirs'] = 'Tyhjennet&auml;&auml;n v&auml;limuistihakemistot';
$lang['cannot_clean_cache_dirs'] = 'Ei voida tyhjent&auml;&auml; v&auml;limuistihakemistoja!';
$lang['upgrade_schema'] = 'P&auml;ivitysskeema';
$lang['need_upgrade_schema'] = 'CMS vaatii p&auml;ivityksen.br />Ajat t&auml;ll&auml; hetkell&auml; versiota %s ja sinun t&auml;ytyy p&auml;ivitt&auml;&auml; versioon %s';
$lang['schema_ok'] = 'CMS:n tietokanta on ajantasalla.  K&auml;ytet&auml;&auml;n skeemaversiota %s';
$lang['noneed_upgrade_schema'] = 'CMS:n tietokanta on ajantasalla. K&auml;ytet&auml;&auml;n skeemaversiota %s';
$lang['upgrade_modules'] = 'P&auml;ivit&auml; moduulit';
$lang['noneed_upgrade_modules'] = 'Ydinmoduulit ovat ajantasalla';
$lang['upgrade_sql_module_from_to'] = 'P&auml;ivitet&auml;&auml;n SQL &quot;%s&quot; moduulin versiosta %s versioon %s ...';
$lang['upgrade_event_module_from_to'] = 'P&auml;ivitet&auml;&auml;n tapahtumat &quot;%s&quot; moduulin versiosta %s versioon %s ...';
$lang['sitedown_not_removed'] = 'Ei voitu poistaa tmp/cache/SITEDOWN tiedostoa. Poista tiedosto k&auml;sin tai sivustollasi n&auml;kyy edelleen viesti huoltokatkoksesta.';
$lang['upgrade_ok'] = 'Ole hyv&auml; ja tarkista config.php -tiedosto, muokkaa uudet asetukset tarvittaessa ja lukitse tiedosto j&auml;lleen sen j&auml;lkeen. Tarkista my&ouml;s, ett&auml; kaikki moduulisi ovat ajantasalla menem&auml;ll&auml; Lis&auml;osat >> Moduulit sivulle ja tarkista ettei saatavilla ole p&auml;ivityksi&auml;.';
$lang['upgrade_complete'] = 'P&auml;ivitys on valmis';
$lang['upgrade_end'] = 'CMS on ajantasalla. Klikkaa %s siirty&auml;ksesi sivustolle tai voit %s.';
$lang['here'] = 't&auml;st&auml;';
$lang['go_to_admin'] = 'Mene hallintapaneeliin';
$lang['errorfilenot'] = 'Tiedostoa ei l&ouml;ydy!';
$lang['errorfilenotwritable'] = 'Tiedostoon ei voida kirjoittaa!';
$lang['nofiles'] = 'T&auml;t&auml; resurssia ei ole olemassa!';
$lang['is_directory'] = 'T&auml;m&auml; resurssi on hakemisto!';
$lang['is_readable_false'] = 'T&auml;t&auml; resurssia ei voida lukea!';
$lang['checksum_match'] = 'Tarkistesumma t&auml;sm&auml;&auml;!';
$lang['checksum_not_match'] = 'Tarkistasumma ei t&auml;sm&auml;&auml;!';
$lang['not_checksum'] = 'Ei voitu hakea tarkistesummaa!';
$lang['format_datetime'] = '%c';
$lang['upload_err_ini_size'] = 'L&auml;hetetty tiedosto ylitt&auml;&auml; e upload_max_filesize asetuksen php.ini-tiedostossa!';
$lang['upload_err_form_size'] = 'L&auml;hetetty tiedosto ylitt&auml;&auml; MAX_FILE_SIZE asetuksen, joka on m&auml;&auml;ritelty HTML-lomakkeessa.';
$lang['upload_err_partial'] = 'Tiedosto l&auml;hetettiin ainoastaan osittain.';
$lang['upload_err_no_file'] = 'Ei l&auml;hetetty&auml; tiedostoa.';
$lang['upload_err_no_tmp_dir'] = 'V&auml;liaikainen hakemisto puuttuu.';
$lang['upload_err_cant_write'] = 'Levylle kirjoittaminen ep&auml;onnistui.';
$lang['upload_err_extension'] = 'Laajennos keskeytti tiedoston l&auml;hetyksen.';
$lang['upload_err_empty'] = 'Tiedoston koko on nolla';
$lang['upload_err_unknown'] = 'Tuntematon virhe tiedoston l&auml;hetyksess&auml;.';
$lang['function_file_uploads_off'] = 'file_uploads on pois p&auml;&auml;lt&auml; php-asetuksissa!';
$lang['upload_file_no_readable'] = 'L&auml;hetetty&auml; tiedostoa ei voida lukea!';
$lang['upload_file_multiple'] = 'Useamman tiedoston l&auml;hett&auml;minen ei ole sallittua!';
$lang['test_check_magic_quotes_gpc'] = 'Magic quotes Get/Post/Cookie operaatioille';
$lang['test_check_magic_quotes_gpc_failed'] = 'Kun magic_quotes on p&auml;&auml;ll&auml;, kaikki lainausmerkit merkit&auml;&auml;n automaattisesti kauttaviivalla. T&auml;m&auml; voi aiheuttaa ongelmia CMS:ss&auml;.';
$lang['test_check_magic_quotes_runtime'] = 'Magic quotes suoritusaika';
$lang['test_check_magic_quotes_runtime_failed'] = 'KunWhen magic_quotes on p&auml;&auml;ll&auml;, mitk&auml; tahansa funktiot, jotka palauttavat tietoa mist&auml; tahansa ulkoisesta l&auml;hteest&auml; mukaan lukien tietokannat ja tekstitiedostot sis&auml;lt&auml;v&auml;t lainausmerkit merkittyn&auml; kauttaviivoilla. T&auml;m&auml; aiheuttaa ongelmia CMS Made Simplen kanssa.';
$lang['install_admin_checksum'] = 'Tarkista asennuksesi';
$lang['upgrade_admin_checksum'] = 'Tarkista j&auml;rjestelm&auml;si p&auml;ivitys';
$lang['checksum'] = 'Tarkistesumman testaus';
$lang['checksum_file'] = 'Tarkistesummatiedosto';
$lang['install_test_checksum'] = 'Voit tarkistaa CMS:n tiedostojen eheyden vertaamalla niit&auml; alkuper&auml;isiin tiedostoihin. Se voi helpottaa ongelmien l&ouml;yt&auml;misess&auml; tiedostojen l&auml;hetyksess&auml;.';
$lang['checksum_passed'] = 'Kaikki tarkistesummat vastaavat!';
$lang['checksum_failed'] = 'Tarkistesummien tarkistuksesta l&ouml;ytyi virhe. Katso ohjeista lis&auml;tietoa';
$lang['test_check_open_basedir'] = 'Tarkista PHP Open Basedir';
$lang['test_check_open_basedir_failed'] = 'Open basedir rajoitukset ovat p&auml;&auml;ll&auml;. Sinulla voi olla ongelmia joidenkin lis&auml;osien kanssa, kun t&auml;m&auml; rajoitus on olemassa.';
$lang['unlimited'] = 'Rajoittamaton';
$lang['test_open_basedir_session_save_path'] = 'Open basedir restrictions appear to be in effect. If you have SESSION problems and ini_set works, you can try to enable sessions with cookies adding: ini_set(&#039;session.use_only_cookies&#039;, 1);  to top of config.php';
$lang['install_warn_db_createtables'] = 'Normaalisti t&auml;m&auml;n tulisi olla aina p&auml;&auml;ll&auml;. Ole varovainen, jos otat pois p&auml;&auml;lt&auml;.';
$lang['install_admin_tablesnotcreated'] = 'Asennus on valmis. Asennusprosessi on nyt lopussa - pyynn&ouml;st&auml;si tietokantataulut j&auml;tettiin luomatta. Asetustiedosto on kuitenkin alustettu ja kaikki asennuksen vaatimat testit on suoritettu onnistuneesti. Kiitokset, ja t&auml;ss&auml; on sinun ';
$lang['info_create_dir_and_file'] = 'HTTP-prosessin omistaja ei voi luoda tiedostoja hakemistoon, jonka omistaa. T&auml;m&auml; tarkoittaa todenn&auml;k&ouml;isesti sit&auml; ett&auml; php:n &quot;safe mode&quot; on p&auml;&auml;ll&auml;. Monet CMS Made Simplen toiminnot eiv&auml;t toimi safe moden ollessa p&auml;&auml;ll&auml;. Jatkaminen ei ole mahdollista';
$lang['test_create_dir_and_file'] = 'Tarkistetaan voiko httpd-prosessi luoda tiedoston luotuun kansioon';
$lang['cms_site'] = 'CMS-sivusto';
$lang['or_greater'] = 'Tai suurempi';
$lang['sitename'] = 'Sivuston nimi';
$lang['warning_safe_mode'] = '<strong><em>VAROITUS:</em></strong>PHP Safe mode on p&auml;&auml;ll&auml;. T&auml;m&auml; aiheuttaa ongelmia tiedostojen lataamisessa palvelimelle ja rajoittaa kuvien ulkoasujen ja modulien asentamista. Ole hyv&auml; ja ota yhteytt&auml; palvelimen yll&auml;pit&auml;j&auml;&auml;n keskustellaksesi safe moden toiminnoista';
$lang['test'] = 'Testaa';
$lang['results'] = 'Tulokset';
$lang['untested'] = 'Ei testattu';
$lang['owner'] = 'Omistaja';
$lang['permissions'] = 'Oikeudet';
$lang['off'] = 'Pois';
$lang['on'] = 'P&auml;&auml;ll&auml;';
$lang['permission_information'] = 'K&auml;ytt&ouml;oikeustiedot';
$lang['server_os'] = 'Palvelimen k&auml;ytt&ouml;j&auml;rjestelm&auml;';
$lang['server_api'] = 'Palvelimen API';
$lang['server_software'] = 'Palvelimen ohjelmisto';
$lang['server_information'] = 'Palvelimen tiedot';
$lang['session_save_path'] = 'Sessioiden tallennuspolku (session_save_path)';
$lang['max_execution_time'] = 'Maksimisuoritusaika (maximum_execution_time)';
$lang['gd_version'] = 'GD-versio';
$lang['upload_max_filesize'] = 'Maksimikoko ladatuille tiedostoille';
$lang['post_max_size'] = 'Maksimikoko POST-kutsuille';
$lang['memory_limit'] = 'PHP:n muistiraja';
$lang['server_db_type'] = 'Palvelimen tietokanta';
$lang['server_db_version'] = 'Palvelimen tietokantaversio';
$lang['phpversion'] = 'PHP-versio';
$lang['safe_mode'] = 'PHP:n Safe Mode';
$lang['php_information'] = 'PHP:n tiedot';
$lang['cms_install_information'] = 'CMS:n asennustiedot';
$lang['cms_version'] = 'CMS-versio';
$lang['systeminfo_copy_paste'] = 'Liit&auml; valittu teksti foorumiviesteihin ja tukipyynt&ouml;ihin';
$lang['help_systeminformation'] = 'T&auml;m&auml; tieto on ker&auml;tty eri paikoista j&auml;rjestelm&auml;&auml; ja esitet&auml;&auml;n t&auml;ss&auml; yhteenvetona, josta voi helposti etsi&auml; haluamansa tiedon tai k&auml;ytt&auml;&auml; tietoja ongelmien ratkaisuun ja tukipyynt&ouml;jen liitteen&auml;.';
$lang['systeminfo'] = 'J&auml;rjestelm&auml;n tiedot';
$lang['systeminfodescription'] = 'N&auml;yt&auml; tietoja j&auml;rjestelm&auml;st&auml;. Voivat auttaa ongelman ratkaisussa';
$lang['error'] = 'Virhe';
$lang['new_version_available'] = '<em>Huomautus:</em> Uudempi versio CMS Made Simplest&auml; on saatavilla. Ota yhteytt&auml; sivuston yll&auml;pit&auml;j&auml;&auml;n';
$lang['info_urlcheckversion'] = 'Jos t&auml;m&auml; kentt&auml; on &amp;quot;none&amp;quot; tarkistuksia ei tehd&auml;. Tyhj&auml; arvo ottaa k&auml;ytt&ouml;&ouml;n oletus-URL:n';
$lang['urlcheckversion'] = 'Tarkista uusien CMS versioiden saatavuus k&auml;ytt&auml;en t&auml;t&auml; URL:ia';
$lang['read'] = 'Luku';
$lang['write'] = 'Kirjoitus';
$lang['execute'] = 'Suoritus';
$lang['group'] = 'Ryhm&auml;';
$lang['other'] = 'Muut';
$lang['global_umask'] = 'Tiedostojen luontimaski (umask)';
$lang['errorcantcreatefile'] = 'Ei voitu luoda tiedostoa (k&auml;ytt&ouml;oikeusongelma?)';
$lang['add'] = 'Lis&auml;&auml;';
$lang['about'] = 'Tietoja';
$lang['action'] = 'Toiminto';
$lang['actionstatus'] = 'Toiminto / Tila';
$lang['active'] = 'Aktiivinen';
$lang['cantremove'] = 'Ei voi poistaa';
$lang['changepermissions'] = 'Vaihda k&auml;ytt&ouml;oikeudet';
$lang['changepermissionsconfirm'] = 'Varoitus \n\n T&auml;m&auml; toiminto yritt&auml;&auml; vaihtaa kaikkien modulien tiedostooikeuksia niin ett&auml; palvelimella on niihin kirjoitusoikeus. \n Haluatko varmasti jatkaa?';
$lang['success'] = 'Onnistui';
$lang['advanced'] = 'Monipuolinen';
$lang['back'] = 'Takaisin valikkoon';
$lang['cancel'] = 'Peruuta';
$lang['cantchmodfiles'] = 'Ei voitu vaihtaa joidenkin tiedostojen oikeuksia';
$lang['cantremovefiles'] = 'Ei voitu poistaa tiedostoja (k&auml;ytt&ouml;oikeusongelma?)';
$lang['create'] = 'Luo';
$lang['database'] = 'Tietokanta';
$lang['databaseprefix'] = 'Tietokannan etuliite';
$lang['databasetype'] = 'Tietokannan tyyppi';
$lang['date'] = 'P&auml;iv&auml;ys';
$lang['default'] = 'Oletus';
$lang['delete'] = 'Poista';
$lang['deleteconfirm'] = 'Haluatko varmasti poistaa - %s - ?';
$lang['description'] = 'Kuvaus';
$lang['directoryexists'] = 'Hakemisto on jo olemassa';
$lang['down'] = 'Alas';
$lang['edit'] = 'Muokkaa';
$lang['email'] = 'S&auml;hk&ouml;postiosoite';
$lang['errordeletingfile'] = 'Ei voitu poistaa tiedostoa (k&auml;ytt&ouml;oikeusongelma?)';
$lang['errordirectorynotwritable'] = 'Tiedostoon ei ole oikeutta kirjoittaa. T&auml;m&auml; saattaa johtua v&auml;&auml;rist&auml; tiedosto-oikeuksista tai omistajuudesta. Safe mode -rajoitukset voivat my&ouml;s est&auml;&auml; kirjoituksen';
$lang['cachenotwritable'] = 'V&auml;limuistikansioon ei voitu kirjoittaa. V&auml;limuistin tyhjennys ei toimi. Varmista ett&auml; tmp/cache-kansioon on t&auml;ydet luku-/kirjoitus-/suoritusoikeudet (chmod 777). Safe mode saattaa my&ouml;s rajoittaa kansioon kirjoittamista.';
$lang['modulesnotwritable'] = 'Modulikansioon ei voitu kirjoittaa. Jos haluat asentaa moduleita XML-tiedostoista, sinun tulee antaa modules-kansiolle t&auml;ydet luku-/kirjoitus-/suoritusoikeudet (chmod 777). Safe mode saattaa my&ouml;s rajoittaa kansioon kirjoittamista.';
$lang['false'] = 'Ep&auml;tosi';
$lang['settrue'] = 'Aseta todeksi';
$lang['filename'] = 'Tiedostonimi';
$lang['filesize'] = 'Tiedostokoko';
$lang['help'] = 'Apia';
$lang['language'] = 'Kieli';
$lang['lastname'] = 'Sukunimi';
$lang['name'] = 'Nimi';
$lang['password'] = 'Salasana';
$lang['passwordagain'] = 'Salasana (uudestaan)';
$lang['remove'] = 'Poista';
$lang['saveconfig'] = 'Tallenna asetukset';
$lang['true'] = 'Tosi';
$lang['setfalse'] = 'Aseta ep&auml;todeksi';
$lang['type'] = 'Tyyppi';
$lang['typenotvalid'] = 'Tyyppi ei ole validi';
$lang['unknown'] = 'Tuntematon';
$lang['user'] = 'K&auml;ytt&auml;j&auml;';
$lang['userdefinedtags'] = 'K&auml;ytt&auml;j&auml;n m&auml;&auml;rittelem&auml;t tagit';
$lang['usermanagement'] = 'K&auml;ytt&auml;j&auml;hallinta';
$lang['username'] = 'K&auml;ytt&auml;j&auml;tunnus';
$lang['usernameincorrect'] = 'K&auml;ytt&auml;j&auml;tunnus tai salasana on virheellinen';
$lang['version'] = 'Versio';
$lang['install_title'] = 'CMS Made Simple -asennus (kohta %s)';
$lang['install_system'] = 'Asennusj&auml;rjestelm&auml;';
$lang['install_thanks'] = 'Kiitoksia CMS Made Simplen asennuksesta';
$lang['upgrade_title'] = 'CMS Made Simple p&auml;ivitys (askel %s)';
$lang['upgrade_system'] = 'P&auml;ivitysj&auml;rjestelm&auml;';
$lang['upgrade_thanks'] = 'Kiitos CMS Made Simplen p&auml;ivitt&auml;misest&auml; versioon';
$lang['install_please_read'] = 'Ole hyv&auml; ja lue <a href="http://wiki.cmsmadesimple.org/index.php/User_Handbook/Installation/Troubleshooting">asennus (en)</a> -sivu CMS Made Simple Wikist&auml;.';
$lang['install_checking'] = 'Tarkistetaan oikeuksia ja PHP-asetuksia';
$lang['install_test'] = 'Testaa';
$lang['install_result'] = 'Tulokset';
$lang['install_required_settings'] = 'Vaadittu asetus';
$lang['install_recommended_settings'] = 'Suositeltu asetus';
$lang['install_you_have'] = 'Sinulla on';
$lang['install_legend'] = 'Selite';
$lang['install_symbol'] = 'Symboli';
$lang['install_definition'] = 'M&auml;&auml;ritelm&auml;';
$lang['install_value_passed'] = 'Vaadittu testi hyv&auml;ksytty';
$lang['install_value_failed'] = 'Vaadittu testi hyl&auml;tty';
$lang['install_error_fragment'] = 'Tietoa asennuksen mahdollisista ongelmista';
$lang['install_value_required'] = 'Asetus on alle minimiarvon';
$lang['install_value_recommended'] = 'Asetus on yli vaaditun, mutta alle suositellun arvon.<br />tai jokin lis&auml;tieto <em>saattaa</em> olla vaadittu jotain toiminnallisuutta varten';
$lang['install_value_exceed'] = 'Asetus on yli tai juuri suositellun arvon<br />tai jokin lis&auml;tieto <em>saattaa</em> olla vaadittu jotain toiminnallisuutta varten';
$lang['install_test_failed'] = 'Yksi tai useampi testi ep&auml;onnistui. Voit silti asentaa j&auml;rjestelm&auml;n, mutta jotkin toiminnallisuudet eiv&auml;t v&auml;ltt&auml;m&auml;tt&auml; toimi tai voivat toimia huonosti. <br /> yrit&auml; korjata tilanne ja paina &amp;quot;Yrit&auml; uudelleen&amp;quot; tai jatka asennusta';
$lang['install_test_passed'] = 'Kaikki testit onnistuivat (v&auml;hint&auml;&auml;n minimitasolla). Ole hyv&auml; ja jatka';
$lang['install_failed_again'] = 'Yksi tai useampi testi ep&auml;onnistui. Ole hyv&auml; ja korjaa ongelmat ja yrit&auml; uudelleen';
$lang['install_try_again'] = 'Yrit&auml; uudelleen ';
$lang['install_continue'] = 'Jatka';
$lang['failure'] = 'Virhe';
$lang['caution'] = 'Huomautus';
$lang['install_admin_umask'] = 'Testaa luotavan tiedoston k&auml;ytt&ouml;oikeusmaski (umask)';
$lang['install_test_umask'] = 'Paina test-painiketta testataksesi  ..............................';
$lang['test_umask_text'] = 'umask (k&auml;ytt&auml;j&auml;n tiedosto luonti oikeus maski) on POSIX-ymp&auml;rist&ouml;jen toiminto, joka vaikuttaa oletusoikeuksiin uusille tiedostoille ja hakemistoille prosessin aikana. Vaikuttaa siihen mit&auml; tiedosto-oikeuksia ei aseteta uusille tiedostoille';
$lang['test_check_umask'] = 'Tulos testi tiedosto luotu';
$lang['test_umask_not_given'] = 'Umaskia ei ole annettu';
$lang['test_check_umask_failed'] = 'Umask-testi ei onnistunut';
$lang['test_username_not_given'] = 'K&auml;ytt&auml;j&auml;tunnusta ei ole annettu';
$lang['test_username_illegal'] = 'K&auml;ytt&auml;j&auml;tunnus sis&auml;lt&auml;&auml; kiellettyj&auml; merkkej&auml;';
$lang['test_not_both_passwd'] = 'Kumpikin salasanakentt&auml; tulee olla annettu';
$lang['test_passwd_not_match'] = 'Salasanakent&auml;t eiv&auml;t t&auml;sm&auml;&auml;';
$lang['test_email_accountinfo'] = 'Tunnusten l&auml;hett&auml;minen emaililla valittu, mutta email-osoitetta ei ole annettu';
$lang['test_database_prefix'] = 'Tietokannan etuliite sis&auml;lt&auml;&auml; virheellisi&auml; merkkej&auml;';
$lang['test_no_dbms'] = 'DBMS:&auml;&auml; ei ole valittu';
$lang['test_could_not_connect_db'] = 'Tietokantayhteytt&auml; ei voitu luoda. Tarkista ett&auml; k&auml;ytt&auml;j&auml;tunnus ja salasana ovat oikein ja ett&auml; k&auml;ytt&auml;j&auml;ll&auml; on oikeudet annettuun tietokantaan.';
$lang['test_could_not_drop_table'] = 'Ei voitu poistaa taulua (drop table). Tarkista ett&auml; k&auml;ytt&auml;j&auml;ll&auml; on oikeudet poistaa tauluja tietokannasta';
$lang['test_could_not_create_table'] = 'Ei voitu luoda taulua (create table). Tarkista ett&auml; k&auml;ytt&auml;j&auml;ll&auml; on oikeudet luoda tauluja tietokantaan';
$lang['test_check_php'] = 'Tarkistetaan PHP-versio %s+';
$lang['test_min_recommend'] = '(minimi %s, suositeltu %s tai suurempi)';
$lang['test_min_recommend_plus'] = '(min %s, suositeltu %s+)';
$lang['test_requires_php_version'] = 'CMS Made Simple vaatiin PHP-version 4.3 tai uudemman (sinulla on %s). PHP %s tai uudempi on suositeltu parhaan yhteensopivuuden takaamiseksi kolmansien osapuolten lis&auml;osien kanssa';
$lang['test_check_md5_func'] = 'Tarkistetaan MD5-funktiota';
$lang['test_check_safe_mode'] = 'Tarkistetaan Safe Mode';
$lang['test_check_safe_mode_failed'] = 'PHP Safe Mode voi aiheuttaa ongelmia tiedostojen lataamisessa ja muissa toiminnoissa. Kaikki riippuu siit&auml; kuinka tiukaksi palvelimen safe mode -asetukset on asetettu.';
$lang['test_check_tokenizer'] = 'Tarkistetaan tokenizer-funktiota';
$lang['test_check_tokenizer_failed'] = 'Tokenizer-funktion puuttuminen aiheuttaa sivujen n&auml;kymisen t&auml;ysin valkoisena. Tokenizer-funktio vaaditaan.';
$lang['test_check_gd'] = 'Tarkistetaan GD-kirjasto';
$lang['test_check_gd_failed'] = 'Jotkut moduulit ja toiminnallisuudet vaativat GD-kirjaston';
$lang['test_check_write'] = 'Tarkistetaan kirjoitusoikeuksia';
$lang['test_may_not_exist'] = 'T&auml;m&auml; tiedosto ei mahdollisesti ole viel&auml; olemassa. Jos tiedostoa ei ole luo uusi tyhj&auml; tiedosto samalla nimell&auml;. Tarkista my&ouml;s ett&auml; tiedosto on web palvelin prosessin kirjoitettavissa.';
$lang['could_not_retrieve_a_value'] = 'Tietoa ei voitu lukea, testi ohitetaan.';
$lang['displaying_the_value_originally'] = '<br />N&auml;ytet&auml;&auml;n asetustiedostossa oleva alkuper&auml;inen asetusarvo (ei v&auml;ltt&auml;m&auml;tt&auml; ole tarkka).';
$lang['test_check_xml_func'] = 'Tarkistetaan perus-XML-tuki (expat)';
$lang['test_allow_url_fopen_failed'] = 'Kun url fopen ei ole sallittu, URL objecteja ei voida k&auml;sitell&auml; kuten tiedostoja.';
$lang['test_remote_url'] = 'Tarkistetaan remote URL';
$lang['test_remote_url_failed'] = 'Todenn&auml;k&ouml;isesti et voi avata tiedostoja et&auml;palvelimelta';
$lang['connection_error'] = 'Ulosmenev&auml;t HTTP-yhteydet eiv&auml;t n&auml;yt&auml; toimivan! Onko ulosmenevien yhteyksien tiell&auml; esimerkiksi palomuuri? T&auml;m&auml; voi aiheuttaa sen, ett&auml; moduulien hallintaj&auml;rjestelm&auml; tai muut toiminnallisuudet eiv&auml;t toimi.';
$lang['remote_connection_timeout'] = 'Yhteys vanhentui!';
$lang['search_string_find'] = 'Yhteys ok!';
$lang['connection_failed'] = 'Yhteys ep&auml;onnistui!';
$lang['remote_response_ok'] = 'Et&auml;vastaus: ok!';
$lang['remote_response_404'] = 'Et&auml;vastaus: ei l&ouml;ytynyt!';
$lang['remote_response_error'] = 'Et&auml;vastaus: virhe!';
$lang['test_check_file_upload'] = 'Tarkistetaan tiedostolatauksia';
$lang['test_check_file_failed'] = 'Jos tiedostolataukset on estetty, et voi k&auml;ytt&auml;&auml; CMS Made Simple:n tiedostojen lataustoimintoja. Voit keskustella palveluntarjoajan kanssa toiminnon sallimisesta.';
$lang['test_check_memory'] = 'Tarkistetaan PHP:n muistirajoitusta';
$lang['test_check_memory_failed'] = 'Sinulla ei ole tarpeeksi muistia ajaaksesi CMS Made Simple&auml; tehokkaasti. Voit keskustella palveluntarjoajan kanssa muistirajoituksen muuttamisesta.';
$lang['test_check_time_limit'] = 'Tarkistetaan PHP:n aikarajaa sekunneissa';
$lang['test_check_time_limit_failed'] = 'PHP-skriptin aikaraja sekunneissa. Jos skripti&auml; ajetaan kauemmin palvelimen lopettaa sen automaattisesti.';
$lang['test_check_post_max'] = 'Tarkistetaan maksimi POST-koko';
$lang['test_check_post_max_failed'] = 'Et voi todenn&auml;k&ouml;isesti ladata palvelimelle isoja tiedostoja.';
$lang['test_check_upload_max'] = 'Tarkistetaan tiedostolatauksen maksimikoko';
$lang['test_check_upload_max_failed'] = 'Et voi todenn&auml;k&ouml;isesti ladata suurempia tiedostoja CMS Made Simplen tiedostonhallintatoiminnallisuuksilla.';
$lang['test_check_writable'] = 'Tarkistetaan onko %s kirjoitettavissa';
$lang['test_check_upload_failed'] = 'Uploads-hakemisto ei ole kirjoitettavissa. Voit jatkaa asennusta, mutta et voi ladata tiedostoja palvelimelle hallintapaneelin kautta.';
$lang['test_check_images_failed'] = 'Kuvat-hakemisto ei ole kirjoitettavissa. Voit jatkaa asennusta, mutta et voi ladata kuvia hallintapaneelin kautta.';
$lang['test_check_modules_failed'] = 'Modules-hakemisto ei ole kirjoitettavissa. Voit jatkaa asennusta, mutta et voi asentaa moduuleita hallintapaneelin kautta.';
$lang['test_check_file_get_contents'] = 'Tarkistetaan file_get_contents';
$lang['test_check_file_get_contents_failed'] = 'Et voi k&auml;ytt&auml;&auml; toimintoja, jotka k&auml;ytt&auml;v&auml;t t&auml;t&auml; toimintoa';
$lang['test_check_session_save_path'] = 'Tarkistetaan onko session.save_path kirjoitettavissa';
$lang['test_empty_session_save_path'] = 'Session.save_path on tyhj&auml;. PHP k&auml;ytt&auml;&auml; v&auml;liaikaistiedostojen kansiota. Jos sinulla on istunto-ongelmia ja ini_set toimii, voit kokeilla asettaa pelk&auml;t istuntoev&auml;steet p&auml;&auml;lle lis&auml;&auml;m&auml;ll&auml; rivin ini_set(&#039;session.use_only_cookies&#039;,1); include.php alkuun.';
$lang['test_check_session_save_path_failed'] = 'session.save_path on %s. Jos kansio ei ole kirjoitettavissa et v&auml;ltt&auml;m&auml;tt&auml; pysty kirjautumaan hallintapaneeliin. Jos sinulla on kirjautumisongelmia, yrit&auml; korjata t&auml;m&auml; ongelma. Safe_mode-rajoitukset saattavat my&ouml;s aiheuttaa ongelmia.';
$lang['test_check_ini_set'] = 'Tarkistetaan ini_set';
$lang['test_check_ini_set_failed'] = 'Vaikka mahdollisuus ylikirjoittaa php:n ini-tiedoston asetuksia ei ole pakollinen, jotkut lis&auml;osat k&auml;ytt&auml;v&auml;t ini_set funktiota aikakatkaisun pident&auml;miseen ja suurempien tiedostojen lataamiseen ym. Joidenkin lis&auml;osien kanssa voi olla ongelmia jos ini_set ei toimi. safe_mode-rajoitukset voivat my&ouml;s aiheuttaa ongelmia.';
$lang['install_admin_header'] = 'K&auml;ytt&auml;j&auml;tiedot';
$lang['install_admin_info'] = 'Valitse k&auml;ytt&auml;j&auml;tunnus, salasana ja email-osoite hallintaliittym&auml;&auml;n. Muista salasanasi, sill&auml; se on ainoa tapa, jolla p&auml;&auml;set kirjautumaan j&auml;rjestelm&auml;&auml;n asennuksen j&auml;lkeen.';
$lang['install_admin_email'] = 'S&auml;hk&ouml;postiosoite';
$lang['install_admin_email_info'] = 'L&auml;het&auml; kirjautumistiedot s&auml;hk&ouml;postissa asennuksen j&auml;lkeen';
$lang['install_admin_email_note'] = '<strong>Huomaa:</strong> T&auml;m&auml; toiminto k&auml;ytt&auml;&auml; PHP:n email-funktiota. Jos et saa viesti&auml; asennuksen j&auml;lkeen, on mahdollista ett&auml; palvelinta ei ole m&auml;&auml;ritelty oikein l&auml;hett&auml;m&auml;&auml;n s&auml;hk&ouml;posteja. Ota yhteytt&auml; palvelimen yll&auml;pit&auml;j&auml;&auml;n.';
$lang['install_admin_sitename'] = 'Sivuston nimi. T&auml;t&auml; nime&auml; k&auml;ytet&auml;&auml;n eri paikoissa oletussivupohjissa ja sit&auml; voidaan k&auml;ytt&auml;&auml; kaikissa pohjissa {sitename} -tagilla';
$lang['install_admin_db'] = 'Tietokantatiedot';
$lang['install_admin_db_info'] = '<p>Varmista ett&auml; sinulla on valmis tietokanta ja tietokantak&auml;ytt&auml;j&auml; kaikilla oikeuksilla.</p>
<p>MySQL-ohjeet:</p>
<p>Kirjaudu mysql:&auml;&auml;n ja aja seuraavat komennot:</p>
<ol>
<li>create database cms; (voit k&auml;ytt&auml;&auml; mit&auml; tahansa tietokannan nime&auml;)</li>
<li>grant all privileges on cms.* to cms_user@localhost identified by &#039;cms_pass&#039;;</li>
</ol>';
$lang['install_admin_follow'] = 'T&auml;yt&auml; seuraavat kent&auml;t';
$lang['install_admin_db_type'] = 'Tietokannan tyyppi';
$lang['install_admin_no_db'] = 'Tietokanta-ajureita ei l&ouml;ytynyt. Varmista ett&auml; PHP tukee mysql-, mysqli- ja/tai postgers7-tietokantoja ja yrit&auml; uudelleen.';
$lang['install_admin_db_host'] = 'Tietokantapalvelin';
$lang['install_admin_db_name'] = 'Tietokannan nimi';
$lang['install_admin_db_create'] = 'Luo taulut (Varoitus: poistaa olemassaolevat tiedot)';
$lang['install_admin_db_prefix'] = 'Taulun etuliite';
$lang['install_admin_db_sample'] = 'Asenna esimerkkisis&auml;ll&ouml;t ja -pohjat';
$lang['retry'] = 'Yrit&auml; uudelleen';
$lang['install_admin_db_create_seq'] = 'Luodaan taulun %s sekvenssi...';
$lang['install_admin_importing'] = 'Tuodaan esimerkki-data...';
$lang['invalid_query'] = 'Virheellinen kysely: %s';
$lang['install_creating_table'] = '<p>Luodaan taulu %s ... [%s]</p>';
$lang['install_creating_index'] = '<p>Luodaan indeksi tauluun %s ... [%s]</p>';
$lang['done'] = 'valmis';
$lang['failed'] = 'ep&auml;onnistui';
$lang['install_admin_error_schema'] = 'Virhe haettaessa SQL schemaa';
$lang['install_admin_set_account'] = 'Asetetaan hallintaliittym&auml;n tunnukset...';
$lang['install_admin_set_sitename'] = 'Asetetaan sivuston nimi...';
$lang['install_admin_setup'] = 'Jatketaan asennuksen asetustiedoston luonnilla. Suurin osa tiedoista on jo olemassa. Useimmin n&auml;m&auml; asetukset ovat oikein, tarkista asetukset ja paina jatka.';
$lang['install_admin_docroot'] = 'CMS-hakemisto (web-palvelimen mielest&auml;)';
$lang['install_admin_docroot_path'] = 'CMS-juuren hakemistopolku';
$lang['install_admin_querystring'] = 'Query string (j&auml;t&auml; oletusarvoonsa; jos ongelmia esiintyy, vaihda config.php:sta)';
$lang['invalid_querys'] = '<b>VAROITUS<b/>: virheellisi&auml; kutsuja tietokannassa!';
$lang['install_admin_sitedown'] = 'Virhe: ei voitu poistaa tmp/cache/SITEDOWN tiedostoa. Ole hyv&auml; ja poista tiedosto k&auml;sin.';
$lang['install_admin_update_hierarchy'] = 'P&auml;ivitet&auml;&auml;n hierarkiakohtia...';
$lang['install_admin_set_core_event'] = 'Asetetaan tapahtumat...';
$lang['install_admin_install_modules'] = 'Asennetaan modulit...';
$lang['install_admin_index_search'] = 'Haun indeksointi...';
$lang['install_admin_clear_cache'] = 'Tyhjennet&auml;&auml;n v&auml;limuisti...';
$lang['install_admin_emailing'] = 'L&auml;hetet&auml;&auml;n hallintatunnukset emailiin...';
$lang['install_admin_congratulations'] = 'Onnittelut, CMS Made Simple on nyt asennettu - t&auml;ss&auml; on sinun';
$lang['could_not_connect_db'] = 'Ei voitu luoda yhteytt&auml; tietokantaan. Tarkista ett&auml; k&auml;ytt&auml;j&auml;tunnus ja salasana ovat oikein ja k&auml;ytt&auml;j&auml;ll&auml; on oikeudet tietokantaan.';
$lang['cannot_write_config'] = 'Virhe: Ei voitu kirjoittaa %s.';
$lang['email_accountinfo_subject'] = 'CMS Made Simple hallintatunnukset';
$lang['email_accountinfo_message'] = 'Kiitos CMS Made Simple -asennuksesta

T&auml;ss&auml; ovat hallintatunnuksesi:
K&auml;ytt&auml;j&auml;tunnus: %s
Salasana: %s

Kirjaudu hallintaan: %s';
$lang['utma'] = '156861353.1474777839.1362079466.1362079466.1362079466.1';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1362079466.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['utmb'] = '156861353';
?>