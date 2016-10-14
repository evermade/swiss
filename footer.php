	</div><!-- end of .page-content -->

<footer class="b-footer">
	<div class="b-footer__container">
		<div class="b-footer__row">
			<div class="b-footer__content">
				<?php wp_nav_menu(array('theme_location' => 'footer-navigation', 'menu_class' => 'b-footer__navigation')); ?>
			</div>
		</div>
		<div class="b-footer__row">
			<div class="b-footer__content">
				<p>&copy; Copyright <?php echo date('Y');?>&nbsp;•&nbsp;<?php bloginfo('name'); ?>&nbsp;•&nbsp;All rights reserved</p>
			</div>
		</div>
	</div>
</footer><!-- end of footer -->

<?php include(get_template_directory().'/templates/foot.php'); ?>