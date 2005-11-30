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
$lang['status'] = 'Status';
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
$lang['helpnumber'] = 'Det maksimale antal nyheder der skal vises -- alle nyheder vises hvis feltet er blankt.';
$lang['helpmakerssbutton'] = 'Vis en knap der er et link til en RSS-kilde for nyhederne.';
$lang['helpcategory'] = 'Vis kun nyheder for denne kategori og den underkategorier. Hvis feltet er blankt vises alle kategodier.';
$lang['helpmoretext'] = 'Tekst der skal vises efter en nyhed hvis l�ngden af denne overskrider resum� l�ngden. Standard er "more..."';
$lang['helpsummarytemplate'] = 'Benyt en seperat skabelon til at vise en nyhedsartikel som resum�. Den skal befinde i modules/News/templates.';
$lang['helpdetailtemplate'] = 'Benyt en seperat skabelon til at vi en nyhedsartikel i detaljer. Den skal befinde sig i modules/News/templates.';
$lang['helpsortby'] = 'Hvilket felt der skal sorteres efter. Muligheder er: "news_date", "summary", "news_data", "news_category", "news_title". Standard er "news_date".';
$lang['helpsortasc'] = 'Sort�r nyheder i stigende r�kkef�lge i stedet for faldende.';
$lang['helpdateformat'] = 'Formatet som nyhedens post-dato skal vises med. Denne er baseret p� <a href="http://php.net/strftime" target="_blank">strftime</a> funktionene og kan bruges i din skabelon med $entry->formatpostdate.';
$lang['help'] = <<<EOF
	<h3>Hvad g�r dette modul?</h3>
	<p>News er et modul til at vise nyheder p� din side, p� sammen m�de som blogs, men med flere funktioner! N�r modulet er installeret er der tilf�jet et News admin menupunkt til administrations menuen som giver dig mulighed for at v�lge eller tilf�je en nyheds kategori. S� snart en kategori er tilf�jet eller valgt vises en liste over nyheder for denne katagori. Herfra kan du tilf�jet, redigere eller slette nyheder for kategorien.</p>
	<h3>Sikkerhed</h3>
	<p>Brugeren skal tilh�re en gruppe med 'Modify News' tilladelsen for at kunne tilf�je, redigere og slette nyheder.</p>
	<h3>Hvordan bruger jeg modulet?</h3>
	<p>Den nemmeste m�de er at bruge modulet ved hj�lpet af cms_module tag'en. Dette vil inds�tte modulet i din skabelon eller siger lige hvor du vil ha det, og vise nyheder her. Koden ser ud som noget i denne stil: <code>{cms_module module="news" number="5" category="�l"}</code></p>	
	</p>
EOF;
?>
