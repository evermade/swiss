<!--
Description: A simple listing item component. The component scales with the image, text content being vertically centered. Hovering over the image shows additional information.
Tags: listing, component
Preview: true
-->

<div class="listing-item listing-item--small listing-item--extend">

	<div class="listing-item__image">
		<img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&f=y&s=200" alt="fake img"/>
	</div><!-- end of contact item image-->

	<div class="listing-item__body">

		<div class="listing-item__content">
			<h3>Firstname Lastname</h3>
			<p>Job Title</p>
			<p>0400 555 5555</p>
			<p><a href="#">firstname.lastname@company.com</a></p>
		</div><!-- end of contact item content -->

	</div><!-- end of contact item body -->

	<div class="listing-item__overlay">
		<div class="listing-item__overlay__content">
			<p>Additional information about the listing can be added here.</p>
		</div>
	</div><!-- end of contact item overlay -->

</div><!-- end of contact item -->