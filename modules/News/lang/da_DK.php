<?php
$lang['addarticle'] = 'Tilf�j artikel';
$lang['addcategory'] = 'Tilf�j kategori';
$lang['addnewsitem'] = 'Tilf�j nyhed';
$lang['allcategories'] = 'Alle katagorier';
$lang['allentries'] = 'Alle indl�g';
$lang['areyousure'] = 'Er du sikker p� dette skal slettes?';
$lang['articles'] = 'Artikler';
$lang['cancel'] = 'Fortryd';
$lang['category'] = 'Kategori';
$lang['categories'] = 'Kategorier';
$lang['content'] = 'Indhold';
$lang['dateformat'] = '%s er ikke gyldigt if�lge ����-mm-dd tt:mm:ss formatet';
$lang['delete'] = 'Slet';
$lang['description'] = 'Tilf�j, redig�r og slet nyheder';
$lang['detailtemplate'] = 'Detaljeret skabelon';
$lang['displaytemplate'] = 'Vis skabelon';
$lang['edit'] = 'Redig�r';
$lang['enddate'] = 'Slut dato';
$lang['endrequiresstart'] = 'Angivelse af en slutdato kr�ver en startdato';
$lang['entries'] = '%s Indl�g';
$lang['expiry'] = 'Udl�b';
$lang['filter'] = 'Filter';
$lang['more'] = 'Mere';
$lang['moretext'] = 'Mere tekst';
$lang['name'] = 'Navn';
$lang['news'] = 'Nyheder';
$lang['newcategory'] = 'Ny kategori';
$lang['needpermission'] = 'Du skal ha tilladelsen \'%s\' for at kunne udf�re den funktion.';
$lang['nocategorygiven'] = 'Ingen kategori angivet';
$lang['nocontentgiven'] = 'Intet indhold angivet';
$lang['noitemsfound'] = '<strong>Ingen</strong> nyheder fundet for kategorien: %s';
$lang['nopostdategiven'] = 'Ingen oprettelsesdato angivet';
$lang['note'] = '<em>Bem�rk:</em> Datoer skal angives i formatet: \'����-mm-dd tt:mm:ss\' format.';
$lang['notitlegiven'] = 'Ingen title angivet';
$lang['numbertodisplay'] = 'Antal der skal vises (blank viser alle nyheder)';
$lang['print'] = 'Udskriv';
$lang['postdate'] = 'Oprettelsesdato';
$lang['postinstall'] = 'Kontroll�r at tilladelsen "Modify News" er sl�et til for brugere der skal kunne administrere Nyheder.';
$lang['rsstemplate'] = 'RSS Skabelon';
$lang['selectcategory'] = 'V�lg kategori';
$lang['sortascending'] = 'Sort�r stigende';
$lang['startdate'] = 'Start dato';
$lang['startrequiresend'] = 'Angivelse af en start dato kr�ver en slutdato';
$lang['submit'] = 'Send';
$lang['summary'] = 'Resum�';
$lang['summarytemplate'] = 'Resum� skabelon';
$lang['title'] = 'Titel';
$lang['useexpiration'] = 'Benyt udl�bsdato';
$lang['help'] = <<<EOF
	<h3>Hvad g�r dette modul?</h3>
	<p>News er et modul til at vise nyheder p� din side, p� sammen m�de som blogs, men med flere funktioner! N�r modulet er installeret er der tilf�jet et News admin menupunkt til administrations menuen som giver dig mulighed for at v�lge eller tilf�je en nyheds kategori. S� snart en kategori er tilf�jet eller valgt vises en liste over nyheder for denne katagori. Herfra kan du tilf�jet, redigere eller slette nyheder for kategorien.</p>
	<h3>Sikkerhed</h3>
	<p>Brugeren skal tilh�re en gruppe med 'Modify News' tilladelsen for at kunne tilf�je, redigere og slette nyheder.</p>
	<h3>Hvordan bruger jeg modulet?</h3>
	<p>Den nemmeste m�de er at bruge modulet ved hj�lpet af cms_module tag'en. Dette vil inds�tte modulet i din skabelon eller siger lige hvor du vil ha det, og vise nyheder her. Koden ser ud som noget i denne stil: <code>{cms_module module="news" number="5" category="�l"}</code></p>
	<h3>Hvilke parametre findes der?</h3>
	<p>
	<ul>
	<li><em>(valgfrit)</em> number="5" - Det maksimale antal nyhder der skal vises - hvis der ikke angives noget vises alle nyheder</li>
	<li><em>(valgfrit)</em> makerssbutton="true" - Vis en knap med et link til RSS feed'et med nyhederne.</li>
	<li><em>(valgfrit)</em> category="kategori" - Vis kun nyheder for denne katagori og dens "b�rn". Hvis intet angives vises alle kategorier.</li>
	<li><em>(valgfrit)</em> moretext="mere..." - Teksten der skal vises ved slutningen af en nyhed, hvis l�ngden overstiger resum� l�ngden. Standard er "more...".</li>
	<li><em>(valgfrit}</em> summarytemplate="minskabelon.tpl" - Brug en brugerskabelon til at vise nyhedens resum�. Filen skal befinde sig i modules/News/templates.
	<li><em>(valgfrit}</em> detailtemplate="minskabelon.tpl" - Brug en brugerskabelon til at vise hele nyheden. Filen skal befinde sig i modules/News/templates.
	<li><em>(valgfrit)</em> sortby="news_date" - Felt det skal sorteres p�.  Mulige v�rdier er: "news_date", "summary", "news_data", "news_category", "news_title".  Defaults to "news_date".</li>
	<li><em>(valgfrit)</em> sortasc="true" - Sort�r nyheder i stigende r�kkef�lge i stedet for i faldende.</li>
	</ul>
	</p>
EOF;
?>
