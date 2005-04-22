<?php
$lang['help'] = <<<EOF
	<h3>Hva gj�r denne modulen?</h3>
	<p>Printer en vertikal dhtml meny.</p>
	<h3>Hvordan bruker jeg modulen?</h3>
	<p>Modulen kan settes inn i ditt innhold eller mal ved � bruke cms_module taggen. Et eksempel er <code>{cms_module module='phplayers'}</code></p>
	<h3>Hvilke parameteret tar denne modulen?</h3>
	<p>
	<ul>
		<li><em>(optional)</em> <tt>showadmin</tt> - 1/0, settes til 1 dersom man �nsker � vise administrasjonslink.</li>
		<li><em>(optional)</em> <tt>start_element</tt> - dette er hierarkiet for dine elementer (f.eks: 1.2 eller 3.5.1). Denne parameteren setter ogs� roten p� menyen.</li>
		<li><em>(optional)</em> <tt>number_of_levels</tt> - et heltall; dette er antall niv�er du �nsker � vise i menyen.</li>
		<li><em>(optional)</em> <tt>horizontal</tt> - 1/0, setter opp en horisontal meny i stedet for en vertikal.</li>
	</ul>
	</p>
EOF;
?>
