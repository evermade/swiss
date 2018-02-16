<?php

$sizes = \Swiss\get_image_sizes();

foreach ($sizes as $key => $value): ?>

<section class="section">
    <h2><?php echo $key;?> - <?php echo $value['width'];?> x <?php echo $value['height'];?> (<?php echo ($value['crop'] == 1)? 'cropped' : 'not cropped';?>)</h2>
    <p class="text-xs"><?php echo htmlentities('<?php echo \Swiss\default_img(\''.$key.'\'); ?>');?></p><br>
    <img src="<?php echo \Swiss\default_img($key, $key); ?>" alt="<?php echo $key;?>">
</section>

<?php endforeach;
