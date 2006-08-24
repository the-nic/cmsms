<?php
$lang['sendtestmailconfirm'] = 'Questo spedisce un messaggio di test all&#039;indirizzo specificato. Se la spedizione ha successo, dovreste ritornare a questa pagina. Vuoi procedere?';
$lang['settingsconfirm'] = 'Scrivo il valore corrente nella configurazione di CMSMailer?';
$lang['testsubject'] = 'Messaggio di test di CMSMailer';
$lang['testbody'] = 'Questo messaggio &egrave; inteso a verificare solamente la validit&agrave; della configurazione del modulo CMSMailer.
Se ricevete questo significa che sta funzionando a dovere.';
$lang['error_notestaddress'] = 'Errore: Indirizzo di test non specificato';
$lang['prompt_testaddress'] = 'Indirizzo email di test';
$lang['sendtest'] = 'Spedisci il messaggio di test';
$lang['password'] = 'Password';
$lang['username'] = 'Nome utente';
$lang['smtpauth'] = 'Autenticazione SMTP';
$lang['mailer'] = 'Metodo di spedizione';
$lang['host'] = 'Nome server SMTP<br /><i>(o indirizzo IP)</i>';
$lang['port'] = 'Porta del server SMTP';
$lang['from'] = 'Indirizzo From (Da)';
$lang['fromuser'] = 'Nome utente From';
$lang['sendmail'] = 'Locazione del Sendmail';
$lang['timeout'] = 'Timeout SMTP';
$lang['submit'] = 'Inoltra';
$lang['cancel'] = 'Cancella';
$lang['info_mailer'] = 'Metodo usato per la spedizione (sendmail, smtp, mail). Di solito smtp &egrave; il pi&ugrave; utilizzato.';
$lang['info_host'] = 'Nome server SMTP (valido solo per il metodo di spedizione smtp)';
$lang['info_port'] = 'Numero porta SMTP (di solito 25) (valido solo per il metodo di spedizione smtp)';
$lang['info_from'] = 'Indirizzo usato per la spedizione di tutte le email';
$lang['info_fromuser'] = 'Nome reale per la spedizione di tutte le email';
$lang['info_sendmail'] = 'Il percorso completo del programma sendmail (valido solo per il metodo di spedizione smtp)';
$lang['info_timeout'] = 'Il numero di secondi nella conversazione SMTP prima che accada un errore (valido solo per il metodo di spedizione smtp)';
$lang['info_smtpauth'] = 'Se il server smtp richiede autenticazione (valido solo per il metodo di spedizione smtp)';
$lang['info_username'] = 'Nome utente dell&#039;autenticazione SMTP (valido solo per il metodo di spedizione smtp, quando &egrave; selezionata l&#039;autenticazione smtp)';
$lang['info_password'] = 'Password dell&#039;autenticazione SMTP (valido solo per il metodo di spedizione smtp, quando &egrave; selezionata l&#039;autenticazione smtp)';
$lang['friendlyname'] = 'Modulo CMSMailer';
$lang['postinstall'] = 'Il modulo CMSMailer &egrave; stato installato con successo';
$lang['postuninstall'] = 'Il modulo CMSMailer &egrave; disinstallato';
$lang['uninstalled'] = 'Modulo disinstallato.';
$lang['installed'] = 'Versione del modulo %s installata.';
$lang['accessdenied'] = 'Accesso negato. Si prega di controllare i permessi.';
$lang['error'] = 'Errore!';
$lang['upgraded'] = 'Modulo aggiornato alla versione %s.';
$lang['title_mod_prefs'] = 'Preferenze modulo';
$lang['title_mod_admin'] = 'Pannello di amministrazione del modulo';
$lang['title_admin_panel'] = 'Modulo CMSMailer';
$lang['moddescription'] = 'Questo &egrave; un semplice wrapper per PHPMailer, ha una equivalente API (funzione di funzione) ed una semplice interfaccia per alcuni valori predefiniti.';
$lang['welcome_text'] = '<p>Benvenuto nella sezione di amministrazione del modulo CMSMailer';
$lang['changelog'] = '<ul>
<li>Version 1.73.1. October, 2005. Initial Release.</li>
<li>Version 1.73.2. October, 2005. Minor bug fix with the admin panel.  The dropdown was not representing the current value from the preferences database</li>
<li>Version 1.73.3. October, 2005. Minor bug fix with sending html email</li>
<li>Version 1.73.4. November, 2005. Form fields in preferences are larger, fixed a problem with the fromuser, and called reset within the constructor</li>
<li>Version 1.73.5. November, 2005. Added the form fields and functionality for SMTP authentication.</li>
<li>Version 1.73.6. December, 2005. Default mailer method is SMTP on install, and improved documentation, and now I clear all the attachments, and addresses, etc. on reset.</li>
<li>Version 1.73.7. January, 2006. Increased field lengths in most fields</li>
<li>Version 1.73.8. January, 2006. Changed the preferences panel to be a bit more descriptive.</li>
<li>Version 1.73.9. January, 2006. Added test email capability, and confirmation on each button (except cancel)</li>
<li>Version 1.73.10. August, 2006. Modified to use lazy loading to minimize memory footprint when CMSMailer is not being used.</li>
</ul>';
$lang['help'] = '<h3>Che cosa fa?</h3>
<p>Questo modulo non provvede nessuna funzionalit&agrave; utente. E&#039; disegnato per essere integrato in altri moduli per provvedere la capacit&agrave; di spedizione emails.</p>
<h3>Come usarlo</h3>
<p>Questo modulo provvede un semplice wrapper per tutti i metodi e le variabili di phpmailer. E&#039; disegnato per essere usato da altri sviluppatori di moduli, sotto viene riportato un esempio ed un breve riferimento di API. Si prega, per pi&ugrave; informazioni, di leggere la documentazione di PHPMailer inclusa.</p>
<h3>Un esempio</h3>
<pre>
  $cmsmailer = $this->GetModuleInstance(&#039;CMSMailer&#039;);
  $cmsmailer->AddAddress(&#039;calguy1000@hotmail.com&#039;,&#039;calguy&#039;);
  $cmsmailer->SetBody(&#039;<h1>This is a test message<h1>&#039;);
  $cmsmailer->IsHTML(true);
  $cmsmailer->SetSubject(&#039;Test message&#039;);
  $cmsmailer->Send();
</pre>
<h3>API</h3>
<ul>
<li><p><b>void reset()</b></p>
<p>Reset the object back to the values specified in the admin panel</p>
</li>
<li><p><b>string GetAltBody()</b></p>
<p>Return the alternate body of the email</p>
</li>
<li><p><b>void SetAltBody( $string )</b></p>
<p>Set the alternate body of the email</p>
</li>
<li><p><b>string GetBody()</b></p>
<p>Return the primary body of the email</p>
</li>
<li><p><b>void SetBody( $string )</b></p>
<p>Set the primary body of the email</p>
</li>
<li><p><b>string GetCharSet()</b></p>
<p>Default: iso-8859-1</p>
<p>Return the mailer character set</p>
</li>
<li><p><b>void SetCharSet( $string )</b></p>
<p>Set the mailer character set</p>
</li>
<li><p><b>string GetConfirmReadingTo()</b></p>
<p>Return the address confirmed reading email flag</p>
</li>
<li><p><b>void SetConfirmReadingTo( $address )</b></p>
<p>Set or unset the confirm reading address</p>
</li>
<li><p><b>string GetContentType()</b></p>
<p>Default: text/plain</p>
<p>Return the content type</p>
</li>
<li><p><b>void SetContentType()</b></p>
<p>Set the content type</p>
</li>
<li><p><b>string GetEncoding()</b></p>
<p>Return the encoding</p>
</li>
<li><p><b>void SetEncoding( $encoding )</b></p>
<p>Set the encoding</p>
<p>Options are: 8bit, 7bit, binary, base64, quoted-printable</p>
</li>
<li><p><b>string GetErrorInfo()</b></p>
<p>Return any error information</p>
</li>
<li><p><b>string GetFrom()</b></p>
<p>Return the current originating address</p>
</li>
<li><p><b>void SetFrom( $address )</b></p>
<p>Set the originating address</p>
</li>
<li><p><b>string GetFromName()</b></p>
<p>Return the current originating name</p>
</li>
<li><p><b>SetFromName( $name )</b></p>
<p>Set the originating name</p>
</li>
<li><p><b>string GetHelo()</b></p>
<p>Return the HELO string</p>
</li>
<li><p><b>SetHelo( $string )</b></p>
<p>Set the HELO string</p>
<p>Default value: $hostname</p>
</li>
<li><p><b>string GetHost()</b></p>
<p>Return the SMTPs host separated by semicolon</p>
</li>
<li><p><b>void SetHost( $string )</b></p>
<p>Set the hosts</p>
</li>
<li><p><b>string GetHostName()</b></p>
<p>Return the hostname used for SMTP Helo</p>
</li>
<li><p><b>void SetHostName( $hostname )</b></p>
<p>Set the hostname used for SMTP Helo</p>
</li>
<li><p><b>string GetMailer()</b></p>
<p>Return the mailer</p>
</li>
<li><p><b>void SetMailer( $mailer )</b></p>
<p>Set the mailer, either sendmail,mail, or smtp</p>
</li>
<li><p><b>string GetPassword()</b></p>
<p>Return the password for smtp auth</p>
</li>
<li><p><b>void SetPassword( $string )</b></p>
<p>Set the password for smtp auth</p>
</li>
<li><p><b>int GetPort()</b></p>
<p>Return the port number for smtp connections</p>
</li>
<li><p><b>void SetPort( $int )</b></p>
<p>Set the port for smtp connections</p>
</li>
<li><p><b>int GetPriority()</b></p>
<p>Return the message priority</p>
</li>
<li><p><b>void SetPriority( int )</b></p>
<p>Set the message priority</p>
<p>Values are 1=High, 3 = Normal, 5 = Low</p>
</li>
<li><p><b>string GetSender()</b></p>
<p>Return the sender email (return path) string</p>
</li>
<li><p><b>void SetSender( $address )</b></p>
<p>Set the sender string</p>
</li>
<li><p><b>string GetSendmail()</b></p>
<p>Return the sendmail path</p>
</li>
<li><p><b>void SetSendmail( $path )</b></p>
<p>Set the sendmail path</p>
</li>
<li><p><b>bool GetSMTPAuth()</b></p>
<p>Return the current value of the smtp auth flag</p>
</li>
<li><p><b>SetSMTPAuth( $bool )</b></p>
<p>Set the smtp auth flag</p>
</li>
<li><p><b>bool GetSMTPDebug()</b></p>
<p>Return the value of the SMTP debug flag</p>
</li>
<li><p><b>void SetSMTPDebug( $bool )</b></p>
<p>Set the SMTP debug flag</p>
</li>
<li><p><b>bool GetSMTPKeepAlive()</b></p>
<p>Return the value of the SMTP keep alive flag</p>
</li>
<li><p><b>SetSMTPKeepAlive( $bool )</b></p>
<p>Set the SMTP keep alive flag</p>
</li>
<li><p><b>string GetSubject()</b></p>
<p>Return the current subject string</p>
</li>
<li><p><b>void SetSubject( $string )</b></p>
<p>Set the subject string</p>
</li>
<li><p><b>int GetTimeout()</b></p>
<p>Return the timeout value</p>
</li>
<li><p><b>void SetTimeout( $seconds )</b></p>
<p>Set the timeout value</p>
</li>
<li><p><b>string GetUsername()</b></p>
<p>Return the smtp auth username</p>
</li>
<li><p><b>void SetUsername( $string )</b></p>
<p>Set the smtp auth username</p>
</li>
<li><p><b>int GetWordWrap()</b></p>
<p>Return the wordwrap value</p>
</li>
<li><p><b>void SetWordWrap( $int )</b></p>
<p>Return the wordwrap value</p>
</li>
<li><p><b>AddAddress( $address, $name = &#039;&#039; )</b></p>
<p>Add a destination address</p>
</li>
<li><p><b>AddAttachment( $path, $name = &#039;&#039;, $encoding = &#039;base64&#039;, $type = &#039;application/octent-stream&#039; )</b></p>
<p>Add a file attachment</p>
</li>
<li><p><b>AddBCC( $address, $name = &#039;&#039; )</b></p>
<p>Add a BCC&#039;d destination address</p>
</li>
<li><p><b>AddCC( $address, $name = &#039;&#039; )</b></p>
<p>Add a CC&#039;d destination address</p>
</li>
<li><p><b>AddCustomHeader( $txt )</b></p>
<p>Add a custom header to the email</p>
</li>
<li><p><b>AddEmbeddedImage( $path, $cid, $name = &#039;&#039;, $encoding = &#039;base64&#039;, $type = &#039;application/octent-stream&#039; )</b></p>
<p>Add an embedded image</p>
</li>
<li><p><b>AddReplyTo( $address, $name = &#039;&#039; )</b></p>
<p>Add a reply to address</p>
</li>
<li><p><b>AddStringAttachment( $string, $filename, $encoding = &#039;base64&#039;, $type = &#039;application/octent-stream&#039; )</b></p>
<p>Add a file attachment</p>
</li>
<li><p><b>ClearAddresses()</b></p>
<p>Clear all addresses</p>
</li>
<li><p><b>ClearAllRecipients()</b></p>
<p>Clear all recipients</p>
</li>
<li><p><b>ClearAttachments()</b></p>
<p>Clear all attachments</p>
</li>
<li><p><b>ClearBCCs()</b></p>
<p>Clear all BCC addresses</p>
</li>
<li><p><b>ClearCCs()</b></p>
<p>Clear all CC addresses</p>
</li>
<li><p><b>ClearCustomHeaders()</b></p>
<p>Clear all custom headers</p>
</li>
<li><p><b>ClearReplyto()</b></p>
<p>Clear reply to address</p>
</li>
<li><p><b>IsError()</b></p>
<p>Check for an error condition</p>
</li>
<li><p><b>bool IsHTML( $bool )</b></p>
<p>Set the html flag</p>
<p><i>Note</i> possibly this should be a get and set method</p>
</li>
<li><p><b>bool IsMail()</b></p>
<p>Check wether we are using mail</p>
</li>
<li><p><b>bool IsQmail()</b></p>
<p>Check wether we are using qmail</p>
</li>
<li><p><b>IsSendmail()</b></p>
<p>Check wether we are using sendmail</p>
</li>
<li><p><b>IsSMTP()</b></p>
<p>Check wether we are using smtp</p>
</li>
<li><p><b>Send()</b></p>
<p>Send the currently prepared email</p>
</li>
<li><p><b>SetLanguage( $lang_type, $lang_path = &#039;&#039; )</b></p>
<p>Set the current language and <em>(optional)</em> language path</p>
</li>
<li><p><b>SmtpClose()</b></p>
<p>Close the smtp connection</p>
</li>
</ul>
<h3>Supporto</h3>
<p>Questo modulo non include supporto commerciale. Tuttavia, ci sono delle risorse utilizzabili per aiutarvi con questo:</p>
<ul>
<li>Per l&#039;ultima versione del modulo, FAQs, Bug Report o per acquistare supporto commerciale, visitare la homepage di calguy a <a href=&amp;quot;http://techcom.dyndns.org&amp;quot;>techcom.dyndns.org</a>.</li>
<li>Ulteriori discussioni di questo modulo potete trovarle nei <a href=&amp;quot;http://forum.cmsmadesimple.org&amp;quot;>CMS Made Simple Forums</a>.</li>
<li>L&#039;autore, calguy1000, spesso pu&ograve; essere contattato nel <a href=&amp;quot;irc://irc.freenode.net/#cms&amp;quot;>CMS IRC Channel</a>.</li>
<li>Infine, puoi avere successo tramite email, direttamente all&#039;autore.</li>  
</ul>
<p>Come per la GPL, questo software &egrave; fornito cos&igrave; com&#039;&egrave;. Si prega di leggere il testo della licenza.</p>

<h3>Copyright e licenza</h3>
<p>Copyright &copy; 2005, Robert Campbell <a href=&amp;quot;mailto:calguy1000@hotmail.com&amp;quot;><calguy1000@hotmail.com></a>. Tutti i diritti sono riservati.</p>
<p>Questo modulo &egrave; stato rilasciato sotto la <a href=&amp;quot;http://www.gnu.org/licenses/licenses.html#GPL&amp;quot;>GNU Public License</a>. Devi aderire a questa licenza prima di usare il modulo.</p>';
?>