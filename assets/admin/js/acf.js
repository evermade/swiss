(function() {

    jQuery(function() {

        function collapse( el ) {
            el.addClass("-collapsed");
        }

        function styleSectionBlocks( el ) {
            if ( el.data('layout') == 'section' ) {

                el.css({'background': '#eee'});

                if ( found > 1 ) {
                    el.css({'margin-top': '40px'});
                }

                found++;

            }
        }

        function appendBlockTitle( el ) {

            // sniff the block title from the acf markup

            var $handle = el.find('.acf-fc-layout-handle');
            $handle.find('.js-block-title').remove();

            var blockTitle = '';

            var titleInput = el.find('input[name*="_title"],input[name*="_heading"]');
            blockTitle = titleInput.length ? titleInput.val() : '';

            if ( blockTitle == '' ) {
                // no title-field, try to find first header in a columns textarea
                var textarea = el.find('textarea[name*="_columns"],textarea[name*="_hero"],textarea[name*="_section-header"],textarea[name*="_slide-list"]');
                if ( textarea.length ) {
                    blockTitle = jQuery( '<div>'+textarea.val()+'</div>' ).find('h1,h2,h3').text();
                }
            }

            if ( blockTitle != '' ) {
                // just add data attribute, css will handle the rest
                $handle[0].setAttribute('data-block-title', blockTitle);
            }

        }

        function runAll() {
            jQuery('.layout').each(function(index) {

                var $block = $(this);
                collapse( $block );
                styleSectionBlocks( $block );
                appendBlockTitle( $block );

            });
        }


        // initial run
        var found = 0;
        runAll();

    });

})();
