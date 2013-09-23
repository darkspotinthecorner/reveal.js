<?php

require_once('./php/reveal_presentation.php');

$p = new RevealPresentation(array(
	'maintitle'      => 'CSS',
	'subtitle'       => 'Hinter den Kulissen',
	'authorname'     => 'Martin Gelder',
	'authorhomepage' => 'https://plus.google.com/u/0/102958170634628677257',
));

?><!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">

		<title><?php echo $p->getTitle(); ?></title>

		<meta name="description" content="<?php echo $p->getTitle(); ?>">
		<meta name="author" content="<?php echo $p->getAuthorName(); ?>">

		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="css/reveal.min.css">
		<link rel="stylesheet" href="css/theme/dsitc.css" id="theme">

		<link rel="stylesheet" href="plugin/prism/prism.css">

		<!-- If the query includes 'print-pdf', use the PDF print sheet -->
		<script>
			document.write( '<link rel="stylesheet" href="css/print/' + ( window.location.search.match( /print-pdf/gi ) ? 'pdf' : 'paper' ) + '.css" type="text/css" media="print">' );
		</script>

		<!--[if lt IE 9]>
		<script src="lib/js/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="watermark">
			<img src="images/dsitc.png" />
		</div>

		<div class="reveal language-css">

			<!-- Any section element inside of this container is displayed as a slide -->
			<div class="slides">
				<section>
					<h1><?php echo $p->getMainTitle(); ?></h1>
					<h3><?php echo $p->getSubTitle(); ?></h3>
					<p>
						<small><a href="<?php echo $p->getAuthorHomepage(); ?>"><?php echo $p->getAuthorName(); ?></a></small>
					</p>
				</section>

				<section>
					<section>
						<h2>Werteberechnung</h2>
						<ul>
							<li class="fragment">Spezifiziert</li>
							<li class="fragment">Berechnet</li>
							<li class="fragment">Verwendet</li>
							<li class="fragment">Tatsächlich</li>
						</ul>
					</section>
					<section>
						<h2>Spezifizierte Werte</h2>
						<p>Im Code hinterlegte, gültige Werte</p>
						<ol>
							<li class="fragment">Wert aus der Kaskade</li>
							<li class="fragment">Vererbter Wert</li>
							<li class="fragment">Standardwert</li>
						</ol>
					</section>
					<section>
						<h2>Berechnete Werte</h2>
						<p>Umwandlung innerhalb der Kaskade</p>
						<p>Relative Angaben werden absolut, soweit möglich</p>
					</section>
					<section>
						<h2>Verwendete Werte</h2>
						<p>Umwandlung aller Werte in absolute Angaben</p>
					</section>
					<section>
						<h2>Tatsächliche Werte</h2>
						<p>Beim Rendern genutzter Wert</p>
						<p>Abhängig von Ausgabemedium</p>
					</section>
				</section>

				<section>
					<section>
						<h2>Vererbung</h2>
						<p>Betrifft nicht alle Eigenschaften</p>
						<p class="fragment">'Macht es Sinn?' Faustregel</p>
						<blockquote class="fragment"><small>Nur Eigentschaften bei welchen eine Vererbung in der Regel erwünscht ist (weil dies den Designprozess vereinfacht), werden standardmäßig vererbt.</small></blockquote>
					</section>
					<section>
						<h2>Vererbung</h2>
						<p>Spezifizierte Werte</p>
						<p class="fragment">Ausnahme! 'font-size': Berechneter Wert</p>
					</section>
					<section>
						<h2>Der Wert 'inherit'</h2>
						<p>Alle Eigentschaften</p>
						<p>Auch solche die standardmäßig keine Vererbung aufweisen</p>
					</section>
				</section>

				<section>
					<h2>Die '@import' Regel</h2>
					<p>Einbinden von Stylesheets</p>
					<p>Vor anderen Regeln im Stylesheet</p>
					<p><pre><code>@import url("style.css");</code></pre></p>
					<p>Angabe von Mediatypen möglich</p>
					<p><pre><code>@import url("bigscreen.css") projection, tv;</code></pre></p>
				</section>

				<section><h2>Die Kaskade</h2></section>
				<section><h2>Autoren Styles</h2></section>
				<section><h2>Benutzer Styles</h2></section>
				<section><h2>Browser Styles</h2></section>
				<section><h2>Reihenfolge</h2></section>
				<section><h2>'!important' Regeln</h2></section>
				<section><h2>Spezifität bestimmen</h2></section>
				<section><h2>Nicht-CSS Formatierung</h2></section>

			</div>

		</div>

		<script src="lib/js/head.min.js"></script>
		<script src="js/reveal.min.js"></script>
		<script src="plugin/prism/prism.js"></script>

		<script>

			// Full list of configuration options available here:
			// https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
				controls: true,
				progress: true,
				history: true,
				center: true,

				theme: Reveal.getQueryHash().theme, // available themes are in /css/theme
				transition: Reveal.getQueryHash().transition || 'default', // default/cube/page/concave/zoom/linear/fade/none

				// Optional libraries used to extend on reveal.js
				dependencies: [
					{ src: 'lib/js/classList.js', condition: function() { return !document.body.classList; } },
					{ src: 'plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					{ src: 'plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					// { src: 'plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
					{ src: 'plugin/prism/prism.js', async: true },
					{ src: 'plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } },
					{ src: 'plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }
					// { src: 'plugin/search/search.js', async: true, condition: function() { return !!document.body.classList; } }
					// { src: 'plugin/remotes/remotes.js', async: true, condition: function() { return !!document.body.classList; } }
				]
			});

		</script>

	</body>
</html>
