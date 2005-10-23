<?php
$lang['addarticle'] = 'Ajouter un article';
$lang['addcategory'] = 'Ajouter une cat�gorie';
$lang['addnewsitem'] = 'Ajouter un article';
$lang['allcategories'] = 'Toutes les cat�gories';
$lang['allentries'] = 'Toutes les entr�es';
$lang['areyousure'] = 'Etes-vous s�r de vouloir effacer?';
$lang['articles'] = 'Articles';
$lang['cancel'] = 'Annuler';
$lang['category'] = 'Cat�gorie';
$lang['categories'] = 'Cat�gories';
$lang['content'] = 'Contenu';
$lang['dateformat'] = '%s pas dans un format valide yyyy-mm-dd hh:mm:ss';
$lang['delete'] = 'Effacer';
$lang['description'] = 'Ajout, �dition et effacement des articles de News';
$lang['detailtemplate'] = 'Template de l\'article d�taill�';
$lang['displaytemplate'] = 'Afficher le template';
$lang['edit'] = 'Editer';
$lang['enddate'] = 'Date de fin';
$lang['endrequiresstart'] = 'Entrer une date de fin n�cessite qu\'une date de d�but soit �galement entr�e';
$lang['entries'] = '%s entr�es';
$lang['status'] = 'Status';
$lang['expiry'] = 'Expiration';
$lang['filter'] = 'Filtre';
$lang['more'] = 'Plus';
$lang['moretext'] = 'Texte pour "plus"';
$lang['name'] = 'Nom';
$lang['news'] = 'News';
$lang['newcategory'] = 'Nouvelle cat�gorie';
$lang['needpermission'] = 'Vous devez avoir la permission \'%s\' pour ex�cuter cette action.';
$lang['nocategorygiven'] = 'Aucune cat�gorie entr�e';
$lang['nocontentgiven'] = 'Aucun contenu entr�';
$lang['noitemsfound'] = '<strong>Aucun</strong> objet trouv� pour cette cat�gorie: %s';
$lang['nopostdategiven'] = 'Il manque la date � laquelle l\'article sera post�';
$lang['note'] = '<em>Note:</em> Les dates doivent �tre entr�es dans ce format \'yyyy-mm-dd hh:mm:ss\'.';
$lang['notitlegiven'] = 'Aucun titre entr�';
$lang['numbertodisplay'] = 'Nombre � afficher (vide = toutes les entr�es)';
$lang['print'] = 'Imprimer';
$lang['postdate'] = 'Date � laquelle l\'article sera post�';
$lang['postinstall'] = 'Assurez-vous que vous d�finissez la permission "Modify News" sur les utilisateurs qui administeront les articles.';
$lang['rsstemplate'] = 'RSS Template';
$lang['selectcategory'] = 'S�lection de cat�gorie';
$lang['showchildcategories'] = 'Afficher les sous-cat�gories';
$lang['sortascending'] = 'Tri ascendant';
$lang['startdate'] = 'Date de d�but';
$lang['startrequiresend'] = 'Entrer une date de d�but n�cessite qu\'une date de fin soit �galement entr�e';
$lang['submit'] = 'Envoyer';
$lang['summary'] = 'Sommaire';
$lang['summarytemplate'] = 'Template du sommaire de l\'article';
$lang['title'] = 'Titre';
$lang['options'] = 'Options';
$lang['useexpiration'] = 'Utiliser la date d\'expiration';
$lang['showautodiscovery'] = 'Show Feed Auto-Discovery Link';
$lang['autodiscoverylink'] = 'Feed Auto-Discovery URL (blank for default)';
$lang['helpnumber'] = 'Le nombre maximal d\'articles � afficher -- laisser ce param�tre vide affichera tous les articles.';
$lang['helpmakerssbutton'] = 'Affiche un bouton pour cr�er un flux RSS des articles.';
$lang['helpcategory'] = 'Affiche les articles de cette cat�gorie seulement. Utiliser * pour afficher les sous-cat�gories. Des cat�gories multiples peuvent �tre affich�es en les s�parant par une virgule. Laisser ce param�tre vide affichera tous les articles.';
$lang['helpmoretext'] = 'Texte � afficher � la fin d\'un article qui d�passe la longueur d�finie du sommaire.  D�faut = "more..."';
$lang['helpsummarytemplate'] = 'Utilise un template s�par� pour l\'affichage du sommaire des articles.  Il doit se trouver dans modules/News/templates.';
$lang['helpdetailtemplate'] = 'Utilise un template s�par� pour l\'affichage du d�tail des articles.  Il doit se trouver dans modules/News/templates.';
$lang['helpsortby'] = 'Champ sur lequel trier les articles.  Les options sont: "news_date", "summary", "news_data", "news_category", "news_title".  Par d�faut: "news_date".';
$lang['helpsortasc'] = 'Trie les articles dans un ordre de date ascendant plut�t que descendant. Par d�faut: descendant.';
$lang['helpdateformat'] = 'Format d\'affichage de la date de l\'article.  Ceci est bas� sur la fonction <a href="http://php.net/strftime" target="_blank">strftime</a> et peut �tre utilis� dans votre template avec $entry->formatpostdate.';
$lang['help'] = <<<EOF
	<h3>Que fait ce module?</h3>
	<p>News est un module pour afficher des articles de News sur vos pages, de fa�on similaire � un blog, mais avec plus de fonctions!  D�s que le module est install�, une page de gestion des News est ajout�e au menu d'administration qui vous permettra de s�lectionner ou ajouter des cat�gories d'articles.  D�s qu'une cat�gorie d'article est s�lectionn�e ou cr��e, une liste des articles pour cette cat�gorie est affich�e.  Depuis l�, vous pouvez ajouter, �diter ou effacer les articles dans cette cat�gorie.</p>
	<h3>Securit�</h3>
	<p>L'utilisateur doit faire partie d'un groupe avec la permission 'Modify News' pour pouvoir ajouter, �diter ou effacer des articles.</p>
	<h3>Comment l'utiliser?</h3>
	<p>La fa�on la plus facile de l'utiliser est en conjonction avec le tag cms_module.  Cela ins�rera votre module dans votre template ou votre page page o� vous le d�sirez, et y affichera les articles.  Exemple de synthaxe: <code>{cms_module module="news" number="5" category="beer"}</code></p>
EOF;
?>

