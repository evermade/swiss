(function() {

	//create empty object in the global em var, dont forget to add the init call in the main.js!
	em.clock = {};

	//call any functions to be trigger on dom ready
	em.clock.init = function(){
		em.clock.start();
	};

	em.clock.start  = function(){
		var clock = document.getElementById("clock");
		
		if(clock==null){
			return false;
		}

		var monthNames = [
	        "January", "February", "March",
	        "April", "May", "June", "July",
	        "August", "September", "October",
	        "November", "December"
	    ];

		var targetDate = function() {
			var date = new Date();
		    var day = date.getDate();
		    var monthIndex = date.getMonth();
		    var year = date.getFullYear();
		    var seconds = date.getSeconds();
		    var minutes = date.getMinutes();
		    var hours = date.getHours();

		    //return day+" "+monthNames[monthIndex]+" "+year;
		    return date;
		};

		clock.innerHTML = targetDate().toString();
		setInterval(function() {
		  clock.innerHTML = targetDate().toString();
		}, 1000);
	};

	em.clock.countdown = function(){
	};

})();