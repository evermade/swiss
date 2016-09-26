<?php
global $app;

if(empty($app)) return false;

$analytics = $app->get('opt_google_analytics');
if(isset($analytics) && is_array($analytics) && !Helper::is_dev()): ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  <?php 
  //lets setup all our tracker objects
  foreach($analytics as $key => $analytic): 

  	//1 tracker is default the others need a name
  	if(!empty($analytic['opt_google_analytics_name'])): ?>
	ga('create', '<?php echo $analytic['opt_google_analytics_code'];?>', 'auto', '<?php echo $analytic['opt_google_analytics_name']; ?>');
	ga('<?php echo $analytic['opt_google_analytics_name']; ?>.send', 'pageview');
  	<?php else: ?>

  	ga('create', '<?php echo $analytic['opt_google_analytics_code'];?>', 'auto');
  	ga('send', 'pageview');	 
  <?php endif; endforeach; ?>

</script>
<?php endif;