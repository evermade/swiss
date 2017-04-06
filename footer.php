	</div><!-- end scheme -->
</div><!-- end of .page-content -->

<footer class="b-footer">
	<div class="b-footer__container">

		<div class="b-footer__navigation">
			<div class="b-footer__navigation__column b-footer__navigation__column--logo">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-black.svg" alt="<?php bloginfo('name'); ?>" class="b-footer__logo">
			</div>

			<div class="b-footer__navigation__column">
				<?php wp_nav_menu(array('theme_location' => 'footer-navigation', 'menu_class' => 'c-list c-list--horizontal c-list--padded')); ?>
			</div>

			<div class="b-footer__navigation__column">
				<ul class="c-list c-list--horizontal c-list--padded">
					<li><a href="/">Support</a></li>
					<li><a href="/">Privacy Policy</a></li>
				</ul>
			</div>
		</div>

		<div class="b-footer__credits">
			<div class="b-footer__credits__column">
				<p>&copy; Copyright <?php echo date('Y');?>&nbsp;•&nbsp;<?php bloginfo('name'); ?>&nbsp;•&nbsp;All rights reserved</p>
			</div>
		</div>
	</div>
</footer><!-- end of footer -->

<?php include(get_template_directory().'/templates/foot.php'); ?>