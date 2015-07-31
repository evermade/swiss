(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.element = {
		cache: {}
	};

	//call any functions to be trigger on dom ready
	em.element.init = function(){
		// em.element.set('hero', $('.hero .hero__slide__col'));
		// em.element.set('body', $('.hero'));

		// var hero = em.element.get('hero');
		// em.element.renew('hero');

		// console.log(em.element.cache); 
	};

	/**
	 * set elem to local obj cache
	 * @param {[type]} key   [description]
	 * @param {[type]} value [description]
	 */
	em.element.set = function(key, value){
		em.element.cache[key] = value;
		return true;
	};

	/**
	 * get elem from obj cache
	 * @param  {[type]} key [description]
	 * @return {[type]}     [description]
	 */
	em.element.get  = function(key){
		if(key!=null && em.element.cache[key]){
			return em.element.cache[key];
		}

		return null;
	};

	/**
	 * get fresh obj from dom
	 * @param  {[type]} key [description]
	 * @return {[type]}     [description]
	 */
	em.element.renew  = function(key){
		if(em.element.cache[key]){
			return em.element.set(key, $(em.element.cache[key].selector));
		}

		return false;
	};

})();