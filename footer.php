	</div><!-- end of .page-content -->

<footer class="footer">
	<div class="footer__container">
		<div class="footer__row">
			<div class="footer__content">
				<?php wp_nav_menu(array('theme_location' => 'footer-navigation', 'menu_class' => 'footer__navigation')); ?>
			</div>
		</div>
		<div class="footer__row">
			<div class="footer__content">
				<p>&copy; Copyright <?php echo date('Y');?>&nbsp;•&nbsp;<?php bloginfo('name'); ?>&nbsp;•&nbsp;All rights reserved</p>
			</div>
		</div>
	</div>
</footer><!-- end of footer -->

<?php include(get_template_directory().'/templates/foot.php'); ?>