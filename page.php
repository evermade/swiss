<?php
/*
Template Name: Page Blocks
*/

get_header();
?>

<div class="s-context">
    <div>
        <?php \Swiss\Acf\postBlocks(); ?>
    </div>
</div>

<?php
get_footer();
