<?php if(empty($data)) return false; ?>
<ul class="c-list c-list--horizontal c-list--padded">
	<?php foreach($data as $key => $value): ?>
	<li><a href="<?php echo $value['url']; ?>"><i class="fa fa-<?php echo $value['service']; ?>" aria-hidden="true"></i></a></li>
	<?php endforeach; ?>
</ul>