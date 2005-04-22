<?php
$lang['addacomment'] = 'Legg til kommentar';
$lang['cancel'] = 'Avbryt';
$lang['comment'] = 'Kommentar';
$lang['error'] = 'Feil';
$lang['errorenterauthor'] = 'Legg til forfatter';
$lang['errorentercomment'] = 'Legg til en kommentar (er ikke det poenget?)';
$lang['submit'] = 'Send';
$lang['yourname'] = 'Ditt navn';
$lang['help'] = <<<EOD
	<h3>Hva gj�r denne modulen?</h3>
	<p>Kommentarmodulen er en tagg modul. Den brukes for � legge til kommentarer p� individuelle sider. Disse kommentarene kan s� leses av brukere som bes�ker sidene. Den praktiske bruken av denne modulen kan eksempelvis v�re for dokumentasjonssider, der brukerene har behov for � dele informasjon med hverandre.</p>
	<h3>Hvordan bruker jeg modulen?</h3>
	<p>Kommentarmodulen er kun en tagg modul. Den brukes i ditt innhold eller i din mal ved � bruke cms_module taggen. Et eksempel p� en syntaks er: <code>{cms_module module="comments"}</code></p>
	<h3>Hvilke paramentere finnes?</h3>
	<p>
	<ul>
		<li><em>(optional)</em> number="5" - Maksimalt antall elementer som skal vises -- dersom du lar denne v�re tom s� vil alle elementer vises.</li>
		<li><em>(optional)</em> dateformat - Dato/tids format som tar samme parametere som php's strftime funksjon. Se <a href="http://php.net/strftime" target="_blank">her</a> for en liste over parametere og mer informasjon.</li>
	</ul>
EOD;
?>
