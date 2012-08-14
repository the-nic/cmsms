<?php
$lang['help_action'] = 'Legt die Eigenschaft des Moduls fest. F&uuml;r diesen Parameter sind zwei Werte m&ouml;glich:
<ul>
  <li>default <em>(voreingestellt)</em> - damit wird das Navigationsmen&uuml; erstellt.</li>
  <li>breadcrumbs - damit wird eine Brotkrumen-Navigation zur aktuellen Seite angezeigt.  <strong>Hinweis:</strong> {cms_breadcrumbs} ist die Kurzvariante f&uuml;r den Aufruf dieser Aktion.</li>
</ul>';
$lang['help_root'] = 'Dieser Parameter steht nur bei der Aktion breadcrumbs zur Verf&uuml;gung. Damit kann eine Startebene (start_level) festgelegt werden, die NICHT die voreingestellte Seite ist.';
$lang['youarehere'] = 'Sie sind hier';
$lang['set_cachable'] = 'Zwischenspeicherung f&uuml;r dieses Template aktivieren';
$lang['help_nocache'] = 'Die Zwischenspeicherung dieses Men&uuml;-Aufrufs deaktivieren. Wenn diesen Parameter auf irgend einen positiven Wert gesetzt wird, werden die Einstellungen im Content-Object und im Men&uuml;-Template &uuml;berschrieben.';
$lang['cachable'] = 'Men&uuml; zwischenspeichern';
$lang['help_childrenof'] = 'Mit dieser Option werden nur die Men&uuml;-Eintr&auml;ge angezeigt, die der Seite mit der ausgew&auml;hlten Seiten-ID oder dem Seiten-Alias untergeordnet sind.  Beispiel: <code>{menu childrenof=$page_alias}</code> zeigt nur die untergeordneten Seiten der aktuell angezeigten Seite.';
$lang['usage'] = 'Verwendung';
$lang['import'] = 'Importieren';
$lang['edit'] = 'Bearbeiten';
$lang['delete'] = 'L&ouml;schen';
$lang['help_loadprops'] = 'Wenn Sie in Ihrem Men&uuml;Manager-Template die erweiterten M&ouml;glichkeiten NICHT einsetzen m&ouml;chten, k&ouml;nnen Sie diesen Parameter verwenden. Ist dieser Parameter gesetzt, werden verschiedene Content-Eigenschaften (wie zum Beispiel extra1, image, thumbnail usw.) des $node-Objekts NICHT geladen. Damit werden die Anzahl der Datenbankabfragen und der Speicherbedarf dramatisch reduziert, aber die M&ouml;glichkeiten f&uuml;r ausgefeilte Men&uuml;s gehen verloren.';
$lang['readonly'] = 'Nur lesen';
$lang['error_templatename'] = 'FEHLER: Die Namen f&uuml;r Templates d&uuml;rfen nicht auf .tpl enden.';
$lang['this_is_default'] = 'Voreingestelltes Men&uuml;-Template';
$lang['set_as_default'] = 'Als voreingestelltes Men&uuml;-Template festlegen';
$lang['default'] = 'Voreingestellt';
$lang['templates'] = 'Templates ';
$lang['addtemplate'] = 'Template hinzuf&uuml;gen';
$lang['areyousure'] = 'Wollen Sie dies wirklich l&ouml;schen?';
$lang['dbtemplates'] = 'Templates in der Datenbank';
$lang['description'] = 'Verwaltet die Men&uuml;-Templates, mit denen die Men&uuml;s in jeder nur vorstellbaren Weise angezeigt werden k&ouml;nnen.';
$lang['deletetemplate'] = 'Template l&ouml;schen';
$lang['edittemplate'] = 'Template bearbeiten';
$lang['filename'] = 'Dateiname';
$lang['filetemplates'] = 'Templates als Datei';
$lang['help_includeprefix'] = 'Mit diesem Parameter werden nur die Eintr&auml;ge angezeigt, deren Seiten-Alias den festgelegten Prefix enth&auml;lt (durch Komma getrennt). Dieser Parameter kann NICHT mit dem Parameter excludeprefix kombiniert werden.';
$lang['help_excludeprefix'] = 'Mit diesem Parameter werden alle Eintr&auml;ge (und deren untergeordneten Seiten), die den festgelegten Prefix enthalten, von der Anzeige ausgeschlossen (durch Komma getrennt).  Dieser Parameter muss nicht in Verbindung mit dem Parameter includeprefix verwendet werden.';
$lang['help_collapse'] = 'Setzen Sie diesen Wert auf 1, wenn untergeordnete Seiten erst nach einem Klick auf die &uuml;bergeordnete Seite angezeigt werden sollen.';
$lang['help_items'] = 'Verwenden Sie diesen Eintrag, um eine Liste mit Seiten auszuw&auml;hlen, die dieses Men&uuml; anzeigen soll. Der Wert sollte eine Liste mit durch Kommata getrennten Seiten-Aliasen sein.';
$lang['help_number_of_levels'] = 'Mit dieser Einstellung kann festgelegt werden, bis zu welcher Tiefe das Men&uuml; angezeigt wird.';
$lang['help_show_all'] = 'Mit dieser Option werden die Men&uuml;-Eintr&auml;ge angezeigt, bei denen die Einstellung &quot;Seite im Men&uuml; anzeigen&quot; deaktiviert wurde. Inaktive Seiten werden auch weiterhin nicht angezeigt.';
$lang['help_show_root_siblings'] = 'Diese Option ist nur n&uuml;tzlich, wenn ein Startelement (Parameter start_element) oder eine Startseite (Parameter start_page) vorgegeben werden. Es werden dann alle Eintr&auml;ge angezeigt, die die gleiche Ebene wie die ausgew&auml;hlte Startseite bzw. das ausgew&auml;hlte Startelement haben.';
$lang['help_start_level'] = 'Mit dieser Option zeigt das Men&uuml; nur Eintr&auml;ge ab einer vorgegebenen Ebene an. Stellen Sie sich folgendes Beispiel vor: Sie m&ouml;chten im Hauptmen&uuml; nur eine Ebene anzeigen. Der Parameter daf&uuml;r ist number_of_levels=&#039;1&#039;. In einem zweiten Men&uuml; sollen nur die untergeordneten Seiten des jeweiligen Eintrages aus der ersten Ebene angezeigt werden. Der Parameter daf&uuml;r ist start_level=&#039;2&#039;.';
$lang['help_start_element'] = 'Beginnt die Men&uuml;-Anzeige ab einem festgelegten Startelement und zeigt nur das Element und dessen untergeordneten Seiten an. Verwendet die hierarchische Position (z.B. 5.1.2).';
$lang['help_start_page'] = 'Beginnt die Men&uuml;-Anzeige ab der festgelegten Startseite und zeigt nur dieses Element und dessen untergeordneten Seiten an. Verwendet den Seiten-Alias.';
$lang['help_template'] = 'Das Template, welches f&uuml;r die Anzeige des Men&uuml;s verwendet wird.  Die Templates sind in der Template-Datenbank abgelegt, au&szlig;er der Name des Templates endet auf .tpl. Dann befindet sich das Template im Template-Verzeichnis des Men&uuml;Managers. Voreingestellt ist das Men&uuml;-Template simple_navigation.tpl.';
$lang['help'] = '	<h3>Was macht das Modul?</h3>
	<p>Mit dem Men&uuml;Manager-Modul k&ouml;nnen Men&uuml;s so abstrahiert werden, dass diese einfach verwendbar und anpassbar sind. Die Anzeige der Men&uuml;s wird in Smarty-Templates abstrahiert, so dass es einfach an die Benutzerbed&uuml;rfnisse angepasst werden kann. Der Men&uuml;Manager liefert nur die Daten und gibt diese an das Template weiter. Mit der Anpassung der Templates oder der Erstellung Ihrer eigenen ist jedes nur denkbare Men&uuml; m&ouml;glich.</p>
	<h3>Wie wird es eingesetzt?</h3>
	<p>F&uuml;gen Sie den Tag wie folgt in Ihr Template bzw. Seite ein: <code>{menu}</code>. Die m&ouml;glichen Parameter sind weiter unten aufgef&uuml;hrt.</p>
	<h3>Was sollte ich &uuml;ber die Men&uuml;-Templates wissen?</h3>
	<p>Der Men&uuml;Manager verwendet Templates f&uuml;r die Anzeigelogik. Es werden drei Templates mitgeliefert: cssmenu.tpl, minimal_menu.tpl und simple_navigation.tpl. Mit diesen Templates werden ungeordnete Listen der Seiten erstellt, die via CSS &uuml;ber verschiedene Klassen und IDs gestaltet werden.</p>
	<p>HINWEIS: Das Aussehen der Men&uuml;s wird mit CSS gestaltet. Die Stylesheets sind nicht im Men&uuml;Manager enthalten, sondern m&uuml;ssen jeweils separat mit dem Seiten-Template verkn&uuml;pft werden. Damit das Template cssmenu.tpl auch im Internet Explorer angezeigt wird, m&uuml;ssen Sie im head-Bereich des Seiten-Templates einen Link zu einem JavaScript einf&uuml;gen. Dies ist zur Anzeige des Hover-Effekts notwendig.</p>
	<p>Wenn Sie eine angepasste Version eines Templates erstellen m&ouml;chten, k&ouml;nnen Sie dies einfach in die Datenbank importieren und direkt in der CMSms-Administration bearbeiten. Gehen Sie dazu wie folgt vor:
		<ol>
			<li>Klicken Sie in der Administration auf Men&uuml;Manager.</li>
			<li>Klicken Sie nun auf den Registerkarte &quot;Template-Dateien&quot; und dann in der Zeile des gew&uuml;nschten Templates auf das Symbol f&uuml;r &quot;Template in die Datenbank importieren&quot;</li>
			<li>Geben Sie der Template-Kopie einen Namen, zum Beispiel &quot;Test-Template&quot;.</li>
			<li>Nun sollte das &quot;Test-Template&quot; in Ihrer Liste der Template-Datenbank erscheinen.</li>
		</ol>
	</p>
	<p>Jetzt k&ouml;nnen Sie das Template einfach an die Bed&uuml;rfnisse Ihrer Webseite anpassen. F&uuml;gen Sie die entsprechenden Klassen und IDs ein, damit das Men&uuml; exakt wie gew&uuml;nscht aussieht. Anschlie&szlig;end k&ouml;nnen Sie das Template mit {menu template=&#039;Test Template&#039;} in Ihre Seite einf&uuml;gen. Falls Sie eine Template-Datei verwenden m&ouml;chten, muss dem Template die Endung .tpl hinzugef&uuml;gt werden.</p>
	<p>Die im Template zu verwendeten Parameter f&uuml;r das $node-Objekts lauten wie folgt:
		<ul>
			<li>$node->id -- Inhalts-ID</li>
			<li>$node->url -- URL des Inhalts</li>
			<li>$node->accesskey -- Taste f&uuml;r Direktzugriff, falls definiert</li>
			<li>$node->tabindex -- Tab-Index, falls definiert</li>
			<li>$node->titleattribute -- Beschreibung oder Titel-Attribut (Titel), falls definiert</li>
			<li>$node->hierarchy -- hierarchische Position, (z.Bsp. 1.3.3)</li>
			<li>$node->depth -- Tiefe (Ebene) dieses Nodes im aktuellen Men&uuml;</li>
			<li>$node->prevdepth -- Tiefe (Ebene) des vorherigen Nodes</li>
			<li>$node->haschildren -- gibt true zur&uuml;ck, wenn dieser Node anzuzeigende, untergeordnete Nodes hat</li>
			<li>$node->children_exist -- gibt true zur&uuml;ck, wenn zu diesem Node untergeordnete Nodes in der Datenbank verf&uuml;gbar sind, die im Men&uuml; angezeigt werden k&ouml;nnen</li>
			<li>$node->menutext -- Men&uuml;text</li>
			<li>$node->raw_menutext -- Men&uuml;text ohne Konvertierung der HTML-Entit&auml;ten</li>
                        <li>$node->alias -- Seiten-Alias</li>
                        <li>$node->extra1 -- Dieses Feld enth&auml;lt das zus&auml;tzliches Seiten-Attribut 1, au&szlig;er der Parameter loadprops wurde so gesetzt, dass diese Eigenschaft NICHT geladen wird.</li>
                        <li>$node->extra2 -- Dieses Feld enth&auml;lt das zus&auml;tzliches Seiten-Attribut 2, au&szlig;er der Parameter loadprops wurde so gesetzt, dass diese Eigenschaft NICHT geladen wird.</li>
                        <li>$node->extra3 -- Dieses Feld enth&auml;lt das zus&auml;tzliches Seiten-Attribut 1, au&szlig;er der Parameter loadprops wurde so gesetzt, dass diese Eigenschaft NICHT geladen wird.</li>
                        <li>$node->image -- Dieses Feld enth&auml;lt den Wert f&uuml;r ein Bild eines grafischen Links (falls definiert), au&szlig;er der Parameter loadprops wurde so gesetzt, dass diese Eigenschaft NICHT geladen wird.</li></li>
                        <li>$node->thumbnail -- Dieses Feld enth&auml;lt den Wert f&uuml;r ein Vorschaubild eines grafischen Links (falls definiert), au&szlig;er der Parameter loadprops wurde so gesetzt, dass diese Eigenschaft NICHT geladen wird.</li></li>
			<li>$node->target -- Dieses Feld enth&auml;lt das Ziel f&uuml;r den Link (falls definiert), au&szlig;er der Parameter loadprops wurde so gesetzt, dass diese Eigenschaft NICHT geladen wird.</li></li>
			<li>$node->created -- Datum der Erstellung des Nodes</li>
			<li>$node->modified -- Datum der letzten &Auml;nderung des Nodes</li>
			<li>$node->index -- Z&auml;hler dieses Nodes im gesamten Men&uuml;</li>
			<li>$node->parent -- gibt true zur&uuml;ck, wenn der Node eine &uuml;bergeordnete Seite der aktuell ausgew&auml;hlten Seite ist</li>
			<li>$node->current -- gibt true zur&uuml;ck, wenn der Node die aktuell ausgew&auml;hlte Seite ist</li>
                        <li>$node->first -- dieser Wert ist 1, wenn die aktuelle Seite der erste Eintrag einer Ebene ist.</li>
                        <li>$node->last -- dieser Wert ist 1, wenn die aktuelle Seite der letzte Eintrag einer Ebene ist.</li>
			<li>$node->type -- Inhaltstyp des Nodes. M&ouml;gliche Werte sind content (=Inhalt), errorpage (=Fehlerseite), link (=externer Link), pagelink (=interner Seitenlink), sectionheader (=Abschnitts&uuml;berschrift) sowie separator (=Trenner).</li>
		</ul>
	</p>
        <h3>Zwischenspeicherung</h3>
        <p>Dieses Modul hat die M&ouml;glichkeit, die Ausgabe in statischen Dateien zu speichern, um die Speicheranforderungen sowie die erforderlichen Datenbankabfragen zu reduzieren, und damit die Performance der Webseite zu erh&ouml;hen. Dies bietet alle Vorteile der statischen Men&uuml;s ohne die Unannehmlichkeiten beim Erstellen oder Bearbeiten von Seiten.</p>
        <p>So kann jedes Men&uuml;-Template &uuml;ber einen Klick in der Spalte &quot;Men&uuml; zwischenspeichern&quot; zwischengespeichert werden. Wenn ein Men&uuml;-Template mit Zwischenspeicherung auf einer Inhaltsseite verwendet wird, die ebenfalls zwischengespeichert wird, werden alle f&uuml;r diese Seite verf&uuml;gbaren Men&uuml;-Ausgaben verwendet. Mit dem Parameter nocache im menu-Tag kann die Zwischenspeicherung vollst&auml;ndig deaktiviert werden.</p>
        <p>Alle zwischengespeicherten Men&uuml;-Dateien werden gel&ouml;scht, wenn Inhalte hinzugef&uuml;gt, bearbeitet oder gel&ouml;scht werden ... und nat&uuml;rlich auch dann, wenn ein Men&uuml;-Template hinzugef&uuml;gt, bearbeitet oder gel&ouml;scht wird.</p>';
$lang['importtemplate'] = 'Template in die Datenbank importieren';
$lang['menumanager'] = 'Men&uuml;verwaltung';
$lang['newtemplate'] = 'Neuer Template-Name';
$lang['nocontent'] = 'Es wurde nichts eingegeben.';
$lang['notemplatefiles'] = 'Keine Template-Dateien in %s vorhanden';
$lang['notemplatename'] = 'Es wurde kein Template-Name vergeben.';
$lang['templatecontent'] = 'Template-Inhalt';
$lang['templatenameexists'] = 'Ein Template mit diesem Namen existiert bereits.';
$lang['utma'] = '156861353.47566592.1322743622.1322743622.1322743622.1';
$lang['utmz'] = '156861353.1322743622.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>