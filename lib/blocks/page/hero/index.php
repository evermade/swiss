<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the repeater columns for this block
$block->get_repeater_field(['slides']);

if(!empty($block->repeaters['slides'])): ?>

<section class="b-hero-slideshow">

    <?php foreach($block->repeaters['slides'] as $k => $hero):

        // lets do some common tasks such as background images, default image?
        $hero_background = (is_array($hero['background'])) ? 'style="background-image: url('.$hero['background']['sizes']['large'].');"' : null;

        include(__DIR__.'/view.php');

    endforeach; ?>

</section><!-- end of b-hero-slideshow -->

<?php endif;
