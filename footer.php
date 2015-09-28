	</div><!-- end of .page-content -->
</div><!-- end of .body -->

<footer class="footer">
	<div class="footer__container">
		<div class="footer__row">
			<div class="footer__content">
				<?php wp_nav_menu(array('theme_location' => 'footer-navigation', 'menu_class' => 'nav__list nav__list--bar footer__navigation')); ?>
			</div>
		</div>
		<div class="footer__row">
			<div class="footer__content">
				<p>&copy; Copyright <?php echo date('Y');?>&nbsp;•&nbsp;<?php bloginfo('name'); ?>&nbsp;•&nbsp;All rights reserved</p>
			</div>
		</div>
	</div>
</footer><!-- end of footer -->

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri();?>/assets/vendor/jquery/dist/jquery.min.js"><\/script>')</script>

<?php wp_footer();?>
</body>
</html>