(function() {

    //create empty object in the global em variable
    em.clipboard = {};

    //call any functions to be trigger on dom ready
    em.clipboard.init = function() {
        em.clipboard.copy();
    };

    em.clipboard.copy = function() {

    	var links = $('.js-copy');

    	links.on('click', function(e){
    		e.preventDefault();

    		var el = $(this);

    		el.find('i').removeClass('fa-clipboard'); 
            el.find('i').addClass('fa-check');
    	});


        var client = new ZeroClipboard(links);

        client.on('ready', function(event) {
           	//console.log( 'movie is loaded' );

            //copy specific content
            // client.on('copy', function(event) {
            //     event.clipboardData.setData('text/plain', event.target.innerHTML);
            // });

            client.on('aftercopy', function(event) {
               //console.log('Copied text to clipboard: ' + event.data['text/plain']);                
            });
        });

        client.on('error', function(event) {
            //console.log( 'ZeroClipboard error of type "' + event.name + '": ' + event.message );
            ZeroClipboard.destroy();
        });
    };

})();