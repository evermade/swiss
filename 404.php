<?php

get_header(); ?>

<section class="hero">

    <div class="hero__slides slick--hero">
            
        <div class="hero__slide">

            <div class="hero__slide__content">

                <h1 class="hero__slide__title">Whoops a daisy</h1>

                <h2 class="hero__slide__subtitle">This page could not be found&hellip;</h2>
                <a href="<?php echo home_url(); ?>" class="btn hero__slide__btn">Go to Home</a>
            </div><!-- end of hero-slide content -->

        </div><!-- end of hero-slide -->

    </div><!-- end of hero-slides -->

</section><!-- end of hero -->

<?php get_footer();