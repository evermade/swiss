<?php
$page_elements = new PageElements();
?>

<section class="example-template">
<div class="container">

	<h2><i class="fa fa-coffee"></i>  Mixins</h2>

	<table class="table">
		<tbody>
			<tr>
				<th>Filename</th>
				<th>Description</th>
			</tr>
			<?php
			$mixins = $page_elements->get_mixins();
			foreach ($mixins as $mixin) {
				?>
				<tr>
					<td><b><?php echo $mixin['name'] ?></b></td>
					<td>
						<p><?php echo $mixin['description'] ?></p>
						<?php foreach ($mixin['definitions'] as $definition) : ?>
							<?php echo $definition ?><br />
						<?php endforeach ?>
					</td>
				</tr>
				<?php
			}
			?>

		</tbody>
	</table>


</div>
</section>