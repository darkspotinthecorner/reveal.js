<?php

require_once('../php/reveal_presentation.php');

$p = new RevealPresentation(array(
	'maintitle'      => 'Grunt',
	'subtitle'       => 'Einführung und Workflow',
	'authorname'     => 'Martin Gelder',
	'authorhomepage' => 'https://plus.google.com/u/0/102958170634628677257',
));

?><!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">

		<title><?php echo $p->getTitle(); ?></title>

		<meta name="description" content="Grunt - Einführung und Workflow">
		<meta name="author" content="Martin Gelder">

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

		<div class="reveal language-javascript">

			<!-- Any section element inside of this container is displayed as a slide -->
			<div class="slides">

				<section>
					<p><img class="frameless logo" src="../images/gruntjs/grunt-logo.png" /></p>
					<h1>Grunt</h1>
					<h3>Einführung und Workflow</h3>
					<p><small><a href="https://plus.google.com/u/0/102958170634628677257">Martin Gelder</a></small></p>
				</section>

				<section>
					<section>
						<h2>Was ist Grunt?</h2>
						<ul>
							<li>Task Runner</li>
							<li class="fragment">Zusammenfassen</li>
							<li class="fragment">Automatisieren</li>
							<li class="fragment">Vereinfachen</li>
						</ul>
					</section>
					<section>
						<h2>Woraus besteht Grunt?</h2>
						<h1 class="fragment">Javascript!</h1>
						<h2 class="fragment">Javascript!?</h2>
					</section>
					<section>
						<h1>Node.js</h1>
						<p><img class="frameless logo" src="../images/gruntjs/nodejs-logo.png" /></p>
						<h2>JS Laufzeitumgebung</h2>
						<p>Basiert auf Chromes V8 Javascript Engine</p>
						<p>Download via <a href="http://nodejs.org/">nodejs.org</a></p>
					</section>
					<section>
						<h1>NPM</h1>
						<p><img class="frameless logo" src="../images/gruntjs/npm-logo.png" /></p>
						<h2>Node.js Paketverwaltung</h2>
					</section>
				</section>

				<section>
					<section>
						<h1>Tool Setup</h1>
					</section>
					<section>
						<h2>1. Node.js</h2>
						<p>Installer <a href="http://nodejs.org/">herunterladen</a> und ausführen</p>
						<p>NPM ist Bestandteil von Node.js</p>
					</section>
					<section>
						<h2>2. Grunt</h2>
						<p>NPM übernimmt ab hier</p>
						<p><pre><code>npm install -g grunt-cli</code></pre></p>
					</section>
				</section>

				<section>
					<section>
						<h1>Grunt Aufbau</h1>
						<ul>
							<li>Alles Plugins</li>
							<li>Plugins liefern Aufgaben</li>
							<li>Projekt konfiguriert Aufgaben</li>
							<li><a href="http://gruntjs.com/plugins">Grunt Plugin Repository</a></li>
						</ul>
					</section>
				</section>

				<section>
					<section>
						<h1>Projekt Setup</h1>
					</section>
					<section>
						<h2>1. Paketdatei</h2>
						<p>
							<p><code>package.json</code> Datei im Projektordner erstellen</p>
							<p class="spaced"><pre><code>{
	'name'    : 'projekt-id',
	'version' : '0.0.1'
}</code></pre></p>
						<p>... oder ...</p>
						<p><pre><code>npm init</code></pre></p>
					</section>
					<section>
						<h2>2. Grunt</h2>
						<p><pre><code>npm install grunt --save-dev</code></pre></p>
						<p class="spaced">Installiert Pakete im Ordner <code>node_modules</code></p>
						<p><code>package.json</code> wird automatisch geupdatet</p>
					</section>
					<section>
						<h2>3. Das Gruntfile</h2>
						<p>Konfiguration der Grunt Aufgaben im Projekt</p>
						<p><code>Gruntfile.js</code> Datei im Projektordner erstellen</p>
						<p class="spaced"><pre><code>module.exports = function(grunt) {

	var gruntconfig = {};

	gruntconfig['pkg'] = grunt.file.readJSON('package.json');

	/* --- Aufgaben Konfiguration --- */

	grunt.initConfig(gruntconfig);

	/* --- Plugins laden --- */

	// Standard Aufgabe
	grunt.registerTask('default', []);

};</code></pre></p>
					</section>
				</section>

				<section>
					<section>
						<h1>Grunt Plugins</h1>
					</section>
					<section>
						<h2>1. Concat</h2>
						<p><pre><code>npm install grunt-contrib-concat --save-dev</code></pre></p>
						<p class="spaced"><pre><code>// ##### Gruntfile.js #####

