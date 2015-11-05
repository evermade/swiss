<!--
Description: A basic example of using flexbox to acheive an equal height effect. Please bare in mind browser support of ie10 upwards only. It uses just a normal grid pattern with the grid row using a equal-height helper class to equalise the column heights. In this example using the background-image helper class to make the image span full cover of its surrounding.
Tags: equal height, grid
Preview: true
-->

<div class="container">
	<div class="row equal-height">
		<div class="col-xs-12 col-sm-6">
			<div class="background-image" style="background-image: url(http://fakeimg.pl/750x750/eeeeee/666/?text=img);"></div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<h2>Equal Heights</h2>
			<p>This is using flexbox so please bare in mind, stooooopid browsers such as ie9 will not support this, on the other hand ie10 upwards will be dandy :). Upon your needs this wont stack the grid as expected, as the flex property overides this. So using the equal-height mixin on your grid row within a breakpoint mixin to achieve the desired results.</p>
			<br>
			<p>Some of the text may be <em>emphasised</em> and some it might even be <strong>strongly emphasised</strong>. Occasionally <q>quoted text</q> may be found within a paragraph &hellip;and of course <a href="#">a link</a> may appear at any point in the text. The average paragraph contains five or six sentences although some may contain as little or one or two while others carry on for anything up to ten sentences and beyond.</p>
		</div>
	</div><!-- end of row -->
</div><!-- end of container -->	
