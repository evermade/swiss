<?php
get_header();

include_once(get_template_directory() . '/em/classes/class.pageelements.php');

if(!isset($_GET['page'])){
	$_GET['page'] = 'index';
}

?>

<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="nav list list--horizontal">
					<li><a href="?page=index">Home</a></li>
					<li><a href="?page=styleguide">Styleguide</a></li>
					<li><a href="?page=mixins">Mixins</a></li>
					<li><a href="?page=animations">Animations</a></li>
				</ul>
			</div>
		</div><!-- end of row -->
	</div><!-- end of wrapper -->
</section><!-- end of section --> 

<?php

switch ($_GET['page']) {
	case 'animations':
		include(get_template_directory().'/templates/toolbox/animations.php');
		break;
	case 'styleguide':
		include(get_template_directory().'/templates/toolbox/styleguide.php');
		break;
	case 'mixins':
		include(get_template_directory().'/templates/toolbox/mixins.php');
		break;
	case 'viewer':
		include(get_template_directory().'/templates/toolbox/viewer.php');
		break;
	default:
		include(get_template_directory().'/templates/toolbox/index.php');
		break;
}

get_footer();