/* --- Aufgaben Konfiguration --- */
gruntconfig['concat'] = {
	'dist': {
		'src' : ['tpl/raw/style_a.css.tpl', 'tpl/raw/style_b.css.tpl'],
		'dest': 'tpl/style.css.tpl'
	}
};

/* --- Plugins laden --- */
grunt.loadNpmTasks('grunt-contrib-concat');

// Standard Aufgabe
grunt.registerTask('default', ['concat']);</code></pre></p>
					</section>
					<section>
						<h2>2. CSSMin</h2>
						<p><pre><code>npm install grunt-contrib-cssmin --save-dev</code></pre></p>
						<p class="spaced"><pre><code>// ##### Gruntfile.js #####

/* --- Aufgaben Konfiguration --- */
gruntconfig['cssmin'] = {
	'minify': {
		'expand': true,
		'cwd'   : 'tpl/',
		'src'   : ['*.css.tpl', '!*.min.css.tpl'],
		'dest'  : 'tpl/',
		'ext'   : '.min.css.tpl'
	}
};

/* --- Plugins laden --- */
grunt.loadNpmTasks('grunt-contrib-cssmin');

// Standard Aufgabe
grunt.registerTask('default', ['concat', 'cssmin']);</code></pre></p>
					</section>
					<section>
						<h2>3. Watch</h2>
						<p><pre><code>npm install grunt-contrib-watch --save-dev</code></pre></p>
						<p class="spaced"><pre><code>// ##### Gruntfile.js #####

/* --- Aufgaben Konfiguration --- */
gruntconfig['watch'] = {
	'files': ['tpl/&#65279;*.css.tpl', '!tpl/&#65279;*.min.css.tpl'],
	'tasks': ['default']
};

/* --- Plugins laden --- */
grunt.loadNpmTasks('grunt-contrib-watch');</code></pre></p>
					</section>
					<section>
						<h2>Gruntfile.js</h2>
						<p><pre class="scrollable"><code>module.exports = function(grunt) {

	var gruntconfig = {};

	gruntconfig['pkg'] = grunt.file.readJSON('package.json');

	gruntconfig['concat'] = {
		'dist': {
			'src' : ['tpl/raw/style_a.css.tpl', 'tpl/raw/style_b.css.tpl'],
			'dest': 'tpl/style.css.tpl'
		}
	};

	gruntconfig['cssmin'] = {
		'minify': {
			'expand': true,
			'cwd'   : 'tpl/',
			'src'   : ['*.css.tpl', '!*.min.css.tpl'],
			'dest'  : 'tpl/',
			'ext'   : '.min.css.tpl'
		}
	};

	gruntconfig['watch'] = {
		'files': ['tpl/&#65279;*.css.tpl', '!tpl/&#65279;*.min.css.tpl'],
		'tasks': ['default']
	};

	grunt.initConfig(gruntconfig);

	/* --- Plugins laden --- */
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');

	// Standard Aufgabe
	grunt.registerTask('default', ['concat', 'cssmin']);

};</code></pre></p>
					</section>
				</section>

				<section>
					<section>
						<h1>Grunt Starten</h1>
					</section>
					<section>
						<h2>Standard Aufgabe</h2>
						<p><pre><code>// Standard Aufgabe
grunt.registerTask('default', ['concat', 'cssmin']);</code></pre></p>
						<p class="spaced"><pre><code>grunt</code></pre></p>
					</section>
					<section>
						<h2>Aufgaben direkt starten</h2>
						<p><pre><code>grunt concat

grunt cssmin

