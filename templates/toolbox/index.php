<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>

<span id="top"></span>

<?php
foreach($folders as $folder => $templates):

	if(!is_array($templates)) continue;

	foreach($templates as $template):

		$contents = file_get_contents($template);

	?>
		<div id="<?php echo basename($template) ?>">
			<h3><?php echo basename($template, '.php'); ?></h3>
			<p><strong>Location: </strong><?php echo str_replace(get_template_directory(), '', $template);?></p>
			<br />
			<?php include($template); ?>
		</div>

		<br /><br /><br /><br /><br />

<?php endforeach;

endforeach; ?>