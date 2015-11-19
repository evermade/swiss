<!--
Description: A simple list item component. The component scales with the image, text content being vertically centered. Hovering over the image shows additional information.
Tags: list, component
Preview: true
-->

<div class="list-item list-item--small list-item--extend">

	<div class="list-item__image">
		<img src="http://fakeimg.pl/200x200/000000/fff/?text=img" alt="fake img"/>
	</div><!-- end of contact item image-->

	<div class="list-item__body">

		<div class="list-item__content">
			<h3>Firstname Lastname</h3>
			<p>Job Title</p>
			<p>0400 555 5555</p>
			<p><a href="#">firstname.lastname@company.com</a></p>
		</div><!-- end of contact item content -->

	</div><!-- end of contact item body -->

	<div class="list-item__overlay">
		<div class="list-item__overlay__content">
			<p>Additional information about the list item can be added here.</p>
		</div>
	</div><!-- end of contact item overlay -->

</div><!-- end of contact item -->