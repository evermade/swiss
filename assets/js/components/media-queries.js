(function() {

	//create empty object in the global em var
	em.mq = {};

	// Bootstrap breakpoints.
	em.mq.breakpoints = {
		xs: 0,
		sm: 768,
		md: 992,
		lg: 1200
	};

	/**
	 * init
	 * @return {[type]} [description]
	 */
	em.mq.init = function(){
	};

	/**
	 * mobile first media query checker function, 
	 * @return a boolean if as whats expected from a CSS media query
	 */
	em.mq.query  = function(bp, minMax){

		//lets set out function defaults
		 bp = (typeof bp !== 'undefined') ? bp : 'xs';
		 minMax = (typeof minMax !== 'undefined') ? minMax : 'min';

		 //lets check if matchMedia support is there
		var isMatchMediaSupported = !!(window && window.matchMedia);

		//if supported and breakpoint in array
		if(isMatchMediaSupported && (bp in em.mq.breakpoints)){
			var mq = window.matchMedia('all and ('+minMax+'-width: '+em.mq.breakpoints[bp]+'px)');
			return mq.matches;
		}
		else {
			return false;
		}

	};

})();