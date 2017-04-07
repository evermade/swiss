<div class="c-post-small">

    <div class="c-background-image" style="background-image:url(<?php echo $my_post->get_feature_image('hero-large', true); ?>);"></div>

    <div class="c-overlay"></div>

    <div class="c-post-small__content">

        <div class="h-wysiwyg-html">
            <h2>
    			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    				<?php the_title(); ?>
    			</a>
    		</h2>

    		<p class="accent"><?php the_date(); ?></p>

            <a class="c-btn" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e('Read Article', 'swiss'); ?></a>
        </div>
    </div>

</div><!-- end of c-post-small component -->