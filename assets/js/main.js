var em = {}; //global var for all evermade modules 

$(document).ready(function(){

	//lets loop the em object for keys are call their init functions
	for(var key in em){
		em[key].init();
	}
});