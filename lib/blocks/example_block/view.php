<section class="b-base">
    <div class="b-base__container">
        <div class="b-base__row">
            <div class="b-base__content">
                <div class="b-base__wrapper">
                    <div class="l-columns" data-column-count="1">
                        <div class="l-columns__item">
                            <div class="c-wysiwyg-html">
                        	<?php echo \Swiss\sprint('<h1 class="section-header__title">%s</h1>', str_replace(get_template_directory(), '',  __DIR__)); ?>
							<h2>Wooo! This block works :)</h2>
							<p>Your seeing this message as the view has been loaded succesfully from <b><?php echo str_replace(get_template_directory(), '',  __DIR__); ?></b>.</p>
							<p>For development:</p>
							<ol>
							<li>Duplicate this block folder and rename accordingly to naming convention typically of how you named the ACF block.</li>
							<li>Duplicate <b>/assets/css/scss/components/_example.scss</b> and rename the file and the parent selector to the name of the block.</li>
							<li>If JS is needed also duplicate <b>/assets/js/components/example.js</b> and rename the file and the object key <b>base</b> to the name of the block.</li>
							</ol>
							<p>This will provide a boilerplate to get you started. And keeping the same name from block, to section name, css file, js file will help development and others navigate the project.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>