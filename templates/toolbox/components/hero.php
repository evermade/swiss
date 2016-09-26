<!--
Description: A basic hero component. Tested with Chrome, Firefox, IE11, IE10, IE9, iPhone 6 (iOS 8), Android (Chrome)
Tags: hero, component
Preview: true
-->

<div class="hero">

	<div class="hero__background" style=" background-image:url(http://fakeimg.pl/650x650/eee/666/?text=bg);"></div>

	<div class="hero__overlay"></div>

	<div class="hero__content">
		<h2>Default</h2>
		<p>By default the hero has a fixed min-height. The content is centered horizontally and vertically.</p>
		<a href="1" class="btn">Read More</a>
	</div>

</div><!-- end of hero -->

<br>

<div class="hero" style="height:500px;">

	<div class="hero__background" style=" background-image:url(http://fakeimg.pl/650x650/eee/666/?text=bg);"></div>

	<div class="hero__content hero__content--bottom hero__content--left">
		<div class="hero__content__overlay hero__content__overlay--fade-top"></div>
		<h2>Alignment</h2>
		<p>The content can be aligned anywhere. You can also have the overlay scale with the content and have it fade from the top or bottom.</p>
		<a href="1" class="btn">Read More</a>
	</div>

</div><!-- end of hero -->

<br>

<div class="el" style="height:500px;">
	<div class="hero hero--cover">

		<div class="hero__background" style=" background-image:url(http://fakeimg.pl/650x650/eee/666/?text=bg);"></div>

		<div class="hero__overlay"></div>

		<div class="hero__content">
			<h2>Cover</h2>
			<p>The hero can be set to cover its parent container.</p>
			<a href="1" class="btn">Read More</a>
		</div>

	</div><!-- end of hero -->
</div>