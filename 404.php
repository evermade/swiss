<?php

get_header(); ?>

<section class="columns">
    <div class="columns__container">

    <header class="section-header section-header--example">
        <h1 class="section-header__title">Whoops a daisy</h1>
        <h2 class="section-header__subtitle">The page you were looking for could not be found.</h2>
    </header>

        <div class="columns__row">
            <div class="columns__item text-center">
            	<p><a href="<?php echo home_url(); ?>" class="btn">Go to Home</a></p>
            </div>
        </div>
    </div>
</section>

<?php get_footer();