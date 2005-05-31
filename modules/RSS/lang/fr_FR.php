<?php
$lang['help'] = <<<EOF
            <h3>Que fait ce module?</h3>
            <p>RSS est un module pour afficher des Flux RSS d'autres sites dans votre site.  Il peut �tre ins�r� dans un template ou une page de contenu, en tant que tag,  et affichera le titre et l'url de chaque �l�ment donn�.</p>
            <h3>Que dois-je savoir?</h3>
            <p>The RSS module mettra les Flux en cache, afin qu'ils ne soient pas t�l�charg�s et pars�s � chaque rafra�chissement.  A la place, il t�l�charge les Flux tous les tant de rafra�chissements de la page, et stocke les donn�es locallement afin qu'elles soient facilement accessibles.  Quand la copie locale devient obsol�te, il t�l�charge les donn�es fra�ches.  Vous ne devriez noter aucune diff�rence de performance lorsque le module est utilis� dans un template.</p>
            <h3>Comment l'utiliser?</h3>
            <p>Puisque RSS Feed est un module utilisant les tags, il est ins�r� dans votre page ou template avec le tag cms_module.  Un exemple de synthaxe serait: <br /><code>{cms_module module="rss" url="http://download.freshmeat.net/backend/fm-releases.rdf" numbertoshow="5"}</code></p>
            <h3>Quels sont les param�tres possibles?</h3>
            <p>
            <ul>
                <li>url="http://feed_url" - RSS feed URL</li>
                <li><em>(en option)</em>numbertoshow="5" - Le nombre maximal d'objets de Flux RSS � afficher -- laisser ce param�tre vide affichera tous les objets.</li>
            </ul>
            </p>
EOF;
?>
