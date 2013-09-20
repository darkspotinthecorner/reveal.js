<?php

require_once('./php/reveal_presentation.php');

$p = new RevealPresentation(array(
	'maintitle'      => 'CSS',
	'subtitle'       => 'Transitions',
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
		<style type="text/css">

			.reveal .animation-container
			{
				margin-top: 1em;
				position: relative;
				min-height: 200px;
				background-color: rgba(0,0,0,0.2);
				border-radius: 20px;
			}

			.reveal .example-block
			{
				position: absolute;
				width: 100px;
				height: 100px;
				background-color: #ef7c27;
				border-radius: 20px;
				box-shadow: 0px 0px 0px 10px #000, inset 0px -10px 10px -10px #000, inset 0px 10px 10px -10px #fff;
			}

			#example-1 .example-block
			{
				top: 0;
				left: 0;
				bottom: 0;
				right: 0;
				margin: auto;
				transition-property: width;
				transition-duration: 0.75s;
			}

			#example-1:hover .example-block
			{
				width: 400px;
			}

			#example-2 .example-block
			{
				top: 0;
				left: 0;
				bottom: 0;
				right: 0;
				margin: auto;
				transition-property: width, height;
				transition-duration: 0.75s;
			}

			#example-2:hover .example-block
			{
				height: 50px;
				width: 400px;
			}


		</style>
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
					<h2>Was sind Transitions?</h2>
					<p>CSS Eigenschaften</p>
					<p>Animation von Änderungen</p>
				</section>

				<section>
					<section>
						<h2>Kernangaben</h2>
						<p><pre><code>.animated {
    /* --- 1. Was wird animiert? --- */
    transition-property: width;

    /* --- 2. Wie lange dauert die Animation? --- */
    transition-duration: 0.75s;
}</code></pre></p>
					</section>
				</section>

				<section>
					<h2>Zustände definieren</h2>
					<p><pre><code>div {
    width: 100px;
    transition-property: width;
    transition-duration: 0.75s;
}

div:hover {
    width: 400px;
}</code></pre></p>
					<div id="example-1" class="animation-container">
						<div class="example-block"></div>
					</div>
				</section>

				<section>
					<h2>Mehrere Eigenschaften</h2>
					<p><pre><code>div {
    width: 100px; height: 100px;
    transition-property: width, height;
    transition-duration: 0.75s;
}

div:hover {
    width: 400px; height: 50px;
}</code></pre></p>
					<div id="example-2" class="animation-container">
						<div class="example-block"></div>
					</div>
				</section>

				<section>
					<section>
						<h2>Verlaufsfunktionen</h2>
					</section>
					<section>
						<h2>Keywords</h2>
					</section>
					<section>
						<h2>cubic-bezier</h2>
					</section>
					<section>
						<h2>steps</h2>
					</section>
				</section>

				<section>
					<h2>Shorthands</h2>
				</section>

				<section>
					<h2></h2>
				</section>

			</div>

		</div>

		<script src="lib/js/head.min.js"></script>
		<script src="js/reveal.min.js"></script>
		<script src="plugin/prism/prism.js"></script>
		<script src="plugin/prefixfree/prefixfree.min.js"></script>

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