grunt watch // Spezialfall: Blockiert den Prozess</code></pre></p>
					</section>
				</section>

				<section>
					<section>
						<h1>Beispiel</h1>
					</section>
					<section>
						<h2>Projektstruktur</h2>
						<p><div class="filesystem">
							<ul>
								<li><i class="icon-file"></i> <span>Gruntfile.js</span></li>
								<li><i class="icon-file"></i> <span>package.json</span></li>
								<li><i class="icon-folder-open"></i> <span>tpl</span>
									<ul>
										<li><i class="icon-folder-open"></i> <span>raw</span>
											<ul>
												<li><i class="icon-file"></i> <span>style_a.css.tpl</span></li>
												<li><i class="icon-file"></i> <span>style_b.css.tpl</span></li>
											</ul>
										</li>
									</ul>
								</li>
							</ul></div>
						</p>
					</section>
					<section>
						<h2>Dateiinhalte</h2>
						<p><pre><code>/* style_a.css.tpl */

h1 {
	font-size: 40px;
}
</code></pre></p>
						<p class="spaced"><pre><code>/* style_b.css.tpl */

div {
	padding: 10px;
}
</code></pre></p>
					</section>
					<section>
						<h2>Grunt Start</h2>
						<p><img src="../images/gruntjs/sshot_run_grunt_combine_1.png" /></p>
					</section>
					<section>
						<h2>Neue Projektstruktur</h2>
						<p><div class="filesystem">
							<ul>
								<li><i class="icon-file"></i> <span>Gruntfile.js</span></li>
								<li><i class="icon-file"></i> <span>package.json</span></li>
								<li><i class="icon-folder-open"></i> <span>tpl</span>
									<ul>
										<li><i class="icon-file"></i> <span>style.css.tpl</span></li>
										<li><i class="icon-file"></i> <span>style.min.css.tpl</span></li>
										<li><i class="icon-folder-open"></i> <span>raw</span>
											<ul>
												<li><i class="icon-file"></i> <span>style_a.css.tpl</span></li>
												<li><i class="icon-file"></i> <span>style_b.css.tpl</span></li>
											</ul>
										</li>
									</ul>
								</li>
							</ul></div>
						</p>
					</section>
					<section>
						<h2>Neue Dateiinhalte</h2>
						<p><pre><code>/* style.css.tpl */

h1 {
	font-size: 40px;
}

div {
	padding: 10px;
}
</code></pre></p>
						<p class="spaced"><pre><code>/* style.min.css.tpl */

h1{font-size:40px}div{padding:10px}</code></pre></p>
					</section>

				</section>

				<section>
					<section>
						<h1>LESS</h1>
						<p><img class="frameless logo" src="../images/gruntjs/less-logo.png" /></p>
						<h2>CSS Präprozessor</h2>
						<p><a href="http://lesscss.org/">lesscss.org</a></p>
					</section>
					<section>
						<h2>Installation</h2>
						<p><pre><code>npm install grunt-contrib-less --save-dev</code></pre></p>
						<p class="spaced"><pre><code>// ##### Gruntfile.js #####

/* --- Aufgaben Konfiguration --- */
gruntconfig['less'] = {
	'dev': {
		'files': {
			'css/main.css': 'css/less/main.less',
			'css/page.css': 'css/less/page.less'
		}
	}
};

/* --- Plugins laden --- */
grunt.loadNpmTasks('grunt-contrib-less');</code></pre></p>
					</section>
				</section>

				<section>
					<section>
						<h1>SASS</h1>
						<p><img class="frameless logo" src="../images/gruntjs/sass-logo.png" /></p>
						<h2>CSS Präprozessor</h2>
						<p><a href="http://sass-lang.com/">sass-lang.com</a></p>
					</section>
					<section>
						<h2>Installation</h2>
						<p><pre><code>npm install grunt-contrib-sass --save-dev</code></pre></p>
						<p class="spaced"><pre><code>// ##### Gruntfile.js #####

/* --- Aufgaben Konfiguration --- */
gruntconfig['sass'] = {
	'dev': {
		'files': {
			'css/main.css': 'css/sass/main.sass',
			'css/page.css': ['css/sass/inc.sass', 'css/sass/page.sass']
		}
	}
};

/* --- Plugins laden --- */
grunt.loadNpmTasks('grunt-contrib-sass');</code></pre></p>
					</section>
				</section>



				<section>
					<h1>Fin</h1>
					<p>Dankeschön! :)</p>
				</section>

			</div><!-- .slides -->

		</div><!-- .reveal -->

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
