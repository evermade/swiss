<div class="c-card" data-animate="animated zoomIn">

    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><div class="c-card__image" style="background-image:url(<?php echo \Evermade\Swiss\featuredImageUrl('medium-large'); ?>);"></div></a>

    <div class="c-card__content" data-scheme-target>

        <p class="c-card__meta"><?php the_date(); ?></p>

        <h3 class="c-card__title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="c-cta-link"><?php _e('Read More', 'swiss'); ?></a>

    </div>

</div>
