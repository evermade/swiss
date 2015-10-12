<!--
Description: A basic form example with inputs, selects, radio and checkboxes
Tags: form, input
Preview: true
-->

<form action="" method="post" class="form">
	<fieldset>
		<div class="form__group">
			<label>name</label>
			<input id="yourname" type="text" name="yourname" class="text check " value="" required=""></div>
		<div class="form__group">
			<label>Telephone</label>
			<input type="text" name="telephone" class="text check " value="" required=""></div>
		<div class="form__group">
			<label>Email</label>
			<input type="email" name="email" class="text " value="" required="">
		</div>
		<div class="form__group">
			<label>Checkboxes One</label><input type="checkbox" name="email" class="text " value="One" required="">
			<label>Checkboxes Two</label><input type="checkbox" name="email" class="text " value="Two" required="">
		</div>
		<div class="form__group">
			<label>Radio One</label><input type="radio" name="email" class="text " value="One" required="">
			<label>Radio Two</label><input type="radio" name="email" class="text " value="Two" required="">
		</div>
		<div class="form__group">
			<label>Message</label>
			<textarea name="message" class="check " required=""></textarea>
		</div>
		<div class="form__group">
			<div class="form__select">
				<select name="" id="">
					<option value="">Option 1</option>
					<option value="">Option 2</option>
					<option value="">Option 3</option>
				</select>
			</div>
		</div>
		<div class="form__group">
			<button type="submit" class="btn">Send message</button>
		</div>
	</fieldset>
</form>