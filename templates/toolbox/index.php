<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>

<section class="toolbox">

<span id="top"></span>

<?php 
foreach($folders as $folder => $templates):  

	if(!is_array($templates)) continue;

	foreach($templates as $template):

		$contents = file_get_contents($template);

		$meta = PageElements::get_meta($template);

	?>

		<section class="toolbox__item toolbox__item--<?php echo $folder;?>" id="<?php echo basename($template) ?>">
			<div class="container">
			 	<div class="row">
					<div class="col-xs-12">
						<h2 class="toolbox__item__title">
							<?php echo basename($template, '.php'); ?> 
							<a href="javascript:void(0);" class="btn js-copy" data-clipboard-text="<?php echo htmlentities($contents); ?>"><i class="fa fa-clipboard"></i> Copy Code</a>
							<a href="?page=viewer&amp;element=<?php echo $folder.'/'.basename($template); ?>" target="_blank" class="btn">Open in Viewer</a> 
							<a href="#code" class="btn js-toggle-code">Toggle Code</a>
						</h2>

						<div class="toolbox__item__meta">
							<p><strong>Type: </strong><?php echo $folder; ?></p>
							<p><strong>Location: </strong><?php echo str_replace(get_template_directory(), '', $template);?></p>
							<p><strong>Description: </strong><?php echo $meta['Description']; ?></p>
							<p><strong>Tags: </strong><?php echo $meta['Tags']; ?></p>
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-xs-12 toolbox__item__code hidden">
						<pre class="prettyprint"><?php echo htmlentities($contents); ?></pre>
					</div>
					<div class="col-xs-12 toolbox__item__preview">
						<?php include($template); ?>
					</div>
				</div> 
			</div>
		</section>


<?php endforeach; 

endforeach; ?>

</section>