<?php
$elementName = "dividedbyfour";
?>
<div class="container">
	<h2>.layout-dividedbyfour</h2>
</div>

<div class="layout-<?=$elementName?> delay-sequence2">
	<?php for ($i=0; $i < 4; $i++) { ?>
		<div class="layout-<?=$elementName?>__area cup animated fadeInUp">
			<span class="coffeehere"><i class="fa fa-coffee"></i> Pour coffee here.</span>
		</div>
	<?php } ?>
	<div class="clearfix"></div>
</div>
