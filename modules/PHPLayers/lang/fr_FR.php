<?php
$lang['help'] = <<<EOF
	<h3>Que fait ce module?</h3>
	<p>Affiche un menu DHTML vertical ou horizontal.</p>
	<h3>Comment l'utiliser?</h3>
	<p>Ins�rez simplement ce module dans votre template/page ainsi: <code>{cms_module module='phplayers'}</code></p>
	<h3>Quels sont les param�tres possibles?</h3>
	<p>
	<ul>
		<li><em>(en option)</em> <tt>showadmin</tt> - 1/0, affiche ou non un lien � l'admin.</li>
		<li><em>(en option)</em> <tt>start_element</tt> - la hi�rarchie de votre �l�ment (par exemple : 1.2 or 3.5.1). Ce param�tre d�fini o� se trouve la racine de votre menu.</li>
		<li><em>(en option)</em> <tt>number_of_levels</tt> - un chiffre (integer), le nombre de niveaux que vous voulez afficher dans votre menu.</li>
		<li><em>(en option)</em> <tt>horizontal</tt> - 1/0, affiche le menu horizontalement plut�t que verticalement.</li>
		<li><em>(optional)</em> <tt>id</tt> - texte sans espace ni caract�res sp�ciaux, defaut: menu1. Vous devez sp�cifier si vous voulez utiliser plus d'un menu par page.</li>
		<li><em>(optional)</em> <tt>relative</tt> - 1/0, si d�fini, le menu g�n�rera seulement les descendants de la page actuelle. Ceci est tr�s utile si vous voulez ajouter des menus dans un contexte sensible.</li>
		<li><em>(optional)</em> <tt>tree</tt> - 1/0, cette option g�n�rera un menu hi�rarchique (arbre).</li>
	</ul>
	</p>
EOF;
?>
