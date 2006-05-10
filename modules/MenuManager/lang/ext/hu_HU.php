<?php
$lang['addtemplate'] = 'Sablon hozz&aacute;ad&aacute;sa';
$lang['areyousure'] = 'Biztosan t&ouml;r&ouml;lni akarja?';
$lang['changelog'] = '	<ul>
	<li>1.1 -- Added handling of target parameter, mainly for the Link content type</li>
	<li>1.0 -- Initial Release</li>
	</ul> ';
$lang['dbtemplates'] = 'Adatb&aacute;zis sablonok';
$lang['description'] = 'Kezlje a men&uuml;k megjelen&eacute;s&eacute;t b&aacute;rmilyen elk&eacute;pzelhető m&oacute;don.';
$lang['deletetemplate'] = 'Sablon t&ouml;rl&eacute;se';
$lang['edittemplate'] = 'Sablon szerkeszt&eacute;se';
$lang['filename'] = 'Filen&eacute;v';
$lang['filetemplates'] = 'File sablonok';
$lang['help_collapse'] = 'Kapcsolja be (&aacute;ll&iacute;tsa 1-re) hogy a men&uuml; elrejtse azokat az elemeket, amik nem kapcsol&oacute;dnak az aktu&aacute;lis oldalhoz.';
$lang['help_items'] = 'Haszn&aacute;lja ezt az elemet azon oldalak kiv&aacute;laszt&aacute;s&aacute;hoz, amiket ennek a men&uuml;nek kell megmutatnia.  Ez az &eacute;rt&eacute;k oldal alias-ok list&aacute;ja kell, hogy legyen, vesszőkkel elv&aacute;lasztva.';
$lang['help_number_of_levels'] = 'Ez a be&aacute;ll&iacute;t&aacute;s megadja, hogy milyen m&eacute;lys&eacute;gig mutassuk a men&uuml;szerkezetet.';
$lang['help_show_root_siblings'] = 'This option only becomes useful if start_element or start_page are used.  It basically will display the siblings along side of the selected start_page/element.';
$lang['help_start_level'] = 'This option will have the menu only display items starting a the given level.  An easy example would be if you had one menu on the page with number_of_levels=&#039;1&#039;.  Then as a second menu, you have start_level=&#039;2&#039;.  Now, your second menu will show items based on what is selected in the first menu.';
$lang['help_start_element'] = 'Starts the menu displaying at the given start_element and showing that element and it&#039;s children only.  Takes a hierarchy position (e.g. 5.1.2).';
$lang['help_start_page'] = 'Starts the menu displaying at the given start_page and showing that element and it&#039;s children only.  Takes a page alias.';
$lang['help_template'] = 'The template to use for displaying the menu.  Templates will come from the database templates unless the template name ends with .tpl, in which case it will come from a file in the MenuManager templates directory';
$lang['help'] = '	<h3>What does this do?</h3>
	<p>Menu Manager is a module for abstracting menus into a system that&#039;s easily usable and customizable.  It abstracts the display portion of menus into smarty templates that can be easily modified to suit the user&#039;s needs. That is, the menu manager itself is just an engine that feeds the template. By customizing templates, or make your own ones, you can create virtually any menu you can think of.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{cms_module module=&#039;menumanager&#039;}</code>.  The parameters that it can accept are listed below.</p>
	<h3>Why do I care about templates?</h3>
	<p>Menu Manager uses templates for display logic.  It comes with three default templates called bulletmenu.tpl, cssmenu.tpl and ellnav.tpl. They all basically create a simple unordered list of pages, using different classes and ID&#039;s for styling with CSS.  They are similar to the menu systems included in previous versions: bulletmenu, CSSMenu and EllNav.</p>
	<p>Note that you style the look of the menus with CSS. Stylesheets are not included with Menu Manager, but must be attached to the page template separately. For the cssmenu.tpl template to work in IE you must also insert a link to the JavaScript in the head section of the page template, which is necessary for the hover effect to work in IE.</p>
	<p>If you would like to make a specialized version of a template, you can easily import into the database and then edit it directly inside the CMSMS admin.  To do this:
		<ol>
			<li>Click on the Menu Manager admin.</li>
			<li>Click on the File Templates tab, and click the Import Template to Database button next to bulletmenu.tpl.</li>
			<li>Give the template copy a name.  We&#039;ll call it &quot;Test Template&quot;.</li>
			<li>You should now see the &quot;Test Template&quot; in your list of Database Templates.</li>
		</ol>
	</p>
	<p>Now you can easily modify the template to your needs for this site.  Put in classes, id&#039;s and other tags so that the formatting is exactly what you want.  Now, you can insert it into your site with {cms_module module=&#039;menumanager&#039; template=&#039;Test Template&#039;}. Note that the .tpl extension must be included if a file template is used.</p>
	<p>The parameters for the $node object used in the template are as follows:
		<ul>
			<li>$node->id -- Content ID</li>
			<li>$node->url -- URL of the Content</li>
			<li>$node->accesskey -- Access Key, if defined</li>
			<li>$node->tabindex -- Tab Index, if defined</li>
			<li>$node->titleattribute -- Title Attribute (title), if defined</li>
			<li>$node->hierarchy -- Hierarchy position, (e.g. 1.3.3)</li>
			<li>$node->depth -- Depth (level) of this node in the current menu</li>
			<li>$node->prevdepth -- Depth (level) of the node that was right before this one</li>
			<li>$node->haschildren -- Returns true if this node has child nodes to be displayed</li>
			<li>$node->menutext -- Menu Text</li>
			<li>$node->target -- Target for the link.  Will be empty if content doesn&#039;t set it.</li>
			<li>$node->index -- Count of this node in the whole menu</li>
			<li>$node->parent -- True if this node is a parent of the currently selected page</li>
		</ul>
	</p>';
$lang['importtemplate'] = 'Sablon import&aacute;l&aacute;sa az adatb&aacute;zisba';
$lang['menumanager'] = 'Men&uuml; kezelő';
$lang['newtemplate'] = '&Uacute;j sablon n&eacute;v';
$lang['nocontent'] = 'Nincs tartalom megadva';
$lang['notemplatefiles'] = 'Nincsenek file sablonok itt: %s';
$lang['notemplatename'] = 'Nincs sablon n&eacute;v megadva.';
$lang['templatecontent'] = 'Sablon tartalma';
$lang['templatenameexists'] = 'Ilyen nevű sablon m&aacute;r l&eacute;tezik';
?>