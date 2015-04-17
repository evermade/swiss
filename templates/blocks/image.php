<?php 
	//lets keep block data in class for encapsulation and stopping conflicts across blocks
	$block = new Block;

	//set and get the fields for this post
	$block->set_fields(array('image'));
	$block->get_fields();
?>
<section class="block block--image">
	<img src="<?php echo $block->fields['image']['url']; ?>" alt="<?php echo $block->fields['image']['title']; ?>"/>
</section>