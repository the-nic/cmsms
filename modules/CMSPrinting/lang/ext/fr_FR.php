<?php
$lang['friendlyname'] = 'Impression';
$lang['description'] = 'Ce module permet de personnaliser l&#039;affichage de pages pour impression pour CMSMS.  ';
$lang['postinstall'] = 'Le module a &eacute;t&eacute; install&eacute; avec succ&egrave;s';
$lang['confirmuninstall'] = '&Ecirc;tes-vous s&ucirc;r de vouloir d&eacute;sinstaller le module ?';
$lang['postuninstall'] = 'Le module a &eacute;t&eacute; d&eacute;sinstall&eacute; avec succ&egrave;s';
$lang['linktemplate'] = 'Gabarit de lien';
$lang['printtemplate'] = 'Gabarit d&#039;impression';
$lang['templatesaved'] = 'Le gabarit a &eacute;t&eacute; mis &agrave; jour avec succ&egrave;s';
$lang['templatereset'] = 'Le gabarit a &eacute;t&eacute; r&eacute;initialis&eacute; avec succ&egrave;s';
$lang['confirmresettemplate'] = '&Ecirc;tes-vous s&ucirc;r de vouloir r&eacute;initialiser le gabarit &agrave; son contenu par d&eacute;faut ?';
$lang['reset'] = 'R&eacute;initialiser par d&eacute;faut ';
$lang['save'] = 'Sauvegarder';
$lang['upgraded'] = 'A &eacute;t&eacute; mis &agrave; jour &agrave; la version %s';
$lang['savetemplate'] = 'Sauvegarder le gabarit';
$lang['savesettings'] = 'Sauvegarder les param&egrave;tres';
$lang['template'] = 'Gabarit&nbsp;';
$lang['notemplatecontent'] = 'Aucun contenu dans le nouveau gabarit...';
$lang['defaultlinktext'] = 'Imprimer cette page';
$lang['backbuttontext'] = 'Retour';
$lang['overridestylereset'] = 'La feuille de style de remplacement a &eacute;t&eacute; r&eacute;initialis&eacute;e avec succ&egrave;s';
$lang['overridestylesaved'] = 'La feuille de style de remplacement a &eacute;t&eacute; sauvegard&eacute;e avec succ&egrave;s';
$lang['overridestyle'] = 'Feuille de style de remplacement';
$lang['confirmresetstyle'] = '&Ecirc;tes-vous de vouloir r&eacute;initialiser la feuille de style &agrave; son contenu par d&eacute;faut?';
$lang['stylesheet'] = 'Feuille de style&nbsp;';
$lang['help_text'] = 'Remplace le texte par d&eacute;faut du lien impression texte';
$lang['help_popup'] = 'D&eacute;finir ce param&egrave;tre en &#039;true&#039; et la page &agrave; imprimer s&#039;ouvrira dans une autre fen&ecirc;tre';
$lang['help_script'] = 'D&eacute;finir ce param&egrave;tre en &#039;true&#039; et du code javascript sera utilis&eacute; pour ouvrir automatiquement le dialogue d&#039;impression';
$lang['help_showbutton'] = 'D&eacute;finir ce param&egrave;tre en &#039;true&#039; pour afficher un bouton graphique';
$lang['help_class'] = 'Classe pour le lien, par d&eacute;faut&nbsp; &#039;noprint&#039;';
$lang['help_src_img'] = 'Affiche ce fichier image au lieu du d&eacute;faut';
$lang['help_class_img'] = 'Classe de la balise img si le param&egrave;tre showbutton est d&eacute;fini';
$lang['help_more'] = 'Placer des options suppl&eacute;mentaires pour la balise < a>lien< /a>';
$lang['help_onlyurl'] = 'G&eacute;n&egrave;re seulement l&#039;url, pas le lien complet';
$lang['help_includetemplate'] = 'Si la valeur est &#039;true&#039; les options d&#039;impression sont pour l&#039;ensemble du gabarit, et pas seulement pour le contenu principal. Cela n&eacute;cessite d&#039;utiliser une feuille de style CSS si le Mediatype &#039;Print&#039; est activ&eacute;.';
$lang['help'] = '<b>Que fait ce module ?</b>
<br />
Il permet d&#039;ins&eacute;rer un lien dans votre page ou votre gabarit pour afficher une page imprimable.
<br />
Noter que, &agrave; moins que le param&egrave;tre <i>includetemplate = true</i> soit utilis&eacute;, le module permet l&#039;impression uniquement du contenu des pages du site.

<br /><br />
<b>Comment l&#039;utiliser ?</b>
<br />
Installer le module, puis aller dans l&#039;administration et modifier &eacute;ventuellemnt les pr&eacute;f&eacute;rences des gabarits pour les liens et la page d&#039;impression.
<br />
Dans votre page o&ugrave; votre gabarit ins&eacute;rez &agrave; l&#039;endroit d&eacute;sir&eacute; cette synthaxe&nbsp;:<br />
<pre>
{cms_module module=&#039;CMSPrinting&#039; <i>params</i>}
</pre>
<br />ou simplement,<br />
<pre>
{print <i>params</i>}
</pre>
<br />pour utiliser le plugin d&#039;impression.
<br />';
?>