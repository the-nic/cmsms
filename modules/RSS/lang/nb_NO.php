<?php
$lang['help'] = <<<EOF
            <h3>Hva gj�r denne modulen?</h3>
            <p>RSS er en modul som viser tilf�rsel av nyheter fra andre nettsteder. Den kan plasseres i ditt sideinnhold eller mal ved hjelp av en tagg, og vil vise tittelen og url for hvert nyhetselement som den mottar.</p>
            <h3>Er det noe mer jeg burde vite?</h3>
            <p>RSS modulen benytter seg av et hurtigbuffer for tilf�rsel av nyheter. Dette inneb�rer at nyhetene ikke lastes ned p� nytt for hver sidevisning, men blir oppdatert etter et visst antall sidevisninger eller n�r nyhetene blir gamle. Du vil ikke merke noen redusert ytelse ved � bruke det i din mal.</p>
            <h3>Hvordan bruker jeg denne modulen?</h3>
            <p>Ettersom RSS er en tagg modul, kan du sette den inn i ditt innhold eller mal ved � bruke cms_module taggen. Et eksempel p� en bruk er; <br /><code>{cms_module module="rss" url="http://download.freshmeat.net/backend/fm-releases.rdf" numbertoshow="5"}</code></p>
            <h3>Hvilke parametere finnes?</h3>
            <p>
            <ul>
                <li>url="http://feed_url" - URL til RSS tilf�rselen</li>
                <li><em>(optional)</em>numbertoshow="5" - Maksimalt antall viste nyhetssaker -- dersom denne parameteren mangler s� vil alle nyhetssaker vises.</li>
            </ul>
            </p>
EOF;
?>
