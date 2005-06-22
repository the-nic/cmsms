<?php
$lang['help'] = <<<EOF
	<h3>Hva gj�r denne modulen?</h3>
	<p>Skriver ut en DHTML meny.</p>
	<h3>Hvordan bruker jeg modulen?</h3>
	<p>Modulen kan settes inn i ditt innhold eller mal ved � bruke cms_module taggen. Et eksempel er <code>{cms_module module='phplayers'}</code></p>
	<h3>Hvilke parameteret tar denne modulen?</h3>
	<p>
	<ul>
		<li><em>(optional)</em> <tt>showadmin</tt> - 1/0, settes til 1 dersom man �nsker � vise link til administrasjonssidene</li>
		<li><em>(optional)</em> <tt>start_element</tt> - dette er hierarkiet for dine elementer (f.eks: 1.2 eller 3.5.1). Denne parameteren setter ogs� roten p� menyen.</li>
		<li><em>(optional)</em> <tt>number_of_levels</tt> - antall niv�er du �nsker � vise i menyen.</li>
		<li><em>(optional)</em> <tt>horizontal</tt> - 1/0, setter opp en horisontal meny i stedet for en vertikal.</li>
		<li><em>(optional)</em> <tt>id</tt> - tekst uten mellomrom eller spesielle tegn, standard: menu1. Du m� oppgi denmne dersom du �nsker mer enn en meny per side.</li>
		<li><em>(optional)</em> <tt>relative</tt> - 1/0, dersom denne er satt til 1 vil den bare generere meny for (barn til) gjeldende side. Dette er nyttig dersom du �nsker � lage kontekst-sensitive menyer</li>
		<li><em>(optional)</em> <tt>tree</tt> - 1/0, dette vil generere en tremeny.</li>
	</ul>
	</p>
EOF;
?>
