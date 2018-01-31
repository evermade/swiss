<?php
/*
Template Name: Page Blocks
*/

get_header();
?>

<div class="s-context">
    <div>
        <div>
            <?php \Evermade\Swiss\Acf\postBlocks(); ?>
        </div>
    </div>
</div>

<?php
get_footer();
