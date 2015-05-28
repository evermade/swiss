(function() {

	em.forms = {};

	em.forms.init = function(){
		//em.forms.gravityForms();
	};

	//lets inject placeholders in gravity forms
	em.forms.gravityForms = function(){

		//lets loop all g forms
		$(".gform_wrapper form").each(function(){ 

			var form = $(this);
			var fields = form.find(".gform_fields .gfield");

			//lets loop all fields in the form
			fields.each(function(){ 
				var el = $(this);
				var label = el.find(".gfield_label");
				var input = el.find("input, textarea");
				input.attr("placeholder", label.text());

				if (Modernizr.input.placeholder) {
					label.hide();
				}

				if(el.hasClass('gfield_contains_required')){
					input.not("textarea").attr("required", "required");
				}
			});

			//lets add a nice class to the submit button
			form.find("input[type='submit']").addClass('btn');

			//lets wrapper the select for styles yall
			var selects = form.find("select");
			selects.each(function(){ 
				var el = $(this);
				el.wrap('<div class="custom-select"></div>');
			});
		});

	};

})();