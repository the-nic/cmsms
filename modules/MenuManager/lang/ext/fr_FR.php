<?php
$lang['addtemplate'] = 'Ajouter un gabarit';
$lang['areyousure'] = 'Êtes-vous sûr de vouloir supprimer?';
$lang['changelog'] = '	<ul>
	<li>
	<p>Version: 1.0</p>
	<p>Version initiale</p>
	</li> 
	</ul> ';
$lang['dbtemplates'] = 'Gabarits se trouvant dans la base de données';
$lang['description'] = 'Gestion de gabarits de menus pour les afficher de toutes les manières imaginables.';
$lang['deletetemplate'] = 'Supprimer le gabarit';
$lang['edittemplate'] = 'Éditer le gabarit';
$lang['filename'] = 'Nom de fichier';
$lang['filetemplates'] = 'Gabarits sous forme de fichier';
$lang['help_collapse'] = 'À activer (définir en 1) pour que le menu cache les objets non relatifs à la page sélectionnée.';
$lang['help_items'] = 'Utilisez ceci pour sélectionner la liste de pages à afficher dans le menu. La valeur entrée doit être la liste des alias, séparée par des virgules.';
$lang['help_number_of_levels'] = 'Ce paramètre permet au menu d\'afficher uniquement un certain nombre de niveaux.';
$lang['help_show_root_siblings'] = 'Cette option est utile lorsque start_element ou start_page est utilisé. Les autres éléments du même niveau que l\'élément sélectionné seront affichés.';
$lang['help_start_level'] = 'Cette option permet d\'afficher uniquement les éléments à partir d\'un niveau donné. Un exemple: vous avez un menu avec number_of_levels=\'1\'.  Puis, comme second menu, vous avez start_level=\'2\'.  Le second menu affichera les éléments basés sur ce qui est sélectionné dans le premier menu.';
$lang['help_start_element'] = 'Cette option permet d\'afficher uniquement les éléments à partir d\'un élément donné (start_element), ainsi que les niveaux en-dessous de cet élément.  la valeur doit être égale à la position hiérarchique de l\'élément (p.e. 5.1.2).';
$lang['help_start_page'] = 'Cette option permet d\'afficher uniquement les éléments à partir d\'une page donnée (start_page), ainsi que les niveaux en-dessous de cet élément.  la valeur doit être égale à l\'alias de l\'élément.';
$lang['help_template'] = 'Le gabarit à utiliser pour l\'affichage du menu. Le gabarit est issu de la base de données sauf si son nom fini par .tpl, auquel cas il vient du fichier du même nom se trouvant dans le dossier des gabarits (templates) du module MenuManager';
$lang['help'] = '	<h3>Que fait ce module?</h3>
	<p>Le module Gestion de Menus (Menu Manager) permet de gérer les menus dans un système facile à utiliser et à personnaliser.  Il fait abstraction de la partie affichage et place cette dernière dans des gabarits Smarty, qui peuvent être modifiés facilement pour satisfaire aux besoins de l\'utilisateur. Cela étant, le module Gestion de Menus lui-même est simplement un moteur qui rempli les gabarits. En personnalisant les gabarits, ou en en créant de nouveaux, vous pouvez créer quasiment toutes les formes de menus que vous pourrez imaginer.</p>
	<h3>Comment l\'utiliser?</h3>
	<p>Insérez simplement la balise dans votre gabarit/page: <code>{cms_module module=\'menumanager\'}</code>.  Les paramètres possibles sont listés plus bas.</p>
	<h3>Pourquoi m\'occuper de gabarits?</h3>
	<p>Le module Gestion de Menus utilise des gabarits pour son affichage. Il est installé avec 3 gabarits par défaut, nommés bulletmenu.tpl, cssmenu.tpl et ellnav.tpl. Tous créent une simple liste de pages, en utilisant différentes classes et ID, afin de pouvoir leur donner un style grâce au CSS: Ils correspondent aux modules de menus qui étaient distribués avec les versions précédentes de CMSMS&nbsp;: bulletmenu, CSSMenu et EllNav.</p>
	<p>Notez bien que vous pouvez donner un style à vos menus par l\'intermédiaire du CSS. Les feuilles de style ne sont pas incluses au module Gestion de Menus, mais doivent être attachées au gabarit de pages séparément. Pour que le gabarit cssmenu.tpl fonctionne sous Internet Explorer, vous devez également, dans la partie en-tête de votre gabarit de page, insérer un lien au JavaScript qui permet l\'affichage de l\'effet survolage dans le navigateur Internet Explorer.</p>
	<p>Si vous désirez créer une version personnalisée d\'un gabarit de menu, vous pouvez facilement l\'importer dans la base de données, puis l\'éditer directement dans le panneau d\'administration de CMSMS.  Procéder ainsi&nbsp;:
		<ol>
			<li>Cliquez sur l\'administration de Gestion de Menus.</li>
			<li>Cliquez sur l\'onglet \'Gabarits sous forme de fichiers\', et cliquez  \'Importer le gabarit dans la base de données\' à côté de bulletmenu.tpl.</li>
			<li>Donnez un nouveau nom à ce gabarit. Nous l\'appelerons "gabarit test"</li>
			<li>Vous devriez maintenant voir "gabarit test" dans la liste \'Gabarits se trouvant dans la base de données\'.</li>
		</ol>
	</p>
	<p>Maintenant, vous pouvez aisément modifier le gabarit pour le modifier à votre convenance pour le site. Insérez des classes, des ID et d\'autres balises afin que le format généré soit exactement celui que vous désirez. Puis, insérez votre menu dans le site avec&nbsp;: {cms_module module=\'menumanager\' template=\'gabarit test\'}. Notez que l\'extension .tpl extension doit être ajoutée dans le cas d\'une utilisation d\'un gabarit sour forme de fichier.</p>
	<p>Les paramètres pour l\'élément $node utilisés dans un gabarit sont les suivants&nbsp;:
		<ul>
			<li>$node->id -- ID de l\'élément</li>
			<li>$node->url -- URL de l\'élément</li>
			<li>$node->accesskey -- Access Key, si définie</li>
			<li>$node->tabindex -- Tab Index, si défini</li>
			<li>$node->titleattribute -- Attribut titre, s défini</li>
			<li>$node->hierarchy -- Position hiérarchique (p.e. 1.3.3)</li>
			<li>$node->depth -- Niveau de cet élément dans le menu actuel</li>
			<li>$node->prevdepth -- Niveau de l\'élément juste avant l\'élément actuel</li>
			<li>$node->haschildren -- Renvoie true (vrai) si cet élément a des niveaux "enfants" qui doivent être affichés.</li>
			<li>$node->menutext -- Texte du menu</li>
			<li>$node->index -- Position de cet élément dans le menu</li>
			<li>$node->parent -- Renvoie true (vrai) si cet élément est le parent de la page actuelle</li>
		</ul>
	</p>';
$lang['importtemplate'] = 'Importer le gabarit dans la base de données';
$lang['menumanager'] = 'Gestion de Menu';
$lang['newtemplate'] = 'Nom du nouveau gabarit';
$lang['nocontent'] = 'Aucun contenu entré';
$lang['notemplatefiles'] = 'Aucun gabarit sous forme de fichier dans %s';
$lang['notemplatename'] = 'Aucun nom de gabarit entré';
$lang['templatecontent'] = 'Contenu du gabarit';
$lang['templatenameexists'] = 'Un gabarit du même nom existe déjà';
?>