<?php
$filename = $_GET['element-editor'];
if (!file_exists(locate_template('templates/components/' . $filename))) {
	die('Component not found!');
}
?>
<script>


var LiveElement = new Function();

// Url to theme.
LiveElement.prototype.themeUrl = "";

// Data model
LiveElement.prototype.fileCache = {};



/**
 * Initializer live reloader and start process.
 */
LiveElement.prototype.init = function(themeUrl, templateFilename) {

	this.themeUrl = themeUrl;

	// Init files.
	this.fileCache = {
		css: {
			url: this.themeUrl + "/assets/dist/css/main.css",
			data: ""
		},
		html: {
			url: this.themeUrl + "/templates/components/" + templateFilename,
			data: ""
		},
		js: {
			url: this.themeUrl + "/assets/dist/js/myquery.js",
			data: ""
		}
	};

	// Start runner.
	this.runner();

}



/**
 * Run autoupdates.
 */
LiveElement.prototype.runner = function() {

	var self = this;
	setInterval(function() {

		console.log("Update");
		self.updateCSS();
		self.updateHTML();
		self.updateJS();

	}, 1000);

}



/**
 * Update CSS file.
 */
LiveElement.prototype.updateCSS = function() {


	var self = this;

	$.ajax({
		url: this.fileCache.css.url,
		success: function(data) {

			// Check if data has changed.
			if (data != self.fileCache.css.data) {

				self.fileCache.css.data = data;

				console.log("Update CSS");

				// Reload css.
				var currentUrl = $("#our_css-css").attr("href").replace(/\?id=.*/, "");
				$("#our_css-css").attr("href", currentUrl + "?id=" + new Date().getTime());

			}

		}
	})

}



/**
 * Update HTML template.
 */
LiveElement.prototype.updateHTML = function() {


	var self = this;

	$.ajax({
		url: this.fileCache.html.url,
		success: function(data) {

			// Check if data has changed.
			if (data != self.fileCache.html.data) {

				console.log("Update HTML");

				self.fileCache.html.data = data;

				$(".cup").html(data);

			}

		}
	});

}



/**
 * Update HTML template.
 */
LiveElement.prototype.updateJS = function() {


	var self = this;

	$.ajax({
		url: this.fileCache.js.url,
		success: function(data) {

			// Check if data has changed.
			if (self.fileCache.js.data != "" && data != self.fileCache.js.data) {

				console.log("Update JS");

				window.location.reload();

			}

		}
	});

}



document.addEventListener("DOMContentLoaded", function() {
	console.log("reload");
	var liveElement = new LiveElement();
	liveElement.init("<?php echo get_stylesheet_directory_uri() ?>", "<?php echo $filename ?>");
});



</script>

<style>
.layout-element-editor__cup {
	width: 100%;
	height: 200px;
	border: 1px dotted #cccccc;
}
.layout-element-editor__cup--taller {
	height: 400px;
}
.layout-element-editor__cup--jumbo {
	height: 800px;
}
.margin-top {
	margin-top: 30px;
}
</style>


<section class="layout-element-editor">
	<div class="container">
		<div class="row">
			<div class="col-xs-2">
				<div class="cup layout-element-editor__cup"></div>
			</div>
			<div class="col-xs-3">
				<div class="cup layout-element-editor__cup"></div>
			</div>
			<div class="col-xs-7">
				<div class="cup layout-element-editor__cup"></div>
			</div>
		</div>
		<div class="row margin-top">
			<div class="col-xs-12">
				<div class="cup layout-element-editor__cup layout-element-editor__cup--taller"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-2">
				<div class="cup layout-element-editor__cup layout-element-editor__cup--taller"></div>
			</div>
			<div class="col-xs-3">
				<div class="cup layout-element-editor__cup layout-element-editor__cup--taller"></div>
			</div>
			<div class="col-xs-7">
				<div class="cup layout-element-editor__cup layout-element-editor__cup--taller"></div>
			</div>
		</div>
	</div>
	<div class="cup margin-top layout-element-editor__cup layout-element-editor__cup--jumbo"></div>
</section>
