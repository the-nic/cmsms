<?php
$lang['addarticle'] = 'Legg til nyhetsartikkel';
$lang['addcategory'] = 'Ny kategori';
$lang['addnewsitem'] = 'Legg til nyhetsartikkel';
$lang['allcategories'] = 'Alle kategorier';
$lang['allentries'] = 'Alle oppføringer';
$lang['areyousure'] = 'Ønsker du virkelig å slette?';
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
$lang['endrequiresstart'] = 'Dersom du har en sluttdato for nyhetsartikkelen så må du også ha en start dato.';
$lang['entries'] = '%s oppføringer';
$lang['status'] = 'Status';
$lang['expiry'] = 'Vis i';
$lang['filter'] = 'Filter';
$lang['more'] = 'Mer';
$lang['moretext'] = 'Mer tekst';
$lang['name'] = 'Navn';
$lang['news'] = 'Nyheter';
$lang['newcategory'] = 'Ny kategori';
$lang['needpermission'] = 'Du trenger \'%s\' rettigheter for å utføre denne handlingen.';
$lang['nocategorygiven'] = 'Ingen kategori satt';
$lang['nocontentgiven'] = 'Innhold mangler';
$lang['noitemsfound'] = '<strong>Ingen</strong> artikler funnet i denne kategorien: %s';
$lang['nopostdategiven'] = 'Publiseringsdato mangler';
$lang['note'] = '<em>Merk:</em> Dato må være i et \'yyyy-mm-dd hh:mm:ss\' format.';
$lang['notitlegiven'] = 'Tittel mangler';
$lang['numbertodisplay'] = 'Antall som skal vises (ingen verdi valgt viser alle)';
$lang['print'] = 'Skriv ut';
$lang['postdate'] = 'Publiseringsdato';
$lang['postinstall'] = 'Husk å tildele rettigheter for "Modify News" for brukere som skal administrere nyhetsartikler.';
$lang['rsstemplate'] = 'RSS Mal';
$lang['selectcategory'] = 'Velg kategori';
$lang['showchildcategories'] = 'Vis underkategorier';
$lang['sortascending'] = 'Sorter med eldste øverst';
$lang['startdate'] = 'Start-dato';
$lang['startrequiresend'] = 'Dersom du har en start-dato for artikkelen så må du også ha en slutt-dato.';
$lang['submit'] = 'Oppdater';
$lang['summary'] = 'Sammendrag';
$lang['summarytemplate'] = 'Sammendragsmal';
$lang['title'] = 'Tittel';
$lang['options'] = 'Alternativer';
$lang['useexpiration'] = 'Bruk utløpsdato';
$lang['showautodiscovery'] = 'Vis automatisk mottakslink';
$lang['autodiscoverylink'] = 'URL adresse for automatisk mottakslink (blank for standard)';
$lang['helpnumber'] = 'Maksimalt antall elementer som skal vises (ingen verdi vil gjøre at alle elementer vises).';
$lang['helpmakerssbutton'] = 'Lag en knapp for RSS overføring av nyhetssaker.';
$lang['helpcategory'] = 'Vis kun elementer i denne kategorien. Bruk * etter navnet for å vise underelementer. Flere kategorier kan bli brukt dersom disse er separert med komma. Ingen verdi vil resultere i at alle kategorier vises.';
$lang['helpmoretext'] = 'Tekst som skal vises på slutten av nyhetssaken dersom saken er lengere enn sammendragslengden. Standard verdi er "more..."';
$lang['helpsummarytemplate'] = 'Bruk en separat mal for å vise artikkelsammendrag. Den må ligge i mappen /modules/News/templates.';
$lang['helpdetailtemplate'] = 'Bruk en separat mal for å vise artikkeldetlajer. Den må ligge i mappen /modules/News/templates.';
$lang['helpsortby'] = 'Feltet som skal brukes som søkekriterie. Alternativene er "news_date", "summary", "news_data", "news_category", "news_title".  Defaults to "news_date".';
$lang['helpsortasc'] = 'Sorter nyhetselementer i stigende rekkefølge. (Standard verdi er å sortere i synkende rekkefølge).';
$lang['helpdateformat'] = 'Formatet som artikkeldatoen skal vises med. Denne innstillingen baserer seg på PHP sin <a href="http://php.net/strftime" target="_blank">strftime</a> funksjon og kan brukes i din mal slik: $entry->formatpostdate.';
$lang['help'] = <<<EOF
	<h3>Hva gjør denne modulen?</h3>
	<p>Nyhetsmodulen viser nyheter på din side på en måte som ligner på en blog, men med mer funksjonalitet. Når modulen er installert, så vil en side for å administrere nyhtene vises i administrasjonsgrensesnittet. Her vil du kunne legge til og velge nyhetskategorier. Når en nyhetskategori er laget eller valgt, så vil en liste over artikler i denne kategorien vises. Du kan nå legge til, redigere eller slette artikler fra denne kategorien.</p>
	<h3>Sikkerhet</h3>
	<p>Brukere som skal administrere nyhetsartiklene må tilhøre en gruppe som har 'Modify News' rettigheter.</p>
	<h3>Hvordan bruker jeg modulen?</h3>
	<p>Den letteste måten å bruke modulen er med cms_module taggen. Taggen brukes enten i et innholdselement eller i en mal. Et eksempel på en bruk av modulen er <code>{cms_module module="news" number="5" category="beer"}</code></p>
	<h3>Hvilke parametere finnes?</h3>
	<p>
	<ul>
	<li><em>(optional)</em> number="5" - Maksimalt antall viste artikler =- Dersom parameteren er tom så vises alle artikler.</li>
	<li><em>(optional)</em> makerssbutton="true" - Lager en knapp for å linke en RSS tilførsel av nyhetsartikler.</li>
	<li><em>(optional)</em> category="category" - Viser bare elementer i den spesifiserte kategorien. Dersom denne parameteren er tom så vises artikler fra alle kategorier.</li>
	<li><em>(optional)</em> moretext="more..." - Tekst som vises på slutten av en nyhetsartikkel som har blitt kortet som følge av sammendragsmodus. Standard tekst er "more...".</li>
	<li><em>(optional)</em> summarytemplate="sometemplate.tpl" - Bruk en separat mal for visning av sammendrag. Malen må befinne seg i modules/News/templates.</li>
	<li><em>(optional)</em> detailtemplate="sometemplate.tpl"  - Bruk en separat mal for visning av nyhetsartikkelen. Malen må befinne seg i modules/News/templates.</li>
	<li><em>(optional)</em> sortasc="true" - Sorter nyhetsartikler med eldtste artikler øverst.</li>
	</ul>
	</p>
EOF;
?>