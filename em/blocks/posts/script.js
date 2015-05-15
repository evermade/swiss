(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.posts = {};

	//call any functions to be trigger on dom ready
	em.posts.init = function(){
		em.posts.example();
	};

	em.posts.example  = function(){
		console.log("i got in!"); 
	};

})();