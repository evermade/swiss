(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.columns = {};

	//call any functions to be trigger on dom ready
	em.columns.init = function(){
		em.columns.example();
	};

	em.columns.example  = function(){
		console.log("i got in!"); 
	};

})();