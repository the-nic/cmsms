<?php
$lang['help'] = <<<EOF
            <h3>Hvad g�r dette modul?</h3>
            <p>RSS er et modul til at vise nyheds feed'et fra andre site p� dit site. Det kan inds�ttes i en skabelon eller en side og vil vise titlen og det link som feed'et er hentet fra.</p>
            <h3>Er der andet jeg skal vide?</h3>
            <p>RSS modulet vil cache' feed'et s� det ikke hentes ned ved hver eneste visning af siden. I stedet henter den feed'et hjem efter et vist antal visninger og gemmer data lokalt s� det er nemt at komme til. N�r de lokale data bliver for�ldede henter den friske data. Du skulle ikke m�rke nogle hastighedsproblemer ved at benytte det i en skabelon..</p>
            <h3>Hvordan bruger jeg det?</h3>
            <p>Da det blot er et tag modul, skal det bare inds�ttes i din side eller din skabelon ved hj�lp af cms_module tag'en. Et eksempel p� syntaks kunne v�re: <br /><code>{cms_module module="rss" url="http://download.freshmeat.net/backend/fm-releases.rdf" numbertoshow="5"}</code></p>
            <h3>Hvilke parametre findes der?</h3>
            <p>
            <ul>
                <li>url="http://feed_url" - den pr�cise adresse p� RSS feed'et</li>
                <li><em>(optional)</em>numbertoshow="5" - Det maksimale antal artikler der skal vises - hvis intet angives vises alle artikler.</li>
            </ul>
            </p>
EOF;
?>
