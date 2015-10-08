<?php $folders = array('components', 'layouts', 'blocks'); ?>

<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/google/code-prettify/master/src/prettify.css">

<section class="toolbox">
<div class="toolbox__navbar">
	<div class="container">
		<div class="row">
			<?php foreach($folders as $folder): 
			$folders[$folder] = glob(get_template_directory().'/templates/toolbox/'.$folder.'/*.php'); 
			?>
				<div class="col-xs-12 col-sm-4">
				<h2><?php echo $folder; ?></h2>
				<?php foreach($folders[$folder] as $c):
					echo '<p><a href="#'.basename($c).'">'.basename($c).'</a></p>';
				endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<span id="top"></span>

<?php 
foreach($folders as $folder => $templates):  

	if(!is_array($templates)) continue;

	foreach($templates as $template):

		$contents = file_get_contents($template);

		$meta = PageElements::get_meta($template);

	?>

		<section class="toolbox__item" id="<?php echo basename($template) ?>">
			<div class="container">
			 	<div class="row">
					<div class="col-xs-12">
						<h2 class="toolbox__item__title"><?php echo basename($template); ?></h2>

						<div class="toolbox__item__meta">
							<p><strong>Description: </strong><?php echo $meta['Description']; ?></p>
							<p><strong>Tags: </strong><?php echo $meta['Tags']; ?></p>
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-xs-12 toolbox__item__preview">
					<h3 class="toolbox__item__subtitle">Live Preview</h3>
						<?php include($template); ?>
					</div>
					<div class="col-xs-12 col-sm-6 toolbox__item__code hidden">
					<h3 class="toolbox__item__subtitle">Code</h3>
					<p><a href="#" class="btn js-copy" data-clipboard-text="<?php echo htmlentities($contents); ?>"><i class="fa fa-clipboard"></i> Copy</a> <a href="?page=viewer&amp;element=<?php echo $folder.'/'.basename($template); ?>" target="_blank" class="btn">Open</a></p>
					<pre class="prettyprint"><?php echo htmlentities($contents); ?></pre>
					</div>
				</div> 
				<div class="row hidden">
					<div class="col-xs-12">
						<p class="text-center"><a href="#top" class="btn">Back to top</a></p>
					</div>
				</div>
			</div>
		</section>

		<p style="text-align: center; margin:150px 0; max-width: 100%;"><a href="#top" class="btn">Back to top</a></p>

<?php endforeach; 

endforeach; ?>

</section>