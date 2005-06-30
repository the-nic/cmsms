<?php
$lang['addarticle'] = 'Legg til nyhetsartikkel';
$lang['addcategory'] = 'Ny kategori';
$lang['addnewsitem'] = 'Legg til nyhetsartikkel';
$lang['allcategories'] = 'Alle kategorier';
$lang['allentries'] = 'Alle oppf�ringer';
$lang['areyousure'] = '�nsker du virkelig � slette?';
$lang['articles'] = 'Nyhetsartikler';
$lang['cancel'] = 'Avbryt';
$lang['category'] = 'Kategori';
$lang['categories'] = 'Kategorier';
$lang['content'] = 'Innhold';
$lang['dateformat'] = '%s er ikke et gyldig yyyy-mm-dd hh:mm:ss format';
$lang['delete'] = 'Slett';
$lang['description'] = 'Legg til, rediger og slett nyhetsartikler.';
$lang['detailtemplate'] = 'Detaljmal';
$lang['displaytemplate'] = 'Visningsmal';
$lang['edit'] = 'Rediger';
$lang['enddate'] = 'Slutt dato';
$lang['endrequiresstart'] = 'Dersom du har en sluttdato for nyhetsartikkelen s� m� du ogs� ha en start dato.';
$lang['entries'] = '%s oppf�ringer';
$lang['expiry'] = 'Vis i';
$lang['filter'] = 'Filter';
$lang['more'] = 'Mer';
$lang['moretext'] = 'Mer tekst';
$lang['name'] = 'Navn';
$lang['news'] = 'Nyheter';
$lang['newcategory'] = 'Ny kategori';
$lang['needpermission'] = 'Du trenger \'%s\' rettigheter for � utf�re denne handlingen.';
$lang['nocategorygiven'] = 'Ingen kategori satt';
$lang['nocontentgiven'] = 'Innhold mangler';
$lang['noitemsfound'] = '<strong>Ingen</strong> artikler funnet i denne kategorien: %s';
$lang['nopostdategiven'] = 'Publiseringsdato mangler';
$lang['note'] = '<em>Merk:</em> Dato m� v�re i et \'yyyy-mm-dd hh:mm:ss\' format.';
$lang['notitlegiven'] = 'Tittel mangler';
$lang['numbertodisplay'] = 'Antall som skal vises (ingen verdi valgt viser alle)';
$lang['print'] = 'Skriv ut';
$lang['postdate'] = 'Publiseringsdato';
$lang['postinstall'] = 'Husk � tildele rettigheter for "Modify News" for brukere som skal administrere nyhetsartikler.';
$lang['rsstemplate'] = 'RSS Mal';
$lang['selectcategory'] = 'Velg kategori';
$lang['sortascending'] = 'Sorter med eldste �verst';
$lang['startdate'] = 'Start-dato';
$lang['startrequiresend'] = 'Dersom du har en start-dato for artikkelen s� m� du ogs� ha en slutt-dato.';
$lang['submit'] = 'Oppdater';
$lang['summary'] = 'Sammendrag';
$lang['summarytemplate'] = 'Sammendragsmal';
$lang['title'] = 'Tittel';
$lang['useexpiration'] = 'Bruk utl�psdato';
$lang['help'] = <<<EOF
	<h3>Hva gj�r denne modulen?</h3>
	<p>Nyhetsmodulen viser nyheter p� din side p� en m�te som ligner p� en blog, men med mer funksjonalitet. N�r modulen er installert, s� vil en side for � administrere nyhtene vises i administrasjonsgrensesnittet. Her vil du kunne legge til og velge nyhetskategorier. N�r en nyhetskategori er laget eller valgt, s� vil en liste over artikler i denne kategorien vises. Du kan n� legge til, redigere eller slette artikler fra denne kategorien.</p>
	<h3>Sikkerhet</h3>
	<p>Brukere som skal administrere nyhetsartiklene m� tilh�re en gruppe som har 'Modify News' rettigheter.</p>
	<h3>Hvordan bruker jeg modulen?</h3>
	<p>Den letteste m�ten � bruke modulen er med cms_module taggen. Taggen brukes enten i et innholdselement eller i en mal. Et eksempel p� en bruk av modulen er <code>{cms_module module="news" number="5" category="beer"}</code></p>
	<h3>Hvilke parametere finnes?</h3>
	<p>
	<ul>
	<li><em>(optional)</em> number="5" - Maksimalt antall viste artikler =- Dersom parameteren er tom s� vises alle artikler.</li>
	<li><em>(optional)</em> makerssbutton="true" - Lager en knapp for � linke en RSS tilf�rsel av nyhetsartikler.</li>
	<li><em>(optional)</em> category="category" - Viser bare elementer i den spesifiserte kategorien. Dersom denne parameteren er tom s� vises artikler fra alle kategorier.</li>
	<li><em>(optional)</em> moretext="more..." - Tekst som vises p� slutten av en nyhetsartikkel som har blitt kortet som f�lge av sammendragsmodus. Standard tekst er "more...".</li>
	<li><em>(optional)</em> summarytemplate="sometemplate.tpl" - Bruk en separat mal for visning av sammendrag. Malen m� befinne seg i modules/News/templates.</li>
	<li><em>(optional)</em> detailtemplate="sometemplate.tpl"  - Bruk en separat mal for visning av nyhetsartikkelen. Malen m� befinne seg i modules/News/templates.</li>
	<li><em>(optional)</em> sortasc="true" - Sorter nyhetsartikler med eldtste artikler �verst.</li>
	</ul>
	</p>
EOF;
?>