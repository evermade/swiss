(function() {

	em.forms = {};

	em.forms.init = function(){
		em.forms.events();
	};

	em.forms.events = function(){

		$('select.js-on-change-submit').change(function() {
            this.form.submit();
        });

	};

})();