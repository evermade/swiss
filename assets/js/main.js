var em = {}; //global var for all evermade modules

$(document).ready(function(){

	// Let's loop the em object for keys are call their init functions.
	for(var key in em){

		// Check if init function exists.
		if (typeof(em[key].init) === "function") {

			// Run init function.
			em[key].init();

		} else {

			console.error("Your block " + key + " doesn't define init-method.");

		}

	}

});
