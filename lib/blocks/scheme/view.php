</div><!-- close our last scheme -->
<div class="scheme <?php echo $block->getCss('section'); ?>"><!-- open our new scheme -->
<?php echo $assets_html; ?>
<?php echo \Swiss\sprint('<div class="c-background-image" style="%s %s"></div>', [$block->get_background_image('background_image'), $block->get('background_image_style')]); ?>