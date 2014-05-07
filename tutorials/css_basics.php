<?php

require_once('../php/reveal_presentation.php');

$p = new RevealPresentation(array(
	'maintitle'      => 'CSS',
	'subtitle'       => 'Grundlagen',
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

		<link rel="stylesheet" href="../css/reveal.min.css">
		<link rel="stylesheet" href="../css/theme/dsitc.css" id="theme">

		<link rel="stylesheet" href="../plugin/prism/prism.css">

		<!-- If the query includes 'print-pdf', use the PDF print sheet -->
		<script>
			document.write( '<link rel="stylesheet" href="../css/print/' + ( window.location.search.match( /print-pdf/gi ) ? 'pdf' : 'paper' ) + '.css" type="text/css" media="print">' );
		</script>

		<!--[if lt IE 9]>
		<script src="../lib/js/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="watermark">
			<img src="../images/dsitc.png" />
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
					<h2>Was ist CSS?</h2>
					<p>CSS (<acronym><span>C</span>ascading <span>S</span>tyle <span>S</span>heets</acronym>)</p>
					<p>Beschreibt die Formatierung eines Dokumentes</p>
				</section>

				<section>
					<section>
						<h2>Einbindung</h2>
						<p><pre><code class="language-markup">&lt;!-- 1. Verlinkung --&gt;
&lt;link rel="stylesheet" type="text/css" /&gt;

&lt;!-- 2. Style Block --&gt;
&lt;style type="text/css"&gt;

    ...

    /* 3. Import */
    @import url('pfad/zu/externer/datei.css');

&lt;/style&gt;

&lt;!-- 4. Inline --&gt;
&lt;div style=" ... "&gt; ... &lt;/div&gt;</code></pre></p>
					</section>
				</section>

				<section>
					<h2>Aufbau</h2>
					<p><pre><code>/* -------------------------Regel------------------------- */

   body div.content { color: #606060; font-style: italic; }

/* ----Selektor----   --Deklaration-- ----Deklaration----  */</code></pre></p>
					<p>Ausnahme: Inline-Einbindungen verfügen nur über Deklarationen</p>
				</section>

				<section>
					<section>
						<h2>Selektoren</h2>
						<p>Bestimmt das Ziel der Regel</p>
					</section>
					<section>
						<h2>Universell</h2>
						<p><pre><code>* { ... }</code></pre></p>
						<p class="spaced"><pre><code class="language-markup">&lt;body&gt;

&lt;div&gt;

&lt;span&gt;

&lt;!-- usw. --&gt;</code></pre></p>
					</section>
					<section>
						<h2>Typen</h2>
						<p><pre><code>body { ... }

div { ... }

h1, h2, h3 { ... }</code></pre></p>
						<p class="spaced"><pre><code class="language-markup">&lt;body&gt;

&lt;div&gt;

&lt;h1&gt;
&lt;h2&gt;
&lt;h3&gt;</code></pre></p>
					</section>
					<section>
						<h2>Klassen</h2>
						<p><pre><code>.sideblock { ... }

.left.help { ... } /* Beide Klassen müssen zutreffen */

.sub, .sub_aside, .not-so-important { ... }</code></pre></p>
						<p class="spaced"><pre><code class="language-markup">&lt;div class="sideblock"&gt;

&lt;span class="left help"&gt;

&lt;small class="sub more"&gt;
&lt;p class="sub_aside"&gt;
&lt;a class="not-so-important"&gt;</code></pre></p>
					</section>
					<section>
						<h2>IDs</h2>
						<p><pre><code>#content { ... }

#main-menu { ... }

#block_1, #block_2, #block_3 { ... }</code></pre></p>
						<p class="spaced"><pre><code class="language-markup">&lt;p id="content"&gt;

&lt;ul id="main-menu"&gt;

&lt;div id="block_1"&gt;
&lt;div id="block_2"&gt;
&lt;div id="block_3"&gt;</code></pre></p>
					</section>
					<section>
						<h2>Nachkommen</h2>
						<p><pre><code>.head h1 { ... }

#main-menu ul.subtree li { ... }

.sidebar .block, .sidebar .widget { ... }</code></pre></p>
						<p class="spaced"><pre><code class="language-markup">&lt;div class="head"&gt; ... &lt;h1&gt;

&lt;ul id="main-menu"&gt; ... &lt;ul class="subtree"&gt; ... &lt;li&gt;

&lt;section class="sidebar"&gt; ... &lt;div class="block"&gt;
&lt;div class="sidebar"&gt; ... &lt;div class="widget"&gt;</code></pre></p>
					</section>
					<section>
						<h2>Kinder</h2>
						<p><pre><code>body > div { ... }

li.spacer > p { ... }

h1 > .sub, h2 > .sub { ... }</code></pre></p>
						<p class="spaced"><pre><code class="language-markup">&lt;body&gt;&lt;div&gt;

&lt;li class="spacer"&gt;&lt;p&gt;

&lt;h1&gt;&lt;span class="sub"&gt;
&lt;h2&gt;&lt;div class="sub"&gt;</code></pre></p>
					</section>
					<section>
						<h2>Nachfolgende Geschwister</h2>
						<p><pre><code>h1 + h2 { ... }

header > h1 + .subtitle { ... }

p + .info, p > .follow { ... }</code></pre></p>
						<p class="spaced"><pre><code class="language-markup">&lt;h1&gt; ... &lt;/h1&gt;&lt;h2&gt;

&lt;header&gt;&lt;h1&gt; ... &lt;/h1&gt;&lt;div class="subtitle"&gt;

&lt;p&gt; ... &lt;/p&gt;&lt;div class="info"&gt;
&lt;p&gt; ... &lt;/p&gt;&lt;p class="follow"&gt;</code></pre></p>
					</section>
					<section>
						<h2>Attribute</h2>
						<p><pre><code>span[title] { ... }

input[type="text"] { ... }

a[rel~="copyright"] { ... }

body[lang|="en"] { ... }</code></pre></p>
						<p class="spaced"><pre><code class="language-markup">&lt;span title="foo"&gt;

&lt;input type="text"&gt;

&lt;a rel="copyright external" href="..."&gt;

&lt;body lang="en-us"&gt;</code></pre></p>
					</section>








				</section>

				<section>
					<h2>Deklaration</h2>
				</section>


			</div>

		</div>

		<script src="../lib/js/head.min.js"></script>
		<script src="../js/reveal.min.js"></script>
		<script src="../plugin/prism/prism.js"></script>

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
					{ src: '../lib/js/classList.js', condition: function() { return !document.body.classList; } },
					{ src: '../plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					{ src: '../plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					// { src: '../plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
					{ src: '../plugin/prism/prism.js', async: true },
					{ src: '../plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } },
					{ src: '../plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }
					// { src: '../plugin/search/search.js', async: true, condition: function() { return !!document.body.classList; } }
					// { src: '../plugin/remotes/remotes.js', async: true, condition: function() { return !!document.body.classList; } }
				]
			});

		</script>

	</body>
</html>
