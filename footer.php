 <section class="footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php wp_nav_menu(array('theme_location' => 'footer-navigation', 'menu_class' => 'nav__list nav__list--bar footer__navigation')); ?>
			</div>
			<div class="col-xs-12">
				<p>hand crafted by <a href="http://www.evermade.fi/" target="_blank">evermade</a></p>
			</div>
		</div><!-- end of row -->
	</div><!-- end of wrapper -->
</section><!-- end of section --> 

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri();?>/assets/vendor/jquery/dist/jquery.min.js"><\/script>')</script>

<?php wp_footer();?>

</div>
</body>
</html>