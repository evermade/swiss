<?php

$tags = get_the_tag_list('<ul class="c-tags-ul"><li>', '</li><li>', '</li></ul>');

if($tags): ?>

    <div class="c-sidebar-widget" data-scheme-target>
        <h3 class="c-sidebar-widget__title js-blog__sidebar-mobile">Tags</h3>
        <div class="c-sidebar-widget__content">
            <?php echo get_the_tag_list('<ul class="c-tags-ul"><li>', '</li><li>', '</li></ul>'); ?>
        </div>
    </div>

<?php endif; ?>