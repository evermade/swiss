<div class="c-sidebar-widget">
    <h3 class="c-sidebar-widget__title js-blog__sidebar-mobile">Archive</h3>
    <div class="c-sidebar-widget__content">

        <ul class="c-sidebar-ul">
            <?php
            $args = array(
                'show_post_count'   => true,
                'format'            => 'custom',
                'before'            => '<li>',
                'after'             => '</li>',
                'echo'              => false
            );

            if(!empty(get_post_type())) {
                $args['post_type'] = get_post_type();
            }

            $archives = wp_get_archives($args);

            $archives = preg_replace( '~(&nbsp;)(\(\d++\))~', '$1<span class="count">$2</span>', $archives );

            $archives = str_replace("(", "", $archives);
            $archives = str_replace(")", "", $archives);

            echo $archives;
            ?>
        </ul>
        
    </div>
</div>