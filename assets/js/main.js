var em = {}; //global var for all evermade modules

$(document).ready(function(){
	em.base.init();
});

// Global javascript confugiration.
em.config = {

	// Breakpoints. These should usually be same as 
	// Bootstrap breakpoints.
	breakpoints: {
		xs: 0,
		sm: 768,
		md: 992,
		lg: 1200
	}
};
