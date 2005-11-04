<?php
$lang['helpshowadmin'] = '1/0, pour afficher ou non le lien au panneau d\'administration.';
$lang['helpstart_element'] = 'La hi�rarchie de votre �l�ment (par exemple : 1.2 or 3.5.1). Ce param�tre d�fini la racine de votre menu';
$lang['helpnumber_of_levels'] = 'Un nombre entier, le nombre de niveaux que vous voulez afficher dans votre menu';
$lang['helphorizontal'] = '1/0, si est d�fini en 1, affiche un menu horizontal plut�t que vertical.';
$lang['helprelative'] = '1/0, si est d�fini en 1, le menu va g�n�rer seulement les niveaux situ�s en-dessous du niveau de la page actuelle. Ceci est tr�s utile quand vous voulez ajouter des menus dans un contexte sensible.';
$lang['help'] = <<<EOF
  <h3>Que fait ce module?</h3>
  <p>Il affiche un menu vertical ou horizontal, purement compatible CSS. Un petit code JavaScript est requis pour l'affichage dans Internet Explorer.</p>
  <p>Ce module est bas� sur ces articles, <a href="http://www.alistapart.com/articles/horizdropdowns/">Drop-Down Menus, Horizontal Style</a>, <a href="http://www.nickrigby.com/article/11/drop-down-menus-horizontal-style-pt-2">Drop-Down Menus, Horizontal Style: Pt 2</a>, <a href="http://www.nickrigby.com/article/25/drop-down-menus-horizontal-style-pt-3">Drop-Down Menus, Horizontal Style: Pt 3</a> by Nick Rigby.</p>
  <h3>Comment l'utiliser?</h3>
  <p>Ins�rez simplement votre menu dans votre template/page ainsi: <code>{cms_module module='cssmenu'}</code></p>
  <p>A l'installation, 2 feuilles de style seront install�es.  Attachez celle pour affichage horizonzal ou vertical � votre template.  Copiez-la pour cr�er une nouvelle feuille de style sans toucher � la feuille originale.</p>
  <p>Note pour la feuille de style pour affichage horizontal, � la ligne 14, ajustez la largeur: 600px; � celle qui vous convient. (essayez '100%%;')
EOF;
?>
