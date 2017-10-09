<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the repeater columns for this post
$block->getFields(['columns', 'columns_reverse_desktop', 'columns_vertical_alignment','columns_horizontal_alignment']);

// how many max per row
$block->set('per_row', 4);

$blockExtraClass = "l-columns--".$block->fields['columns_reverse_desktop']." l-columns--".$block->fields['columns_vertical_alignment']." l-columns--horizontal-".$block->fields['columns_horizontal_alignment'];

include(__DIR__.'/view.php');
