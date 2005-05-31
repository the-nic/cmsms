<?php
$lang['allentries'] = 'Toutes les entr�es';
$lang['addarticle'] = 'Ajouter un article';
$lang['addcategory'] = 'Ajouter une cat�gorie';
$lang['addnewsitem'] = 'Ajouter une News';
$lang['areyousure'] = 'Etes-vous s�r de vouloir effacer?';
$lang['articles'] = 'Articles';
$lang['cancel'] = 'Annuler';
$lang['category'] = 'Cat�gorie';
$lang['categories'] = 'Cat�gories';
$lang['content'] = 'Contenu';
$lang['dateformat'] = '%s pas dans un format valide yyyy-mm-dd hh:mm:ss';
$lang['delete'] = 'Effacer';
$lang['description'] = 'Ajout, �dition et effacement des entr�es News';
$lang['detailtemplate'] = 'Template de l\'article d�taill�';
$lang['displaytemplate'] = 'Afficher le template';
$lang['edit'] = 'Editer';
$lang['enddate'] = 'Date de fin';
$lang['endrequiresstart'] = 'Entrer une date de fin n�cessite qu\'une date de d�but soit �galement entr�e';
$lang['entries'] = '%s entr�es';
$lang['expiry'] = 'Expiration';
$lang['filter'] = 'Filtre';
$lang['more'] = 'Plus';
$lang['name'] = 'Nom';
$lang['news'] = 'News';
$lang['newcategory'] = 'Nouvelle cat�gorie';
$lang['needpermission'] = 'Vous devez avoir la permission \'%s\' pour ex�cuter cette action.';
$lang['nocategorygiven'] = 'Aucune cat�gorie entr�e';
$lang['nocontentgiven'] = 'Aucun contenu entr�';
$lang['noitemsfound'] = '<strong>Aucun</strong> objet trouv� pour cette cat�gorie: %s';
$lang['nopostdategiven'] = 'Il manque la date � laquelle la News sera post�e';
$lang['note'] = '<em>Note:</em> Les dates doivent �tre entr�es dans ce format \'yyyy-mm-dd hh:mm:ss\'.';
$lang['notitlegiven'] = 'Aucun titre entr�';
$lang['print'] = 'Imprimer';
$lang['postdate'] = 'Date � laquelle la News sera post�e';
$lang['postinstall'] = 'Assurez-vous que vous d�finissez la permission "Modify News" sur les utilisateurs qui administeront les News.';
$lang['rsstemplate'] = 'RSS Template';
$lang['startdate'] = 'Date de d�but';
$lang['startrequiresend'] = 'Entrer une date de d�but n�cessite qu\'une date de fin soit �galement entr�e';
$lang['submit'] = 'Envoyer';
$lang['summarytemplate'] = 'Template du sommaire de l\'article';
$lang['title'] = 'Titre';
$lang['help'] = <<<EOF
	<h3>Que fait ce module?</h3>
	<p>News est un module pour afficher des News sur vos pages, de fa�on similaire � un blog, mais avec plus de fonctions!  D�s que le module est install�, une page d'administration des News est ajout�e � votre menu "contenu" qui vous permettra de s�lectionner ou ajouter des cat�gories de News.  D�s qu'une cat�gorie de News est s�lectionn�e ou cr��e, une liste des News pour cette cat�gorie est affich�e.  Depuis l�, vous pouvez ajouter, �diter ou effacer les News dans cette cat�gorie.</p>
	<h3>Securit�</h3>
	<p>L'utilisateur doit faire partie d'un groupe avec la permission 'Modify News' pour pouvoir ajouter, �diter ou effacer des News.</p>
	<h3>Comment l'utiliser?</h3>
	<p>La fa�on la plus facile de l'utiliser est en conjonction avec le tag cms_module.  Cela ins�rera votre module dans votre template ou votre page page o� vous le d�sirez, et y affichera les News.  Exemple de synthaxe: <code>{cms_module module="news" number="5" category="beer"}</code></p>
	<h3>Quels sont les param�tres possibles?</h3>
	<p>
	<ul>
	<li><em>(en option)</em> number="5" - Le nombre maximal de News � afficher -- laisser ce param�tre vide affichera toutes les News.</li>
	<li><em>(en option)</em> makerssbutton="true" - Cr�e un bouton pour un lien � une entr�e RSS feed des News.</li>
	<li><em>(en option)</em> category="category" - Affiche les News de cette cat�gorie uniquement -- laisser ce param�tre vide affichera toutes les News.</li>
	<li><em>(en option)</em> moretext="more..." - Texte � afficher � la fin d'une News qui d�passe la longueur d�finie du sommaire.  Defaut = "more...".</li>
	<li><em>(en option}</em> summarytemplate="sometemplate.tpl" - Utilise un template s�par� pour l'affichage des sommaires des articles.  Il doit se trouver dans modules/News/templates.
	<li><em>(en option}</em> detailtemplate="sometemplate.tpl" - Utilise un template s�par� pour l'affichage des articles d�taill�s.  Il doit se trouver dans modules/News/templates.
	<li><em>(en option)</em> sortasc="true" - Trie les News dans un ordre de date ascendant plut�t que descendant (descendant par d�faut).</li>
	</ul>
	</p>
EOF;
?>
