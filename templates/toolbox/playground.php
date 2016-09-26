<?php
	$files = glob(get_template_directory().'/templates/toolbox/playground/*.php');
?>

<br><br>

<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<form action="<?php echo home_url( add_query_arg( null, null )); ?>" method="GET" accept-charset="utf-8">
					<label for="file">Select a dev file</label>
					<select name="file" class="js-on-change-submit">
						<option value="">--</option>
					<?php foreach($files as $file): ?>
						<option value="<?php echo basename($file);?>"><?php echo basename($file);?></option>
					<?php endforeach; ?>
					</select>
					<input type="hidden" name="t" value="playground">
				</form>
			</div>
		</div><!-- end of row -->

		<br><br>
		
		<?php if(isset($_GET['file'])): ?>
		<div class="row">
			<div class="col-xs-12">
			<header class="section-header">
				<h1 class="section-header__title"><?php echo basename($file);?></h1>
			</header>

				<?php
				$template = get_template_directory().'/templates/toolbox/playground/'.$_GET['file'];
				if(file_exists($template)) include($template);
				?>
			</div>
		</div>
	<?php endif; ?>

	</div><!-- end of wrapper -->
</section><!-- end of section --> 