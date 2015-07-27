(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.ajax = {};

	//call any functions to be trigger on dom ready
	em.ajax.init = function(){
		em.ajax.basic();
	};

	em.ajax.basic  = function(){

		//an example of a js ajax call
		$('.load-more').click(function(event) {
		   event.preventDefault();

		   var el = $(this);
		   var url = this.href;

		   //lets add a little loading icon
		   el.find('i').addClass('fa-spin');
		 
		   $.ajax(url, {
		      success: function(data) {
		         
		      	//for now lets just add the data before this element being clicked, a little timeout for demo loading
		      	setTimeout(function(){
		      		$(data.html).insertBefore(el);
		      		 el.find('i').removeClass('fa-spin');
		      	}, 400);

		      },
		      error: function(jqXHR, textStatus, errorThrown) {
		      	var log = [
		      		'Issues requesting: '+url,
		      		errorThrown
		      	];
		      	console.log(log); 
		      }
		   });
		});

	};

})();